<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = $request->user()->invoices()->latest()->simplePaginate(10);
        return response()->json($invoices);
    }
    public function show(Request $request, $invoice)
    {
        $invoice = $request->user()->invoices()->with('order.items')->findOrFail($invoice);
        $order = $invoice->order()
            ->select(['id', 'code'])
            ->with('items')
            ->firstOrFail();
        if ($invoice->active) {
            $invoice->load('bills');
        }
        return response()->json([
            'okay' => true,
            'invoice' => $invoice,
            'order' => $order
        ]);
    }
}