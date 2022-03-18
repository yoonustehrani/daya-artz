import React, { Suspense, lazy } from 'react';
import { Redirect, Route, Switch } from 'react-router-dom';
import routes from '../routes';
import RouteWithSubRoutes from './RouteWithSubRoutes';
import LoaderComponent from '../components/LoaderComponent';

function PrivateRoutes() {
    const AppRoutes = routes
    return (
        <Suspense fallback={<LoaderComponent />}>
            <Switch>
                {AppRoutes.map((mainRoute, i) => <RouteWithSubRoutes key={i} {...mainRoute}/>)}
                <Route path="*" render={({location}) => <Redirect to={{ pathname: "/dashboard", state: {from: location, error: 404} }} />} />
            </Switch>
        </Suspense>
    );
}

export default PrivateRoutes;