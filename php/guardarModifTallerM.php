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

$troquel = $_POST['troquel'];
$id = $_POST['id'];

$descripcion = $_POST['descripcion'];
$turno = $_POST['turno'];
$solucion = $_POST['solucion'];
$fabricada = $_POST['fabricada'];
$reparada = $_POST['reparada'];
$ajuste = $_POST['ajuste'];


    if (isset($_POST["troquel"]) AND $_POST["troquel"] AND isset($_POST["componente"]) AND $_POST["componente"] AND
        isset($_POST["descripcion"]) AND $_POST["descripcion"] AND isset($_POST["turno"]) AND $_POST["turno"] AND
        isset($_POST["solucion"]) AND $_POST["solucion"] AND isset($_POST["fabricada"]) AND $_POST["fabricada"] AND
        isset($_POST["reparada"]) AND $_POST["reparada"] AND isset($_POST["ajuste"]) AND $_POST["ajuste"] ){
    $componente = $_POST['componente'];

        $consulta = "UPDATE tallermecacicofalla SET descripcion='$descripcion' WHERE id='$id'";
          $result = $conexion -> query($consulta);

        $consulta1 = "UPDATE tallermecanicorep SET turno='$turno',solucion='$solucion',fabricada='$fabricada',reparada='$reparada',eficaz='$ajuste' WHERE id='$id'";
          $result1 = $conexion -> query($consulta1);

           echo "<center><h1>Datos Guardados<h1>";
             echo "<form action='/produccion/TallerMecanicoInt.php' method='post'>
                  <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
              </form>";
    }else{
        echo "<center><h2>ERROR. DATOS NO GUARDADOS</h2>";
        echo "<br>";
        echo "<form action='/produccion/php/TallerMecanicoInt.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
         </form></center>";
      }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR T. M.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">

   </body>
 </html>
