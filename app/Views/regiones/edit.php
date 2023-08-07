<?php include(APPPATH . 'Views/templates/head.php'); ?>

<?php
if (isset($_SESSION['message'])) {
?>
    <div class="row mt-3">
        <div class="col">
            <div class="alert <?php echo $_SESSION['alert-class']; ?> alert-dismissible fade show" role="alert">
                <strong>Información:</strong> <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php
}
?>
<div class="row">
    <div class="col">
        <div class="card border-info mt-3">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="text-info">Editar región <i class="fas fa-map-marker-alt"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('regiones/index/'); ?>" class="btn btn-warning btn-lg">Regresar <i class="fas fa-backward"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('regiones/update/' . $region->cod_region); ?>" method="post" name="formStore" id="formStore" accept-charset="utf-8" autocomplete="off">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $region->nombre; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Descripción: <small class="text-danger">*</small></label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $region->descripcion; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit">Guardar <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include(APPPATH . 'Views/templates/foot.php'); ?>