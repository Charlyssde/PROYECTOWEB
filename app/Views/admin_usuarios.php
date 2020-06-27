<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Administración de usuarios</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   </head>
    <body style="margin:50px;">

        <div class=row>
            <h3 class="col-10 display-4 text-left">Administración de usuarios</h3>
            <img class="col text-right" src="../imgs/header.gif" alt="logo" width="100" height="80" >
        </div>
        <br><br><br><br>
        
        <form action="" method="POST">
            <div class="text-right">
                <label class="small">Ingrese un nombre de usuario:</label>
                <input class="shadow-none" type="search" placeholder="nombre de usuario" required></input>
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
            <br><br>
        </form>
        <div>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>N° Acts</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>USER123</td>
                            <td>Carlos Carrillo</td>
                            <td>texcharly9@gmail.com</td>
                            <td>INTEGRANTE</td>
                            <td>231</td>
                            <td>
						        <a class="link_edit" href="editar_usuario.php?id=<?php echo $data["idusuario"]; ?>">Editar</a>
						        <a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["idusuario"]; ?>">Eliminar</a>
					        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <button class="btn btn-light text-white bg-dark border-dark" type="button" id="btnReporte">Generar reporte</button>
        </div>
        <div class="btn-group float-right" role="group">
            <button style="margin-left:10px; margin-right:10px;" class="btn btn-primary border rounded border-dark" type="button" id="btnAgregar" data-toggle="modal" data-target="#modalAgregar">
            Agregar</button>
           </div>
        <br><br><br><br><br>
            <form action="./login.php" method="get">
                    <button class="btn btn-secondary" type=submit>Salir</button>    
            </form> 
<!-----LOS MODALES--->
<!---Agregar-->
<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Agregar un nuevo usuario</h4>
				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
                <form action="" method="POST">
				    <div class=row>
                        <div class=col-6>
                            <div class="form-group">
                                <label for="nombre">Nombre completo:</label>
                                <input type="text" class="mr-sm-2 " placeholder="nombre + apellidos" id="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" class="mr-sm-2 " placeholder="correo electrónico" id="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="roles" required>Rol:</label>
                                <select name="roles" id="roles">
                                    <option value="integrante">INTEGRANTE</option>
                                    <option value="admin">ADMINISTRADOR</option>
                                </select>
                            </div>
                        </div>
                        <div class=col-6> 
                            <div class="form-group">
                                <label for="username">Nombre de usuario:</label>
                                <input type="text" class="mr-sm-2 " placeholder="nombre de usuario" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="mr-sm-2 " placeholder="contraseña" id="password" required>
                            </div>
                            <div class="btn-group float-right" role="group">
                                <button style="margin-left:10px; margin-right:15px;" class="btn btn-primary border rounded border-dark" type="submit" id="btnGuardarNuevo">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>


<!--ELIMINAR-->
<script>
function confirmarEliminar() {
  var result = confirm("¿Desea eliminar este elemento?");
  if (result) {
    //Aquí va el eliminar
  }
}
</script>

<!---TERMINAN MODALES---->












<!---PASAR VALORES AL MODAL
$(document).on("click", ".open-Modal", function () {
var myDNI = $(this).data('id');
$(".modal-body #DNI").val( myDNI );
});
-->







<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    </body>
</html>