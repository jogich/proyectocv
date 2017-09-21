<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
  </head>
  <body>
      <form class="" action="registro.php" method="post">
          Nombre:<input type="text" name="nombre" value="" required>
          Apellidos:<input type="text" name="apellido" value="" required>
          Direccion:<input type="text" name="direccion" value="" required>
          Teléfono:<input type="number" name="telefono" value="" required>
          Redes Sociales:<input type="text" name="rrss" value="" required>
          Correo:<input type="email" name="correo" value="" required>
          Contraseña:<input type="password" name="pass0" value="" required>
          Repetir Contraseña:<input type="password" name="pass1" value="" required>
          <input type="submit" name="" value="Enviar">
      </form>

    <?php
      if ((isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
          (isset($_POST['correo'])) && (!empty($_POST['correo'])) &&
          (isset($_POST['pass0'])) && (!empty($_POST['pass0'])) &&
          (isset($_POST['pass1'])) && (!empty($_POST['pass1'])) &&
          (isset($_POST['apellido'])) && (!empty($_POST['apellido'])) &&
          (isset($_POST['direccion'])) && (!empty($_POST['direccion'])) &&
          (isset($_POST['telefono'])) && (!empty($_POST['telefono'])) &&
          (isset($_POST['rrss'])) && (!empty($_POST['rrss']))) {
        
          include '../lib/usuario.php';
          
          $usuario = new Usuario();
        
          $user=$usuario->buscarUsuario($_POST['correo']);
        
          if ($user['correo'] == $_POST['correo']) {
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
                echo "Las contraseñas no coinciden, por favor, introducelas de nuevo.";
            }
          }
      }
    ?>
  </body>
</html>
