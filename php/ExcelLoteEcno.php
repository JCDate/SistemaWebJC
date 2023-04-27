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
   $query = "SELECT * FROM loteeconomico WHERE 1 ORDER BY componente ASC";
     $result = $conexion -> query($query);


header("Pragma: public");
header("Expires: 0");

$filename = "LOTE ECONOMICO.xls";
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
  </style>
  <body>
    <div align='center'>
      <img src='C:/xampp2/htdocs/produccion/img/jcLogo.png' width='110' height='110'/>
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7"><n> ENTRADA Y SALIDA DE ALMACÉN</n></font>
    </div>
    <div align='right'>
          <font face="arial,verdana" SIZE="3"> F-PT 04 REV 01</font>
    </div>

  <?php if($result -> num_rows > 0) {?>
         <table border='1' overflow='scroll' height='100%' width='100%' id='almacenMP'>
            <thead>
            <tr>
              <th bgcolor='#DC7633'><font size=5>COMPONENTE</font></th>
              <th bgcolor='#DC7633'><font size=5>CANTIDAD ACTUAL</font></th>
              <th bgcolor='#17A589'><font size=5>ENTRADA</font></th>
              <th bgcolor='#17A589'><font size=5>FECHA ENTRADA</font></th>
              <th bgcolor='#17A589'><font size=5>VERIFICADO POR</font></th>
              <th bgcolor='#E74C3C'><font size=5>SALIDA</font></th>
              <th bgcolor='#E74C3C'><font size=5>FECHA SALIDA</font></th>
              <th bgcolor='#E74C3C'><font size=5>VERIFICADO POR</font></th>
            </tr>
            </thead>
            <tbody>
      <?php  while ($fila = $result  -> fetch_assoc()){ ?>
            <tr>
              <th bgcolor='#DC7633'><font size=5><?php  echo $fila['componente'];?></font></th>
              <td bgcolor='#F0B27A' align='center'><font size=5><?php  echo $fila['cantAct'];?></font></td>
              <td bgcolor='#73C6B6' align='center'><font size=5><?php  echo $fila['entrada'];?></font></td>
              <td bgcolor='#73C6B6' align='center'><font size=5><?php  echo $fila['fechaEnt'];?></font></td>
              <td bgcolor='#73C6B6' align='center'><font size=5><?php  echo $fila['veryEnt'];?></font></td>
              <td bgcolor='#F1948A' align='center'><font size=5><?php  echo $fila['salida'];?></font></td>
              <td bgcolor='#F1948A' align='center'><font size=5><?php  echo $fila['fechaSal'];?></font></td>
              <td bgcolor='#F1948A' align='center'><font size=5><?php  echo $fila['verySal'];?></font></td>
            </tr>
    <?php  }?>
          </tbody>

        </table>
  <?php } ?>
  </body>
</html>
