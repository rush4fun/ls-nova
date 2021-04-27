const openPopUpBtn = document.querySelectorAll(".js-openPopUpBtn");
const openVideoPopUpBtn = document.querySelectorAll(".js-openVideoPopUp");
const closeBtn = document.querySelectorAll(".close");
const videoPopUp = document.querySelector("#video-block");
const popUp = document.querySelector("#pop-up");
const popUpLeave = document.querySelector("#pop-up__leave");

const openPopUp = (btns, popUp) => {
    btns.forEach(btn => {
        btn.addEventListener("click", (event) => {
            event.preventDefault();
            popUp.classList.add("show");
        })
    })
}
const closePopUp = () => {
    closeBtn.forEach(btn => {
        btn.addEventListener("click", (event) => {
            event.currentTarget.closest(".show").classList.remove("show");
        })
    })
}
const closeAnyPopUp = (popup) => {
    popup.addEventListener("click", (event) => {
        if (event.target.classList.contains("show")) {
            event.target.classList.remove("show");
        } else {
            return;
        }
    })
}
const openPopUpLeave = () => {
    document.addEventListener("mouseleave", showPopUpWhenLeave);
    function showPopUpWhenLeave(event) {
        if (event.clientY < 10) {
            console.log(event.clientY, popUpLeave);
            popUpLeave.classList.add("show");
            document.removeEventListener("mouseleave", showPopUpWhenLeave);
        }
    }
}
const init = () => {
    openPopUp(openPopUpBtn, popUp);
    openPopUp(openVideoPopUpBtn, videoPopUp);
    closePopUp();
    closeAnyPopUp(videoPopUp);
    closeAnyPopUp(popUp);
    openPopUpLeave();
}
document.onload = init();