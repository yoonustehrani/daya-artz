export default function Bills({bills}) {
    return (
        <div className="float-left w-100 table-responsive mt-5">
            <h3 className="factor-section-title">وضعیت پرداختی</h3>
            <table className="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>شماره قبض</th>
                        <th>عنوان</th>
                        <th>مقدار</th>
                        <th>وضعیت پرداخت</th>
                    </tr>
                </thead>
                <tbody>
                {bills.length && bills.map(({id, code, title, amount, status, status_fa}, i) => {
                    <tr key={id}>
                        <th>{i + 1}</th>
                        <td>{code}</td>
                        <td>{title}</td>
                        <td>{amount}</td>
                        <td>{status_fa} {
                            status === 'paid'
                            ? <i className='far fa-check text-success'></i>
                            : <a href="#" className='btn btn-sm btn-primary'>پرداخت</a>
                        }</td>
                    </tr>
                })}
                </tbody>
            </table>
        </div>
    )
}