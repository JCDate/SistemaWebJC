<?php
session_start();
if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo']=time();
}
else if (time() - $_SESSION['tiempo'] > 3600) {
    session_destroy();
    /* Aquí redireccionas a la url especifica */
    header("Location: login.php");
    die();
}
$_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual
require_once "conexion.php";
?>

  <html lang='en' dir='ltr'>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/0.7.21/webcomponents-lite.min.js"></script>
        <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
          <script src="js/menu.js"></script>


      <title>Inicio</title>
      <link rel="shortcut icon" href="img/icono.png">
    </head>
    <body >
      <div id='div1'>
          <div id='menu1'>
          </div>
      </div>
      <div  align='center'>
        <br><br><br><br><br><br>
        <font face='Bookman Old Style,arial,verdana' style='text-shadow: 0.1em 0.1em 0.15em;'  text-align='center' SIZE='7' >JC FABRICA DE TROQUELES MOLDES Y TROQUELADOS </font>
      </div>
        <div id="box">
          <h1>FILOSOFÍA</h1>
          <br>
          <table>
            <tr>
              <td>
                <h2>MISIÓN</h2>
                <img src='img/mision.png' class="izquierda"  width='80' height='80' />
                <h3>Somos una empresa del ramo metal-mecánico dedicada a la fabricación de productos troquelados de alta precisión para la industria automotriz, que responden a los requerimientos de calidad de nuestros clientes, a precios competitivos y en tiempos de entrega oportunos; brindando atención y servicio, eficiente y eficaz; pendientes permanentemente de sus necesidades y expectativas, mediante un proceso de mejora continua, que nos lleva al beneficio mutuo de los clientes y la empresa.</h3>
              </td>
              <td>
                <h2>VISIÓN</h2>
                <img src='img/vision.png' class="izquierda"  width='80' height='80' />
                <h3>Ser una empresa líder, de clase mundial, en la fabricación de láminas troqueladas, altamente productiva y rentable, con tecnología de avanzada, en constante innovación y mejora continua para la fabricación de diversas partes troqueladas de alta precisión que demanda la industria automotriz; manteniendo siempre una estrecha relación entre el cliente y el proveedor.</h3>
              </td>
            </tr>
            <tr>
              <td><br><br>
                <h2>VALORES</h2>
                <img src='img/valores.png' class="izquierda"  width='80' height='80' /><br>
                <h3>
                  * Respeto <br>
                  * Responsabilidad <br>
                  * Honestidad <br>
                  * Lealtad <br>
                  * Etica <br>
                  * Trabajo en equipo <br>
                  * Facultamiento <br>
                  * Apertura <br>
                </h3>
              </td>
              <td><br><br>
                <h2>POLITICA</h2>
                <img src='img/politica.png' class="izquierda"  width='80' height='80' />
                <h3>Es nuestro compromiso establecer y mantener permanentemente en operación un sistema de calidad que garantice a nuestros clientes la  plena satisfacción de sus requisitos y expectativas, mediante un proceso de mejora continua de los productos troquelados que fabricamos y de los procesos, cuidando, al mismo tiempo, de hacerlo libre de riesgos para los empleados, la comunidad y el medio ambiente, permaneciendo invariablemente como empresa segura.</h3>
              </td>
            </tr>
          </table>
        </div>
        <div id="box2" >
          <h1>CONTACTOS</h1><br>
          <center>
          <table style="text-align: center;">
            <tr>
              <td>
                <h2>TELEFONO</h2>
                <img src='img/telefono.png' class="izquierda"  width='40' height='40' />
                <h3>(341)133 07 17 <br>
                    (341)133 07 07</h3>
              </td>
              <td>
                <h2>CORREO</h2>
                <img src='img/correo.png' class="izquierda"  width='30' height='40' />
                <h3>N/A</h3>
              </td>
              <td>
                <h2>FACEBOOK</h2>
                <img src='img/face.png' class="izquierda"  width='50' height='50' />
                <h3>JC Troquelados</h3>
              </td>
            </tr>
            <tr>
              <td colspan="3"><br>
               <h1>DIRECCIÓN</h1>
               <img src='img/direccion.png' class="izquierda"  width='50' height='50' />
               <h3>Circuito Norte 1 y 3 dentro del Parque Industrial Zapotlán 2000, C.P. 49000, Ciudad Guzmán, Jal. México</h3><br>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60118.39160430549!2d-103.53617190522765!3d19.65295544290662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842f87b5b2ea2a25%3A0x4e3b78ec1d97ae44!2sParque%20Industrial%20Zapotlan%202000!5e0!3m2!1ses!2smx!4v1669667995711!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

             </td>
            </tr>
          </table>
        </center>
        </div>
    </body>
  </html>
