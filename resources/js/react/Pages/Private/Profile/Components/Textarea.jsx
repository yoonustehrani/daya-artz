import React, { Component } from 'react';

class Textarea extends Component {
    render() {
        let { title, value } = this.props
        return (
            <div className='field-item col-12 col-md-6'>
                <span>{title}:</span>
                <div className="input-group">
                    <textarea className="form-control"></textarea>
                </div>
            </div>
        );
    }
}

export default Textarea;