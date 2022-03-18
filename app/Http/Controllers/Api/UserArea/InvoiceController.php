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
        return response()->json($invoices->latest()->simplePaginate(10)->withQueryString());
    }
    public function show(Request $request, $invoice)
    {
        $invoice = $request->user()->invoices()->with('offer')->findOrFail($invoice);
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
            $invoice->load(['bills' => function($q) {
                $q->active();
            }]);
        }
        return response()->json([
            'okay' => true,
            'invoice' => $invoice,
            'order' => $order
        ]);
    }
    public function update(Request $request, $invoice)
    {
        $invoice = $request->user()->invoices()->with('offer')->select('id', 'order_id', 'active', 'offer_id')->findOrFail($invoice);
        abort_if($invoice->active, 403, 'این فاکتور قبلا ثبت شده است.');
        try {
            \DB::beginTransaction();
            $bills = $this->create_bills($invoice);
            $invoice->total = $bills['total'];
            $invoice->active = true;
            $invoice->save();
            $invoice->bills = $invoice->bills()->saveMany($bills['items']);
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
    protected function create_bills(Invoice $invoice)
    {
        $total = 0;
        $bills = [];
        $order_items = OrderItem::select(['id', 'offer_id', 'title', 'total'])
            ->where('order_id', $invoice->order_id)
            ->with('offer')
            ->get()
            ->append('off');
        $invoice->multipay = request()->input('mode') !== 'all';
        if (request()->input('mode') === 'all') {
            foreach ($order_items as $order_item) {
                $total += $order_item->total - $order_item->off;
            }
            // Applying Offer to $total if possible
            $total -= $invoice->offer ? calculate_off($total, $invoice->offer) : 0;
            // Making the bills
            $bills = make_bills(with_value_added($total));
        } else {
            foreach ($order_items as $order_item) {
                $item_total = with_value_added($order_item->total - $order_item->off);
                $total += $item_total;
                $item_bills = make_bills($item_total, $order_item->title);
                for ($i=0; $i < count($item_bills); $i++) { 
                    array_push(
                        $bills,
                        $item_bills[$i]
                    );
                }
            }
        }
        return [
            'total' => $total,
            'items' => $bills
        ];
    }
}