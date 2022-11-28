<?php

function autentificado() : bool {
    session_start();
    $auth = $_SESSION['login'];
    return $auth ? true : false;
}

/**
 * Función que calcula la diferencia de tiempo
 * entre dos fechas y las retorna como un objeto de tipo
 * DateInterval.
 * Posteriormente lo almacena y retorna en un arreglo
 */
function calcularDiferenciaFechaHastaHoy($date, $today) {
    $date1 = date_create($date);
    $date2 = date_create($today);
    $diff = date_diff($date1, $date2);

    $time = array();

    foreach($diff as $value) {
        $time[]=$value;
    }

    return $time;
}