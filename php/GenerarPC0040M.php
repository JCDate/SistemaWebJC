
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

  $componente = $_POST['componente'];

  $queryD = "SELECT * FROM descripcion1pc WHERE componente='$componente' AND noPartesP='0040'";
  $resultD = $conexion -> query($queryD);
  $filaD = $resultD  -> fetch_assoc();

  $queryD2 = "SELECT descripcion2pc.componente, descripcion2pc.noPartesP, descripcion2pc.no, descripcion2pc.producto, descripcion2pc.proceso, descripcion2pc.responsable, descripcion2pc.clasificacion, descripcion3pc.especificacion, descripcion3pc.evaluacion, descripcion3pc.tamanio, descripcion3pc.frecuencia, descripcion3pc.metodoCap FROM descripcion2pc, descripcion3pc WHERE descripcion2pc.componente='$componente' AND descripcion2pc.noPartesP='0040'
  AND descripcion3pc.componente='$componente' AND descripcion3pc.noPartesP='0040' AND descripcion3pc.no= descripcion2pc.no";
  $resultD2 = $conexion -> query($queryD2);

  $queryD3 = "SELECT MAX(no) AS res FROM descripcion2pc WHERE componente='$componente' AND noPartesP='0040'";
  $resultD3 = $conexion -> query($queryD3);
  $filaD3 = $resultD3  -> fetch_assoc();

  $query = "SELECT componente_CA FROM consumoyantecedentes WHERE componente_CA='$componente'";
  $result = $conexion -> query($query);

  $query2 = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre";
  $result2 = $conexion -> query($query2);
  $fila2 = $result2  -> fetch_assoc();


