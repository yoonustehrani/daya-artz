import {toggleSelectFile, deleteFile, restoreFile} from './actions'

export default function GalleryItem({ id, path, thumbnail_path, name, ext, deleted_at, selected, selectFile, onClick, onSelect, onDelete }) {
    function toggleCheck(e) {
        if(e.target !== e.currentTarget || !selectFile) return;
        onSelect()
    }
    return (
        <div>
            <div className="img-container w-full aspect-square relative rounded-md overflow-hidden">
                <img src={`${APP_PATH}${thumbnail_path}`}  className='w-full h-full'/>
                {selectFile && <input type="checkbox" className={`duration-500 ease-in-out absolute z-20 top-1 left-1 ${selected ? 'block' : 'hidden'}`} onChange={toggleCheck} checked={selected}/>}
                <div className="duration-300 ease-in-out absolute z-10 flex flex-col items-center justify-center text-center w-full h-full bg-black bg-opacity-80 top-0 -left-full" 
                onClick={onClick || toggleCheck}>
                    <p>
                        <a href={`${APP_PATH}${path}`} target="_blank" className="hover:cursor-pointer btn-sm bg-mango m-1" data-lity data-lity-desc={name}>
                            <i className="fas fa-eye"></i>
                        </a>
                        {/* <a className="hover:cursor-pointer btn-sm bg-blue-yonder m-1" href={editFormUrl} data-lity><i className="fas fa-info"></i></a> */}
                        <button type='button' title={`delete ${deleted_at ? 'forever': ''}`} className="hover:cursor-pointer btn-sm btn-red m-1" onClick={onDelete}>
                            <i className={`fas ${deleted_at ? 'fa-fire' : 'fa-trash'}`}></i>
                        </button>
                        {/* {deleted_at &&
                            <button title="restore" className="hover:cursor-pointer btn-sm bg-blue-400 m-1" onClick={() => dispatch(restoreFile(id))}><i className="fas fa-undo"></i></button>
                        } */}
                    </p>
                    <br />
                    <p className="text-center text-sm w-full text-ghost-white">{name}.{ext}</p>
                </div>
            </div>
        </div>
    )
}