var tabla = document.getElementById("tableUsers");
var ourRequest = new XMLHttpRequest();
  ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-1.json');
  ourRequest.onload = function() {
    if (ourRequest.status >= 200 && ourRequest.status < 400) {
      var ourData = JSON.parse(ourRequest.responseText);
      renderHTML(ourData);
    } else {
      console.log("We connected to the server, but it returned an error.");
    }
    
  };

  ourRequest.onerror = function() {
    console.log("Connection error");
  };

  ourRequest.send();

  function renderHTML(data) {
    var StringData = "<tr>";
    console.log(data);
    for (i = 0; i < data.length; i++) {
        StringData += `
        <td>`+data[i].nombreUsuario+`</td>
        <td>`+data[i].nombre+`</td>
        <td>`+data[i].correo+`</td>
        <td>`+data[i].rol+`</td>
        <td>`+data[i].actividades+`</td>
        <td>
          <a href="verUsuario.html?id=` + data[i].id + `"  title="Ver" data-toggle="tooltip" style=color:green;><i class="material-icons" ></i>Ver</a>
          <a href="editarUsuario.html?id=` + data[i].id + `"  title="Editar" data-toggle="tooltip"><i class="material-icons"></i>Editar</a>
          <a onclick="eliminar(` + data[i].id + `)"  title="Eliminar" data-toggle="tooltip" style=color:red><i class="material-icons"></i>Eliminar</a>
        </td>
        </tr>`;

        StringData += "</tr>";

        tabla.insertAdjacentHTML('afterbegin', StringData);
        
        StringData = "<tr>";

    
    }
  }
