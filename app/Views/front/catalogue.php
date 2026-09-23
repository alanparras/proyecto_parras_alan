<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\catalogue.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

    <?php if (session()->getFlashdata('noStock')) : ?>
        <script>
            alert(<?= session()->getFlashdata('noStock'); ?>);
        </script>
    <?php endif; ?>

    <section class="sectionLogin">
        <div class="divBoxForm">

            <form action="<?= base_url('catalogue') ?>" method="get" class="formBusqueda">
                <input
                    type="text"
                    name="busqueda"
                    class="inputBusqueda"
                    placeholder="Buscar productos..."
                    value="<?= esc($busqueda ?? '') ?>">
                <button type="submit" class="botonBusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <?= $this->include('front/partials/catalogue_grid') ?>

        </div>
    </section>

<?php echo $this->endSection(); ?>