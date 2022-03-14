import { StrictMode } from 'react'
import {render} from 'react-dom'
import UserArea from './react/components/UserArea'
import { Provider } from 'react-redux';
import store from './react/redux/store';
import { checkAuth, logoutUser } from './react/redux/actions'

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