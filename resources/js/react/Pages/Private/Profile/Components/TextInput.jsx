import React, { Component } from 'react';

class TextInput extends Component {
    render() {
        let { value, title, onChangeHandler, path, type="text" } = this.props
        return (
            <div className="field-item col-12 col-md-6">
                <span>{title}:</span>
                <div className="input-group">
                    <input type={type} className="form-control" value={value} onChange={(e) => onChangeHandler(path, e.target.value)} />
                </div> 
            </div>    
        );
    }
}

export default TextInput;