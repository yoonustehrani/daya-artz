import {
    APP_STATUS_CHANGED,
    USER_LOGGED_IN,
    USER_LOGGED_OUT
} from "./actionTypes";
import HttpClient from "../../services/HttpClient";
import { getCookie } from "../../services/CookieService";

const httpService = new HttpClient({
    baseURL: "http://localhost/api/v1",
    headers: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        'Accept': 'application/json'
    }
})

const logUserIn = user => ({ type: USER_LOGGED_IN, payload: user })
const logUserOut = () => ({ type: USER_LOGGED_OUT })
const changeAppStatus = status => ({ type: APP_STATUS_CHANGED, payload: !! status })

const checkAuth = async (dispatch, getState) => {
    await httpService.get('/auth/user').then(res => {
        dispatch(logUserIn(res.data))
    }).catch(error => {
        if (error.response) {
            let {status, data} = error.response
            if (status === 401) {
                // User is not loggedIn
                // console.log(data);
            }
        }
    })
    dispatch(changeAppStatus(false))
}

const logOut = async (dispatch, getState) => {
    if (getState().auth.user) {
        dispatch(changeAppStatus(true))
        await httpService.post('/auth/logout', {}).then(res => {
            if (res.data.ok) {
                dispatch(logUserOut())
            }
        })
        dispatch(changeAppStatus(false))
    }
}

export {
    logUserIn,
    checkAuth,
    logOut
}