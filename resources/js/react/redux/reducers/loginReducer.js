import {
    APP_STATUS_CHANGED,
    USER_LOGGED_IN,
    USER_LOGGED_OUT
} from "../actionTypes"

var stateCopy, defaultState = {
    loading: true,
    user: {name: 'Amir'}
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
        case APP_STATUS_CHANGED:
            stateCopy.loading = action.payload
            return stateCopy
        default:
            return state;
    }
}

export default loginReducer