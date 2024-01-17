<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.1/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="jspdf.plugin.autotable.min.js"></script>
    <link rel="stylesheet" href="css/botones.css">
    <link rel="shortcut icon" href="/produccion/img/icono.png">
    <title>Añadir Imagen a PDF</title>
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
    <img src='/produccion/img/jcLogo.png' class="izquierda"  width='120' height='120'/><br><br>
    <font face="Bookman Old Style,arial,verdana" style="text-shadow: 0.1em 0.1em 0.15em " SIZE="7"><n>AÑADIR CÓDIGO DE BARRAS A FACTURA</n></font><br><br>
    <form id="pdfForm"><br>
      <label for="pdfFile">Seleccionar PDF:</label>
      <input class="boton_4" type="file" id="pdfFile" name="pdfFile" accept=".pdf" required><br><br>
      <label for="imagen">Seleccionar Imagen:</label>
      <input class="boton_4" type="file" id="imagen" name="imagen" accept=".png, .jpg, .jpeg" required><br><br>
      <button class="boton_5" type="button" onclick="generarPDF()">Descargar</button>
    </form>
    <script type="text/javascript">
      function generarPDF() {
        const pdfFile = document.getElementById('pdfFile').files[0];
        const imagenFile = document.getElementById('imagen').files[0];
        if (pdfFile && imagenFile) {
          const reader = new FileReader();
          reader.onload = function () {
            // Cargar el PDF usando pdf.js
            pdfjsLib.getDocument(new Uint8Array(reader.result)).promise.then(function (pdf) {
              // Crear un objeto jsPDF
              var jsPDFDoc = new jsPDF({ unit: 'px', format: [520,670], });
              // Obtener la primera página del PDF
              pdf.getPage(1).then(function (page) {
                var viewport = page.getViewport({ scale: 1.5 });
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                // Renderizar la página del PDF en un canvas
                var renderContext = { canvasContext: context, viewport: viewport };
                page.render(renderContext).promise.then(function () {
                  // Añadir la imagen del canvas al nuevo PDF
                  jsPDFDoc.addImage(canvas.toDataURL('image/png'), 'png', 0, 0);
                  // Añadir la imagen al nuevo PDF
                  var imagen = new Image();
                  var canvasImagen = document.createElement('canvas');
                  var ctx = canvasImagen.getContext('2d');
                  imagen.onload = function () {
                    canvasImagen.width = imagen.width;
                    canvasImagen.height = imagen.height;
                    ctx.drawImage(imagen, 0, 0);
                    const imageData = canvasImagen.toDataURL('image/png');
                    jsPDFDoc.addImage(imageData, 'png', 370, 540, 120, 80);
                    // Guardar o mostrar el PDF, según tus necesidades
                    jsPDFDoc.save('pdf_modificado.pdf');
                  };
                  // Convertir la imagen a formato base64 antes de cargarla
                  const readerImagen = new FileReader();
                  readerImagen.onload = function () {
                    imagen.src = readerImagen.result;
                  };
                  readerImagen.readAsDataURL(imagenFile);
                });
              });
            });
          };
          // Leer el contenido del PDF como un array buffer
          reader.readAsArrayBuffer(pdfFile);
        } else {
          alert('Por favor, selecciona un archivo PDF y una imagen.');
        }
      }
    </script>
</body>
</html>
