<?php
  require_once "../conexion.php";
  $id = $_POST['id'];

  $deleteTMRep = "DELETE FROM tallermecanicorep WHERE  id = ?";
  $deleteTMFalla = "DELETE FROM tallermecacicofalla WHERE id = ?";

  $stmt = $conexion -> prepare($deleteTMRep);
  $stmt -> bind_param("s",$id);
  $stmt -> execute();
  $stmt -> close();

  $stmt2 = $conexion -> prepare($deleteTMFalla);
  $stmt2 -> bind_param("s",$id);
  $stmt2 -> execute();
  $stmt2 -> close();
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DATOS DE TALLER MECANICO</title>
    <link rel="shortcut icon" href="/produccion2/img/icono.png">
  </head>
  <body bgcolor="#AED6F1">
    <center>
      <h1>Datos Eliminados Correctamente</h1>
      <form action="../TallerMecanicoInt.php" method="post">
          <button type="submit" style="background-color: #AED6F1; border-color: #AED6F1; border: 0;" name="button"><img src="/produccion2/img/ok.png"  width='80' height='80'></button><br><br>
      </form>
    </center>
  </body>
</html>
