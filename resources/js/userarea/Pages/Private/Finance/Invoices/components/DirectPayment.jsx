import { useEffect, useLayoutEffect, useState } from "react"
import copyToClipboard from '../../../../../../components/copy'
import validator from "validator";
import AlertService from "../../../../../../services/AlertService";
import '../../../../../../components/datepicker'
import { number_format } from "../../../../../../helpers";

export default function DirectPayment({amount, pay}) {
    const [transactionDate, setTransactionDate] = useState(""),
    [enDate, setEnDate] = useState(""),
    [transactionCode, setTransactionCode] = useState(""),
    [fourDigits, setForDigits] = useState(""),
    [disabled, disable] = useState(false),
    ba_card = '6104 - 3388 - 0004 - 6282',
    ba_shaba = 'IR-17 0120 0000 0000 9546 6188 31',
    ba_hesab = "9546618831",
    errs = [],
    sendForm = async () => {
        validator.isNumeric(transactionCode) && validator.isLength(transactionCode, {min: 5, max: 20}) ? null : errs.push("شماره پیگیری تراکنش نامعتبر است")
        validator.isNumeric(fourDigits) && fourDigits.length === 4 || fourDigits.length === 0 ? null : errs.push("لطفا 4 رقم آخر کارت خود را به درستی وارد کنید")
        validator.isDate(enDate) ? null : errs.push("تاریخ انجام تراکنش نا معتبر است")
        if (errs.length) {
            (new AlertService).error({title: "ورودی نادرست", html: `${errs.map(err => ("<br/>" + err))}`, confirmButtonText: "بستن"})
        } else {
            let okay = await pay({
                transaction_code: transactionCode,
                transaction_date: transactionDate,
                four_digits: fourDigits
            });
            if (okay) {
                [setTransactionDate, setTransactionCode, setForDigits].map(method => {
                    method("")
                })
                disable(true)
            }
        }
    },
    handleValidate = {
        trCode: (e, clb) => {
            (validator.isNumeric(e.target.value.trim()) && validator.isLength(e.target.value, {min: 0, max: 20})) || e.target.value.trim().length === 0 ? clb() : e.preventDefault();
        },
        trFour: (e, clb) => {
            (validator.isNumeric(e.target.value.trim()) && e.target.value.trim().length <= 4) || e.target.value.trim().length === 0 ? clb() : e.preventDefault()
        },
        trDate: (value, clb) =>  {
            validator.isDate(value) ? clb() : null
        }
    }

    useEffect(() => {
        $("#trDate").persianDatepicker({
            onSelect: (unix) => {
                handleValidate.trDate(new Date(unix), () => {
                    setTransactionDate(new persianDate(unix).format('YYYY/MM/DD HH:mm:ss'))
                    setEnDate(new Date(unix))
                })
            },
            initialValue: false,
            observer: true,
            format: 'YYYY/MM/DD HH:mm:ss',
            altFormat: 'YYYY/MM/DD HH:mm:ss',
            calendar:{
                persian: {
                    leapYearMode: 'astronomical',
                },
            },
            timePicker: {
                enabled: true
            }
        })
    }, [])
    return (
        <>
            <p>به منظور پرداخت هزینه از طریق واریز وجه به حساب، می توانید از شماره حساب زیر استفاه کرده و پس از اتمام عملیات پرداخت اطلاعات فیش واریزی را در کادر زیر وارد نمایید و بر بروی دکمه ثبت واریز کلیک نمایید.</p>
            <ul className="popup-list">
                <li><i className="fad fa-coins"></i>مبلغ: <span>{number_format(amount, true)}</span></li>
                <li><i className="far fa-university"></i>نزد : <span>بانک ملت</span></li>
                <li><i className="far fa-building"></i>به نام: <span>ارمغان کهکشان پارس</span></li>
                <li><i className="fad fa-credit-card-front"></i>شماره کارت: <span>{ba_card}</span><a href="#" className="vertical-middle badge badge-pill badge-light mr-1" onClick={() => copyToClipboard("6104338800046282", "شماره حساب")}>کپی</a></li>
                <li><i className="far fa-money-check-edit-alt"></i>شماره شبا: <span>{ba_shaba}</span><a href="#" className="vertical-middle badge badge-pill badge-light mr-1" onClick={() => copyToClipboard("170120000000009546618831", "شماره شبا")}>کپی</a></li>
                <li><i className="far fa-money-check-alt"></i>شماره حساب: <span className="inline-block ltr">{ba_hesab}</span><a href="#" className="vertical-middle badge badge-pill badge-light mr-1" onClick={() => copyToClipboard(ba_hesab, "شماره حساب")}>کپی</a></li>
            </ul>
            <div className="input-group mt-4">
                <div className="input-group-append"><span className="input-group-text">تاریخ پرداخت <i className="text-danger fas fa-star-of-life mr-1 mb-2 font-10"></i></span></div>
                <input type="text" disabled={disabled} id="trDate" className="form-control" placeholder="تاریخ و ساعت دقیق تراکنش را انتخاب کنید" value={transactionDate} onChange={() => {}} />
            </div>
            <div className="input-group mt-4">
                <div className="input-group-append"><span className="input-group-text">شماره پیگیری <i className="text-danger fas fa-star-of-life mr-1 mb-2 font-10"></i></span></div>
                <input type="text" disabled={disabled} className="form-control" placeholder="شماره پیگیری را وارد کنید (اجباری)" value={transactionCode} onChange={(e) => handleValidate.trCode(e, () => setTransactionCode(e.target.value.trim()))} />
            </div>
            <div className="input-group mt-4">
                <div className="input-group-append"><span className="input-group-text">4 رقم آخر کارت</span></div>
                <input type="text" disabled={disabled} className="form-control" placeholder="در صورت کارت به کارت 4 رقم آخر را وارد نمایید" value={fourDigits} onChange={(e) => handleValidate.trFour(e, () => setForDigits(e.target.value.trim()))} />
            </div>
            <div className="w-100 text-center mt-4">
                <a href="#check_transaction" className="btn btn-lg btn-light" onClick={sendForm}>ثبت واریز</a>    
            </div>
        </>
    )
}