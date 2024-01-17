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

//Descripcion 0010
$parte10 =$_POST['parte10'];
$NomProceso10_1 = $_POST['NomProceso10_1'];
$dispositivo10_1 = $_POST['dispositivo10_1'];

//Descripcion2
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

     echo "<center><h1>Datos Guardados<h1>";
       echo "<form action='/produccion/ComponentesPCInt.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
        </form>";

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR PLAN DE CONTROL</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">

   </body>
 </html>
