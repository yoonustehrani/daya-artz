import React, { Component } from 'react';
import AlertService from '../../services/AlertService';
import { useHttpService } from '../../userarea/hooks';

class changeStatus extends Component {
    state = {
        statuses: []
    }

    componentDidMount() {
        // this.http = useHttpService("")
        // const response = await this.http.get("/get_statuses_api")
        // if (response) {
        //     this.setState({statuses: response.data})
        // }
    }

    changeStatus = (status) => {
        // const res = await this.http.post({status: status})
        // if (res.okay) {
        //     (new AlertService).success({title: "ثبت شد", message: "تغییر وضعیت درخواست شما با موفقیت ثبت شد"})
        // }
    }
        
    render() {
        let { statuses } = this.state, { ticketId } = this.props
        return (
            <div className='flex justify-center items-center flex-wrap m-4'>
                <p className='w-full font-bold'>تغییر وضعیت درخواست: </p>
                {statuses && statuses.length > 0 && statuses.map((status, i) => (
                    <a className='rounded-md p-3 bg-indigo-400 hover:bg-indigo-600 text-white duration-200 mx-4' href="#" key={i} onClick={this.changeStatus.bind(this, status)}>{status}</a>
                ))}
            </div>
        );
    }
}

export default changeStatus;