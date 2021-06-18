<?php
include '../modelo/Venta.php';
$venta = new Venta();
session_start();
$id_usuario = $_SESSION['usuario'];
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
/**funcion mostrar consultas ventas de vendedor**/
if ($_POST['funcion']=='mostrar_consultas') {
    /** forech de venta por vendedor **/
    $venta->venta_dia_vendedor($id_usuario);
    foreach ($venta->objetos as $objeto) {
        $venta_dia_vendedor=$objeto->venta_dia_vendedor;
    }
    /** forech de venta diaria**/
    $venta->venta_diaria();
    foreach ($venta->objetos as $objeto) {
        $venta_diaria=$objeto->venta_diaria;
    }
    /** forech de venta mensual **/
    $venta->venta_mensual();
    foreach ($venta->objetos as $objeto) {
        $venta_mensual=$objeto->venta_mensual;
    }
    /** forech venta anual **/
    $venta->venta_anual();    
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json[]= array(
            'venta_dia_vendedor'=>$venta_dia_vendedor,
            'venta_diaria'=>$venta_diaria,
            'venta_mensual'=>$venta_mensual,
            'venta_anual'=>$objeto->venta_anual
        );        
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
?>