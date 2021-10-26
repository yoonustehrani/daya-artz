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
    let user = await httpService.get('/auth/user', null, false)
    if (user) {
        dispatch(logUserIn(user));
    }
    dispatch(changeAppStatus(false))
}

const logOut = async (dispatch, getState) => {
    if (getState().auth.user) {;
        dispatch(changeAppStatus(true))
        await httpService.post('/auth/logout', {}).then(({ok}) => {
            dispatch(logUserOut())
        })
        dispatch(changeAppStatus(false))
    }
}

const logIn = credentials => async (dispatch, getState) => {
    await httpService.post('/auth/login', credentials).then(({ok, message, user}) => {
        dispatch(logUserIn(user))
    }).catch(err => null)
}

const register = credentials => async (dispatch, getState) => {
    await httpService.post('/auth/register', credentials).then(({ok, message, user}) => {
        console.log('answered !');
        dispatch(logUserIn(user))
    }).catch(err => null)
}

export {
    logUserIn,
    logIn,
    register,
    checkAuth,
    logOut,
    verifyUserPhone,
    changePhoneNumber,
    changeEmail
}