
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


if($orden &&   $componente){

      $query1 = "SELECT cr FROM crs WHERE componente='$componente'";
      $result1 = $conexion -> query($query1);
      $fila1 = $result1  -> fetch_assoc();

      $query2 = "SELECT cantidad_reque FROM analisisatrasos WHERE item_cliente='$componente' AND orden='$orden'";
      $result2 = $conexion -> query($query2);
      $fila2 = $result2  -> fetch_assoc();

      $fechaActual = date('d/m/Y');

      $query3 = "SELECT numOperaciones FROM troqueles WHERE componente='$componente'";
      $result3 = $conexion -> query($query3);

      $query4 = "SELECT maquina FROM tiempoatrasos WHERE componente='$componente' AND orden='$orden'";
      $result4 = $conexion -> query($query4);
      $fila4 = $result4  -> fetch_assoc();


      $query5 = "SELECT calibre FROM estructura WHERE componente='$componente'";
      $result5 = $conexion -> query($query5);
      $fila5 = $result5  -> fetch_assoc();

      $query6 = "SELECT nombre FROM troqueladores WHERE 1 ORDER BY nombre ASC";
      $result6 = $conexion -> query($query6);

      $query7 = "SELECT contS+40 AS porcentaje FROM repdiprod WHERE componente='$componente' AND orden='$orden'";
      $result7 = $conexion -> query($query7);
      $fila7 = $result7  -> fetch_assoc();

      $query9 = "SELECT maquina FROM tiempomaquinas WHERE 1";
      $result9 = $conexion -> query($query9);

      $query8 = "SELECT DISTINCT orden, operacion, cantParcial FROM repdiprod WHERE componente='$componente' AND orden='$orden' ORDER BY operacion ASC";
      $result8 = $conexion -> query($query8);

 }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>REP.DIARIO PROD.</title>
       <link rel="stylesheet" href="../css/info.css">
      <link rel="shortcut icon" href="/produccion/img/icono.png">
     <script type="text/javascript">
         function mostrar() {

             const selectElement = document.querySelector('.actividad');
                 var res  = `${event.target.value}`;

                  if(res == 'PROCESO' || res == 'MONTAJE - PROCESO' || res == 'MONTAJE - PROCESO - DESMONTA' || res == 'PROCESO - DESMONTA'){

                       div = document.getElementById('flotante');
                       div.style.display = '';

                       div = document.getElementById('flotante2');
                       div.style.display = '';

                   }else{
                       div = document.getElementById('flotante');
                       div.style.display = 'none';

                       div = document.getElementById('flotante2');
                       div.style.display = 'none';
                   }
         }

         function VerificarFechaDeIngreso(){
            var Fingreso=document.getElementById("fecha").value;
            if ( Fingreso== null || Fingreso==0 ){
                alert('FAVOR DE LLENAR EL CAMPO: FECHA');
                return false;
            } else {
                return true;
            }
            /*-----------------------------------------*/
          }

     </script>
   </head>
   <body bgcolor="#AED6F1" >
    <style type="text/css">
    img.izquierda {
      float: left;
    }

    </style>
