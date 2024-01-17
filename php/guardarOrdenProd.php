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

    $orden = $_POST['orden'];
    $componente = $_POST['componente'];
    $fechaV = $_POST['fechaV'];
    $cantidad = $_POST['cantidad'];
    $proceso= $_POST['proceso'];
    $lamina = $_POST['lamina'];
    $maquina = "MAQUINA:";
    $cambios = $_POST['cambios'];
    $ordenT = $_POST['ordenT'];
    $cambioC = $_POST['cambioC'];
    $programada = $_POST["programada"];
    $comentarioPro = $_POST["comentarioPro"];
    $OrTC = $_POST["OrTC"];
    $tallerM = $_POST["tallerM"];
    $tallerMC = $_POST["tallerMC"];
    $fechEnt = $_POST['fechaEnt'];
    $reparacion = $_POST['reparacion'];
    $troquel = $_POST['troquel'];
    $comentarioSinL = $_POST['comentarioSinL'];

    $newDate = date("d/m/Y", strtotime($fechEnt));

    $query5 = "SELECT maquina FROM tiempoatrasos WHERE componente='$componente' AND orden='$orden' AND numOperaciones='$proceso'";
    $result5 = $conexion -> query($query5);
    $fila5 = $result5  -> fetch_assoc();

    $query = "SELECT * FROM consumoyantecedentes WHERE componente_CA='$componente'";
    $result = $conexion -> query($query);
    $fila = $result  -> fetch_assoc();

    $NoMaquina = $fila5["maquina"];
    $operacion = "OPERACION:";

   if (isset($_POST["ordenT"]) AND $_POST["ordenT"] AND
       isset($_POST["OrTC"]) AND $_POST["OrTC"] == ''){

           $consulta = "UPDATE atrasosproduccion set comentario='$ordenT' where orden='$orden'";
             $result = $conexion -> query($consulta);

             $consulta2 = "UPDATE analisisatrasos set comentario='$ordenT' where orden='$orden'";
               $result2 = $conexion -> query($consulta2);

               ///if ($fila['tipo'] == "BAJO VOLUMEN" ){
                 $consulta3 = "INSERT INTO ordenescalidad(orden,fechaV,cantidad,componente) VALUES('$orden','$fechaV','$cantidad','$componente')";
                   $result3 = $conexion -> query($consulta3);
              // }

            /* $consulta4 = "DELETE FROM atrasosproduccion WHERE orden='$orden'";
               $result4 = $conexion -> query($consulta4);*/

             echo "<center><h1>Datos Guardados y Enviados<h1>";
               echo "<form action='/produccion/atrasosProduccion.php' method='post'>
                    <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
                </form>";

   }elseif (isset($_POST["ordenT"]) AND $_POST["ordenT"] AND
            isset($_POST["OrTC"]) AND $_POST["OrTC"] != '') {

              $consulta = "UPDATE atrasosproduccion set comentario='$ordenT, $OrTC' where orden='$orden'";
                $result = $conexion -> query($consulta);

                $consulta2 = "UPDATE analisisatrasos set comentario='$ordenT, $OrTC' where orden='$orden'";
                  $result2 = $conexion -> query($consulta2);

                //  if ($fila['tipo'] == "BAJO VOLUMEN" ){
                    $consulta3 = "INSERT INTO ordenescalidad(orden,fechaV,cantidad,componente,comentario) VALUES('$orden','$fechaV','$cantidad','$componente','$OrTC')";
                      $result3 = $conexion -> query($consulta3);
                //  }

              /*  $consulta4 = "DELETE FROM atrasosproduccion WHERE orden='$orden'";
                  $result4 = $conexion -> query($consulta4);*/

                echo "<center><h1>Datos Guardados y Enviados<h1>";
                  echo "<form action='/produccion/atrasosProduccion.php' method='post'>
                       <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
                   </form>";
   }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '') {


      $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $comentarioPro / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $comentarioPro / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);


       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

   }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '') {


      $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);


       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

   }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO'  AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '') {


      $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $comentarioPro / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina/ $comentarioPro / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

   }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO'  AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == ''  AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '') {


      $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

   }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '') {

      $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

   }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
      isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
      isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '') {

      $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

   }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["programada"]) AND $_POST["comentarioPro"] !=  '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["programada"]) AND $_POST["comentarioPro"] !=  '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
      isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
      isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
      isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
      isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
      isset($_POST["programada"]) AND $_POST["comentarioPro"] !=  '' AND
      isset($_POST["proceso"]) AND $_POST["proceso"] != ''){

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina / $comentarioPro / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $comentarioPro / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
     isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
     isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
     isset($_POST["programada"]) AND $_POST["comentarioPro"] ==  '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
     isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
     isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
     isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
     isset($_POST["programada"]) AND $_POST["comentarioPro"] ==  '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
     isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
     isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
     isset($_POST["programada"]) AND $_POST["programada"] ==  'NO' AND
     isset($_POST["programada"]) AND $_POST["comentarioPro"] ==  '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] != ''){

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

 }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
     isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
     isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
     isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
     isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
     isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] != '' ) {

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '') {

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina / $programada, $comentarioPro' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $programada, $comentarioPro' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '') {

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina / $comentarioPro' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $comentarioPro' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '') {

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '') {

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina / $programada' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $programada' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '') {

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
    isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '') {

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina / $comentarioPro' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $comentarioPro' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] != '') {

    $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina, $comentarioSinL' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina, $comentarioSinL' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

  }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] == '') {

      $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC / $lamina' where orden='$orden'";
       $result = $conexion -> query($consulta);

      $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina' where orden='$orden'";
         $result2 = $conexion -> query($consulta2);

       echo "<center><h1>Datos Guardados <h1>";
         echo "<form action='/produccion/atrasosProduccion.php' method='post'>
              <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
          </form>";
  } elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] == '') {

    $consulta = "UPDATE atrasosproduccion set comentario='$cambios, $cambioC' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

  }if(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios / $lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }if(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  ''  OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  ''  ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '') {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios / $lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios / $lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] != '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios, $cambioC / $lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

  }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != '' ){

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

 }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != '' OR
    isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
    isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != '' ) {

    $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

 }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' ) {

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina / $programada, $comentarioPro' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $programada, $comentarioPro' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

 }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' ) {

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina / $programada' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $programada' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

 }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '' ) {

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina / $comentarioPro' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina / $comentarioPro' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

 }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
   isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '' ) {

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";

 }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] != '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] != '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] != '') {

   $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina, $comentarioSinL' where orden='$orden'";
    $result = $conexion -> query($consulta);

   $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina, $comentarioSinL' where orden='$orden'";
      $result2 = $conexion -> query($consulta2);

    echo "<center><h1>Datos Guardados <h1>";
      echo "<form action='/produccion/atrasosProduccion.php' method='post'>
           <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
       </form>";

 }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] == '') {

     $consulta = "UPDATE atrasosproduccion set comentario='$cambios / $lamina' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$cambios / $lamina' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";
 }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == 'CAMBIO' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ORDEN REVISADA' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == '' OR
   isset($_POST["cambios"]) AND $_POST["cambios"] == 'ESPERA DE TROQUEL' AND
   isset($_POST["cambioC"]) AND $_POST["cambioC"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] == '') {

   $consulta = "UPDATE atrasosproduccion set comentario='$cambios' where orden='$orden'";
    $result = $conexion -> query($consulta);

   $consulta2 = "UPDATE analisisatrasos set comentario='$cambios' where orden='$orden'";
      $result2 = $conexion -> query($consulta2);

    echo "<center><h1>Datos Guardados <h1>";
      echo "<form action='/produccion/atrasosProduccion.php' method='post'>
           <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
       </form>";

 }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '') {


    $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
     $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

 }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '') {


    $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
     $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

 }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '') {


    $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$lamina / $operacion $proceso / $tallerM / $maquina $NoMaquina' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel / $maquina $NoMaquina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

 }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != ''  AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' ) {


    $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$lamina / $operacion $proceso / $tallerM, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $operacion $proceso / $tallerM, $newDate, $reparacion, $troquel, $tallerMC / $maquina $NoMaquina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

 }elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
    isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
    isset($_POST["programada"]) AND $_POST["programada"] ==  '' AND
    isset($_POST["proceso"]) AND $_POST["proceso"] != '' ){

    $consulta = "UPDATE atrasosproduccion set comentario='$lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
     $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

}elseif(isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
   isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
   isset($_POST["proceso"]) AND $_POST["proceso"] != '') {

   $consulta = "UPDATE atrasosproduccion set comentario='$lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
    $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $operacion $proceso / $maquina $NoMaquina' where orden='$orden'";
      $result2 = $conexion -> query($consulta2);

    echo "<center><h1>Datos Guardados <h1>";
      echo "<form action='/produccion/atrasosProduccion.php' method='post'>
           <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
       </form>";

}elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
  isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
  isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '') {

    $consulta = "UPDATE atrasosproduccion set comentario='$lamina / $programada, $comentarioPro' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $programada, $comentarioPro' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

}elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
  isset($_POST["programada"]) AND $_POST["programada"] == 'PROGRAMADA' AND
  isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '') {

    $consulta = "UPDATE atrasosproduccion set comentario='$lamina / $programada' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $programada' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

}elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
  isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
  isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] != '') {

    $consulta = "UPDATE atrasosproduccion set comentario='$lamina / $comentarioPro' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $comentarioPro' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

}elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != 'SIN LAMINA' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
  isset($_POST["programada"]) AND $_POST["programada"] == 'NO' AND
  isset($_POST["comentarioPro"]) AND $_POST["comentarioPro"] == '') {

    $consulta = "UPDATE atrasosproduccion set comentario='$lamina' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

}elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
  isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] != '') {

  $consulta = "UPDATE atrasosproduccion set comentario='$lamina, $comentarioSinL' where orden='$orden'";
   $result = $conexion -> query($consulta);

  $consulta2 = "UPDATE analisisatrasos set comentario='$lamina, $comentarioSinL' where orden='$orden'";
     $result2 = $conexion -> query($consulta2);

   echo "<center><h1>Datos Guardados <h1>";
     echo "<form action='/produccion/atrasosProduccion.php' method='post'>
          <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
      </form>";

}elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] == 'SIN LAMINA' AND
  isset($_POST["lamina"]) AND $_POST["lamina"] != '' AND
  isset($_POST["comentarioSinL"]) AND $_POST["comentarioSinL"] == '') {

    $consulta = "UPDATE atrasosproduccion set comentario='$lamina' where orden='$orden'";
     $result = $conexion -> query($consulta);

    $consulta2 = "UPDATE analisisatrasos set comentario='$lamina' where orden='$orden'";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados <h1>";
       echo "<form action='/produccion/atrasosProduccion.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
        </form>";

} elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' AND
     isset($_POST["programada"]) AND $_POST["programada"] == '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] == '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$lamina / $tallerM' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $tallerM, $newDate, $reparacion, $troquel' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";
    }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
    isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
    isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' AND
     isset($_POST["programada"]) AND $_POST["programada"] == '' AND
     isset($_POST["proceso"]) AND $_POST["proceso"] == '' AND
     isset($_POST["lamina"]) AND $_POST["lamina"] != '' ) {

     $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$lamina / $tallerM, $tallerMC' where orden='$orden'";
      $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE analisisatrasos set comentario='$lamina / $tallerM, $newDate, $reparacion, $troquel, $tallerMC' where orden='$orden'";
        $result2 = $conexion -> query($consulta2);

      echo "<center><h1>Datos Guardados <h1>";
        echo "<form action='/produccion/atrasosProduccion.php' method='post'>
             <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
         </form>";
    }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
        isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
        isset($_POST["tallerMC"]) AND $_POST["tallerMC"] ==  '' AND
         isset($_POST["programada"]) AND $_POST["programada"] == '' AND
         isset($_POST["proceso"]) AND $_POST["proceso"] == '' AND
         isset($_POST["lamina"]) AND $_POST["lamina"] == '' ) {

         $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$tallerM' where orden='$orden'";
          $result = $conexion -> query($consulta);

         $consulta2 = "UPDATE analisisatrasos set comentario='$tallerM, $newDate, $reparacion, $troquel' where orden='$orden'";
            $result2 = $conexion -> query($consulta2);

          echo "<center><h1>Datos Guardados <h1>";
            echo "<form action='/produccion/atrasosProduccion.php' method='post'>
                 <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
             </form>";
        }elseif (isset($_POST["cambios"]) AND $_POST["cambios"] == '' AND
        isset($_POST["tallerM"]) AND $_POST["tallerM"] ==  'TALLER MECANICO' AND
        isset($_POST["tallerMC"]) AND $_POST["tallerMC"] !=  '' AND
         isset($_POST["programada"]) AND $_POST["programada"] == '' AND
         isset($_POST["proceso"]) AND $_POST["proceso"] == '' AND
         isset($_POST["lamina"]) AND $_POST["lamina"] == '' ) {

         $consulta = "UPDATE atrasosproduccion set troquel='$troquel', fechaEnt='$newDate', reparacion='$reparacion', comentario='$tallerM, $tallerMC' where orden='$orden'";
          $result = $conexion -> query($consulta);

         $consulta2 = "UPDATE analisisatrasos set comentario='$tallerM, $newDate, $reparacion, $troquel, $tallerMC' where orden='$orden'";
            $result2 = $conexion -> query($consulta2);

          echo "<center><h1>Datos Guardados <h1>";
            echo "<form action='/produccion/atrasosProduccion.php' method='post'>
                 <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
             </form>";
        }elseif (isset($_POST["JIUTEPEC"]) AND $_POST["JIUTEPEC"] == TRUE) {

          $JIUTEPEC = $_POST['JIUTEPEC'];
          $comJ = $_POST['comJ'];

         $consulta = "UPDATE atrasosproduccion set  comentario='$JIUTEPEC, $comJ' where orden='$orden'";
          $result = $conexion -> query($consulta);

         $consulta2 = "UPDATE analisisatrasos set comentario='$JIUTEPEC, $comJ' where orden='$orden'";
            $result2 = $conexion -> query($consulta2);

          echo "<center><font face='Bookman Old Style,arial,verdana' style='color: white'><h1>Datos Guardados <h1></font>";
            echo "<form action='/produccion/atrasosProduccion.php' method='post'>
                 <button type='submit' style='background-color:transparent; border-color:transparent; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80' class='zoom'/></button>
             </form>";
        }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <script type="text/javascript">
       if (window.history.replaceState) { // verificamos disponibilidad
           window.history.replaceState(null, null, window.location.href);
       }
     </script>
     <title>ORDEN PROD</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
     <link rel="stylesheet" href="/produccion/css/menu.css">
   </head>
   <body>
   </body>
 </html>
