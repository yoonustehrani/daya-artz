import {
    APP_STATUS_CHANGED,
    USER_LOGGED_IN,
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


const logInUsingCredentials = createAsyncThunk('auth/loginUser', async (credentials, {rejectWithValue}) => {
    const response = await httpService.post('/auth/login', credentials)
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return response.user
})

const logoutUser = createAsyncThunk('auth/logoutUser', async (param, {getState, rejectWithValue}) => {
    if (getState().auth.user) {
        const response = await httpService.post('/auth/logout')
        if (response.ok) {
            return response
        }
    }
    throw new Error()
})

const registerUser = createAsyncThunk('auth/registerUser', async (information, {rejectWithValue}) => {
    const response = await httpService.post('/auth/register', information)
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return response.user
})

const changeUserPhoneNumber = createAsyncThunk('auth/user/changePhoneNumber', async (phone_number, thunkAPI) => {
    const response = await httpService.put(`/auth/verification/phone/edit`, {phone_number})
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return {phone_number}
})
const changeUserEmail = createAsyncThunk('auth/user/changeEmail', async (email, thunkAPI) => {
    const response = await httpService.put(`/auth/verification/email/edit`, {email})
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return {email}
})

const updateUserInfo = createAsyncThunk('auth/user/editInfo', async({email, phone_number, password = null, password_confirmation = null}, {thunkAPI}) => {
    const response = await httpService.put('/userarea/user/update', {email, phone_number, password, password_confirmation})
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return response.user
})

const logUserIn = user => ({ type: USER_LOGGED_IN, payload: user })
const verifyUserPhone = () => ({type: USER_VERIFIED_PHONE})
const changeAppStatus = status => ({ type: APP_STATUS_CHANGED, payload: !! status })
const changeEmail = email => ({type: USER_EMAIL_CHANGED, payload: email})

const checkAuth = async (dispatch, getState) => {
    const response = await httpService.get('/auth/user', null, false)
    if (response.user) {
        dispatch(logUserIn(response.user));
    }
    dispatch(changeAppStatus(false))
}

export {
    logUserIn,
    checkAuth,
    verifyUserPhone,
    logInUsingCredentials,
    registerUser,
    logoutUser,
    changeUserPhoneNumber,
    changeUserEmail,
    updateUserInfo
}