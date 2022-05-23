import React, { Component } from 'react';
import AlertService from '../../services/AlertService';
import { useHttpService } from '../../userarea/hooks';
import { Squares } from 'react-activity';

class changeStatus extends Component {
    state = {
        sending: false
    }

    componentDidMount() {
        this.http = useHttpService("")
        this.Alert = new AlertService({customClass: {container: "rtl"}, timer: 3000, showConfirmButton: false})
    }

    changeStatus = (status) => {
        let { ticketUrl, ticketId, changeStatus, statuses } = this.props, {sending} = this.state
        if (!sending) {
            this.setState({sending: true}, async () => {
                const res = await this.http.patch(ticketUrl.replace("ticketId", ticketId), {status: status})
                if (res.data.okay) {
                    changeStatus(statuses[status])
                    this.setState({sending: false})
                    this.Alert.success({title: "ثبت شد", text: `تغییر وضعیت تیکت به ${this.props.statuses[status]} با موفقیت ثبت شد`})
                }
            })
        }
    }
    
    render() {
        let { statuses, currentStatus } = this.props, {sending} = this.state
        return (
            <div className='flex justify-start items-center flex-wrap m-4'>
                <div className='mb-3 w-full flex justify-start items-center'>
                    <p className='font-bold inline-block w-fit ml-2'>تغییر وضعیت درخواست: </p>
                    {sending && <Squares size={24} color="#6332df"/>}
                </div>
                {statuses && Object.keys(statuses).length > 0 && Object.keys(statuses).map((statusKey, i) => (
                    <a className={`rounded-md py-2 px-6 hover:bg-blue-500 text-white duration-200 mx-3 my-2 ${currentStatus === statuses[statusKey] ? "bg-blue-500" : "bg-blue-300"}`} href="#" key={i} onClick={this.changeStatus.bind(this, statusKey)}>{statuses[statusKey]}</a>
                ))}
            </div>
        );
    }
}

export default changeStatus;