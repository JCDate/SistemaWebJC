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


$fecha_actual = date("d-m-Y");

// Después restas 1 día
//$fecha=  date("d/m/Y",strtotime($fecha_actual."- 1 days"));

$fecha = $_POST['fecha'];

//Mostrar datos de la tabla
   $query = "SELECT * FROM inspeccion WHERE fecha='$fecha' ORDER BY componente ASC";
     $result = $conexion -> query($query);


header("Pragma: public");
header("Expires: 0");

$filename = "REP. DIARIO INSPECCIÓN $fecha .xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <div align='center'>
      <img src='C:/xampp2/htdocs/produccion/img/jcLogo.png' width='110' height='110'/>
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7"><n> REPORTE DIARIO DE INPECCIÓN</n></font>
    </div>
    <div align='right'>
          <font face="arial,verdana" SIZE="3"> F-PN 06 REV 03</font>
    </div>
  <?php if($result -> num_rows > 0) {?>
         <table border='1' overflow='scroll' height='100%' width='100%' id='almacenMP'>
            <thead>
            <tr>
              <th bgcolor='#00BFFF'>ID</th>
              <th bgcolor='#00BFFF'>ORDEN</th>
              <th bgcolor='#00BFFF'>COMPONENTE</th>
              <th bgcolor='#00BFFF'>CANT. PZS</th>
              <th bgcolor='#00BFFF'>FECHA SOLUCITUD</th>
              <th bgcolor='#00BFFF'>INSPECTOR</th>
              <th bgcolor='#00BFFF'>FECHA REALIZADO</th>
              <th bgcolor='#00BFFF'>CUÑETE</th>
              <th bgcolor='#00BFFF'>TIPO DE DEFECTO</th>
              <th bgcolor='#00BFFF'>PZS CON DEFECTO</th>
              <th bgcolor='#00BFFF'>OPERADOR</th>
              <th bgcolor='#00BFFF'>OPERACION</th>
              <th bgcolor='#00BFFF'>MAQUINA</th>
              <th bgcolor='#00BFFF'>INSPECCIÓN</th>
            </tr>
            </thead>
            <tbody>
      <?php while ($fila = $result  -> fetch_assoc()){ ?>
            <tr>
              <th bgcolor='#00BFFF'><?php echo $fila['id']?></th>
              <th bgcolor='#00BFFF'><?php echo $fila['orden']?></th>
              <td bgcolor='#B0E0E6' align='center'><?php echo$fila['componente']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo$fila['cantidadPzs']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo$fila['fechaEntrada']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['inspector']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['fecha']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['cuñete']?></td>
              <td bgcolor='#B0E0E6'><?php echo $fila['tipoDef']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['cantPzsDef']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['operador']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['NoOp']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['maquina']?></td>
              <td bgcolor='#B0E0E6' align='center'><?php echo $fila['inspeccion']?></td>
            </tr>
    <?php  }?>
          </tbody>
        </table>
  <?php } ?>
  </body>
</html>
