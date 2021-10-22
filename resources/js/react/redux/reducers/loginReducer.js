import {
    APP_STATUS_CHANGED,
    USER_LOGGED_IN,
    USER_LOGGED_OUT,
    USER_PHONE_NUMBER_CHANGED,
    USER_VERIFIED_PHONE
} from "../actionTypes"

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
        case USER_LOGGED_IN:
            stateCopy.user = action.payload
            return stateCopy
        case USER_LOGGED_OUT:
            stateCopy.user = null
            return stateCopy
        case USER_VERIFIED_PHONE:
            stateCopy.user = {
                ...stateCopy.user,
                phone_verified: true
            }
            return stateCopy
        case USER_PHONE_NUMBER_CHANGED:
            stateCopy.user = {
                ...stateCopy.user,
                phone_number: action.payload
            }
            return stateCopy
        case APP_STATUS_CHANGED:
            stateCopy.loading = action.payload
            return stateCopy
        default:
            return state;
    }
}

export default loginReducer