

<?php
    require '../includes/funciones.php';
    // Validar que la sesion este iniciada
    if( !isset( $_SESSION ) ) {
        session_start();
    }

    // Validar que la sesion sea del veterinario o administrador
    if( $_SESSION['id_rol'] === "1" ) {
        header('Location: ./index.php');
    }

    // * Importar la conexion
    // BASE DE DATOS
    require '../includes/config/database.php';
    $db = conectarDB();

    $res_expediente = "";
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $ns_chip = $_GET['id'];

        $query = "SELECT
        ex.cla_chip as ns,
        ex.mascota,
        ex.fecha_nac_mascota as fecha,
        us.telefono,
        us.direccion,
        us.cp,
        ex.colores,
        se.sexo,
        ra.nombre_raza as raza,
        es.nom_spcie as especie,
        CONCAT(us.nombre, ' ', us.apellido_pa, ' ',us.apellido_ma) as propietario,
        us.correo
        FROM
        expedientes ex,
        usuarios us,
        razas ra,
        especies es,
        sexos se
        WHERE ex.id_sexo_mascota = se.id
        AND ex.id_usr = us.id
        AND ex.id_raza = ra.id
        AND ra.id_especie = es.id
        AND (ex.cla_chip = '${ns_chip}')";

        $res_expediente = mysqli_query( $db, $query );

        if(mysqli_num_rows($res_expediente) === 0) {
            header('Location: ./expedientes.php');
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Expediente</title>

    <link rel="stylesheet" href="../src/styles/detalles_expediente.css" />
</head>
<body>

    <div class="detalles__container">
        <p> <span>NS del Chip: </span> <?php echo $expediente['chip']; ?></p>
        <p> <span>Mascota: </span> <?php echo $expediente['mascota']; ?></p>
        <p> <span>Fecha de Nacimiento: </span> <?php echo date("d/m/Y", strtotime($expediente['nacimiento'])); ?></p>
        <p> <span>Sexo: </span> <?php echo $expediente['sexo']; ?></p>
        <p> <span>Especie: </span> <?php echo $expediente['especie']; ?></p>
        <p> <span>Raza: </span> <?php echo $expediente['raza']; ?></p>
        <p> <span>Colores: </span> <?php echo $expediente['colores']; ?></p>
        <p> <span>Propietario: </span> <?php echo $expediente['propietario']; ?></p>
        <p> <span>Teléfono: </span> <?php echo $expediente['telefono']; ?></p>
        <p> <span>Correo: </span> <?php echo $expediente['correo']; ?></p>
        <p> <span>Dirección</span> <?php echo $expediente['direccion']; ?></p>
        <p> <span>CP: </span> <?php echo $expediente['cp']; ?></p>
    </div>

    <?php while( $row = mysqli_fetch_assoc($res_expediente) ): ?>

    <h1>Detalles del expediente</h1>
    <main>
        <fieldset class="mascota__container">
            <legend>Mascota</legend>
            <div class="info__container">
                <label>NS Chip</label>
                <p><span class="content"><?php echo $row['ns']; ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Mascota</label>
                <p><span class="content"><?php echo $row['mascota']; ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Fecha de nacimiento</label>
                <p><span class="content"><?php echo date_create($row['fecha'])->format('d-m-Y'); ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Edad</label>
                <?php
                $today = date('Y-m-d');
                $birthday = date($row['fecha']);

                // [0] = años
                // [1] = meses
                // [2] = dias
                $date_diff = calcularDiferenciaFechaHastaHoy($birthday, $today);

                ?>
                <p><span class="content"><?php echo $date_diff[0]; ?></span> años y <span class="content"><?php echo $date_diff[1]; ?></span> meses</p>
            </div>
        
            <div class="info__container">
                <label>Sexo</label>
                <p><span class="content"><?php echo $row['sexo']; ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Especie</label>
                <p><span class="content"><?php echo $row['especie']; ?></span> <span class="content"><?php echo $row['raza']; ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Colores</label>
                <p><span class="content"><?php echo $row['colores']; ?></span></p>
            </div>
        </fieldset>
        
        <fieldset class="contacto__container">
            <legend>Contacto</legend>
            <div class="info__container">
                <label>Propietario</label>
                <p><span class="content"><?php echo $row['propietario']; ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Tel</label>
                <p><span class="content"><?php echo $row['telefono']; ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Email</label>
                <p><span class="content"><?php echo $row['correo']; ?></span></p>
            </div>
        
            <div class="info__container">
                <label>Dirección</label>
                <p><span class="content"><?php echo $row['direccion']; ?></span> ,CP <span class="content"><?php echo $row['cp']; ?></span></p>
            </div>
        </fieldset>
    </main>

    <div class="ubicacion__container">
        <!-- Aqui el contenido de la geolocalizacion -->
    </div>
<?php endwhile; ?>

</body>
</html>