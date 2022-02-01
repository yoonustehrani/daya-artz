import { createAsyncThunk } from '@reduxjs/toolkit'
import { useHttpService } from "../hooks";

const http = useHttpService()
const reducerKeys = {auth: 'auth', user: 'user'}
const actionTypes = {
    USER_LOGGED_IN: `${reducerKeys.auth}/userLoggedin`,
    USER_VERIFIED_PHONE: `${reducerKeys.auth}/userVerifiedPhoneNumber`,
    USER_PHONE_NUMBER_CHANGED: `${reducerKeys.auth}/userChangedPhoneNumber`,
    USER_EMAIL_CHANGED: `${reducerKeys.auth}/userChangedEmail`,
    APP_STATUS_CHANGED: `${reducerKeys.auth}/appStatusChanged`,
}

const logInUsingCredentials = createAsyncThunk('auth/loginUser', async (credentials, {rejectWithValue}) => {
    const response = await http.post('/auth/login', credentials)
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return response.user
})

const logoutUser = createAsyncThunk('auth/logoutUser', async (param, {getState, rejectWithValue}) => {
    if (getState().auth.user) {
        const response = await http.post('/auth/logout')
        if (response.ok) {
            return response
        }
    }
    throw new Error()
})

const registerUser = createAsyncThunk('auth/registerUser', async (information, {rejectWithValue}) => {
    const response = await http.post('/auth/register', information)
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return response.user
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

const updateUserInfo = createAsyncThunk('auth/user/editInfo', async({email, phone_number, password = null, password_confirmation = null}, {rejectWithValue}) => {
    const response = await http.put('/userarea/user/update', {email, phone_number, password, password_confirmation})
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return response.user
})

const updateCustomerInfo = createAsyncThunk('user/customer/edit', async({firstname, lastname}, {rejectWithValue}) => {
    const response = await http.put('/userarea/user/customer', {firstname, lastname})
    if ((typeof response.error) !== 'undefined') {
        return rejectWithValue(response.error)
    }
    return response.user
})

const logUserIn = user => ({ type: actionTypes.USER_LOGGED_IN, payload: user })
const verifyUserPhone = () => ({type: actionTypes.USER_VERIFIED_PHONE})
const changeAppStatus = status => ({ type: actionTypes.APP_STATUS_CHANGED, payload: !! status })
const changeEmail = email => ({type: actionTypes.USER_EMAIL_CHANGED, payload: email})

const checkAuth = async (dispatch, getState) => {
    const response = await http.get('/auth/user', null, false)
    if (response.user) {
        dispatch(logUserIn(response.user));
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
    updateCustomerInfo
}