$(buscar_datos2());

function buscar_datos2(consulta){
  $.ajax({
    url: 'php/UbTroquel.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#datos2").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  })
}

$(document).on('keyup','#txtbusca2', function(){
  var valor = $(this).val();
  if (valor != "") {
    buscar_datos2(valor);
  }else{
    buscar_datos2();
  }
});
