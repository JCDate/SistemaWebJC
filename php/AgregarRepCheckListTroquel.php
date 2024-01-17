<?php
  header("Content-Type: text/html;charset=utf-8");
  $salida = "";
  if (!($conexion = mysqli_connect("localhost", "root", "" )))
  {
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db( $conexion, "jc_mysql")))
  {
    echo "Error seleccionando la base de datos.";
    exit();
  }
  mysqli_set_charset($conexion,"UTF8");


$componente = $_POST['componente'];
$troquel = $_POST['troquel'];
$NoOperacion = $_POST['NoOperacion'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>REPORTE CHECK LIST TROQUEL</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body bgcolor='#AED6F1'>
    <style type="text/css">
    img.izquierda {
      float: left;
    }

    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='125' height='125' />

    <div align='center'><br><br>
      <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">Agregar Reporte Check List de Troquel</font>
    </div>

    <form method='post'action="/produccion/guardarReporte.php">

      <table border="1" overflow='scroll' height='100%' width='100%' bordercolor='black'>
        <tr>
          <th bgcolor='#5979FF' colspan='4'><h2><label>COMPONENTE: </label>
            <input type="text" name="componente" id="componente" value="<?php echo $componente ?> " readonly style="background-color:#5979FF;  border-color:#5979FF; border-style:solid; font-size: 18pt; width : 200px"></h2>
          </th>
        </tr>
        <tr>
          <td bgcolor='#6684FE' colspan='2' align='center'><h3><label>Troquel:</label>
            <input type="text" name="troquel" id="troquel" value="<?php echo $troquel; ?>" readonly style="background-color:#6684FE;  border-color:#6684FE; border-style:solid; font-size: 14pt; width : 200px"><h3>
          </td>
          <td bgcolor='#6684FE' colspan='2' align='center'><h3><label>No. Operación:</label>
            <input type="text" name="NoOperacion" id="NoOperacion" value="<?php echo $NoOperacion; ?>" readonly style="background-color:#6684FE;  border-color:#6684FE; border-style:solid; font-size: 14pt; width : 50px"><h3>
          </td>
        </tr>
        <tr>
          <td bgcolor='#708CFE' colspan='2' align='center'><h3><label>Elabora:</label>
            <input type="text" name="elabora" id="elabora" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 14pt; width : 300px"></h3>
          </td>
          <td bgcolor='#708CFE' colspan='2' align='center'><h3><label>Fecha:</label>
            <input type="datetime" name="fecha"  value="<?php echo date("d/m/Y");?>" style="font-size: 14pt; width : 100px"></h3>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7691FE' align='center'><h3><label>ÁREA</label></h3></td>
          <td bgcolor='#7691FE' align='center'><h3><label>LISTADO DE PUNTOS A VERIFICAR</label></h3></td>
          <td bgcolor='#7691FE' align='center'><h3><label>CUMPLE</label></h3></td>
          <td bgcolor='#7691FE' align='center'><h3><label>OBSERVACIONES</label></h3></td>
        </tr>
        <tr>
          <td bgcolor='#7691FE' rowspan='2' align='center'>PIEZAS DE CORTE</td>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Se encuentra el macho superior e inferior con el filo adecuado y los radios formados?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple1" id="cumple1" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
          <td bgcolor='#7FBBE3' rowspan='2'><textarea name="comentario1" rows="3" cols="30" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 12pt;"></textarea></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font SIZE="4">¿La rueda cortadora realiza el corte correctamente?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple2" id="cumple2" style="font-size: 12pt;">
                  <option value="">---</option>
                  <option value="Si">SI</option>
                  <option value="No">NO</option>
                  <option value="N/A">N/A</option>
                </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7691FE' rowspan='3' align='center'>BOTADORES</td>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Se encuentran todos los botadores completos?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple3" id="cumple3" style="font-size: 12pt;">
              <option value="">---</option>
              <option value="Si">SI</option>
              <option value="No">NO</option>
              <option value="N/A">N/A</option>
            </select>
          </td>
          <td bgcolor='#7FBBE3' rowspan='3'>  <label><textarea name="comentario2" rows="3" cols="30" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 12pt;"></textarea></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Los botadores muestran torceduras, chuecos o disparejos?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple4" id="cumple4" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Los botadores muestran dimensiones (largo) diferente a los requeridos?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple5" id="cumple5" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7691FE' rowspan='3' align='center'>TORNILLERIA</td>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Cuenta con todos los tornillos de sujeción de las matrices?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple6" id="cumple6" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
          <td bgcolor='#7FBBE3' rowspan='3'><textarea name="comentario3" rows="3" cols="30" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 12pt;"></textarea></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿La cuerda se encuentra en buen estado?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple7" id="cumple7" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿La cabeza del tornillo se encuentra en buen estado (por ejemplo; barridos)?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple8" id="cumple8" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7691FE' rowspan='3' align='center'>PIEZAS DE EMBUTIDO</td>
          <td bgcolor='#7FBBE3'><label><font SIZE="4">¿El radio de embutido de la campana se encuentra bien formado y en condiciones para trabajar?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple9" id="cumple9" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
          <td bgcolor='#7FBBE3' rowspan='3'><textarea name="comentario4" rows="3" cols="30" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 12pt;"></textarea></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font SIZE="4">¿Las piezas de embutido presentan ralladuras?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple10" id="cumple10" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿El macho inferior no presenta desprendimiento de cuerdas de sujeción?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple11" id="cumple11" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7691FE' rowspan='7' align='center'>PORTA TROQUEL</td>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿El portatroquel se encuentra en buenas condiciones de pintura?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple12" id="cumple12" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
          <td bgcolor='#7FBBE3' rowspan='7'><textarea name="comentario5" rows="3" cols="30" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 12pt;"></textarea></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Se encuentra señalado adecuadamente la ubicación?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple13" id="cumple13" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿El número del portatroquel se encuentra visible?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple14" id="cumple14" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Las guías se encuentran en buen estado?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple15" id="cumple15" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿La placa se encuentra en condiciones para trabajar?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple16" id="cumple16" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿La limpieza del portatroquel es el adecuado?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple17" id="cumple17" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Se encuentra correctamente lubricado?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple18" id="cumple18" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7691FE' rowspan='3' align='center'>CENTRADOR DE ESTAMPAS</td>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Tornillería completa?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple19" id="cumple19" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
          <td bgcolor='#7FBBE3' rowspan='3'><textarea name="comentario6" rows="3" cols="30" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 12pt;"></textarea></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Resortes completos?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple20" id="cumple20" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Placa sin grieta o fracturada?</font></label></td>
          <td bgcolor='#7FBBE3' align='center'><select name="cumple21" id="cumple21" style="font-size: 12pt;">
                <option value="">---</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
                <option value="N/A">N/A</option>
              </select>
          </td>
        </tr>
        <?php
        if ($componente == "91531 "  AND $NoOperacion == "1" OR
            $componente == "91566 "  AND $NoOperacion == "1" OR
            $componente == "91545 "  AND $NoOperacion == "1" OR
            $componente == "91574 "  AND $NoOperacion == "1") { ?>
              <tr>
                  <td bgcolor='#7691FE' rowspan='2' align='center'>PERNOS (PUNZONES)</td>
                  <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Pernos completos?</font></label></td>
                  <td bgcolor='#7FBBE3' align='center'><select name="cumple22" id="cumple22" style="font-size: 12pt;">
                        <option value="">---</option>
                        <option value="Si">SI</option>
                        <option value="No">NO</option>
                      </select>
                  </td>
                  <td bgcolor='#7FBBE3' rowspan='2'><textarea name="comentario7" rows="3" cols="30" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 12pt;"></textarea></td>
              </tr>
              <tr>
                <td bgcolor='#7FBBE3'><label><font  SIZE="4">¿Pernos afilados y en buen estado?</font></label></td>
                <td bgcolor='#7FBBE3' align='center'><select name="cumple23" id="cumple23" style="font-size: 12pt;">
                      <option value="">---</option>
                      <option value="Si">SI</option>
                      <option value="No">NO</option>
                    </select>
                </td>
              </tr>
       <?php } ?>
      </table>


      <style type="text/css">
        .boton_1{
          text-decoration: none;
          padding: 3px;
          padding-left: 10px;
          padding-right: 10px;
          font-family: helvetica;
          font-weight: 300;
          font-size: 16px;
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
          font-size: 16px;
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
        <a class="boton_2" name="boton_2" href="/produccion/cambios.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
        <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
      </div>
    </form>
  </body>
</html>
