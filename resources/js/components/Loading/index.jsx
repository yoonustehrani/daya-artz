import { Spinner } from 'react-activity';

function Loading ({ size = 72 }) {
    return <div style={{ width: "100%", display: 'flex', justifyContent: 'center', marginTop: '10px' }}><Spinner color="#8F60EC" size={size} speed={0.8} animating={true}/></div>
}

export default Loading;