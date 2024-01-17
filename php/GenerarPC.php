<?php
  require_once '../conexion.php'; // Se añade el archivo para la conexión y la configuración de la sesión

  $componente = $_POST['componente']; // Recibe por el método POST el elemento de nombre componente

  // Se obtiene el nombre del componente de la tabla consumoyantecedentes
  $queryComponenteCA = "SELECT componente_CA FROM consumoyantecedentes WHERE componente_CA='$componente'"; // Instrucción SQL
  $resultComponenteCA = $conexion -> query($queryComponenteCA); // Se ejecuta la consulta en la BD

  // Se obtiene el calibre del componente desde la tabla de inventario y de la tabla estructura
  $queryNumCalibre = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre"; // Instrucción SQL
  $resultNumCalibre = $conexion -> query($queryNumCalibre); // Se ejecuta la consulta en la BD
  $filaNumCalibre = $resultNumCalibre  -> fetch_assoc(); // Se recuperan la fila de los resultados

  // Se obtiene la familia de la tabla antecedentesfamilia
  $queryfamilia = "SELECT antecedentesfamilia.familia FROM antecedentesfamilia WHERE antecedentesfamilia.familia LIKE '%FAM. 3%' AND  componente='$componente'"; // Instrucción SQL
  $resultfamilia = $conexion -> query($queryfamilia); // Se ejecuta la consulta en la BD
  $filafamilia = $resultfamilia  -> fetch_assoc(); // Se recuperan la fila de los resultados
?>

