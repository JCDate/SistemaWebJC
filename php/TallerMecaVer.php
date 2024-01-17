<?php
  require_once "../conexion.php";

  $troquel = $_POST['troquel'];

  //Mostrar datos de la tabla
  $query = "SELECT tallermecacicofalla.componente,fechaEntrada,descripcion,fechaEnt,reparadaP,turno,solucion,fabricada,reparada,eficaz FROM tallermecacicofalla,tallermecanicorep WHERE tallermecacicofalla.troquel='$troquel' AND tallermecanicorep.troquel='$troquel' AND tallermecanicorep.componente= tallermecacicofalla.componente AND tallermecanicorep.id=tallermecacicofalla.id";
  $result = $conexion -> query($query);

  $query2 = "SELECT tallermecacicofalla.componente,fechaEntrada,descripcion,fechaEnt,reparadaP,turno,solucion,fabricada,reparada,eficaz FROM tallermecacicofalla,tallermecanicorep WHERE tallermecacicofalla.troquel='$troquel' AND tallermecanicorep.troquel='$troquel' AND tallermecanicorep.troquel LIKE '%TORNO%' AND  tallermecacicofalla.troquel LIKE '%TORNO%' AND tallermecanicorep.id=tallermecacicofalla.id";
  $result2 = $conexion -> query($query2); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BITACORA DE MANTENIMIENTO DE TROQUELES</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body bgcolor="#D6EAF8" >
    <form class="" action="index.html" method="post">
  <?php if ($result -> num_rows > 0 ) {  ?>
       <center><h1 >BITACORA DE MANTENIMIENTO DE TROQUELES</h1> </center> <br>
       <center><font size='5'>TROQUEL: <?php echo $troquel;?></font>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        &nbsp &nbsp &nbsp
         PLANTA GUZMÁN, JALISCO </center>
         <P align="right"><font size='2'>F-GH 02 REV 02   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></P>
      <h5></h5>
      <table border="2" bordercolor="#000000">
      <thead>
        <tr>
          <td rowspan="2" bgcolor="#6495ED"><h3>NO.</h3></td>
          <td rowspan="2" bgcolor="#6495ED"><h3>COMPONENTE</h3></td>
          <th colspan='2' bgcolor="#FA8072"><h3>FALLA</h3></th>
          <th colspan='7' bgcolor="#00BFFF"><h3>REPARACIÓN</h3></th>
        </tr>
        <tr align='center'>
          <th bgcolor="#FFA07A">FECHA DE ENTRADA</th>
          <th bgcolor="#FFA07A">DESCRIPCIÓN DE LA FALLA (DESCRIBIR EN DETALLE EN QUE CONSISTE LA FALLA)</th>
          <th bgcolor="#87CEFA">FECHA DE ENTREGA</th>
          <th bgcolor="#87CEFA">REPARADA POR</th>
          <th bgcolor="#87CEFA">TURNO</th>
          <th bgcolor="#87CEFA">SOLUCIÓN (DESCRIBIR LO QUE SE LE HIZO A LA PIEZA)</th>
          <th bgcolor="#87CEFA">FAB.</th>
          <th bgcolor="#87CEFA">REP.</th>
          <th bgcolor="#87CEFA">AJUSTE EFICAZ A LA 1a.?</th>
        </tr>
        <thead>
        <tbody>
  <?php  $cont= 1;
     while ($fila = $result  -> fetch_assoc()){?>
        <tr align='center'>
          <th bgcolor="#6495ED"><?php echo $cont?></th>
          <th bgcolor="#6495ED"><?php echo $fila['componente']?></th>
          <td bgcolor="#FFE4E1"><?php echo $fila['fechaEntrada'] ?></td>
          <td bgcolor="#FFE4E1"><?php echo $fila['descripcion']?></td>
          <td bgcolor="#AFEEEE"><?php echo $fila['fechaEnt']?></td>
          <td bgcolor="#AFEEEE"><?php echo $fila['reparadaP']?></td>
          <td bgcolor="#AFEEEE"><?php echo $fila['turno']?></td>
          <td bgcolor="#AFEEEE"><?php echo $fila['solucion']?></td>
          <td bgcolor="#AFEEEE"><?php echo $fila['fabricada']?></td>
          <td bgcolor="#AFEEEE"><?php echo $fila['reparada']?></td>
          <td bgcolor="#AFEEEE"><?php echo $fila['eficaz']?></td>

        <?php $cont ++; ?>
        </tr>

    <?php  } ?>
      </tbody></table>
  <?php }?>

    <?php if ($result2 -> num_rows > 0 ) {  ?>
         <center><h1 >BITACORA DE MANTENIMIENTO DE TROQUELES</h1> </center> <br>
         <center><font size='5'>TROQUEL: <?php echo $troquel;?></font>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
          &nbsp &nbsp &nbsp
           PLANTA GUZMÁN, JALISCO </center>
           <P align="right"><font size='2'>F-GH 02 REV 02   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></P>

        <h5></h5>
        <table border="2" bordercolor="#000000">
        <thead>
          <tr>
            <td rowspan="2" bgcolor="#6495ED"><h3>NO.</h3></td>
            <th colspan='2' bgcolor="#FA8072"><h3>FALLA</h3></th>
            <th colspan='7' bgcolor="#00BFFF"><h3>REPARACIÓN</h3></th>
          </tr>
          <tr align='center'>
            <th bgcolor="#FFA07A">FECHA DE ENTRADA</th>
            <th bgcolor="#FFA07A">DESCRIPCIÓN DE LA FALLA (DESCRIBIR EN DETALLE EN QUE CONSISTE LA FALLA)</th>
            <th bgcolor="#87CEFA">FECHA DE ENTREGA</th>
            <th bgcolor="#87CEFA">REPARADA POR</th>
            <th bgcolor="#87CEFA">TURNO</th>
            <th bgcolor="#87CEFA">SOLUCIÓN (DESCRIBIR LO QUE SE LE HIZO A LA PIEZA)</th>
            <th bgcolor="#87CEFA">FAB.</th>
            <th bgcolor="#87CEFA">REP.</th>
            <th bgcolor="#87CEFA">AJUSTE EFICAZ A LA 1a.?</th>
          </tr>
          <thead>
          <tbody>
    <?php  $cont2= 1;
       while ($fila2 = $result2  -> fetch_assoc()){?>
          <tr align='center'>
            <th bgcolor="#6495ED"><?php echo $cont2?></th>
            <td bgcolor="#FFE4E1"><?php echo $fila2['fechaEntrada'] ?></td>
            <td bgcolor="#FFE4E1"><?php echo $fila2['descripcion']?></td>
            <td bgcolor="#AFEEEE"><?php echo $fila2['fechaEnt']?></td>
            <td bgcolor="#AFEEEE"><?php echo $fila2['reparadaP']?></td>
            <td bgcolor="#AFEEEE"><?php echo $fila2['turno']?></td>
            <td bgcolor="#AFEEEE"><?php echo $fila2['solucion']?></td>
            <td bgcolor="#AFEEEE"><?php echo $fila2['fabricada']?></td>
            <td bgcolor="#AFEEEE"><?php echo $fila2['reparada']?></td>
            <td bgcolor="#AFEEEE"><?php echo $fila2['eficaz']?></td>

          <?php $cont2 ++; ?>
          </tr>

      <?php  } ?>
        </tbody></table>
    <?php } ?>

</form>
  </body>
</html>
