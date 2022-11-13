<?php include '../includes/template/header_admin.php'; 

    $mensaje = $_GET['resultado'] ?? null;
?>

    <div class="crear__container">
        <a id="form-crear" href="./form_producto.php">Crear</a>
    </div>

    <div class="productos__container">

        <div class="title-container">
            <h1>Productos</h1>
        </div>

        <div class="lista-productos__container">

            <div class="producto__container">
                <div class="producto__imagen">
                    <img src="../src/imgs/pd-1.webp" alt="Product Image">
                </div>
                <div class="producto__description">
                    <div class="description__title">
                        <h1> <?php echo "Nombre del producto"; ?> </h1>
                    </div>
                    <div class="description__price">
                        <p>$ <?php echo "000,000.00" ?></p>
                    </div>
                </div>
                <div class="producto__options">
                    <a href="" class="btn btn-azul"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn btn-rojo"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div> <!-- Producto -->
            
            <div class="producto__container">
                <div class="producto__imagen">
                    <img src="../src/imgs/pd-2.webp" alt="Product Image">
                </div>
                <div class="producto__description">
                    <div class="description__title">
                        <h1> <?php echo "Nombre del producto"; ?> </h1>
                    </div>
                    <div class="description__price">
                        <p>$ <?php echo "000,000.00" ?></p>
                    </div>
                </div>
                <div class="producto__options">
                    <a href="" class="btn btn-azul"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn btn-rojo"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div> <!-- Producto -->
            
            <div class="producto__container">
                <div class="producto__imagen">
                    <img src="../src/imgs/pd-3.webp" alt="Product Image">
                </div>
                <div class="producto__description">
                    <div class="description__title">
                        <h1> <?php echo "Nombre del producto"; ?> </h1>
                    </div>
                    <div class="description__price">
                        <p>$ <?php echo "000,000.00" ?></p>
                    </div>
                </div>
                <div class="producto__options">
                    <a href="" class="btn btn-azul"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn btn-rojo"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div> <!-- Producto -->
            
            <div class="producto__container">
                <div class="producto__imagen">
                    <img src="../src/imgs/pd-4.webp" alt="Product Image">
                </div>
                <div class="producto__description">
                    <div class="description__title">
                        <h1> <?php echo "Nombre del producto"; ?> </h1>
                    </div>
                    <div class="description__price">
                        <p>$ <?php echo "000,000.00" ?></p>
                    </div>
                </div>
                <div class="producto__options">
                    <a href="" class="btn btn-azul"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn btn-rojo"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div> <!-- Producto -->
            
            <div class="producto__container">
                <div class="producto__imagen">
                    <img src="../src/imgs/pd-5.webp" alt="Product Image">
                </div>
                <div class="producto__description">
                    <div class="description__title">
                        <h1> <?php echo "Nombre del producto"; ?> </h1>
                    </div>
                    <div class="description__price">
                        <p>$ <?php echo "000,000.00" ?></p>
                    </div>
                </div>
                <div class="producto__options">
                    <a href="" class="btn btn-azul"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn btn-rojo"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div> <!-- Producto -->
            
        </div> <!-- Lista de productos -->

    </div>

</body>
</html>