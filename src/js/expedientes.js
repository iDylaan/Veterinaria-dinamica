// Header Responsive
var bars = document.querySelector(".bars__menu");
const navLateralMobile = document.querySelector(".header-nav-mobil__container");
const backMenu = document.querySelector("#back-menu");
const inputBusqueda = document.querySelector("#input-busqueda");

// Event Listeners
eventListeners();
function eventListeners() {
  window.addEventListener("scroll", adaptarHeader); // Adapta el header cuando se hace scroll

  // Header responsivo
  bars.addEventListener("click", () =>
    bars.classList.toggle("active-bars__menu")
  );
  bars.addEventListener("click", mostrarMenuLateralMobile);
  backMenu.addEventListener("click", ocultarMenuLateralMobile);

  // Busqueda
  inputBusqueda.addEventListener('keyup', consultarExpedientes)
}

function adaptarHeader() {
  const header = document.querySelector(".header__nav-container");
  header.classList.toggle("abajo", window.scrollY > 0);
  bars.classList.toggle("bars-abajo", window.scrollY > 0);
}

function mostrarMenuLateralMobile() {
  navLateralMobile.style.right = "0px";
  navLateralMobile.style.transition = "0.275s";
  backMenu.style.display = "block";
  backMenu.style.transition = "0.275";
}

function ocultarMenuLateralMobile() {
  navLateralMobile.style.right = "-270px";
  backMenu.style.display = "none";
}