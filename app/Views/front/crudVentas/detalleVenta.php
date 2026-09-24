<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="<?= base_url('assets/css/contenido/crud/crudUsers.css')?>" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <div class="div-detalleVenta">
                <h2 class="tituloBox">Venta #<?= $venta['id_venta']; ?></h2>
    
                <p><strong>Usuario:</strong> <?= $venta['nombre'] . ' ' . $venta['apellido'] . ' (' . $venta['user'] . ')'; ?></p>
                <p><strong>Email:</strong> <?= $venta['email']; ?></p>
                <p><strong>Fecha:</strong> <?= $venta['created_at']; ?></p>
                <p><strong>Total:</strong> $ <?= number_format($venta['total_venta'], 0, ',', '.'); ?></p>
    
                <a href="<?= base_url('invoice/' . $venta['id_venta']) ?>" class="btn btn-secondary mb-3">Ver factura</a>
            </div>

            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio unit.</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalle as $item) : ?>
                        <tr>
                            <td><?= $item['nombre']; ?></td>
                            <td><?= $item['qty']; ?></td>
                            <td>$ <?= number_format($item['precio'], 0, ',', '.'); ?></td>
                            <td>$ <?= number_format($item['precio'] * $item['qty'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= base_url('crudVentas') ?>" class="btn btn-warning">Volver al listado</a>
        </div>
    </section>

<?php echo $this->endSection(); ?>