<?php

include_once'productos.php';

if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];
    
    if($categoria == ''){
        echo json_encode(['statuscode' => 400, 
                            'response'=>'No existe la categoria']);    
    }más{
        $productos = new Productos();
        $items = $productos->getItemsByCategory($categoria);
        echo json_encode(['statuscode' => 200, 
                        'items'=>$items]);
    }
}elseif(isset($_GET['get-item'])){
    $id = $_GET['get-item'];

    if($id == ''){
        echo json_encode(['statuscode' => 400, 
                            'response'=>'No hay valor para id']);    
    }más{
        $productos = new Productos();
        $item = $productos->get($id);
        echo json_encode(['statuscode' => 200, 
                        'item'=>$item]);
    }
}más{
    echo json_encode(['statuscode' => 404, 
                        'response'=>'No se puede procesar la solicitud']);
}

?>