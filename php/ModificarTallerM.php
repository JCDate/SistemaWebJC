
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


if($id){


  $query = "SELECT tallermecacicofalla.id, tallermecacicofalla.componente,fechaEntrada,descripcion,fechaEnt,reparadaP,turno,solucion,fabricada,reparada,eficaz FROM tallermecacicofalla,tallermecanicorep WHERE tallermecacicofalla.id='$id' AND tallermecanicorep.id='$id' AND tallermecanicorep.componente= tallermecacicofalla.componente AND tallermecanicorep.id=tallermecacicofalla.id";
  $result = $conexion -> query($query);

  $query2 = "SELECT tallermecacicofalla.id, tallermecacicofalla.componente,fechaEntrada,descripcion,fechaEnt,reparadaP,turno,solucion,fabricada,reparada,eficaz FROM tallermecacicofalla,tallermecanicorep WHERE tallermecacicofalla.id='$id' AND tallermecanicorep.id='$id' AND tallermecanicorep.troquel LIKE '%TORNO%' AND  tallermecacicofalla.troquel LIKE '%TORNO%' AND tallermecanicorep.id=tallermecacicofalla.id";
  $result2 = $conexion -> query($query2);

      ?>
  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <title>TALLER M.</title>
      <link rel="shortcut icon" href="/produccion/img/icono.png">
    </head>
    <body bgcolor="#AED6F1" >
      <style type="text/css">
      img.izquierda {
        float: left;
      }
      </style>
      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='110' height='110' />
      <br><br>
        <form method='post'action="guardarModifTallerM.php" onsubmit="return validacion()">
          <center><font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em; font-size: 40pt;" >MODIFICAR TALLER MECANICO</font></center>
        <br>
        <?php  if($result -> num_rows > 0) {?>
        <table border="1" align='center' overflow='scroll' height='100%' width='100%' bordercolor='black'>
          <tr>
            <th bgcolor="#6495ED" colspan='4' align='center'> <h2><label>TROQUEL: </label>
            <input type="text" name="troquel" id="troquel" value="<?php echo $troquel ?>" readonly style="background-color:#6495ED;  border-color:#6495ED; border-style:solid; font-size: 16pt"></h2> </th>
          </tr>
            <?php   while ($fila = $result  -> fetch_assoc()){?>
          <tr>
            <td colspan='4'  bgcolor="#000000"></td>
          </tr>
          <tr>
            <td colspan='4'  bgcolor="#000000"></td>
          </tr>
          <tr>
            <td bgcolor="#93A8FD" colspan='2' align='center'> <h3>
              <label>ID: </label>
                  <input type="text" name="id" id="id" value="<?php echo $fila['id'] ?>" readonly style="background-color:#93A8FD;  border-color:#93A8FD; border-style:solid; font-size: 16pt"></h2>
            </td>
            <td bgcolor="#93A8FD" colspan='2' align='center'> <h3>
              <label>COMPONENTE: </label>
                  <input type="text" name="componente" id="componente" value="<?php echo $fila['componente'] ?>" readonly style="background-color:#93A8FD;  border-color:#93A8FD; border-style:solid; font-size: 16pt"></h2>
            </td>
          </tr>
          <tr>
            <td bgcolor='#FA8072' colspan='4' align='center'><h2>FALLA</h2></td>
          </tr>
          <tr>
            <td bgcolor="#FFE4E1" align='center'><h3><label>FECHA: </label>
              <input type="text" name="fecha" id="fecha" style=" font-size: 16pt;width : 150px" value="<?php echo $fila['fechaEntrada'] ?>" readonly></h3>
            </td>
            <td bgcolor="#FFE4E1" colspan='3' ><h3><label>DESCRIPCIÓN DE LA FALLA:</label>
                  <textarea  rows="2" cols="50" name="descripcion" id="descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 16pt;"><?php echo $fila['descripcion'] ?></textarea>
            </td>
          </tr>
          <tr>
            <td bgcolor="#00BFFF" colspan='4' align='center'><h2>REPARACIÓN</h2></td>
          </tr>
          <tr>
            <td bgcolor="#AFEEEE"><h3><label>FECHA: </label>
              <input type="text" name="fechaR" id="fechaR" style=" font-size: 16pt;width : 150px" value="<?php echo $fila['fechaEnt'] ?>" readonly></h3>
            </td>
            <td bgcolor="#AFEEEE"><h3><label>REPARADA POR:</label>
                <input type="text" name="reperadaPor" id="reperadaPor" style=" font-size: 16pt; width : 300px" value="<?php echo $fila['reparadaP'] ?>" readonly></h3>
            </td>
            <td bgcolor="#AFEEEE"><h3><label>TURNO:</label>
                <input type="text" name="turno" id="turno" style=" font-size: 16pt; width : 50px" value="<?php echo $fila['turno'] ?>"></h3>
            </td>
            <td bgcolor="#AFEEEE"><h3><label>SOLUCIÓN:</label>
                <textarea  rows="3" cols="50" name="solucion" id="solucion" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 16pt;"><?php echo $fila['solucion'] ?></textarea>
            </td>
          </tr>
          <tr>
          </tr>
          <tr>
            <td bgcolor="#AFEEEE"><h3><label>FABRICADA:</label>
                <input type="text" name="fabricada" id="fabricada" style=" font-size: 16pt; width : 50px" value="<?php echo $fila['fabricada'] ?>"></h3>
            </td>
            <td bgcolor="#AFEEEE" align='center'><h3><label>REPARADA:</label>
              <input type="text" name="reparada" id="reparada" style=" font-size: 16pt; width : 50px" value="<?php echo $fila['reparada'] ?>"></h3>
            </td>
            <td bgcolor="#AFEEEE" colspan='2' align='center'><h3><label>AJUSTE EFICAZ A LA 1a.?:</label>
              </select><input type="text" name="ajuste" id="ajuste" style=" font-size: 16pt; width : 50px" value="<?php echo $fila['eficaz'] ?>"></h3>
            </td>
          </tr>
          <tr>
            <td colspan='8'><div align='center'>
              <a class="boton_2" name="boton_2" href="/produccion/TallerMecanicoInt.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
              <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
            </div></td>
          </tr>
            <?php  } ?>
        </table>
<?php } ?>

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

            <br><br><br>
      </form>
   </body>
 </html>
 <?php
}else {
  echo "NO REGISTRADO", $id;
}

$conexion ->close();

?>
