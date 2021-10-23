import React, { Component } from 'react';
import { normal } from '../../../../../components/select2'

class Select extends Component {
    constructor(props, context) {
        super(props, context);
        this.select2Ref = React.createRef()
    }
    
    componentDidMount() {
        $(this.select2Ref.current).select2(normal)
    }
    
    render() {
        let { options, title } = this.props
        return (
            <div className="field-item col-12 col-md-6">
                <span>{title}:</span>
                <div className="input-group">
                    <select className="form-control" ref={this.select2Ref}>
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