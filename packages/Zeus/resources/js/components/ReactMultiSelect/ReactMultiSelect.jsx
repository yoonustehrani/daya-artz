import axios from 'axios'
import { useEffect, useState } from 'react'


export default function ReactMultiSelect({fromInput, indexApi, initial}) {
    const [options, setOptions] = useState([])
    const [selection, setSelection] = useState([])
    const [query, setQuery] = useState("")
    const mainItem = document.querySelector(`input[name='${fromInput}'`)
    useEffect(() => {
        try {
            let initialValue = JSON.parse(initial);
            setSelection(initialValue)
        } catch ($e) {

        }
    }, [fromInput])
    useEffect(() => {
        let q = indexApi
        if (query !== "") {
            q += `?q=${query}`
        }
        axios.get(q).then(res => {
            setOptions(res.data)
        })
    }, [indexApi, query])
    const nonSelectedOptions = () => {
        let selected = selection.map(x => x.id)
        return options.filter(x => ! selected.includes(x.id))
    }
    const handleSelect = (e) => {
        let newSelection = [...selection, nonSelectedOptions().find(x => x.id === e.target.value)];
        setSelection(newSelection)
        mainItem.value = JSON.stringify([...newSelection.map(v => v.id)])
    }
    const handleUnselect = (e) => {
        let newSelection = [...selection.filter(x => x.id !== e.target.value)]
        setSelection(newSelection)
    }
    return (
        <>
            <div className="mt-4 grid grid-cols-2 grid-flow-row gap-4">
                <div className="p-2 bg-white">
                    <div className="w-full">
                        <input type="text" className="solid-input" value={query} placeholder="Search something" onChange={e => setQuery(e.target.value)}/>
                    </div>
                    <ul className="w-full overflow-y-auto">
                    {nonSelectedOptions().map(opt => (
                        <li className="cursor-pointer my-2 p-2" key={opt.id} onClick={handleSelect} value={opt.id}>{opt.as_text}</li>
                    ))}
                    </ul>
                </div>
                <div className="p-2 bg-white">
                    <ul className="w-full overflow-y-auto">
                    {selection.map(opt => (
                        <li className="cursor-pointer my-2 p-2" key={opt.id} onClick={handleUnselect} value={opt.id}>{opt.as_text}</li>
                    ))}
                    </ul>
                </div>
            </div>
        </>
    )
}