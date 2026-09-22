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

        <h2 class="tituloBox">Consultas</h2>

        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CONSULTA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta) : ?>
                    <tr>
                        <td><?= $consulta['id_consulta']; ?></td>
                        <td><?= $consulta['nombre']; ?></td>
                        <td><?= $consulta['email']; ?></td>
                        <td><?= $consulta['consulta']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php echo $this->endSection(); ?>