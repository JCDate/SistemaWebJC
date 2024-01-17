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
$entrada = $_POST['entrada'];
$fechaEnt = $_POST['fechaEnt'];

$newDate = date("d/m/Y", strtotime($fechaEnt));
$veryEnt = $_POST['veryEnt'];

$consulta2 = "SELECT * FROM loteeconomico WHERE componente = '$componente'";
  $result2 = $conexion -> query($consulta2);

$consulta = "SELECT cantAct FROM loteeconomico WHERE componente = '$componente'";
  $result = $conexion -> query($consulta);
  $fila = $result  -> fetch_assoc();

$res = $fila['cantAct'] + $entrada;


   if($result2 -> num_rows > 0) {
     $consulta = "UPDATE loteeconomico set entrada='$entrada',fechaEnt= '$newDate',veryEnt='$veryEnt',cantAct= '$res' where componente='$componente'";
       $result = $conexion -> query($consulta);

       echo "<center><h2>DATOS GUARDADOS</h2>";
       echo "<form action='/produccion/LoteEconomicoInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form></center>";

   }else {
     if($componente and $entrada){

         $consulta = "INSERT INTO loteeconomico(componente,entrada,fechaEnt,veryEnt) VALUES('$componente','$entrada','$newDate','$veryEnt')";
           $result = $conexion -> query($consulta);

         $consulta = "UPDATE loteeconomico set cantAct= '$res' where componente='$componente'";
           $result = $conexion -> query($consulta);


       echo "<center><h2>DATOS GUARDADOS</h2>";
       echo "<form action='/produccion/LoteEconomicoInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form></center>";

     }else{
       echo "<center><h2>ERROR. FAVOR DE REVISAR QUE EL CAMPO NO ESTÉ VACÍO:</h2>";
       echo "<br>";
       echo "<form action='/produccion/LoteEconomicoInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
        </form></center>";
     }

   }


  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR ENTRADA LOTE ECN.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body bgcolor="#AED6F1">
   </body>
 </html>
