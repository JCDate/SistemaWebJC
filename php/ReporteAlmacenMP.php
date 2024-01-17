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

  $orden = $_POST['orden1'];
  $componente = $_POST['componente1'];


  if($componente AND $orden){

  $consulta = "SELECT * FROM almacenMP WHERE componente	='".$componente."' AND orden='".$orden."'";
  $result = $conexion -> query($consulta);

  $row = $result->fetch_assoc();

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

    <title>ALMACEN DE MATERIA PRIMA</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body bgcolor="#AED6F1" align="center">
    <style type="text/css">
    img.izquierda {
      float: left;
    }

    </style>
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='100' height='100' />
    <br>
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7">ALMACEN DE MATERIA PRIMA</font>
    <div class="container">

    <div id="datos">
      <br><br>
      <table border='1' overflow='scroll' width='60%' bgcolor='#181B29' align='center'>
            <thead>
            <tr>
              <th bgcolor='#708CFE'  colspan='3'><font face="Bookman Old Style,arial,verdana" SIZE="5">  <?php echo "ORDEN: </font><font face='Bookman Old Style,arial,verdana' SIZE='4'>".$orden ?></font></th>
            </tr>
            <tr>
                <th bgcolor='#708CFE' colspan='3'><font face="Bookman Old Style,arial,verdana" SIZE="5">  <?php echo "COMPONENTE: </font><font face='Bookman Old Style,arial,verdana' SIZE='4'>".$componente ?></font></th>
            </tr>
            <tr>
              <td colspan='3'></td>
            </tr>
            <tr>
              <td colspan='3'></td>
            </tr>
            <tr>
              <td bgcolor='#7FBBE3' colspan='3'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>SOLICITANTE: </label><?php echo $row['solicitante']; ?></font></td>
            </tr>
            <tr>
              <td bgcolor='#73BAF6' colspan='2'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>TIPO DE MATERIAL: </label> <br> <?php echo $row['tipomaterial']; ?></font></td>
              <td bgcolor='#73BAF6'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>ANCHO DE TIRA: </label> <br> <?php echo $row['anchoTira']; ?></font></td>
            </tr>
            <tr>
              <td bgcolor='#73BAF6'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>NO. ROLLO: </label> <br> <?php echo $row['noRollo']; ?></font></td>
              <td bgcolor='#73BAF6'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>NO. HOJAS: </label> <br> <?php echo $row['noHoja']; ?></font></td>
              <td bgcolor='#73BAF6'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>NO. TIRAS: </label> <br> <?php echo $row['noTira']; ?></font></td>
            </tr>
            <tr>
              <td bgcolor='#73BAF6' colspan='3'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>PESO (CAL): </label><?php echo $row['pesoCal']; ?></font></td>
            </tr>
            <tr>
              <td colspan='3'></td>
            </tr>
            <tr>
              <td bgcolor='#73BAF6' colspan='3'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>AUTORIZADO POR: </label> <?php echo $row['autorizado']; ?></font></td>
            </tr>
            <tr>
              <td bgcolor='#73BAF6' colspan='3'><font face="Bookman Old Style,arial,verdana" SIZE="4"><label>OBSERVACIONES: </label> <br> <?php echo $row['observaciones']; ?></font></td>
            </tr>
            </thead>
        </table>
    </div>
  </body>
</html>
<?php
$conexion ->close();
?>
