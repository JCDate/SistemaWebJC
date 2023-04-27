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

  $componente = $_POST['componente'];
  $parte10 = $_POST['parte10'];


if($componente and  $parte10){

    $consulta = "SELECT MAX(no) AS res FROM descripcion2pc WHERE componente='$componente' AND noPartesP='$parte10'";
      $result = $conexion -> query($consulta);
      $fila = $result  -> fetch_assoc();

      $res= $fila['res'];

      $consulta2 = "DELETE FROM descripcion2pc WHERE componente='$componente' AND noPartesP='$parte10' AND no='$res'";
        $result2 = $conexion -> query($consulta2);

      $consulta3 = "DELETE FROM descripcion3pc WHERE componente='$componente' AND noPartesP='$parte10' AND no='$res'";
        $result3 = $conexion -> query($consulta3);
  }

  $conexion ->close();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>PLAN DE CONTROL</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body align="center" bgcolor="#AED6F1">
     <center><h1>ACTIVIDAD ELIMINADA<h1>
      <form action='GenerarPCM.php' method='post'>
          <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button> <br><br>
            <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" readonly style="background-color:#AED6F1;  border-color:#AED6F1; border-style:solid; color:#AED6F1; ">
            <input type="text" name="parte10" id="parte10" value="<?php echo $parte10 ?>" readonly style="background-color:#AED6F1;  border-color:#AED6F1; border-style:solid; color:#AED6F1; ">
      </form>
    </center>
   </body>
 </html>
