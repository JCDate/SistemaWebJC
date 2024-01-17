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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/0.7.21/webcomponents-lite.min.js"></script>
     <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
       <script src="js/menu.js"></script>

    <script src="js/buqDirectorio.js"></script>
    <title>Atrasos</title>
    <link rel="shortcut icon" href="img/icono.png">

  </head>
  <body>
    <div id='div'>
        <div id='menu1'>
        </div>
    </div>
    <br><br><br>
    <div class="">
      <style type="text/css">
      img.izquierda {
        float: left;
      }

      </style>
      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='80' height='80' />

    <center><h1> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em" SIZE="7">D I R E C T O R I O</font></h1></center>
  </div><br><br>

    <div align="center" id="box">
      <div id='div1'>
        <div id='datos'>
        </div>
      </div>
    </div>
  </body>
</html>
