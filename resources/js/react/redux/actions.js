import { createAsyncThunk } from '@reduxjs/toolkit'
import { useHttpService } from '../hooks'

const http = useHttpService()
const reducerKeys = {auth: 'auth', user: 'user'}
const actionTypes = {
    USER_LOGGED_IN: `${reducerKeys.auth}/userLoggedin`,
    USER_VERIFIED_PHONE: `${reducerKeys.auth}/userVerifiedPhoneNumber`,
    USER_PHONE_NUMBER_CHANGED: `${reducerKeys.auth}/userChangedPhoneNumber`,
    USER_EMAIL_CHANGED: `${reducerKeys.auth}/userChangedEmail`,
    APP_STATUS_CHANGED: `${reducerKeys.auth}/appStatusChanged`,
    COMPANY_DETECTED: `${reducerKeys.user}/companyWasSet`
}

const logUserIn = user => ({ type: actionTypes.USER_LOGGED_IN, payload: user })
const setCompany = company => ({type: actionTypes.COMPANY_DETECTED, payload: company})
const verifyUserPhone = () => ({type: actionTypes.USER_VERIFIED_PHONE})
const changeAppStatus = status => ({ type: actionTypes.APP_STATUS_CHANGED, payload: !! status })
const changeEmail = email => ({type: actionTypes.USER_EMAIL_CHANGED, payload: email})

const resendBasedOnAuthMethod = createAsyncThunk('auth/resend', async(method, {rejectWithValue, dispatch}) => {
    const response = await http.post(`/verification/${method == 'phone' ? 'phone' : 'email'}/resend`);
    if (condition) {
        
    }
})

const logInUsingCredentials = createAsyncThunk('auth/loginUser', async (credentials, {rejectWithValue, dispatch}) => {
    const response = await http.post('/auth/login', credentials)
    if (response.okay) {
        if (response.company) {
            dispatch(setCompany(response.company));
        }
        return response.user
    }
    return rejectWithValue(response.error)
})

const logoutUser = createAsyncThunk('auth/logoutUser', async (param, {getState, dispatch, rejectWithValue}) => {
    if (getState().auth.user) {
        const response = await http.post('/auth/logout')
        if (response.okay) {
            dispatch(setCompany(null))
            return response
        }
    }
    return rejectWithValue({
        error: true
    })
})

const registerUser = createAsyncThunk('auth/registerUser', async (information, {rejectWithValue}) => {
    const response = await http.post('/auth/register', information)
    return response.okay ? response.user : rejectWithValue(response.error)
})

const changeUserPhoneNumber = createAsyncThunk('auth/user/changePhoneNumber', async (phone_number, {rejectWithValue}) => {
    const response = await http.put(`/auth/verification/phone/edit`, {phone_number})
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return {phone_number}
})
const changeUserEmail = createAsyncThunk('auth/user/changeEmail', async (email, {rejectWithValue}) => {
    const response = await http.put(`/auth/verification/email/edit`, {email})
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return {email}
})

const updateUserInfo = createAsyncThunk('auth/user/modify', async({email, phone_number, password = null, password_confirmation = null}, {rejectWithValue}) => {
    const response = await http.put('/userarea/user/auth', {email, phone_number, password, password_confirmation})
    return response.okay ? response.user : rejectWithValue(response.error)
})

const updateCustomerInfo = createAsyncThunk('user/customer/modify', async({firstname, lastname}, {rejectWithValue}) => {
    const response = await http.put('/userarea/user/customer', {firstname, lastname})
    return response.okay ? response.user : rejectWithValue(response.error)
})

const updateCompanyInfo = createAsyncThunk('user/company/modify', async(params, {rejectWithValue}) => {
    const response = await http.put('/userarea/user/company', params)
    return response.okay ? response.company : rejectWithValue(response.error)
})

const checkAuth = async (dispatch, getState) => {
    const response = await http.get('/auth/user', null, false)
    if (response.okay) {
        dispatch(logUserIn(response.user));
        if (response.company) {
            dispatch(setCompany(response.company));
        }
    }
    dispatch(changeAppStatus(false))
}

export {
    actionTypes,
    logUserIn,
    checkAuth,
    verifyUserPhone,
    logInUsingCredentials,
    registerUser,
    logoutUser,
    changeUserPhoneNumber,
    changeUserEmail,
    updateUserInfo,
    updateCustomerInfo,
    updateCompanyInfo,
    resendBasedOnAuthMethod
}