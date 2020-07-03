var buttonUpdate = document.getElementById("btnSave");

var btnBack = document.getElementById("btnBack");

var id = obtenerValorParametro("id_actividad");

buttonUpdate.addEventListener("click", function () {
    var nombreEdit = document.getElementById("nombre");
    var descripcionEdit = document.getElementById("descripcion");
    var estatus = document.getElementById("rdTerminado");
    var estado;
    if(estatus.checked == true){
        estado = 'terminado';
    }else{
        estado = 'pendiente';
    }

    if (descripcion.value == "" || nombre.value == "") {
        alert("No se pueden quedar los campos vacíos");
    } else {
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('PUT', 'http://25.1.174.156/actividadestrello/actualizaractividad?id_actividad= ' + id + '&nombre_actividad=' + nombre.value + '&descripcion_actividad=' + descripcion.value + '&estatus='+ estado);
        ourRequest.onload = function () {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                alert("EXITO AL GUARDAR");
                window.history.back();
            } else {
                console.log("We connected to the server, but it returned an error.");
                alert("ERROR DE CONEXION");
            }

        };

        ourRequest.onerror = function () {
            console.log("Connection error");
            alert("ERROR DE CONEXION");
        };
        

        ourRequest.send();
    }
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
