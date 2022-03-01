<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = $request->user()->invoices();
        $invoices = $request->has('active') ? $invoices->active() : $invoices->inactive();
        return response()->json($invoices->latest()->simplePaginate(10));
    }
    public function show(Request $request, $invoice)
    {
        $invoice = $request->user()->invoices()->findOrFail($invoice);
        $order = $invoice->order()
            ->select(['id', 'code'])
            ->with(['items' => function($q) {
                $q->select(['id', 'order_id', 'offer_id', 'title', 'total'])->with([
                    'offer' => function($query) {
                        $query->select('id', 'value', 'value_type');
                    }
                ]);
            }])
            ->firstOrFail();
        $order->items->append('off');
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