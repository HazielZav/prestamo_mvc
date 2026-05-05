<?php require_once RUTA_APP . '/views/inc/header.php'; ?>

<a href="<?php echo RUTA_URL; ?>/equipos" class="btn btn-light"><i class="fa fa-backward"></i> Volver</a>

<div class="card card-body bg-light mt-5">
    <h2>Eliminar Equipo</h2>
    <p class="lead">¿Estás seguro que deseas eliminar este equipo?</p>
    <form action="<?php echo RUTA_URL; ?>/equipos/eliminar/<?php echo $datos['id_equipo']; ?>" method="POST">
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" class="form-control form-control-lg" value="<?php echo $datos['marca']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" class="form-control form-control-lg" value="<?php echo $datos['modelo']; ?>" disabled>
        </div>
        <input type="submit" class="btn btn-danger mt-3" value="Eliminar">
    </form>
</div>

<?php require_once RUTA_APP . '/views/inc/footer.php'; ?>
