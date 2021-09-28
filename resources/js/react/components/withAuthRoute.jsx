import React, {Component} from 'react'
import { Redirect } from 'react-router-dom'
import { connect } from 'react-redux'

class WithAuthRoute extends Component {
    render() {
        let { user, WrappedComponent } = this.props
        return (
            <div>
                {(user) => {
                    let {path, exact, children} = this.props
                    return (
                        <WrappedComponent path={path} exact={exact} render={({location}) => user ? children : <Redirect to={{ pathname: "/login", state: {from: location} }}/> }/>
                    )
                }}
            </div>
        )
    }
}

const mapStateToProps = (state) => ({
    user: state.loginReducer.auth.user
})

export default connect(mapStateToProps)(WithAuthRoute)