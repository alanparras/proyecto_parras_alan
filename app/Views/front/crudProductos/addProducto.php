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
        <form class="formLogin" action="<?= base_url('addProducto') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?> <!-- TOKEN DE SEGURIDAD   -->
            <h3>Agregar Producto</h3>
            <div class="form_inputs">
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Nombre Producto" id="nombre" name="nombre" value="<?= set_value('nombre'); ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <select class="inputLogin" required id="marca" name="marca">
                        <option selected disabled value="">Marca</option>
                        <?php foreach ($marcas as $marca) : ?>
                            <option value="<?= $marca['id_marca']; ?>"><?= $marca['nombre_marca']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="text" placeholder="Precio" id="precio" name="precio" value="<?= set_value('precio'); ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="number" placeholder="Stock" id="stock" name="stock" value="<?= set_value('stock'); ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container">
                    <input class="inputLogin" required type="file" accept="image/*" placeholder="FotoProducto" id="fotoProducto" name="fotoProducto" value="<?= set_value('fotoProducto'); ?>">
                    <div class="underline"></div>
                </div>
                <div class="input-container input-container--textarea">
                    <textarea class="inputLogin" rows="8" required placeholder="Descripcion del producto..." id="descripcion" name="descripcion"><?= set_value('descripcion') ?></textarea>
                    <div class="underline underline--textarea"></div> 
                </div>
            </div>
            <div class="input-container input-container--botones">
                <a href="crudProductos" class="botonLogin botonLogin--volver">Regresar</a>
                <button type="submit" class="botonLogin">Agregar</button>
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