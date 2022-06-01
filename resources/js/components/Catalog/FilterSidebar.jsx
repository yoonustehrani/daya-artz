import React, { Component } from 'react';

class FilterSidebar extends Component {
    render() {
        return (
            <div className='w-10/12 lg:w-4/12 xl:w-3/12 h-[calc(100%-3.5rem)] overflow-y-auto bg-violet-500 px-2 py-3'>
                <div className='relative my-3'>
                    <span className='absolute l-0 top-1/2 -translate-y-1/2 text-xl'><i className='far fa-search'></i></span>
                    <input className='rounded-full w-3/4 bg-slate-50 pl-6 border-indigo-300 focus:border-4' />
                </div>
            </div>
        );
    }
}

export default FilterSidebar;