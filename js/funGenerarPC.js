function mostrar() {
  const selectElement = document.querySelector('.nivCambio');
  var res  = `${event.target.value}`;
  for (var i = 1; i <= 20; i++) {
var divCambio = document.getElementById("flotanteC" + i);
var divFecha = document.getElementById("flotanteFecha" + i);

divCambio.style.display = (i <= res) ? '' : 'none';
divFecha.style.display = (i <= res) ? '' : 'none';
}
}
