import { useState } from "react"
import copyToClipboard from '../../../../../../components/copy'

export default function DirectPayment() {
    const [transactionCode, setTransactionCode] = useState(null),
    ba_card = '6104 - 3388 - 0004 - 6282',
    ba_shaba = 'IR-17 0120 0000 0000 9546 6188 31',
    ba_hesab = "9546618831"
    sendForm = () => {
        console.log('here the req will be sent');
    }
    const numberStyles = { display: 'inline-block', direction: 'ltr' }
    return (
        <>
            <p>به منظور پرداخت هزینه از طریق واریز وجه به حساب، می توانید از شماره حساب زیر استفاه کرده و پس از اتمام عملیات پرداخت اطلاعات فیش واریزی را در کادر زیر وارد نمایید و بر بروی دکمه ثبت واریز کلیک نمایید.</p>
            <ul className="popup-list">
                <li><i className="far fa-university"></i>نزد : <span>بانک ملت</span></li>
                <li><i className="far fa-building"></i>به نام: <span>ارمغان کهکشان پارس</span></li>
                <li><i className="fad fa-credit-card-front"></i>شماره کارت: <span>{ba_card}</span><a href="#" className="vertical-middle badge badge-pill badge-light mr-1" onClick={() => copyToClipboard("6104338800046282", "شماره حساب")}>کپی</a></li>
                <li><i className="far fa-money-check-edit-alt"></i>شماره شبا: <span>{ba_shaba}</span><a href="#" className="vertical-middle badge badge-pill badge-light mr-1" onClick={() => copyToClipboard("170120000000009546618831", "شماره شبا")}>کپی</a></li>
                <li><i className="far fa-money-check-alt"></i>شماره حساب: <span style={numberStyles}>{ba_hesab}</span><a href="#" className="vertical-middle badge badge-pill badge-light mr-1" onClick={() => copyToClipboard(ba_hesab, "شماره حساب")}>کپی</a></li>
            </ul>
            <div className="input-group mt-4">
                <div className="input-group-prepend"><span className="input-group-text">شناسه واریز</span></div>
                <input type="text" className="form-control" placeholder="مثال: 32963476075360" onChange={(e) => setTransactionCode(e.target.value)} />
            </div>
            <div className="w-100 text-center mt-4">
                <a href="#check_transaction" className="btn btn-lg btn-light" onClick={sendForm}>ثبت واریز</a>    
            </div>
        </>
    )
}