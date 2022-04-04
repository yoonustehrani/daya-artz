import axios from "axios"
import { createRef, useEffect, useLayoutEffect, useState } from "react"

function ReactSelectBox({indexApi, createApi, targetInput}) {
    const [options, setOptions] = useState([])
    const [query, setQuery] = useState(null)
    const [selected, setSelected] = useState(null)
    const [selectbox, selectboxToggle] = useState(false)
    useLayoutEffect(() => {
        let q = indexApi
        if (query) {
            q += `?q=${query}`
        }
        axios.get(q).then(res => {
            let newoptions = [...res.data.map(d => ({id: d.id, title: d.as_text}))]
            setOptions(newoptions)
            let target = document.querySelector(`input[name='${targetInput}']`)
            if (target) {
                newoptions.forEach(o => {
                    if (o.id === Number(target.value)) setSelected(o)
                })
            }
        })
    }, [targetInput, indexApi, query])
    const ref = createRef()
    const handleSelect = (e) => {
        e.preventDefault()
        let value = e.target.getAttribute('value')
        let option = options.filter((o) => o.id == value)
        if (option[0]) {
            setSelected(option[0])
            selectboxToggle(false)
        }
        document.querySelector(`input[name='${targetInput}']`).value = value;
        ref.current.blur()
    }
    const unselect = (e) => {
        e.preventDefault()
        setSelected(null)
        selectboxToggle(false)
        document.querySelector(`input[name='${targetInput}']`).value = null
    }
    const toggleSelectBox = (e) => {
        e.preventDefault()
        selectboxToggle(! selectbox)
    }
    return (
        <>
            <div>
                <div className="flex">
                    <a className="btn btn-green mt-2" href={createApi}><i className="fas fa-plus"></i></a>
                    <div className="flex-1 mt-2">
                        <input ref={ref} type="text" className="w-full simple-input" id={`id_${targetInput}`} onFocus={() => selectboxToggle(true)} onBlur={() => selectboxToggle(false)} onChange={e => setQuery(e.target.value)} placeholder="Please select or search for one"/>
                        <span className="cursor-pointer w-8 h-8 rounded-full bg-gray-100/50 flex justify-center items-center float-right -mt-9 mr-1" onClick={toggleSelectBox}>
                            <i className={`fas ${selectbox ? 'fa-angle-up' : 'fa-angle-down'}`}></i>
                        </span>
                    </div>
                </div>
                <ul className={`${selectbox ? '' : 'hidden'} absolute t-0 z-10 ml-2 bg-white rounded-md border border-gray-300 w-full`}>
                    {options.map((opt, i) => {
                        return (
                            <li 
                            onMouseDown={handleSelect}
                            key={i}
                            value={opt.id}
                            className={`p-4 border-gray-300 ${selected && selected.id === opt.id ? 'bg-gray-200 hover:cursor-auto' : 'hover:bg-gray-100 hover:cursor-pointer'} ${i < options.length - 1 ? 'border-b' : ''}`}
                            >{opt.title}</li>
                        )
                    })}
                </ul>
                {selected &&
                    <div>
                        <p className="mt-1 ml-2 w-full simple-input">{selected.title}</p>
                        <span className="cursor-pointer w-8 h-8 rounded-full bg-red-500/50 flex justify-center items-center float-right -mt-9" onClick={unselect}>
                            <i className={`fas fa-times`}></i>
                        </span>
                    </div>
                }
            </div>
        </>
    )
}

export default ReactSelectBox