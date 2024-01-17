<?php

header("Content-Type: text/html;charset=utf-8");
$salida = "";
if(!($conexion = mysqli_connect("localhost", "root", "" )))
{
  echo "Error conectando a la base de datos.";
  exit();
}

if (!($db = mysqli_select_db( $conexion, "jc_mysql")))
{
  echo "Error seleccionando la base de datos.";
  exit();
}
mysqli_set_charset($conexion,"UTF8");


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
    <script src="js/buqFacturacion.js"></script>
    <title>Factuación</title>
    <link rel="shortcut icon" href="img/icono.png">
  </head>
  <body>
    <div id='div'>
        <div id='menu1'>
        </div>
    </div>

      <div class="excel" align="right">
        <?php
        $query = "SELECT * FROM facturacion WHERE 1";
        $result = $conexion -> query($query);

        if ($result -> num_rows > 0) { ?>
          <br><br><br>
        <form  action='php/EmbarqueExcel.php' method='post'>
          <button type='submit' style='background-color:transparent; border-color:transparent; border:0;' class='btn btn-info btn_add'><img src='img/excel.png' width='100' height='100'></button><br>
        </form>
      <?php }else {?>
        <br><br><br><br>
    <?php  } ?>
      </div>

    <div class="">
      <style type="text/css">
      img.izquierda {
        float: left;
      }
      button.btn {
        float: right;
      }

      </style>
      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='100' height='100' /> <br>
        <h1 align = "center"> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">F A C T U R A C I Ó N</font></h1>
    </div><br>
    <div align="center">
      <table width="100%" height:"100%"align="center">
          <tr>
            <td width="50%">
              <div id ='limp' align='left'>
                  <form class="" action="php\BD_eliminar_Facturacion.php" method="post">
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
                    <button type="submit" name="button" class="boton_1"> <img src='img/limp.png' width='14' height='14' /> LIMPIAR </button>
                  </form>
                </div>
                <div id ='bus' align='right'>
                  <img src='img/buscar.png' width='15' height='15' /><input type='text' class='form-control' id='txtbusca' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2'>
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
