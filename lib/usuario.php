<?php
include "db.php";
/**
 *
 */
class Usuario extends db
{
  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }
  //Insertamos un nuevo usuario
  function insertarUsuario($nombre,$mail,$pass,$apellido,$direccion,$telefono,$rrss){
    //Construimos la consulta
    $sql="INSERT INTO perfil (id,nombre,Correo,contrasena,Apellidos,Direccion,Correo,Telefono,Redes_Sociales)
          VALUES (NULL, '".$nombre."','".$mail."', '".sha1($pass)."','".$apellido."','".$direccion."','".$telefono."','".$rrss."')";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo usuario insertado
      $sql="SELECT * from perfil ORDER BY id DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  //Devolvemos un nuevo usuario
  function buscarUsuario($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuario WHERE nombre='".$usuario."'";
    //Realizamos la consulta
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
  //comprobamos el mail y si devuelve mas de una fila es que tiene mas de un mail y si da mas de uno salta el erro de mail utilizado
  function Comprobaremail($email){
   $sql="SELECT Correo from perfil WHERE Correo='".$email."'";
   //Realizamos la consulta
   $resultado=$this->realizarConsulta($sql);
   if($resultado!=null){
     if ($resultado->num_rows>0) {
       return null;
     }else {
       return 1;
     }
   }else{
     return null;
   }
 }
}
 ?>
