import axios from "axios";
import AlertService from "./AlertService";

export default class HttpClient
{
    constructor(config = {}, errorCallback = null) {
        this.Http = axios.create(config)
        this.Alert = new AlertService()
        this.ErrorCallBack = errorCallback
    }
    
    get = async (url, config = null, handleErrors = true) => {
        try {
            const response = await this.Http.get(url, config)
            return await response.data
        } catch (err) {
            let errObj = this.handleErr(err, handleErrors)
            return {error: errObj}
        }
    }
    post = async (url, params = {}, config = null, handleErrors = true) => {
        try {
            let response = await this.Http.post(url, params, config)
            return await response.data
        } catch (err) {
            let errObj = this.handleErr(err, handleErrors)
            return {error: errObj}
        }
    }
    put = async (url, params = {}, config = null, handleErrors = true) => {
        try {
            let response = await this.Http.put(url, params, config)
            return await response.data
        } catch (err) {
            let errObj = this.handleErr(err, handleErrors)
            return {error: errObj}
        }
    }
    patch = (url, params = {}, config = null) => {
        return this.Http.patch(url, params, config)
    }
    delete = (url, config = null) => {
        return this.Http.delete(url, config)
    }
    handleErr = (err, handle) => {
        if (typeof this.ErrorCallBack === 'function') {
            this.ErrorCallBack(err);
        }
        if (! handle) {
            return
        }
        if (err.response) {
            let {data, status} = err.response
            let message = ""
            let title = data.message
            if (status === 422) {
                let errors = Object.keys(data.errors)
                errors.map(item => {
                    let msg = ""
                    data.errors[item].forEach(m => {
                        msg += (m + "\n")
                    });
                    message += (msg + "\n")
                })
                message = message.trim().replace(/\n{1,}/g, "<br>")
            } else {
                message = "خطای سرور"
            }
            this.Alert.error({title: 'خطا', html: message})
            return data
        } else if (err.request) {
            this.Alert.error({title: 'خطا در ارتباط با سرور'})
            // The request was made but no response was received
            // `err.request` is an instance of XMLHttpRequest in the browser and an instance of
            // http.ClientRequest in node.js
            // console.log(err.request);
        } else {
            // Something happened in setting up the request that triggered an Error
            // console.log('Error', err.message);
        }
        return {data: {message: "Error"}}
        //   console.log(err.config);
    }
}