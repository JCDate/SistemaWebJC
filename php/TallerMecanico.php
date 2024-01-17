<?php
  session_start();
  require_once "../conexion.php";
  // Buscar
  $query = "SELECT troquel FROM ubicaciontroquel ORDER BY troquel ASC";
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	troquel FROM ubicaciontroquel WHERE troquel LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);

  $sqlIdUsuario = "SELECT id from usuarios"; // Consulta SQL para obtener los IDs de los usuarios
  $stmtId = $conexion -> prepare($sqlIdUsuario); // Preparar y ejecutar la consulta SQL
  $stmtId -> execute(); // Se ejecuta la consulta
  $resultId = $stmtId -> get_result(); // Se obtienen los datos
  $ids = array(); // Se crea el arreglo para almacenar los IDs de usario
  while ($fila = $resultId -> fetch_assoc()) { // Preparar y ejecutar la consulta SQL
    $ids[] = $fila['id'];
  }
  $idsPermitidos = array(1,2);
  $usuarioAutorizado = false;
  foreach ($ids as $id) {
    if (in_array($id,$idsPermitidos)) {
      $usuarioAutorizado = true;
      break;
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript">
      if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
      }
    </script>
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
      $(document).ready(function() {
        $('.zoom').hover(function() {
          $(this).addClass('transition');
        }, function() {
          $(this).removeClass('transition');
        });
      });
    </script>
    <script type="text/javascript">
      $(".btn_add").on("click", function() {
        var troquel= $(this).closest('tr').children()[0].textContent;
        $("#troquel").val(troquel);
      });
    </script>
    <title>TALLER MECANICO</title>
    <link rel="shortcut icon" href="/produccion2/img/icono.png">
  </head>
  <body>
  <form id='frm' action="" method="post">
    <?php if($result -> num_rows > 0) { ?>
      <thead>
        <table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black' id='troqueles'>
          <tr>
            <th bgcolor='#85C1E9'>TROQUEL</th>
            <th bgcolor='#85C1E9'>GENERAR BITACORA</th>
            <th bgcolor='#85C1E9'>DESCARGAR BITACORA</th>
            <th bgcolor='#85C1E9'>VER BITACORA</th>

            <?php if ($usuarioAutorizado): ?>
            <th bgcolor='#85C1E9'>EDITAR</th>
            <?php endif; ?>
          </tr>
        </thead>
                <tbody>
        <?php while ($fila = $result  -> fetch_assoc()){
           $troquel=$fila['troquel'];
              $query2 = "SELECT troquel FROM tallermecanicorep WHERE troquel='$troquel'";
              $result2 = $conexion -> query($query2);
          ?>
              <tr>
                <th bgcolor='#85C1E9'><?php echo $fila['troquel']?></th>
                <td bgcolor= '#AED6F1' align='center'>
                  <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1;  border: 0;' class='btn btn-info btn_add'   onclick="this.form.action='php/EditarTallerM.php';this.form.submit();" > <img src='img/editProd.png' width='40' height='40' class='zoom'/></button>
                </td>
                <td bgcolor= '#AED6F1' align='center'>
                  <?php if($result2 -> num_rows > 0) { ?>
                  <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/TallerMecaExcel.php';this.form.submit();"><img src='img/excel.png' width='60' height='60' class='zoom'></button>
                  <?php }else { ?>
                            <img src='img/cancelar.png' width='40' height='40' >
                    <?php } ?>
                </td>
                <td bgcolor= '#AED6F1' align='center'>
                  <?php if($result2 -> num_rows > 0) { ?>
                        <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/TallerMecaVer.php';this.form.submit();"><img src='img/ver2.png' width='50' height='50' class='zoom'></button>
                        <?php if ($usuarioAutorizado): ?>
                          <td bgcolor= '#AED6F1' align='center'>
                            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1;  border: 0;' class='btn btn-info btn_add'   onclick="this.form.action='php/EditarBitacoraM.php';this.form.submit();" > <img src='img/editProd.png' width='40' height='40' class='zoom'/></button>
                        </td>
                        <?php endif; ?>
                  <?php }else { ?>
                            <img src='img/nover.png' width='50' height='50' >
                            <?php if ($usuarioAutorizado): ?>
                              <td bgcolor= '#AED6F1' align='center'>
                                <img src='img/cancelar.png' width='40' height='40' >
                            </td>
                            <?php endif; ?>
                <?php } ?>
                </td>


                </tr>
        <?php  } ?>
                  </tbody></table>
      <?php   }?>
          <input type='text' name='troquel' id='troquel'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
    </form>
  </body>
</html>
