require('./bootstrap');

$('.scroll-to-element').on('click', function(e) {
    let elem;
    // console.log(e.target.getAttribute('data-scroll'));
    switch (e.target.getAttribute('data-scroll')) {
        case 'pricing':
            elem = document.getElementsByClassName('order-packs-section')[0]
            break;
        case 'portfolio':
            elem = document.getElementById('portfolio-section')
            break;
    }
    elem && elem.scrollIntoView({ behavior: 'smooth' })
})

$('.post-main-section img').addClass('lazyload')

// custom components
require('./components')