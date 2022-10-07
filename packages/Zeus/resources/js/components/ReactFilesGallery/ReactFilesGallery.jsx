import React, { Component } from 'react';
import Uploader from './Uploader';
import Gallery from './Gallery';
import FilterBox from './FilterBox';
import axios from 'axios'

class ReactFilesGallery extends Component {
    constructor(props) {
        super(props)
        this.state = {
            files: [],
            selectedFiles: [],
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
            }
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
            selectedFiles: []
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
        this.setState(prev => ({
            selectedFiles: prev.selectedFiles.includes(fileId) 
                ? prev.selectedFiles.filter(id => id !== fileId)
                : [...prev.selectedFiles, fileId]
        }))
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

    render() {
        let {uploadUrl, searchUrl, fileUrl, editFormUrl} = this.props
        let {files, selectedFiles, loading, pagination, filters} = this.state;
        return (
            <div>
                <div className='w-full float-left r-float'>
                    <FilterBox filters={filters} filter={this.onChangeFilter} selectedFiles={selectedFiles} searchUrl={searchUrl} bulkActions={true}/>
                    <Uploader uploadUrl={uploadUrl} onUpload={this.addFile}/>
                </div>
                <div className="w-full float-left p-2">
                    <button className="btn bg-gray-700 text-white float-right" onClick={this.selectAll}>{filters.selectAll ? 'un' : ''}select all</button>
                </div>
                <Gallery 
                    selectedFiles={selectedFiles}
                    onSelect={this.selectFileById}
                    onDelete={this.deleteFileById}
                    files={files}
                    fileUrl={fileUrl}
                    loading={loading} 
                    hasMore={pagination.next_page_url}
                    loadMore={this.loadMore}
                />
            </div>
        );
    }
}

export default ReactFilesGallery;

// dispatch = async (action) => {
//     var iniState = Object.assign({}, this.state);
//     let {fileUrl, restoreUrl} = this.props;
//     switch (action.type) {
//         case 'filter/change':
//             Object.assign(iniState.filters, action.payload)
//             break
//         case 'files/reset':
//             iniState.files = []
//             iniState.selectedFiles = []
//             iniState.filters.selectAll = false
//             iniState.defaultQuery = action.query
//             console.log(action.query);
//             this.mediaRef.current.reset()
//             break
//         case 'files/add':
//             iniState.files = (action.end) ? [...iniState.files, action.file] : [action.file, ...iniState.files]
//             break
//         case 'files/addMultiple':
//             iniState.files = [...iniState.files, ...action.files]
//             break
//         case 'file/delete':
//             if (action.softDeleted) {
//                 fileUrl += '?force_delete=true'
//             }
//             await Axios.delete(fileUrl.replace('fileId', action.fileId)).then((res) => { // await
//                 if (res.data.okay) {
//                     iniState.files = iniState.files.filter(x => x.id !== action.fileId)
//                 }
//             })
//             break
//         case 'file/restore':
//             await Axios.patch(restoreUrl.replace('fileId', action.fileId)).then(res => {
//                 if (res.data.okay && iniState.filters.trash) {
//                     iniState.files = iniState.files.filter(x => x.id !== action.fileId)
//                 }
//             })
//             break
//         case 'file/bulkRestore':
//             let id_requested = iniState.selectedFiles.join(',');
//             let restorePath = restoreUrl.replace('fileId', id_requested);
//             if (iniState.filters.trash) {
//                 await Axios.patch(restorePath).then(res => {
//                     iniState.files = iniState.files.filter(x => ! id_requested.includes(x.id))
//                     iniState.selectedFiles = []
//                     iniState.filters.selectAll = false
//                 })
//             }
//             break
//         case 'file/bulkDelete':
//             let id_request = iniState.selectedFiles.join(',');
//             let path = fileUrl.replace('fileId', id_request);
//             path += iniState.filters.trash ? '?force_delete=true' : ''
//             await Axios.delete(path).then(res => {
//                 iniState.files = iniState.files.filter(x => ! id_request.includes(x.id))
//                 iniState.selectedFiles = []
//                 iniState.filters.selectAll = false
//             })
//             break
//         case 'files/toggleSelect':
//             iniState.selectedFiles = iniState.selectedFiles.includes(action.fileId)
//             ? iniState.selectedFiles.filter(x => x !== action.fileId)
//             : [...iniState.selectedFiles, action.fileId];
//             break
//         case 'filter/toggleTrash':
//             iniState.filters.trash = ! iniState.filters.trash
//             break
//         case 'filter/toggleSelectAll':
//             iniState.filters.selectAll = ! iniState.filters.selectAll
//             iniState.selectedFiles = iniState.filters.selectAll ? iniState.files.map(file => file.id) : []
//             break
//         default:
//             break
//     }
//     this.setState(iniState)
//     return
// }
