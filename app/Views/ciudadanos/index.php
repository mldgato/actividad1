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
                        <h2 class="text-info">Lista de ciudadanos <i class="fa-solid fa-users"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('ciudadanos/create/'); ?>" class="btn btn-success btn-lg">Nuevo ciudadano
                            <i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-hover" id="tableData">
                        <thead class="table-dark">
                            <tr>
                                <th>DPI</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Movil</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ciudadanos as $ciudadano) :
                            ?>
                                <tr>
                                    <td><?= $ciudadano->dpi; ?></td>
                                    <td><?= $ciudadano->dpi; ?></td>
                                    <td><?= $ciudadano->nombre; ?></td>
                                    <td><?= $ciudadano->tel_movil; ?></td>
                                    <td><?= $ciudadano->email; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo base_url('ciudadanos/edit/' . $ciudadano->dpi); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Editar</span>
                                                <i class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmarEliminacion('<?php echo base_url('ciudadanos/delete/' . $ciudadano->dpi); ?>')"><span class="d-none d-md-inline">Eliminar</span>
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
                                <th>DPI</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Movil</th>
                                <th>Email</th>
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
            title: '¿Eliminar al ciudadano?',
            text: "¿Está seguro que quiere eliminar al ciudadano? Ya no podrá usar la información una vez la elimine",
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