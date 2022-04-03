<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecaptchaRequest;
use App\Models\Order;
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
        $order->status = __('userarea.orders.status.submitted');
        $order->status_info = __('orders-lang.status_info.system-recieved');
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
}
