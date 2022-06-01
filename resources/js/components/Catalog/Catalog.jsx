import React, { Component } from 'react';
import FilterSidebar from './FilterSidebar';
import Header from './Header'
import Main from './Main';

class Catalog extends Component {
    render() {
        return (<>
            <Header/>
            <Main/>
            <FilterSidebar/>
        </>);
    }
}

export default Catalog;