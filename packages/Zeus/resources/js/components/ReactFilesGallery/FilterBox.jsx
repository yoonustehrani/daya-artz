import React, { Component } from 'react';
import {trashMode, resetFiles, changeFilter, deleteFileBulk, restoreFileBulk} from './actions'

class FilterBox extends Component {
    constructor(props) {
        super(props)
        this.trashBtnRef = React.createRef()
        this.fileTypeRef = React.createRef()
        this.extentionRef = React.createRef()
        this.state = {
            searchText: "",
            selectedAction: "1",
            bulkActions: [
                {
                    title: 'Move to trash',
                    icon: 'fas fa-trash',
                    action: deleteFileBulk,
                    enabled: () => true
                },
                {
                    title: 'Restore',
                    icon: 'fas fa-reset',
                    action: restoreFileBulk,
                    enabled: this.restoreCondition
                }
            ]
        }
    }
    
    prepareQuery = () => {
        let searchText = this.state.searchText.trim().replace(/\s{2,}/g, " ").replace(/\s/g, "+")
        let {searchUrl, filters} = this.props
        let {fileType, orderBy, sortBy, trash, extention} = filters
        let query = `${searchUrl}?type=${fileType}&order_by=${sortBy}&order=${orderBy}`
        query += searchText.length > 2 ? `&q=${searchText}` : ''
        query += trash ? '&trash=true' : ''
        query += extention !== "all" ? `&ext=${extention}` : ''
        return query
    }

    resetFilesState = () => this.props.dispatch(resetFiles(this.prepareQuery()))


    handleTrashToggle = () => {
        let {classList} = this.trashBtnRef.current
        classList.toggle('bg-gray-700')
        classList.toggle('text-white')
        this.props.filter({trash: ! this.props.filters.trash})
    }

    handleActionSubmit = () => {
        let action = this.state.bulkActions[Number(this.state.selectedAction) - 1].action()
        this.props.dispatch(action)
    }

    restoreCondition = () => this.props.filters.trash

    render() {
        let {searchText, bulkActions, selectedAction} = this.state
        let {selectedFiles, filters, filter} = this.props
        let {orderBy, fileType, filterList} = filters
        return (
            <div className="w-full xl:w-1/2 2xl:w-1/3 float-left px-3">
                <div className="flex mt-2 mt-lg-0 filter-searchbar">
                    <button type="button" className="flex-none btn-inline rounded-l-md bg-white inline" ref={this.trashBtnRef} onClick={this.handleTrashToggle} >
                        <i className="fas fa-trash-alt"></i>
                    </button>
                    <input type="search" className="grow simple-input-inline" value={searchText}
                    placeholder="3 characters or more (name or format)" 
                    onChange={(e) => this.setState({searchText: e.target.value})} 
                    // onKeyUp={(e) => (e.key == 'Enter') ? filter({}) : null}
                    />
                    <button type="button" className="flex-none btn-inline rounded-r-md bg-blue-500 text-white" disabled={searchText.length < 3}>
                        <i className="fas fa-search"></i>
                    </button>
                </div>
                <div className="bg-blue-100 border-2 border-blue-200 mt-2 py-2 shadow-md rounded-md">
                    <div className="w-full px-3 grid grid-col-1 lg:grid-cols-2 gap-4 mb-3">
                        <div>
                            <span>Sort By:</span>
                            <div className="form-check">
                                <div>
                                    <input className="form-radio mr-2" type="radio" name="order-by" id="name-radio" value="name" onChange={e => filter({orderBy: e.target.value})} />
                                    <label className="form-check-label pointer" htmlFor="name-radio">Name</label>
                                    <i className={`fas fa-sort-alpha-${orderBy === "asc" ? "down tada" : "up wobble"} ml-2 animated`}></i>
                                </div>
                                <div>
                                    <input className="form-radio mr-2" type="radio" name="order-by" id="date-radio" value="created_at" onChange={e => filter({orderBy: e.target.value})} defaultChecked/>
                                    <label className="form-check-label pointer" htmlFor="date-radio">date created</label>
                                    <i className={`fas fa-sort-numeric-${orderBy === "asc" ? "down tada" : "up wobble"} ml-2 animated`}></i>
                                </div>
                                {filters.trash && 
                                <div>
                                    <input className="form-radio mr-2" type="radio" name="order-by" id="deleted-date-radio" value="deleted_at" onChange={e => filter({orderBy: e.target.value})} />
                                    <label className="form-check-label pointer" htmlFor="deleted-date-radio">date deleted</label>
                                    <i className={`fas fa-sort-numeric-${orderBy === "asc" ? "down tada" : "up wobble"} ml-2 animated`}></i>
                                </div>}
                            </div>
                        </div>
                        <div>
                            <span>Order: </span>
                            <div className="form-check">
                                <div>
                                    <input className="form-radio mr-2" type="radio" name="order-dir" id="asc-radio" value="asc" onChange={e => filter({orderDir: e.target.value})} />
                                    <label className="form-check-label pointer" htmlFor="asc-radio">ascending</label>
                                </div>
                                <div>
                                    <input className="form-radio mr-2" type="radio" name="order-dir" id="desc-radio" value="desc" onChange={e => filter({orderDir: e.target.value})} defaultChecked/>
                                    <label className="form-check-label pointer" htmlFor="desc-radio">descending</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full px-3 grid grid-cols-1 lg:grid-cols-2 gap-4 mb-3 filter-options">
                        <div className="flex flex-column md:flex-row flex-nowrap items-start md:items-center justify-start">
                            <span className="mb-1 mb-md-0">File type: </span>
                            <select className="solid-select ml-2" id="file-type-select2" ref={this.fileTypeRef} defaultValue="image" onChange={e => filter({fileType: e.target.value})}>
                                {Object.keys(filterList.fileTypes).map((type, i) => (
                                    <option value={type} key={i} icon_name={filterList.fileTypes[type].icon}>{type}</option>
                                ))}
                            </select>
                        </div>
                        <div className="flex flex-column md:flex-row flex-nowrap items-start md:items-center justify-start format-select2">
                            <span className="mb-1 mb-md-0">Format: </span>
                            <select className="solid-select ml-2" id="file-format-select2" ref={this.extentionRef} defaultValue="all" onChange={e => filter({extention: e.target.value})}>
                                <option value="all">all</option>
                                {filterList.fileTypes[fileType].extentions.map((format, i) => (
                                    <option value={format} key={i}>{format}</option>
                                ))}
                            </select>
                        </div>
                    </div>
                    {/* {this.props.bulkActions &&
                        <div className={`w-full px-3 grid grid-cols-1 lg:grid-cols-2 gap-4 mb-3 ${selectedFiles.length < 1 ? 'hidden' : ''}`}>
                            <p className="float-left mr-2">
                                Bulk Actions 
                                <span className="inline-flex justify-center items-center h-5 w-5 mx-1 rounded-full bg-red-300">{selectedFiles.length}</span>
                                :
                            </p>
                            <select className="float-left" onChange={e => this.setState({selectedAction: e.target.value})} value={selectedAction}>
                                {bulkActions.map((action, i) => (
                                    <option disabled={! action.enabled()} key={i} value={i + 1}>{action.title}</option>
                                ))}
                            </select>
                            <button type="button" onClick={this.handleActionSubmit} className="btn bg-emerald-300">submit</button>
                        </div>
                    } */}
                </div>
            </div>
        );
    }
}

export default FilterBox;