import React, { Component } from "react";
import FilterBox from "./FilterBox";
import Uploader from "./Uploader";
import axios from "axios";
import Gallery from "./Gallery";

class ReactFilePicker extends Component {
    constructor(props) {
        super(props)
        this.state = {
            files: [],
            selectedFiles: {},
            loading: true,
            url: this.props.searchUrl,
            pagination: {
                next_page_url: null
            },
            filters: {
                trash: false,
                orderDir: 'desc',
                orderBy: 'created_at',
                fileType: 'image',
                extention: 'all',
                selectAll: false,
                filterList: {
                    fileTypes: {
                        image: {extentions: ['jpeg', 'jpg', 'png', 'svg', 'gif'], icon: 'fas fa-image'},
                        video: {extentions:['mp4', 'mov', 'wmv', 'flv', 'avi', 'mkv'], icon: 'fas fa-video'},
                        audio: {extentions:['mp3', 'pcm', 'wav', 'aiff', 'aac', 'ogg', 'wma', 'falc'], icon: 'fas fa-microphone'}
                    }
                }
            },
            active: this.props.noToggle ?? false,
            noToggle: this.props.noToggle ?? false
        }
    }

    componentDidMount() {
        this.loadFiles()
    }

    selectAll = () => {
        this.setState(prev => ({
            selectedFiles: prev.filters.selectAll ? [] : prev.files.map(f => f.id),
            filters: {
                ...prev.filters,
                selectAll: ! prev.filters.selectAll
            }
        }))
    }

    makeQuery = () => {
        let { fileType, orderBy, orderDir, trash, extention} = this.state.filters
        let query = {
            type: fileType,
            order_by: orderBy,
            order_dir: orderDir,
        }
        if (trash) {
            query['trash'] = ''
        }
        if (extention !== 'all') {
            query['ext'] = extention
        }
        return Object.entries(query).map(([key, value]) => `${key}=${value}`).join('&')
    }

    onChangeFilter = payload => {
        this.setState(prev => ({
            filters: {...prev.filters, ...payload, selectAll: false},
            files: [],
            loading: true,
        }), this.loadFiles)
    }

    addFile = file => {
        this.setState(prev => ({
            files: [file, ...prev.files]
        }))
    }

    addFiles = files => {
        this.setState(prev => ({
            files: [...prev.files, ...files],
            loading: false
        }))
    }

    selectFileById = fileId => {
        let {handlePick} = this.props
        if (typeof handlePick !== 'undefined') {
            let file = this.state.files.filter(f => f.id === fileId).at(0)
            handlePick(file)
            return
        }
        if (this.props.targetInput) {
            let file = this.state.files.filter(f => f.id === fileId).at(0)
            let elem = document.getElementById(this.props.targetInput)
            elem.value = file.path
            return
        }
        let file = this.state.files.filter(f => f.id === fileId).at(0)
        this.setState(prev => {
            if (prev.selectedFiles[fileId]) {
                let filtered = Object.entries(prev.selectedFiles).filter(([key, value]) => key !== fileId);
                return {
                    selectedFiles: Object.fromEntries(filtered)
                }
            }
            return {
                selectedFiles: {...prev.selectedFiles, [fileId]: file}
            }
        }, () => {
            let selectedIdsAsString = Object.keys(this.state.selectedFiles).join(',')
            let targetInput = document.getElementsByName(this.props.targetInput)
            if (targetInput[0]) {
                targetInput[0].value = selectedIdsAsString
            }
        })
    }

    deleteFileById = async (fileId, forceDelete) => {
        let uri = this.props.fileUrl.replace('fileId', fileId)
        if (forceDelete) {
            uri += '?force_delete'
        }
        const response = await axios.delete(uri)
        if (response.data && response.data.okay) {
            this.setState(prev => ({
                files: prev.files.filter(f => f.id !== fileId)
            }))
        }
    }
    loadMore = () => {
        let {next_page_url} = this.state.pagination
        if (next_page_url) {
            this.loadFiles(next_page_url)
        }
    }

    loadFiles = async (uri = null) => {
        let { url } = this.state
        if (! uri) {
            uri = `${url}?${this.makeQuery()}`
        }
        try {
            const response = await axios.get(uri)
            let files = response.data.data
            this.addFiles(files)
        } catch (error) {
            console.log(error);
        }
    }

    handleClose = e => {
        if(e.target !== e.currentTarget || this.state.noToggle) return;
        this.setState({active: false})
    }

    render() {
        let {uploadUrl, searchUrl, fileUrl, editFormUrl, htmlIndex} = this.props
        let {files, selectedFiles, loading, pagination, filters, active} = this.state;
        return (
            <>
            <div className="flex justify-start items-center">
                <button type="button" onClick={() => this.setState({active: true})} className="btn bg-mango text-gray-900">
                    <i className="fas fa-image"></i>
                </button>
                <div className="w-full flex justify-start m-2">
                    {Object.values(selectedFiles).map(file => (
                        <img key={file.id} src={APP_PATH + file.path} width={50} className="m-3 aspect-square ring ring-blue-300"/>
                    ))}
                </div>
            </div>
            <div onClick={this.handleClose} className={`${active ? 'grid' : 'hidden'} bg-white/30 backdrop-blur-sm w-full absolute top-0 left-0 z-30 shadow-sm h-full place-items-center`}>
                <div className="bg-white shadow-lg p-8 rounded-md w-full md:w-4/5 h-4/5 overflow-x-hidden overflow-y-auto">
                    <div className="w-full float-left mb-5">
                        <FilterBox filters={filters} filter={this.onChangeFilter} selectedFiles={selectedFiles} searchUrl={searchUrl} bulkActions={true}/>
                        <Uploader onUpload={this.addFile} uploadUrl={uploadUrl} index={htmlIndex}/>
                        <div className="w-full xl:w-1/2 2xl:w-2/3 mt-1 flex justify-start items-center gap-2">
                            {Object.keys(selectedFiles).length > 0 && <span><i className="fas fa-check"></i></span>}
                            {Object.values(selectedFiles).map(file => (
                                <img key={file.id} src={APP_PATH + file.path} width={50} className="m-3 aspect-square ring ring-blue-300"/>
                            ))}
                        </div>
                    </div>
                    <div className="w-full">
                        {active &&
                            <Gallery 
                                selectedFiles={Object.keys(selectedFiles)}
                                onSelect={this.selectFileById}
                                onDelete={this.deleteFileById}
                                files={files}
                                fileUrl={fileUrl}
                                loading={loading} 
                                hasMore={pagination.next_page_url}
                                loadMore={this.loadMore}
                            />
                        }
                    </div>
                </div>
            </div>
            </>
        );
    }
}

export default ReactFilePicker