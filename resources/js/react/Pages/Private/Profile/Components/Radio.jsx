import React, { Component } from 'react';

class Radio extends Component {
    render() {
        let { title, value, options, name, path, onChangeHandler } = this.props
        console.log(value);
        return (
            <div className="field-item col-12 col-md-3">
                <span>{title}:</span>
                <div className="input-group mb-1">
                    {options.map((option, i) => {
                        let { text, id } = option
                        return (
                            <div className="form-check form-check-inline" key={i}>
                                <input type="radio" className="form-check-input" id={id} defaultChecked={value === id} name={name} onChange={(e) => onChangeHandler(path, e.target.id)} />
                                <label htmlFor={id} className="form-check-label mr-1">{text}</label>
                            </div>
                        )
                    })}
                </div>
            </div>
        );
    }
}

export default Radio;