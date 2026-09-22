<!-- -----CARGAR PLANTILLA ----- -->
<?php echo $this->extend('front/plantilla/layout');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\carrito.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

<section class="sectionLogin">
    <div class="divBoxForm">
        <?php if (empty($carrito->contents())) : ?>
            <div class="mensajeCarritoVacio">
                <h2 class="tituloBox">El carrito está vacío</h2>
                <p class="pCarrito">
                    <?= session()->getFlashdata('carritoVacio') ?? 'Explora nuestro catálogo y encuentra tus proximas zapatillas favoritas.' ?>
                </p>
                <a href="<?= base_url('catalogue') ?>" class="botonCompra">Ver catálogo</a>
            </div>
        <?php else : ?>
            <div class="boxContenidoCarrito">
                <div class="divBoxProductos">
                <a href="<?= base_url('destroy') ?>" class="botonCompra botonCompra-vaciar">Vaciar carrito</a>
                    <?php foreach ($carrito->contents() as $productoCarrito) :

                        $imagen = "assets/img/productos/" . $productoCarrito['id'] . "/principal.jpg";

                        if (!file_exists($imagen)) {
                            $imagen = "assets/img/productos/no-photo.jpg";
                        }

                    ?>
                        <div class="divProducto">
                            <div class="divImgProducto">
                                <img class="imgProducto" src="<?php echo $imagen; ?>">
                            </div>
                            <div class="divDetalleProducto">
                                <div class="contenedorDetalle">
                                    <div class="boxTituloProducto">
                                        <h4><?= $productoCarrito['name']; ?></h4>
                                    </div>
                                    <div class="precioProducto">
                                        <div class="qtyBox">
                                            <span>Cantidad</span>
                                            <select name="qty" class="qtySelector" data-rowid="<?= $productoCarrito['rowid'];?>">
                                                <?php
                                                $producto = $productos->find($productoCarrito['id']);

                                                for ($i = 1; $i <= $producto['stock']; $i++) :
                                                    if ($productoCarrito['qty'] == $i) : ?>
                                                        <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <span class="precioProducto">$ <?= number_format($productoCarrito['subtotal'], 0, ',', '.'); ?></span>
                                    </div>

                                </div>
                                <div class="contenedorRemove">
                                    <a class="linkRemove" href="<?= base_url('remove/' . $productoCarrito['rowid']) ?>" class=""><i class="fa-solid fa-xmark"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="totalCompra">
                    <div class="precioTotal">
                        <div class="subtotal">
                            <span><?= $carrito->totalItems(); ?> productos</span>
                            <span>$ <?= number_format($carrito->total(), 0, ',', '.'); ?></span>
                        </div>
                        <div class="subtotal">
                            <span>Envio</span>
                            <span>-</span>
                        </div>
                    </div>
                    <div class="precioTotal precioTotal-totalCompra">
                        <span>Total</span>
                        <span>$ <?= number_format($carrito->total(), 0, ',', '.'); ?></span>
                    </div>
                    <a href="<?= base_url('buy') ?>" class="botonCompra botonCompra-comprar">Comprar Ahora</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php echo $this->endSection(); ?>