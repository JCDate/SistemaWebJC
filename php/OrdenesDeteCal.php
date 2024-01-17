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

  $query = "SELECT * FROM ordendetcal ORDER BY CONCAT(SUBSTRING_INDEX(fecha , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fecha , '/', 2), '/', -1),SUBSTRING_INDEX(fecha , '/', 1)) DESC";

  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	* FROM ordendetcal WHERE componente LIKE '%".$q."%' OR orden LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);
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
          var orden = $(this).closest('tr').children()[0].textContent;
          var orden1 = $(this).closest('tr').children()[0].textContent;
          var orden2 = $(this).closest('tr').children()[0].textContent;

          var fechaV = $(this).closest('tr').children()[1].textContent;
          var fechaV2 = $(this).closest('tr').children()[1].textContent;

          var cantidad = $(this).closest('tr').children()[2].textContent;
          var cantidad2 = $(this).closest('tr').children()[2].textContent;

          var componente = $(this).closest('tr').children()[3].textContent;
          var componente2 = $(this).closest('tr').children()[3].textContent;

          var comentario = $(this).closest('tr').children()[4].textContent;

          $("#orden").val(orden);
          $("#orden1").val(orden1);
          $("#orden2").val(orden2);

          $("#fechaV").val(fechaV);
          $("#fechaV2").val(fechaV2);

          $("#cantidad").val(cantidad);
          $("#cantidad2").val(cantidad2);

          $("#componente").val(componente);
          $("#componente2").val(componente2);

          $("#comentario").val(comentario);

          });
      </script>
    <title></title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>

        <?php  if($result -> num_rows > 0) {?>
                <thead><table border='1' overflow='scroll' height='100%' width='100%' bgcolor='black' bordercolor='black'>
                <tr>
                  <th bgcolor='#00BFFF'>ORDEN</th>
                  <th bgcolor='#00BFFF'>COMPONENTE</th>
                  <th bgcolor='#00BFFF'>FECHA</th>
                  <th bgcolor='#00BFFF'>MOTIVO</th>
                </tr>
                </thead>
                <tbody>
        <?php   while ($fila = $result  -> fetch_assoc()){ ?>
                  <tr>
                    <th bgcolor='#00BFFF'><?php echo $fila['orden']?></th>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['componente']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['fecha']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo$fila['motivo']?></td>
                  </tr>
        <?php  } ?>
                  </tbody></table>
      <?php }?>


    </center>
        <style type="text/css">
          .boton_1{
            text-decoration: none;
            padding: 3px;
            padding-left: 10px;
            padding-right: 10px;
            font-family: helvetica;
            font-weight: 300;
            font-size: 16px;
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
            font-size: 16px;
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

  </font>
  </body>
</html>
<?php   $conexion ->close(); ?>
