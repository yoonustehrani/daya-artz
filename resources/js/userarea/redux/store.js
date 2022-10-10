import rootReducer from './reducers';
import { logoutUser } from './actions'
import { configureStore } from '@reduxjs/toolkit'

const store = configureStore({
    reducer: rootReducer,
    devTools: process.env.NODE_ENV !== 'production'
})

export default store