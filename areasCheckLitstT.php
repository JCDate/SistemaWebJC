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

  $componente = $_POST['componente'];
  $numOperacion = $_POST['numOperacion'];
  $id= $_POST['id'];

  if($componente){

  $consulta = "SELECT * FROM areaschecklistt WHERE componente	='".$componente."' AND numOperaciones='".$numOperacion."' AND idAreas=".$id;
  $result = $conexion -> query($consulta);

  $row = $result->fetch_assoc();

  $consulta2 = "SELECT * FROM reportechecklistt WHERE componente	='".$componente."' AND NoOperacion='".$numOperacion."' AND idReporte=".$id;
  $result2 = $conexion -> query($consulta2);

  $row2 = $result2->fetch_assoc();

  }else{
    echo "Los datos enviados estan vacios";
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <LINK REL=StyleSheet HREF="css/diseñoPrdo.css" TYPE="text/css" MEDIA=screen>
    <script type="text/javascript"></script>

    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="jspdf.plugin.autotable.min.js"></script>

    <title>Reporte Check List Troqueles</title>
    <link rel="shortcut icon" href="img/icono.png">
  </head>
  <body bgcolor="#AED6F1" align="center">
    <style type="text/css">
    img.izquierda {
      float: left;
    }

    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='80' height='80' />
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">Á R E A S</font>
    <div class="container">
      <div class="row">
        <div class="col-md-12" align="right">

            <br>
        </div>
      </div>
    </div>
    <div id="datos">
      <table border='1' overflow='scroll' height='100%' width='100%' bgcolor='#D6DBDF' id='troqueles'>
            <thead>
            <tr>
              <th  colspan='4' bgcolor="#5979FF"> <font size=5><?php echo "COMPONENTE: ".$componente ?></font> </th>
             </tr>
             <tr>
               <th  colspan='2' bgcolor="#5979FF"><font size=4><?php echo "TROQUEL: ".$row['troquel'] ?></font></th>
               <th  colspan='2' bgcolor="#5979FF"><font size=4><?php echo "OPERACIÓN: ".$row['numOperaciones'] ?></font></th>
             </tr>
             <tr>
               <th  colspan='4' bgcolor="#5979FF"><font size=4><?php echo "ELABORÓ: ".$row2['elabora'] ?></font></th>
             </tr>
             <tr>
              <th bgcolor="#7691FE">ÁREA</th>
              <th bgcolor="#7691FE">LISTADO DE PUNTOS A VERIFICAR</th>
              <th bgcolor="#7691FE">CUMPLE</th>
              <th bgcolor="#7691FE">OBSERVACIONES</th>
            </tr>
            <tr>
              <th rowspan='2' bgcolor="#7691FE">PIEZAS DE CORTE</th>
                <td bgcolor="#7FBBE3">¿Se encuentra el macho superior e inferior con el filo adecuado y los radios formados?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p1']; ?></th>
                <th bgcolor="#7FBBE3" rowspan='2'><?php echo $row['comentario1']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿La rueda cortadora realiza el corte correctamente?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p2']; ?></th>
            </tr>
            <tr>
                <th rowspan='3' bgcolor="#7691FE"> BOTADORES</th>
                <td bgcolor="#7FBBE3">¿Se encuentran todos los botadores completos?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p3']; ?></th>
                <th bgcolor="#7FBBE3" rowspan='3'><?php echo $row['comentario2']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Los botadores muestran torceduras, chuecos o disparejos?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p4']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Los botadores muestran dimensiones (largo) diferente a los requeridos?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p5']; ?></th>
            </tr>
            <tr>
                <th rowspan='3' bgcolor="#7691FE">TORNILLERIA</th>
                <td bgcolor="#7FBBE3">¿Cuenta con todos los tornillos de sujeción de las matrices?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p6']; ?></th>
                <th bgcolor="#7FBBE3" rowspan='3'><?php echo $row['comentario3']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿La cuerda se encuentra en buen estado?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p7']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿La cabeza del tornillo se encuentra en buen estado (por ejemplo; barridos)?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p8']; ?></th>
            </tr>
            <tr>
                <th rowspan='3' bgcolor="#7691FE">PIEZAS DE EMBUTIDO</th>
                <td bgcolor="#7FBBE3">¿El radio de embutido de la campana se encuentra bien formado y en condiciones para trabajar?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p9']; ?></th>
                <th bgcolor="#7FBBE3" rowspan='3'><?php echo $row['comentario4']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Las piezas de embutido presentan ralladuras?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p10']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿El macho inferior no presenta desprendimiento de cuerdas de sujeción?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p11']; ?></th>
            </tr>
            <tr>
                <th rowspan='7' bgcolor="#7691FE">PORTA TROQUEL</th>
                <td bgcolor="#7FBBE3">¿El portatroquel se encuentra en buenas condiciones de pintura?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p12']; ?></th>
                <th bgcolor="#7FBBE3" rowspan='7'><?php echo $row['comentario5']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Se encuentra señalado adecuadamente la ubicación?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p13']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿El número del portatroquel se encuentra visible?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p14']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Las guías se encuentran en buen estado?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p15']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿La placa se encuentra en condiciones para trabajar?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p16']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿La limpieza del portatroquel es el adecuado?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p17']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Se encuentra correctamente lubricado?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p18']; ?></th>
            </tr>
            <tr>
                <th rowspan='3' bgcolor="#7691FE">CENTRADOR DE ESTAMPAS</th>
                <td bgcolor="#7FBBE3">¿Tornillería completa?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p19']; ?></th>
                <th bgcolor="#7FBBE3" rowspan='3'><?php echo $row['comentario6']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Resortes completos?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p20']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Placa sin grieta o fracturada?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p21']; ?></th>
            </tr>
            <?php
            if ($componente == "91531"  AND $numOperacion == "1" OR
                $componente == "91566"  AND $numOperacion == "1" OR
                $componente == "91545"  AND $numOperacion == "1" OR
                $componente == "91574"  AND $numOperacion == "1") { ?>
            <tr>
                <th rowspan='5' bgcolor="#7691FE">PERNOS (PUNZONES)</th>
                <td bgcolor="#7FBBE3">¿Pernos completos?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p22']; ?></th>
                <th bgcolor="#7FBBE3" rowspan='5'><?php echo $row['comentario7']; ?></th>
            </tr>
            <tr>
                <td bgcolor="#7FBBE3">¿Pernos afilados y en buen estado?</td>
                <th bgcolor="#7FBBE3"><?php echo $row['p23']; ?></th>
            </tr>
              <?php } ?>
            </thead>
        </table>
