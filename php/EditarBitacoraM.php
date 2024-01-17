<?php
  require_once "../conexion.php";

  $troquel = $_POST['troquel'];

  // Consultas para obtener datos
  $query = "SELECT tallermecacicofalla.id, tallermecacicofalla.componente, fechaEntrada, descripcion, fechaEnt, reparadaP, turno, solucion, fabricada, reparada, eficaz
  FROM tallermecacicofalla INNER JOIN tallermecanicorep ON tallermecacicofalla.id = tallermecanicorep.id WHERE tallermecacicofalla.troquel = ? AND tallermecanicorep.troquel = ?";

  $query2 = "SELECT tallermecacicofalla.id, tallermecacicofalla.componente, fechaEntrada, descripcion, fechaEnt, reparadaP, turno, solucion, fabricada, reparada, eficaz
  FROM tallermecacicofalla INNER JOIN tallermecanicorep ON tallermecacicofalla.id = tallermecanicorep.id WHERE tallermecacicofalla.troquel = ? AND tallermecanicorep.troquel LIKE ?";

  $troquelLike = "%TORNO%";

  // Preparar las consultas
  $stmt = $conexion -> prepare($query);
  $stmt2 = $conexion -> prepare($query2);

  // Asociar valores a los marcadores de posición
  $stmt -> bind_param("ss", $troquel, $troquel);
  $stmt2 -> bind_param("ss", $troquel, $troquelLike);

  // Ejecutar las consultas y obtener los resultados
  $stmt -> execute();
  $result = $stmt -> get_result();
  $stmt -> close();

  $stmt2 -> execute();
  $result2 = $stmt2->get_result();
  $stmt2 -> close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BITACORA DE MANTENIMIENTO DE TROQUELES</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <style>
      .center-content {
        text-align: center;
        font-size: 16px; /* Tamaño de fuente deseado */
        font-weight: bold; /* Puedes ajustar el peso de la fuente según tus preferencias */
        margin: 20px 0; /* Espacio entre el contenido y otros elementos */
      }

      .troquel-label, .troquel-value {
        font-size: 23px; /* Tamaño de fuente para las etiquetas y valores */
        font-weight: normal; /* Opcional: puedes ajustar el peso de la fuente según tus preferencias */
      }
      .troquel-label2 {
        font-size: 15px; /* Tamaño de fuente para las etiquetas y valores */
        font-weight: normal; /* Opcional: puedes ajustar el peso de la fuente según tus preferencias */
      }

      .troquel-value::after {
        content: "\00a0"; /* Agrega un espacio en blanco después de la etiqueta */
        margin-right: 150px; /* Ajusta el espacio a la derecha según tus preferencias */
      }
      img.zoom {
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
      }

      .transition {
        -webkit-transform: scale(1.8);
        -moz-transform: scale(1.8);
        -o-transition: scale(1.8);
        -ms-transition: scale(1.8);
      }
    </style>
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
        var troquel = $(this).closest('tr').children().eq(0).text();

        $("#troquel").val(troquel);
      });
    </script>
    <script>
      function eliminarFila(button) {
        if (confirm("La información seleccionada se eliminará, ¿Deseas Continuar?")) {
          var row = button.parentNode.parentNode; // Obtener la fila actual

          // Obtener los datos de la fila
          var inputId = row.cells[1].querySelector('input');
          var id = inputId.value;

          // Configurar el formulario y enviarlo
          var form = document.getElementById('formTM');
          form.action = "EliminarBitacoraTM.php";
          form.method = "POST";
          form.innerHTML = `
            <input type="hidden" name="id" value="${id}">
          `;
          form.submit();
        }
      }
    </script>
  </head>
  <body bgcolor="#D6EAF8">
    <form class="" action="" method="post" id="formTM">
      <?php if ($result -> num_rows > 0 ) {  ?>
        <div class="center-content">
          <h1>BITACORA DE MANTENIMIENTO DE TROQUELES</h1>
          <br>
          <span class="troquel-label">TROQUEL:</span><span class="troquel-value" id="troquel"><?php echo $troquel; ?></span><span class="troquel-label2">PLANTA GUZMÁN, JALISCO</span>
        </div>
        <p align="right"><font size='2'>F-GH 02 REV 02</font></p>
        <table border="2" bordercolor="#000000">
          <thead>
            <tr>
              <td rowspan="2" bgcolor="#6495ED"><h3>NO.</h3></td>
              <td rowspan="2" bgcolor="#6495ED"><h3>COMPONENTE</h3></td>
              <th colspan='2' bgcolor="#FA8072"><h3>FALLA</h3></th>
              <th colspan='7' bgcolor="#00BFFF"><h3>REPARACIÓN</h3></th>
              <th rowspan='2' bgcolor="#00BFFF"><h3>ELIMINAR</h3></th>
            </tr>
            <tr align='center'>
              <th bgcolor="#FFA07A">FECHA DE ENTRADA</th>
              <th bgcolor="#FFA07A">DESCRIPCIÓN DE LA FALLA (DESCRIBIR EN DETALLE EN QUE CONSISTE LA FALLA)</th>
              <th bgcolor="#87CEFA">FECHA DE ENTREGA</th>
              <th bgcolor="#87CEFA">REPARADA POR</th>
              <th bgcolor="#87CEFA">TURNO</th>
              <th bgcolor="#87CEFA">SOLUCIÓN (DESCRIBIR LO QUE SE LE HIZO A LA PIEZA)</th>
              <th bgcolor="#87CEFA">FAB.</th>
              <th bgcolor="#87CEFA">REP.</th>
              <th bgcolor="#87CEFA">AJUSTE EFICAZ A LA 1a.?</th>
            </tr>
          </thead>
          <tbody>
            <?php $cont= 1;
              while ($fila = $result -> fetch_assoc()) { ?>
                <tr align='center'>
                  <th bgcolor="#6495ED"><?php echo $cont; ?></th>
                  <th style="display: none;"><input type="hidden" name="registros[<?php echo $cont; ?>][id]" value="<?php echo $fila['id']; ?>"></th>
                  <th bgcolor="#6495ED"><input type="text" name="registros[<?php echo $cont; ?>][componente]" value="<?php echo $fila['componente']; ?>" readonly></th>
                  <td bgcolor="#FFE4E1"><input type="text" name="registros[<?php echo $cont; ?>][fechaEntrada]" value="<?php echo $fila['fechaEntrada']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#FFE4E1"><input type="text" name="registros[<?php echo $cont; ?>][descripcion]" value="<?php echo $fila['descripcion']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont; ?>][fechaEnt]" value="<?php echo $fila['fechaEnt']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont; ?>][reparadaP]" value="<?php echo $fila['reparadaP']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont; ?>][turno]" value="<?php echo $fila['turno']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont; ?>][solucion]" value="<?php echo $fila['solucion']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont; ?>][fabricada]" value="<?php echo $fila['fabricada']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont; ?>][reparada]" value="<?php echo $fila['reparada']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont; ?>][eficaz]" value="<?php echo $fila['eficaz']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><button type="button" name="button" style='background-color:#AFEEEE; border-color:#AFEEEE; border: 0;' onclick="eliminarFila(this)" ><img src='../img/cancelar.png' width='40' height='40' class='zoom' /></button></td>
                </tr>
            <?php $cont++; } ?>
          </tbody>
        </table>

      <?php } ?>
      <?php if ($result2 -> num_rows > 0 ) {  ?>
        <div class="center-content">
          <h1>BITACORA DE MANTENIMIENTO DE TROQUELES</h1>
          <br>
          <span class="troquel-label">TROQUEL:</span><span class="troquel-value"><?php echo $troquel; ?></span><span class="troquel-label2">PLANTA GUZMÁN, JALISCO</span>
        </div>
        <p align="right"><font size='2'>F-GH 02 REV 02</font></p>
        <table border="2" bordercolor="#000000">
          <thead>
            <tr>
              <td rowspan="2" bgcolor="#6495ED"><h3>NO.</h3></td>
              <th colspan='2' bgcolor="#FA8072"><h3>FALLA</h3></th>
              <th colspan='7' bgcolor="#00BFFF"><h3>REPARACIÓN</h3></th>
            </tr>
            <tr align='center'>
              <th bgcolor="#FFA07A">FECHA DE ENTRADA</th>
              <th bgcolor="#FFA07A">DESCRIPCIÓN DE LA FALLA (DESCRIBIR EN DETALLE EN QUE CONSISTE LA FALLA)</th>
              <th bgcolor="#87CEFA">FECHA DE ENTREGA</th>
              <th bgcolor="#87CEFA">REPARADA POR</th>
              <th bgcolor="#87CEFA">TURNO</th>
              <th bgcolor="#87CEFA">SOLUCIÓN (DESCRIBIR LO QUE SE LE HIZO A LA PIEZA)</th>
              <th bgcolor="#87CEFA">FAB.</th>
              <th bgcolor="#87CEFA">REP.</th>
              <th bgcolor="#87CEFA">AJUSTE EFICAZ A LA 1a.?</th>
            </tr>
          </thead>
          <tbody>
            <?php $cont2= 1;
              while ($fila2 = $result2 -> fetch_assoc()){?>
                <tr align='center'>
                  <th bgcolor="#6495ED"><?php echo $cont2; ?></th>
                  <input type="hidden" name="registros[<?php echo $cont; ?>][id]" value="<?php echo $fila['id']; ?>">
                  <th bgcolor="#6495ED"><input type="text" name="resgistros[<?php echo $cont2; ?>][componente]" value="<?php echo $fila['componente']; ?>" readonly></th>
                  <td bgcolor="#FFE4E1"><input type="text" name="registros[<?php echo $cont2; ?>][fechaEntrada]" value="<?php echo $fila['fechaEntrada']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#FFE4E1"><input type="text" name="registros[<?php echo $cont2; ?>][descripcion]" value="<?php echo $fila['descripcion']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont2; ?>][fechaEnt]" value="<?php echo $fila['fechaEnt']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont2; ?>][reparadaP]" value="<?php echo $fila['reparadaP']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont2; ?>][turno]" value="<?php echo $fila['turno']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont2; ?>][solucion]" value="<?php echo $fila['solucion']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont2; ?>][fabricada]" value="<?php echo $fila['fabricada']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont2; ?>][reparada]" value="<?php echo $fila['reparada']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                  <td bgcolor="#AFEEEE"><input type="text" name="registros[<?php echo $cont2; ?>][eficaz]" value="<?php echo $fila['eficaz']; ?>" style="width: 100%; box-sizing: border-box;"></td>
                </tr>
            <?php $cont2++; } ?>
          </tbody>
        </table>
      <?php } ?>
      <button id="btnGuardar" type='submit' class='boton_1' onclick="this.form.action='guardarCB.php';"><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
    </form>
  </body>
</html>
