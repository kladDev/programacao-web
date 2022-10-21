const nav = document.querySelector("nav")
const iconFechar = document.querySelector(".close")
const iconMenu = document.querySelector(".menu")

iconMenu.addEventListener("click", () => {
    nav.classList.add("menu-mobile")
})

iconFechar.addEventListener("click", () => {
    nav.classList.remove("menu-mobile")
})