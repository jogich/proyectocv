<?php
    include '../lib/seguridad.php';
    $seguridad = new seguridad();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="#">
     </head>
    <body>
        <h1>Iniciar sesión</h1>
        <?php
            if ((empty($_POST['email'])) &&
            (empty($_POST['passsword']))) {
        ?>
        <form class="form" method="post" action="login.php">
            <input type="text" name="email" placeholder="Correo electrónico">

            <input type="password" name="password" placeholder="Contraseña">

            <button type="submit" id="login-button">Login</button>
        </form>
        
        <?php
        }
        if ((isset($_POST['email'])) && (!empty($_POST['email'])) &&
            (isset($_POST['password'])) && (!empty($_POST['password']))) {
                
                include '../lib/usuario.php';

                $seguridad = new seguridad();

                $login = new Usuario();
                
                $resultado = $login->buscarUsuario($_POST['email']);
                
                if ($resultado['correo']==($_POST['email'])){
                    
                    if (($resultado['contrasena'])==(sha1($_POST['password']))){
                        echo "Has iniciado sesión correctamente!<br><br>";
                        header('Location:index.html');
                        
                        $seguridad->addUsuario($_POST['email']);
                    }else{
                        echo "Las contraseña no coincide, por favor introducela de nuevo.<hr>";
                        ?>
                        <form class="form" method="post" action="login.php">
                            <input type="text" name="email" value="<?=$_POST['email']?>" placeholder="Correo electrónico">
                            <input type="password" name="password" placeholder="Contraseña">
                            <button type="submit" id="login-button">Login</button>
                        </form>
                        <?php
                    }
                }else{
                    echo "Este correo electrónico no existe. Registrese aquí.<br><br>";
                    echo "<a href=registro.php>Registro</a>";
                }
        }   
        ?>
    </body>
</html>
