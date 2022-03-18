import { Spinner } from 'react-activity';

function LoaderComponent() {
    return <div><Spinner color="#8F60EC" size={72} speed={0.8} animating={true}/></div>
}

export default LoaderComponent;