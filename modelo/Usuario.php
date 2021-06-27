<?php
include_once 'Conexion.php';
class Usuario{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    /**funcion de loguarce con roles */
    function Loguearse($dni,$pass){
        $sql="SELECT * FROM usuario inner join tipo_us on us_tipo=id_tipo_us where dni_us=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni' => $dni));
        $this->objetos = $query->fetchAll();
        foreach ($this->objetos as $objeto) {
            $contrasena_actual = $objeto->contrasena_us;
        }
        if(strpos($contrasena_actual,'$2y$10$')===0){
            if(password_verify($pass,$contrasena_actual)){                
                return $this->objetos;
            }            
        }
        else{
            if ($pass==$contrasena_actual) {                
                return $this->objetos;          
            }
        }
    }
    /**funcion de obteniendo datos de usuario */
    function obtener_datos($id){
        $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us and id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos= $query->fetchall();
        return $this->objetos;
    }
    /**funcion eidtar usuario */
    function editar($id_usuario,$telefono,$residencia,$correo,$sexo,$adicional){
        $sql="UPDATE usuario SET telefono_us=:telefono, residencia_us=:residencia,correo_us=:correo,sexo_us=:sexo,adicional_us=:adicional where id_usuario=:id";
        $query = $this->acceso->prepare($sql);    
        $query->execute(array(':id'=>$id_usuario,':telefono'=>$telefono,':residencia'=>$residencia,':correo'=>$correo,':sexo'=>$sexo,':adicional'=>$adicional));
    }
    /**funcion cambiar contraseña de usuario */
    function cambiar_contra($id_usuario,$oldpass,$newpass){
        $sql="SELECT * FROM usuario where id_usuario=:id";
        $query = $this->acceso->prepare($sql);    
        $query->execute(array(':id'=>$id_usuario));
        $this->objetos = $query->fetchall();
        foreach ($this->objetos as $objeto) {
            $contrasena_actual = $objeto->contrasena_us;
        }
        if(strpos($contrasena_actual,'$2y$10$')===0){
            if(password_verify($oldpass,$contrasena_actual)){
                $pass = password_hash($newpass,PASSWORD_BCRYPT,['cost'=>10]);
                $sql="UPDATE usuario SET contrasena_us=:newpass where id_usuario=:id";
                $query=$this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_usuario,':newpass'=>$pass));
                echo 'update';
            }
            else{
                echo 'noupdate';
            }
        }
        else{
            if ($oldpass==$contrasena_actual) {
                $pass = password_hash($newpass,PASSWORD_BCRYPT,['cost'=>10]);
                $sql="UPDATE usuario SET contrasena_us=:newpass where id_usuario=:id";
                $query=$this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_usuario,':newpass'=>$pass));
                echo 'update';                                
            }
            else{
                echo 'noupdate';
            }
        }
    }
    /**funcion para cambiar foto */
    function cambiar_photo($id_usuario,$nombre){
        $sql="SELECT avatar FROM usuario where id_usuario=:id";
        $query = $this->acceso->prepare($sql);    
        $query->execute(array(':id'=>$id_usuario));
        $this->objetos = $query->fetchall();

            $sql="UPDATE usuario SET avatar=:nombre where id_usuario=:id";
            $query=$this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_usuario,':nombre'=>$nombre));
          return $this->objetos;
        
    }
    /**funcion para buscar usuario */
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us where nombre_us LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us where nombre_us NOT LIKE '' ORDER BY id_usuario LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    /**funcion para crear un nuevo usuario */
    function crear($nombre,$apellido,$edad,$dni,$pass,$tipo,$avatar){
        $sql="SELECT id_usuario FROM usuario where dni_us=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql="INSERT INTO usuario(nombre_us,apellidos_us,edad,dni_us,contrasena_us,us_tipo,avatar) VALUES (:nombre,:apellido,:edad,:dni,:pass,:tipo,:avatar);"; 
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':apellido'=>$apellido,':edad'=>$edad,':dni'=>$dni,':pass'=>$pass,':tipo'=>$tipo,':avatar'=>$avatar));
            echo 'add';
        }
    }
    /**funcion para descender un usario por modal*/
    function ascender($pass,$id_ascendido,$id_usuario){
        $sql="SELECT id_usuario FROM usuario where id_usuario=:id_usuario and contrasena_us=:pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario,':pass'=>$pass));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            $tipo=1;
            $sql="UPDATE usuario SET us_tipo=:tipo where id_usuario=:id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_ascendido,':tipo'=>$tipo));
            echo 'ascendido';
        }
        else{
            echo 'noascendido';
        }
    }
    /**funcion para descender un usario por modal */
    function descender($pass,$id_descendido,$id_usuario){
        $sql="SELECT id_usuario FROM usuario where id_usuario=:id_usuario and contrasena_us=:pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario,':pass'=>$pass));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            $tipo=2;
            $sql="UPDATE usuario SET us_tipo=:tipo where id_usuario=:id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_descendido,':tipo'=>$tipo));
            echo 'descendido';
        }
        else{
            echo 'nodescendido';
        }
    }
    /**funcion de eliminar usuario*/
    function borrar($pass,$id_borrado,$id_usuario){
        $sql="SELECT * FROM usuario where id_usuario=:id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario));
        $this->objetos=$query->fetchall();
        foreach ($this->objetos as $objeto) {
            $contrasena_actual = $objeto->contrasena_us;
        }
        /**inscriptacion */
        if(strpos($contrasena_actual,'$2y$10$')===0){
            if(password_verify($pass,$contrasena_actual)){                
                $sql="DELETE FROM usuario where id_usuario=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_borrado));
                echo 'borrado';
            }
            else{
                echo 'no borrado';
            }          
        }
        else{
            if ($pass==$contrasena_actual) {                
                $sql="DELETE FROM usuario where id_usuario=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_borrado));
                echo 'borrado';          
            }
            else{
                echo 'no borrado';
            }
        }        
    }
    function devolver_avatar($id_usuario){
        $sql="SELECT avatar FROM usuario where id_usuario=:id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
}
?>