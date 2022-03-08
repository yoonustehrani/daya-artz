export default function PaymentPopup({closePopup}) {
    return (
        <div>
            <h1 onClick={closePopup()}>close window</h1>
        </div>
    )
}