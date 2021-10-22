import {
    APP_STATUS_CHANGED,
    USER_LOGGED_IN,
    USER_LOGGED_OUT,
    USER_VERIFIED_PHONE,
    USER_PHONE_NUMBER_CHANGED,
    USER_EMAIL_CHANGED
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
const verifyUserPhone = () => ({type: USER_VERIFIED_PHONE})
const changeAppStatus = status => ({ type: APP_STATUS_CHANGED, payload: !! status })
const changePhoneNumber = phone_number => ({type: USER_PHONE_NUMBER_CHANGED, payload: phone_number})
const changeEmail = email => ({type: USER_EMAIL_CHANGED, payload: email})

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
    logOut,
    verifyUserPhone,
    changePhoneNumber,
    changeEmail
}