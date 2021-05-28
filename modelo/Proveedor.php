<?php
include 'Conexion.php';
class Proveedor{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    /**funcion crear proveedor */
    function crear($nombre,$telefono,$correo,$direccion,$avatar){
        $sql="SELECT id_proveedor FROM proveedor where nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql="INSERT INTO proveedor(nombre,telefono,correo,direccion,avatar) values (:nombre,:telefono,:correo,:direccion,:avatar);"; 
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':telefono'=>$telefono,':correo'=>$correo,':direccion'=>$direccion,':avatar'=>$avatar));
            echo 'add';
        }
    }
    /**funcion buscar proveedor */
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM proveedor where nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM proveedor where nombre NOT LIKE '' ORDER BY id_proveedor desc LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
}
?>