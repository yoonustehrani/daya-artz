import { produce } from "immer";

const initialState = {
    company: null
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