
<!DOCTYPE html>
<html>
<head>
	<title>Editar Perfil</title>
	<link rel="stylesheet" href="../css/index.css">

<?php  require_once '../lib/seguridad.php';

	$seguridad = new Seguridad();
	$user=$seguridad->getUsuario();
    if ($seguridad->getUsuario()==null) {
		header("Location: index.php");
		exit;
	} ?>

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




	<h1>Editar Foto</h1>

		<form action="insertarImagen.php" enctype="multipart/form-data" method="post">
		  <label for="imagen">Imagen:</label>
		  <input id="imagen" name="imagen" size="30" type="file" />
		  <input type="submit" value="Cambiar datos" />
		</form>

 	<h1>Editar Datos</h1>

	<form class="" action="editFoto.php" method="post">

       Nombre:<input type="text" name="nombre" value=""><br><br>
       Apellidos:<input type="text" name="apellidos"  value=""><br><br>
       Direccion:<input type="text" name="direccion"  value=""><br><br>
       Teléfono:<input type="text" name="telefono"  value=""><br><br>
       Redes Sociales:<input type="text" name="redes"  value=""><br><br>
       Correo:<input type="text" name="correo"  value=""><br><br>


       <input type="submit" name="Enviar" value="Enviar">
       <input type="reset" name="Reset" value="Reset">
    </form>

	<?php

	      if (checkForm("nombre") && checkForm("apellidos") && checkForm("direccion") && checkForm("telefono")&& checkForm("redes")&& checkForm("correo")) {
	        include '../lib/modificarDatos.php';
	        $modificarDatos = new modificarDatos();
	        $modificarDatos->updatePerfil($_POST["nombre"], $_POST["apellidos"], $_POST["direccion"], $_POST["telefono"],$_POST["redes"],$_POST["correo"]);

	      }


	      function checkForm($name)
	      {
	        if (isset($_POST[$name]) && !empty($_POST[$name])) {
	          return true;
	        } else {
	          return false;
	        }
	      }


	     ?>



</body>
</html>
