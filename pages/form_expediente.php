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

    // * Consultar para obtener los expedientes
    $query_expedientes = "SELECT * FROM expedientes";
    $expedientes = mysqli_query($db, $query_expedientes);

    $chip_existente = false;

    $error = '';
    
    // Ejecucion del codigo despues de que el usuario envia el formulario
    $cla_chip = '';
    $mascota = '';
    $fecha_nac_mascota = '';
    $id_sexo_mascota = '';
    $id_raza = '';
    $colores = '';
    $id_usr = '';
    $telefono = '';
    $direccion = '';
    $cp = '';

    // ? Fecha actual local
    $today = date("Y-m-d");

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cla_chip = mysqli_real_escape_string($db, $_POST['cla_chip']);
        $mascota = mysqli_real_escape_string($db, $_POST['mascota']);
        $fecha_nac_mascota = mysqli_real_escape_string($db, $_POST['fecha_nacimiento']);
        $id_sexo_mascota = mysqli_real_escape_string($db, $_POST['sexo']);
        $colores = mysqli_real_escape_string($db, $_POST['colores']);
        $id_raza = mysqli_real_escape_string($db, $_POST['raza']);
        $id_usr = mysqli_real_escape_string($db, $_POST['usuario']);
        $telefono = mysqli_real_escape_string($db, $_POST['telefono']);
        $direccion = mysqli_real_escape_string($db, $_POST['direccion']);
        $cp = mysqli_real_escape_string($db, $_POST['cp']);


        if (
           !$cla_chip 
        || !$mascota 
        || !$fecha_nac_mascota 
        || !$id_sexo_mascota 
        || !$colores
        || !$id_raza
        || !$id_usr
        || !$telefono
        || !$direccion
        || !$cp
        ) { $error = 'Todos los campos son obligatorios.'; } 
        else if ( strlen($cla_chip) !== 20) 
        { $error = 'El NS del Chip debe contener 20 caracteres'; }
        else if ( strlen($mascota) < 2)
        { $error = 'El nombre mínimo de una mascota puede ser de dos caracteres'; }
        else if ( $fecha_nac_mascota >  $today ) 
        { $error = 'Esa fecha no es válida'; }
        else if ( strlen($telefono) !== 10 )
        { $error = 'El teléfono debe ser de 10 dígitos'; }
        else if ( strlen($cp) !== 5)
        { $error = 'El código postal debe ser de 5 dígitos'; }


        while($chip = mysqli_fetch_assoc($expedientes)):
            if($chip['cla_chip'] === $cla_chip) {
                $chip_existente = true;
                $error = "Ese NS del Chip no está disponible... 🙀";
            }
        endwhile; 

        if( !$error ) {
            // * Insertar a la base de datos
            $query = "INSERT INTO expedientes (cla_chip, mascota, fecha_nac_mascota, id_sexo_mascota, colores, id_raza, id_usr, telefono, direccion, cp) VALUES 
            ('${cla_chip}', '${mascota}', '${fecha_nac_mascota}', ${id_sexo_mascota}, '${colores}', ${id_raza}, ${id_usr}, '${telefono}', '${direccion}', ${cp})";

            $resultado = mysqli_query( $db, $query );

            if ( $resultado ) {
                // TODO Ok en el registro
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
    <title>Nuevo Expediente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../src/styles/form_expediente.css">
</head>
<body>
    
    <div class="main__container">
        <h1>Registrar Expediente</h1>
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
        <form method="POST">
            <div class="mascota__container">
                <fieldset>
                    <legend>Datos de la Mascota</legend>

                    <div class="input__text">
                        <label for="cla_chip">NS del Chip de Rastreo:</label>
                        <input 
                        type="text" 
                        name="cla_chip" 
                        id="NS"
                        placeholder="XXXXX-XXXXX-XXXXX-XXXXX (20 Caracteres)" 
                        value="<?php echo $cla_chip; ?>"
                        onkeyup="
                            var start = this.selectionStart;
                            var end = this.selectionEnd;
                            this.value = this.value.toUpperCase();
                            this.setSelectionRange(start, end);
                        "
                        maxlength="20"
                        required>
                    </div>

                    <p class="label-error">
                        <?php echo $chip_existente ? $error : "";?>
                    </p>

                    <div class="input__text">
                        <label for="mascota">Mascota:</label>
                        <input 
                        type="text" 
                        name="mascota" 
                        placeholder="Ej.- Cheetos" 
                        value="<?php echo $mascota; ?>"
                        required>
                    </div>
                    
                    <div class="input__date">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input 
                        type="date" 
                        name="fecha_nacimiento" 
                        max="<?php echo $today; ?>"
                        value="<?php echo $fecha_nac_mascota; ?>"
                        required>
                    </div>
                    
                    <div class="input__radio">
                        <label for="sexo">Sexo:</label>
                        <div class="sexo-form__container">
                            <input type="radio" id="hembra" name="sexo" value="1" <?php echo $id_sexo_mascota === "1" || !$id_sexo_mascota ? "checked" : ""?> >
                            <label for="hembra">Hembra</label>
                            
                            <input type="radio" id="macho" name="sexo" value="2" <?php echo $id_sexo_mascota === "2" ? "checked" : ""?> >
                            <label for="macho">Macho</label>
                        </div>
                    </div>

                    <div class="input__select">
                        <label for="raza">Raza:</label>
                        <select name="raza" id="raza" required>
                            <option value="" disabled selected>-- Selecciona una raza --</option>
                            <?php 
                            $query_razas = "SELECT 
                            r.id as id,  r.nombre_raza as raza, especies.nom_spcie as especie
                            FROM razas r
                            INNER JOIN especies
                            ON r.id_especie = especies.id
                            ORDER BY r.id";

                            $razas = mysqli_query($db, $query_razas);

                            while($raza = mysqli_fetch_assoc($razas) ): ?>
                            <option value="<?php echo $raza['id']; ?>" <?php echo $id_raza === $raza['id'] ? "selected" : "";?> >
                            <?php echo $raza['especie'] ?>: <?php echo $raza['raza'] ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="input__text">
                        <label for="colores">Colores:</label>
                        <input 
                        type="text" 
                        name="colores" 
                        placeholder="Describe los colores de la mascota" 
                        value="<?php echo $colores; ?>"
                        required>    
                    </div>
                    
                </fieldset>
            </div>
            
            <div class="contacto__container">
                <fieldset>
                    <legend>Datos de Contacto</legend>

                    <div class="input__select">
                        <label for="usuario">Responsable</label>
                        <select name="usuario" required>
                            <option value="" disabled selected>-- Selecciona al usuario --</option>
                            <?php 
                            $query_usuarios = 
                            "SELECT id, nombre, apellido_pa, apellido_pa, correo
                            FROM usuarios
                            WHERE id_rol = '1'
                            ORDER BY nombre";

                            $usuarios = mysqli_query($db, $query_usuarios);

                            while($usuario = mysqli_fetch_assoc($usuarios)): 
                            $user_details = 
                            $usuario['nombre'] . " " . 
                            $usuario['apellido_pa'] . " " . 
                            $usuario['apellido_ma'] . " | " . 
                            $usuario['correo'];
                            ?>
                            <option value="<?php echo $usuario['id']; ?>" <?php echo $id_usr === $usuario['id'] ? "selected" : "";?>>
                            <?php echo $user_details; ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="input__text">
                        <label for="telefono">Teléfono:</label>
                        <input 
                        type="text" 
                        name="telefono"
                        placeholder="XX-XXXX-XXXX (10 dígitos)"
                        value="<?php echo $telefono; ?>" 
                        required>
                    </div>

                    <div class="input__text">
                        <label for="direccion">Dirección:</label>
                        <input 
                        type="text" 
                        name="direccion" 
                        value="<?php echo $direccion; ?>"
                        required>
                    </div>

                    <div class="input__text">
                        <label for="cp">Código Postal:</label>
                        <input 
                        type="text" 
                        name="cp"
                        value="<?php echo $cp; ?>"
                        required>
                    </div>
                </fieldset>
            </div>
            <div class="opciones__container">
                <input type="submit" value="Registrar Expediente" id="btn__registrar">
                <a href="./expedientes.php" id="btn__cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>