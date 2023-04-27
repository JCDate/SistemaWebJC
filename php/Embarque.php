<?php
header("Content-Type: text/html;charset=utf-8");
$salida = "";
if(!($conexion = mysqli_connect("localhost", "root", "" )))
{
  echo "Error conectando a la base de datos.";
  exit();
}

if (!($db = mysqli_select_db( $conexion, "jc_mysql")))
{
  echo "Error seleccionando la base de datos.";
  exit();
}
mysqli_set_charset($conexion,"UTF8");

  $query = "SELECT embarque.orden,componente,cantidad,fechaVencida,analisisatrasos.piezasEntregar,noCuñetes,pesoNeto FROM embarque, analisisatrasos WHERE embarque.orden = analisisatrasos.orden AND señalEmb='0' ORDER BY CONCAT(SUBSTRING_INDEX(fechaVencida , '/', -1), SUBSTRING_INDEX(SUBSTRING_INDEX(fechaVencida , '/', 2), '/', -1)) <= CONVERT(DATE_FORMAT(NOW(), '%Y%m'), CHAR) DESC, embarque.orden ASC";

  //Consultar
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT embarque.orden,embarque.componente,embarque.cantidad,fechaVencida,analisisatrasos.piezasEntregar,embarque.noCuñetes,embarque.pesoNeto FROM embarque,analisisatrasos WHERE embarque.orden = analisisatrasos.orden  AND señalEmb='0' AND embarque.componente LIKE '%".$q."%' AND embarque.orden = analisisatrasos.orden OR embarque.orden = analisisatrasos.orden  AND señalEmb='0' AND embarque.orden LIKE '%".$q."%' ORDER BY CONCAT(SUBSTRING_INDEX(fechaVencida , '/', -1), SUBSTRING_INDEX(SUBSTRING_INDEX(fechaVencida , '/', 2), '/', -1)) <= CONVERT(DATE_FORMAT(NOW(), '%Y%m'), CHAR) DESC";
  }

  $result = $conexion -> query($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Embarque</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">

    <script type="text/javascript">
    $(document).ready(function(){
        $(':checkbox[readonly=readonly]').click(function(){
          return false;
        });
    })
    </script>
    <script type="text/javascript">
        $(".btn_add").on("click", function() {
        var orden = $(this).closest('tr').children()[0].textContent;
        var componente = $(this).closest('tr').children()[1].textContent;
        var cantidad= $(this).closest('tr').children()[2].textContent;
        var cantidad= $(this).closest('tr').children()[2].textContent;
        var noCu= $(this).closest('tr').children()[4].textContent;
        var pesoNeto= $(this).closest('tr').children()[5].textContent;
        $("#orden").val(orden);
        $("#componente").val(componente);
        $("#cantidad").val(cantidad);
        $("#noCu").val(noCu);
        $("#pesoNeto").val(pesoNeto);

        });
    </script>
    <style type="text/css">
      .boton_1{
        text-decoration: none;
        padding: 3px;
        padding-left: 10px;
        padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 18px;
        font-style: italic;
        color: #006505;
        background-color: #3498DB;
        border-radius: 15px;
        border: 3px double #006505;
      }
      .boton_1:hover{
        opacity: 0.6;
        text-decoration: none;
      }
      .boton_2{
        text-decoration: none;
        padding: 3px;
        padding-left: 10px;
        padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 18px;
        font-style: italic;
        color: #DA0E0B;
        background-color: #3498DB;
        border-radius: 15px;
        border: 3px double #DA0E0B;
      }
      .boton_2:hover{
        opacity: 0.6;
        text-decoration: none;
      }
    </style>
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
  </head>
  <body align = "center">
      <?php /* ?><font size=4 color='red'><n>AVISO: POR EL MOMENTO SOLO SE ENVIARÁN ORDENES VENCIDAS Y QUE VENCEN EN EL MES ACTUAL.</n> </font> <?php */ ?>
    <form  method='post'>
  <?php if($result -> num_rows > 0) {?>
         <table border='1' overflow='scroll' height='100%' width='100%'  bgcolor='black'>
            <thead>
            <tr>
              <th bgcolor='#5DADE2'><font size=5>ORDEN</font></th>
              <th bgcolor='#5DADE2'><font size=5>COMPONENTE</font></th>
              <th bgcolor='#5DADE2'><font size=5>FECHA V.</font></th>
              <th bgcolor='#5DADE2'><font size=5>PZS A ENTREGAR</font></th>
              <th bgcolor='#5DADE2'><font size=5>CANT. ENVIAR</font></th>
              <th bgcolor='#5DADE2'><font size=5>NO. CUÑETES</font></th>
              <th bgcolor='#5DADE2'><font size=5>PESO NETO</font></th>
              <th bgcolor='#5DADE2'><font size=5>ENVIAR</font></th>
            </tr>
            </thead>
            <tbody>
      <?php
      while ($fila = $result  -> fetch_assoc()){ ?>
            <tr>  <?php
            $orden = $fila['orden'];
            $query2 ="SELECT IF(CONCAT(SUBSTRING_INDEX(fechaVencida , '/', -1), SUBSTRING_INDEX(SUBSTRING_INDEX(fechaVencida , '/', 2), '/', -1)) <= CONVERT(DATE_FORMAT(NOW(), '%Y%m'), CHAR),1,0) AS res FROM analisisatrasos, embarque WHERE embarque.orden = analisisatrasos.orden AND señalEmb='0' AND embarque.orden='$orden'";
            $result2 = $conexion -> query($query2);
            $fila2 = $result2  -> fetch_assoc();

          if($fila2['res'] == 0){ ?>
              <th bgcolor='#5DADE2'><button type='submit' style='background-color:#5DADE2; border-color:#5DADE2; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/EmbarqueEdit.php';this.form.submit();"><font size=5><n><u><?php  echo $fila['orden'];?></u></n></font></button></th>
              <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['componente'];?></font></td>
              <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['fechaVencida'];?></font></td>
              <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['piezasEntregar'];?></font></td>
              <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['cantidad'];?></font></td>
              <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['noCuñetes'];?></font></td>
              <td bgcolor='#90BFDE' align='center'><font size=5><?php  echo $fila['pesoNeto'];?></font></td>
            <?php if($fila['noCuñetes'] !='' AND $fila['pesoNeto'] !='' ) {?>
              <td bgcolor='#90BFDE' align='center'>
                  <button type='submit' style='background-color:#90BFDE; border-color:#90BFDE; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/EmbarqueEnviar.php';this.form.submit();"><img src='img/terminado.png' width='30' height='30' class='zoom'/></button>
              </td>
            <?php } else {?>
              <td bgcolor='#90BFDE' align='center'>
                  <img src='img/cancelar.png' width='30' height='30'/>
              </td>
          <?php  } ?>
            </tr>
      <?php } else {?>
                <th bgcolor='#FF4D4D'><button type='submit' style='background-color:#FF4D4D; border-color:#FF4D4D; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/EmbarqueEdit.php';this.form.submit();"><font size=5><n><u><?php  echo $fila['orden'];?></u></n></font></button></th>
                <td bgcolor='#FF4D4D' align='center'><font size=5><?php  echo $fila['componente'];?></font></td>
                <td bgcolor='#FF4D4D' align='center'><font size=5><?php  echo $fila['fechaVencida'];?></font></td>
                <td bgcolor='#FF4D4D' align='center'><font size=5><?php  echo $fila['piezasEntregar'];?></font></td>
                <td bgcolor='#FF4D4D' align='center'><font size=5><?php  echo $fila['cantidad'];?></font></td>
                <td bgcolor='#FF4D4D' align='center'><font size=5><?php  echo $fila['noCuñetes'];?></font></td>
                <td bgcolor='#FF4D4D' align='center'><font size=5><?php  echo $fila['pesoNeto'];?></font></td>
              <?php if($fila['noCuñetes'] !='' AND $fila['pesoNeto'] !='' ) {?>
                <td bgcolor='#FF4D4D' align='center'>
                    <button type='submit' style='background-color:#FF4D4D; border-color:#FF4D4D; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/EmbarqueEnviar.php';this.form.submit();"><img src='img/terminado.png' width='30' height='30' class='zoom'/></button>
                </td>
              <?php } else {?>
                <td bgcolor='#FF4D4D' align='center'>
                    <img src='img/cancelar.png' width='30' height='30'/>
                </td>
            <?php  } ?>
              </tr>
    <?php    }
          }?>
          </tbody>
        </table>
  <?php } ?>
  <input type="text" name="orden" id="orden" style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" readonly  >
  <input type="text" name="componente" id="componente" style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" readonly >
  <input type="number" name="cantidad" id="cantidad" min="0" style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" readonly>


    </form>
  </body>
</html>

<?php   $conexion ->close(); ?>
