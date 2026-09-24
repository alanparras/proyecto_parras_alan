<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');

// <!-- -----CARGAR ESTILOS PROPIOS ----- -->
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\crud\crudUsers.css" rel="stylesheet">

<?php echo $this->endSection();

// <!-- ----- CONTENIDO ----- -->
echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <h2 class="tituloBox">Marcas</h2>

            <a href="<?= base_url('addMarca') ?>" class="btn btn-success">Agregar Marca</a>

            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marcas as $marca) : ?>
                        <tr>
                            <td><?= $marca['id_marca']; ?></td>
                            <td><?= $marca['nombre_marca']; ?></td>
                            <td><?= $marca['activo'] ? 'Activo' : 'Desactivado'; ?></td>
                            <td>
                                <a href="<?= base_url('editMarca/' . $marca['id_marca']) ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                                <a href="<?= $marca['activo'] ? base_url('bajaMarca/' . $marca['id_marca']) : base_url('altaMarca/' . $marca['id_marca']) ?>" class="btn <?= $marca['activo'] ? 'btn-danger' : 'btn-success'; ?> btn-sm"><?= $marca['activo'] ? 'Desactivar' : 'Activar'; ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

<?php echo $this->endSection(); ?>