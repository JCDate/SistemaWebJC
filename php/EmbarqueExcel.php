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
//Mostrar datos de la tabla
$query = "SELECT * FROM facturacion ORDER BY orden ASC";
$result = $conexion -> query($query);

header("Pragma: public");
header("Expires: 0");
$fechaActual = date('d-m-Y');

$filename = "Embarque_$fechaActual.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$fechaActual1 = date('d/m/Y');
if ($result -> num_rows > 0) {
  $salida .="<table border='2' bordercolor='#000000'>
  <thead>
    <tr>
    <th colspan='10'><h2>LISTA DE EMBARQUE</h2></th>

    </tr>
    <tr >
    <th colspan='10' align='right'>FECHA: ".$fechaActual1."</th>
    </tr>
    <tr align='center'>
      <td><h3>PT</h3></td>
      <td><h3>O.C</h3></td>
      <td><h3>COMPONENTE</h3></td>
      <td><h3>C/R</h3></td>
      <td><h3>PZS. ENTR.</h3></td>
      <td><h3>P.U.($)</h3></td>
      <td><h3>TOTAL</h3></td>
      <td><h3>NO. CUNETES</h3></td>
      <td><h3>NO. SIM</h3></td>
      <td><h3>PESO NETO</h3></td>
    </tr>
    <thead>
    <tbody>";
$cont= 1;
while ($fila = $result  -> fetch_assoc()){

    $salida .="
    <tr align='center'>
      <td><h4>".$cont."</h4></td>
      <td><h4>".$fila['orden']."</h4></td>
      <td><h4>".$fila['componente']."</h4></td>
      <td><h4>".$fila['cr']."</h4></td>
      <td><h4>".$fila['cantidad']."</h4></td>
      <td><h4>$".$fila['PU']."</h4></td>
      <td><h4>$".$fila['total']."</h4></td>
      <td><h4>".$fila['noCuñetes']."</h4></td>
      <td><h4>".$fila['NoSim']."</h4></td>
      <td><h4>".$fila['pesoNeto']."</h4></td>";
      $cont ++;
    "</tr>
    </tbody>
    </table>";

  }
  $salida .="</tbody></table>";
}
  echo $salida;
?>
