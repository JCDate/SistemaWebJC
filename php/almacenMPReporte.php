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

  $query = "SELECT orden, componente, fecha, solicitante FROM almacenmp  WHERE solicitante IS NOT NULL ORDER BY CONCAT(SUBSTRING_INDEX(fecha , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fecha , '/', 2), '/', -1),SUBSTRING_INDEX(fecha , '/', 1)) DESC";

  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	orden, componente,fecha, solicitante FROM almacenmp WHERE componente LIKE '%".$q."%' AND solicitante IS NOT NULL OR orden LIKE '%".$q."%' AND solicitante IS NOT NULL OR fecha LIKE '%".$q."%' AND solicitante IS NOT NULL";
  }

  $result = $conexion -> query($query);

  if($result -> num_rows > 0) {
    $salida .="<form  action='php/ReporteAlmacenMP.php' method='post'><table border='1'  align='center' overflow='scroll' height='100%' width='100%' id='almacenMP'>
          <thead>
          <tr>
            <th bgcolor='#85C1E9'>ORDEN</th>
            <th bgcolor='#85C1E9'>COMPONENTE</th>
            <th bgcolor='#85C1E9'>FECHA</th>
            <th bgcolor='#85C1E9'>SOLICITANTE</th>
            <th bgcolor='#85C1E9'>ACCIÓN</th>
          </tr>
          </thead>
          <tbody>";

    while ($fila = $result  -> fetch_assoc()){
        $salida .="<tr>
                <th bgcolor='#85C1E9'>".$fila['orden']."</th>
                <td bgcolor='#AED6F1' align='center'>".$fila['componente']."</td>
                <td bgcolor='#AED6F1'>".$fila['fecha']."</td>
                <td bgcolor='#AED6F1'>".$fila['solicitante']."</td>
                <td bgcolor='#AED6F1' align='center'>
                    <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='img/ver2.png' width='30' height='30' class='zoom'/></button>
                </td>
                </tr></form>";
    }
    $salida .="</tbody></table>";

  } else {
    $salida .= "No hay ordenes";
  }

  echo $salida;

  $query6 = "SELECT nombre FROM troqueladores WHERE puesto='TROQUELADOR' OR puesto='INSTALADOR' ORDER BY nombre ASC";
  $result6 = $conexion -> query($query6);

  $conexion ->close();

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
    <script type="text/javascript">
        $(".btn_add").on("click", function() {
        var orden = $(this).closest('tr').children()[0].textContent;
        var componente = $(this).closest('tr').children()[1].textContent;
        var solicitante= $(this).closest('tr').children()[3].textContent;

        var orden1 = $(this).closest('tr').children()[0].textContent;
        var componente1= $(this).closest('tr').children()[1].textContent;
        var solicitante1= $(this).closest('tr').children()[3].textContent;

        $("#orden").val(orden);
        $("#componente").val(componente);
        $("#solicitante").val(solicitante);
        $("#orden1").val(orden1);
        $("#componente1").val(componente1);
        $("#solicitante1").val(solicitante1);

        });
    </script>
    <title>Almacen M. P.</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>
    <input type="text" name="orden1" id="orden1"  readonly style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid">
    <input type="text" name="componente1" id="componente1" readonly style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid" >
    <input type="text" name="solicitante1" id="solicitante1" readonly style="background-color:#AED6F1; color:#AED6F1; border-color:#AED6F1; border-style:solid" >

  </body>
</html>
