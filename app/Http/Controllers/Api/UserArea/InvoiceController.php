<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Invoice;
use App\Models\OrderItem;
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
    public function update(Request $request, $invoice)
    {
        $invoice = $request->user()->invoices()->select('id', 'order_id', 'active')->findOrFail($invoice);
        abort_if($invoice->active, 403, 'این فاکتور قبلا ثبت شده است.');
        try {
            \DB::beginTransaction();
                $invoice->active = true;
                $invoice->save();
                $bills = [];
                $items = OrderItem::select(['id', 'offer_id', 'title', 'total'])
                        ->where('order_id', $invoice->order_id)
                        ->with('offer')
                        ->get()
                        ->append('off');
                if ($request->input('mode') === 'all') {
                    $total = 0;
                    foreach ($items as $item) {
                        $total += $item->total - $item->off;
                    }
                    $bills = $this->make_bills($total);
                } else {
                    foreach ($items as $item) {
                        $sub_total = $item->total - $item->off;
                        $item_bills = $this->make_bills($sub_total, $item->title);
                        for ($i=0; $i < count($item_bills); $i++) { 
                            array_push(
                                $bills,
                                $item_bills[$i]
                            );
                        }
                    }
                }
                $bills = $invoice->bills()->saveMany($bills);
                $invoice->bills = $bills;
            \DB::commit();
            return [
                'okay' => true,
                'invoice' => $invoice
            ];
        } catch (\Throwable $th) {
            \DB::rollback();
            throw $th;
            abort(403, 'هنگام ایجاد فاکتور خطایی رخ داد لطفا مجددا تلاش کنید.');
        }
    }
    protected function make_bills($total, $title = null)
    {
        $bills = [];
        $payments = calculate_payments($total);
        foreach ($payments as $type => $amount) {
            $bill = new Bill([
                'active' => $type === 'deposit',
                'amount' => $amount,
                'title' => __("userarea.bills.{$type}", ['item_title' => $title ?? __('Order')]),
                'code' => (string) generate_code(6)
            ]);
            array_push($bills, $bill);
        }
        return $bills;
    }
}