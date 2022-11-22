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
</body>
</html>