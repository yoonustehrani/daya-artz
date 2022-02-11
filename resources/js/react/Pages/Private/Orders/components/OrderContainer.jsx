import { Link } from 'react-router-dom';
import ServiceOrderItem from './ServiceOrdertem';
import { useJalaliDate } from '../../../../hooks';

const OrderContainer = ({items, created_at, id}) => {
    let date = useJalaliDate(created_at)
    return (
        <div className="order-box-bg">
            <div className='order-box'>
                <span className="order-date">{date.format("jYYYY/jMM/jDD")}</span>
                <div className="service-order-items-container">
                    {items.map(item => (
                        <Link key={item.id} to={`/orders/${id}/items/${item.id}`}>
                            <ServiceOrderItem {...item} />
                        </Link>
                    ))}
                </div>
                <div className="w-100 text-center mt-3">
                    <Link to={`/orders/${id}`} className="btn btn-light">اطلاعات بیشتر</Link>
                </div>
            </div>
        </div>
    );
}

export default OrderContainer;