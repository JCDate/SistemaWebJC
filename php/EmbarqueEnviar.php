<?php
  header("Content-Type: text/html;charset=utf-8"); //Códificación de Caracteres a UTF-8

  if (!($conexion = mysqli_connect("localhost", "root", "" ))) { // Si no se conecta
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db($conexion, "jc_mysql"))) { //Si no encuentra la bd
    echo "Error seleccionando la base de datos.";
    exit();
  }

  mysqli_set_charset($conexion,"UTF8");

  $orden = $_POST['orden'];
  $componente = $_POST['componente'];
  $ubicacion = $_POST['ubicacion'];

  $ubiFinal = substr($ubicacion,-2);

  if(isset($_POST["orden"]) AND $_POST["orden"] AND isset($_POST["componente"]) AND $_POST["componente"]) {
    $consulta = "UPDATE embarque SET señalEmb='1', seEnv='1' WHERE orden = '$orden'";
    $result = $conexion -> query($consulta);

    // Consulta SQL para obtener los elementos de la columna deseada
    $consulta = "SELECT Ubicacion FROM embarque";

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);




    if (isset($_POST["ubicacion"]) AND $_POST["ubicacion"]) {
      $consulta2 = "UPDATE ubicacion SET disponible='0' WHERE palet='$ubiFinal'";
      $result2 = $conexion -> query($consulta2);
    }

    echo "<center><h1>DATOS ENVIADOS<h1>";
    echo "<form action='/produccion/EmbarqueInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
          </form>";
  } else {

    echo "<center><h2>ERROR. DATO NO ENVIADOS</h2>";
    echo "<br>";
    echo "<form action='/produccion/EmbarqueInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
         </form></center>";
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>GUARDAR EMBARQUE</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body  bgcolor="#AED6F1"></body>
 </html>
