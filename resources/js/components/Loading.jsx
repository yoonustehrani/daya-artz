import { Spinner } from "react-activity";
import 'react-activity/dist/Spinner.css';

function Loading() {
    return (
        <div className="text-2xl p-3">
            <Spinner size={40} color="#D6851B"/>
        </div>
    );
}

export default Loading;