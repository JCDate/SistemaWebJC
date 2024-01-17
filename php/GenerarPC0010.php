<?php
  require_once '../conexion.php'; // Se añade el archivo para la conexión y la configuración de la sesión

  $componente = $_POST['componente']; // Se obtiene el valor del componente

  // Se consulta la información sobre el no. de Calibre
  $queryNumCalibre = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre";
  $resultNumCalibre = $conexion -> query($queryNumCalibre);
  $filaNumCalibre = $resultNumCalibre -> fetch_assoc();

  //Información Relacionada a los cambios y fechas de revisión
  if (isset($_POST['fechaEm'])) {
    $fechaEm = $_POST['fechaEm'];
    $fechaEmF = date("d/m/Y", strtotime($fechaEm));
    $nivR = $_POST['nivR'];
    $fechaRev = $_POST['fechaRev'];
    $fechaRevF = date("d/m/Y", strtotime($fechaRev));
    $nivC = $_POST['nivCambioCliente'];
    $fechaC = $_POST['fechaCambioCliente'];
    $fechaCF = date("d/m/Y", strtotime($fechaC));
    $nivJC = $_POST['nivCambioJC'];
    $fechaJC = $_POST['fechaCambioJC'];
    $fechaJCF = date("d/m/Y", strtotime($fechaJC));

    if (isset($_POST['nivCambio'])) {
      $nivCambio = $_POST['nivCambio']; // Nivel de cambio
      $data = []; // Se almacena la información de los cambios
      for ($i = 1; $i <= 10; $i++) {
        $fecha = $_POST['fecha'.$i];
        $data[$i]['cambio'] = $_POST['camb'.$i];
        $data[$i]['fecha'] = date("d/m/Y", strtotime($fecha));
      }
      $totalPro = $_POST['totalPro'];

      $queryP = "SELECT * FROM iniciopc WHERE componente = '$componente'"; // Se consulta la información del componente
      $resultP = $conexion -> query($queryP);

      if ($resultP -> num_rows == 0) {
        $insertIniciopc = "INSERT INTO iniciopc(componente,fechaEm, nivelRev,fechaRev,nivelParC,fechaParC,nivelParJC,fechaeParJC,totalProceso) VALUES('$componente','$fechaEm','$nivR','$fechaRevF','$nivC','$fechaCF','$nivJC','$fechaJCF','$totalPro')";
        $resultInsertIniciopc = $conexion -> query($insertIniciopc); //Se hace la inserción en la tabla iniciopc con la información del componente

        $updateAntecedentesfamilia = "UPDATE antecedentesfamilia, iniciopc SET planC = TRUE WHERE antecedentesfamilia.componente = iniciopc.componente";
        $resultUpdateAntecedentesfamilia = $conexion -> query($updateAntecedentesfamilia); //Se actualiza el estado del plan de control del componente

        $consulta = "INSERT INTO cambiopc(componente,cambio,fecha) VALUES"; // Inicializa la variable $consulta
        $values = []; // El arreglo que almacenará los cambios

        if ($_POST['nivCambio'] >= 1 && $_POST['nivCambio'] <= 10) { // Si el nivel de cambio está en el rango...
          for ($i=1; $i <= $_POST['nivCambio']; $i++) {
            $camb = $data[$i]['cambio'];
            $fechaF = $data[$i]['fecha'];
            $values[] = "('$componente','$camb','$fechaF')"; // Se interpolan las variables dinámicas cambio y fecha
          }
          $consulta .= implode(", ", $values); // Se añaden los valores a la consulta y se ejecuta
          $result = $conexion->query($consulta); // Ejecuta la consulta
        }
      }
    }
  }
  $query = "SELECT componente_CA FROM consumoyantecedentes WHERE componente_CA='$componente'";
  $result = $conexion -> query($query); // Se consulta el componente de la tabla consumoyantecedentes

  //Consulta de la lista de variables de productos
  $selectProductos = "SELECT nombreProducto FROM productosactividadespc";
  $resultselProd = $conexion -> query($selectProductos);

  $productos = [];
  if ($resultselProd->num_rows > 0)
    while ($row = $resultselProd -> fetch_assoc()) $productos[] = $row["nombreProducto"];

  // Consulta de la lista de variables de productos
  $selectProcesos = "SELECT nombreProceso FROM procesosactividadespc";
  $resultselProc = $conexion -> query($selectProcesos);

  $procesos = [];
  if ($resultselProc->num_rows > 0)
    while ($row = $resultselProc -> fetch_assoc()) $procesos[] = $row["nombreProceso"];

  // Consulta de la lista de variables de Responsable
  $selectResponsable = "SELECT Responsable FROM responsablesactividadespc";
  $resultselResp = $conexion -> query($selectResponsable);

  $responsables = [];
  if ($resultselResp -> num_rows > 0)
    while ($row = $resultselResp -> fetch_assoc()) $responsables[] = $row["Responsable"];

  // Consulta de la lista de variables de Caracteristicas
  $selectCaracteristicas = "SELECT Caracteristicas FROM caracteristicasactividadespc";
  $resultselCarac = $conexion -> query($selectCaracteristicas);

  $caracteristicas = [];
  if ($resultselCarac -> num_rows > 0)
    while ($row = $resultselCarac -> fetch_assoc()) $caracteristicas[] = $row["Caracteristicas"];

  // Consulta de la lista de variables de Métodos de Medición
  $selectMetodo = "SELECT Metodo FROM metodomedicionactividadespc";
  $resultselMet = $conexion -> query($selectMetodo);

  $metodosMedicion = [];
  if ($resultselMet -> num_rows > 0)
    while ($row = $resultselMet -> fetch_assoc()) $metodosMedicion[] = $row["Metodo"];

  // Consulta de la lista de variables de Métodos de Control
  $selectMetodoControl = "SELECT Metodo FROM metodoControlActividadespc";
  $resultselMetCtrl = $conexion -> query($selectMetodoControl);

  $metodosControl = [];
  if ($resultselMetCtrl -> num_rows > 0)
    while ($row = $resultselMetCtrl -> fetch_assoc()) $metodosControl[] = $row["Metodo"];

  // Consulta de la lista de variables de Frecuencia
  $selectFrecuencia = "SELECT Frecuencia FROM frecuenciaactividadespc";
  $resultselFrec = $conexion -> query($selectFrecuencia);

  $frecuencias = [];
  if ($resultselFrec -> num_rows > 0)
    while ($row = $resultselFrec -> fetch_assoc()) $frecuencias[] = $row["Frecuencia"];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Codificación de caracteres del documento html -->
    <title>PLAN DE CONTROL</title> <!-- Titulo -->
    <link rel="shortcut icon" href="/produccion/img/icono.png"> <!-- Icono de JC -->
    <style type="text/css">
        body {
          background-color: #AED6F1;
        }
        .boton_1 {
          text-decoration: none;
          padding: 3px;
          padding-left: 10px;
          padding-right: 10px;
          font-family: helvetica;
          font-weight: 300;
          font-size: 18px;
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
          font-size: 18px;
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
        .boton_3{
          text-decoration: none;
          padding: 3px;
          padding-left: 10px;
          padding-right: 10px;
          font-family: helvetica;
          font-weight: 300;
          font-size: 18px;
          font-style: italic;
          color: #000000;
          background-color: #3498DB;
          border-radius: 15px;
          border: 3px double #000000;
        }
        .boton_3:hover{
          opacity: 0.6;
          text-decoration: none;
        }
        .boton_4{
          text-decoration: none;
          padding: 3px;
          padding-left: 10px;
          padding-right: 10px;
          font-family: helvetica;
          font-weight: 300;
          font-size: 18px;
          font-style: italic;
          color: #FFCC00;
          border-radius: 15px;
          border: 3px double #FFCC00;
        }
        .boton_4:hover{
          opacity: 0.6;
          text-decoration: none;
        }
      </style>
  </head>
  <body>
    <form method='post' id="formulario">
      <h1 align='center'>PLAN DE CONTROL</h1><br>
      <div>
        <h2 align='center'>
          <label>COMPONENTE:</label>
          <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#AED6F1;  border-color:#AED6F1; border-style:solid; font-size: 17pt;">
        </h2>
        <div class="descripcion1" align="center">
          <h3><label>DESCRIPCIONES</label></h3>
          <fieldset style="width:65%; border-color: #000000; color: #000000; background-color: #C0C0C0;" align="left">
            <legend>
              <label>NÚM. PARTE/ PROCESO</label>
              <input type="text" name="parte10" id="parte10" value="0010" style="width : 40px" readonly>
            </legend>
            <label>NOMBRE DEL PROCESO  / DESCRIPCIÓN DE OPERACIÓN:</label>
            <input type="text" name="NomProceso10_1" id="NomProceso10_1"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br>
            <fieldset style="width:50%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
              <legend>MÁQUINA O DISPOSITIVO PARA MANUFACTURA:</legend>
              <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="N/A">N/A<br>
              <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="GUILLOTINA SAFAN">GUILLOTINA SAFAN<br>
              <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="TROQUELADORA">TROQUELADORA<br>
              <input type="radio" name="dispositivo10_1" id="dispositivo10_1" value="BANDAS APARTADORAS">BANDAS APARTADORAS<br>
            </fieldset><br>
            <div align='center'>
              <label>ACTIVIDADES</label><br>
              <label>No.</label>
              <select class="noC" name="noC10_1" id="noC10_1" onchange="javascript:mostrarCaract();"> <!-- Cuando haya cambio de opción, se ejecutará el método mostrarCaract() -->
                <option value="">---</option>
                <?php for ($i=1; $i <=20; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <?php for ($i=1; $i <= 20; $i++): ?>
              <div id="flotanteC<?php echo $i; ?>" style="display: none;">
                <div id="closeC<?php echo $i; ?>">
                  <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                    <legend>
                      <label>No.</label>
                      <input type="text" name="no1_<?php echo $i; ?>" id="no1_<?php echo $i; ?>" value="<?php echo $i; ?>" style="font-size: 12pt; width : 30px" readonly>
                    </legend>
                    <label>PRODUCTO:</label>
                    <select class="prod" name="pod1_<?php echo $i; ?>" id="pod1_<?php echo $i; ?>" required>
                      <option value="">------------------------------------------------</option>
                      <?php foreach ($productos as $producto): ?>
                        <?php if ($producto == "ESTAMPA"): ?>
                          <option value="<?php echo $producto; ?> <?php echo $componente; ?>"><?php echo $producto; ?> <?php echo $componente; ?></option>
                          <?php else: if ($producto == "LAMINA CALIBRE"): ?>
                            <option value="<?php echo $producto; ?> <?php echo $filaNumCalibre["num_calibre"]; ?>"><?php echo $producto; ?> <?php echo $filaNumCalibre["num_calibre"]; ?></option>
                          <?php else: ?>
                            <option value="<?php echo $producto; ?>"><?php echo $producto; ?></option>
                          <?php endif; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <br><br>
                    <label>PROCESO:</label>
                    <select class="proceso" name="proceso1_<?php echo $i; ?>" id="proceso1_<?php echo $i; ?>">
                      <option value="">------------------------------------</option>
                      <?php foreach ($procesos as $proceso): ?>
                          <option value="<?php echo $proceso; ?>"><?php echo $proceso; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br><br>
                    <label>RESPONSABLE: </label>
                    <select class="responsable" name="Res1_<?php echo $i; ?>" id="Res1_<?php echo $i; ?>">
                      <option value="">------------------------------------</option>
                      <?php foreach ($responsables as $responsable): ?>
                        <option value="<?php echo $responsable; ?>"><?php echo $responsable; ?></option>
                      <?php endforeach; ?>
                    </select>
                    &nbsp &nbsp
                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                    <select class="clas" name="clas1_<?php echo $i; ?>" id="clas1_<?php echo $i; ?>">
                      <option value="">---</option>
                      <?php foreach ($caracteristicas as $caracteristica): ?>
                        <option value="<?php echo $caracteristica; ?>"><?php echo $caracteristica; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br><br>
                    <!-- <div align='center'><label>MÉTODOS</label></div> -->
                    <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                    <input type="text" name="especificacionPLG1_<?php echo $i; ?>" id="especificacionPLG1_<?php echo $i; ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" >
                    <br><br>
                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                    <select class="evalucacion" name="evaluacion1_<?php echo $i; ?>" id="evaluacion1_<?php echo $i; ?>">
                      <option value="">----------------------------------------</option>
                      <?php foreach ($metodosMedicion as $metodoMedicion): ?>
                        <option value="<?php echo $metodoMedicion; ?>"><?php echo $metodoMedicion; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                      <legend><label>MUESTRA</label></legend>
                      <label>TAMAÑO:</label>
                      <input type="text" name="tamaño1_<?php echo $i; ?>" id="tamaño1_<?php echo $i; ?>"  style="width : 50px"><br>
                      <label>FRECUENCIA:</label>
                      <select class="fre" name="fre1_<?php echo $i; ?>" id="fre1_<?php echo $i; ?>">
                        <option value="">------------------------------------------------------</option>
                        <?php foreach ($frecuencias as $frecuencia): ?>
                          <option value="<?php echo $frecuencia; ?>"><?php echo $frecuencia; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </fieldset>
                    <br><br>
                    <label>MÉTODO DE CONTROL: </label>
                    <select class="metodoC" name="metodoC1_<?php echo $i; ?>" id="metodoC1_<?php echo $i; ?>">
                      <option value="">------------------------------------------------------</option>
                      <?php foreach ($metodosControl as $metodoControl): ?>
                        <option value="<?php echo $metodoControl; ?>"><?php echo $metodoControl; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br>
                  </fieldset>
                </div>
              </div>
            <?php endfor; ?>
            <br>
            <div align='center'>
                <a class="boton_2" name="boton_2" href="/produccion/ComponentesPCInt.php">
                    <img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR
                </a>

                <?php
                $queryT_0020 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0020' AND componente='$componente'";
                $queryT_0010 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0010' AND componente='$componente'";

                $resultT_0020 = $conexion->query($queryT_0020);
                $resultT_0010 = $conexion->query($queryT_0010);

                if ($resultT_0020->num_rows > 0) {
                    ?>
                    <button id="boton-siguiente" type='button' class='boton_1' onclick="this.form.action='guardarPlanC.php';">
                        <img src='/produccion/img/guardar.png' width='20' height='20' />FINALIZAR
                    </button>
                    <?php
                } elseif ($resultT_0010->num_rows > 0) {
                    $upDate9 = "UPDATE iniciopc SET totalProceso = '0020' WHERE totalProceso ='0010' AND componente='$componente'";
                    $resultUpDateT9 = $conexion->query($upDate9);
                    ?>
                    <button id="boton-siguiente" type='button' class='boton_1' onclick="this.form.action='guardarPlanC.php';">
                        <img src='/produccion/img/guardar.png' width='20' height='20' />FINALIZAR
                    </button>
                    <?php
                } else {
                    ?>
                    <button id="boton-siguiente" type="button" class="boton_1" onclick="this.form.action='GenerarPC0020.php';">
                        <img src="/produccion/img/guardar.png" width="20" height="20" />SIGUIENTE
                    </button>
                    <?php
                }
                ?>
            </div>
            <input type="text" name="p1" id="p1" value="0" style="display: none;">
          </fieldset>
        </div>
      </div>
      <div align="center">
        <button class="boton_3" name="boton_3" onclick="addVariables()"><img src='/produccion/img/agregar2.png' width='20' height='20' class='zoom'/>Añadir Variables</button>
      </div>
    </form>
    <br><br>
    <div id="formAddVar" align="center" style="display: none;">
      <form action="" method="post" id="formulario2">
        <fieldset style="width:65%; border-color: #000000; color: #000000; background-color: #C0C0C0;" align="left">
          <legend>AGREGAR NUEVAS VARIABLES</legend>
          <input type="text" name="int" id="int" value="0010" style="display: none;">
          <input type="text" name="p1" id="p1" value="1" style="display: none;">
          <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" style="display: none;">
          <label>INGRESAR NUEVO PRODUCTO:</label>
          <input type="text" name="nProducto" id="nProdcuto" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
          <label>INGRESAR NUEVO PROCESO:</label>
          <input type="text" name="nProceso" id="nProceso" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
          <label>AÑADIR RESPONSABLE:</label>
          <input type="text" name="nResponsable" id="nResponsable" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
          <label>INGRESAR NUEVA CARACTERÍSTICA:</label>
          <input type="text" name="nCaracteristicas" id="nCaracteristicas" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
          <label>INGRESAR NUEVO MÉTODO DE MEDICIÓN:</label>
          <input type="text" name="nMetodoMedicion" id="nMetodoMedicion" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
          <label>INGRESAR NUEVA FRECUENCIA:</label>
          <input type="text" name="nFrecuencia" id="nFrecuencia" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
          <label>INGRESAR NUEVO MÉTODO DE CONTROL:</label>
          <input type="text" name="nMetodoControl" id="nMetodoControl" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
          <button id="boton-enviar" type='button'  class='boton_1' onclick="this.form.action='agregarVariables.php';"><img src='/produccion/img/guardar.png' width='20' height='20' />AÑADIR</button>
        </fieldset>
      </form>
    </div>
    <script>
      // Obtener referencia al formulario y al botón "SIGUIENTE"
      var formulario = document.getElementById('formulario');
      var botonSiguiente = document.getElementById('boton-siguiente');
      var botonEnviar = document.getElementById('boton-enviar');
      var form2 = document.getElementById('formulario2');
      // Agregar evento click al botón "SIGUIENTE"
      botonSiguiente.addEventListener('click', function(event) {
        // Detener el envío del formulario
        event.preventDefault();

        // Realizar la validación de los campos aquí
        if (validacion()) {
          // Si la validación es exitosa, enviar el formulario manualmente
          formulario.submit();
        } else {
          // Si la validación falla, muestra un mensaje o realiza alguna acción adicional
          alert('Por favor, complete todos los campos requeridos.');
        }
      });
      // Agregar evento click al botón "AÑADIR"
      botonEnviar.addEventListener('click', function(event) {
        // Detener el envío del formulario
        event.preventDefault();
        form2.submit();
      });

      function validacion() {
        NomProceso = document.getElementById("NomProceso10_1").value;
        if (NomProceso == null || NomProceso.length == 0 || /^\s+$/.test(NomProceso)) {
          alert('FAVOR DE LLENAR EL CAMPO: NOMBRE DEL PROCESO / DESCRIPCIÓN DE OPERACIÓN');
          return false;
        }

        dispositivo = document.getElementsByName("dispositivo10_1");
        var seleccionado = false;
        for (var i=0; i<dispositivo.length; i++) {
          if (dispositivo[i].checked) {
            seleccionado = true;
            break;
          }
        }

        if (!seleccionado) {
          alert('FAVOR DE LLENAR EL CAMPO: MÁQUINA O DISPOSITIVO PARA MANUFACTURA');
          return false;
        }

        num = document.getElementById("noC10_1").selectedIndex;

        if (num == '1') {
          for (var i = 1; i <= 1; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '2') {
          for (var i = 1; i <= 2; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '3') {
          for (var i = 1; i <= 3; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '4') {
          for (var i = 1; i <= 4; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '5') {
          for (var i = 1; i <= 5; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '6') {
          for (var i = 1; i <= 6; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '7') {
          for (var i = 1; i <= 7; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '8') {
          for (var i = 1; i <= 8; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '9') {
          for (var i = 1; i <= 9; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '10') {
          for (var i = 1; i <= 10; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '11') {
          for (var i = 1; i <= 11; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '12') {
          for (var i = 1; i <= 12; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '13') {
          for (var i = 1; i <= 13; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '14') {
          for (var i = 1; i <= 14; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '15') {
          for (var i = 1; i <= 15; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '16') {
          for (var i = 1; i <= 16; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '17') {
          for (var i = 1; i <= 17; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '18') {
          for (var i = 1; i <= 18; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '19') {
          for (var i = 1; i <= 19; i++) {
            if (!validateFields(i)) return false;
          }
        }

        if (num == '20') {
          for (var i = 1; i <= 20; i++) {
            if (!validateFields(i)) return false;
          }
        }
        return true;
      }

      function validateFields(index) {
        var producto = document.getElementById('pod1_'+index).selectedIndex;
        var proceso = document.getElementById('proceso1_'+index).selectedIndex;
        var responsable = document.getElementById('Res1_'+index).selectedIndex;
        var clas = document.getElementById('clas1_'+index).selectedIndex;
        var espe = document.getElementById('especificacionPLG1_'+index).value;
        var evaluacion = document.getElementById('evaluacion1_'+index).selectedIndex;
        var tamaño = document.getElementById('tamaño1_'+index).value;
        var frecuencia = document.getElementById('fre1_'+index).selectedIndex;
        var metodo = document.getElementById('metodoC1_'+index).selectedIndex;

        if (producto === null || producto === 0 || producto === "") {
          alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO EN ACT. '+index);
          return false;
        } else if (proceso === null || proceso === 0) {
          alert('FAVOR DE LLENAR EL CAMPO: PROCESO ACT. '+index);
          return false;
        } else if (responsable === null || responsable === 0) {
          alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE ACT. '+index);
          return false;
        } else if (clas === null || clas === 0) {
          alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES ACT. '+index);
          return false;
        } else if (espe === null || espe.length === 0 || /^\s+$/.test(espe)) {
          alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO ACT. '+index);
          return false;
        } else if (evaluacion === null || evaluacion === 0) {
          alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN ACT. '+index);
          return false;
        } else if (tamaño === null || tamaño.length === 0 || /^\s+$/.test(tamaño)) {
          alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO ACT. '+index);
          return false;
        } else if (frecuencia === null || frecuencia === 0) {
          alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA ACT. '+index);
          return false;
        } else if(metodo === null || metodo === 0) {
          alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL ACT. '+index);
          return false;
        }
        return true;
      }

      function addVariables() {
        var form2 = document.getElementById('formAddVar');
        if (form2.style.display == 'none') {
          form2.style.display = '';
        }else{
          form2.style.display = 'none';
        }
      }
    </script>
  </body>
</html>
<?php $conexion ->close(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">
    function mostrarCaract() {
      const selectElement = document.querySelector('.noC');
      var res  = `${event.target.value}`;
      for (var i = 1; i <= 20; i++) {
        var div = document.getElementById("flotanteC"+i);
        div.style.display = (i <= res) ? '' : 'none';
      }
    }
    </script>
  </head>
</html>
