<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Mis actividades</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body style="margin-left:35px; margin-right:20px;">
        <h3 class="text-center">Mis actividades</h3>
        <br><br><br>
        <div class=row>
            <div class=col-10>
                <div class=button-group role=group>
                    <button style=margin:15px; class="btn btn-primary"  type="button" data-toggle="modal" data-target="#modalAgregarAct">Nueva actividad</button>
                    <button style=margin:15px; class="btn btn-dark" type="button" data-toggle="modal" data-target="#modalVerAct">Ver actividad</button>
                    <button style=margin:15px; class="btn btn-success" type="button" data-toggle="modal" data-target="#modalEditarAct">Editar actividad</button>
                    <button style=margin:15px; class="btn btn-danger" type="button" onclick="window.location='./login.php';">Eliminar actividad</button>
                </div>
            </div>
            <div class=col-2>
                <form action="./login.php" method="get">
                    <button class="btn btn-secondary" type=submit onclick=cerrarSesion()>Salir</button>    
                </form>   
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-6 text-center">
                <h3>ACTIVIDADES PENDIENTES</h3>

            </div>
            <div class="col-6 text-center">
                <h3>ACTIVIDADES FINALIZADAS</h3>
            </div>
        </div>



<!-----LOS MODALES--->
<!---Agregar-->
<div class="modal fade" id="modalAgregarAct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Registrar una nueva actividad</h4>
				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
                <form action="" method="POST">
				    <div class=row>
                        <div class=col>
                            <div class="form-group">
                                <label for="nombre">Nombre de la actividad:</label>
                                <input type="text" class="mr-sm-2 " placeholder="nombre" id="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción de la actividad:</label>
                                <textarea type="text" class="mr-sm-2 " placeholder="" id="descripcion" required></textarea>
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

<!---Editar-->
<div class="modal fade" id="modalEditarAct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Editar actividad</h4>
				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
                <form action="" method="POST">
				    <div class=row>
                        <div class=col>
                            <div class="form-group">
                                <label for="nombre">Nombre de la actividad:</label>
                                <input type="text" class="mr-sm-2 " placeholder="nombre" id="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción de la actividad:</label>
                                <textarea type="text" class="mr-sm-2 " placeholder="" id="descripcion" required></textarea>
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

<!---Ver-->
<div class="modal fade" id="modalVerAct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actividad detallada</h4>
				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
                <form action="" method="POST">
				    <div class=row>
                        <div class=col>
                            <div class="form-group">
                                <label for="nombre">Nombre de la actividad:</label>
                                <input disabled type="text" class="mr-sm-2 " placeholder="nombre" id="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción de la actividad:</label>
                                <textarea disabled type="text" class="mr-sm-2 " placeholder="" id="descripcion" required></textarea>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>










<!--Confirmar eliminar-->
<script>
function confirmarEliminar() {
  var result = confirm("¿Desea eliminar este elemento?");
  if (result) {
    //Aquí va el eliminar
  }
}
</script>





<!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    </body>
</html>