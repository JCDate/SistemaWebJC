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
  $query = "SELECT * FROM instpptroquelado ORDER BY CONCAT(SUBSTRING_INDEX(fecha , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fecha , '/', 2), '/', -1),SUBSTRING_INDEX(fecha, '/', 1)) DESC";


  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM instpptroquelado WHERE componente LIKE '%".$q."%' OR cr LIKE '%".$q."%' OR fecha LIKE '%".$q."%' OR operador LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);


  $conexion ->close();
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
        var id = $(this).closest('tr').children()[0].textContent;
        var componente = $(this).closest('tr').children()[1].textContent;
        var troquel = $(this).closest('tr').children()[6].textContent;


        $("#id").val(id);
        $("#componente").val(componente);
        $("#troquel").val(troquel);

        });
    </script>
    <title>LISTA INT. PPT</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body><br><br>
    F - IP 01 REV 01
   <form id='frm' action="" method="post">
    <?php if ($result -> num_rows > 0) {?>

      <table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black' id='cambio'>
            <thead>
            <tr>
              <th  bgcolor='#819FF7'>ID</th>
              <th  bgcolor='#819FF7'>COMPONENTE</th>
              <th  bgcolor='#819FF7'>C/R</th>
              <th  bgcolor='#819FF7'>CALIBRE</th>
              <th  bgcolor='#819FF7'>FECHA</th>
              <th  bgcolor='#819FF7'>OPERACION</th>
              <th  bgcolor='#819FF7'>TROQUEL</th>
              <th  bgcolor='#819FF7'>NO. MAQUINA</th>
              <th  bgcolor='#819FF7'>INSTALADOR</th>
              <th  bgcolor='#819FF7'>LBS</th>
              <th  bgcolor='#819FF7'>CAUSA DE REPARACION</th>
              <th  bgcolor='#819FF7'>MODIFICAR</th>
              <th  bgcolor='#819FF7'>ELIMINAR</th>
            </tr>
            </thead>
            <tbody>
  <?php while ($fila = $result  -> fetch_assoc()){  ?>
          <tr>
            <th bgcolor='#A9BCF5'><?php echo $fila['id'];?></th>
            <th bgcolor='#A9BCF5'><?php echo $fila['componente']; ?></th>
            <td bgcolor='#A9BCF5' align='center'><?php echo$fila['cr']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['calibre']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['fecha']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['operacion']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['troquel']; ?></th></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['maquina']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['operador']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['libs']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['causaR']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><button type='submit' style='background-color:#A9BCF5; border-color:#A9BCF5; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/ModificarPPT.php';this.form.submit();"> <img src='img/editProd.png' width='35' height='35' class='zoom'/></button></td>
            <td bgcolor='#A9BCF5' align='center'><button type='submit' style='background-color:#A9BCF5; border-color:#A9BCF5; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/BD_eliminar_IntsPPT.php';this.form.submit();"> <img src='img/eliminar.png' width='35' height='35' class='zoom'/></button></td>
          </tr>
    <?php } ?>
      </tbody></table>
      <input type="text" name="id" id="id"  style='background-color:#D4EFDF; color:#D4EFDF; border-color:#D4EFDF; border-style:solid'  readonly>
      <input type="text" name="componente" id="componente" style='background-color:#D4EFDF; color:#D4EFDF; border-color:#D4EFDF; border-style:solid' readonly>
      <input type="text" name="troquel" id="troquel" style='background-color:#D4EFDF; color:#D4EFDF; border-color:#D4EFDF; border-style:solid' readonly>
  </form>
  <?php }  ?>

  </body>
</html>
