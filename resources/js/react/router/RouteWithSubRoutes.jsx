import { Route, Switch } from 'react-router-dom';
import PrivateRoute from './PrivateRoute';

export default function RouteWithSubRoutes (path, exact, Component, subroutes, key) {
    return (
        <PrivateRoute path={path} exact={exact} key={key}>
            <Component subroutes={subroutes} />
            {subroutes && subroutes.length >= 1 && (
                <Switch>
                    {subroutes.map((sub, i) => (
                        RouteWithSubRoutes(sub.path, sub.exact, sub.Component, sub.subroutes, i)
                    ))}
                </Switch>
            )}
        </PrivateRoute>
    )
}