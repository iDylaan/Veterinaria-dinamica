<?php


function conectarDB() : mysqli {
    // ! Producción ONLY
    // if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
    //     throw new Exception("NO without SSL at line b." . rand(100, 200));
    //     devolverError('-98001', 'NO sin certificado SSL:<br />'. 'Asegurece estar usando https://');
    //     exit;
    // }
    // Ok, traemos los datos de conexion de la base:

    // Intentar la conexion:
    $conexion = new mysqli(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA, DB_BASE);

    // Validar la conexion:
    if ( mysqli_connect_error() ) {
        // Existe un error en la conexion.
        // devolverError('-98002', 'Error:<br />NO se pudo conectar a la base de datos.'); // Produccion
        devolverError('-98002', 'Error'. mysqli_connect_errno() . '<br /> Message: ' . mysqli_connect_error()); // Desarrollo
        exit;
    }
    // Intentar establecer el cotejo de conexion:
    if(!$conexion->set_charset("utf8")) {
        // NO se pudo establecer UTF-8
        devolverError('-98003', 'Error al querer cargar conjunto de caracteres UTF8.<br />Conjunto actual: ' . $conexion->character_set_name()); // Desarrollo
        exit;
    }
    // Todo bien, tenemos la conexion creada en la variable $conexion
    return $conexion;
}

?>
<?php

class Database {

    private $hostname="localhost";
    private $database="veterinariadb";
    private $username="root";
    private $password="";
    private $charset="utf8";

    
function conectar()
{
    try{
    $conexion= "mysql:host=" . $this->hostname . "; dbname=" . $this->database ."; charset=" . $this->charset;

    $options=[
        PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false

    ];
    $pdo = new PDO($conexion, $this->username, $this->password, $options);


return $pdo;
} catch(PDOException $e){
    echo 'errir conexion' . $e->getMessage();
    exit;
}
}
}