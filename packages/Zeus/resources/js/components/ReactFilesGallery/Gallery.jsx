import GalleryItem from './GalleryItem';

function Gallery ({loading, hasMore, files, selectedFiles, onSelect, onDelete, loadMore}) {
    return (
        <div className='w-full block'>
            <div className="w-full grid grid-flow-row grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                {files.map((file, i) => (
                    <GalleryItem
                        key={i}
                        restoreFile={null}
                        selectFile={true}
                        onSelect={() => onSelect(file.id)}
                        onDelete={() => onDelete(file.id, !! file.deleted_at)}
                        deleteFile={null}
                        selected={selectedFiles.includes(file.id)}
                        editFormUrl={null}
                        {...file} 
                    />
                ))}
            </div>
            {!loading && files.length === 0 && <div className="alert alert-light mt-4 w-100 text-center">No Item to show</div>}
            <div className={! hasMore ? 'hidden' : 'flex items-center justify-center pt-5'}>
                <button type='button' className='btn btn-green' onClick={loadMore} disabled={loading}>Load More</button>
            </div>
        </div>
    );
}

export default Gallery;