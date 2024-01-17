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

$query6 = "SELECT DISTINCT num_calibre FROM inventario WHERE 1";
$result6 = $conexion -> query($query6);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Embarque</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">

    <script type="text/javascript">
    $(document).ready(function(){
        $(':checkbox[readonly=readonly]').click(function(){
          return false;
        });
    })
    </script>
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

  </head>
  <body> <br><br>
    <style type="text/css">
    img.izquierda {
      float: left;
    }
    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='120' height='120' />
      <form class="" action="php/guardaVerGuillotinaSaf.php" method="post">
        <font size=5>
          <center>
          <table border="1" bgcolor='#181B29'>
            <tr>
              <th bgcolor='#6495ED' colspan='2'><br><font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">VERIFICACIÓN DE GUILLOTINA SAFAN</font><br></th>
            </tr>
            <tr>
              <td bgcolor='#87CEFA'><br><font SIZE='5'><label>FECHA:</label> <input type="date" name="fecha" id="fecha" style="font-family: Arial; font-size: 14pt;"> </font><br><br></td>
              <td bgcolor='#87CEFA'><br><font SIZE='5'><label>CALIBRE:</label>
                  <select class="calibre" name="calibre" id="calibre" readonly style="font-family: Arial; font-size: 14pt;">
                    <option value="">---------------------------</option>
                    <?php   while ($fila6 = $result6  -> fetch_assoc()){?>
                    <option value='<?php echo $fila6['num_calibre'] ?>' > <?php echo $fila6['num_calibre'] ?></option>
                      <?php  } ?>
                  </select> </font><br><br>
              </td>
            </tr>
            <tr>
              <td bgcolor='#87CEFA'><br><font SIZE='5'><label>MEDIDA PROGRAMADA:</label> <input type="number"  step="any" name="medProg" id="medProg" min="0" style="font-family: Arial; font-size: 14pt;" required></font><br><br></td>
              <td bgcolor='#87CEFA'><br><font SIZE='5'><label>MEDIDA CORTADA:</label><input type="number"  step="any" name="medCort" id="medCort" min="0" style="font-family: Arial; font-size: 14pt;" required></font><br><br></td>
            </tr>
            <tr>
              <td bgcolor='#87CEFA'><br><font SIZE='5'><label>OPERADOR:</label>
                  <select class="opera" name="opera" id="opera" style="font-family: Arial; font-size: 14pt;">
                    <option value="">---------------------------</option>
                    <option value='JORGE MUÑOZ'>JORGE MUÑOZ</option>
                    <option value='LUIS ROMERO'>LUIS ROMERO</option>
                    <option value='MANUEL VAZQUEZ'>MANUEL VAZQUEZ</option>
                    <option value='SERGIO'>SERGIO</option>
                  </select></font><br><br>
              </td>
              <td bgcolor='#87CEFA'><br><font SIZE='5'><label>OBSERVACIONES:</label> <input type="text" name="obser" id="obser" style="font-family: Arial; font-size: 14pt;" onkeyup="javascript:this.value=this.value.toUpperCase();"></font><br><br></td>
            </tr>
          </table>
          <br><br>

          <button type="reset" name="boton_2" class="boton_2"><img src='/produccion/img/limp.png' width='20' height='20' />LIMPIAR</button>
          <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' />GUARDAR</button>
        </center>
        </font>
      </form>
    </h3>
  </body>
</html>

<?php   $conexion ->close(); ?>
