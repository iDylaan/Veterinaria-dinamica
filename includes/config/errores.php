<?php
function devolverError($codigoError, $mensajeDelError)
{
    http_response_code(400);
    echo json_encode(array('codigo' => $codigoError, 'mensaje' => $mensajeDelError)) . PHP_EOL;
    exit;
}