?>
  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


      <title>PLAN DE CONTROL M</title>
      <link rel="shortcut icon" href="/produccion/img/icono.png">
    </head>
    <body bgcolor="#AED6F1">
        <form method='post' id="formulario" onsubmit="return validacion()">

        <h1 align='center'>PLAN DE CONTROL</h1><br>

          <div >
            <h2 align='center'> <label>COMPONENTE: </label>
             <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#AED6F1;  border-color:#AED6F1; border-style:solid; font-size: 17pt; width:7%;">
            </h2>

            <div class="descripcion1" align="center">
              <h3><label>DESCRIPCIONES</label></h3>

              <?php //Inicia primero ?>
              <fieldset style="width:65%; border-color: #000000; color: #000000; background-color: #C0C0C0;" align="left">
                  <legend><label>NÚM. PARTE/ PROCESO </label>
                    <input type="text" name="parte10" id="parte10" value="0040" style="width : 30px" readonly>
                  </legend>
                        <label>NOMBRE DEL PROCESO  / DESCRIPCIÓN DE OPERACIÓN:</label>
                        <input type="text" name="NomProceso10_1" id="NomProceso10_1" value="<?php echo $filaD['nombreProceso'] ?>"   style="width : 350px"><br><br>

                          <label>MÁQUINA O DISPOSITIVO PARA MANUFACTURA:</label>
                          <input type="text" name="dispositivo" id="dispositivo" value="<?php echo $filaD['dispositivo'] ?>" ><br>
                          <br><br>

                      <?php while ($filaD2 = $resultD2  -> fetch_assoc()){
                              if($filaD2['no'] == 1) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no" id="no" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto" id="producto" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso" id="proceso" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable" id="responsable" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion" id="clasificacion" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion" id="especificacion" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion" id="evaluacion" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;"  align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio" id="tamanio" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia" id="frecuencia" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap" id="metodoCap" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 2) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no2" id="no2" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto2" id="producto2" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso2" id="proceso2" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable2" id="responsable2" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion2" id="clasificacion2" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion2" id="especificacion2" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion2" id="evaluacion2" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio2" id="tamanio2" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia2" id="frecuencia2" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap2" id="metodoCap2" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 3) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no3" id="no3" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto3" id="producto3" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso3" id="proceso3" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable3" id="responsable3" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion3" id="clasificacion3" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion3" id="especificacion3" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion3" id="evaluacion3" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio3" id="tamanio3" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia3" id="frecuencia3" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap3" id="metodoCap3" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 4) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no4" id="no4" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto4" id="producto4" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso4" id="proceso4" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable4" id="responsable4" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion4" id="clasificacion4" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion4" id="especificacion4" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion4" id="evaluacion4" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio4" id="tamanio4" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia4" id="frecuencia4" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap4" id="metodoCap4" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 5) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no5" id="no5" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto5" id="producto5" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso5" id="proceso5" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable5" id="responsable5" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion5" id="clasificacion5" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion5" id="especificacion5" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion5" id="evaluacion5" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio5" id="tamanio5" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia5" id="frecuencia5" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap5" id="metodoCap5" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 6) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no6" id="no6" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto6" id="producto6" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso6" id="proceso6" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable6" id="responsable6" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion6" id="clasificacion6" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion6" id="especificacion6" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion6" id="evaluacion6" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio6" id="tamanio6" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia6" id="frecuencia6" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap6" id="metodoCap6" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 7) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no7" id="no7" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto7" id="producto7" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso7" id="proceso7" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable7" id="responsable7" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion7" id="clasificacion7" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion7" id="especificacion7" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion7" id="evaluacion7" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio7" id="tamanio7" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia7" id="frecuencia7" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                    </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap7" id="metodoCap7" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 8) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no8" id="no8" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto8" id="producto8" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso8" id="proceso8" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable8" id="responsable8" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion8" id="clasificacion8" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion8" id="especificacion8" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion8" id="evaluacion8" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio8" id="tamanio8" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia8" id="frecuencia8" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap8" id="metodoCap8" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 9) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no9" id="no9" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto9" id="producto9" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso9" id="proceso9" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable9" id="responsable9" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion9" id="clasificacion9" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion9" id="especificacion9" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion9" id="evaluacion9" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio9" id="tamanio9" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia9" id="frecuencia9" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap9" id="metodoCap9" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 10) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no10" id="no10" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto10" id="producto10" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso10" id="proceso10" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable10" id="responsable10" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion10" id="clasificacion10" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion10" id="especificacion10" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion10" id="evaluacion10" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio10" id="tamanio10" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia10" id="frecuencia10" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap10" id="metodoCap10" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 11) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no11" id="no11" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto11" id="producto11" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso11" id="proceso11" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable11" id="responsable11" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion11" id="clasificacion11" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion11" id="especificacion11" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion11" id="evaluacion11" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio11" id="tamanio11" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia11" id="frecuencia11" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap11" id="metodoCap11" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 12) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no12" id="no12" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto12" id="producto12" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso12" id="proceso12" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable12" id="responsable12" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion12" id="clasificacion12" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion12" id="especificacion12" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion12" id="evaluacion12" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio12" id="tamanio12" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia12" id="frecuencia12" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap12" id="metodoCap12" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 13) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no13" id="no13" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto13" id="producto13" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso13" id="proceso13" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable13" id="responsable13" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion13" id="clasificacion13" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion13" id="especificacion13" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion13" id="evaluacion13" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio13" id="tamanio13" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia13" id="frecuencia13" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap13" id="metodoCap13" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 14) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no14" id="no14" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto14" id="producto14" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso14" id="proceso14" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable14" id="responsable14" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion14" id="clasificacion14" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion14" id="especificacion14" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion14" id="evaluacion14" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio14" id="tamanio14" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia14" id="frecuencia14" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap14" id="metodoCap14" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 15) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no15" id="no15" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto15" id="producto15" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso15" id="proceso15" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable15" id="responsable15" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion15" id="clasificacion15" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion15" id="especificacion15" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion15" id="evaluacion15" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio15" id="tamanio15" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia15" id="frecuencia15" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap15" id="metodoCap15" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 16) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no16" id="no16" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto16" id="producto16" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso16" id="proceso16" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable16" id="responsable16" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion16" id="clasificacion16" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion16" id="especificacion16" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion16" id="evaluacion16" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio16" id="tamanio16" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia16" id="frecuencia16" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap16" id="metodoCap16" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 17) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no17" id="no17" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto17" id="producto17" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso17" id="proceso17" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable17" id="responsable17" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion17" id="clasificacion17" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion17" id="especificacion17" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion17" id="evaluacion17" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio17" id="tamanio17" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia17" id="frecuencia17" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap17" id="metodoCap17" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 18) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no18" id="no18" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto18" id="producto18" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso18" id="proceso18" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable18" id="responsable18" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion18" id="clasificacion18" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion18" id="especificacion18" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion18" id="evaluacion18" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio18" id="tamanio18" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia18" id="frecuencia18" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap18" id="metodoCap18" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 19) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no19" id="no19" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto19" id="producto19" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso19" id="proceso19" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable19" id="responsable19" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion19" id="clasificacion19" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion19" id="especificacion19" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion19" id="evaluacion19" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio19" id="tamanio19" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia19" id="frecuencia19" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap19" id="metodoCap19" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 20) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no20" id="no20" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto20" id="producto20" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso20" id="proceso20" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable20" id="responsable20" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion20" id="clasificacion20" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion20" id="especificacion20" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion20" id="evaluacion20" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio20" id="tamanio20" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia20" id="frecuencia20" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap20" id="metodoCap20" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 21) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no21" id="no21" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto21" id="producto21" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso21" id="proceso21" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable21" id="responsable21" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion21" id="clasificacion21" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion21" id="especificacion21" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion21" id="evaluacion21" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio21" id="tamanio21" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia21" id="frecuencia21" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap21" id="metodoCap21" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 22) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no22" id="no22" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto22" id="producto22" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso22" id="proceso22" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable22" id="responsable22" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion22" id="clasificacion22" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion22" id="especificacion22" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion22" id="evaluacion22" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio22" id="tamanio22" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia22" id="frecuencia22" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap22" id="metodoCap22" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 23) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no23" id="no23" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto23" id="producto23" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso23" id="proceso23" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable23" id="responsable23" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion23" id="clasificacion23" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion23" id="especificacion23" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion23" id="evaluacion23" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio23" id="tamanio23" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia23" id="frecuencia23" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap23" id="metodoCap23" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 24) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no24" id="no24" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto24" id="producto24" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso24" id="proceso24" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable24" id="responsable24" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion24" id="clasificacion24" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion24" id="especificacion24" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion24" id="evaluacion24" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio24" id="tamanio24" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia24" id="frecuencia24" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap24" id="metodoCap24" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 25) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no25" id="no25" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto25" id="producto25" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso25" id="proceso25" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable25" id="responsable25" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion25" id="clasificacion25" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion25" id="especificacion25" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion25" id="evaluacion25" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio25" id="tamanio25" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia25" id="frecuencia25" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap25" id="metodoCap25" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 26) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no26" id="no26" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto26" id="producto26" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso26" id="proceso26" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable26" id="responsable26" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion26" id="clasificacion26" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion26" id="especificacion26" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion26" id="evaluacion26" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio26" id="tamanio26" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia26" id="frecuencia26" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap26" id="metodoCap26" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 27) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no27" id="no27" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto27" id="producto27" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso27" id="proceso27" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable27" id="responsable27" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion27" id="clasificacion27" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion27" id="especificacion27" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion27" id="evaluacion27" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio27" id="tamanio27" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia27" id="frecuencia27" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap27" id="metodoCap27" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 28) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no28" id="no28" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto28" id="producto28" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso28" id="proceso28" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable28" id="responsable28" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion28" id="clasificacion28" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion28" id="especificacion28" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion28" id="evaluacion28" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio28" id="tamanio28" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia28" id="frecuencia28" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap28" id="metodoCap28" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 29) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no29" id="no29" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto29" id="producto29" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso29" id="proceso29" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable29" id="responsable29" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion29" id="clasificacion29" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion29" id="especificacion29" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion29" id="evaluacion29" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio29" id="tamanio29" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia29" id="frecuencia29" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap29" id="metodoCap29" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 30) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no30" id="no30" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto30" id="producto30" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso30" id="proceso30" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable30" id="responsable30" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion30" id="clasificacion30" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion30" id="especificacion30" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion30" id="evaluacion30" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio30" id="tamanio30" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia30" id="frecuencia30" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap30" id="metodoCap30" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 31) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no31" id="no31" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto31" id="producto31" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso31" id="proceso31" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable31" id="responsable31" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion31" id="clasificacion31" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion31" id="especificacion31" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion31" id="evaluacion31" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio31" id="tamanio31" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia31" id="frecuencia31" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap31" id="metodoCap31" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 32) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no32" id="no32" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto32" id="producto32" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso32" id="proceso32" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable32" id="responsable32" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion32" id="clasificacion32" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion32" id="especificacion32" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion32" id="evaluacion32" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio32" id="tamanio32" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia32" id="frecuencia32" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap32" id="metodoCap32" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 33) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no33" id="no33" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto33" id="producto33" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso33" id="proceso33" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable33" id="responsable33" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion33" id="clasificacion33" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion33" id="especificacion33" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion33" id="evaluacion33" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio33" id="tamanio33" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia33" id="frecuencia33" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap33" id="metodoCap33" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 34) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no34" id="no34" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto34" id="producto34" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso34" id="proceso34" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable34" id="responsable34" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion34" id="clasificacion34" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion34" id="especificacion34" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion34" id="evaluacion34" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio34" id="tamanio34" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia34" id="frecuencia34" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap34" id="metodoCap34" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 35) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no35" id="no35" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto35" id="producto35" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso35" id="proceso35" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable35" id="responsable35" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion35" id="clasificacion35" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion35" id="especificacion35" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion35" id="evaluacion35" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio35" id="tamanio35" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia35" id="frecuencia35" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap35" id="metodoCap35" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 36) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no36" id="no36" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto36" id="producto36" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso36" id="proceso36" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable36" id="responsable36" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion36" id="clasificacion36" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion36" id="especificacion36" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion36" id="evaluacion36" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio36" id="tamanio36" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia36" id="frecuencia36" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap36" id="metodoCap36" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 37) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no37" id="no37" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto37" id="producto37" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso37" id="proceso37" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable37" id="responsable37" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion37" id="clasificacion37" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion37" id="especificacion37" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion37" id="evaluacion37" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio37" id="tamanio37" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia37" id="frecuencia37" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap37" id="metodoCap37" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 38) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no38" id="no38" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto38" id="producto38" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso38" id="proceso38" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable38" id="responsable38" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion38" id="clasificacion38" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion38" id="especificacion38" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion38" id="evaluacion38" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio38" id="tamanio38" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia38" id="frecuencia38" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap38" id="metodoCap38" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 39) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no39" id="no39" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto39" id="producto39" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso39" id="proceso39" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable39" id="responsable39" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion39" id="clasificacion39" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion39" id="especificacion39" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion39" id="evaluacion39" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio39" id="tamanio39" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia39" id="frecuencia39" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap39" id="metodoCap39" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }
                              if($filaD2['no'] == 40) {?>
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no40" id="no40" value="<?php echo $filaD2['no'] ?>" style="background-color:#C0C0C0;  border-color:#C0C0C0; border-style:solid; font-size: 12pt; width : 17px" readonly>
                                  </legend>

                                  <label>PRODUCTO:</label>
                                  <input type="text" name="producto40" id="producto40" value="<?php echo $filaD2['producto'] ?>" >

                                    &nbsp
                                    &nbsp

                                    <label>PROCESO:</label>
                                    <input type="text" name="proceso40" id="proceso40" value="<?php echo $filaD2['proceso'] ?>"  >

                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                      <input type="text" name="responsable40" id="responsable40" value="<?php echo $filaD2['responsable'] ?>" >
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <input type="text" name="clasificacion40" id="clasificacion40" value="<?php echo $filaD2['clasificacion'] ?>" style="width : 30px">

                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacion40" id="especificacion40" value="<?php echo $filaD2['especificacion'] ?>"  style="width : 350px" onkeyup="javascript:this.value=this.value.toUpperCase();" > <br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <input type="text" name="evaluacion40" id="evaluacion40" value="<?php echo $filaD2['evaluacion'] ?>"  style="width : 350px">

                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #80B7B1;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                          <label>TAMAÑO:</label>
                                          <input type="text" name="tamanio40" id="tamanio40" value="<?php echo $filaD2['tamanio'] ?>"  style="width : 25px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br>

                                          <label>FRECUENCIA:</label>
                                          <input type="text" name="frecuencia40" id="frecuencia40" value="<?php echo $filaD2['frecuencia'] ?>"  style="width : 250px" ><br>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL:</label>
                                <input type="text" name="metodoCap40" id="metodoCap40" value="<?php echo $filaD2['metodoCap'] ?>"  style="width : 80px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br><br>
                              <?php }

                            }?>
                            <div align='right'>
                              <button type='submit'   onclick="this.form.action='borrarActPC.php';this.form.submit();">BORRAR ACTIVIDAD</button><br>
                              <font color="#FF0000"><b>NOTA:</font> SE ELIMINARÁ LA ÚLTIMA <br> ACTIVIDAD REGISTRADA.</b><br><br><br>
                            </div>
                                <div align='center'>
                                  <label>AGREGAR ACTIVIDAD</label><br>
                                  <label>CANT.</label>
                                  <select  class="noC" name="noC10_1" id="noC10_1" onchange="javascript:mostrarCaract();">
                                    <option value="">---</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                  </select>

                                </div>

                                <div id="flotanteC1" style="display:none;">
                                  <div id="closeC1">
                                    <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">

                                      <legend>
                                        <label>No.</label>  <input type="text" name="no1_1" id="no1_1" value="<?php echo $filaD3['res']+1 ?>" style="font-size: 12pt; width : 17px" readonly>
                                      </legend>

                                        <label>PRODUCTO:</label>
                                        <select  class="prod" name="pod1_1" id="pod1_1">
                                          <option value="">------------------------------------------------</option>
                                          <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                          <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                          <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                          <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                          <option value="ALTURA INT.">ALTURA INT.</option>
                                          <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                          <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                          <option value="CONCAVIDAD">CONCAVIDAD</option>
                                          <option value="CABECEO">CABECEO</option>
                                          <option value="CURVA MINIMA">CURVA MINIMA</option>
                                          <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                          <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                          <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                          <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                          <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                          <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                          <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                          <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                          <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                          <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                          <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                          <option value="ESPESOR BASE">ESPESOR BASE</option>
                                          <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                          <option value="ESTAMPADO">ESTAMPADO</option>
                                          <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                          <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                          <option value="PLANICIDAD">PLANICIDAD</option>
                                          <option value="REDONDEZ">REDONDEZ</option>
                                          <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                          <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                          <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                          <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                          <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>PROCESO:</label>
                                        <select  class="proceso" name="proceso1_1" id="proceso1_1">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                          <option value="INSPECCIÓN">INSPECCIÓN</option>
                                          <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                          <option value="TROQUELADO">TROQUELADO</option>
                                          <option value="SEPARACIÓN">SEPARACIÓN</option>
                                          <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                          <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>

                                        </select>
                                        <br><br>
                                        <label>RESPONSABLE:</label>
                                        <select  class="responsable" name="Res1_1" id="Res1_1">
                                          <option value="">------------------------------------</option>
                                          <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                          <option value="CORTADOR">CORTADOR</option>
                                          <option value="INSTALADOR">INSTALADOR</option>
                                          <option value="AUDITOR">AUDITOR</option>
                                          <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                          <option value="OPERADOR">OPERADOR</option>
                                          <option value="INSPECTOR">INSPECTOR</option>
                                          <option value="LOGÍSTICA">LOGÍSTICA</option>
                                        </select>
                                        &nbsp
                                        &nbsp
                                        <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                        <select  class="clas" name="clas1_1" id="clas1_1">
                                          <option value="">---</option>
                                          <option value="M">M</option>
                                          <option value="C">C</option>
                                        </select>
                                        <br><br>
                                        <div align='center'>
                                          <label>MÉTODOS</label>
                                        </div>
                                          <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                          <input type="text" name="especificacionPLG1_1" id="especificacionPLG1_1"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                        <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                        <select  class="evalucacion" name="evaluacion1_1" id="evaluacion1_1">
                                          <option value="">------------------------------------</option>
                                          <option value="VISUAL">VISUAL</option>
                                          <option value="BASCULA">BASCULA</option>
                                          <option value="VERNIER">VERNIER</option>
                                          <option value="MANUAL">MANUAL</option>
                                          <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                          <option value="MICRÓMETRO">MICRÓMETRO</option>
                                          <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                          <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                          <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                          <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                        </select>
                                        <br><br>
                                        <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                            <legend><label>MUESTRA</label></legend>

                                              <label>TAMAÑO:</label>
                                              <input type="text" name="tamaño1_1" id="tamaño1_1"  style="width : 50px"><br>

                                              <label>FRECUENCIA:</label>
                                              <select  class="fre" name="fre1_1" id="fre1_1">
                                                <option value="">------------------------------------------------------</option>
                                                <option value="CADA LOTE">CADA LOTE</option>
                                                <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                                <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                                <option value="INICIO">INICIO</option>
                                                <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                                <option value="C/30 MIN.">C/30 MIN.</option>
                                                <option value="INSPECCION">INSPECCION</option>
                                                <option value="CADA ORDEN">CADA ORDEN</option>
                                                <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                              </select>
                                    </fieldset><br>

                                    <label>MÉTODO DE CONTROL</label>
                                    <select  class="metodoC" name="metodoC1_1" id="metodoC1_1">
                                      <option value="">------------</option>
                                      <option value="F-IR 01">F-IR 01</option>
                                      <option value="F-PP 01">F-PP 01</option>
                                      <option value="F-PP 02">F-PP 02</option>
                                      <option value="F-PT 01">F-PT 01</option>
                                      <option value="F-PT 02">F-PT 02</option>
                                      <option value="F-AT 02">F-AT 02</option>
                                      <option value="F-IF 01">F-IF 01</option>
                                      <option value="F-EN 01">F-EN 01</option>
                                      <option value="VISUAL">VISUAL</option>
                                    </select>
                                </fieldset>
                              </div>
                            </div>


                            <div id="flotanteC2" style="display:none;">
                              <div id="closeC2">
                                <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no1_2" id="no1_2" value="<?php echo $filaD3['res']+2 ?>" style="font-size: 12pt; width : 17px" readonly>
                                  </legend>
                                    <label>PRODUCTO:</label>
                                    <select  class="prod" name="pod1_2" id="pod1_2">
                                      <option value="">------------------------------------------------</option>
                                      <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                      <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                      <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                      <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                      <option value="ALTURA INT.">ALTURA INT.</option>
                                      <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                      <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                      <option value="CONCAVIDAD">CONCAVIDAD</option>
                                      <option value="CABECEO">CABECEO</option>
                                      <option value="CURVA MINIMA">CURVA MINIMA</option>
                                      <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                      <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                      <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                      <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                      <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                      <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                      <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                      <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                      <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                      <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                      <option value="ESPESOR BASE">ESPESOR BASE</option>
                                      <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                      <option value="ESTAMPADO">ESTAMPADO</option>
                                      <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                      <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                      <option value="PLANICIDAD">PLANICIDAD</option>
                                      <option value="REDONDEZ">REDONDEZ</option>
                                      <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                      <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                      <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                      <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                      <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>PROCESO:</label>
                                    <select  class="proceso" name="proceso1_2" id="proceso1_2">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                      <option value="INSPECCIÓN">INSPECCIÓN</option>
                                      <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                      <option value="TROQUELADO">TROQUELADO</option>
                                      <option value="SEPARACIÓN">SEPARACIÓN</option>
                                      <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                      <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                    </select>
                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                    <select  class="responsable" name="Res1_2" id="Res1_2">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                      <option value="CORTADOR">CORTADOR</option>
                                      <option value="INSTALADOR">INSTALADOR</option>
                                      <option value="AUDITOR">AUDITOR</option>
                                      <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                      <option value="OPERADOR">OPERADOR</option>
                                      <option value="INSPECTOR">INSPECTOR</option>
                                      <option value="LOGÍSTICA">LOGÍSTICA</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <select  class="clas" name="clas1_2" id="clas1_2">
                                      <option value="">---</option>
                                      <option value="M">M</option>
                                      <option value="C">C</option>
                                    </select>
                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacionPLG1_2" id="especificacionPLG1_2"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <select  class="evalucacion" name="evaluacion1_2" id="evaluacion1_2">
                                      <option value="">------------------------------------</option>
                                      <option value="VISUAL">VISUAL</option>
                                      <option value="BASCULA">BASCULA</option>
                                      <option value="VERNIER">VERNIER</option>
                                      <option value="MANUAL">MANUAL</option>
                                      <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                      <option value="MICRÓMETRO">MICRÓMETRO</option>
                                      <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                      <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                      <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                      <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                    </select>
                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                        <label>TAMAÑO:</label>
                                        <input type="text" name="tamaño1_2" id="tamaño1_2"  style="width : 50px"><br>

                                        <label>FRECUENCIA:</label>
                                        <select  class="fre" name="fre1_2" id="fre1_2">
                                          <option value="">------------------------------------------------------</option>
                                          <option value="CADA LOTE">CADA LOTE</option>
                                          <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                          <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                          <option value="INICIO">INICIO</option>
                                          <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                          <option value="C/30 MIN.">C/30 MIN.</option>
                                          <option value="INSPECCION">INSPECCION</option>
                                          <option value="CADA ORDEN">CADA ORDEN</option>
                                          <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                        </select>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_2" id="metodoC1_2">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                            </fieldset>
                          </div>
                        </div>

                            <div id="flotanteC3" style="display:none;">
                              <div id="closeC3">
                                <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                  <legend>
                                    <label>No.</label>  <input type="text" name="no1_3" id="no1_3" value="<?php echo $filaD3['res']+3 ?>" style="font-size: 12pt; width : 17px" readonly>
                                  </legend>
                                    <label>PRODUCTO:</label>
                                    <select  class="prod" name="pod1_3" id="pod1_3">
                                      <option value="">------------------------------------------------</option>
                                      <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                      <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                      <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                      <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                      <option value="ALTURA INT.">ALTURA INT.</option>
                                      <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                      <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                      <option value="CONCAVIDAD">CONCAVIDAD</option>
                                      <option value="CABECEO">CABECEO</option>
                                      <option value="CURVA MINIMA">CURVA MINIMA</option>
                                      <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                      <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                      <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                      <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                      <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                      <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                      <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                      <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                      <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                      <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                      <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                      <option value="ESPESOR BASE">ESPESOR BASE</option>
                                      <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                      <option value="ESTAMPADO">ESTAMPADO</option>
                                      <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                      <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                      <option value="PLANICIDAD">PLANICIDAD</option>
                                      <option value="REDONDEZ">REDONDEZ</option>
                                      <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                      <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                      <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                      <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                      <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>PROCESO:</label>
                                    <select  class="proceso" name="proceso1_3" id="proceso1_3">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                      <option value="INSPECCIÓN">INSPECCIÓN</option>
                                      <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                      <option value="TROQUELADO">TROQUELADO</option>
                                      <option value="SEPARACIÓN">SEPARACIÓN</option>
                                      <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                      <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                    </select>
                                    <br><br>
                                    <label>RESPONSABLE:</label>
                                    <select  class="responsable" name="Res1_3" id="Res1_3">
                                      <option value="">------------------------------------</option>
                                      <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                      <option value="CORTADOR">CORTADOR</option>
                                      <option value="INSTALADOR">INSTALADOR</option>
                                      <option value="AUDITOR">AUDITOR</option>
                                      <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                      <option value="OPERADOR">OPERADOR</option>
                                      <option value="INSPECTOR">INSPECTOR</option>
                                      <option value="LOGÍSTICA">LOGÍSTICA</option>
                                    </select>
                                    &nbsp
                                    &nbsp
                                    <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                    <select  class="clas" name="clas1_3" id="clas1_3">
                                      <option value="">---</option>
                                      <option value="M">M</option>
                                      <option value="C">C</option>
                                    </select>
                                    <br><br>
                                    <div align='center'>
                                      <label>MÉTODOS</label>
                                    </div>
                                      <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                      <input type="text" name="especificacionPLG1_3" id="especificacionPLG1_3"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                    <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                    <select  class="evalucacion" name="evaluacion1_3" id="evaluacion1_3">
                                      <option value="">------------------------------------</option>
                                      <option value="VISUAL">VISUAL</option>
                                      <option value="BASCULA">BASCULA</option>
                                      <option value="VERNIER">VERNIER</option>
                                      <option value="MANUAL">MANUAL</option>
                                      <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                      <option value="MICRÓMETRO">MICRÓMETRO</option>
                                      <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                      <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                      <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                      <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                    </select>
                                    <br><br>
                                    <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                        <legend><label>MUESTRA</label></legend>

                                        <label>TAMAÑO:</label>
                                        <input type="text" name="tamaño1_3" id="tamaño1_3"  style="width : 50px"><br>

                                        <label>FRECUENCIA:</label>
                                        <select  class="fre" name="fre1_3" id="fre1_3">
                                          <option value="">------------------------------------------------------</option>
                                          <option value="CADA LOTE">CADA LOTE</option>
                                          <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                          <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                          <option value="INICIO">INICIO</option>
                                          <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                          <option value="C/30 MIN.">C/30 MIN.</option>
                                          <option value="INSPECCION">INSPECCION</option>
                                          <option value="CADA ORDEN">CADA ORDEN</option>
                                          <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                        </select>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_3" id="metodoC1_3">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                            </fieldset>
                          </div>
                        </div>

                          <div id="flotanteC4" style="display:none;">
                            <div id="closeC4">
                              <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                                <legend>
                                  <label>No.</label>  <input type="text" name="no1_4" id="no1_4" value="<?php echo $filaD3['res']+4 ?>" style="font-size: 12pt; width : 17px" readonly>
                                </legend>
                                  <label>PRODUCTO:</label>
                                  <select  class="prod" name="pod1_4" id="pod1_4">
                                    <option value="">------------------------------------------------</option>
                                    <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                    <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                    <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                    <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                    <option value="ALTURA INT.">ALTURA INT.</option>
                                    <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                    <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                    <option value="CONCAVIDAD">CONCAVIDAD</option>
                                    <option value="CABECEO">CABECEO</option>
                                    <option value="CURVA MINIMA">CURVA MINIMA</option>
                                    <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                    <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                    <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                    <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                    <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                    <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                    <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                    <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                    <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                    <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                    <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                    <option value="ESPESOR BASE">ESPESOR BASE</option>
                                    <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                    <option value="ESTAMPADO">ESTAMPADO</option>
                                    <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                    <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                    <option value="PLANICIDAD">PLANICIDAD</option>
                                    <option value="REDONDEZ">REDONDEZ</option>
                                    <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                    <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                    <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                    <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                    <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>PROCESO:</label>
                                  <select  class="proceso" name="proceso1_4" id="proceso1_4">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                    <option value="INSPECCIÓN">INSPECCIÓN</option>
                                    <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                    <option value="TROQUELADO">TROQUELADO</option>
                                    <option value="SEPARACIÓN">SEPARACIÓN</option>
                                    <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                    <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                  </select>
                                  <br><br>
                                  <label>RESPONSABLE:</label>
                                  <select  class="responsable" name="Res1_4" id="Res1_4">
                                    <option value="">------------------------------------</option>
                                    <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                    <option value="CORTADOR">CORTADOR</option>
                                    <option value="INSTALADOR">INSTALADOR</option>
                                    <option value="AUDITOR">AUDITOR</option>
                                    <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                    <option value="OPERADOR">OPERADOR</option>
                                    <option value="INSPECTOR">INSPECTOR</option>
                                    <option value="LOGÍSTICA">LOGÍSTICA</option>
                                  </select>
                                  &nbsp
                                  &nbsp
                                  <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                  <select  class="clas" name="clas1_4" id="clas1_4">
                                    <option value="">---</option>
                                    <option value="M">M</option>
                                    <option value="C">C</option>
                                  </select>
                                  <br><br>
                                  <div align='center'>
                                    <label>MÉTODOS</label>
                                  </div>
                                    <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                    <input type="text" name="especificacionPLG1_4" id="especificacionPLG1_4"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                  <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                  <select  class="evalucacion" name="evaluacion1_4" id="evaluacion1_4">
                                    <option value="">------------------------------------</option>
                                    <option value="VISUAL">VISUAL</option>
                                    <option value="BASCULA">BASCULA</option>
                                    <option value="VERNIER">VERNIER</option>
                                    <option value="MANUAL">MANUAL</option>
                                    <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                    <option value="MICRÓMETRO">MICRÓMETRO</option>
                                    <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                    <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                    <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                    <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                  </select>
                                  <br><br>
                                  <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                      <legend><label>MUESTRA</label></legend>

                                      <label>TAMAÑO:</label>
                                      <input type="text" name="tamaño1_4" id="tamaño1_4"  style="width : 50px"><br>

                                      <label>FRECUENCIA:</label>
                                      <select  class="fre" name="fre1_4" id="fre1_4">
                                        <option value="">------------------------------------------------------</option>
                                        <option value="CADA LOTE">CADA LOTE</option>
                                        <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                        <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                        <option value="INICIO">INICIO</option>
                                        <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                        <option value="C/30 MIN.">C/30 MIN.</option>
                                        <option value="INSPECCION">INSPECCION</option>
                                        <option value="CADA ORDEN">CADA ORDEN</option>
                                        <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                      </select>
                              </fieldset><br>

                              <label>MÉTODO DE CONTROL</label>
                              <select  class="metodoC" name="metodoC1_4" id="metodoC1_4">
                                <option value="">------------</option>
                                <option value="F-IR 01">F-IR 01</option>
                                <option value="F-PP 01">F-PP 01</option>
                                <option value="F-PP 02">F-PP 02</option>
                                <option value="F-PT 01">F-PT 01</option>
                                <option value="F-PT 02">F-PT 02</option>
                                <option value="F-AT 02">F-AT 02</option>
                                <option value="F-IF 01">F-IF 01</option>
                                <option value="F-EN 01">F-EN 01</option>
                                <option value="VISUAL">VISUAL</option>
                              </select>
                          </fieldset>
                        </div>
                      </div>

                        <div id="flotanteC5" style="display:none;">
                          <div id="closeC5">
                            <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                              <legend>
                                <label>No.</label>  <input type="text" name="no1_5" id="no1_5" value="<?php echo $filaD3['res']+5 ?>" style="font-size: 12pt; width : 17px" readonly>
                              </legend>
                                <label>PRODUCTO:</label>
                                <select  class="prod" name="pod1_5" id="pod1_5">
                                  <option value="">------------------------------------------------</option>
                                  <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                  <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                  <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                  <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                  <option value="ALTURA INT.">ALTURA INT.</option>
                                  <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                  <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                  <option value="CONCAVIDAD">CONCAVIDAD</option>
                                  <option value="CABECEO">CABECEO</option>
                                  <option value="CURVA MINIMA">CURVA MINIMA</option>
                                  <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                  <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                  <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                  <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                  <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                  <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                  <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                  <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                  <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                  <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                  <option value="ESPESOR BASE">ESPESOR BASE</option>
                                  <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                  <option value="ESTAMPADO">ESTAMPADO</option>
                                  <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                  <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                  <option value="PLANICIDAD">PLANICIDAD</option>
                                  <option value="REDONDEZ">REDONDEZ</option>
                                  <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                  <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                  <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                  <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                  <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>PROCESO:</label>
                                <select  class="proceso" name="proceso1_5" id="proceso1_5">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                  <option value="INSPECCIÓN">INSPECCIÓN</option>
                                  <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                  <option value="TROQUELADO">TROQUELADO</option>
                                  <option value="SEPARACIÓN">SEPARACIÓN</option>
                                  <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                  <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                </select>
                                <br><br>
                                <label>RESPONSABLE:</label>
                                <select  class="responsable" name="Res1_5" id="Res1_5">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                  <option value="CORTADOR">CORTADOR</option>
                                  <option value="INSTALADOR">INSTALADOR</option>
                                  <option value="AUDITOR">AUDITOR</option>
                                  <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                  <option value="OPERADOR">OPERADOR</option>
                                  <option value="INSPECTOR">INSPECTOR</option>
                                  <option value="LOGÍSTICA">LOGÍSTICA</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                <select  class="clas" name="clas1_5" id="clas1_5">
                                  <option value="">---</option>
                                  <option value="M">M</option>
                                  <option value="C">C</option>
                                </select>
                                <br><br>
                                <div align='center'>
                                  <label>MÉTODOS</label>
                                </div>
                                  <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                  <input type="text" name="especificacionPLG1_5" id="especificacionPLG1_5"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                <select  class="evalucacion" name="evaluacion1_5" id="evaluacion1_5">
                                  <option value="">------------------------------------</option>
                                  <option value="VISUAL">VISUAL</option>
                                  <option value="BASCULA">BASCULA</option>
                                  <option value="VERNIER">VERNIER</option>
                                  <option value="MANUAL">MANUAL</option>
                                  <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                  <option value="MICRÓMETRO">MICRÓMETRO</option>
                                  <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                  <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                  <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                  <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                </select>
                                <br><br>
                                <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                    <legend><label>MUESTRA</label></legend>

                                    <label>TAMAÑO:</label>
                                    <input type="text" name="tamaño1_5" id="tamaño1_5"  style="width : 50px"><br>

                                    <label>FRECUENCIA:</label>
                                    <select  class="fre" name="fre1_5" id="fre1_5">
                                      <option value="">------------------------------------------------------</option>
                                      <option value="CADA LOTE">CADA LOTE</option>
                                      <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                      <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                      <option value="INICIO">INICIO</option>
                                      <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                      <option value="C/30 MIN.">C/30 MIN.</option>
                                      <option value="INSPECCION">INSPECCION</option>
                                      <option value="CADA ORDEN">CADA ORDEN</option>
                                      <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                    </select>
                            </fieldset><br>

                            <label>MÉTODO DE CONTROL</label>
                            <select  class="metodoC" name="metodoC1_5" id="metodoC1_5">
                              <option value="">------------</option>
                              <option value="F-IR 01">F-IR 01</option>
                              <option value="F-PP 01">F-PP 01</option>
                              <option value="F-PP 02">F-PP 02</option>
                              <option value="F-PT 01">F-PT 01</option>
                              <option value="F-PT 02">F-PT 02</option>
                              <option value="F-AT 02">F-AT 02</option>
                              <option value="F-IF 01">F-IF 01</option>
                              <option value="F-EN 01">F-EN 01</option>
                              <option value="VISUAL">VISUAL</option>
                            </select>
                        </fieldset>
                      </div>
                    </div>

                        <div id="flotanteC6" style="display:none;">
                          <div id="closeC6">
                            <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                              <legend>
                                <label>No.</label>  <input type="text" name="no1_6" id="no1_6" value="<?php echo $filaD3['res']+6 ?>" style="font-size: 12pt; width : 17px" readonly>
                              </legend>
                                <label>PRODUCTO:</label>
                                <select  class="prod" name="pod1_6" id="pod1_6">
                                  <option value="">------------------------------------------------</option>
                                  <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                  <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                  <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                  <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                  <option value="ALTURA INT.">ALTURA INT.</option>
                                  <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                  <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                  <option value="CONCAVIDAD">CONCAVIDAD</option>
                                  <option value="CABECEO">CABECEO</option>
                                  <option value="CURVA MINIMA">CURVA MINIMA</option>
                                  <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                  <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                  <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                  <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                  <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                  <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                  <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                  <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                  <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                  <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                  <option value="ESPESOR BASE">ESPESOR BASE</option>
                                  <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                  <option value="ESTAMPADO">ESTAMPADO</option>
                                  <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                  <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                  <option value="PLANICIDAD">PLANICIDAD</option>
                                  <option value="REDONDEZ">REDONDEZ</option>
                                  <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                  <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                  <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                  <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                  <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>PROCESO:</label>
                                <select  class="proceso" name="proceso1_6" id="proceso1_6">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                  <option value="INSPECCIÓN">INSPECCIÓN</option>
                                  <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                  <option value="TROQUELADO">TROQUELADO</option>
                                  <option value="SEPARACIÓN">SEPARACIÓN</option>
                                  <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                  <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                </select>
                                <br><br>
                                <label>RESPONSABLE:</label>
                                <select  class="responsable" name="Res1_6" id="Res1_6">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                  <option value="CORTADOR">CORTADOR</option>
                                  <option value="INSTALADOR">INSTALADOR</option>
                                  <option value="AUDITOR">AUDITOR</option>
                                  <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                  <option value="OPERADOR">OPERADOR</option>
                                  <option value="INSPECTOR">INSPECTOR</option>
                                  <option value="LOGÍSTICA">LOGÍSTICA</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                <select  class="clas" name="clas1_6" id="clas1_6">
                                  <option value="">---</option>
                                  <option value="M">M</option>
                                  <option value="C">C</option>
                                </select>
                                <br><br>
                                <div align='center'>
                                  <label>MÉTODOS</label>
                                </div>
                                  <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                  <input type="text" name="especificacionPLG1_6" id="especificacionPLG1_6"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                <select  class="evalucacion" name="evaluacion1_6" id="evaluacion1_6">
                                  <option value="">------------------------------------</option>
                                  <option value="VISUAL">VISUAL</option>
                                  <option value="BASCULA">BASCULA</option>
                                  <option value="VERNIER">VERNIER</option>
                                  <option value="MANUAL">MANUAL</option>
                                  <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                  <option value="MICRÓMETRO">MICRÓMETRO</option>
                                  <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                  <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                  <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                  <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                </select>
                                <br><br>
                                <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                    <legend><label>MUESTRA</label></legend>

                                    <label>TAMAÑO:</label>
                                    <input type="text" name="tamaño1_6" id="tamaño1_6"  style="width : 50px"><br>

                                    <label>FRECUENCIA:</label>
                                    <select  class="fre" name="fre1_6" id="fre1_6">
                                      <option value="">------------------------------------------------------</option>
                                      <option value="CADA LOTE">CADA LOTE</option>
                                      <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                      <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                      <option value="INICIO">INICIO</option>
                                      <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                      <option value="C/30 MIN.">C/30 MIN.</option>
                                      <option value="INSPECCION">INSPECCION</option>
                                      <option value="CADA ORDEN">CADA ORDEN</option>
                                      <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                    </select>
                            </fieldset><br>

                            <label>MÉTODO DE CONTROL</label>
                            <select  class="metodoC" name="metodoC1_6" id="metodoC1_6">
                              <option value="">------------</option>
                              <option value="F-IR 01">F-IR 01</option>
                              <option value="F-PP 01">F-PP 01</option>
                              <option value="F-PP 02">F-PP 02</option>
                              <option value="F-PT 01">F-PT 01</option>
                              <option value="F-PT 02">F-PT 02</option>
                              <option value="F-AT 02">F-AT 02</option>
                              <option value="F-IF 01">F-IF 01</option>
                              <option value="F-EN 01">F-EN 01</option>
                              <option value="VISUAL">VISUAL</option>
                            </select>
                        </fieldset>
                      </div>
                    </div>

                      <div id="flotanteC7" style="display:none;">
                        <div id="closeC7">
                          <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                            <legend>
                              <label>No.</label>  <input type="text" name="no1_7" id="no1_7" value="<?php echo $filaD3['res']+7 ?>" style="font-size: 12pt; width : 17px" readonly>
                            </legend>
                              <label>PRODUCTO:</label>
                              <select  class="prod" name="pod1_7" id="pod1_7">
                                <option value="">------------------------------------------------</option>
                                <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                <option value="ALTURA INT.">ALTURA INT.</option>
                                <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                <option value="CONCAVIDAD">CONCAVIDAD</option>
                                <option value="CABECEO">CABECEO</option>
                                <option value="CURVA MINIMA">CURVA MINIMA</option>
                                <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                <option value="ESPESOR BASE">ESPESOR BASE</option>
                                <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                <option value="ESTAMPADO">ESTAMPADO</option>
                                <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                <option value="PLANICIDAD">PLANICIDAD</option>
                                <option value="REDONDEZ">REDONDEZ</option>
                                <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>PROCESO:</label>
                              <select  class="proceso" name="proceso1_7" id="proceso1_7">
                                <option value="">------------------------------------</option>
                                <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                <option value="INSPECCIÓN">INSPECCIÓN</option>
                                <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                <option value="TROQUELADO">TROQUELADO</option>
                                <option value="SEPARACIÓN">SEPARACIÓN</option>
                                <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                              </select>
                              <br><br>
                              <label>RESPONSABLE:</label>
                              <select  class="responsable" name="Res1_7" id="Res1_7">
                                <option value="">------------------------------------</option>
                                <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                <option value="CORTADOR">CORTADOR</option>
                                <option value="INSTALADOR">INSTALADOR</option>
                                <option value="AUDITOR">AUDITOR</option>
                                <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                <option value="OPERADOR">OPERADOR</option>
                                <option value="INSPECTOR">INSPECTOR</option>
                                <option value="LOGÍSTICA">LOGÍSTICA</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                              <select  class="clas" name="clas1_7" id="clas1_7">
                                <option value="">---</option>
                                <option value="M">M</option>
                                <option value="C">C</option>
                              </select>
                              <br><br>
                              <div align='center'>
                                <label>MÉTODOS</label>
                              </div>
                                <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                <input type="text" name="especificacionPLG1_7" id="especificacionPLG1_7"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                              <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                              <select  class="evalucacion" name="evaluacion1_7" id="evaluacion1_7">
                                <option value="">------------------------------------</option>
                                <option value="VISUAL">VISUAL</option>
                                <option value="BASCULA">BASCULA</option>
                                <option value="VERNIER">VERNIER</option>
                                <option value="MANUAL">MANUAL</option>
                                <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                <option value="MICRÓMETRO">MICRÓMETRO</option>
                                <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                              </select>
                              <br><br>
                              <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                  <legend><label>MUESTRA</label></legend>

                                  <label>TAMAÑO:</label>
                                  <input type="text" name="tamaño1_7" id="tamaño1_7"  style="width : 50px"><br>

                                  <label>FRECUENCIA:</label>
                                  <select  class="fre" name="fre1_7" id="fre1_7">
                                    <option value="">------------------------------------------------------</option>
                                    <option value="CADA LOTE">CADA LOTE</option>
                                    <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                    <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                    <option value="INICIO">INICIO</option>
                                    <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                    <option value="C/30 MIN.">C/30 MIN.</option>
                                    <option value="INSPECCION">INSPECCION</option>
                                    <option value="CADA ORDEN">CADA ORDEN</option>
                                    <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                  </select>
                          </fieldset><br>

                            <label>MÉTODO DE CONTROL</label>
                            <select  class="metodoC" name="metodoC1_7" id="metodoC1_7">
                              <option value="">------------</option>
                              <option value="F-IR 01">F-IR 01</option>
                              <option value="F-PP 01">F-PP 01</option>
                              <option value="F-PP 02">F-PP 02</option>
                              <option value="F-PT 01">F-PT 01</option>
                              <option value="F-PT 02">F-PT 02</option>
                              <option value="F-AT 02">F-AT 02</option>
                              <option value="F-IF 01">F-IF 01</option>
                              <option value="F-EN 01">F-EN 01</option>
                              <option value="VISUAL">VISUAL</option>
                            </select>
                        </fieldset>
                      </div>
                    </div>

                    <div id="flotanteC8" style="display:none;">
                      <div id="closeC8">
                        <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                          <legend>
                            <label>No.</label>  <input type="text" name="no1.8" id="no1.8" value="<?php echo $filaD3['res']+8 ?>" style="font-size: 12pt; width : 17px" readonly>
                          </legend>
                            <label>PRODUCTO:</label>
                            <select  class="prod" name="pod1.8" id="pod1.8">
                              <option value="">------------------------------------------------</option>
                              <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                              <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                              <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                              <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                              <option value="ALTURA INT.">ALTURA INT.</option>
                              <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                              <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                              <option value="CONCAVIDAD">CONCAVIDAD</option>
                              <option value="CABECEO">CABECEO</option>
                              <option value="CURVA MINIMA">CURVA MINIMA</option>
                              <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                              <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                              <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                              <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                              <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                              <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                              <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                              <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                              <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                              <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                              <option value="ESPESOR BASE">ESPESOR BASE</option>
                              <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                              <option value="ESTAMPADO">ESTAMPADO</option>
                              <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                              <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                              <option value="PLANICIDAD">PLANICIDAD</option>
                              <option value="REDONDEZ">REDONDEZ</option>
                              <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                              <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                              <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                              <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                              <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>PROCESO:</label>
                            <select  class="proceso" name="proceso1_8" id="proceso1_8">
                              <option value="">------------------------------------</option>
                              <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                              <option value="INSPECCIÓN">INSPECCIÓN</option>
                              <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                              <option value="TROQUELADO">TROQUELADO</option>
                              <option value="SEPARACIÓN">SEPARACIÓN</option>
                              <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                              <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                            </select>
                            <br><br>
                            <label>RESPONSABLE:</label>
                            <select  class="responsable" name="Res1_8" id="Res1_8">
                              <option value="">------------------------------------</option>
                              <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                              <option value="CORTADOR">CORTADOR</option>
                              <option value="INSTALADOR">INSTALADOR</option>
                              <option value="AUDITOR">AUDITOR</option>
                              <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                              <option value="OPERADOR">OPERADOR</option>
                              <option value="INSPECTOR">INSPECTOR</option>
                              <option value="LOGÍSTICA">LOGÍSTICA</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                            <select  class="clas" name="clas1_8" id="clas1_8">
                              <option value="">---</option>
                              <option value="M">M</option>
                              <option value="C">C</option>
                            </select>
                            <br><br>
                            <div align='center'>
                              <label>MÉTODOS</label>
                            </div>
                              <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                              <input type="text" name="especificacionPLG1_8" id="especificacionPLG1_8"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                            <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                            <select  class="evalucacion" name="evaluacion1_8" id="evaluacion1_8">
                              <option value="">------------------------------------</option>
                              <option value="VISUAL">VISUAL</option>
                              <option value="BASCULA">BASCULA</option>
                              <option value="VERNIER">VERNIER</option>
                              <option value="MANUAL">MANUAL</option>
                              <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                              <option value="MICRÓMETRO">MICRÓMETRO</option>
                              <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                              <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                              <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                              <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                            </select>
                            <br><br>
                            <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                <legend><label>MUESTRA</label></legend>

                                <label>TAMAÑO:</label>
                                <input type="text" name="tamaño1_8" id="tamaño1_8"  style="width : 50px"><br>

                                <label>FRECUENCIA:</label>
                                <select  class="fre" name="fre1_8" id="fre1_8">
                                  <option value="">------------------------------------------------------</option>
                                  <option value="CADA LOTE">CADA LOTE</option>
                                  <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                  <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                  <option value="INICIO">INICIO</option>
                                  <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                  <option value="C/30 MIN.">C/30 MIN.</option>
                                  <option value="INSPECCION">INSPECCION</option>
                                  <option value="CADA ORDEN">CADA ORDEN</option>
                                  <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                </select>
                            </fieldset><br>

                            <label>MÉTODO DE CONTROL</label>
                            <select  class="metodoC" name="metodoC1_8" id="metodoC1_8">
                              <option value="">------------</option>
                              <option value="F-IR 01">F-IR 01</option>
                              <option value="F-PP 01">F-PP 01</option>
                              <option value="F-PP 02">F-PP 02</option>
                              <option value="F-PT 01">F-PT 01</option>
                              <option value="F-PT 02">F-PT 02</option>
                              <option value="F-AT 02">F-AT 02</option>
                              <option value="F-IF 01">F-IF 01</option>
                              <option value="F-EN 01">F-EN 01</option>
                              <option value="VISUAL">VISUAL</option>
                            </select>
                        </fieldset>
                      </div>
                    </div>

                    <div id="flotanteC9" style="display:none;">
                      <div id="closeC9">
                        <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                          <legend>
                            <label>No.</label>  <input type="text" name="no1_9" id="no1_9" value="<?php echo $filaD3['res']+9?>" style="font-size: 12pt; width : 17px" readonly>
                          </legend>
                            <label>PRODUCTO:</label>
                            <select  class="prod" name="pod1_9" id="pod1_9">
                              <option value="">------------------------------------------------</option>
                              <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                              <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                              <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                              <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                              <option value="ALTURA INT.">ALTURA INT.</option>
                              <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                              <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                              <option value="CONCAVIDAD">CONCAVIDAD</option>
                              <option value="CABECEO">CABECEO</option>
                              <option value="CURVA MINIMA">CURVA MINIMA</option>
                              <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                              <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                              <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                              <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                              <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                              <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                              <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                              <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                              <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                              <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                              <option value="ESPESOR BASE">ESPESOR BASE</option>
                              <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                              <option value="ESTAMPADO">ESTAMPADO</option>
                              <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                              <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                              <option value="PLANICIDAD">PLANICIDAD</option>
                              <option value="REDONDEZ">REDONDEZ</option>
                              <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                              <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                              <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                              <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                              <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>PROCESO:</label>
                            <select  class="proceso" name="proceso1_9" id="proceso1_9">
                              <option value="">------------------------------------</option>
                              <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                              <option value="INSPECCIÓN">INSPECCIÓN</option>
                              <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                              <option value="TROQUELADO">TROQUELADO</option>
                              <option value="SEPARACIÓN">SEPARACIÓN</option>
                              <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                              <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                            </select>
                            <br><br>
                            <label>RESPONSABLE:</label>
                            <select  class="responsable" name="Res1_9" id="Res1_9">
                              <option value="">------------------------------------</option>
                              <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                              <option value="CORTADOR">CORTADOR</option>
                              <option value="INSTALADOR">INSTALADOR</option>
                              <option value="AUDITOR">AUDITOR</option>
                              <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                              <option value="OPERADOR">OPERADOR</option>
                              <option value="INSPECTOR">INSPECTOR</option>
                              <option value="LOGÍSTICA">LOGÍSTICA</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                            <select  class="clas" name="clas1_9" id="clas1_9">
                              <option value="">---</option>
                              <option value="M">M</option>
                              <option value="C">C</option>
                            </select>
                            <br><br>
                            <div align='center'>
                              <label>MÉTODOS</label>
                            </div>
                              <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                              <input type="text" name="especificacionPLG1_9" id="especificacionPLG1_9"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                            <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                            <select  class="evalucacion" name="evaluacion1_9" id="evaluacion1_9">
                              <option value="">------------------------------------</option>
                              <option value="VISUAL">VISUAL</option>
                              <option value="BASCULA">BASCULA</option>
                              <option value="VERNIER">VERNIER</option>
                              <option value="MANUAL">MANUAL</option>
                              <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                              <option value="MICRÓMETRO">MICRÓMETRO</option>
                              <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                              <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                              <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                              <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                            </select>
                            <br><br>
                            <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                <legend><label>MUESTRA</label></legend>

                                <label>TAMAÑO:</label>
                                <input type="text" name="tamaño1_9" id="tamaño1_9"  style="width : 50px"><br>

                                <label>FRECUENCIA:</label>
                                <select  class="fre" name="fre1_9" id="fre1_9">
                                  <option value="">------------------------------------------------------</option>
                                  <option value="CADA LOTE">CADA LOTE</option>
                                  <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                  <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                  <option value="INICIO">INICIO</option>
                                  <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                  <option value="C/30 MIN.">C/30 MIN.</option>
                                  <option value="INSPECCION">INSPECCION</option>
                                  <option value="CADA ORDEN">CADA ORDEN</option>
                                  <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                </select>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_9" id="metodoC1_9">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                            </fieldset>
                          </div>
                        </div>

                        <div id="flotanteC10" style="display:none;">
                          <div id="closeC10">
                            <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                              <legend>
                                <label>No.</label><input type="text" name="no1_10" id="no1_10" value="<?php echo $filaD3['res']+10 ?>" style="font-size: 12pt; width : 17px" readonly>
                              </legend>
                                <label>PRODUCTO:</label>
                                <select  class="prod" name="pod1_10" id="pod1_10">
                                  <option value="">------------------------------------------------</option>
                                  <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                  <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                  <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                  <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                  <option value="ALTURA INT.">ALTURA INT.</option>
                                  <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                  <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                  <option value="CONCAVIDAD">CONCAVIDAD</option>
                                  <option value="CABECEO">CABECEO</option>
                                  <option value="CURVA MINIMA">CURVA MINIMA</option>
                                  <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                  <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                  <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                  <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                  <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                  <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                  <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                  <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                  <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                  <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                  <option value="ESPESOR BASE">ESPESOR BASE</option>
                                  <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                  <option value="ESTAMPADO">ESTAMPADO</option>
                                  <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                  <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                  <option value="PLANICIDAD">PLANICIDAD</option>
                                  <option value="REDONDEZ">REDONDEZ</option>
                                  <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                  <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                  <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                  <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                  <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>PROCESO:</label>
                                <select  class="proceso" name="proceso1_10" id="proceso1_10">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                  <option value="INSPECCIÓN">INSPECCIÓN</option>
                                  <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                  <option value="TROQUELADO">TROQUELADO</option>
                                  <option value="SEPARACIÓN">SEPARACIÓN</option>
                                  <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                  <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                </select>
                                <br><br>
                                <label>RESPONSABLE:</label>
                                <select  class="responsable" name="Res1_10" id="Res1_10">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                  <option value="CORTADOR">CORTADOR</option>
                                  <option value="INSTALADOR">INSTALADOR</option>
                                  <option value="AUDITOR">AUDITOR</option>
                                  <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                  <option value="OPERADOR">OPERADOR</option>
                                  <option value="INSPECTOR">INSPECTOR</option>
                                  <option value="LOGÍSTICA">LOGÍSTICA</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                <select  class="clas" name="clas1_10" id="clas1_10">
                                  <option value="">---</option>
                                  <option value="M">M</option>
                                  <option value="C">C</option>
                                </select>
                                <br><br>
                                <div align='center'>
                                  <label>MÉTODOS</label>
                                </div>
                                  <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                  <input type="text" name="especificacionPLG1_10" id="especificacionPLG1_10"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                <select  class="evalucacion" name="evaluacion1_10" id="evaluacion1_10">
                                  <option value="">------------------------------------</option>
                                  <option value="VISUAL">VISUAL</option>
                                  <option value="BASCULA">BASCULA</option>
                                  <option value="VERNIER">VERNIER</option>
                                  <option value="MANUAL">MANUAL</option>
                                  <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                  <option value="MICRÓMETRO">MICRÓMETRO</option>
                                  <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                  <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                  <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                  <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                </select>
                                <br><br>
                                <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                    <legend><label>MUESTRA</label></legend>

                                    <label>TAMAÑO:</label>
                                    <input type="text" name="tamaño1_10" id="tamaño1_10"  style="width : 50px"><br>

                                    <label>FRECUENCIA:</label>
                                    <select  class="fre" name="fre1_10" id="fre1_10">
                                      <option value="">------------------------------------------------------</option>
                                      <option value="CADA LOTE">CADA LOTE</option>
                                      <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                      <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                      <option value="INICIO">INICIO</option>
                                      <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                      <option value="C/30 MIN.">C/30 MIN.</option>
                                      <option value="INSPECCION">INSPECCION</option>
                                      <option value="CADA ORDEN">CADA ORDEN</option>
                                      <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                    </select>
                                </fieldset><br>

                                <label>MÉTODO DE CONTROL</label>
                                <select  class="metodoC" name="metodoC1_10" id="metodoC1_10">
                                  <option value="">------------</option>
                                  <option value="F-IR 01">F-IR 01</option>
                                  <option value="F-PP 01">F-PP 01</option>
                                  <option value="F-PP 02">F-PP 02</option>
                                  <option value="F-PT 01">F-PT 01</option>
                                  <option value="F-PT 02">F-PT 02</option>
                                  <option value="F-AT 02">F-AT 02</option>
                                  <option value="F-IF 01">F-IF 01</option>
                                  <option value="F-EN 01">F-EN 01</option>
                                  <option value="VISUAL">VISUAL</option>
                                </select>
                            </fieldset>
                          </div>
                        </div>

                        <div id="flotanteC11" style="display:none;">
                          <div id="closeC11">
                            <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                              <legend>
                                <label>No.</label><input type="text" name="no1_11" id="no1_11" value="<?php echo $filaD3['res']+11 ?>" style="font-size: 12pt; width : 17px" readonly>
                              </legend>
                                <label>PRODUCTO:</label>
                                <select  class="prod" name="pod1_11" id="pod1_11">
                                  <option value="">------------------------------------------------</option>
                                  <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                  <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                  <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                  <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                  <option value="ALTURA INT.">ALTURA INT.</option>
                                  <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                  <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                  <option value="CONCAVIDAD">CONCAVIDAD</option>
                                  <option value="CABECEO">CABECEO</option>
                                  <option value="CURVA MINIMA">CURVA MINIMA</option>
                                  <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                  <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                  <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                  <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                  <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                  <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                  <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                  <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                  <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                  <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                  <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                  <option value="ESPESOR BASE">ESPESOR BASE</option>
                                  <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                  <option value="ESTAMPADO">ESTAMPADO</option>
                                  <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                  <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                  <option value="PLANICIDAD">PLANICIDAD</option>
                                  <option value="REDONDEZ">REDONDEZ</option>
                                  <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                  <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                  <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                  <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                  <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>PROCESO:</label>
                                <select  class="proceso" name="proceso1_11" id="proceso1_11">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                  <option value="INSPECCIÓN">INSPECCIÓN</option>
                                  <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                  <option value="TROQUELADO">TROQUELADO</option>
                                  <option value="SEPARACIÓN">SEPARACIÓN</option>
                                  <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                  <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                                </select>
                                <br><br>
                                <label>RESPONSABLE:</label>
                                <select  class="responsable" name="Res1_11" id="Res1_11">
                                  <option value="">------------------------------------</option>
                                  <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                  <option value="CORTADOR">CORTADOR</option>
                                  <option value="INSTALADOR">INSTALADOR</option>
                                  <option value="AUDITOR">AUDITOR</option>
                                  <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                  <option value="OPERADOR">OPERADOR</option>
                                  <option value="INSPECTOR">INSPECTOR</option>
                                  <option value="LOGÍSTICA">LOGÍSTICA</option>
                                </select>
                                &nbsp
                                &nbsp
                                <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                                <select  class="clas" name="clas1_11" id="clas1_11">
                                  <option value="">---</option>
                                  <option value="M">M</option>
                                  <option value="C">C</option>
                                </select>
                                <br><br>
                                <div align='center'>
                                  <label>MÉTODOS</label>
                                </div>
                                  <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                  <input type="text" name="especificacionPLG1_11" id="especificacionPLG1_11"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                                <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                                <select  class="evalucacion" name="evaluacion1_11" id="evaluacion1_11">
                                  <option value="">------------------------------------</option>
                                  <option value="VISUAL">VISUAL</option>
                                  <option value="BASCULA">BASCULA</option>
                                  <option value="VERNIER">VERNIER</option>
                                  <option value="MANUAL">MANUAL</option>
                                  <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                  <option value="MICRÓMETRO">MICRÓMETRO</option>
                                  <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                  <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                  <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                  <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                                </select>
                                <br><br>
                                <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                    <legend><label>MUESTRA</label></legend>

                                      <label>TAMAÑO:</label>
                                      <input type="text" name="tamaño1_11" id="tamaño1_11"  style="width : 50px"><br>

                                      <label>FRECUENCIA:</label>
                                      <select  class="fre" name="fre1_11" id="fre1_11">
                                        <option value="">------------------------------------------------------</option>
                                        <option value="CADA LOTE">CADA LOTE</option>
                                        <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                        <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                        <option value="INICIO">INICIO</option>
                                        <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                        <option value="C/30 MIN.">C/30 MIN.</option>
                                        <option value="INSPECCION">INSPECCION</option>
                                        <option value="CADA ORDEN">CADA ORDEN</option>
                                        <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                    </select>
                            </fieldset><br>

                            <label>MÉTODO DE CONTROL</label>
                            <select  class="metodoC" name="metodoC1_11" id="metodoC1_11">
                              <option value="">------------</option>
                              <option value="F-IR 01">F-IR 01</option>
                              <option value="F-PP 01">F-PP 01</option>
                              <option value="F-PP 02">F-PP 02</option>
                              <option value="F-PT 01">F-PT 01</option>
                              <option value="F-PT 02">F-PT 02</option>
                              <option value="F-AT 02">F-AT 02</option>
                              <option value="F-IF 01">F-IF 01</option>
                              <option value="F-EN 01">F-EN 01</option>
                              <option value="VISUAL">VISUAL</option>
                            </select>
                          </fieldset>
                        </div>
                      </div>

                      <div id="flotanteC12" style="display:none;">
                        <div id="closeC12">
                          <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                            <legend>
                              <label>No.</label><input type="text" name="no1_12" id="no1_12" value="<?php echo $filaD3['res']+12 ?>" style="font-size: 12pt; width : 17px" readonly>
                            </legend>
                              <label>PRODUCTO:</label>
                              <select  class="prod" name="pod1_12" id="pod1_12">
                                <option value="">------------------------------------------------</option>
                                <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                <option value="ALTURA INT.">ALTURA INT.</option>
                                <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                <option value="CONCAVIDAD">CONCAVIDAD</option>
                                <option value="CABECEO">CABECEO</option>
                                <option value="CURVA MINIMA">CURVA MINIMA</option>
                                <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                <option value="ESPESOR BASE">ESPESOR BASE</option>
                                <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                <option value="ESTAMPADO">ESTAMPADO</option>
                                <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                <option value="PLANICIDAD">PLANICIDAD</option>
                                <option value="REDONDEZ">REDONDEZ</option>
                                <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>PROCESO:</label>
                              <select  class="proceso" name="proceso1_12" id="proceso1_12">
                                <option value="">------------------------------------</option>
                                <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                <option value="INSPECCIÓN">INSPECCIÓN</option>
                                <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                <option value="TROQUELADO">TROQUELADO</option>
                                <option value="SEPARACIÓN">SEPARACIÓN</option>
                                <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                              </select>
                              <br><br>
                              <label>RESPONSABLE:</label>
                              <select  class="responsable" name="Res1_12" id="Res1_12">
                                <option value="">------------------------------------</option>
                                <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                <option value="CORTADOR">CORTADOR</option>
                                <option value="INSTALADOR">INSTALADOR</option>
                                <option value="AUDITOR">AUDITOR</option>
                                <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                <option value="OPERADOR">OPERADOR</option>
                                <option value="INSPECTOR">INSPECTOR</option>
                                <option value="LOGÍSTICA">LOGÍSTICA</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                              <select  class="clas" name="clas1_12" id="clas1_12">
                                <option value="">---</option>
                                <option value="M">M</option>
                                <option value="C">C</option>
                              </select>
                              <br><br>
                              <div align='center'>
                                <label>MÉTODOS</label>
                              </div>
                                <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                <input type="text" name="especificacionPLG1_12" id="especificacionPLG1_12"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                              <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                              <select  class="evalucacion" name="evaluacion1_12" id="evaluacion1_12">
                                <option value="">------------------------------------</option>
                                <option value="VISUAL">VISUAL</option>
                                <option value="BASCULA">BASCULA</option>
                                <option value="VERNIER">VERNIER</option>
                                <option value="MANUAL">MANUAL</option>
                                <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                <option value="MICRÓMETRO">MICRÓMETRO</option>
                                <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                              </select>
                              <br><br>
                              <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                  <legend><label>MUESTRA</label></legend>

                                  <label>TAMAÑO:</label>
                                  <input type="text" name="tamaño1_12" id="tamaño1_12"  style="width : 50px"><br>

                                  <label>FRECUENCIA:</label>
                                  <select  class="fre" name="fre1_12" id="fre1_12">
                                    <option value="">------------------------------------------------------</option>
                                    <option value="CADA LOTE">CADA LOTE</option>
                                    <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                    <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                    <option value="INICIO">INICIO</option>
                                    <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                    <option value="C/30 MIN.">C/30 MIN.</option>
                                    <option value="INSPECCION">INSPECCION</option>
                                    <option value="CADA ORDEN">CADA ORDEN</option>
                                    <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                  </select>
                          </fieldset><br>

                            <label>MÉTODO DE CONTROL</label>
                            <select  class="metodoC" name="metodoC1_12" id="metodoC1_12">
                              <option value="">------------</option>
                              <option value="F-IR 01">F-IR 01</option>
                              <option value="F-PP 01">F-PP 01</option>
                              <option value="F-PP 02">F-PP 02</option>
                              <option value="F-PT 01">F-PT 01</option>
                              <option value="F-PT 02">F-PT 02</option>
                              <option value="F-AT 02">F-AT 02</option>
                              <option value="F-IF 01">F-IF 01</option>
                              <option value="F-EN 01">F-EN 01</option>
                              <option value="VISUAL">VISUAL</option>
                            </select>
                        </fieldset>
                      </div>
                    </div>

                      <div id="flotanteC13" style="display:none;">
                        <div id="closeC13">
                          <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                            <legend>
                              <label>No.</label><input type="text" name="no1_13" id="no1_13" value="<?php echo $filaD3['res']+13 ?>" style="font-size: 12pt; width : 17px" readonly>
                            </legend>
                              <label>PRODUCTO:</label>
                              <select  class="prod" name="pod1_13" id="pod1_13">
                                <option value="">------------------------------------------------</option>
                                <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                <option value="ALTURA INT.">ALTURA INT.</option>
                                <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                <option value="CONCAVIDAD">CONCAVIDAD</option>
                                <option value="CABECEO">CABECEO</option>
                                <option value="CURVA MINIMA">CURVA MINIMA</option>
                                <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                <option value="ESPESOR BASE">ESPESOR BASE</option>
                                <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                <option value="ESTAMPADO">ESTAMPADO</option>
                                <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                <option value="PLANICIDAD">PLANICIDAD</option>
                                <option value="REDONDEZ">REDONDEZ</option>
                                <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>PROCESO:</label>
                              <select  class="proceso" name="proceso1_13" id="proceso1_13">
                                <option value="">------------------------------------</option>
                                <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                <option value="INSPECCIÓN">INSPECCIÓN</option>
                                <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                <option value="TROQUELADO">TROQUELADO</option>
                                <option value="SEPARACIÓN">SEPARACIÓN</option>
                                <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                              </select>
                              <br><br>
                              <label>RESPONSABLE:</label>
                              <select  class="responsable" name="Res1_13" id="Res1_13">
                                <option value="">------------------------------------</option>
                                <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                <option value="CORTADOR">CORTADOR</option>
                                <option value="INSTALADOR">INSTALADOR</option>
                                <option value="AUDITOR">AUDITOR</option>
                                <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                <option value="OPERADOR">OPERADOR</option>
                                <option value="INSPECTOR">INSPECTOR</option>
                                <option value="LOGÍSTICA">LOGÍSTICA</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                              <select  class="clas" name="clas1_13" id="clas1_13">
                                <option value="">---</option>
                                <option value="M">M</option>
                                <option value="C">C</option>
                              </select>
                              <br><br>
                              <div align='center'>
                                <label>MÉTODOS</label>
                              </div>
                                <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                <input type="text" name="especificacionPLG1_13" id="especificacionPLG1_13"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                              <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                              <select  class="evalucacion" name="evaluacion1_13" id="evaluacion1_13">
                                <option value="">------------------------------------</option>
                                <option value="VISUAL">VISUAL</option>
                                <option value="BASCULA">BASCULA</option>
                                <option value="VERNIER">VERNIER</option>
                                <option value="MANUAL">MANUAL</option>
                                <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                <option value="MICRÓMETRO">MICRÓMETRO</option>
                                <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                              </select>
                              <br><br>
                              <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                  <legend><label>MUESTRA</label></legend>

                                  <label>TAMAÑO:</label>
                                  <input type="text" name="tamaño1_13" id="tamaño1_13"  style="width : 50px"><br>

                                  <label>FRECUENCIA:</label>
                                  <select  class="fre" name="fre1_13" id="fre1_13">
                                    <option value="">------------------------------------------------------</option>
                                    <option value="CADA LOTE">CADA LOTE</option>
                                    <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                    <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                    <option value="INICIO">INICIO</option>
                                    <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                    <option value="C/30 MIN.">C/30 MIN.</option>
                                    <option value="INSPECCION">INSPECCION</option>
                                    <option value="CADA ORDEN">CADA ORDEN</option>
                                    <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                  </select>
                          </fieldset><br>

                          <label>MÉTODO DE CONTROL</label>
                          <select  class="metodoC" name="metodoC1_13" id="metodoC1_13">
                            <option value="">------------</option>
                            <option value="F-IR 01">F-IR 01</option>
                            <option value="F-PP 01">F-PP 01</option>
                            <option value="F-PP 02">F-PP 02</option>
                            <option value="F-PT 01">F-PT 01</option>
                            <option value="F-PT 02">F-PT 02</option>
                            <option value="F-AT 02">F-AT 02</option>
                            <option value="F-IF 01">F-IF 01</option>
                            <option value="F-EN 01">F-EN 01</option>
                            <option value="VISUAL">VISUAL</option>
                          </select>
                        </fieldset>
                      </div>
                    </div>

                      <div id="flotanteC14" style="display:none;">
                        <div id="closeC14">
                          <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                            <legend>
                              <label>No.</label><input type="text" name="no1_14" id="no1_14" value="<?php echo $filaD3['res']+14 ?>" style="font-size: 12pt; width : 17px" readonly>
                            </legend>
                              <label>PRODUCTO:</label>
                              <select  class="prod" name="pod1_14" id="pod1_14">
                                <option value="">------------------------------------------------</option>
                                <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                                <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                                <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                                <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                                <option value="ALTURA INT.">ALTURA INT.</option>
                                <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                                <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                                <option value="CONCAVIDAD">CONCAVIDAD</option>
                                <option value="CABECEO">CABECEO</option>
                                <option value="CURVA MINIMA">CURVA MINIMA</option>
                                <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                                <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                                <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                                <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                                <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                                <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                                <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                                <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                                <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                                <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                                <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                                <option value="ESPESOR BASE">ESPESOR BASE</option>
                                <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                                <option value="ESTAMPADO">ESTAMPADO</option>
                                <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                                <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                                <option value="PLANICIDAD">PLANICIDAD</option>
                                <option value="REDONDEZ">REDONDEZ</option>
                                <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                                <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                                <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                                <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                                <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>PROCESO:</label>
                              <select  class="proceso" name="proceso1_14" id="proceso1_14">
                                <option value="">------------------------------------</option>
                                <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                                <option value="INSPECCIÓN">INSPECCIÓN</option>
                                <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                                <option value="TROQUELADO">TROQUELADO</option>
                                <option value="SEPARACIÓN">SEPARACIÓN</option>
                                <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                                <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                              </select>
                              <br><br>
                              <label>RESPONSABLE:</label>
                              <select  class="responsable" name="Res1_14" id="Res1_14">
                                <option value="">------------------------------------</option>
                                <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                                <option value="CORTADOR">CORTADOR</option>
                                <option value="INSTALADOR">INSTALADOR</option>
                                <option value="AUDITOR">AUDITOR</option>
                                <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                                <option value="INSPECTOR">INSPECTOR</option>
                                <option value="LOGÍSTICA">LOGÍSTICA</option>
                              </select>
                              &nbsp
                              &nbsp
                              <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                              <select  class="clas" name="clas1_14" id="clas1_14">
                                <option value="">---</option>
                                <option value="M">M</option>
                                <option value="C">C</option>
                              </select>
                              <br><br>
                              <div align='center'>
                                <label>MÉTODOS</label>
                              </div>
                                <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                                <input type="text" name="especificacionPLG1_14" id="especificacionPLG1_14"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                              <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                              <select  class="evalucacion" name="evaluacion1_14" id="evaluacion1_14">
                                <option value="">------------------------------------</option>
                                <option value="VISUAL">VISUAL</option>
                                <option value="BASCULA">BASCULA</option>
                                <option value="VERNIER">VERNIER</option>
                                <option value="MANUAL">MANUAL</option>
                                <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                                <option value="MICRÓMETRO">MICRÓMETRO</option>
                                <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                                <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                                <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                                <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                              </select>
                              <br><br>
                              <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                  <legend><label>MUESTRA</label></legend>

                                  <label>TAMAÑO:</label>
                                  <input type="text" name="tamaño1_14" id="tamaño1_14"  style="width : 50px"><br>

                                  <label>FRECUENCIA:</label>
                                  <select  class="fre" name="fre1_14" id="fre1_14">
                                    <option value="">------------------------------------------------------</option>
                                    <option value="CADA LOTE">CADA LOTE</option>
                                    <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                    <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                    <option value="INICIO">INICIO</option>
                                    <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                    <option value="C/30 MIN.">C/30 MIN.</option>
                                    <option value="INSPECCION">INSPECCION</option>
                                    <option value="CADA ORDEN">CADA ORDEN</option>
                                    <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                  </select>
                          </fieldset><br>

                          <label>MÉTODO DE CONTROL</label>
                          <select  class="metodoC" name="metodoC1_14" id="metodoC1_14">
                            <option value="">------------</option>
                            <option value="F-IR 01">F-IR 01</option>
                            <option value="F-PP 01">F-PP 01</option>
                            <option value="F-PP 02">F-PP 02</option>
                            <option value="F-PT 01">F-PT 01</option>
                            <option value="F-PT 02">F-PT 02</option>
                            <option value="F-AT 02">F-AT 02</option>
                            <option value="F-IF 01">F-IF 01</option>
                            <option value="F-EN 01">F-EN 01</option>
                            <option value="VISUAL">VISUAL</option>
                          </select>
                        </fieldset>
                      </div>
                    </div>

                    <div id="flotanteC15" style="display:none;">
                      <div id="closeC15">
                        <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                          <legend>
                            <label>No.</label><input type="text" name="no1_15" id="no1_15" value="<?php echo $filaD3['res']+15 ?>" style="font-size: 12pt; width : 17px" readonly>
                          </legend>
                            <label>PRODUCTO:</label>
                            <select  class="prod" name="pod1_15" id="pod1_15">
                              <option value="">------------------------------------------------</option>
                              <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                              <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                              <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                              <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                              <option value="ALTURA INT.">ALTURA INT.</option>
                              <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                              <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                              <option value="CONCAVIDAD">CONCAVIDAD</option>
                              <option value="CABECEO">CABECEO</option>
                              <option value="CURVA MINIMA">CURVA MINIMA</option>
                              <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                              <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                              <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                              <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                              <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                              <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                              <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                              <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                              <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                              <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                              <option value="ESPESOR BASE">ESPESOR BASE</option>
                              <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                              <option value="ESTAMPADO">ESTAMPADO</option>
                              <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                              <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                              <option value="PLANICIDAD">PLANICIDAD</option>
                              <option value="REDONDEZ">REDONDEZ</option>
                              <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                              <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                              <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                              <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                              <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>PROCESO:</label>
                            <select  class="proceso" name="proceso1_15" id="proceso1_15">
                              <option value="">------------------------------------</option>
                              <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                              <option value="INSPECCIÓN">INSPECCIÓN</option>
                              <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                              <option value="TROQUELADO">TROQUELADO</option>
                              <option value="SEPARACIÓN">SEPARACIÓN</option>
                              <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                              <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                            </select>
                            <br><br>
                            <label>RESPONSABLE:</label>
                            <select  class="responsable" name="Res1_15" id="Res1_15">
                              <option value="">------------------------------------</option>
                              <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                              <option value="CORTADOR">CORTADOR</option>
                              <option value="INSTALADOR">INSTALADOR</option>
                              <option value="AUDITOR">AUDITOR</option>
                              <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                              <option value="OPERADOR">OPERADOR</option>
                              <option value="INSPECTOR">INSPECTOR</option>
                              <option value="LOGÍSTICA">LOGÍSTICA</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                            <select  class="clas" name="clas1_15" id="clas1_15">
                              <option value="">---</option>
                              <option value="M">M</option>
                              <option value="C">C</option>
                            </select>
                            <br><br>
                            <div align='center'>
                              <label>MÉTODOS</label>
                            </div>
                              <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                              <input type="text" name="especificacionPLG1_15" id="especificacionPLG1_15"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                            <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                            <select  class="evalucacion" name="evaluacion1_15" id="evaluacion1_15">
                              <option value="">------------------------------------</option>
                              <option value="VISUAL">VISUAL</option>
                              <option value="BASCULA">BASCULA</option>
                              <option value="VERNIER">VERNIER</option>
                              <option value="MANUAL">MANUAL</option>
                              <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                              <option value="MICRÓMETRO">MICRÓMETRO</option>
                              <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                              <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                              <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                              <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                            </select>
                            <br><br>
                            <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                <legend><label>MUESTRA</label></legend>

                                <label>TAMAÑO:</label>
                                <input type="text" name="tamaño1_15" id="tamaño1_15"  style="width : 50px"><br>

                                <label>FRECUENCIA:</label>
                                <select  class="fre" name="fre1_15" id="fre1_15">
                                  <option value="">------------------------------------------------------</option>
                                  <option value="CADA LOTE">CADA LOTE</option>
                                  <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                  <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                  <option value="INICIO">INICIO</option>
                                  <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                  <option value="C/30 MIN.">C/30 MIN.</option>
                                  <option value="INSPECCION">INSPECCION</option>
                                  <option value="CADA ORDEN">CADA ORDEN</option>
                                  <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                </select>
                        </fieldset><br>

                        <label>MÉTODO DE CONTROL</label>
                        <select  class="metodoC" name="metodoC1_15" id="metodoC1_15">
                          <option value="">------------</option>
                          <option value="F-IR 01">F-IR 01</option>
                          <option value="F-PP 01">F-PP 01</option>
                          <option value="F-PP 02">F-PP 02</option>
                          <option value="F-PT 01">F-PT 01</option>
                          <option value="F-PT 02">F-PT 02</option>
                          <option value="F-AT 02">F-AT 02</option>
                          <option value="F-IF 01">F-IF 01</option>
                          <option value="F-EN 01">F-EN 01</option>
                          <option value="VISUAL">VISUAL</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>

                    <div id="flotanteC16" style="display:none;">
                      <div id="closeC16">
                        <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                          <legend>
                            <label>No.</label><input type="text" name="no1_16" id="no1_16" value="<?php echo $filaD3['res']+16 ?>" style="font-size: 12pt; width : 30px" readonly>
                          </legend>
                            <label>PRODUCTO:</label>
                            <select  class="prod" name="pod1_16" id="pod1_16">
                              <option value="">------------------------------------------------</option>
                              <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                              <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                              <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                              <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                              <option value="ALTURA INT.">ALTURA INT.</option>
                              <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                              <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                              <option value="CONCAVIDAD">CONCAVIDAD</option>
                              <option value="CABECEO">CABECEO</option>
                              <option value="CURVA MINIMA">CURVA MINIMA</option>
                              <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                              <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                              <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                              <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                              <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                              <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                              <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                              <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                              <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                              <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                              <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                              <option value="ESPESOR BASE">ESPESOR BASE</option>
                              <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                              <option value="ESTAMPADO">ESTAMPADO</option>
                              <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                              <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                              <option value="PLANICIDAD">PLANICIDAD</option>
                              <option value="REDONDEZ">REDONDEZ</option>
                              <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                              <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                              <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                              <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                              <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>PROCESO:</label>
                            <select  class="proceso" name="proceso1_16" id="proceso1_16">
                              <option value="">------------------------------------</option>
                              <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                              <option value="INSPECCIÓN">INSPECCIÓN</option>
                              <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                              <option value="TROQUELADO">TROQUELADO</option>
                              <option value="SEPARACIÓN">SEPARACIÓN</option>
                              <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                              <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                            </select>
                            <br><br>
                            <label>RESPONSABLE:</label>
                            <select  class="responsable" name="Res1_16" id="Res1_16">
                              <option value="">------------------------------------</option>
                              <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                              <option value="CORTADOR">CORTADOR</option>
                              <option value="INSTALADOR">INSTALADOR</option>
                              <option value="AUDITOR">AUDITOR</option>
                              <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                              <option value="OPERADOR">OPERADOR</option>
                              <option value="INSPECTOR">INSPECTOR</option>
                              <option value="LOGÍSTICA">LOGÍSTICA</option>
                            </select>
                            &nbsp
                            &nbsp
                            <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                            <select  class="clas" name="clas1_16" id="clas1_16">
                              <option value="">---</option>
                              <option value="M">M</option>
                              <option value="C">C</option>
                            </select>
                            <br><br>
                            <div align='center'>
                              <label>MÉTODOS</label>
                            </div>
                              <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                              <input type="text" name="especificacionPLG1_16" id="especificacionPLG1_16"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                            <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                            <select  class="evalucacion" name="evaluacion1_16" id="evaluacion1_16">
                              <option value="">------------------------------------</option>
                              <option value="VISUAL">VISUAL</option>
                              <option value="BASCULA">BASCULA</option>
                              <option value="VERNIER">VERNIER</option>
                              <option value="MANUAL">MANUAL</option>
                              <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                              <option value="MICRÓMETRO">MICRÓMETRO</option>
                              <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                              <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                              <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                              <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                            </select>
                            <br><br>
                            <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                                <legend><label>MUESTRA</label></legend>

                                <label>TAMAÑO:</label>
                                <input type="text" name="tamaño1_16" id="tamaño1_16"  style="width : 50px"><br>

                                <label>FRECUENCIA:</label>
                                <select  class="fre" name="fre1_16" id="fre1_16">
                                  <option value="">------------------------------------------------------</option>
                                  <option value="CADA LOTE">CADA LOTE</option>
                                  <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                  <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                  <option value="INICIO">INICIO</option>
                                  <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                  <option value="C/30 MIN.">C/30 MIN.</option>
                                  <option value="INSPECCION">INSPECCION</option>
                                  <option value="CADA ORDEN">CADA ORDEN</option>
                                  <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                </select>
                        </fieldset><br>

                        <label>MÉTODO DE CONTROL</label>
                        <select  class="metodoC" name="metodoC1_16" id="metodoC1_16">
                          <option value="">------------</option>
                          <option value="F-IR 01">F-IR 01</option>
                          <option value="F-PP 01">F-PP 01</option>
                          <option value="F-PP 02">F-PP 02</option>
                          <option value="F-PT 01">F-PT 01</option>
                          <option value="F-PT 02">F-PT 02</option>
                          <option value="F-AT 02">F-AT 02</option>
                          <option value="F-IF 01">F-IF 01</option>
                          <option value="F-EN 01">F-EN 01</option>
                          <option value="VISUAL">VISUAL</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>

                  <div id="flotanteC17" style="display:none;">
                    <div id="closeC17">
                      <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                        <legend>
                          <label>No.</label><input type="text" name="no1.17" id="no1.17" value="<?php echo $filaD3['res']+17 ?>" style="font-size: 12pt; width : 30px" readonly>
                        </legend>
                          <label>PRODUCTO:</label>
                          <select  class="prod" name="pod1_17" id="pod1_17">
                            <option value="">------------------------------------------------</option>
                            <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                            <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                            <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                            <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                            <option value="ALTURA INT.">ALTURA INT.</option>
                            <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                            <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                            <option value="CONCAVIDAD">CONCAVIDAD</option>
                            <option value="CABECEO">CABECEO</option>
                            <option value="CURVA MINIMA">CURVA MINIMA</option>
                            <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                            <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                            <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                            <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                            <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                            <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                            <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                            <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                            <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                            <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                            <option value="ESPESOR BASE">ESPESOR BASE</option>
                            <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                            <option value="ESTAMPADO">ESTAMPADO</option>
                            <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                            <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                            <option value="PLANICIDAD">PLANICIDAD</option>
                            <option value="REDONDEZ">REDONDEZ</option>
                            <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                            <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                            <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                            <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                            <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>PROCESO:</label>
                          <select  class="proceso" name="proceso1_17" id="proceso1_17">
                            <option value="">------------------------------------</option>
                            <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                            <option value="INSPECCIÓN">INSPECCIÓN</option>
                            <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                            <option value="TROQUELADO">TROQUELADO</option>
                            <option value="SEPARACIÓN">SEPARACIÓN</option>
                            <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                            <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                          </select>
                          <br><br>
                          <label>RESPONSABLE:</label>
                          <select  class="responsable" name="Res1_17" id="Res1_17">
                            <option value="">------------------------------------</option>
                            <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                            <option value="CORTADOR">CORTADOR</option>
                            <option value="INSTALADOR">INSTALADOR</option>
                            <option value="AUDITOR">AUDITOR</option>
                            <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                            <option value="OPERADOR">OPERADOR</option>
                            <option value="INSPECTOR">INSPECTOR</option>
                            <option value="LOGÍSTICA">LOGÍSTICA</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                          <select  class="clas" name="clas1_17" id="clas1_17">
                            <option value="">---</option>
                            <option value="M">M</option>
                            <option value="C">C</option>
                          </select>
                          <br><br>
                          <div align='center'>
                            <label>MÉTODOS</label>
                          </div>
                            <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                            <input type="text" name="especificacionPLG1_17" id="especificacionPLG1_17"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                          <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                          <select  class="evalucacion" name="evaluacion1_17" id="evaluacion1_17">
                            <option value="">------------------------------------</option>
                            <option value="VISUAL">VISUAL</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="VERNIER">VERNIER</option>
                            <option value="MANUAL">MANUAL</option>
                            <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                            <option value="MICRÓMETRO">MICRÓMETRO</option>
                            <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                            <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                            <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                            <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                          </select>
                          <br><br>
                          <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                              <legend><label>MUESTRA</label></legend>

                              <label>TAMAÑO:</label>
                              <input type="text" name="tamaño1_17" id="tamaño1_17"  style="width : 50px"><br>

                              <label>FRECUENCIA:</label>
                              <select  class="fre" name="fre1_17" id="fre1_17">
                                <option value="">------------------------------------------------------</option>
                                <option value="CADA LOTE">CADA LOTE</option>
                                <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                <option value="INICIO">INICIO</option>
                                <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                <option value="C/30 MIN.">C/30 MIN.</option>
                                <option value="INSPECCION">INSPECCION</option>
                                <option value="CADA ORDEN">CADA ORDEN</option>
                                <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                              </select>
                      </fieldset><br>

                        <label>MÉTODO DE CONTROL</label>
                        <select  class="metodoC" name="metodoC1_17" id="metodoC1_17">
                          <option value="">------------</option>
                          <option value="F-IR 01">F-IR 01</option>
                          <option value="F-PP 01">F-PP 01</option>
                          <option value="F-PP 02">F-PP 02</option>
                          <option value="F-PT 01">F-PT 01</option>
                          <option value="F-PT 02">F-PT 02</option>
                          <option value="F-AT 02">F-AT 02</option>
                          <option value="F-IF 01">F-IF 01</option>
                          <option value="F-EN 01">F-EN 01</option>
                          <option value="VISUAL">VISUAL</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>

                  <div id="flotanteC18" style="display:none;">
                    <div id="closeC18">
                      <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                        <legend>
                          <label>No.</label><input type="text" name="no1_18" id="no1_18" value="<?php echo $filaD3['res']+18 ?>" style="font-size: 12pt; width : 30px" readonly>
                        </legend>
                          <label>PRODUCTO:</label>
                          <select  class="prod" name="pod1_18" id="pod1_18">
                            <option value="">------------------------------------------------</option>
                            <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                            <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                            <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                            <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                            <option value="ALTURA INT.">ALTURA INT.</option>
                            <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                            <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                            <option value="CONCAVIDAD">CONCAVIDAD</option>
                            <option value="CABECEO">CABECEO</option>
                            <option value="CURVA MINIMA">CURVA MINIMA</option>
                            <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                            <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                            <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                            <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                            <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                            <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                            <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                            <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                            <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                            <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                            <option value="ESPESOR BASE">ESPESOR BASE</option>
                            <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                            <option value="ESTAMPADO">ESTAMPADO</option>
                            <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                            <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                            <option value="PLANICIDAD">PLANICIDAD</option>
                            <option value="REDONDEZ">REDONDEZ</option>
                            <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                            <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                            <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                            <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                            <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>PROCESO:</label>
                          <select  class="proceso" name="proceso1_18" id="proceso1_18">
                            <option value="">------------------------------------</option>
                            <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                            <option value="INSPECCIÓN">INSPECCIÓN</option>
                            <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                            <option value="TROQUELADO">TROQUELADO</option>
                            <option value="SEPARACIÓN">SEPARACIÓN</option>
                            <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                            <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                          </select>
                          <br><br>
                          <label>RESPONSABLE:</label>
                          <select  class="responsable" name="Res1_18" id="Res1_18">
                            <option value="">------------------------------------</option>
                            <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                            <option value="CORTADOR">CORTADOR</option>
                            <option value="INSTALADOR">INSTALADOR</option>
                            <option value="AUDITOR">AUDITOR</option>
                            <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                            <option value="OPERADOR">OPERADOR</option>
                            <option value="INSPECTOR">INSPECTOR</option>
                            <option value="LOGÍSTICA">LOGÍSTICA</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                          <select  class="clas" name="clas1_18" id="clas1_18">
                            <option value="">---</option>
                            <option value="M">M</option>
                            <option value="C">C</option>
                          </select>
                          <br><br>
                          <div align='center'>
                            <label>MÉTODOS</label>
                          </div>
                            <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                            <input type="text" name="especificacionPLG1_18" id="especificacionPLG1_18"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                          <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                          <select  class="evalucacion" name="evaluacion1_18" id="evaluacion1_18">
                            <option value="">------------------------------------</option>
                            <option value="VISUAL">VISUAL</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="VERNIER">VERNIER</option>
                            <option value="MANUAL">MANUAL</option>
                            <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                            <option value="MICRÓMETRO">MICRÓMETRO</option>
                            <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                            <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                            <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                            <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                          </select>
                          <br><br>
                          <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                              <legend><label>MUESTRA</label></legend>

                                <label>TAMAÑO:</label>
                                <input type="number" name="tamaño1_18" id="tamaño1_18"  style="width : 50px"><br>

                                <label>FRECUENCIA:</label>
                                <select  class="fre" name="fre1_18" id="fre1_18">
                                  <option value="">------------------------------------------------------</option>
                                  <option value="CADA LOTE">CADA LOTE</option>
                                  <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                  <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                  <option value="INICIO">INICIO</option>
                                  <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                  <option value="C/30 MIN.">C/30 MIN.</option>
                                  <option value="INSPECCION">INSPECCION</option>
                                  <option value="CADA ORDEN">CADA ORDEN</option>
                                  <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                                </select>
                      </fieldset><br>

                        <label>MÉTODO DE CONTROL</label>
                        <select  class="metodoC" name="metodoC1_18" id="metodoC1_18">
                          <option value="">------------</option>
                          <option value="F-IR 01">F-IR 01</option>
                          <option value="F-PP 01">F-PP 01</option>
                          <option value="F-PP 02">F-PP 02</option>
                          <option value="F-PT 01">F-PT 01</option>
                          <option value="F-PT 02">F-PT 02</option>
                          <option value="F-AT 02">F-AT 02</option>
                          <option value="F-IF 01">F-IF 01</option>
                          <option value="F-EN 01">F-EN 01</option>
                          <option value="VISUAL">VISUAL</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>

                  <div id="flotanteC19" style="display:none;">
                    <div id="closeC19">
                      <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                        <legend>
                          <label>No.</label><input type="text" name="no1_19" id="no1_19" value="<?php echo $filaD3['res']+19 ?>" style="font-size: 12pt; width : 30px" readonly>
                        </legend>
                          <label>PRODUCTO:</label>
                          <select  class="prod" name="pod1_19" id="pod1_19">
                            <option value="">------------------------------------------------</option>
                            <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                            <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                            <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                            <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                            <option value="ALTURA INT.">ALTURA INT.</option>
                            <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                            <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                            <option value="CONCAVIDAD">CONCAVIDAD</option>
                            <option value="CABECEO">CABECEO</option>
                            <option value="CURVA MINIMA">CURVA MINIMA</option>
                            <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                            <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                            <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                            <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                            <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                            <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                            <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                            <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                            <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                            <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                            <option value="ESPESOR BASE">ESPESOR BASE</option>
                            <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                            <option value="ESTAMPADO">ESTAMPADO</option>
                            <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                            <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                            <option value="PLANICIDAD">PLANICIDAD</option>
                            <option value="REDONDEZ">REDONDEZ</option>
                            <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                            <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                            <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                            <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                            <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>PROCESO:</label>
                          <select  class="proceso" name="proceso1_19" id="proceso1_19">
                            <option value="">------------------------------------</option>
                            <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                            <option value="INSPECCIÓN">INSPECCIÓN</option>
                            <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                            <option value="TROQUELADO">TROQUELADO</option>
                            <option value="SEPARACIÓN">SEPARACIÓN</option>
                            <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                            <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                          </select>
                          <br><br>
                          <label>RESPONSABLE:</label>
                          <select  class="responsable" name="Res1_19" id="Res1_19">
                            <option value="">------------------------------------</option>
                            <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                            <option value="CORTADOR">CORTADOR</option>
                            <option value="INSTALADOR">INSTALADOR</option>
                            <option value="AUDITOR">AUDITOR</option>
                            <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                            <option value="OPERADOR">OPERADOR</option>
                            <option value="INSPECTOR">INSPECTOR</option>
                            <option value="LOGÍSTICA">LOGÍSTICA</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                          <select  class="clas" name="clas1_19" id="clas1_19">
                            <option value="">---</option>
                            <option value="M">M</option>
                            <option value="C">C</option>
                          </select>
                          <br><br>
                          <div align='center'>
                            <label>MÉTODOS</label>
                          </div>
                            <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                            <input type="text" name="especificacionPLG1_19" id="especificacionPLG1_19"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                          <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                          <select  class="evalucacion" name="evaluacion1_19" id="evaluacion1_19">
                            <option value="">------------------------------------</option>
                            <option value="VISUAL">VISUAL</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="VERNIER">VERNIER</option>
                            <option value="MANUAL">MANUAL</option>
                            <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                            <option value="MICRÓMETRO">MICRÓMETRO</option>
                            <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                            <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                            <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                            <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                          </select>
                          <br><br>
                          <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                              <legend><label>MUESTRA</label></legend>

                              <label>TAMAÑO:</label>
                              <input type="text" name="tamaño1_19" id="tamaño1_19"  style="width : 50px"><br>

                              <label>FRECUENCIA:</label>
                              <select  class="fre" name="fre1_19" id="fre1_19">
                                <option value="">------------------------------------------------------</option>
                                <option value="CADA LOTE">CADA LOTE</option>
                                <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                <option value="INICIO">INICIO</option>
                                <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                <option value="C/30 MIN.">C/30 MIN.</option>
                                <option value="INSPECCION">INSPECCION</option>
                                <option value="CADA ORDEN">CADA ORDEN</option>
                                <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                              </select>
                      </fieldset><br>

                      <label>MÉTODO DE CONTROL</label>
                      <select  class="metodoC" name="metodoC1_19" id="metodoC1_19">
                        <option value="">------------</option>
                        <option value="F-IR 01">F-IR 01</option>
                        <option value="F-PP 01">F-PP 01</option>
                        <option value="F-PP 02">F-PP 02</option>
                        <option value="F-PT 01">F-PT 01</option>
                        <option value="F-PT 02">F-PT 02</option>
                        <option value="F-AT 02">F-AT 02</option>
                        <option value="F-IF 01">F-IF 01</option>
                        <option value="F-EN 01">F-EN 01</option>
                        <option value="VISUAL">VISUAL</option>
                      </select>
                    </fieldset>
                  </div>
                  </div>

                  <div id="flotanteC20" style="display:none;">
                    <div id="closeC20">
                      <fieldset style="width:90%; border-color: #000000; color: #000000; background-color: #5DADE2;" align="left">
                        <legend>
                          <label>No.</label><input type="text" name="no1_20" id="no1_20" value="<?php echo $filaD3['res']+20?>" style="font-size: 12pt; width : 30px" readonly>
                        </legend>
                          <label>PRODUCTO:</label>
                          <select  class="prod" name="pod1_20" id="pod1_20">
                            <option value="">------------------------------------------------</option>
                            <option value="ALTURA DE ESCALÓN">ALTURA DE ESCALÓN</option>
                            <option value="ALTURA DE ESTAMPA">ALTURA DE ESTAMPA</option>
                            <option value="ALTURA TOTAL">ALTURA TOTAL</option>
                            <option value="ALTURA DE CEJA">ALTURA DE CEJA</option>
                            <option value="ALTURA INT.">ALTURA INT.</option>
                            <option value="ANGULO DE CHAFLÁN">ANGULO DE CHAFLÁN</option>
                            <option value="CONCENTRICIDAD">CONCENTRICIDAD</option>
                            <option value="CONCAVIDAD">CONCAVIDAD</option>
                            <option value="CABECEO">CABECEO</option>
                            <option value="CURVA MINIMA">CURVA MINIMA</option>
                            <option value="DIÁMETRO EXT.">DIÁMETRO EXT.</option>
                            <option value="DIÁMETRO DE BARRENO">DIÁMETRO DE BARRENO</option>
                            <option value="DIÁMETRO EXT. EN PUNTA">DIÁMETRO EXT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. EN PUNTA">DIÁMETRO INT. EN PUNTA</option>
                            <option value="DIÁMETRO INT. BASE">DIÁMETRO INT. BASE</option>
                            <option value="DIÁMETRO FLANGE">DIÁMETRO FLANGE</option>
                            <option value="DIÁMETRO ESTAMPA">DIÁMETRO ESTAMPA</option>
                            <option value="DIÁMETRO DE DOBLEZ">DIÁMETRO DE DOBLEZ</option>
                            <option value="DIÁMETRO INT. ESTAMPA">DIÁMETRO INT. ESTAMPA</option>
                            <option value="ESPESOR DE PARED">ESPESOR DE PARED</option>
                            <option value="ESPESOR BARRENO">ESPESOR BARRENO</option>
                            <option value="ESPESOR CEJA">ESPESOR CEJA</option>
                            <option value="ESPESOR BASE">ESPESOR BASE</option>
                            <option value="ESTAMPA <?php echo $componente?>">ESTAMPA <?php echo $componente?></option>
                            <option value="ESTAMPADO">ESTAMPADO</option>
                            <option value="ETIQUETA ESPECIFICACIÓN">ETIQUETA ESPECIFICACIÓN</option>
                            <option value="LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?>">LAMINA CALIBRE <?php echo $fila2['num_calibre'] ?></option>
                            <option value="PLANICIDAD">PLANICIDAD</option>
                            <option value="REDONDEZ">REDONDEZ</option>
                            <option value="RADIO EXT. BASE">RADIO EXT. BASE</option>
                            <option value="RADIO INT. ESTAMPA">RADIO INT. ESTAMPA</option>
                            <option value="RAYAS/REBABAS INCOMPLETA">RAYAS/REBABAS INCOMPLETA</option>
                            <option value="RAYAS/REBABAS DIAM. EXTERIOR">RAYAS/REBABAS DIAM. EXTERIOR</option>
                            <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>PROCESO:</label>
                          <select  class="proceso" name="proceso1_20" id="proceso1_20">
                            <option value="">------------------------------------</option>
                            <option value="INSPECCIÓN RECIBO">INSPECCIÓN RECIBO</option>
                            <option value="INSPECCIÓN">INSPECCIÓN</option>
                            <option value="CONTROL ANCHO TIRA">CONTROL ANCHO TIRA.</option>
                            <option value="TROQUELADO">TROQUELADO</option>
                            <option value="SEPARACIÓN">SEPARACIÓN</option>
                            <option value="CONTEO POR PESO">CONTEO POR PESO</option>
                            <option value="LISTA DE EMBARQUE">LISTA DE EMBARQUE</option>
                          </select>
                          <br><br>
                          <label>RESPONSABLE:</label>
                          <select  class="responsable" name="Res1_20" id="Res1_20">
                            <option value="">------------------------------------</option>
                            <option value="INSPECTOR DE CALIDAD">INSPECTOR DE CALIDAD</option>
                            <option value="CORTADOR">CORTADOR</option>
                            <option value="INSTALADOR">INSTALADOR</option>
                            <option value="AUDITOR">AUDITOR</option>
                            <option value="AUDITOR OPERADOR">AUDITOR OPERADOR</option>
                            <option value="OPERADOR">OPERADOR</option>
                            <option value="INSPECTOR">INSPECTOR</option>
                            <option value="LOGÍSTICA">LOGÍSTICA</option>
                          </select>
                          &nbsp
                          &nbsp
                          <label>CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES:</label>
                          <select  class="clas" name="clas1_20" id="clas1_20">
                            <option value="">---</option>
                            <option value="M">M</option>
                            <option value="C">C</option>
                          </select>
                          <br><br>
                          <div align='center'>
                            <label>MÉTODOS</label>
                          </div>
                            <label>ESPECIFICACIÓN PLG. / TOLERANCIA  PRODUCTO/PROCESO:</label>
                            <input type="text" name="especificacionPLG1_20" id="especificacionPLG1_20"  onkeyup="javascript:this.value=this.value.toUpperCase();" ><br><br>
                          <label>EVALUACIÓN/MÉTODO DE MEDICIÓN:</label>
                          <select  class="evalucacion" name="evaluacion1_20" id="evaluacion1_20">
                            <option value="">------------------------------------</option>
                            <option value="VISUAL">VISUAL</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="VERNIER">VERNIER</option>
                            <option value="MANUAL">MANUAL</option>
                            <option value="TRANSPORTADOR">TRANSPORTADOR</option>
                            <option value="MICRÓMETRO">MICRÓMETRO</option>
                            <option value="MICRÓMETRO DIGITAL">MICRÓMETRO DIGITAL</option>
                            <option value="MICRÓMETRO LASER">MICRÓMETRO LASER</option>
                            <option value="PLANTILLAS DE RADIOS">PLANTILLAS DE RADIOS</option>
                            <option value="INDICADOR DE ALTURAS">INDICADOR DE ALTURAS</option>
                          </select>
                          <br><br>
                          <fieldset style="width:30%; border-color: #000000; color: #000000; background-color: #F095F9;" align="left">
                              <legend><label>MUESTRA</label></legend>

                              <label>TAMAÑO:</label>
                              <input type="text" name="tamaño1_20" id="tamaño1_20"  style="width : 50px"><br>

                              <label>FRECUENCIA:</label>
                              <select  class="fre" name="fre1_20" id="fre1_20">
                                <option value="">------------------------------------------------------</option>
                                <option value="CADA LOTE">CADA LOTE</option>
                                <option value="ORDEN DE PRODUCCIÓN CORTADOR">ORDEN DE PRODUCCIÓN CORTADOR</option>
                                <option value="ORDEN DE PRODUCCIÓN">ORDEN DE PRODUCCIÓN</option>
                                <option value="INICIO">INICIO</option>
                                <option value="INICIO C/30 MIN.">INICIO C/30 MIN.</option>
                                <option value="C/30 MIN.">C/30 MIN.</option>
                                <option value="INSPECCION">INSPECCION</option>
                                <option value="CADA ORDEN">CADA ORDEN</option>
                                <option value="CADA CUÑETE/CAJA">CADA CUÑETE/CAJA</option>
                              </select>
                      </fieldset><br>

                      <label>MÉTODO DE CONTROL</label>
                      <select  class="metodoC" name="metodoC1_20" id="metodoC1_20">
                        <option value="">------------</option>
                        <option value="F-IR 01">F-IR 01</option>
                        <option value="F-PP 01">F-PP 01</option>
                        <option value="F-PP 02">F-PP 02</option>
                        <option value="F-PT 01">F-PT 01</option>
                        <option value="F-PT 02">F-PT 02</option>
                        <option value="F-AT 02">F-AT 02</option>
                        <option value="F-IF 01">F-IF 01</option>
                        <option value="F-EN 01">F-EN 01</option>
                        <option value="VISUAL">VISUAL</option>
                      </select>
                    </fieldset>
                  </div>
                </div>
          </fieldset>  <?php //primero termino ?>

            </div>

          </div>

            <br>

              <style type="text/css">
                .boton_1{
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
                  color: #69C0F7;
                  background-color: #DA0E0B;
                  border-radius: 15px;
                  border: 3px double #154360;
                }
                .boton_2:hover{
                  opacity: 0.6;
                  text-decoration: none;
                }
              </style>
              <br>
              <div align='center'>
                <button type='submit'  class='boton_2'  onclick="this.form.action='GenerarPCM.php';this.form.submit();"><img src='/produccion/img/atras.png' width='20' height='20' class='zoom'/>REGRESAR</button>
                <button type='submit'  class='boton_1'  onclick="this.form.action='guardarPCcambiosPartesM.php';this.form.submit();"><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
              </div>
            <br><br><br>
      </form>
   </body>
 </html>
 <?php


