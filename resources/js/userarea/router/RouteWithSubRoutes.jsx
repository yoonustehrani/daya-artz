import { Route, Switch } from 'react-router-dom';
import PrivateRoute from './PrivateRoute';

export default function RouteWithSubRoutes ({path, exact, CallableComponent, subroutes, title }) {
    return (
        <PrivateRoute path={path} exact={exact} CallableComponent={CallableComponent} title={title}>
            {subroutes && subroutes.length >= 1 && (
                <Switch>
                    {subroutes.map((sub, i) => <RouteWithSubRoutes key={i} {...sub}/>)}
                </Switch>
            )}
        </PrivateRoute>
    )
}