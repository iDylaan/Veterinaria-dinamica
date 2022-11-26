<?php 
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

    // * Consultar para obtener los vendedores
    $query_servicios = "SELECT * FROM servicios";
    $servicios = mysqli_query($db, $query_servicios);

    $error = '';

    // Ejecucion del codigo despues de que el usuario envia el formulario
    $mascota = '';
    $servicio = '';
    $fecha = '';
    $hora = '';
    $descripcion = '';
    $id_usr = $_SESSION['id'];
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $mascota = mysqli_real_escape_string( $db, $_POST['mascota'] );
        $servicio = mysqli_real_escape_string( $db, $_POST['tipo_servicio'] );
        $fecha = mysqli_real_escape_string( $db, $_POST['fecha'] );
        $hora = mysqli_real_escape_string( $db, $_POST['hora'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );

        // Validar el formulario
        if(!$mascota || !$servicio || !$fecha || !$hora || !$descripcion) {
            $error = 'Todos los campos son obligatorios.';
        } 

        // Validar fechas
        $today = date("Y-m-d");
        if($fecha >= $today) {
            $query_fechas = "SELECT fecha, hora FROM citas WHERE fecha >= '${today}'";
            $resultados_fecha_hora = mysqli_query($db, $query_fechas);

            
            $fecha_disponible = true;
            while ($fecha_hora = mysqli_fetch_assoc($resultados_fecha_hora)) {
                if($fecha_hora['fecha'] === $fecha && $fecha_hora['hora'] === ($hora . ":00")) {
                    $fecha_disponible = false;
                }
            }
            
            if($fecha_disponible) {
                // * Insertar en la base de datos
                $query = "INSERT INTO citas (mascota, fecha, hora, descripcion, id_servi, id_usr) VALUES 
                ( '${mascota}', '${fecha}', '${hora}', '${descripcion}', '${servicio}', '${id_usr}' );";

                $resultado = mysqli_query($db, $query);
                $fecha_disponible = true;

                if($resultado) {
                    // Redireccionar al usuario
                    header('Location: ./agenda_citas.php?estado=1');
                }
            } else {
                $error = 'Esa fecha ya no está disponible 😿';
            }


        } else {
            $error = 'Fecha no válida...';
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Formulario Agendar Una Cita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/styles/form_cita.css" />

    <script src="../src/js/form_cita.js" defer></script>
    <!-- Iconos FontAwesome -->
    <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>
</head>
<body>
    <header>
        <div class="header__container">
            <div class="header__nav-container">
                <div class="header__nav">
                    <div class="header__logo">
                        <a href="./index_sesion.php">
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
                            <a href="./index.php"><img id="logo" src="../src/imgs/logo.png" alt="Logo veterinaria"></a>
                        </div>

                        <div class="nav-mobile__main-options">
                            <a href="#" class="header__nav-link" id="nav-login" style="text-decoration: none;"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['nombre'] ?></a>
                            <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login" style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                        </div>

                        <div class="nav-mobile__secondary-options">
                            <a href="./index.php" class="header__nav-link" id="nav-home-mobile" style="text-decoration: none;"><i class="fa-solid fa-house"></i> Home</a> 
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </header> <!-- header -->


    <!-- FORMULARIO -->

    <div class="main__container">
        <!-- IMAGEN -->
        <div class="img__container">
            <!-- <img src="../src/imgs/FONDO DE CITAS.jpg" alt="Imagen decorativa"> -->
        </div>

        <!-- FORMULARIO -->
        <div class="form__container">
            <h1>Agenda una cita</h1>
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
                <section class="form__section-container">
                    <div class="form__section">
                        <label for="">Mascota (nombre)</label>
                        <input type="text" id="mascota" name="mascota" placeholder="Ej.- " value="<?php echo $mascota ?>" required>
                    </div>

                    <div class="form__section">
                        <label for="">Tipo de servicio</label>
                        <select name="tipo_servicio" id="tipo_servicio" value="<?php echo $servicio ?>" required>
                            <option value="" selected disabled>-- Selecciona un servicio --</option>
                            <?php while($row = mysqli_fetch_assoc($servicios) ): ?>
                                <option <?php echo $servicio === $row['id_servi'] ? 'selected' : '';?> value="<?php echo $row['id_servi'] ?>"> <?php echo $row['nom_servi'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </section>
                
                <section class="form__section-container">
                    <div class="form__section">
                        <label for="">Fecha</label>
                        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" required>
                    </div>

                    <div class="form__section">
                        <label for="">Hora</label>
                        <input type="time" min="10:00:00" max="18:00:00" name="hora" id="hora" value="<?php echo $hora; ?>" required>
                    </div>
                </section>

                <div class="form__section">
                    <label for="">Descripcion</label>
                    <textarea rows="10" maxlength="100" name="descripcion" id="descripcion" required><?php echo $descripcion; ?></textarea>
                </div>

                <div class="boton-submit">
                    <input type="submit" value="Agendar Cita"></input>
                </div>
            </form>
        </div>

    </div>
    
</body>
</html>