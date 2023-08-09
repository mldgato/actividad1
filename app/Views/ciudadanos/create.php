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
                        <h2 class="text-info">Crear nuevo ciudadano <i class="fa-solid fa-users"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('ciudadanos/index/'); ?>" class="btn btn-warning btn-lg">Regresar <i class="fas fa-backward"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('ciudadanos/store'); ?>" method="post" name="formStore" id="formStore" accept-charset="utf-8" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="nombre_depto">DPI: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="nombre_depto" name="nombre_depto" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="apellido">Apellidos: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombres: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="direccion">Dirección: <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="tel_casa">Tel. residencial: <small class="text-danger">*</small></label>
                                <input type="tel" class="form-control" id="tel_casa" name="tel_casa" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="tel_movil">Tel. movil: <small class="text-danger">*</small></label>
                                <input type="tel" class="form-control" id="tel_movil" name="tel_movil" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="email">Email: <small class="text-danger">*</small></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="fechanac">Fecha de nacimiento: <small class="text-danger">*</small></label>
                                <input type="date" class="form-control" id="fechanac" name="fechanac" required max="<?= date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="cod_nivel_acad">Nivel académico: <small class="text-danger">*</small></label>
                                <select name="cod_nivel_acad" id="cod_nivel_acad" class="form-control" required>
                                    <option value="" selected>- Seleccione -</option>
                                    <?php
                                    foreach ($niveles as $nivel) :
                                    ?>
                                        <option value="<?= $nivel->cod_nivel_acad; ?>"><?= $nivel->nombre; ?></option>
                                    <?php
                                    endforeach
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="cod_muni">Municipio: <small class="text-danger">*</small></label>
                                <select name="cod_muni" id="cod_muni" class="form-control" required>
                                    <option value="" selected>- Seleccione -</option>
                                    <?php
                                    foreach ($municipios as $municipio) :
                                    ?>
                                        <option value="<?= $municipio->cod_muni; ?>"><?= $municipio->nombre_municipio; ?></option>
                                    <?php
                                    endforeach
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="contra">Contraseña: <small class="text-danger">*</small></label>
                                <input type="password" class="form-control" id="contra" name="contra" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="contrar">Repetir contraseña: <small class="text-danger">*</small></label>
                                <input type="password" class="form-control" id="contrar" name="contrar" required>
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