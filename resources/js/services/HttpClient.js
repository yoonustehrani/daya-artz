import axios from "axios";

export default class HttpClient
{
    constructor(config = {}) {
        this.Http = axios.create(config)
    }
    get = (url, config = null) => {
        return this.Http.get(url, config)
    }
    post = (url, params = {}, config = null) => {
        return this.Http.post(url, params, config)
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
}