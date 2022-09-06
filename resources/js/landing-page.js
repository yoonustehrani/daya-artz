document.querySelectorAll('#faq-list > div > div:first-child').forEach((el, i) => {
    el.addEventListener('click', function() {
        let icon = this.querySelector('i.fas').classList
        icon.toggle('fa-angle-down')
        icon.toggle('fa-angle-up')
        this.parentNode.querySelector('p').classList.toggle('hidden')
        document.querySelectorAll(`#faq-list > div:not(:nth-child(${i + 1})) > div:first-child`).forEach(sibling => {
            let icon = this.querySelector('i.fas').classList
            icon.remove('fa-angle-down')
            icon.add('fa-angle-up')
            sibling.parentNode.querySelector('p').classList.add('hidden')
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