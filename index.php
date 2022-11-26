<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Página Principal VETERINARIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="./src/styles/index.css" />

    <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>
    <script src="./src/js/index.js" defer></script>

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
                            <img id="logo" src="./src/imgs/logo.png" alt="Logo veterinaria">
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
                            <a href="#quienes-somos__container" class="header__nav-link" id="nav-quienes-somos">¿Quiénes somos?</a>
                            <a href="./pages/inicio_sesion.php" class="header__nav-link" id="nav-pedidos">Pedidos</a>
                            <a href="./pages/inicio_sesion.php" class="header__nav-link" id="nav-citas">Mis citas</a>
                            <a href="#ubicacion__container" class="header__nav-link" id="nav-ubicacion">Ubicación</a>
                        </div>
    
                        <div class="navegeador-lateral">
                            <a href="#" class="header__nav-link" id="nav-carrito"><i class="fa-solid fa-cart-shopping"></i> Carrito</a>
                            <a href="./pages/inicio_sesion.php" class="header__nav-link" id="nav-login"><i class="fa-solid fa-user"></i> Iniciar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="categorias-desktop">
                <div class="categorias__container">

                    <a class="cate__nav-link" href="">
                        <div class="categorias__productos">
                            <i class="fa-solid fa-store"></i>
                            <p>Productos</p>
                        </div>
                    </a>
                    
                    <a class="cate__nav-link" href="./pages/servicios.php">
                        <div class="categorias__estetica">
                            <i class="fa-solid fa-shield-dog"></i>
                            <p>Servicios</p>
                        </div>
                    </a>
                </div>
            </section>

            <section class="header-nav-mobil">
                <div id="back-menu"></div>

                <div class="header-nav-mobil__container">
                    <div class="nav-mobil__opciones" id="menu-responsive-lateral">

                        <div class="nav-mobile__logo">
                            <img id="logo" src="./src/imgs/logo.png" alt="Logo veterinaria">
                        </div>


                        <div class="nav-mobile__main-options">
                            <a href="./pages/inicio_sesion.php" class="header__nav-link" id="nav-login-mobile"><i class="fa-solid fa-user"></i> Iniciar Sesión</a>
                            <a href="#" class="header__nav-link" id="nav-carrito-mobile"><i class="fa-solid fa-cart-shopping"></i> Carrito</a>
                        </div>

                        <div class="nav-mobile__secondary-options">
                            <a href="#" class="header__nav-link" id="nav-home-mobile"><i class="fa-solid fa-house"></i> Home</a>
                            <a href="#quienes-somos__container" class="header__nav-link" id="nav-quienes-somos-mobile">¿Quiénes somos?</a>
                            <a href="./pages/inicio_sesion.php" class="header__nav-link" id="nav-pedidos-mobile">Pedidos</a>
                            <a href="./pages/inicio_sesion.php" class="header__nav-link" id="nav-citas-mobile">Mis Citas</a>
                            <a href="#ubicacion__container" class="header__nav-link" id="nav-ubicacion-mobile">Ubicación</a>    
                        </div>

                       </div>
                </div>
            </section>
        </div>

    </header> <!-- header -->

    <!-- CARRUSEL -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./src/imgs/banners/banner1-carrusel.jpg" class="d-block w-100" alt="banner1">
            </div>
            <div class="carousel-item">
                <img src="./src/imgs/banners/banner2-carrusel.jpg" class="d-block w-100" alt="banner2">
            </div>
            <div class="carousel-item">
                <img src="./src/imgs/banners/banner3-carrusel.jpg" class="d-block w-100" alt="banner3">
            </div>
            <div class="carousel-item">
                <img src="./src/imgs/banners/banner4-carrusel.jpg" class="d-block w-100" alt="banner4">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- PRODUCTOS FAVORITOS -->
    <div class="productos-favoritos__container">
        <h1>Estos son los productos favoritos de nuestros clientes 🦮</h1>

        <section class="productos__desktop">
            <div class="producto-izq__container">
                <div class="producto-izq__imagen">
                    <img src="./src/imgs/pd-1.webp" alt="Imagen de producto">
                </div>
    
                <div class="producto-izq__details">
                    <div>
                        <p class="producto__titulo">Pato Interactivo para Esconder Premios, con Silbato Chillón</p>
                        <p class="producto__precio">$ <span class="cantidad">226.00</span> <span class="moneda">MXN</span>
                        </p>
                    </div>
    
                    <div class="producto-izq__boton">
                        <button id="agregar-al-carrito">
                            Agregar al carrito
                        </button>
                    </div>
                </div>
            </div> <!-- Producto izquierdo -->
    
            <div class="producto-dcha__container">
    
                <div class="producto-dcha__details">
                    <div>
                        <p class="producto__titulo">Collar Antipulgas Antigarrapatas para Perros y Gatos Duración 8 Meses
                        </p>
                        <p class="producto__precio">$ <span class="cantidad">120.00</span> <span class="moneda">MXN</span>
                        </p>
                    </div>
                    <div class="producto-dcha__boton">
                        <button id="agregar-al-carrito">
                            Agregar al carrito
                        </button>
                    </div>
                </div>
    
                <div class="producto-dcha__imagen">
                    <img src="./src/imgs/pd-2.webp" alt="Imagen de producto">
                </div>
    
            </div> <!-- Producto derecho -->
        </section>

        <section class="productos__mobile">
            <div class="producto__container">
                <div class="producto__imagen">
                    <img src="./src/imgs/pd-1.webp" alt="Imagen de producto">
                </div>
    
                <div class="producto__details">
                    <div>
                        <p class="producto__titulo">Pato Interactivo para Esconder Premios, con Silbato Chillón</p>
                        <p class="producto__precio">$ <span class="cantidad">226.00</span> <span class="moneda">MXN</span>
                        </p>
                    </div>
    
                    <div class="producto__boton">
                        <button id="agregar-al-carrito">
                            Agregar al carrito
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="producto__container">

                <div class="producto__imagen">
                    <img src="./src/imgs/pd-2.webp" alt="Imagen de producto">
                </div>
    
                <div class="producto__details">
                    <div>
                        <p class="producto__titulo">Collar Antipulgas Antigarrapatas para Perros y Gatos Duración 8 Meses
                        </p>
                        <p class="producto__precio">$ <span class="cantidad">120.00</span> <span class="moneda">MXN</span>
                        </p>
                    </div>
                    <div class="producto__boton">
                        <button id="agregar-al-carrito">
                            Agregar al carrito
                        </button>
                    </div>
                </div>
    
            </div> <!-- Producto derecho -->
        </section>

        <div class="productos-favoritos__boton-ver-todo">
            <button id="btn-ver-todo">Ver todo</button>
        </div>
    </div>

    <!-- SERVICIOS -->
    <div class="servicios__container">

        <div class="servicios__header">
            <div class="servicios__titulo">
                <h1>Tenemos servicios para hacer que tu mascota se vea y se sienta espectacular</h1>
            </div>
            <div class="servicios__descripcion">
                <p class="descripcion">Recibe un servicio de atención médica o de estética direcamente en nuestra
                    clínica con veterinarios capacitados</p>
            </div>

            <div class="servicios__boton-agendar-cita">
                <a href="./pages/inicio_sesion.php" id="btn-agendar-cita">
                    Agendar Cita
                </a>
            </div>
        </div>

        <div class="servicios__collage">
            <div class="servicios__atencion-medica">
                <div class="servicio__imagen-1">
                    <img src="./src/imgs/ServicioMedicoMP.jpg" alt="Imagen servicio de atencion medica">
                </div>
                <a href="./pages/servicios.php">Servicio de Atención Médica -></a>
            </div>
            <div class="servicios_estetica-1">
                <div class="servicio__imagen-2">
                    <img src="./src/imgs/ServicioMP.jpg" alt="Imagen servicio de estetica">
                </div>
            </div>
            <div class="servicios_estetica-2">
                <div class="servicio__imagen-3">
                    <img src="./src/imgs/ServicioEsteticaMP.jpg" alt="Imagen servicio de estetica">
                </div>
                <a href="./pages/servicios.php">Servicio de Estética -></a>
            </div>
        </div>

        <!-- UBICACION -->
            <div class="ubicacion__container" id="ubicacion__container">
                <h1>¿Dónde nos encontramos?</h1>

                <div class="ubicacion__details">
                    <div class="ubicacion-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.1982506919626!2d-98.98789164913117!3d19.403838346562615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1e3315788b631%3A0x667690c1499579bf!2sUniversidad%20Tecnol%C3%B3gica%20de%20Nezahualc%C3%B3yotl!5e0!3m2!1ses-419!2smx!4v1664641741929!5m2!1ses-419!2smx"
                            width="800" height="800" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="ubicacion__info-container">
                        <div class="ubicacion-info">
                            <!-- LOGO -->
                            <div class="ubicacion__logo">
                                <img src="./src/imgs/logo.png" alt="Logo veterinaria">
                                <h1><span>v</span>eterinaria</h1>
                            </div>

                            <!-- DIRECCION -->
                            <p class="ubicacion__direccion">
                                Universidad Tecnológica de Nezahualcóyotl, Cto. Rey Nezahualcóyotl, Benito Juárez, 57000
                                Nezahualcóyotl, Méx.
                            </p>
                        </div>

                        <div class="ubicacion__redes-sociales">
                            <h2>Nuestras redes Sociales</h2>
                            <div class="redes-sociales">
                                <i id="btnFacebook" class="fa-brands fa-square-facebook"></i>
                                <i id="btnInstagram" class="fa-brands fa-square-instagram"></i>
                            </div>
                        </div>

                        <div class="ubicacion__copyright">
                            <a href="https://espai.es/privacidad/">
                                <p class="politicas-de-privacidad">Políticas de Privacidad</p>
                            </a>
                            <p class="copyright">© NIDT 2022</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="quienes-somos__container" id="quienes-somos__container">
                <h1>¿Quiénes somos?</h1>

                <div class="quienes-somos__descripcion">
                    <div class="quienes-somos__info">
                        <img src="./src/imgs/logo.png" alt="Logo de Veterinaria">
                        <p>Somos una institución veterinaria dedicada a la salud animal, servicios de estética y
                            productos para las mejores mascotas, participando en su transformación hacia el Departamento
                            con la mejor sanidad, vigilancia y trato humanitario para con los animales en México.</p>
                    </div>
                </div>

                <div class="mision-vision__container">
                    <div class="quienes-somos__mision">
                        <h1>Misión</h1>
                        <p>Crear conciencia social para el bienestar animal, fortaleciendo el vínculo emocional que
                            existe entre las personas y sus animales de compañía, mediante la prestación de nuestros
                            servicios médicos veterinarios y complementarios a la comunidad Antioqueña.</p>
                    </div>

                    <div class="quienes-somos_vision">
                        <h1>Visión</h1>
                        <p>Seremos la institución veterinaria líder en promocionar la salud animal, educando a la
                            comunidad y transmitiendo los valores humanos para transformar nuestra sociedad,
                            participando en su transformación.</p>
                    </div>
                </div>

                <div class="quienes-somos__valores-container">
                    <div class="valores__details">
                        <h1>Valores</h1>
                        <ol>
                            <li>
                                AMOR. Es nuestro valor fundamental y el principio de todo cambio social. Los animales de
                                compañía traen amor y felicidad a los hogares y nosotros ayudamos para fortalecerlo.
                            </li>
                            <li>
                                RESPONSABILIDAD. Usando la medicina preventiva como herramienta para promover la salud,
                                es nuestra responsabilidad mantener sano al animal de compañía y a toda su familia.
                            </li>
                            <li>
                                CLARIDAD: Desarrollamos un lenguaje simple y claro. Nos tomamos el tiempo de explicarle
                                cada proceso, para garantizar su comprensión y mantener su confianza.
                            </li>
                            <li>
                                RESPETO. Cumplimos con nuestra responsabilidad, somos coherentes con nuestros valores y
                                sabemos que usted es quien decide sobre el bienestar de su mascota, nosotros respetamos
                                su decisión.
                            </li>
                            <li>
                                COHERENCIA. Mantenemos la coherencia entre nuestro pensar, nuestro decir y nuestro
                                actuar. Somos fieles a nuestros valores.
                            </li>
                        </ol>
                    </div>

                    <div class="valores__imagen">
                        <img id="valores-img-mobile" src="./src/imgs/Valores-img2mobile.jpg" alt="Ilustracion Valores de Veterinaria">
                        <img src="./src/imgs/Valores-img.jpg" alt="Ilustracion de valores de Veterinaria">
                    </div>
                </div>

            </div>
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
            © NIDT <?php echo date("Y"); ?>
        </div>
        <div class="politicas">
            <!-- POLITICAS DE PRIVACIDAD <br> -->
            <a href="https://espai.es/privacidad/">Políticas de Privacidad</a>
        </div>
    </footer> <!-- Pie de Página -->

