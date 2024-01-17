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

$id = $_POST['id'];
$componente = $_POST['componente'];
$cr = $_POST['cr'];
$calibre = $_POST['calibre'];
$fecha = $_POST['fecha'];
$op = $_POST['op'];
$maquina = $_POST['maquina'];
//$operador = $_POST['operador'];
$libs = $_POST['libs'];
$causa = $_POST['causa'];


$newDate = date("d/m/Y", strtotime($fecha));

if(isset($_POST["componente"]) AND $_POST["componente"] AND
   isset($_POST["cr"]) AND $_POST["cr"] AND
   isset($_POST["calibre"]) AND $_POST["calibre"] AND
   isset($_POST["op"]) AND $_POST["op"] != '' AND
   isset($_POST["maquina"]) AND $_POST["maquina"] != ''){

     $consulta = "UPDATE instpptroquelado SET fecha='$fecha',operacion='$op', maquina='$maquina',libs='$libs',causaR='$causa' WHERE id='$id' AND componente='$componente'";
       $result = $conexion -> query($consulta);

     $consulta2 = "UPDATE instpptroquelado JOIN troqueles ON troqueles.componente = instpptroquelado.componente SET instpptroquelado.troquel = troqueles.troquel WHERE troqueles.numOperaciones=instpptroquelado.operacion";
       $result2 = $conexion -> query($consulta2);

     echo "<center><h1>Datos Guardados<h1>";
       echo "<form action='/produccion/ListaInstPPTInterfaz.php' method='post'>
            <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
        </form>";
   }else if(isset($_POST["componente"]) AND $_POST["componente"] AND
      isset($_POST["cr"]) AND $_POST["cr"] AND
      isset($_POST["calibre"]) AND $_POST["calibre"] AND
      isset($_POST["op"]) AND $_POST["op"] != '' AND
      isset($_POST["maquina"]) AND $_POST["maquina"] == ''){

        $consulta = "UPDATE instpptroquelado SET fecha='$fecha',operacion='$op', libs='$libs',causaR='$causa' WHERE id='$id' AND componente='$componente'";
          $result = $conexion -> query($consulta);

        $consulta2 = "UPDATE instpptroquelado JOIN troqueles ON troqueles.componente = instpptroquelado.componente SET instpptroquelado.troquel = troqueles.troquel WHERE troqueles.numOperaciones=instpptroquelado.operacion";
          $result2 = $conexion -> query($consulta2);

        echo "<center><h1>Datos Guardados<h1>";
          echo "<form action='/produccion/ListaInstPPTInterfaz.php' method='post'>
               <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
           </form>";
      }else if(isset($_POST["componente"]) AND $_POST["componente"] AND
         isset($_POST["cr"]) AND $_POST["cr"] AND
         isset($_POST["calibre"]) AND $_POST["calibre"] AND
         isset($_POST["op"]) AND $_POST["op"] == '' AND
         isset($_POST["maquina"]) AND $_POST["maquina"] != ''){

           $consulta = "UPDATE instpptroquelado SET fecha='$fecha', maquina='$maquina',libs='$libs',causaR='$causa' WHERE id='$id' AND componente='$componente'";
             $result = $conexion -> query($consulta);


           echo "<center><h1>Datos Guardados<h1>";
             echo "<form action='/produccion/ListaInstPPTInterfaz.php' method='post'>
                  <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
              </form>";
         }else if(isset($_POST["componente"]) AND $_POST["componente"] AND
            isset($_POST["cr"]) AND $_POST["cr"] AND
            isset($_POST["calibre"]) AND $_POST["calibre"] AND
            isset($_POST["op"]) AND $_POST["op"] == '' AND
            isset($_POST["maquina"]) AND $_POST["maquina"] == ''){

              $consulta = "UPDATE instpptroquelado SET fecha='$fecha', libs='$libs',causaR='$causa' WHERE id='$id' AND componente='$componente'";
                $result = $conexion -> query($consulta);


              echo "<center><h1>Datos Guardados<h1>";
                echo "<form action='/produccion/ListaInstPPTInterfaz.php' method='post'>
                     <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;' class='btn btn-info btn_add'><img src='/produccion/img/ok.png' width='80' height='80'/></button>
                 </form>";
            }else{
                echo "<center><h2>ERROR. DATOS NO GUARDADOS</h2>";
                echo "<br>";
                echo "<form action='/produccion/php/ListaInstPPTInterfaz.php' method='post'>
                     <button type='submit' style='background-color:#AED6F1; border-color:#AED6F1; border:0;'' class='btn btn-info btn_add'><img src='/produccion/img/volver.png' width='150' height='60' class='zoom'/></button>
                 </form></center>";
           }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>GUARDAR INST. T. M.</title>
     <link rel="shortcut icon" href="/produccion/img/icono.png">
   </head>
   <body  bgcolor="#AED6F1">
   </body>
 </html>
