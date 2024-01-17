<?php
  session_start();
  if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo'] = time();
  } else if (time() - $_SESSION['tiempo'] > 3600) {
    session_destroy();
    header("Location: login.php");
    die();
  }
  $_SESSION['tiempo'] = time(); //Si hay actividad seteamos el valor al tiempo actual
  require_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/0.7.21/webcomponents-lite.min.js"></script>
    <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
    <script src="js/menu.js"></script>
    <script src="js/buqAlmacen.js"></script>
    <title>Almacén</title>
    <link rel="shortcut icon" href="img/icono.png">
    <style type="text/css">
      img.izquierda {
        float: left;
      }
      .boton_1 {
        text-decoration: none;
        padding: 3px;
        padding-left: 10px;
        padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 14px;
        font-style: italic;
        color: #DA0E0B;
        background-color: #3498DB;
        border-radius: 15px;
        border: 3px double #DA0E0B;
      }
      .boton_1:hover{
        opacity: 0.6;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div id='div'>
      <div id='menu1'></div>
    </div>
    <br><br><br><br>
    <div class="">
      <img src='img/jcLogo.png' class="izquierda"  width='100' height='100' />
      <h1 align="center"><font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">A L M A C É N</font></h1>
    </div><br>
    <div align='right'>
      <form  action='php/ExcelAlmacen.php' method='post'>
          <button id="generar" class="btn btn-default" style=" background-color: transparent;  border-color:#AED6F1; border:0;" ><img src='/produccion/img/Excel.png' class="derecha" width='110' height='110' /></button>
      </form>
    </div>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="200" height="100" viewBox="0 0 180 100" class="sv">
      <rect x="10" y="10" width="25" height="30" fill="#FF4D4D" class="rec"/>
      <text x="35" y="30">ORDENES A ENVIAR</text>
      <path class="linea_base" d="m30,40 h180" style="stroke:#f00; stroke-width:.6; fill:none;"></path>
    </svg>
    <div align="center">
      <table width="100%" height="100%" align="center">
        <tr>
          <td width="50%">
            <div id='limp' align='left'></div>
            <div id ='bus' align='right'>
              <img src='img/buscar.png' width='15' height='15' />
              <input type='text' class='form-control' id='txtbusca' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
            </div>
            <div id='div1'>
              <div id='datos'></div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  </body>
</html>
