import { lazy, Suspense } from 'react'
import {render} from 'react-dom';
const ReactSelectBox = lazy(() => import('./ReactSelectBox'));
const ReactMultiSelect = lazy(() => import('./ReactMultiSelect'));

$('div[zeus-react-selectbox]').each(function() {
    render(
        <Suspense fallback={<div>Loading Component...</div>}>
            <ReactSelectBox indexApi={this.getAttribute('data-index-api')} createApi={this.getAttribute('data-create-api')} targetInput={this.getAttribute('data-target-input')}/>
        </Suspense>
    , this)
})

$('div[zeus-react-multi-select]').each(function() {
    render(
        <Suspense fallback={<div>Loading Component...</div>}>
            <ReactMultiSelect initial={this.getAttribute('data-initial')} fromInput={this.getAttribute('data-from')} indexApi={this.getAttribute('data-index-api')}/>
        </Suspense>,
        this
    )
})