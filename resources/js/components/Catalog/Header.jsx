import React, { Component } from 'react';

class Header extends Component {
    render() {
        return (
            <header className='w-full bg-gradient-to-r from-violet-300 to-violet-500 h-14 py-2 px-6 flex justify-between items-center'>
                <a href='tel:+982128423542' className='bg-slate-100 p-1 rounded-full text-xl w-10 h-10 flex items-center justify-center cursor-pointer duration-300 hover:bg-indigo-400 hover:text-slate-100 hover:scale-[0.85]'><i className='fas fa-phone'></i></a>
                <a href={APP_ROUTE} className='text-4xl text-white shadow-2xl duration-200 hover:text-indigo-200 font-bold tracking-wide'>DAYAARTZ</a>
                <span className='text-white text-2xl hover:text-indigo-200 duration-300 cursor-pointer hover:scale-110'><i className='fas fa-filter'></i></span>
            </header>
        );
    }
}

export default Header;