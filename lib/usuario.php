<?php
include "db.php";
/**
 * clase para acciones sobre los usuarios
 */
class Usuario extends db
{
  function __construct()
  {
    // conexion a la base de datos
    parent::__construct();
  }

  // anyadimos un usuario a la db
  function insertarUsuario($nombre,$mail,$pass,$apellido,$direccion,$telefono,$rrss){
  
    $sql="INSERT INTO perfil (id,nombre,correo,contrasena,apellidos,direccion,telefono,redes_sociales)
      VALUES (NULL, '".$nombre."','".$mail."', '".sha1($pass)."','".$apellido."','".$direccion."','".$telefono."','".$rrss."')";
    
    $resultado=$this->realizarConsulta($sql);
  }

  // buscamos el usuario introducido en login
  function buscarUsuario($email){

    $sql="SELECT * from perfil WHERE correo='".$email."'";
    
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
}
 ?>
