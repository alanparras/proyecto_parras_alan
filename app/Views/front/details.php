<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

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
?>

<section class="sectionLogin">
    <div class="divBoxForm">
        <div class="contenedorProducto">
            <div class="divProducto divProducto--img">
                <img class="imgProducto" src="<?= base_url($rutaImg); ?>" alt="">
            </div>
            <div class="divProducto divProducto--datos">
                <h1><?= $producto['nombre']; ?></h1>
                <h2>$ <?= number_format($producto['precio'], 0, ',', '.'); ?></h2>
                <p class="pDescripcion"> <?= $producto['descripcion']; ?></p>

                <div class="contenedorBotones">
                    <a href="<?= base_url('checkout/' . $producto['id_producto']) ?>" class="botonCompra botonCompra-comprar">Comprar Ahora</a>
                    <a href="<?= base_url('add/' . $producto['id_producto']) ?>" class="botonCompra botonCompra-agregar">Agregar al carrito</a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>