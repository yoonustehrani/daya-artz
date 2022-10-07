import { Link } from "react-router-dom";

export default function PleaseComplete() {
    return (
        <p className="alert alert-danger">
            لطفا اطلاعات حساب کاربری خود را تکمیل فرمایید.
            <Link to="/registerInfo" className="btn btn-light btn-sm mx-2">
                تکمیل اطلاعات
            </Link>
        </p>
    )
}