<!--============================| ALJC🌹✨ |============================= -->
<!--                       .....''',,,,,,,'''.....                          
                      .....''''''''''''''''''''''....                      
                   ...''''''''''''''''''''''''''''''''...                  
               ...',,,,'''''''',,,,,'''..'',,,;,,'''''''''..               
             ..',;;;;;;;,,'''',;::,'',;cdxkO00000Okdo:,'.''''.             
           .'',,;;,''',;:;;;,,;;;,;lk0KNWWWWWWMWWWWWWX0xl;'.'''..          
         .',''',;,'''',;::::::;,,cxKNNNXK0OOO0XNWWWWWWMWNKkc,.'''.         
       ..''''''',,,''',;:::::,,:dkdloool:::loolx0WWWWWWWWWWNOl,.'''.       
      .','''''',,'',,;:::::;'':ONKxl:;;;;;cxko:;l0NWWWWWWWWWWNkc'.''..     
    ..','''',,;;;;;;::::::;'.:kNMXxc;;;::;:ccc;;:ldxxkKNWWWWWWWKd,.','.    
   ..,,''',;;::::::::::::;,',dXWWKdlcc:;::::;;::;;;;;;coOXWWWWWWXx;.','.   
   .,,,'',;::::::::::::::,..;kWMW0dlllc;:odl;;::::;;:;;,;dKWWWWWWNk:..''.  
  .,;,',;::::::::::::::::,'':kNMWKo::ccccodoccllccccc::;;;o0WWWWWWNx;.',.. 
 .';,,,;:::::::::::::::::;,',oKWMN0kxkxoccllllolllcc::::;;cONWWWWWWXd,.''..
..,'',;:::::::::;;;;;;;:::;'.,dKWWWWWWNKkoc;;;:lol::::::;;cONWWWWWWWKl'.''.
.',',;:::::::;;:cdxkdo:;;::;'.'ckNWWWWWWWXkc;;;;:ccc::;;;:dKWWWWWWWMWk:.''.
'''',;::::::;;lkXNWWWN0d:;;:;,'.,cxKNWWMMMNKkolc:::::::cd0NWWWWWWWWWW0l'.''
'''';::::::;;cONWXXNWMW0o;;::::;,'';loxO0XNWWNXK0OOO00KXNWWWWWWWWWWWWKo'.',
''',;::::::;;oKNX00NWWN0o:;;::;;::;,'''',;cxKWMMMWWWWWWWWWWWWWWWWWWWWKo'.',
''',;::::::;;cONNNXXXXXXKkl;;;;cdkxl;;;,'..,oxOXWWWWWWWWWWWWWWWWWWWWNOl'.',
''',;::::::;;cONWWWWNWWWNXOdodOKXXOo:;;:;,'',,;o0WWWWWWWWWWWWWWWWWN0l;,''',
.',,;:::::;;:xXWWWWWWWWNK0O0XWWWWWXxc;;;::;,,,,;dXWWWWWWWWWWWWWWWW0c..'',''
.',,;:::::;;l0WMWNNNWWWNK00XWWWWWWNKxl:;;::;',,,:kNMWWWWWWWWWWWWWKo'.''','.
..'',;:::;;:oKMWXkd0NWWNNWWWWWWWWXKXKOd:;;::,,'''cONWWWWWWWWWWWXKOd:'.'','.
 .'',;::::;;ckKNKo;ckKNWWWWWNXKXNNXXXKkl;;::;,'...c0WWWWWWWWWWWOdxd:'.','..
  .''',;:::;;:looc;;;ckXWWWWNKKXNXK0KK0d:;::;'''..c0WWWWWWWWMW0dcc;'''',.. 
  ..''',;:::::;;;;::;;;oOXNNNNNXKkdolllc:::;,'',;ckXWWWWWWWWW0l,'''''','.  
   ..'''',;:::::::::::;;:okO0KXXOo;,;;;:::;,'';ccl0WWWWWWWWKx:'.''''','.   
    ..,''',,;:::::::::::;;;:clooc:;::::::;,'',;;cxXMWNXKKOd:'.'''''','.    
      .','''',;;::::::::::::;;;;;:::::;;,''.',:dKWWW0d:;,''''''''','..     
       ..''''''',,;;;;;;;;::::::;;;;,,,''.';cxKNXXK0xc,'..''''''','.       
         .',,'''''''''',,,,,,,,,,'''''''',cxOOko:;;;;;,'''''''','.         
           .'''''''''''''''''''''''''''';cc;,,'...'''''''''''''..          
             ..',''''''''''''''''''''''',,''.''''''''''''''''.             
               ...''''''''''''''''''''''''''''''''''''''''..               
                  ...'''''''''''''''''''''''''''''''''...                  
                      .....'''''''''''''''''''''.....                      
                          ....'''',,,,,,,''''....-->
<!--============================| ALJC🌹✨ |============================= -->


</body>

</html>