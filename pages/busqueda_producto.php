<?php

// * Importar la conexion
// BASE DE DATOS
require '../includes/config/database.php';
$db = conectarDB();

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['busqueda1'])) {
        $busqueda1 = $_GET['busqueda1'];
        $query_busqeuda1 = "SELECT
            pro.id,
            pro.nombre_prod,
            pro.precio,
            pro.imagen,
            cate.id_cate,
            pro.activo,
            pro.descuento
            FROM 
            productos pro, 
            categorias cate
            WHERE pro.id = cate.id_cate
            LIKE '%${busqueda1}%'
            OR nombre_prod LIKE '%${busqueda1}%'
            OR nom_cate LIKE '%${busqueda1}%'";
        
        $res_busqueda1 = mysqli_query( $db, $query_busqeuda1 );
    
        while($productos = mysqli_fetch_assoc($res_busqueda1)):
            ?>
            <tr>
           
                <td><?php   echo $productos['id']; ?></td>
                <td><?php   echo $productos['nombre_prod']; ?></td>
                <td><?php echo $productos['precio']; ?></td>
                <td><?php   echo  $productos['imagen']; ?></td>
                <td><?php   echo $productos['id_cate']; ?></td>
                <td><?php   echo $productos['activo']; ?></td>
                <td><?php   echo $productos['descuento']; ?></td>
            </tr>
            <td>
                <img src="<?php   echo $productos['id']$imagen="../src/imgs/productos/". $id . "/pd-1.webp";; ?>" alt="">
            </td>
            <?php 
        endwhile; 
        if( mysqli_num_rows($res_busqueda1) === 0) {
            ?>
            <p style="text-align:center;font-size:2rem;">No se encontraron coincidencias... 😔</p>
            <?php
        }
    } else {
        $query_productos = "SELECT 
        pro.id,
            pro.nombre_prod,
            pro.precio,
            pro.imagen,
            cate.id_cate,
            pro.activo,
            pro.descuento,
            FROM 
            productos pro, 
            caregorias cate, 
            WHERE pro.id = cate.id_cate
            LIKE '%${busqueda1}%'
            OR nombre_prod LIKE '%${busqueda1}%'
            OR nom_cate LIKE '%${busqueda1}%')";

        $productos = mysqli_query($db, $query_productos);
        while($productos = mysqli_fetch_assoc($productos)):
        ?>
        <?php endwhile; 
    }
}

$where="";

if(isset($_GET['enviar'])){
  $busqueda1 = $_GET['busqueda1'];


	if (isset($_GET['busqueda1']))
	{
		$where="WHERE productos.nombre_prod LIKE'%".$busqueda1."%'
    OR precio  LIKE'%".$busqueda1."%'";
	}
  
}

/*$SQL="SELECT productos.id, productos.nombre_prod, productos.descripcion, productos.imagen, categorias.id_cate, productos.activo, productos.descuento,
FROM productos
LEFT JOIN categorias ON productos.nom_cate = categorias.id_cate $where";
$dato = mysqli_query($db, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['nom_prod']; ?></td>
<td><?php echo $fila['descripcion']; ?></td>
<td><?php echo $fila['imagen']; ?></td>
<td><?php echo $fila['id_cate']; ?></td>
<td><?php echo $fila['activo']; ?></td>
<td><?php echo $fila['descuento']; ?></td>


</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>

    
    <?php
    
}
*/
?>

