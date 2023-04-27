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

  $query = "SELECT * FROM loteeconomico WHERE 1 ORDER BY componente ASC";

  //Consultar
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM loteeconomico WHERE embarque.componente LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Embarque</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">

    <script type="text/javascript">
    $(document).ready(function(){
        $(':checkbox[readonly=readonly]').click(function(){
          return false;
        });
    })
    </script>
    <script type="text/javascript">
        $(".btn_add").on("click", function() {
        var orden = $(this).closest('tr').children()[0].textContent;
        var componente = $(this).closest('tr').children()[1].textContent;
        var cantidad= $(this).closest('tr').children()[2].textContent;
        var cantidad= $(this).closest('tr').children()[2].textContent;
        var noCu= $(this).closest('tr').children()[4].textContent;
        var pesoNeto= $(this).closest('tr').children()[5].textContent;
        $("#orden").val(orden);
        $("#componente").val(componente);
        $("#cantidad").val(cantidad);
        $("#noCu").val(noCu);
        $("#pesoNeto").val(pesoNeto);

        });
    </script>
    <style type="text/css">
      .boton_1{
        text-decoration: none;
        padding: 3px;
        padding-left: 10px;
        padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 18px;
        font-style: italic;
        color: #006505;
        background-color: #3498DB;
        border-radius: 15px;
        border: 3px double #006505;
      }
      .boton_1:hover{
        opacity: 0.6;
        text-decoration: none;
      }
      .boton_2{
        text-decoration: none;
        padding: 3px;
        padding-left: 10px;
        padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 18px;
        font-style: italic;
        color: #DA0E0B;
        background-color: #3498DB;
        border-radius: 15px;
        border: 3px double #DA0E0B;
      }
      .boton_2:hover{
        opacity: 0.6;
        text-decoration: none;
      }
    </style>
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
  <body align = "center" bgcolor='#AED6F1'>
    <style type="text/css">
      img.izquierda {
        float: left;
      }
      img.derecha {
        float: right;
      }
    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='120' height='120'/>
    <div bgcolor='#AED6F1' align='right'>
      <form  action='ExcelLoteEcno.php' method='post'>
          <button id="generar" class="btn btn-default" style=" background:#AED6F1;  border-color:#AED6F1; border:0;" ><img src='/produccion/img/Excel.png' class="derecha" width='110' height='110' /></button>
      </form>
    </div>
    <br>
    <div align='center'>
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7"><n> LISTA LOTE ECONÓMICO</n></font>
    </div>
  <?php if($result -> num_rows > 0) {?>
         <table border='1' overflow='scroll' height='100%' width='100%' id='almacenMP'>
            <thead>
            <tr>
              <th bgcolor='#DC7633'><font size=5>COMPONENTE</font></th>
              <th bgcolor='#DC7633'><font size=5>CANTIDAD ACTUAL</font></th>
              <th bgcolor='#17A589'><font size=5>ENTRADA</font></th>
              <th bgcolor='#17A589'><font size=5>FECHA ENTRADA</font></th>
              <th bgcolor='#17A589'><font size=5>VERIFICADO POR</font></th>
              <th bgcolor='#E74C3C'><font size=5>SALIDA</font></th>
              <th bgcolor='#E74C3C'><font size=5>FECHA SALIDA</font></th>
              <th bgcolor='#E74C3C'><font size=5>VERIFICADO POR</font></th>
            </tr>
            </thead>
            <tbody>
      <?php  while ($fila = $result  -> fetch_assoc()){ ?>
            <tr>
              <th bgcolor='#DC7633'><font size=5><?php  echo $fila['componente'];?></font></th>
              <td bgcolor='#F0B27A' align='center'><font size=5><?php  echo $fila['cantAct'];?></font></td>
              <td bgcolor='#73C6B6' align='center'><font size=5><?php  echo $fila['entrada'];?></font></td>
              <td bgcolor='#73C6B6' align='center'><font size=5><?php  echo $fila['fechaEnt'];?></font></td>
              <td bgcolor='#73C6B6' align='center'><font size=5><?php  echo $fila['veryEnt'];?></font></td>
              <td bgcolor='#F1948A' align='center'><font size=5><?php  echo $fila['salida'];?></font></td>
              <td bgcolor='#F1948A' align='center'><font size=5><?php  echo $fila['fechaSal'];?></font></td>
              <td bgcolor='#F1948A' align='center'><font size=5><?php  echo $fila['verySal'];?></font></td>
            </tr>
    <?php  }?>
          </tbody>

        </table>
  <?php } ?>
  </body>
</html>

<?php   $conexion ->close(); ?>
