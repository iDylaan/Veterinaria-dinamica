// Variables
const inputEmail = document.querySelector('#input-email');
const labelEmail = document.querySelector('#label-email');
const inputPassword = document.querySelector('#input-password');
const labelPassword = document.querySelector('#label-password');
const inputTelefono = document.querySelector('#input-telefono');
const labelTelefono = document.querySelector('#label-telefono');
const inputNombre = document.querySelector('#input-nombre');
const labelNombre = document.querySelector('#label-nombre');


// Event Listeners
eventListeners();
function eventListeners() {
    inputEmail.addEventListener('focusin', () => {
        labelEmail.style.top = '-20px';
        labelEmail.style.transition = '0.2s';
        labelEmail.style.color = 'hsl(192, 30%, 50%)';
    
        inputEmail.addEventListener('focusout', e => {
            if(e.target.value === '') {
                labelEmail.style.color = '#adadad';
                labelEmail.style.top = '10px';
                labelEmail.style.transition = '0.2s';
            }
        });
    });
    
    inputPassword.addEventListener('focusin', () => {
        labelPassword.style.top = '-20px';
        labelPassword.style.transition = '0.2s';
        labelPassword.style.color = 'hsl(192, 30%, 50%)';
    
        inputPassword.addEventListener('focusout', e => {
            if(e.target.value === '') {
                labelPassword.style.color = '#adadad';
                labelPassword.style.top = '10px';
                labelPassword.style.transition = '0.2s';
            }
        });
    });
    
    inputTelefono.addEventListener('focusin', () => {
        labelTelefono.style.top = '-20px';
        labelTelefono.style.transition = '0.2s';
        labelTelefono.style.color = 'hsl(192, 30%, 50%)';
    
        inputTelefono.addEventListener('focusout', e => {
            if(e.target.value === '') {
                labelTelefono.style.color = '#adadad';
                labelTelefono.style.top = '10px';
                labelTelefono.style.transition = '0.2s';
            }
        });
    });
  
    inputNombre.addEventListener('focusin', () => {
        labelNombre.style.top = '-20px';
        labelNombre.style.transition = '0.2s';
        labelNombre.style.color = 'hsl(192, 30%, 50%)';
    
        inputNombre.addEventListener('focusout', e => {
            if(e.target.value === '') {
                labelNombre.style.color = '#adadad';
                labelNombre.style.top = '10px';
                labelNombre.style.transition = '0.2s';
            }
        });
    });
}