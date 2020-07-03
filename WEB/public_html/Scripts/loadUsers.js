var tabla = document.getElementById("tableUsers");
var buttonSave = document.getElementById("btnGuardarNuevo");

var btnSalir = document.getElementById("btnSalir");

var id = obtenerValorParametro("id_usuario");

var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', 'http://25.1.174.156/actividadestrello/listausuarios');
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

ourRequest.send();

function renderHTML(data) {
  var StringData = "<tr>";
  console.log(data);
  for (i = 0; i < data.length; i++) {
    StringData += `
        <td>`+ data[i].nombre_usuario + `</td>
        <td>`+ data[i].nombre_completo + `</td>
        <td>`+ data[i].correo + `</td>
        <td>`+ data[i].rol + `</td>
        <td>
          <a href="verUsuario.html?id_usuario=` + data[i].id_usuario + `"  title="Ver" data-toggle="tooltip" style=color:green;><i class="material-icons" ></i>Ver</a>
          <a href="editarUsuario.html?id_usuario=` + data[i].id_usuario + `"  title="Editar" data-toggle="tooltip"><i class="material-icons"></i>Editar</a>
          <a onclick="eliminar(` + data[i].id_usuario + `)"  title="Eliminar" data-toggle="tooltip" style=color:red><i class="material-icons"></i>Eliminar</a>
        </td>
        </tr>`;

    StringData += "</tr>";

    tabla.insertAdjacentHTML('afterbegin', StringData);

    StringData = "<tr>";


  }
}

btnSalir.addEventListener("click", function(){
  location.replace("./login.html");
});

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
