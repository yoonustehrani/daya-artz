import React, { Component } from 'react';

class TextInput extends Component {
    render() {
        let { value, title } = this.props
        return (
            <div className="field-item col-12 col-md-6">
                <span>{title}:</span>
                <div className="input-group">
                    <input type="text" className="form-control" value={value}/>
                </div> 
            </div>    
        );
    }
}

export default TextInput;