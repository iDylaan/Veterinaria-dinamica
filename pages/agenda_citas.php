<?php 
    $estado_cita = $_GET['estado'] ?? null; // ?? busca el valor y si no lo encuentra le setea null

    // * Importar la conexion
    // BASE DE DATOS
    require '../includes/config/database.php';
    $db = conectarDB();

    // * Autentificar al usuario
    session_start();
    $auth = $_SESSION['login'] ?? false;
    if(!$auth) {
        header('Location: ../index.php');
    }
    
    // ? Fecha del dia actual
    $today = date("Y-m-d");
    // * Reazliar consulta dependiendo del rol
    $query = "";
    if($_SESSION['id_rol'] === "1") { // En caso del cliente solo traer sus consultas
        // * Escribir el Query
        $query = "SELECT * FROM citas LEFT JOIN servicios ON citas.id_servi = servicios.id_servi WHERE citas.id_usr = '${_SESSION['id']}' AND fecha >= '${today}' ORDER BY fecha";
    } else {
        // * Escribir el Query
        $query = "SELECT * FROM citas LEFT JOIN servicios ON citas.id_servi = servicios.id_servi WHERE fecha >= '${today}' ORDER BY fecha";
    }

    if($query === "") {
        echo "Se producto un error en la consulta";
        exit;
    }

    // * Consultar la Base de Datos
    $resultado_citas = mysqli_query($db, $query);

    // Validar si las citas estan vacias
    $empty_citas = mysqli_num_rows($resultado_citas) === 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Agenda de Citas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../src/styles/agenda_citas.css">

    <script src="../src/js/agenda_citas.js" defer></script>
    <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>

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
                            <a href="./index.php" class="header__nav-link" id="nav-home" style="text-decoration: none;"><i class="fa-solid fa-house"></i> Home</a>
                            <a href="" class="header__nav-link" id="nav-pedidos" style="text-decoration: none;">Pedidos</a>
                        </div>
    
                        <div class="navegeador-lateral">
                            <a href="#" class="header__nav-link" id="nav-login" style="text-decoration: none;"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['nombre'] ?></a>
                            <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login" style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
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
                            <a href="#" class="header__nav-link" id="nav-login" style="text-decoration: none;"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['nombre'] ?></a>
                            <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login" style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                        </div>

                        <div class="nav-mobile__secondary-options">
                            <a href="./index.php" class="header__nav-link" id="nav-home-mobile" style="text-decoration: none;"><i class="fa-solid fa-house"></i> Home</a>
                            <a href="" class="header__nav-link" id="nav-pedidos-mobile" style="text-decoration: none;">Pedidos</a>   
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </header> <!-- header -->

    <div class="nueva-cita__container">
        <a id="form-nueva-cita" href="./form_cita.php">Agendar nueva cita</a>
    </div>

    <!-- AGENDA DE CITAS PROGRAMADAS -->
    <main>
        <div class="agenda__container">
            <div class="titulo-agenda">
                <h1>Mis citas</h1>
            </div>

            <?php if( $empty_citas ): ?>
                <h1 class="consulta-vacia">¿No tienes citas?, empieza creando una! 🙈</h1>
            <?php endif;?>

            <div class="citas__container">

                <?php 
                $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                while( $propiedad = mysqli_fetch_assoc($resultado_citas) ): 
                $date = date_create($propiedad['fecha']);
                ?>
                <div class="cita__container">
                    <div class="cita__detalles">

                        <div class="cita__fecha">
                            <p>Cita programada para el 
                                <span class="<?php echo $propiedad['id_servi'] === "1" ? "servicio-medico" : "servicio-estetico"; ?>">
                                    <?php echo $diasSemana[(date_format($date, "N") - 1)] . " " . date_format($date, "j") . " de " . $meses[(date_format($date, "n") - 1)] . " del " . date_format($date, "Y"); ?>
                                </span>
                            </p>
                        </div>
                        
                        <div class="cita__tipo-hora">
                            <div class="tipo-de-servicio">
                                <p>Tipo de servicio 
                                    <span class="<?php echo $propiedad['id_servi'] === "1" ? "servicio-medico" : "servicio-estetico"; ?>">
                                        <?php echo $propiedad['nom_servi'] ?>
                                    </span>
                                </p>
                            </div>
                            
                            <div class="cita-hora">
                                <p>Hora 
                                    <span class="<?php echo $propiedad['id_servi'] === "1" ? "servicio-medico" : "servicio-estetico"; ?>">
                                        <?php echo $propiedad['hora']?>
                                    </span>
                                </p>
                            </div>

                            <div class="cita-mascota">
                                <p>Mascota 
                                    <span class="<?php echo $propiedad['id_servi'] === "1" ? "servicio-medico" : "servicio-estetico"; ?>">
                                        <?php echo $propiedad['mascota']?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="cita__descripcion">
                        <label for="decripcion">Descripción</label>
                        <div class="descripcion">
                            <p name="Descripcion" id="cita__descripcion" cols="30" rows="10" maxlength="100">
                                <?php echo $propiedad['descripcion'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

            </div> <!-- citas cards container -->
        </div> <!-- agenda container -->

    </main>
    
</body>
</html>