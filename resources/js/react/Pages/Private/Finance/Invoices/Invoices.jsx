import { useEffect } from 'react';
import { useState } from 'react';
import { Link } from 'react-router-dom';
import { useHttpService } from '../../../../hooks';

function Invoices(props) {
    const http = useHttpService("/userarea")
    const [invoices, setInvoices] = useState([])
    useEffect(() => {
        async function getInvoices() {
            const response = await http.get('/invoices');
            if (response.data) {
                setInvoices(response.data)
            }
        }
        getInvoices()
    }, [])
    return (
        <table className="table table-striped table-responsive table-bordered userarea-table">
            <thead>
                <tr>
                    <th><i className="fas fa-hashtag"></i></th>
                    <th>مبلغ (تومان)</th>
                    <th>بابت</th>
                    <th>وضعیت</th>
                    <th>دروازه پرداختی</th>
                    <th>آخرین تغییر وضعیت</th>
                    <th>تاریخ ایجاد</th>
                </tr>
            </thead>
            <tbody>
            {invoices.map((transaction, i) => (
                <tr key={transaction.id}>
                    <td>{i + 1}</td>
                    <td>{Number(transaction.amount).toLocaleString('en-US')}</td>
                    <td>{transaction.bill.title}</td>
                    <td>{transaction.status}</td>
                    <td>{transaction.provider}</td>
                    <td>{transaction.updated_at}</td>
                    <td>{transaction.created_at}</td>
                </tr>
            ))}
            </tbody>
        </table>
    );
}

export default Invoices;