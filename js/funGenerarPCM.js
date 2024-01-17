function enviarSiguienteProceso(siguienteProceso) {
  var form = document.getElementById("formPCM");

  // Puedes usar la variable siguienteProceso aquí según tus necesidades
  var siguienteProcesoURL = "GenerarPC" + siguienteProceso + ".php";

  form.action = siguienteProcesoURL;
  form.submit();
}

  function eliminarProcesos() {
    var respuesta = confirm("La información del último proceso se eliminará ¿Estas de acuerdo?");
    if (respuesta) {
      var form = document.getElementById("formPCM");
      form.action = "eliminarProcesos.php"
      form.submit();
    } else {
      window.location.href = "GenerarPCM.php";
    }
  }

  function mostrar() {
    const selectElement = document.querySelector('.actividad');
    var res  = `${event.target.value}`;
    for (var i = 1; i <= 10; i++) {
      var div = document.getElementById("flotante"+i);
      div.style.display = (i <= res) ? '' : 'none';
      var div2 = document.getElementById("flotante"+i+"_"+i);
      div2.style.display = (i <= res) ? '' : 'none';
    }
  }

  function validarCampos(campoId, msg) {
    const valor = document.getElementById(campoId).value.trim();
    if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
      alert(msg);
      return false;
    }
    return true;
  }

  function validacion() {
    var nivR = validarCampos("nivelRev","FAVOR DE LLENAR EL CAMPO: NIVEL DE REVISIÓN");
    var fechaRev = validarCampos("fechaRev","FAVOR DE LLENAR EL CAMPO: FECHA DE REVISIÓN");
    var nivJC = validarCampos("nivelParJC","FAVOR DE LLENAR EL CAMPO: NIVEL DE NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO");
    var fechaJC = validarCampos("fechaeParJC","FAVOR DE LLENAR EL CAMPO: FECHA DE NÚMERO DE PARTE JC/ÚLTIMO NIVEL DE CAMBIO");
    var num = document.getElementById("nivCambio").selectedIndex;
    var cambValue = true;
    var fechaValue = true;
    if (num != 0) {
      for (let i = 1; i <= num; i++) {
        cambValue = cambValue && validarCampos(`camb${i}`, `FAVOR DE LLENAR EL CAMPO: CAMBIO ${i}`);
        fechaValue = fechaValue && validarCampos(`fecha${i}`, `FAVOR DE LLENAR EL CAMPO: FECHA ${i}`);
      }
      return nivR && fechaRev && nivJC && fechaJC && fechaValue && cambValue;
    } else {
      return nivR && fechaRev && nivJC && fechaJC;
    }
  }
