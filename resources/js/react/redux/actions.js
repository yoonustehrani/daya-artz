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
import { createAsyncThunk } from '@reduxjs/toolkit'

const httpService = new HttpClient({
    baseURL: "http://localhost/api/v1",
    headers: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        'Accept': 'application/json'
    }
})

const logInUsingCredentials = createAsyncThunk('auth/loginUser', async (credentials, thunkAPI) => {
    const response = await httpService.post('/auth/login', credentials)
    if (! response.user)
        throw new Error()
    return response.user
})

const logoutUser = createAsyncThunk('auth/logoutUser', async (param, {getState}) => {
    if (getState().auth.user) {
        const response = await httpService.post('/auth/logout')
        if (response.ok) {
            return response
        }
    }
    throw new Error()
})

const registerUser = createAsyncThunk('auth/registerUser', async (information, thunkAPI) => {
    const response = await httpService.post('/auth/register', information)
    if (response.ok) {
        return response.user
    }
    throw new Error()
})

const logUserIn = user => ({ type: USER_LOGGED_IN, payload: user })
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

export {
    logUserIn,
    checkAuth,
    verifyUserPhone,
    changePhoneNumber,
    changeEmail,
    logInUsingCredentials,
    registerUser,
    logoutUser
}