export class NestedObj {
    constructor(targetObj, path, value=null) {
        this.targetObj = JSON.parse(JSON.stringify(targetObj))
        this.value = value
        let keys = path.split(".")
        if (keys.length > 1) {
            this.lastKey = keys.pop()
            this.lastObj = keys.reduce((targetObj, key) => 
                targetObj[key] = targetObj[key] && !Array.isArray(targetObj[key]) ? targetObj[key] : {}
            , this.targetObj)
        } else {
            this.lastObj = this.targetObj
            this.lastKey = path
        }
    }

    make() {
        this.lastObj[this.lastKey] = this.value;
        return this.targetObj
    }

    get() {
        return this.lastObj[this.lastKey]??""
    }
}

export function isObjEmpty(obj) {
    return !Object.keys(obj).length
}

export const translate = (key) => {
    const dic = {
        // order methods
        "automate": "اتومات",
        "manual": "دستی",
        "just-recieved": "دریافت شده",
        "in-progress": "در حال انجام",
        "finished": "تمام شده",
        // statuses
        "submitted": "دریافت سفارش",
        "reviewed": "بررسی جزئیات",
        "designing": "در دست طراحی",
        "ready": "آماده تحویل",
        "editing": "در حال ویرایش",
        "canceled": "لغو شده",
        "suspended": "تعلیق شده",
        "finished": "اتمام سفارش",
        "checked-out": "تسویه و تحویل"
    }
    return dic[key]
}

export const number_format = (number, appendix = false) => `${Number(number).toLocaleString('en-US')}${appendix ? ' تومان' : ''}`