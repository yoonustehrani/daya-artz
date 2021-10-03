import React, { Component } from 'react';
import { Route } from 'react-router';
import { Redirect } from 'react-router-dom'
import { connect } from 'react-redux'


class PrivateRoute extends Component {
    render() {
        let {path, children, user} = this.props
        return (
            <div>
                <Route path={path} render={({location}) => user
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
