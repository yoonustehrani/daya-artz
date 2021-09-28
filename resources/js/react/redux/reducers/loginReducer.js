import {
    SHIFT_AUTH_STATE,
    HANDLE_LOGIN,
    SHIFT_AUTH_INPUT,
    CHANGE_LOGIN_METHOD,
    CHANGE_INPUT
} from "../actions/actionTypes"

var stateCopy, defaultState = {
    auth: {
        user: null,
        signup: {
            user_name: "",
            email: "",
            phone_number: "",
            password: "",
            rep_password: ""
        },
        login: {
            user_name: "",
            phone_number: "",
            password: ""
        },
        state: "signup",
        login_method: "email",
        isLoggingIn: false
    },
}

const copyState = (state) => {
    stateCopy = Object.assign({}, state)
}

const loginReducer = (state = defaultState, action) => {
    switch (action.type) {
        case HANDLE_LOGIN:
            copyState(state)

            return stateCopy

        case SHIFT_AUTH_STATE:
            copyState(state)
            stateCopy.auth.state = action.state
            return stateCopy

        case SHIFT_AUTH_INPUT:
            copyState(state)
            stateCopy.auth.isLoggingIn = !stateCopy.auth.isLoggingIn
            return stateCopy

        case CHANGE_LOGIN_METHOD:
            copyState(state)
            stateCopy.auth.login_method = stateCopy.auth.login_method === "email" ? "phone" : "email"
            return stateCopy

        case CHANGE_INPUT:
            copyState(state)
            stateCopy.auth[action.fieldType][action.field] = action.value
            return stateCopy
    
        default:
            return state;
    }
}

export default loginReducer