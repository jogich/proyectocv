<?php
include 'db.php';
/**
 *
 */
class modificarDatos extends db
{
  function __construct()
  {
    parent::__construct();
  }


//Funcion para insertar un perfil
public function insertarPerfil($nombre, $apellidos, $direccion, $telefono,$redes,$correo){
  $sqlInserction = "INSERT INTO perfil (nombre, apellidos, direccion, telefono, redes_Sociales, correo) VALUES
  ('".$nombre."','".$apellidos."','".$direccion."','".$telefono."','".$redes."','".$correo."')";
  $this->realizarConsulta($sqlInserction);

}

//Funcion para actualizar el perfil
public function updatePerfil($nombre, $apellidos, $direccion, $telefono,$redes,$correo, $id)
{
  $sqlUpdate="UPDATE perfil SET nombre='".$nombre."', apellidos='".$apellidos."',direccion='".$direccion."', telefono='".$telefono."', redes_Sociales='".$redes."', correo='".$correo."' WHERE id=".$id."";
  $this->realizarConsulta($sqlUpdate);

}

//Funcion que muestra toda el perfil
public function mostrarPerfil()
{
  $sqlSelect = "SELECT * FROM perfil";
  $resultado = $this->realizarConsulta($sqlSelect);
  return parseResult($resultado);
}


//Funcion que parsea el resultado de la consulta
public function parseResult($result)
{
  $data = array();
    while($row = mysql_fetch_assoc($result))
    {
      $data[] = $row;
    }

    return $data;
}
}

 ?>
