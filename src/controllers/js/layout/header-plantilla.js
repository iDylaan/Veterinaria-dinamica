// Variables
const btnIniciarSesion = document.querySelector('#nav-login');
const btnHome = document.querySelector('#nav-home');
const btnLogo = document.querySelector('.header__logo');

// Header Responsive
var bars = document.querySelector('.bars__menu');
const navLateralMobile = document.querySelector('.header-nav-mobil__container');
const backMenu = document.querySelector('#back-menu');

const btnIniciarSesionMobile = document.querySelector('#nav-login-mobile');
const btnHomeMobile = document.querySelector('#nav-home-mobile');


// Event Listeners
eventListeners();
function eventListeners() {

    window.addEventListener('scroll', adaptarHeader); // Adapta el header cuando se hace scroll
    
    // Header responsivo
    bars.addEventListener('click', () => bars.classList.toggle('active-bars__menu'));
    bars.addEventListener('click', mostrarMenuLateralMobile);
    backMenu.addEventListener('click', ocultarMenuLateralMobile);

    // Redirecciones
    btnIniciarSesion.addEventListener('click', () => window.location.href = '../inicio_sesion.html' );
    btnLogo.addEventListener('click', () => window.location.href = '../../index.html' );
    btnHome.addEventListener('click', () => window.location.href = '../../index.html' );

    // Redirecciones Nav Lateral Mobile
    btnIniciarSesionMobile.addEventListener('click', () => window.location.href = '../inicio_sesion.html' );
    btnHomeMobile.addEventListener('click', () => window.location.href = '../../index.html' );
}


function adaptarHeader() {
    const header = document.querySelector('.header__nav-container');
    header.classList.toggle("abajo", window.scrollY > 0);
    bars.classList.toggle("bars-abajo", window.scrollY > 0);
}

function mostrarMenuLateralMobile() {
    navLateralMobile.style.right = '0px';
    navLateralMobile.style.transition = '0.275s';
    backMenu.style.display = 'block';
    backMenu.style.transition = '0.275';
}

function ocultarMenuLateralMobile() {
    navLateralMobile.style.right = '-270px';
    backMenu.style.display = 'none';
}