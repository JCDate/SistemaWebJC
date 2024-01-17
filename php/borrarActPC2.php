<?php
  require_once "../conexion.php";

  if (isset($_POST['componente'],$_POST['total'])) {
    $componente = $_POST['componente'];
    $parte10 = $_POST['total'];
  }

  if (isset($_POST['valor_i'])) {
    $valor_i = $_POST['valor_i'];

    $sqlEliminar2 = "DELETE FROM descripcion2pc WHERE no = $valor_i AND componente = $componente AND noPartesP = $parte10";
    $result1 = $conexion -> query($sqlEliminar2);

    $sqlEliminar3 = "DELETE FROM descripcion3pc WHERE no = $valor_i AND componente = $componente AND noPartesP = $parte10";
    $result2 = $conexion -> query($sqlEliminar3);

    $sqlActualizar2 = "UPDATE descripcion2pc SET no = no-1 WHERE no > $valor_i AND componente = $componente AND noPartesP = $parte10";
    $resultd2 = $conexion -> query($sqlActualizar2);

    $sqlActualizar3 = "UPDATE descripcion3pc SET no = no-1 WHERE no > $valor_i AND componente = $componente AND noPartesP = $parte10";
    $resultd3 = $conexion -> query($sqlActualizar3);
  }

  echo "<center>
          <h1>Actividad Eliminada<h1>";
  echo "<form action='GenerarPC{$parte10}M.php' method='post'>
          <button type='submit' style='display: none;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button><br>
          <input type='text' name='componente' id='componente' value='{$componente}' readonly style='display: none;'>
          <input type='text' name='parte10' id='parte10' value='{$parte10}' readonly style='display: none;'>
          <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
        </form>
        </center>";
?>
