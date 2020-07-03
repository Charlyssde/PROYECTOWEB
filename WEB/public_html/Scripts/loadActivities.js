var tablaPend = document.getElementById("tablePend");
var tablaTerm = document.getElementById("tableTerm");

var btnSalir = document.getElementById("btnSalir");

var id = obtenerValorParametro("id_usuario");


var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', 'http://25.1.174.156/actividadestrello/listaactividades?id_usuario=' + id);
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
  var StringPend = "<tr>";
  var StringTerm = "<tr>";
  for (i = 0; i < data.length; i++) {
    if (data[i].estatus != 'terminado') {
      StringPend += `
        <td>`+ data[i].nombre_actividad + `</td>
        <td>
          <a href="verActividad.html?id_actividad=` + data[i].id_actividad + `" onclick=verActividad(` + data[i] + `); title="Ver" data-toggle="tooltip" style=color:green;><i class="material-icons" ></i>Ver</a>
          <a href="editarActividad.html?id_actividad=` + data[i].id_actividad + `"  title="Editar" data-toggle="tooltip"><i class="material-icons"></i>Editar</a>
          <a onclick="eliminar(` + data[i].id_actividad + `)"  title="Eliminar" data-toggle="tooltip" style=color:red><i class="material-icons"></i>Eliminar</a>
        </td>
        </tr>`;

      StringPend += "</tr>";

      tablaPend.insertAdjacentHTML('afterbegin', StringPend);

      StringPend = "<tr>";

    } else {
      StringTerm += `
        <td>`+ data[i].nombre_actividad + `</td>
        <td>
          <a href="verActividad.php?id=` + data[i].id_actividad + `" class="view" title="Ver" data-toggle="tooltip"><i class="material-icons"></i>Ver</a>
        </td>
        </tr>`;

      StringTerm += "</tr>";
      tablaTerm.insertAdjacentHTML('afterbegin', StringTerm);

      StringTerm = "<tr>";
    }

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