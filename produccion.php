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
    <LINK REL=StyleSheet HREF="css/diseñoPrdo.css" TYPE="text/css" MEDIA=screen>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/0.7.21/webcomponents-lite.min.js"></script>
       <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
         <script src="js/menu.js"></script>
      <link rel="shortcut icon" href="img/icono.png">
    <script src="js/manu.js"></script>
    <script src="js/buqUb.js"></script>
    <script src="js/buqdim.js"></script>

    <title>PRODUCCIÓN</title>

  </head>
  <body>
    <div id='div'>
        <div id='menu1'>
        </div>
    </div>
    <br><br><br><br>
    <div>
      <style type="text/css">
      img.izquierda {
        float: left;
      }
      </style>
      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='100' height='100' />
        <h1 align = "center"> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em;" SIZE="7">P R O D U C C I Ó N</font></h1>
    </div><br>

    <div align="center">

      <table width="100%" height:"100%"align="center">
          <tr>
            <td width="50%">
                <font SIZE='6'><center><b>TROQUELES</b></center></font>
                <div id ='bus' align='right'>
                  <img src='img/buscar.png' width='15' height='15' /><input type='text' class='form-control' id='txtbusca' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
                </div>
                <div id='div1'>
                <div id='datos'>
                </div>
              </div>
            </td>
            <td width="50%">
                <font SIZE='6'><center><b>UBICACIÓN TROQUEL</b></center></font>
                <div id ='bus2' align='right'>
                <img src='img/buscar.png' width='15' height='15' />  <input type='text' class='form-control' id='txtbusca2' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
                </div>
                <div id='div2'>
                <div id='datos2'>
                </div>
              </div>
            </td>
          </tr>
      </table>
      <table align="center" >
          <colgroup span=2 align="center">
          <tr>
            <td width="100%" align='center'>
                <font SIZE='6'><center><b>DIMENSIONES</b></center></font>
                <div id ='bus3' align='right'>
                  <img src='img/buscar.png' width='15' height='15' /><input type='text' class='form-control' id='txtbusca3' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
                </div>
                <div id='div3' align='center'>
                <div id='datos3'>
                </div>
              </div>
            </td>
          </tr>
      </table>
      </div>
  </body>
</html>
