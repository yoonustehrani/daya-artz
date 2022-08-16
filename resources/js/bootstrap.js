// window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
window.$ = window.jQuery = require('jquery');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$('.scroll-to-element').on('click', function(e) {
    let elem;
    console.log(e.target.getAttribute('data-scroll'));
    switch (e.target.getAttribute('data-scroll')) {
        case 'pricing':
            elem = document.getElementsByClassName('order-packs-section')[0]
            break;
        case 'portfolio':
            elem = document.getElementById('portfolio-section')
            break;
    }
    elem && elem.scrollIntoView({ behavior: 'smooth', block: 'center' })
})
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
