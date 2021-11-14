import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class TicketRow extends Component {
    render() {
        let { title, ticket_number, created_at, department, status, href } = this.props, rowInfo = [ title, ticket_number, created_at, department, status ]
        
        return (
            <Link to={href} className="d-contents">
                <tr>
                        {rowInfo && rowInfo.length > 0 && rowInfo.map((row, i) => (
                            <td key={i}>{row}</td>
                        ))}
                </tr>
            </Link>
        );
    }
}

export default TicketRow;