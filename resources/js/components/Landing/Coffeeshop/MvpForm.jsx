import { Form, Formik } from "formik";
import { useState } from "react";
// import validator from "validator";
import AlertService from "../../../services/AlertService";
import { useHttpService } from "../../../userarea/hooks";

export default function MvpForm(props) {
    const http = useHttpService("")
    const Alert = new AlertService({customClass: {container: "rtl"}, timer: 3000, showConfirmButton: false})
    const [disbaled, setDisabled] = useState(false)
    const [form, setForm] = useState({
        data: {
            position: '',
            fullname: '',
            phone_number: '',
            description: ''
        },
        positions: [
            {name: 'business-owner', title: 'صاحب کسب و کار', icon: 'fas fa-user-tie'},
            {name: 'company-manager', title: 'مدیر / مسئول شرکت', icon: 'fas fa-briefcase'},
            {name: 'ideator', title: 'صاحب ایده کسب و کار', icon: 'fas fa-lightbulb'}
        ]
    })
    const placeHolder = "هدف فعلی تبلیغاتی/برندینگ که دغدغه شما یا سازمان تان است را شرح دهید.\n- برای مثال:‌ من قصد افزایش فروش رستوران خود را با ارتقا سطح برند خود دارم",
        inactiveClassNames = 'border-gray-500 ring-transparent',
        activeClassNames = 'border-amber-500 ring-amber-400'
    
    // return form && (
    //     <Formik
    //         initialValues={form.data}
    //         // validationSchema={Yup.object({
    //         //     firstName: Yup.string()
    //         //     .max(15, 'Must be 15 characters or less')
    //         //     .required('Required'),
    //         //     lastName: Yup.string()
    //         //     .max(20, 'Must be 20 characters or less')
    //         //     .required('Required'),
    //         //     email: Yup.string().email('Invalid email address').required('Required'),
    //         // })}
    //         onSubmit={(values, { setSubmitting }) => {
    //             setTimeout(() => {
    //             alert(JSON.stringify(values, null, 2));
    //                 setSubmitting(false);
    //             }, 400);
    //         }}
    //     >
    //     {({ isSubmitting }) => (
    //         <Form className="grid grid-cols-2 gap-8 h-full w-full xl:w-3/4 my-2 md:my-4 bg-white shadow-lg rounded-md p-6">

    //         </Form>
    //     )}
    //     </Formik>
    // )
    
    // return (
    //     <div >
    //         <div id="position" className="col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-8 h-fit">
    //             <p className="col-span-full font-semibold text-lg">- مسئولیت شما در کسب و کارتان کدام یک از موارد زیر است؟</p>
    //             <div className="border-amber-500 ring-amber-400 flex flex-col items-center justify-center aspect-square border-2 rounded-md p-2 md:p-3 relative ring-4 duration-300 hover:border-amber-500 hover:ring-amber-400 cursor-pointer">
    //                 <span className="absolute text-md z-10 top-2 left-2 w-8 h-8 bg-amber-300 grid place-items-center rounded-full">
    //                     <i className="fas fa-check"></i>
    //                 </span>
    //                 <span className="text-4xl"><i className="fas fa-coffee"></i></span>
    //                 <span className="mt-4 text-lg text-gray-600 text-center">کافی شاپ</span>
    //             </div>
    //             <div className="border-gray-500 ring-transparent flex flex-col items-center justify-center aspect-square border-2 rounded-md p-2 md:p-3 relative ring-4 duration-300 hover:border-amber-500 hover:ring-amber-400 cursor-pointer">
    //                 <span className="text-4xl"><i className="fas fa-user"></i></span>
    //                 <span className="mt-4 text-lg text-gray-600 text-center">کافی شاپ</span>
    //             </div>
    //             <div className="border-gray-500 ring-transparent flex flex-col items-center justify-center aspect-square border-2 rounded-md p-2 md:p-3 relative ring-4 duration-300 hover:border-amber-500 hover:ring-amber-400 cursor-pointer">
    //                 <span className="text-4xl"><i className="fas fa-user"></i></span>
    //                 <span className="mt-4 text-lg text-gray-600 text-center">کافی شاپ</span>
    //             </div>
    //         </div>
    //         <div id="name" className="col-span-full lg:col-span-1">
    //             <p className="font-semibold text-lg">- نام و  نام خانوادگی</p>
    //             <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" />
    //         </div>
    //         <div id="phone" className="col-span-full lg:col-span-1">
    //             <p className="font-semibold text-lg">- شماره تماس</p>
    //             <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" style="direction: ltr" />
    //         </div>
    //         <div id="description" className="col-span-full">
    //             <p className="font-semibold text-lg">- هدف تبلیغاتی یا برند سازی شما</p>
    //             <textarea className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" cols="30" rows="10"></textarea>
    //         </div>
    //         <div className="col-span-full text-center">
    //             <button className="w-fit py-2 px-6 text-base shadow-lg bg-slate-500 text-slate-50 hover:text-gray-700 hover:bg-amber-500 duration-200 cursor-pointer rounded-md">ارسال اطلاعات</button>
    //         </div>
    //     </div>
    // )
}