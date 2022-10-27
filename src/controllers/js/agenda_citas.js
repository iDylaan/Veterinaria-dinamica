
import { muestraError } from "../lib/js/muestraError.js";
import { submit } from "../lib/js/submit.js";


document.addEventListener('DOMContentLoaded', () => cargarCitas);

/** @param {Event} evt */
async function cargarCitas(evt) {
    try {
        const json = await submit(evt, "../lib/php/leerCitas.php", document);
        alert(json.resultado);
    } catch (e) {
        muestraError(e);
    }
}