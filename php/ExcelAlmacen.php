<?php
  header("Content-Type: text/html;charset=utf-8");

  if (!($conexion = mysqli_connect("localhost", "root", "" ))) {
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db($conexion, "jc_mysql"))) {
    echo "Error seleccionando la base de datos.";
    exit();
  }
  mysqli_set_charset($conexion,"UTF8");

  //Mostrar datos de la tabla
  $query = "
  SELECT embarque.orden, componente, cantidad, fechaVencida, analisisatrasos.piezasEntregar, noCuñetes, pesoNeto, Ubicacion FROM embarque JOIN analisisatrasos ON embarque.orden = analisisatrasos.orden WHERE seEnv = '1' AND señalEmb = '0' ORDER BY CONCAT(SUBSTRING_INDEX(fechaVencida, '/', -1), SUBSTRING_INDEX(SUBSTRING_INDEX(fechaVencida, '/', 2), '/', -1)) <= CONVERT(DATE_FORMAT(NOW(), '%Y%m'), CHAR) DESC, embarque.orden ASC
  ";

  $result = $conexion -> query($query);

  if (!$result) {
    echo "Error en la consulta: " . $conexion->error;
    exit();
}
  header("Pragma: public");
  header("Expires: 0");

  $filename = "ALMACEN.xls";
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
      <img src='C:/xampp2/htdocs/produccion/img/jc.png' width='110' height='110'/>
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7"><n>ALMACÉN PT</n></font>
    </div>
    <div align='right'>
      <font face="arial,verdana" SIZE="3"> F-PT 05 REV 00</font>
    </div>
    <?php
      if($result -> num_rows > 0) {?>
        <table border='1' overflow='scroll' height='100%' width='100%' id='almacenMP'>
        <thead>
          <tr>
            <th bgcolor='#5DADE2'><font size=5>ORDEN</font></th>
            <th bgcolor='#5DADE2'><font size=5>COMPONENTE</font></th>
            <th bgcolor='#5DADE2'><font size=5>FECHA V.</font></th>
            <th bgcolor='#5DADE2'><font size=5>PZS A ENTREGAR</font></th>
            <th bgcolor='#5DADE2'><font size=5>CANT. ENVIAR</font></th>
            <th bgcolor='#5DADE2'><font size=5>NO. CUÑETES</font></th>
            <th bgcolor='#5DADE2'><font size=5>PESO NETO</font></th>
            <th bgcolor='#5DADE2'><font size=5>UBICACION</font></th>
          </tr>
        </thead>
        <tbody>
          <?php  while ($fila = $result  -> fetch_assoc()){
              $orden = $fila['orden'];
              $ubicacion = ($fila['Ubicacion'] === null)? '' : $fila['Ubicacion'];
              $query2 ="SELECT IF(CONCAT(SUBSTRING_INDEX(fechaVencida , '/', -1), SUBSTRING_INDEX(SUBSTRING_INDEX(fechaVencida , '/', 2), '/', -1)) <= CONVERT(DATE_FORMAT(NOW(), '%Y%m'), CHAR),1,0) AS res FROM analisisatrasos, embarque WHERE embarque.orden = analisisatrasos.orden AND señalEmb='0' AND embarque.orden='$orden'";
              $result2 = $conexion -> query($query2);
              $fila2 = $result2  -> fetch_assoc();
              ?>
                <tr>
                  <th bgcolor='#5DADE2'><font size=5><n><u><?php  echo $fila['orden']; ?></u></n></font></th>
                  <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['componente']; ?></font></td>
                  <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['fechaVencida']; ?></font></td>
                  <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['piezasEntregar']; ?></font></td>
                  <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['cantidad']; ?></font></td>
                  <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['noCuñetes']; ?></font></td>
                  <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['pesoNeto']; ?></font></td>
                  <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['Ubicacion']; ?></font></td>
                </tr>
          <?php }?>
          </tbody>

        </table>
  <?php } ?>
  </body>
</html>
