
<div class="col-12 text-center">
    <br><br><br>
    <h2 style=text-decoration:underline;>Inicio de sesión</h2>
    <br>
</div>
<div class="d-flex justify-content-center">
    <form class="" action="/" method="post">
        <div class="form-group">
            <label for="nombreUsuario">Nombre de usuario:</label>
            <input type="text" class="mr-sm-2 " placeholder="Nombre de usuario" id="nombreUsuario" name="nombreUsuario" value="<?= set_value('nombreUsuario') ?>">
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="mr-sm-2" placeholder="Contraseña" id="password" name="password" value="<?= set_value('password') ?>">
        </div>
        <?php if (isset($validation)): ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="btn-group float-right">
            <button class="btn btn-primary" type="submit" name="submit">Ingresar</button>
        </div>
    </form>
</div>


