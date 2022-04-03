let main_image = $("#portfolio-main-img"),
small_images = $(".sample-images-slider > .small-items-container img"),
prev_image = $(".sample-images-slider").find("#prev-image"),
next_image = $(".sample-images-slider").find("#next-image")
change_icons = [prev_image, next_image]
current_image_index = 0
// main function to handle image changes
function handle_image_change (image_index) {
    current_image_index = image_index
    $(main_image).removeClass("fadeIn")
    setTimeout(() => $(main_image).addClass("fadeIn"), 0)
    setTimeout(() => $(main_image).removeClass("fadeIn"), 1000)
    main_image.attr("src", $(small_images[image_index]).attr("src"))
    main_image.attr("data-src", $(small_images[image_index]).attr("data-src"))
    main_image.attr("alt", $(small_images[image_index]).attr("alt"))
}
// handling small images click
small_images.each((index, elem) => {
    $(elem).on("click", e => {
        handle_image_change(index)
    })
})
// handling left and right chevron icons click
change_icons.forEach((element, i) => {
    $(element).on("click", () => {
        let next_index = i === 0 ? current_image_index - 1 : current_image_index + 1
        if (next_index >= 0 && next_index < small_images.length) {
            handle_image_change(next_index)
        }
    })
});