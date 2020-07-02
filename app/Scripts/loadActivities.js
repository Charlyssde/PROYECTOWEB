var tablaPend = document.getElementById("tablePend");
var tablaTerm = document.getElementById("tableTerm");
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
    var StringPend = "<tr>";
    var StringTerm ="<tr>";
    for (i = 0; i < data.length; i++) {
      if(data[i].estatus != 'terminada'){
        StringPend += `
        <td>`+data[i].nombre+`</td>
        <td>
          <a href="verActividad.html?id=` + data[i].id + `" onclick=verActividad(` + data[i] + `); title="Ver" data-toggle="tooltip" style=color:green;><i class="material-icons" ></i>Ver</a>
          <a href="editarActividad.html?id=` + data[i].id + `"  title="Editar" data-toggle="tooltip"><i class="material-icons"></i>Editar</a>
          <a onclick="eliminar(` + data[i].id + `)"  title="Eliminar" data-toggle="tooltip" style=color:red><i class="material-icons"></i>Eliminar</a>
        </td>
        </tr>`;

        StringPend += "</tr>";

        tablaPend.insertAdjacentHTML('afterbegin', StringPend);
        
        StringPend = "<tr>";

      }else{
        StringTerm += `
        <td>`+data[i].nombre+`</td>
        <td>
          <a href="verActividad.php?id=` + data[i].id + `" class="view" title="Ver" data-toggle="tooltip"><i class="material-icons"></i>Ver</a>
        </td>
        </tr>`;

        StringTerm += "</tr>";
        tablaTerm.insertAdjacentHTML('afterbegin', StringTerm);
        
        StringTerm ="<tr>";
      }
    
    }
  }
