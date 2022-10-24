// Variables
const btnIniciarSesion = document.querySelector('#nav-login');
const btnQuienesSomos = document.querySelector('#nav-quienes-somos');
const btnCitas = document.querySelector('#nav-citas');
const btnFacebook = document.querySelector('#btnFacebook');
const btnInstagram = document.querySelector('#btnInstagram');
const btnUbicacionHeader = document.querySelector('#nav-ubicacion');
const btnHome = document.querySelector('#nav-home');
const btnLogo = document.querySelector('.header__logo');

// Header Responsive
var bars = document.querySelector('.bars__menu');
const navLateralMobile = document.querySelector('.header-nav-mobil__container');
const backMenu = document.querySelector('#back-menu');

const btnIniciarSesionMobile = document.querySelector('#nav-login-mobile');
const btnQuienesSomosMobile = document.querySelector('#nav-quienes-somos-mobile');
const btnCitasMobile = document.querySelector('#nav-citas-mobile');
const btnFacebookMobile = document.querySelector('#btnFacebook-mobile');
const btnInstagramMobile = document.querySelector('#btnInstagram-mobile');
const btnUbicacionHeaderMobile = document.querySelector('#nav-ubicacion-mobile');
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
    // btnCerrarSesion.addEventListener('click', () => window.location.href = '../paginas/inicio_sesion.html' );
    btnQuienesSomos.addEventListener('click', () => window.location.href = '#quienes-somos__container' );
    btnUbicacionHeader.addEventListener('click', () => window.location.href = '#ubicacion__container');
    btnLogo.addEventListener('click', () => window.location.href = '../index.html' );
    btnFacebook.addEventListener('click', () =>  window.location.href = 'https://www.facebook.com/profile.php?id=100086393047213' );
    btnInstagram.addEventListener('click', () => window.location.href = 'https://www.instagram.com/mascota_feliz12/' );
    btnHome.addEventListener('click', () => window.location.href = '#' );
    btnCitas.addEventListener('click', () => window.location.href = './src/views/cliente/servicios/agenda_citas.html');

    // Redirecciones Nav Lateral Mobile
    // btnCerrarSesionMobile.addEventListener('click', () => window.location.href = '../paginas/inicio_sesion.html' );
    btnQuienesSomosMobile.addEventListener('click', () => window.location.href = '#quienes-somos__container' );
    btnUbicacionHeaderMobile.addEventListener('click', () => window.location.href = '#ubicacion__container' );
    btnHomeMobile.addEventListener('click', () => window.location.href = '#' );
    btnCitas.addEventListener('click', () => window.location.href = './src/views/cliente/servicios/agenda_citas.html');

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