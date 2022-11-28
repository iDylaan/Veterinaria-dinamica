<?php
    // Autentificar al usuario
    session_start();
    $auth = $_SESSION['login'] ?? false;
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
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>

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
                            <a href="./index.php#ubicacion__container" class="header__nav-link" id="nav-ubicacion">Ubicación</a>
                        </div>
    
                        <div class="navegeador-lateral">
                            <a href="./agenda_citas.php" class="header__nav-link" id="nav-citas"><i class="fa-regular fa-calendar"></i> Mis citas</a>

                            <?php
                            if($auth && $_SESSION['id_rol'] === '2'): ?>
                            <a href="expedientes.php" class="header__nav-link"><i class="fa-solid fa-book-open"></i> Expedientes</a>
                            <?php 
                            else: ?>
                            <a href="" class="header__nav-link" id="nav-carrito"><i class="fa-solid fa-cart-shopping"></i>Carrito</a>
                            <?php endif; ?>
                            <?php 
                            if ($auth): ?>
                                <a href="" class="header__nav-link" id="nav-login-mobile"><i class="fa-solid fa-user"></i>
                                <?php echo $_SESSION['nombre']; 
                            endif;
                            ?>
                            </a>
                            <?php
                            if($auth):
                                ?>
                                <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                                <?php
                            else:
                                ?>
                                <a href="./inicio_sesion.php" class="header__nav-link" id="nav-login"><i class="fa-solid fa-user"></i> Iniciar Sesión</a>
                                <?php
                            endif;
                            ?>
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
                            <?php 
                                if ($auth): ?>
                                    <a href="" class="header__nav-link" id="nav-login-mobile"><i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION['nombre']; 
                                endif;
                                ?>
                            </a>
                            <?php
                            if($auth && $_SESSION['id_rol'] === '2'): ?>
                            <a href="expedientes.php" class="header__nav-link"><i class="fa-solid fa-book-open"></i> Expedientes</a>
                            <?php 
                            else: ?>
                            <a href="" class="header__nav-link" id="nav-carrito"><i class="fa-solid fa-cart-shopping"></i>Carrito</a>
                            <?php endif; ?>
                            <a href="./agenda_citas.php" class="header__nav-link" id="nav-citas-mobile"><i class="fa-regular fa-calendar"></i> Mis Citas</a>
                            
                            <?php
                            if($auth):
                                ?>
                                <a href="./cerrar_sesion.php" class="header__nav-link" id="nav-login-mobile"><i
                                    class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                                <?php
                            else:
                                ?>
                                <a href="./inicio_sesion.php" class="header__nav-link" id="nav-login-mobile"><i class="fa-solid fa-user"></i> Iniciar Sesión</a>
                                <?php
                            endif;
                            ?>
                        </div>

                        <div class="nav-mobile__secondary-options">
                            <a href="#" class="header__nav-link" id="nav-home-mobile"><i class="fa-solid fa-house"></i>
                                Home</a>
                            <a href="./index.php#quienes-somos__container" class="header__nav-link"
                                id="nav-quienes-somos-mobile">¿Quiénes somos?</a>
                            <a href="" class="header__nav-link" id="nav-pedidos-mobile">Pedidos</a>
                            <a href="./index.php#ubicacion__container" class="header__nav-link" id="nav-ubicacion-mobile">Ubicación</a>
                        </div>
    
                    </div>
                </div>
            </section>


            <div class="header__title">
                <h1 id="header__title-h1">Servicios de estética <br /> y atención médica😽</h1>
            </div>

            <div class="btn-agendar__container">
                <a href="<?php echo $auth ? "./form_cita.php" : "./inicio_sesion.php"; ?>" class="header__btn-agendar">Agendar cita</a>
            </div>
        </div>
    
    </header> <!-- header -->
    

    <div class="servicios__container">
        <div class="servicios__title-container">
            <h1> <span class="servicios__title-nuestros">Nuestros</span> <br />Servicios</h1>
        </div>

        <div class="servicios__list-container">
            <div class="servicios__list-col1">
                <div class="servicio__card">
                    <h1>EXÁMENES DE CONTROL</h1>
                    <p> Prestando especial interés a los ojos, oídos, boca, articulaciones, auscultación cardíaca y pulmonar, órganos reproductores, aspecto del pelaje … Nos van a proporcionar mucha información sobre el estado general de cada paciente.</p>
                </div>

                <div class="servicio__card">
                    <h1>MICRO CHIPS</h1>
                    <p>Estos microchips tienen una vida útil de 20 a 25 años, permitiendo que la mascota pueda ser recuperada incluso años después.

Se aplican de manera rápida y fácil por tu veterinario de forma subcutánea igual que una inyección. Esto nos da la confianza de que nuestra mascota quedará identificada de por vida. Será su huella digital.</p>
                    <?php
                    if($auth && $_SESSION['id_rol'] === '2'):
                    ?>
                    <a href="./form_expediente.php" id="btn__generar-expediente">Generar Expediente</a>
                    <?php endif; ?>
                </div>

                <div class="servicio__card">
                    <h1>SERVICIO DE EMERGENCIA</h1>
                    <p>Muchos centros y hospitales veterinarios prestan asistencia en caso de emergencias. Para ello, cuentan con un teléfono específico que se atiende durante las 24 horas. «El veterinario está localizable y acude al centro veterinario tras valorar la urgencia por teléfono», señala José Luis Villaluenga, director de la editorial veterinaria Acalanthis, en su artículo ‘El servicio de urgencias en los centros veterinarios: una reflexión práctica’.</p>
                </div>
            </div> <!-- Columna 1 Servicios -->

            <div class="servicios__list-col2">
                <div class="servicio__card">
                    <h1>CIRUJÍA</h1>
                    <p>La cirugía general o de tejidos blandos es la medicina veterinaria que se ocupa del tratamiento quirúrgico de patologías que afectan a órganos internos, piel y musculatura de los animales. También se engloban aquí cirugías realizadas con fines preventivos, diagnósticos o paliativos.</p>
                </div>

                <div class="servicio__card">
                    <h1>ASEO</h1>
                    <p>La falta de higiene de animales de compañía genera padecimientos infecciosos y parasitarios a las personas por ingesta de agua, alimentos o al respirar polvo contaminado con heces o secreciones de gato, lo que causa problemas en distintos órganos y es peligrosa cuando la mujer embarazada la transmite a su hijo a través de la placenta, porque puede provocar pérdida de la visión.</p>
                </div>

                <div class="servicio__card">
                    <h1>ASISTENCIA DENTAL</h1>
                    <p>La odontología veterinaria de pequeños animales es la especialidad en la que más ha avanzado la medicina veterinaria en los últimos años tanto en lo que se refiere a materiales como a técnicas. Una de las razones de los continuos avances en este campo es la desidia que ha dominado esta especialidad durante muchos años. Los profesionales veterinarios y auxiliares deben seguir perfeccionando sus conocimientos para poder practicar endodoncias, ortodoncias y odontologías reconstructivas en los casos en que sea necesario, pero sin olvidar que ninguno de estos tratamientos será útil si la enfermedad periodontal está fuera de control.</p>
                </div> 
            </div> <!-- Columna 2 Servicios -->
        </div> <!-- Lista de servicios -->
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