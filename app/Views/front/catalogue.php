<!-- -----CARGAR PLANTILLA ----- -->
<?php
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\catalogue.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

    <?php if (session()->getFlashdata('noStock')) : ?>
        <script>
            alert(<?= session()->getFlashdata('noStock'); ?>);
        </script>
    <?php endif; ?>

    <section class="sectionLogin">
        <div class="divBoxForm">

            <form action="<?= base_url('catalogue') ?>" method="get" class="formBusqueda">
                <input
                    type="text"
                    name="busqueda"
                    class="inputBusqueda"
                    placeholder="Buscar productos..."
                    value="<?= esc($busqueda ?? '') ?>">
                <button type="submit" class="botonBusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <?php if (empty($productos)) : ?>
                <p class="sinResultados">No se encontraron productos<?= !empty($busqueda) ? ' para "' . esc($busqueda) . '"' : '' ?>.</p>
            <?php else : ?>

                <div class="contenedorTarjetas">
                    <?php foreach ($productos as $producto) : ?>
                        <div class="divTarjeta">
                            <a href="<?= base_url('details/' . $producto['id_producto']); ?>" class="linkProducto">
                                <?php
                                $imagen = "assets/img/productos/" . $producto['id_producto'] . "/principal.jpg";
                                if (!file_exists($imagen)) {
                                    $imagen = "assets/img/productos/no-photo.jpg";
                                }
                                ?>
                                <div class="divImagenProducto">
                                    <img class="imagenProducto" src="<?php echo $imagen; ?>">
                                </div>
                                <div class="datosProducto">
                                    <div class="detallesProducto">
                                        <h5 class="nombreProducto"><?php echo $producto['nombre'] ?></h5>
                                        <p class="precio">$ <?php echo number_format($producto['precio'], 0, ',', '.') ?></p>
                                    </div>
                                    <div class="agregarCarrito">
                                        <a href="<?= base_url('add/' . $producto['id_producto']) ?>">+</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="contenedorPaginacion">
                    <?= $pager->links() ?>
                </div>

            <?php endif; ?>

        </div>
    </section>

<?php echo $this->endSection(); ?>