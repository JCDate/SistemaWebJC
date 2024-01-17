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
  $solicitante = $_POST['solicitante'];
  $fecha = $_POST['fecha'];
  $tipoM = $_POST['tipoM'];
  $anchoTira = $_POST['anchoTira'];
  $norollo = $_POST['norollo'];
  $notira = $_POST['notira'];
  $nohoja = $_POST['nohoja'];
  $pesocal = $_POST['pesocal'];
  $autorizado = $_POST['autorizado'];
  $observaciones = $_POST['observaciones'];

if($orden and $solicitante and $tipoM and $anchoTira and $norollo and $notira and $pesocal and $autorizado){

    $consulta = "UPDATE almacenmp set fecha='$fecha', solicitante='$solicitante',tipomaterial='$tipoM', anchoTira='$anchoTira',noRollo='$norollo', noTira='$notira',noHoja='$nohoja', pesoCal='$pesocal',autorizado='$autorizado', observaciones='$observaciones'  where orden='$orden'";
      $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE inventario, almacenmp, estructura SET Kgs=( SELECT (inventario.kgs-almacenmp.pesoCal) FROM almacenmp, estructura WHERE estructura.componente=almacenmp.componente AND estructura.calibre= inventario.calibre AND almacenmp.orden='$orden') WHERE almacenmp.orden='$orden' AND estructura.componente=almacenmp.componente AND estructura.calibre= inventario.calibre";
        $result2 = $conexion -> query($consulta2);

    echo "<center>Datos Guardados";
    echo "<form action='/produccion/AlmacenMPC.php' method='post'>
         <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'  class='zoom'/></button>
     </form></center>";

}else{
    echo "<center><h2>ERROR. FAVOR DE REVISAR QUE LOS SIGUIENTES CAMPOS NO ESTÉN VACÍOS:</h2>";
    echo "<br>";
    echo "<h3>*SOLICITANTE";
    echo "<br>";
    echo "*TIPO DE MATERIAL";
    echo "<br>";
    echo "*ANCHO DE TIRA";
    echo "<br>";
    echo "*NO. ROLLO";
    echo "<br>";
    echo "*NO. TIRAS";
    echo "<br>";
    echo "*PESO (CAL)";
    echo "<br>";
    echo "*AUTORIZADO</h3>";
    echo "<form action='/produccion/AlmacenMPC.php' method='post'>
         <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
     </form></center>";
}

  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>ALMACEN M.P.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body align="center" bgcolor="#AED6F1">
     <br><br>
   </body>
 </html>
