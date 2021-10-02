import {
    APP_READY,
    HANDLE_LOGIN,
} from "../actions/actionTypes"

var stateCopy, defaultState = {
    user: null,
    loading: true
}

const copyState = (state) => {
    stateCopy = Object.assign({}, state)
}

const loginReducer = (state = defaultState, action) => {
    copyState(state)
    switch (action.type) {
        case HANDLE_LOGIN:
            stateCopy.user = action.loginInfo
            return stateCopy
        case APP_READY:
            stateCopy.loading = false
            return stateCopy
        default:
            return state;
    }
}

export default loginReducer