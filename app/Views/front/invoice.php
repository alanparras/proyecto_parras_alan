<!-- -----CARGAR PLANTILLA ----- -->
<?php echo $this->extend('front/plantilla/layout');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="<?= base_url('assets/css/contenido/factura.css') ?>" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <div class="boxFactura">

                <div class="encabezadoFactura">
                    <div>
                        <h2>Prime Shoes</h2>
                        <p>Comprobante de compra</p>
                    </div>
                    <div class="datosFacturaNro">
                        <p>Factura #<?= esc($venta['id_venta']) ?></p>
                        <p><?= esc($venta['created_at']) ?></p>
                    </div>
                </div>

                <div class="datosCliente">
                    <p><strong>Cliente:</strong> <?= esc($venta['nombre'] . ' ' . $venta['apellido']) ?></p>
                    <p><strong>DNI:</strong> <?= esc($venta['dni']) ?></p>
                    <p><strong>Email:</strong> <?= esc($venta['email']) ?></p>
                </div>

                <table class="tablaFactura">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unit.</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($venta['detalle'] as $item) : ?>
                            <tr>
                                <td><?= esc($item['nombre']) ?></td>
                                <td><?= esc($item['qty']) ?></td>
                                <td>$ <?= number_format($item['precio'], 0, ',', '.') ?></td>
                                <td>$ <?= number_format($item['precio'] * $item['qty'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="totalFactura">
                    <span>Total:</span>
                    <span>$ <?= number_format($venta['total_venta'], 0, ',', '.') ?></span>
                </div>

                <div class="accionesFactura">
                    <a href="<?= base_url('invoice/' . $venta['id_venta'] . '/download') ?>" class="botonCompra">Descargar PDF</a> |
                    <a href="<?= base_url('myPurchases') ?>" class="botonCompra botonCompra--secundario">Volver a mis compras</a>
                </div>

                <p class="avisoFactura">* Comprobante no válido como factura fiscal.</p>

            </div>
        </div>
    </section>

<?php echo $this->endSection(); ?>