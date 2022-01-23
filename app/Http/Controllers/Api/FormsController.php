<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    private function tracking_code($length = 6)
    {
        $alpha = str_shuffle("ABCDEFGHJKLMNPQRSTUWXYZ");
        $code = $alpha[0];
        for ($i=0; $i < $length; $i++) { 
            $code .= random_int(0, 9);
        }
        return $code;
    }
    public function quickOrder(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|numeric|regex:/^09[0-9]{9}$/',
            'fullname' => 'required|string|min:3|max:40',
            'description' => 'nullable|string|max:2000',
            'items' => 'required|array'
        ]);
        $order_items = $request->input('items');
        $order = new Order();
        $order->method = 'quick-order';
        $order->type = 'automate';
        $order->status = __('orders.status.new');
        $order->status_info = __('orders.status_info.system-recieved');
        $desscription  = "نام و نام خانوادگی : `{$request->input('fullname')}`\n";
        $desscription .= "شماره تلفن : ({$request->input('phone_number')})\n";
        $desscription .= "سفارش : " . implode(', ', $order_items) . "\n";
        $order->description = $desscription . $request->input('description');
        $order->details = ['items' => $order_items];
        $order->code = $this->tracking_code();
        if ($order->save()) {
            return response()->json([
                'okay' => true,
                'message' => __('messages.order.recived', ['code' => $order->code]),
            ]);
        }
        return response()->json([
            'okay' => false,
            'message' => __('messages.order.error')
        ],403);
    }
    public function contact()
    {
        
    }
}
