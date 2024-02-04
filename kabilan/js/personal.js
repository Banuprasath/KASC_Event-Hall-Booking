const menuIcon = document.querySelector('#menu-icon');
const sideBar = document.querySelector(".side-bar");

menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle("fa-xmark");
    sideBar.classList.toggle("active");
});

function openNewWindow(url) {
    window.open(url, '_blank');
}