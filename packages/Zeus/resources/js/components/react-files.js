import React, {Suspense} from 'react';
import {render} from 'react-dom';

const ReactFilesGallery = React.lazy(() => import('./ReactFilesGallery'))
const ReactFilePicker   = React.lazy(() => import('./ReactFilesGallery/ReactFilePicker'))

function makeGallery(target) {
    let searchUrl = target.getAttribute("data-search"),
    fileUrl = target.getAttribute("data-file"),
    uploadUrl  = target.getAttribute("data-upload")
    
    render(
        <React.StrictMode>
            <Suspense fallback={<div>Loading Component...</div>}>
                <ReactFilesGallery 
                    searchUrl={searchUrl}
                    fileUrl={fileUrl}
                    uploadUrl={uploadUrl}
                />
            </Suspense>
        </React.StrictMode>,
        target
    )
}

function makeFilePicker(target, index) {
    let searchUrl = target.getAttribute("data-search"),
    uploadUrl  = target.getAttribute("data-upload"),
    targetInput = target.getAttribute("data-set-to")
    render(
        <Suspense fallback={<div>Loading Component...</div>}>
            <ReactFilePicker searchUrl={searchUrl} uploadUrl={uploadUrl} targetInput={targetInput} htmlIndex={index}/>
        </Suspense>,
        target
    )
}

const target = document.getElementById("react-files")

if (target) {
    makeGallery(target)
}

const targets = document.getElementsByClassName('react-file-picker')

if (targets.length) {
    let count = targets.length;
    for (let i = 0; i < count; i++) {
        let element = targets[i]
        makeFilePicker(element, i)
    }
}