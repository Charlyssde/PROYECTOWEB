<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Mis actividades</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body style="margin-left:35px; margin-right:20px;">
        <br><br>
        <div class=row>
            <h3 class="col-10 display-4 text-left">Mis actividades</h3>
            <img class="col text-right" src="../imgs/header.gif" alt="logo" width="100" height="80" >
        </div>
        <br><br><br>
        <div class=row>
            <div class=col-10>
                <div class=button-group role=group>
                    <button style=margin:15px; class="btn btn-primary"  type="button" data-toggle="modal" data-target="#modalAgregarAct">Nueva actividad</button>
                    <button style=margin:15px; class="btn btn-dark" type="button" data-toggle="modal" data-target="#modalVerAct">Ver actividad</button>
                    <a href="some.php">
                    <button disabled style=margin:15px; class="btn btn-success" type="button" id=btnEditarAct>Editar actividad</button>
                    </a>
                    <button style=margin:15px; class="btn btn-danger" type="button" onclick="confirmarEliminar();">Eliminar actividad</button>
                </div>
            </div>
            <div class=col-2>
                <form action="./login.php" method="get">
                    <button class="btn btn-secondary" type=submit>Salir</button>    
                </form>   
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-6 text-center">
                <h3 style=color:blue;>ACTIVIDADES PENDIENTES</h3>
                <br>
                <ul class="list-group text-left">
                    <li class="list-group-item-action list-group-item list-group-item-primary" onclick=habilita();>TAREA 1</li>
                    <li class="list-group-item-action list-group-item list-group-item-primary">TAREA 2</li>
                    <li class="list-group-item-action list-group-item list-group-item-primary">TAREA X</li>
                    <li class="list-group-item-action list-group-item list-group-item-primary">TAREA Y</li>
                </ul>
            </div>
            <div class="col-6 text-center">
                <h3 style=color:green;>ACTIVIDADES FINALIZADAS</h3>
                <br>
                <ul class="list-group text-left">
                    <li class="list-group-item-action list-group-item list-group-item-success">TAREA 3</li>
                    <li class="list-group-item-action list-group-item list-group-item-success">TAREA 4</li>
                    <li class="list-group-item-action list-group-item list-group-item-success">TAREA A</li>
                    <li class="list-group-item-action list-group-item list-group-item-success">TAREA B</li>
                </ul>
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
                            <div class="form-group">
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="radio" name="exampleRadios" id="rdFinish" value="terminada" checked>
                                    <label class="form-check-label" for="rdFinish">Terminada</label>
                                </div>
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="radio" name="exampleRadios" id="rdPendiente" value="pendiente">
                                    <label class="form-check-label" for="rdPendiente">Pendiente</label>
                                </div>
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

function habilita(){
    document.getElementById("btnEditarAct").disabled = false;
    
}
</script>





<!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    </body>
</html>