import { useHistory } from 'react-router-dom';
import ServiceOrderItem from './ServiceOrdertem';
import { useJalaliDate } from '../../../../hooks';

const OrderContainer = ({items, created_at, id}) => {
    let history = useHistory()
    let date = useJalaliDate(created_at)
    return (
        <div className="order-box-bg">
            <div className='order-box'>
                <span className="order-date">{date.format("jYYYY/jMM/jDD")}</span>
                <div className="service-order-items-container">
                    {items.map(item => <ServiceOrderItem {...item} key={item.id} />)}
                </div>
                <div className="w-100 text-center mt-3"><button className="btn btn-light" onClick={() => history.push(`/orders/${id}`)}>اطلاعات بیشتر</button></div>
            </div>
        </div>
    );
}

export default OrderContainer;