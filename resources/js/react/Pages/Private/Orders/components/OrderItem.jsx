import { useJalaliDate } from "../../../../hooks"

export default function OrderItem({ service, title, status, status_info, created_at, due_date }) {
    return (
        <div>
            <div className="order-title">
                {/* <i className={service.icon_class}></i> */}
                <img src={APP_PATH + 'images/brand.svg'} />
                <h4>{service.title}</h4>
            </div>
            <ul className="order-details">
                <li>وضعیت: <span>{status}</span></li>
                <li>{status_info}</li>
                <li>تاریخ ثبت سفارش: <span>{useJalaliDate(created_at).format("jYYYY/jMM/jDD")}</span></li>
                {due_date && <li>تاریخ پایان پروژه: <span>{useJalaliDate(due_date).format("jYYYY/jMM/jDD")}</span></li>}
            </ul>
            {/* TODO BACKEND AND FRONTEND */}
            <span className={status}>در حال انجام</span>
        </div>
    )
};