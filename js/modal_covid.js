(function modal_covid(){
    const clickable = document.querySelectorAll(".clickable");
    // abrindo modal
    clickable.forEach(card => {
        card.addEventListener("click", () => {
            const overlay = document.querySelector(".overlay");
            overlay.classList.toggle("modal_covid_open");
            console.log(overlay);
        })
    })
    // fechando modal
    
})();