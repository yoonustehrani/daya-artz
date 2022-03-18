import { produce } from "immer";
import { actionTypes, updateCompanyInfo } from "../actions";

const initialState = {
    company: null
}

const userReducer = produce((draft, action) => {
    switch (action.type) {
        case actionTypes.COMPANY_DETECTED:
        case updateCompanyInfo.fulfilled.toString():
            draft.company = action.payload
            break;
    }
}, initialState)

export default userReducer