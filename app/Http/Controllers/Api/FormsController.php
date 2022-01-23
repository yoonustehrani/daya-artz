<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function quickOrder(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|numeric|regex:/^09[0-9]{9}$/',
            'fullname' => 'required|string|min:3|max:40',
            'description' => 'nullable|string|max:2000',
            'orders' => 'required|array'
        ]);
        $orders = new Order();
        return $request->all();
    }
    public function contact()
    {

    }
}
