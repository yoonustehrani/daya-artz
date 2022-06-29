import React, { Component } from 'react';

class FilterSidebar extends Component {
    state = {
        searchQuery: "",
        selectedFilters: [{name: "logo", title: "لوگو"}, {name: "sarbarg", title: "طراحی سربرگ"}, {name: "package", title: "پکیج"}],
        services: [{name: 'logo', title: "لوگو"}, {name: "visit_card", title: "کارت ویزیت"}, {name: 'instagram', title: "طراحی اینستاگرام"}],
        catagories: [{name: "printing", title: "چاپی"}, {name: 'digital', title: "دیجیتالی"}, {name: 'social_media', title: "فضای مجازی"}]
    }

    editFilter = (filter, remove, e) => {
        if (!remove && this.state.selectedFilters.filter(item => item.name === filter.name).length) {
            e.preventDefault()
        } else {
            this.setState(prevState => ({
                selectedFilters: remove ? prevState.selectedFilters.filter(item => item.name !== filter.name) : [...prevState.selectedFilters, {name: filter.name, title: filter.title}]
            }))
        }
    }

    render() {
        let { selectedFilters, services, catagories, searchQuery } = this.state
        return (
            <div className='w-10/12 lg:w-4/12 xl:w-3/12 h-[calc(100%-3.5rem)] overflow-y-auto bg-violet-500 px-2 py-3'>
                <div className='relative my-3 text-center'>
                    <span className='absolute ml-[66%] top-1/2 -translate-y-1/2 text-xl hover:text-violet-500 duration-200 cursor-pointer'><i className='far fa-search align-middle'></i></span>
                    <input className='rounded-full w-3/4 mx-auto bg-slate-50 pr-9 p-3 border-indigo-300 focus:border-4 h-11 outline-none duration-200 text-right [direction:rtl]' onChange={(e) => this.setState({searchQuery: e.target.value})} value={searchQuery} />
                </div>
                <div className='flex flex-wrap justify-end'>
                    {selectedFilters && selectedFilters.length > 0 && selectedFilters.map((filter, i) => (
                        <p key={i} className='m-2 bg-slate-50 p-2 flex justify-center items-center text-violet-400 rounded-xl select-none'><span className='mr-2 text-lg flex hover:text-violet-500 duration-200 cursor-pointer' onClick={this.editFilter.bind(this, filter, true)}><i className='far fa-times'></i></span> {filter.title}</p>   
                    ))}
                </div>
                <div className='my-4'>
                    <p className='w-full text-right pr-2 border-r-4 text-white border-l-white text-xl mb-2'>نوع محصول</p>
                    <div className='flex flex-wrap justify-end'>
                        {services && services.length > 0 && services.map((filter, i) => (
                            <p key={i} className='m-2 bg-violet-400 p-2 flex justify-center items-center text-slate-50 border-slate-50 border-2 rounded-xl select-none hover:bg-slate-50 hover:text-violet-400 duration-200 cursor-pointer' onClick={this.editFilter.bind(this, filter, false)}>{filter.title}</p>   
                        ))}
                    </div>
                </div>
                <div className='my-4'>
                    <p className='w-full text-right pr-2 border-r-4 text-white border-l-white text-xl mb-2'>دسته بندی خدمات</p>
                    <div className='flex flex-wrap justify-end'>
                        {catagories && catagories.length > 0 && catagories.map((filter, i) => (
                            <p key={i} className='m-2 bg-violet-400 p-2 flex justify-center items-center text-slate-50 border-slate-50 border-2 rounded-xl select-none hover:bg-slate-50 hover:text-violet-400 duration-200 cursor-pointer' onClick={this.editFilter.bind(this, filter, false)}>{filter.title}</p>   
                        ))}
                    </div>
                </div>
            </div>
        )
    }
}

export default FilterSidebar;