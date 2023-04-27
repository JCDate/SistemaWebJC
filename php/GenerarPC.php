
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

  $query = "SELECT componente_CA FROM consumoyantecedentes WHERE componente_CA='$componente'";
  $result = $conexion -> query($query);

  $query2 = "SELECT inventario.num_calibre FROM estructura, inventario WHERE estructura.componente='$componente' AND estructura.calibre= inventario.calibre";
  $result2 = $conexion -> query($query2);
  $fila2 = $result2  -> fetch_assoc();

  $query3 = "SELECT antecedentesfamilia.familia FROM antecedentesfamilia WHERE antecedentesfamilia.familia LIKE '%FAM. 3%' AND  componente='$componente'";
  $result3 = $conexion -> query($query3);
  $fila3 = $result3  -> fetch_assoc();
  ?>

  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>PLAN DE CONTROL</title>
      <link rel="shortcut icon" href="/produccion/img/icono.png">
    </head>
    <body bgcolor="#AED6F1">
        <form method='post'action="GenerarPC0010.php" onsubmit="return validacion()">
        <h1 align='center'>PLAN DE CONTROL</h1><br>
          <div>
            <table border="1" align='center' bgcolor='#85929E'>
              <tr>
                <td bgcolor='#7CADD6' colspan='2' align='center'><label>COMPONENTE: </label>
                      <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#7CADD6;  border-color:#7CADD6; border-style:solid; font-size: 17pt; width : 100px">
                      <br>
                </td>
              </tr>
              <tr>
                <td bgcolor='#64B5F6' align='center' colspan='2'><br><label>FECHA DE EMISIÓN:</label>
                  <input type="date" name="fechaEm" id="fechaEm" value="fechaEm"><br><br>
                </td>
              </tr>
              <tr>
                <td bgcolor='#64B5F6'><br><label>NIVEL REV.:</label>
                      <select  class="nivR" name="nivR" id="nivR">
                        <option value="">---</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
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
                      </select><br><br>
                </td>
                <td  bgcolor='#64B5F6'><br><label>FECHA DE REVISIÓN:</label>
                  <input type="date" name="fechaRev" id="fechaRev" value="fechaRev"><br><br>
                </td>
              </tr>
              <tr>
                <td colspan='2'></td>
              </tr>
              <tr>
                <td bgcolor='#5DADE2' colspan='2' align='center'><var><b><label>NÚMERO DE PARTE DEL CLIENTE/ÚLTIMO NIVEL DE CAMBIO</label></b></var></td>
              </tr>
              <tr>
                <td bgcolor='#AED6F1'><br><label>NIVEL:</label>
                    <input type="text" name="nivC" id="nivC" style="width : 30px" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br>
                </td>
                <td bgcolor='#AED6F1'><br><label>FECHA:</label>
                    <input type="date" name="fechaC" id="fechaC" value="fechaC" ><br><br>
                </td>
              </tr>
              <tr>
                <td colspan='2'></td>
              </tr>
              <tr>
                <td bgcolor='#5DADE2' colspan='2' align='center'><var><b><label>NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO</label></b></var></td>
              </tr>
              <tr>
                <td bgcolor='#AED6F1'><br><label>NIVEL:</label>
                      <select  class="nivJC" name="nivJC" id="nivJC">
                        <option value="">---</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
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
                      </select><br><br>
                </td>
                <td bgcolor='#AED6F1'><br><label>FECHA:</label>
                    <input type="date" name="fechaJC" id="fechaJC" value="fechaJC"><br><br>
                </td>
              </tr>
              <tr>
                <td bgcolor='#5DADE2' colspan='2' align='center'><b>CAMBIO</b></td>
              </tr>
              <tr>
                <td bgcolor='#AED6F1' colspan='2' align='center'><br><label>NIVEL:</label>
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
                <td bgcolor='#5DADE2' colspan='2' align='center'><b>PROCESOS</b>
                </td>
              </tr>
              <tr>
                <td bgcolor='#AED6F1' colspan='2' align='center'><br><label>TOTAL DE NÚM. PARTES/ PROCESOS</label>
                      <select  class="totalPro" name="totalPro" id="totalPro">
                        <option value="">-----</option>
                        <option value="0010">0010</option>
                        <option value="0020">0020</option>
                        <option value="0030">0030</option>
                        <option value="0040">0040</option>
                        <option value="0050">0050</option>
                        <option value="0060">0060</option>
                        <option value="0070">0070</option>
                        <option value="0080">0080</option>
                        <option value="0090">0090</option>
                        <option value="0100">0100</option>
                        <option value="0110">0110</option>
                        <option value="0120">0120</option>
                        <option value="0130">0130</option>
                        <option value="0140">0140</option>
                        <option value="0150">0150</option>
                        <option value="0160">0160</option>
                        <option value="0170">0170</option>
                        <option value="0180">0180</option>
                        <option value="0190">0190</option>
                        <option value="0200">0200</option>
                      </select><br><br>
                </td>
              </tr>
            </table>
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
                  color: #DA0E0B;
                  background-color: #3498DB;
                  border-radius: 15px;
                  border: 3px double #DA0E0B;
                }
                .boton_2:hover{
                  opacity: 0.6;
                  text-decoration: none;
                }
              </style>
              <br>
              <div align='center'>
                <a class="boton_2" name="boton_2" href="/produccion/ComponentesPCInt.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
                <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>SIGUIENTE</button>
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
              }else{
                nivCambio = document.getElementById("nivCambio").selectedIndex;
                if( nivCambio == null || nivCambio == 0 ) {
                  alert('FAVOR DE SELECCIONAR NIVEL DE CAMBIO');
                  return false;
                }
              }
          }
      </script>
  </head>
  <body>
  </body>
</html>
