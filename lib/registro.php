<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form class="" action="registro.php" method="post">
      Nombre:<input type="text" name="nombre" value="">
      Apellidos:<input type="text" name="apellido" value="">
      Direccion:<input type="text" name="direccion" value="">
      Teléfono:<input type="text" name="telefono" value="">
      Redes Sociales:<input type="text" name="rrss" value="">
      Correo:<input type="text" name="correo" value="">
      Contraseña:<input type="text" name="pass0" value="">
      Repetir Contraseña:<input type="text" name="pass1" value="">
      <input type="submit" name="" value="Enviar">
      <input type="reset" name="" value="Reset">
    </form>
    <?php
     $comprobacion=0;
     if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['pass0'])&& isset($_POST['apellido'])&& isset($_POST['direccion'])&& isset($_POST['telefono'])&& isset($_POST['rrss'])) {
       include 'usuario.php';
       $usuario = new Usuario();
       $tabla=$usuario->Comprobaremail($_POST['correo']);
       if ($tabla==null) {
         echo "El correo ya esta registrado.";
       }else {
         if ($_POST['pass0']==$_POST['pass1']) {
           $resultado=$usuario->insertarusuario($_POST["nombre"],$_POST["correo"], $_POST["pass0"],$_POST['apellido'],$_POST['direccion'],$_POST['telefono'],$_POST['rrss']);
           if ($resultado==null) {
             echo "Error";
           }else {
             echo "Registro correcto";
             echo "<br>";
             echo "<a href='index.php'>IR A LOGIN</a>";
             }
           }else {
             echo "<a href='registro.php'>Algo falla, revisa tu contraseña.</a>";
         }
       }
     }
      ?>
  </body>
</html>
