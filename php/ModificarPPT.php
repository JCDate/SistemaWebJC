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

$id = $_POST['id'];
$componente = $_POST['componente'];
$troquel = $_POST['troquel'];

  $query = "SELECT * FROM instpptroquelado WHERE componente='$componente' AND id='$id' AND troquel='$troquel'";
  $result = $conexion -> query($query);
  $fila = $result  -> fetch_assoc();

  $query2 = "SELECT numOperaciones, troquel FROM troqueles WHERE componente='$componente'";
  $result2 = $conexion -> query($query2);

  $query3 = "SELECT maquina FROM tiempomaquinas";
  $result3 = $conexion -> query($query3);

  $query4 = "SELECT nombre FROM troqueladores WHERE puesto='INSTALADOR'";
  $result4 = $conexion -> query($query4);
?>

  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>MOD. PPT</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    </head>
    <body bgcolor="#AED6F1">
      <style type="text/css">
        img.izquierda {
          float: left;
        }
      </style>
      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='110' height='110' />
        <form method='post'action="guardarInstTroqueladosM.php">

        <h1 align='center'>MODIFICAR | INSTALACION Y PUESTA A PUNTO DE TROQUELADO</h1><br><br><br>
        <table border="1" align='center'>
          <tr>
            <td bgcolor="#708CFE" align='center'><h2><label>ID: </label>
              <input type="text" name="id" id="id" value="<?php echo $fila['id'] ?>" readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 18pt; width : 150px"></h2>
            </td>
            <td bgcolor="#708CFE" align='center' colspan='2'><h2><label>COMPONENTE: </label>
              <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 18pt; width : 200px"></h2>
            </td>
          </tr>
          <tr>
            <td bgcolor="#708CFE" align='center'><h3><label>C/R: </label>
            <input type="text" name="cr" id="cr" value="<?php echo $fila['cr'] ?>" readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 14pt; width : 200px"></h3>
            </td>
            <td bgcolor="#708CFE" align='center' colspan='2'><h3><label>CALIBRE: </label>
              <input type="text" name="calibre" id="calibre" value="<?php echo $fila['calibre'] ?>" readonly style="background-color:#708CFE;  border-color:#708CFE; border-style:solid; font-size: 14pt; width : 200px"></h3>
            </td>
          </tr>
          <tr>
            <td bgcolor='#7FBBE3'><h3><label>FECHA: </label>
             <input type="text" name="fecha" id="fecha" value="<?php echo $fila['fecha']; ?>" style=" font-size: 18pt; width : 150px">* </h3>
            </td>
            <td bgcolor='#7FBBE3'><h3 align='center'> OPERACIÓN: <?php echo $fila['operacion'] ?>  &nbsp &nbsp TROQUEL: <?php echo $fila['troquel'] ?></h3>
              <h3><label>OPERACION Y TROQUEL: </label>
                <select class="op" name="op" id="op" style=" font-size: 14pt;">
                  <option value="">---</option>
                  <?php   while ($fila2 = $result2  -> fetch_assoc()){?>
                  <option value='<?php echo $fila2['numOperaciones'] ?>'><?php echo $fila2['numOperaciones'] ?> , <?php echo $fila2['troquel'] ?></option>
                    <?php  } ?>
                </select>*</h3>
            </td>
            <td bgcolor='#7FBBE3'><h3>MAQUINA: <?php echo $fila['maquina'] ?> <br><br>
                <label>MAQUINA: </label>
                <select class="maquina" name="maquina" id="maquina" style=" font-size: 14pt;">*
                  <option value="">---</option>
                  <?php   while ($fila3 = $result3  -> fetch_assoc()){?>
                  <option value='<?php echo $fila3['maquina'] ?>'><?php echo $fila3['maquina'] ?></option>
                    <?php  } ?>
                </select>*</h3>
            </td>
          </tr>
          <tr>
            <td bgcolor='#7FBBE3' colspan='3' align='center'><h3><label>OPERADOR: </label>
              <?php echo $fila['operador'] ?> </h3>
            </td>
          </tr>
          <tr>
            <td bgcolor='#7FBBE3'><h3><label>LBS: </label>
             <input type="number" name="libs" id="libs" value="<?php echo $fila['libs'] ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" style="width : 50px">*</h3>
            </td>
            <td bgcolor='#7FBBE3' colspan='2' align='center'><h3><label>CAUSA DE REPARACION: </label>
             <input type="text" name="causa" id="causa" style="width : 300px; font-size: 14pt;" value="<?php echo $fila['causaR'] ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();">*</h3>
            </td>
          </tr>
        </table>
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
                <a class="boton_2" name="boton_2" href="/produccion/ListaInstPPTInterfaz.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
                <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
              </div>
      </form>
   </body>
 </html>
 <?php

$conexion ->close();

?>
