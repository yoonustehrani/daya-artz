<x-layout.simple title="پرداخت با موفقیت انجام شد">
    <main class="w-100 h-100 bg-navy-eggplant d-flex justify-content-center align-items-center">
        <div class="reciept bg-white col-10 pt-4 px-3">
            <div class="text-center">
                <p><i class="fas fa-3x fa-check-circle text-green"></i></p>
                <p>تراکنش با موفقیت انجام شد.</p>
            </div>
            <div class="w-100 px-3 mt-4">
                <p class="item">
                    <span>مبلغ</span>
                    <span>{{ number_format($transaction->amount) }} تومان</span>
                </p>
                <hr>
                <p class="item">
                    <span>کارت بانکی</span>
                    <span class="d-inline-block ltr">{{ optional($transaction->details)->card_pan }}</span>
                </p>
                <hr>
                <p class="item">
                    <span>پیگیری تراکنش</span>
                    <span>{{ optional($transaction->details)->ref_id }}</span>
                </p>
                <hr>
                <p class="item">
                    <span>شماره تراکنش</span>
                    <span>{{ $bill->code }}-{{ $transaction->id }}</span>
                </p>
                <hr>
                <p class="item">
                    <span>پذیرنده</span>
                    <span>@lang($transaction->provider) <img data-src="{{ asset('images/gallery/zarin-paal.jpg') }}" class="lazyload" height="20" alt="لوگوی زرین پال"></span>
                </p>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('userarea', ['path' => 'finance/invoices/' . $bill->invoice_id ]) }}" class="btn btn-light mb-3">مشاهده فاکتور</a>
                <br>
                <a href="{{ route('userarea') }}" class="btn text-gray"><i class="fas fa-arrow-right mx-1"></i> بازگشت به حساب کاربری</a>
                <hr>
                <p><a class="text-gray" href="{{ route('home') }}">DAYA ARTZ | دایا آرتز</a></p>
            </div>
        </div>
    </main>
</x-layout.simple>