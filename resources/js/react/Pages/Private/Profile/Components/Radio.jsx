import React, { Component } from 'react';

class Radio extends Component {
    render() {
        let { title, value, options, name, path, onChangeHandler, validate_types=null, not_null, default_value } = this.props
        return (
            <div className="field-item col-12 col-md-3">
                <span><i className='text-danger'>{not_null && "*"}</i>{title}:</span>
                <div className="input-group mb-1">
                    {options.map((option, i) => {
                        let { text, id } = option
                        return (
                            <div className="form-check form-check-inline" key={i}>
                                <input type="radio" className="form-check-input" id={id} value={id}
                                defaultChecked={value === id || default_value === id} name={name}
                                onChange={(e) => onChangeHandler(path, e.target, validate_types, title, not_null)}
                                />
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