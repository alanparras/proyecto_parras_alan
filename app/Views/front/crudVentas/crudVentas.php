<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\crud\crudUsers.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">

            <h2 class="tituloBox">Ventas</h2>

            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Monto total</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta) : ?>
                        <tr>
                            <td><?= $venta['id_venta']; ?></td>
                            <td><?= $venta['nombre'] . ' ' . $venta['apellido'] . ' (' . $venta['user'] . ')'; ?></td>
                            <td>$ <?= number_format($venta['total_venta'], 0, ',', '.'); ?></td>
                            <td><?= $venta['created_at']; ?></td>
                            <td>
                                <a href="<?= base_url('crudVentas/detalle/' . $venta['id_venta']) ?>" class="btn btn-warning btn-sm">Ver detalle</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

<?php echo $this->endSection(); ?>