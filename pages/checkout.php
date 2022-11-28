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

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
print_r($_SESSION);

$lista_carrito= array();
    
if($productos!= null){
    foreach($productos as $clave => $cantidad){
        $sql= $con->prepare("SELECT id, nombre_prod,descripcion, precio, descuento, $cantidad AS cantidad FROM productos where id=? and activo=1");
        $sql->execute([$clave]);
        $lista_carrito[]= $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


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
        <a href="carrito.php" class="btn btn-primary">Carrito <span id="num_cart" class="badge bg-secondary" ><?php  echo $num_cart; ?></span> <i class="fa-solid fa-cart-shopping"></i> </a>
        

      </div>

    </div>
  </div>

    </header> <!-- header -->
   

    <main>
    
   <div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if($lista_carrito== null){
                    echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                } else {
                    $total=0;
                    foreach($lista_carrito as $producto){
                        $id= $producto[0]['id'];
                        $nombre_prod= $producto[0]['nombre_prod'];
                        $precio= $producto[0]['precio'];
                        $descuento= $producto[0]['descuento'];
                        $cantidad= $producto[0]['cantidad'];
                        $precio_desc= $precio (($precio  * $descuento) / 100);
                        $subtotal=$cantidad * $precio_desc;
                        $total+= $subtotal;

                      

                    ?>
                
                <tr>
                    <td> <?php echo $nombre_prod;  ?></td>
                    <td> <?php echo MONEDA . number_format($precio_desc,2,'.','.')  ?></td>
                    <td> 
                        <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="">
                    </td>
                    <td>
                         <div id="subtotal_<?php echo $_id;  ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2,'.','.') ?></div> 
                  </td>
                    <td> <a href="" id="eliminar" class="btn btn-warning btn-sm " data-bs-id="<?php echo $_id;  ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td>
                    <td> <?php echo $nombre_prod ?></td>
                </tr>
                <?php }?>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">
                        <p class="h3" id="total"><?php echo MONEDA . number_format($total,2,'.','.'); ?></p>
                    </td>

                </tr>
            </tbody>
            <?php } ?>

        </table>

    </div>
    <div class="row" >
        <div class="col-md-5 offset-md-7 d-grid gap-2">
            <button class="btn btn-primary btn-lg">Realizar pago</button>
        </div>

    </div>
   
   </div>
        
      
    </main>
    
    
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