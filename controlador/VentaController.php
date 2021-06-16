<?php
include '../modelo/Venta.php';
$venta = new Venta();
/**funcion crear*/
if ($_POST['funcion']=='listar') {
    $venta->buscar();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json['data'][]=$objeto;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>