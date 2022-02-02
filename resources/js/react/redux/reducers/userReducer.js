import { produce } from "immer";
import { actionTypes } from "../actions";

const initialState = {
    company: null
}

const userReducer = produce((draft, action) => {
    switch (action.type) {
        case actionTypes.COMPANY_DETECTED:
            draft.company = action.payload
            break;
    }
}, initialState)

export default userReducer