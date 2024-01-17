<?php

header("Content-Type: text/html;charset=utf-8");
$salida = "";

if (!($conexion = mysqli_connect("localhost", "root", "" )))
{
  echo "Error conectando a la base de datos.";
  exit();
}

if (!($db = mysqli_select_db($conexion, "jc_mysql")))
{
  echo "Error seleccionando la base de datos.";
  exit();
}

$id = $_POST['id'];


if($id ){

  $consulta = "DELETE FROM instpptroquelado WHERE id='$id'";
    $result = $conexion -> query($consulta);

  echo "<h2>DATOS BORRADOS<h2>";
  echo "<form action='/produccion/ListaInstPPTInterfaz.php' method='post'>
     <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
  </form>";
}

  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>INSTPPT</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body align="center" bgcolor="#AED6F1">

   </body>
 </html>
