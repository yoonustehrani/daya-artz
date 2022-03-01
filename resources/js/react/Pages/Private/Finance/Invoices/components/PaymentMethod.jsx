import React, { Component } from 'react';

class PaymentMethod extends Component {
    state = {
        paymentMethod: 'all', // or all
        discountCode: ""
    }
    onChangeMethod = (method) => {
        this.setState({
            paymentMethod: method
        })
    }
    onChangeDiscount = (e) => {
        this.setState({
            discountCode: e.target.value
        })
    }
    onSubmit = () => {
        let { paymentMethod, discountCode }  = this.state
        console.log(paymentMethod, discountCode);
        // here tou can send the request
    }
    render() {
        let { paymentMethod } = this.state
        return (
            <div className='float-left w-100 mt-4'>
                <h3 className='factor-section-title'>انتخاب شیوه پرداخت</h3>
                <p className='payment-desc'><span>پرداخت به صورت کلی: </span>
                    در این شبوه شما مجموع هزینه سفارش خود را در یک تراکنش انجام می دهید
                </p>
                <p className='payment-desc'><span>پرداخت به صورت موردی: </span>
                    در این شیوه پرداخت هزینه سفارش به صورت جداگامه برای هر آیتم طراحی در سبد شما انجام می شود
                </p>
                <div className="payment-method-container">
                    <input type="radio" name="select" id="option-1" checked={paymentMethod === 'all'} onChange={this.onChangeMethod.bind(this, "all")} />
                    <input type="radio" name="select" id="option-2" checked={paymentMethod === "items"} onChange={this.onChangeMethod.bind(this, "items")} />
                    <label htmlFor="option-1" className="option option-1">
                        <span>به صورت کلی</span>
                        <div className="dot"></div>
                    </label>
                    <label htmlFor="option-2" className="option option-2">
                        <span>به صورت موردی</span>
                        <div className="dot"></div>
                    </label>
                    <div className="input-group">
                        <div className="input-group-prepend">
                            <span className="input-group-text">کد تخفیف</span>
                        </div>
                        <input type="text" className='form-control' placeholder='اینجا وارد کنید' onChange={this.onChangeDiscount.bind(this)} />
                    </div>
                </div>
                <div className='w-100 text-center mt-2'>
                    <button className='btn btn-lg btn-light px-5' onClick={this.onSubmit}>تایید</button>
                </div>
            </div>
        );
    }
}

export default PaymentMethod;