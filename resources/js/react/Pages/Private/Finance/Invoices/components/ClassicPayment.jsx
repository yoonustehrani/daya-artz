import { useState } from "react"

export default function ClassicPayment() {
    const [transactionCode, setTransactionCode] = useState(null)
    const sendForm = () => {
        console.log('here the req will be sent');
    }
    return (
        <>
            <p>به منظور پرداخت هزینه از طریق واریز وجه به حساب، می توانید از شماره حساب زیر استفاه کرده و پس از اتمام عملیات پرداخت اطلاعات فیش واریزی را در کادر زیر وارد نمایید و بر بروی دکمه استعلام کلیک نمایید.</p>
            <ul className="popup-list">
                <li><i className="fad fa-credit-card-front"></i>شماره حساب: <span>5022291078521463</span></li>
                <li><i className="far fa-money-check-edit-alt"></i>شماره شبا: <span>IR-3975024846780</span></li>
                <li><i className="far fa-user-tie"></i>به نام: <span>دانیال طهرانیم</span></li>
                <li><i className="far fa-university"></i>بانک مقصد: <span>بانک ملت</span></li>
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