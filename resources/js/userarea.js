import React from 'react'
import {render} from 'react-dom'
import UserArea from './react/components/UserArea'
import { Provider } from 'react-redux';
import store from './react/redux/store';
import { checkAuth } from './react/redux/actions'

const elem = document.getElementById('main')

if (elem) {
    // elem.getAttribute('data-base-url')
    store.dispatch(checkAuth);
    render(
        <Provider store={store}>
            <UserArea />
        </Provider>,
        elem
    )
}