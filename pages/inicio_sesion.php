<?php 
    // * Importar la conexion
    // BASE DE DATOS
    require '../includes/config/database.php';
    $db = conectarDB();

    // * Escribir el Query
    $query = "SELECT * FROM usuarios";

    // * Consultar la Base de Datos
    $usuarios = mysqli_query($db, $query);

    $error = '';

    $correo = '';
    $contrasena = '';
    $id_usr = '';
    $id_rol = '';

    // Autentificar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $correo = mysqli_real_escape_string( $db, filter_var( $_POST['correo'], FILTER_VALIDATE_EMAIL ) );
        $contrasena = mysqli_real_escape_string( $db, $_POST['contrasena'] );

        // Validar campos vacios
        if(!$correo || !$contrasena) {
            $error = 'Todos los campos son obligatorios';
        }

        // TODO Ok, ahora a comprobar que el usuario exista
        if( $error === '' ) {
            // Revisar si el usuario existe.
            $query = "SELECT * FROM usuarios WHERE correo = '${correo}'";
            $resultado = mysqli_query($db, $query);
            
            if( $resultado->num_rows ) {
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificar si el password corresonde
                $auth = password_verify($contrasena , $usuario['contrasena']); // Autentificado

                if($auth) {
                    // El usuario esta autentificado
                    session_start();

                    // Llenar el arreglo de la sesion
                    $_SESSION['nombre'] = $usuario['nombre'];
                    $_SESSION['apellido_pa'] = $usuario['apellido_pa'];
                    $_SESSION['apellido_ma'] = $usuario['apellido_ma'];
                    $_SESSION['correo'] = $usuario['correo'];
                    $_SESSION['id_rol'] = $usuario['id_rol'];
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['login'] = true;

                    // Filtrar a los usuarios por su rol
                    switch($_SESSION['id_rol']) {
                        case "1": header('Location: ./index.php'); break;
                        case "2": header('Location: ./index.php'); break;
                        case "3": header('Location: ../admin/index_admin.php'); break;
                        default: break;
                    }
                } else {
                    $error = 'La contraseña es incorrecta...';
                }
            } else {
                $error = 'El usuario no existe...';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar sesion</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="../src/styles/inicio_sesion.css">

    <script src="../src/js/login-signin.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="formulario">
            <h1>Inicio de Sesión</h1>
            <form method="POST">
                
                <?php
                    if ( $error !== '' ) {
                        ?>
                        <hr>
                            <p class="error">
                                <?php
                                    echo $error;
                                ?>
                            </p>
                        <hr>
                    <?php
                    }
                ?>
                

                <div class="username">
                    <input id="input-email" name="correo" type="email" value="<?php echo $correo ?>" required>
                    <label id="label-email" for="">Correo Electrónico</label>
                </div>

                <div class="username">
                    <input id="input-password" name="contrasena" type="password" required>
                    <label id="label-password" for="">Contraseña</label>
                </div>

                <div class="recordar">¿Olvidó su contraseña?</div>

                <input type="submit" value="Iniciar Sesión"></input>

                <div class="registrarse">
                    ¿No tienes una cuenta? <a href="./registro_usuario.php">crear cuenta.</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
