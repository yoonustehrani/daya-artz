import React, { Component } from 'react';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';

class Dashboard extends Component {
    componentDidMount() {
        document.title = "Dashboard"
    }

    render() {
        let {user} = this.props

        return (
            <div>
                <p>Welcome {user.name} !</p>
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

export default connect(mapStateToProps)(Dashboard);