<?php
  session_start();
  if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo']=time();
  } else if (time() - $_SESSION['tiempo'] > 3600) {
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
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/menu.css">
  </head>
  <body>
    <div id="header">
      <ul class="nav">
        <li><a href="Inicio.php">Inicio</a></li>
          <?php
            if($_SESSION['id']== 1 OR $_SESSION['id']== 2) { ?>
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
                    <li><a href="OrdenDeteCalInt.php">Ordenes Detenidas</a></li>
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
                if($_SESSION['id']== 6 OR $_SESSION['id']== 2) {
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

              <li><a href="Facturacion.php">Facturación</a>
                <ul>
                  <a href="codigoBarras.php">Agregar código de barras</a>
                </ul>
               </li>
            <?php } else {?>
              <li><a>Facturación</a></li>
                <?php } ?>
        <li><a href="DirectorioInt.php">Directorio</a></li>
        <li><a href="reset-password.php">Cambiar Contraseña</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </body>
</html>
