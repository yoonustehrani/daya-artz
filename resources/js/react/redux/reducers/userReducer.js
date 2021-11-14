import { produce } from "immer";

const initialState = {
    company: null,
    customer: null,
    test: false
}

const userReducer = produce((draft, action) => {
    switch (action.type) {
        case 'test':
            draft.test = true
            break;
        default:
            break;
    }
}, initialState)

export default userReducer