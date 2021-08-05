$(".question-wrapper").find(".fa-minus, .fa-plus").on("click", function() {
    $(this).toggleClass("d-none")
    $(this).siblings(".fas").toggleClass('d-none')
    $(this).parents(".question-wrapper").siblings(".answer").toggleClass("d-none")
})