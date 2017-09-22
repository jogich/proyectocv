
<!DOCTYPE html>
<html>
<head>
	<title>Editar Perfil</title>

<?php  require_once '../lib/seguridad.php';

	$seguridad = new Seguridad();
	$user=$seguridad->getUsuario();
    if ($seguridad->getUsuario()==null) {
		header("Location: index.html");
		exit;
	} ?>

</head>
<body>





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
	        include 'modificarDatos.php';
	        $modificarDatos = new modificarDatos();
	        $modificarDatos->insertarPerfil($_POST["nombre"], $_POST["apellidos"], $_POST["direccion"], $_POST["telefono"],$_POST["redes"],$_POST["correo"]);

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