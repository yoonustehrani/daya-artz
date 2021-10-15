import React, { Component } from 'react';
import { Switch } from 'react-router-dom';
// Main Routes
import Dashboard from '../Pages/Private/Dashboard';
import Profile from '../Pages/Private/Profile';
import Orders from '../Pages/Private/Orders';
import Tickets from '../Pages/Private/Tickets';
import Finance from '../Pages/Private/Finance';
// SubRoutes
import BrandInfo from '../Pages/Private/Profile/Subroutes/Brand/BrandInfo';
import GeneralInfo from '../Pages/Private/Profile/Subroutes/General/GeneralInfo';
import Order from '../Pages/Private/Orders/Subroutes/Order/Order';
import GeneralInvoiceInfo from '../Pages/Private/Finance/Subroutes/General/GeneralInvoiceInfo';
import Invoices from '../Pages/Private/Finance/Subroutes/invoices/Invoices';
import Invoice from '../Pages/Private/Finance/Subroutes/invoices/Invoice';
import Archive from '../Pages/Private/Tickets/Subroutes/Archive/Archive';
import Ticket from '../Pages/Private/Tickets/Subroutes/Archive/Ticket';
import NewTicket from '../Pages/Private/Tickets/Subroutes/New Ticket/NewTicket';
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
            path: '/profile',
            exact: false,
            Component: Profile,
            subroutes: [
                {
                    path: '/profile/brand',
                    exact: false,
                    Component: BrandInfo,
                    subroutes: [
                        {
                            path: '/profile/brand/test',
                            exact: false,
                            Component: () => (<h3>test</h3>),
                            subroutes: [
                                {
                                    path: '/profile/brand/test/kir',
                                    exact: false,
                                    Component: () => (<h3>kir</h3>),
                                },
                                
                                {
                                    path: '/profile/brand/test/kos',
                                    exact: true,
                                    Component: () => (<h3>kos</h3>),
                                }
                            ]
                        }
                    ]
                },
                {
                    path: '/profile/general',
                    exact: true,
                    Component: GeneralInfo
                }
            ]
        },
        {
            path: '/orders',
            exact: false,
            Component: Orders,
            subroutes: [
                {
                    path: '/orders/:orderId',
                    exact: true,
                    Component: Order
                }
            ]
        },
        {
            path: '/finance',
            exact: false,
            Component: Finance,
            subroutes: [
                {
                    path: '/finance/general',
                    exact: true,
                    Component: GeneralInvoiceInfo
                },
                {
                    path: '/finance/invoices',
                    exact: true,
                    Component: Invoices,
                    subroutes: [
                        {
                            path: '/finance/invoices/:invoiceId',
                            exact: true,
                            Component: Invoice
                        }
                    ]
                }
            ]
        },
        {
            path: '/tickets',
            exact: false,
            Component: Tickets,
            subroutes: [
                {
                    path: '/tickets/archive',
                    exact: true,
                    Component: Archive
                },
                {
                    path: '/tickets/:ticketId',
                    exact: true,
                    Component: Ticket
                },
                {
                    path: '/tickets/new',
                    exact: true,
                    Component: NewTicket
                }
            ]
        }
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