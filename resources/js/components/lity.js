import 'lity/dist/lity'

// for adding lity to blog post images
$("#post-content img").each((index, elem) => {
    $(elem).wrap(`<a href=${$(elem).attr("src")} data-lity></a>`)
})