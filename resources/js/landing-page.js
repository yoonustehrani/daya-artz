import Loading from './components/Loading';
import { lazy, Suspense } from 'react';
import {render} from 'react-dom';

const MvpForm = lazy(() => import('./components/Landing/Coffeeshop/MvpForm'))
const HeaderForm = lazy(() => import('./components/Landing/Form/HeaderForm'))

const react_form = document.getElementById("react_form"), header_form_url = react_form.getAttribute("header-form-url")
if (react_form) {
    render(
        <Suspense fallback={<Loading />}>
            <HeaderForm headerFormUrl={header_form_url} />
        </Suspense>,
        react_form
    )
}

// faq
document.querySelectorAll('#faq-list > div > div:first-child').forEach((el, i) => {
    el.addEventListener('click', function() {
        let icon = this.querySelector('i.fas').classList
        icon.toggle('rotate-180')
        this.parentNode.querySelector('p').classList.toggle('hidden')
        document.querySelectorAll(`#faq-list > div:not(:nth-child(${i + 1})) > div:first-child`).forEach(sibling => {
            let icon = sibling.querySelector('i.fas').classList
            icon.remove('rotate-180')
            sibling.parentNode.querySelector('p').classList.add('hidden')
        })
    })
})

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href^="#"]').forEach((el, i) => {
        el.addEventListener('click', function(e) {
            e.preventDefault()
            document.querySelector(this.getAttribute('href')).scrollIntoView(true)
        })
    })
})

// handling header
var body = document.body
function toggle_menu() {
    let is_open, menu_el = document.getElementById("menu-list"), toggle_classes = ["opacity-0", "pointer-events-none"]
    is_open = menu_el.classList.contains("open-full")
    if (is_open) {
        menu_el.classList.remove("open-full")
        setTimeout(() => {
            menu_el.classList.add("hidden")
            toggle_classes.forEach(classname => {
                document.getElementById("menu-open").classList.toggle(classname)
            })
        }, 400);
    } else {
        menu_el.classList.remove("hidden")
        setTimeout(() => {
            menu_el.classList.add("open-full")
            toggle_classes.forEach(classname => {
                document.getElementById("menu-open").classList.toggle(classname)
            })
        }, 0);
    }
    body.classList.toggle("overflow-y-hidden")
}
body.addEventListener("click", (e) => {
    let el = e.target, menu_el = document.getElementById("menu-list")
    if ((menu_el.classList.contains("open-full") && !el.closest("#menu-list")) || el.closest("#menu-close") || el.closest("#menu-open")) {
        toggle_menu()
    }
})

const formElement = document.getElementById('react-coffeeshop-form')

if (formElement) {
    render(
        <Suspense fallback={<Loading />}>
            <MvpForm formData={formElement.getAttribute('data-show')} formAnswer={formElement.getAttribute('data-store')}/>
        </Suspense>,
        formElement
    )
}