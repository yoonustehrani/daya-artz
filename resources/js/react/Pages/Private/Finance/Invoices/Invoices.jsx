import { useEffect } from 'react';
import { useState } from 'react';
import { useHistory, useLocation } from 'react-router-dom';
import LoaderComponent from '../../../../components/LoaderComponent';
import { useHttpService, useJalaliDate } from '../../../../hooks';
import Title from '../../Layout/components/Title';
import NoItem from '../../Layout/components/NoItem';
import Paginate from '../../../../../components/Paginate';

function Invoices({location, history}) {
    const title = `${location.search ? '' : 'پیش '}فاکتور ها`
    const http = useHttpService("/userarea/invoices")
    const [invoices, setInvoices] = useState([])
    const [paginateInfo, setPaginateInfo] = useState({})
    const [loading, setLoading] = useState(true)
    let final = !! location.search
    let handleNavigation = invoiceId => history.push(`/finance/invoices/${invoiceId}`)
    async function getInvoices(customUrl=null) {
        setLoading(true)
        let params = final ? {params: {active: true, }} : {}
        const response = await http.get(customUrl ?? '', customUrl === null && params), { current_page, next_page_url, prev_page_url } = response
        if (response.data) {
            setInvoices(response.data)
            setPaginateInfo({current_page, next_page_url, prev_page_url})
            setLoading(false)
            document.title = title
        }
    }
    let handlePaginate = (next = true) => {
        let {next_page_url, prev_page_url} = paginateInfo, url = next ? next_page_url : prev_page_url
        getInvoices(url)
    }
    useEffect(() => {
        getInvoices()
    }, [location.search])
    return loading ? <LoaderComponent /> : (
        <>
            <Title text={title}/>
            {! loading && invoices.length > 0 ? (<>
                <div className='table-responsive userarea-table'>
                    <table className="table table-striped table-bordered table-hover">
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
                                <td>{(Number(paginateInfo.current_page) - 1) * 10 + (i + 1)}</td>
                                <td>{invoice.total ? invoice.total.toLocaleString('en-US') : '---' }</td>
                                <td>{invoice.title}</td>
                                {
                                    final ? (
                                        <td>
                                            {
                                                invoice.paid_at ? 
                                                'پرداخت شده' :
                                                'پرداخت نشده'
                                            }
                                        </td>
                                    ) : (
                                        <td>پیش فاکتور</td>
                                    )
                                }
                                <td>{useJalaliDate(invoice.created_at).format('jYYYY/jM/jD HH:mm:ss')}</td>
                            </tr>
                        ))}
                        </tbody>
                    </table>
                </div>
                <Paginate {...paginateInfo} next_page_handler={handlePaginate} prev_page_handler={() => handlePaginate(false)} />
                </>) : <NoItem />
        }
        </>
    );
}

export default Invoices;