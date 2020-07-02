var nombre = document.getElementById("nombre");
var password = document.getElementById("password");
var correo = document.getElementById("correo");
var username = document.getElementById("username");
var ourRequest = new XMLHttpRequest();
  ourRequest.open('GET', '');
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
    
    nombre
  }
