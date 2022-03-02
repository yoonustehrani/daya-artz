import { Spinner } from 'react-activity'
export default function Loading(props) {
    return (
        <div className="activity-container mb-2">
            <Spinner color="#999999" size={props.size ?? 34} speed={0.5} animating={true}/>
        </div>
    )
}