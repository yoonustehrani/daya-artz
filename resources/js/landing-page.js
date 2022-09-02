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