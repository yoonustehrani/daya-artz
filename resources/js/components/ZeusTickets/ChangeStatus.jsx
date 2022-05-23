import React, { Component } from 'react';
import AlertService from '../../services/AlertService';
import { useHttpService } from '../../userarea/hooks';

class changeStatus extends Component {
    componentDidMount() {
        this.http = useHttpService("")
    }

    changeStatus = async (status) => {
        let { ticketUrl, ticketId } = this.props
        console.log(ticketUrl.replace("ticketId", ticketId), ticketId);
        const res = await this.http.patch(ticketUrl.replace("ticketId", ticketId), {status: status})
        if (res.okay) {
            (new AlertService).success({title: "ثبت شد", message: "تغییر وضعیت درخواست شما با موفقیت ثبت شد"})
        }
    }
    
    render() {
        let { ticketId, statuses, currentStatus } = this.props
        return (
            <div className='flex justify-start items-center flex-wrap m-4'>
                <p className='w-full font-bold mb-3'>تغییر وضعیت درخواست: </p>
                {statuses && Object.keys(statuses).length > 0 && Object.keys(statuses).map((statusKey, i) => (
                    <a className={`rounded-md py-2 px-6 hover:bg-blue-500 text-white duration-200 mx-3 my-2 ${currentStatus === statuses[statusKey] ? "bg-blue-500" : "bg-blue-300"}`} href="#" key={i} onClick={this.changeStatus.bind(this, statusKey)}>{statuses[statusKey]}</a>
                ))}
            </div>
        );
    }
}

export default changeStatus;