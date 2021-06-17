<?php
include_once 'Conexion.php';
class Venta{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    /**funcion de ventas*/
    function Crear($nombre,$dni,$total,$fecha,$vendedor){
        $sql="INSERT INTO venta(fecha,cliente,dni,total,vendedor) values(:fecha,:cliente,:dni,:total,:vendedor)"; 
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':fecha'=>$fecha,':cliente'=>$nombre ,':dni'=>$dni,':total'=>$total,':vendedor'=>$vendedor));        
    }
    /**funcion de registro de la ultima venta */
    function ultima_venta(){
        $sql="SELECT MAX(id_venta) as ultima_venta FROM venta";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    /**funcion venta */
    function borrar($id_venta){
        $sql="DELETE FROM venta where id_venta=:id_venta"; 
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_venta'=>$id_venta));  
        echo 'delete';
    }
    /**funcion buscar o listar venta */
    function buscar(){
        $sql="SELECT id_venta,fecha,cliente,dni,total, CONCAT(usuario.nombre_us,' ',usuario.apellidos_us) as vendedor FROM venta join usuario on vendedor=id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    /**funcion  de verificar venta*/
    function  verificar($id_venta,$id_usuario){
        $sql="SELECT * FROM venta where vendedor=:id_usuario and id_venta=:id_venta";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario,':id_venta'=>$id_venta));
        $this->objetos=$query->fetchall();
        if (!empty($this->objetos)) {
            return 1;
        }
        else {
            return 0;
        }
    }
    /**funcion recuperar lote **/
    function  recuperar_vendedor($id_venta){
        $sql="SELECT us_tipo FROM venta join usuario on id_usuario=vendedor where id_venta=:id_venta";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_venta'=>$id_venta));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
}
?>