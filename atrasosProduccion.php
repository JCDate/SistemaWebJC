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

    <script src="js/buqAtrasosProd.js"></script>
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

    <center><h1> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em" SIZE="7">O R D E N E S  |  P R O D U C C I Ó N</font></h1></center>
  </div><br><br>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
         width="200" height="100" viewBox="0 0 120 100"  class="sv">
      <rect x="10" y="10" width="25" height="30"
            fill="#FC5E5E" class="rec"/>
            <text x="35" y="30" class="caption">PRIORIDAD</text>
             <path class="linea_base" d="m30,40 h180" style="stroke:#f00; stroke-width:.6; fill:none;"></path>
    </svg>
    <div align="center">
      <table width="100%" height:"100%"align="center">
          <tr>
            <td width="50%">
                <div id ='bus' align='right' class="buscar">
                <img src='img/buscar.png' width='15' height='15' />  <input type='text' class='form-control' id='txtbusca' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2' style=" font-size: 15pt;">
                </div>
                <div id='div1'>
                  <div id='datos'>
                  </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
  </body>
</html>
