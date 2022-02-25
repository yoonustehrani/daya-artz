<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $invoices = $user->invoices()->latest()->simplePaginate(10);

        return response()->json($invoices);
    }
}