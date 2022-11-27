<?php

    // Validar que la sesion este iniciada
    if( !isset( $_SESSION ) ) {
        session_start();
    }

    // Validar que la sesion sea del veterinario
    if( $_SESSION['id_rol'] !== "2" ) {
        header('Location: ./index.php');
    }

    // * Importar la conexion
    // BASE DE DATOS
    require '../includes/config/database.php';
    $db = conectarDB();

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
        $query = "DELETE FROM expedientes WHERE cla_chip = '${id}';";
        $resultado = mysqli_query( $db, $query );

        if( $resultado ) {
            // TODO Ok, Se eliminó correctamente...
            header('Location: ./expedientes.php');
        }
    }    