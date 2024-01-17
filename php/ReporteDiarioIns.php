<?php
header("Content-Type: text/html;charset=utf-8");
$salida = "";
if(!($conexion = mysqli_connect("localhost", "root", "" )))
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

  $query = "SELECT * FROM inspeccion WHERE inspeccion !='' AND tipoDef !='' ORDER BY id DESC";

  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	* FROM inspeccion WHERE componente LIKE '%".$q."%' AND inspeccion !='' AND tipoDef !=''OR orden LIKE '%".$q."%' AND inspeccion !='' AND tipoDef !='' OR inspector LIKE '%".$q."%' AND inspeccion !='' AND tipoDef !='' OR fecha LIKE '%".$q."%' AND inspeccion !='' AND tipoDef !=''";
  }
  $result = $conexion -> query($query);?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <style type="text/css">
      img.zoom {
         -webkit-transition: all .2s ease-in-out;
         -moz-transition: all .2s ease-in-out;
         -o-transition: all .2s ease-in-out;
         -ms-transition: all .2s ease-in-out;
       }

       .transition {
         -webkit-transform: scale(1.8);
         -moz-transform: scale(1.8);
         -o-transform: scale(1.8);
         transform: scale(1.8);
       }
      </style>

    <title>Reporrte Diario Ins</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>
    <form id='frm' action="" method="post">
        <?php  if($result -> num_rows > 0) {?>
                <thead><table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black'>
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
        <?php while($fila = $result  -> fetch_assoc()){ ?>
                  <tr>
                    <th bgcolor='#00BFFF'><?php echo $fila['id']?></th>
                    <th bgcolor='#00BFFF'><?php echo $fila['orden']?></th>
                    <td bgcolor='#B0E0E6' align='center'><?php echo$fila['componente']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo$fila['cantidadPzs']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo$fila['fechaEntrada']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['inspector']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['fecha']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['cuñete'],'/',$fila['TotalCuñete']?></td>
                    <td bgcolor='#B0E0E6'><?php echo $fila['tipoDef']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['cantPzsDef']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['operador']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['NoOp']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['maquina']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['inspeccion']?></td>
                </tr>
        <?php  } ?>
                  </tbody></table>
      </form>
      <?php }?>

    </center>
  </body>
</html>

<?php   $conexion ->close(); ?>
