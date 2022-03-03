import { render } from 'react-dom'
import QuickOrder from './components/QuickOrder'

// quick order
const quickOrderElement = document.getElementById("react-quick-order")
if (quickOrderElement) {
    render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')}/>, quickOrderElement)
}

// this code is for handling the menu in < md sizes
function toggle_menu() {
    let is_open, menu_el = document.getElementById("menu-list")
    is_open = menu_el.classList.contains("open")
    if (is_open) {
        menu_el.classList.toggle("open")
        setTimeout(() => {
            menu_el.classList.add("hidden")
        }, 1000);
    } else {
        menu_el.classList.remove("hidden")
        setTimeout(() => {
            menu_el.classList.toggle("open")
        }, 0);
    }
    // $("body").toggleClass("over-h")
    document.querySelector("nav .fa-bars").classList.toggle("opacity-0")
}
document.body.addEventListener("click", (e) => {
    let el = e.target, menu_el = document.getElementById("menu-list")
    if ((menu_el.classList.contains("open") && el.id !== "menu-list" && el.id !== "menu-open" && !el.closest("#menu-open") && !el.closest("#menu-list")) || el.closest("#menu-close") || el.closest("#menu-open")) {
        toggle_menu()
    }
})
// this code will set the header navbar fixed according to the window height
function setHeader() {
    var window_height = window.innerHeight, offset_top = $("body").scrollTop(), target_header = $(".header, .min-header")
    if ($(window).width() >= 768) {
        if (offset_top >= window_height && !target_header.hasClass("fixed")) {
            $(target_header).addClass("fixed")
            $("#header-nav").addClass("slideInDown")
            setTimeout(() => {
                $("#header-nav").removeClass("slideInDown")
            }, 200);
        } else if (offset_top < window_height && target_header.hasClass("fixed")) {
            $("#header-nav").addClass("slideOutUp")
            setTimeout(() => {
                $(target_header).removeClass("fixed")
                $("#header-nav").removeClass("slideOutUp")
            }, 200)
        }
    } else {
        $(target_header).removeClass("fixed")
        $("#header-nav").removeClass("slideInDown slideOutUp")
    }
}
// we use the above code as a trigger for scroll evenets and resize window events
$("body").on("scroll", function() {
    setHeader()
})   
$(window).resize(function() {
    setHeader()        
})