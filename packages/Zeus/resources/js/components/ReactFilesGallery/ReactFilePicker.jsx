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
    //     return (
    //         <div>
    //             <div className='w-full float-left'>
    //                 <FilterBox filters={filters} filter={this.onChangeFilter} selectedFiles={selectedFiles} searchUrl={searchUrl} bulkActions={true}/>
    //                 <Uploader uploadUrl={uploadUrl} onUpload={this.addFile}/>
    //             </div>
    //             <div className="w-full float-left p-2">
    //                 <button className="btn bg-gray-700 text-white float-right" onClick={this.selectAll}>{filters.selectAll ? 'un' : ''}select all</button>
    //             </div>
    //             <Gallery 
    //                 selectedFiles={selectedFiles}
    //                 onSelect={this.selectFileById}
    //                 onDelete={this.deleteFileById}
    //                 files={files}
    //                 fileUrl={fileUrl}
    //                 loading={loading} 
    //                 hasMore={pagination.next_page_url}
    //                 loadMore={this.loadMore}
    //             />
    //         </div>
    //     );
    // }
// }
// class ReactFilePicker extends Component {
//     constructor(props) {
//         super(props)
//         this.state = {
//             files: [],
//             selectedFiles: [],
//             loading: false,
//             defaultQuery: this.props.searchUrl + '?type=image&order_by=created_at&order_dir=desc',
//             filters: {
//                 trash: false,
//                 orderBy: 'desc',
//                 sortBy: 'created_at',
//                 fileType: 'image',
//                 extention: 'all',
//                 selectAll: false,
//                 filterList: {
//                     fileTypes: {
//                         image: {extentions: ["jpeg", "jpg", "png", "svg", "gif"], icon: "fas fa-image"},
//                         video: {extentions:["mp4", "mov", "wmv", "flv", "avi", "mkv"], icon: "fas fa-video"},
//                         audio: {extentions:["mp3", "pcm", "wav", "aiff", "aac", "ogg", "wma", "falc"], icon: "fas fa-microphone"}
//                     }
//                 }
//             },
//             active: false,
//             selectedFile: null
//         }
//         this.mediaRef = createRef()
//         this.target = document.getElementById(this.props.targetInput)
//     }
//     componentDidMount() {
//         let {value} = this.target
//         this.setState({
//             selectedFile: value ? {path: value} : null
//         })
//     }
//     dispatch = async (action) => {
//         var iniState = Object.assign({}, this.state);
//         let {fileUrl, restoreUrl} = this.props;
//         switch (action.type) {
//             case 'filter/change':
//                 Object.assign(iniState.filters, action.payload)
//                 break
//             case 'files/reset':
//                 iniState.files = []
//                 iniState.selectedFiles = []
//                 iniState.filters.selectAll = false
//                 iniState.defaultQuery = action.query
//                 this.mediaRef.current.reset()
//                 break
//             case 'files/add':
//                 iniState.files = (action.end) ? [...iniState.files, action.file] : [action.file, ...iniState.files]
//                 break
//             case 'files/addMultiple':
//                 iniState.files = [...iniState.files, ...action.files]
//                 break
//             case 'file/delete':
//                 if (action.softDeleted) {
//                     fileUrl += '?force_delete=true'
//                 }
//                 await Axios.delete(fileUrl.replace('fileId', action.fileId)).then((res) => { // await
//                     if (res.data.okay) {
//                         iniState.files = iniState.files.filter(x => x.id !== action.fileId)
//                     }
//                 })
//                 break
//             case 'file/restore':
//                 await Axios.patch(restoreUrl.replace('fileId', action.fileId)).then(res => {
//                     if (res.data.okay && iniState.filters.trash) {
//                         iniState.files = iniState.files.filter(x => x.id !== action.fileId)
//                     }
//                 })
//                 break
//             case 'file/bulkRestore':
//                 let id_requested = iniState.selectedFiles.join(',');
//                 let restorePath = restoreUrl.replace('fileId', id_requested);
//                 if (iniState.filters.trash) {
//                     await Axios.patch(restorePath).then(res => {
//                         iniState.files = iniState.files.filter(x => ! id_requested.includes(x.id))
//                         iniState.selectedFiles = []
//                         iniState.filters.selectAll = false
//                     })
//                 }
//                 break
//             case 'file/bulkDelete':
//                 let id_request = iniState.selectedFiles.join(',');
//                 let path = fileUrl.replace('fileId', id_request);
//                 path += iniState.filters.trash ? '?force_delete=true' : ''
//                 await Axios.delete(path).then(res => {
//                     iniState.files = iniState.files.filter(x => ! id_request.includes(x.id))
//                     iniState.selectedFiles = []
//                     iniState.filters.selectAll = false
//                 })
//                 break
//             case 'files/toggleSelect':
//                 iniState.selectedFiles = iniState.selectedFiles.includes(action.fileId)
//                 ? iniState.selectedFiles.filter(x => x !== action.fileId)
//                 : [...iniState.selectedFiles, action.fileId];
//                 break
//             case 'filter/toggleTrash':
//                 iniState.filters.trash = ! iniState.filters.trash
//                 break
//             case 'filter/toggleSelectAll':
//                 iniState.filters.selectAll = ! iniState.filters.selectAll
//                 iniState.selectedFiles = iniState.filters.selectAll ? iniState.files.map(file => file.id) : []
//                 break
//             default:
//                 break
//         }
//         this.setState(iniState)
//         return
//     }
//     handleClickOnFile = file => {
//         if (this.target) {
//             this.target.value = file.path
//             this.setState({
//                 selectedFile: file,
//                 active: false
//             })
//         }
//     }
//     handleClose = (e) => {
        // if(e.target !== e.currentTarget) return;
        // this.setState({
        //     active: false,
        //     files: []
        // })
