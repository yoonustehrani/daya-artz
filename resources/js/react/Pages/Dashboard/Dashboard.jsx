import React, { Component } from 'react';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';
import { logOut } from '../../redux/actions';

class Dashboard extends Component {
    componentDidMount() {
        document.title = "Dashboard"
    }

    render() {
        let {user} = this.props
        return (
            <center>
                <h3>Welcome To Dashboard ! <button onClick={() => this.props.dispatch(logOut)}>Logout</button> </h3>
            </center>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

export default connect(mapStateToProps)(Dashboard);