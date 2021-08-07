$(".question-wrapper").on("click", function() {
    $(this).find(".fa-plus, .fa-minus").toggleClass("d-none")
    $(this).siblings(".answer").toggleClass("d-none")
})