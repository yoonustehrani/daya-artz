import { render } from "react-dom";
import TicketsContiner from "./ZeusTickets/TicketsContiner";

const elem = document.getElementById("react-ticket-element"),
getDepartmentsUrl = elem.getAttribute("data-departments"),
getTicketsUrl = elem.getAttribute("data-tickets"),
getTicketUrl = elem.getAttribute("data-ticket"),
sendmessagesUrl = elem.getAttribute("data-message"),
passedUrls = {getDepartmentsUrl: getDepartmentsUrl, getTicketsUrl: getTicketsUrl, getTicketUrl: getTicketUrl, sendmessagesUrl: sendmessagesUrl}

if (elem) {
    render(<TicketsContiner {...passedUrls} />, elem)
}