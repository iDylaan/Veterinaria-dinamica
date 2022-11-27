<?php
    // * Autentificar al usuario
    if( !isset( $_SESSION ) ) {
        session_start();
    }
    $auth = $_SESSION['login'] && $_SESSION['id_rol'] === "3" ?? false;
    if( !$auth ) {
        header('Location: ../index.php');
    }

    // Sanitizacion de los parametros recibidos por URL
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: ../index_admin.php');
    }

    // * Importar la conexion
    // BASE DE DATOS
    require '../includes/config/database.php';
    $db = conectarDB();

    // Obtener los datos del producto
    $query = "SELECT * FROM usuarios WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);
    $usuarios = mysqli_fetch_assoc($resultado);

    $error = '';

    $nombre = $usuarios['nombre'];
    $apellido_pa = $usuarios['apellido_pa'];
    $apellido_ma = $usuarios['apellido_ma'];
    $correo = $usuarios['correo'];
    $fecha_nac = $usuarios['fecha_nac'];

    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // * Sanitizacion del formulario
        $nombre = mysqli_real_escape_string( $db, $_POST['nombre'] );
        $apellido_pa = mysqli_real_escape_string( $db, $_POST['apellido_pa'] );
        $apellido_ma = mysqli_real_escape_string( $db, $_POST['apellido_ma'] );
        $correo = mysqli_real_escape_string( $db, $_POST['correo'] );
        $fecha_nac = mysqli_real_escape_string( $db, $_POST['fecha_nac'] );

       // * Validaciones...
       if(!$nombre || !$apellido_pa || !$apellido_ma || !$correo || !$fecha_nac) {  // Validar campos vacios
        $error = 'Todos los campos son obligatorios';
    } else if (strlen( $nombre ) < 20) { // Validar descripciones muy cortas
        $error = 'La descripción debe tener mínimo 50 caracteres';
    } else if (strlen( $apellido_pa ) > 20) { // Validar por capacidad de la DB
        $error = 'Sobrepasaste el límite de caracteres en la descripción (1500)';
    } else if (strlen( $apellido_ma ) < 20) { // Validar nombres muy chicos
        $error = 'El nombre no puede ser menor a 8 caracteres';
    } else if (strlen( $correo ) > 30) { // Validar por capacidad de la DB
        $error = 'Sobrepasaste el límite de caracteres del nombre (100)';
    } 

        // TODO el formulario está Ok, vamos a guardarlo en el servidor
        if( !$error ) {

            // * Insertar a la base de datos
            $query = "UPDATE usuarios SET 
            nombre = '${nombre}', 
            apellido_pa = '${apellido_pa}',
            apellido_ma = '${apellido_ma}',
            correo = '${correo}',
            fecha_nac = '${fecha_nac}',
            WHERE id = ${id};";


            $resultado = mysqli_query( $db, $query );

            if ( $resultado ) {
                // TODO Ok en el registro
                header('Location: ./e_veterinarios.php?resultado=2');
            }
        }
    }
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestionar Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="../src/styles/form_productos.css">
</head>
<body>
<h1 style="text-align: center;margin-top:20px;">Actualizar</h1>

<div class="formulario__container">
    <form class="formulario__producto" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Actualizar Cuenta</legend>
            
            <form action="" method="POST">
                <div class="username">
                    <label id="label-nombre" for="">Nombre</label>
                    <input id="input-nombre" name="nombre" type="text" value="<?php echo $nombre; ?>" required>
                    
                </div><br>
                
                <div class="username">
                    <label id="label-apepa" for="">Apellido paterno</label>
                    <input id="input-apepa" name="apellido_pa" type="text" value="<?php echo $apellido_pa; ?>" required>
                    
                </div><br>
                
                <div class="username">
                    <label id="label-apema" for="">Apellido Materno</label>
                    <input id="input-apema" name="apellido_ma" type="text" value="<?php echo $apellido_ma; ?>" required>
                    
                </div><br>

                <div class="username-date">
                    <label for="">Fecha de Nacimiento</label> <br>
                    <input type="date" name="fecha_nac" value="<?php echo $fecha_nac; ?>" required>
                </div><br>

                <div class="username">
                <label id="label-email" class="" for="">Correo Electrónico</label> 
                    <input id="input-email" class="<?php echo $correo_existente ? "input-error" : "" ; ?>" name="correo" type="email" value="<?php echo $correo; ?>" required>
                    
                </div><br>

                <div>
               

               
                

              <br><br>
                
              <input type="submit" id="btn-crear-producto" value="Editar ">
            </fieldset>
        </form>
    </div> <!-- Contenedor Formulario -->
    
</body>
</html>