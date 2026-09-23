
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="/proyecto_parras_alan"><img src="<?= base_url('') ?>assets/img/logos/logoMarron-sinfondo-sinnombre.png" alt="Logo Marron" class="logoHeader"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    $carrito = \Config\Services::cart();
                    $carrito = $carrito->totalItems();

                    if (session()->get('logged_in')) : ?>

                        <?php if ((session()->get('userProfile') == 1)) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>crudConsultas">CONSULTAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>crudVentas">VENTAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>crudUsers">CRUD DE USUARIOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>crudProductos">CRUD DE PRODUCTOS</a>
                            </li>
                        <?php endif; ?>
                        <?php if ((session()->get('userProfile') == 2)) : ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= base_url('') ?>about_us">QUIENES SOMOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= base_url('') ?>catalogue">PRODUCTOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>commercialization">COMERCIALIZACIÓN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>contact">CONTACTENOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>termsAndUses">TÉRMINOS Y USOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>myPurchases">MIS COMPRAS</a>
                            </li>
                            <a class="nav-link nav-link--carrito" href="<?= base_url('') ?>carrito">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <?php if (empty($carrito)) : ?>
                                <?php else : ?>
                                    <span class="cartItems">
                                        <?= $carrito; ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                        <a class="nav-link nav-link--carrito nav-link--logout" href="<?= base_url('logout'); ?>">
                            <i class="fa-solid fa-right-from-bracket"></i><span class="logout">SALIR</span></i>
                        </a>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('') ?>about_us">QUIENES SOMOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('') ?>catalogue">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('') ?>commercialization">COMERCIALIZACIÓN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('') ?>contact">INFORMACIÓN DE CONTACTO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('') ?>termsAndUses">TÉRMINOS Y USOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('') ?>login">INICIAR SESION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('') ?>register">REGISTRARSE</a>
                        </li>
                        <a class="nav-link nav-link--carrito" href="<?= base_url('') ?>carrito">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <?php if (empty($carrito)) : ?>
                            <?php else : ?>
                                <span class="cartItems">
                                    <?= $carrito; ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>


