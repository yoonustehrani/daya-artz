import { render } from "react-dom";
import TicketsContiner from "./ZeusTickets/TicketsContiner";
const elem = document.getElementById("react-ticket-element")

if (elem) {
    render(<TicketsContiner/>, elem)
}