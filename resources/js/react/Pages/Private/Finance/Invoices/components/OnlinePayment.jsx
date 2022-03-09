// the commented codes are for having more than one gateway
// import { useState } from "react"

export default function OnlinePayment() {
    // const [gateway, setGateway] = useState("zarin")
    return (
        <>
            {/* <p>با انتخاب یکی از درگاه های زیر میتوانید به راحتی و بدون دردسر هزینه سفارش خود را به صورت آنلاین پرداخت نمایید:</p>  
            <div className="payment-method-container">
                <input type="radio" name="select" id="option-1" checked={gateway === 'zarin'}   onChange={() => setGateway("zarin")} />
                <input type="radio" name="select" id="option-2" checked={gateway === "melat"} onChange={() => setGateway("melat")} />
                <label htmlFor="option-1" className="option option-1">
                    <span>زرین پال</span>
                    <div className="dot"></div>
                </label>
                <label htmlFor="option-2" className="option option-2">
                    <span>درگاه بانک ملت</span>
                    <div className="dot"></div>
                </label>
            </div>
            <div className="w-100 text-center mt-2"><a href="#redirect to payment page" className="btn btn-lg btn-primary px-4">تایید</a></div> */}
            <p>با کلیک بر روی درگاه زیر خود به خود به صفحه پرداخت منتقل شده و امکان تسویه حساب برای شما فراهم میگردد.</p>
            <div className="w-100 text-center my-4">
                <a href="#zarin_gateway" className="gateway-btn">
                    زرین پال
                    <img src={APP_PATH + "images/gallery/zarin-paal.jpg"} alt="zarin-paal logo" />
                </a>
            </div>
        </>
    )
}