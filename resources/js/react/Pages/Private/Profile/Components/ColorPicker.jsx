import React, { Component } from 'react';

class ColorPicker extends Component {
    render() {
        let { title, value } = this.props
        return (
            <div className="color-picker-container field-item mr-md-3">
                <span>{title}:</span>
                <input type="color" />
            </div>
        );
    }
}

export default ColorPicker;