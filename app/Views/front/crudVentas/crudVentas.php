<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

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
                    <th scope="col">USUARIO</th>
                    <th scope="col">MONTO TOTAL</th>
                    <th scope="col">FECHA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta) : ?>
                    <tr>
                        <td><?= $venta['id_venta']; ?></td>
                        <td><?php
                            foreach ($usuarios as $usuario) {
                                if ($usuario['id_user'] == $venta['id_user']) {
                                    $usuarioVenta = $usuario;
                                }
                            }
                            echo $usuarioVenta['id_user'] . '- ' . $usuarioVenta['user'];
                            ?>
                        </td>
                        <td>$ <?= number_format($venta['total_venta'], 0, ',', '.'); ?></td>
                        <td><?= $venta['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3 class="tituloBox">Detalle de las Ventas</h3>

        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID VENTA</th>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">PRECIO PRODUCTO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventaDetalles as $ventaDetalle) : ?>
                    <tr>
                        <td><?= $ventaDetalle['id_detalle']; ?></td>
                        <td><?= $ventaDetalle['id_venta']; ?></td>
                        <td><?php
                            foreach ($productos as $producto) {
                                if ($producto['id_producto'] == $ventaDetalle['id_producto']) {
                                    $productoVentaDetalle = $producto;
                                }
                            }
                            echo $productoVentaDetalle['id_producto'] . '- ' . $productoVentaDetalle['nombre'];
                            ?>
                        </td>
                        <td><?= $ventaDetalle['qty']; ?></td>
                        <td>$ <?= number_format($ventaDetalle['precio'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php echo $this->endSection(); ?>