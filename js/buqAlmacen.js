$(buscar_datos3());

function buscar_datos3(consulta){
  $.ajax({
    url: 'php/Almacen.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#datos").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  })
}

$(document).on('keyup','#txtbusca', function(){
  var valor = $(this).val();
  if (valor != "") {
    buscar_datos3(valor);
  }else{
    buscar_datos3();
  }
});
