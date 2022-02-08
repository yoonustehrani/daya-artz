import moment from 'moment-jalaali';
import { getCookie } from '../services/CookieService';
import HttpClient from '../services/HttpClient';

const useJalaliDate = (datetime) => {
    let date = moment(datetime)
    let formatToJalai = format => date.format(format)
    return {
        format: formatToJalai
    }
}

const useHttpService = (base_path = "") => {
    let baseURL = base_path !== null ? API_BASE_URL + base_path : null
    return new HttpClient({
        baseURL,
        headers: {
            'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
            'Accept': 'application/json'
        }
    })
}

export {useJalaliDate, useHttpService}