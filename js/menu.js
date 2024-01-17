$(menu());

function menu(consulta){
  $.ajax({
    url: 'menu.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#menu1").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  })
  
}
