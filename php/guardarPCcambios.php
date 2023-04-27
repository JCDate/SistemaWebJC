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

$nivelRev = $_POST['nivelRev'];
$fechaRev = $_POST['fechaRev'];
$nivelParJC = $_POST['nivelParJC'];
$fechaeParJC = $_POST['fechaeParJC'];

$nivCambio = $_POST['nivCambio'];
//PRIMERO
$camb1 = $_POST['camb1'];
$fecha1 = $_POST['fecha1'];
$fecha1F = date("d/m/Y", strtotime($fecha1));

//SEGUNDO
$camb2 = $_POST['camb2'];
$fecha2 = $_POST['fecha2'];
$fecha2F = date("d/m/Y", strtotime($fecha2));

//TERCERO
$camb3 = $_POST['camb3'];
$fecha3 = $_POST['fecha3'];
$fecha3F = date("d/m/Y", strtotime($fecha3));

//CUARTO
$camb4 = $_POST['camb4'];
$fecha4 = $_POST['fecha4'];
$fecha4F = date("d/m/Y", strtotime($fecha4));

//QUINTO
$camb5 = $_POST['camb5'];
$fecha5 = $_POST['fecha5'];
$fecha5F = date("d/m/Y", strtotime($fecha5));

//SEXTO
$camb6 = $_POST['camb6'];
$fecha6 = $_POST['fecha6'];
$fecha6F = date("d/m/Y", strtotime($fecha6));

//SEPTIMO
$camb7 = $_POST['camb7'];
$fecha7 = $_POST['fecha7'];
$fecha7F = date("d/m/Y", strtotime($fecha7));

//OCTAVO
$camb8 = $_POST['camb8'];
$fecha8 = $_POST['fecha8'];
$fecha8F = date("d/m/Y", strtotime($fecha8));

//NOVENO
$camb9 = $_POST['camb9'];
$fecha9 = $_POST['fecha9'];
$fecha9F = date("d/m/Y", strtotime($fecha9));

//DECIMO
$camb10 = $_POST['camb10'];
$fecha10 = $_POST['fecha10'];
$fecha10F = date("d/m/Y", strtotime($fecha10));

$queryP = "SELECT * FROM iniciopc WHERE componente = '$componente'";
$resultP = $conexion -> query($queryP);


$consulta = "UPDATE iniciopc SET nivelRev='$nivelRev',fechaRev='$fechaRev',nivelParJC='$nivelParJC',fechaeParJC='$fechaeParJC' WHERE componente='$componente'";
  $result = $conexion -> query($consulta);

  if($_POST["nivCambio"]==1){
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==2) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==3) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==4) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb4','$fecha4F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==5) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb4','$fecha4F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb5','$fecha5F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==6) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb4','$fecha4F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb5','$fecha5F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb6','$fecha6F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==7) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb4','$fecha4F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb5','$fecha5F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb6','$fecha6F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb7','$fecha7F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==8) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb4','$fecha4F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb5','$fecha5F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb6','$fecha6F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb7','$fecha7F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb8','$fecha8F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==9) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb4','$fecha4F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb5','$fecha5F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb6','$fecha6F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb7','$fecha7F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb8','$fecha8F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb9','$fecha9F')";
      $result = $conexion -> query($consulta);
  }elseif ($_POST["nivCambio"]==10) {
    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb1','$fecha1F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb2','$fecha2F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb3','$fecha3F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb4','$fecha4F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb5','$fecha5F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb6','$fecha6F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb7','$fecha7F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb8','$fecha8F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb9','$fecha9F')";
      $result = $conexion -> query($consulta);

    $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES('$componente','$camb10','$fecha10F')";
      $result = $conexion -> query($consulta);
  }



 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR PC CAMBIOS</title>
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
