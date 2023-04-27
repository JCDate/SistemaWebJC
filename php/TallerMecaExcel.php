<?php

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

$troquel = $_POST['troquel'];
//Mostrar datos de la tabla
$query = "SELECT tallermecacicofalla.componente,fechaEntrada,descripcion,fechaEnt,reparadaP,turno,solucion,fabricada,reparada,eficaz FROM tallermecacicofalla,tallermecanicorep WHERE tallermecacicofalla.troquel='$troquel' AND tallermecanicorep.troquel='$troquel' AND tallermecanicorep.componente= tallermecacicofalla.componente AND tallermecanicorep.id=tallermecacicofalla.id";
$result = $conexion -> query($query);

$query2 = "SELECT tallermecacicofalla.componente,fechaEntrada,descripcion,fechaEnt,reparadaP,turno,solucion,fabricada,reparada,eficaz FROM tallermecacicofalla,tallermecanicorep WHERE tallermecacicofalla.troquel='$troquel' AND tallermecanicorep.troquel='$troquel' AND tallermecanicorep.troquel LIKE '%TORNO%' AND  tallermecacicofalla.troquel LIKE '%TORNO%' AND tallermecanicorep.id=tallermecacicofalla.id";
$result2 = $conexion -> query($query2);

header("Pragma: public");
header("Expires: 0");

$filename = "BITACORA DE MANTENIMIENTO DE TROQUELES.xls";
header("Content-Type: text/html;charset=utf-8");
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


if ($result -> num_rows > 0 ) {
  $salida .="<table border='2' bordercolor='#000000'>
  <thead>
    <tr>
    <th colspan='11'><h1>BITACORA DE MANTENIMIENTO DE TROQUELES</h1></th>
    </tr>
    <tr>
    <th colspan='5'><h3>TROQUEL: ".$troquel."</h3></th>
    <th colspan='6'><h5>PLANTA GUZMAN, JALISCO</h5></th>
    </tr>
    <tr>
      <th colspan='5'></th>
      <th colspan='6'><h5>F-GH 02 REV 02</h5></th>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
      <td rowspan='2'><h2>NO.</h2></td>
      <td rowspan='2'><h2>COMPONENTE</h2></td>
      <th colspan='2'><h2>FALLA</h2></th>
      <th colspan='7'><h2>REPARACION</h2></th>

    </tr>
    <tr align='center'>
      <td><h3>FECHA DE ENTRADA</h3></td>
      <td><h3>DESCRIPCION DE LA FALLA (DESCRIBIR EN DETALLE EN QUE CONSISTE LA FALLA)</h3></td>
      <td><h3>FECHA DE ENTREGA.</h3></td>
      <td><h3>REPARADA POR:</h3></td>
      <td><h3>TURNO</h3></td>
      <td><h3>SOLUCION (DESCRIBIR LO QUE SE LE HIZO A LA PIEZA)</h3></td>
      <td><h3>FAB.</h3></td>
      <td><h3>REP.</h3></td>
      <td><h3>AJUSTE EFICAZ A LA 1a.?</h3></td>
    </tr>
    <thead>
    <tbody>";
$cont= 1;
while ($fila = $result  -> fetch_assoc()){

    $salida .="
    <tr align='center'>
      <td><h4>".$cont."</h4></td>
      <td><h4>".$fila['componente']."</h4></td>
      <td><h4>".$fila['fechaEntrada']."</h4></td>
      <td><h4>".$fila['descripcion']."</h4></td>
      <td><h4>".$fila['fechaEnt']."</h4></td>
      <td><h4>".$fila['reparadaP']."</h4></td>
      <td><h4>".$fila['turno']."</h4></td>
      <td><h4>".$fila['solucion']."</h4></td>
      <td><h4>".$fila['fabricada']."</h4></td>
      <td><h4>".$fila['reparada']."</h4></td>
      <td><h4>".$fila['eficaz']."</h4></td>";

      $cont ++;
    "</tr>";

  }
  $salida .="</tbody></table>";
}elseif ($result2 -> num_rows > 0 ) {
  $salida .="<table border='2' bordercolor='#000000'>
  <thead>
    <tr>
    <th colspan='11'><h1>BITACORA DE MANTENIMIENTO DE TROQUELES</h1></th>
    </tr>
    <tr>
    <th colspan='5'><h3>TROQUEL: ".$troquel."</h3></th>
    <th colspan='6'><h5>PLANTA GUZMAN, JALISCO</h5></th>
    </tr>
    <tr>
      <th colspan='5'></th>
      <th colspan='6'><h5>F-GH 02 REV 02</h5></th>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
      <td rowspan='2'><h2>NO.</h2></td>
      <th colspan='2'><h2>FALLA</h2></th>
      <th colspan='7'><h2>REPARACION</h2></th>

    </tr>
    <tr align='center'>
      <td><h3>FECHA DE ENTRADA</h3></td>
      <td><h3>DESCRIPCION DE LA FALLA (DESCRIBIR EN DETALLE EN QUE CONSISTE LA FALLA)</h3></td>
      <td><h3>FECHA DE ENTREGA.</h3></td>
      <td><h3>REPARADA POR:</h3></td>
      <td><h3>TURNO</h3></td>
      <td><h3>SOLUCION (DESCRIBIR LO QUE SE LE HIZO A LA PIEZA)</h3></td>
      <td><h3>FAB.</h3></td>
      <td><h3>REP.</h3></td>
      <td><h3>AJUSTE EFICAZ A LA 1a.?</h3></td>
    </tr>
    <thead>
    <tbody>";
$cont2= 1;
while ($fila2 = $result2  -> fetch_assoc()){

    $salida .="
    <tr align='center'>
      <td><h4>".$cont2."</h4></td>
      <td><h4>".$fila2['fechaEntrada']."</h4></td>
      <td><h4>".$fila2['descripcion']."</h4></td>
      <td><h4>".$fila2['fechaEnt']."</h4></td>
      <td><h4>".$fila2['reparadaP']."</h4></td>
      <td><h4>".$fila2['turno']."</h4></td>
      <td><h4>".$fila2['solucion']."</h4></td>
      <td><h4>".$fila2['fabricada']."</h4></td>
      <td><h4>".$fila2['reparada']."</h4></td>
      <td><h4>".$fila2['eficaz']."</h4></td>";

      $cont2 ++;
    "</tr>";

  }
  $salida .="</tbody></table>";
}else {
   echo "No hay registro del troquel ", $troquel;
}
  echo $salida;
?>
