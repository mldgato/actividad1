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
                        <h2 class="text-info">Editar ciudadano <i class="fa-solid fa-users"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('ciudadanos/index/'); ?>" class="btn btn-warning btn-lg">Regresar <i class="fas fa-backward"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form action="<?php echo base_url('ciudadanos/update/' . $ciudadano->dpi); ?>" method="post" name="formStore" id="formStore" accept-charset="utf-8" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="dpi">DPI: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="dpi" value="<?= $ciudadano->dpi ?>" readonly>
                                <?php if (session('errors.dpi')) : ?>
                                    <div class="text-danger"><?= session('errors.dpi') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="apellido">Apellidos: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $ciudadano->apellido ?>">
                                <?php if (session('errors.apellido')) : ?>
                                    <div class="text-danger"><?= session('errors.apellido') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombres: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $ciudadano->nombre ?>">
                                <?php if (session('errors.nombre')) : ?>
                                    <div class="text-danger"><?= session('errors.nombre') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="direccion">Dirección: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $ciudadano->direccion ?>">
                                <?php if (session('errors.direccion')) : ?>
                                    <div class="text-danger"><?= session('errors.direccion') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="tel_casa">Tel. residencial: <small class="text-danger">*</small></label>
                                <input type="tel" class="form-control" id="tel_casa" name="tel_casa" value="<?= $ciudadano->tel_casa ?>">
                                <?php if (session('errors.tel_casa')) : ?>
                                    <div class="text-danger"><?= session('errors.tel_casa') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="tel_movil">Tel. movil: <small class="text-danger">*</small></label>
                                <input type="tel" class="form-control" id="tel_movil" name="tel_movil" value="<?= $ciudadano->tel_movil ?>">
                                <?php if (session('errors.tel_movil')) : ?>
                                    <div class="text-danger"><?= session('errors.tel_movil') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="email">Email: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $ciudadano->email ?>">
                                <?php if (session('errors.email')) : ?>
                                    <div class="text-danger"><?= session('errors.email') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="fechanac">Fecha de nacimiento: <small class="text-danger">*</small></label>
                                <input type="date" class="form-control" id="fechanac" name="fechanac" max="<?= date("Y-m-d"); ?>" value="<?= $ciudadano->fechanac ?>">
                                <?php if (session('errors.fechanac')) : ?>
                                    <div class="text-danger"><?= session('errors.fechanac') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="cod_nivel_acad">Nivel académico: <small class="text-danger">*</small></label>
                                <select name="cod_nivel_acad" id="cod_nivel_acad" class="form-control">
                                    <?php
                                    foreach ($niveles as $nivel) :
                                        if ($ciudadano->cod_nivel_acad == $nivel->cod_nivel_acad) {
                                    ?>
                                            <option value="<?= $nivel->cod_nivel_acad; ?>" selected><?= $nivel->nombre; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $nivel->cod_nivel_acad; ?>"><?= $nivel->nombre; ?></option>
                                    <?php
                                        }
                                    endforeach
                                    ?>
                                </select>
                                <?php if (session('errors.cod_nivel_acad')) : ?>
                                    <div class="text-danger"><?= session('errors.cod_nivel_acad') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="cod_muni">Municipio: <small class="text-danger">*</small></label>
                                <select name="cod_muni" id="cod_muni" class="form-control">
                                    <option value="" selected>- Seleccione -</option>
                                    <?php
                                    foreach ($municipios as $municipio) :
                                        if ($ciudadano->cod_muni == $municipio->cod_muni) {
                                    ?>
                                            <option value="<?= $municipio->cod_muni; ?>" selected><?= $municipio->nombre_municipio; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $municipio->cod_muni; ?>"><?= $municipio->nombre_municipio; ?></option>
                                    <?php
                                        }
                                    endforeach
                                    ?>
                                </select>
                                <?php if (session('errors.cod_muni')) : ?>
                                    <div class="text-danger"><?= session('errors.cod_muni') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#cod_muni').select2();
    });
</script>
<?php include(APPPATH . 'Views/templates/foot.php'); ?>