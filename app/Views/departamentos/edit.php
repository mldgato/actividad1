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
                        <h2 class="text-info">Editar departamento <i class="fas fa-map"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('departamentos/index/'); ?>" class="btn btn-warning btn-lg">Regresar <i class="fas fa-backward"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('departamentos/update/'. $departamento->cod_depto); ?>" method="post" name="formStore" id="formStore" accept-charset="utf-8" autocomplete="off">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre_depto">Nombre del departamento: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="nombre_depto" name="nombre_depto" required value="<?= $departamento->nombre_depto; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Región: <small class="text-danger">*</small></label>
                                <select name="cod_region" id="cod_region" class="form-control" required>
                                    <?php
                                    foreach ($regiones as $region) :
                                        if ($region->cod_region == $departamento->cod_region) {
                                    ?>
                                            <option value="<?= $region->cod_region; ?>" selected><?= $region->nombre; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="<?= $region->cod_region; ?>"><?= $region->nombre; ?></option>
                                    <?php
                                        }
                                    endforeach
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=" row">
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