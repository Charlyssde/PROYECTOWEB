function eliminar(id) {
    let respuesta = confirm("¿Está seguro de eliminar el registro seleccionado?");
    if (respuesta) {
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('DELETE', 'http://25.1.174.156/actividadestrello/eliminaractividad?id_actividad=' + id);
        ourRequest.onload = function () {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                alert("Eliminado");
                location.reload();
            } else {
                console.log("We connected to the server, but it returned an error.");
                alert("Error");
            }

        };

        ourRequest.onerror = function () {
            console.log("Connection error");
        };

        ourRequest.send();
    }

}