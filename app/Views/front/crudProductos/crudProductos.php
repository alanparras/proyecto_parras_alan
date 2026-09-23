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

        <h2 class="tituloBox">Productos</h2>

        <a href="<?= base_url('addProducto') ?>" class="btn btn-success">Agregar Producto</a>

        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Actividad del producto</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= $producto['id_producto']; ?></td>
                        <td><?= $producto['nombre']; ?></td>
                        <td>$ <?= number_format($producto['precio'], 0, ',', '.'); ?></td>
                        <td><?= $producto['stock']; ?></td>
                        <td>
                            <?php
                            foreach ($marcas as $marca) {
                                if ($marca['id_marca'] == $producto['id_marca']) {
                                    $marcaProducto = $marca;
                                }
                            }; 
                            
                            echo $marcaProducto['nombre_marca'];
                            ?>
                        </td>
                        <td><?= $producto['activo'] ? 'Activo' : 'Desactivado'; ?></td>
                        <td>
                            <!-- <form class="" action="<?= base_url('bajaProducto/' . $producto['id_producto']) ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="user_id" value="<?= $producto['id_producto']; ?>">
                            </form> -->
                            <a href="<?= base_url('editProducto/' . $producto['id_producto']) ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                            <a href="<?= $producto['activo'] ? base_url('bajaProducto/' . $producto['id_producto']) : base_url('altaProducto/' . $producto['id_producto']) ?>" class="btn <?= $producto['activo'] ? 'btn-danger' : 'btn-success'; ?> btn-sm"><?= $producto['activo'] ? 'Desactivar' : 'Activar'; ?></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>

<?php echo $this->endSection(); ?>