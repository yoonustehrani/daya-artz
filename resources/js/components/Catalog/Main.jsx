import React, { Component } from 'react';

class Main extends Component {
    render() {
        return (
            <div className='float-left w-full lg:w-8/12 xl:w-9/12 overflow-y-auto h-[calc(100%-3.5rem)] p-2 custom-scroll'>
                <div className='my-3'>
                    <h2 className='text-violet-500 pr-2 border-r-2 border-violet-500 text-right border-violete-500 text-xl font-bold float-right w-full my-4'>خدمات تکی</h2>
                    <div className="flex justify-center w-full">
                        <div className="w-1/2 lg:w-3/12 my-4">
                            <div className="p-2 shadow-xl w-36 h-36 rounded-xl mx-auto bg-white flex justify-center flex-col items-center">
                                <img src={APP_PATH + "images/services/logo.svg"} className="h-[calc(100%-2rem)] w-auto" alt="" />
                                <h2 className='mt-2 text-xl font-bold text-violet-500 text-center'>لوگو</h2>
                            </div>
                        </div>
                    </div>
                    <div className='w-full flex justify-center'>
                        <button className='p-2 text-white font-bold text-lg rounded-xl bg-violet-600 my-4 flex justify-center items-center'><i className='far fa-chevron-down mr-2'></i> نمایش بیشتر</button>
                    </div>
                </div>
                <div className='my-3'>
                    <h2 className='text-violet-500 pr-2 border-r-2 border-violet-500 text-right text-xl font-bold float-right w-full my-4'>پکیج ها</h2>
                    <div className="flex justify-center w-full">
                        <div className="w-full lg:w-4/12 xl:w-3/12 px-3 my-4">
                            <div className="py-2 px-3 shadow-xl w-full h-auto rounded-xl min-h-[4rem] bg-white text-violet-500 flex justify-center flex-col items-center">
                                <img src={APP_PATH + "images/services/logo.svg"} className="w-24 h-auto" alt="" />
                                <h2 className='mt-2 mb-3 text-xl font-bold text-center'>پکیج اینستاگرام</h2>
                                <ul className='p-0 text-center text-lg'>
                                    <li className='my-2'>بلا بلا بلا</li>
                                    <li className='my-2'>بلا بلا بلا</li>
                                    <li className='my-2'>بلا بلا بلا</li>
                                    <li className='my-2'>بلا بلا بلا</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className='w-full flex justify-center'>
                        <button className='p-2 text-white font-bold text-lg rounded-xl bg-violet-600 my-4 flex justify-center items-center'><i className='far fa-chevron-down mr-2'></i> نمایش بیشتر</button>
                    </div>
                </div>
            </div>
        );
    }
}

export default Main;