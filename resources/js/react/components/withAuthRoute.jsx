import React, {Component} from 'react'
import AuthContext from '../context/AutrhContext'
import { Redirect } from 'react-router-dom'

export default function withAuthRoute(WrappedComponent) {
    return class extends Component {
        render() {
            return (
                <AuthContext.Consumer>
                    {(auth) => {
                        let {path, exact, children} = this.props
                        return (
                            <WrappedComponent path={path} exact={exact} render={({location}) => auth.user ? children : <Redirect to={{ pathname: "/login", state: {from: location} }}/> }/>
                        )
                    }}
                </AuthContext.Consumer>
            )
        }
    }
}