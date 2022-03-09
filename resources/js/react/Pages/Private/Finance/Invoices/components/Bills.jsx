import React, { useState, lazy } from "react";
import { number_format } from "../../../../../../helpers"
import LoaderComponent from "../../../../../components/LoaderComponent";
const PaymentPopup = React.lazy(() => import('./PaymentPopup'))

export default function Bills({bills}) {
    const [showPopup, setShowPopup] = useState(false)
    const [payable, setPayable] = useState(null)
    function select(bill) {
        setPayable(bill)
        setShowPopup(true)
    }
    return (
        <div className="float-left w-100 table-responsive mt-5">
            <h3 className="factor-section-title">وضعیت پرداختی</h3>
            <table className="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>شماره قبض</th>
                        <th>عنوان</th>
                        <th>مقدار</th>
                        <th>وضعیت پرداخت</th>
                    </tr>
                </thead>
                <tbody>
                {bills.length > 0 && bills.filter(x => x.active).map((bill, i) => {
                    let {id, code, title, amount, status, active, status_fa} = bill
                    return (
                        <tr key={id}>
                            <th>{i + 1}</th>
                            <td>{code}</td>
                            <td>{title}</td>
                            <td>{number_format(amount, true)}</td>
                            <td>{status_fa} {
                                status === 'paid'
                                ? <i className='far fa-check text-success'></i>
                                : <a href="#" className='btn btn-sm btn-primary' onClick={() => select(bill)}>پرداخت</a>
                            }</td>
                        </tr>
                    )
                })}
                </tbody>
            </table>
            {showPopup && payable && (
                <React.Suspense fallback={<LoaderComponent />}>
                    <PaymentPopup id={payable.id} amount={payable.amount} close={() => setShowPopup(false)} />
                </React.Suspense>
            )}
        </div>
    )
}