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

$factura = $_POST['factura'];
$orden= $_POST['orden'];
$componente= $_POST['componente'];
$cr= $_POST['cr'];
$pzs= $_POST['pzs'];

if($orden and $factura){


  $consulta = "UPDATE analisisatrasos set fechaEmbarque= CURDATE() where orden='$orden'";
    $result = $conexion -> query($consulta);

    $consulta3 = "UPDATE facturacion set factura='$factura' where orden='$orden'";
      $result3 = $conexion -> query($consulta3);

    $consulta2 = "UPDATE analisisatrasos set factura='$factura' where orden='$orden'";
      $result2 = $conexion -> query($consulta2);

    $consulta4 = "UPDATE embarque set factura='$factura' where orden='$orden'";
      $result4 = $conexion -> query($consulta4);

    $fechaActual = date('d/m/Y');

    $consulta5 = "INSERT INTO ventas(componente, cr, pzs, fechaEmb) VALUES ('$componente','$cr','$pzs','$fechaActual')";
      $result5 = $conexion -> query($consulta5);


  echo "<center><h2>Factura Guardada:, $factura </h2>";
  echo "<form action='/produccion/Facturacion.php' method='post'>
       <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
   </form></center>";

}else{
  echo "<center><h2>ERROR. FAVOR DE REVISAR QUE EL SIGUIENTE CAMPO NO ESTÉ VACÍO:</h2>";
  echo "<br>";
  echo "<h3>*FACTURA </h3><br>";
  echo "<form action='/produccion/Facturacion.php' method='post'>
       <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
   </form></center>";
}

  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR FACTURA</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body bgcolor="#AED6F1">
   </body>
 </html>
