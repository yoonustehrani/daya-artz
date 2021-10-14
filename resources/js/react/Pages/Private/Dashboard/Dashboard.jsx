import React, { Children, Component } from 'react';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';

class Dashboard extends Component {
    componentDidMount() {
        document.title = "Dashboard"
    }

    render() {
        let {user, children} = this.props
        return (
            <div>
                DASHBOARD
                {children}
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

export default connect(mapStateToProps)(Dashboard);