<?php
include '../modelo/Lote.php';
$lote = new Lote();
/**funcion crear*/
if ($_POST['funcion']=='crear') {
    $id_producto = $_POST['id_producto'];
    $proveedor = $_POST['proveedor'];
    $stock = $_POST['stock'];
    $vencimiento = $_POST['vencimiento'];
    $lote->crear($id_producto,$proveedor,$stock,$vencimiento);
}
?>