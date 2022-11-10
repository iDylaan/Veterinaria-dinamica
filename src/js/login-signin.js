// Variables
const inputEmail = document.querySelector("#input-email");
const labelEmail = document.querySelector("#label-email");
const inputPassword = document.querySelector("#input-password");
const labelPassword = document.querySelector("#label-password");
const inputPasswordClon = document.querySelector("#input-password_clon");
const labelPasswordClon = document.querySelector("#label-password_clon");
const inputNombre = document.querySelector("#input-nombre");
const labelNombre = document.querySelector("#label-nombre");
const inputApellidoPa = document.querySelector("#input-apepa");
const labelApellidoPa = document.querySelector("#label-apepa");
const inputApellidoMa = document.querySelector("#input-apema");
const labelApellidoMa = document.querySelector("#label-apema");

// Event Listeners
eventListeners();
validarContrasenas();

function eventListeners() {
  inputEmail.addEventListener("focusin", () => {
    labelEmail.style.top = "-20px";
    labelEmail.style.transition = "0.2s";
    labelEmail.style.color = "hsl(192, 30%, 50%)";

    inputEmail.addEventListener("focusout", (e) => {
      if (e.target.value === "") {
        labelEmail.style.color = "#adadad";
        labelEmail.style.top = "10px";
        labelEmail.style.transition = "0.2s";
      }
    });
  });

  inputPassword.addEventListener("focusin", () => {
    labelPassword.style.top = "-20px";
    labelPassword.style.transition = "0.2s";
    labelPassword.style.color = "hsl(192, 30%, 50%)";

    inputPassword.addEventListener("focusout", (e) => {
      if (e.target.value === "") {
        labelPassword.style.color = "#adadad";
        labelPassword.style.top = "10px";
        labelPassword.style.transition = "0.2s";
      }
    });
  });
  
  inputPasswordClon.addEventListener("focusin", () => {
    labelPasswordClon.style.top = "-20px";
    labelPasswordClon.style.transition = "0.2s";
    labelPasswordClon.style.color = "hsl(192, 30%, 50%)";

    inputPasswordClone.addEventListener("focusout", (e) => {
      if (e.target.value === "") {
        labelPasswordClon.style.color = "#adadad";
        labelPasswordClon.style.top = "10px";
        labelPasswordClon.style.transition = "0.2s";
      }
    });
  });

  inputNombre.addEventListener("focusin", () => {
    labelNombre.style.top = "-20px";
    labelNombre.style.transition = "0.2s";
    labelNombre.style.color = "hsl(192, 30%, 50%)";

    inputNombre.addEventListener("focusout", (e) => {
      if (e.target.value === "") {
        labelNombre.style.color = "#adadad";
        labelNombre.style.top = "10px";
        labelNombre.style.transition = "0.2s";
      }
    });
  });

  inputApellidoPa.addEventListener("focusin", () => {
    labelApellidoPa.style.top = "-20px";
    labelApellidoPa.style.transition = "0.2s";
    labelApellidoPa.style.color = "hsl(192, 30%, 50%)";

    inputApellidoPa.addEventListener("focusout", (e) => {
      if (e.target.value === "") {
        labelApellidoPa.style.color = "#adadad";
        labelApellidoPa.style.top = "10px";
        labelApellidoPa.style.transition = "0.2s";
      }
    });
  });

  inputApellidoMa.addEventListener("focusin", () => {
    labelApellidoMa.style.top = "-20px";
    labelApellidoMa.style.transition = "0.2s";
    labelApellidoMa.style.color = "hsl(192, 30%, 50%)";

    inputApellidoMa.addEventListener("focusout", (e) => {
      if (e.target.value === "") {
        labelApellidoMa.style.color = "#adadad";
        labelApellidoMa.style.top = "10px";
        labelApellidoMa.style.transition = "0.2s";
      }
    });
  });
}