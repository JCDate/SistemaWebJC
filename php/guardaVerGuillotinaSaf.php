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

$fecha = $_POST['fecha'];
$calibre = $_POST['calibre'];
$medProg = $_POST['medProg'];
$medCort = $_POST['medCort'];
$opera = $_POST['opera'];
$obser = $_POST['obser'];

$newDate = date("d/m/Y", strtotime($fecha));

if (isset($_POST["fecha"]) AND $_POST["fecha"] AND isset($_POST["calibre"]) AND $_POST["calibre"] AND
   isset($_POST["medProg"]) AND $_POST["medProg"] AND isset($_POST["medCort"]) AND $_POST["medCort"] AND
   isset($_POST["opera"]) AND $_POST["opera"] AND isset($_POST["obser"]) AND $_POST["obser"]){

     $consulta = "INSERT INTO veriguillotinasafan(fecha,calibre,medProgra,medCort,operador,obser) VALUES('$newDate','$calibre','$medProg','$medCort','$opera','$obser')";
       $result = $conexion -> query($consulta);

     echo "<center><h1>Datos Guardados<h1>";
       echo "<form action='/produccion/VerGuillotinaSafInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
        </form>";
   }else{
        echo "<center><h2>ERROR. DATOS NO GUARDADOS</h2>";
        echo "<br>";
        echo "<form action='/produccion/VerGuillotinaSafInterfaz.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
         </form></center>";
      }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR REP. DIARIO PROD.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">

   </body>
 </html>
