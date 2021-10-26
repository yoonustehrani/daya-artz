import axios from "axios";

export default class HttpClient
{
    constructor(config = {}) {
        this.Http = axios.create(config)
    }
    
    get = async (url, config = null, handleErrors = true) => {
        try {
            const response = await this.Http.get(url, config)
            return await response.data
        } catch (err) {
            this.handleErr(err, handleErrors)
        }
    }
    post = async (url, params = {}, config = null, handleErrors = true) => {
        try {
            let response = await this.Http.post(url, params, config)
            return await response.data
        } catch (err) {
            this.handleErr(err, handleErrors)
        }
    }
    put = (url, params = {}, config = null) => {
        return this.Http.put(url, params, config)
    }
    patch = (url, params = {}, config = null) => {
        return this.Http.patch(url, params, config)
    }
    delete = (url, config = null) => {
        return this.Http.delete(url, config)
    }
    handleErr = (err, handle) => {
        if (! handle) {
            return
        }
        if (err.response) {
            let {data, status} = err.response
            console.log('service catched error !');
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            switch (status) {
                case 401:
                    // Unauthorized
                    break;
                default:
                    // Any Other Error
                    break;
            }
          } else if (err.request) {
            // The request was made but no response was received
            // `err.request` is an instance of XMLHttpRequest in the browser and an instance of
            // http.ClientRequest in node.js
            console.log(err.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log('Error', err.message);
          }
        //   console.log(err.config);
    }
}