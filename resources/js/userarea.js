import React from 'react'
import ReactDOM from 'react-dom'
import UserArea from './react/components/UserArea'


const elem = document.getElementById('main')

if (elem) {
    ReactDOM.render(
        <UserArea />,
        elem
    )
}