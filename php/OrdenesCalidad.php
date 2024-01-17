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

  $query = "SELECT * FROM ordenescalidad ORDER BY CONCAT(SUBSTRING_INDEX(fechaV , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fechaV , '/', 2), '/', -1),SUBSTRING_INDEX(fechaV , '/', 1)) ASC";

  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	* FROM ordenescalidad WHERE componente LIKE '%".$q."%' OR orden LIKE '%".$q."%'";
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
    <form id='frm' action="" method="post">
        <?php  if($result -> num_rows > 0) {?>
                <thead><table border='1' overflow='scroll' height='100%' width='100%'  bgcolor='black' bordercolor='black'>
                <tr>
                  <th bgcolor='#00BFFF'>ORDEN</th>
                  <th bgcolor='#00BFFF'>FECHA DE VENCIMIENTO</th>
                  <th bgcolor='#00BFFF'>CANTIDAD</th>
                  <th bgcolor='#00BFFF'>COMPONENTE</th>
                  <th bgcolor='#00BFFF'>COMENTARIO</th>
                  <th bgcolor='#00BFFF'>ELIMINAR</th>
                  <th bgcolor='#00BFFF'>EDITAR</th>
                  <th bgcolor='#00BFFF'>LIBERAR</th>
                </tr>
                </thead>
                <tbody>
        <?php   while ($fila = $result  -> fetch_assoc()){
                    $componente=$fila['componente'];
                    $query2 = "SELECT * FROM consumoyantecedentes WHERE componente_CA='$componente'";
                    $result2 = $conexion -> query($query2);
                    $fila2 = $result2  -> fetch_assoc();  ?>
                  <tr>
                    <th bgcolor='#00BFFF'><?php echo $fila['orden']?></th>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['fechaV']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['cantidad']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo$fila['componente']?></td>
                    <td bgcolor='#B0E0E6' align='center'><?php echo $fila['comentario']?></td>
                    <td bgcolor='#B0E0E6' align='center'>
                      <button type='submit' style='background-color:#B0E0E6; border-color:#B0E0E6; border:0;' class='btn btn-info btn_add'  onclick="this.form.action='php/BD_eliminar_OrdCalidad.php';this.form.submit();"><img src='/produccion/img/eliminar.png' width='30' height='30' class='zoom'/></button>
                    </td>
                    <td bgcolor='#B0E0E6' align='center'><button type='button' style='background-color:#B0E0E6; border-color:#B0E0E6; border:0;' class='btn btn-info btn_add'> <a  href='#editar'><img src='img/editProd.png' width='30' height='30' class='zoom'/></a></button></td>
                    <td bgcolor='#B0E0E6' align='center'><button type='submit' style='background-color:#B0E0E6; border-color:#B0E0E6; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/BD_eliminar_OrdenC.php';this.form.submit();"><img src='img/terminado.png' width='30' height='30' class='zoom'/></button></td>
                  </tr>
        <?php  } ?>
                  </tbody></table>
                    <input type="text" name="orden2" id="orden2"  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">
                    <input type="text" name="fechaV2" id="fechaV2"  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">
                    <input type="text" name="cantidad2" id="cantidad2"  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">
                    <input type="text" name="componente2" id="componente2"  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">
      </form>
      <?php }?>

    <br><br><br><br> <a id="editar"></a><br><br><br>
    <h1 align = "center"> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="6">EDITAR</font></h1><br>
    <font SIZE='5' align = "center">
    <form class="" action="php/EditarOrdenCal.php" method="post">
     <center>
      <table border="1">
        <tr>
          <td bgcolor='#00BFFF' colspan='3' align='center'><label>ORDEN:</label> <input type="text" name="orden" id="orden"  readonly style="background-color:#00BFFF;  border-color:#00BFFF; border-style:solid; font-size: 14pt"></td>
        </tr>
        <tr>
          <td bgcolor='#7CCEF7'><label>FECHA V.:</label> <input type="text" name="fechaV" id="fechaV"  readonly style="background-color:#7CCEF7;  border-color:#7CCEF7; border-style:solid; font-size: 14pt"></td>
          <td bgcolor='#7CCEF7'><label>CANTIDAD:</label> <input type="text" name="cantidad" id="cantidad" readonly style="background-color:#7CCEF7;  border-color:#7CCEF7; border-style:solid; font-size: 14pt"></td>
          <td bgcolor='#7CCEF7'><label>COMPONENTE:</label> <input type="text" name="componente" id="componente" readonly style="background-color:#7CCEF7;  border-color:#7CCEF7; border-style:solid; font-size: 14pt"></td>
        </tr>
        <tr>
          <td bgcolor='#ACE1FC' colspan='3' align='center'>
            <input type="text" name="orden1" id="orden1"  readonly  style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid"><br>
            <label >DETENIDA?:</label>
            <select  name="detenida" id="detenida" style="font-size: 12pt">
              <option value="NO">NO</option>
              <option value="SI">SI</option>
            </select>
            <br><br>
            <label >COMENTARIO:</label>  <textarea name="comentario" id="comentario" rows="3" cols="50" onkeyup="javascript:this.value=this.value.toUpperCase();"  style="font-size: 12pt"></textarea><br>
          </td>
        </tr>
      </table>
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
        <br>
        <button type="reset" name="boton_2" class="boton_2"><img src='/produccion/img/limp.png' width='20' height='20' />LIMPIAR</button>
        <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' />GUARDAR</button>
      </form>
  </font>
  </body>
</html>
<?php   $conexion ->close(); ?>
