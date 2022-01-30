const TicketTopNav = ({tracking_code, title, department, status}) => {
    return (
        <div className="ticket-top-nav">
            <h4>عنوان: <span>{title}</span></h4>
            <h4>بخش مربوطه: <span>{department.name}</span></h4>
            <h4>شماره تیکت: <span>{tracking_code}</span></h4>
            <h4>وضعیت:‌ <span>{status}</span></h4>
        </div>
    );
}

export default TicketTopNav;