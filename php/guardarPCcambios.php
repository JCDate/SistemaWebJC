<?php
  require_once '../conexion.php'; // Se añade el archivo para la conexión y la configuración de la sesión

  // Se obtiene la información de los formularios
  $componente = $_POST['componente'];
  $nivelRev = $_POST['nivelRev'];
  $fechaRev = $_POST['fechaRev'];
  $nivelParC = $_POST['nivelParC'];
  $fechaParC = $_POST['fechaParC'];
  $nivelParJC = $_POST['nivelParJC'];
  $fechaeParJC = $_POST['fechaeParJC'];
  $nivCambio = $_POST['nivCambio'];

  // Actualizar información en la tabla 'iniciopc'
  $consulta = "UPDATE iniciopc SET nivelRev = ?, fechaRev = ?, nivelParC = ?, fechaParC = ?, nivelParJC = ?, fechaeParJC = ? WHERE componente = ?";
  $stmt = $conexion -> prepare($consulta);
  $stmt -> bind_param("sssssss", $nivelRev, $fechaRev, $nivelParC, $fechaParC, $nivelParJC, $fechaeParJC, $componente);
  $stmt -> execute();
  $stmt -> close();

  // Actualizar la información de los cambios
  if (isset($_POST['registros']) && is_array($_POST['registros'])) {
    foreach ($_POST['registros'] as $registro) {
      $id = $registro['id'];
      $cambM = $registro['cambM'];
      $fechaM = $registro['fechaM'];
      //$fechaEmF = date("d/m/Y", strtotime($fechaM));

      $sql = "UPDATE cambiopc SET cambio = ?, fecha = ? WHERE componente = ? AND id = ?";
      $stmt = $conexion -> prepare($sql);
      $stmt -> bind_param("ssss", $cambM, $fechaM, $componente, $id);
      $stmt -> execute();
      $stmt -> close();
    }
  }

  if ($nivCambio > 0) {
    // Insertar nuevos registros en 'cambiopc'
    for ($i = 1; $i <= $nivCambio; $i++) {
      $camb = $_POST['camb' .$i];
      $fechaF = date("d/m/Y", strtotime($_POST['fecha' .$i]));

      $sql = "INSERT INTO cambiopc (componente, cambio, fecha) VALUES (?, ?, ?)";
      $stmt = $conexion -> prepare($sql);
      $stmt -> bind_param("sss", $componente, $camb, $fechaF);
      $stmt -> execute();
      $stmt -> close();
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
      <form action='GenerarPCM.php' method='post'>
        <button type='submit' style='background-color: #AED6F1; border-color: #AED6F1; border: 0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button><br><br>
        <input type="text" name="componente" id="componente" value="<?php echo $componente ?>" style="background-color: #AED6F1; border-color: #AED6F1; border-style: solid; color: #AED6F1;" readonly/>
      </form>
    </center>
  </body>
</html>
