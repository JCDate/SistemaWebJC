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
    <script src="js/menu.js"></script>

    <script src="js/buqCamn.js"></script>

    <title>Cambios</title>
    <link rel="shortcut icon" href="img/icono.png">
  </head>
  <body>
    <div id='div'>
        <div id='menu1'>
        </div>
    </div>
      <br><br><br><br><br><br>
      <div align="right">

      </div>
      <div align="center">
        <style type="text/css">
        img.izquierda {
          float: left;
        }

        </style>
        <img src='/produccion/img/jcLogo.png' class="izquierda"  width='80' height='80' />
        <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em;" SIZE="7">C A M B I O S</font>
      </div>
      <div id ='bus' align='right'>
        <img src='img/buscar.png' width='15' height='15' /><input type='text' class='form-control' id='txtbusca' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
      </div>
      <div id='div1'>
        <div id='datos'>
        </div>
    </div>
  </body>
</html>
