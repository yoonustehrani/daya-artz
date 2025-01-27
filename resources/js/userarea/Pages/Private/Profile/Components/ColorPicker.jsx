import React, { Component } from 'react';

class ColorPicker extends Component {
    render() {
        let { title, value, path, onChangeHandler, validate_types=null, not_null, default_value } = this.props
        return (
            <div className="field-item col-12 col-md-3">
                <span><i className='text-danger'>{not_null && "*"}</i>{title}:</span>
                <div className="input-group">
                    <input type="color"
                        value={value ? value : default_value}
                        onChange={(e) => {
                            onChangeHandler(path, e.target, validate_types, title, not_null)
                        }} />
                </div>
            </div>
        );
    }
}

export default ColorPicker;