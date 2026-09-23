<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="<?= base_url('assets/css/contenido/details.css') ?>" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

    <?php
    $rutaImg = 'assets/img/productos/' . $producto['id_producto'] . '/principal.jpg';

    if (!file_exists($rutaImg)) {
        $rutaImg = 'assets/img/productos/no-photo.jpg';
    }

    $sinStock = $producto['stock'] <= 0;
    ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <div class="contenedorProducto">
                <div class="divProducto divProducto--img">
                    <img class="imgProducto" src="<?= base_url($rutaImg); ?>" alt="">
                    <?php if ($sinStock) : ?>
                        <span class="badgeSinStock">Sin stock</span>
                    <?php endif; ?>
                </div>
                <div class="divProducto divProducto--datos">
                    <h1><?= $producto['nombre']; ?></h1>
                    <h2>$ <?= number_format($producto['precio'], 0, ',', '.'); ?></h2>
                    <p class="pDescripcion"> <?= $producto['descripcion']; ?></p>

                    <div class="contenedorBotones">
                        <?php if ($sinStock) : ?>
                            <span class="botonCompra botonCompra--disabled">Comprar Ahora</span>
                            <span class="botonCompra botonCompra--disabled">Agregar al carrito</span>
                            <p class="avisoSinStock">Este producto no tiene stock disponible por el momento.</p>
                        <?php else : ?>
                            <a href="<?= base_url('checkout/' . $producto['id_producto']) ?>" class="botonCompra botonCompra-comprar">Comprar Ahora</a>
                            <a href="<?= base_url('add/' . $producto['id_producto']) ?>" class="botonCompra botonCompra-agregar">Agregar al carrito</a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php echo $this->endSection(); ?>