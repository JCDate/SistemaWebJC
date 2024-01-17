<?php
  header("Content-Type: text/html;charset=utf-8");

  $salida = "";

  if (!($conexion = mysqli_connect("localhost", "root", "" ))){
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db($conexion, "jc_mysql"))){
    echo "Error seleccionando la base de datos.";
    exit();
  }

  mysqli_set_charset($conexion,"UTF8");

  $id = $_POST['id'];
  $orden = $_POST['orden'];
  $componente = $_POST['componente'];
  $inspector = $_POST['inspector'];
  $fechaEntrada = $_POST['fechaEntrada'];
  $cunete = $_POST['cuñete'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>INSPECCION</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  </head>
  <body bgcolor="#AED6F1" >
    <style type="text/css">
      img.izquierda {
        float: left;
      }
    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='125' height='125' />
    <form  method="post" action="EliminarInspeccion.php">
      <center><font style=" font-size: 20pt;">
      <br>
      <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em; font-size: 20pt; text-align: center;" >El siguiente registro se eliminará ¿Estás de acuerdo?</font></center>
      <br><br><br>
      <a class="boton" target="_blank"> ID: <input type="text" name="id" id="id" value="<?php echo $id ?>" style=" font-size: 25pt; width:15%; border-color: #2e518b; color: inherit; background-color: #2e518b; border-style:solid" readonly></a> <br><br>
      <a class="boton" target="_blank"> ORDEN: <input type="text" name="orden" id="orden" value="<?php echo $orden ?>" style=" font-size: 25pt; width:17%; border-color: #2e518b; color: inherit; background-color: #2e518b; border-style:solid" readonly></a> <br><br>
      <a class="boton" target="_blank"> COMPONENTE: <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" style=" font-size: 25pt; width:17%; border-color: #2e518b; color: inherit; background-color: #2e518b; border-style:solid" readonly></a><br><br>
      <a class="boton" target="_blank"> INSPECTOR: <input type="text" name="inspector" id="componente" value="<?php echo $inspector ?>" style=" font-size: 25pt; width:17%; border-color: #2e518b; color: inherit; background-color: #2e518b; border-style:solid" readonly></a><br><br>
      <a class="boton" target="_blank"> FECHA SOLICITADA: <input type="text" name="fechaEntrada" id="fechaEntrada" value="<?php echo $fechaEntrada ?>" style=" font-size: 25pt; width:17%; border-color: #2e518b; color: inherit; background-color: #2e518b; border-style:solid" readonly></a><br><br>
      <a class="boton" target="_blank"> CUÑETE: <input type="text" name="cuñete" id="cuñete" value="<?php echo $cunete ?>" style=" font-size: 25pt; width:17%; border-color: #2e518b; color: inherit; background-color: #2e518b; border-style:solid" readonly></a><br><br>
      </font></center>
      <style type="text/css">
        .boton {
          margin-left: 30%;
          border: 1px solid #2e518b; /*anchura, estilo y color borde*/
          padding: 10px; /*espacio alrededor texto*/
          background-color: #2e518b; /*color botón*/
          color: #ffffff; /*color texto*/
          text-decoration: none; /*decoración texto*/
          text-transform: uppercase; /*capitalización texto*/
          font-family: 'Helvetica', sans-serif; /*tipografía texto*/
          border-radius: 50px; /*bordes redondos*/
        }

       .boton2 {
         border: 1px solid #4484D0; /*anchura, estilo y color borde*/
         padding: 10px; /*espacio alrededor texto*/
         background-color: #4484D0; /*color botón*/
         color: #ffffff; /*color texto*/
         text-decoration: none; /*decoración texto*/
         text-transform: uppercase; /*capitalización texto*/
         font-family: 'Helvetica', sans-serif; /*tipografía texto*/
         border-radius: 50px; /*bordes redondos*/
       }
       .boton_1{
         text-decoration: none;
         padding: 3px;
         padding-left: 10px;
         padding-right: 10px;
         font-family: helvetica;
         font-weight: 300;
         font-size: 40px;
         font-style: italic;
         color: #006505;
         background-color: #3498DB;
         border-radius: 20px;
         border: 5px double #006505;
       }
       .boton_1:hover{
         opacity: 0.6;
         text-decoration: none;
       }
       .boton_2{
         text-decoration: none;
         padding: 5px;
         padding-left: 10px;
         padding-right: 10px;
         font-family: helvetica;
         font-weight: 300;
         font-size: 40px;
         font-style: italic;
         color: #DA0E0B;
         background-color: #3498DB;
         border-radius: 20px;
         border: 5px double #DA0E0B;
         }
       .boton_2:hover{
         opacity: 0.6;
         text-decoration: none;
       }
      </style>
      <div align='center'>
        <a class="boton_1" name="boton_1" href="/produccion/InspeccionInt.php"><img src='/produccion/img/atras.png' width='40' height='40' class='zoom'/>No, Cancelar</a>
        <button type='submit'  class='boton_2'><img src='/produccion/img/cancelar.png' width='40' height='40' />Si, Eliminar</button>
      </div>
     </form>
   </body>
 </html>
 <?php
   $conexion ->close(); ?>
