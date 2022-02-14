import produce from 'immer';
import {
    actionTypes,
    logInUsingCredentials,
    registerUser,
    logoutUser,
    changeUserPhoneNumber,
    changeUserEmail,
    updateUserInfo,
    updateCustomerInfo,
    resendBasedOnAuthMethod,
    verifyPhoneNumber
} from '../actions';

let {APP_STATUS_CHANGED, USER_LOGGED_IN, USER_VERIFIED_PHONE} = actionTypes

const defaultState = {
    loading: true,
    user: null,
    resend: {
        next_attempt_in_seconds: 0,
        left_attempts: 1
    }
}

const loginReducer = produce((draft, action) => {
    switch (action.type) {
        case logInUsingCredentials.fulfilled.toString():
        case registerUser.fulfilled.toString():
        case updateUserInfo.fulfilled.toString():
        case USER_LOGGED_IN:
        case updateCustomerInfo.fulfilled.toString():
            draft.user = action.payload
            break
        case logoutUser.fulfilled.toString():
            draft.user = null
            draft.loading = false
            break
        case logInUsingCredentials.rejected.toString():
            // action.payload contains the error data
            // console.log("action is ", action);
            break
        case logoutUser.pending.toString():
            draft.loading = true
            break
        case logoutUser.rejected.toString():
            draft.loading = false
            break
        case verifyPhoneNumber.fulfilled.toString():
            draft.user.phone_verified = !! action.payload.verified
            break
        case changeUserPhoneNumber.fulfilled.toString():
            draft.user.phone_number = action.payload.phone_number
            draft.resend = {
                next_attempt_in_seconds: 60,
                left_attempts: 3
            }
            break
        case changeUserPhoneNumber.rejected.toString():
            let {reason} = action.payload
            if (reason && reason === 'already_verified') {
                draft.user.phone_verified = true
            }
            break
        case changeUserEmail.fulfilled.toString():
            draft.user = {
                ...draft.user,
                email: action.payload.email
            }
            break
        case APP_STATUS_CHANGED:
            draft.loading = action.payload
            break
        case resendBasedOnAuthMethod.fulfilled.toString():
            draft.resend = action.payload
            break
        case resendBasedOnAuthMethod.rejected.toString():
            let {available_in} = action.payload
            if (available_in) {
                draft.resend.next_attempt_in_seconds = available_in
            }
            break
    }
}, defaultState)

export default loginReducer