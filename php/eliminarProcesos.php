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

  $componente = $_POST['componente'];

  function numProceso($componente){
  if($componente == '0010') $res = '';
    else if($componente == '0020') $res = '0010';
    else if($componente == '0030') $res = '0020';
    else if($componente == '0040') $res = '0030';
    else if($componente == '0050') $res = '0040';
    else if($componente == '0060') $res = '0050';
    else if($componente == '0070') $res = '0060';
    else if($componente == '0080') $res = '0070';
    else if($componente == '0090') $res = '0080';
    else if($componente == '0100') $res = '0090';
    else if($componente == '0110') $res = '0100';
    else if($componente == '0120') $res = '0110';
    else if($componente == '0130') $res = '0120';
    else if($componente == '0140') $res = '0130';
    else if($componente == '0150') $res = '0140';
    else if($componente == '0160') $res = '0150';
    else if($componente == '0170') $res = '0160';
    else if($componente == '0180') $res = '0170';
    else if($componente == '0190') $res = '0180';
    else if($componente == '0200') $res = '0190';
    return $res;
  }

  $queryTotalProceso = "SELECT totalProceso FROM iniciopc WHERE componente='$componente'";
  $resultTotalProceso = $conexion -> query($queryTotalProceso);
  if ($resultTotalProceso -> num_rows > 0) {
    $fila = $resultTotalProceso -> fetch_assoc();
    $proceso = $fila['totalProceso'];
    $nuevaCantidad = numProceso($proceso);
    $upDateNumProcesos = "UPDATE iniciopc SET totalProceso='$nuevaCantidad' WHERE componente='$componente' AND totalProceso='$proceso'";

    $delDesc1 = "DELETE FROM descripcion1pc WHERE componente='$componente' AND noPartesP='$proceso'";
    $delDesc2 = "DELETE FROM descripcion2pc WHERE componente='$componente' AND noPartesP='$proceso'";
    $delDesc3 = "DELETE FROM descripcion3pc WHERE componente='$componente' AND noPartesP='$proceso'";

    $resultUpDate = $conexion -> query($upDateNumProcesos);
    $resultDelDesc1 = $conexion -> query($delDesc1);
    $resultDelDesc2 = $conexion -> query($delDesc2);
    $resultDelDesc3 = $conexion -> query($delDesc3);

    echo "<center><h1>Datos Eliminados Correctamente<h1>";
      echo "<form action='/produccion/ComponentesPCInt.php' method='post'>
           <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
       </form>";
  }
?>
