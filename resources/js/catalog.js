import React from "react";
import { render } from "react-dom"
import Catalog from "./components/Catalog";

const target = document.getElementById("react-catalog")
if (target) {
    render(<Catalog/>, target)
}