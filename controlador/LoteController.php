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
/**funcion buscar lote */
if ($_POST['funcion']=='buscar') {
    $lote->buscar();
    $json=array();
    foreach ($lote->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_lote,
            'nombre'=>$objeto->prod_nom,
            'concentracion'=>$objeto->concentracion,
            'adicional'=>$objeto->adicional,
            'vencimiento'=>$objeto->vencimiento,
            'proveedor'=>$objeto->proveedor, 
            'stock'=>$objeto->stock,
            'laboratorio'=>$objeto->lab_nom,
            'tipo'=>$objeto->tip_nom,
            'presentacion'=>$objeto->pre_nom,                                   
            'avatar'=>'../img/prod/'.$objeto->logo,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>