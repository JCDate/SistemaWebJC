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

$id= $_POST['id'];
$orden = $_POST['orden'];
$componente = $_POST['componente'];
$fechaSal = $_POST['fechaSal'];
$cantidadPzs = $_POST['pzs'];
$def = $_POST['def'];
$pzsDef = $_POST['pzsDef'];
$ins = $_POST['ins'];


if (isset($_POST["orden"]) AND $_POST["orden"] AND isset($_POST["componente"]) AND $_POST["componente"] AND isset($_POST["def"]) AND $_POST["def"] !='R. OTRO'){

     $consulta =  "UPDATE inspeccion SET  fecha='$fechaSal', tipoDef='$def', cantPzsDef='$pzsDef' ,inspeccion='$ins'  WHERE orden = '$orden'  AND id= '$id'";
      $result = $conexion -> query($consulta);

      $consulta =  "UPDATE inspeccion SET NoOp = (SELECT operacion FROM defectoins WHERE componente='$componente' AND defecto='$def') WHERE id='$id'";
       $result = $conexion -> query($consulta);

       $consulta1 = "SELECT NoOp FROM inspeccion WHERE id = '$id'";
       $result1 = $conexion -> query($consulta1);
       $fila1 = $result1  -> fetch_assoc();

      $op =$fila1['NoOp'];

      $consulta =  "UPDATE inspeccion SET operador = (SELECT GROUP_CONCAT(operador SEPARATOR ', ') AS operador FROM repdiprod WHERE orden='$orden' AND operacion='$op') WHERE id='$id'";
       $result = $conexion -> query($consulta);

       $consulta = "UPDATE inspeccion SET maquina = (SELECT GROUP_CONCAT(noMaquina  SEPARATOR ', ') AS noMaquina FROM repdiprod WHERE orden='$orden' AND operacion='$op') WHERE id='$id'";
         $result = $conexion -> query($consulta);

      //Almacen Inpeccion

       $consulta = "SELECT existencia FROM almaceninspeccion WHERE componente = '$componente'";
       $result = $conexion -> query($consulta);
       $fila = $result  -> fetch_assoc();

       $res = $fila['existencia'] + $cantidadPzs;


       $consulta =  "UPDATE almaceninspeccion SET entrada='$cantidadPzs', existencia ='$res', fechaEntrada='$fechaSal'  WHERE componente = '$componente'";
        $result = $conexion -> query($consulta);


     echo "<center><h1>Datos Guardados<h1>";
       echo "<form action='/Inspeccion/InspeccionInt.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
        </form>";
   }elseif (isset($_POST["orden"]) AND $_POST["orden"] AND isset($_POST["componente"]) AND $_POST["componente"] AND isset($_POST["def"]) AND $_POST["def"] =='R. OTRO') {
        $otro = $_POST['otro'];
        $consulta =  "UPDATE inspeccion SET fecha='$fechaSal', tipoDef='$otro', cantPzsDef='$pzsDef',inspeccion='$ins'  WHERE orden = '$orden'  AND id= '$id'";
         $result = $conexion -> query($consulta);

          $consulta =  "UPDATE inspeccion SET NoOp = (SELECT operacion FROM defectoins WHERE componente='$componente' AND defecto='$def') WHERE id='$id'";
           $result = $conexion -> query($consulta);

           $consulta1 = "SELECT NoOp FROM inspeccion WHERE id = '$id'";
           $result1 = $conexion -> query($consulta1);
           $fila1 = $result1  -> fetch_assoc();

          $op =$fila1['NoOp'];

          $consulta =  "UPDATE inspeccion SET operador = (SELECT GROUP_CONCAT(operador SEPARATOR ', ') AS operador FROM repdiprod WHERE orden='$orden' AND operacion='$op') WHERE id='$id'";
           $result = $conexion -> query($consulta);

           $consulta = "UPDATE inspeccion SET maquina = (SELECT GROUP_CONCAT(noMaquina  SEPARATOR ', ') AS noMaquina FROM repdiprod WHERE orden='$orden' AND operacion='$op') WHERE id='$id'";
             $result = $conexion -> query($consulta);

            //Almacen Inpeccion

             $consulta = "SELECT existencia FROM almaceninspeccion WHERE componente = '$componente'";
             $result = $conexion -> query($consulta);
             $fila = $result  -> fetch_assoc();

             $res = $fila['existencia'] + $cantidadPzs;

             $consulta =  "UPDATE almaceninspeccion SET entrada='$cantidadPzs', existencia ='$res', fechaEntrada='$fechaSal'  WHERE componente = '$componente'";
              $result = $conexion -> query($consulta);

         echo "<center><h1>Datos Guardados<h1>";
           echo "<form action='/Inspeccion/InspeccionInt.php' method='post'>
                <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
            </form>";
   }else{
        echo "<center><h2>ERROR. DATOS NO GUARDADOS</h2>";
        echo "<br>";
        echo "<form action='/Inspeccion/InspeccionInt.php' method='post'>
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
