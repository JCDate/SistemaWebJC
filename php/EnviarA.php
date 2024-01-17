<?php

header("Content-Type: text/html;charset=utf-8");

if (!($conexion = mysqli_connect("localhost", "root", "" ))) {
  echo "Error conectando a la base de datos.";
  exit();
}

if (!($db = mysqli_select_db($conexion, "jc_mysql"))) {
  echo "Error seleccionando la base de datos.";
  exit();
}

mysqli_set_charset($conexion,"UTF8");

$orden = $_POST['orden'];
$componente = $_POST['componente'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    <style type="text/css">
      body {
        background-color: #AED6F1;
      }
      .boton_1{
        text-decoration: none;
        padding: 3px;
        padding-left: 10px;
        padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 80px;
        font-style: italic;
        color: #006505;
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
        font-size: 80px;
        font-style: italic;
        color: #FFCC00;
        border-radius: 15px;
        border: 3px double #FFCC00;
      }
      .boton_2:hover{
        opacity: 0.6;
        text-decoration: none;
      }
    </style>
  </head>
  <body bgcolor="#AED6F1">
    <div align="center">
      <h2>Enviar A...</h2>
      <form method="post">
        <input type="text" id="componente" name="componente" value="<?php echo $componente; ?>" hidden>
        <input type="text" id="orden" name="orden" value="<?php echo $orden; ?>" hidden>
        <button class="boton_1" type="submit" name="AlmacenEnviar" onclick="this.form.action='AlmacenEnviar.php';this.form.submit();">Almacen PT</button><br><br><br><br><br>
        <button class="boton_2" type="button" name="EmbarqueEnviar" onclick="this.form.action='EmbarqueEnviar.php';this.form.submit();">Embarque</button>
      </form>
    </div>
  </body>
</html>
