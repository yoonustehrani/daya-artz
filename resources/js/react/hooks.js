import moment from 'moment-jalaali';
import { getCookie } from '../services/CookieService';
import HttpClient from '../services/HttpClient';

const useJalaliDate = (datetime) => {
    moment.loadPersian({usePersianDigits: true, dialect: "persian-modern"})
    let date = moment(datetime)
    let formatToJalai = format => date.format(format)
    return {
        format: formatToJalai
    }
}

const useHttpService = (base_path = "") => {
    return new HttpClient(
        {
            baseURL: API_BASE_URL + base_path,
            headers: {
                'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
                'Accept': 'application/json'
            }
        }
    )
}

export {useJalaliDate, useHttpService}