import { useEffect, useState } from "react";
import { useHttpService, useJalaliDate } from '../../../../hooks';
import NoItem from '../../Layout/components/NoItem'
import LoaderComponent from "../../../../components/LoaderComponent";
import Title from "../../Layout/components/Title";

function Transactions(props) {
    const title = "لیست تراکنش ها"
    const http = useHttpService("/userarea")
    const [transactions, setTransactions] = useState([])
    const [loading, setLoading] = useState(true)
    const classes = {
        verified: 'fas fa-check text-success',
        canceled: 'fas fa-times text-danger',
        approved: 'fas fa-check text-secondary',
        pending: 'fas fa-spinner text-info'
    }
    useEffect(() => {
        async function getTransactions() {
            const response = await http.get('/transactions');
            if (response.data) {
                setTransactions(response.data)
                setLoading(false)
                document.title = title
            }
        }
        getTransactions()
    }, [])
    if (loading) {
        return <LoaderComponent />
    }
    return transactions.length === 0 ? <NoItem /> : (
        <>
            <Title text={title} />
            <div className="table-responsive userarea-table">
                <table className="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><i className="fas fa-hashtag"></i></th>
                            <th>مبلغ (تومان)</th>
                            <th>بابت</th>
                            <th colSpan={2}>وضعیت</th>
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
                            <td>{transaction.status_fa}</td>
                            <td><i className={classes[transaction.status]}></i></td>
                            <td>{transaction.provider_fa}</td>
                            <td>{useJalaliDate(transaction.updated_at).format()}</td>
                            <td>{useJalaliDate(transaction.created_at).format()}</td>
                        </tr>
                    ))}
                    </tbody>
                </table>
            </div>
        </>
        
    );
}

export default Transactions;