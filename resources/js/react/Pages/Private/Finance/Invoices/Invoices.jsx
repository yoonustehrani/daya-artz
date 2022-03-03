import { useEffect } from 'react';
import { useState } from 'react';
import { useHistory } from 'react-router-dom';
import LoaderComponent from '../../../../components/LoaderComponent';
import { useHttpService, useJalaliDate } from '../../../../hooks';
import Title from '../../Layout/components/Title';

function Invoices({location}) {
    const title = `${location.search ? '' : 'پیش '}فاکتور ها`
    const http = useHttpService("/userarea")
    const [invoices, setInvoices] = useState([])
    const [loading, setLoading] = useState(true)
    let history = useHistory()
    let handleNavigation = invoiceId => history.push(`/finance/invoices/${invoiceId}`)
    useEffect(() => {
        async function getInvoices() {
            let params = location.search ? {params: {active: true}} : {}
            const response = await http.get('/invoices', params)
            if (response.data) {
                setInvoices(response.data)
                setLoading(false)
                document.title = title
            }
        }
        getInvoices()
    }, [location.search])
    return loading ? <LoaderComponent /> : (
        <>
            <Title text={title}/>
            <table className="table table-striped table-responsive table-bordered userarea-table">
                <thead>
                    <tr>
                        <th><i className="fas fa-hashtag"></i></th>
                        <th>مبلغ (تومان)</th>
                        <th>عنوان</th>
                        <th>وضعیت</th>
                        <th>تاریخ ایجاد</th>
                    </tr>
                </thead>
                <tbody>
                {invoices.map((invoice, i) => (
                    <tr className='cursor-pointer' onClick={() => handleNavigation(invoice.id)} key={invoice.id}>
                        <td>{i + 1}</td>
                        <td>{Number(invoice.amount).toLocaleString('en-US')}</td>
                        <td>{invoice.title}</td>
                        <td>
                            {
                                invoice.paid_at ? 
                                'پرداخت شده' :
                                'پرداخت نشده'
                            }
                        </td>
                        <td>{useJalaliDate(invoice.created_at).format('jYYYY/jM/jD HH:mm:ss')}</td>
                    </tr>
                ))}
                </tbody>
            </table>
        </>
    );
}

export default Invoices;