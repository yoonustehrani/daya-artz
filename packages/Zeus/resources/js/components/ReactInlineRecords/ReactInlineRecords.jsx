import React, { Component } from 'react';
import axios from 'axios';

class ReactInlineRecords extends Component {
    constructor(props) {
        super(props)
        this.state = {
            rows: [],
            index: 0,
            loading: false
        }
    }
    handleAdd = () => {
        let {index} = this.state
        this.setState({loading: true})
        axios.get(this.props.targetURL, {params: {index}}).then(res => {
            this.setState(prev => ({
                rows: [...prev.rows, res.data.html],
                loading: false,
                index: prev.index + 1
            }))
            $(this.props.target).append(res.data.html)
        })
    }
    render() {
        let {loading} = this.state
        return (
            <>
                <button type="button" disabled={loading} className={`btn ${loading ? 'bg-gray-300' : 'btn-green'}`} onClick={this.handleAdd}>Add new</button>
            </>
        );
    }
}

export default ReactInlineRecords;