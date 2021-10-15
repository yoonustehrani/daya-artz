import React, { Component } from 'react';
import { Switch, Route } from 'react-router-dom';
// Main Routes
import Dashboard from '../Pages/Private/Dashboard';
import Orders from '../Pages/Private/Orders';
import Tickets from '../Pages/Private/Tickets';
import Finance from '../Pages/Private/Finance';
import BrandInfo from '../Pages/Private/Profile/BrandInfo'
import RegisterInfo from '../Pages/Private/Profile/RegisterInfo'
// SubRoutes
import Order from '../Pages/Private/Orders/Order';
import Ticket from '../Pages/Private/Tickets/Ticket';
import NewTicket from '../Pages/Private/Tickets/NewTicket';
import Invoices from '../Pages/Private/Finance/invoices/Invoices';
import Invoice from '../Pages/Private/Finance/invoices/Invoice';
// Route component
import RouteWithSubRoutes from './RouteWithSubRoutes';

class PrivateRoutes extends Component {
    routes = [
        {
            path: '/dashboard',
            exact: true,
            Component: Dashboard
        },
        {
            path: '/brandInfo',
            exact: true,
            Component: BrandInfo,
        },
        {
            path: '/registerInfo',
            exact: true,
            Component: RegisterInfo
        },
        {
            path: '/orders/:orderId',
            exact: true,
            Component: Order
        },
        {
            path: '/orders',
            exact: false,
            Component: Orders,
        },
        {
            path: '/finance/invoices/:invoiceId',
            exact: true,
            Component: Invoice
        },
        {
            path: '/finance/invoices',
            exact: true,
            Component: Invoices,
        },
        {
            path: '/finance',
            exact: true,
            Component: Finance
        },
        {
            path: '/tickets/new',
            exact: true,
            Component: NewTicket
        },
        {
            path: '/tickets/:ticketId',
            exact: true,
            Component: Ticket
        },

        {
            path: '/tickets',
            exact: true,
            Component: Tickets
        },
    ]   

    render() {
        let { routes } = this
        return (
            <Switch>
                {routes.map((mainRoute, i) => {
                    let { path, exact, Component, subroutes } = mainRoute
                    return (
                        RouteWithSubRoutes(path, exact, Component, subroutes, i)
                    )
                })}
            </Switch>
        );
    }
}

export default PrivateRoutes;