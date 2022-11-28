<?php 
    // Valida que la sesion este iniciada
    if( !isset( $_SESSION ) ) {
        session_start();
    }

    // Validar que la sesion sea del administrador
    if( $_SESSION['id_rol'] !== "3" ) {
        header('Location: /Veterinaria-dinamica/pages/index.php');
    }


?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Agenda de Citas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="../src/styles/header_admin.css" />
        <link rel="stylesheet" href="../src/styles/index_admin.css" />
        <link rel="stylesheet" href="../src/styles/productos_admin.css" />

        <script src="../src/js/header.js" defer></script>
        <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>
    </head>

    <body>
        <header id="main-header">
            <div class="header__container">
                <div class="header__nav-container">
                    <div class="header__nav">
                        <div class="header__logo">
                            <a href="./index_admin.php">
                                <img id="logo" src="../src/imgs/logo.png" alt="Logo veterinaria" />
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
                                <a href="./index_admin.php" class="header__nav-link" id="nav-home">
                                    <i class="fa-solid fa-house"></i> Home
                                </a>
                                <a href="" class="header__nav-link" id="nav-pedidos">
                                    Operadores
                                </a>
                                <a href="" class="header__nav-link" id="nav-pedidos">
                                    Productos
                                </a>
                            </div>

                            <div class="navegeador-lateral">
                                <a href="#" class="header__nav-link" id="nav-login">
                                    <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido_pa'] . " " . $_SESSION['apellido_ma'] ?>
                                </a>
                                <a href="../pages/cerrar_sesion.php" class="header__nav-link" id="nav-login">
                                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="header-nav-mobil">
                    <div id="back-menu"></div>

                    <div class="header-nav-mobil__container">
                        <div class="nav-mobil__opciones" id="menu-responsive-lateral">
                            <div class="nav-mobile__logo">
                                <a href="./index_header.php"><img id="logo" src="../src/imgs/logo.png"
                                        alt="Logo veterinaria" /></a>
                            </div>

                            <div class="nav-mobile__main-options">
                                <a href="#" class="header__nav-link" id="nav-login">
                                    <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION['nombre'] ?>
                                </a>
                                <a href="../pages/cerrar_sesion.php" class="header__nav-link" id="nav-login">
                                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                                </a>
                            </div>

                            <div class="nav-mobile__secondary-options">
                                <a href="./index_admin.php" class="header__nav-link" id="nav-home-mobile">
                                    <i class="fa-solid fa-house"></i> Home
                                </a>
                                <a href="" class="header__nav-link" id="nav-pedidos-mobile">Pedidos</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </header> <!-- header -->