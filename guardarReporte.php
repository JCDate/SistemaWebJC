<?php

header("Content-Type: text/html;charset=utf-8");
$salida = "";
if (!($conexion = mysqli_connect("localhost", "root", "" )))
{
  echo "Error conectando a la base de datos.";
  exit();
}

if (!($db = mysqli_select_db( $conexion, "jc_mysql")))
{
  echo "Error seleccionando la base de datos.";
  exit();
}
mysqli_set_charset($conexion,"UTF8");

  $fecha = $_POST['fecha'];
  $componente = $_POST['componente'];
  $troquel = $_POST['troquel'];
  $NoOperacion = $_POST['NoOperacion'];
  $elabora = $_POST['elabora'];
  $cumple1 = $_POST['cumple1'];
  $cumple2 = $_POST['cumple2'];
  $comentario1 = $_POST['comentario1'];
  $cumple3 = $_POST['cumple3'];
  $cumple4 = $_POST['cumple4'];
  $cumple5 = $_POST['cumple5'];
  $comentario2 = $_POST['comentario2'];
  $cumple6 = $_POST['cumple6'];
  $cumple7 = $_POST['cumple7'];
  $cumple8 = $_POST['cumple8'];
  $comentario3 = $_POST['comentario3'];
  $cumple9 = $_POST['cumple9'];
  $cumple10 = $_POST['cumple10'];
  $cumple11 = $_POST['cumple11'];
  $comentario4 = $_POST['comentario4'];
  $cumple12 = $_POST['cumple12'];
  $cumple13 = $_POST['cumple13'];
  $cumple14 = $_POST['cumple14'];
  $cumple15 = $_POST['cumple15'];
  $cumple16 = $_POST['cumple16'];
  $cumple17 = $_POST['cumple17'];
  $cumple18 = $_POST['cumple18'];
  $comentario5 = $_POST['comentario5'];
  $cumple19 = $_POST['cumple19'];
  $cumple20 = $_POST['cumple20'];
  $cumple21 = $_POST['cumple21'];
  $comentario6 = $_POST['comentario6'];
  $cumple22 = $_POST['cumple22'];
  $cumple23 = $_POST['cumple23'];
  $comentario7 = $_POST['comentario7'];

if($fecha and  $componente and $troquel and $NoOperacion and $elabora and $cumple1 and $cumple2 and $cumple3 and $cumple4 and $cumple5 and $cumple6 and $cumple7 and $cumple8 and $cumple9 and $cumple10 and $cumple11 and $cumple12 and $cumple13 and $cumple14 and $cumple15 and $cumple16 and $cumple17 and $cumple18 and $cumple19 and $cumple20 and $cumple21){

    $consulta = "INSERT INTO reportechecklistt (fecha,componente,	troquel, NoOperacion, elabora) VALUES('$fecha','$componente','$troquel','$NoOperacion' ,'$elabora')";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE reportechecklistt JOIN crs ON crs.componente = reportechecklistt.componente SET reportechecklistt.cr = crs.cr";
      $result2 = $conexion -> query($consulta2);

    $consulta3 = "INSERT INTO areasCheckListT (fecha,componente,troquel,numOperaciones,elaboro,p1,p2,comentario1,p3,p4,p5,comentario2,p6,p7,p8, comentario3,p9,p10,p11,comentario4,p12,p13,p14,p15,p16,p17,p18,comentario5,p19,p20,p21,comentario6,p22,p23,comentario7) VALUES('$fecha','$componente','$troquel','$NoOperacion','$elabora','$cumple1',
    '$cumple2','$comentario1','$cumple3','$cumple4','$cumple5','$comentario2','$cumple6','$cumple7','$cumple8','$comentario3','$cumple9','$cumple10','$cumple11','$comentario4','$cumple12','$cumple13','$cumple14','$cumple15','$cumple16','$cumple17','$cumple18','$comentario5','$cumple19','$cumple20','$cumple21','$comentario6','$cumple22','$cumple23','$comentario7')";
      $result = $conexion -> query($consulta3);

  echo "LOS DATOS SE HAN GUARDADO EXITOSAMENTE";
  echo "<form action='cambios.php' method='post'>
       <button type='submit' style='background-color:#D4EFDF; border-color:#D4EFDF; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
   </form>";

  }else{
  echo "<center><h2>ERROR. FAVOR DE REVISAR QUE LOS CAMPOS NO ESTÉN VACÍOS.</h2>";
  echo "<br>";
  echo "<form action='cambios.php' method='post'>
     <button type='submit' style='background-color:#D4EFDF; border-color:#D4EFDF; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
  </form></center>";
}
  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title></title>
     <link rel="shortcut icon" href="img/icono.png">
   </head>
   <body bgcolor="#D4EFDF">

   </body>
 </html>
