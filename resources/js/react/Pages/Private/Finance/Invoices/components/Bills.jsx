export default function Bills({bills}) {
    return (
        <div className="float-left w-100 table-responsive mt-5">
            <h3 className="factor-section-title">وضعیت پرداختی</h3>
            <table className="table table-hover">
                <thead>
                    <tr>
                        <th scope='col'>نوع</th>
                        <th scope='col'>شماره قبض</th>
                        <th scope='col'>عنوان</th>
                        <th scope='col'>مقدار</th>
                        <th scope='col'>وضعیت پرداخت</th>
                    </tr>
                </thead>
                <tbody>
                    {bills.length && bills.map(bill => {
                        <tr key={bill.id}>

                        </tr>
                    })}
                    {/* <tr>
                        <th scope='row'>پیش پرداخت</th>
                        <td>31435</td>
                        <td>پیش پرداخت لوگوی تصویری</td>
                        <td>2,000,000 تومان</td>
                        <td>پرداخت شده <i className='far fa-check text-success'></i></td>
                    </tr>
                    <tr>
                        <th scope='row'>تسویه</th>
                        <td>31436</td>
                        <td>تسویه لوگوی تصویری</td>
                        <td>2,000,000 تومان</td>
                        <td><a href="#" className='btn btn-sm btn-primary'>پرداخت</a></td>
                    </tr> */}
                </tbody>
            </table>
        </div>
    )
}