<!DOCTYPE html>
<html lang="es" dir="ltr"> <!-- Se especifica el idioma y la dirección de lectura (izquierda a derecha) -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Codificación de caracteres -->
    <link rel="shortcut icon" href="/produccion/img/icono.png"> <!-- Icono de la página -->
    <script type="text/javascript" src="../js/funGenerarPC.js"></script>
    <link rel="stylesheet" href="../css/generarPC.css">
    <link rel="stylesheet" href="../css/botones.css">
    <title>PLAN DE CONTROL</title> <!-- Titulo de la página -->
  </head>
  <body>
    <form method='post'action="GenerarPC0010.php" onsubmit="return validacion();"> <!-- Formulario que al ser enviado a la acción, primero sera validado -->
      <h1>PLAN DE CONTROL</h1><br> <!-- Cabecera de la página  -->
      <div>
        <table>
          <tr id="trComponente">
            <td colspan="2">
              <label>COMPONENTE:</label>
              <input type="text" id="componente" name="componente" value="<?php echo $componente; ?>" readonly><br>
            </td>
          </tr>
          <tr id="trFechaEmision">
            <td colspan='2'><br>
              <label>FECHA DE EMISIÓN:</label>
              <input type="date" id="fechaEm" name="fechaEm" value="<?php echo date('Y-m-d'); ?>"><br><br> <!-- Campo para ingresar la fecha de emisión -->
            </td>
          </tr>
          <tr>
            <td class="tdBgColor1">
              <label>NIVEL REV.:</label> <!-- Seleecionar el nivel de revisión -->
              <select id="nivR" name="nivR" class="nivR">
                <option value="">---</option>
                <?php for ($i=1; $i <=20; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select><br><br>
            </td>
            <td class="tdBgColor1"><br>
              <label>FECHA DE REVISIÓN:</label>
              <input type="date" id="fechaRev" name="fechaRev" value="<?php echo date('Y-m-d'); ?>"><br><br> <!-- Seleecionar fecha de revisión -->
            </td>
          </tr>
          <tr>
            <td colspan='2' class="tdBgColor2"><em><span><b><label>NÚMERO DE PARTE DEL CLIENTE/ÚLTIMO NIVEL DE CAMBIO</label></b></span></em></td>
          </tr>
          <tr>
            <td class="tdBgColor3"><br>
              <label>NIVEL:</label>
              <input type="text" id="nivCambioCliente" name="nivCambioCliente" style="width : 30px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><!-- nivel de cambio del cliente, si el usuario escribe letras minúsculas, estas se harán masyúsculas automáticamente -->
            </td>
            <td class="tdBgColor3"><br><label>FECHA:</label>
              <input type="date" id="fechaCambioCliente" name="fechaCambioCliente" value="<?php echo date('Y-m-d'); ?>"><br><br> <!-- Se selecciona la fecha de cambio de parte del cliente -->
            </td>
          </tr>
          <tr>
            <td class="tdBgColor1" colspan='2'><em><span><b><label>NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO</label></b></span></em></td>
          </tr>
          <tr>
            <td class="tdBgColor3"><br>
              <label>NIVEL:</label>
              <select id="nivCambioJC" class="nivCambioJC" name="nivCambioJC"> <!-- Se selecciona el nivel de cambio de parte de JC -->
                <option value="">---</option>
                <?php for ($i=1; $i <=20; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select><br><br>
            </td>
            <td class="tdBgColor3"><br><label>FECHA:</label>
              <input type="date" id="fechaCambioJC" name="fechaCambioJC" value="<?php echo date('Y-m-d'); ?>"><br><br> <!-- Se selecciona la fecha de cambio de parte de JC -->
            </td>
          </tr>
          <tr>
            <td class="tdBgColor2" colspan='2' align='center'><b>CAMBIO</b></td>
          </tr>
          <tr>
            <td class="tdBgColor3" colspan='2' align='center'><br><label>NIVEL:</label>
              <select id="nivCambio" name="nivCambio" class="nivCambio" onchange="javascript:mostrar();"> <!-- se selecciona la cantidad de niveles de cambio, al cambiar de opción, se ejecuta el método mostrar -->
                <option value="">---</option>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select><br><br>
            </td>
          </tr>
          <?php
            $numCambios = 10;
            for ($i = 0; $i <= $numCambios; $i++): ?>
            <tr>
              <td bgcolor='#D6EAF8'>
                <div id="flotanteC<?php echo $i; ?>" style="display: none;">
                  <div id="closeC<?php echo $i; ?>"><br>
                    <label>CAMBIO <?php echo $i; ?>:</label>
                    <input type="text" id="camb<?php echo $i; ?>" name="camb<?php echo $i; ?>" value=""><br><br>
                  </div>
                </div>
              </td>
              <td bgcolor='#D6EAF8'>
                <div id="flotanteFecha<?php echo $i; ?>" style="display:none;">
                  <div id="closeFecha<?php echo $i; ?>_<?php echo $i; ?>"><br>
                    <label>FECHA: </label>
                    <input type="date" id="fecha<?php echo $i; ?>" name="fecha<?php echo $i; ?>"><br><br>
                  </div>
                </div>
              </td>
            </tr>
          <?php endfor; ?>
          <tr>
            <td class="tdBgColor2" colspan='2' align='center'><b>PROCESOS</b></td>
          </tr>
          <tr>
            <td class="tdBgColor3" colspan='2' align='center'><br>
              <label>TOTAL DE NÚM. PARTES/ PROCESOS</label>
              <select id="totalPro" class="totalPro" name="totalPro" > <!-- Aquí se selecciona la cantidad de procesos que se van a llevar a cabo -->
                <option value="">-----</option>
                <?php
                  for ($i = 10; $i <= 200; $i += 10):
                    $value = str_pad($i, 4, '0', STR_PAD_LEFT);
                    echo "<option value=\"$value\">$value</option>";
                  endfor;
                ?>
              </select><br><br>
            </td>
          </tr>
        </table><br><br>
        <div align='center'>
          <a name="boton_2" class="boton_2" href="/produccion/ComponentesPCInt.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
          <button type='submit' class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>SIGUIENTE</button>
        </div>
      </div><br><br><br>
    </form>
  </body>
</html>
<?php $conexion ->close(); ?>
