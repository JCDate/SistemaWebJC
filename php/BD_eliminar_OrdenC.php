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

  $orden = $_POST['orden2'];
  $fechaV = $_POST['fechaV2'];
  $cantidad = $_POST['cantidad2'];
  $componente = $_POST['componente2'];


if($orden and  $cantidad and  $componente){

    $consulta = "INSERT INTO embarque(orden,componente) VALUES('$orden','$componente')";
      $result = $conexion -> query($consulta);

      $consulta3 = "UPDATE embarque JOIN crs ON crs.componente = embarque.componente SET embarque.cr = crs.cr";
        $result3 = $conexion -> query($consulta3);

        $consulta2 = "DELETE FROM ordenescalidad WHERE orden='$orden'";
          $result2 = $conexion -> query($consulta2);

          echo "<h2>Datos Enviados<h2>";
          echo "<form action='/produccion/ordenCalidad.php' method='post'>
               <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
           </form>";

}

  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>ORDEN CALIDAD</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body align="center" bgcolor="#AED6F1">

   </body>
 </html>
