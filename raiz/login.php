<?php
  include '../lib/seguridad.php';
  $seguridad = new seguridad();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>INICAR SESIÓN</h2>
    <form method="post" action="login.php">
        Correo electrónico <input type="text" name="email" placeholder="Introduce tu correo electrónico..."><br><br>
        Contraseña <input type="password" name="password" placeholder="Introduce tu contraseña..."><br><br>
        <input type="submit" name="Entrar" value="Entrar">
    </form>

    <?php
        if ((isset($_POST['email'])) && (!empty($_POST['email'])) &&
            (isset($_POST['password'])) && (!empty($_POST['password']))){
                
                include '../lib/usuario.php';

                $seguridad = new seguridad();

                $login = new Usuario();
                
                $resultado = $login->buscarUsuario($_POST['email']);
                
                if ($resultado['correo']==($_POST['email'])){

                    if ($resultado['contrasena']==(sha1($_POST['password']))){
                        echo "Has iniciado sesión correctamente!<br><br>";
                        echo "<h2>Bienvenido</h2>";
                        
                        $seguridad->addUsuario($_POST['email']);
                    }
                }else{
                    echo "Este correo electrónico no existe. Registrese aquí.<br><br>";
                    echo "<a href=registro.php>Registro</a>";
                }
            } 
    ?>
</body>
</html>