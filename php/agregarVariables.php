<?php
  header("Content-Type: text/html;charset=utf-8");
  $salida = "";

  if (!($conexion = mysqli_connect("localhost", "root", "" )))
  {
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db($conexion, "jc_mysql")))
  {
    echo "Error seleccionando la base de datos.";
    exit();
  }
  mysqli_set_charset($conexion,"UTF8");
  $tp = $_POST['int'];
  $componente = $_POST['componente'];
  $producto = $_POST['nProducto'];
  $proceso = $_POST['nProceso'];
  $resp = $_POST['nResponsable'];
  $caracteristica = $_POST['nCaracteristicas'];
  $metodoMedicion = $_POST['nMetodoMedicion'];
  $frecuencia = $_POST['nFrecuencia'];
  $metodoControl = $_POST['nMetodoControl'];

  if ($producto != null || $producto != "") {
    // Inserción de los productos
    $addProdcutos = "INSERT INTO productosactividadespc(nombreProducto) VALUES (?)";
    $stmt1 = $conexion -> prepare($addProdcutos);
    $stmt1 -> bind_param("s",$producto);
    $stmt1 -> execute();
    $stmt1 -> close();
  }

  if ($proceso != null || $proceso != "") {
    // Inserción de los procesos
    $addProcesos = "INSERT INTO procesosactividadespc(nombreProceso) VALUES (?)";
    $stmt2 = $conexion -> prepare($addProcesos);
    $stmt2 -> bind_param("s",$proceso);
    $stmt2 -> execute();
    $stmt2 -> close();
  }

  if ($resp != null || $resp != "") {
    // Inserción de los responsable
    $addResponsable = "INSERT INTO responsablesactividadespc(Responsable) VALUES (?)";
    $stmt3 = $conexion -> prepare($addResponsable);
    $stmt3 -> bind_param("s",$resp);
    $stmt3 -> execute();
    $stmt3 -> close();
  }

  if ($caracteristica != null || $caracteristica != "") {
    // Inserción de las Características
    $addCar = "INSERT INTO caracteristicasactividadespc(Caracteristicas) VALUES (?)";
    $stmt4 = $conexion -> prepare($addCar);
    $stmt4 -> bind_param("s",$caracteristica);
    $stmt4 -> execute();
    $stmt4 -> close();
  }

  if ($metodoMedicion != null || $metodoMedicion != "") {
    // Inserción de los Métodos de Medición
    $addMetMed = "INSERT INTO metodomedicionactividadespc(Metodo) VALUES (?)";
    $stmt5 = $conexion -> prepare($addMetMed);
    $stmt5 -> bind_param("s",$metodoMedicion);
    $stmt5 -> execute();
    $stmt5 -> close();
  }

  if ($frecuencia != null || $frecuencia != "") {
    // Inserción de las Frecuencia
    $addFrec = "INSERT INTO frecuenciaactividadespc(Frecuencia) VALUES (?)";
    $stmt6 = $conexion -> prepare($addFrec);
    $stmt6 -> bind_param("s",$frecuencia);
    $stmt6 -> execute();
    $stmt6 -> close();
  }

  if ($metodoControl != null || $metodoControl != "") {
    // Inserción de las Frecuencia
    $addFrec = "INSERT INTO metodocontrolactividadespc(Metodo) VALUES (?)";
    $stmt7 = $conexion -> prepare($addFrec);
    $stmt7 -> bind_param("s",$metodoControl);
    $stmt7 -> execute();
    $stmt7 -> close();
  }

  // Consulta del No. total de Procesos
  $consultaTP = "SELECT totalProceso FROM iniciopc WHERE componente=?";
  $stmt9 = $conexion -> prepare($consultaTP);
  $stmt9 -> bind_param("s",$componente);
  $stmt9 -> execute();
  $stmt9 -> close();

  echo "<center><h1>Datos Guardados<h1>";
  echo "<form action='/produccion/php/GenerarPC$tp.php' method='post'>
          <input type='text' name='componente' id='componente' value='$componente' style='display: none;'>
          <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion2/img/ok.png' width='80' height='80'/></button>
        </form>";

?>
