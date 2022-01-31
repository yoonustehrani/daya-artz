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
            path: '/tickets/:ticketId',
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
            {routes.map((mainRoute, i) => <RouteWithSubRoutes key={i} {...mainRoute}/>)}
        </Switch>
    );
}

export default PrivateRoutes;