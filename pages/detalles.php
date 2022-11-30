<?php
    // * Autentificar al usuario
    session_start();
    





require '../includes/config/config.php';
require '../includes/config/database.php';
$db = new Database();
$con = $db->conectar();

$id= isset($_GET['id']) ? $_GET['id'] : '';

if($id){
    $sql= $con->prepare("SELECT count(id) FROM productos where id=? and activo=1");
    $sql->execute([$id]);
    if($sql->fetchColumn()>0){
        $sql= $con->prepare("SELECT id, imagen as img_id, nombre_prod, descripcion,imagen, precio, descuento FROM productos where id=?  and activo=1 limit 1" );
        $sql->execute([$id]);
        $row=$sql->fetch(PDO::FETCH_ASSOC);
        $nombre= $row['nombre_prod'];
        $descripcion= $row['descripcion'];
        $precio= $row['precio'];
        $descuento= $row['descuento'];
        $img_id = $row['img_id'];
        $precio_desc=$precio-(($precio*$descuento)/100);
        $dir_imagen= '../src/imgs/productos/' . $img_id . '7';
    
        $rutaimg= $dir_imagen . $img_id;
        if(!file_exists($dir_imagen)){
            $rutaimg= 'imgs/no-photo.jpg';
        }
    
        $images = array();
        $dir = dir($dir_imagen);
        while(($archivo = $dir->read()) != false ){
            if(( strpos($archivo, 'jpg') )) {
                $imagenes[]= $dir_imagen . $archivo;
            }
        }
    
        $dir->close();
    
    
    }
    $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}else {
    echo 'error al procesarlo';
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/4ad7b82c7d.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
<header>

  <div class="navbar navbar-expand-lg navbar-dark  " style="background-color: #002933;" >
    <div class="container">
      <a href="productos.php" class="navbar-brand ">
        <strong>Productos</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="../index.php" class="nav-link active">Inicio <i class="fa-solid fa-house"></i></a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link active">Mis citas</a>
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
                <a href="/" class="nav-link active">Ubicacacion</a>
            </li>

        </ul>
        <a href="checkout.php" class="btn btn-primary">Carrito <span id="num_cart" class="badge bg-secondary" ><?php echo $num_cart; ?></span> <i class="fa-solid fa-cart-shopping"></i> </a>
        

      </div>

    </div>
  </div>

    </header> <!-- header -->>
   

    <!-- <!-contenido -> -->

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-mb-1">
                     
                <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                   <div class="carousel-inner">
                      <div class="carousel-item active">
                         <img src="<?php echo $rutaimg; ?>" alt=""  class="d-block w-100">
                            </div>
                            <?php   foreach($imagenes as $img) {?>
                            <div class="carousel-item ">
                            <img src="<?php echo $img; ?>" alt=""  class="d-block w-100">
                            <?php } ?>
                            </div>
                                
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                           </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                 </button>
</div>


                   
                </div>
                <div class="col-mb-6 order-mb-2">
                    <h2> <?php echo $nombre; ?></h2>

                    <?php  if($descuento >0){?>
                        <p><del><?php echo MONEDA . number_format($precio, 2, '.', '.', );?></del></p>
                        <h2>
                             <?php echo MONEDA . number_format($precio, 2, '.', '.', );?>
                             <small class="text-success"><?php echo $descuento; ?>% descuento</small>
                    </h2>

                    <?php } else { ?>

                    <h2> <?php echo MONEDA . number_format($precio, 2, '.', '.', );?></h2>

                    <?php } ?>

                    <p class="lead">
                        <?php echo $descripcion;?>
                    </p>

                    <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn btn-primary" type="button">Comprar ahora</button>
                        <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>,'<?php echo $token_tmp ?>')"  >Agregar al carrito</button>

                    </div>

                </div>

            </div>

        </div>
    </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>


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
            .then(data => {
                if(data.ok){
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML= data.numero
                }
            })

        }
    </script>
 
</body>
</html>