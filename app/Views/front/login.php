<!-- -----CARGAR PLANTILLA ----- -->
<?php 
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets\css\contenido\login.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>

<section class="sectionLogin">
    <div class="divBoxForm">

        
        <form class="formLogin" method="POST" action="<?= base_url('auth')?>">
            <?= csrf_field(); ?> <!-- TOKEN DE SEGURIDAD   -->
            <h3>Iniciar Sesión</h3>
            <!-- <?php if(session()->getFlashdata('success')):?>
                <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif;?> -->
            <div class="form_inputs">
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Usuario" id="user" name="user">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="password" placeholder="Contraseña" id="pass" name="pass"></input>
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <button type="submit" class="botonLogin">Ingresar</button>
                </div>
            </div>
        </form>

        <!-- lista de errores del formulario -->
        <?php if (session()->getFlashdata('errors') !== null):?>
            <div class="alert alert-danger my-3" role="alert"> 
                <?= session()->getFlashdata('errors'); ?>
            </div>
        <?php endif;?>
    </div>
</section>

<?php echo $this->endSection(); ?>