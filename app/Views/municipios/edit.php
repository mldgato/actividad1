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
                        <h2 class="text-info">Editar municipio <i class="fas fa-map"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('municipios/index/'); ?>" class="btn btn-warning btn-lg">Regresar <i class="fas fa-backward"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('municipios/update/'. $municipio->cod_muni); ?>" method="post" name="formStore" id="formStore" accept-charset="utf-8" autocomplete="off">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre_municipio">Nombre del municipio: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="nombre_municipio" name="nombre_municipio" required value="<?= $municipio->nombre_municipio; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="cod_depto">Departamento: <small class="text-danger">*</small></label>
                                <select name="cod_depto" id="cod_depto" class="form-control" required>
                                    <?php
                                    foreach ($departamentos as $departamento) :
                                        if ($municipio->cod_depto == $departamento->cod_depto) {
                                    ?>
                                            <option value="<?= $departamento->cod_depto; ?>" selected><?= $departamento->nombre_depto; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="<?= $departamento->cod_depto; ?>"><?= $departamento->nombre_depto; ?></option>
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