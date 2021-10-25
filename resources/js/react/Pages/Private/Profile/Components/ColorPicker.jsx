import React, { Component } from 'react';

class ColorPicker extends Component {
    render() {
        let { title, value, path, onChangeHandler } = this.props
        return (
            <div className="field-item col-12 col-md-3">
                <span>{title}:</span>
                <div className="input-group"><input type="color" value={value} onChange={(e) => onChangeHandler(path, e.target.value)} /></div>
            </div>
        );
    }
}

export default ColorPicker;