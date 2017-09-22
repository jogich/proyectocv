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
        	return $resultado->fetch_assoc();
      	}else{
        	return null;
      	}
    }
		function mostrarInfo(){

    	$sql="SELECT * from perfil WHERE correo='admin@admin.com'";

    	$resultado=$this->realizarConsulta($sql);

      	if($resultado!=false){
        	return $resultado->fetch_assoc();
      	}else{
        	return null;
      	}
    }
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
		//Funcion que muestra toda la experiencia
		public function morstrarExperiencia()
		{
		  $sqlSelect = "SELECT * FROM exp_profesional";
		  $resultado = $this->realizarConsulta($sqlSelect);
		  return $this->parseResult($resultado);

		}
}
?>
