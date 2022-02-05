import React, { Component, useState } from 'react';
import AlertService from '../../../../../services/AlertService';
import { useHttpService } from '../../../../hooks'

class Discounts extends Component {
    constructor(props) {
        super(props)
        this.state = {
            offers: [],
            next_page: null,
            loading: true,
        }
        this.http = useHttpService('/userarea')
    }
    componentDidMount() {
        this.loadOffers()
    }
    loadOffers = async () => {
        const response = await this.http.get('/offers')
        if (! response.error) {
            this.setState(prevState => ({
                offers: [...prevState.offers, ...response.data],
                next_page: response.next_page,
                loading: false
            }))
        }
        // console.log(response);
    }
    copyToClipboard(code) {
        navigator.permissions.query({name: "clipboard-write"}).then(result => {
            if (result.state == "granted" || result.state == "prompt") {
                navigator.clipboard.writeText(code).then(function() {
                    (new AlertService).success({timer: 2000, title: 'کد تخفیف در حافظه موقت کپی شد'})
                }, () => {
                    (new AlertService).error({timer: 2000, title: 'متاسفانه در هنگام کپی مشکلی پیش آمد'})
                });
            }
        });
    }
    getOfferValue(offer) {
        return offer.value_type === 'amount' ? `${offer.value} تومان` : `${offer.value}%`;
    }
    render() {
        return (
            <div className='discount-container'>
                {this.state.offers.map(discount => {
                    return (
                        <div key={discount.id} className='p-0 discount-item rounded-lg'>
                            <div className="w-100 p-2 text-white">
                                <img src={APP_PATH + 'images/discount-icon.png'}/>
                                <p className='shadowed-text'>{discount.title}</p>
                                <p>{this.getOfferValue(discount)}</p>
                                <p className='shadowed-text'>{discount.description}</p>
                                <span onClick={() => this.copyToClipboard(discount.code)} className="cursor-pointer w-50 badge bg-pink p-2 rounded-pill bold ltr">
                                    <i className="fas fa-copy mr-2"></i>{discount.code}
                                </span>
                            </div>
                        </div>
                    )
                })}
            </div>
        );
    }
}

export default Discounts;