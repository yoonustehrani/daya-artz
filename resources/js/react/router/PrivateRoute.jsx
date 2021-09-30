import React, { Component } from 'react';
import { Route } from 'react-router';
import { Redirect } from 'react-router-dom'
import { connect } from 'react-redux'


class PrivateRoute extends Component {
    render() {
        let {path, exact, children, user} = this.props
        return (
            <div>
                <Route path={path} exact={exact} render={({location}) => user
                    ? children 
                    : <Redirect to={{ pathname: "/login", state: {from: location} }}/>
                }
                />
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})
export default connect(mapStateToProps)(PrivateRoute)
