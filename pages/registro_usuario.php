<?php
    // * Importar la conexion
    // BASE DE DATOS
    require'../includes/config/database.php';
    $db = conectarDB();

    // * Escribir el Query
    $query = "SELECT correo FROM usuarios";

    // * Consultar la Base de Datos
    $resultado_correos = mysqli_query($db, $query);


    // Ejecucion del codigo despues de que el usuario envia el formulario
    $nombre = '';
    $apellido_pa = '';
    $apellido_ma = '';
    $fecha_nac = '';
    $correo = '';
    $contrasena = '';
    $id_rol = 1;
    $contrasena_clon = '';
    
    // Variable para validar si un correo ya esta registrado
    $correo_existente = false;
    $contrasenas_iguales = true;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitización del formulario
        $nombre = mysqli_real_escape_string( $db, $_POST['nombre'] );
        $apellido_pa = mysqli_real_escape_string( $db, $_POST['apellido_pa'] );
        $apellido_ma = mysqli_real_escape_string( $db, $_POST['apellido_ma'] );
        $fecha_nac = mysqli_real_escape_string( $db, $_POST['fecha_nac'] );
        $correo = mysqli_real_escape_string( $db, $_POST['correo'] );
        $contrasena = mysqli_real_escape_string( $db, $_POST['contrasena'] );
        $contrasena_clon = mysqli_real_escape_string( $db, $_POST['contrasena_clon'] );

        // Consulta de correos para comprobar que no se repita
        while( $correos = mysqli_fetch_assoc($resultado_correos) ):
            // Chequeo del correo en cada correo registrado en el sistema
            if( $correos['correo'] === $correo ) {
                $correo_existente = true;
            }
        endwhile;

        // Validar contrasenas iguales
        if ($contrasena !== $contrasena_clon) {
            $contrasenas_iguales = false;
        }
        
        if( !$correo_existente && $contrasenas_iguales ) {
            // Hasheo de la contraseña
            $passwordHash = password_hash($contrasena, PASSWORD_BCRYPT);
            
            // * Insertar en la base de datos
            $query = "INSERT INTO usuarios (nombre, apellido_pa, apellido_ma, fecha_nac, correo, contrasena, id_rol) 
            VALUES ( '${nombre}', '${apellido_pa}', '${apellido_ma}', '${fecha_nac}', '${correo}', '${passwordHash}', '${id_rol}' ); ";
            $resultado = mysqli_query($db, $query);

            // TODO Ok, redirigimos al que inicie sesion
            if( $resultado ) {
                // Redireccionar al usuario
                header('Location: ./inicio_sesion.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Regístrate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../src/styles/inicio_sesion.css">

    <script src="../src/js/login-signin.js" defer></script>
</head>
<body>
    
    <div class="container">
        <div class="formulario">
            <h1>Registro</h1>
            <form method="POST" autocomplete="off">
                <div class="username">
                    <input id="input-nombre" name="nombre" type="text" value="<?php echo $nombre; ?>" required>
                    <label id="label-nombre" for="">Nombre</label>
                </div>
                
                <div class="username">
                    <input id="input-apepa" name="apellido_pa" type="text" value="<?php echo $apellido_pa; ?>" required>
                    <label id="label-apepa" for="">Apellido paterno</label>
                </div>
                
                <div class="username">
                    <input id="input-apema" name="apellido_ma" type="text" value="<?php echo $apellido_ma; ?>" required>
                    <label id="label-apema" for="">Apellido Materno</label>
                </div>

                <div class="username-date">
                    <label for="">Fecha de Nacimiento</label> <br>
                    <input type="date" name="fecha_nac" value="<?php echo $fecha_nac; ?>" required>
                </div>

                <div class="username">
                    <input id="input-email" class="<?php echo $correo_existente ? "input-error" : "" ; ?>" name="correo" type="email" value="<?php echo $correo; ?>" required>
                    <label id="label-email" class="" for="">Correo Electrónico</label>
                </div>

                <div>
                <?php 
                    if($correo_existente) {
                        ?>
                        <p class="label-error">Ese correo no está disponible.. 🙀</p>
                        <?php
                    } 
                ?>
                </div>

                <div class="username">
                    <input id="input-password" name="contrasena" type="password" required>
                    <label id="label-password" for="">Crear Contraseña</label>
                </div>

                <div class="username" id="password-clon-container">
                    <input id="input-password_clon" name="contrasena_clon" type="password" required>
                    <label id="label-password_clon" for="">Repetir Contraseña</label>
                </div>
                <?php if( !$contrasenas_iguales ): ?>
                    <div>
                        <p class="label-error">Las contraseñas no coinciden</p>
                    </div>
                <?php endif ?>

                <div class="politicas-privacidad">
                    <input type="checkbox" name="terminos" required><a href="#"> Acepta Terminos & Condiciones </a></input>
                </div>
                
                <input id="btn-registrar" type="submit" value="Registrarse"></input>
            </form>
        </div>

    </div>
</body>
</html>