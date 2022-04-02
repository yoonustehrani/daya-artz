import React, { Component } from 'react'
import LoaderComponent from '../../react/components/LoaderComponent'

export default class Departments extends Component {
    componentDidMount() {
        this.props.getDepartments()
    }
    
    render() {
        let { departments, currentDepartment, loadingDepartments, getTickets } = this.props
        return (
            <div className="flex flex-wrap justify-evenly w-full">
                {loadingDepartments ? <LoaderComponent size={30} /> 
                : departments && departments.length ? departments.map((dep, i) => (
                    <a key={i} href={`#dep`} onClick={getTickets.bind(this, dep)} className={`my-3 py-2 px-4 text-xl bg-indigo-100 text-slate-900 hover:bg-indigo-300 ${dep === currentDepartment && "bg-indigo-300"}`}>{dep}</a>
                )) 
                : <p>There is no department to show</p>}
            </div>
        )
    }
}
