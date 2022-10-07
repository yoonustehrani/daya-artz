import { lazy, Suspense } from 'react'
import {render} from 'react-dom';

const ReactInlineRecords = lazy(() => import('./ReactInlineRecords'));

$("div[zeus-create-inline-relation]").each(function() {
    let target = $('> div[zeus-relations]', $(this).parent())[0];
    render(<Suspense fallback={<div>Loading Component...</div>}>
        <ReactInlineRecords target={target} targetURL={this.getAttribute('data-create-row')}/>
    </Suspense>, this)
})