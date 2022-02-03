import React, { Suspense } from 'react';
import { Switch } from 'react-router-dom';
// Main Routes
const Dashboard = React.lazy(() => import('../Pages/Private/Dashboard'))
const Orders = React.lazy(() => import('../Pages/Private/Orders'))
const Tickets = React.lazy(() => import('../Pages/Private/Tickets/Tickets'))
const Finance = React.lazy(() => import('../Pages/Private/Finance'))
const BrandInfo = React.lazy(() => import('../Pages/Private/Profile/BrandInfo'))
const RegisterInfo = React.lazy(() => import('../Pages/Private/Profile/RegisterInfo'))
const UserInfo = React.lazy(() => import('../Pages/Private/Profile/UserInfo'))
const Contracts = React.lazy(() => import('../Pages/Private/Contracts/Contracts'))
const ContractSample = React.lazy(() => import('../Pages/Private/Contracts/ContractSample'))
// SubRoutes
const Order = React.lazy(() => import('../Pages/Private/Orders/Order'))
const Ticket = React.lazy(() => import('../Pages/Private/Tickets/Ticket'))
const NewTicket = React.lazy(() => import('../Pages/Private/Tickets/NewTicket'))
const Invoices = React.lazy(() => import('../Pages/Private/Finance/Invoices/Invoices'))
const Invoice = React.lazy(() => import('../Pages/Private/Finance/Invoices/Invoice'))
const TicketsFaq = React.lazy(() => import('../Pages/Private/Tickets/TicketsFaq'))
const PreInvoices = React.lazy(() => import('../Pages/Private/Finance/Pre Invoices/PreInvoices'))
const PreInvoice = React.lazy(() => import('../Pages/Private/Finance/Pre Invoices/PreInvoice'))
const Bill = React.lazy(() => import('../Pages/Private/Finance/Bills/Bill'))
const Bills = React.lazy(() => import('../Pages/Private/Finance/Bills/Bills'))
const Transactions = React.lazy(() => import('../Pages/Private/Finance/Transactions/Transactions'))
const Discounts = React.lazy(() => import('../Pages/Private/Finance/Discounts/Discounts'))
const Contract = React.lazy(() => import('../Pages/Private/Contracts/Contract'))

// import LoaderComponent from '../components/LoaderComponent';

// Route component
import RouteWithSubRoutes from './RouteWithSubRoutes';
import LoaderComponent from '../components/LoaderComponent';

function PrivateRoutes() {
    const routes = [
        {
            path: '/dashboard',
            exact: true,
            CallableComponent: Dashboard,
        },
        {
            path: '/brandInfo',
            exact: true,
            CallableComponent: BrandInfo,
        },
        {
            path: '/registerInfo',
            exact: true,
            CallableComponent: RegisterInfo
        },
        {
            path: "/userInfo",
            exact: true,
            CallableComponent: UserInfo
        },
        {
            path: '/orders/:orderId',
            exact: true,
            CallableComponent: Order
        },
        {
            path: '/orders',
            exact: false,
            CallableComponent: Orders,
        },
        {
            path: '/finance/invoices/:invoiceId',
            exact: true,
            CallableComponent: Invoice
        },
        {
            path: '/finance/invoices',
            exact: true,
            CallableComponent: Invoices,
        },
        {
            path: '/finance/pre-invoices/:pre_invoiceId',
            exact: true,
            CallableComponent: PreInvoice
        },
        {
            path: '/finance/pre_invoices',
            exact: true,
            CallableComponent: PreInvoices
        },
        {
            path: '/finance/bills/:billId',
            exact: true,
            CallableComponent: Bill,
        },
        {
            path: '/finance/bills',
            exact: true,
            CallableComponent: Bills,
        },
        {
            path: '/finance/transactions',
            exact: true,
            CallableComponent: Transactions,
        },
        {
            path: '/finance/discounts',
            exact: true,
            CallableComponent: Discounts,
        },
        {
            path: '/finance',
            exact: true,
            CallableComponent: Finance
        },
        {
            path: '/tickets/new',
            exact: true,
            CallableComponent: NewTicket
        },
        {
            path: '/tickets/faq',
            exact: true,
            CallableComponent: TicketsFaq
        },
        {
            path: '/tickets/:ticketId([0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12})',
            exact: true,
            CallableComponent: Ticket
        },
        {
            path: '/tickets',
            exact: true,
            CallableComponent: Tickets
        },
        {
            path: "/contracts/:contractId",
            exact: true,
            CallableComponent: Contract
        },
        {
            path: "/contracts",
            exact: true,
            CallableComponent: Contracts
        },
        {
            path: "contract_sample",
            exact: true,
            CallableComponent: ContractSample
        }
    ]
    return (
        <Switch>
            <Suspense fallback={<LoaderComponent />}>
                {routes.map((mainRoute, i) => <RouteWithSubRoutes key={i} {...mainRoute}/>)}
            </Suspense>
        </Switch>
    );
}

export default PrivateRoutes;