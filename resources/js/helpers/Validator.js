// we use validator library methods to validate our fields and the return the error messages back to the desired componen to show err
import validator from "validator";

const validate = (inputsArray) => {
    if (inputsArray && inputsArray.length > 0) {
        let errors = [], err
        inputsArray.map((item) => {
            let { validate_types, title, value, not_null } = item
            if (validate_types && validate_types.length > 0) {
                for (var i = 0; i < validate_types.length; i++) {
                    if (! validator.isEmpty(value)) {
                        switch (validate_types[i]) {
                            case "email":
                                ! validator.isEmail(value) ? err = "فیلد ایمیل معتبر نیست" : null
                                break
                            case "phone_number":
                                ! validator.isMobilePhone(value) ? err = "شماره تلفن وارد شده معتبر نیست" : null
                                break
                            case "state_code":
                                ! validator.isNumeric(value) || ! value.length !== 3 ? err = "کد استان وارد شده معتبر نیست" :  null
                                break;
                            case "short_text":
                                ! validator.isLength(value, {min: 0, max: 60}) ? err = `طول فیلد ${title} حداکثر شصت کاراکتر میباشد` : null
                                break
                            case "long_text":
                                ! validator.isLength(value, {min: 0, max: 100}) ? err = `طول فیلد ${title} حداکثر صد کاراکتر میباشد` : null
                                break
                            case "paragraph":
                                ! validator.isLength(value, {min: 0, max: 1000}) ? err = `طول فیلد ${title} حداکثر هزار کاراکتر میباشد` : null
                                break
                            case "alpha-fa":
                                ! validator.isAlpha(value, "fa-IR", {ignore: " "}) ? err = `فیلد ${title} فقط شامل حروف فارسی میباشد` : null
                                break
                            case "alpha-numeric-fa":
                                ! validator.isAlphanumeric(value, "fa-IR", {ignore: " -"}) ? err = `فیلد ${title} فقط شامل حروف  و اعداد فارسی میباشد` : null
                                break
                            case "alpha-en":
                                ! validator.isAlpha(value, "en-US", {ignore: " "}) ? err = `فیلد ${title} فقط شامل حروف انگیسی میباشد` : null
                                break
                            case "alpha-numeric-en":
                                ! validator.isAlphanumeric(value, "en-US", {ignore: "- "}) ? err = `فیلد ${title} فقط شامل حروف  و اعداد انگیسی میباشد` : null
                                break
                            case "url":
                                ! validator.isURL(value, ) ? err = "آدرس وبسایت وارد شده معتبر نمیباشد" : null
                                break
                            case "color":
                                ! validator.isHexColor(value) && ! validator.isHSL(value) && ! validator.isRgbColor(value) ? err = "کد رنگ وارد شده معتبر نمیباشد" : null
                                break
                            default:
                                break   
                        }
                        err ? errors.push(err) : undefined
                        err = null
                    } else if (not_null) {
                        errors.push(`لطفا فیلد ${title} را پر نمایید`)
                        break
                    }
                }
            }
        })
        return errors
    } 
}

export default validate;