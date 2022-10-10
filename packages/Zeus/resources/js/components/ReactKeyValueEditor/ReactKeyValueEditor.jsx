import {Component} from 'react'

function* generateId() {
    let i = 1
    while (true) {
        yield i++
    }
}

class ReactKeyValueEditor extends Component {
    constructor(props) {
        super(props)
        this.state = { 
            data: []
        }
        this.uniqueId = generateId()
    }

    generateId = () => this.uniqueId.next().value

    exportObject = () => {
        let {data} = this.state
        let newObject = data.filter(obj => obj.key.length > 0)
        newObject = newObject.length > 0 ? JSON.stringify(Object.fromEntries(newObject.map(item => [item.key, item.value]))) : ""
        this.targetElement.value = newObject
    }

    addNewRow = () => {
        this.setState(prevState => ({
            data: [...prevState.data, {key: "", value: "", id: this.generateId()}]
        }))
    }

    onChangeValue = (value, id, col) => {
        let {data} = this.state, newData = data
        for (let i = 0; i < data.length; i++) {
            if (newData[i].id === id) {
                newData[i][col] = value
                break;
            }
        }
        this.setState({data: newData}, () => {
            this.exportObject()
        })
    }

    onDeleteRow = (id) => {
        this.setState(prevState => ({
            data: prevState.data.filter(obj => obj.id !== id)
        }), () => {
            this.exportObject()
        })
    }

    componentDidMount() {
        let {targetElement} = this.props
        this.targetElement = document.getElementsByName(targetElement)[0]
        try {
            let value = JSON.parse(this.targetElement.value), data = []
            Object.keys(value).map((key, i) => {
                data.push({key: key, value: value[key], id: this.generateId()})
            })
            this.setState({
                data: data
            })
        } catch (error) {
            
        }
    }

    render() {
        let {data} = this.state
        return (
            <div>
                <button type="button" className='btn bg-emerald-500 text-white hover:bg-emerald-600' onClick={this.addNewRow}>add <i className='far fa-plus ml-1'></i></button>
                <div className='p-3 lg:col-span-2'>
                    <table className='awesome-table table-auto w-full text-center'>
                        <thead>
                            <tr className='text-white'>
                                <th>#</th>
                                <th>key</th>
                                <th>value</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            {data && data.length > 0 && data.map((row, i) => (
                                <tr key={row.id}>
                                    <th>{i + 1}</th>
                                    <td><input type="text" className='simple-input' value={row.key} onChange={(e) => this.onChangeValue(e.target.value, row.id, "key")}/></td>
                                    <td><input type="text" className='simple-input' value={row.value} onChange={(e) => this.onChangeValue(e.target.value, row.id, "value")}/></td>
                                    <td><button type="button" className='btn btn-red' onClick={this.onDeleteRow.bind(this, row.id)}><i className='far fa-trash'></i></button></td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                    {!data || data.length <= 0 && <p className='text-center mt-2'>There is no data</p>}
                </div>
            </div>
        );
    }
}
 
export default ReactKeyValueEditor;