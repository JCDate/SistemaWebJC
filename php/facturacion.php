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

//Fecha PDF
$queryfecha = "SELECT  DATE_FORMAT(SYSDATE(),'%d/%m/%Y') AS fecha";
$fechaAc = $conexion -> query($queryfecha);
$fechaActual = $fechaAc  -> fetch_assoc();

//Hora PDF
$queryhora = "SELECT time (NOW()) AS hora";
$Ho = $conexion -> query($queryhora);
$Hora = $Ho  -> fetch_assoc();

  $query = "SELECT * FROM facturacion ORDER BY factura ='', orden ASC";
  //Consultar
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $query = "SELECT	* FROM facturacion WHERE componente LIKE '%".$q."%' OR orden LIKE '%".$q."%'";
  }

  $result = $conexion -> query($query);

//herramental
  $queryHerr = "SELECT * FROM facturacionherramental ORDER BY factura ='', orden ASC";

  //Consultar
  if (isset($_POST['consulta'])) {
    $q = $conexion -> real_escape_string($_POST['consulta']);
    $queryHerr = "SELECT	* FROM facturacionherramental WHERE componente LIKE '%".$q."%' OR orden LIKE '%".$q."%'";
  }

  $resultHerr = $conexion -> query($queryHerr);

  $factura = array();
  $n=0;


  if ($result -> num_rows > 0) {
    $salida .=" <form  action='php/guardarFactura.php' method='post'> <table border='1' overflow='scroll' height='100%' width='100%' bgcolor='#D6DBDF'>
          <thead>
          <tr>
            <th bgcolor='#6699CC'>LISTO PARA <br>FACTURAR</th>
            <th bgcolor='#6699CC'>ORDEN</th>
            <th bgcolor='#6699CC'>COMPONENTE</th>
            <th bgcolor='#6699CC'>C/R</th>
            <th bgcolor='#6699CC'>PZ. ENT.</th>
            <th bgcolor='#6699CC'>P. U.($)</th>
            <th bgcolor='#6699CC'>TOTAL</th>
            <th bgcolor='#6699CC'>NO. CUÑETES</th>
            <th bgcolor='#6699CC'>NO. SIM</th>
            <th bgcolor='#6699CC'> PESO NETO</th>
            <th bgcolor='#6699CC'>FACTURA</th>
            <th bgcolor='#6699CC'>GUARDAR</th>
          </tr>
          </thead>
          <tbody>";

    while($fila = $result  -> fetch_assoc()){
            $salida .="<tr>
            <th bgcolor='#90CAF9'>";

            $salida .="<img src='img/terminado.png' width='30' height='30' />";

            $salida .="</th>
            <th bgcolor='#90CAF9'>".$fila['orden']."</th>
            <td bgcolor='#90CAF9' align='center'>".$fila['componente']."</td>
            <td bgcolor='#90CAF9' align='center'>".$fila['cr']."</td>
            <td bgcolor='#90CAF9' align='center'>".$fila['cantidad']."</td>
            <td bgcolor='#90CAF9' align='center'>$ ".$fila['PU']."</td>
            <td bgcolor='#90CAF9' align='center'>$ ".$fila['total']."</td>
            <td bgcolor='#90CAF9' align='center'>".$fila['noCuñetes']."</td>
            <td bgcolor='#90CAF9' align='center'>".$fila['NoSim']."</td>
            <td bgcolor='#90CAF9' align='center'>".$fila['pesoNeto']."</td>
            <td bgcolor='#90CAF9'><textarea name='factura1' rows='1' cols='10' id='factura1' >".$fila['factura']."</textarea></td>";
          if ($fila['factura'] != '' ) {
            $salida .="<td bgcolor='#90CAF9'></td>
             </tr> ";
          }else {
            $salida .="<th bgcolor='#90CAF9'><button type='submit' style='background-color:transparent ; border-color:transparent; border:0;' class='btn2 btn-info btn_add3'><img src='img/guardar.png' width='30' height='30' class='zoom'/></button></th>
              </tr> ";
          }

    }
    $salida .="</tbody></table>
    <input type='text' name='orden' id='orden' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly >
    <input type='text' name='componente' id='componente' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly >
    <input type='text' name='cr' id='cr' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly >
    <input type='text' name='pzs' id='pzs' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly >
    <input type='text' name='factura' id='factura' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly></form>

    <div bgcolor='#AED6F1' align='center'>
      <button id='generar' class='btn2 btn-default3' style=' background:transparent;  border-color:transparent; border:0;' ><img src='img/pdf.png' width='150' height='50' /></button>
    </div><br><br><br>
    ";

  }

    echo $salida;

  $query2="SELECT orden,componente,cr,cantidad,PU,total,noCuñetes,NoSim,fechaHoraEnvi from facturacion WHERE factura IS NULL ORDER BY componente ASC, orden ASC";
  $result2 = $conexion -> query($query2);
  $facturacion = array();
  $n=1;
  while($r=$result2->fetch_object())
  {
      $facturacion[]=$r;
  }

  $query3="SELECT orden,componente,troquel,pieza,pu,contacto from facturacionherramental WHERE factura IS NULL ORDER BY componente ASC, orden ASC";
  $result3 = $conexion -> query($query3);
  $facturacionherramental = array();
  $n2=1;
  while($r=$result3->fetch_object())
  {
      $facturacionherramental[]=$r;
  }

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
        $(".btn_add3").on("click", function() {
        var orden = $(this).closest('tr').children()[1].textContent;
        var componente = $(this).closest('tr').children()[2].textContent;
        var cr = $(this).closest('tr').children()[3].textContent;
        var pzs = $(this).closest('tr').children()[4].textContent;
        $("#orden").val(orden);
        $("#componente").val(componente);
        $("#cr").val(cr);
        $("#pzs").val(pzs);

        });

        $(document).ready(function () {
            $("#factura1").keyup(function () {
                var value = $(this).val();
                $("#factura").val(value);
            });
        });
    </script>
    <script type="text/javascript" >
        $(".btn_add2").on("click", function() {
        var orden = $(this).closest('tr').children()[0].textContent;
        var cotizacion = $(this).closest('tr').children()[1].textContent;
        $("#orden2").val(orden);
        $("#cotizacion").val(cotizacion);


        });

        $(document).ready(function () {
            $("#facturaHERR").keyup(function () {
                var value = $(this).val();
                $("#facturaHERR2").val(value);
            });
        });
    </script>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="jspdf.plugin.autotable.min.js"></script>

    <script>
    $("#generar").click(function(){

      //var pdf = new jsPDF();
      var pdf = new jsPDF({
           orientation: 'lanscape'})
      //Agrega el titulo
      pdf.text(110,20,"LISTA DE EMBARQUE");

      pdf.setFontSize(9);
      pdf.text(250,20,"F-EN 01 REV 02");

      pdf.setFontSize(12);
      pdf.text(220,33,"FECHA: <?php echo $fechaActual['fecha']; echo "  "; echo $Hora['hora']?>");


      //Agregar imagen
      var logo = new Image();
      logo.src = '/produccion/img/JCDB_logo.jpeg';
      pdf.addImage(logo, 'JPEG', 20, 10, 20, 20);

      var columns = ["PT", "ORDEN", "COMPONENTE", "C/R", "PZ. ENT.","P. U.($)","TOTAL","NO. CUÑETES","NO. SIM","ENVIADA"];


      var data = [
      <?php foreach($facturacion as $c):?>
       [<?php echo $n++; ?>, "<?php echo $c->orden; ?>", "<?php echo $c->componente; ?>", "<?php echo $c->cr; ?>", "<?php echo $c->cantidad; ?>","$<?php echo $c->PU; ?>",
       "$<?php echo $c->total; ?>","<?php echo $c->noCuñetes; ?>","<?php echo $c->NoSim; ?>","<?php echo $c->fechaHoraEnvi; ?>"],
      <?php endforeach; ?>
        ];

        pdf.autoTable(columns, data, {
            startY: false,
            columnWidth: 'wrap',
            showHeader: 'everyPage',

            headerStyles: {theme: 'grid'},


            headStyles :{fillColor : [124, 95, 240]},
            tableLineColor: [255, 255,255],

            tableLineWidth: 0.1,
            margin:{ top: 35 }

        });


      pdf.save('LISTA DE EMBARQUE.pdf');
    });
    </script>
    <script>
    $("#generar2").click(function(){

      //var pdf = new jsPDF();
      var pdf = new jsPDF({
           orientation: 'lanscape'})
      //Agrega el titulo
      pdf.text(110,20,"FACTURAR HERRAMENTAL");

      pdf.setFontSize(12);
      pdf.text(220,33,"FECHA: <?php echo $fechaActual['fecha']; echo "  "; echo $Hora['hora']?>");


      //Agregar imagen
      var logo = new Image();
      logo.src = '/produccion/img/JCDB_logo.jpeg';
      pdf.addImage(logo, 'JPEG', 20, 10, 20, 20);

      var columns = ["PT", "ORDEN", "COMPONENTE", "TROQUEL", "PIEZA","P. U.($ PESOS)","CONTACTO"];


      var data = [
      <?php foreach($facturacionherramental as $c):?>
       [<?php echo $n2++; ?>, "<?php echo $c->orden; ?>", "<?php echo $c->componente; ?>", "<?php echo $c->troquel; ?>", "<?php echo $c->pieza; ?>","$<?php echo $c->pu; ?>",
       "<?php echo $c->contacto; ?>"],
      <?php endforeach; ?>
        ];

        pdf.autoTable(columns, data, {
            startY: false,
            columnWidth: 'wrap',
            showHeader: 'everyPage',

            headerStyles: {theme: 'grid'},


            headStyles :{fillColor : [124, 95, 240]},
            tableLineColor: [255, 255,255],

            tableLineWidth: 0.1,
            margin:{ top: 35 }

        });


      pdf.save('FACTURAR HERRAMENTAL.pdf');
    });
    </script>

    <title></title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body >


