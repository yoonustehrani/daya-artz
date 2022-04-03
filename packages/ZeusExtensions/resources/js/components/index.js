import { lazy, Suspense } from 'react'
import { render } from 'react-dom'

const ReactImageExtension = lazy(() => import('./ReactImageExtension'))

const imagePickerTarget = document.getElementById("react-image-picker")

if (imagePickerTarget) {
    render(
        <Suspense fallback={<div>Loading ...</div>}>
            <ReactImageExtension target={imagePickerTarget.getAttribute('data-target')} multiple={imagePickerTarget.hasAttribute('data-multiple')}/>
        </Suspense>,
        imagePickerTarget
    )
}