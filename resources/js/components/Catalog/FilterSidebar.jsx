import React, { Component } from 'react';

class FilterSidebar extends Component {
    render() {
        return (
            <div className='w-10/12 lg:w-4/12 xl:w-3/12 h-[calc(100%-3.5rem)] overflow-y-auto bg-violet-500 px-2 py-3'>
                <div className='relative my-3 text-center'>
                    <span className='absolute ml-[66%] top-1/2 -translate-y-1/2 text-xl hover:text-violet-500 duration-200 cursor-pointer'><i className='far fa-search align-middle'></i></span>
                    <input className='rounded-full w-3/4 mx-auto bg-slate-50 pr-9 p-3 border-indigo-300 focus:border-4 h-11 outline-none duration-200 text-right [direction:rtl]' />
                </div>
            </div>
        );
    }
}

export default FilterSidebar;