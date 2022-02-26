import { useJalaliDate } from "../../../../hooks"

export default function OrderItem({ filter, service, title, status, statusName, status_info, created_at, due_date }) {
    return (
        <div className={filter !== "all" && filter !== status ? "d-none" : ""}>
            <div className="order-title">
                <span className="back-aqua order-item-icon"><i className={service.icon_class}></i></span>
                <div>
                    <h4 className="order-item-title">{service.title}</h4>
                    <span className="order-item-subtitle">{service.subtitle}</span>
                </div>
            </div>
            <ul className="order-details">
                <li>عنوان سفارش: <span>{title}</span></li>
                <li>توضیحات: <p>{status_info}</p></li>
                <li>تاریخ ثبت سفارش: <span>{useJalaliDate(created_at).format("jYYYY/jMM/jDD")}</span></li>
                {due_date && <li>تاریخ پایان پروژه: <span>{useJalaliDate(due_date).format("jYYYY/jMM/jDD")}</span></li>}
            </ul>
            <span className={status}>{statusName}</span>
        </div>
    )
};