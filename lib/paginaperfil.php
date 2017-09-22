

<?php

include 'db.php';
/**
 *
 */
class paginaperfil extends db
{
  function __construct()
  {
    parent::__construct();
  }

/* lanzamos la consulta para traernos el nombre de la imagen, en nuestro caso 
el campo ruta_imagen se encuentra en la tabla usuarios */
$result = mysql_query("SELECT * FROM perfil"); 
while ($row=mysql_fetch_array($result)) 
{ 
    /*almacenamos el nombre de la ruta en la variable $ruta_img*/ 
    $ruta_img = $row["ruta_imagen"];
}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div>
   <img src="/intranet/uploads/<?php echo $ruta_img; ?>" alt="" />
</div>

</body>
</html>


