const { Component } = require("react");

class Form extends Component
{
    render() {
        return (
            <div className="grid grid-cols-2 gap-8 h-full w-full xl:w-3/4 my-2 md:my-4 bg-white shadow-lg rounded-md p-6">
                <div className="col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-8 h-fit">
                    <p className="col-span-full font-semibold text-lg">- مسئولیت شما در کسب و کارتان کدام یک از موارد زیر است؟</p>
                    <div className="flex flex-col items-center justify-center aspect-square border-2 rounded-md border-gray-500 p-0 md:p-3 relative ring-4 border-purple-500 ring-purple-400 duration-300 cursor-pointer">
                        <span className="absolute text-md z-10 top-2 left-2 w-8 h-8 bg-purple-300 grid place-items-center rounded-full">
                            <i className="fas fa-check"></i>
                        </span>
                        <span className="text-4xl"><i className="fas fa-user-tie"></i></span>
                        <span className="mt-4 text-lg text-gray-600 text-center">صاحب کسب و کار</span>
                    </div>
                    <div className="flex flex-col items-center justify-center aspect-square border-2 rounded-md border-gray-500 p-0 md:p-3 relative ring-4 ring-transparent hover:border-purple-500 hover:ring-purple-400 duration-300 cursor-pointer">
                        <span className="text-4xl"><i className="fas fa-briefcase"></i></span>
                        <span className="mt-4 text-lg text-gray-600 text-center">مدیر / مسئول شرکت</span>
                    </div>
                    <div className="flex flex-col items-center justify-center aspect-square border-2 rounded-md border-gray-500 p-0 md:p-3 relative ring-4 ring-transparent hover:border-purple-500 hover:ring-purple-400 duration-300 cursor-pointer">
                        <span className="text-4xl"><i className="fas fa-lightbulb"></i></span>
                        <span className="mt-4 text-lg text-gray-600 text-center">صاحب ایده کسب و کار</span>
                    </div>
                </div>
                <div className="">
                    <p className="font-semibold text-lg">- نام و  نام خانوادگی</p>
                    <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" />
                </div>
                <div className="">
                    <p className="font-semibold text-lg">- شماره تماس</p>
                    <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" style={{ direction: 'ltr' }} />
                </div>
                <div className="col-span-full">
                    <p className="font-semibold text-lg">- هدف تبلیغاتی یا برند سازی شما</p>
                    <textarea className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" cols="30" rows="10" placeholder="هدف حال حاضر تبلیغاتی که دغدغه شما یا سازمان تان است را شرح دهید..."></textarea>
                </div>
            </div>
        )
    }
}

export default Form;