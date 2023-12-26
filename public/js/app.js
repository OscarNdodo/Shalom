const openMenu = document.getElementById("open-menu");
const closeMenu = document.getElementById("close-menu");
const menu = document.getElementById("menu");
const iconUser = document.getElementById("user");

openMenu.addEventListener("click", () => {
    menu.style.display = "block";
    menu.style.display = "flex";
});

closeMenu.addEventListener("click", () => {
    menu.style.display = "none";
});

iconUser.addEventListener("click", () => {
    document.querySelector(".options").style.display = "block";
    document.querySelector(".options").style.display = "flex";
})

document.querySelector(".options").addEventListener("click", () => {
    document.querySelector(".options").style.display = "none";
})