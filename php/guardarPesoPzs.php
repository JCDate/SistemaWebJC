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
mysqli_set_charset($conexion,"UTF8");

$componente = $_POST['componente'];
$pesoporpzs= $_POST['pesoporpzs'];
if($componente and $pesoporpzs){

    $consulta = "UPDATE consumoyantecedentes set pesoPzs='$pesoporpzs' where componente_CA='$componente'";
      $result = $conexion -> query($consulta);


  echo "<center><h2>DATOS GUARDADOS</h2>";
  echo "<form action='/produccion/PesoPorPzsCal.php' method='post'>
       <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
   </form></center>";

}else{
  echo "<center><h2>ERROR. FAVOR DE REVISAR QUE EL CAMPO NO ESTÉ VACÍO:</h2>";
  echo "<br>";
  echo "<form action='/produccion/PesoPorPzsCal.php' method='post'>
       <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
   </form></center>";
}

  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR PESO PZS.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body bgcolor="#AED6F1">
   </body>
 </html>
