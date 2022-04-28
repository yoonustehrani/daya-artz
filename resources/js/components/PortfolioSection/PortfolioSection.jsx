import { useEffect, useState } from "react";
import { Spinner } from "react-activity";
import PortfolioItem from "./PortfolioItem";
import axios from "axios";

const PortfolioSection = function({targetApi}) {
    const [portfolios, setPortfolio] = useState([]);
    const [loading, setLoading] = useState(true)
    useEffect(() => {
        axios.get(targetApi).then(res => {
            let items = res.data;
            setLoading(false)
            setPortfolio(items)
        })
    }, [])
    return (
        <>
        {loading ? <div className="d-flex justify-content-center w-100"><Spinner size={30} /></div>
        : portfolios.length > 0 
            ? portfolios.map((item, i) => <PortfolioItem key={i} image={item.images[0] ?? null} {...item}/>)
            : <p className="w-100 text-center">نمونه کاری جهت نمایش وجود ندارد</p>
        }
        </>
    )
}

export default PortfolioSection;