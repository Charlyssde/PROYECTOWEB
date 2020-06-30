<div class=row>
    <h3 class="col-10 display-4 text-left">Administración de usuarios</h3>
</div>
<br><br><br><br>

<?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>
        
<button class="btn btn-success" onclick="location.href='<?php echo base_url();?>/register'">Agregar usuario</button>
<br><br><br>

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
        <?php ?>

        <?php ?>
    </tbody>
</table>
<div>
    <button class="btn btn-light text-white bg-dark border-dark" type="button" id="btnReporte">Generar reporte</button>
</div>
<form action="/" method="get">
    <button class="btn btn-secondary" type=submit>Salir</button>    
</form> 