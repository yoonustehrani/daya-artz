import React, { Component } from 'react';
import ReactFilePicker from '../../../../../Zeus/resources/js/components/ReactFilesGallery/ReactFilePicker';

function* generateId() {
    let i = 1
    while (true) {
        yield i++
    }
}

class ReactImageExtension extends Component {
    constructor(props) {
        super(props)
        this.state = {
            picked: props.multiple ? [] : null
        }
        this.targetInput = props.target ? document.getElementsByName(props.target)[0] : null;
        this.uniqueId = generateId()
    }
    componentDidMount() {
        if (this.targetInput) {
            try {
                if (this.targetInput.value) {
                    let value = JSON.parse(this.targetInput.value)
                    this.setState(prev => ({
                        picked: value
                    }))
                }
            } catch (error) {
                console.log(error);
            }
        }
    }

    pickedImages = () => {
        if (this.state.picked === null) return [];
        return this.props.multiple ? this.state.picked : [this.state.picked]
    }

    updateTarget = () => {
        setTimeout(() => {
            let newValue = Object.assign({}, this.state.picked)
            // if (typeof newValue === 'object') {
            //     delete newValue['file']
            // }
            this.targetInput.value = newValue === null ? null : JSON.stringify(newValue)
        }, 500);
    }

    changeData = (imageId, key, value) => {
        this.setState(prev => {
            if (this.props.multiple) {
                return {
                    picked: prev.picked.map(image => {
                        if (image.id === imageId) {
                            return {...image, [key]: value}
                        }
                        return image
                    })
                }
            }
            return {picked: {...prev.picked, [key]: value}}
        }, this.updateTarget)
    }

    changeAlt = (imageId, e) => {
        this.changeData(imageId, 'alt', e.target.value)
    }

    changeTitle = (imageId, e) => {
        this.changeData(imageId, 'title', e.target.value)
    }

    handlePick = file => {
        let image = {
            id: 'fakeid-' + this.uniqueId.next().value,
            file_id: file.id,
            title: null,
            alt: null,
            caption: null,
            file
        }
        this.setState(prev => ({
            picked: this.props.multiple ? [...prev.picked, image] : image
        }), this.updateTarget)
    }

    handleRemove = imageId => {
        this.setState(prev => ({
            picked: this.props.multiple ? prev.picked.filter(x => x.id !== imageId) : null
        }), this.updateTarget)
    }

    render() {
        return (
            <div className='p-3'>
                <ReactFilePicker
                    searchUrl={API_PATH + "/files"}
                    fileUrl={API_PATH + "/files/fileId"}
                    uploadUrl={API_PATH + "/files"}
                    handlePick={this.handlePick}
                    htmlIndex='image-extension-zeus'
                />
                <div className='mt-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3'>
                {this.pickedImages().map(image => (
                    <div className='p-2 border border-zinc-300' key={image.id}>
                        <span className='w-8 h-8 text-salsa' onClick={this.handleRemove.bind(this, image.id)}>
                            <i className="fas fa-times"></i>
                        </span>
                        {image.file &&
                            <a className='flex flex-col justify-center' href={APP_PATH + image.file.path} target="_blank">
                                <img key={image.id} src={APP_PATH + image.file.thumbnail_path}/>
                                <span>{image.file.name}</span>
                            </a>
                        }
                        <div className='mt-2'>
                            <label htmlFor={`image-extension-image-no-${image.id}-alt`}>
                                <span className='text-gray-700'>alt :</span>
                            </label>
                            <input 
                                className='solid-input mt-1 ml-2' 
                                id={`image-extension-image-no-${image.id}-alt`} 
                                type="text"
                                onChange={this.changeAlt.bind(this, image.id)} 
                                value={image.alt ?? ''}
                            />
                        </div>
                        <div className='mt-2'>
                            <label htmlFor={`image-extension-image-no-${image.id}-title`}>
                                <span className='text-gray-700'>title :</span>
                            </label>
                            <input 
                                className='solid-input mt-1 ml-2' 
                                id={`image-extension-image-no-${image.id}-title`} 
                                type="text"
                                onChange={this.changeTitle.bind(this, image.id)} 
                                value={image.title ?? ''}
                            />
                        </div>
                    </div>
                ))}
                </div>
            </div>
        )
    }
}

export default ReactImageExtension;