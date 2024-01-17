<?php
  header("Content-Type: text/html;charset=utf-8");
  $salida = "";
  if (!($conexion = mysqli_connect("localhost", "root", "" )))
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

  $query = "SELECT * FROM cambio";

  //Elimina los datos que no existan en analisis de atrasos
  $query2 ="DELETE FROM cambio WHERE componente NOT IN (SELECT item_cliente FROM analisisatrasos)";
  $result2 = $conexion -> query($query2);

  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT componente, troquel,numOperaciones FROM cambio WHERE componente LIKE '%".$q."%' OR troquel LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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
          var componente = $(this).closest('tr').children()[0].textContent;
          var troquel = $(this).closest('tr').children()[1].textContent;
          var NoOperacion = $(this).closest('tr').children()[2].textContent;

          $("#componente").val(componente);
          $("#troquel").val(troquel);
          $("#NoOperacion").val(NoOperacion);
        });
    </script>
    <body>
      <form id='frm' action='' method='post'>
  <?php if ($result -> num_rows > 0) { ?>
    <table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black' id='cambio'>
            <thead>
            <tr>
              <th  bgcolor='#85C1E9'>COMPONENTE</th>
              <th  bgcolor='#85C1E9'>TROQUEL</th>
              <th  bgcolor='#85C1E9'>NO. OPERACIÓN</th>
              <th  bgcolor='#85C1E9'>ACCIÓN</th>
            </tr>
            </thead>
            <tbody>

    <?php while ($fila = $result  -> fetch_assoc()){ ?>
          <tr>
            <th bgcolor='#85C1E9'><?php echo $fila['componente']; ?></th>
            <td bgcolor='#AED6F1' align='center'><?php echo $fila['troquel'];?></td>
            <td bgcolor='#AED6F1' align='center'><?php echo $fila['numOperaciones'];?></td>
            <td bgcolor='#AED6F1' align='center'><button type='submit' style='background-color:#85C1E9 ; border-color:#85C1E9;'  class='btn btn-info btn_add'   onclick="this.form.action='php/AgregarRepCheckListTroquel.php';this.form.submit();" > <img src='img/agregar2.png' width='30' height='30' class='zoom'/></button></td>
          </tr>
    <?php  } ?>
      </tbody></table>
        <input type="text" name="componente" id="componente" readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">
        <input type="text" name="troquel" id="troquel" readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">
        <input type="text" name="NoOperacion" id="NoOperacion" readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">

      </form>
    <?php } ?>
  </body>
</html>
