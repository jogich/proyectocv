<?php
include 'db.php';
/**
 *
 */
class ExpEdu extends db
{

  function __construct()
  {
    parent::__construct();
  }

  //Funcion para insertar experiencia educativa
  public function insertarExperienciaEdu($anyoInicio, $anyoFinalizacion, $empresa, $descripcion){
    $sqlInserction = "INSERT INTO educacion (anyo_inicio, anyo_fin, empresa, texto) VALUES
    ('".$anyoInicio."','".$anyoFinalizacion."','".$empresa."','".$descripcion."')";
    $this->realizarConsulta($sqlInserction);
  }

  //Funcion para actualizar la experiencia educativa
  public function updateExperienciaEdu($anyoInicio, $anyoFinalizacion, $empresa, $descripcion, $id)
  {
    $sqlUpdate="UPDATE educacion SET anyo_inicio='".$anyoInicio."', anyo_fin='".$anyoFinalizacion."',empresa='".$empresa."', texto='".$descripcion."' WHERE id=".$id."";
    $this->realizarConsulta($sqlUpdate);
  }

  //Funcion que muestra toda la experiencia educativa
  public function morstrarExperienciaEdu()
  {
    $sqlSelect = "SELECT * FROM educacion";
    $resultado = $this->realizarConsulta($sqlSelect);
    return $this->parseResult($resultado);
  }

  //Funcion que parsea el resultado de la consulta
  public function parseResult($result)
  {
    $data = array();
      while($row = $result->fetch_assoc())
      {
        $data[] = $row;
      }

      return $data;
  }
}

 ?>
