import React, { Component, createRef } from 'react';
import axios from 'axios';
// import InfiniteScroll from 'react-infinite-scroll-component';
import GalleryItem from './GalleryItem';
import {addFiles} from './actions'

class PickerGallery extends Component {
    constructor(props) {
        super(props)
        this.state = {
            hasMore: true,
            loading: false,
            next_page: props.query
        }
        this.ref = createRef()
    }
    loadMore = () => {
        let {dispatch} = this.props
        if (this.state.hasMore) {
            this.setState({
                loading: true
            }, () => {
                axios.get(this.state.next_page).then(res => {
                    let { data, next_page_url } = res.data
                    this.setState({
                        hasMore: !! next_page_url,
                        loading: false,
                        next_page: next_page_url
                    }, () => {
                        dispatch(addFiles(data))
                    })
                })
            })
        }
    }

    reset = () => {
        this.setState({
            hasMore: true,
            loading: false,
            next_page: this.props.query,
        })
    }

    componentDidMount() {
        this.loadMore();
    }

    render() {
        let {files, dispatch, onFilePicked} = this.props
        let {hasMore, loading } = this.state

        return (
            <div className='w-full block'>
                <div ref={this.ref} className="w-full grid grid-flow-row grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    {files.map((file, i) => (
                        <GalleryItem
                            key={i}
                            restoreFile={false}
                            selectFile={false}
                            deleteFile={false}
                            dispatch={dispatch}
                            editFormUrl={null}
                            onClick={() => onFilePicked(file)}
                            {...file}
                        />
                    ))}
                </div>
                {!loading && files.length === 0 && <div className="alert alert-light mt-4 w-100 text-center">No Item to show</div>}
                <div className={! hasMore ? 'hidden' : 'flex items-center justify-center pt-5'}>
                    <button className='btn btn-green' onClick={this.loadMore} disabled={loading}>Load More</button>
                </div>
            </div>
        );
    }
}

export default PickerGallery;