export default function ServiceOrderItem({service}) {
    let {icon_class, title} = service
    return (
        <div className='service-order-item square'>
            <div>
                <span className="back-aqua service-order-item-icon"><i className={icon_class}></i></span>
                <p className="service-order-item-title">{title}</p>
            </div>
        </div>
    )
}