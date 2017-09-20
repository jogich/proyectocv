<?php
  include '../lib/seguridad.php';
  $seguridad = new seguridad();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>

    <div class="wrapper">
    <div class="container">
        <h1>Bienvenido</h1>

        <form class="form" method="post" action="login.php">
            <input type="text" name="email" placeholder="Correo electrónico">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit" id="login-button">Login</button>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
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
