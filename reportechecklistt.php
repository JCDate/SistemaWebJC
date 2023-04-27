<?php
session_start();
if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo']=time();
}
else if (time() - $_SESSION['tiempo'] > 3600) {
    session_destroy();
    /* Aquí redireccionas a la url especifica */
    header("Location: login.php");
    die();
}
$_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual
require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/buqReporte.js"></script>
    <style type="text/css">
    img.derecha {
      float: right;
    }
    img.izquierda {
      float: left;
    }

    </style>
    <title>Reporte Check List Troqueles</title>
    <link rel="shortcut icon" href="img/icono.png">
  </head>
  <body bgcolor="#AED6F1" align="center">
    <div align="left">

    <form class="" action="cambios.php" method="post">
      <img src='/produccion/img/jcLogo.png' class="derecha"  width='80' height='80' />
            <button type="submit" name="button" style="background-color:#AED6F1; border-color:#AED6F1; border:0;"><img src='img/atras.png' class="izquierda" width='50' height='50' /></button>
      </form>

    </div>
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">Reporte Check List Troqueles</font>
    <div id ='bus' align='right'>
      <img src='img/buscar.png' width='15' height='15' /><input type='text' class='form-control' id='txtbusca' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
    </div>
    <div id="datos">
    </div>
  </body>
</html>
