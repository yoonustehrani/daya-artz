import { number_format } from "../../../../../../helpers";

export default function OnlinePayment({pay, amount}) {
    return (
        <>
            <p>پرداخت مبلغ : {number_format(amount, true)}</p>
            <p>با کلیک بر روی درگاه زیر خود به خود به صفحه پرداخت منتقل شده و امکان تسویه حساب برای شما فراهم میگردد.</p>
            <div className="w-100 text-center my-4">
                <span className="gateway-btn cursor-pointer" onClick={() => pay('zarinpal')}>
                    درگاه بانکی زرین پال
                    <img src={APP_PATH + "images/gallery/zarin-paal.jpg"} alt="zarin-paal logo" />
                </span>
            </div>
        </>
    )
}