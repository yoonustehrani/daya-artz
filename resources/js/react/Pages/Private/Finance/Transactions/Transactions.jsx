import { useEffect, useState } from "react";
import { useHttpService } from '../../../../hooks';

function Transactions(props) {
    const http = useHttpService("/userarea")
    const [transactions, setTransactions] = useState([])
    useEffect(() => {
        async function getTransactions() {
            const response = await http.get('/transactions');
            if (response.data) {
                setTransactions(response.data)
            }
        }
        getTransactions()
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
            {transactions.map((transaction, i) => (
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

export default Transactions;