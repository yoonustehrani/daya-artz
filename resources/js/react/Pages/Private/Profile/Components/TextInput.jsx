import React, { Component } from 'react';

class TextInput extends Component {
    render() {
        let { value, title, onChangeHandler, path, type="text", validate_types=null, not_null } = this.props
        return (
            <div className="field-item col-12 col-md-6">
                <span>{title}:</span>
                <div className="input-group">
                    <input type={type} className="form-control" value={value ?? ""} onChange={(e) => onChangeHandler(path, e.target, validate_types, title, not_null)} />
                </div> 
            </div>    
        );
    }
}

export default TextInput;