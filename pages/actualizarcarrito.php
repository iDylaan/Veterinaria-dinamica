<?php 
session_start();
require '../includes/config/database.php';
require '../includes/config/config.php';

if (isset($_POST['action'])){

    $action=$_POST['action'];
    $_id[0]= isset($_POST['id'])? $_POST['id']: 0;

    if($action == 'agregar'){
        $cantidad= isset($_POST['cantidad'])? $_POST['cantidad']: 0;
        $respuesta=agregar($id, $cantidad);
        if($respuesta>0){
            $datos['ok']= true;

        } else{
            $datos['ok']= false;
        }
        $datos['sub']= MONEDA . number_format($respuesta, 2, '.', '.');
    } else{
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}
echo json_encode($datos);

function agregar($id, $cantidad){
    $res=0;
    if($id>0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$id])){
        $_SESSION['carrito']['productos'][$id]= $cantidad;

        $db= new Database();
        $con= $db->conectar();
    $sql= $con->prepare("SELECT precio, descuento FROM productos where id=? and activo=1 limit 1" );
    $sql->execute([$id]);
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    $precio= $row['precio'];
    $descuento= $row['descuento'];
    $precio_desc=$precio-(($precio*$descuento)/100);
    $res= $cantidad * $precio_desc;
    return $res;
    }

    } else{
        return $res;
    }


}