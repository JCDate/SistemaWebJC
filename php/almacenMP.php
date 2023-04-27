<?php
header("Content-Type: text/html;charset=utf-8");
$salida = "";
if(!($conexion = mysqli_connect("localhost", "root", "" )))
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

  $query = "SELECT orden, componente, fecha, solicitante FROM almacenmp  WHERE solicitante IS NULL ORDER BY CONCAT(SUBSTRING_INDEX(fecha , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fecha , '/', 2), '/', -1),SUBSTRING_INDEX(fecha , '/', 1)) ASC";

  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	orden, componente,fecha, solicitante FROM almacenmp WHERE componente LIKE '%".$q."%' AND solicitante IS NULL OR orden LIKE '%".$q."%' AND solicitante IS NULL OR fecha LIKE '%".$q."%' AND solicitante IS NULL";
  }

  $result = $conexion -> query($query);

  if($result -> num_rows > 0) {
    $salida .="<form  action='php/ReporteAlmacenMP.php' method='post'><table border='1'  align='center' overflow='scroll' height='100%' width='100%' id='almacenMP'>
          <thead>
          <tr>
            <th bgcolor='#85C1E9'>ORDEN</th>
            <th bgcolor='#85C1E9'>COMPONENTE</th>
            <th bgcolor='#85C1E9'>FECHA</th>
            <th bgcolor='#85C1E9'>SOLICITANTE</th>
            <th bgcolor='#85C1E9'>ACCIÓN</th>
          </tr>
          </thead>
          <tbody>";

    while ($fila = $result  -> fetch_assoc()){
        $salida .="<tr>
                <th bgcolor='#85C1E9'>".$fila['orden']."</th>
                <td bgcolor='#AED6F1' align='center'>".$fila['componente']."</td>
                <td bgcolor='#AED6F1'>".$fila['fecha']."</td>
                <td bgcolor='#AED6F1'>".$fila['solicitante']."</td>
                <td bgcolor= '#AED6F1' align='center'><button type='button' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'> <a  href='#editar'><img src='img/edit.png' width='30' height='30' class='zoom'/></a></button></td>
                </tr></form>";

    }
    $salida .="</tbody></table>";

  } else {
    $salida .= "No hay ordenes";
  }

  echo $salida;

  $query6 = "SELECT nombre FROM troqueladores WHERE puesto='TROQUELADOR' OR puesto='INSTALADOR' ORDER BY nombre ASC";
  $result6 = $conexion -> query($query6);

  $conexion ->close();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <style type="text/css">
      img.zoom {

         -webkit-transition: all .2s ease-in-out;
         -moz-transition: all .2s ease-in-out;
         -o-transition: all .2s ease-in-out;
         -ms-transition: all .2s ease-in-out;
       }

       .transition {
         -webkit-transform: scale(1.8);
         -moz-transform: scale(1.8);
         -o-transform: scale(1.8);
         transform: scale(1.8);
       }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script>
         $(document).ready(function(){
             $('.zoom').hover(function() {
                 $(this).addClass('transition');
             }, function() {
                 $(this).removeClass('transition');
             });
         });
       </script>
    <script type="text/javascript">
        $(".btn_add").on("click", function() {
        var orden = $(this).closest('tr').children()[0].textContent;
        var componente = $(this).closest('tr').children()[1].textContent;
        var solicitante= $(this).closest('tr').children()[3].textContent;

        var orden1 = $(this).closest('tr').children()[0].textContent;
        var componente1= $(this).closest('tr').children()[1].textContent;
        var solicitante1= $(this).closest('tr').children()[3].textContent;

        $("#orden").val(orden);
        $("#componente").val(componente);
        $("#solicitante").val(solicitante);
        $("#orden1").val(orden1);
        $("#componente1").val(componente1);
        $("#solicitante1").val(solicitante1);

        });
    </script>
    <title>Almacen M. P.</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>
    <input type="text" name="orden1" id="orden1"  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid">
    <input type="text" name="componente1" id="componente1" readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
    <input type="text" name="solicitante1" id="solicitante1" readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
    <br><br><br><br><br><br> <a id="editar"></a><br><br><br>
    <h1 align = "center"> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="6">EDITAR</font></h1><br>

    <form class="" action="php/EditarAlmacenMP.php" method="post">
      <center>
      <table border="1">
        <tr>
          <td bgcolor='#708CFE' colspan='2' align='center'> <font SIZE="5"><label>ORDEN:</label> <input type="text" name="orden" id="orden"  readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 18pt;width : 150px"></font> </td>
        </tr>
        <tr>
          <td bgcolor='#708CFE'><font SIZE="5"><label>COMPONENTE:</label> <input type="text" name="componente" id="componente"  readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 16pt"></font></td>
          <td bgcolor='#708CFE'><font SIZE="5"><label>FECHA:</label> <input type="text" name="fecha" id="fecha" value="<?php echo date("d/m/Y");?>" readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 16pt"></font></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'> <br><font SIZE="5"><label>SOLICITANTE:</label>
          <select class="solicitante" name="solicitante" id="solicitante" readonly style=" font-size: 16pt">
            <option value="">-----------------------------------</option>
            <?php   while ($fila6 = $result6  -> fetch_assoc()){?>
            <option value='<?php echo $fila6['nombre'] ?>'><?php echo $fila6['nombre'] ?></option>
              <?php  } ?>
          </select></font> <br>
          </td>
          <td bgcolor='#7FBBE3'><br><font SIZE="5"><label>TIPO DE MATERIAL:</label>
            <select name="tipoM" id="tipoM" style=" font-size: 16pt">
              <option value="">-----------</option>
              <option value="ROLLO">ROLLO</option>
              <option value="HOJA">HOJA</option>
            </select></font><br>
          </td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><br><font SIZE="5"><label>ANCHO DE TIRA:</label> <input type="text" name="anchoTira" id="anchoTira"  style=" font-size: 16pt"></font><br></td>
          <td bgcolor='#7FBBE3'><font SIZE="5"><label>NO. ROLLO:</label> <input type="text" name="norollo" id="norollo" style=" font-size: 16pt"></font></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><br><font SIZE="5"><label>NO. HOJAS:</label> <input type="text" name="nohoja" id="nohoja" style=" font-size: 16pt"></font><br></td>
          <td bgcolor='#7FBBE3'><font SIZE="5"><label>NO. TIRAS:</label> <input type="text" name="notira" id="notira" style=" font-size: 16pt"></font></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3'><br><font SIZE="5"><label>PESO (CAL):</label> <input type="text" name="pesocal" id="pesocal" style=" font-size: 16pt"></font><br></td>
          <td bgcolor='#7FBBE3'><font SIZE="5"><label>AUTORIZADO POR:</label> <input type="text" name="autorizado" id="autorizado" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 16pt"></font></td>
        </tr>
        <tr>
          <td bgcolor='#7FBBE3' colspan='2' align='center'><font SIZE="5"><label>OBSERVACIONES:</label><br><textarea name="observaciones" id="observaciones" rows="5" cols="50" onkeyup="javascript:this.value=this.value.toUpperCase();" style=" font-size: 16pt"></textarea></font></td>
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
      <div class="wrapper " align='center'>
        <button type="reset" name="boton_2" class="boton_2"><img src='/produccion/img/limp.png' width='20' height='20' class='zoom'/>LIMPIAR</button>
        <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
      </div>
    </form>
  </body>
</html>
