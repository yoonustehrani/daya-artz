import React, { Component } from 'react';

class Discounts extends Component {
    constructor(props) {
        super(props)
        this.state = {
            offers: [
                {
                    id: 1,
                    code: 'Javan2022'
                }
            ]
        }
    }
    copyToClipboard(code) {
        console.log(code);
    }
    render() {
        return (
            <>
                {this.state.offers.map(discount => {
                    return (
                        <div key={discount.id} className='col-lg-3 p-0 discount-item rounded-lg'>
                            <div className="w-100 p-2 text-white">
                                <img src={APP_PATH + 'images/discount-icon.png'}/>
                                <p className='shadowed-text'>5% تخفیف مشتری های خاص</p>
                                <p className='shadowed-text'>دانیال عزیز شما با استفاده از این کد<br />تخفیف میتونی از 5% درصد تخفیف<br />بر روی سفارش بعدیت استفاده کنی..</p>
                                <span onClick={() => this.copyToClipboard(discount.code)} className="cursor-pointer w-50 badge bg-pink p-2 rounded-pill bold ltr">
                                    <i className="fas fa-copy mr-2"></i>{discount.code}
                                </span>
                            </div>
                        </div>
                    )
                })}
            </>
        );
    }
}

export default Discounts;