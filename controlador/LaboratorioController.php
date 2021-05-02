<?php
include '../modelo/Laboratorio.php';
$laboratorio=new laboratorio();
/**funcion crear */
if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre_laboratorio'];
    $avatar='avadelabo.png';
    $laboratorio->crear($nombre,$avatar);
}
/**funcion buscar */
if($_POST['funcion']=='buscar'){
    $laboratorio->buscar();
    $json=array();
    foreach ($laboratorio->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_laboratorio,
            'nombre'=>$objeto->nombre,
            'avatar'=>'../img/'.$objeto->avatar
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>