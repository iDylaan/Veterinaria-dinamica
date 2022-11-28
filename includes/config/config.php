<?php

define("KEY_TOKEN", "ABC-sdad-354*");
define("MONEDA", "$");
$num_cart=0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart= count($_SESSION['carrito']['productos']);

}
?>