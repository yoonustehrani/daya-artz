<div id="order-detail" class="w-100 float-left portfolio-order-detail">
    <div class="w-100 h-100 dotted-background">
        <h4 class="pt-4">جزئیات سفارش</h4>
        <ul class="detail-box w-100 p-4 rtl">
            @foreach ($details as $key => $value)
            <li>
                <h4>{{ $key }}: <span>{{ $value }}</span></h4>
            </li>
            @endforeach
        </ul>
    </div>
</div>