// import React from "react";
import { render } from "react-dom";
import QuickOrder from "./QuickOrder";
import './menu'
import './swiper'
import './logo-fade'
import './item-info'
import './accordion'
import './animation'
import './section-guide'
import 'select2/dist/js/select2.min.js'

const quickOrderElement = document.getElementById("react-quick-order")

if (quickOrderElement) {
    render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')}/>, quickOrderElement)
}