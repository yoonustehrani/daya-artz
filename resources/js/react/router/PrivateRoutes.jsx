import React, { Component } from 'react';
import { Switch } from 'react-router-dom';
// Main Routes
import Dashboard from '../Pages/Private/Dashboard';
import Orders from '../Pages/Private/Orders';
import Tickets from '../Pages/Private/Tickets/Tickets';
import Finance from '../Pages/Private/Finance';
import BrandInfo from '../Pages/Private/Profile/BrandInfo';
import RegisterInfo from '../Pages/Private/Profile/RegisterInfo';
import UserInfo from '../Pages/Private/Profile/UserInfo';
import Contracts from '../Pages/Private/Contracts/Contracts';
import ContractSample from '../Pages/Private/Contracts/ContractSample';
// SubRoutes
import Order from '../Pages/Private/Orders/Order';
import Ticket from '../Pages/Private/Tickets/Ticket';
import NewTicket from '../Pages/Private/Tickets/NewTicket';
import Invoices from '../Pages/Private/Finance/Invoices/Invoices';
import Invoice from '../Pages/Private/Finance/Invoices/Invoice';
import TicketsFaq from '../Pages/Private/Tickets/TicketsFaq';
import PreInvoices from '../Pages/Private/Finance/Pre Invoices/PreInvoices';
import PreInvoice from '../Pages/Private/Finance/Pre Invoices/PreInvoice';
import Bill from '../Pages/Private/Finance/Bills/Bill';
import Bills from '../Pages/Private/Finance/Bills/Bills';
import Transactions from '../Pages/Private/Finance/Transactions/Transactions';
import Discounts from '../Pages/Private/Finance/Discounts/Discounts';
import Contract from '../Pages/Private/Contracts/Contract';
// Route component
import RouteWithSubRoutes from './RouteWithSubRoutes';

class PrivateRoutes extends Component {
    routes = [
        {
            path: '/dashboard',
            exact: true,
            Component: Dashboard,
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
            path: "/userInfo",
            exact: true,
            Component: UserInfo
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
            path: '/finance/pre-invoices/:pre_invoiceId',
            exact: true,
            Component: PreInvoice
        },
        {
            path: '/finance/pre_invoices',
            exact: true,
            Component: PreInvoices
        },
        {
            path: '/finance/bills/:billId',
            exact: true,
            Component: Bill,
        },
        {
            path: '/finance/bills',
            exact: true,
            Component: Bills,
        },
        {
            path: '/finance/transactions',
            exact: true,
            Component: Transactions,
        },
        {
            path: '/finance/discounts',
            exact: true,
            Component: Discounts,
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
            path: '/tickets/faq',
            exact: true,
            Component: TicketsFaq
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
        {
            path: "/contracts/:contractId",
            exact: true,
            Component: Contract
        },
        {
            path: "/contracts",
            exact: true,
            Component: Contracts
        },
        {
            path: "contract_sample",
            exact: true,
            Component: ContractSample
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