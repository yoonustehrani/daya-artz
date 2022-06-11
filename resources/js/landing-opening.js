// import { render } from 'react-dom'
// import QuickOrder from './components/QuickOrder'

// quick order
// const quickOrderElement = document.getElementById("react-quick-order")
// if (quickOrderElement) {
//     render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')}/>, quickOrderElement)
// }

const changeCountDown = (countDown, diffObj) => {
    let {inSeconds, inMinutes, inHours, inDays} = diffObj
    let getTwoDigitForInt = int => int > 9 ? int : `0${int}`
    countDown.querySelector('li:nth-child(1) > span.number').innerText = getTwoDigitForInt(inSeconds)
    countDown.querySelector('li:nth-child(2) > span.number').innerText = getTwoDigitForInt(inMinutes)
    countDown.querySelector('li:nth-child(3) > span.number').innerText = getTwoDigitForInt(inHours)
    countDown.querySelector('li:nth-child(4) > span.number').innerText = getTwoDigitForInt(inDays)
}

const getDiffObject = diff => ({
    inDays: diff.getUTCDate() - 1,
    inHours: diff.getUTCHours(),
    inMinutes: diff.getUTCMinutes(),
    inSeconds: diff.getUTCSeconds()
})

const setupCountDown = (countDown, initialDate) => {
    changeCountDown(countDown, getDiffObject(new Date(initialDate - new Date().getTime())))
    setInterval(() => {
        changeCountDown(countDown, getDiffObject(new Date(initialDate - new Date().getTime())))
    }, 1000);
}

const countDown = document.querySelector('ul[data-countdown]')
const countDownDateTime = new Date(countDown.getAttribute('data-countdown'))
// const diff = new Date( - new Date().getTime());
setupCountDown(countDown, countDownDateTime.getTime())



document.querySelectorAll('#faq-list > div > p:first-child').forEach((el, i) => {
    el.addEventListener('click', function() {
        let icon = this.querySelector('i.far').classList
        icon.toggle('fa-times-circle')
        icon.toggle('fa-caret-circle-down')
        this.parentNode.querySelector('p:nth-child(2)').classList.toggle('hidden')
        this.parentNode.parentNode.querySelectorAll(`div:not(:nth-child(${i + 1}))`).forEach(sibling => {
            sibling.querySelector('p:nth-child(2)').classList.add('hidden')
            let ic = sibling.querySelector('i.far').classList
            ic.remove('fa-times-circle')
            ic.add('fa-caret-circle-down')
        })
    })
})
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