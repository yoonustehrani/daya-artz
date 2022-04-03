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
                    <a key={dep.id} href={`#${dep.name}`} onClick={getTickets.bind(this, dep.id, true)} className={`relative group my-3 py-2 px-4 rounded-md text-xl bg-indigo-100 duration-300 text-slate-900 hover:bg-indigo-300 ${dep.id === currentDepartment && "bg-indigo-300"}`}>
                        {dep.name}
                        <span className='group-hover:inline opacity-0 group-hover:opacity-100 w-max duration-300 absolute left-1/2 bg-slate-800 text-white -top-2 rounded-lg -translate-y-full -translate-x-1/2 px-4 py-2 text-sm tooltip'>{dep.about}</span>
                    </a>
                )) 
                : <p className='w-fit mx-auto mt-6'>دپارتمانی برای نمایش وجود ندارد</p>}
            </div>
        )
    }
}
