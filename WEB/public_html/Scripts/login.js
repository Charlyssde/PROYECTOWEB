var button = document.getElementById("btnLogin");

button.addEventListener("click", function () {
    var password = document.getElementById("password").value;
    var username = document.getElementById("nombreUsuario").value;


    if (username == "" || password == "") {
        alert("No puede haber campos vacíos");
    } else {
        var ourRequest = new XMLHttpRequest();
        
        ourRequest.open('GET', 'http://25.1.174.156/actividadestrello/logging?nombre_usuario=' + username + "&password="+ password);
        
        ourRequest.onload = function () {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                var ourData = JSON.parse(ourRequest.responseText);
                if(ourRequest.responseText.includes("NotMatch")){
                    alert("Credenciales inválidas, ingrese unas correctas");
                }else{
                    renderHTML(ourData);
                }
                
            } else {
                alert("Error de conexión");
            }

        };

        ourRequest.onerror = function () {
            console.log("Connection error");
        };
        //ourRequest.setRequestHeader( 'Access-Control-Allow-Origin', '*' );
        ourRequest.send();

    }
    function renderHTML(data) {
        if(data.rol == 'integrante'){
            window.location.href = "./actividades.html?id_usuario=" + data.id_usuario;
        }else{
            window.location.href = "./admin_usuarios.html?id_usuario=" + data.id_usuario;
        }

    }
})




