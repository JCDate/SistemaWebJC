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

  $query = "SELECT * FROM reportechecklistt ORDER BY CONCAT(SUBSTRING_INDEX(fecha , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fecha , '/', 2), '/', -1),SUBSTRING_INDEX(fecha , '/', 1)) DESC";
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM reportechecklistt WHERE troquel LIKE '%".$q."%' OR componente LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);


  echo $salida;

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
        var id = $(this).closest('tr').children()[0].textContent;
        var componente = $(this).closest('tr').children()[2].textContent;
        var numOperacion = $(this).closest('tr').children()[4].textContent;

        $("#id").val(id);
        $("#componente").val(componente);
        $("#numOperacion").val(numOperacion);

        });
    </script>

    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="jspdf.plugin.autotable.min.js"></script>
    <script>
          //Cuadro de diálogo de confirmación en JavaScript
          function confirmarAccesoURL()
          {
	    return confirm("¿Está seguro que desea ELIMINAR?");
          }
	</script>
    <title>REPORTE CHECK</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body><br>
    <form name=tuformulario method='post' action="php/BD_eliminar_ReporteCheckL.php">
    <?php if($result -> num_rows > 0) { ?>
    <table border='1' overflow='scroll' height='100%' width='100%'  id='Reporte'>
            <thead>
            <tr>
              <th bgcolor='#7691FE'>ID</th>
              <th bgcolor='#7691FE'>FECHA</th>
              <th bgcolor='#7691FE'>COMPONENTE</th>
              <th bgcolor='#7691FE'>TROQUEL</th>
              <th bgcolor='#7691FE'>NO. OPERACIÓN</th>
              <th bgcolor='#7691FE'>C/R</th>
              <th bgcolor='#7691FE'>ELABORÓ</th>
              <th bgcolor='#7691FE'>ÁREAS</th>
              <th bgcolor='#7691FE'>ELIMINAR</th>
            </tr>
            </thead>
            <tbody>
  <?php while ($fila = $result  -> fetch_assoc()){ ?>
          <tr>
            <th bgcolor='#7691FE'><?php echo $fila['idReporte']; ?></th>
            <td bgcolor='#7FBBE3'><?php echo $fila['fecha']; ?></td>
            <td bgcolor='#7FBBE3'><?php echo $fila['componente']; ?></td>
            <td bgcolor='#7FBBE3'><?php echo $fila['troquel']; ?></td>
            <td bgcolor='#7FBBE3'><?php echo $fila['NoOperacion']; ?></td>
            <td bgcolor='#7FBBE3'><?php echo $fila['cr']; ?></td>
            <td bgcolor='#7FBBE3'><?php echo $fila['elabora']; ?></td>
            <td bgcolor='#7FBBE3'><button type='submit' style='background-color:#7FBBE3; border-color:#7FBBE3; border:0;' class='btn btn-info btn_add' onclick="this.form.action='areasCheckLitstT.php';this.form.submit();"><img src='img/ver2.png' width='30' height='30' class='zoom'/></button></td>
            <td bgcolor='#7FBBE3'><button type='submit' style='background-color:#7FBBE3; border-color:#7FBBE3; border:0;' class='btn btn-info btn_add' onclick="return confirmarAccesoURL()"><img src='img/eliminar.png' width='30' height='30' class='zoom'/></button></td>
          </tr>
    <?php } ?>
      </tbody>
    </table>
    <?php } ?>

    <input type="text" name="id" id="id" readonly style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid">
    <input type="text" name="componente" id="componente" readonly style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid">
    <input type="text" name="troquel" id="troquel" readonly style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid">
    <input type="text" name="numOperacion" id="numOperacion" readonly style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid">
    </form>
  </body>
</html>
