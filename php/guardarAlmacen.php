<?php
  header("Content-Type: text/html;charset=utf-8");

  if(!($conexion = mysqli_connect("localhost", "root", "" ))) {
    echo "Error conectando a la base de datos.";
    exit();
  }

  if (!($db = mysqli_select_db( $conexion, "jc_mysql"))) {
    echo "Error seleccionando la base de datos.";
    exit();
  }

  mysqli_set_charset($conexion,"UTF8");

  $orden = $_POST['orden'];
  $componente = $_POST['componente'];
  $cantidad = $_POST['cantidad'];
  $noCu = $_POST['noCu'];
  $pesoNeto = $_POST['pesoNeto'];

  if(isset($_POST['Nave'],$_POST['Palet'],$_POST['Locacion'])) {
    $nave = $_POST['Nave'];
    $palet = $_POST['Palet'];
    //$seccion = $_POST['Seccion'];
    $locacion = $_POST['Locacion'];

    if ($locacion != "") {
      $ubicacion = $nave . "-" . $locacion;
    } else if ($palet != "") {
      $ubicacion = $nave . "-" . $palet;
    }

    $query = "UPDATE embarque SET Ubicacion= '$ubicacion' WHERE componente='$componente' AND orden='$orden'";
    $result = $conexion -> query($query);

    $query200 = "UPDATE ubicacion SET disponible='1' WHERE palet='$palet'";
    $result200 = $conexion -> query($query200);

// UPDATE ubicacion SET disponible='0' WHERE SELECT palet, ubicacion FROM ubicacion, embarque WHERE embarque.ubicacion="Nave3-".$palet


    echo "<script>window.location.href='../AlmacenInterfaz.php';</script>";
  } else {
    $query = "UPDATE embarque SET Enviado='1' WHERE componente='$componente' AND orden='$orden'";
    $result = $conexion -> query($query);

    echo "<script>window.location.href='AlmacenInterfaz.php';</script>";
  }


  $query = "SELECT * FROM loteeconomico,embarque WHERE loteeconomico.componente ='$componente' AND embarque.componente AND cantAct>'0'";
    $result = $conexion -> query($query);
    $fila = $result  -> fetch_assoc();

    if(isset($_POST["salida"]) AND $_POST["salida"] AND isset($_POST["fechaSal"]) AND $_POST["fechaSal"] AND isset($_POST["verySal"]) AND $_POST["verySal"] ){
      if($result -> num_rows > 0) {

        $salida = $_POST['salida'];
        $fechaSal = $_POST['fechaSal'];
        $newDate = date("d/m/Y", strtotime($fechaSal));
        $verySal = $_POST['verySal'];

        $res = $fila['cantAct'] - $salida;

         $consulta = "UPDATE loteeconomico set salida='$salida',fechaSal= '$newDate',verySal='$verySal',cantAct= '$res' where componente='$componente'";
           $result = $conexion -> query($consulta);

           $query2 = "DELETE FROM loteeconomico WHERE cantAct='0''";
           $result2 = $conexion -> query($query2);
      }
    }

  if(isset($_POST["orden"]) AND $_POST["orden"] AND isset($_POST["componente"]) AND $_POST["componente"] AND
     isset($_POST["cantidad"]) AND $_POST["cantidad"] AND isset($_POST["noCu"]) AND $_POST["noCu"] AND
     isset($_POST["pesoNeto"]) AND $_POST["pesoNeto"]){

       $consulta = "UPDATE embarque SET cantidad='$cantidad',noCuñetes='$noCu',pesoNeto='$pesoNeto' WHERE orden ='$orden'";
        $result = $conexion -> query($consulta);

       echo "<center><h1>Datos Guardados<h1>";
         echo "<form action='/produccion/EmbarqueInterfaz.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
          </form>";
     }else{
          echo "<center><h2>ERROR. DATOS NO GUARDADOS</h2>";
          echo "<br>";
          echo "<form action='/produccion/EmbarqueInterfaz.php' method='post'>
               <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
           </form></center>";
     }
   ?>
