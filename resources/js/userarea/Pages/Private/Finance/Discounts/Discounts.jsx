import React, { Component, useState } from 'react';
import copyToClipboard from '../../../../../components/copy';
import Paginate from '../../../../../components/Paginate';
import { useHttpService } from '../../../../hooks';
import Loading from '../../Layout/components/Loading';
import NoItem from '../../Layout/components/NoItem';

class Discounts extends Component {
    constructor(props) {
        super(props)
        this.state = {
            offers: [],
            next_page: null,
            loading: true,
            paginateInfo: {}
        }
        this.http = useHttpService('/userarea')
    }
    componentDidMount() {
        this.loadOffers()
    }
    loadOffers = (customUrl=null) => {
        this.setState({loading: true}, async () => {
            const response = await this.http.get(customUrl ?? '/offers'), { current_page, next_page_url, prev_page_url } = response
            if (! response.error) {
                this.setState(prevState => ({
                    offers: response.data,
                    paginateInfo: { current_page, next_page_url, prev_page_url },
                    loading: false
                }))
            }
        })
    }
    getOfferValue(offer) {
        return offer.value_type === 'amount' ? `${offer.value} تومان` : `${offer.value}%`;
    }
    handlePaginate = (next = true) => {
        let {next_page_url, prev_page_url} = this.state.paginateInfo, url = next ? next_page_url : prev_page_url
        this.loadOffers(url)
    }
    render() {
        let { loading, offers, paginateInfo } = this.state
        if (loading) return <Loading />
        return offers.length ? (<>
            <div className='discount-container'>
                {offers.map(discount => {
                    return (
                        <div key={discount.id} className='p-0 discount-item rounded-lg'>
                            <div className="w-100 p-2 text-white">
                                <img src={APP_PATH + 'images/discount-icon.png'}/>
                                <p className='shadowed-text'>{discount.title}</p>
                                <p>{this.getOfferValue(discount)}</p>
                                <p className='shadowed-text'>{discount.description}</p>
                                <span onClick={() => this.copyToClipboard(discount.code, "کد تخفیف")} className="cursor-pointer w-50 badge bg-pink p-2 rounded-pill bold ltr">
                                    <i className="fas fa-copy mr-2"></i>{discount.code}
                                </span>
                            </div>
                        </div>
                    )
                })}
            </div>
            <Paginate {...paginateInfo} next_page_handler={this.handlePaginate} prev_page_handler={this.handlePaginate.bind(this, false)} />
            </>
        ) : <NoItem />
    }
}

export default Discounts;