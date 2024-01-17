<?php
  header("Content-Type: text/html;charset=utf-8");

  if(!($conexion = mysqli_connect("localhost", "root", "" ))) {
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db( $conexion, "jc_mysql"))) {
    echo "Error seleccionando la base de datos.";
    exit();
  }

  mysqli_set_charset($conexion,"UTF8");

  $orden = $_POST['orden'];
  $componente = $_POST['componente'];
  $cantidad = $_POST['cantidad'];

  $query = "SELECT * FROM loteeconomico,embarque WHERE loteeconomico.componente ='$componente' AND embarque.componente AND cantAct > '0'";
  $result = $conexion -> query($query);
  $fila = $result  -> fetch_assoc();

  $sql = "SELECT * FROM embarque WHERE componente ='$componente' AND orden='$orden' ";
  $rest = $conexion -> query($sql);
  $fil = $rest -> fetch_assoc();


    if (isset($_POST['ubicacion'])) {
      $u = substr($_POST['ubicacion'],-2);
        $upUbi = "UPDATE ubicacion SET disponible='0' WHERE palet='$u'";
        $ruupubi = $conexion -> query($upUbi);
    }



  $cantidadcp = $fil['cantidad'];
  $cunetes = $fil['noCuñetes'];
  $pesoNeto = $fil['pesoNeto'];

  $queryUbi = "SELECT * FROM ubicacion WHERE disponible=0";
  $rubi = $conexion -> query($queryUbi);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Almacén</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    <script type="text/javascript">
      $(document).ready(function(){
          $(':checkbox[readonly=readonly]').click(function(){
            return false;
          });
      })
    </script>
    <style type="text/css">
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
      .boton_1:hover {
        opacity: 0.6;
        text-decoration: none;
      }
      .boton_2 {
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
      .boton_2:hover {
        opacity: 0.6;
        text-decoration: none;
      }
      .select-grande {
        width: 200px;
        height: 40px;
        font-size: 15px;
      }
    </style>
  </head>
  <body align = "center" bgcolor="#AED6F1">
    <style type="text/css">
      img.izquierda {
        float: left;
      }
    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='100' height='100' />
    <form  method='post' id="formulario">
      <h1 align = "center"><font face="Bookman Old Style,arial,verdana" size="8">A L M A C É N</font></h1><br>
      <h3 align = "center">
        <font size=5>
          <table border="1" align='center'>
            <tr>
              <td bgcolor='#42A2F1'><label>ORDEN:</label> <input type="text" name="orden" id="orden" style="background-color:#42A2F1;  border-color:#42A2F1; border-style:solid; font-family: Arial; font-size: 16pt;" readonly value="<?php echo $orden ?>" > <br><br></td>
              <td bgcolor='#42A2F1'><label>COMPONENTE:</label> <input type="text" name="componente" id="componente" style="background-color:#42A2F1;  border-color:#42A2F1; border-style:solid; font-family: Arial; font-size: 16pt;" readonly value="<?php echo $componente ?>"> <br><br></td>
            </tr>
            <tr>
              <?php if($result -> num_rows > 0) {?>
                <td bgcolor='#F55757' colspan='2'><label>LOTE ECONÓMICO</label></td>
            </tr>
            <tr>
              <td bgcolor='#FE9C9C'><label>CANTIDAD ACT.:</label> <input type="text" name="cantAc" id="cantAc" style="background-color:#FE9C9C;  border-color:#FE9C9C; border-style:solid; font-family: Arial; font-size: 16pt;" readonly value="<?php echo $fila['cantAct']; ?>"> <br><br></td>
              <td bgcolor='#FE9C9C'><label>SALIDA:</label> <input type="number"  name="salida" id="salida" style="font-family: Arial; font-size: 14pt;" required>*<br><br></td>
            </tr>
            <tr>
              <td bgcolor='#FE9C9C'><label>FECHA: </label><input type="date"  name="fechaSal" id="fechaSal" style="font-family: Arial; font-size: 14pt;" required>*<br><br></td>
              <td bgcolor='#FE9C9C'><label>VERIFICADO POR:</label>
                <select class="opera" name="verySal" id="verySal" style=" font-size: 14pt">
                  <option value="">--------------</option>
                  <option value='RAMÓN B.'>RAMÓN B.</option>
                  <option value='JAVIER F.'>JAVIER F.</option>
                </select>*<br><br>
              </td>
            </tr>
            <?php } ?>
            <tr>
              <td bgcolor='#42A2F1'><label>CANTIDAD:</label><input type="number" name="cantidad" id="cantidad" style="background-color:#42A2F1;  border-color:#42A2F1; border-style:solid; font-family: Arial; font-size: 16pt;" readonly value="<?php echo $cantidadcp; ?>"><br><br></td>
              <td bgcolor='#42A2F1'><label>NO. CUÑETES:</label> <input type="text" name="noCu" id="noCu"  style="background-color:#42A2F1;  border-color:#42A2F1; border-style:solid; font-family: Arial; font-size: 16pt;" readonly value="<?php echo $cunetes; ?>"><br><br></td>
            </tr>
            <tr>
              <td bgcolor='#42A2F1' colspan="2">
                <label>PESO NETO:</label><input type="text" name="pesoNeto" id="pesoNeto"  style="background-color:#42A2F1;  border-color:#42A2F1; border-style:solid; font-family: Arial; font-size: 16pt;" readonly value="<?php echo $pesoNeto; ?>"><br><br></td>

            </tr>
            <tr>
              <input type="text" name="ubi" id="ubi" style="display: none;">
              <td bgcolor='#89C7FA' colspan="2">
                <center>
                  <label>UBICACIÓN:</label></center>
                  <br>
                  <label for="Nave">Nave:</label>
                  <select class="select-grande" id="Nave" name="Nave" onchange="actualizarSegundoSelect()">
                    <option value="">----</option>
                    <option value="Nave1">Nave 1</option>
                    <option value="Nave3">Nave 3</option>
                  </select><br><br>
                  <label for="Locacion" id="lblLocacion" style="display: none;">Locación:</label>
                  <select class="select-grande" id="Locacion" name="Locacion" style="display: none;">
                    <option value="">---</option>
                    <option value="MI">MI</option>
                    <option value="MD">MD</option>
                    <option value="CAJAS">CAJAS</option>
                  </select><br><br>
                  <label for="Palet" id="lblPalet" style="display: none;">Palet:</label>
                  <select class="select-grande" id="Palet" name="Palet" style="display: none;">
                    <option value="">---</option>
                    <?php while ($filU = $rubi -> fetch_assoc()) {  ?>
                      <option value="<?php echo $filU['palet']; ?>"><?php echo $filU['palet']; ?></option>
                    <?php } ?>
                  </select><br><br>
                  <!-- <label for="Seccion" id="lblSeccion" style="display: none;">Zona:</label>
                  <select class="select-grande" id="Seccion" name="Seccion" style="display: none;">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select> -->
                <br><br></td>
            </tr>
          </table><br>
          <a class="boton_2" name="boton_2" href="/produccion/AlmacenInterfaz.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
          <button id="boton-enviar" type='button' class='boton_1' onclick="this.form.action='guardarAlmacen.php'"><img src='/produccion/img/guardar.png' width='20' height='20' />GUARDAR</button>
        </font>
      </form>
    </h3>
    <script type="text/javascript">
      var form = document.getElementById('formulario');
      var botonEnviar = document.getElementById('boton-enviar');

      botonEnviar.addEventListener('click', function(event) {
        // Detener el envío del formulario
        event.preventDefault();
      //  enviar();
        form.submit();
        // Realizar la validación de los campos aquí
      /*  if (validacion()) {
          // Si la validación es exitosa, enviar el formulario manualmente
          form.submit();
        } else {
          // Si la validación falla, muestra un mensaje o realiza alguna acción adicional
          alert('Por favor, complete todos los campos requeridos.');
        }*/
      });

      function actualizarSegundoSelect() {
        var primerSelect = document.getElementById('Nave');
        var segundoSelect = document.getElementById('Locacion');
        var tercerSelect = document.getElementById('Palet');
        var lblSegundoSelect = document.getElementById('lblLocacion');
        var lblTercerSelect = document.getElementById('lblPalet');

        // Se obtiene el valor seleccionado del primer select
        var valorSeleccionado = primerSelect.value;
        // Reestablecer el segundo select y ocultarlo
        segundoSelect.style.display = "none";
        lblSegundoSelect.style.display = "none";
        tercerSelect.style.display = "none";
        lblTercerSelect.style.display = "none";
        //Opción Default
        var defOpcion = document.createElement('option');
        /*defOpcion.text = "---";
        SegundoSelect.add(defOpcion);*/

        // Verificar el valor seleccionado y actualizar el select de Locación segun corresponda
        if (valorSeleccionado === "Nave1") {
          segundoSelect.style.display = "";
          lblSegundoSelect.style.display = "";
          segundoSelect.style.display = "";
          lblSegundoSelect.style.display = "";
          //mostrarTercerSelect();

          /*
          var opciones = ["MD", "MI","CAJAS"];
          lblsegundoSelect.textContent = "Locación:";
          opciones.forEach(function(opcion) {
              var option = document.createElement('option');
              option.text = opcion;
              segundoSelect.add(option);
              mostrarTercerSelect();
            });*/
        } else if(valorSeleccionado === "Nave3") {
          segundoSelect.style.display = "none";
          lblSegundoSelect.style.display = "none";
          lblTercerSelect.style.display = "";
          tercerSelect.style.display = "";
          mostrarTercerSelect();
          /*var opciones = ["A","B","C","D","E","F","G","H"];
          lblsegundoSelect.textContent = "Palet:";
          opciones.forEach(function(opcion){
            var option = document.createElement('option');
            option.text = opcion;
            segundoSelect.add(option);
            mostrarTercerSelect();
          });*/
        }
        // Mostrar el segundo select y su etiqueta si es necesario
        /*if (valorSeleccionado !== "" || primerSelect.selectedIndex === "" || primerSelect.selectedIndex === 0) {
          segundoSelect.style.display = "";
          lblsegundoSelect.style.display = "";
        }*/
      }


    /*  function actualizarSegundoSelect() {
        var primerSelect = document.getElementById('Nave');
        var segundoSelect = document.getElementById('Palet');
        var lblsegundoSelect = document.getElementById('lblPalet');

        // Se obtiene el valor seleccionado del primer select
        var valorSeleccionado = primerSelect.value;
        // Reestablecer el segundo select y ocultarlo
        segundoSelect.innerHTML = '';
        segundoSelect.style.display = "none";
        lblsegundoSelect.style.display = "none";
        //Opción Default
        var defOpcion = document.createElement('option');
        defOpcion.text = "---";
        segundoSelect.add(defOpcion);

        // Verificar el valor seleccionado y actualizar el select de Locación segun corresponda
        if (valorSeleccionado === "Nave1") {
          var opciones = ["MD", "MI","CAJAS"];
          lblsegundoSelect.textContent = "Locación:";
          opciones.forEach(function(opcion) {
              var option = document.createElement('option');
              option.text = opcion;
              segundoSelect.add(option);
              mostrarTercerSelect();
            });
        } else if(valorSeleccionado === "Nave3") {
          var opciones = ["A","B","C","D","E","F","G","H"];
          lblsegundoSelect.textContent = "Palet:";
          opciones.forEach(function(opcion){
            var option = document.createElement('option');
            option.text = opcion;
            segundoSelect.add(option);
            mostrarTercerSelect();
          });
        }
        // Mostrar el segundo select y su etiqueta si es necesario
        if (valorSeleccionado !== "" || primerSelect.selectedIndex === "" || primerSelect.selectedIndex === 0) {
          segundoSelect.style.display = "";
          lblsegundoSelect.style.display = "";
        }
      } */
      function mostrarTercerSelect() {
        var primerSelect = document.getElementById('Nave');
        var select3 = document.getElementById('Seccion');
        var lblTercerSelect = document.getElementById('lblSeccion');

        // Se obtiene el valor seleccionado del primer select
        var valorSeleccionado = primerSelect.value;

        if (valorSeleccionado == "Nave1") {
          select3.style.display = 'none';
          lblTercerSelect.style.display = 'none';
        }else if (valorSeleccionado == "Nave3") {
          if (select3.style.display == 'none' && lblTercerSelect.style.display == 'none' ) {
            select3.style.display = '';
            lblTercerSelect.style.display = '';
          }
        }
      }

      function enviar(){
        var primerSelect = document.getElementById('Nave');
        var segundoSelect = document.getElementById('Palet');
        var tercerSelect = document.getElementById('Seccion');


      }

      function validacion() {
        var primerSelect = document.getElementById('Nave');
        var segundoSelect = document.getElementById('Palet');
        var tercerSelect = document.getElementById('Seccion');

        if (primerSelect.selectedIndex === "" || primerSelect.selectedIndex === 0) {
          alert("CAPTURA CORRECTAMENTE LA NAVE");
          return false;
        }else {
          if (primerSelect.value === "Nave1") {
            if (segundoSelect.selectedIndex === "" || segundoSelect.selectedIndex === 0) {
              alert("CAPTURA CORRECTAMENTE LA LOCACIÓN");
              return false;
            }
            return true;
          }else if(primerSelect.value === "Nave3") {
            if (segundoSelect.selectedIndex === "" || segundoSelect.selectedIndex === 0) {
              alert("CAPTURA CORRECTAMENTE LA LOCACIÓN");
              return false;
            }else if (tercerSelect.selectedIndex === "" || tercerSelect.selectedIndex === 0) {
              alert("CAPTURA CORRECTAMENTE LA SECCIÓN");
              return false;
            }
            return true;
          }
        }
      }
    </script>
  </body>
</html>
<?php

  $conexion ->close(); ?>
