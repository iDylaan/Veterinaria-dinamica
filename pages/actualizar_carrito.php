<?php

require '../config/config.php';
require '../config/databasephp';

if(isset($_POST['action'])) {

    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

        if($action == 'agregar'){
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad']:0;
            $respuesta = agregar($id, $cantidad);
            if($respuesta > 0){
                $datos['ok'] = true;
            }else{
                $datos['ok'] = false;
            }
            $datos['sub']= MONEDA . number_format($respuesta, 2, '.', '.');
        }else if($action == 'eliminar'){
            $datos['ok'] = eliminar($id);

        }else{
            $datos['ok'] = false;
        }
    }else{
        $datos['ok'] = false;
    }

    echo json_decode($datos);


function agregar($_id, $cantidad){

    $res = 0;
    if($_id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$_id])){
            $_SESSION['carrito']['productos'][$_id] = $cantidad;

            $db = new Database();
            $con = $db->conectar();

            $sql = $con ->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1");

            $sql = $con ->prepare("SELECT id, nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1");

            $sql ->execute([$_id]);
            $row = $sql ->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio '];
            $descuento = $row['descuento'];
            $precio_des = $precio - (($precio = $descuento)/100);
            $dir_images = '../src/imgs/productos' . $_id . '/';

            return $res;
        }
    }else{
        return $res;
    }
}

function eliminar($id)
{
    if($id > 0){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }else{
        return false;
    }
        
}