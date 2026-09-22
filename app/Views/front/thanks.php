<!-- -----CARGAR PLANTILLA ----- -->
<?php echo $this->extend('front/plantilla/layout');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="<?= base_url('assets/css/contenido/carrito.css') ?>" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

<section class="sectionLogin">
    <div class="divBoxForm">
        <div class="mensajeCarritoVacio">
            <h2 class="tituloBox">Gracias por su compra!</h2>
            <p class="pCarrito">Explora mas productos y encuentra tus proximas zapatillas favoritas.</p>
            <div>
                <a href="<?= base_url('invoice/' . $idVenta) ?>" class="botonCompra">Ver factura</a>
                <a href="<?= base_url() ?>" class="botonCompra">Volver</a>
            </div>
        </div>
    </div>
</section>


<?php echo $this->endSection(); ?>