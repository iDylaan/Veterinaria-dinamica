<?php

function conectarDB() : mysqli {
    // $db = mysqli_connect('localhost', 'id19795906_nidt_veterinaria_db', 'PG1@&{V6y%uGg~0F', 'id19795906_db_veterinaria');
    $db = mysqli_connect('localhost', 'root', '', 'veterinariadb');

    if( !$db ) {
        echo "Error no se pudo conectar a la base de datos";
        exit;
    }

    return $db;
}