<?php if ($resultHerr -> num_rows > 0) { ?>
  <h1 align='center'>FACTURAR HERRAMENTAL</h1>
  <form  action='php/guardarFacturaHerramental.php' method='post'>
    <table border="1" width='100%' bgcolor='#D6DBDF'>
      <tr>
        <th bgcolor='#6699CC' rowspan='2'>ORDEN</th>
        <th bgcolor='#6699CC' rowspan='2'>COTIZACION</th>
        <th bgcolor='#6699CC' rowspan='2'>COMPONENTE</th>
        <th bgcolor='#6699CC' rowspan='2'>TROQUEL</th>
        <th bgcolor='#6699CC' rowspan='2'>PIEZA</th>
        <th bgcolor='#6699CC'>P. U.</th>
        <th bgcolor='#6699CC' rowspan='2'>CONTACTO</th>
        <th bgcolor='#6699CC' rowspan='2'>FACTURA</th>
        <th bgcolor='#6699CC' rowspan='2'>GUARDAR</th>
      </tr>
      <tr>
        <th bgcolor='#6699CC'>($ PESOS)</th>
      </tr>
    <?php while ($filaHerr = $resultHerr -> fetch_assoc()){ ?>
          <tr>
            <th bgcolor='#6699CC'><?php echo $filaHerr['orden']; ?></th>
            <td bgcolor='#90CAF9' align='center'><?php echo $filaHerr['cotizacion'];?></td>
            <td bgcolor='#90CAF9' align='center'><?php echo $filaHerr['componente'];?></td>
            <td bgcolor='#90CAF9' align='center'><?php echo $filaHerr['troquel'];?></td>
            <td bgcolor='#90CAF9' align='center'><?php echo $filaHerr['pieza'];?></td>
            <td bgcolor='#90CAF9' align='center'>$ <?php echo $filaHerr['pu'];?></td>
            <td bgcolor='#90CAF9' align='center'><?php echo $filaHerr['contacto'];?></td>
            <td bgcolor='#90CAF9'><textarea name='facturaHERR' rows='1' cols='10' id='facturaHERR'><?php echo $filaHerr['factura'];?></textarea></td>
            <?php if ($filaHerr['factura'] != '') { ?>
                <th bgcolor='#90CAF9'></button></th>
            <?php }else {?>
                <th bgcolor='#90CAF9'><button type='submit' style='background-color:transparent ; border-color:transparent; border:0;' class='btn2 btn-info btn_add2'><img src='img/guardar.png' width='30' height='30' class='zoom'/></button></th>
            <?php } ?>
          </tr>
    <?php } ?>
    </table>
    <input type='text' name='orden2' id='orden2' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly >
    <input type='text' name='cotizacion' id='cotizacion' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly >
    <input type='text' name='facturaHERR2' id='facturaHERR2' style='background-color:transparent; color:transparent; border-color:transparent; border-style:solid' readonly>
  </form>

  <div bgcolor='#AED6F1' align='center'>
    <button id='generar2' class='btn2 btn-default' style=' background:transparent;  border-color:transparent; border:0;' ><img src='img/pdf.png' width='150' height='50' /></button>
  </div>
<?php } ?>


  </body>
</html>
<?php    $conexion ->close(); ?>
