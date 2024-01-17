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


  $query = "SELECT componente_CA,pesoPzs FROM consumoyantecedentes ORDER BY componente_CA ASC";

  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	componente_CA,pesoPzs FROM consumoyantecedentes WHERE componente_CA LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);


  if ($result -> num_rows > 0) {
    $salida .=" <form  action='php/guardarPesoPzs.php' method='post'> <table border='1' overflow='scroll' height='100%' width='100%' bgcolor='#D6DBDF' id='troqueles'>
          <thead>
          <tr>
            <th bgcolor='#00BFFF'>COMPONENTE</th>
            <th bgcolor='#00BFFF'>PESO POR PZS</th>
            <th bgcolor='#00BFFF'>GUARDAR</th>
          </tr>
          </thead>
          <tbody>";

    while($fila = $result  -> fetch_assoc()){

          $salida .="<tr>
                  <th bgcolor='#00BFFF'>".$fila['componente_CA']."</th>
                  <td bgcolor='#B0E0E6' align='center'><input type='number' step='any' name='pesoporpzs1'  id='pesoporpzs1' value='".$fila['pesoPzs']."' style='font-size:12px;'></td>
                  <th bgcolor='#B0E0E6' align='center'><button type='submit' style='background-color:#B0E0E6 ; border-color:#B0E0E6; border:0;' class='btn btn-info btn_add'><img src='img/guardar.png' width='30' height='30' class='zoom'/></button></th>
                  </tr> ";

    }
    $salida .="</tbody></table>
    <input type='text' name='componente' id='componente' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly >
    <input type='text' name='pesoporpzs' id='pesoporpzs' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly></form>";

  } else {
    $salida .= "Sin Ordenes";
  }


    echo $salida;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
    <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
    <script type="text/javascript" >
        $(".btn_add").on("click", function() {
        var componente = $(this).closest('tr').children()[0].textContent;
        $("#componente").val(componente);

        });

        $(document).ready(function () {
            $("#pesoporpzs1").keyup(function () {
                var value = $(this).val();
                $("#pesoporpzs").val(value);
            });
        });
    </script>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="jspdf.plugin.autotable.min.js"></script>

    <title></title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body >

  </body>
</html>
<?php    $conexion ->close(); ?>