//     }
//     handleUnSelect = () => {
//         if (this.target) {
//             this.target.value = null
//             this.setState({
//                 selectedFile: null,
//                 active: true
//             })
//         }
//     }
//     render() {
//         let {uploadUrl, searchUrl, htmlIndex, fileUrl, restoreUrl, editFormUrl} = this.props
//         let {filters, files, defaultQuery, active, selectedFile} = this.state 
//         return (
//             <>
//             <div className="flex justify-start items-center">
//                 <button type="button" onClick={() => this.setState({active: true})} className="btn bg-mango text-gray-900">
//                     <i className="fas fa-image"></i>
//                 </button>
//                 {selectedFile && 
//                     <img src={APP_PATH + selectedFile.path} width={100} onClick={this.handleUnSelect} className="m-3 aspect-square ring ring-blue-300"/>
//                 }
//             </div>
//             <div className={`${active ? 'grid' : 'hidden'} bg-white/30 backdrop-blur-sm w-full absolute top-0 left-0 z-30 shadow-sm h-full place-items-center`} onClick={this.handleClose}>
//                 <div className="bg-white shadow-lg p-8 rounded-md w-full md:w-4/5 h-4/5 overflow-x-hidden overflow-y-auto">
//                     <div className="w-full float-left mb-5">
//                         <FilterBox 
//                             filters={filters} 
//                             searchUrl={searchUrl}
//                             dispatch={this.dispatch}
//                             bulkActions={false}
//                         />
//                         <Uploader dispatch={this.dispatch} uploadUrl={this.props.uploadUrl} index={htmlIndex}/>
//                     </div>
//                     <div className="w-full">
//                         {active &&
//                             <PickerGallery files={files} query={defaultQuery} dispatch={this.dispatch} onFilePicked={this.handleClickOnFile} bulkActions={false}/>
//                         }
//                     </div>
//                 </div>
//             </div>
//             </>
//         );
//     }
// }

