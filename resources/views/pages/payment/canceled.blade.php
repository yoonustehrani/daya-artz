<x-layout.simple title="پرداخت با موفقیت انجام شد">
    <main class="w-100 h-100 bg-navy-eggplant d-flex justify-content-center align-items-center">
        <div class="reciept bg-white col-10 pt-4 px-3">
            <div class="text-center">
                <p><i class="fas fa-3x fa-times text-danger"></i></p>
                <p>تراکنش ناموفق</p>
            </div>
            <div class="w-100 px-3 mt-4">
                <p class="item">
                    <span>مبلغ</span>
                    <span>{{ number_format($transaction->amount) }} تومان</span>
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
            <div class="text-center rtl mt-3">
                <a href="{{ route('userarea') }}" class="text-gray"><i class="fas fa-arrow-right mb-3"></i> بازگشت به حساب کاربری</a>
                <p class="mt-2">
                    <span>نیاز به پشتیبانی دارید ؟</span>
                    <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-dark mx-2">دریافت پشتیبانی</a>
                </p>
                <hr>
                <p><a class="text-gray" href="{{ route('home') }}">DAYA ARTZ | دایا آرتز</a></p>
            </div>
        </div>
    </main>
</x-layout.simple>