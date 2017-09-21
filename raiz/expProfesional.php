<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Experiencia profesional</title>
  </head>
  <body>
    <form class="" action="expProfesional.php" method="post">
        Empresa:<input type="text" name="company" value="">
        Año de inicio:<input type="date" name="startYear" value="">
        Año de finalización:<input type="date" name="finishYear" value="">
        Descripción de la empresa:<input type="textarea" name="description" value="">
        <input type="submit" name="" value="Enviar">
    </form>

    <?php
      if (checkForm("company") && checkForm("startYear") && checkForm("finishYear") && checkForm("description")) {
        include '../lib/expProf.php';
        $expProf = new ExpProf();
        $expProf->updateExperiencia($_POST["startYear"], $_POST["finishYear"], $_POST["company"], $_POST["description"],  4);
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
