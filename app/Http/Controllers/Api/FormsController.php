<?php

namespace App\Http\Controllers\Api;

use App\Events\QuickOrderSubmitted;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecaptchaRequest;
use App\Models\Form;
use App\Models\FormAnswer;
use App\Models\Order;
use App\Models\Zeus\Form;
use App\Models\Zeus\FormAnswer;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function quickOrder(RecaptchaRequest $request)
    {
        abort_if(! $request->validate_captcha('quick_order'), 403, __('messages.google_recaptcha_error'));
        $cache_key = $request->getSession()->getId() . now()->format('Y-m-d');
        if (\Cache::has($cache_key)) {
            return response()->json([
                'errors' => ['order' => [__('messages.quick-order.cache_exists')]]
            ], 422);
        }
        // ValidationException
        $request->validate([
            'phone_number' => 'required|string|digits:11|regex:/^09[0-9]{9}$/',
            'fullname' => 'required|string|min:3|max:40',
            'description' => 'nullable|string|max:2000',
            'order_items' => 'required|array'
        ]);
        $order_items = Service::select(['id', 'title'])->findOrFail($request->input('order_items'));
        try {
            \DB::beginTransaction();
            $order = new Order();
            $order->method = 'quick-order';
            $order->type = 'automate';
            $order->status = __('userarea.orders.status.submitted');
            $order->status_info = __('orders-lang.status_info.system-recieved');
            $desscription  = "نام و نام خانوادگی : `{$request->input('fullname')}`\n";
            $desscription .= "شماره تلفن : ({$request->input('phone_number')})\n";
            $order->description = $desscription . $request->input('description');
            $order->details = compact('order_items');
            if ($order->save()) {
                $order_items = $order_items->map(function($oi) {
                    $item = new OrderItem();
                    $item->service_id = $oi->getKey();
                    $item->title = $oi->title;
                    $item->status = $item::STATUS[0];
                    return $item;
                });
                $order->items()->saveMany($order_items);
                \Cache::put($cache_key, true, 2 * 60 * 60);
                \DB::commit();
                event(new QuickOrderSubmitted($order, $request->input('phone_number'), $request->input('fullname')));
                return response()->json([
                    'okay' => true,
                    'message' => __('messages.order.recived', ['code' => $order->code]),
                ]);
            }
        } catch (\Throwable $th) {
            \DB::rollback();
            \Log::error($th);
        }

        return response()->json([
            'okay' => false,
            'message' => __('messages.order.error')
        ], 403);
    }
    public function contact(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|digits:11|regex:/^09[0-9]{9}$/',
            'fullname' => 'required|string|min:3|max:40',
            'message' => 'required|string|min:20|max:1000',
            'email' => 'required|email:filter,dns|max:255'
        ]);
        return redirect()->to(route('contact'));
    }

    public function show($key)
    {
        $form = Form::select(['id', 'title'])->with(['inputs' => function($q) {
            $q->orderBy('order');
        }])->active()->where('key', $key)->firstOrFail();

        return response()->json($form);
    }

    public function store(Request $request, $key)
    {
        $form = Form::select(['id', 'title'])->active()->where('key', $key)->firstOrFail();
        $form->load(['inputs' => function($q) {
            $q->select(['id', 'form_id', 'name', 'default', 'required', 'validation_rules', 'details']);
        }]);
        $request_rules = $form->validation_rules;
        if ($request_rules->count()) {
            $request->validate($request_rules->toArray());
        }
        $submissions = collect([]);
        $form->inputs->each(function($input) use($submissions, $request) {
            $value = $request->input($input->name) ?: $input->default;
            $submissions->put($input->id, ['value' => serialize($value)]);
        });
        try {
            $answer = new FormAnswer([
                'ip' => $request->ip(),
                'user_id' => $request->user() ? $request->user()->id : null,
                'name' => $request->input('__name')
            ]);
            \DB::beginTransaction();
            $form->answers()->save($answer);
            $answer->inputs()->attach($submissions->toArray());
            \DB::commit();
            return ['okay' => true, 'message' => __('messages.form.success')];
        } catch (\Throwable $th) {
            \DB::rollback();
            \Log::alert($request->all());
            abort(500);
        }
    }
}
