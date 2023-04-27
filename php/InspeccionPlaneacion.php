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

$query6 = "SELECT DISTINCT componente FROM estructura WHERE 1";
$result6 = $conexion -> query($query6);

$query = "SELECT nombre FROM troqueladores WHERE puesto='INSPECTOR' ORDER BY nombre ASC";
$result = $conexion -> query($query);


$orden =$_POST['orden'];
$componente = $_POST['componente'];
$cantidadPzs = $_POST['cantidadPzs'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Inspeccion</title>
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
  <body bgcolor="#AED6F1"> <br><br>
    <style type="text/css">
    img.izquierda {
      float: left;
    }
    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='120' height='120' />
      <form class="" action="guardaInspeccionPlaneacion.php" method="post">
        <font size=5>
          <center>
          <table border="1" bgcolor='#181B29'>
            <tr>
              <th bgcolor='#6495ED' colspan='2'><br> <h1> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">ENVIAR A INSPECCIONAR</font></h1><br></th>
            </tr>
            <tr>
              <td bgcolor='#87CEFA'><br><h3><label>ORDEN:</label>
                  <input type="text" name="orden" id="orden" value="<?php echo $orden ?>" style="font-family: Arial; font-size: 14pt; width : 100px" readonly> </h3><br>
              </td>
              <td bgcolor='#87CEFA'><br><h3><label>COMPONENTE:</label>
                  <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" style="font-family: Arial; font-size: 14pt; width : 130px" readonly> </h3><br>
              </td>
            </tr>
            <tr>
              <td bgcolor='#87CEFA'><br><h3><label>PZS APROX.:</label><input type="number"  step="any" name="pzs" id="pzs" min="0" value="<?php echo $cantidadPzs ?>" style="font-family: Arial; font-size: 14pt;  width : 100px" required></h3><br></td>
              <td bgcolor='#87CEFA'><br><h3><label>FECHA:</label> <input type="date" name="fecha" id="fecha" style="font-family: Arial; font-size: 14pt;"> </h3><br></td>

            </tr>
            <tr>
              <td bgcolor='#87CEFA'><br><h3><label>CUÑETES:</label> <input type="number"  step="any" name="cuñetes" id="cuñetes" min="0" style="font-family: Arial; font-size: 14pt; width : 100px" required></h3><br></td>
              <td bgcolor='#87CEFA'><br><h3><label>INSPECTOR:</label>
                <select class="inspector" name="inspector" id="inspector" readonly style="font-family: Arial; font-size: 14pt;">
                  <option value="">---------------------------</option>
                  <?php   while ($fila = $result  -> fetch_assoc()){?>
                  <option value='<?php echo $fila['nombre'] ?>' > <?php echo $fila['nombre'] ?></option>
                    <?php  } ?>
                </select></h3><br>
              </td>
            </tr>
            <tr>

              <td bgcolor='#87CEFA' colspan='2' align='center'><br><h3><label>PRIORIDAD: </label>
                <select class="prioridad" name="prioridad" id="prioridad" readonly style="font-family: Arial; font-size: 14pt;">
                  <option value="">-------</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </select></h3><br></td>
            </tr>
          </table>
          <br><br>

          <a class="boton_2" name="boton_2" href="/produccion/InspeccionPlanInterfaz.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
          <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' />GUARDAR</button>
        </center>
        </font>
      </form>
    </h3>
  </body>
</html>

<?php   $conexion ->close(); ?>
