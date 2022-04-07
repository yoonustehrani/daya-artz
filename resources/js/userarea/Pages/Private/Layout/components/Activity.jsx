import { Spinner } from 'react-activity'

export default function Activity({size = 34}) {
    return (
        <div className="activity-container"><Spinner color="#6332df" size={size} /></div>
    );
};