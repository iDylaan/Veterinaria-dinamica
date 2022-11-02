// Header Responsive
var bars = document.querySelector(".bars__menu");
const navLateralMobile = document.querySelector(".header-nav-mobil__container");
const backMenu = document.querySelector("#back-menu");

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

  // Lee las propiedades enviados a traves de la URL
  leerEstadoURL();
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

function leerEstadoURL() {
  const header = document.querySelector("#main-header");
  const estado = obtenerParametrosPorNombre("estado");

  // Verificar si existe el estado en la URL
  divAlertaCitaAgendada = document.createElement("div");
  pMensajeAlerta = document.createElement("p");
  if (estado === "1") {
    divAlertaCitaAgendada.classList.add("alerta", "exito");

    pMensajeAlerta.textContent = "Cita agendada correctamente! 👍😼";

    divAlertaCitaAgendada.appendChild(pMensajeAlerta);
    header.appendChild(divAlertaCitaAgendada);

    setTimeout(() => {
      divAlertaCitaAgendada.remove();
    }, 3000);
  }
}

/**
 * @param String name
 * @return String
 */
function obtenerParametrosPorNombre(nombre) {
  nombre = nombre.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  let regex = new RegExp("[\\?&]" + nombre + "=([^&#]*)"),
    resultado = regex.exec(location.search);
  return resultado === null
    ? ""
    : decodeURIComponent(resultado[1].replace(/\+/g, " "));
}
