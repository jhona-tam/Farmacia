<?php
include 'Conexion.php';
class Laboratorio{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    /**funcio crear laboratorio */
    function crear($nombre,$avatar){
        $sql="SELECT id_laboratorio FROM laboratorio where nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql="INSERT INTO laboratorio(nombre,avatar) values (:nombre,:avatar);"; 
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':avatar'=>$avatar));
            echo 'add';
        }
    }
    /**funcion buscar laboratorio */
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM laboratorio where nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM laboratorio where nombre NOT LIKE '' ORDER BY id_laboratorio LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
}
?>