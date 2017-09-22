<?php
/**
 *
 */
class Seguridad
{
  private $correo=null;
	function __construct(){
		if (!isset($_SESSION)){
			session_start();
		}
		
		if(isset($_SESSION['correo'])){
			$this->correo=$_SESSION['correo'];
		}
	}
	
	public function getUsuario(){
		return $this->correo;
	}

	public function addUsuario($correo){
		$_SESSION['correo']=$correo;
		$this->correo=$correo;
	}
	
	public function logout(){
		$_SESSION=[];
		session_destroy();
	}
}
?>