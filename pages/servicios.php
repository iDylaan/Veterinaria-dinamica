<?php
    // Autentificar al usuario
    session_start();
    $auth = $_SESSION['login'] ?? false;
    if(!$auth) {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Servicios Veterinaria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../src/styles/servicios.css">
    
    <script src="../src/js/index.js" defer></script>
    <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>

</head>
<body>
    <header>
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
                            <a href="#" class="header__nav-link" id="nav-home"><i class="fa-solid fa-house"></i> Home</a>
                            <a href="./index.php#quienes-somos__container" class="header__nav-link" id="nav-quienes-somos">¿Quiénes
                                somos?</a>
                            <a href="" class="header__nav-link" id="nav-pedidos">Pedidos</a>
                            <a href="./agenda_citas.php" class="header__nav-link" id="nav-citas">Mis citas</a>
                            <a href="./index.php#ubicacion__container" class="header__nav-link" id="nav-ubicacion">Ubicación</a>
                        </div>
    
                        <div class="navegeador-lateral">
                            <a href="" class="header__nav-link" id="nav-carrito"><i class="fa-solid fa-cart-shopping"></i>
                                Carrito</a>
                            <a href="" class="header__nav-link" id="nav-login"><i class="fa-solid fa-user"></i>
                                <?php echo $_SESSION['nombre']; ?>
                            </a>
                            <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login"><i
                                    class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <section class="header-nav-mobil">
                <div id="back-menu"></div>
    
                <div class="header-nav-mobil__container">
                    <div class="nav-mobil__opciones" id="menu-responsive-lateral">
    
                        <div class="nav-mobile__logo">
                            <img id="logo" src="../src/imgs/logo.png" alt="Logo veterinaria">
                        </div>
    
    
                        <div class="nav-mobile__main-options">
                            <a href="" class="header__nav-link" id="nav-login-mobile"><i class="fa-solid fa-user"></i>
                                <?php echo $_SESSION['nombre']; ?>
                            </a>
                            <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login-mobile"><i
                                    class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                            <a href="" class="header__nav-link" id="nav-carrito-mobile"><i
                                    class="fa-solid fa-cart-shopping"></i> Carrito</a>
                        </div>
    
                        <div class="nav-mobile__secondary-options">
                            <a href="#" class="header__nav-link" id="nav-home-mobile"><i class="fa-solid fa-house"></i>
                                Home</a>
                            <a href="./index.php#quienes-somos__container" class="header__nav-link"
                                id="nav-quienes-somos-mobile">¿Quiénes somos?</a>
                            <a href="" class="header__nav-link" id="nav-pedidos-mobile">Pedidos</a>
                            <a href="./agenda_citas.php" class="header__nav-link" id="nav-citas-mobile">Mis Citas</a>
                            <a href="./index.php#ubicacion__container" class="header__nav-link" id="nav-ubicacion-mobile">Ubicación</a>
                        </div>
    
                    </div>
                </div>
            </section>

            <div class="header__title">
                <h1 id="header__title-h1">Servicios de estética <br /> y atención médica😽</h1>
            </div>
        </div>
    
    </header> <!-- header -->
    

    <div class="main_container">
        
    </div>


    <footer>
        <div class="bg-footer"></div>
        <div class="redes">
            REDES SOCIALES<br>
            <a href="https://www.facebook.com/profile.php?id=100086393047213"><i class="fa-brands fa-facebook"></i>
                Facebook</a> <br>
            <a href="https://www.instagram.com/mascota_feliz12/"><i class="fa-brands fa-instagram"></i> Instagram</a>
        </div>
        <div class="copy">
            COPYRIGHT <br>
            Derechos reservados para el equipo de desarrollo <br>
            © NIDT
            <?php echo date("Y"); ?>
        </div>
        <div class="politicas">
            <!-- POLITICAS DE PRIVACIDAD <br> -->
            <a href="https://espai.es/privacidad/">Políticas de Privacidad</a>
        </div>
    </footer> <!-- Pie de Página -->
</body>
</html>