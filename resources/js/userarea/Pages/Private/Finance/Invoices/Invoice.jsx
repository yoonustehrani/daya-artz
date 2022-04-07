import React, { Component } from 'react';
import { connect } from 'react-redux';
import LoaderComponent from '../../../../components/LoaderComponent';
import { useHttpService, useJalaliDate } from '../../../../hooks';
import { number_format } from '../../../../../helpers';
// custom components
import Bills from'./components/Bills';
import PaymentMethod from './components/PaymentMethod';

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
            document.title = `${invoice.active ? ' ' : 'پیش '}فاکتور شماره ${invoice.id}`
            invoice.calculate_off = total => {
                let {offer} = invoice
                if (offer) {
                    if (offer.value_type === 'percentage') {
                        return (total / 100) * offer.value
                    }
                    return offer.value
                }
                return 0
            }
            let total = 0
            order.items.forEach(item => {
                item.amount = item.total - item.off
                total += item.amount
                return item
            })
            let total_off = invoice.multipay ? 0 : invoice.calculate_off(total),
                final = total - total_off
            this.setState({
                invoice : {
                    ...invoice,
                    calc: {
                        total,
                        total_off,
                        final,
                        total_tax: (final / 100) * 9,
                    }
                },
                order: order,
                loading: false
            })
        }
    }
    activateInvoice = newInvoice => {
        this.setState(prev => ({
            invoice: {
                ...prev.invoice,
                ...newInvoice
            },
            loading: false
        }))
    }
    setMultiPay = boolean => {
        this.setState(prev => ({
            invoice: {
                ...prev.invoice,
                multipay: boolean
            }
        }))
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
                                <th>مجموع نهایی</th>
                            </tr>
                        </thead>
                        <tbody>
                            {order && order.items.map((item, i) => (
                                <tr key={item.id}>
                                    <th>{i + 1}</th>
                                    <th scope='row'>{item.title}</th>
                                    <td>{number_format(item.total, true)}</td>
                                    <td>{number_format(item.off, true)}</td>
                                    <td>{number_format(item.amount, true)}</td>
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
                                <th scope='row'>جمع کل</th>
                                <td>{number_format(invoice.calc.total, true)}</td>
                            </tr>
                            <tr>
                                <th scope='row'>تخفیف فاکتور</th>
                                <td>
                                    {invoice.multipay ? <span className='text-danger'>در روش پرداخت جزئی تخفیف کلی اعمال نمی شود.</span> : number_format(invoice.calc.total_off, true)}
                                </td>
                            </tr>
                            <tr>
                                <th scope='row'>جمع کل پس از کسر تخفیف</th>
                                <td>{number_format(invoice.calc.final, true)}</td>
                            </tr>
                            <tr>
                                <th scope='row'>9% مالیات ارزش افزوده</th>
                                <td>{number_format(invoice.calc.total_tax, true)}</td>
                            </tr>
                            <tr>
                                <th scope='row'>قابل پرداخت</th>
                                <td>{number_format(invoice.calc.final + invoice.calc.total_tax, true)}</td>
                            </tr>
                            <tr>
                                <th scope='row'>روش پرداختی</th>
                                <td>{invoice.multipay ? 
                                'جزئی' :
                                'کلی'
                                }</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {invoice.active && invoice.bills 
                    ? <Bills bills={invoice.bills}/>
                    : <PaymentMethod invoice={invoice} setMultiPay={this.setMultiPay} onActive={this.activateInvoice}/>
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