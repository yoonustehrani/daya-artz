import { Link } from 'react-router-dom';
import ServiceOrderItem from './ServiceOrdertem';
import { useJalaliDate } from '../../../../hooks';
import { translate } from '../../../../../helpers';

const OrderContainer = ({items, created_at, id, code, method, status, type}) => {
    let date = useJalaliDate(created_at)
    return (
        <div className="order-box-bg">
            <div className='order-box'>
                <span className="order-date">{date.format("jYYYY/jMM/jDD")}</span>
                <ul className="order-box-detail">
                    <li><i className='fab fa-slack-hash'></i>کد سفارش: <span>{code}</span></li>
                    <li><i className='far fa-hand-pointer'></i>شیوه ثبت: <span>{method}</span></li>
                    <li><i className='far fa-cog'></i>نوع سفارش: <span>{translate(type)}</span></li>
                    <li><i className='far fa-clipboard-list-check'></i>وضعیت: <span>{translate(status)}</span></li>
                </ul>
                <div className="service-order-items-container">
                    {items.map(item => (
                        <Link key={item.id} to={`/orders/${id}/items/${item.id}`}>
                            <ServiceOrderItem {...item} />
                        </Link>
                    ))}
                </div>
                <div className="w-100 text-center mt-3">
                    <Link to={`/orders/${id}`} className="btn btn-outline-light">اطلاعات بیشتر</Link>
                </div>
            </div>
        </div>
    );
}

export default OrderContainer;