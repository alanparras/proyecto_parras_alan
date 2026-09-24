<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');

// <!-- -----CARGAR ESTILOS PROPIOS ----- -->
echo $this->section('estilosIndividuales'); ?>

    <link href="<?= base_url('assets/css/contenido/crud/editUser.css')?>" rel="stylesheet">

<?php echo $this->endSection();

// <!-- ----- CONTENIDO ----- -->
echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <form class="formLogin" action="<?= base_url('editMarca/' . $marca['id_marca']) ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="put">

                <h3>Editar Marca</h3>
                <div class="form_inputs">
                    <div class="input-container">
                        <input class="inputLogin" required type="text" placeholder="Nombre de la marca" id="nombre_marca" name="nombre_marca" maxlength="20" value="<?= set_value('nombre_marca', $marca['nombre_marca']); ?>">
                        <div class="underline"></div>
                    </div>
                </div>
                <div class="input-container input-container--botones">
                    <a href="<?= base_url('crudMarcas') ?>" class="botonLogin botonLogin--volver">Regresar</a>
                    <button type="submit" class="botonLogin">Guardar cambios</button>
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
