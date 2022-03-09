import React, { useStatem, lazy, useState } from "react"
import LoaderComponent from "../../../../../components/LoaderComponent"
import { useHttpService } from '../../../../../hooks'
const OnlinePayment = lazy(() => import('./OnlinePayment'))
const DirectPayment = lazy(() => import('./DirectPayment'))

export default function PaymentPopup({close, id, amount}) {
    const [payMethod, setPayMethod] = useState("online")
    const onClose = (e) => {
        if (!$(e.target).closest("#popup-box").length) {
            close()
        }
    }
    async function payOnline(method) {
        const http = useHttpService(`/userarea/bills/${id}/`)
        const response = await http.post(`pay/${method}`)
        if (response.okay) {
            let {gateway} = response
            window.location.href = gateway
        }
    }
    return (
        <div className="popup-container" onClick={onClose}>
            <div className="popup-box alert-light animated fadeInDown" id="popup-box">
                <div className="popup-header-tab">
                    <a href="#online_payment" className={payMethod === "online" ? "active" : null} onClick={() => setPayMethod("online")}>
                        <span >پرداخت به صورت آنلاین</span>
                    </a>
                    <a href="#directpayment" className={payMethod === "direct" ? "active" : null} onClick={() => setPayMethod("direct")}>
                        <span>پرداخت از طریق واریز به حساب</span>
                    </a>
                </div>
                <div className="popup-content">
                    {payMethod === "online" && <React.Suspense fallback={<LoaderComponent/>}><OnlinePayment amount={amount} pay={payOnline}/></React.Suspense>}
                    {payMethod === "direct" && <React.Suspense fallback={<LoaderComponent/>}><DirectPayment/></React.Suspense>}
                </div>
            </div>
        </div>
    )
}