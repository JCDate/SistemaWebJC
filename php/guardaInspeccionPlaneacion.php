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

$orden = $_POST['orden'];
$fecha = $_POST['fecha'];
$componente = $_POST['componente'];
$cuñetes = $_POST['cuñetes'];
$pzs = $_POST['pzs'];
$inspector = $_POST['inspector'];
$prioridad = $_POST['prioridad'];


$newDate = date("d/m/Y", strtotime($fecha));

if (isset($_POST["fecha"]) AND $_POST["fecha"] AND isset($_POST["componente"]) AND $_POST["componente"] AND
   isset($_POST["cuñetes"]) AND $_POST["cuñetes"] AND isset($_POST["pzs"]) AND $_POST["pzs"] AND
   isset($_POST["inspector"]) AND $_POST["inspector"] AND isset($_POST["prioridad"]) AND $_POST["prioridad"] == 'NO'){

     for ($i=1; $i <= $cuñetes; $i++) {
       $consulta = "INSERT INTO inspeccion(orden, componente, fechaEntrada, TotalCuñete,cuñete, inspector, cantidadPzs ) VALUES ('$orden','$componente','$newDate','$cuñetes','$i','$inspector','$pzs')";
         $result = $conexion -> query($consulta);
     }

     echo "<center><h1>Datos Guardados<h1>";
       echo "<form action='/produccion/InspeccionPlanInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
        </form>";
   }else if (isset($_POST["fecha"]) AND $_POST["fecha"] AND isset($_POST["componente"]) AND $_POST["componente"] AND
      isset($_POST["cuñetes"]) AND $_POST["cuñetes"] AND isset($_POST["pzs"]) AND $_POST["pzs"] AND
      isset($_POST["inspector"]) AND $_POST["inspector"] AND isset($_POST["prioridad"]) AND $_POST["prioridad"] == 'SI'){

        $prioridad = $_POST['prioridad'];
        for ($i=1; $i <= $cuñetes; $i++) {
          $consulta = "INSERT INTO inspeccion(orden, componente, fechaEntrada, TotalCuñete,cuñete, inspector, cantidadPzs, prioridad) VALUES ('$orden','$componente','$newDate','$cuñetes','$i','$inspector','$pzs','1')";
            $result = $conexion -> query($consulta);
        }

        echo "<center><h1>Datos Guardados<h1>";
          echo "<form action='/produccion/InspeccionPlanInterfaz.php' method='post'>
               <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
           </form>";
    }else{
        echo "<center><h2>ERROR. DATOS NO GUARDADOS</h2>";
        echo "<br>";
        echo "<form action='/produccion/InspeccionPlanInterfaz.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
         </form></center>";
      }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>INSPECCIÓN</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">

   </body>
 </html>
