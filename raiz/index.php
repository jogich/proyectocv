<?php
include '../lib/usuario.php';
$usuario = new Usuario();

include '../lib/seguridad.php';
$seguridad = new seguridad();
$user=$seguridad->getUsuario();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/index.css">
		<title></title>
  	</head>
  	<body>

    	<div class="menu_simple">
    		<ul style="width:100%;">
    			<li><a href="index.php">Inicio</a></li>
    			<li><a href="#">Blog</a></li>
				<li><a href="contacto.html">Contactar</a></li>
				<?php 
					if ($user == null){
						echo "<li class=login><a href=login.php>Login</a></li>";
						echo "<li class=login><a href=registro.php>Registrarse</a></li>";
					}else{
						echo "<li><a href=expProfesional.php>Experiencia Profesional</a></li>";
						echo "<li><a href=expEducativa.php>Experiencia Académica</a></li>";
						echo "<li class=login><a href=logout.php>Cerrar sesión</a></li>";
						echo "<li class=login><a href=editFoto.php>Editar perfil</a></li>";
					}
				?>
    		</ul>
  		</div>

		<div class="cajas">
			<div align="center"><img src="../img/profile-photo.jpg"><br><h1>Ximet</h1><br>Se manda a Abram ser perfecto — Él será padre de muchas naciones — Se le cambia el nombre por el de Abraham — Jehová hace convenio de ser el Dios de Abraham y de su descendencia para siempre — Además, Jehová le da la tierra de Canaán en heredad perpetua — La circuncisión llega a ser una señal del convenio sempiterno entre Dios y Abraham
			</div>
		</div>

		<div class="cajas2">
			<div class="titulo1">
    			<h1>Datos personales</h1>
  			</div>
  			<div class="contenido1">
					<?php $info=$usuario->mostrarInfo() ?>
				<h3>Nombre y apellido: <?php echo $info['nombre']; ?> <br>
				Dirección: <?php echo $info['direccion']; ?><br>
				Teléfono(s):<?php echo $info['telefono']; ?><br>
				Lugar y fecha de nacimiento: 21 de agosto de 1968<br>
				Edad:19<br>
				Estado civil: Casado<br>
				Documentos de Identificación:53673537T<br>
				País, cuidad y estado o departamento:España,Valencia<br>
  			</div>

  			<div class="titulo2">
    			<h1>Experiencia Académica</h1>
  			</div>

  			<div class="contenido2"><br>
				<?php $values = $usuario->morstrarExperienciaEdu();
				foreach ($values as $value) {
					echo "Nombre empresa: ".$value["empresa"];
					echo "<br>";
          echo "Año Inicio: ".$value["anyo_inicio"];
					echo "<br>";
					echo "Año Fin: ".$value["anyo_fin"];
					echo "<br>";
					echo "Descripcion: ".$value["texto"];
        }?>
  			</div>
				<div class="titulo2">
    			<h1>Experiencia Profesional</h1>
  			</div>

  			<div class="contenido2"><br>
				<?php $values = $usuario->morstrarExperiencia();
				foreach ($values as $value) {
					echo "Nombre empresa: ".$value["empresa"];
					echo "<br>";
         			echo "Año Inicio: ".$value["anyo_inicio"];
					echo "<br>";
					echo "Año Fin: ".$value["anyo_fin"];
					echo "<br>";
					echo "Descripcion: ".$value["texto"];
					echo "<br><br>";
					
        }?>
  			</div>

		</div>



		<footer>
			<div class="copyright">
  			<p>&copy 2017 - Organisation</p>
			</div>
			<div class="social">
  				<a href="#" class="support" href="contacto.html">Contact us</a>
			</div>
		</footer>
  	</body>
</html>
