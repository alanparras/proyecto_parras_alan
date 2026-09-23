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
            <?php if (session()->getFlashdata('success')) : ?>
                <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <?= session()->getFlashdata('errors'); ?>
                </div>
            <?php endif; ?>

            <h2 class="tituloBox">Usuarios</h2>

            <a href="<?= base_url('addUser') ?>" class="btn btn-success">Agregar Usuario</a>

            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Actividad de Cuenta</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <?php
                            $perfilUsuario = null;
                            foreach ($perfiles as $perfil) {
                                if ($perfil['id_perfil'] == $usuario['id_perfil']) {
                                    $perfilUsuario = $perfil;
                                }
                            }
                            $esUnoMismo = ($usuario['id_user'] == session()->get('userId'));
                        ?>
                        <tr>
                            <td><?= $usuario['id_user']; ?></td>
                            <td><?= $usuario['nombre']; ?></td>
                            <td><?= $usuario['apellido']; ?></td>
                            <td><?= $usuario['dni']; ?></td>
                            <td><?= $usuario['user']; ?></td>
                            <td><?= $usuario['email']; ?></td>
                            <td><?= $perfilUsuario['descripcion'] ?? '—'; ?></td>
                            <td><?= $usuario['active'] ? 'Activo' : 'Desactivado'; ?></td>
                            <td>
                                <a href="<?= base_url('editUser/' . $usuario['id_user']) ?>" class="btn btn-warning btn-sm me-2">Editar</a>

                                <?php if ($esUnoMismo) : ?>
                                    <!-- <span class="btn btn-secondary btn-sm disabled">No editable</span> -->
                                <?php else : ?>
                                    <a href="<?= $usuario['active'] ? base_url('bajaUsuario/' . $usuario['id_user']) : base_url('altaUsuario/' . $usuario['id_user']) ?>" class="btn <?= $usuario['active'] ? 'btn-danger' : 'btn-success'; ?> btn-sm"><?= $usuario['active'] ? 'Desactivar' : 'Activar'; ?></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

<?php echo $this->endSection(); ?>