import {lazy} from 'react';
// Main Routes
const Dashboard = lazy(() => import('./Pages/Private/Dashboard'))
const Orders = lazy(() => import('./Pages/Private/Orders'))
const OrderItemPage = lazy(() => import('./Pages/Private/Orders/OrderItemPage'))
const Tickets = lazy(() => import('./Pages/Private/Tickets/Tickets'))
// const Finance = lazy(() => import('./Pages/Private/Finance'))
const BrandInfo = lazy(() => import('./Pages/Private/Profile/BrandInfo'))
const RegisterInfo = lazy(() => import('./Pages/Private/Profile/RegisterInfo'))
const UserInfo = lazy(() => import('./Pages/Private/Profile/UserInfo'))
// const Contracts = lazy(() => import('./Pages/Private/Contracts/Contracts'))
// const ContractSample = lazy(() => import('./Pages/Private/Contracts/ContractSample'))
// SubRoutes
const Order = lazy(() => import('./Pages/Private/Orders/Order'))
const Ticket = lazy(() => import('./Pages/Private/Tickets/Ticket'))
const NewTicket = lazy(() => import('./Pages/Private/Tickets/NewTicket'))
const Invoices = lazy(() => import('./Pages/Private/Finance/Invoices/Invoices'))
const Invoice = lazy(() => import('./Pages/Private/Finance/Invoices/Invoice'))
const TicketsFaq = lazy(() => import('./Pages/Private/Tickets/TicketsFaq'))
const Transactions = lazy(() => import('./Pages/Private/Finance/Transactions/Transactions'))
const Discounts = lazy(() => import('./Pages/Private/Finance/Discounts/Discounts'))
const Contract = lazy(() => import('./Pages/Private/Contracts/Contract'))

const uuidRegex = '[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}'
const digitRegex = '[0-9]{1,}'

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
        path: '/orders',
        exact: true,
        CallableComponent: Orders,
    },
    {
        path: `/orders/:orderId(${uuidRegex})`,
        exact: true,
        CallableComponent: Order
    },
    {
        path: `/orders/:orderId(${uuidRegex})/items/:itemId(${digitRegex})`,
        exact: true,
        CallableComponent: OrderItemPage
    },
    {
        path: '/finance/invoices',
        exact: true,
        CallableComponent: Invoices,
    },
    {
        path: '/finance/invoices?active',
        exact: true,
        CallableComponent: Invoices,
    },
    {
        path: '/finance/invoices/:invoiceId',
        exact: true,
        CallableComponent: Invoice
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
    // {
    //     path: '/finance',
    //     exact: true,
    //     CallableComponent: Finance
    // },
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
        path: `/tickets/:ticketId(${uuidRegex})`,
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
    // {
    //     path: "/contracts",
    //     exact: true,
    //     CallableComponent: Contracts
    // },
    // {
    //     path: "/contract_sample",
    //     exact: true,
    //     CallableComponent: ContractSample
    // }
]


export default routes