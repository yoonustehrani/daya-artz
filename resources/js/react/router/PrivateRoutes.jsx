import React, { Suspense, lazy } from 'react';
import { Switch } from 'react-router-dom';
import routes from '../routes';
// import LoaderComponent from '../components/LoaderComponent';

// Route component
import RouteWithSubRoutes from './RouteWithSubRoutes';
import LoaderComponent from '../components/LoaderComponent';

function PrivateRoutes() {
    const AppRoutes = routes
    return (
        <Switch>
            <Suspense fallback={<LoaderComponent />}>
                {AppRoutes.map((mainRoute, i) => <RouteWithSubRoutes key={i} {...mainRoute}/>)}
            </Suspense>
        </Switch>
    );
}

export default PrivateRoutes;