import React, { Component } from 'react';
import { Spinner } from 'react-activity';

class ServiceSearch extends Component {
    state ={
        searchValue: "",
        displayCombo: false,
        searching: false,
        searchResults: []
    }
    onDisplayCombo = (displayCombo, e) => {
        this.setState({displayCombo: displayCombo})
    }
    handleSearch = (e) => {
        let { value } = e.target, { searchApi } = this.props
        this.setState({searching: true, searchValue: value}, () => {
            if (value.length < 2) {
                this.setState({searchResults: [], searching: false})
            } else {
                axios.get(`${searchApi}?q=${value.trim()}`).then(res => {
                    let { data } = res
                    this.setState({searchResults: data, searching: false})
                })
            }
        })
    }
    render() {
        let { searchValue, displayCombo, searching, searchResults } = this.state
        return (
            <div className="input-group input-group-lg search-box-services col-xl-6 offset-xl-3 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-12 float-left p-0">
                {/* <div className="input-group-prepend">
                    <button className="btn btn-search" type="button">جستجو</button>
                </div> */}
                <input className="h-100 form-control text-light" type="text" placeholder="اینجا بنویس: طراحی لوگو" value={searchValue} onChange={this.handleSearch} onFocus={this.onDisplayCombo.bind(this, true)} onBlur={this.onDisplayCombo.bind(this, false)} />
                <div className={`combo-box-services ${displayCombo ? "d-block" : "d-none"}`}>
                    {searching ? <div className='py-2 flex-center'><Spinner size={20} color="#C5AEF6"/></div>
                        : searchResults && searchResults.length > 0 ? searchResults.map((item, i) => {
                        let { icon_class, title, group, id, uri } = item
                        return (
                            <a className='combo-item' key={id} href={uri} onMouseDown={() => window.location = uri}>
                                <div className='combo-left'>
                                    <p className="combo-group">{group}</p>
                                </div>
                                <div className='combo-right'>
                                    <p className='combo-title'>{title}</p>
                                    <span className='combo-icon'><i className={icon_class}></i></span>
                                </div>
                            </a>
                        )
                        })
                        : searchResults.length === 0 && searchValue.length > 0 && <p className='combo-no-item text-center'>نتیجه ای یافت نشد</p>
                    }
                </div>
            </div>
        );
    }
}

export default ServiceSearch;