
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
$componente=$_POST['componente'];

//Descripcion 0010
$parte10 =$_POST['parte10'];
$NomProceso10_1 = $_POST['NomProceso10_1'];
$dispositivo10_1 = $_POST['dispositivo10_1'];

$noC10_1=$_POST['noC10_1'];
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

$queryP = "SELECT * FROM descripcion1pc, descripcion2pc,descripcion3pc WHERE descripcion1pc.componente = '$componente' AND descripcion2pc.componente = '$componente' AND descripcion3pc.componente = '$componente'";
$resultP = $conexion -> query($queryP);

$query = "SELECT componente_CA FROM consumoyantecedentes WHERE componente_CA='$componente'";
$result = $conexion -> query($query);

$query2 = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre";
$result2 = $conexion -> query($query2);
$fila2 = $result2  -> fetch_assoc();
if ($resultP -> num_rows == 0) {
//0010
  $consulta = "INSERT INTO descripcion1pc(componente,noPartesP,nombreProceso,dispositivo) VALUES('$componente','$parte10','$NomProceso10_1','$dispositivo10_1')";
  $result = $conexion -> query($consulta);


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
}


      ?>
      <!DOCTYPE html>
      <html lang="es" dir="ltr">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>PLAN DE CONTROL</title>
          <link rel="shortcut icon" href="/produccion/img/icono.png">
        </head>
        <body bgcolor="#AED6F1">
            <form method='post' id="formulario" onsubmit="return validacion()">

            <h1 align='center'>PLAN DE CONTROL</h1><br>

              <div >
                <h2 align='center'> <label>COMPONENTE: </label>
                 <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#AED6F1;  border-color:#AED6F1; border-style:solid; font-size: 17pt;">
                </h2>

                <div class="descripcion1" align="center">
                  <h3><label>DESCRIPCIONES</label></h3>


                  <?php //Inicia primero ?>
                  <fieldset style="width:65%; border-color: #000000; color: #000000; background-color: #C0C0C0;" align="left">
                      <legend><label>NÚM. PARTE/ PROCESO </label>
                        <input type="text" name="parte10" id="parte10" value="0020" style="width : 40px" readonly>
                      </legend>

                                    <label>NOMBRE DEL PROCESO  / DESCRIPCIÓN DE OPERACIÓN:</label>
                                    <input type="text" name="NomProceso10_1" id="NomProceso10_1"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br>
                                    <fieldset style="width:50%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                      <legend>MÁQUINA O DISPOSITIVO PARA MANUFACTURA:</legend>
                                      <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="N/A">N/A<br>
                                      <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="GUILLOTINA SAFAN">GUILLOTINA SAFAN<br>
                                      <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="TROQUELADORA">TROQUELADORA<br>
                                      <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="BANDAS APARTADORAS">BANDAS APARTADORAS<br>
                                    </fieldset><br>
                                    <div align='center'>
                                      <label>ACTIVIDADES</label><br>
                                      <label>No.</label>
                                      <select  class="noC" name="noC10_1" id="noC10_1" onchange="javascript:mostrarCaract();">
                                        <option value="">---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                      </select>

                                    </div>

                                        <div id="flotanteC1" style="display:none;">
                                          <div id="closeC1">
                                            <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">

                                              <legend>
                                                <label>No.</label>  <input type="text" name="no1_1" id="no1_1" value="1" style="font-size: 12pt; width : 30px" readonly>
                                              </legend>

                                                <label>PRODUCTO:</label>
                                                <select  class="prod" name="pod1_1" id="pod1_1">
                                                  <option value="">------------------------------------------------</option>
                                                  <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                                  <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                                  <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                                  <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                                  <option value="ALTURA INT.">ALTURA INT.</option>
                                                  <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                                  <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                                  <option value="CONCAVIDAD">CONCAVIDAD</option>
                                                  <option value="CABECEO">CABECEO</option>
                                                  <option value="CURVA MINIMA">CURVA MINIMA</option>
                                                  <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                                  <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                                  <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                                  <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                                  <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                                  <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                                  <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                                  <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                                  <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                                  <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                                  <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                                  <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                                  <option value="ESPESOR BASE">ESPESOR BASE</option>
                                                  <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                                  <option value="ESTAMPADO">ESTAMPADO</option>
                                                  <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                                  <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                                  <option value="PLANICIDAD">PLANICIDAD</option>
                                                  <option value="REDONDEZ">REDONDEZ</option>
                                                  <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                                  <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                                  <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                                  <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                                  <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                                </select>
                                                &nbsp
                                                &nbsp
                                                <label>PROCESO:</label>
                                                <select  class="proceso" name="proceso1_1" id="proceso1_1">
                                                  <option value="">------------------------------------</option>
                                                  <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                                  <option value="INSPECCIÓN">INSPECCIÓN</option>
                                                  <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                                  <option value="TROQUELADO">TROQUELADO</option>
                                                  <option value="SEPARACIÓN">SEPARACIÓN</option>
                                                  <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                                  <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>

                                                </select>
                                                <br><br>
                                                <label>RESPONSABLE:</label>
                                                <select  class="responsable" name="Res1_1" id="Res1_1">
                                                  <option value="">------------------------------------</option>
                                                  <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                                  <option value="CORTADOR">CORTADOR</option>
                                                  <option value="INSTALADOR">INSTALADOR</option>
                                                  <option value="AUDITOR">AUDITOR</option>
                                                  <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                                  <option value="OPERADOR">OPERADOR</option>
                                                  <option value="INSPECTOR">INSPECTOR</option>
                                                  <option value="LOGÍSTICA">LOGÍSTICA</option>
                                                </select>
                                                &nbsp
                                                &nbsp
                                                <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                                <select  class="clas" name="clas1_1" id="clas1_1">
                                                  <option value="">---</option>
                                                  <option value="M">M</option>
                                                  <option value="C">C</option>
                                                </select>
                                                <br><br>
                                                <div align='center'>
                                                  <label>MÉTODOS</label>
                                                </div>
                                                  <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                                  <input type="text" name="especificacionPLG1_1" id="especificacionPLG1_1"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                                <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                                <select  class="evalucacion" name="evaluacion1_1" id="evaluacion1_1">
                                                  <option value="">------------------------------------</option>
                                                  <option value="VISUAL">VISUAL</option>
                                                  <option value="BASCULA">BASCULA</option>
                                                  <option value="VERNIER">VERNIER</option>
                                                  <option value="MANUAL">MANUAL</option>
                                                  <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                                  <option value="MICRÓMETRO">MICRÓMETRO</option>
                                                  <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                                  <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                                  <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                                  <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                                </select>
                                                <br><br>
                                                <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                                    <legend><label><b>MUESTRA</b></label></legend>

                                                      <label>TAMAÑO:</label>
                                                      <input type="text" name="tamaño1_1" id="tamaño1_1"  style="width : 50px"><br>

                                                      <label>FRECUENCIA:</label>
                                                      <select  class="fre" name="fre1_1" id="fre1_1">
                                                        <option value="">------------------------------------------------------</option>
                                                        <option value="CADA LOTE">CADA LOTE</option>
                                                        <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                                        <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                                        <option value="INICIO">INICIO</option>
                                                        <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                                        <option value="C/30 MIN.">C/30 MIN.</option>
                                                        <option value="INSPECCION">INSPECCION</option>
                                                        <option value="CADA ORDEN">CADA ORDEN</option>
                                                        <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                                      </select>
                                            </fieldset><br>

                                            <label>MÉTODO DE CONTROL</label>
                                            <select  class="metodoC" name="metodoC1_1" id="metodoC1_1">
                                              <option value="">------------</option>
                                              <option value="F-IR 01">F-IR 01</option>
                                              <option value="F-PP 01">F-PP 01</option>
                                              <option value="F-PP 02">F-PP 02</option>
                                              <option value="F-PT 01">F-PT 01</option>
                                              <option value="F-PT 02">F-PT 02</option>
                                              <option value="F-AT 02">F-AT 02</option>
                                              <option value="F-IF 01">F-IF 01</option>
                                              <option value="F-EN 01">F-EN 01</option>
                                              <option value="VISUAL">VISUAL</option>
                                            </select>
                                        </fieldset>
                                        <br>
                                      </div>
                                    </div>


                                    <div id="flotanteC2" style="display:none;">
                                      <div id="closeC2">
                                        <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                          <legend>
                                            <label>No.</label>  <input type="text" name="no1_2" id="no1_2" value="2" style=" font-size: 12pt; width : 30px" readonly>
                                          </legend>
                                            <label>PRODUCTO:</label>
                                            <select  class="prod" name="pod1_2" id="pod1_2" >
                                              <option value="">------------------------------------------------</option>
                                              <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                              <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                              <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                              <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                              <option value="ALTURA INT.; border-color: #000000; color: #000000; background-color: #5DADE2;">ALTURA INT.</option>
                                              <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                              <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                              <option value="CONCAVIDAD">CONCAVIDAD</option>
                                              <option value="CABECEO">CABECEO</option>
                                              <option value="CURVA MINIMA">CURVA MINIMA</option>
                                              <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                              <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                              <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                              <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                              <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                              <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                              <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                              <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                              <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                              <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                              <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                              <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                              <option value="ESPESOR BASE">ESPESOR BASE</option>
                                              <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                              <option value="ESTAMPADO">ESTAMPADO</option>
                                              <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                              <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                              <option value="PLANICIDAD">PLANICIDAD</option>
                                              <option value="REDONDEZ">REDONDEZ</option>
                                              <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                              <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                              <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                              <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                              <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                            </select>
                                            &nbsp
                                            &nbsp
                                            <label>PROCESO:</label>
                                            <select  class="proceso" name="proceso1_2" id="proceso1_2">
                                              <option value="">------------------------------------</option>
                                              <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                              <option value="INSPECCIÓN">INSPECCIÓN</option>
                                              <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                              <option value="TROQUELADO">TROQUELADO</option>
                                              <option value="SEPARACIÓN">SEPARACIÓN</option>
                                              <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                              <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                            </select>
                                            <br><br>
                                            <label>RESPONSABLE:</label>
                                            <select  class="responsable" name="Res1_2" id="Res1_2">
                                              <option value="">------------------------------------</option>
                                              <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                              <option value="CORTADOR">CORTADOR</option>
                                              <option value="INSTALADOR">INSTALADOR</option>
                                              <option value="AUDITOR">AUDITOR</option>
                                              <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                              <option value="OPERADOR">OPERADOR</option>
                                              <option value="INSPECTOR">INSPECTOR</option>
                                              <option value="LOGÍSTICA">LOGÍSTICA</option>
                                            </select>
                                            &nbsp
                                            &nbsp
                                            <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                            <select  class="clas" name="clas1_2" id="clas1_2">
                                              <option value="">---</option>
                                              <option value="M">M</option>
                                              <option value="C">C</option>
                                            </select>
                                            <br><br>
                                            <div align='center'>
                                              <label>MÉTODOS</label>
                                            </div>
                                              <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                              <input type="text" name="especificacionPLG1_2" id="especificacionPLG1_2"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                            <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                            <select  class="evalucacion" name="evaluacion1_2" id="evaluacion1_2">
                                              <option value="">------------------------------------</option>
                                              <option value="VISUAL">VISUAL</option>
                                              <option value="BASCULA">BASCULA</option>
                                              <option value="VERNIER">VERNIER</option>
                                              <option value="MANUAL">MANUAL</option>
                                              <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                              <option value="MICRÓMETRO">MICRÓMETRO</option>
                                              <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                              <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                              <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                              <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                            </select>
                                            <br><br>
                                            <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                                <legend><label>MUESTRA</label></legend>

                                                <label>TAMAÑO:</label>
                                                <input type="text" name="tamaño1_2" id="tamaño1_2"  style="width : 50px"><br>

                                                <label>FRECUENCIA:</label>
                                                <select  class="fre" name="fre1_2" id="fre1_2">
                                                  <option value="">------------------------------------------------------</option>
                                                  <option value="CADA LOTE">CADA LOTE</option>
                                                  <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                                  <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                                  <option value="INICIO">INICIO</option>
                                                  <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                                  <option value="C/30 MIN.">C/30 MIN.</option>
                                                  <option value="INSPECCION">INSPECCION</option>
                                                  <option value="CADA ORDEN">CADA ORDEN</option>
                                                  <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                                </select>
                                        </fieldset><br>

                                        <label>MÉTODO DE CONTROL</label>
                                        <select  class="metodoC" name="metodoC1_2" id="metodoC1_2">
                                          <option value="">------------</option>
                                          <option value="F-IR 01">F-IR 01</option>
                                          <option value="F-PP 01">F-PP 01</option>
                                          <option value="F-PP 02">F-PP 02</option>
                                          <option value="F-PT 01">F-PT 01</option>
                                          <option value="F-PT 02">F-PT 02</option>
                                          <option value="F-AT 02">F-AT 02</option>
                                          <option value="F-IF 01">F-IF 01</option>
                                          <option value="F-EN 01">F-EN 01</option>
                                          <option value="VISUAL">VISUAL</option>
                                        </select>
                                    </fieldset>
                                    <br>
                                  </div>
                                </div>

                                    <div id="flotanteC3" style="display:none;">
                                      <div id="closeC3">
                                        <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                          <legend>
                                            <label>No.</label>  <input type="text" name="no1_3" id="no1_3" value="3" style=" font-size: 12pt; width : 30px" readonly>
                                          </legend>
                                            <label>PRODUCTO:</label>
                                            <select  class="prod" name="pod1_3" id="pod1_3">
                                              <option value="">------------------------------------------------</option>
                                              <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                              <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                              <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                              <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                              <option value="ALTURA INT.">ALTURA INT.</option>
                                              <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                              <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                              <option value="CONCAVIDAD">CONCAVIDAD</option>
                                              <option value="CABECEO">CABECEO</option>
                                              <option value="CURVA MINIMA">CURVA MINIMA</option>
                                              <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                              <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                              <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                              <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                              <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                              <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                              <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                              <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                              <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                              <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                              <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                              <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                              <option value="ESPESOR BASE">ESPESOR BASE</option>
                                              <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                              <option value="ESTAMPADO">ESTAMPADO</option>
                                              <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                              <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                              <option value="PLANICIDAD">PLANICIDAD</option>
                                              <option value="REDONDEZ">REDONDEZ</option>
                                              <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                              <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                              <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                              <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                              <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                            </select>
                                            &nbsp
                                            &nbsp
                                            <label>PROCESO:</label>
                                            <select  class="proceso" name="proceso1_3" id="proceso1_3">
                                              <option value="">------------------------------------</option>
                                              <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                              <option value="INSPECCIÓN">INSPECCIÓN</option>
                                              <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                              <option value="TROQUELADO">TROQUELADO</option>
                                              <option value="SEPARACIÓN">SEPARACIÓN</option>
                                              <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                              <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                            </select>
                                            <br><br>
                                            <label>RESPONSABLE:</label>
                                            <select  class="responsable" name="Res1_3" id="Res1_3">
                                              <option value="">------------------------------------</option>
                                              <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                              <option value="CORTADOR">CORTADOR</option>
                                              <option value="INSTALADOR">INSTALADOR</option>
                                              <option value="AUDITOR">AUDITOR</option>
                                              <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                              <option value="OPERADOR">OPERADOR</option>
                                              <option value="INSPECTOR">INSPECTOR</option>
                                              <option value="LOGÍSTICA">LOGÍSTICA</option>
                                            </select>
                                            &nbsp
                                            &nbsp
                                            <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                            <select  class="clas" name="clas1_3" id="clas1_3">
                                              <option value="">---</option>
                                              <option value="M">M</option>
                                              <option value="C">C</option>
                                            </select>
                                            <br><br>
                                            <div align='center'>
                                              <label>MÉTODOS</label>
                                            </div>
                                              <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                              <input type="text" name="especificacionPLG1_3" id="especificacionPLG1_3"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                            <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                            <select  class="evalucacion" name="evaluacion1_3" id="evaluacion1_3">
                                              <option value="">------------------------------------</option>
                                              <option value="VISUAL">VISUAL</option>
                                              <option value="BASCULA">BASCULA</option>
                                              <option value="VERNIER">VERNIER</option>
                                              <option value="MANUAL">MANUAL</option>
                                              <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                              <option value="MICRÓMETRO">MICRÓMETRO</option>
                                              <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                              <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                              <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                              <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                            </select>
                                            <br><br>
                                            <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                                <legend><label>MUESTRA</label></legend>

                                                <label>TAMAÑO:</label>
                                                <input type="text" name="tamaño1_3" id="tamaño1_3"  style="width : 50px"><br>

                                                <label>FRECUENCIA:</label>
                                                <select  class="fre" name="fre1_3" id="fre1_3">
                                                  <option value="">------------------------------------------------------</option>
                                                  <option value="CADA LOTE">CADA LOTE</option>
                                                  <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                                  <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                                  <option value="INICIO">INICIO</option>
                                                  <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                                  <option value="C/30 MIN.">C/30 MIN.</option>
                                                  <option value="INSPECCION">INSPECCION</option>
                                                  <option value="CADA ORDEN">CADA ORDEN</option>
                                                  <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                                </select>
                                        </fieldset><br>

                                        <label>MÉTODO DE CONTROL</label>
                                        <select  class="metodoC" name="metodoC1_3" id="metodoC1_3">
                                          <option value="">------------</option>
                                          <option value="F-IR 01">F-IR 01</option>
                                          <option value="F-PP 01">F-PP 01</option>
                                          <option value="F-PP 02">F-PP 02</option>
                                          <option value="F-PT 01">F-PT 01</option>
                                          <option value="F-PT 02">F-PT 02</option>
                                          <option value="F-AT 02">F-AT 02</option>
                                          <option value="F-IF 01">F-IF 01</option>
                                          <option value="F-EN 01">F-EN 01</option>
                                          <option value="VISUAL">VISUAL</option>
                                        </select>
                                    </fieldset>
                                    <br>
                                  </div>
                                </div>

                                  <div id="flotanteC4" style="display:none;">
                                    <div id="closeC4">
                                      <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                        <legend>
                                          <label>No.</label>  <input type="text" name="no1_4" id="no1_4" value="4" style="font-size: 12pt; width : 30px" readonly>
                                        </legend>
                                          <label>PRODUCTO:</label>
                                          <select  class="prod" name="pod1_4" id="pod1_4">
                                            <option value="">------------------------------------------------</option>
                                            <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                            <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                            <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                            <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                            <option value="ALTURA INT.">ALTURA INT.</option>
                                            <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                            <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                            <option value="CONCAVIDAD">CONCAVIDAD</option>
                                            <option value="CABECEO">CABECEO</option>
                                            <option value="CURVA MINIMA">CURVA MINIMA</option>
                                            <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                            <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                            <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                            <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                            <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                            <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                            <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                            <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                            <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                            <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                            <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                            <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                            <option value="ESPESOR BASE">ESPESOR BASE</option>
                                            <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                            <option value="ESTAMPADO">ESTAMPADO</option>
                                            <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                            <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                            <option value="PLANICIDAD">PLANICIDAD</option>
                                            <option value="REDONDEZ">REDONDEZ</option>
                                            <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                            <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                            <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                            <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                            <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                          </select>
                                          &nbsp
                                          &nbsp
                                          <label>PROCESO:</label>
                                          <select  class="proceso" name="proceso1_4" id="proceso1_4">
                                            <option value="">------------------------------------</option>
                                            <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                            <option value="INSPECCIÓN">INSPECCIÓN</option>
                                            <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                            <option value="TROQUELADO">TROQUELADO</option>
                                            <option value="SEPARACIÓN">SEPARACIÓN</option>
                                            <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                            <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                          </select>
                                          <br><br>
                                          <label>RESPONSABLE:</label>
                                          <select  class="responsable" name="Res1_4" id="Res1_4">
                                            <option value="">------------------------------------</option>
                                            <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                            <option value="CORTADOR">CORTADOR</option>
                                            <option value="INSTALADOR">INSTALADOR</option>
                                            <option value="AUDITOR">AUDITOR</option>
                                            <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                            <option value="OPERADOR">OPERADOR</option>
                                            <option value="INSPECTOR">INSPECTOR</option>
                                            <option value="LOGÍSTICA">LOGÍSTICA</option>
                                          </select>
                                          &nbsp
                                          &nbsp
                                          <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                          <select  class="clas" name="clas1_4" id="clas1_4">
                                            <option value="">---</option>
                                            <option value="M">M</option>
                                            <option value="C">C</option>
                                          </select>
                                          <br><br>
                                          <div align='center'>
                                            <label>MÉTODOS</label>
                                          </div>
                                            <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                            <input type="text" name="especificacionPLG1_4" id="especificacionPLG1_4"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                          <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                          <select  class="evalucacion" name="evaluacion1_4" id="evaluacion1_4">
                                            <option value="">------------------------------------</option>
                                            <option value="VISUAL">VISUAL</option>
                                            <option value="BASCULA">BASCULA</option>
                                            <option value="VERNIER">VERNIER</option>
                                            <option value="MANUAL">MANUAL</option>
                                            <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                            <option value="MICRÓMETRO">MICRÓMETRO</option>
                                            <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                            <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                            <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                            <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                          </select>
                                          <br><br>
                                          <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                              <legend><label>MUESTRA</label></legend>

                                              <label>TAMAÑO:</label>
                                              <input type="text" name="tamaño1_4" id="tamaño1_4"  style="width : 50px"><br>

                                              <label>FRECUENCIA:</label>
                                              <select  class="fre" name="fre1_4" id="fre1_4">
                                                <option value="">------------------------------------------------------</option>
                                                <option value="CADA LOTE">CADA LOTE</option>
                                                <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                                <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                                <option value="INICIO">INICIO</option>
                                                <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                                <option value="C/30 MIN.">C/30 MIN.</option>
                                                <option value="INSPECCION">INSPECCION</option>
                                                <option value="CADA ORDEN">CADA ORDEN</option>
                                                <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                              </select>
                                      </fieldset><br>

                                      <label>MÉTODO DE CONTROL</label>
                                      <select  class="metodoC" name="metodoC1_4" id="metodoC1_4">
                                        <option value="">------------</option>
                                        <option value="F-IR 01">F-IR 01</option>
                                        <option value="F-PP 01">F-PP 01</option>
                                        <option value="F-PP 02">F-PP 02</option>
                                        <option value="F-PT 01">F-PT 01</option>
                                        <option value="F-PT 02">F-PT 02</option>
                                        <option value="F-AT 02">F-AT 02</option>
                                        <option value="F-IF 01">F-IF 01</option>
                                        <option value="F-EN 01">F-EN 01</option>
                                        <option value="VISUAL">VISUAL</option>
                                      </select>
                                  </fieldset>
                                  <br>
                                </div>
                              </div>

                                <div id="flotanteC5" style="display:none;">
                                  <div id="closeC5">
                                    <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                      <legend>
                                        <label>No.</label>  <input type="text" name="no1_5" id="no1_5" value="5" style="font-size: 12pt; width : 30px" readonly>
                                      </legend>
                                        <label>PRODUCTO:</label>
                                        <select  class="prod" name="pod1_5" id="pod1_5">
                                          <option value="">------------------------------------------------</option>
                                          <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                          <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                          <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                          <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                          <option value="ALTURA INT.">ALTURA INT.</option>
                                          <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                          <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                          <option value="CONCAVIDAD">CONCAVIDAD</option>
                                          <option value="CABECEO">CABECEO</option>
                                          <option value="CURVA MINIMA">CURVA MINIMA</option>
                                          <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                          <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                          <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                          <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                          <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                          <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                          <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                          <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                          <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                          <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                          <option value="ESPESOR BASE">ESPESOR BASE</option>
                                          <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                          <option value="ESTAMPADO">ESTAMPADO</option>
                                          <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                          <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                          <option value="PLANICIDAD">PLANICIDAD</option>
                                          <option value="REDONDEZ">REDONDEZ</option>
                                          <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                          <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                          <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                          <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                          <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>PROCESO:</label>
                                        <select  class="proceso" name="proceso1_5" id="proceso1_5">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                          <option value="INSPECCIÓN">INSPECCIÓN</option>
                                          <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                          <option value="TROQUELADO">TROQUELADO</option>
                                          <option value="SEPARACIÓN">SEPARACIÓN</option>
                                          <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                          <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                        </select>
                                        <br><br>
                                        <label>RESPONSABLE:</label>
                                        <select  class="responsable" name="Res1_5" id="Res1_5">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                          <option value="CORTADOR">CORTADOR</option>
                                          <option value="INSTALADOR">INSTALADOR</option>
                                          <option value="AUDITOR">AUDITOR</option>
                                          <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                          <option value="OPERADOR">OPERADOR</option>
                                          <option value="INSPECTOR">INSPECTOR</option>
                                          <option value="LOGÍSTICA">LOGÍSTICA</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                        <select  class="clas" name="clas1_5" id="clas1_5">
                                          <option value="">---</option>
                                          <option value="M">M</option>
                                          <option value="C">C</option>
                                        </select>
                                        <br><br>
                                        <div align='center'>
                                          <label>MÉTODOS</label>
                                        </div>
                                          <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                          <input type="text" name="especificacionPLG1_5" id="especificacionPLG1_5"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                        <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                        <select  class="evalucacion" name="evaluacion1_5" id="evaluacion1_5">
                                          <option value="">------------------------------------</option>
                                          <option value="VISUAL">VISUAL</option>
                                          <option value="BASCULA">BASCULA</option>
                                          <option value="VERNIER">VERNIER</option>
                                          <option value="MANUAL">MANUAL</option>
                                          <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                          <option value="MICRÓMETRO">MICRÓMETRO</option>
                                          <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                          <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                          <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                          <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                        </select>
                                        <br><br>
                                        <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                            <legend><label>MUESTRA</label></legend>

                                            <label>TAMAÑO:</label>
                                            <input type="text" name="tamaño1_5" id="tamaño1_5"  style="width : 50px"><br>

                                            <label>FRECUENCIA:</label>
                                            <select  class="fre" name="fre1_5" id="fre1_5">
                                              <option value="">------------------------------------------------------</option>
                                              <option value="CADA LOTE">CADA LOTE</option>
                                              <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                              <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                              <option value="INICIO">INICIO</option>
                                              <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                              <option value="C/30 MIN.">C/30 MIN.</option>
                                              <option value="INSPECCION">INSPECCION</option>
                                              <option value="CADA ORDEN">CADA ORDEN</option>
                                              <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                            </select>
                                    </fieldset><br>

                                    <label>MÉTODO DE CONTROL</label>
                                    <select  class="metodoC" name="metodoC1_5" id="metodoC1_5">
                                      <option value="">------------</option>
                                      <option value="F-IR 01">F-IR 01</option>
                                      <option value="F-PP 01">F-PP 01</option>
                                      <option value="F-PP 02">F-PP 02</option>
                                      <option value="F-PT 01">F-PT 01</option>
                                      <option value="F-PT 02">F-PT 02</option>
                                      <option value="F-AT 02">F-AT 02</option>
                                      <option value="F-IF 01">F-IF 01</option>
                                      <option value="F-EN 01">F-EN 01</option>
                                      <option value="VISUAL">VISUAL</option>
                                    </select>
                                </fieldset>
                              </div>
                            </div>
                            <br>
                                <div id="flotanteC6" style="display:none;">
                                  <div id="closeC6">
                                    <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                      <legend>
                                        <label>No.</label>  <input type="text" name="no1_6" id="no1_6" value="6" style="font-size: 12pt; width : 30px" readonly>
                                      </legend>
                                        <label>PRODUCTO:</label>
                                        <select  class="prod" name="pod1_6" id="pod1_6">
                                          <option value="">------------------------------------------------</option>
                                          <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                          <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                          <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                          <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                          <option value="ALTURA INT.">ALTURA INT.</option>
                                          <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                          <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                          <option value="CONCAVIDAD">CONCAVIDAD</option>
                                          <option value="CABECEO">CABECEO</option>
                                          <option value="CURVA MINIMA">CURVA MINIMA</option>
                                          <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                          <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                          <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                          <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                          <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                          <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                          <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                          <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                          <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                          <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                          <option value="ESPESOR BASE">ESPESOR BASE</option>
                                          <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                          <option value="ESTAMPADO">ESTAMPADO</option>
                                          <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                          <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                          <option value="PLANICIDAD">PLANICIDAD</option>
                                          <option value="REDONDEZ">REDONDEZ</option>
                                          <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                          <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                          <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                          <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                          <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>PROCESO:</label>
                                        <select  class="proceso" name="proceso1_6" id="proceso1_6">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                          <option value="INSPECCIÓN">INSPECCIÓN</option>
                                          <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                          <option value="TROQUELADO">TROQUELADO</option>
                                          <option value="SEPARACIÓN">SEPARACIÓN</option>
                                          <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                          <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                        </select>
                                        <br><br>
                                        <label>RESPONSABLE:</label>
                                        <select  class="responsable" name="Res1_6" id="Res1_6">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                          <option value="CORTADOR">CORTADOR</option>
                                          <option value="INSTALADOR">INSTALADOR</option>
                                          <option value="AUDITOR">AUDITOR</option>
                                          <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                          <option value="OPERADOR">OPERADOR</option>
                                          <option value="INSPECTOR">INSPECTOR</option>
                                          <option value="LOGÍSTICA">LOGÍSTICA</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                        <select  class="clas" name="clas1_6" id="clas1_6">
                                          <option value="">---</option>
                                          <option value="M">M</option>
                                          <option value="C">C</option>
                                        </select>
                                        <br><br>
                                        <div align='center'>
                                          <label>MÉTODOS</label>
                                        </div>
                                          <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                          <input type="text" name="especificacionPLG1_6" id="especificacionPLG1_6"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                        <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                        <select  class="evalucacion" name="evaluacion1_6" id="evaluacion1_6">
                                          <option value="">------------------------------------</option>
                                          <option value="VISUAL">VISUAL</option>
                                          <option value="BASCULA">BASCULA</option>
                                          <option value="VERNIER">VERNIER</option>
                                          <option value="MANUAL">MANUAL</option>
                                          <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                          <option value="MICRÓMETRO">MICRÓMETRO</option>
                                          <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                          <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                          <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                          <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                        </select>
                                        <br><br>
                                        <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                            <legend><label>MUESTRA</label></legend>

                                            <label>TAMAÑO:</label>
                                            <input type="text" name="tamaño1_6" id="tamaño1_6"  style="width : 50px"><br>

                                            <label>FRECUENCIA:</label>
                                            <select  class="fre" name="fre1_6" id="fre1_6">
                                              <option value="">------------------------------------------------------</option>
                                              <option value="CADA LOTE">CADA LOTE</option>
                                              <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                              <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                              <option value="INICIO">INICIO</option>
                                              <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                              <option value="C/30 MIN.">C/30 MIN.</option>
                                              <option value="INSPECCION">INSPECCION</option>
                                              <option value="CADA ORDEN">CADA ORDEN</option>
                                              <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                            </select>
                                    </fieldset><br>

                                    <label>MÉTODO DE CONTROL</label>
                                    <select  class="metodoC" name="metodoC1_6" id="metodoC1_6">
                                      <option value="">------------</option>
                                      <option value="F-IR 01">F-IR 01</option>
                                      <option value="F-PP 01">F-PP 01</option>
                                      <option value="F-PP 02">F-PP 02</option>
                                      <option value="F-PT 01">F-PT 01</option>
                                      <option value="F-PT 02">F-PT 02</option>
                                      <option value="F-AT 02">F-AT 02</option>
                                      <option value="F-IF 01">F-IF 01</option>
                                      <option value="F-EN 01">F-EN 01</option>
                                      <option value="VISUAL">VISUAL</option>
                                    </select>
                                    <br>
                                </fieldset>
                              </div>
                            </div>
                            <br>
                              <div id="flotanteC7" style="display:none;">
                                <div id="closeC7">
                                  <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                    <legend>
                                      <label>No.</label>  <input type="text" name="no1_7" id="no1_7" value="7" style="font-size: 12pt; width : 30px" readonly>
                                    </legend>
                                      <label>PRODUCTO:</label>
                                      <select  class="prod" name="pod1_7" id="pod1_7">
                                        <option value="">------------------------------------------------</option>
                                        <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                        <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                        <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                        <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                        <option value="ALTURA INT.">ALTURA INT.</option>
                                        <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                        <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                        <option value="CONCAVIDAD">CONCAVIDAD</option>
                                        <option value="CABECEO">CABECEO</option>
                                        <option value="CURVA MINIMA">CURVA MINIMA</option>
                                        <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                        <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                        <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                        <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                        <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                        <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                        <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                        <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                        <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                        <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                        <option value="ESPESOR BASE">ESPESOR BASE</option>
                                        <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                        <option value="ESTAMPADO">ESTAMPADO</option>
                                        <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                        <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                        <option value="PLANICIDAD">PLANICIDAD</option>
                                        <option value="REDONDEZ">REDONDEZ</option>
                                        <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                        <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                        <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                        <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                        <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>PROCESO:</label>
                                      <select  class="proceso" name="proceso1_7" id="proceso1_7">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                        <option value="INSPECCIÓN">INSPECCIÓN</option>
                                        <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                        <option value="TROQUELADO">TROQUELADO</option>
                                        <option value="SEPARACIÓN">SEPARACIÓN</option>
                                        <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                        <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                      </select>
                                      <br><br>
                                      <label>RESPONSABLE:</label>
                                      <select  class="responsable" name="Res1_7" id="Res1_7">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                        <option value="CORTADOR">CORTADOR</option>
                                        <option value="INSTALADOR">INSTALADOR</option>
                                        <option value="AUDITOR">AUDITOR</option>
                                        <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                        <option value="OPERADOR">OPERADOR</option>
                                        <option value="INSPECTOR">INSPECTOR</option>
                                        <option value="LOGÍSTICA">LOGÍSTICA</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                      <select  class="clas" name="clas1_7" id="clas1_7">
                                        <option value="">---</option>
                                        <option value="M">M</option>
                                        <option value="C">C</option>
                                      </select>
                                      <br><br>
                                      <div align='center'>
                                        <label>MÉTODOS</label>
                                      </div>
                                        <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                        <input type="text" name="especificacionPLG1_7" id="especificacionPLG1_7"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                      <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                      <select  class="evalucacion" name="evaluacion1_7" id="evaluacion1_7">
                                        <option value="">------------------------------------</option>
                                        <option value="VISUAL">VISUAL</option>
                                        <option value="BASCULA">BASCULA</option>
                                        <option value="VERNIER">VERNIER</option>
                                        <option value="MANUAL">MANUAL</option>
                                        <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                        <option value="MICRÓMETRO">MICRÓMETRO</option>
                                        <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                        <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                        <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                        <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                      </select>
                                      <br><br>
                                      <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                          <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamaño1_7" id="tamaño1_7"  style="width : 50px"><br>

                                          <label>FRECUENCIA:</label>
                                          <select  class="fre" name="fre1_7" id="fre1_7">
                                            <option value="">------------------------------------------------------</option>
                                            <option value="CADA LOTE">CADA LOTE</option>
                                            <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                            <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                            <option value="INICIO">INICIO</option>
                                            <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                            <option value="C/30 MIN.">C/30 MIN.</option>
                                            <option value="INSPECCION">INSPECCION</option>
                                            <option value="CADA ORDEN">CADA ORDEN</option>
                                            <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                          </select>
                                  </fieldset><br>

                                    <label>MÉTODO DE CONTROL</label>
                                    <select  class="metodoC" name="metodoC1_7" id="metodoC1_7">
                                      <option value="">------------</option>
                                      <option value="F-IR 01">F-IR 01</option>
                                      <option value="F-PP 01">F-PP 01</option>
                                      <option value="F-PP 02">F-PP 02</option>
                                      <option value="F-PT 01">F-PT 01</option>
                                      <option value="F-PT 02">F-PT 02</option>
                                      <option value="F-AT 02">F-AT 02</option>
                                      <option value="F-IF 01">F-IF 01</option>
                                      <option value="F-EN 01">F-EN 01</option>
                                      <option value="VISUAL">VISUAL</option>
                                    </select>
                                </fieldset>
                                <br>
                              </div>
                            </div>

                            <div id="flotanteC8" style="display:none;">
                              <div id="closeC8">
                                <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no1.8" id="no1.8" value="8" style="font-size: 12pt; width : 30px" readonly>
                                  </legend>
                                    <label>PRODUCTO:</label>
                                    <select  class="prod" name="pod1.8" id="pod1.8">
                                      <option value="">------------------------------------------------</option>
                                      <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                      <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                      <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                      <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                      <option value="ALTURA INT.">ALTURA INT.</option>
                                      <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                      <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                      <option value="CONCAVIDAD">CONCAVIDAD</option>
                                      <option value="CABECEO">CABECEO</option>
                                      <option value="CURVA MINIMA">CURVA MINIMA</option>
                                      <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                      <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                      <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                      <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                      <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                      <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                      <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                      <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                      <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                      <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                      <option value="ESPESOR BASE">ESPESOR BASE</option>
                                      <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                      <option value="ESTAMPADO">ESTAMPADO</option>
                                      <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                      <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                      <option value="PLANICIDAD">PLANICIDAD</option>
                                      <option value="REDONDEZ">REDONDEZ</option>
                                      <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                      <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                      <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                      <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                      <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>PROCESO:</label>
                                    <select  class="proceso" name="proceso1_8" id="proceso1_8">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                      <option value="INSPECCIÓN">INSPECCIÓN</option>
                                      <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                      <option value="TROQUELADO">TROQUELADO</option>
                                      <option value="SEPARACIÓN">SEPARACIÓN</option>
                                      <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                      <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                    </select>
                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                    <select  class="responsable" name="Res1_8" id="Res1_8">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                      <option value="CORTADOR">CORTADOR</option>
                                      <option value="INSTALADOR">INSTALADOR</option>
                                      <option value="AUDITOR">AUDITOR</option>
                                      <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                      <option value="OPERADOR">OPERADOR</option>
                                      <option value="INSPECTOR">INSPECTOR</option>
                                      <option value="LOGÍSTICA">LOGÍSTICA</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <select  class="clas" name="clas1_8" id="clas1_8">
                                      <option value="">---</option>
                                      <option value="M">M</option>
                                      <option value="C">C</option>
                                    </select>
                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacionPLG1_8" id="especificacionPLG1_8"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <select  class="evalucacion" name="evaluacion1_8" id="evaluacion1_8">
                                      <option value="">------------------------------------</option>
                                      <option value="VISUAL">VISUAL</option>
                                      <option value="BASCULA">BASCULA</option>
                                      <option value="VERNIER">VERNIER</option>
                                      <option value="MANUAL">MANUAL</option>
                                      <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                      <option value="MICRÓMETRO">MICRÓMETRO</option>
                                      <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                      <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                      <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                      <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                    </select>
                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                        <label>TAMAÑO:</label>
                                        <input type="text" name="tamaño1_8" id="tamaño1_8"  style="width : 50px"><br>

                                        <label>FRECUENCIA:</label>
                                        <select  class="fre" name="fre1_8" id="fre1_8">
                                          <option value="">------------------------------------------------------</option>
                                          <option value="CADA LOTE">CADA LOTE</option>
                                          <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                          <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                          <option value="INICIO">INICIO</option>
                                          <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                          <option value="C/30 MIN.">C/30 MIN.</option>
                                          <option value="INSPECCION">INSPECCION</option>
                                          <option value="CADA ORDEN">CADA ORDEN</option>
                                          <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                        </select>
                                    </fieldset><br>

                                    <label>MÉTODO DE CONTROL</label>
                                    <select  class="metodoC" name="metodoC1_8" id="metodoC1_8">
                                      <option value="">------------</option>
                                      <option value="F-IR 01">F-IR 01</option>
                                      <option value="F-PP 01">F-PP 01</option>
                                      <option value="F-PP 02">F-PP 02</option>
                                      <option value="F-PT 01">F-PT 01</option>
                                      <option value="F-PT 02">F-PT 02</option>
                                      <option value="F-AT 02">F-AT 02</option>
                                      <option value="F-IF 01">F-IF 01</option>
                                      <option value="F-EN 01">F-EN 01</option>
                                      <option value="VISUAL">VISUAL</option>
                                    </select>
                                </fieldset>
                                <br>
                              </div>
                            </div>

                            <div id="flotanteC9" style="display:none;">
                              <div id="closeC9">
                                <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no1_9" id="no1_9" value="9" style="font-size: 12pt; width : 30px" readonly>
                                  </legend>
                                    <label>PRODUCTO:</label>
                                    <select  class="prod" name="pod1_9" id="pod1_9">
                                      <option value="">------------------------------------------------</option>
                                      <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                      <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                      <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                      <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                      <option value="ALTURA INT.">ALTURA INT.</option>
                                      <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                      <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                      <option value="CONCAVIDAD">CONCAVIDAD</option>
                                      <option value="CABECEO">CABECEO</option>
                                      <option value="CURVA MINIMA">CURVA MINIMA</option>
                                      <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                      <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                      <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                      <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                      <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                      <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                      <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                      <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                      <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                      <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                      <option value="ESPESOR BASE">ESPESOR BASE</option>
                                      <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                      <option value="ESTAMPADO">ESTAMPADO</option>
                                      <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                      <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                      <option value="PLANICIDAD">PLANICIDAD</option>
                                      <option value="REDONDEZ">REDONDEZ</option>
                                      <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                      <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                      <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                      <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                      <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>PROCESO:</label>
                                    <select  class="proceso" name="proceso1_9" id="proceso1_9">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                      <option value="INSPECCIÓN">INSPECCIÓN</option>
                                      <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                      <option value="TROQUELADO">TROQUELADO</option>
                                      <option value="SEPARACIÓN">SEPARACIÓN</option>
                                      <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                      <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                    </select>
                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                    <select  class="responsable" name="Res1_9" id="Res1_9">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                      <option value="CORTADOR">CORTADOR</option>
                                      <option value="INSTALADOR">INSTALADOR</option>
                                      <option value="AUDITOR">AUDITOR</option>
                                      <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                      <option value="OPERADOR">OPERADOR</option>
                                      <option value="INSPECTOR">INSPECTOR</option>
                                      <option value="LOGÍSTICA">LOGÍSTICA</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <select  class="clas" name="clas1_9" id="clas1_9">
                                      <option value="">---</option>
                                      <option value="M">M</option>
                                      <option value="C">C</option>
                                    </select>
                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacionPLG1_9" id="especificacionPLG1_9"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <select  class="evalucacion" name="evaluacion1_9" id="evaluacion1_9">
                                      <option value="">------------------------------------</option>
                                      <option value="VISUAL">VISUAL</option>
                                      <option value="BASCULA">BASCULA</option>
                                      <option value="VERNIER">VERNIER</option>
                                      <option value="MANUAL">MANUAL</option>
                                      <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                      <option value="MICRÓMETRO">MICRÓMETRO</option>
                                      <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                      <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                      <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                      <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                    </select>
                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                        <label>TAMAÑO:</label>
                                        <input type="text" name="tamaño1_9" id="tamaño1_9"  style="width : 50px"><br>

                                        <label>FRECUENCIA:</label>
                                        <select  class="fre" name="fre1_9" id="fre1_9">
                                          <option value="">------------------------------------------------------</option>
                                          <option value="CADA LOTE">CADA LOTE</option>
                                          <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                          <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                          <option value="INICIO">INICIO</option>
                                          <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                          <option value="C/30 MIN.">C/30 MIN.</option>
                                          <option value="INSPECCION">INSPECCION</option>
                                          <option value="CADA ORDEN">CADA ORDEN</option>
                                          <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                        </select>
                                        </fieldset><br>

                                        <label>MÉTODO DE CONTROL</label>
                                        <select  class="metodoC" name="metodoC1_9" id="metodoC1_9">
                                          <option value="">------------</option>
                                          <option value="F-IR 01">F-IR 01</option>
                                          <option value="F-PP 01">F-PP 01</option>
                                          <option value="F-PP 02">F-PP 02</option>
                                          <option value="F-PT 01">F-PT 01</option>
                                          <option value="F-PT 02">F-PT 02</option>
                                          <option value="F-AT 02">F-AT 02</option>
                                          <option value="F-IF 01">F-IF 01</option>
                                          <option value="F-EN 01">F-EN 01</option>
                                          <option value="VISUAL">VISUAL</option>
                                        </select>
                                    </fieldset>
                                    <br>
                                  </div>
                                </div>

                                <div id="flotanteC10" style="display:none;">
                                  <div id="closeC10">
                                    <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                      <legend>
                                        <label>No.</label><input type="text" name="no1_10" id="no1_10" value="10" style="font-size: 12pt; width : 30px" readonly>
                                      </legend>
                                        <label>PRODUCTO:</label>
                                        <select  class="prod" name="pod1_10" id="pod1_10">
                                          <option value="">------------------------------------------------</option>
                                          <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                          <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                          <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                          <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                          <option value="ALTURA INT.">ALTURA INT.</option>
                                          <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                          <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                          <option value="CONCAVIDAD">CONCAVIDAD</option>
                                          <option value="CABECEO">CABECEO</option>
                                          <option value="CURVA MINIMA">CURVA MINIMA</option>
                                          <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                          <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                          <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                          <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                          <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                          <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                          <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                          <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                          <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                          <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                          <option value="ESPESOR BASE">ESPESOR BASE</option>
                                          <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                          <option value="ESTAMPADO">ESTAMPADO</option>
                                          <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                          <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                          <option value="PLANICIDAD">PLANICIDAD</option>
                                          <option value="REDONDEZ">REDONDEZ</option>
                                          <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                          <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                          <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                          <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                          <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>PROCESO:</label>
                                        <select  class="proceso" name="proceso1_10" id="proceso1_10">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                          <option value="INSPECCIÓN">INSPECCIÓN</option>
                                          <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                          <option value="TROQUELADO">TROQUELADO</option>
                                          <option value="SEPARACIÓN">SEPARACIÓN</option>
                                          <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                          <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                        </select>
                                        <br><br>
                                        <label>RESPONSABLE:</label>
                                        <select  class="responsable" name="Res1_10" id="Res1_10">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                          <option value="CORTADOR">CORTADOR</option>
                                          <option value="INSTALADOR">INSTALADOR</option>
                                          <option value="AUDITOR">AUDITOR</option>
                                          <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                          <option value="OPERADOR">OPERADOR</option>
                                          <option value="INSPECTOR">INSPECTOR</option>
                                          <option value="LOGÍSTICA">LOGÍSTICA</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                        <select  class="clas" name="clas1_10" id="clas1_10">
                                          <option value="">---</option>
                                          <option value="M">M</option>
                                          <option value="C">C</option>
                                        </select>
                                        <br><br>
                                        <div align='center'>
                                          <label>MÉTODOS</label>
                                        </div>
                                          <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                          <input type="text" name="especificacionPLG1_10" id="especificacionPLG1_10"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                        <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                        <select  class="evalucacion" name="evaluacion1_10" id="evaluacion1_10">
                                          <option value="">------------------------------------</option>
                                          <option value="VISUAL">VISUAL</option>
                                          <option value="BASCULA">BASCULA</option>
                                          <option value="VERNIER">VERNIER</option>
                                          <option value="MANUAL">MANUAL</option>
                                          <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                          <option value="MICRÓMETRO">MICRÓMETRO</option>
                                          <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                          <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                          <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                          <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                        </select>
                                        <br><br>
                                        <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                            <legend><label>MUESTRA</label></legend>

                                            <label>TAMAÑO:</label>
                                            <input type="text" name="tamaño1_10" id="tamaño1_10"  style="width : 50px"><br>

                                            <label>FRECUENCIA:</label>
                                            <select  class="fre" name="fre1_10" id="fre1_10">
                                              <option value="">------------------------------------------------------</option>
                                              <option value="CADA LOTE">CADA LOTE</option>
                                              <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                              <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                              <option value="INICIO">INICIO</option>
                                              <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                              <option value="C/30 MIN.">C/30 MIN.</option>
                                              <option value="INSPECCION">INSPECCION</option>
                                              <option value="CADA ORDEN">CADA ORDEN</option>
                                              <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                            </select>
                                        </fieldset><br>

                                        <label>MÉTODO DE CONTROL</label>
                                        <select  class="metodoC" name="metodoC1_10" id="metodoC1_10">
                                          <option value="">------------</option>
                                          <option value="F-IR 01">F-IR 01</option>
                                          <option value="F-PP 01">F-PP 01</option>
                                          <option value="F-PP 02">F-PP 02</option>
                                          <option value="F-PT 01">F-PT 01</option>
                                          <option value="F-PT 02">F-PT 02</option>
                                          <option value="F-AT 02">F-AT 02</option>
                                          <option value="F-IF 01">F-IF 01</option>
                                          <option value="F-EN 01">F-EN 01</option>
                                          <option value="VISUAL">VISUAL</option>
                                        </select>
                                    </fieldset>
                                    <br>
                                  </div>
                                </div>

                                <div id="flotanteC11" style="display:none;">
                                  <div id="closeC11">
                                    <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                      <legend>
                                        <label>No.</label><input type="text" name="no1_11" id="no1_11" value="11" style="font-size: 12pt; width : 30px" readonly>
                                      </legend>
                                        <label>PRODUCTO:</label>
                                        <select  class="prod" name="pod1_11" id="pod1_11">
                                          <option value="">------------------------------------------------</option>
                                          <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                          <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                          <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                          <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                          <option value="ALTURA INT.">ALTURA INT.</option>
                                          <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                          <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                          <option value="CONCAVIDAD">CONCAVIDAD</option>
                                          <option value="CABECEO">CABECEO</option>
                                          <option value="CURVA MINIMA">CURVA MINIMA</option>
                                          <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                          <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                          <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                          <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                          <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                          <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                          <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                          <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                          <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                          <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                          <option value="ESPESOR BASE">ESPESOR BASE</option>
                                          <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                          <option value="ESTAMPADO">ESTAMPADO</option>
                                          <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                          <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                          <option value="PLANICIDAD">PLANICIDAD</option>
                                          <option value="REDONDEZ">REDONDEZ</option>
                                          <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                          <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                          <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                          <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                          <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>PROCESO:</label>
                                        <select  class="proceso" name="proceso1_11" id="proceso1_11">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                          <option value="INSPECCIÓN">INSPECCIÓN</option>
                                          <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                          <option value="TROQUELADO">TROQUELADO</option>
                                          <option value="SEPARACIÓN">SEPARACIÓN</option>
                                          <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                          <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                        </select>
                                        <br><br>
                                        <label>RESPONSABLE:</label>
                                        <select  class="responsable" name="Res1_11" id="Res1_11">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                          <option value="CORTADOR">CORTADOR</option>
                                          <option value="INSTALADOR">INSTALADOR</option>
                                          <option value="AUDITOR">AUDITOR</option>
                                          <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                          <option value="OPERADOR">OPERADOR</option>
                                          <option value="INSPECTOR">INSPECTOR</option>
                                          <option value="LOGÍSTICA">LOGÍSTICA</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                        <select  class="clas" name="clas1_11" id="clas1_11">
                                          <option value="">---</option>
                                          <option value="M">M</option>
                                          <option value="C">C</option>
                                        </select>
                                        <br><br>
                                        <div align='center'>
                                          <label>MÉTODOS</label>
                                        </div>
                                          <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                          <input type="text" name="especificacionPLG1_11" id="especificacionPLG1_11"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                        <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                        <select  class="evalucacion" name="evaluacion1_11" id="evaluacion1_11">
                                          <option value="">------------------------------------</option>
                                          <option value="VISUAL">VISUAL</option>
                                          <option value="BASCULA">BASCULA</option>
                                          <option value="VERNIER">VERNIER</option>
                                          <option value="MANUAL">MANUAL</option>
                                          <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                          <option value="MICRÓMETRO">MICRÓMETRO</option>
                                          <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                          <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                          <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                          <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                        </select>
                                        <br><br>
                                        <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                            <legend><label>MUESTRA</label></legend>

                                              <label>TAMAÑO:</label>
                                              <input type="text" name="tamaño1_11" id="tamaño1_11"  style="width : 50px"><br>

                                              <label>FRECUENCIA:</label>
                                              <select  class="fre" name="fre1_11" id="fre1_11">
                                                <option value="">------------------------------------------------------</option>
                                                <option value="CADA LOTE">CADA LOTE</option>
                                                <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                                <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                                <option value="INICIO">INICIO</option>
                                                <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                                <option value="C/30 MIN.">C/30 MIN.</option>
                                                <option value="INSPECCION">INSPECCION</option>
                                                <option value="CADA ORDEN">CADA ORDEN</option>
                                                <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                            </select>
                                    </fieldset><br>

                                    <label>MÉTODO DE CONTROL</label>
                                    <select  class="metodoC" name="metodoC1_11" id="metodoC1_11">
                                      <option value="">------------</option>
                                      <option value="F-IR 01">F-IR 01</option>
                                      <option value="F-PP 01">F-PP 01</option>
                                      <option value="F-PP 02">F-PP 02</option>
                                      <option value="F-PT 01">F-PT 01</option>
                                      <option value="F-PT 02">F-PT 02</option>
                                      <option value="F-AT 02">F-AT 02</option>
                                      <option value="F-IF 01">F-IF 01</option>
                                      <option value="F-EN 01">F-EN 01</option>
                                      <option value="VISUAL">VISUAL</option>
                                    </select>
                                  </fieldset>
                                  <br>
                                </div>
                              </div>

                              <div id="flotanteC12" style="display:none;">
                                <div id="closeC12">
                                  <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                    <legend>
                                      <label>No.</label><input type="text" name="no1_12" id="no1_12" value="12" style="font-size: 12pt; width : 30px" readonly>
                                    </legend>
                                      <label>PRODUCTO:</label>
                                      <select  class="prod" name="pod1_12" id="pod1_12">
                                        <option value="">------------------------------------------------</option>
                                        <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                        <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                        <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                        <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                        <option value="ALTURA INT.">ALTURA INT.</option>
                                        <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                        <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                        <option value="CONCAVIDAD">CONCAVIDAD</option>
                                        <option value="CABECEO">CABECEO</option>
                                        <option value="CURVA MINIMA">CURVA MINIMA</option>
                                        <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                        <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                        <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                        <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                        <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                        <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                        <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                        <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                        <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                        <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                        <option value="ESPESOR BASE">ESPESOR BASE</option>
                                        <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                        <option value="ESTAMPADO">ESTAMPADO</option>
                                        <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                        <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                        <option value="PLANICIDAD">PLANICIDAD</option>
                                        <option value="REDONDEZ">REDONDEZ</option>
                                        <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                        <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                        <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                        <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                        <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>PROCESO:</label>
                                      <select  class="proceso" name="proceso1_12" id="proceso1_12">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                        <option value="INSPECCIÓN">INSPECCIÓN</option>
                                        <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                        <option value="TROQUELADO">TROQUELADO</option>
                                        <option value="SEPARACIÓN">SEPARACIÓN</option>
                                        <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                        <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                      </select>
                                      <br><br>
                                      <label>RESPONSABLE:</label>
                                      <select  class="responsable" name="Res1_12" id="Res1_12">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                        <option value="CORTADOR">CORTADOR</option>
                                        <option value="INSTALADOR">INSTALADOR</option>
                                        <option value="AUDITOR">AUDITOR</option>
                                        <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                        <option value="OPERADOR">OPERADOR</option>
                                        <option value="INSPECTOR">INSPECTOR</option>
                                        <option value="LOGÍSTICA">LOGÍSTICA</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                      <select  class="clas" name="clas1_12" id="clas1_12">
                                        <option value="">---</option>
                                        <option value="M">M</option>
                                        <option value="C">C</option>
                                      </select>
                                      <br><br>
                                      <div align='center'>
                                        <label>MÉTODOS</label>
                                      </div>
                                        <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                        <input type="text" name="especificacionPLG1_12" id="especificacionPLG1_12"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                      <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                      <select  class="evalucacion" name="evaluacion1_12" id="evaluacion1_12">
                                        <option value="">------------------------------------</option>
                                        <option value="VISUAL">VISUAL</option>
                                        <option value="BASCULA">BASCULA</option>
                                        <option value="VERNIER">VERNIER</option>
                                        <option value="MANUAL">MANUAL</option>
                                        <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                        <option value="MICRÓMETRO">MICRÓMETRO</option>
                                        <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                        <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                        <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                        <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                      </select>
                                      <br><br>
                                      <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                          <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamaño1_12" id="tamaño1_12"  style="width : 50px"><br>

                                          <label>FRECUENCIA:</label>
                                          <select  class="fre" name="fre1_12" id="fre1_12">
                                            <option value="">------------------------------------------------------</option>
                                            <option value="CADA LOTE">CADA LOTE</option>
                                            <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                            <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                            <option value="INICIO">INICIO</option>
                                            <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                            <option value="C/30 MIN.">C/30 MIN.</option>
                                            <option value="INSPECCION">INSPECCION</option>
                                            <option value="CADA ORDEN">CADA ORDEN</option>
                                            <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                          </select>
                                  </fieldset><br>

                                    <label>MÉTODO DE CONTROL</label>
                                    <select  class="metodoC" name="metodoC1_12" id="metodoC1_12">
                                      <option value="">------------</option>
                                      <option value="F-IR 01">F-IR 01</option>
                                      <option value="F-PP 01">F-PP 01</option>
                                      <option value="F-PP 02">F-PP 02</option>
                                      <option value="F-PT 01">F-PT 01</option>
                                      <option value="F-PT 02">F-PT 02</option>
                                      <option value="F-AT 02">F-AT 02</option>
                                      <option value="F-IF 01">F-IF 01</option>
                                      <option value="F-EN 01">F-EN 01</option>
                                      <option value="VISUAL">VISUAL</option>
                                    </select>
                                </fieldset>
                                <br>
                              </div>
                            </div>

                              <div id="flotanteC13" style="display:none;">
                                <div id="closeC13">
                                  <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                    <legend>
                                      <label>No.</label><input type="text" name="no1_13" id="no1_13" value="13" style="font-size: 12pt; width : 30px" readonly>
                                    </legend>
                                      <label>PRODUCTO:</label>
                                      <select  class="prod" name="pod1_13" id="pod1_13">
                                        <option value="">------------------------------------------------</option>
                                        <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                        <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                        <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                        <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                        <option value="ALTURA INT.">ALTURA INT.</option>
                                        <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                        <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                        <option value="CONCAVIDAD">CONCAVIDAD</option>
                                        <option value="CABECEO">CABECEO</option>
                                        <option value="CURVA MINIMA">CURVA MINIMA</option>
                                        <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                        <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                        <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                        <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                        <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                        <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                        <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                        <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                        <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                        <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                        <option value="ESPESOR BASE">ESPESOR BASE</option>
                                        <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                        <option value="ESTAMPADO">ESTAMPADO</option>
                                        <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                        <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                        <option value="PLANICIDAD">PLANICIDAD</option>
                                        <option value="REDONDEZ">REDONDEZ</option>
                                        <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                        <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                        <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                        <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                        <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>PROCESO:</label>
                                      <select  class="proceso" name="proceso1_13" id="proceso1_13">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                        <option value="INSPECCIÓN">INSPECCIÓN</option>
                                        <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                        <option value="TROQUELADO">TROQUELADO</option>
                                        <option value="SEPARACIÓN">SEPARACIÓN</option>
                                        <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                        <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                      </select>
                                      <br><br>
                                      <label>RESPONSABLE:</label>
                                      <select  class="responsable" name="Res1_13" id="Res1_13">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                        <option value="CORTADOR">CORTADOR</option>
                                        <option value="INSTALADOR">INSTALADOR</option>
                                        <option value="AUDITOR">AUDITOR</option>
                                        <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                        <option value="OPERADOR">OPERADOR</option>
                                        <option value="INSPECTOR">INSPECTOR</option>
                                        <option value="LOGÍSTICA">LOGÍSTICA</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                      <select  class="clas" name="clas1_13" id="clas1_13">
                                        <option value="">---</option>
                                        <option value="M">M</option>
                                        <option value="C">C</option>
                                      </select>
                                      <br><br>
                                      <div align='center'>
                                        <label>MÉTODOS</label>
                                      </div>
                                        <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                        <input type="text" name="especificacionPLG1_13" id="especificacionPLG1_13"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                      <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                      <select  class="evalucacion" name="evaluacion1_13" id="evaluacion1_13">
                                        <option value="">------------------------------------</option>
                                        <option value="VISUAL">VISUAL</option>
                                        <option value="BASCULA">BASCULA</option>
                                        <option value="VERNIER">VERNIER</option>
                                        <option value="MANUAL">MANUAL</option>
                                        <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                        <option value="MICRÓMETRO">MICRÓMETRO</option>
                                        <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                        <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                        <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                        <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                      </select>
                                      <br><br>
                                      <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                          <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamaño1_13" id="tamaño1_13"  style="width : 50px"><br>

                                          <label>FRECUENCIA:</label>
                                          <select  class="fre" name="fre1_13" id="fre1_13">
                                            <option value="">------------------------------------------------------</option>
                                            <option value="CADA LOTE">CADA LOTE</option>
                                            <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                            <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                            <option value="INICIO">INICIO</option>
                                            <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                            <option value="C/30 MIN.">C/30 MIN.</option>
                                            <option value="INSPECCION">INSPECCION</option>
                                            <option value="CADA ORDEN">CADA ORDEN</option>
                                            <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                          </select>
                                  </fieldset><br>

                                  <label>MÉTODO DE CONTROL</label>
                                  <select  class="metodoC" name="metodoC1_13" id="metodoC1_13">
                                    <option value="">------------</option>
                                    <option value="F-IR 01">F-IR 01</option>
                                    <option value="F-PP 01">F-PP 01</option>
                                    <option value="F-PP 02">F-PP 02</option>
                                    <option value="F-PT 01">F-PT 01</option>
                                    <option value="F-PT 02">F-PT 02</option>
                                    <option value="F-AT 02">F-AT 02</option>
                                    <option value="F-IF 01">F-IF 01</option>
                                    <option value="F-EN 01">F-EN 01</option>
                                    <option value="VISUAL">VISUAL</option>
                                  </select>
                                </fieldset>
                                <br>
                              </div>
                            </div>

                              <div id="flotanteC14" style="display:none;">
                                <div id="closeC14">
                                  <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                    <legend>
                                      <label>No.</label><input type="text" name="no1_14" id="no1_14" value="14" style="font-size: 12pt; width : 30px" readonly>
                                    </legend>
                                      <label>PRODUCTO:</label>
                                      <select  class="prod" name="pod1_14" id="pod1_14">
                                        <option value="">------------------------------------------------</option>
                                        <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                        <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                        <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                        <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                        <option value="ALTURA INT.">ALTURA INT.</option>
                                        <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                        <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                        <option value="CONCAVIDAD">CONCAVIDAD</option>
                                        <option value="CABECEO">CABECEO</option>
                                        <option value="CURVA MINIMA">CURVA MINIMA</option>
                                        <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                        <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                        <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                        <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                        <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                        <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                        <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                        <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                        <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                        <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                        <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                        <option value="ESPESOR BASE">ESPESOR BASE</option>
                                        <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                        <option value="ESTAMPADO">ESTAMPADO</option>
                                        <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                        <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                        <option value="PLANICIDAD">PLANICIDAD</option>
                                        <option value="REDONDEZ">REDONDEZ</option>
                                        <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                        <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                        <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                        <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                        <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>PROCESO:</label>
                                      <select  class="proceso" name="proceso1_14" id="proceso1_14">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                        <option value="INSPECCIÓN">INSPECCIÓN</option>
                                        <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                        <option value="TROQUELADO">TROQUELADO</option>
                                        <option value="SEPARACIÓN">SEPARACIÓN</option>
                                        <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                        <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                      </select>
                                      <br><br>
                                      <label>RESPONSABLE:</label>
                                      <select  class="responsable" name="Res1_14" id="Res1_14">
                                        <option value="">------------------------------------</option>
                                        <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                        <option value="CORTADOR">CORTADOR</option>
                                        <option value="INSTALADOR">INSTALADOR</option>
                                        <option value="AUDITOR">AUDITOR</option>
                                        <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                        <option value="INSPECTOR">INSPECTOR</option>
                                        <option value="LOGÍSTICA">LOGÍSTICA</option>
                                      </select>
                                      &nbsp
                                      &nbsp
                                      <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                      <select  class="clas" name="clas1_14" id="clas1_14">
                                        <option value="">---</option>
                                        <option value="M">M</option>
                                        <option value="C">C</option>
                                      </select>
                                      <br><br>
                                      <div align='center'>
                                        <label>MÉTODOS</label>
                                      </div>
                                        <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                        <input type="text" name="especificacionPLG1_14" id="especificacionPLG1_14"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                      <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                      <select  class="evalucacion" name="evaluacion1_14" id="evaluacion1_14">
                                        <option value="">------------------------------------</option>
                                        <option value="VISUAL">VISUAL</option>
                                        <option value="BASCULA">BASCULA</option>
                                        <option value="VERNIER">VERNIER</option>
                                        <option value="MANUAL">MANUAL</option>
                                        <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                        <option value="MICRÓMETRO">MICRÓMETRO</option>
                                        <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                        <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                        <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                        <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                      </select>
                                      <br><br>
                                      <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                          <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamaño1_14" id="tamaño1_14"  style="width : 50px"><br>

                                          <label>FRECUENCIA:</label>
                                          <select  class="fre" name="fre1_14" id="fre1_14">
                                            <option value="">------------------------------------------------------</option>
                                            <option value="CADA LOTE">CADA LOTE</option>
                                            <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                            <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                            <option value="INICIO">INICIO</option>
                                            <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                            <option value="C/30 MIN.">C/30 MIN.</option>
                                            <option value="INSPECCION">INSPECCION</option>
                                            <option value="CADA ORDEN">CADA ORDEN</option>
                                            <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                          </select>
                                  </fieldset><br>

                                  <label>MÉTODO DE CONTROL</label>
                                  <select  class="metodoC" name="metodoC1_14" id="metodoC1_14">
                                    <option value="">------------</option>
                                    <option value="F-IR 01">F-IR 01</option>
                                    <option value="F-PP 01">F-PP 01</option>
                                    <option value="F-PP 02">F-PP 02</option>
                                    <option value="F-PT 01">F-PT 01</option>
                                    <option value="F-PT 02">F-PT 02</option>
                                    <option value="F-AT 02">F-AT 02</option>
                                    <option value="F-IF 01">F-IF 01</option>
                                    <option value="F-EN 01">F-EN 01</option>
                                    <option value="VISUAL">VISUAL</option>
                                  </select>
                                </fieldset>
                                <br>
                              </div>
                            </div>

                            <div id="flotanteC15" style="display:none;">
                              <div id="closeC15">
                                <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                  <legend>
                                    <label>No.</label><input type="text" name="no1_15" id="no1_15" value="15" style="font-size: 12pt; width : 30px" readonly>
                                  </legend>
                                    <label>PRODUCTO:</label>
                                    <select  class="prod" name="pod1_15" id="pod1_15">
                                      <option value="">------------------------------------------------</option>
                                      <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                      <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                      <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                      <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                      <option value="ALTURA INT.">ALTURA INT.</option>
                                      <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                      <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                      <option value="CONCAVIDAD">CONCAVIDAD</option>
                                      <option value="CABECEO">CABECEO</option>
                                      <option value="CURVA MINIMA">CURVA MINIMA</option>
                                      <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                      <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                      <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                      <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                      <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                      <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                      <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                      <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                      <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                      <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                      <option value="ESPESOR BASE">ESPESOR BASE</option>
                                      <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                      <option value="ESTAMPADO">ESTAMPADO</option>
                                      <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                      <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                      <option value="PLANICIDAD">PLANICIDAD</option>
                                      <option value="REDONDEZ">REDONDEZ</option>
                                      <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                      <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                      <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                      <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                      <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>PROCESO:</label>
                                    <select  class="proceso" name="proceso1_15" id="proceso1_15">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                      <option value="INSPECCIÓN">INSPECCIÓN</option>
                                      <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                      <option value="TROQUELADO">TROQUELADO</option>
                                      <option value="SEPARACIÓN">SEPARACIÓN</option>
                                      <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                      <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                    </select>
                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                    <select  class="responsable" name="Res1_15" id="Res1_15">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                      <option value="CORTADOR">CORTADOR</option>
                                      <option value="INSTALADOR">INSTALADOR</option>
                                      <option value="AUDITOR">AUDITOR</option>
                                      <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                      <option value="OPERADOR">OPERADOR</option>
                                      <option value="INSPECTOR">INSPECTOR</option>
                                      <option value="LOGÍSTICA">LOGÍSTICA</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <select  class="clas" name="clas1_15" id="clas1_15">
                                      <option value="">---</option>
                                      <option value="M">M</option>
                                      <option value="C">C</option>
                                    </select>
                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacionPLG1_15" id="especificacionPLG1_15"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <select  class="evalucacion" name="evaluacion1_15" id="evaluacion1_15">
                                      <option value="">------------------------------------</option>
                                      <option value="VISUAL">VISUAL</option>
                                      <option value="BASCULA">BASCULA</option>
                                      <option value="VERNIER">VERNIER</option>
                                      <option value="MANUAL">MANUAL</option>
                                      <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                      <option value="MICRÓMETRO">MICRÓMETRO</option>
                                      <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                      <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                      <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                      <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                    </select>
                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                        <label>TAMAÑO:</label>
                                        <input type="text" name="tamaño1_15" id="tamaño1_15"  style="width : 50px"><br>

                                        <label>FRECUENCIA:</label>
                                        <select  class="fre" name="fre1_15" id="fre1_15">
                                          <option value="">------------------------------------------------------</option>
                                          <option value="CADA LOTE">CADA LOTE</option>
                                          <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                          <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                          <option value="INICIO">INICIO</option>
                                          <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                          <option value="C/30 MIN.">C/30 MIN.</option>
                                          <option value="INSPECCION">INSPECCION</option>
                                          <option value="CADA ORDEN">CADA ORDEN</option>
                                          <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                        </select>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_15" id="metodoC1_15">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                              </fieldset>
                              <br>
                            </div>
                          </div>

                            <div id="flotanteC16" style="display:none;">
                              <div id="closeC16">
                                <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                  <legend>
                                    <label>No.</label><input type="text" name="no1_16" id="no1_16" value="16" style="font-size: 12pt; width : 30px" readonly>
                                  </legend>
                                    <label>PRODUCTO:</label>
                                    <select  class="prod" name="pod1_16" id="pod1_16">
                                      <option value="">------------------------------------------------</option>
                                      <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                      <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                      <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                      <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                      <option value="ALTURA INT.">ALTURA INT.</option>
                                      <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                      <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                      <option value="CONCAVIDAD">CONCAVIDAD</option>
                                      <option value="CABECEO">CABECEO</option>
                                      <option value="CURVA MINIMA">CURVA MINIMA</option>
                                      <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                      <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                      <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                      <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                      <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                      <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                      <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                      <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                      <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                      <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                      <option value="ESPESOR BASE">ESPESOR BASE</option>
                                      <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                      <option value="ESTAMPADO">ESTAMPADO</option>
                                      <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                      <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                      <option value="PLANICIDAD">PLANICIDAD</option>
                                      <option value="REDONDEZ">REDONDEZ</option>
                                      <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                      <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                      <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                      <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                      <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>PROCESO:</label>
                                    <select  class="proceso" name="proceso1_16" id="proceso1_16">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                      <option value="INSPECCIÓN">INSPECCIÓN</option>
                                      <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                      <option value="TROQUELADO">TROQUELADO</option>
                                      <option value="SEPARACIÓN">SEPARACIÓN</option>
                                      <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                      <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                    </select>
                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                    <select  class="responsable" name="Res1_16" id="Res1_16">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                      <option value="CORTADOR">CORTADOR</option>
                                      <option value="INSTALADOR">INSTALADOR</option>
                                      <option value="AUDITOR">AUDITOR</option>
                                      <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                      <option value="OPERADOR">OPERADOR</option>
                                      <option value="INSPECTOR">INSPECTOR</option>
                                      <option value="LOGÍSTICA">LOGÍSTICA</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <select  class="clas" name="clas1_16" id="clas1_16">
                                      <option value="">---</option>
                                      <option value="M">M</option>
                                      <option value="C">C</option>
                                    </select>
                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacionPLG1_16" id="especificacionPLG1_16"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <select  class="evalucacion" name="evaluacion1_16" id="evaluacion1_16">
                                      <option value="">------------------------------------</option>
                                      <option value="VISUAL">VISUAL</option>
                                      <option value="BASCULA">BASCULA</option>
                                      <option value="VERNIER">VERNIER</option>
                                      <option value="MANUAL">MANUAL</option>
                                      <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                      <option value="MICRÓMETRO">MICRÓMETRO</option>
                                      <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                      <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                      <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                      <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                    </select>
                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                        <label>TAMAÑO:</label>
                                        <input type="text" name="tamaño1_16" id="tamaño1_16"  style="width : 50px"><br>

                                        <label>FRECUENCIA:</label>
                                        <select  class="fre" name="fre1_16" id="fre1_16">
                                          <option value="">------------------------------------------------------</option>
                                          <option value="CADA LOTE">CADA LOTE</option>
                                          <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                          <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                          <option value="INICIO">INICIO</option>
                                          <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                          <option value="C/30 MIN.">C/30 MIN.</option>
                                          <option value="INSPECCION">INSPECCION</option>
                                          <option value="CADA ORDEN">CADA ORDEN</option>
                                          <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                        </select>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_16" id="metodoC1_16">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                              </fieldset>
                              <br>
                            </div>
                          </div>

                          <div id="flotanteC17" style="display:none;">
                            <div id="closeC17">
                              <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                <legend>
                                  <label>No.</label><input type="text" name="no1.17" id="no1.17" value="17" style="font-size: 12pt; width : 30px" readonly>
                                </legend>
                                  <label>PRODUCTO:</label>
                                  <select  class="prod" name="pod1_17" id="pod1_17">
                                    <option value="">------------------------------------------------</option>
                                    <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                    <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                    <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                    <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                    <option value="ALTURA INT.">ALTURA INT.</option>
                                    <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                    <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                    <option value="CONCAVIDAD">CONCAVIDAD</option>
                                    <option value="CABECEO">CABECEO</option>
                                    <option value="CURVA MINIMA">CURVA MINIMA</option>
                                    <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                    <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                    <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                    <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                    <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                    <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                    <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                    <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                    <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                    <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                    <option value="ESPESOR BASE">ESPESOR BASE</option>
                                    <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                    <option value="ESTAMPADO">ESTAMPADO</option>
                                    <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                    <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                    <option value="PLANICIDAD">PLANICIDAD</option>
                                    <option value="REDONDEZ">REDONDEZ</option>
                                    <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                    <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                    <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                    <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                    <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>PROCESO:</label>
                                  <select  class="proceso" name="proceso1_17" id="proceso1_17">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                    <option value="INSPECCIÓN">INSPECCIÓN</option>
                                    <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                    <option value="TROQUELADO">TROQUELADO</option>
                                    <option value="SEPARACIÓN">SEPARACIÓN</option>
                                    <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                    <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                  </select>
                                  <br><br>
                                  <label>RESPONSABLE:</label>
                                  <select  class="responsable" name="Res1_17" id="Res1_17">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                    <option value="CORTADOR">CORTADOR</option>
                                    <option value="INSTALADOR">INSTALADOR</option>
                                    <option value="AUDITOR">AUDITOR</option>
                                    <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                    <option value="OPERADOR">OPERADOR</option>
                                    <option value="INSPECTOR">INSPECTOR</option>
                                    <option value="LOGÍSTICA">LOGÍSTICA</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                  <select  class="clas" name="clas1_17" id="clas1_17">
                                    <option value="">---</option>
                                    <option value="M">M</option>
                                    <option value="C">C</option>
                                  </select>
                                  <br><br>
                                  <div align='center'>
                                    <label>MÉTODOS</label>
                                  </div>
                                    <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                    <input type="text" name="especificacionPLG1_17" id="especificacionPLG1_17"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                  <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                  <select  class="evalucacion" name="evaluacion1_17" id="evaluacion1_17">
                                    <option value="">------------------------------------</option>
                                    <option value="VISUAL">VISUAL</option>
                                    <option value="BASCULA">BASCULA</option>
                                    <option value="VERNIER">VERNIER</option>
                                    <option value="MANUAL">MANUAL</option>
                                    <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                    <option value="MICRÓMETRO">MICRÓMETRO</option>
                                    <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                    <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                    <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                    <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                  </select>
                                  <br><br>
                                  <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                      <legend><label>MUESTRA</label></legend>

                                      <label>TAMAÑO:</label>
                                      <input type="text" name="tamaño1_17" id="tamaño1_17"  style="width : 50px"><br>

                                      <label>FRECUENCIA:</label>
                                      <select  class="fre" name="fre1_17" id="fre1_17">
                                        <option value="">------------------------------------------------------</option>
                                        <option value="CADA LOTE">CADA LOTE</option>
                                        <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                        <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                        <option value="INICIO">INICIO</option>
                                        <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                        <option value="C/30 MIN.">C/30 MIN.</option>
                                        <option value="INSPECCION">INSPECCION</option>
                                        <option value="CADA ORDEN">CADA ORDEN</option>
                                        <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                      </select>
                              </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_17" id="metodoC1_17">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                              </fieldset>
                              <br>
                            </div>
                          </div>

                          <div id="flotanteC18" style="display:none;">
                            <div id="closeC18">
                              <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                <legend>
                                  <label>No.</label><input type="text" name="no1_18" id="no1_18" value="18" style="font-size: 12pt; width : 30px" readonly>
                                </legend>
                                  <label>PRODUCTO:</label>
                                  <select  class="prod" name="pod1_18" id="pod1_18">
                                    <option value="">------------------------------------------------</option>
                                    <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                    <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                    <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                    <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                    <option value="ALTURA INT.">ALTURA INT.</option>
                                    <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                    <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                    <option value="CONCAVIDAD">CONCAVIDAD</option>
                                    <option value="CABECEO">CABECEO</option>
                                    <option value="CURVA MINIMA">CURVA MINIMA</option>
                                    <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                    <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                    <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                    <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                    <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                    <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                    <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                    <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                    <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                    <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                    <option value="ESPESOR BASE">ESPESOR BASE</option>
                                    <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                    <option value="ESTAMPADO">ESTAMPADO</option>
                                    <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                    <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                    <option value="PLANICIDAD">PLANICIDAD</option>
                                    <option value="REDONDEZ">REDONDEZ</option>
                                    <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                    <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                    <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                    <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                    <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>PROCESO:</label>
                                  <select  class="proceso" name="proceso1_18" id="proceso1_18">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                    <option value="INSPECCIÓN">INSPECCIÓN</option>
                                    <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                    <option value="TROQUELADO">TROQUELADO</option>
                                    <option value="SEPARACIÓN">SEPARACIÓN</option>
                                    <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                    <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                  </select>
                                  <br><br>
                                  <label>RESPONSABLE:</label>
                                  <select  class="responsable" name="Res1_18" id="Res1_18">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                    <option value="CORTADOR">CORTADOR</option>
                                    <option value="INSTALADOR">INSTALADOR</option>
                                    <option value="AUDITOR">AUDITOR</option>
                                    <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                    <option value="OPERADOR">OPERADOR</option>
                                    <option value="INSPECTOR">INSPECTOR</option>
                                    <option value="LOGÍSTICA">LOGÍSTICA</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                  <select  class="clas" name="clas1_18" id="clas1_18">
                                    <option value="">---</option>
                                    <option value="M">M</option>
                                    <option value="C">C</option>
                                  </select>
                                  <br><br>
                                  <div align='center'>
                                    <label>MÉTODOS</label>
                                  </div>
                                    <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                    <input type="text" name="especificacionPLG1_18" id="especificacionPLG1_18"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                  <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                  <select  class="evalucacion" name="evaluacion1_18" id="evaluacion1_18">
                                    <option value="">------------------------------------</option>
                                    <option value="VISUAL">VISUAL</option>
                                    <option value="BASCULA">BASCULA</option>
                                    <option value="VERNIER">VERNIER</option>
                                    <option value="MANUAL">MANUAL</option>
                                    <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                    <option value="MICRÓMETRO">MICRÓMETRO</option>
                                    <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                    <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                    <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                    <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                  </select>
                                  <br><br>
                                  <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                      <legend><label>MUESTRA</label></legend>

                                        <label>TAMAÑO:</label>
                                        <input type="number" name="tamaño1_18" id="tamaño1_18"  style="width : 50px"><br>

                                        <label>FRECUENCIA:</label>
                                        <select  class="fre" name="fre1_18" id="fre1_18">
                                          <option value="">------------------------------------------------------</option>
                                          <option value="CADA LOTE">CADA LOTE</option>
                                          <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                          <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                          <option value="INICIO">INICIO</option>
                                          <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                          <option value="C/30 MIN.">C/30 MIN.</option>
                                          <option value="INSPECCION">INSPECCION</option>
                                          <option value="CADA ORDEN">CADA ORDEN</option>
                                          <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                        </select>
                              </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_18" id="metodoC1_18">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                              </fieldset>
                              <br>
                            </div>
                          </div>

                          <div id="flotanteC19" style="display:none;">
                            <div id="closeC19">
                              <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                <legend>
                                  <label>No.</label><input type="text" name="no1_19" id="no1_19" value="19" style="font-size: 12pt; width : 30px" readonly>
                                </legend>
                                  <label>PRODUCTO:</label>
                                  <select  class="prod" name="pod1_19" id="pod1_19">
                                    <option value="">------------------------------------------------</option>
                                    <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                    <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                    <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                    <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                    <option value="ALTURA INT.">ALTURA INT.</option>
                                    <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                    <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                    <option value="CONCAVIDAD">CONCAVIDAD</option>
                                    <option value="CABECEO">CABECEO</option>
                                    <option value="CURVA MINIMA">CURVA MINIMA</option>
                                    <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                    <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                    <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                    <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                    <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                    <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                    <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                    <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                    <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                    <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                    <option value="ESPESOR BASE">ESPESOR BASE</option>
                                    <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                    <option value="ESTAMPADO">ESTAMPADO</option>
                                    <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                    <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                    <option value="PLANICIDAD">PLANICIDAD</option>
                                    <option value="REDONDEZ">REDONDEZ</option>
                                    <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                    <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                    <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                    <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                    <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>PROCESO:</label>
                                  <select  class="proceso" name="proceso1_19" id="proceso1_19">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                    <option value="INSPECCIÓN">INSPECCIÓN</option>
                                    <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                    <option value="TROQUELADO">TROQUELADO</option>
                                    <option value="SEPARACIÓN">SEPARACIÓN</option>
                                    <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                    <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                  </select>
                                  <br><br>
                                  <label>RESPONSABLE:</label>
                                  <select  class="responsable" name="Res1_19" id="Res1_19">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                    <option value="CORTADOR">CORTADOR</option>
                                    <option value="INSTALADOR">INSTALADOR</option>
                                    <option value="AUDITOR">AUDITOR</option>
                                    <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                    <option value="OPERADOR">OPERADOR</option>
                                    <option value="INSPECTOR">INSPECTOR</option>
                                    <option value="LOGÍSTICA">LOGÍSTICA</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                  <select  class="clas" name="clas1_19" id="clas1_19">
                                    <option value="">---</option>
                                    <option value="M">M</option>
                                    <option value="C">C</option>
                                  </select>
                                  <br><br>
                                  <div align='center'>
                                    <label>MÉTODOS</label>
                                  </div>
                                    <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                    <input type="text" name="especificacionPLG1_19" id="especificacionPLG1_19"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                  <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                  <select  class="evalucacion" name="evaluacion1_19" id="evaluacion1_19">
                                    <option value="">------------------------------------</option>
                                    <option value="VISUAL">VISUAL</option>
                                    <option value="BASCULA">BASCULA</option>
                                    <option value="VERNIER">VERNIER</option>
                                    <option value="MANUAL">MANUAL</option>
                                    <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                    <option value="MICRÓMETRO">MICRÓMETRO</option>
                                    <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                    <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                    <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                    <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                  </select>
                                  <br><br>
                                  <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                      <legend><label>MUESTRA</label></legend>

                                      <label>TAMAÑO:</label>
                                      <input type="text" name="tamaño1_19" id="tamaño1_19"  style="width : 50px"><br>

                                      <label>FRECUENCIA:</label>
                                      <select  class="fre" name="fre1_19" id="fre1_19">
                                        <option value="">------------------------------------------------------</option>
                                        <option value="CADA LOTE">CADA LOTE</option>
                                        <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                        <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                        <option value="INICIO">INICIO</option>
                                        <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                        <option value="C/30 MIN.">C/30 MIN.</option>
                                        <option value="INSPECCION">INSPECCION</option>
                                        <option value="CADA ORDEN">CADA ORDEN</option>
                                        <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                      </select>
                              </fieldset><br>

                              <label>MÉTODO DE CONTROL</label>
                              <select  class="metodoC" name="metodoC1_19" id="metodoC1_19">
                                <option value="">------------</option>
                                <option value="F-IR 01">F-IR 01</option>
                                <option value="F-PP 01">F-PP 01</option>
                                <option value="F-PP 02">F-PP 02</option>
                                <option value="F-PT 01">F-PT 01</option>
                                <option value="F-PT 02">F-PT 02</option>
                                <option value="F-AT 02">F-AT 02</option>
                                <option value="F-IF 01">F-IF 01</option>
                                <option value="F-EN 01">F-EN 01</option>
                                <option value="VISUAL">VISUAL</option>
                              </select>
                            </fieldset>
                            <br>
                          </div>
                          </div>

                          <div id="flotanteC20" style="display:none;">
                            <div id="closeC20">
                              <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                <legend>
                                  <label>No.</label><input type="text" name="no1_20" id="no1_20" value="20" style="font-size: 12pt; width : 30px" readonly>
                                </legend>
                                  <label>PRODUCTO:</label>
                                  <select  class="prod" name="pod1_20" id="pod1_20">
                                    <option value="">------------------------------------------------</option>
                                    <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                    <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                    <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                    <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                    <option value="ALTURA INT.">ALTURA INT.</option>
                                    <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                    <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                    <option value="CONCAVIDAD">CONCAVIDAD</option>
                                    <option value="CABECEO">CABECEO</option>
                                    <option value="CURVA MINIMA">CURVA MINIMA</option>
                                    <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                    <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                    <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                    <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                    <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                    <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                    <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                    <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                    <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                    <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                    <option value="ESPESOR BASE">ESPESOR BASE</option>
                                    <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                    <option value="ESTAMPADO">ESTAMPADO</option>
                                    <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                    <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                    <option value="PLANICIDAD">PLANICIDAD</option>
                                    <option value="REDONDEZ">REDONDEZ</option>
                                    <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                    <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                    <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                    <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                    <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>PROCESO:</label>
                                  <select  class="proceso" name="proceso1_20" id="proceso1_20">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                    <option value="INSPECCIÓN">INSPECCIÓN</option>
                                    <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                    <option value="TROQUELADO">TROQUELADO</option>
                                    <option value="SEPARACIÓN">SEPARACIÓN</option>
                                    <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                    <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                  </select>
                                  <br><br>
                                  <label>RESPONSABLE:</label>
                                  <select  class="responsable" name="Res1_20" id="Res1_20">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                    <option value="CORTADOR">CORTADOR</option>
                                    <option value="INSTALADOR">INSTALADOR</option>
                                    <option value="AUDITOR">AUDITOR</option>
                                    <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                    <option value="OPERADOR">OPERADOR</option>
                                    <option value="INSPECTOR">INSPECTOR</option>
                                    <option value="LOGÍSTICA">LOGÍSTICA</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                  <select  class="clas" name="clas1_20" id="clas1_20">
                                    <option value="">---</option>
                                    <option value="M">M</option>
                                    <option value="C">C</option>
                                  </select>
                                  <br><br>
                                  <div align='center'>
                                    <label>MÉTODOS</label>
                                  </div>
                                    <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                    <input type="text" name="especificacionPLG1_20" id="especificacionPLG1_20"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                  <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                  <select  class="evalucacion" name="evaluacion1_20" id="evaluacion1_20">
                                    <option value="">------------------------------------</option>
                                    <option value="VISUAL">VISUAL</option>
                                    <option value="BASCULA">BASCULA</option>
                                    <option value="VERNIER">VERNIER</option>
                                    <option value="MANUAL">MANUAL</option>
                                    <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                    <option value="MICRÓMETRO">MICRÓMETRO</option>
                                    <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                    <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                    <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                    <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                  </select>
                                  <br><br>
                                  <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                      <legend><label>MUESTRA</label></legend>

                                      <label>TAMAÑO:</label>
                                      <input type="text" name="tamaño1_20" id="tamaño1_20"  style="width : 50px"><br>

                                      <label>FRECUENCIA:</label>
                                      <select  class="fre" name="fre1_20" id="fre1_20">
                                        <option value="">------------------------------------------------------</option>
                                        <option value="CADA LOTE">CADA LOTE</option>
                                        <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                        <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                        <option value="INICIO">INICIO</option>
                                        <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                        <option value="C/30 MIN.">C/30 MIN.</option>
                                        <option value="INSPECCION">INSPECCION</option>
                                        <option value="CADA ORDEN">CADA ORDEN</option>
                                        <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                      </select>
                              </fieldset><br>

                              <label>MÉTODO DE CONTROL</label>
                              <select  class="metodoC" name="metodoC1_20" id="metodoC1_20">
                                <option value="">------------</option>
                                <option value="F-IR 01">F-IR 01</option>
                                <option value="F-PP 01">F-PP 01</option>
                                <option value="F-PP 02">F-PP 02</option>
                                <option value="F-PT 01">F-PT 01</option>
                                <option value="F-PT 02">F-PT 02</option>
                                <option value="F-AT 02">F-AT 02</option>
                                <option value="F-IF 01">F-IF 01</option>
                                <option value="F-EN 01">F-EN 01</option>
                                <option value="VISUAL">VISUAL</option>
                              </select>
                            </fieldset>
                          </div>
                        </div>
                  </fieldset>  <?php //primero termino ?>

                </div>

              </div>

                <br>

                  <style type="text/css">
                    .boton_1{
                      text-decoration: none;
                      padding: 3px;
                      padding-left: 10px;
                      padding-right: 10px;
                      font-family: helvetica;
                      font-weight: 300;
                      font-size: 18px;
                      font-style: italic;
                      color: #006505;
                      background-color: #3498DB;
                      border-radius: 15px;
                      border: 3px double #006505;
                    }
                    .boton_1:hover{
                      opacity: 0.6;
                      text-decoration: none;
                    }
                    .boton_2{
                      text-decoration: none;
                      padding: 3px;
                      padding-left: 10px;
                      padding-right: 10px;
                      font-family: helvetica;
                      font-weight: 300;
                      font-size: 18px;
                      font-style: italic;
                      color: #DA0E0B;
                      background-color: #3498DB;
                      border-radius: 15px;
                      border: 3px double #DA0E0B;
                    }
                    .boton_2:hover{
                      opacity: 0.6;
                      text-decoration: none;
                    }
                  </style>
                  <br>
                  <div align='center'>
                    <a class="boton_2" name="boton_2" href="/produccion/ComponentesPCInt.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
              <?php $queryT = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0020' AND componente='$componente'";
                      $resultT = $conexion -> query($queryT);
                      if($resultT -> num_rows > 0){?>
                              <button type='submit'  class='boton_1' onclick="this.form.action='guardarPlanC.php';this.form.submit();"><img src='/produccion/img/guardar.png' width='20' height='20'  />FINALIZAR</button>
                      <?php }else { ?>
                              <button type='submit'  class='boton_1'  onclick="this.form.action='GenerarPC0030.php';this.form.submit();"><img src='/produccion/img/guardar.png' width='20' height='20' />SIGUIENTE</button>
                    <?php   } ?>
                  </div>
                <br><br><br>
          </form>
       </body>
      </html>
      <?php


      $conexion ->close();

      ?>
      <!DOCTYPE html>
      <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>

        <script type="text/javascript">

            function mostrarCaract() {

                const selectElement = document.querySelector('.noC');
                    var res  = `${event.target.value}`;

                     if(res == '1'){

                         div = document.getElementById('flotanteC1');
                         div.style.display = '';
                         div = document.getElementById('flotanteC2');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC3');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC4');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC5');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC6');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC7');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC8');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC9');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC10');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC11');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC12');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC13');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC14');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC15');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC16');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC17');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC18');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC19');
                         div.style.display = 'none';
                         div = document.getElementById('flotanteC20');
                         div.style.display = 'none';

                      }else if(res == '2'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC4');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC5');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC6');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC7');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC8');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '3'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC5');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC6');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC7');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC8');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '4'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC6');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC7');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC8');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '5'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC7');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC8');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '6'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC8');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '7'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '8'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '9'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '10'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '11'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '12'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '13'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '14'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = '';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '15'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = '';
                          div = document.getElementById('flotanteC15');
                          div.style.display = '';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '16'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = '';
                          div = document.getElementById('flotanteC15');
                          div.style.display = '';
                          div = document.getElementById('flotanteC16');
                          div.style.display = '';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '17'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = '';
                          div = document.getElementById('flotanteC15');
                          div.style.display = '';
                          div = document.getElementById('flotanteC16');
                          div.style.display = '';
                          div = document.getElementById('flotanteC17');
                          div.style.display = '';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '18'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = '';
                          div = document.getElementById('flotanteC15');
                          div.style.display = '';
                          div = document.getElementById('flotanteC16');
                          div.style.display = '';
                          div = document.getElementById('flotanteC17');
                          div.style.display = '';
                          div = document.getElementById('flotanteC18');
                          div.style.display = '';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '19'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = '';
                          div = document.getElementById('flotanteC15');
                          div.style.display = '';
                          div = document.getElementById('flotanteC16');
                          div.style.display = '';
                          div = document.getElementById('flotanteC17');
                          div.style.display = '';
                          div = document.getElementById('flotanteC18');
                          div.style.display = '';
                          div = document.getElementById('flotanteC19');
                          div.style.display = '';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }else if(res == '20'){
                          div = document.getElementById('flotanteC1');
                          div.style.display = '';
                          div = document.getElementById('flotanteC2');
                          div.style.display = '';
                          div = document.getElementById('flotanteC3');
                          div.style.display = '';
                          div = document.getElementById('flotanteC4');
                          div.style.display = '';
                          div = document.getElementById('flotanteC5');
                          div.style.display = '';
                          div = document.getElementById('flotanteC6');
                          div.style.display = '';
                          div = document.getElementById('flotanteC7');
                          div.style.display = '';
                          div = document.getElementById('flotanteC8');
                          div.style.display = '';
                          div = document.getElementById('flotanteC9');
                          div.style.display = '';
                          div = document.getElementById('flotanteC10');
                          div.style.display = '';
                          div = document.getElementById('flotanteC11');
                          div.style.display = '';
                          div = document.getElementById('flotanteC12');
                          div.style.display = '';
                          div = document.getElementById('flotanteC13');
                          div.style.display = '';
                          div = document.getElementById('flotanteC14');
                          div.style.display = '';
                          div = document.getElementById('flotanteC15');
                          div.style.display = '';
                          div = document.getElementById('flotanteC16');
                          div.style.display = '';
                          div = document.getElementById('flotanteC17');
                          div.style.display = '';
                          div = document.getElementById('flotanteC18');
                          div.style.display = '';
                          div = document.getElementById('flotanteC19');
                          div.style.display = '';
                          div = document.getElementById('flotanteC20');
                          div.style.display = '';
                      }else {
                          div = document.getElementById('flotanteC1');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC2');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC3');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC4');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC5');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC6');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC7');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC8');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC9');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC10');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC11');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC12');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC13');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC14');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC15');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC16');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC17');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC18');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC19');
                          div.style.display = 'none';
                          div = document.getElementById('flotanteC20');
                          div.style.display = 'none';
                      }
            }

            function validacion() {

      //-------------------------------------------------------------------------------------------------------
            NomProceso = document.getElementById("NomProceso10_1").value;
            if( NomProceso == null || NomProceso.length == 0 || /^\s+$/.test(NomProceso) ) {
                alert('FAVOR DE LLENAR EL CAMPO: NOMBRE DEL PROCESO / DESCRIPCIÓN DE OPERACIÓN');
              return false;
            }
      //----------------------------------------------------------------------------------------------------------
            dispositivo = document.getElementsByName("dispositivo10_1");

            var seleccionado = false;
            for(var i=0; i<dispositivo.length; i++) {
              if(dispositivo[i].checked) {
                seleccionado = true;
                break;
              }
            }

            if(!seleccionado) {
              alert('FAVOR DE LLENAR EL CAMPO: MÁQUINA O DISPOSITIVO PARA MANUFACTURA');
              return false;
            }
      //----------------------------------------------------------------------------------------------------------
            num = document.getElementById("noC10_1").selectedIndex;



            if (num == '1') {
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '2') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '3') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }

            }else if (num == '4') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '5') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '6') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '7') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '8') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '9') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '10') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '11') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '12') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '13') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '14') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //14
              proceso = document.getElementById("proceso1_14").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_14").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_14").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_14").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_14").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_14").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_14").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '15') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //14
              proceso = document.getElementById("proceso1_14").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_14").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_14").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_14").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_14").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_14").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_14").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //15
              proceso = document.getElementById("proceso1_15").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_15").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_15").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_15").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_15").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_15").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_15").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '16') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //14
              proceso = document.getElementById("proceso1_14").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_14").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_14").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_14").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_14").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_14").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_14").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //15
              proceso = document.getElementById("proceso1_15").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_15").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_15").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_15").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_15").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_15").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_15").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //16
              proceso = document.getElementById("proceso1_16").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_16").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_16").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_16").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_16").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_16").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_16").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '17') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //14
              proceso = document.getElementById("proceso1_14").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_14").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_14").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_14").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_14").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_14").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_14").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //15
              proceso = document.getElementById("proceso1_15").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_15").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_15").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_15").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_15").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_15").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_15").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //16
              proceso = document.getElementById("proceso1_16").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_16").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_16").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_16").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_16").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_16").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_16").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //17
              proceso = document.getElementById("proceso1_17").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_17").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_17").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_17").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_17").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_17").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_17").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '18') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //14
              proceso = document.getElementById("proceso1_14").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_14").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_14").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_14").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_14").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_14").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_14").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //15
              proceso = document.getElementById("proceso1_15").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_15").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_15").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_15").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_15").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_15").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_15").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //16
              proceso = document.getElementById("proceso1_16").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_16").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_16").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_16").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_16").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_16").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_16").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //17
              proceso = document.getElementById("proceso1_17").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_17").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_17").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_17").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_17").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_17").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_17").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //18
              proceso = document.getElementById("proceso1_18").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_18").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_18").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_18").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_18").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_18").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_18").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_18").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '19') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //14
              proceso = document.getElementById("proceso1_14").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_14").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_14").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_14").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_14").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_14").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_14").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //15
              proceso = document.getElementById("proceso1_15").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_15").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_15").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_15").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_15").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_15").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_15").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //16
              proceso = document.getElementById("proceso1_16").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_16").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_16").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_16").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_16").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_16").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_16").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //17
              proceso = document.getElementById("proceso1_17").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_17").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_17").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_17").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_17").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_17").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_17").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //18
              proceso = document.getElementById("proceso1_18").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_18").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_18").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_18").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_18").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_18").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_18").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_18").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //19
              proceso = document.getElementById("proceso1_19").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_19").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_19").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_19").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_19").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_19").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_19").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_19").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else if (num == '19') {
              //1
              producto = document.getElementById("pod1_1").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_1").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_1").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_1").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_1").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_1").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_1").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_1").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //2
              producto = document.getElementById("pod1_2").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_2").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_2").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_2").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_2").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_2").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_2").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_2").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //3
              producto = document.getElementById("pod1_3").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_3").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_3").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_3").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_3").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_3").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_3").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_3").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //4
              producto = document.getElementById("pod1_4").selectedIndex;
              if( producto == null || producto == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
                return false;
              }
              proceso = document.getElementById("proceso1_4").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_4").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_4").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_4").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_4").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_4").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_4").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //5
              proceso = document.getElementById("proceso1_5").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_5").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_5").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_5").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_5").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_5").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_5").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //6
              proceso = document.getElementById("proceso1_6").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_6").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_6").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_6").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_6").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_6").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_6").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //7
              proceso = document.getElementById("proceso1_7").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_7").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_7").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_7").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_7").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_7").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_7").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //8
              proceso = document.getElementById("proceso1_8").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_8").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_8").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_8").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_8").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_8").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_8").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //9
              proceso = document.getElementById("proceso1_9").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_9").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_9").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_9").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_9").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_9").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_9").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //10
              proceso = document.getElementById("proceso1_10").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_10").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_10").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_10").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_10").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_10").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //11
              proceso = document.getElementById("proceso1_11").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_11").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_10").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_11").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_11").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_11").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_11").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //12
              proceso = document.getElementById("proceso1_12").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_12").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_12").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_12").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_12").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_12").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_12").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //13
              proceso = document.getElementById("proceso1_13").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_13").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_13").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_13").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_13").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_13").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_13").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //14
              proceso = document.getElementById("proceso1_14").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_14").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_14").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_14").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_14").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_14").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_14").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //15
              proceso = document.getElementById("proceso1_15").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_15").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_15").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_15").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_15").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_15").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_15").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //16
              proceso = document.getElementById("proceso1_16").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_16").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_16").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_16").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_16").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_16").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_16").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //17
              proceso = document.getElementById("proceso1_17").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_17").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_17").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_17").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_17").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_17").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_17").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //18
              proceso = document.getElementById("proceso1_18").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_18").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_18").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_18").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_18").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_18").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_18").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_18").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //19
              proceso = document.getElementById("proceso1_19").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_19").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_19").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_19").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_19").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_19").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_19").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_19").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
              //20
              proceso = document.getElementById("proceso1_20").selectedIndex;
              if( proceso == null || proceso == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
                return false;
              }
              responsable = document.getElementById("Res1_20").selectedIndex;
              if( responsable == null || responsable == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
                return false;
              }
              clas = document.getElementById("clas1_20").selectedIndex;
              if( clas == null || clas == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
                return false;
              }
              espe = document.getElementById("especificacionPLG1_20").value;
              if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
                return false;
              }
              evaluacion = document.getElementById("evaluacion1_20").selectedIndex;
              if( evaluacion == null || evaluacion == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
                return false;
              }
              tamaño = document.getElementById("tamaño1_20").value;
              if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
                return false;
              }
              frecuencia = document.getElementById("fre1_20").selectedIndex;
              if( frecuencia == null || frecuencia == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
                return false;
              }
              metodo = document.getElementById("metodoC1_20").selectedIndex;
              if( metodo == null || metodo == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
                return false;
              }
            }else{
              no = document.getElementById("noC10_1").selectedIndex;
              if( no == null || no == 0 ) {
                alert('FAVOR DE SELECCIONAR No.');
                return false;
              }
            }

          }

        </script>
      </head>
    <body>
  </body>
</html>
