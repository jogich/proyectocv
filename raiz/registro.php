<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <link rel="stylesheet" href="css/register.css">
    </head>
    <body>
    <?php
        if ((empty($_POST['nombre'])) &&
            (empty($_POST['apellido'])) &&
            (empty($_POST['direccion'])) &&
            (empty($_POST['telefono'])) &&
            (empty($_POST['rrss'])) &&
            (empty($_POST['correo'])) &&
            (empty($_POST['pass0'])) &&
            (empty($_POST['pass1']))) {
    ?>
      <p class="texto">Registro</p>
      <div class="Registro">
      <form class="" action="registro.php" method="post">

        <span class="fontawesome-user"></span>
          <input type="text" name="nombre" value="" placeholder="Nombre" required>

          <span class="fontawesome-user"></span>
          <input type="text" name="apellido" id="email" value="" placeholder="Apellidos" required>

          <span class="fontawesome-user"></span>
          <input type="text" name="direccion" value="" placeholder="Direccion" required>

          <span class="fontawesome-user"></span>
          <input type="text" name="telefono" value="" placeholder="Teléfono" required>

          <span class="fontawesome-user"></span>
          <input type="text" name="rrss" value="" placeholder="Redes Sociales" required>

          <span class="fontawesome-envelope-alt"></span>
          <input type="text" name="correo" value="" placeholder="Correo" required>

          <span class="fontawesome-lock"></span>
          <input type="password" name="pass0" id="password" value="" placeholder="Contraseña" required>

          <span class="fontawesome-lock"></span>
          <input type="password" name="pass1" id="password2" value="" placeholder="Repetir Contraseña" required>
          <input type="submit" name="" value="Registrar">
      </form>

    <?php
        }
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
                    echo "Este correo electrónico ya está registrado, por favor introduce otro diferente.<hr>";
                    ?>
                        <form class="" action="registro.php" method="post">
                            Nombre:<input type="text" name="nombre" value="<?=$_POST['nombre']?>" required>

                            Apellidos:<input type="text" name="apellido" value="<?=$_POST['apellido']?>" required>

                            Direccion:<input type="text" name="direccion" value="<?=$_POST['direccion']?>" required>

                            Teléfono:<input type="number" name="telefono" value="<?=$_POST['telefono']?>" required>

                            Redes Sociales:<input type="text" name="rrss" value="<?=$_POST['rrss']?>" required>

                            Correo:<input type="email" name="correo"  required>

                            Contraseña:<input type="password" name="pass0" required>

                            Repetir Contraseña:<input type="password" name="pass1" required>

                            <input type="submit" name="" value="Enviar">
                        </form>
                    <?php
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
                        echo "Las contraseñas no coinciden, por favor, introducelas de nuevo.<hr>";
                        ?>
                            <form class="" action="registro.php" method="post">
                                Nombre: <input type="text" name="nombre" value="<?=$_POST['nombre']?>" required>

                                Apellidos: <input type="text" name="apellido" value="<?=$_POST['apellido']?>" required>

                                Direccion: <input type="text" name="direccion" value="<?=$_POST['direccion']?>" required>

                                Teléfono: <input type="number" name="telefono" value="<?=$_POST['telefono']?>" required>

                                Redes Sociales: <input type="text" name="rrss" value="<?=$_POST['rrss']?>" required>

                                Correo: <input type="email" name="correo" value="<?=$_POST['rrss']?>"  required>

                                Contraseña: <input type="password" name="pass0" required>

                                Repetir Contraseña: <input type="password" name="pass1" required>

                                <input type="submit" name="" value="Enviar">
                            </form>
                        <?php
                    }
                }
        }
    ?>
  </body>
</html>
