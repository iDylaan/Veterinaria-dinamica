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

    $id_usr = $_GET['id'];

    $resultado_usuario = "";

    $error = "";

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        $query_usuarios = "SELECT * FROM usuarios
        WHERE id = '${id_usr}'
        ORDER BY nombre";

        $resultado_usuario = mysqli_query($db, $query_usuarios);

        if(mysqli_num_rows($resultado_usuario) === 0) {
            header('Location: ./expedientes.php');
        }
    }


    // Variables del formulario
    $telefono = "";
    $direccion = "";
    $cp = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $telefono = mysqli_real_escape_string($db, $_POST['tel']);
        $direccion = mysqli_real_escape_string($db, $_POST['dir']);
        $cp = mysqli_real_escape_string($db, $_POST['cp']);
        
        if ( !$telefono || !$direccion || !$cp) { $error = 'Todos los campos son obligatorios.'; } 
        else if(strlen($telefono) !== 10) { $error = 'Registra un número de teléfono válido'; }
        else if(strlen($cp) !== 5) { $error = 'Registra un código postal válido'; }

        if( !$error ) {
            $query_contacto = "UPDATE usuarios SET
            telefono = '${telefono}',
            direccion = '${direccion}',
            cp = '${cp}'
            WHERE id = '${id_usr}';";

            $resultado_contacto = mysqli_query( $db, $query_contacto );

            if($resultado_contacto) {
                // TODO Ok en el registro del contacto
                header('Location: ./expedientes.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Contacto</title>
        <link rel="stylesheet" href="../src/styles/form_expediente.css">

        <script src="../src/js/form_contacto.js" defer></script>
    </head>

    <body>
        
    <div class="form__contacto">
        <form method="POST">
            <div class="contacto__container">
                <fieldset>
                    <legend>Datos de Contacto</legend>
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

                    <div class="input__select">
                        <label for="usuario">Responsable</label>
                        <?php 
                                $user_details = ""; 
                                while($usuario = mysqli_fetch_assoc($resultado_usuario)): 
                                    $user_details = 
                                    $usuario['nombre'] . " " . 
                                    $usuario['apellido_pa'] . " " . 
                                    $usuario['apellido_ma'] . " | " . 
                                    $usuario['correo'];
                                endwhile; ?>
                        <p> <?php echo $user_details; ?> </p>
                    </div>

                    <div class="input__text">
                        <label for="telefono">Teléfono:</label>
                        <input 
                        type="text" 
                        name="tel"
                        id="telefono"
                        placeholder="XX-XXXX-XXXX (10 dígitos)"
                        value="<?php echo $telefono; ?>"
                        maxlength="10"
                        required>
                    </div>

                    <div class="input__text">
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="dir" value="<?php echo $direccion; ?>" required>
                    </div>

                    <div class="input__text">
                        <label for="cp">Código Postal:</label>
                        <input 
                        type="text" 
                        name="cp" 
                        id="cp"
                        value="<?php echo $cp; ?>"
                        maxlength="5"
                        required>
                    </div>
                </fieldset>
            </div>
            <div class="opciones__container">
                <input type="submit" value="Registrar Datos de Contacto" id="btn__registrar">
            </div>
        </form>
    </div>

    </body>

</html>