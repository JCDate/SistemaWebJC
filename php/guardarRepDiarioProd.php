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
$cr = $_POST['cr'];
$cantSol = $_POST['cantSol'];
$fecha = $_POST['fecha'];
$operador = $_POST['operador'];
$maquina = $_POST['maquina'];
$actividad = $_POST['actividad'];
$op = $_POST['op'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$cantProd = $_POST['cantProd'];
$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];

$newDate = date("d/m/Y", strtotime($fecha));

date_default_timezone_set('America/Mexico_City');
$fechaActual = date('d/m/Y  h:i:s a', time());


if (isset($_POST["operador"]) AND $_POST["operador"] AND isset($_POST["maquina"]) AND $_POST["maquina"] AND
   isset($_POST["actividad"]) AND $_POST["actividad"]!='MONTAJE' OR $_POST["actividad"]!='MONTAJE - DESMONTA' OR $_POST["actividad"]!='DESMONTA'
   AND isset($_POST["op"]) AND $_POST["op"] AND
   isset($_POST["inicio"]) AND $_POST["inicio"] AND isset($_POST["fin"]) AND $_POST["fin"] AND
   isset($_POST["cantProd"]) AND $_POST["cantProd"]){

     $consulta = "INSERT INTO repdiprod(orden,componente,cr,contS,fecha,operador,noMaquina,actividad,operacion,inicio,fin,cantProd,comentario) VALUES('$orden','$componente','$cr','$cantSol','$newDate','$operador','$maquina','$actividad','$op','$inicio','$fin','$cantProd','$comentario')";
       $result = $conexion -> query($consulta);


     $query1 = "SELECT SUM(cantProd) AS suma FROM repdiprod WHERE orden = '$orden' AND operacion = '$op'";
     $result1 = $conexion -> query($query1);
     $fila1= $result1  -> fetch_assoc();

     $suma = $fila1['suma'];

     $consulta =  "UPDATE repdiprod SET cantParcial = '$suma' WHERE orden = '$orden' AND operacion = '$op' AND id= id";
      $result = $conexion -> query($consulta);

     echo "<center><h1>Datos Guardados<h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
        </form>";
   }elseif (isset($_POST["operador"]) AND $_POST["operador"] AND isset($_POST["maquina"]) AND $_POST["maquina"] AND
      isset($_POST["actividad"]) AND $_POST["actividad"]=='MONTAJE' OR $_POST["actividad"]=='MONTAJE - DESMONTA' OR $_POST["actividad"]=='DESMONTA'
      AND isset($_POST["op"]) AND $_POST["op"] AND
      isset($_POST["inicio"]) AND $_POST["inicio"] AND isset($_POST["fin"]) AND $_POST["fin"]){

        $consulta = "INSERT INTO repdiprod(orden,componente,cr,contS,fecha,operador,noMaquina,actividad,operacion,inicio,fin,cantProd,comentario) VALUES('$orden','$componente','$cr','$cantSol','$newDate','$operador','$maquina','$actividad','$op','$inicio','$fin','0','$comentario')";
          $result = $conexion -> query($consulta);

        echo "<center><h1>Datos Guardados<h1>";
          echo "<form action='/produccion/atrasosProduccion.php' method='post'>
               <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
           </form>";
      }else{
        echo "<center><h2>ERROR. DATOS NO GUARDADOS</h2>";
        echo "<br>";
        echo "<form action='/produccion/php/EditarRepDiarioProd.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
         </form></center>";
      }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR REP. DIARIO PROD.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">

   </body>
 </html>
