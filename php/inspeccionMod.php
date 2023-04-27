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
  $query = "SELECT * FROM inspeccion WHERE inspector!='' AND tipoDef='' ORDER BY prioridad ='1' DESC, orden ASC";
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM inspeccion WHERE  componente LIKE '%".$q."%'  AND inspector!='' AND tipoDef='' OR orden LIKE '%".$q."%' AND inspector!='' AND tipoDef='' OR inspector LIKE '%".$q."%' AND inspector!='' AND tipoDef='' ORDER BY prioridad ='1' DESC, orden ASC";
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
           var id= $(this).closest('tr').children()[0].textContent;
           var orden= $(this).closest('tr').children()[1].textContent;
           var componente = $(this).closest('tr').children()[2].textContent;
           var inspector  = $(this).closest('tr').children()[3].textContent;

           $("#id").val(id);
           $("#componente").val(componente);
           $("#orden").val(orden);
           $("#inspector").val(inspector);

           });
       </script>
    <title>Atrasos</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body>
    <form id='frm' action="" method="post">
        <?php  if($result -> num_rows > 0) {?>
                <thead><table border='1' overflow='scroll' height='100%' width='100%' bordercolor='black'>
                <tr>
                  <th bgcolor='#85C1E9' style=" font-size: 20pt;">ID</th>
                  <th bgcolor='#85C1E9' style=" font-size: 20pt;">ORDEN</th>
                  <th bgcolor='#85C1E9' style=" font-size: 20pt;">COMPONENTE</th>
                  <th bgcolor='#85C1E9' style=" font-size: 20pt;">INSPECTOR</th>
                  <th bgcolor='#85C1E9' style=" font-size: 20pt;">FECHA SOLICITADA</th>
                  <th bgcolor='#85C1E9' style=" font-size: 20pt;">CUÑETE</th>
                  <th bgcolor='#85C1E9' style=" font-size: 20pt;">MODIFICAR</th>
                </tr>
                </thead>
                <tbody>
        <?php while ($fila = $result  -> fetch_assoc()){?>
                <tr>
          <?php if ($fila['prioridad'] == "0" ) { ?>
                  <td bgcolor= '#AED6F1' align='center' style=" font-size: 20pt;"><?php echo $fila['id'] ?></td>
                  <th bgcolor= '#85C1E9' align='center' style=" font-size: 20pt;"><?php echo $fila['orden']?></th>
                  <td bgcolor= '#AED6F1' align='center' style=" font-size: 20pt;"><?php echo $fila['componente'] ?></td>
                  <td bgcolor= '#AED6F1' align='center' style=" font-size: 20pt;"><?php echo $fila['inspector'] ?></td>
                  <td bgcolor= '#AED6F1' align='center' style=" font-size: 20pt;"><?php echo $fila['fechaEntrada'] ?></td>
                  <td bgcolor= '#AED6F1' align='center' style=" font-size: 20pt;"><?php echo $fila['cuñete'],'/',$fila['TotalCuñete'] ?></td>
                  <td bgcolor='#AED6F1' align='center'><button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/EditarInspeccion.php';this.form.submit();"><img src='/produccion/img/editProd.png' width='50' height='50' class='zoom'/></button></td>
          <?php }else if ($fila['prioridad'] == "1") {?>
                  <td bgcolor= '#FC5E5E' align='center' style=" font-size: 20pt;"><?php echo $fila['id'] ?></td>
                  <th bgcolor= '#FC5E5E' align='center' style=" font-size: 20pt;"><?php echo $fila['orden']?></th>
                  <td bgcolor= '#FC5E5E' align='center' style=" font-size: 20pt;"><?php echo $fila['componente'] ?></td>
                  <td bgcolor= '#FC5E5E' align='center' style=" font-size: 20pt;"><?php echo $fila['inspector'] ?></td>
                  <td bgcolor= '#FC5E5E' align='center' style=" font-size: 20pt;"><?php echo $fila['fechaEntrada'] ?></td>
                  <td bgcolor= '#FC5E5E' align='center' style=" font-size: 20pt;"><?php echo $fila['cuñete'],'/',$fila['TotalCuñete'] ?></td>
                  <td bgcolor= '#FC5E5E' align='center'><button type='submit' style='background-color:#FC5E5E; border-color:#FC5E5E; border:0;' class='btn btn-info btn_add' onclick="this.form.action='php/EditarInspeccion.php';this.form.submit();"><img src='/produccion/img/editProd.png' width='50' height='50' class='zoom'/></button></td>
          <?php }?>
                </tr>
        <?php  } ?>
               </tbody></table>
      <?php }?>
          <input type='text' name='id' id='id'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='orden' id='orden'  readonly style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='componente' id='componente'  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
          <input type='text' name='inspector' id='inspector'  readonly  style="background-color:transparent; color:transparent; border-color:transparent; border-style:solid" >
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
