<?php
  require_once '../conexion.php'; // Se añade el archivo para la conexión y la configuración de la sesión

  $componente = $_POST['componente']; // Se obtiene el valor del componente a través del método POST

  // Consulta de iniciopc
  $selectInicioPC = "SELECT * FROM iniciopc WHERE componente = ?"; // Se define la consulta
  $stmtIpc = $conexion -> prepare($selectInicioPC); // Se crea la consulta preparada
  $stmtIpc -> bind_param("s",$componente); // Se define la variable para agregar a la consulta
  $stmtIpc -> execute(); // Se ejecuta la instrucción
  $resultIpc = $stmtIpc -> get_result(); // Se obtienen los datos

  // Consulta de cambiopc
  $selectCambioPC = "SELECT * FROM cambiopc WHERE componente = ?"; // Se define la consulta
  $stmtCpc = $conexion -> prepare($selectCambioPC); // Se crea la consulta preparada
  $stmtCpc -> bind_param("s",$componente); // Se define la variable para agregar a la consulta
  $stmtCpc -> execute(); // Se ejecuta la instrucción
  $resultCpc = $stmtCpc -> get_result(); // Se obtienen los datos

  //Se cierran las consultas
  $stmtIpc -> close();
  $stmtCpc -> close();
?>

<!DOCTYPE html>
<html lang="es" dir="ltr"> <!-- Se define el idioma: español y la dirección de lectura: de izquierda a derecha -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Se está estableciendo que el tipo de contenido es "text/html" (texto con formato HTML) y el juego de caracteres es UTF-8 -->
    <link rel="stylesheet" href="/produccion/css/botones.css"> <!-- Se integra el archivo CSS con el diseño de los botones -->
    <link rel="stylesheet" href="/produccion/css/GenerarPCM.css"> <!-- Se integra el archivo CSS con el diseño de la página -->
    <link rel="shortcut icon" href="/produccion/img/icono.png"> <!-- Se define el icono de la ventana -->
    <script type="text/javascript" src="/produccion/js/funGenerarPCM.js"></script>
    <title>PLAN DE CONTROL M</title> <!-- Título -->
  </head>
  <body>
    <form id="formPCM" method='post' onsubmit="return validacion();"> <!-- Cuando se envia el formulario, primero pasa por el método validacion() para validar los campos -->
      <h1>PLAN DE CONTROL</h1><br>
      <div>
        <?php  while ($fila = $resultIpc -> fetch_assoc()): ?>  <!-- Se obtiene la información de la bd -->
        <table id="tblPCM">
          <tr>
            <td id="tdComponente" colspan='2'>
              <h2>
                <label>COMPONENTE: </label>
                <input type="text" id="componente" name="componente" value="<?php echo $componente; ?>" readonly>
              </h2>
            </td>
          </tr>
          <tr>
            <td colspan='2'>Nota: Solo se pueden modificar los campos que tienen asterisco (*)<br><br></td>
          </tr>
          <tr>
            <td id="revision">
              <label>NIVEL REV.:</label>
              <input type="text" id="nivelRev" name="nivelRev" value="<?php echo $fila['nivelRev']; ?>">*
            </td>
            <td id="revision" colspan="2">
              <label>FECHA DE REVISIÓN:</label>
              <input type="text" id="fechaRev" name="fechaRev" value="<?php echo $fila['fechaRev']; ?>">*
            </td>
          </tr>
          <tr>
            <td id="tdNoNivelCambio" colspan='2'><br>
              <label>NÚMERO DE PARTE DEL CLIENTE/ÚLTIMO NIVEL DE CAMBIO</label><br><br>
            </td>
          </tr>
          <tr>
            <td id="tdNivelParJC">
              <label>NIVEL:</label>
              <input type="text" id="nivelParC" name="nivelParC" value="<?php echo $fila['nivelParC']; ?>" style="width: 30px;">*
            </td>
            <td bgcolor='#AED6F1' colspan="2">
              <label>FECHA:</label>
              <input type="text" name="fechaParC" id="fechaParJC" value="<?php echo $fila['fechaParC']; ?>">*
            </td>
          </tr>
          <tr>
            <td id="tdNoNivelCambio" colspan='2'><br>
              <label>NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO</label><br><br>
            </td>
          </tr>
          <tr>
            <td id="tdNivelParJC">
              <label>NIVEL:</label>
              <input type="text" id="nivelParJC" name="nivelParJC" value="<?php echo $fila['nivelParJC']; ?>" style="width: 30px;">*
            </td>
            <td bgcolor='#AED6F1' colspan="2">
              <label>FECHA:</label>
              <input type="text" name="fechaeParJC" id="fechaeParJC" value="<?php echo $fila['fechaeParJC']; ?>">*
            </td>
          </tr>
          <tr>
            <td bgcolor='#5DADE2' colspan='2' align='center'><br><b>CAMBIOS</b><br><br></td>
          </tr>
          <?php
            $contador = 1;
            while ($filaC = $resultCpc->fetch_assoc()): ?>
          <tr>
            <td bgcolor='#64B5F6'>
              <label>CAMBIO:</label>
              <input type="hidden" name="registros[<?php echo $contador; ?>][id]" value="<?php echo $filaC['id']; ?>">
              <input type="hidden" name="registros[<?php echo $contador; ?>][componente]" value="<?php echo $componente; ?>">
              <input type="text" name="registros[<?php echo $contador; ?>][cambM]" value="<?php echo $filaC['cambio']; ?>">
            </td>
            <td bgcolor='#64B5F6'>
              <label>FECHA:</label>
              <input type="text" name="registros[<?php echo $contador; ?>][fechaM]" value="<?php echo $filaC['fecha']; ?>">
            </td>
          </tr>
          <?php
            $contador++;
            endwhile; ?>
          <tr>
            <td bgcolor='#5DADE2' colspan='2' align='center'>
              <h3>AGREGAR CAMBIO</h3>
              <label>NIVEL:</label>
              <select class="nivCambio" name="nivCambio" id="nivCambio" onchange="javascript:mostrar();">
                <option value="0">---</option>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select><br><br>
            </td>
          </tr>
          <?php for ($i = 1; $i <= 10; $i++): ?>
          <tr>
            <td bgcolor='#D6EAF8' >
              <div id="flotante<?php echo $i; ?>" style="display: none;">
                <div id="close<?php echo $i; ?>"><br>
                  <label>CAMBIO <?php echo $i; ?>:</label>
                  <input type="text" name="camb<?php echo $i;  ?>" ><br><br>
                </div>
              </div>
            </td>
            <td bgcolor='#D6EAF8' colspan="2">
              <div id="flotante<?php echo $i; ?>_<?php echo $i;  ?>" style="display: none;">
                <div id="close<?php echo $i; ?>_<?php echo $i; ?>"><br>
                  <label>FECHA <?php echo $i; ?>: </label>
                  <input type="date" name="fecha<?php echo $i; ?>" id="fecha<?php echo $i; ?>"><br><br>
                </div>
              </div>
            </td>
          </tr>
          <?php endfor; ?>
          <tr>
            <td bgcolor='#AED6F1' colspan='2' align='center'><br>
              <fieldset style="width:70%" align="left">
                <legend>
                  <label>NÚM. PARTE/ PROCESO</label>
                </legend>
                <?php $nums = array('0010','0020','0030','0040','0050','0060','0070','0080','0090','0100','0110','0120','0130','0140','0150','160','0170', '0180', '0190', '0200'); // Los números de proceso que deseas consultar
                  foreach ($nums as $num) {
                    $query = "SELECT totalProceso FROM iniciopc WHERE totalProceso = '$num' AND componente = '$componente'";
                    $result = $conexion->query($query);
                    if ($result->num_rows > 0) { // Imprime los botones con el número de proceso correspondiente
                      for ($i = 10; $i <= (int)$num; $i += 10) {
                        $numStr = str_pad($i, 4, '0', STR_PAD_LEFT);
                        echo "<button type='submit' class='boton_3' onclick=\"this.form.action='GenerarPC{$numStr}M.php';this.form.submit();\">{$numStr}</button> &nbsp &nbsp";
                        if ($i % 50 === 0) {
                          echo "<br><br>";
                        }
                      }
                    }
                  }
                ?>
              </fieldset>
            </td>
          </tr>
        </table>
        <?php endwhile; ?>
      </div>
      <br><br>
      <div align='center'>
        <a class="boton_2" name="boton_2" href="/produccion/ComponentesPCInt.php"><img src='/produccion/img/atras.png' width='20' height='20' class='zoom'/>REGRESAR</a>
        <button id="btnGuardar" type='submit' class='boton_1' onclick="this.form.action='guardarPCcambios.php';"><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
      </div><br>
    </form>
    <div align="center">
      <?php foreach ($nums as $indice => $num) {
        $queryT = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='$num' AND componente='$componente'";
        $resultT = $conexion->query($queryT);
        if ($resultT->num_rows > 0) {
          $siguienteProceso = ($indice + 1 < count($nums)) ? $nums[$indice + 1] : '';
        }
      } ?>
      <button class="boton_4" name="buttonA" onclick="enviarSiguienteProceso('<?php echo $siguienteProceso; ?>')">Agregar Proceso</button>
      <button class="boton_3" name="buttonD" onclick="eliminarProcesos()">Eliminar Proceso</button>
    </div>
  </body>
</html>
<?php $conexion ->close(); ?>
