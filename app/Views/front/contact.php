<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets\css\contenido\contact.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>

<section class="sectionContact">
    <div class="divBoxContenido">
        <div class="divBoxes">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            <h2 class="tituloBox">¿En que podemos ayudarte?</h2>
            <div class="divBoxContacto">
                <div class="textoContacto">
                    <p>Te podes contactar con nosotros de Lunes a Domingo de 9 a 21 hrs.</p>
                    <p>Titular de la empresa: Parras Alan Emanuel</p>
                    <p>Razon Social: Prime Shoes International S.A. de C.V.</p>
                    <p>Escribinos por Whatsapp al + 54 9 3795 11-2572</p>
                    <p>Estamos ubicados en 9 de julio 1449 - Corrientes Capital - Argentina</p>
                </div>
            </div>
        </div>
        <div class="divBoxes divBoxes--mapaYFormulario">
            <div class="divContenedorMapaLocal">
                <div class="mapa-sombraInterna"></div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0900624775927!2d-58.83478922385525!3d-27.466455376321424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses!2sar!4v1714441935068!5m2!1ses!2sar" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="divContenedorForm">
                <form class="formContacto" method="POST" action="<?= base_url('contact') ?>">
                    <?= csrf_field(); ?>
                    <h3>Formulario de contacto</h3>
                    <?php if (session()->get('logged_in')) : ?>
                        <div class="form_input">
                            <h4 class="saludoUsuario">Hola <?php echo session()->get('userName'); ?>!</h4>
                        </div>
                    <?php else : ?>
                        <div class="form_input">
                            <input class="" required type="text" placeholder="Nombre Completo" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
                        </div>
                        <div class="form_input">
                            <input class="" required type="email" placeholder="Email" id="email" name="email" value="<?= set_value('email') ?>">
                        </div>
                    <?php endif; ?>

                    <div class="form_input">
                        <textarea rows="8" required placeholder="Dejá tu mensaje" id="consulta" name="consulta"><?= set_value('consulta') ?></textarea>
                    </div>
                    <div class="form_input">
                        <button type="submit" class="botonEnviar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- lista de errores del formulario -->
        <?php if (session()->getFlashdata('errors') !== null) : ?>
            <div class="alert alert-danger my-3" role="alert">
                <?= session()->getFlashdata('errors'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php echo $this->endSection(); ?>