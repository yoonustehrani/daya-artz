import React, { useStatem, lazy, useState } from "react"
import LoaderComponent from "../../../../../components/LoaderComponent"
const OnlinePayment = lazy(() => import('./OnlinePayment'))
const ClassicPayment = lazy(() => import('./ClassicPayment'))

export default function PaymentPopup({close}) {
    const [payMethod, setPayMethod] = useState("online")
    const onClose = (e) => {
        if (!$(e.target).closest("#popup-box").length) {
            close()
        }
    }
    return (
        <div className="popup-container animated fadeInDown" onClick={onClose}>
            <div className="popup-box alert-light" id="popup-box">
                <div className="popup-header-tab">
                    <a href="#online_payment" className={payMethod === "online" ? "active" : null} onClick={() => setPayMethod("online")}>پرداخت به صورت آنلاین</a>
                    <a href="#classicpayment" className={payMethod === "classic" ? "active" : null} onClick={() => setPayMethod("classic")}>پرداخت از طریق واریز به حساب</a>
                </div>
                <div className="popup-content">
                    {payMethod === "online" && <React.Suspense fallback={<LoaderComponent/>}><OnlinePayment/></React.Suspense>}
                    {payMethod === "classic" && <React.Suspense fallback={<LoaderComponent/>}><ClassicPayment/></React.Suspense>}
                </div>
            </div>
        </div>
    )
}