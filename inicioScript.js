let menu = document.querySelector('#menu-line');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}
/*Usamos JS para el despliegue del menu cuando lo presionen */