import {
    APP_STATUS_CHANGED,
    USER_LOGGED_IN,
    USER_PHONE_NUMBER_CHANGED,
    USER_VERIFIED_PHONE,
    USER_EMAIL_CHANGED
} from "../actionTypes"

import { logInUsingCredentials, registerUser, logoutUser } from '../actions'

var stateCopy, defaultState = {
    loading: true,
    user: null
}

const copyState = (state) => {
    stateCopy = Object.assign({}, state)
}

const loginReducer = (state = defaultState, action) => {
    copyState(state)
    switch (action.type) {
        case logInUsingCredentials.fulfilled.toString():
        case registerUser.fulfilled.toString():
        case USER_LOGGED_IN:
            stateCopy.user = action.payload
            break
        case logoutUser.fulfilled.toString():
            stateCopy.user = null
            stateCopy.loading = false
            break
        case logInUsingCredentials.rejected.toString():
            // action.payload contains the error data
            // console.log("action is ", action);
            break
        case logoutUser.pending.toString():
            stateCopy.loading = true
            break
        case logoutUser.rejected.toString():
            stateCopy.loading = false
            break
        case USER_VERIFIED_PHONE:
            stateCopy.user = {
                ...stateCopy.user,
                phone_verified: true
            }
            break
        case USER_PHONE_NUMBER_CHANGED:
            stateCopy.user = {
                ...stateCopy.user,
                phone_number: action.payload
            }
            break
        case USER_EMAIL_CHANGED:
            stateCopy.user = {
                ...stateCopy.user,
                email: action.payload
            }
            break
        case APP_STATUS_CHANGED:
            stateCopy.loading = action.payload
            break
        default:
            return state;
    }
    return stateCopy
}

export default loginReducer