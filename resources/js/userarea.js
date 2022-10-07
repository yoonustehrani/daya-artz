import { StrictMode } from 'react'
import {render} from 'react-dom'
import UserArea from './userarea/components/UserArea'
import { Provider } from 'react-redux';
import store from './userarea/redux/store';
import { checkAuth, logoutUser } from './userarea/redux/actions'

const elem = document.getElementById('main')

if (elem) {
    render(
        <StrictMode>
            <Provider store={store}>
                <UserArea />
            </Provider>
        </StrictMode>,
        elem,
        () => {
            window.dispatchLogout = function () {
                store.dispatch(logoutUser())
            }
            store.dispatch(checkAuth)
        }
    )
}