<br><br>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='125' height='125' />

      <center><font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em; font-size: 40pt;" >REPORTE DIARIO DE PRODUCCIÓN</font></center>
      <br><br><br>
    <P align="right">F - PT 03 REV 01</P>
    <form method='post'action="guardarRepDiarioProd.php" onsubmit="return VerificarFechaDeIngreso()">
      <br>
      <center>
     <table border='1' align="center" overflow='scroll' bordercolor='black'>
       <tr>
         <th bgcolor='#6495ED' colspan='3'><br><font SIZE='5'><label>ORDEN: </label>
           <input type="text" name="orden" id="orden" value="<?php echo $orden ?>" readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 18pt;width : 150px" ></font><br>
         </th>
       </tr>
       <tr>
          <td bgcolor='#6495ED'><br> <font SIZE='5'><label>COMPONENTE: </label></font>
            <input type="text" name="componente" id="componente" value="<?php echo $componente ?> " readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 16pt; width : 250px"><br>
          </td>
          <td bgcolor='#6495ED'><font SIZE='5'><label>C/R: </label></font>
            <input type="text" name="cr" id="cr" value="<?php echo $fila1['cr'] ?> " readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 16pt;">
          </td>
          <td bgcolor='#6495ED'><font SIZE='5'><label>CANTIDAD SOLICITADA: </label></font>
            <input type="text" name="cantSol" id="cantSol" value="<?php echo $fila2['cantidad_reque'] ?> " readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 16pt; width : 100px">
          </td>
       </tr>
       <tr>
         <td bgcolor='#7FBBE3'><br><font SIZE='5'><label>FECHA: </label></font>
           <input type="date" name="fecha" id="fecha" style=" font-size: 16pt"><br>
         </td>
         <td bgcolor='#7FBBE3'><font SIZE='5'><label>OPERADOR: </label>
           <select class="operador" name="operador" id="operador" required style=" font-size: 16pt;">
             <option value="">---------------------------------------</option>
             <?php   while ($fila6 = $result6  -> fetch_assoc()){?>
             <option value='<?php echo $fila6['nombre'] ?>'><?php echo $fila6['nombre'] ?></option>
               <?php  } ?>
           </select><br>

         </td>
         <td  bgcolor='#7FBBE3'><font SIZE='5'><label>MAQUINA:</label></font>
           <select class="maquina" name="maquina" id="maquina" required style=" font-size: 16pt;">
             <option value="">---------</option>
             <?php   while ($fila9 = $result9  -> fetch_assoc()){?>
             <option value='<?php echo $fila9['maquina'] ?>'><?php echo $fila9['maquina'] ?></option>
               <?php  } ?>
           </select>
         </td>
       </tr>
       <tr>
         <td  bgcolor='#7FBBE3' colspan='2'><br><font SIZE='5'><label>ACTIVIDAD:</label></font>
             <select class="actividad" name="actividad" id="actividad"  onchange="javascript:mostrar();"  required style=" font-size: 18pt;">
               <option value="">---------------------------------------------------------</option>
               <option value='MONTAJE'>01 MONTAJE</option>
               <option value='MONTAJE - PROCESO'>02 MONTAJE - PROCESO</option>
               <option value='MONTAJE - DESMONTA'>03 MONTAJE - DESMONTA</option>
               <option value='MONTAJE - PROCESO - DESMONTA'>04 MONTAJE - PROCESO - DESMONTA</option>
               <option value='PROCESO'>05 PROCESO</option>
               <option value='PROCESO - DESMONTA'>06 PROCESO - DESMONTA</option>
               <option value='DESMONTA'>07 DESMONTA</option>
             </select><br>
          </td>
          <td  bgcolor='#7FBBE3'><font SIZE='5'><label>OPERACIÓN:</label></font>
              <select class="op" name="op" id="op" onchange="javascript:parcial();" required  style=" font-size: 18pt;">
                <option value="">---</option>
                <?php   while ($fila3 = $result3  -> fetch_assoc()){?>
                <option value='<?php echo $fila3['numOperaciones'] ?>'><?php echo $fila3['numOperaciones'] ?></option>
                  <?php  } ?>
            </select>
          </td>
       </tr>
       <tr>
         <td  bgcolor='#7FBBE3' colspan='3' align='center'> <font SIZE='5'><label>TIEMPO:</label>
          <br> <label>INICIO:</label> <input type="time" name="inicio" id="inicio" required style=" font-size: 18pt;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
          <label>FIN:</label> <input type="time" name="fin" id="fin" required style=" font-size: 18pt;"> <br><br></font>
         </td>
       </tr>
       <tr>
         <td  bgcolor='#7FBBE3'>
           <div id="flotante2">
             <div id="close2">
               <font SIZE='5'><label>PARCIAL</label></font>
               <?php
               while ($fila8 = $result8  -> fetch_assoc()){?>
                   <label>OPERACIÓN <?php echo $fila8['operacion'] ?>: </label><input type="number" id="per" name="per"   value='<?php echo $fila8['cantParcial'] ?>' readonly style="background-color:#7FBBE3;  border-color:#7FBBE3; border-style:solid; font-size:16pt"> <br>
                 <?php  } ?>
             </div>
           </div>
         </td>
         <td  bgcolor='#7FBBE3'colspan='2'><font SIZE='5'>
           <div id="flotante">
             <div id="close"><br>
               <label>CANTIDAD PRODUCIDA:</label>
               <input type="number" id="cantProd" name="cantProd"  style=" font-size: 18pt;" ><br><br>
             </div>
           </div></font>
        </td>
       </tr>
       <tr>
         <td  bgcolor='#7FBBE3' colspan='3' align='center'><font SIZE='5'><label>COMENTARIO:</label><br>
           <textarea name="comentario" id="comentario" rows="3" cols="50" onkeyup="javascript:this.value=this.value.toUpperCase();"  style=" font-size: 18pt;"></textarea></font>
         </td>
       </tr>
     </table>
   </center>

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
      <input type="text" name="fechaV" id="fechaV" value="<?php echo $fechaV ?>" readonly style="background-color:#AED6F1; color:#AED6F1;  border-color:#AED6F1; border-style:solid"></h3>
      <input type="text" name="cantidad" id="cantidad" value="<?php echo $cantidad ?>" readonly style="background-color:#AED6F1; color:#AED6F1;  border-color:#AED6F1; border-style:solid"></h3>

    </form>

   </body>
 </html>

 <?php
   $conexion ->close(); ?>
