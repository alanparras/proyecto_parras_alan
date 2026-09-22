<!-- -----CARGAR PLANTILLA ----- -->
<?php 
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets/css/contenido/crud/addUser.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>


<section class="sectionLogin">
    <div class="divBoxForm">
        <form class="formLogin" action="<?= base_url('addUser')?>" method="post">
            <?= csrf_field(); ?> <!-- TOKEN DE SEGURIDAD   -->
            <h3>Agregar Usuario</h3> 
            <div class="form_inputs">
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Nombre" id="nombre" name="nombre" value="<?= set_value('nombre');?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Apellido" id="apellido" name="apellido" value="<?= set_value('apellido');?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="DNI" id="dni" name="dni" value="<?= set_value('dni');?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Usuario" id="user" name="user" value="<?= set_value('user');?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="email" placeholder="Email" id="email" name="email" value="<?= set_value('email');?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <select class="inputLogin" required id="perfil" name="perfil">
                        <option selected disabled value="">Perfil</option>
                        <?php foreach($perfiles as $perfil):?>
                            <option value="<?= $perfil['id_perfil'];?>"><?= $perfil['descripcion'];?></option>
                        <?php endforeach;?>
                    </select>
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
            <div class="input-container input-container--botones">
                <a href="crudUsers.php" class="botonLogin botonLogin--volver">Regresar</a>
                <button type="submit" class="botonLogin">Agregar</button>
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