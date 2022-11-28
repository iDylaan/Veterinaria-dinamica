<?php include '../includes/template/header_admin.php';

    // * Autentificar al usuario
    if( !isset( $_SESSION ) ) {
        session_start();
    }
    $auth = $_SESSION['login'] && $_SESSION['id_rol'] === "3" ?? false;
    if( !$auth ) {
        header('Location: ../index.php');
    }

    // * Importar la conexion
    // BASE DE DATOS
    require '../includes/config/database.php';
    $db = conectarDB();

    // Query
    $query = "SELECT * FROM usuarios WHERE id_rol = 2;";

    // Consultar a la DB
    $resultado_usuarios = mysqli_query($db , $query);

    // Mensaje condicional
    $mensaje = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitizacion del ID recibido para eliminar
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if( $id ) {
            // Eliminar el archivo
           $query = "SELECT id FROM usuarios WHERE id = ${id}";
           $resultado = mysqli_query($db, $query);
           $usuarios = mysqli_fetch_assoc($resultado);

            

            // Eliminar la propiedad de la base de datos
            $query = "DELETE FROM usuarios WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);
            if($resultado) {
                header('Location: ./usuarios/php?resultado=3');
            }
        }
    }
?>

    <div class="main-options__container">
        <div class="crear__container">
            <a id="form-crear" href="./form_e.php">AGREGAR</a>
        </div>

        <div class="serch__container">
           
        </div>
    </div>

    
    <div class="productos__container">
        <div class="title-container">
            <h1>Empleados</h1>
        </div>

        <div class="lista-productos__container">

            <?php while($usuarios = mysqli_fetch_assoc( $resultado_usuarios )): ?>
            <div class="producto__container">
                <div class="producto__first-content">
                    
                    <div class="producto__detalles">
                        <div class="description__title">
                            <h1> <?php echo $usuarios['nombre']; ?> </h1>
                        </div>
                        <div class="description__title">
                            <h1> <?php echo $usuarios['apellido_pa']; ?> </h1>
                        </div>
                        <div class="description__title">
                            <h1> <?php echo $usuarios['apellido_ma']; ?> </h1>
                        </div>
                        <div class="description__price">
                            <h3> <?php echo $usuarios['fecha_nac']; ?> </h3>
                        </div>
                        <div class="description__title">
                            <h3> <?php echo $usuarios['correo']; ?> </h3>
                        </div>
                        
                    </div>

                    <div class="producto__options">
                        <a href="./form_actualizar_empleados.php?id=<?php echo $usuarios['id']; ?>" class="btn btn-azul"><i class="fa-solid fa-pen"></i> Editar</a>
                        <form method="POST" id="form-eliminar">
                            <input type="hidden" name="id" value="<?php echo $usuarios['id']; ?>">

                            <button type="submit" form="form-eliminar" class="btn btn-rojo"><i class="fa-solid fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>

                
            </div> 
            <?php endwhile; ?>
            
        </div> 
    </div>

    <?php 
        // Cerrar la conexion
        mysqli_close($db);
    ?>
 
</body>
</html>