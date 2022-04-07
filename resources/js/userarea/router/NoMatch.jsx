import { Redirect } from "react-router";

export default function NoMatch({redirect}) {
    return (
        <Redirect to={redirect}/>
    )
}