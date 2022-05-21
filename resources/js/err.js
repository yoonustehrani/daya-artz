const prevPageBtn = document.getElementById("prev-page-btn")
prevPageBtn.addEventListener("click", () => {
    window.history.back()
})