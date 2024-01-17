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

  $orden = $_POST['orden1'];
  $componente = $_POST['componente'];
  $comentario = $_POST['comentario'];
  $fechaActual = date('d/m/Y');

if(isset($_POST["orden1"]) AND $_POST["orden1"] AND
   isset($_POST["comentario"]) AND $_POST["comentario"] AND
   isset($_POST["detenida"]) AND $_POST["detenida"] == 'NO'){
    $consulta = "UPDATE ordenescalidad set comentario='$comentario' where orden='$orden'";
      $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$comentario' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      $consulta3 = "UPDATE atrasosproduccion set comentario='$comentario' where orden='$orden'";
        $result3 = $conexion -> query($consulta3);

    echo "<center><h1>Datos Guardados<h1>";
    echo "<form action='/produccion/ordenCalidad.php' method='post'>
         <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
     </form>";

}elseif(isset($_POST["orden1"]) AND $_POST["orden1"] AND
   isset($_POST["comentario"]) AND $_POST["comentario"] AND
   isset($_POST["detenida"]) AND $_POST["detenida"] == 'SI'){

   $consulta3 = "INSERT INTO ordendetcal(orden,componente,motivo,fecha) VALUES('$orden','$componente','$comentario','$fechaActual')";
     $result3 = $conexion -> query($consulta3);

   $consulta = "UPDATE ordenescalidad set comentario='$comentario' where orden='$orden'";
     $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$comentario' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     $consulta3 = "UPDATE atrasosproduccion set comentario='$comentario' where orden='$orden'";
       $result3 = $conexion -> query($consulta3);

   echo "<center><h1>Datos Guardados<h1>";
   echo "<form action='/produccion/ordenCalidad.php' method='post'>
        <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
    </form>";

  }else{
    echo "<center><h2>ERROR. FAVOR DE REVISAR QUE LOS SIGUIENTES CAMPOS NO ESTÉN VACÍOS:</h2>";
    echo "<br>";
    echo "<h3>*Comentario</h3>";
    echo "<form action='/produccion/ordenCalidad.php' method='post'>
         <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
     </form></center>";
  }

  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>ORDEN CAL.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body bgcolor = "#AED6F1">

   </body>
 </html>
