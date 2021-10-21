import { useSelector } from "react-redux";
import { Redirect, useLocation } from "react-router";

function VerifiedMiddleware() {
    let location = useLocation(),
        user = useSelector(state => state.auth.user)
    let {email_verified_at, phone_verified, email} = user;
    // should be redirected
    if (! email_verified_at && ! phone_verified) {
        let redirect_path = `/auth/verification/${email && ! email_verified_at ? 'email' : 'phone'}`
        return <Redirect to={{ pathname: redirect_path, state: {from: location} }} />
    }
    return null;
}

export default VerifiedMiddleware