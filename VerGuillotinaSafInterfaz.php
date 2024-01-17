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

<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/0.7.21/webcomponents-lite.min.js"></script>
     <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
       <script src="js/menu.js"></script>
    <script src="js/buqVerGuillotinaSaf.js"></script>

    <title>Ver. Guillotina Safan</title>
    <link rel="shortcut icon" href="img/icono.png">
  </head>
  <body>
    <div id='div'>
        <div id='menu1'>
        </div>
    </div>
    <br><br><br><br>
    <div align="center">
      <table width="100%" height:"100%"align="center">
          <tr>
            <td width="50%">
              <div id ='limp' align='left'>
                    <style type="text/css">
                      .boton_1{
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
