import React, { useState } from "react"
import { useHttpService } from '../../../../../hooks'
import OnlinePayment from './OnlinePayment'
import DirectPayment from './DirectPayment'

export default function PaymentPopup({close, id, amount}) {
    const methods = {
        online: 'پرداخت به صورت آنلاین',
        direct: 'پرداخت از طریق واریز به حساب'
    }
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
                    {Object.entries(methods).map(([name, title]) => (
                        <span key={name} className={`cursor-pointer ${payMethod === name ? "active" : ''}`} onClick={() => setPayMethod(name)}>
                            <span>{title}</span>
                        </span>
                    ))}
                </div>
                <div className="popup-content">
                    {payMethod === "online" && <OnlinePayment amount={amount} pay={payOnline}/>}
                    {payMethod === "direct" && <DirectPayment amount={amount}/>}
                </div>
            </div>
        </div>
    )
}