<?php
  header("Content-Type: text/html;charset=utf-8");
  $salida = "";
  if(!($conexion = mysqli_connect("localhost", "root", "" )))
  {
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db( $conexion, "jc_mysql")))
  {
    echo "Error seleccionando la base de datos.";
    exit();
  }
  mysqli_set_charset($conexion,"UTF8");

  $query = "SELECT * FROM ubicaciontroquel ORDER BY troquel ASC";
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT troquel, ubicacion FROM ubicaciontroquel WHERE troquel LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);

  if ($result -> num_rows > 0) {
    $salida .="<table border='1' overflow='scroll' height='100%' width='100%' bgcolor='black' id='troqueles' >
          <thead>
          <tr>
            <th bgcolor='#00a741'>TROQUEL</th>
            <th bgcolor='#00a741'>UBICACIÓN</th>
          </tr>
          </thead>
          <tbody>";

    while ($fila = $result  -> fetch_assoc()){
        $salida .="<tr>
                <th bgcolor='#00a741' align='center'>".$fila['troquel']."</th>
                <td bgcolor='#00d13e' align='center'>".$fila['ubicacion']."</td>
                </tr>";
    }
    $salida .="</tbody></table>";

  }else {
    $salida .= "No hay dato";
  }

  echo $salida;

  $conexion ->close();

?>
