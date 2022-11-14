<?php
    // * Autentificar al usuario
    session_start();
    $auth = $_SESSION['login'] && $_SESSION['id_rol'] === "3" ?? false;
    if( !$auth ) {
        header('Location: ../index.php');
    }

    // Sanitizacion de los parametros recibidos por URL
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: ../index_admin.php');
    }

    // * Importar la conexion
    // BASE DE DATOS
    require '../includes/config/database.php';
    $db = conectarDB();

    // Obtener los datos del producto
    $query = "SELECT * FROM productos WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);
    $producto = mysqli_fetch_assoc($resultado);

    $error = '';

    $nombre_prod = $producto['nombre_prod'];
    $precio = $producto['precio'];
    $descripcion = $producto['descripcion'];
    $id_cate = $producto['id_cate'];
    $imagenPropiedad = $producto['imagen'];
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // * Sanitizacion del formulario
        $nombre_prod = mysqli_real_escape_string( $db, $_POST['nombre_prod'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $id_cate = mysqli_real_escape_string( $db, $_POST['id_cate'] );

        // * Files hacia una imagen
        $imagen = $_FILES['imagen'];
        
       // * Validaciones...
        if(!$nombre_prod || !$precio || !$descripcion || !$id_cate) {  // Validar campos vacios
            $error = 'Todos los campos son obligatorios';
        } else if (strlen( $descripcion ) < 50) { // Validar descripciones muy cortas
            $error = 'La descripción debe tener mínimo 50 caracteres';
        } else if (strlen( $descripcion ) > 1500) { // Validar por capacidad de la DB
            $error = 'Sobrepasaste el límite de caracteres en la descripción (1500)';
        } else if (strlen( $nombre_prod ) < 8) { // Validar nombres muy chicos
            $error = 'El nombre no puede ser menor a 8 caracteres';
        } else if (strlen( $nombre_prod ) > 100) { // Validar por capacidad de la DB
            $error = 'Sobrepasaste el límite de caracteres del nombre (100)';
        } else if ($precio < 0 || $precio > 99999) { // Validar rango de precios
            $error = 'Precio no válido...';
        }

        // Validar por tamaño (10 MB máximo)
                // KB   / MB / Cantidad 
        $medida = 1024 * 1024 * 10;

        if ($imagen['size'] > $medida) {
            $error = 'La imagen es muy grande (límite 10MB)';
        }

        // TODO el formulario está Ok, vamos a guardarlo en el servidor
        if( !$error ) {

            
            // * Subida de Datos
            // Crear carpeta
            $carpetaImagenes = '../src/imgs/productos/';
            
            if( !is_dir($carpetaImagenes) ) {
                mkdir( $carpetaImagenes );
            }

            $nombreImagen = '';
            
            // SUBIDA DE ARCHIVOS
            if ($imagen['name']) {
                // Eliminar la imagen previa
                unlink($carpetaImagenes . $producto['imagen'] . ".jpg");

                // Generar nombre unico para la imagen
                $nombreImagen = md5( uniqid( rand(), true ) ); // rand ya fue hackeado NO UTILIZAR PARA SEGURIDAD
                
                // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen . ".jpg");
            } else {
                $nombreImagen = $producto['imagen'];
            }
            
            // * Insertar a la base de datos
            $query = "UPDATE productos SET 
            nombre_prod = '${nombre_prod}', 
            descripcion = '${descripcion}', 
            precio = ${precio},
            imagen = '${nombreImagen}',
            id_cate = ${id_cate}
            WHERE id = ${id};";

            $resultado = mysqli_query( $db, $query );

            if ( $resultado ) {
                // TODO Ok en el registro
                header('Location: ./productos.php?resultado=2');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestionar Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="../src/styles/form_productos.css">
</head>
<body>

    <h1 style="text-align: center;margin-top:20px;">Actualizar</h1>

    <div class="formulario__container">
        <form class="formulario__producto" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información del Producto</legend>
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

                <label for="nombre_prod">Nombre:</label>
                <input type="text" id="nombre_prod" name="nombre_prod" maxlength="100" minlength="8"  id="nombre_prod" placeholder="Nombre del producto" value="<?php echo $nombre_prod; ?>" required>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" min="0" max="9999" placeholder="Precio del producto" value="<?php echo $precio; ?>" required>

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpg, image/jpeg, image/png, image/webp">

                <img src="../src/imgs/productos/<?php echo $producto['imagen']; ?>.jpg" style="width:200px;" alt="Product Image">

                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" maxlength="1500" minlength="50" placeholder="Escribe una descripcion para tu producto" required><?php echo $descripcion; ?></textarea>
                
                <label for="categoria">Categoría:</label>
                <select name="id_cate" id="id_cate" required>
                    <option value="" disabled>-- Selecciona una categoria --</option>
                    <?php 
                    $query_categorias = "SELECT * FROM categorias";
                    $categorias = mysqli_query($db, $query_categorias);
                    while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <option value="<?php echo $categoria['id_cate'] ?>" <?php echo $id_cate === $categoria['id_cate'] ? "selected" : "";?> >
                        <?php echo $categoria['nom_cate']; ?>
                    </option>
                    <?php endwhile; ?>
                </select>

                <input type="submit" id="btn-crear-producto" value="Editar producto">
            </fieldset>
        </form>
    </div> <!-- Contenedor Formulario -->
    
</body>
</html>