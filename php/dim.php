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
  //Mostrar datos de la tabla
  $query = "SELECT * FROM dim ORDER BY componente ASC";


  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	* FROM dim WHERE componente LIKE '%".$q."%' OR cr LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);

  if ($result -> num_rows > 0) {
    $salida .="<form  action='dibujos.php' method='post'><table border='1' overflow='scroll' height='100%' width='100%' bgcolor='black' id='troqueles'>
          <thead>
          <tr>
            <th bgcolor='#c07500'>COMPONENTE</th>
            <th bgcolor='#c07500'>C/R</th>
            <th bgcolor='#c07500'>CALIBRE</th>
            <th bgcolor='#c07500'>DIAM. EXTERIOR</th>
            <th bgcolor='#c07500'>DIAM. INTERIOR</th>
            <th bgcolor='#c07500'>ALTURA</th>
            <th bgcolor='#c07500'>VER</th>
          </tr>
          </thead>
          <tbody>";

    while ($fila = $result  -> fetch_assoc()){
      if ($fila['cr'] != '0' ) {
        $salida .="<tr>
                <th bgcolor='#c07500'>".$fila['componente']."</th>
                <td bgcolor='#e7b000' align='center'>".$fila['cr']."</td>
                <td bgcolor='#e7b000'>".$fila['calibre']."</td>
                <td bgcolor='#e7b000'>".$fila['diaEx']."</td>
                <td bgcolor='#e7b000'>".$fila['diaInt']."</td>
                <td bgcolor='#e7b000'>".$fila['altura']."</td>
                <td bgcolor='#e7b000' align='center'>
                  <button type='submit' style='background-color:#e7b000; border-color:#e7b000; border:0;' class='btn btn-info btn_add'><img src='img/ver2.png' width='30' height='30' class='zoom'/></button>
                </td>
                </tr> </form>";
      }else {
        $salida .="<tr>
                <th bgcolor='#c07500'>".$fila['componente']."</th>
                <td bgcolor='#e7b000' align='center'>".$fila['cr']."</td>
                <td bgcolor='#e7b000'>".$fila['calibre']."</td>
                <td bgcolor='#e7b000'>".$fila['diaEx']."</td>
                <td bgcolor='#e7b000'>".$fila['diaInt']."</td>
                <td bgcolor='#e7b000'>".$fila['altura']."</td>
                <td bgcolor='#e7b000' align='center'>

                </td>
                </tr> </form>";
      }
    }
    $salida .="</tbody></table>";

  } else {
    $salida .= "No hay dato";
  }

  echo $salida;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style type="text/css">
    img.zoom {

       -webkit-transition: all .2s ease-in-out;
       -moz-transition: all .2s ease-in-out;
       -o-transition: all .2s ease-in-out;
       -ms-transition: all .2s ease-in-out;
     }

     .transition {
       -webkit-transform: scale(1.8);
       -moz-transform: scale(1.8);
       -o-transform: scale(1.8);
       transform: scale(1.8);
     }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
       $(document).ready(function(){
           $('.zoom').hover(function() {
               $(this).addClass('transition');
           }, function() {
               $(this).removeClass('transition');
           });
       });
     </script>
    <script type="text/javascript">
        $(".btn_add").on("click", function() {

        var componente = $(this).closest('tr').children()[0].textContent;

        $("#componente").val(componente);

        });
    </script>
    <title></title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>
      <input type="text" name="componente" id="componente"  readonly  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid"><br>
  </body>
</html>
<?php
  $conexion ->close();

?>
