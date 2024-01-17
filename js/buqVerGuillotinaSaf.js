$(buscar_datos3());

function buscar_datos3(consulta){
  $.ajax({
    url: 'php/VerGuillotinaSaf.php',
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
