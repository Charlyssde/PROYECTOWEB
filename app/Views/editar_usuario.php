<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Editar usuario</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
    <body>
        <div class=row>
            <h3 class="col-10 display-4 text-left">Editar usuario</h3>
            <img class="col text-right" src="./imgs/header.gif" alt="logo" width="100" height="80" >
        </div>
        <br><br><br><br>
        <form class=text-center action="" method="PUT">
				    <div class=row>
                        <div class="col justify-content-center">
                            <div class="form-group">
                                <label for="nombre">Nombre completo:</label>
                                <input type="text" class="mr-sm-2 " placeholder="nombre + apellidos" id="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" class="mr-sm-2 " placeholder="correo electrónico" id="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Nombre de usuario:</label>
                                <input type="text" class="mr-sm-2 " placeholder="nombre de usuario" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="mr-sm-2 " placeholder="contraseña" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="roles" required>Rol:</label>
                                <select name="roles" id="roles">
                                    <option value="integrante">INTEGRANTE</option>
                                    <option value="admin">ADMINISTRADOR</option>
                                </select>
                            </div>
                            <div class="btn-group" role="group">
                                <button style="margin-left:10px; margin-right:15px;" class="btn btn-primary border rounded border-dark" type="submit" id="btnGuardarNuevo">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
</body>
</html>