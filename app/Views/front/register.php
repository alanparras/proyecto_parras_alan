<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets\css\contenido\register.css" rel="stylesheet">

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
        <form class="formLogin" method="POST" action="<?= base_url('register') ?>">
            <?= csrf_field(); ?> <!-- TOKEN DE SEGURIDAD   -->
            <h3>Registrarse</h3>
            <div class="form_inputs">
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Nombre" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Apellido" id="apellido" name="apellido" value="<?= set_value('apellido') ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="DNI" id="dni" name="dni" value="<?= set_value('dni') ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Usuario" id="user" name="user" value="<?= set_value('user') ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container input-container--email">
                    <input class="inputLogin" required type="email" placeholder="Email" id="email" name="email" value="<?= set_value('email') ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="password" placeholder="Contraseña" id="pass" name="pass"></input>
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="password" placeholder="Confirmar Contraseña" id="repass" name="repass"></input>
                    <div class="underline"></div>
                </div>
            </div>
            <div class="input-container">
                <button type="submit" class="botonLogin">Registrarse</button>
            </div>
        </form>

        <!-- lista de errores del formulario -->
        <?php if (session()->getFlashdata('errors') !== null) : ?>
            <div class="alert alert-danger my-3" role="alert">
                <?= session()->getFlashdata('errors'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php echo $this->endSection(); ?>