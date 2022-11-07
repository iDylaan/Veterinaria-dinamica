<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('containers-us-west-114.railway.app', 'root', 'pzdA6iaB3MUhdZbMY3MG', 'railway', 7145);
    // $db = mysqli_connect('localhost', 'root', '', 'veterinariadb');

    if( !$db ) {
        echo "Error no se pudo conectar a la base de datos";
        exit;
    }

    return $db;
}