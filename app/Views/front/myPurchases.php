<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\misCompras.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <div class="boxMisCompras">

                <?php if (empty($ventas)) : ?>

                    <div class="mensajeSinCompras">
                        <p>Todavía no realizaste ninguna compra.</p>
                        <a href="<?= base_url('catalogue') ?>" class="botonCompra">IR AL CATÁLOGO</a>
                    </div>

                <?php else : ?>

                    <?php foreach ($ventas as $venta) : ?>
                        <div class="tarjetaCompra">

                            <div class="encabezadoCompra">
                                <div>
                                    <p class="idCompra">Compra #<?= esc($venta['id_venta']) ?></p>
                                    <p class="fechaCompra"><?= esc($venta['created_at']) ?></p>
                                </div>
                                <!-- <span class="estadoCompra">Entregado</span> -->
                            </div>

                            <div class="cuerpoCompra">
                                <?php foreach ($venta['detalle'] as $item) : ?>
                                    <?php
                                        $imagen = "assets/img/productos/" . $item['id_producto'] . "/principal.jpg";
                                        if (!file_exists($imagen)) {
                                            $imagen = "assets/img/productos/no-photo.jpg";
                                        }
                                    ?>
                                    <div class="itemCompra">
                                        <div class="divImgItemCompra">
                                            <img class="imgItemCompra" src="<?= base_url($imagen) ?>">
                                        </div>
                                        <div class="detalleItemCompra">
                                            <div>
                                                <p class="nombreItemCompra"><?= esc($item['nombre']) ?></p>
                                                <p class="cantidadItemCompra">Cantidad: <?= esc($item['qty']) ?></p>
                                            </div>
                                            <p class="precioItemCompra">$ <?= number_format($item['precio'], 0, ',', '.') ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="pieCompra">
                                <span class="totalCompraLabel">Total:</span>
                                <span class="totalCompraMonto">$ <?= number_format($venta['total_venta'], 0, ',', '.') ?></span>
                            </div>

                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
        </div>
    </section>

<?php echo $this->endSection(); ?>