<br>
        <button id="generar" class="btn btn-default" style=" background:#AED6F1;  border-color:#AED6F1; border:0;" ><img src='img/pdf.png' width='200' height='80' /></button>
        <br>
    </div>
    <script>
    $("#generar").click(function(){

      var pdf = new jsPDF();
      //Agrega el titulo
      pdf.text(60,10,"REPORTE CHECK LIST DE TROQUEL");

      //Agregar imagen
      var logo = new Image();
      logo.src = '/produccion/img/JCDB_logo.jpeg';
      pdf.addImage(logo, 'JPEG', 10, 10, 20, 20);

      pdf.setFontSize(11);
      pdf.text(40,25,"ELABORÓ:");
      pdf.text(62,25,"<?php echo $row['elaboro']; ?>" );

      pdf.text(140,25,"FECHA:");
      pdf.text(160,25,"<?php echo $row['fecha']; ?>" );

      pdf.text(30,35,"COMPONENTE:");
      pdf.text(62,35,"<?php echo $row['componente']; ?>" );

      pdf.text(100,35,"TROQUEL:");
      pdf.text(122,35,"<?php echo $row['troquel']; ?>" );

      pdf.setFontSize(7);
      pdf.text(155,40,"Planta Cd.Guzman,Jalisco");
      pdf.text(158,43,"F-SP 04 REV 01" );

    var columns = [
          {title: "ITEM", dataKey: "item"},
          {title: "AREA A VERIFICAR", dataKey: "area"},
          {title: "LISTADO DE PUNTOS A VERIFICAR", dataKey: "listado"},
          {title: "CUMPLE", dataKey: "cumple"},
          {title: "OBSERVACIONES", dataKey: "obs"},
      ];

      var rows = [
          {item:"1",area:"PIEZAS DE CORTE",listado:"¿Se encuentra el macho superior e "+"inferior con el filo adecuado y los radios formados?",cumple:"<?php echo $row['p1']; ?>",obs:"<?php echo $row['comentario1']; ?>"},
          {item:"2",listado:"¿La rueda cortadora realiza el corte correctamente?",cumple:"<?php echo $row['p2']; ?>"},

          {item:"3",area:"BOTADORES",listado:"¿Se encuentran todos los botadores completos?",cumple:"<?php echo $row['p3']; ?>",obs:"<?php echo $row['comentario2']; ?>"},
          {item:"4",listado:"¿Los botadores muestran torceduras,"+" chuecos o disparejos?",cumple:"<?php echo $row['p4']; ?>"},
          {item:"5",listado:"¿Los botadores muestran dimensiones "+"(largo) diferente a los requeridos?",cumple:"<?php echo $row['p5']; ?>"},

          {item:"6",area:"TORNILLERIA",listado:"¿Cuenta con todos los tornillos de sujeción de las matrices?",cumple:"<?php echo $row['p6']; ?>",obs:"<?php echo $row['comentario3']; ?>"},
          {item:"7",listado:"¿La cuerda se encuentra en buen estado?",cumple:"<?php echo $row['p7']; ?>"},
          {item:"8",listado:"¿La cabeza del tornillo se encuentra en buen estado (por ejemplo; barridos)?",cumple:"<?php echo $row['p8']; ?>"},

          {item:"9",area:"PIEZAS DE EMBUTIDO",listado:"¿El radio de embutido de la campana se encuentra bien formado y en condiciones para trabajar?",cumple:"<?php echo $row['p9']; ?>",obs:"<?php echo $row['comentario4']; ?>"},
          {item:"10",listado:"¿Las piezas de embutido presentan ralladuras?",cumple:"<?php echo $row['p10']; ?>"},
          {item:"11",listado:"¿El macho inferior no presenta desprendimiento de cuerdas de sujeción?",cumple:"<?php echo $row['p11']; ?>"},

          {item:"12",area:"PORTA TROQUEL",listado:"¿El portatroquel se encuentra en buenas condiciones de pintura?",cumple:"<?php echo $row['p12']; ?>",obs:"<?php echo $row['comentario5']; ?>"},
          {item:"13",listado:"¿Se encuentra señalado adecuadamente la ubicación?",cumple:"<?php echo $row['p13']; ?>"},
          {item:"14",listado:"¿El número del portatroquel se encuentra visible?",cumple:"<?php echo $row['p14']; ?>"},
          {item:"15",listado:"¿Las guías se encuentran en buen estado?",cumple:"<?php echo $row['p15']; ?>"},
          {item:"16",listado:"¿La placa se encuentra en condiciones para trabajar?",cumple:"<?php echo $row['p16']; ?>"},
          {item:"17",listado:"¿La limpieza del portatroquel es el adecuado?",cumple:"<?php echo $row['p17']; ?>"},
          {item:"18",listado:"¿Se encuentra correctamente lubricado?",cumple:"<?php echo $row['p18']; ?>"},

          {item:"19",area:"CENTRADOR DE ESTAMPAS",listado:"¿Tornillería completa?",cumple:"<?php echo $row['p19']; ?>",obs:"<?php echo $row['comentario6']; ?>"},
          {item:"20",listado:"¿Resortes completos?",cumple:"<?php echo $row['p20']; ?>"},
          {item:"21",listado:"¿Placa sin grieta o fracturada?",cumple:"<?php echo $row['p21']; ?>"},

          <?php
          if ($componente == "91531"  AND $numOperacion == "1" OR
              $componente == "91566"  AND $numOperacion == "1" OR
              $componente == "91545"  AND $numOperacion == "1" OR
              $componente == "91574"  AND $numOperacion == "1") { ?>
                  {item:"22",area:"PERNOS (PUNZONES)",listado:"¿Pernos completos?",cumple:"<?php echo $row['p22']; ?>",obs:"<?php echo $row['comentario7']; ?>"},
                  {item:"23",listado:"¿Pernos afilados y en buen estado?",cumple:"<?php echo $row['p23']; ?>"}

         <?php } ?>
      ];

      pdf.autoTable(columns, rows, {
          startY: false,
          //theme: 'grid',
          columnWidth: 'wrap',
          showHeader: 'everyPage',

          headerStyles: {theme: 'grid'},
          styles: {overflow: 'linebreak', columnWidth: '100', font: 'arial', fontSize: 7, cellPadding: 3, overflowColumns: 'linebreak'},
          margin:{ top: 45 }
      });



      pdf.save('Reporte Check List.pdf');
    });

    </script>
  </body>
</html>
<?php
$conexion ->close();
?>
