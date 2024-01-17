<?php
require_once '../conexion.php'; // Se añade el archivo para la conexión y la configuración de la sesión

// Se obtiene la información de los formularios


// Actualizar la información de los cambios
if (isset($_POST['registros']) && is_array($_POST['registros'])) {
  foreach ($_POST['registros'] as $registro) {
    $id = $registro['id'];
    $componente = $registro['componente'];
    $fechaEntrada = $registro['fechaEntrada'];
    $descripcion = $registro['descripcion'];
    $fechaEnt = $registro['fechaEnt'];
    $reparadaP = $registro['reparadaP'];
    $turno = $registro['turno'];
    $solucion = $registro['solucion'];
    $fabricada = $registro['fabricada'];
    $reparada = $registro['reparada'];
    $eficaz = $registro['eficaz'];
    $consulta1 = "UPDATE tallermecanicorep SET fechaEnt = ?, reparadaP = ?, turno = ?, solucion = ?, fabricada = ?, reparada = ?, eficaz = ? WHERE componente = ? AND id = ?";
    $consulta2 = "UPDATE tallermecacicofalla SET fechaEntrada = ?, descripcion = ? WHERE componente = ? AND id = ?";
    $stmt = $conexion->prepare($consulta2);
    $stmt->bind_param("ssss", $fechaEntrada, $descripcion, $componente, $id);
    $stmt->execute();

    if ($stmt->errno) {
      echo "Error MySQL para consulta2: " . $stmt->error;
    }

    $stmt->close();

    $stmt2 = $conexion->prepare($consulta1);
    $stmt2->bind_param("sssssssss", $fechaEnt, $reparadaP, $turno, $solucion, $fabricada, $reparada, $eficaz, $componente, $id);
    $stmt2->execute();

    if ($stmt2->errno) {
      echo "Error MySQL para consulta1: " . $stmt2->error;
    }

    $stmt2->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>GUARDAR PC CAMBIOS</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body bgcolor="#AED6F1">
    <center>
      <h1>Datos Guardados</h1>
      <form action='../TallerMecanicoInt.php' method='post'>
        <button type='submit' style='background-color: #AED6F1; border-color: #AED6F1; border: 0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button><br><br>
        <input type="text" name="componente" id="componente" value="<?php echo $componente; ?>" style="background-color: #AED6F1; border-color: #AED6F1; border-style: solid; color: #AED6F1;" readonly/>
      </form>
    </center>
  </body>
</html>
