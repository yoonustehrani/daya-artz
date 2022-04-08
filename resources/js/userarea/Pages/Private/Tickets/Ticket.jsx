import React, { Component } from 'react';
// custom components
import Activity from '../Layout/components/Activity'
import TicketTopNav from './components/TicketTopNav';
import TicketMessages from './components/TicketMessages';
import TicketInputs from './components/TicketInputs';
import { useHttpService } from '../../../hooks';
import AlertService from '../../../../services/AlertService';

class Ticket extends Component {
    constructor(props) {
        super(props)
        this.state = {
            loading: true,
            ticket: null,
            messages: [],
            hasMore: false,
            next_page_url: null,
            loading_messages: false,
            new_message: "",
            sending: false,
            files: []
        }
        this.http = useHttpService('/userarea/')
    }
    setNewMessage = (e) => {
        this.setState({
            new_message: e.target.value
        })
    }
    sendMessage = (e) => {
        e.preventDefault()
        let { new_message, sending } = this.state
        if (new_message.length > 0 && ! sending) {
            this.setState({
                sending: true
            }, async () => {
                const response = await this.http.put(`tickets/${this.props.params.ticketId}`, {message: new_message})
                if (response.okay) {
                    this.setState(prevState => ({
                        new_message: "",
                        sending: false,
                        messages: [
                            ...prevState.messages,
                            response.message
                        ],
                    }))
                    return
                }
                this.setState({sending: false})
            })
        }
    }
    loadTicket = async () => {
        let {ticketId} = this.props.params,
        url = this.state.next_page_url ?? `tickets/${ticketId}`,
        appends = {}
        const {ticket, messages} = await this.http.get(url)
        if (this.state.ticket === null) {
            appends = {ticket, loading: false};
            document.title = `${ticket.title} |‌ پشتیبانی دایا آرتز`
        }
        this.setState(prev => {
            let newMessages = messages.data.sort((a,b) => new Date(a.created_at) >= new Date(b.created_at) ? 1 : -1)
            return {
                ...appends,
                loading_messages: false,
                next_page_url: messages.next_page_url,
                hasMore: messages.next_page_url !== null,
                messages: newMessages.concat([...prev.messages])
            }
        })
    }
    loadMore = () => {
        this.setState({
            loading_messages: true
        }, this.loadTicket)
    }
    onFileSelect = (e) => {
        let newEntries = [], files_size = 0, acceptableType = true, { files } = this.state
        Array.prototype.push.apply(newEntries, e.target.files)
        const regex = /image\/\bjpg\b|\bpng\b|\bjpeg\b/
        files ? newEntries = files.concat(newEntries) : null
        for (let i = 0; i < newEntries.length; i++) {
            let elem  = newEntries[i]
            files_size += elem.size
            acceptableType = regex.test(elem.type)
            if (!acceptableType) {
                this.Alert.error({title: "فرمت فایل", text: "فقط فرمت های jpg, jpeg و png قابل قبول هستند."})
                break
            }   
        }
        if (acceptableType) {
            if (newEntries.length > 3) {
                this.Alert.error({title: "تعداد فایل", text: "حد اکثر تعداد فایل های انتخابی 3 عدد می باشد." })
            } else if (files_size > 12582912/*12 megabyte*/) {
                this.Alert.error({title: "حجم فایل های انتخابی", text: "حد اکثر حجم فایل های انتخابی 12 مگابایت می باشد." })
            } else {
                this.setState({
                    files: newEntries
                }, () => {
                    $('#image-input').val("")
                })
            }
        }
    }
    deleteFile = (index) => {
        let { files } = this.state
        files.splice(index, 1)
        this.setState({
            files: files
        })
    }
    componentDidMount() {
        document.title = `Ticket No ${this.props.params.ticketId}`
        this.loadTicket()
        this.Alert = new AlertService({
            showConfirmButton: true, confirmButtonText: "بستن", customClass: {container: "rtl"}
        })
    }
    render() {
        let { loading, ticket, new_message, sending, messages, hasMore, current_page, loading_messages, files } = this.state
        return (
            ! loading && ticket !== null
            ?   <div className='ticket-container'>
                    <TicketTopNav {...ticket}/>
                    <TicketMessages messages={messages} hasMore={hasMore} current_page={current_page} loading_messages={loading_messages} loadMore={this.loadMore} />
                    {ticket.messaging_is_allowed 
                    ? <TicketInputs messageText={new_message} setNewMessage={this.setNewMessage} sendMessage={this.sendMessage} sending={sending} files={files} deleteFile={this.deleteFile} onFileSelect={this.onFileSelect} />
                    :   <div className='alert alert-info'>
                            <p className='m-0'>در این درخواست پشتیبانی بدلیل وضعیت فعلی تیکت مجاز به ارسال پیام نیستید. می توانید در صورت لزوم مراتب را از طریق تماس با پشتیبانی رفع رجوع کنید.</p>
                        </div>
                    }
                </div>
            :   <Activity/> 
        );
    }
}

export default Ticket;