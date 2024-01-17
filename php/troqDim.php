          <?php
            header("Content-Type: text/html;charset=utf-8");
            $salida = "";
            if (!($conexion = mysqli_connect("localhost", "root", "" )))
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

            $query = "SELECT * FROM troqueles ORDER BY componente ASC, numOperaciones ASC";
            if (isset($_POST['consulta'])) {
              $q = $conexion -> real_escape_string($_POST['consulta']);
              $query = "SELECT componente, numOperaciones,caja, troquel,opciones,maquinaOp FROM troqueles WHERE componente LIKE '%".$q."%' OR troquel LIKE '%".$q."%' OR opciones LIKE '%".$q."%' ORDER BY componente ASC, numOperaciones ASC";
            }

            $result = $conexion -> query($query);

            if ($result -> num_rows > 0) {
              $salida .="<table border='1' overflow='scroll' height='100%' width='100%'  bgcolor='black'  id='troqueles'>
                    <thead>
                    <tr >
                      <th bgcolor='#1E90FF'>COMPONENTE</th>
                      <th bgcolor='#1E90FF'>NUM. OPERACIÓN</th>
                      <th bgcolor='#1E90FF'>CAJA</th>
                      <th bgcolor='#1E90FF'>TROQUEL</th>
                      <th bgcolor='#1E90FF'>OPCIONES</th>
                      <th bgcolor='#1E90FF'>MAQUINA OP.</th>
                    </tr>
                    </thead>
                    <tbody>";

              while ($fila = $result  -> fetch_assoc()){
                  $salida .="<tr>
                          <th bgcolor='#0191ff'>".$fila['componente']."</th>
                          <td bgcolor='#52afff' align='center'>".$fila['numOperaciones']."</td>
                          <td bgcolor='#52afff'>".$fila['caja']."</td>
                          <td bgcolor='#52afff' align='center'>".$fila['troquel']."</td>
                          <td bgcolor='#52afff'>".$fila['opciones']."</td>
                          <td bgcolor='#52afff'>".$fila['maquinaOp']."</td>
                          </tr>";
              }
              $salida .="</tbody></table>";

            }else {
              $salida .= "No hay dato";
            }

            echo $salida;

            $conexion ->close();
        ?>
