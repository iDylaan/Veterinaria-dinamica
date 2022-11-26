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

    // En caso de eliminar
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_GET['id'];
        $query = "DELETE FROM expedientes WHERE cla_chip = '${id}'";
        $resultado = mysqli_query($db, $query);

        if( $resultado ) {
            // TODO Ok, Se eliminó correctamente...
            header('Location: ./expedientes.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Expedientes</title>

    <link rel="stylesheet" href="../src/styles/expedientes.css" />

    <script src="../src/js/expedientes.js" defer></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>

</head>
<body>
    <header id="main-header">
        <div class="header__container">
            <div class="header__nav-container">
                <div class="header__nav">
                    <div class="header__logo">
                        <a href="./index.php">
                            <img id="logo" src="../src/imgs/logo.png" alt="Logo veterinaria">
                            <h1><span>v</span>eterinaria</h1>
                        </a>
                    </div>

                    <div class="header__nav-mobile">
                        <div class="bars__menu">
                            <span class="line1__bars-menu"></span>
                            <span class="line2__bars-menu"></span>
                            <span class="line3__bars-menu"></span>
                        </div>
                    </div>
                    
                    <div class="header__nav-desktop">
                        <div class="header__navegador-central">
                            <a href="./index.php" class="header__nav-link" id="nav-home"><i class="fa-solid fa-house"></i> Home</a>
                            <a href="" class="header__nav-link" id="nav-pedidos">Pedidos</a>
                        </div>
    
                        <div class="navegeador-lateral">
                            <a href="./form_expediente.php" class="header__nav-link"><i class="fa-solid fa-microchip"></i> Chip de Rastreo</a>
                            <a href="#" class="header__nav-link" id="nav-login"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['nombre'] ?></a>
                            <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="header-nav-mobil">
                <div id="back-menu"></div>

                <div class="header-nav-mobil__container">

                    <div class="nav-mobil__opciones" id="menu-responsive-lateral">

                        <div class="nav-mobile__logo">
                            <a href="../index.php"><img id="logo" src="../src/imgs/logo.png" alt="Logo veterinaria"></a>
                        </div>


                        <div class="nav-mobile__main-options">
                            <a href="./form_expediente.php" class="header__nav-link"><i class="fa-solid fa-microchip"></i> Chip de Rastreo</a>
                            <a href="#" class="header__nav-link" id="nav-login"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['nombre'] ?></a>
                            <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                        </div>

                        <div class="nav-mobile__secondary-options">
                            <a href="./index.php" class="header__nav-link" id="nav-home-mobile"><i class="fa-solid fa-house"></i> Home</a>
                            <a href="" class="header__nav-link" id="nav-pedidos-mobile">Pedidos</a>   
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </header> <!-- header -->

    <div class="buscador__container">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar por Nombre" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <!-- <input type="text" placeholder="Buscar por nombre"> -->
    </div>

    <div class="nuevo-expediente__container">
        <a id="form-nuevo-expediente" href="./form_expediente.php">Crear Expediente</a>
    </div>

    <div class="lista__expedientes">
        <table>
            <thead>
                <tr>
                    <!-- <th>NS Chip</th> -->
                    <th>Mascota</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Sexo</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <!-- <th>Colores</th> -->
                    <th>Propietario</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <!-- <th>Dirección</th> -->
                    <!-- <th>CP</th> -->
                    <th colspan="3">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query_expedientes = "SELECT 
                ex.cla_chip as chip,
                ex.mascota,
                ex.fecha_nac_mascota as nacimiento,
                ex.colores,
                se.sexo,
                es.nom_spcie as especie,
                ra.nombre_raza as raza,
                CONCAT(us.nombre, ' ', us.apellido_pa, ' ',us.apellido_ma) as propietario,
                ex.telefono,
                us.correo,
                ex.direccion,
                ex.cp
                FROM 
                expedientes ex, 
                sexos se, 
                especies es, 
                razas ra,
                usuarios us
                WHERE ex.id_sexo_mascota = se.id
                AND ex.id_raza = ra.id
                AND ra.id_especie = es.id
                AND ex.id_usr = us.id";

                $expedientes = mysqli_query($db, $query_expedientes);

                while($expediente = mysqli_fetch_assoc($expedientes)):
                ?>
                <tr>
                    <!-- <td><?php //echo $expediente['chip']; ?></td> -->
                    <td><?php echo $expediente['mascota']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($expediente['nacimiento'])); ?></td>
                    <td><?php echo $expediente['sexo']; ?></td>
                    <td><?php echo $expediente['especie']; ?></td>
                    <td><?php echo $expediente['raza']; ?></td>
                    <!-- <td><?php //echo $expediente['colores']; ?></td> -->
                    <td><?php echo $expediente['propietario']; ?></td>
                    <td><?php echo $expediente['telefono']; ?></td>
                    <td><?php echo $expediente['correo']; ?></td>
                    <!-- <td><?php //echo $expediente['direccion']; ?></td> -->
                    <!-- <td><?php //echo $expediente['cp']; ?></td> -->
                    <td class="table__option"><a href="./detalle_expediente.php?id=<?php echo $expediente['chip']; ?>" id="detalles"><i class="fa-solid fa-bars-staggered"></i> Detalles</a></td>
                    <td class="table__option"><a href="./form_actualizar_expediente.php?id=<?php echo $expediente['chip']; ?>" id="editar"><i class="fa-solid fa-pen-to-square"></i> Editar</a></td>
                    <td class="table__option">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $expediente['chip']; ?>">
                            <button type="submit" id="eliminar"><i class="fa-solid fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>