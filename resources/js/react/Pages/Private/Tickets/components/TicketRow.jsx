import { Link } from 'react-router-dom';
import { useHistory } from 'react-router-dom'
import { useJalaliDate } from '../../../../hooks';

const TicketRow = function({ index, id, title,  status, tracking_code, created_at, department, closed_at }) {
    let history = useHistory()
    let handleNavigation = () => history.push(`/tickets/${id}`)
    return (
        <tr className='cursor-pointer' onClick={handleNavigation}>
            <th>{index}</th>
            <td>{title}</td>
            <td>{tracking_code}</td>
            <td>{status}{closed_at && <span><br />{useJalaliDate(closed_at).format('jYYYY/jM/jD HH:mm:ss')}</span>}</td>
            <td>{department.name}</td>
            <td className='ltr'>{useJalaliDate(created_at).format('jYYYY/jM/jD HH:mm:ss')}</td>
        </tr>
    )
}

export default TicketRow;