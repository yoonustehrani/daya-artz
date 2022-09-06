import { Field, Form, Formik } from "formik";
import { useEffect } from "react";
import { useState } from "react";
import AlertService from "../../../services/AlertService";
import { useHttpService } from "../../../userarea/hooks";
import validation from "./validation";

export default function MvpForm(props) {
    const http = useHttpService("")
    const Alert = new AlertService({customClass: {container: "rtl"}, timer: 3000, showConfirmButton: false})
    const [disbaled, setDisabled] = useState(false)
    const [form, setForm] = useState(null)
    useEffect(() => {
        let data = {
            data: {
                business_type: '',
                fullname: '',
                phone_number: '',
                notes: ''
            },
            businessType: [
                {name: 'coffeeshop', title: 'کافی شاپ', icon: 'far fa-coffee'},
                {name: 'takeaway', title: 'کافه takeaway', icon: 'far fa-coffee-togo'},
                {name: 'coffee-restaurant', title: 'کافه رستوران', icon: 'fas fa-utensils-alt'}
            ]
        }
        setForm(data)
    }, [])
    const placeHolder = "هدف فعلی تبلیغاتی/برندینگ که دغدغه شما یا سازمان تان است را شرح دهید.\n- برای مثال:‌ من قصد افزایش فروش رستوران خود را با ارتقا سطح برند خود دارم",
        inactiveClassNames = 'border-gray-500 ring-transparent',
        activeClassNames = 'border-amber-500 ring-amber-400'

    return form && (
        <Formik
            initialValues={form.data}
            // validationSchema={validation}
            onSubmit={(values, { setSubmitting }) => {
                setTimeout(() => {
                    console.log(values)
                    setSubmitting(false);
                }, 2000);
            }}
        >
        {({ isSubmitting, setFieldValue, values }) => (
            <Form className="grid grid-cols-2 gap-8 h-full w-full xl:w-3/4 bg-white shadow-lg rounded-md p-6">
                <div id="position" className="col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-8 h-fit">
                    <p className="col-span-full font-semibold text-lg">- مسئولیت شما در کسب و کارتان کدام یک از موارد زیر است؟</p>
                    {form.businessType.map((business, key) => (
                        <div 
                            key={key}
                            onClick={() => setFieldValue('business_type', business.name)}
                            className={`${values.business_type === business.name ? activeClassNames : inactiveClassNames} flex flex-col items-center justify-center aspect-square border-2 rounded-md p-2 md:p-3 relative ring-4 duration-300 hover:border-amber-500 hover:ring-amber-400 cursor-pointer`}
                        >
                            {values.business_type === business.name && (
                                <span className="absolute text-md z-10 top-2 left-2 w-8 h-8 bg-amber-300 grid place-items-center rounded-full">
                                    <i className="fas fa-check"></i>
                                </span>
                            )}
                            <span className="text-4xl"><i className={business.icon}></i></span>
                            <span className="mt-4 text-lg text-gray-600 text-center">{business.title}</span>
                        </div>
                    ))}
                </div>
                <div className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- نام و  نام خانوادگی</p>
                    <Field name="fullname" type="text" disabled={isSubmitting} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" />
                </div>
                <div className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- شماره تماس</p>
                    <Field name="phone_number" type="text" disabled={isSubmitting} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" style={{ direction: 'ltr' }} />
                </div>
                <div id="description" className="col-span-full">
                    <p className="font-semibold text-lg">- یادداشت شما</p>
                    <Field as="textarea" name="notes" placeholder={placeHolder} disabled={isSubmitting} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" cols="30" rows="5" />
                </div>
                <div className="col-span-full text-center">
                    <button type="submit" disabled={isSubmitting} className="w-fit py-2 px-6 text-base shadow-lg text-gray-700 bg-amber-500 disabled:text-gray-400 disabled:bg-gray-300 duration-200 cursor-pointer rounded-md">ارسال اطلاعات</button>
                </div>
            </Form>
        )}
        </Formik>
    )
}