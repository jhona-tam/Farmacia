<?php
include 'Conexion.php';
class Lote{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    /**funcion crear lote proveedor */
    function crear($id_producto,$proveedor,$stock,$vencimiento){
        $sql="INSERT INTO lote(stock,vencimiento,lote_id_prod,lote_id_prov) values (:stock,:vencimiento,:id_producto,:id_proveedor)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':stock'=>$stock,'vencimiento'=>$vencimiento,'id_producto'=>$id_producto,'id_proveedor'=>$proveedor));
        echo 'add';
    }
}
?>