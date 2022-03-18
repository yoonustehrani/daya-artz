import { render } from 'react-dom'
import QuickOrder from './components/QuickOrder'

// quick order
const quickOrderElement = document.getElementById("react-quick-order")
if (quickOrderElement) {
    render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')}/>, quickOrderElement)
}

// this code is for handling the menu in < md sizes
var body = document.body
function toggle_menu() {
    let is_open, menu_el = document.getElementById("menu-list"), toggle_classes = ["opacity-0", "pointer-events-none"]
    is_open = menu_el.classList.contains("open")
    if (is_open) {
        menu_el.classList.remove("open")
        setTimeout(() => {
            menu_el.classList.add("hidden")
            toggle_classes.forEach(classname => {
                document.getElementById("menu-open").classList.toggle(classname)
            })
        }, 400);
    } else {
        menu_el.classList.remove("hidden")
        setTimeout(() => {
            menu_el.classList.add("open")
            toggle_classes.forEach(classname => {
                document.getElementById("menu-open").classList.toggle(classname)
            })
        }, 0);
    }
    body.classList.toggle("overflow-y-hidden")
}
body.addEventListener("click", (e) => {
    let el = e.target, menu_el = document.getElementById("menu-list")
    if ((menu_el.classList.contains("open") && !el.closest("#menu-list")) || el.closest("#menu-close") || el.closest("#menu-open")) {
        toggle_menu()
    }
})
// this code will set the header navbar fixed according to the window height
function setHeader() {
    var window_height = window.innerHeight, offset_top = body.scrollTop, target_header = document.getElementById("landing-header"), header_nav = document.getElementById("header-nav")
    if (window.innerWidth >= 768) {
        if (offset_top >= window_height && !target_header.classList.contains("pt-14")) {
            target_header.classList.add("pt-14")
            header_nav.classList.add("!fixed")
            header_nav.classList.add("slideInDown")
            setTimeout(() => {
                header_nav.classList.remove("slideInDown")
            }, 200);
        } else if (offset_top < window_height && target_header.classList.contains("pt-14")) {
            header_nav.classList.add("slideOutUp")
            setTimeout(() => {
                target_header.classList.remove("pt-14")
                header_nav.classList.remove("!fixed")
                header_nav.classList.remove("slideOutUp")
            }, 200)
        }
    } else {
        target_header.classList.remove("pt-14")
        header_nav.classList.remove("slideInDown", "slideOutUp", "!fixed")
    }
}
// we use the above code as a trigger for scroll evenets and resize window events
body.addEventListener("scroll", function() {
    setHeader()
})   
window.addEventListener("resize", function() {
    setHeader()        
})