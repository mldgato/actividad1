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
                        <h2 class="text-info">Lista de departamentos <i class="fas fa-map"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('departamentos/create/'); ?>" class="btn btn-success btn-lg">Nuevo departamento
                            <i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-hover" id="tableData">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Departamento</th>
                                <th>Región</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($departamentos as $departamento) :
                            ?>
                                <tr>
                                    <td><?= $departamento->cod_depto; ?></td>
                                    <td><?= $departamento->nombre_depto; ?></td>
                                    <td><?= $departamento->nombre_region; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo base_url('departamentos/edit/' . $departamento->cod_depto); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Editar</span>
                                                <i class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmarEliminacion('<?php echo base_url('departamentos/delete/' . $departamento->cod_depto); ?>')"><span class="d-none d-md-inline">Eliminar</span>
                                                <i class="fa-solid fa-trash-can"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endforeach
                            ?>
                        </tbody>
                        <tfoot class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Departamento</th>
                                <th>Región</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function confirmarEliminacion(url) {
        Swal.fire({
            title: '¿Eliminar departamento?',
            text: "¿Está seguro que quiere eliminar el departamento? Ya no podrá usar la información una vez la elimine",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
    $(document).ready(function() {
        $('#tableData').DataTable();
    });
</script>
<?php include(APPPATH . 'Views/templates/foot.php'); ?>