$conexion ->close();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <script type="text/javascript">

        function mostrarCaract() {

            const selectElement = document.querySelector('.noC');
                var res  = `${event.target.value}`;

                 if(res == '1'){

                     div = document.getElementById('flotanteC1');
                     div.style.display = '';
                     div = document.getElementById('flotanteC2');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC3');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC4');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC5');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC6');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC7');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC8');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC9');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC10');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC11');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC12');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC13');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC14');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC15');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC16');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC17');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC18');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC19');
                     div.style.display = 'none';
                     div = document.getElementById('flotanteC20');
                     div.style.display = 'none';

                  }else if(res == '2'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC4');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC5');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC6');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC7');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC8');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '3'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC5');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC6');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC7');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC8');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '4'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC6');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC7');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC8');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '5'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC7');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC8');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '6'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC8');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '7'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '8'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '9'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '10'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '11'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '12'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '13'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '14'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = '';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '15'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = '';
                      div = document.getElementById('flotanteC15');
                      div.style.display = '';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '16'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = '';
                      div = document.getElementById('flotanteC15');
                      div.style.display = '';
                      div = document.getElementById('flotanteC16');
                      div.style.display = '';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '17'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = '';
                      div = document.getElementById('flotanteC15');
                      div.style.display = '';
                      div = document.getElementById('flotanteC16');
                      div.style.display = '';
                      div = document.getElementById('flotanteC17');
                      div.style.display = '';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '18'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = '';
                      div = document.getElementById('flotanteC15');
                      div.style.display = '';
                      div = document.getElementById('flotanteC16');
                      div.style.display = '';
                      div = document.getElementById('flotanteC17');
                      div.style.display = '';
                      div = document.getElementById('flotanteC18');
                      div.style.display = '';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '19'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = '';
                      div = document.getElementById('flotanteC15');
                      div.style.display = '';
                      div = document.getElementById('flotanteC16');
                      div.style.display = '';
                      div = document.getElementById('flotanteC17');
                      div.style.display = '';
                      div = document.getElementById('flotanteC18');
                      div.style.display = '';
                      div = document.getElementById('flotanteC19');
                      div.style.display = '';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }else if(res == '20'){
                      div = document.getElementById('flotanteC1');
                      div.style.display = '';
                      div = document.getElementById('flotanteC2');
                      div.style.display = '';
                      div = document.getElementById('flotanteC3');
                      div.style.display = '';
                      div = document.getElementById('flotanteC4');
                      div.style.display = '';
                      div = document.getElementById('flotanteC5');
                      div.style.display = '';
                      div = document.getElementById('flotanteC6');
                      div.style.display = '';
                      div = document.getElementById('flotanteC7');
                      div.style.display = '';
                      div = document.getElementById('flotanteC8');
                      div.style.display = '';
                      div = document.getElementById('flotanteC9');
                      div.style.display = '';
                      div = document.getElementById('flotanteC10');
                      div.style.display = '';
                      div = document.getElementById('flotanteC11');
                      div.style.display = '';
                      div = document.getElementById('flotanteC12');
                      div.style.display = '';
                      div = document.getElementById('flotanteC13');
                      div.style.display = '';
                      div = document.getElementById('flotanteC14');
                      div.style.display = '';
                      div = document.getElementById('flotanteC15');
                      div.style.display = '';
                      div = document.getElementById('flotanteC16');
                      div.style.display = '';
                      div = document.getElementById('flotanteC17');
                      div.style.display = '';
                      div = document.getElementById('flotanteC18');
                      div.style.display = '';
                      div = document.getElementById('flotanteC19');
                      div.style.display = '';
                      div = document.getElementById('flotanteC20');
                      div.style.display = '';
                  }else {
                      div = document.getElementById('flotanteC1');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC2');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC3');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC4');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC5');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC6');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC7');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC8');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC9');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC10');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC11');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC12');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC13');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC14');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC15');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC16');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC17');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC18');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC19');
                      div.style.display = 'none';
                      div = document.getElementById('flotanteC20');
                      div.style.display = 'none';
                  }
        }

  function validacion() {


//----------------------------------------------------------------------------------------------------------
        num = document.getElementById("noC10_1").selectedIndex;

        if (num == '1') {
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '2') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '3') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }

        }else if (num == '4') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '5') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '6') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '7') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '8') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '9') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '10') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '11') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '12') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '13') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '14') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //14
          proceso = document.getElementById("proceso1_14").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_14").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_14").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_14").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_14").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_14").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_14").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '15') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //14
          proceso = document.getElementById("proceso1_14").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_14").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_14").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_14").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_14").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_14").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_14").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //15
          proceso = document.getElementById("proceso1_15").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_15").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_15").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_15").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_15").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_15").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_15").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '16') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //14
          proceso = document.getElementById("proceso1_14").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_14").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_14").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_14").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_14").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_14").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_14").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //15
          proceso = document.getElementById("proceso1_15").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_15").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_15").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_15").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_15").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_15").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_15").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //16
          proceso = document.getElementById("proceso1_16").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_16").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_16").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_16").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_16").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_16").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_16").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '17') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //14
          proceso = document.getElementById("proceso1_14").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_14").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_14").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_14").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_14").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_14").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_14").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //15
          proceso = document.getElementById("proceso1_15").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_15").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_15").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_15").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_15").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_15").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_15").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //16
          proceso = document.getElementById("proceso1_16").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_16").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_16").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_16").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_16").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_16").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_16").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //17
          proceso = document.getElementById("proceso1_17").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_17").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_17").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_17").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_17").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_17").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_17").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '18') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //14
          proceso = document.getElementById("proceso1_14").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_14").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_14").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_14").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_14").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_14").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_14").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //15
          proceso = document.getElementById("proceso1_15").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_15").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_15").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_15").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_15").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_15").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_15").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //16
          proceso = document.getElementById("proceso1_16").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_16").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_16").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_16").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_16").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_16").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_16").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //17
          proceso = document.getElementById("proceso1_17").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_17").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_17").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_17").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_17").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_17").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_17").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //18
          proceso = document.getElementById("proceso1_18").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_18").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_18").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_18").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_18").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_18").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_18").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_18").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '19') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //14
          proceso = document.getElementById("proceso1_14").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_14").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_14").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_14").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_14").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_14").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_14").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //15
          proceso = document.getElementById("proceso1_15").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_15").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_15").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_15").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_15").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_15").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_15").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //16
          proceso = document.getElementById("proceso1_16").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_16").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_16").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_16").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_16").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_16").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_16").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //17
          proceso = document.getElementById("proceso1_17").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_17").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_17").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_17").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_17").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_17").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_17").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //18
          proceso = document.getElementById("proceso1_18").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_18").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_18").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_18").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_18").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_18").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_18").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_18").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //19
          proceso = document.getElementById("proceso1_19").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_19").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_19").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_19").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_19").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_19").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_19").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_19").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
        }else if (num == '19') {
          //1
          producto = document.getElementById("pod1_1").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_1").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_1").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_1").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_1").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_1").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_1").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_1").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_1").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //2
          producto = document.getElementById("pod1_2").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_2").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_2").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_2").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_2").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_2").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_2").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_2").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_2").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //3
          producto = document.getElementById("pod1_3").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_3").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_3").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_3").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_3").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_3").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_3").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_3").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_3").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //4
          producto = document.getElementById("pod1_4").selectedIndex;
          if( producto == null || producto == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PRODUCTO');
            return false;
          }
          proceso = document.getElementById("proceso1_4").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_4").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_4").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_4").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_4").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_4").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_4").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_4").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //5
          proceso = document.getElementById("proceso1_5").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_5").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_5").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_5").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_5").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_5").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_5").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_5").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //6
          proceso = document.getElementById("proceso1_6").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_6").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_6").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_6").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_6").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_6").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_6").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_6").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //7
          proceso = document.getElementById("proceso1_7").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_7").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_7").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_7").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_7").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_7").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_7").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_7").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //8
          proceso = document.getElementById("proceso1_8").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_8").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_8").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_8").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_8").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_8").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_8").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_8").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //9
          proceso = document.getElementById("proceso1_9").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_9").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_9").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_9").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_9").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_9").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_9").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_9").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //10
          proceso = document.getElementById("proceso1_10").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_10").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_10").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_10").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_10").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_10").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_10").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //11
          proceso = document.getElementById("proceso1_11").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_11").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_10").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_11").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_11").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_11").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_11").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_11").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //12
          proceso = document.getElementById("proceso1_12").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_12").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_12").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_12").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_12").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_12").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_12").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_12").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //13
          proceso = document.getElementById("proceso1_13").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_13").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_13").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_13").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_13").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_13").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_13").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_13").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //14
          proceso = document.getElementById("proceso1_14").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_14").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_14").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_14").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_14").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_14").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_14").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_14").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //15
          proceso = document.getElementById("proceso1_15").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_15").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_15").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_15").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_15").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_15").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_15").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_15").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //16
          proceso = document.getElementById("proceso1_16").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_16").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_16").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_16").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_16").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_16").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_16").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_16").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //17
          proceso = document.getElementById("proceso1_17").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_17").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_17").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_17").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_17").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_17").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_17").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_17").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //18
          proceso = document.getElementById("proceso1_18").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_18").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_18").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_18").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_18").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_18").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_18").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_18").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //19
          proceso = document.getElementById("proceso1_19").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_19").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_19").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_19").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_19").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_19").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_19").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_19").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }
          //20
          proceso = document.getElementById("proceso1_20").selectedIndex;
          if( proceso == null || proceso == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: PROCESO');
            return false;
          }
          responsable = document.getElementById("Res1_20").selectedIndex;
          if( responsable == null || responsable == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: RESPONSABLE');
            return false;
          }
          clas = document.getElementById("clas1_20").selectedIndex;
          if( clas == null || clas == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: CLASIFICACIÓN DE CARACTERÍSTICAS ESPECIALES');
            return false;
          }
          espe = document.getElementById("especificacionPLG1_20").value;
          if( espe == null || espe.length == 0 || /^\s+$/.test(espe) ) {
              alert('FAVOR DE LLENAR EL CAMPO: ESPECIFICACIÓN PLG. / TOLERANCIA PRODUCTO/PROCESO');
            return false;
          }
          evaluacion = document.getElementById("evaluacion1_20").selectedIndex;
          if( evaluacion == null || evaluacion == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: EVALUACIÓN/MÉTODO DE MEDICIÓN');
            return false;
          }
          tamaño = document.getElementById("tamaño1_20").value;
          if( tamaño == null || tamaño.length == 0 || /^\s+$/.test(tamaño) ) {
              alert('FAVOR DE LLENAR EL CAMPO: TAMAÑO');
            return false;
          }
          frecuencia = document.getElementById("fre1_20").selectedIndex;
          if( frecuencia == null || frecuencia == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: FRECUENCIA');
            return false;
          }
          metodo = document.getElementById("metodoC1_20").selectedIndex;
          if( metodo == null || metodo == 0 ) {
            alert('FAVOR DE LLENAR EL CAMPO: MÉTODO DE CONTROL');
            return false;
          }

        }

      }

    </script>
  </head>
  <body>
  </body>
</html>
