
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

  $troquel = $_POST['troquel'];

if($troquel){

  $query = "SELECT componente FROM troqueles WHERE troquel='$troquel'";
  $result = $conexion -> query($query);

  $query4 = "SELECT nombre FROM troqueladores WHERE puesto='MATRICERIA' ORDER BY nombre ASC";
  $result4 = $conexion -> query($query4);

  $query2 = "SELECT tallermecacicofalla.id, tallermecacicofalla.componente,fechaEntrada,descripcion,fechaEnt,reparadaP,turno,solucion,fabricada,reparada,eficaz FROM tallermecacicofalla,tallermecanicorep WHERE tallermecacicofalla.troquel='$troquel' AND tallermecanicorep.troquel='$troquel' AND tallermecanicorep.componente= tallermecacicofalla.componente AND tallermecanicorep.id=tallermecacicofalla.id";
  $result2 = $conexion -> query($query2); ?>

  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <title>TALLER M.</title>
      <link rel="shortcut icon" href="/produccion/img/icono.png">
      <script type="text/javascript">
      function validacion() {

    //-------------------------------------------------------------------------------------------------------
            componente = document.getElementById("componente").selectedIndex;
            if( componente == null || componente == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: COMPONENTE');
              return false;
            }
    //-------------------------------------------------------------------------------------------------------
            componente = document.getElementById("componente").selectedIndex;
            if( componente == null || componente == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: COMPONENTE');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            fecha =document.getElementById("fecha").value;
            if( fecha == null || fecha == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: FECHA');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            descripcion =document.getElementById("descripcion").value;
            if( descripcion == null || descripcion == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: DESCRIPCIÓN DE LA FALLA');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
      //REPARACION
            fechaR =document.getElementById("fechaR").value;
            if( fechaR == null || fechaR == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: FECHA DE REPARACIÓN');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            reperadaPor = document.getElementById("reperadaPor").selectedIndex;
            if( reperadaPor == null || reperadaPor == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: REPARADA POR');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            turno = document.getElementById("turno").selectedIndex;
            if( turno == null || turno == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: TURNO');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            solucion =document.getElementById("solucion").value;
            if( solucion == null || solucion == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: SOLUCIÓN');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            fabricada = document.getElementById("fabricada").selectedIndex;
            if( fabricada == null || fabricada == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: FABRICADA');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            reparada = document.getElementById("reparada").selectedIndex;
            if( reparada == null || reparada == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: REPARADA');
              return false;
            }
      //-------------------------------------------------------------------------------------------------------
            ajuste = document.getElementById("ajuste").selectedIndex;
            if( ajuste == null || ajuste == 0 ) {
              alert('FAVOR DE LLENAR EL CAMPO: AJUSTE');
              return false;
            }
      }
      </script>
    </head>
    <body bgcolor="#AED6F1" >
      <style type="text/css">
      img.izquierda {
        float: left;
      }

      </style>
      <img src='/produccion/img/jcLogo.png' class="izquierda"  width='110' height='110' />
      <br><br>
        <form method='post'action="guardarTallerM.php" onsubmit="return validacion()">
          <center><font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em; font-size: 40pt;" >TALLER MECANICO</font></center>
        <br>
        <table border="1" align='center' overflow='scroll' height='100%' width='100%' bordercolor='black'>
          <tr>
            <th bgcolor="#6495ED" colspan='4' align='center'> <h2><label>TROQUEL: </label>
            <input type="text" name="troquel" id="troquel" value="<?php echo $troquel ?>" readonly style="background-color:#6495ED;  border-color:#6495ED; border-style:solid; font-size: 16pt"></h2> </th>
          </tr>
          <?php  if($result -> num_rows > 0) {?>
          <tr>
            <td bgcolor="#93A8FD" colspan='4' align='center'> <h3>
              <label>COMPONENTE: </label>
                <select class="componente" name="componente" id="componente" style=" font-size: 16pt">
                  <option value="">---------------</option>
                  <?php   while ($fila = $result  -> fetch_assoc()){?>
                  <option value='<?php echo $fila['componente'] ?>'><?php echo $fila['componente'] ?></option>
                    <?php  } ?>
                </select> </h3>
            </td>
          </tr>
        <?php } ?>
          <tr>
            <td bgcolor='#FA8072' colspan='4' align='center'><h2>FALLA</h2></td>
          </tr>
          <tr>
            <td bgcolor="#FFE4E1" align='center'><h3><label>FECHA: </label>
              <input type="date" name="fecha" id="fecha" style=" font-size: 16pt"></h3>
            </td>
            <td bgcolor="#FFE4E1" colspan='3' ><h3><label>DESCRIPCIÓN DE LA FALLA:</label>
                <input type="text" name="descripcion" id="descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 16pt; width : 300px"></h3>
            </td>
          </tr>
          <tr>
            <td bgcolor="#00BFFF" colspan='4' align='center'><h2>REPARACIÓN</h2></td>
          </tr>
          <tr>
            <td bgcolor="#AFEEEE"><h3><label>FECHA: </label>
              <input type="date" name="fechaR" id="fechaR" style=" font-size: 16pt"></h3>
            </td>
            <td bgcolor="#AFEEEE"><h3><label>REPARADA POR:</label>
                <select class="operador" name="reperadaPor" id="reperadaPor" style=" font-size: 16pt">
                  <option value="">------------------------------------</option>
                  <?php   while ($fila4 = $result4  -> fetch_assoc()){?>
                  <option value='<?php echo $fila4['nombre'] ?>'><?php echo $fila4['nombre'] ?></option>
                    <?php  } ?>
                 </select></h3>
            </td>
            <td bgcolor="#AFEEEE"><h3><label>TURNO:</label>
                  <select class="turno" name="turno" id="turno" style=" font-size: 16pt">
                    <option value="">---</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                  </select></h3>
            </td>
            <td bgcolor="#AFEEEE"><h3><label>SOLUCIÓN:</label>
                <input type="text" name="solucion" id="solucion" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 16pt; width : 300px"></h3>
            </td>
          </tr>
          <tr>
          </tr>
          <tr>
            <td bgcolor="#AFEEEE"><h3><label>FABRICADA:</label>
                <select class="fabricada" name="fabricada" id="fabricada" style=" font-size: 16pt">
                  <option value="">---</option>
                  <option value='SI'>SI</option>
                  <option value='NO'>NO</option>
                </select></h3>
            </td>
            <td bgcolor="#AFEEEE" align='center'><h3><label>REPARADA:</label>
              <select class="reparada" name="reparada" id="reparada" style=" font-size: 16pt">
                <option value="">---</option>
                <option value='SI'>SI</option>
                <option value='NO'>NO</option>
              </select></h3>
            </td>
            <td bgcolor="#AFEEEE" colspan='2' align='center'><h3><label>AJUSTE EFICAZ A LA 1a.?:</label>
              <select class="ajuste" name="ajuste" id="ajuste" style=" font-size: 16pt">
                <option value="">---</option>
                <option value='SI'>SI</option>
                <option value='NO'>NO</option>
              </select></h3>
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
            <a class="boton_2" name="boton_2" href="/produccion/TallerMecanicoInt.php"><img src='/produccion/img/cancelar.png' width='20' height='20' class='zoom'/>CANCELAR</a>
            <button type='submit'  class='boton_1'><img src='/produccion/img/guardar.png' width='20' height='20' class='zoom'/>GUARDAR</button>
          </div>
        <br><br><br>
      </form>
   </body>
 </html>
 <?php
}

$conexion ->close(); ?>
