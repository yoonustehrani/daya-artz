import {
    APP_READY,
    HANDLE_LOGIN,
} from "./actionTypes";

const handleLogin = (loginInfo) => ({
    type: HANDLE_LOGIN,
    loginInfo: loginInfo
})

const appIsReady = () => ({type: APP_READY})

const checkAuth = async (dispatch, getState) => {
    setTimeout(() => {
        dispatch(appIsReady())
    }, 5000);
}


export {
    handleLogin,
    checkAuth,
    appIsReady
}