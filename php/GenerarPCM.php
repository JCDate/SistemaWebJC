
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

  $query = "SELECT * FROM iniciopc WHERE componente='$componente'";
  $result = $conexion -> query($query);

  $queryC = "SELECT * FROM cambiopc WHERE componente='$componente'";
  $resultC = $conexion -> query($queryC);

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
        <form method='post' onsubmit="return validacion()">

        <h1 align='center'>PLAN DE CONTROL</h1><br>
          <div>
          <?php  while ($fila = $result  -> fetch_assoc()){ ?>
            <table bgcolor='#85929E' border="1" align='center'>
              <tr>
                <td bgcolor='#7CADD6' colspan='2'><h2 align='center'> <label>COMPONENTE: </label>
                  <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#7CADD6;  border-color:#7CADD6; border-style:solid; font-size: 17pt; width : 100px">
                </h2>
                </td>
              </tr>
              <tr>
                <td  colspan='2'>Nota: Solo se pueden modificar los campos que tienen asterisco (*) <br><br></td>
              </tr>
              <tr>
                <td bgcolor='#64B5F6'><label>NIVEL REV.:</label>
                    <input type="text" name="nivelRev" id="nivelRev" value="<?php echo $fila['nivelRev'] ?>" style="width : 30px">*
                </td>
                <td bgcolor='#64B5F6'><label>FECHA DE REVISIÓN:</label>
                    <input type="text" name="fechaRev" id="fechaRev" value="<?php echo $fila['fechaRev'] ?>" >*
                </td>
              </tr>
              <tr>
                <td bgcolor='#5DADE2' colspan='2' align='center'><br><var><label>NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO</label></var><br><br></td>
              </tr>
              <tr>
                <td bgcolor='#AED6F1'><label>NIVEL:</label>
                    <input type="text" name="nivelParJC" id="nivelParJC" value="<?php echo $fila['nivelParJC'] ?>" style="width : 30px" >*
                </td>
                <td bgcolor='#AED6F1'><label>FECHA:</label>
                    <input type="text" name="fechaeParJC" id="fechaeParJC" value="<?php echo $fila['fechaeParJC'] ?>">*
                </td>
              </tr>
              <tr>
                <td colspan='2'></td>
              </tr>
              <tr>
                <td bgcolor='#5DADE2' colspan='2' align='center'><br><b>CAMBIOS</b><br><br></td>
              </tr>
        <?php while ($filaC = $resultC  -> fetch_assoc()){ ?>
              <tr>
                <td bgcolor='#64B5F6'><label>CAMBIO:</label>
                    <input type="text" id="cambM" name="cambM" value="<?php echo $filaC['cambio'] ?>" readonly>
                </td>
                <td bgcolor='#64B5F6'><label>FECHA: </label>
                    <input type="text" name="fecha1" id="fecha1" value="<?php echo $filaC['fecha'] ?>" readonly>
                </td>
              </tr>
        <?php } ?>
              <tr>
                <td bgcolor='#5DADE2' colspan='2' align='center'><h3>AGREGAR CAMBIO</h3>
                    <label>NIVEL:</label>
                    <select  class="nivCambio" name="nivCambio" id="nivCambio" onchange="javascript:mostrar();">
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
                    </select><br><br>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante" style="display:none;">
                      <div id="close"><br>
                        <label>PRIMER CAMBIO:</label>
                        <input type="text" id="camb1" name="camb1" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante1" style="display:none;">
                      <div id="close1"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha1" id="fecha1"><br><br>
                      </div>
                     </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante2" style="display:none;">
                      <div id="close2"><br>
                        <label>SEGUNDO CAMBIO:</label>
                        <input type="text" id="camb2" name="camb2" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante2_2" style="display:none;">
                      <div id="close2_2"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha2" id="fecha2"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante3" style="display:none;">
                      <div id="close3"><br>
                        <label>TERCER CAMBIO:</label>
                        <input type="text" id="camb3" name="camb3" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante3_3" style="display:none;">
                      <div id="close3_3"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha3" id="fecha3"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante4" style="display:none;">
                      <div id="close4"><br>
                        <label>CUARTO CAMBIO:</label>
                        <input type="text" id="camb4" name="camb4" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante4_4" style="display:none;">
                      <div id="close4_4"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha4" id="fecha4"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante5" style="display:none;">
                      <div id="close5"><br>
                        <label>QUINTO CAMBIO:</label>
                        <input type="text" id="camb5" name="camb5" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante5_5" style="display:none;">
                      <div id="close5_5"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha5" id="fecha5"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante6" style="display:none;">
                      <div id="close6"><br>
                        <label>SEXTO CAMBIO:</label>
                        <input type="text" id="camb6" name="camb6" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante6_6" style="display:none;">
                      <div id="close6_6"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha6" id="fecha6"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante7" style="display:none;">
                      <div id="close7"><br>
                        <label>SEPTIMO CAMBIO:</label>
                        <input type="text" id="camb7" name="camb7" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante7_7" style="display:none;">
                      <div id="close7_7"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha7" id="fecha7"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante8" style="display:none;">
                      <div id="close8"><br>
                        <label>OCTAVO CAMBIO:</label>
                        <input type="text" id="camb8" name="camb8" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante8_8" style="display:none;">
                      <div id="close8_8"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha8" id="fecha8"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante9" style="display:none;">
                      <div id="close9"><br>
                        <label>NOVENO CAMBIO:</label>
                        <input type="text" id="camb9" name="camb9" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante9_9" style="display:none;">
                      <div id="close9_9"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha9" id="fecha9"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#D6EAF8'><div id="flotante10" style="display:none;">
                      <div id="close10"><br>
                        <label>DECIMO CAMBIO:</label>
                        <input type="text" id="camb10" name="camb10" ><br><br>
                      </div>
                    </div>
                </td>
                <td bgcolor='#D6EAF8'><div id="flotante10_10" style="display:none;">
                      <div id="close10_10"><br>
                        <label>FECHA: </label>
                        <input type="date" name="fecha10" id="fecha10"><br><br>
                      </div>
                    </div>
                </td>
              </tr>
              <tr>
                <td bgcolor='#AED6F1' colspan='2' align='center'><br> <fieldset style="width:60%" align="left">
                      <legend><label>NÚM.  PARTE/ PROCESO</label></legend>
                      <?php


                      $queryT = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0010' AND componente='$componente'";
                      $resultT = $conexion -> query($queryT);

                       if($resultT -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                <?php  }
                    $queryT2 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0020' AND componente='$componente'";
                    $resultT2 = $conexion -> query($queryT2);
                        if($resultT2 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                <?php  }
                    $queryT3 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0030' AND componente='$componente'";
                    $resultT3 = $conexion -> query($queryT3);
                        if($resultT3 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                <?php  }
                    $queryT4 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0040' AND componente='$componente'";
                    $resultT4 = $conexion -> query($queryT4);
                    if($resultT4 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                <?php  }
                    $queryT5 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0050' AND componente='$componente'";
                    $resultT5 = $conexion -> query($queryT5);
                    if($resultT5 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                <?php  }
                    $queryT6 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0060' AND componente='$componente'";
                    $resultT6 = $conexion -> query($queryT6);
                    if($resultT6 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                <?php  }
                    $queryT7 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0070' AND componente='$componente'";
                    $resultT7 = $conexion -> query($queryT7);
                    if($resultT7 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                <?php  }
                    $queryT8 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0080' AND componente='$componente'";
                    $resultT8 = $conexion -> query($queryT8);
                    if($resultT8 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                <?php  }
                    $queryT9 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0090' AND componente='$componente'";
                    $resultT9 = $conexion -> query($queryT9);
                    if($resultT9 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                <?php  }
                    $queryT10 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0100' AND componente='$componente'";
                    $resultT10 = $conexion -> query($queryT10);
                    if($resultT10 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                <?php  }
                    $queryT11 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0110' AND componente='$componente'";
                    $resultT11 = $conexion -> query($queryT11);
                    if($resultT11 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                <?php  }
                    $queryT12 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0120' AND componente='$componente'";
                    $resultT12 = $conexion -> query($queryT12);
                    if($resultT12 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                <?php  }
                    $queryT13 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0130' AND componente='$componente'";
                    $resultT13 = $conexion -> query($queryT13);
                    if($resultT13 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                <?php  }
                    $queryT14 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0140' AND componente='$componente'";
                    $resultT14 = $conexion -> query($queryT14);
                    if($resultT14 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0140M.php';this.form.submit();">0140</button> &nbsp &nbsp
                <?php  }
                    $queryT15 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0150' AND componente='$componente'";
                    $resultT15 = $conexion -> query($queryT15);
                    if($resultT15 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0140M.php';this.form.submit();">0140</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0150M.php';this.form.submit();">0150</button> &nbsp &nbsp
                <?php  }
                    $queryT16 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0160' AND componente='$componente'";
                    $resultT16 = $conexion -> query($queryT16);
                    if($resultT16 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0140M.php';this.form.submit();">0140</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0150M.php';this.form.submit();">0150</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0160M.php';this.form.submit();">0160</button> <br> <br>
                <?php  }
                    $queryT17 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0170' AND componente='$componente'";
                    $resultT17 = $conexion -> query($queryT17);
                    if($resultT17 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0140M.php';this.form.submit();">0140</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0150M.php';this.form.submit();">0150</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0160M.php';this.form.submit();">0160</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0170M.php';this.form.submit();">0170</button> &nbsp &nbsp
                <?php  }
                    $queryT18 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0180' AND componente='$componente'";
                    $resultT18 = $conexion -> query($queryT18);
                    if($resultT18 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0140M.php';this.form.submit();">0140</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0150M.php';this.form.submit();">0150</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0160M.php';this.form.submit();">0160</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0170M.php';this.form.submit();">0170</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0180M.php';this.form.submit();">0180</button> &nbsp &nbsp
                <?php  }
                    $queryT19 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0190' AND componente='$componente'";
                    $resultT19 = $conexion -> query($queryT19);
                    if($resultT19 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0140M.php';this.form.submit();">0140</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0150M.php';this.form.submit();">0150</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0160M.php';this.form.submit();">0160</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0170M.php';this.form.submit();">0170</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0180M.php';this.form.submit();">0180</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0190M.php';this.form.submit();">0190</button> &nbsp &nbsp
                <?php  }
                    $queryT20 = "SELECT totalProceso FROM iniciopc WHERE totalProceso ='0200' AND componente='$componente'";
                    $resultT20 = $conexion -> query($queryT20);
                    if($resultT20 -> num_rows > 0){?>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0010M.php';this.form.submit();">0010</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0020M.php';this.form.submit();">0020</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0030M.php';this.form.submit();">0030</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0040M.php';this.form.submit();">0040</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0050M.php';this.form.submit();">0050</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0060M.php';this.form.submit();">0060</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0070M.php';this.form.submit();">0070</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0080M.php';this.form.submit();">0080</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0090M.php';this.form.submit();">0090</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0100M.php';this.form.submit();">0100</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0110M.php';this.form.submit();">0110</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0120M.php';this.form.submit();">0120</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0130M.php';this.form.submit();">0130</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0140M.php';this.form.submit();">0140</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0150M.php';this.form.submit();">0150</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0160M.php';this.form.submit();">0160</button> <br> <br>
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0170M.php';this.form.submit();">0170</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0180M.php';this.form.submit();">0180</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0190M.php';this.form.submit();">0190</button> &nbsp &nbsp
                          <button type='submit'  class='boton_3' onclick="this.form.action='GenerarPC0200M.php';this.form.submit();">0200</button> <br> <br>
                <?php  }?>

                        </fieldset><br><br>
                </td>
              </tr>
            </table>

            </div> <?//FIN DE CAMBIO?>
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
                .boton_3{
                  text-decoration: none;
                  padding: 3px;
                  padding-left: 10px;
                  padding-right: 10px;
                  font-family: helvetica;
                  font-weight: 300;
                  font-size: 18px;
                  font-style: italic;
                  color: #154360;
                  background-color: #D7DBDD;
                  border-radius: 15px;
                  border: 3px double #DA0E0B;
                }
                .boton_3:hover{
                  opacity: 0.6;
                  text-decoration: none;
                }
              </style>
              <br>
              <div align='center'>
                <a class="boton_2" name="boton_2" href="/produccion/ComponentesPCInt.php"><img src='/produccion/img/atras.png' width='20' height='20' class='zoom'/>REGRESAR</a>
                <button type='submit'  class='boton_1' onclick="this.form.action='guardarPCcambios.php';this.form.submit();"><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
              </div>
            <br><br><br>
          <?php } ?>
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
        function mostrar() {

            const selectElement = document.querySelector('.actividad');
                var res  = `${event.target.value}`;

                if(res == '1'){
                    div = document.getElementById('flotante');
                    div.style.display = '';
                    div = document.getElementById('flotante1');
                    div.style.display = '';
                    div = document.getElementById('flotante2');
                    div.style.display = 'none';
                    div = document.getElementById('flotante2_2');
                    div.style.display = 'none';
                    div = document.getElementById('flotante3');
                    div.style.display = 'none';
                    div = document.getElementById('flotante3_3');
                    div.style.display = 'none';
                    div = document.getElementById('flotante4');
                    div.style.display = 'none';
                    div = document.getElementById('flotante4_4');
                    div.style.display = 'none';
                    div = document.getElementById('flotante5');
                    div.style.display = 'none';
                    div = document.getElementById('flotante5_5');
                    div.style.display = 'none';
                    div = document.getElementById('flotante6');
                    div.style.display = 'none';
                    div = document.getElementById('flotante6_6');
                    div.style.display = 'none';
                    div = document.getElementById('flotante7');
                    div.style.display = 'none';
                    div = document.getElementById('flotante7_7');
                    div.style.display = 'none';
                    div = document.getElementById('flotante8');
                    div.style.display = 'none';
                    div = document.getElementById('flotante8_8');
                    div.style.display = 'none';
                    div = document.getElementById('flotante9');
                    div.style.display = 'none';
                    div = document.getElementById('flotante9_9');
                    div.style.display = 'none';
                    div = document.getElementById('flotante10');
                    div.style.display = 'none';
                    div = document.getElementById('flotante10_10');
                    div.style.display = 'none';
                 }else if(res == '2'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = 'none';
                     div = document.getElementById('flotante3_3');
                     div.style.display = 'none';
                     div = document.getElementById('flotante4');
                     div.style.display = 'none';
                     div = document.getElementById('flotante4_4');
                     div.style.display = 'none';
                     div = document.getElementById('flotante5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante5_5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6_6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7_7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8_8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }else if(res == '3'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = '';
                     div = document.getElementById('flotante3_3');
                     div.style.display = '';
                     div = document.getElementById('flotante4');
                     div.style.display = 'none';
                     div = document.getElementById('flotante4_4');
                     div.style.display = 'none';
                     div = document.getElementById('flotante5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante5_5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6_6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7_7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8_8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }else if(res == '4'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = '';
                     div = document.getElementById('flotante3_3');
                     div.style.display = '';
                     div = document.getElementById('flotante4');
                     div.style.display = '';
                     div = document.getElementById('flotante4_4');
                     div.style.display = '';
                     div = document.getElementById('flotante5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante5_5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6_6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7_7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8_8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }else if(res == '5'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = '';
                     div = document.getElementById('flotante3_3');
                     div.style.display = '';
                     div = document.getElementById('flotante4');
                     div.style.display = '';
                     div = document.getElementById('flotante4_4');
                     div.style.display = '';
                     div = document.getElementById('flotante5');
                     div.style.display = '';
                     div = document.getElementById('flotante5_5');
                     div.style.display = '';
                     div = document.getElementById('flotante6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6_6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7_7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8_8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }else if(res == '6'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = '';
                     div = document.getElementById('flotante3_3');
                     div.style.display = '';
                     div = document.getElementById('flotante4');
                     div.style.display = '';
                     div = document.getElementById('flotante4_4');
                     div.style.display = '';
                     div = document.getElementById('flotante5');
                     div.style.display = '';
                     div = document.getElementById('flotante5_5');
                     div.style.display = '';
                     div = document.getElementById('flotante6');
                     div.style.display = '';
                     div = document.getElementById('flotante6_6');
                     div.style.display = '';
                     div = document.getElementById('flotante7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7_7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8_8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }else if(res == '7'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = '';
                     div = document.getElementById('flotante3_3');
                     div.style.display = '';
                     div = document.getElementById('flotante4');
                     div.style.display = '';
                     div = document.getElementById('flotante4_4');
                     div.style.display = '';
                     div = document.getElementById('flotante5');
                     div.style.display = '';
                     div = document.getElementById('flotante5_5');
                     div.style.display = '';
                     div = document.getElementById('flotante6');
                     div.style.display = '';
                     div = document.getElementById('flotante6_6');
                     div.style.display = '';
                     div = document.getElementById('flotante7');
                     div.style.display = '';
                     div = document.getElementById('flotante7_7');
                     div.style.display = '';
                     div = document.getElementById('flotante8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8_8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }else if(res == '8'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = '';
                     div = document.getElementById('flotante3_3');
                     div.style.display = '';
                     div = document.getElementById('flotante4');
                     div.style.display = '';
                     div = document.getElementById('flotante4_4');
                     div.style.display = '';
                     div = document.getElementById('flotante5');
                     div.style.display = '';
                     div = document.getElementById('flotante5_5');
                     div.style.display = '';
                     div = document.getElementById('flotante6');
                     div.style.display = '';
                     div = document.getElementById('flotante6_6');
                     div.style.display = '';
                     div = document.getElementById('flotante7');
                     div.style.display = '';
                     div = document.getElementById('flotante7_7');
                     div.style.display = '';
                     div = document.getElementById('flotante8');
                     div.style.display = '';
                     div = document.getElementById('flotante8_8');
                     div.style.display = '';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }else if(res == '9'){
                   div = document.getElementById('flotante');
                   div.style.display = '';
                   div = document.getElementById('flotante1');
                   div.style.display = '';
                   div = document.getElementById('flotante2');
                   div.style.display = '';
                   div = document.getElementById('flotante2_2');
                   div.style.display = '';
                   div = document.getElementById('flotante3');
                   div.style.display = '';
                   div = document.getElementById('flotante3_3');
                   div.style.display = '';
                   div = document.getElementById('flotante4');
                   div.style.display = '';
                   div = document.getElementById('flotante4_4');
                   div.style.display = '';
                   div = document.getElementById('flotante5');
                   div.style.display = '';
                   div = document.getElementById('flotante5_5');
                   div.style.display = '';
                   div = document.getElementById('flotante6');
                   div.style.display = '';
                   div = document.getElementById('flotante6_6');
                   div.style.display = '';
                   div = document.getElementById('flotante7');
                   div.style.display = '';
                   div = document.getElementById('flotante7_7');
                   div.style.display = '';
                   div = document.getElementById('flotante8');
                   div.style.display = '';
                   div = document.getElementById('flotante8_8');
                   div.style.display = '';
                   div = document.getElementById('flotante9');
                   div.style.display = '';
                   div = document.getElementById('flotante9_9');
                   div.style.display = '';
                   div = document.getElementById('flotante10');
                   div.style.display = 'none';
                   div = document.getElementById('flotante10_10');
                   div.style.display = 'none';
                 }else if(res == '10'){
                     div = document.getElementById('flotante');
                     div.style.display = '';
                     div = document.getElementById('flotante1');
                     div.style.display = '';
                     div = document.getElementById('flotante2');
                     div.style.display = '';
                     div = document.getElementById('flotante2_2');
                     div.style.display = '';
                     div = document.getElementById('flotante3');
                     div.style.display = '';
                     div = document.getElementById('flotante3_3');
                     div.style.display = '';
                     div = document.getElementById('flotante4');
                     div.style.display = '';
                     div = document.getElementById('flotante4_4');
                     div.style.display = '';
                     div = document.getElementById('flotante5');
                     div.style.display = '';
                     div = document.getElementById('flotante5_5');
                     div.style.display = '';
                     div = document.getElementById('flotante6');
                     div.style.display = '';
                     div = document.getElementById('flotante6_6');
                     div.style.display = '';
                     div = document.getElementById('flotante7');
                     div.style.display = '';
                     div = document.getElementById('flotante7_7');
                     div.style.display = '';
                     div = document.getElementById('flotante8');
                     div.style.display = '';
                     div = document.getElementById('flotante8_8');
                     div.style.display = '';
                     div = document.getElementById('flotante9');
                     div.style.display = '';
                     div = document.getElementById('flotante9_9');
                     div.style.display = '';
                     div = document.getElementById('flotante10');
                     div.style.display = '';
                     div = document.getElementById('flotante10_10');
                     div.style.display = '';
                 }else {
                     div = document.getElementById('flotante');
                     div.style.display = 'none';
                     div = document.getElementById('flotante1');
                     div.style.display = 'none';
                     div = document.getElementById('flotante2');
                     div.style.display = 'none';
                     div = document.getElementById('flotante2_2');
                     div.style.display = 'none';
                     div = document.getElementById('flotante3');
                     div.style.display = 'none';
                     div = document.getElementById('flotante3_3');
                     div.style.display = 'none';
                     div = document.getElementById('flotante4');
                     div.style.display = 'none';
                     div = document.getElementById('flotante4_4');
                     div.style.display = 'none';
                     div = document.getElementById('flotante5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante5_5');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante6_6');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante7_7');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante8_8');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante9_9');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10');
                     div.style.display = 'none';
                     div = document.getElementById('flotante10_10');
                     div.style.display = 'none';
                 }
        }

        function validacion() {

      //-------------------------------------------------------------------------------------------------------
              fechaEm = document.getElementById("fechaEm").value;
              if( fechaEm == null || fechaEm.length == 0 || /^\s+$/.test(fechaEm) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: FECHA DE EMISIÓN');
                return false;
              }
      //----------------------------------------------------------------------------------------------------------
              nivR = document.getElementById("nivR").selectedIndex;
              if( nivR == null || nivR == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: NIVEL DE REVISIÓN');
                return false;
              }
      //----------------------------------------------------------------------------------------------------------
              fechaRev = document.getElementById("fechaRev").value;
              if( fechaRev == null || fechaRev.length == 0 || /^\s+$/.test(fechaRev) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: FECHA DE REVISIÓN');
                return false;
              }
      //----------------------------------------------------------------------------------------------------------

              nivC = document.getElementById("nivC").value;
              if( nivC == null || nivC.length == 0 || /^\s+$/.test(nivC) ) {
                  alert('FAVOR DE LLENAR EL CAMPO: NIVEL DE NÚMERO DE PARTE DEL CLIENTE/ÚLTIMO NIVEL DE CAMBIO');
                return false;
              }
      //----------------------------------------------------------------------------------------------------------
            fechaC = document.getElementById("fechaC").value;
            if( fechaC == null || fechaC.length == 0 || /^\s+$/.test(fechaC) ) {
                alert('FAVOR DE LLENAR EL CAMPO: FECHA DE NÚMERO DE PARTE DEL CLIENTE/ÚLTIMO NIVEL DE CAMBIO');
              return false;
            }
      //----------------------------------------------------------------------------------------------------------

              nivJC = document.getElementById("nivJC").selectedIndex;
              if( nivJC == null || nivJC == 0 ) {
                alert('FAVOR DE LLENAR EL CAMPO: NIVEL DE NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO');
                return false;
              }
    //----------------------------------------------------------------------------------------------------------
          fechaJC = document.getElementById("fechaJC").value;
          if( fechaJC == null || fechaJC.length == 0 || /^\s+$/.test(fechaJC) ) {
              alert('FAVOR DE LLENAR EL CAMPO: FECHA DE NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO');
            return false;
          }
    //----------------------------------------------------------------------------------------------------------
              num = document.getElementById("nivCambio").selectedIndex;

              if (num == '1') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '2') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '3') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '4') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb4 = document.getElementById("camb4").value;
                if( camb4 == null || camb4.length == 0 || /^\s+$/.test(camb4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha4 = document.getElementById("fecha4").value;
                if( fecha4 == null || fecha4.length == 0 || /^\s+$/.test(fecha4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '5') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb4 = document.getElementById("camb4").value;
                if( camb4 == null || camb4.length == 0 || /^\s+$/.test(camb4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha4 = document.getElementById("fecha4").value;
                if( fecha4 == null || fecha4.length == 0 || /^\s+$/.test(fecha4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb5 = document.getElementById("camb5").value;
                if( camb5 == null || camb5.length == 0 || /^\s+$/.test(camb5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha5 = document.getElementById("fecha5").value;
                if( fecha5 == null || fecha5.length == 0 || /^\s+$/.test(fecha5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '6') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb4 = document.getElementById("camb4").value;
                if( camb4 == null || camb4.length == 0 || /^\s+$/.test(camb4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha4 = document.getElementById("fecha4").value;
                if( fecha4 == null || fecha4.length == 0 || /^\s+$/.test(fecha4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb5 = document.getElementById("camb5").value;
                if( camb5 == null || camb5.length == 0 || /^\s+$/.test(camb5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha5 = document.getElementById("fecha5").value;
                if( fecha5 == null || fecha5.length == 0 || /^\s+$/.test(fecha5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb6 = document.getElementById("camb6").value;
                if( camb6 == null || camb6.length == 0 || /^\s+$/.test(camb6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha6 = document.getElementById("fecha6").value;
                if( fecha6 == null || fecha6.length == 0 || /^\s+$/.test(fecha6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '7') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb4 = document.getElementById("camb4").value;
                if( camb4 == null || camb4.length == 0 || /^\s+$/.test(camb4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha4 = document.getElementById("fecha4").value;
                if( fecha4 == null || fecha4.length == 0 || /^\s+$/.test(fecha4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb5 = document.getElementById("camb5").value;
                if( camb5 == null || camb5.length == 0 || /^\s+$/.test(camb5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha5 = document.getElementById("fecha5").value;
                if( fecha5 == null || fecha5.length == 0 || /^\s+$/.test(fecha5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb6 = document.getElementById("camb6").value;
                if( camb6 == null || camb6.length == 0 || /^\s+$/.test(camb6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha6 = document.getElementById("fecha6").value;
                if( fecha6 == null || fecha6.length == 0 || /^\s+$/.test(fecha6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb7 = document.getElementById("camb7").value;
                if( camb7 == null || camb7.length == 0 || /^\s+$/.test(camb7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha7 = document.getElementById("fecha7").value;
                if( fecha7 == null || fecha7.length == 0 || /^\s+$/.test(fecha7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '8') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb4 = document.getElementById("camb4").value;
                if( camb4 == null || camb4.length == 0 || /^\s+$/.test(camb4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha4 = document.getElementById("fecha4").value;
                if( fecha4 == null || fecha4.length == 0 || /^\s+$/.test(fecha4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb5 = document.getElementById("camb5").value;
                if( camb5 == null || camb5.length == 0 || /^\s+$/.test(camb5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha5 = document.getElementById("fecha5").value;
                if( fecha5 == null || fecha5.length == 0 || /^\s+$/.test(fecha5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb6 = document.getElementById("camb6").value;
                if( camb6 == null || camb6.length == 0 || /^\s+$/.test(camb6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha6 = document.getElementById("fecha6").value;
                if( fecha6 == null || fecha6.length == 0 || /^\s+$/.test(fecha6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb7 = document.getElementById("camb7").value;
                if( camb7 == null || camb7.length == 0 || /^\s+$/.test(camb7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha7 = document.getElementById("fecha7").value;
                if( fecha7 == null || fecha7.length == 0 || /^\s+$/.test(fecha7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb8 = document.getElementById("camb8").value;
                if( camb8 == null || camb8.length == 0 || /^\s+$/.test(camb8) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha8 = document.getElementById("fecha8").value;
                if( fecha8 == null || fecha8.length == 0 || /^\s+$/.test(fecha8) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '9') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb4 = document.getElementById("camb4").value;
                if( camb4 == null || camb4.length == 0 || /^\s+$/.test(camb4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha4 = document.getElementById("fecha4").value;
                if( fecha4 == null || fecha4.length == 0 || /^\s+$/.test(fecha4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb5 = document.getElementById("camb5").value;
                if( camb5 == null || camb5.length == 0 || /^\s+$/.test(camb5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha5 = document.getElementById("fecha5").value;
                if( fecha5 == null || fecha5.length == 0 || /^\s+$/.test(fecha5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb6 = document.getElementById("camb6").value;
                if( camb6 == null || camb6.length == 0 || /^\s+$/.test(camb6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha6 = document.getElementById("fecha6").value;
                if( fecha6 == null || fecha6.length == 0 || /^\s+$/.test(fecha6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb7 = document.getElementById("camb7").value;
                if( camb7 == null || camb7.length == 0 || /^\s+$/.test(camb7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha7 = document.getElementById("fecha7").value;
                if( fecha7 == null || fecha7.length == 0 || /^\s+$/.test(fecha7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb8 = document.getElementById("camb8").value;
                if( camb8 == null || camb8.length == 0 || /^\s+$/.test(camb8) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha8 = document.getElementById("fecha8").value;
                if( fecha8 == null || fecha8.length == 0 || /^\s+$/.test(fecha8) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb9 = document.getElementById("camb9").value;
                if( camb9 == null || camb9.length == 0 || /^\s+$/.test(camb9) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha9 = document.getElementById("fecha9").value;
                if( fecha9 == null || fecha9.length == 0 || /^\s+$/.test(fecha9) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }else if (num == '9') {
                camb1 = document.getElementById("camb1").value;
                if( camb1 == null || camb1.length == 0 || /^\s+$/.test(camb1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha1 = document.getElementById("fecha1").value;
                if( fecha1 == null || fecha1.length == 0 || /^\s+$/.test(fecha1) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb2 = document.getElementById("camb2").value;
                if( camb2 == null || camb2.length == 0 || /^\s+$/.test(camb2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha2 = document.getElementById("fecha2").value;
                if( fecha2 == null || fecha2.length == 0 || /^\s+$/.test(fecha2) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb3 = document.getElementById("camb3").value;
                if( camb3 == null || camb3.length == 0 || /^\s+$/.test(camb3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha3 = document.getElementById("fecha3").value;
                if( fecha3 == null || fecha3.length == 0 || /^\s+$/.test(fecha3) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb4 = document.getElementById("camb4").value;
                if( camb4 == null || camb4.length == 0 || /^\s+$/.test(camb4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha4 = document.getElementById("fecha4").value;
                if( fecha4 == null || fecha4.length == 0 || /^\s+$/.test(fecha4) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb5 = document.getElementById("camb5").value;
                if( camb5 == null || camb5.length == 0 || /^\s+$/.test(camb5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha5 = document.getElementById("fecha5").value;
                if( fecha5 == null || fecha5.length == 0 || /^\s+$/.test(fecha5) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb6 = document.getElementById("camb6").value;
                if( camb6 == null || camb6.length == 0 || /^\s+$/.test(camb6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha6 = document.getElementById("fecha6").value;
                if( fecha6 == null || fecha6.length == 0 || /^\s+$/.test(fecha6) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb7 = document.getElementById("camb7").value;
                if( camb7 == null || camb7.length == 0 || /^\s+$/.test(camb7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha7 = document.getElementById("fecha7").value;
                if( fecha7 == null || fecha7.length == 0 || /^\s+$/.test(fecha7) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb8 = document.getElementById("camb8").value;
                if( camb8 == null || camb8.length == 0 || /^\s+$/.test(camb8) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha8 = document.getElementById("fecha8").value;
                if( fecha8 == null || fecha8.length == 0 || /^\s+$/.test(fecha8) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb9 = document.getElementById("camb9").value;
                if( camb9 == null || camb9.length == 0 || /^\s+$/.test(camb9) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha9 = document.getElementById("fecha9").value;
                if( fecha9 == null || fecha9.length == 0 || /^\s+$/.test(fecha9) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
                camb10 = document.getElementById("camb10").value;
                if( camb10 == null || camb10.length == 0 || /^\s+$/.test(camb10) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: CAMBIO');
                  return false;
                }
                fecha10 = document.getElementById("fecha10").value;
                if( fecha10 == null || fecha10.length == 0 || /^\s+$/.test(fecha10) ) {
                    alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                  return false;
                }
              }
          }
      </script>
  </head>
  <body>
  </body>
</html>
