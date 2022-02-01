import produce from 'immer';
import {
    actionTypes,
    logInUsingCredentials,
    registerUser,
    logoutUser,
    changeUserPhoneNumber,
    changeUserEmail,
    updateUserInfo,
    updateCustomerInfo
} from '../actions';

let {APP_STATUS_CHANGED, USER_LOGGED_IN, USER_VERIFIED_PHONE} = actionTypes

const defaultState = {
    loading: true,
    user: null
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
        case USER_VERIFIED_PHONE:
            draft.user = {
                ...draft.user,
                phone_verified: true
            }
            break
        case changeUserPhoneNumber.fulfilled.toString():
            draft.user = {
                ...draft.user,
                phone_number: action.payload.phone_number
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
        // default:
        //     return state;
    }
}, defaultState)

export default loginReducer