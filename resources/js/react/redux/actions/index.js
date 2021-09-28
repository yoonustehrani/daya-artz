import {
    SHIFT_AUTH_STATE,
    HANDLE_LOGIN,
    SHIFT_AUTH_INPUT,
    CHANGE_LOGIN_METHOD,
    CHANGE_INPUT
} from "./actionTypes";

export const shiftAuthState = (state) => ({
    type: SHIFT_AUTH_STATE,
    state: state
})

export const shiftAuthInput = () => ({
    type: SHIFT_AUTH_INPUT
})

export const changeLoginMethod = () => ({
    type: CHANGE_LOGIN_METHOD
})

export const handleLogin = (loginInfo) => ({
    type: HANDLE_LOGIN,
    loginInfo: loginInfo
})

export const changeInput = (fieldType, field, value) => ({
    type: CHANGE_INPUT,
    fieldType: fieldType,
    field: field,
    value: value
})