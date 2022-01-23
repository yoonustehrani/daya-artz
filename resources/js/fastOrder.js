import React from "react";
import { render } from "react-dom";
import FastOrder from "./react/components/FastOrder";

const elem = document.getElementById("react-fast-order")

if (elem) {
    render(<FastOrder />, elem)
}