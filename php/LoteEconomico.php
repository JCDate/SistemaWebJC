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

$query = "SELECT * FROM consumoyantecedentes WHERE 1";

if (isset($_POST['consulta'])) {
  $q = $conexion -> real_escape_string($_POST['consulta']);
  $query = "SELECT * FROM consumoyantecedentes WHERE componente_CA LIKE '%".$q."%'";
}

$result = $conexion -> query($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>LOTE ECONOMICO</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    <script type="text/javascript">
        $(".btn_add").on("click", function() {
        var componente= $(this).closest('tr').children()[0].textContent;

        $("#componente").val(componente);

        });
    </script>
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
  </head>
  <body>
    <form  action='' method='post'>
  <?php if($result -> num_rows > 0) {?>
         <table border='1' overflow='scroll' height='100%' width='100%' id='almacenMP'>
            <thead>
            <tr>
              <th bgcolor='#5DADE2'><font size=5>COMPONENTE</font></th>
              <th bgcolor='#5DADE2'><font size=5>ENTRADA</font></th>
              <th bgcolor='#5DADE2'><font size=5>SALIDA</font></th>
            </tr>
            </thead>
            <tbody>
      <?php  while ($fila = $result  -> fetch_assoc()){ ?>
            <tr>
              <th bgcolor='#5DADE2' align='center'><font size=5><?php  echo $fila['componente_CA'];?></font></th>
              <td bgcolor='#AED6F1' align='center'><button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/EntradaLoteEcon.php';this.form.submit();"><img src='img/Entrada.png' width='40' height='40' class='zoom'/></button></td>
              <td bgcolor='#AED6F1' align='center'><button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/SalidaLoteEcon.php';this.form.submit();"><img src='img/Salida.png' width='70' height='50' class='zoom'/></button></td>
            </tr>
    <?php  }?>
          </tbody>
        </table>
        <input type='text' name='componente' id='componente'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
  <?php } ?>
    </form>
    </h3>
  </body>
</html>

<?php   $conexion ->close(); ?>
