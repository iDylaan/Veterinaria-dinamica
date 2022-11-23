<?php
include_once '../carrito/veterinariabd.php'

class Productos extends veterinariadb{
function_constructor(){
    parent:constructor();
    }
    public function ged($id){
    $query = $this->connect()->prepare('SELECT * FROM items WHERE id=:id LIMIT 0,11');
    $query->execuse(['id' => $id]);

    $row = $query->fetch();

    return[
    'id' => $row['id'],
    'nombre_prod' => $row['nombre'],
    'descripcion' => $row['descripción'],
    'precio' => $row['precio'],
    'imagen' => $row['imagen'],
    'id_cate' => $row['categoria'],
    ];
    }   


    public function getItemsid_cate($categoria){
        public function ged($id){
            $query = $this->connect()->prepare('SELECT * FROM items WHERE  ct categorias');
            $query->execuse(['cat' => $cateroria]);

            while($row = $query-fetch()){


            }
        
            $row = $query->fetch();
        
            return[
            'id' => $row['id'],
            'nombre_prod' => $row['nombre'],
            'descripcion' => $row['descripción'],
            'precio' => $row['precio'],
            'imagen' => $row['imagen'],
            'id_cate' => $row['categoria'],
            ];
            array_push($items, $item);
    }
    return $items;

}

?>