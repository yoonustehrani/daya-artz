import React, { Component } from 'react';

class ColorPicker extends Component {
    render() {
        let { title, value, path, onChangeHandler, validate_types=null, not_null } = this.props
        return (
            <div className="field-item col-12 col-md-3">
                <span>{title}:</span>
                <div className="input-group"><input type="color" value={value} onChange={(e) => onChangeHandler(path, e.target, validate_types, title, not_null)} /></div>
            </div>
        );
    }
}

export default ColorPicker;