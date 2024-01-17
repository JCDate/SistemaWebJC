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

$id = $_POST['id'];
$orden = $_POST['orden'];
$componente = $_POST['componente'];
$inspector = $_POST['inspector'];


if (isset($_POST["orden"]) AND $_POST["orden"] AND isset($_POST["componente"]) AND $_POST["componente"] AND
    isset($_POST["inspector"]) AND $_POST["inspector"]){
    $consulta =  "DELETE FROM inspeccion WHERE orden = '$orden' AND id= '$id'";
    $result = $conexion -> query($consulta);
      echo "<center><h1>Datos Eliminados correctamente<h1>";
        echo "<form action='/produccion/InspeccionInt.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
         </form>";
   }elseif (isset($_POST["orden"]) AND $_POST["orden"] AND isset($_POST["componente"]) AND $_POST["componente"] AND
       isset($_POST["inspector"]) AND $_POST["inspector"]) {
         $consulta =  "DELETE FROM inspeccion WHERE orden = '$orden' AND id= '$id'";
         $result = $conexion -> query($consulta);
         echo "<center><h1>Datos Eliminados correctamente<h1>";
           echo "<form action='/produccion/InspeccionInt.php' method='post'>
                <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
            </form>";
   }else{
        echo "<center><h2>ERROR. DATOS NO ELIMINADOS</h2>";
        echo "<br>";
        echo "<form action='/produccion/InspeccionInt.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
         </form></center>";
      }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>Inspección</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">
   </body>
 </html>
