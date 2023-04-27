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

$nombreProceso = $_POST['NomProceso10_1'];
$dispositivo = $_POST['dispositivo'];

$parte10 = $_POST['parte10'];
//$especificacion = $_POST['especificacion'];


$noC10_1=$_POST['noC10_1'];

$queryC = "SELECT no FROM descripcion2pc WHERE componente='$componente' AND noPartesP='$parte10'";
$resultC = $conexion -> query($queryC);

//1
$no1_1=$_POST['no1_1'];
$pod1_1=$_POST['pod1_1'];
$proceso1_1=$_POST['proceso1_1'];
$Res1_1=$_POST['Res1_1'];
$clas1_1=$_POST['clas1_1'];
$especificacionPLG1_1=$_POST['especificacionPLG1_1'];
$evaluacion1_1=$_POST['evaluacion1_1'];
$tamaño1_1=$_POST['tamaño1_1'];
$fre1_1=$_POST['fre1_1'];
$metodoC1_1=$_POST['metodoC1_1'];
//2
$no1_2=$_POST['no1_2'];
$pod1_2=$_POST['pod1_2'];
$proceso1_2=$_POST['proceso1_2'];
$Res1_2=$_POST['Res1_2'];
$clas1_2=$_POST['clas1_2'];
$especificacionPLG1_2=$_POST['especificacionPLG1_2'];
$evaluacion1_2=$_POST['evaluacion1_2'];
$tamaño1_2=$_POST['tamaño1_2'];
$fre1_2=$_POST['fre1_2'];
$metodoC1_2=$_POST['metodoC1_2'];
//3
$no1_3=$_POST['no1_3'];
$pod1_3=$_POST['pod1_3'];
$proceso1_3=$_POST['proceso1_3'];
$Res1_3=$_POST['Res1_3'];
$clas1_3=$_POST['clas1_3'];
$especificacionPLG1_3=$_POST['especificacionPLG1_3'];
$evaluacion1_3=$_POST['evaluacion1_3'];
$tamaño1_3=$_POST['tamaño1_3'];
$fre1_3=$_POST['fre1_3'];
$metodoC1_3=$_POST['metodoC1_3'];
//4
$no1_4=$_POST['no1_4'];
$pod1_4=$_POST['pod1_4'];
$proceso1_4=$_POST['proceso1_4'];
$Res1_4=$_POST['Res1_4'];
$clas1_4=$_POST['clas1_4'];
$especificacionPLG1_4=$_POST['especificacionPLG1_4'];
$evaluacion1_4=$_POST['evaluacion1_4'];
$tamaño1_4=$_POST['tamaño1_4'];
$fre1_4=$_POST['fre1_4'];
$metodoC1_4=$_POST['metodoC1_4'];
//5
$no1_5=$_POST['no1_5'];
$pod1_5=$_POST['pod1_5'];
$proceso1_5=$_POST['proceso1_5'];
$Res1_5=$_POST['Res1_5'];
$clas1_5=$_POST['clas1_5'];
$especificacionPLG1_5=$_POST['especificacionPLG1_5'];
$evaluacion1_5=$_POST['evaluacion1_5'];
$tamaño1_5=$_POST['tamaño1_5'];
$fre1_5=$_POST['fre1_5'];
$metodoC1_5=$_POST['metodoC1_5'];
//6
$no1_6=$_POST['no1_6'];
$pod1_6=$_POST['pod1_6'];
$proceso1_6=$_POST['proceso1_6'];
$Res1_6=$_POST['Res1_6'];
$clas1_6=$_POST['clas1_6'];
$especificacionPLG1_6=$_POST['especificacionPLG1_6'];
$evaluacion1_6=$_POST['evaluacion1_6'];
$tamaño1_6=$_POST['tamaño1_6'];
$fre1_6=$_POST['fre1_6'];
$metodoC1_6=$_POST['metodoC1_6'];
//7
$no1_7=$_POST['no1_7'];
$pod1_7=$_POST['pod1_7'];
$proceso1_7=$_POST['proceso1_7'];
$Res1_7=$_POST['Res1_7'];
$clas1_7=$_POST['clas1_7'];
$especificacionPLG1_7=$_POST['especificacionPLG1_7'];
$evaluacion1_7=$_POST['evaluacion1_7'];
$tamaño1_7=$_POST['tamaño1_7'];
$fre1_7=$_POST['fre1_7'];
$metodoC1_7=$_POST['metodoC1_7'];
//8
$no1_8=$_POST['no1_8'];
$pod1_8=$_POST['pod1_8'];
$proceso1_8=$_POST['proceso1_8'];
$Res1_8=$_POST['Res1_8'];
$clas1_8=$_POST['clas1_8'];
$especificacionPLG1_8=$_POST['especificacionPLG1_8'];
$evaluacion1_8=$_POST['evaluacion1_8'];
$tamaño1_8=$_POST['tamaño1_8'];
$fre1_8=$_POST['fre1_8'];
$metodoC1_8=$_POST['metodoC1_8'];
//9
$no1_9=$_POST['no1_9'];
$pod1_9=$_POST['pod1_9'];
$proceso1_9=$_POST['proceso1_9'];
$Res1_9=$_POST['Res1_9'];
$clas1_9=$_POST['clas1_9'];
$especificacionPLG1_9=$_POST['especificacionPLG1_9'];
$evaluacion1_9=$_POST['evaluacion1_9'];
$tamaño1_9=$_POST['tamaño1_9'];
$fre1_9=$_POST['fre1_9'];
$metodoC1_9=$_POST['metodoC1_9'];
//10
$no1_10=$_POST['no1_10'];
$pod1_10=$_POST['pod1_10'];
$proceso1_10=$_POST['proceso1_10'];
$Res1_10=$_POST['Res1_10'];
$clas1_10=$_POST['clas1_10'];
$especificacionPLG1_10=$_POST['especificacionPLG1_10'];
$evaluacion1_10=$_POST['evaluacion1_10'];
$tamaño1_10=$_POST['tamaño1_10'];
$fre1_10=$_POST['fre1_10'];
$metodoC1_10=$_POST['metodoC1_10'];
//11
$no1_11=$_POST['no1_11'];
$pod1_11=$_POST['pod1_11'];
$proceso1_11=$_POST['proceso1_11'];
$Res1_11=$_POST['Res1_11'];
$clas1_11=$_POST['clas1_11'];
$especificacionPLG1_11=$_POST['especificacionPLG1_11'];
$evaluacion1_11=$_POST['evaluacion1_11'];
$tamaño1_11=$_POST['tamaño1_11'];
$fre1_11=$_POST['fre1_11'];
$metodoC1_11=$_POST['metodoC1_11'];
//12
$no1_12=$_POST['no1_12'];
$pod1_12=$_POST['pod1_12'];
$proceso1_12=$_POST['proceso1_12'];
$Res1_12=$_POST['Res1_12'];
$clas1_12=$_POST['clas1_12'];
$especificacionPLG1_12=$_POST['especificacionPLG1_12'];
$evaluacion1_12=$_POST['evaluacion1_12'];
$tamaño1_12=$_POST['tamaño1_12'];
$fre1_12=$_POST['fre1_12'];
$metodoC1_12=$_POST['metodoC1_12'];
//13
$no1_13=$_POST['no1_13'];
$pod1_13=$_POST['pod1_13'];
$proceso1_13=$_POST['proceso1_13'];
$Res1_13=$_POST['Res1_13'];
$clas1_13=$_POST['clas1_13'];
$especificacionPLG1_13=$_POST['especificacionPLG1_13'];
$evaluacion1_13=$_POST['evaluacion1_13'];
$tamaño1_13=$_POST['tamaño1_13'];
$fre1_13=$_POST['fre1_13'];
$metodoC1_13=$_POST['metodoC1_13'];
//14
$no1_14=$_POST['no1_14'];
$pod1_14=$_POST['pod1_14'];
$proceso1_14=$_POST['proceso1_14'];
$Res1_14=$_POST['Res1_14'];
$clas1_14=$_POST['clas1_14'];
$especificacionPLG1_14=$_POST['especificacionPLG1_14'];
$evaluacion1_14=$_POST['evaluacion1_14'];
$tamaño1_14=$_POST['tamaño1_14'];
$fre1_14=$_POST['fre1_14'];
$metodoC1_14=$_POST['metodoC1_14'];
//15
$no1_15=$_POST['no1_15'];
$pod1_15=$_POST['pod1_15'];
$proceso1_15=$_POST['proceso1_15'];
$Res1_15=$_POST['Res1_15'];
$clas1_15=$_POST['clas1_15'];
$especificacionPLG1_15=$_POST['especificacionPLG1_15'];
$evaluacion1_15=$_POST['evaluacion1_15'];
$tamaño1_15=$_POST['tamaño1_15'];
$fre1_15=$_POST['fre1_15'];
$metodoC1_15=$_POST['metodoC1_15'];
//16
$no1_16=$_POST['no1_16'];
$pod1_16=$_POST['pod1_16'];
$proceso1_16=$_POST['proceso1_16'];
$Res1_16=$_POST['Res1_16'];
$clas1_16=$_POST['clas1_16'];
$especificacionPLG1_16=$_POST['especificacionPLG1_16'];
$evaluacion1_16=$_POST['evaluacion1_16'];
$tamaño1_16=$_POST['tamaño1_16'];
$fre1_16=$_POST['fre1_16'];
$metodoC1_16=$_POST['metodoC1_16'];
//17
$no1_17=$_POST['no1_17'];
$pod1_17=$_POST['pod1_17'];
$proceso1_17=$_POST['proceso1_17'];
$Res1_17=$_POST['Res1_17'];
$clas1_17=$_POST['clas1_17'];
$especificacionPLG1_17=$_POST['especificacionPLG1_17'];
$evaluacion1_17=$_POST['evaluacion1_17'];
$tamaño1_17=$_POST['tamaño1_17'];
$fre1_17=$_POST['fre1_17'];
$metodoC1_17=$_POST['metodoC1_17'];
//18
$no1_18=$_POST['no1_18'];
$pod1_18=$_POST['pod1_18'];
$proceso1_18=$_POST['proceso1_18'];
$Res1_18=$_POST['Res1_18'];
$clas1_18=$_POST['clas1_18'];
$especificacionPLG1_18=$_POST['especificacionPLG1_18'];
$evaluacion1_18=$_POST['evaluacion1_18'];
$tamaño1_18=$_POST['tamaño1_18'];
$fre1_18=$_POST['fre1_18'];
$metodoC1_18=$_POST['metodoC1_18'];
//19
$no1_19=$_POST['no1_19'];
$pod1_19=$_POST['pod1_19'];
$proceso1_19=$_POST['proceso1_19'];
$Res1_19=$_POST['Res1_19'];
$clas1_19=$_POST['clas1_19'];
$especificacionPLG1_19=$_POST['especificacionPLG1_19'];
$evaluacion1_19=$_POST['evaluacion1_19'];
$tamaño1_19=$_POST['tamaño1_19'];
$fre1_19=$_POST['fre1_19'];
$metodoC1_19=$_POST['metodoC1_19'];
//20
$no1_20=$_POST['no1_20'];
$pod1_20=$_POST['pod1_20'];
$proceso1_20=$_POST['proceso1_20'];
$Res1_20=$_POST['Res1_20'];
$clas1_20=$_POST['clas1_20'];
$especificacionPLG1_20=$_POST['especificacionPLG1_20'];
$evaluacion1_20=$_POST['evaluacion1_20'];
$tamaño1_20=$_POST['tamaño1_20'];
$fre1_20=$_POST['fre1_20'];
$metodoC1_20=$_POST['metodoC1_20'];

  $consulta = "SELECT  componente, noPartesP FROM descripcion1pc WHERE componente='$componente' AND noPartesP='$parte10'";
   $result = $conexion -> query($consulta);
   $filaD = $result  -> fetch_assoc();

   if ($filaD['noPartesP'] == FALSE ) {
     $consulta = "INSERT INTO descripcion1pc(componente, noPartesP, nombreProceso, dispositivo) VALUES ('$componente','$parte10','$nombreProceso','$dispositivo')";
         $result = $conexion -> query($consulta);
   }

   if ($filaD['noPartesP'] == TRUE ) {
     $consulta = "UPDATE descripcion1pc SET nombreProceso='$nombreProceso', dispositivo='$dispositivo' WHERE componente='$componente' AND noPartesP='$parte10'";
       $result = $conexion -> query($consulta);
    }

  $query2 = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre";
  $result2 = $conexion -> query($query2);
  $fila2 = $result2  -> fetch_assoc();

