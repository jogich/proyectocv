<?php
include 'db.php';
/**
 *
 */
class ExpProf extends db
{
  function __construct()
  {
    parent::__construct();
  }


//Funcion para insertar experiencia profesional
public function insertarExperiencia($anyoInicio, $anyoFinalizacion, $empresa, $descripcion){
  $sqlInserction = "INSERT INTO exp_profesional (anyo_inicio, anyo_fin, empresa, texto) VALUES
  ('".$anyoInicio."','".$anyoFinalizacion."','".$empresa."','".$descripcion."')";
  $this->realizarConsulta($sqlInserction);

}

//Funcion para actualizar la experiencia
public function updateExperiencia($anyoInicio, $anyoFinalizacion, $empresa, $descripcion, $id)
{
  $sqlUpdate="UPDATE exp_profesional SET anyo_inicio='".$anyoInicio."', anyo_fin='".$anyoFinalizacion."',empresa='".$empresa."', texto='".$descripcion."' WHERE id=".$id."";
  $this->realizarConsulta($sqlUpdate);

}

//Funcion que muestra toda la experiencia
public function morstrarExperiencia()
{
  $sqlSelect = "SELECT * FROM exp_profesional";
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
