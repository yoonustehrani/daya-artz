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
    switch (key) {
        case "automate":
            return "اتومات"
        case "manual":
            return "دستی";
        case "just-recieved":
            return "دریافت شده";
        case "in-progress":
            return "در حال انجام";
        case "finished":
            return "تمام شده"
        default:
            break;
    }
}

export const number_format = (number, appendix = false) => `${Number(number).toLocaleString('en-US')}${appendix ? ' تومان' : ''}`