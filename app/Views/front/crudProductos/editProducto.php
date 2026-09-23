<!-- -----CARGAR PLANTILLA ----- -->
<?php 
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="<?= base_url('assets/css/contenido/crud/editUser.css')?>" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>

    <section class="sectionLogin">
        <div class="divBoxForm">
            <form class="formLogin" action="<?= base_url('editProducto/' . $producto['id_producto']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="put">

                <h3>Editar Producto</h3>
                <div class="form_inputs">
                    <div class="input-container">
                        <input class="inputLogin" required type="text" placeholder="Nombre Producto" id="nombre" name="nombre" value="<?= set_value('nombre', $producto['nombre']); ?>">
                        <div class="underline"></div>
                    </div>
                    <div class="input-container">
                        <select class="inputLogin" required id="marca" name="marca">
                            <option disabled value="">Marca</option>
                            <?php foreach ($marcas as $marca) : ?>
                                <option value="<?= $marca['id_marca']; ?>" <?= set_select('marca', $marca['id_marca'], $marca['id_marca'] == $producto['id_marca']) ?>><?= $marca['nombre_marca']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="underline"></div>
                    </div>
                    <div class="input-container">
                        <input class="inputLogin" required type="text" placeholder="Precio" id="precio" name="precio" value="<?= set_value('precio', $producto['precio']); ?>">
                        <div class="underline"></div>
                    </div>
                    <div class="input-container">
                        <input class="inputLogin" required type="number" min="0" placeholder="Stock" id="stock" name="stock" value="<?= set_value('stock', $producto['stock']); ?>">
                        <div class="underline"></div>
                    </div>
                    <div class="input-container">
                        <label for="fotoProducto">Cambiar foto (opcional)</label>
                        <input class="inputLogin" type="file" accept="image/*" id="fotoProducto" name="fotoProducto">
                        <div class="underline"></div>
                    </div>
                    <div class="input-container input-container--textarea">
                        <textarea class="inputLogin" rows="8" required placeholder="Descripcion del producto..." id="descripcion" name="descripcion"><?= set_value('descripcion', $producto['descripcion']) ?></textarea>
                        <div class="underline underline--textarea"></div>
                    </div>
                </div>
                <div class="input-container input-container--botones">
                    <a href="<?= base_url('crudProductos') ?>" class="botonLogin botonLogin--volver">Regresar</a>
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