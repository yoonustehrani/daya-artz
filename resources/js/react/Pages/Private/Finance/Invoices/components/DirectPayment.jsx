import { useState } from "react"

export default function DirectPayment() {
    const [transactionCode, setTransactionCode] = useState(null)
    const sendForm = () => {
        console.log('here the req will be sent');
    }
    const numberStyles = { display: 'inline-block', direction: 'ltr' }
    return (
        <>
            <p>به منظور پرداخت هزینه از طریق واریز وجه به حساب، می توانید از شماره حساب زیر استفاه کرده و پس از اتمام عملیات پرداخت اطلاعات فیش واریزی را در کادر زیر وارد نمایید و بر بروی دکمه ثبت واریز کلیک نمایید.</p>
            <ul className="popup-list">
                <li><i className="far fa-university"></i>نزد : <span>بانک ملت</span></li>
                <li><i className="far fa-building"></i>به نام: <span>ارمغان کهکشان پارس</span></li>
                <li><i className="far fa-credit-card-front"></i>شماره کارت: <span style={numberStyles}>6104 - 3388 - 0004 - 6282</span></li>
                <li><i className="far fa-globe"></i>شماره شبا: <span style={numberStyles}>IR 17 0120 0000 0000 9546 6188 31</span></li>
                <li><i className="far fa-money-check-alt"></i>شماره حساب: <span style={numberStyles}>9546618831</span></li>
            </ul>
            <div className="input-group mt-4">
                <div className="input-group-prepend"><span className="input-group-text">شناسه واریز</span></div>
                <input type="text" className="form-control" placeholder="مثال: 32963476075360" onChange={(e) => setTransactionCode(e.target.value)} />
            </div>
            <div className="w-100 text-center mt-4">
                <a href="#check_transaction" className="btn btn-lg btn-light" onClick={sendForm}>استعلام</a>    
            </div>
        </>
    )
}