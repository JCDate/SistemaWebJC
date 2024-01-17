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

$componente = $_POST['componente'];

$query = "SELECT cantAct FROM loteeconomico WHERE componente ='$componente'";
$result = $conexion -> query($query);
$fila = $result  -> fetch_assoc();




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SALIDA LOTE ECONÓMICO</title>
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
  <body bgcolor="#AED6F1">
    <h3 align = "center">
      <form class="" action="guardarSalidaLoteE.php" method="post">
        <font size=5> <h1>S A L I D A</h1>
          <br>
          <table border="1" align='center'>
            <tr>
              <td bgcolor='#42A2F1' colspan='2'><label>COMPONENTE:</label> <input type="text" name="componente" id="componente" style="background-color:#42A2F1;  border-color:#42A2F1; border-style:solid; font-family: Arial; font-size: 16pt; width : 150px" value="<?php echo $componente ?>" readonly> <br><br></td>
            </tr>
    <?php if($result -> num_rows > 0) {?>
            <tr>
              <td bgcolor='#FE9C9C' colspan='2'><label>CANTIDAD ACT.:</label> <input type="text" name="cantidad" id="cantidad" style=" background-color:#FE9C9C;  border-color:#FE9C9C; border-style:solid; font-family: Arial; font-size: 14pt; width : 150px" value="<?php echo $fila['cantAct']  ?>" readonly> <br><br></td>
            </tr>
    <?php } ?>
            <tr>
              <td bgcolor='#89C7FA'><label>SALIDA:</label> <input type="number"  name="salida" id="salida" style="font-family: Arial; font-size: 14pt; width : 150px" required><br><br></td>
              <td bgcolor='#89C7FA'><label>FECHA:</label><input type="date"  name="fechaSal" id="fechaSal" style="font-family: Arial; font-size: 14pt;" required><br><br></td>
            </tr>
            <tr>
              <td bgcolor='#89C7FA' colspan='2'><label>VERIFICADO POR:</label>
                  <select class="opera" name="verySal" id="verySal" style="font-family: Arial; font-size: 14pt;">
                    <option value="">--------------</option>
                    <option value='RAMÓN B.'>RAMÓN B.</option>
                    <option value='JAVIER F.'>JAVIER F.</option>
                  </select> <br><br>
              </td>
            </tr>
          </table><br>

          <a class="boton_2" name="boton_2" href="/produccion/LoteEconomicoInterfaz.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
          <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' />GUARDAR</button>
        </font>
      </form>
    </h3>
  </body>
</html>

<?php   $conexion ->close(); ?>
