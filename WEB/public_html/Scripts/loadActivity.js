var nombre = document.getElementById("nombre");
var descripcion = document.getElementById("descripcion");
var terminado = document.getElementById("rdTerminado");
var pendiente = document.getElementById("rdPendiente");
var btnBack =  document.getElementById("btnBack");
var id = obtenerValorParametro("id_actividad");

var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', 'http://25.1.174.156/actividadestrello/obteneractividad?id_actividad=' + id);
ourRequest.onload = function () {
  if (ourRequest.status >= 200 && ourRequest.status < 400) {
    var ourData = JSON.parse(ourRequest.responseText);
    renderHTML(ourData);
  } else {
    console.log("We connected to the server, but it returned an error.");
  }

};

ourRequest.onerror = function () {
  console.log("Connection error");
};

ourRequest.send('id = ' + id);

function renderHTML(data) {

  nombre.value = data.nombre_actividad;
  descripcion.value = data.descripcion_actividad;
  if (data.estatus == 'pendiente') {
    pendiente.checked = true;
    terminado.checked = false;
  } else {
    pendiente.checked = false;
    terminado.checked = true;
  }



}

function obtenerValorParametro(sParametroNombre) {
  var sPaginaURL = window.location.search.substring(1);
  var sURLVariables = sPaginaURL.split('&');
  for (var i = 0; i < sURLVariables.length; i++) {
    var sParametro = sURLVariables[i].split('=');
    if (sParametro[0] == sParametroNombre) {
      return sParametro[1];
    }
  }
  return null;
}

btnBack.addEventListener("click", function(){
  window.history.back();
});


