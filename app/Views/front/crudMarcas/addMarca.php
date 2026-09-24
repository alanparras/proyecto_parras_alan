<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');

// <!-- -----CARGAR ESTILOS PROPIOS ----- -->
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\crud\addUser.css" rel="stylesheet">

<?php echo $this->endSection();

echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <form class="formLogin" action="<?= base_url('addMarca') ?>" method="post">
                <?= csrf_field(); ?>
                <h3>Agregar Marca</h3>
                <div class="form_inputs">
                    <div class="input-container">
                        <input class="inputLogin" required type="text" placeholder="Nombre de la marca" id="nombre_marca" name="nombre_marca" maxlength="20" value="<?= set_value('nombre_marca'); ?>">
                        <div class="underline"></div>
                    </div>
                </div>
                <div class="input-container input-container--botones">
                    <a href="<?= base_url('crudMarcas') ?>" class="botonLogin botonLogin--volver">Regresar</a>
                    <button type="submit" class="botonLogin">Agregar</button>
                </div>
            </form>

            <?php if (session()->getFlashdata('errors') !== null) : ?>
                <div class="alert alert-danger my-3" role="alert">
                    <?= session()->getFlashdata('errors'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php echo $this->endSection(); ?>