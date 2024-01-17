<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    <link rel="stylesheet" href="css/botones.css">
    <title>Generador de Código de Barras</title>

</head>
<body align = "center" bgcolor='#AED6F1'>
  <style type="text/css">
    img.izquierda {
      float: left;
    }
    img.derecha {
      float: right;
    }
  </style>
  <img src='/produccion/img/jcLogo.png' class="izquierda"  width='120' height='120'/><br><br><br>

  <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7"><n>GENERADOR DE CÓDIGO DE BARRAS</n></font><br><br>
    <!--input type="text" id="codigoInput" placeholder="Ingrese el código"> <br><br -->

<input type="text" id="codigoInput"  style="font-family: Arial; font-size: 14pt;" required placeholder="Ingrese el código"> <br><br><br><br>

    <button class="boton_4" onclick="generarCodigoBarras()">Generar Código de Barras</button><br><br><br><br><br>
    <img id="codigoBarrasImage" alt="Código de Barras"><br><br>
    <button class="boton_5"><a id="descargarEnlace" style="display: none">Descargar Código de Barras</a></button><br><br>
    <button class="boton_6"><a href="formCB.php" >Combinar</a></button>

    <script>
        function generarCodigoBarras() {
            // Obtener el código ingresado por el usuario
            const codigo = "i"+document.getElementById('codigoInput').value;

            // Generar el código de barras y mostrarlo en una imagen
            JsBarcode("#codigoBarrasImage",codigo, {
                format: "CODE128",
                displayValue: false
            });

            // Mostrar el enlace de descarga
            document.getElementById('descargarEnlace').style.display = 'block';

            // Crear un enlace de descarga
            const enlace = document.getElementById('descargarEnlace');
            enlace.href = document.getElementById('codigoBarrasImage').src;
            enlace.download = codigo + '.png';
        }
    </script>
</body>
</html>
