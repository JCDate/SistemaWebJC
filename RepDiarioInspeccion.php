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
    <script src="js/buqRepInspeccion.js"></script>

    <title>REPORTE DIARIO INPECCIÓN</title>
    <link rel="shortcut icon" href="img/icono.png">

  <script type="text/javascript">
  function validacion() {
    fecha =document.getElementById("fecha").value;
    if( fecha == null || fecha == 0 ) {
      alert('PARA DESCARGAR, INGRESAR FECHA');
      return false;
    }
  }
  </script>
  </head>
  <body>
    <div id='div'>
        <div id='menu1'>
        </div>
    </div>
    <div class="">
      <style type="text/css">
      img.izquierda {
        float: left;
      }
      input.derecha{
        float: right;
      }
      button.btn {
        float: right;
      }
      </style>
      <br><br><br>
        <form  action='php/ExcelRepInsp.php' method='post'  onsubmit="return validacion()">
            <button id="generar" class="btn btn-default" style=" background:transparent;  border-color:transparent; border:0;" ><img src='/produccion/img/Excel.png' class="derecha" width='100' height='100' /></button>
             <br><br><br><br><br><br><input type="text" class="derecha" name="fecha"  id="fecha" style="width:6%;" placeholder="DD/MM/AAAA">
        </form>

      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='100' height='100' />
        <center> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">REPORTE DIARIO DE PRODUCCIÓN NO CONFORME (INSPECCIÓN)</font></center>
    </div><br>
    <div align="center">
      <table width="100%" height:"100%"align="center">
          <tr>
            <td width="50%">
                <div id ='bus' align='right'>
                    <img src='img/buscar.png' width='15' height='15' /> <input type='text' class='form-control' id='txtbusca' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
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
