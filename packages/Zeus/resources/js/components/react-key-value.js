import {lazy, Suspense} from 'react';
import { render } from 'react-dom';

const KeyValueEditor = lazy(() => import('./ReactKeyValueEditor'))
const keyValueItems = document.querySelectorAll('div[zeus-key-valuue-editor]')

const makeKeyValueEditor = (element, index) => {
    render(
        <Suspense fallback={<div>Loading ...</div>}>
            <KeyValueEditor targetElement={element.getAttribute('data-target')}/>
        </Suspense>,
        element
    )
}

if (keyValueItems.length) {
    for (let i = 0; i < keyValueItems.length; i++) {
        let element = keyValueItems[i]
        makeKeyValueEditor(element, i)
    }
}