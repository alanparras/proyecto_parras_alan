<?php if (empty($productos)) : ?>
    <p class="sinResultados">No se encontraron productos<?= !empty($busqueda) ? ' para "' . esc($busqueda) . '"' : '' ?>.</p>
<?php else : ?>

    <div class="contenedorTarjetas">
        <?php foreach ($productos as $producto) : ?>
            <?php $sinStock = $producto['stock'] <= 0; ?>

            <div class="divTarjeta <?= $sinStock ? 'divTarjeta--sinStock' : '' ?>">
                <a href="<?= base_url('details/' . $producto['id_producto']); ?>" class="linkProducto">
                    <?php
                    $imagen = "assets/img/productos/" . $producto['id_producto'] . "/principal.jpg";
                    if (!file_exists($imagen)) {
                        $imagen = "assets/img/productos/no-photo.jpg";
                    }
                    ?>
                    <div class="divImagenProducto">
                        <img class="imagenProducto" src="<?php echo $imagen; ?>">
                        <?php if ($sinStock) : ?>
                            <span class="badgeSinStock">Sin stock</span>
                        <?php endif; ?>
                    </div>
                    <div class="datosProducto">
                        <div class="detallesProducto">
                            <h5 class="nombreProducto"><?php echo $producto['nombre'] ?></h5>
                            <p class="precio">$ <?php echo number_format($producto['precio'], 0, ',', '.') ?></p>
                        </div>
                        <div class="agregarCarrito">
                            <?php if ($sinStock) : ?>
                                <span class="agregarCarrito--disabled">+</span>
                            <?php else : ?>
                                <a href="<?= base_url('add/' . $producto['id_producto']) ?>" onclick="event.stopPropagation();">+</a>
                            <?php endif; ?>
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