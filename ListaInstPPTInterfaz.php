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
    <LINK REL=StyleSheet HREF="css/diseñoPrdo2.css" TYPE="text/css" MEDIA=screen>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="js/buqListInstPPT.js"></script>

    <title>Lista de intalación</title>
    <link rel="shortcut icon" href="img/icono.png">
    <style type="text/css">

    * {
      margin:0px;
      padding:0px;
    }

    #header {
      margin:0%;
      width:100%;
      font-family:Arial, Helvetica, sans-serif;
    }

    ul, ol {
      list-style:none;
    }

    .nav > li {
      float:left;
    }

    .nav li a {
      background-color:#000;
      color:#fff;
      text-decoration:none;
      padding:10px 12px;
      display:block;
    }

    .nav li a:hover {
      background-color:#434343;
    }

    .nav li ul {
      display:none;
      position:absolute;
      min-width:140px;
    }

    .nav li:hover > ul {
      display:block;
    }

    .nav li ul li {
      position:relative;
    }

    .nav li ul li ul {
      right:-140px;
      top:0px;
    }

  </style>
  </head>
  <body bgcolor="#D4EFDF">
      <div id="header">
        <ul class="nav">
          <li><a href="Inicio.php">Inicio</a></li>
          <?php
            if($_SESSION['id']== 1 OR $_SESSION['id']== 2 ) {
          ?>
              <li><a href="produccion.php">Producción</a>
                <ul>
                  <li><a href="atrasosProduccion.php">Ordenes</a></li>
                  <li><a href="cambios.php">Cambios</a>
                      <ul>
                        <li><a href="reportechecklistt.php">Reportes Check List</a></li>
                      </ul>
                   </li>
                  <li><a href="TallerMecanicoInt.php">Taller Mecánico</a></li>
                  <li><a href="InstTroqueladosInt.php">Inst. y Puesta a Punto de T.</a>
                    <ul>
                      <li><a href="ListaInstPPTInterfaz.php">Lista de Instalación</a></li>
                    </ul>
                  </li>
                  <li><a href="AlmacenMPC.php">Almacen de Materia Prima</a>
                    <ul>
                      <li><a href="AlmacenMPCReporte.php">Ver Reportes M.P.</a></li>
                    </ul>
                  </li>
                  <li><a href="VerGuillotinaSafInterfaz.php">Verify. Guillotina Safan</a>
                    <ul>
                      <li><a href="ListaVerGuillotinaSafanInterfaz.php">Ver Reportes</a></li>
                    </ul>
                  </li>
                  <li><a href="ComponentesPCIntProd.php">Plan de Control</a></li>
                </ul>
              </li>
          <?php } else {?>
              <li><a>Producción</a></li>
              <?php }
              if($_SESSION['id']== 7 OR $_SESSION['id']== 2 ) {
                ?>
                <li><a>Planeación</a>
                  <ul>
                    <li><a href="InspeccionPlanInterfaz.php">Inspección</a>
                      <ul>
                        <li><a href="InspeccionInt.php">Mod. Inspección</a></li>
                      </ul>
                    </li>
                    <li><a href="RepDiarioInspeccion.php">Reporte Inspección</a></li>
                  </ul>
                </li>
                <?php }else {?>
                  <li><a>Planeación</a></li>
                  <?php }?>

            <?php
              if($_SESSION['id']== 3 OR $_SESSION['id']== 2 OR $_SESSION['id']== 5) {
            ?>
              <li><a href="ordenCalidad.php">Calidad</a>
                <?php
                  if($_SESSION['id']== 3 OR $_SESSION['id']== 2) {
                ?>
                    <ul>
                      <li><a href="ComponentesPCInt.php">Plan de Control</a></li>
                      <li><a href="PesoPorPzsCal.php">Peso por pzs</a></li>
                      <li><a href="RepDiarioInspeccion.php">Reporte Inspección</a></li>
                    </ul>
                <?php
                  }
                ?>
              </li>
            <?php } else {?>
              <li><a>Calidad</a></li>
                <?php }
                  if($_SESSION['id']== 6 OR $_SESSION['id']== 2 ) {
                ?>
                <li><a href="EmbarqueInterfaz.php">Embarque</a>
                  <ul>
                    <li><a href="LoteEconomicoInterfaz.php">Lote Económico</a>
                      <ul>
                        <li><a href="php/LoteEconomicoLista.php">Lista Lote Económico</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <?php }else {?>
                  <li><a>Embarque</a></li>
                  <?php }

                if($_SESSION['id']== 4 OR $_SESSION['id']== 2 ) {
              ?>

                <li><a href="Facturacion.php">Facturación</a></li>
              <?php } else {?>
                <li><a>Facturación</a></li>
                  <?php } ?>
          <li><a href="reset-password.php">Cambiar Contraseña</a></li>
          <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
      </div><br><br><br>
      <div align="right">

      </div>
      <div align="center">
        <style type="text/css">
        img.izquierda {
          float: left;
        }

        </style>
        <img src='/produccion/img/jcLogo.png' class="izquierda"  width='80' height='80' />
        <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">LISTA DE INSTALACION</font>
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
