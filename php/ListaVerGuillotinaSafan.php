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
  $query = "SELECT * FROM veriguillotinasafan ORDER BY CONCAT(SUBSTRING_INDEX(fecha , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fecha , '/', 2), '/', -1),SUBSTRING_INDEX(fecha, '/', 1)) DESC";


  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM veriguillotinasafan WHERE calibre LIKE '%".$q."%' OR fecha LIKE '%".$q."%' OR operador LIKE '%".$q."%'";
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
    <title></title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>
    <?php if ($result -> num_rows > 0) {?>

      <table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black' id='cambio'>
            <thead>
              <tr>
                <th  bgcolor='#819FF7'>ID</th>
                <th  bgcolor='#819FF7'>CALIBRE</th>
                <th  bgcolor='#819FF7'>FECHA</th>
                <th  bgcolor='#819FF7'>MEDIDA PROGRAMADA</th>
                <th  bgcolor='#819FF7'>MEDIDA CORTADA</th>
                <th  bgcolor='#819FF7'>OPERADOR</th>
                <th  bgcolor='#819FF7'>OBSERVACIONES</th>
              </tr>
            </thead>
            <tbody>
  <?php while ($fila = $result  -> fetch_assoc()){  ?>
          <tr>
            <th bgcolor='#A9BCF5'><?php echo $fila['id']; ?></th>
            <th bgcolor='#A9BCF5'><?php echo $fila['calibre']; ?></th>
            <th bgcolor='#A9BCF5'><?php echo $fila['fecha'];?></th>
            <td bgcolor='#A9BCF5' align='center'><?php echo$fila['medProgra']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['medCort']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['operador']; ?></td>
            <td bgcolor='#A9BCF5' align='center'><?php echo $fila['obser']; ?></td>
          </tr>
    <?php } ?>
      </tbody></table>
  <?php }  ?>

  </body>
</html>
