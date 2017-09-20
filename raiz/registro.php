<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
  </head>
  <body>
      <form class="" action="registro.php" method="post">
          Nombre:<input type="text" name="nombre" value="">
          Apellidos:<input type="text" name="apellido" value="">
          Direccion:<input type="text" name="direccion" value="">
          Teléfono:<input type="number" name="telefono" value="">
          Redes Sociales:<input type="text" name="rrss" value="">
          Correo:<input type="email" name="correo" value="">
          Contraseña:<input type="password" name="pass0" value="">
          Repetir Contraseña:<input type="password" name="pass1" value="">
          <input type="submit" name="" value="Enviar">
      </form>

    <?php
      if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['pass0'])&& isset($_POST['apellido'])&& isset($_POST['direccion'])&& isset($_POST['telefono'])&& isset($_POST['rrss'])) {
        include '../lib/usuario.php';
        $usuario = new Usuario();
        $tabla=$usuario->Comprobaremail($_POST['correo']);
        if ($tabla==null) {
          echo "Este correo electrónico ya está registrado, por favor introduce otro diferente.";
        }else{
          if ($_POST['pass0']==$_POST['pass1']) {
            $resultado=$usuario->insertarUsuario($_POST["nombre"],$_POST["correo"], $_POST["pass0"],$_POST['apellido'],$_POST['direccion'],$_POST['telefono'],$_POST['rrss']);
            if ($resultado!==null) {
              echo "ERROR al hacer el registro, por favor, intentelo más tarde.";
              }else{
                echo "Registrado correctamente.";
                echo "<br><br>";
                echo "<a href='login.php'>LOGIN</a>";
              }
          }else{
            echo "<a href='registro.php'>Las contraseñas no coinciden, por favor, introducelas de nuevo.</a>";
          }
        }
      }
    ?>
  </body>
</html>
