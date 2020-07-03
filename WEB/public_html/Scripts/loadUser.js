var nombre = document.getElementById("nombre");
var password = document.getElementById("password");
var correo = document.getElementById("correo");
var username = document.getElementById("username");
var rol = document.getElementById("rol");

var btnBack =  document.getElementById("btnBack");

var id = obtenerValorParametro("id_usuario");


var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', 'http://25.1.174.156/actividadestrello/obtenerusuario?id_usuario=' + id);
ourRequest.onload = function () {
  if (ourRequest.status >= 200 && ourRequest.status < 400) {
    var ourData = JSON.parse(ourRequest.responseText);
    console.log(ourData);
    renderHTML(ourData);
  } else {
    console.log("We connected to the server, but it returned an error.");
  }

};

ourRequest.onerror = function () {
  console.log("Connection error");
};

ourRequest.send();

function renderHTML(data) {

  nombre.value = data.nombre_completo;
  correo.value = data.correo;
  username.value = data.nombre_usuario;
  password.value = data.password;
  rol.value = data.rol;
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

