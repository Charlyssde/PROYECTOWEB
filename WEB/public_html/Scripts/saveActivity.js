
var id = obtenerValorParametro("id_usuario");

var button = document.getElementById("btnGuardarNuevo");

button.addEventListener("click", function () {
    var descripcion = document.getElementById("descripcionNueva");
    var nombre = document.getElementById("nombreNuevo");

    if (descripcion.value == "" || nombre.value == "") {
        alert("No se pueden quedar los campos vacíos");
    } else {
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('POST', 'http://25.1.174.156/actividadestrello/registraractividad?nombre_actividad=' + nombre.value + '&descripcion_actividad=' + descripcion.value + '&estatus=pendiente&id_usuario=' + id);
        ourRequest.onload = function () {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                alert("EXITO AL GUARDAR");
                location.reload();
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