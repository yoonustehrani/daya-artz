import React, { Component, useEffect } from 'react'
import Dropzone from "dropzone"
// import {addFile} from './actions'

export default function Uploader({onUpload, uploadUrl, index = ""}) {
    useEffect(() => {
        let token = document.head.querySelector('meta[name="csrf-token"]')
        Dropzone.autoDiscover = false
        let myDropzone = new Dropzone(`#dropzoneTarget-index-${index}`, {
            url: uploadUrl,
            createImageThumbnails: true,
            clickable: true,
            acceptedFiles: ".jpeg, .jpg, .png, .svg, .gif",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': token.content,
                'Accept': 'application/json'
            }
        })
        myDropzone.on("success", function(dropzone, file) {
            onUpload(file)
        })
    }, [])
    return (
        <div className="w-full xl:w-1/2 2xl:w-2/3 h-full float-right px-3">
            <form id={`dropzoneTarget-index-${index}`} className="dropzone"></form>
        </div>
    )
}