<?php
  header("Content-Type: text/html;charset=utf-8"); // Códificación de caracteres

  if (!($conexion = mysqli_connect("localhost", "root", "" ))) { // Si no se puede conectar al servidor...
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db($conexion, "jc_mysql"))) { // Si no encuentra la Base de Datos indicada...
    echo "Error seleccionando la base de datos.";
    exit();
  }

  mysqli_set_charset($conexion,"UTF8"); // Codificación de los datos de la base de datos

  $componente = $_POST['componente']; // Se obtiene el valor del componente

  // Se consulta la información del componente deacuerdo a la parte del proceso indicado
  $queryD = "SELECT * FROM descripcion1pc WHERE componente='$componente' AND noPartesP='0050'";
  $resultD = $conexion -> query($queryD);
  $filaD = $resultD  -> fetch_assoc();

  // Se consulta la información sobre el no. de Calibre
  $queryNumCalibre = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre";
  $resultNumCalibre = $conexion -> query($queryNumCalibre);
  $filaNumCalibre = $resultNumCalibre -> fetch_assoc();

  // Se consulta la información de las tablas de descripción del componente
  $queryD2 = "SELECT descripcion2pc.componente, descripcion2pc.noPartesP, descripcion2pc.no, descripcion2pc.producto, descripcion2pc.proceso, descripcion2pc.responsable, descripcion2pc.clasificacion, descripcion3pc.especificacion, descripcion3pc.evaluacion, descripcion3pc.tamanio, descripcion3pc.frecuencia, descripcion3pc.metodoCap FROM descripcion2pc, descripcion3pc WHERE descripcion2pc.componente='$componente' AND descripcion2pc.noPartesP='0050'
  AND descripcion3pc.componente='$componente' AND descripcion3pc.noPartesP='0050' AND descripcion3pc.no= descripcion2pc.no";
  $resultD2 = $conexion -> query($queryD2);

  // Se obtiene el máximo no. de actividades que tiene el proceso
  $queryD3 = "SELECT MAX(no) AS res FROM descripcion2pc WHERE componente='$componente' AND noPartesP='0050'";
  $resultD3 = $conexion -> query($queryD3);
  $filaD3 = $resultD3  -> fetch_assoc();

  // Se consultan la información del componente de la tabla consumoyantecedentes
  $query = "SELECT componente_CA FROM consumoyantecedentes WHERE componente_CA='$componente'";
  $result = $conexion -> query($query);

  // Se consulta el no. de calibre del componente
  $query2 = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre";
  $result2 = $conexion -> query($query2);
  $fila2 = $result2  -> fetch_assoc();

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
  if (  $resultselFrec -> num_rows > 0)
    while ($row = $resultselFrec -> fetch_assoc()) $frecuencias[] = $row["Frecuencia"];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr"> <!-- Se indica el idioma y el tipo de lectura (de izquierda a derecha) -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Se define como contenido de tipo html , con codificación de caracteres -->
    <title>PLAN DE CONTROL M</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
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
      #boton_5{
        text-decoration: none;
        padding: 3px;
        padding-left: 10px;
        padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 15px;
        font-style: italic;
        color: #DA0E0B;
        border-radius: 15px;
        border: 3px double #DA0E0B;
      }
      #boton_5:hover{
        opacity: 0.6;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <form method='post' id="formulario" onsubmit="return validacion()"> <!-- Al enviarse, se ejecutará el método de validación de campos -->
      <h1 align='center'>PLAN DE CONTROL</h1><br>
      <div>
        <h2 align='center'>
          <label>COMPONENTE:</label>
          <input type="text" name="componente" id="componente" value="<?php echo $componente; ?>" readonly style="background-color:#AED6F1;  border-color:#AED6F1; border-style:solid; font-size: 17pt; width:7%;">
        </h2>
        <div class="descripcion1" align="center">
          <h3><label>DESCRIPCIONES</label></h3>
          <fieldset style="width:65%; border-color: #000000; color: #000000; background-color: #C0C0C0;" align="left">
            <legend><label>NÚM. PARTE/ PROCESO</label>
              <input type="text" name="parte10" id="parte10" value="0050" style="width : 30px;" readonly>
            </legend>
            <label>NOMBRE DEL PROCESO  / DESCRIPCIÓN DE OPERACIÓN:</label>
            <input type="text" name="NomProceso10_1" id="NomProceso10_1" value="<?php echo $filaD['nombreProceso']; ?>"   style="width : 350px;"><br><br>
            <label>MÁQUINA O DISPOSITIVO PARA MANUFACTURA:</label>
            <input type="text" name="dispositivo" id="dispositivo" value="<?php echo $filaD['dispositivo']; ?>" ><br>
            <br><br>
            <?php while($filaD2 = $resultD2  -> fetch_assoc()) { // Mientras exista información...
              for($i=0; $i <= 40 ; $i++) {
                if($filaD2['no'] == $i) { // Si existe i cantidad de actividades
                   $prefix = $i == 1 ? "" : $i; // Si i es igual a 1 que no se imprima, de lo contrario, mostrar el número ?>
                  <fieldset style="border-color: #000000; color: #000000; background-color: #58A1FF;" >
                    <legend>
                      <label>No.</label>
                      <input type="text" name="no<?php echo $prefix; ?>" id="no<?php echo $i; ?>" value="<?php echo $filaD2['no']; ?>" style="border-style:solid; font-size: 12pt; width : 17px;" readonly>
                      <input type="hidden" name="valor_i" value="<?php echo $i; ?>">
                    </legend>
                    <label>PRODUCTO:</label>
                    <input type="text" name="producto<?php echo $prefix; ?>" id="producto<?php echo $i; ?>" value="<?php echo $filaD2['producto']; ?>" >
                    &nbsp &nbsp
                    <label>PROCESO:</label>
                    <input type="text" name="proceso<?php echo $prefix; ?>" id="proceso<?php echo $i; ?>" value="<?php echo $filaD2['proceso']; ?>"  >
                    <br><br>
                    <label>RESPONSABLE:</label>
                    <input type="text" name="responsable<?php echo $prefix; ?>" id="responsable<?php echo $i; ?>" value="<?php echo $filaD2['responsable']; ?>" >
                    &nbsp &nbsp
                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                    <input type="text" name="clasificacion<?php echo $prefix; ?>" id="clasificacion<?php echo $i; ?>" value="<?php echo $filaD2['clasificacion']; ?>" style="width : 30px;">
                    <br><br>
                    <div align='center'>
                      <label>MÉTODOS</label>
                    </div>
                    <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                    <input type="text" name="especificacion<?php echo $prefix; ?>" id="especificacion<?php echo $i; ?>" value="<?php echo $filaD2['especificacion']; ?>"  style="width : 350px;" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                    <input type="text" name="evaluacion<?php echo $prefix; ?>" id="evaluacion<?php echo $i; ?>" value="<?php echo $filaD2['evaluacion']; ?>"  style="width : 350px;">
                    <br><br>
                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                      <legend><label>MUESTRA</label></legend>
                      <label>TAMAÑO:</label>
                      <input type="text" name="tamanio<?php echo $prefix; ?>" id="tamanio<?php echo $i; ?>" value="<?php echo $filaD2['tamanio']; ?>"  style="width : 25px;" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>
                      <label>FRECUENCIA:</label>
                      <input type="text" name="frecuencia<?php echo $prefix; ?>" id="frecuencia<?php echo $i; ?>" value="<?php echo $filaD2['frecuencia']; ?>"  style="width : 250px;" ><br>
                    </fieldset><br>
                    <label>MÉTODO DE CONTROL:</label>
                    <input type="text" name="metodoCap<?php echo $prefix; ?>" id="metodoCap<?php echo $i; ?>" value="<?php echo $filaD2['metodoCap']; ?>"  style="width : 80px;" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                    <div align="right">
                      <button id="boton_5" class="eliminar" data-id="<?php echo $i; ?>">Eliminar</button> <!-- el atributo data-id permitirá capturar el no. de actividad específico -->
                    </div>
                  </fieldset>
                  <br>
            <?php }
                }
              } ?>
            <br>
            <div align='right'>
              <fieldset style="width:35%; background-color: #58A1FF; border-color: #000000;">
                <button id="boton_5" type='submit' onclick="this.form.action='borrarActPC.php';this.form.submit();">BORRAR ACTIVIDAD</button><br><br>
                <font color="#FF0000"><b>NOTA:</font> SE ELIMINARÁ LA ÚLTIMA <br> ACTIVIDAD REGISTRADA.</b><br><br><br>
              </fieldset>
            </div>
            <div align='center'>
              <label>AGREGAR ACTIVIDAD</label><br>
              <label>CANT.</label>
              <select class="noC" name="noC10_1" id="noC10_1" onchange="javascript:mostrarCaract();"> <!-- Cuando haya cambio de opción, se ejecutará el método mostrarCaract() -->
                <option value="">---</option>
                <?php for ($i=1; $i <=20; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <?php for ($i=1; $i <= 20; $i++): ?> <!-- Se crean los bloques para las actividades que se van a agregar -->
              <div id="flotanteC<?php echo $i; ?>" style="display: none;">
                <div id="closeC<?php echo $i; ?>">
                  <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                    <legend>
                      <label>No.</label>
                      <input type="text" name="no1_<?php echo $i; ?>" id="no1_<?php echo $i; ?>" value="<?php echo $filaD3['res']+$i; ?>" style="font-size: 12pt; width : 30px" readonly>
                    </legend>
                    <label>PRODUCTO:</label>
                    <select class="prod" name="pod1_<?php echo $i; ?>" id="pod1_<?php echo $i; ?>" required>
                      <option value="">------------------------------------------------</option>
                      <?php foreach ($productos as $producto): ?> <!-- Se muestra cada elemento del arreglo -->
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
          </fieldset>
        </div>
      </div>
      <br>
      <br>
      <div align='center'>
        <button type='submit'  class='boton_2'  onclick="this.form.action='GenerarPCM.php';this.form.submit();"><img src='/produccion/img/atras.png' width='20' height='20' class='zoom'/>REGRESAR</button>
        <button type='submit'  class='boton_1'  onclick="this.form.action='guardarPCcambiosPartesM.php';this.form.submit();"><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
      </div>
      <br><br>
      <div align="center">
        <button class="boton_3" name="boton_3" onclick="addVariables()"><img src='/produccion/img/agregar2.png' width='20' height='20' class='zoom'/>Añadir Variables</button>
      </div>
    </form>
    <div id="formAddVar" align="center" style="display: none;">
      <form action="" method="post" id="formulario2">
        <fieldset style="width:65%; border-color: #000000; color: #000000; background-color: #C0C0C0;" align="left">
          <legend>AGREGAR NUEVAS VARIABLES</legend>
          <input type="text" name="int" id="int" value="0050" style="display: none;">
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
          <button id="boton-enviar" type='button'  class='boton_1' onclick="this.form.action='agregarVariablesM.php';"><img src='/produccion/img/guardar.png' width='20' height='20' />AÑADIR</button>
        </fieldset>
      </form>
    </div>
    <script>
      var botonEnviar = document.getElementById('boton-enviar');
      var form2 = document.getElementById('formulario2');
      var input = document.getElementById("parte10");
      var atributo = input.getAttribute("value");
      var input2 = document.getElementById("componente");
      var atributo2 = input2.getAttribute("value");
      var input3 = document.getElementById("parte10");
      var atributo3 = input3.getAttribute("value");

      // Obtener todos los botones de eliminar
      var botonesEliminar = document.getElementsByClassName("eliminar");

      botonEnviar.addEventListener('click', function(event) {
        // Detener el envío del formulario
        event.preventDefault();
        form2.submit();
      });

      // Recorrer los botones de eliminar
      for (var i = 0; i < botonesEliminar.length; i++) {
        // Asignar evento clic a cada botón de eliminar
        botonesEliminar[i].addEventListener("click", function() {
          // Obtener el valor de 'data-id' del botón de eliminar actual
          var id = this.getAttribute("data-id");
          var to = input.getAttribute("name");

          // Crear un elemento de formulario dinámicamente
          var form = document.createElement("form");
          form.method = "post";
          form.action = "borrarActPC2.php";

          // Crear un campo oculto para almacenar el valor de 'id'
          var inputId = document.createElement("input");
          inputId.type = "hidden";
          inputId.name = "valor_i";
          inputId.value = id;

          var inputId2 = document.createElement("input");
          inputId2.type = "hidden";
          inputId2.name = "total";
          inputId2.value = atributo;

          var inputId3 = document.createElement("input");
          inputId3.type = "hidden";
          inputId3.name = "componente";
          inputId3.value = atributo2;

          var inputId4 = document.createElement("input");
          inputId4.type = "hidden";
          inputId4.name = "parte10";
          inputId4.value = atributo3;

          // Agregar el campo oculto al formulario
          form.appendChild(inputId);
          form.appendChild(inputId2);
          form.appendChild(inputId3);
          form.appendChild(inputId4);  // Corregir aquí

          // Agregar el formulario al documento y enviarlo automáticamente
          document.body.appendChild(form);
          form.submit();
        });
      }

      function addVariables() {
        var form2 = document.getElementById('formAddVar');
        if (form2.style.display == 'none') { // Si no era visible ...
          form2.style.display = '';
        }else{
          form2.style.display = 'none';
        }
      }

      function validacion() {
        num = document.getElementById("noC10_1").selectedIndex;

        for (var i = 1; i <= 20; i++) {
          if (!validarCampos(i)) return false;
        }
        return true;
      }

      function validarCampos(index) {
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
  <body>
  </body>
</html>
