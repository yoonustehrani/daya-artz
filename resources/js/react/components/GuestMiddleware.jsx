import { useSelector } from "react-redux";
import { Redirect, useLocation } from "react-router";

function GuestMiddleware({location, exception}) {
    let current = useLocation(),
        user = useSelector(state => state.auth.user)
    let isException = exception.includes(current.pathname) || exception.includes(current.pathname + '/');
    if (user && (! isException)) {
        let { from } = location.state || { from: { pathname: "/" } }
        return <Redirect to={from}/>
    }
    return null;
}

export default GuestMiddleware