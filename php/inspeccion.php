<?php

header("Content-Type: text/html;charset=utf-8");
$salida = "";
if(!($conexion = mysqli_connect("localhost", "root", "" )))
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

//BUSCAR
  $query = "SELECT DISTINCT orden, item_cliente,piezasEntregar FROM analisisatrasos";
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT DISTINCT orden, item_cliente,piezasEntregar FROM analisisatrasos WHERE  item_cliente LIKE '%".$q."%' OR orden LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);

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

           var orden= $(this).closest('tr').children()[0].textContent;
           var componente = $(this).closest('tr').children()[1].textContent;
           var cantidadPzs  = $(this).closest('tr').children()[2].textContent;

           $("#componente").val(componente);
           $("#orden").val(orden);
           $("#cantidadPzs").val(cantidadPzs);

           });
       </script>
    <title>Atrasos</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>
    <form id='frm' action="" method="post">
        <?php  if($result -> num_rows > 0) {?>
                <table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black'><thead>
                <tr>
                  <th bgcolor='#85C1E9' style=" font-size: 32pt;">ORDEN</th>
                  <th bgcolor='#85C1E9' style=" font-size: 32pt;">COMPONENTE</th>
                  <th bgcolor='#85C1E9' style=" font-size: 32pt;">PZS</th>
                </tr>
                </thead>
                <tbody>
        <?php while ($fila = $result  -> fetch_assoc()){?>
                <tr>
                  <th bgcolor='#85C1E9'><button type='submit' style='background-color:#85C1E9; border-color:#85C1E9; color: inherit;  border: 0;  font-size: 30pt' class='btn btn-info btn_add' onclick="this.form.action='php/InspeccionPlaneacion.php';this.form.submit(); " ><u><?php echo $fila['orden']?></u></button></th>
                  <td bgcolor= '#AED6F1' align='center' style=" font-size: 30pt;"><?php echo $fila['item_cliente'] ?></td>
                  <td bgcolor= '#AED6F1' align='center' style=" font-size: 30pt;"><?php echo $fila['piezasEntregar'] ?></td>
                </tr>
        <?php  } ?>
               </tbody>
             </table>
      <?php }?>
          <input type='text' name='orden' id='orden'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='componente' id='componente'  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='cantidadPzs' id='cantidadPzs'  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
    </form>
    <style type="text/css">
    .boton {
        border: 1px solid #2e518b; /*anchura, estilo y color borde*/
        padding: 10px; /*espacio alrededor texto*/
        background-color: #2e518b; /*color botón*/
        color: #ffffff; /*color texto*/
        text-decoration: none; /*decoración texto*/
        text-transform: uppercase; /*capitalización texto*/
        font-family: 'Helvetica', sans-serif; /*tipografía texto*/
        border-radius: 50px; /*bordes redondos*/
        }
    </style>
  </body>
</html>
