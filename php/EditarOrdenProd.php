
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

  $orden = $_POST['orden'];
  $componente = $_POST['componente'];
  $fechaV = $_POST['fechaV'];
  $cantidad = $_POST['cantidad'];

if($orden &&   $componente){

      $query2 = "SELECT troquel FROM troqueles WHERE componente='$componente'";
      $result2 = $conexion -> query($query2);

      $query3 = "SELECT OP FROM estructura WHERE componente='$componente'";
      $result3 = $conexion -> query($query3);
      $fila3 = $result3  -> fetch_assoc();

      $query4 = "SELECT maquina FROM tiempoatrasos WHERE componente='$componente' AND orden='$orden'";
      $result4 = $conexion -> query($query4);
      $fila4 = $result4  -> fetch_assoc();


      $query5 = "SELECT calibre FROM estructura WHERE componente='$componente'";
      $result5 = $conexion -> query($query5);
      $fila5 = $result5  -> fetch_assoc();

      $query6 = "SELECT * FROM atrasosproduccion WHERE orden='$orden' AND comentario LIKE '%REVISADA%' OR orden='$orden' AND comentario LIKE '%ESPERA DE TROQUEL%' OR orden='$orden' AND  comentario LIKE '%CAMBIO%' ";
      $result6 = $conexion -> query($query6);
      $fila6 = $result6  -> fetch_assoc();

      ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <script languague="javascript">
         function mostrar() {

             const selectElement = document.querySelector('.lamina');
                 var res  = `${event.target.value}`;

                  if(res == 'SIN LAMINA' ){

                       div = document.getElementById('flotante');
                       div.style.display = 'none';

                       div = document.getElementById('flotanteSin');
                       div.style.display = '';

                   }else if (res == '' ) {
                       div = document.getElementById('flotante');
                       div.style.display = 'none';

                       div = document.getElementById('flotanteSin');
                       div.style.display = 'none';
                   }else{
                       div = document.getElementById('flotante');
                       div.style.display = '';

                       div = document.getElementById('flotanteSin');
                       div.style.display = 'none';
                   }
         }


         function TerminadaCerrar() {
           div = document.getElementById('flotante1');
           div.style.display = 'none';

             const selectElement = document.querySelector('.ordenT');

                 var res  = `${event.target.value}`;

                  if(res != 'ORDEN TERMINADA'){

                    div = document.getElementById('flotante1');
                    div.style.display = '';

                    div = document.getElementById('flotante1_1');
                    div.style.display = '';

                    div = document.getElementById('flotanteJ');
                    div.style.display = '';

                    div = document.getElementById('flotanteTM');
                    div.style.display = '';

                    div = document.getElementById('flotante4');
                    div.style.display = 'none';

                   }else{
                       div = document.getElementById('flotante1');
                       div.style.display = 'none';

                       div = document.getElementById('flotante1_1');
                       div.style.display = 'none';

                       div = document.getElementById('flotanteJ');
                       div.style.display = 'none';

                       div = document.getElementById('flotanteTM');
                       div.style.display = 'none';

                       div = document.getElementById('flotante4');
                       div.style.display = '';
                   }

         }


         function CambioComnetario() {

             const selectElement = document.querySelector('.cambios');

                 var res  = `${event.target.value}`;

                  if(res == 'CAMBIO' || res == 'ESPERA DE TROQUEL' || res== 'ORDEN REVISADA'){

                       div = document.getElementById('flotante2');
                       div.style.display = '';

                   }else{
                       div = document.getElementById('flotante2');
                       div.style.display = 'none';
                   }
         }

         function Programada() {

           const selectElement = document.querySelector('.programada');

                 res  = `${event.target.value}`;

                if(res == 'PROGRAMADA' || res=='NO'){
                     div = document.getElementById('flotante3');
                     div.style.display = 'none';

                     div = document.getElementById('flotantePro');
                     div.style.display = '';
                 }
                 if( res=='NO'){
                   div = document.getElementById('flotante3');
                   div.style.display = '';

                   div = document.getElementById('flotantePro');
                   div.style.display = '';
                 }
                 if( res=='') {
                   div = document.getElementById('flotante3');
                   div.style.display = 'none';

                   div = document.getElementById('flotantePro');
                   div.style.display = 'none';
                 }
         }
         function tallerMCom() {

           const selectElement = document.querySelector('.tallerM');

                 res  = `${event.target.value}`;

                if(res == 'TALLER MECANICO'){

                     div = document.getElementById('flotante5');
                     div.style.display = '';
                 }else{

                   div = document.getElementById('flotante5');
                   div.style.display = 'none';
                 }
         }

         function JIUT() {
                 var checkBox = document.getElementById("JIUTEPEC");

                if(checkBox.checked == true){

                     div = document.getElementById('flotante6');
                     div.style.display = '';
                 }else{

                   div = document.getElementById('flotante6');
                   div.style.display = 'none';
                 }
         }
       </script>

      <title>COMENTARIO</title>
      <link rel="stylesheet" href="../css/info.css">
      <link rel="shortcut icon" href="/produccion/img/icono.png">
    </head>
    <body >
      <br><br>
      <style type="text/css">
      img.izquierda {
        float: left;
      }
      </style>
      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='100' height='100' /><br><br>
      <center><font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em; font-size: 40pt;" >C O M E N T A R I O|P R O D U C C I Ó N</font></center><br><br>
      <form method='post'action="guardarOrdenProd.php">
        <center>
        <table border="1" align='center' bgcolor='#181B29'>
          <tr>
            <td bgcolor='#4899DE'><br><font SIZE='5'><label>ORDEN: </label></font>
              <input type="text" name="orden" id="orden" value="<?php echo $orden ?>" readonly style="background-color:#4899DE;  border-color:#4899DE; border-style:solid; font-size: 18pt; width : 150px"><br>
            </td>
            <td bgcolor='#4899DE'><font SIZE='5'><label>COMPONENTE: </label></font>
              <input type="text" name="componente" id="componente" value="<?php echo $componente ?> " readonly style="background-color:#4899DE;  border-color:#4899DE; border-style:solid; font-size: 18pt; width : 200px">
            </td>
          </tr>
          <tr>
            <td colspan='2'></td>
          </tr>
          <?php
          if ($fila6['orden'] ==''){ ?>
          <tr>
            <td bgcolor='#73BAF6' colspan='2' align='center'><br> <font SIZE='5'><label>ORDEN TERMINADA:</label></font>
                <select class="ordenT" name="ordenT" id="ordenT" onchange="javascript:TerminadaCerrar();" style=" font-size: 14pt;">
                  <option value="">---</option>
                  <option value='ORDEN TERMINADA'>SI</option>
                </select>
                <div id="flotante4" style="display:none;">
                  <div id="close4"><font SIZE='5'>
                    <label>COMENTARIO:</label></font>
                      <input type="text" name="OrTC" id="OrTC" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 14pt;">
                  </div><?//cerrar div close 4?>
                </div><?//cerrar div flotante 4?><br>
              </td>
          </tr>
          <?php } ?>
          <tr>
            <td bgcolor='#73BAF6'><br>
              <div id="flotante1">
                <div id="close1"><font SIZE='5'>
                      <label>CAMBIOS:</label></font>
                      <select class="cambios" name="cambios" id="cambios" onchange="javascript:CambioComnetario();" style=" font-size: 14pt;">
                        <option value="">--------------------------------</option>
                        <option value='ORDEN REVISADA' id="revisada">REVISADA</option>
                        <option value="ESPERA DE TROQUEL" id="esperaT">ESPERA DE TROQUEL</option>
                        <option value="CAMBIO" id="cambio">CAMBIO</option>
                      </select>

                      <div id="flotante2" style="display:none;">
                        <div id="close2"><font SIZE='5'><br>
                          <label>COMENTARIO:</label></font>
                          <input type="text" name="cambioC" id="cambioC" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 14pt;"></h3>
                        </div><?//cerrar div close 2?>
                      </div><?//cerrar div flotante 2?>
                    </div> <?//close1?>
                  </div> <?//flotante1?><br>
              </td>
              <td bgcolor='#73BAF6'>
                <div id="flotante1_1">
                  <div id="close1_1"><br><font SIZE='5'>
                      <label>LAMINA:</label></font>
                      <select class="lamina" name="lamina" id="lamina" onchange="javascript:mostrar();" style=" font-size: 14pt;">
                        <option value="">-----------------</option>
                        <option value='LAMINA <?php echo $fila5['calibre'] ?>'><?php echo $fila5['calibre'] ?></option>
                        <option value="SIN LAMINA">SIN LAMINA</option>
                      </select>

                      <div id="flotanteSin" style="display:none;">
                        <div id="closeSin"><br><font SIZE='5'>
                          <label>COMENTARIO:</label></font>
                          <input type="text" name="comentarioSinL" id="comentarioSinL" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 14pt;"><br><br>

                        </div>
                      </div>

                      <div id="flotante" style="display:none;">
                        <div id="close"><br>
                          <font SIZE='5'>
                          <label>PROGRAMADA:</label></font>
                          <select class="programada" name="programada" id="programada" onchange="javascript:Programada();" style=" font-size: 14pt;">
                            <option value="">---</option>
                            <option value='PROGRAMADA'>SI</option>
                            <option value="NO">NO</option>
                          </select>

                          <div id="flotantePro" style="display:none;">
                            <div id="closePro"><br><font SIZE='5'>
                              <label>COMENTARIO:</label></font>
                              <input type="text" name="comentarioPro" id="comentarioPro" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 14pt;">
                            </div><?//cerrar div close Pro?>
                          </div><?//cerrar div flotante pro?>
                         <div id="flotante3" >
                           <div id="close3"><br><font SIZE='5'>
                             <label>PROCESO:</label></font>
                             <select class="proceso" name="proceso" id="proceso" style=" font-size: 14pt;">
                             <?php if($fila3['OP']== '1'){?>

                                 <option value="">---</option>
                                 <option value="1" id="1">1 OP</option>

                             <?php }elseif ($fila3['OP']== '2') {?>

                                 <option value="">---</option>
                                 <option value="1" id="1">1 OP</option>
                                 <option value="2" id="2">2 OP</option>
                           <?php  }elseif ($fila3['OP']== '3'){?>

                                 <option value="">---</option>
                                 <option value="1" id="1">1 OP</option>
                                 <option value="2" id="2">2 OP</option>
                                 <option value="3" id="3">3 OP</option>

                           <?php }elseif ($fila3['OP']== '4'){?>

                                 <option value="">---</option>
                                 <option value="1" id="1">1 OP</option>
                                 <option value="2" id="2">2 OP</option>
                                 <option value="3" id="3">3 OP</option>
                                 <option value="4" id="4">4 OP</option>

                             <?php }elseif ($fila3['OP']== '5'){?>

                                   <option value="">---</option>
                                   <option value="1" id="1">1 OP</option>
                                   <option value="2" id="2">2 OP</option>
                                   <option value="3" id="3">3 OP</option>
                                   <option value="4" id="4">4 OP</option>
                                   <option value="5" id="5">5 OP</option>

                             <?php } elseif ($fila3['OP']== '6'){?>

                                   <option value="">---</option>
                                   <option value="1" id="1">1 OP</option>
                                   <option value="2" id="2">2 OP</option>
                                   <option value="3" id="3">3 OP</option>
                                   <option value="4" id="4">4 OP</option>
                                   <option value="5" id="5">5 OP</option>
                                   <option value="6" id="6">6 OP</option>

                             <?php }?>
                           </select><br>
                           </div> <?//cerrar div close 3?>
                         </div> <?//cerrar div flotante 3?>
                        </div> <?//close ?>
                        </div> <?//flotante?>
                      </div> <?//close1?>
                    </div> <?//flotante1?>
            </td>
          </tr>
          <tr>
            <td bgcolor='#73BAF6'><div id="flotanteTM">
              <div id="closeTM"><br><font SIZE='5'>
                  <label>TALLER MECANICO:</label></font>

                  <select class="tallerM" name="tallerM" id="tallerM" onchange="javascript:tallerMCom();" style=" font-size: 14pt;">
                    <option value="">---</option>
                    <option value='TALLER MECANICO'>SI</option>
                  </select> <br>

                  <div id="flotante5" style="display:none;">
                    <div id="close5">
                      <font SIZE='5'>
                      <label>FECHA DE ENTRADA:</label></font>
                      <input type="date" name="fechaEnt" id="fechaEnt" style=" font-size: 14pt;"><br>

                      <font SIZE='5'><label>REPARACION:</label></font>
                      <select class="reparacion" name="reparacion" id="reparacion" style=" font-size: 14pt;">
                        <option value="">----------</option>
                        <option value='MAYOR'>MAYOR</option>
                        <option value='MENOR'>MENOR</option>
                      </select><br>

                       <font SIZE='5'><label>TROQUEL: </label></font>
                        <select class="troquel" name="troquel" id="troquel" style=" font-size: 14pt;">
                          <option value="">----------</option>
                          <?php   while ($fila2 = $result2  -> fetch_assoc()){?>
                          <option value='<?php echo $fila2['troquel'] ?>'> <?php echo $fila2['troquel'] ?></option>
                            <?php  } ?>
                        </select><br>
                      <font SIZE='5'>
                      <label>COMENTARIO:</label></font>
                      <input type="text" name="tallerMC" id="tallerMC" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 14pt;"><br>
                    </div><?//cerrar div close 5?>
                  </div><?//cerrar div flotante 5?>
                </div><?//cerrar div close 5?>
              </div><?//cerrar div flotante 5?><br>
            </td>
            <td bgcolor='#73BAF6'><div id="flotanteJ">
              <div id="closeJ"><font SIZE='5'>
                <label>JIUTEPEC:</label></font>
                <input type="checkbox" name="JIUTEPEC" id="JIUTEPEC" value="JIUTEPEC"  onchange="javascript:JIUT();" >
                  <div id="flotante6" style="display:none;">
                    <div id="close6"><br><font SIZE='5'>
                        <label>COMENTARIO:</label></font>
                        <input type="text" name="comJ" id="comJ" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 14pt;">
                    </div><?//cerrar div close 6?>
                  </div><?//cerrar div flotante 6?>
                </div><?//cerrar div close 6?>
              </div><?//cerrar div flotante 6?>
            </td>
          </tr>
        </table>
      </center>
                <br><br>
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
                <a class="boton_2" name="boton_2" href="/produccion/atrasosProduccion.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
                <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
              </div>

            <br><br><br>
            <input type="text" name="fechaV" id="fechaV" value="<?php echo $fechaV ?>" readonly style="background-color:transparent; color:transparent;  border-color:transparent; border-style:solid"></h3>
            <input type="text" name="cantidad" id="cantidad" value="<?php echo $cantidad ?>" readonly style="background-color:transparent; color:transparent;  border-color:transparent; border-style:solid"></h3>
      </form>
   </body>
 </html>
 <?php
}

$conexion ->close();

?>
