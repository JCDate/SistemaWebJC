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

  //TOTAL DE ATRASOS
  $query2 ="SELECT COUNT(fechaVencida) AS total FROM analisisatrasos WHERE CONCAT(SUBSTRING_INDEX(fechaVencida , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fechaVencida , '/', 2), '/', -1),SUBSTRING_INDEX(fechaVencida, '/', 1)) <= CONVERT(DATE_FORMAT(NOW(), '%Y%m%d'), CHAR)";
  $result2 = $conexion -> query($query2);
  $fila2 = $result2  -> fetch_assoc();
  echo "<font SIZE='4'>TOTAL DE ATRASOS: ";
  echo $fila2['total']."</font>";

//BUSCAR
  $query = "SELECT DISTINCT analisisatrasos.prioridad ,atrasosproduccion.orden, fechaV,cantidad, atrasosproduccion.componente, crs.cr, noCal, atrasosproduccion.comentario FROM atrasosproduccion,analisisatrasos, crs WHERE analisisatrasos.orden=atrasosproduccion.orden AND atrasosproduccion.componente=crs.componente ORDER BY prioridad DESC, CONCAT(SUBSTRING_INDEX(fechaV , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fechaV , '/', 2), '/', -1),SUBSTRING_INDEX(fechaV , '/', 1)) ASC";
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT analisisatrasos.prioridad ,atrasosproduccion.orden, fechaV,cantidad, atrasosproduccion.componente, crs.cr, noCal, atrasosproduccion.comentario FROM atrasosproduccion,analisisatrasos, crs WHERE atrasosproduccion.componente LIKE '%".$q."%'  AND analisisatrasos.orden=atrasosproduccion.orden  AND atrasosproduccion.componente=crs.componente OR atrasosproduccion.orden LIKE '%".$q."%'  AND  analisisatrasos.orden=atrasosproduccion.orden AND analisisatrasos.item_cliente=atrasosproduccion.componente AND atrasosproduccion.componente=crs.componente OR atrasosproduccion.comentario LIKE '%".$q."%' AND analisisatrasos.orden= atrasosproduccion.orden AND analisisatrasos.item_cliente=atrasosproduccion.componente  AND atrasosproduccion.componente=crs.componente OR crs.cr LIKE '%".$q."%' AND analisisatrasos.orden= atrasosproduccion.orden AND analisisatrasos.item_cliente=atrasosproduccion.componente  AND atrasosproduccion.componente=crs.componente OR atrasosproduccion.noCal LIKE '%".$q."%' AND analisisatrasos.orden= atrasosproduccion.orden AND analisisatrasos.item_cliente=atrasosproduccion.componente  AND atrasosproduccion.componente=crs.componente ORDER BY prioridad DESC, CONCAT(SUBSTRING_INDEX(fechaV , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fechaV , '/', 2), '/', -1),SUBSTRING_INDEX(fechaV , '/', 1)) ASC";
  }

  $result = $conexion -> query($query);

  $conexion ->close();
?>

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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script>
         $(document).ready(function(){
             $('.zoom').hover(function() {
                 $(this).addClass('transition');
             }, function() {
                 $(this).removeClass('transition');
             });
         });
       </script>
       <script type="text/javascript">
           $(".btn_add").on("click", function() {
           var orden= $(this).closest('tr').children()[0].textContent;
           var componente = $(this).closest('tr').children()[3].textContent;
           var fechaV = $(this).closest('tr').children()[1].textContent;
           var cantidad = $(this).closest('tr').children()[2].textContent;

           $("#componente").val(componente);
           $("#orden").val(orden);
           $("#fechaV").val(fechaV);
           $("#cantidad").val(cantidad);
           });
       </script>
    <title>Atrasos</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body >
    <form id='frm' action="" method="post">
        <?php  if($result -> num_rows > 0) {?>
                <thead><table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black'>
                <tr>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">ORDEN</th>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">FECHA DE VENCIMIENTO</th>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">CANTIDAD</th>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">COMPONENTE</th>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">C/R</th>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">NO. CAL.</th>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">COMENTARIO</th>
                  <th bgcolor='#85C1E9' style=" font-size: 17pt;">EDITAR</th>
                </tr>
                </thead>
                <tbody>
        <?php while ($fila = $result  -> fetch_assoc()){?>
                    <tr>
            <?php if ($fila['prioridad'] == "0" ) { ?>
                      <th bgcolor='#85C1E9'><button type='submit' style='background-color:#85C1E9; border-color:#85C1E9;  border: 0;  font-size: 16pt' class='btn btn-info btn_add' onclick="this.form.action='php/EditarRepDiarioProd.php';this.form.submit(); " ><u><?php echo $fila['orden']?></u></button></th>
                      <td bgcolor= '#AED6F1' align='center' style=" font-size: 16pt;"><?php echo $fila['fechaV'] ?></td>
                      <td bgcolor= '#AED6F1' align='center' style=" font-size: 16pt;"><?php echo $fila['cantidad'] ?></td>
                      <td bgcolor= '#AED6F1' align='center' style=" font-size: 16pt;"><?php echo $fila['componente']?></td>
                      <td bgcolor= '#AED6F1' align='center' style=" font-size: 16pt;"><?php echo $fila['cr']?></td>
                      <td bgcolor= '#AED6F1' align='center' style=" font-size: 16pt;"><?php echo $fila['noCal']?></td>
                      <td bgcolor= '#AED6F1'><?php echo $fila['comentario']?></td>
                      <td bgcolor= '#AED6F1' align='center'>
                        <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1;  border: 0;' class='btn btn-info btn_add'   onclick="this.form.action='php/EditarOrdenProd.php';this.form.submit();" > <img src='img/editProd.png' width='30' height='30' class='zoom'/></button>
                      </td>
                      <?php
                    }else if ($fila['prioridad'] == "1") {?>
                      <th bgcolor="#FC5E5E"><button type='submit' style='background-color:#FC5E5E; border-color:#FC5E5E;  border: 0;  font-size: 16pt' class='btn btn-info btn_add' onclick="this.form.action='php/EditarRepDiarioProd.php';this.form.submit(); " ><u><?php echo $fila['orden']?></u></button></th>
                      <td bgcolor="#FC5E5E" align='center' style=" font-size: 16pt;"><?php echo $fila['fechaV'] ?></td>
                      <td bgcolor="#FC5E5E" align='center' style=" font-size: 16pt;"><?php echo $fila['cantidad'] ?></td>
                      <td bgcolor="#FC5E5E" align='center' style=" font-size: 16pt;"><?php echo $fila['componente']?></td>
                      <td bgcolor="#FC5E5E" align='center' style=" font-size: 16pt;"><?php echo $fila['cr']?></td>
                      <td bgcolor="#FC5E5E" align='center' style=" font-size: 16pt;"><?php echo $fila['noCal']?></td>
                      <td bgcolor="#FC5E5E"><?php echo $fila['comentario']?></td>

                      <td bgcolor= '#FC5E5E' align='center'>
                        <button type='submit' style='background-color:#FC5E5E; border-color:#FC5E5E;  border: 0;' class='btn btn-info btn_add'   onclick="this.form.action='php/EditarOrdenProd.php';this.form.submit();" > <img src='img/editProd.png' width='30' height='30' class='zoom'/></button>
                      </td>
              <?php }?>
                      </tr>
        <?php  } ?>
                  </tbody></table>

      <?php }?>
          <input type='text' name='orden' id='orden'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='componente' id='componente'  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='fechaV' id='fechaV'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='cantidad' id='cantidad'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
    </form>
  </body>
</html>
