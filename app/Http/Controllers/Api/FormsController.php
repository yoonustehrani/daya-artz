<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecaptchaRequest;
use App\Models\Order;
use App\Models\Zeus\Form;
use App\Models\Zeus\FormAnswer;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function quickOrder(RecaptchaRequest $request)
    {
        abort_if(! $request->validate_captcha('quick_order'), 403, __('messages.google_recaptcha_error'));
        $request->validate([
            'phone_number' => 'required|string|digits:11|regex:/^09[0-9]{9}$/',
            'fullname' => 'required|string|min:3|max:40',
            'description' => 'nullable|string|max:2000',
            'order_items' => 'required|array'
        ]);
        // ValidationException
        $order_items = $request->input('order_items');
        $order = new Order();
        $order->method = 'quick-order';
        $order->type = 'automate';
        $order->status = __('orders.status.new');
        $order->status_info = __('orders.status_info.system-recieved');
        $desscription  = "نام و نام خانوادگی : `{$request->input('fullname')}`\n";
        $desscription .= "شماره تلفن : ({$request->input('phone_number')})\n";
        $desscription .= "سفارش : " . implode(', ', $order_items) . "\n";
        $order->description = $desscription . $request->input('description');
        $order->details = ['order_items' => $order_items];
        if ($order->save()) {
            return response()->json([
                'okay' => true,
                'message' => __('messages.order.recived', ['code' => $order->code]),
            ]);
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
