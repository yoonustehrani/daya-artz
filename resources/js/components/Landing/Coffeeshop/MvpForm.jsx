import { Field, Form, Formik, ErrorMessage } from "formik";
import * as Yup from 'yup';
import { useEffect, useState, useRef } from "react";
// import AlertService from "../../../services/AlertService";
import { useHttpService } from "../../../userarea/hooks";

const validation = Yup.object({
    business_type: Yup.string().required('اجباری است'),
    fullname: Yup.string().min(5, 'حداقل 5 حرف').max(30, 'نهایتا 30 حرف').required('اجباری است'),
    phone_number: Yup.string().matches(/^0?9[0-9]{9}$/, 'شماره معتبر نیست').required('اجباری است'),
    notes: Yup.string().min(4, 'حداقل 4 حرف').max(300, 'نهایتا 300 کاراکتر').optional()
})

export default function MvpForm({formData, formAnswer}) {
    const http = useHttpService("")
    const formRef = useRef()
    // const Alert = new AlertService({customClass: {container: "rtl"}, timer: 3000, showConfirmButton: false})

    const [disabled, setDisabled] = useState(false)
    const [form, setForm] = useState(null)
    const [done, setDone] = useState(false)

    const inactiveClassNames = 'border-gray-500 ring-transparent', activeClassNames = 'border-amber-500 ring-amber-400'

    const handleSubmit = async (values, { setSubmitting }) => {
        const filteredValues = Object.fromEntries(Object.entries(values).filter(([key, value]) => Object.keys(form.inputData).includes(key)))
        const response = await http.post(formAnswer, {...filteredValues, __name: filteredValues.fullname})
        if (response.okay) {
            formRef.current?.scrollIntoView({behavior: 'smooth'})
            // Alert.success({title: "ارسال شد", text: response.message, heightAuto: false, customClass: {container: "iran-sans"}})
            setDisabled(true)
            setDone(response.message)
        }
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
            <Form ref={formRef} className="grid grid-cols-2 gap-8 h-full w-full xl:w-3/4 bg-white shadow-lg rounded-md p-6 md:mr-auto">
                {done &&  <p className="p-3 col-span-full bg-emerald-200 text-emerald-600 rounded-md shadow-sm"><i className="fas fa-check ml-2"></i>{done}</p>}
                <div className="col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-8 h-fit">
                    <p className="col-span-full font-semibold text-lg">
                        - {form.inputData['business_type'].placeholder} 
                        <span className="text-sm text-red-500 block"><ErrorMessage name="business_type"/></span>
                    </p>
                    {form.businessType.map((business, key) => (
                        <div 
                            key={key}
                            onClick={() => {! (disabled || isSubmitting) && setFieldValue('business_type', business.name)}}
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
                    <div>
                        <label className="font-semibold text-lg">- {form.inputData['fullname'].label}</label>
                    </div>
                    <Field name="fullname" type="text" disabled={disabled || isSubmitting} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" />
                    <span className="text-sm text-red-500"><ErrorMessage name="fullname"/></span>
                </div>
                <div className="col-span-full lg:col-span-1">
                    <div>
                        <label className="font-semibold text-lg">- {form.inputData['phone_number'].label}</label>
                    </div>
                    <Field name="phone_number" type="text" disabled={disabled || isSubmitting} placeholder={form.inputData['phone_number'].placeholder} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300 placeholder:text-right" style={{ direction: 'ltr' }} />
                    <span className="text-sm text-red-500"><ErrorMessage name="phone_number"/></span>
                </div>
                <div id="description" className="col-span-full">
                    <div>
                        <label className="font-semibold text-lg">- {form.inputData['notes'].label}</label>
                        <span className="text-gray-500 float-left">اختیاری</span>
                    </div>
                    <Field as="textarea" name="notes" placeholder={form.inputData['notes'].placeholder} disabled={disabled || isSubmitting} className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-amber-500 ring-4 ring-transparent focus:ring-amber-200 duration-300" cols="30" rows="5" />
                    <span className="text-sm text-red-500"><ErrorMessage name="notes"/></span>
                </div>
                <div className="col-span-full text-center">
                    <button type="submit" disabled={disabled || isSubmitting} className="w-fit py-2 px-6 text-base shadow-lg text-gray-700 bg-amber-500 disabled:text-gray-400 disabled:bg-gray-300 duration-200 cursor-pointer rounded-md">{isSubmitting ? 'در حال ارسال' : 'ارسال اطلاعات'}</button>
                </div>
            </Form>
        )}
        </Formik>
    )
}