import React, { Component } from 'react';
import { normal } from '../../../../../components/select2'

class Select extends Component {
    constructor(props, context) {
        super(props, context);
        this.select2Ref = React.createRef()
    }
    
    componentDidMount() {
        let { onChangeHandler, path, placeholder } = this.props
        $(this.select2Ref.current).select2(normal(placeholder))
        $(this.select2Ref.current).on("select2:select", (e) => {
            onChangeHandler(path, e.target.value)
        })
    }
    
    render() {
        let { options, title, value, onChangeHandler, path } = this.props
        return (
            <div className="field-item col-12 col-md-6">
                <span>{title}:</span>
                <div className="input-group">
                    <select className="form-control" ref={this.select2Ref} value={value} onChange={(e) => onChangeHandler(path, e.target.value)}>
                        <option value=""></option>
                        {options.map((option, i) => (
                            <option key={i} value={option.value}>{option.text}</option>
                        ))}
                    </select>
                </div>
            </div>
        );
    }
}

export default Select;