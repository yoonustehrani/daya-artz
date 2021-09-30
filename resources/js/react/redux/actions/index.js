import {
    HANDLE_LOGIN,
} from "./actionTypes";

export const handleLogin = (loginInfo) => ({
    type: HANDLE_LOGIN,
    loginInfo: loginInfo
})