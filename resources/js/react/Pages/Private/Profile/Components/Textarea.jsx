import React, { Component } from 'react';

class Textarea extends Component {
    render() {
        let { title, value, onChangeHandler, path, validate_types=null, not_null } = this.props
        return (
            <div className='field-item col-12 col-md-6'>
                <span><i className='text-danger'>{not_null && "*"}</i>{title}:</span>
                <div className="input-group">
                    <textarea className="form-control" value={value} onChange={(e) => onChangeHandler(path, e.target, validate_types, title, not_null)}></textarea>
                </div>
            </div>
        );
    }
}

export default Textarea;