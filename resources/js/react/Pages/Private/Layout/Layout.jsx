import Sidebar from './components/Sidebar';
import TopBackground from './components/TopBackground';
import Footer from './components/Footer';
import PrivateRoutes from '../../../router/PrivateRoutes';
import PrivateRoute from '../../../router/PrivateRoute';
import VerifiedMiddleware from '../../../components/VerifiedMiddleware';
import MenuToggle from './components/MenuToggle';

function Layout() {
    return (
        <PrivateRoute exact={false} path="/">
            <VerifiedMiddleware />
            <div className="user-area-layout-container">
                <TopBackground />
                <div className="user-area-panel">
                    <div className="main-content-container">
                        <PrivateRoutes />
                    </div>
                    <Sidebar /> 
                </div>
                <MenuToggle />
                <Footer />
            </div> 
        </PrivateRoute> 
    );
}

export default Layout;