export class NestedObj {
    constructor(targetObj, path, value=null) {
        this.targetObj = targetObj
        this.value = value
        let keys = path.split(".")
        if (keys.length > 1) {
            this.lastKey = keys.pop()
            this.lastObj = keys.reduce((targetObj, key) => 
                targetObj[key] = targetObj[key] || {}
            , this.targetObj)
        } else {
            this.lastObj = targetObj
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