import moment from 'moment-jalaali';
import { useStore } from 'react-redux';
import { getCookie } from '../services/CookieService';
import HttpClient from '../services/HttpClient';
import { logoutUser } from './redux/actions'

const useJalaliDate = (datetime) => {
    let date = moment(datetime)
    let formatToJalai = format => date.format(format)
    return {
        format: formatToJalai
    }
}

const useHttpService = (base_path = "") => {
    let baseURL = base_path !== null ? API_BASE_URL + base_path : null
    return new HttpClient(
        {
            baseURL,
            headers: {
                'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
                'Accept': 'application/json'
            }
        },
        err => {
            if (err.response) {
                let { status} = err.response
                if (status === 401) {
                    useStore().dispatch(logoutUser())
                }
            }
        }
    )
}

export {useJalaliDate, useHttpService}