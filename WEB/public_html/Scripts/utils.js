function eliminar(id) {
    let getUrl = window.location;
    let baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    let respuesta = confirm("¿Está seguro de eliminar el registro seleccionado?");
    if (respuesta) {
        window.location.replace(baseUrl + "/poo/delete.php?id=" + id);
    }
}