import { translate } from "../../../../../helpers"
import { useJalaliDate } from "../../../../hooks"
export default function OrderInfo ({ code, created_at, method, status, type }) {
    let date = useJalaliDate(created_at), formatedDate = date.format("jYYYY/jMM/jDD")
    return (
        <ul className="order-info-container">
            <li><i className='fab fa-slack-hash'></i>کد سفارش: <span>{code}</span></li>
            <li><i className='far fa-calendar-plus'></i>تاریخ ایجاد: <span>{formatedDate}</span></li>
            <li><i className='far fa-hand-pointer'></i>شیوه ثبت: <span>{method}</span></li>
            <li><i className='far fa-cog'></i>نوع سفارش: <span>{translate(type)}</span></li>
            <li><i className='far fa-clipboard-list-check'></i>وضعیت: <span>{translate(status)}</span></li>
        </ul>
    )
}