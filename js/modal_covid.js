(function modal_covid(){
    const clickable = document.querySelectorAll(".clickable");
    const overlay = document.querySelector(".overlay");
    const modal_close = document.querySelector(".modal_close");
    const closeItems = [overlay, modal_close];
    // abrindo e fechando modal
    clickable.forEach(card => {
        card.addEventListener("click", () => {
            overlay.classList.toggle("modal_covid_open");
        })
    })

    closeItems.forEach(item => {
        item.addEventListener("click", () => {
            item.classList.toggle("modal_covid_open");
        })
    });

})();