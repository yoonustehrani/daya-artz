import React, { Component } from 'react';
import { connect } from 'react-redux';
import LoaderComponent from '../../../../components/LoaderComponent';
import { useHttpService, useJalaliDate } from '../../../../hooks';
import { number_format } from '../../../../../helpers';
// custom components
const Bills = React.lazy(() => import('./components/Bills'))
const PaymentMethod = React.lazy(() => import ('./components/PaymentMethod'))

class Invoice extends Component {
    constructor(props) {
        super(props)
        this.state = {
            invoice: null,
            order: null,
            loading: true
        }
        this.http = useHttpService('/userarea/')
    }
    loadInvoice = async () => {
        let {invoiceId} = this.props.params
        const response = await this.http.get(`invoices/${invoiceId}`)
        if (response.okay) {
            let { order, invoice } = response
            let subtotal = 0
            order.items.forEach(item => {
                subtotal += item.total - item.off
                return item
            })
            document.title = `${invoice.active ? ' ' : 'پیش '}فاکتور شماره ${invoice.id}`
            this.setState({
                invoice : {...invoice, calc: {subtotal}},
                order: order,
                loading: false
            })
        }
    }
    componentDidMount() {
        this.loadInvoice()
    }
    render() {
        let { user, company } = this.props
        let { invoice, order, loading } = this.state
        return loading ? <LoaderComponent /> : (
            <div className='factor-container p-3 p-md-4 '>
                <div className="factor-first-section">
                    {/* <span className="factor-date mb-3">9 آذر 1400</span> */}
                    <div>
                        <ul>
                            <li>
                            <span>
                            {invoice.active ? ' ' :'پیش '} فاکتور برای :</span> آقا / خانم {user.lastname}</li>
                            {company && (
                                <>
                                    <li><span>نام شرکت:</span> {[company.title, company.title_en].join(' - ')}</li>
                                    <li><span>آدرس شرکت:</span> خیابان سجاد - سجاد 21 - پلاک 124</li>
                                </>
                            )}
                            <li className='contact-info'>{user.email}</li>
                            <li className='contact-info'>{user.phone_number}</li>
                        </ul>
                        <ul>
                            <li><span>شماره فاکتور:</span>{invoice.id}</li>
                            <li><span>شماره سفارش:</span>{order.code}</li>
                            <li><span>تاریخ فاکتور:</span>{useJalaliDate(invoice.created_at).format('jYYYY/jMM/jDD')}</li>
                            {/* <li className='alert alert-danger'>مبلغ سر رسید: {invoice} تومان</li> */}
                        </ul>
                    </div>
                </div>
                <div className="float-left w-100 table-responsive mt-4">
                    <h3 className='factor-section-title'>آیتم های سفارش</h3>
                    <table className="table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان سفارش</th>
                                <th>قیمت</th>
                                <th>تخفیف</th>
                                <th>مبلغ نهایی</th>
                            </tr>
                        </thead>
                        <tbody>
                            {order && order.items.map((item, i) => (
                                <tr key={item.id}>
                                    <th>{i + 1}</th>
                                    <th scope='row'>{item.title}</th>
                                    <td>{number_format(item.total, true)}</td>
                                    <td>{number_format(item.off, true)}</td>
                                    <td>{number_format(item.total - item.off, true)}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
                <div className="float-left w-100 table-responsive factor-info mt-4">
                    <h3 className='factor-section-title'>هزینه کلی</h3>
                    <table className="table">
                        <tbody>
                            <tr>
                                <th scope='row'>مبلغ کل سفارش</th>
                                <td>{number_format(invoice.calc.subtotal, true)}</td>
                            </tr> 
                            {/* <tr>
                                <th scope='row'>مالیات</th>
                                <td>0</td>
                            </tr> */}
                            {/* <tr>
                                <th scope='row'>تخفیف</th>
                                <td>500,000 تومان</td>
                            </tr> */}
                            <tr>
                                <th scope='row'>قابل پرداخت</th>
                                <td>{number_format(invoice.calc.subtotal, true)}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {
                    invoice.active && invoice.bills ? (
                        <React.Suspense fallback={<LoaderComponent />}>
                            <Bills bills={invoice.bills}/>
                        </React.Suspense>
                    )
                    : (
                        <React.Suspense fallback={<LoaderComponent />}>
                            <PaymentMethod invoice={invoice} onActive={newInvoice => this.setState(prev => ({invoice: {...prev.invoice, ...newInvoice}}))}/>
                        </React.Suspense>
                    )
                }
                {/* <div className='float-left alert alert-light text-center mt-5 horizontal-center-left'>مهلت پرداخت تسویه فاکتور شما به شماره {invoice.id}، تا تاریخ 1400/12/34 میباشد.</div> */}
            </div>
        );
    }
}

const mapStateToProps = state => ({
    user: state.auth.user,
    company: state.user.company
})

export default connect(mapStateToProps)(Invoice);