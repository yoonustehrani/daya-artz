import { Spinner } from 'react-activity'
export default function Loading() {
    return (
        <div className="activity-container">
            <Spinner color="#999999" size={34} speed={0.5} animating={true}/>
        </div>
    )
}