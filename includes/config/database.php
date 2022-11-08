<?php

function conectarDB() : mysqli {
    // $db = mysqli_connect('localhost', 'id18726484_veterinariaadmin', 'M4FU(!\zJieA&VYt', 'id18726484_veterinaria');
    $db = mysqli_connect('localhost', 'root', '', 'veterinariadb');

    if( !$db ) {
        echo "Error no se pudo conectar a la base de datos";
        exit;
    }

    return $db;
}