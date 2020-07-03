<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br><br><br><br>
<div class="d-flex justify-content-center">
    <form class="" action="/register" method="post">
        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" class="mr-sm-2 " placeholder="nombre completo" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
        </div>
        <div class="form-group">
            <label for="nombreUsuario">Nombre de usuario:</label>
            <input type="text" class="mr-sm-2 " placeholder="nombre de usuario" id="nombreUsuario" name="nombreUsuario" value="<?= set_value('nombreUsuario')?>">
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="mr-sm-2 " placeholder="correo electrónico" id="correo" name="correo" value="<?= set_value('correo') ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="mr-sm-2 " placeholder="contraseña" id="pwd" name="pwd" value="<?= set_value('pwd') ?>">
        </div>
        <div class="form-group">
            <label for="roles" required>Rol:</label>
            <select name="roles" id="roles">
                <option value="integrante">INTEGRANTE</option>
                <option value="admin">ADMINISTRADOR</option>
            </select>
        </div>
        <div class="btn-group float-right">
            <button class="btn btn-primary" type="button" id="btnRegistrar">Registrar</button>
        </div>

    </form>
</div>
</body>


</html>