//MODIFICAR
while ($fila = $resultC  -> fetch_assoc()){
  if ($fila['no'] == 1) {
    $no = $_POST['no'];
    $producto = $_POST['producto'];
    $proceso = $_POST['proceso'];
    $responsable = $_POST['responsable'];
    $clasificacion = $_POST['clasificacion'];
    $especificacion = $_POST['especificacion'];
    $evaluacion = $_POST['evaluacion'];
    $tamanio = $_POST['tamanio'];
    $frecuencia = $_POST['frecuencia'];
    $metodoCap = $_POST['metodoCap'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto', proceso='$proceso', responsable='$responsable', clasificacion='$clasificacion' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion', evaluacion='$evaluacion', tamanio='$tamanio', frecuencia='$frecuencia', metodoCap='$metodoCap' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 2) {
    $no2 = $_POST['no2'];
    $producto2 = $_POST['producto2'];
    $proceso2 = $_POST['proceso2'];
    $responsable2 = $_POST['responsable2'];
    $clasificacion2 = $_POST['clasificacion2'];
    $especificacion2 = $_POST['especificacion2'];
    $evaluacion2 = $_POST['evaluacion2'];
    $tamanio2 = $_POST['tamanio2'];
    $frecuencia2 = $_POST['frecuencia2'];
    $metodoCap2 = $_POST['metodoCap2'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto2', proceso='$proceso2', responsable='$responsable2', clasificacion='$clasificacion2' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no2'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion2', evaluacion='$evaluacion2', tamanio='$tamanio2', frecuencia='$frecuencia2', metodoCap='$metodoCap2' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no2'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no']== 3) {

    $no3 = $_POST['no3'];
    $producto3 = $_POST['producto3'];
    $proceso3 = $_POST['proceso3'];
    $responsable3 = $_POST['responsable3'];
    $clasificacion3 = $_POST['clasificacion3'];
    $especificacion3 = $_POST['especificacion3'];
    $evaluacion3 = $_POST['evaluacion3'];
    $tamanio3 = $_POST['tamanio3'];
    $frecuencia3 = $_POST['frecuencia3'];
    $metodoCap3 = $_POST['metodoCap3'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto3', proceso='$proceso3', responsable='$responsable3', clasificacion='$clasificacion3' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no3'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion3', evaluacion='$evaluacion3', tamanio='$tamanio3', frecuencia='$frecuencia3', metodoCap='$metodoCap3' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no3'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 4) {

    $no4 = $_POST['no4'];
    $producto4 = $_POST['producto4'];
    $proceso4 = $_POST['proceso4'];
    $responsable4 = $_POST['responsable4'];
    $clasificacion4 = $_POST['clasificacion4'];
    $especificacion4 = $_POST['especificacion4'];
    $evaluacion4 = $_POST['evaluacion4'];
    $tamanio4 = $_POST['tamanio4'];
    $frecuencia4 = $_POST['frecuencia4'];
    $metodoCap4 = $_POST['metodoCap4'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto4', proceso='$proceso4', responsable='$responsable4', clasificacion='$clasificacion4' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no4'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion4', evaluacion='$evaluacion4', tamanio='$tamanio4', frecuencia='$frecuencia4', metodoCap='$metodoCap4' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no4'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 5) {
    $no5 = $_POST['no5'];
    $producto5 = $_POST['producto5'];
    $proceso5 = $_POST['proceso5'];
    $responsable5 = $_POST['responsable5'];
    $clasificacion5 = $_POST['clasificacion5'];
    $especificacion5 = $_POST['especificacion5'];
    $evaluacion5 = $_POST['evaluacion5'];
    $tamanio5 = $_POST['tamanio5'];
    $frecuencia5 = $_POST['frecuencia5'];
    $metodoCap5 = $_POST['metodoCap5'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto5', proceso='$proceso5', responsable='$responsable5', clasificacion='$clasificacion5' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no5'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion5', evaluacion='$evaluacion5', tamanio='$tamanio5', frecuencia='$frecuencia5', metodoCap='$metodoCap5' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no5'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 6) {
    $no6 = $_POST['no6'];
    $producto6 = $_POST['producto6'];
    $proceso6 = $_POST['proceso6'];
    $responsable6 = $_POST['responsable6'];
    $clasificacion6 = $_POST['clasificacion6'];
    $especificacion6 = $_POST['especificacion6'];
    $evaluacion6 = $_POST['evaluacion6'];
    $tamanio6 = $_POST['tamanio6'];
    $frecuencia6 = $_POST['frecuencia6'];
    $metodoCap6 = $_POST['metodoCap6'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto6', proceso='$proceso6', responsable='$responsable6', clasificacion='$clasificacion6' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no6'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion6', evaluacion='$evaluacion6', tamanio='$tamanio6', frecuencia='$frecuencia6', metodoCap='$metodoCap6' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no6'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 7) {
    $no7 = $_POST['no7'];
    $producto7 = $_POST['producto7'];
    $proceso7 = $_POST['proceso7'];
    $responsable7 = $_POST['responsable7'];
    $clasificacion7 = $_POST['clasificacion7'];
    $especificacion7 = $_POST['especificacion7'];
    $evaluacion7 = $_POST['evaluacion7'];
    $tamanio7 = $_POST['tamanio7'];
    $frecuencia7 = $_POST['frecuencia7'];
    $metodoCap7 = $_POST['metodoCap7'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto7', proceso='$proceso7', responsable='$responsable7', clasificacion='$clasificacion7' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no7'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion7', evaluacion='$evaluacion7', tamanio='$tamanio7', frecuencia='$frecuencia7', metodoCap='$metodoCap7' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no7'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 8) {
    $no8 = $_POST['no8'];
    $producto8 = $_POST['producto8'];
    $proceso8 = $_POST['proceso8'];
    $responsable8 = $_POST['responsable8'];
    $clasificacion8 = $_POST['clasificacion8'];
    $especificacion8 = $_POST['especificacion8'];
    $evaluacion8 = $_POST['evaluacion8'];
    $tamanio8 = $_POST['tamanio8'];
    $frecuencia8 = $_POST['frecuencia8'];
    $metodoCap8 = $_POST['metodoCap8'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto8', proceso='$proceso8', responsable='$responsable8', clasificacion='$clasificacion8' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no8'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion8', evaluacion='$evaluacion8', tamanio='$tamanio8', frecuencia='$frecuencia8', metodoCap='$metodoCap8' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no8'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 9) {
    $no9 = $_POST['no9'];
    $producto9 = $_POST['producto9'];
    $proceso9 = $_POST['proceso9'];
    $responsable9 = $_POST['responsable9'];
    $clasificacion9 = $_POST['clasificacion9'];
    $especificacion9 = $_POST['especificacion9'];
    $evaluacion9 = $_POST['evaluacion9'];
    $tamanio9 = $_POST['tamanio9'];
    $frecuencia9 = $_POST['frecuencia9'];
    $metodoCap9 = $_POST['metodoCap9'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto9', proceso='$proceso9', responsable='$responsable9', clasificacion='$clasificacion9' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no9'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion9', evaluacion='$evaluacion9', tamanio='$tamanio9', frecuencia='$frecuencia9', metodoCap='$metodoCap9' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no9'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 10) {
    $no10 = $_POST['no10'];
    $producto10 = $_POST['producto10'];
    $proceso10 = $_POST['proceso10'];
    $responsable10 = $_POST['responsable10'];
    $clasificacion10 = $_POST['clasificacion10'];
    $especificacion10 = $_POST['especificacion10'];
    $evaluacion10 = $_POST['evaluacion10'];
    $tamanio10 = $_POST['tamanio10'];
    $frecuencia10 = $_POST['frecuencia10'];
    $metodoCap10 = $_POST['metodoCap10'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto10', proceso='$proceso10', responsable='$responsable10', clasificacion='$clasificacion10' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no10'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion10', evaluacion='$evaluacion10', tamanio='$tamanio10', frecuencia='$frecuencia10', metodoCap='$metodoCap10' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no10'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 11) {
    $no11 = $_POST['no11'];
    $producto11 = $_POST['producto11'];
    $proceso11 = $_POST['proceso11'];
    $responsable11 = $_POST['responsable11'];
    $clasificacion11 = $_POST['clasificacion11'];
    $especificacion11 = $_POST['especificacion11'];
    $evaluacion11 = $_POST['evaluacion11'];
    $tamanio11 = $_POST['tamanio11'];
    $frecuencia11 = $_POST['frecuencia11'];
    $metodoCap11 = $_POST['metodoCap11'];


    $consulta = "UPDATE descripcion2pc SET producto='$producto11', proceso='$proceso11', responsable='$responsable11', clasificacion='$clasificacion11' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no11'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion11', evaluacion='$evaluacion11', tamanio='$tamanio11', frecuencia='$frecuencia11', metodoCap='$metodoCap11' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no11'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 12) {
    $no12 = $_POST['no12'];
    $producto12 = $_POST['producto12'];
    $proceso12 = $_POST['proceso12'];
    $responsable12 = $_POST['responsable12'];
    $clasificacion12 = $_POST['clasificacion12'];
    $especificacion12 = $_POST['especificacion12'];
    $evaluacion12 = $_POST['evaluacion12'];
    $tamanio12 = $_POST['tamanio12'];
    $frecuencia12 = $_POST['frecuencia12'];
    $metodoCap12 = $_POST['metodoCap12'];


    $consulta = "UPDATE descripcion2pc SET producto='$producto12', proceso='$proceso12', responsable='$responsable12', clasificacion='$clasificacion12' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no12'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion12', evaluacion='$evaluacion12', tamanio='$tamanio12', frecuencia='$frecuencia12', metodoCap='$metodoCap12' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no12'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 13) {
    $no13 = $_POST['no13'];
    $producto13 = $_POST['producto13'];
    $proceso13 = $_POST['proceso13'];
    $responsable13 = $_POST['responsable13'];
    $clasificacion13 = $_POST['clasificacion13'];
    $especificacion13 = $_POST['especificacion13'];
    $evaluacion13 = $_POST['evaluacion13'];
    $tamanio13 = $_POST['tamanio13'];
    $frecuencia13 = $_POST['frecuencia13'];
    $metodoCap13 = $_POST['metodoCap13'];


    $consulta = "UPDATE descripcion2pc SET producto='$producto13', proceso='$proceso13', responsable='$responsable13', clasificacion='$clasificacion13' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no13'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion13', evaluacion='$evaluacion13', tamanio='$tamanio13', frecuencia='$frecuencia13', metodoCap='$metodoCap13' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no13'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 14) {
    $no14 = $_POST['no14'];
    $producto14 = $_POST['producto14'];
    $proceso14 = $_POST['proceso14'];
    $responsable14 = $_POST['responsable14'];
    $clasificacion14 = $_POST['clasificacion14'];
    $especificacion14 = $_POST['especificacion14'];
    $evaluacion14 = $_POST['evaluacion14'];
    $tamanio14 = $_POST['tamanio14'];
    $frecuencia14 = $_POST['frecuencia14'];
    $metodoCap14 = $_POST['metodoCap14'];


    $consulta = "UPDATE descripcion2pc SET producto='$producto14', proceso='$proceso14', responsable='$responsable14', clasificacion='$clasificacion14' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no14'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion14', evaluacion='$evaluacion14', tamanio='$tamanio14', frecuencia='$frecuencia14', metodoCap='$metodoCap14' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no14'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 15) {
    $no15 = $_POST['no15'];
    $producto15 = $_POST['producto15'];
    $proceso15 = $_POST['proceso15'];
    $responsable15 = $_POST['responsable15'];
    $clasificacion15 = $_POST['clasificacion15'];
    $especificacion15 = $_POST['especificacion15'];
    $evaluacion15 = $_POST['evaluacion15'];
    $tamanio15 = $_POST['tamanio15'];
    $frecuencia15 = $_POST['frecuencia15'];
    $metodoCap15 = $_POST['metodoCap15'];


    $consulta = "UPDATE descripcion2pc SET producto='$producto15', proceso='$proceso15', responsable='$responsable15', clasificacion='$clasificacion15' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no15'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion15', evaluacion='$evaluacion15', tamanio='$tamanio15', frecuencia='$frecuencia15', metodoCap='$metodoCap15' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no15'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 16) {
    $no16 = $_POST['no16'];
    $producto16 = $_POST['producto16'];
    $proceso16 = $_POST['proceso16'];
    $responsable16 = $_POST['responsable16'];
    $clasificacion16 = $_POST['clasificacion16'];
    $especificacion16 = $_POST['especificacion16'];
    $evaluacion16 = $_POST['evaluacion16'];
    $tamanio16 = $_POST['tamanio16'];
    $frecuencia16 = $_POST['frecuencia16'];
    $metodoCap16 = $_POST['metodoCap16'];


    $consulta = "UPDATE descripcion2pc SET producto='$producto16', proceso='$proceso16', responsable='$responsable16', clasificacion='$clasificacion16' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no16'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion16', evaluacion='$evaluacion16', tamanio='$tamanio16', frecuencia='$frecuencia16', metodoCap='$metodoCap16' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no16'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no']== 17) {
    $no17 = $_POST['no17'];
    $producto17 = $_POST['producto17'];
    $proceso17 = $_POST['proceso17'];
    $responsable17 = $_POST['responsable17'];
    $clasificacion17 = $_POST['clasificacion17'];
    $especificacion17 = $_POST['especificacion17'];
    $evaluacion17 = $_POST['evaluacion17'];
    $tamanio17 = $_POST['tamanio17'];
    $frecuencia17 = $_POST['frecuencia17'];
    $metodoCap17 = $_POST['metodoCap17'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto17', proceso='$proceso17', responsable='$responsable17', clasificacion='$clasificacion17' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no17'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion17', evaluacion='$evaluacion17', tamanio='$tamanio17', frecuencia='$frecuencia17', metodoCap='$metodoCap17' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no17'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 18) {
    $no18 = $_POST['no18'];
    $producto18 = $_POST['producto18'];
    $proceso18 = $_POST['proceso18'];
    $responsable18 = $_POST['responsable18'];
    $clasificacion18 = $_POST['clasificacion18'];
    $especificacion18 = $_POST['especificacion18'];
    $evaluacion18 = $_POST['evaluacion18'];
    $tamanio18 = $_POST['tamanio18'];
    $frecuencia18 = $_POST['frecuencia18'];
    $metodoCap18 = $_POST['metodoCap18'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto18', proceso='$proceso18', responsable='$responsable18', clasificacion='$clasificacion18' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no18'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion18', evaluacion='$evaluacion18', tamanio='$tamanio18', frecuencia='$frecuencia18', metodoCap='$metodoCap18' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no18'";
      $result2 = $conexion -> query($consulta2);

  }
  if ($fila['no'] == 19) {
    $no19 = $_POST['no19'];
    $producto19 = $_POST['producto19'];
    $proceso19 = $_POST['proceso19'];
    $responsable19 = $_POST['responsable19'];
    $clasificacion19 = $_POST['clasificacion19'];
    $especificacion19 = $_POST['especificacion19'];
    $evaluacion19 = $_POST['evaluacion19'];
    $tamanio19 = $_POST['tamanio19'];
    $frecuencia19 = $_POST['frecuencia19'];
    $metodoCap19 = $_POST['metodoCap19'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto19', proceso='$proceso19', responsable='$responsable19', clasificacion='$clasificacion19' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no19'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion19', evaluacion='$evaluacion19', tamanio='$tamanio19', frecuencia='$frecuencia19', metodoCap='$metodoCap19' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no19'";
      $result2 = $conexion -> query($consulta2);


  }
  if ($fila['no'] == 20) {
    $no20 = $_POST['no20'];
    $producto20 = $_POST['producto20'];
    $proceso20 = $_POST['proceso20'];
    $responsable20 = $_POST['responsable20'];
    $clasificacion20 = $_POST['clasificacion20'];
    $especificacion20 = $_POST['especificacion20'];
    $evaluacion20 = $_POST['evaluacion20'];
    $tamanio20 = $_POST['tamanio20'];
    $frecuencia20 = $_POST['frecuencia20'];
    $metodoCap20 = $_POST['metodoCap20'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto20', proceso='$proceso20', responsable='$responsable20', clasificacion='$clasificacion20' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no20'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion20', evaluacion='$evaluacion20', tamanio='$tamanio20', frecuencia='$frecuencia20', metodoCap='$metodoCap20' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no20'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 21) {
    $no21 = $_POST['no21'];
    $producto21 = $_POST['producto21'];
    $proceso21 = $_POST['proceso21'];
    $responsable21 = $_POST['responsable21'];
    $clasificacion21 = $_POST['clasificacion21'];
    $especificacion21 = $_POST['especificacion21'];
    $evaluacion21 = $_POST['evaluacion21'];
    $tamanio21 = $_POST['tamanio21'];
    $frecuencia21 = $_POST['frecuencia21'];
    $metodoCap21 = $_POST['metodoCap21'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto21', proceso='$proceso21', responsable='$responsable21', clasificacion='$clasificacion21' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no21'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion21', evaluacion='$evaluacion21', tamanio='$tamanio21', frecuencia='$frecuencia21', metodoCap='$metodoCap21' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no21'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 22) {
    $no22 = $_POST['no22'];
    $producto22 = $_POST['producto22'];
    $proceso22 = $_POST['proceso22'];
    $responsable22 = $_POST['responsable22'];
    $clasificacion22 = $_POST['clasificacion22'];
    $especificacion22 = $_POST['especificacion22'];
    $evaluacion22 = $_POST['evaluacion22'];
    $tamanio22 = $_POST['tamanio22'];
    $frecuencia22 = $_POST['frecuencia22'];
    $metodoCap22 = $_POST['metodoCap22'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto22', proceso='$proceso22', responsable='$responsable22', clasificacion='$clasificacion22' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no22'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion22', evaluacion='$evaluacion22', tamanio='$tamanio22', frecuencia='$frecuencia22', metodoCap='$metodoCap22' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no22'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 23) {
    $no23 = $_POST['no23'];
    $producto23 = $_POST['producto23'];
    $proceso23 = $_POST['proceso23'];
    $responsable23 = $_POST['responsable23'];
    $clasificacion23 = $_POST['clasificacion23'];
    $especificacion23 = $_POST['especificacion23'];
    $evaluacion23 = $_POST['evaluacion23'];
    $tamanio23 = $_POST['tamanio23'];
    $frecuencia23 = $_POST['frecuencia23'];
    $metodoCap23 = $_POST['metodoCap23'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto23', proceso='$proceso23', responsable='$responsable23', clasificacion='$clasificacion23' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no23'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion23', evaluacion='$evaluacion23', tamanio='$tamanio23', frecuencia='$frecuencia23', metodoCap='$metodoCap23' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no23'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 24) {
    $no24 = $_POST['no24'];
    $producto24 = $_POST['producto24'];
    $proceso24 = $_POST['proceso24'];
    $responsable24 = $_POST['responsable24'];
    $clasificacion24 = $_POST['clasificacion24'];
    $especificacion24 = $_POST['especificacion24'];
    $evaluacion24 = $_POST['evaluacion24'];
    $tamanio24 = $_POST['tamanio24'];
    $frecuencia24 = $_POST['frecuencia24'];
    $metodoCap24 = $_POST['metodoCap24'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto24', proceso='$proceso24', responsable='$responsable24', clasificacion='$clasificacion24' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no24'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion24', evaluacion='$evaluacion24', tamanio='$tamanio24', frecuencia='$frecuencia24', metodoCap='$metodoCap24' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no24'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 25) {
    $no25 = $_POST['no25'];
    $producto25 = $_POST['producto25'];
    $proceso25 = $_POST['proceso25'];
    $responsable25 = $_POST['responsable25'];
    $clasificacion25 = $_POST['clasificacion25'];
    $especificacion25 = $_POST['especificacion25'];
    $evaluacion25 = $_POST['evaluacion25'];
    $tamanio25 = $_POST['tamanio25'];
    $frecuencia25 = $_POST['frecuencia25'];
    $metodoCap25 = $_POST['metodoCap25'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto25', proceso='$proceso25', responsable='$responsable25', clasificacion='$clasificacion25' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no25'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion25', evaluacion='$evaluacion25', tamanio='$tamanio25', frecuencia='$frecuencia25', metodoCap='$metodoCap25' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no25'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 26) {
    $no26 = $_POST['no26'];
    $producto26 = $_POST['producto26'];
    $proceso26 = $_POST['proceso26'];
    $responsable26 = $_POST['responsable26'];
    $clasificacion26 = $_POST['clasificacion26'];
    $especificacion26 = $_POST['especificacion26'];
    $evaluacion26 = $_POST['evaluacion26'];
    $tamanio26 = $_POST['tamanio26'];
    $frecuencia26 = $_POST['frecuencia26'];
    $metodoCap26 = $_POST['metodoCap26'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto26', proceso='$proceso26', responsable='$responsable26', clasificacion='$clasificacion26' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no26'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion26', evaluacion='$evaluacion26', tamanio='$tamanio26', frecuencia='$frecuencia26', metodoCap='$metodoCap26' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no26'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 27) {
    $no27 = $_POST['no27'];
    $producto27 = $_POST['producto27'];
    $proceso27 = $_POST['proceso27'];
    $responsable27 = $_POST['responsable27'];
    $clasificacion27 = $_POST['clasificacion27'];
    $especificacion27 = $_POST['especificacion27'];
    $evaluacion27 = $_POST['evaluacion27'];
    $tamanio27 = $_POST['tamanio27'];
    $frecuencia27 = $_POST['frecuencia27'];
    $metodoCap27 = $_POST['metodoCap27'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto27', proceso='$proceso27', responsable='$responsable27', clasificacion='$clasificacion27' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no27'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion27', evaluacion='$evaluacion27', tamanio='$tamanio27', frecuencia='$frecuencia27', metodoCap='$metodoCap27' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no27'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 28) {
    $no28 = $_POST['no28'];
    $producto28 = $_POST['producto28'];
    $proceso28 = $_POST['proceso28'];
    $responsable28 = $_POST['responsable28'];
    $clasificacion28 = $_POST['clasificacion28'];
    $especificacion28 = $_POST['especificacion28'];
    $evaluacion28 = $_POST['evaluacion28'];
    $tamanio28 = $_POST['tamanio28'];
    $frecuencia28 = $_POST['frecuencia28'];
    $metodoCap28 = $_POST['metodoCap28'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto28', proceso='$proceso28', responsable='$responsable28', clasificacion='$clasificacion28' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no28'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion28', evaluacion='$evaluacion28', tamanio='$tamanio28', frecuencia='$frecuencia28', metodoCap='$metodoCap28' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no28'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 29) {
    $no29 = $_POST['no29'];
    $producto29 = $_POST['producto29'];
    $proceso29 = $_POST['proceso29'];
    $responsable29 = $_POST['responsable29'];
    $clasificacion29 = $_POST['clasificacion29'];
    $especificacion29 = $_POST['especificacion29'];
    $evaluacion29 = $_POST['evaluacion29'];
    $tamanio29 = $_POST['tamanio29'];
    $frecuencia29 = $_POST['frecuencia29'];
    $metodoCap29 = $_POST['metodoCap29'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto29', proceso='$proceso29', responsable='$responsable29', clasificacion='$clasificacion29' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no29'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion29', evaluacion='$evaluacion29', tamanio='$tamanio29', frecuencia='$frecuencia29', metodoCap='$metodoCap29' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no29'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 30) {
    $no30 = $_POST['no30'];
    $producto30 = $_POST['producto30'];
    $proceso30 = $_POST['proceso30'];
    $responsable30 = $_POST['responsable30'];
    $clasificacion30 = $_POST['clasificacion30'];
    $especificacion30 = $_POST['especificacion30'];
    $evaluacion30 = $_POST['evaluacion30'];
    $tamanio30 = $_POST['tamanio30'];
    $frecuencia30 = $_POST['frecuencia30'];
    $metodoCap30 = $_POST['metodoCap30'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto30', proceso='$proceso30', responsable='$responsable30', clasificacion='$clasificacion30' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no30'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion30', evaluacion='$evaluacion30', tamanio='$tamanio30', frecuencia='$frecuencia30', metodoCap='$metodoCap30' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no30'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 31) {
    $no31 = $_POST['no31'];
    $producto31 = $_POST['producto31'];
    $proceso31 = $_POST['proceso31'];
    $responsable31 = $_POST['responsable31'];
    $clasificacion31 = $_POST['clasificacion31'];
    $especificacion31 = $_POST['especificacion31'];
    $evaluacion31 = $_POST['evaluacion31'];
    $tamanio31 = $_POST['tamanio31'];
    $frecuencia31 = $_POST['frecuencia31'];
    $metodoCap31 = $_POST['metodoCap31'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto31', proceso='$proceso31', responsable='$responsable31', clasificacion='$clasificacion31' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no31'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion31', evaluacion='$evaluacion31', tamanio='$tamanio31', frecuencia='$frecuencia31', metodoCap='$metodoCap31' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no31'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 32) {
    $no32 = $_POST['no32'];
    $producto32 = $_POST['producto32'];
    $proceso32 = $_POST['proceso32'];
    $responsable32 = $_POST['responsable32'];
    $clasificacion32 = $_POST['clasificacion32'];
    $especificacion32 = $_POST['especificacion32'];
    $evaluacion32 = $_POST['evaluacion32'];
    $tamanio32 = $_POST['tamanio32'];
    $frecuencia32 = $_POST['frecuencia32'];
    $metodoCap32 = $_POST['metodoCap32'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto32', proceso='$proceso32', responsable='$responsable32', clasificacion='$clasificacion32' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no32'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion32', evaluacion='$evaluacion32', tamanio='$tamanio32', frecuencia='$frecuencia32', metodoCap='$metodoCap32' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no32'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 33) {
    $no33 = $_POST['no33'];
    $producto33 = $_POST['producto33'];
    $proceso33 = $_POST['proceso33'];
    $responsable33 = $_POST['responsable33'];
    $clasificacion33 = $_POST['clasificacion33'];
    $especificacion33 = $_POST['especificacion33'];
    $evaluacion33 = $_POST['evaluacion33'];
    $tamanio33 = $_POST['tamanio33'];
    $frecuencia33 = $_POST['frecuencia33'];
    $metodoCap33 = $_POST['metodoCap33'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto33', proceso='$proceso33', responsable='$responsable33', clasificacion='$clasificacion33' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no33'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion33', evaluacion='$evaluacion33', tamanio='$tamanio33', frecuencia='$frecuencia33', metodoCap='$metodoCap33' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no33'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 34) {
    $no34 = $_POST['no34'];
    $producto34 = $_POST['producto34'];
    $proceso34 = $_POST['proceso34'];
    $responsable34 = $_POST['responsable34'];
    $clasificacion34 = $_POST['clasificacion34'];
    $especificacion34 = $_POST['especificacion34'];
    $evaluacion34 = $_POST['evaluacion34'];
    $tamanio34 = $_POST['tamanio34'];
    $frecuencia34 = $_POST['frecuencia34'];
    $metodoCap34 = $_POST['metodoCap34'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto34', proceso='$proceso34', responsable='$responsable34', clasificacion='$clasificacion34' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no34'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion34', evaluacion='$evaluacion34', tamanio='$tamanio34', frecuencia='$frecuencia34', metodoCap='$metodoCap34' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no34'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 35) {
    $no35 = $_POST['no35'];
    $producto35 = $_POST['producto35'];
    $proceso35 = $_POST['proceso35'];
    $responsable35 = $_POST['responsable35'];
    $clasificacion35 = $_POST['clasificacion35'];
    $especificacion35 = $_POST['especificacion35'];
    $evaluacion35 = $_POST['evaluacion35'];
    $tamanio35 = $_POST['tamanio35'];
    $frecuencia35 = $_POST['frecuencia35'];
    $metodoCap35 = $_POST['metodoCap35'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto35', proceso='$proceso35', responsable='$responsable35', clasificacion='$clasificacion35' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no35'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion35', evaluacion='$evaluacion35', tamanio='$tamanio35', frecuencia='$frecuencia35', metodoCap='$metodoCap35' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no35'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 36) {
    $no36 = $_POST['no36'];
    $producto36 = $_POST['producto36'];
    $proceso36 = $_POST['proceso36'];
    $responsable36 = $_POST['responsable36'];
    $clasificacion36 = $_POST['clasificacion36'];
    $especificacion36 = $_POST['especificacion36'];
    $evaluacion36 = $_POST['evaluacion36'];
    $tamanio36 = $_POST['tamanio36'];
    $frecuencia36 = $_POST['frecuencia36'];
    $metodoCap36 = $_POST['metodoCap36'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto36', proceso='$proceso36', responsable='$responsable36', clasificacion='$clasificacion36' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no36'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion36', evaluacion='$evaluacion36', tamanio='$tamanio36', frecuencia='$frecuencia36', metodoCap='$metodoCap36' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no36'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 37) {
    $no37 = $_POST['no37'];
    $producto37 = $_POST['producto37'];
    $proceso37 = $_POST['proceso37'];
    $responsable37 = $_POST['responsable37'];
    $clasificacion37 = $_POST['clasificacion37'];
    $especificacion37 = $_POST['especificacion37'];
    $evaluacion37 = $_POST['evaluacion37'];
    $tamanio37 = $_POST['tamanio37'];
    $frecuencia37 = $_POST['frecuencia37'];
    $metodoCap37 = $_POST['metodoCap37'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto37', proceso='$proceso37', responsable='$responsable37', clasificacion='$clasificacion37' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no37'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion37', evaluacion='$evaluacion37', tamanio='$tamanio37', frecuencia='$frecuencia37', metodoCap='$metodoCap37' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no37'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 38) {
    $no38 = $_POST['no38'];
    $producto38 = $_POST['producto38'];
    $proceso38 = $_POST['proceso38'];
    $responsable38 = $_POST['responsable38'];
    $clasificacion38 = $_POST['clasificacion38'];
    $especificacion38 = $_POST['especificacion38'];
    $evaluacion38 = $_POST['evaluacion38'];
    $tamanio38 = $_POST['tamanio38'];
    $frecuencia38 = $_POST['frecuencia38'];
    $metodoCap38 = $_POST['metodoCap38'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto38', proceso='$proceso38', responsable='$responsable38', clasificacion='$clasificacion38' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no38'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion38', evaluacion='$evaluacion38', tamanio='$tamanio38', frecuencia='$frecuencia38', metodoCap='$metodoCap38' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no38'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 39) {
    $no39 = $_POST['no39'];
    $producto39 = $_POST['producto39'];
    $proceso39 = $_POST['proceso39'];
    $responsable39 = $_POST['responsable39'];
    $clasificacion39 = $_POST['clasificacion39'];
    $especificacion39 = $_POST['especificacion39'];
    $evaluacion39 = $_POST['evaluacion39'];
    $tamanio39 = $_POST['tamanio39'];
    $frecuencia39 = $_POST['frecuencia39'];
    $metodoCap39 = $_POST['metodoCap39'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto39', proceso='$proceso39', responsable='$responsable39', clasificacion='$clasificacion39' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no39'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion39', evaluacion='$evaluacion39', tamanio='$tamanio39', frecuencia='$frecuencia39', metodoCap='$metodoCap39' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no39'";
      $result2 = $conexion -> query($consulta2);
  }
  if ($fila['no'] == 40) {
    $no40 = $_POST['no40'];
    $producto40 = $_POST['producto40'];
    $proceso40 = $_POST['proceso40'];
    $responsable40 = $_POST['responsable40'];
    $clasificacion40 = $_POST['clasificacion40'];
    $especificacion40 = $_POST['especificacion40'];
    $evaluacion40 = $_POST['evaluacion40'];
    $tamanio40 = $_POST['tamanio40'];
    $frecuencia40 = $_POST['frecuencia40'];
    $metodoCap40 = $_POST['metodoCap40'];

    $consulta = "UPDATE descripcion2pc SET producto='$producto40', proceso='$proceso40', responsable='$responsable40', clasificacion='$clasificacion40' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no40'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE descripcion3pc SET especificacion='$especificacion40', evaluacion='$evaluacion40', tamanio='$tamanio40', frecuencia='$frecuencia40', metodoCap='$metodoCap40' WHERE componente='$componente' AND noPartesP='$parte10' AND no='$no40'";
      $result2 = $conexion -> query($consulta2);
  }

}
  //descripcion2pc

  if ($noC10_1 == 1) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 2) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);



  }elseif ($noC10_1 == 3) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 4) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 5) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 6) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 7) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 8) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 9) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 10) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 11) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 12) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 13) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 14) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_14','$pod1_14','$proceso1_14','$Res1_14','$clas1_14')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_14','$especificacionPLG1_14','$evaluacion1_14','$tamaño1_14','$fre1_14','$metodoC1_14')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 15) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_14','$pod1_14','$proceso1_14','$Res1_14','$clas1_14')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_14','$especificacionPLG1_14','$evaluacion1_14','$tamaño1_14','$fre1_14','$metodoC1_14')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_15','$pod1_15','$proceso1_15','$Res1_15','$clas1_15')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_15','$especificacionPLG1_15','$evaluacion1_15','$tamaño1_15','$fre1_15','$metodoC1_15')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 16) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_14','$pod1_14','$proceso1_14','$Res1_14','$clas1_14')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_14','$especificacionPLG1_14','$evaluacion1_14','$tamaño1_14','$fre1_14','$metodoC1_14')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_15','$pod1_15','$proceso1_15','$Res1_15','$clas1_15')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_15','$especificacionPLG1_15','$evaluacion1_15','$tamaño1_15','$fre1_15','$metodoC1_15')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_16','$pod1_16','$proceso1_16','$Res1_16','$clas1_16')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_16','$especificacionPLG1_16','$evaluacion1_16','$tamaño1_16','$fre1_16','$metodoC1_16')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 17) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_14','$pod1_14','$proceso1_14','$Res1_14','$clas1_14')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_14','$especificacionPLG1_14','$evaluacion1_14','$tamaño1_14','$fre1_14','$metodoC1_14')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_15','$pod1_15','$proceso1_15','$Res1_15','$clas1_15')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_15','$especificacionPLG1_15','$evaluacion1_15','$tamaño1_15','$fre1_15','$metodoC1_15')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_16','$pod1_16','$proceso1_16','$Res1_16','$clas1_16')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_16','$especificacionPLG1_16','$evaluacion1_16','$tamaño1_16','$fre1_16','$metodoC1_16')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_17','$pod1_17','$proceso1_17','$Res1_17','$clas1_17')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_17','$especificacionPLG1_17','$evaluacion1_17','$tamaño1_17','$fre1_17','$metodoC1_17')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 18) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_14','$pod1_14','$proceso1_14','$Res1_14','$clas1_14')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_14','$especificacionPLG1_14','$evaluacion1_14','$tamaño1_14','$fre1_14','$metodoC1_14')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_15','$pod1_15','$proceso1_15','$Res1_15','$clas1_15')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_15','$especificacionPLG1_15','$evaluacion1_15','$tamaño1_15','$fre1_15','$metodoC1_15')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_16','$pod1_16','$proceso1_16','$Res1_16','$clas1_16')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_16','$especificacionPLG1_16','$evaluacion1_16','$tamaño1_16','$fre1_16','$metodoC1_16')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_17','$pod1_17','$proceso1_17','$Res1_17','$clas1_17')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_17','$especificacionPLG1_17','$evaluacion1_17','$tamaño1_17','$fre1_17','$metodoC1_17')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_18','$pod1_18','$proceso1_18','$Res1_18','$clas1_18')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_18','$especificacionPLG1_18','$evaluacion1_18','$tamaño1_18','$fre1_18','$metodoC1_18')";
      $result2 = $conexion -> query($consulta2);

  }elseif ($noC10_1 == 19) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_14','$pod1_14','$proceso1_14','$Res1_14','$clas1_14')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_14','$especificacionPLG1_14','$evaluacion1_14','$tamaño1_14','$fre1_14','$metodoC1_14')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_15','$pod1_15','$proceso1_15','$Res1_15','$clas1_15')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_15','$especificacionPLG1_15','$evaluacion1_15','$tamaño1_15','$fre1_15','$metodoC1_15')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_16','$pod1_16','$proceso1_16','$Res1_16','$clas1_16')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_16','$especificacionPLG1_16','$evaluacion1_16','$tamaño1_16','$fre1_16','$metodoC1_16')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_17','$pod1_17','$proceso1_17','$Res1_17','$clas1_17')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_17','$especificacionPLG1_17','$evaluacion1_17','$tamaño1_17','$fre1_17','$metodoC1_17')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_18','$pod1_18','$proceso1_18','$Res1_18','$clas1_18')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_18','$especificacionPLG1_18','$evaluacion1_18','$tamaño1_18','$fre1_18','$metodoC1_18')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_19','$pod1_19','$proceso1_19','$Res1_19','$clas1_19')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_19','$especificacionPLG1_19','$evaluacion1_19','$tamaño1_19','$fre1_19','$metodoC1_19')";
      $result2 = $conexion -> query($consulta2);


  }elseif ($noC10_1 == 20) {

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_1','$pod1_1','$proceso1_1','$Res1_1','$clas1_1')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_1','$especificacionPLG1_1','$evaluacion1_1','$tamaño1_1','$fre1_1','$metodoC1_1')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_2','$pod1_2','$proceso1_2','$Res1_2','$clas1_2')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_2','$especificacionPLG1_2','$evaluacion1_2','$tamaño1_2','$fre1_2','$metodoC1_2')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_3','$pod1_3','$proceso1_3','$Res1_3','$clas1_3')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_3','$especificacionPLG1_3','$evaluacion1_3','$tamaño1_3','$fre1_3','$metodoC1_3')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_4','$pod1_4','$proceso1_4','$Res1_4','$clas1_4')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_4','$especificacionPLG1_4','$evaluacion1_4','$tamaño1_4','$fre1_4','$metodoC1_4')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_5','$pod1_5','$proceso1_5','$Res1_5','$clas1_5')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_5','$especificacionPLG1_5','$evaluacion1_5','$tamaño1_5','$fre1_5','$metodoC1_5')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_6','$pod1_6','$proceso1_6','$Res1_6','$clas1_6')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_6','$especificacionPLG1_6','$evaluacion1_6','$tamaño1_6','$fre1_6','$metodoC1_6')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_7','$pod1_7','$proceso1_7','$Res1_7','$clas1_7')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_7','$especificacionPLG1_7','$evaluacion1_7','$tamaño1_7','$fre1_7','$metodoC1_7')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_8','$pod1_8','$proceso1_8','$Res1_8','$clas1_8')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_8','$especificacionPLG1_8','$evaluacion1_8','$tamaño1_8','$fre1_8','$metodoC1_8')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_9','$pod1_9','$proceso1_9','$Res1_8','$clas1_9')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_9','$especificacionPLG1_9','$evaluacion1_9','$tamaño1_9','$fre1_9','$metodoC1_9')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_10','$pod1_10','$proceso1_10','$Res1_10','$clas1_10')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_10','$especificacionPLG1_10','$evaluacion1_10','$tamaño1_10','$fre1_10','$metodoC1_10')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_11','$pod1_11','$proceso1_11','$Res1_11','$clas1_11')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_11','$especificacionPLG1_11','$evaluacion1_11','$tamaño1_11','$fre1_11','$metodoC1_11')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_12','$pod1_12','$proceso1_12','$Res1_12','$clas1_12')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_12','$especificacionPLG1_12','$evaluacion1_12','$tamaño1_12','$fre1_12','$metodoC1_12')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_13','$pod1_13','$proceso1_13','$Res1_13','$clas1_13')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_13','$especificacionPLG1_13','$evaluacion1_13','$tamaño1_13','$fre1_13','$metodoC1_13')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_14','$pod1_14','$proceso1_14','$Res1_14','$clas1_14')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_14','$especificacionPLG1_14','$evaluacion1_14','$tamaño1_14','$fre1_14','$metodoC1_14')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_15','$pod1_15','$proceso1_15','$Res1_15','$clas1_15')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_15','$especificacionPLG1_15','$evaluacion1_15','$tamaño1_15','$fre1_15','$metodoC1_15')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_16','$pod1_16','$proceso1_16','$Res1_16','$clas1_16')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_16','$especificacionPLG1_16','$evaluacion1_16','$tamaño1_16','$fre1_16','$metodoC1_16')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_17','$pod1_17','$proceso1_17','$Res1_17','$clas1_17')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_17','$especificacionPLG1_17','$evaluacion1_17','$tamaño1_17','$fre1_17','$metodoC1_17')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_18','$pod1_18','$proceso1_18','$Res1_18','$clas1_18')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_18','$especificacionPLG1_18','$evaluacion1_18','$tamaño1_18','$fre1_18','$metodoC1_18')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_19','$pod1_19','$proceso1_19','$Res1_19','$clas1_19')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_19','$especificacionPLG1_19','$evaluacion1_19','$tamaño1_19','$fre1_19','$metodoC1_19')";
      $result2 = $conexion -> query($consulta2);

    $consulta = "INSERT INTO descripcion2pc(componente,noPartesP,no,producto,proceso,responsable,clasificacion) VALUES('$componente','$parte10','$no1_20','$pod1_20','$proceso1_20','$Res1_20','$clas1_20')";
      $result = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO descripcion3pc(componente,noPartesP,no,especificacion,evaluacion,tamanio,frecuencia,metodoCap) VALUES('$componente','$parte10','$no1_20','$especificacionPLG1_20','$evaluacion1_20','$tamaño1_20','$fre1_20','$metodoC1_20')";
      $result2 = $conexion -> query($consulta2);

  }

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR PC CAMB. PARTES M.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">

     <center><h1>Datos Guardados<h1>
      <form action='GenerarPCM.php' method='post'>
          <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button> <br><br>
            <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#AED6F1;  border-color:#AED6F1; border-style:solid; color:#AED6F1; ">
      </form>
   </body>
 </html>
