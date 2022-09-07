import { Field, Form, Formik, ErrorMessage } from "formik";
import * as Yup from 'yup';
import { useEffect, useState } from "react";
import AlertService from "../../../services/AlertService";
import { useHttpService } from "../../../userarea/hooks";

const validation = Yup.object({
    business_type: Yup.string().required('اجباری است'),
    fullname: Yup.string().min(5, 'حداقل 5 حرف').max(30, 'نهایتا 30 حرف').required('اجباری است'),
    phone_number: Yup.string().matches(/^0?9[0-9]{9}$/, 'شماره معتبر نیست').required('اجباری است'),
    notes: Yup.string().min(4, 'حداقل 4 حرف').max(300, 'نهایتا 300 کاراکتر').optional()
})

export default function MvpForm({formData, formAnswer}) {
    const http = useHttpService("")
    const Alert = new AlertService({customClass: {container: "rtl"}, timer: 3000, showConfirmButton: false})

    const [disbaled, setDisabled] = useState(false)
    const [form, setForm] = useState(null)

    const inactiveClassNames = 'border-gray-500 ring-transparent', activeClassNames = 'border-amber-500 ring-amber-400'

    const handleSubmit = async (values, { setSubmitting }) => {
        const filteredValues = Object.fromEntries(Object.entries(values).filter(([key, value]) => Object.keys(form.inputData).includes(key)))
        const response = await http.post(formAnswer, filteredValues)
        console.log(response);
        setSubmitting(false)
    }

    useEffect(() => {
        http.get(formData).then(res => {
            let {inputs} = res
            let inputData = inputs.reduce((prev, current) => ({...prev, [current.name]: current}), {})
            let data = inputs.reduce((prev, current) => ({...prev, [current.name]: current.default ?? ''}), {});
            let businessType = inputs.filter(x => x.name === 'business_type')[0]?.details?.meta
            setForm({businessType, data, inputData})
        })
    }, [])
    
    return form && (
        <Formik
            initialValues={form.data}
            validationSchema={validation}
            onSubmit={handleSubmit}
        >
        {({ isSubmitting, setFieldValue, values }) => (
            <Form className="grid grid-cols-2 gap-8 h-full w-full xl:w-3/4 bg-white shadow-lg rounded-md p-6">
                <div className="col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-8 h-fit">
                    <p className="col-span-full font-semibold text-lg">- {form.inputData['business_type'].placeholder}</p>
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
                    <div className="col-span-full">
                        <span className="text-sm text-red-500"><ErrorMessage name="business_type"/></span>
                    </div>
                </div>
                <div className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- {form.inputData['fullname'].label}</p>
                    <Field name="fullname" type="text" disabled={isSubmitting} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" />
                    <span className="text-sm text-red-500"><ErrorMessage name="fullname"/></span>
                </div>
                <div className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- {form.inputData['phone_number'].label}</p>
                    <Field name="phone_number" type="text" disabled={isSubmitting} placeholder={form.inputData['phone_number'].placeholder} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300 placeholder:text-right" style={{ direction: 'ltr' }} />
                    <span className="text-sm text-red-500"><ErrorMessage name="phone_number"/></span>
                </div>
                <div id="description" className="col-span-full">
                    <p className="font-semibold text-lg">- {form.inputData['notes'].label}</p>
                    <Field as="textarea" name="notes" placeholder={form.inputData['notes'].placeholder} disabled={isSubmitting} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" cols="30" rows="5" />
                    <span className="text-sm text-red-500"><ErrorMessage name="notes"/></span>
                </div>
                <div className="col-span-full text-center">
                    <button type="submit" disabled={isSubmitting} className="w-fit py-2 px-6 text-base shadow-lg text-gray-700 bg-amber-500 disabled:text-gray-400 disabled:bg-gray-300 duration-200 cursor-pointer rounded-md">ارسال اطلاعات</button>
                </div>
            </Form>
        )}
        </Formik>
    )
}