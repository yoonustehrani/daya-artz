function FilterBar({onFilterClick, current, filters}) {
    return (
        <div className="d-flex justify-content-start align-content-center mb-4">
            <div className="p-0 px-2">
                <select className="form-control w-auto hoverable" value={current} onChange={onFilterClick}>
                {filters && Object.entries(filters).map(([filter, name],i) => (
                    <option value={filter} key={i} className="hoverable">{name}</option>
                ))}
                </select>
            </div>
        </div>
    )
}

export default FilterBar;