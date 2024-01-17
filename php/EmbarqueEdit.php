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

$orden = $_POST['orden'];
$componente = $_POST['componente'];
$cantidad = $_POST['cantidad'];

$query = "SELECT * FROM loteeconomico,embarque WHERE loteeconomico.componente ='$componente' AND embarque.componente AND cantAct>'0'";
  $result = $conexion -> query($query);
  $fila = $result  -> fetch_assoc();


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
  <body align = "center" bgcolor="#AED6F1">
    <style type="text/css">
    img.izquierda {
      float: left;
    }
    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='100' height='100' />
    <form  action='php/ReporteAlmacenMP.php' method='post'>

    <h1 align = "center"> <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="8">E M B A R Q U E</font></h1><br>
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
            <td bgcolor='#FE9C9C'><label>CANTIDAD ACT.:</label> <input type="text" name="cantAc" id="cantAc" style="background-color:#FE9C9C;  border-color:#FE9C9C; border-style:solid; font-family: Arial; font-size: 16pt;" readonly value="<?php echo $fila['cantAct'] ?>"> <br><br></td>
            <td bgcolor='#FE9C9C'><label>SALIDA:</label> <input type="number"  name="salida" id="salida" style="font-family: Arial; font-size: 14pt;" required>*<br><br></td>

          </tr>
          <tr>
            <td bgcolor='#FE9C9C'><label>FECHA: </label><input type="date"  name="fechaSal" id="fechaSal" style="font-family: Arial; font-size: 14pt;" required>*<br><br></td>
            <td bgcolor='#FE9C9C'>  <label>VERIFICADO POR:</label>
              <select class="opera" name="verySal" id="verySal" style=" font-size: 14pt">
                <option value="">--------------</option>
                <option value='RAMÓN B.'>RAMÓN B.</option>
                <option value='JAVIER F.'>JAVIER F.</option>
              </select>*<br><br>
            </td>
          </tr>
    <?php } ?>
          <tr>
            <td bgcolor='#89C7FA' colspan='2'><label>CANTIDAD A ENVIAR:</label> <input type="number" name="cantidad" id="cantidad" min="0" style="font-family: Arial; font-size: 14pt;" required value="<?php echo $cantidad ?>">*<br><br></td>
          </tr>
          <tr>
            <td bgcolor='#89C7FA'><label>NO. CUÑETES:</label> <input type="text" name="noCu" id="noCu"  style="font-family: Arial; font-size: 14pt;" required>*<br><br></td>
            <td bgcolor='#89C7FA'><label>PESO NETO:</label> <input type="number" name="pesoNeto" id="pesoNeto" min="0"style="font-family: Arial; font-size: 14pt;" required>*<br><br></td>
          </tr>
        </table><br>
      <a class="boton_2" name="boton_2" href="/produccion/EmbarqueInterfaz.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
      <button type='submit'  class='boton_1' onclick="this.form.action='guardarEmbarque.php';this.form.submit();"><img src='/produccion/img/guardar.png' width='20' height='20' />GUARDAR</button>
      </font>
    </form>
    </h3>
  </body>
</html>

<?php   $conexion ->close(); ?>
