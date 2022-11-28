<?php
    // Autentificar al usuario
   
    session_start();
    $auth = $_SESSION['login'] ?? false;
    if(!$auth) {
        header('Location: ../index.php');
    }


require '../includes/config/config.php';
require '../includes/config/database.php';
$db = new Database();
$con = $db->conectar();
$sql= $con->prepare("SELECT id, nombre_prod, descripcion, precio FROM productos where  activo=1");

$sql->execute();
$resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/styles/productos.css">
    <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
<header>
<div class="navbar navbar-expand-lg navbar-dark  " style="background-color: #002933-100;" >
    <div class="container">
      <a href="#" class="navbar-brand ">
        <strong>Productos</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
       
            </li>
            <li class="nav-item">
            
                <a href="../index.php" class="nav-link active">Inicio <i class="fa-solid fa-house"></i></a>
            </li>

            <li class="nav-item">
                <a href="./agenda_citas.php" class="nav-link active">Mis citas</a>
            </li>
            <li class="nav-item">
                
                <a href="/" class="nav-link active"><?php echo $_SESSION['nombre'];?> <i  class="fa-solid fa-user"></i></a>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link active">Cerrar sesion <i  class="fa-solid fa-right-from-bracket"></i></a>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link active">¿Quienes Somos?</a>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link active">Ubicacion</a>
            </li>

        </ul>
        <a href="checkout.php" class="btn btn-primary">Carrito <span id="num_cart" class="badge bg-secondary" > ?></span> <i class="fa-solid fa-cart-shopping"></i> </a>
        

      </div>

    </div>
  </div>

    </header> <!-- header -->
   

    <main>
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Nuestros Productos</h1>
      
        <p>
          
        </p>
      </div>
    </div>
  </section>
   <div class="container">
   <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php  foreach($resultado as $row) { ?>
        <div class="col">
          <div class="card shadow-sm">
            <?php
            $id= $row['id'];
            $imagen="../src/imgs/productos". $id . "productos/pd-1.webp";
          
            if(!file_exists($imagen)){
                $imagen="../src/imgs/no-photo.jpg";
            }

            ?>
            <img src="<?php  echo $imagen;?>" alt="">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre_prod']; ?></h5>
              <p class="card-text">$ <?php echo number_format($row['precio'], 2, '.', '.'); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN);?>" class="btn btn-primary"> Detalles </a>
                </div>
                <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $row['id']; ?>,'<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN);?>')"  >Agregar al carrito</button>
              </div>
            </div>
          </div>
       
        </div>
        <?php } ?>
        </div>
   </div>
        
      
    </main>
    
    <script>
        function addProducto(id,token){
            let url= '../pages/carrito.php';
            let formData= new FormData();
            formData.append('id', id);
            formData.append('token', token);

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'

            }).then(response=> response.json())
            .then(data=> {
                if(data.ok){
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML= data.numero
                }
            })

        }
    </script>
    
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
            © NIDT 2022
        </div>
        <div class="politicas">
            <!-- POLITICAS DE PRIVACIDAD <br> -->
            <a href="https://espai.es/privacidad/">Políticas de Privacidad</a>
        </div>
</footer>          

 
</body>
</html>