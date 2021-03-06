<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/index.css">
    <title>Experiencia Educativa</title>
    <?php include '../lib/expEdu.php';
    require_once '../lib/seguridad.php';
    
	$seguridad = new Seguridad();
	$user=$seguridad->getUsuario();
    if ($seguridad->getUsuario()==null) {
		header("Location: index.php");
		exit;
	}

    $expEdu = new ExpEdu();
    $arrayCompany = $expEdu->morstrarExperienciaEdu();  ?>
    <script type="text/javascript">
      function changeInputs() {
      var eID = document.getElementById("list");
      var position = eID.options[eID.selectedIndex].value;
      var arrayJs = <?php echo json_encode($arrayCompany); ?>;
      document.getElementById('edu').value=arrayJs[position]["empresa"];
      document.getElementById('startYear').value=arrayJs[position]["anyo_inicio"];
      document.getElementById('finishYear').value=arrayJs[position]["anyo_fin"];
      document.getElementById('description').value=arrayJs[position]["texto"];
      document.getElementById('hiddenInput').value=position;

}
</script>
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
    <form class="" action="expEducativa.php" method="post">
      <?php
      echo "<select id=\"list\" name=\"list\" onchange=\"changeInputs()\">";
      echo '<option>Selecciona el centro</option>';
        $expEdu = new ExpEdu();
        $values = $expEdu->morstrarExperienciaEdu();
        $i = 0;
        foreach ($values as $value) {
          echo "<option value=".$i.">".$value["empresa"]."</option>";
          $i++;
        }
        echo "</select>";
       ?>

        Centro:<input id="edu" type="text" name="edu" value="">
        Año de inicio:<input id="startYear" type="date" name="startYear" value="">
        Año de finalización:<input id="finishYear" type="date" name="finishYear" value="">
        Descripción de la experiencia:<input id="description" type="textarea" name="description" value="">
      <br><input type="submit" name="submit" value="Actualizar">
        <input type="submit" name="submit" value="Añadir">
      <input id="hiddenInput" type="hidden" name="hiddenInput" value=""></br>
    </form>

    <?php
      if (checkForm("edu") && checkForm("startYear") && checkForm("finishYear") && checkForm("description")) {
        $expEdu = new ExpEdu();
        if ($_POST["submit"] == "Actualizar") {
        $expEdu->updateExperienciaEdu($_POST["startYear"], $_POST["finishYear"], $_POST["edu"], $_POST["description"],  $_POST["hiddenInput"] + 1);
        } else {
          $expEdu->insertarExperienciaEdu($_POST["startYear"], $_POST["finishYear"], $_POST["edu"], $_POST["description"]);
        }
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
