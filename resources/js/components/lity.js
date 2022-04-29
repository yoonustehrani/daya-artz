import 'lity/dist/lity'

// for adding lity to blog post images
$(() => {
    $("#post-content img").each((index, elem) => {
        let src = $(elem).attr("data-src") ?? $(elem).attr("src");
        $(elem).wrap(`<a href=${src} data-lity></a>`)
    })
})