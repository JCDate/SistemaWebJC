
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
           var orden= $(this).closest('tr').children()[0].textContent;
           var componente = $(this).closest('tr').children()[3].textContent;
           var fechaV = $(this).closest('tr').children()[1].textContent;
           var cantidad = $(this).closest('tr').children()[2].textContent;

           $("#componente").val(componente);
           $("#orden").val(orden);
           $("#fechaV").val(fechaV);
           $("#cantidad").val(cantidad);
           });
       </script>
    <title>Atrasos</title>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
  </head>
  <body >

      <table overflow='scroll' height='100%' width='100%'>
      <thead>
      <tr>
        <th colspan="4" style=" font-size: 17pt;"> <h2>GERENTE DE PLANTA</h2></th>
      </tr>
      <tr>
      <td colspan="4"><img src='img/gerente.png' width='80' height='80' /><br>
        <h3>ARTURO KEHOE RIVERA</h3>
        <h3>CORREO: art_k_e@hotmail.com</h3>
        <h3>CEL: 55 3056 7978</h3><br>
      </td>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td align='center' style=" font-size: 16pt;" colspan="4">

        </td>
      </tr>
      <tr>
        <th><h2>GERENTE DE PRODUCCIÓN</h2> </th>
        <th><h2>FINANZAS Y COBRANZAS</h2> </th>
        <th><h2>RECURSOS HUMANOS</h2> </th>
        <th><h2>ASEGURAMIENTO DE CALIDAD</h2> </th>
      </tr>
      <tr>
        <td><br><img src='img/produccion.png' width='80' height='80' /><br>
          <h3>SILVIA MONROY CHAGOLLA</h3>
          <h3>CORREO: silvia.moch@hotmail.com</h3>
          <h3>CEL: 341 111 1058</h3>
        </td>
        <td><br><img src='img/finanzas.png' width='80' height='80' /><br><br>
          <h3>CLAUDIA JEANETTE RETANA LARIOS</h3>
          <h3>CORREO: claudia.retana2428@hotmail.com</h3>
          <h3>CEL: 341 419 7582</h3>
        </td>
        <td><br><img src='img/rh.png' width='80' height='80' /><br><br>
          <h3>PERLA LIZBETH MEDINA NARANJO</h3>
          <h3>CORREO: jc_rh22@outlook.com </h3>
          <h3>CEL: 341 176 7212</h3>
        </td>
        <td><img src='img/calidad.png' width='80' height='80' /><br><br>
          <h3>LAURA KARINA DELGADO JIMENEZ</h3>
          <h3>CORREO: aseg.calidadjc@gmail.com</h3>
          <h3>CEL: 341 125 7630</h3>
        </td>
      </tr>
        </tbody>
      </table>

  </body>
</html>
