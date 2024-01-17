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

  $componente = $_POST['componente'];
  $query = "SELECT * FROM troqueles WHERE componente='$componente' AND numOperaciones>'3'" ;
    $result = $conexion -> query($query);

    $query2 = "SELECT * FROM troqueles WHERE componente='111301' AND '$componente'= '111301' OR componente='111341' AND '$componente'= '111341' OR componente='111385' AND '$componente'= '111385' OR componente='111500' AND '$componente'= '111500'  OR componente='120923' AND '$componente'= '120923' OR componente='120945' AND '$componente'= '120945' OR componente='120946' AND '$componente'= '120946' OR componente='557737-MC' AND '$componente'= '557737-MC' OR componente='557757-MC' AND '$componente'= '557757-MC' OR componente='564951-MC' AND '$componente'= '564951-MC'  OR componente='565473-MC' AND '$componente'= '565473-MC' OR componente='557741-MC' AND '$componente'= '557741-MC' OR componente='557749-MC' AND '$componente'= '557749-MC' OR componente='87250' AND '$componente'= '87250' OR componente='MC500352-1' AND '$componente'= 'MC500352-1' OR componente='MC500352-2' AND '$componente'= 'MC500352-2'" ;
      $result2 = $conexion -> query($query2);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="shortcut icon" href="img/icono.png">
   </head>
   <body align="center">
      <img src="dibujosC/<?php echo $componente?>.png" width='100%' height='100%' class="zoom"/>
      <?php
      if($result -> num_rows > 0){
       ?>
       <img src="dibujosC/<?php echo $componente?>_2.png" width='100%' height='100%' class="zoom"/>
     <?php } ?>

     <?php if($result2 -> num_rows > 0){ ?>
        <img src="dibujosC/<?php echo $componente?>_2.png" width='100%' height='100%' class="zoom"/>
     <?php } ?>
   </body>
 </html>
