<!DOCTYPE html>
<html lang="en">

<<<<<<< HEAD
=======
<?php echo $this->renderSection("head"); ?>
>>>>>>> origin/main

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('') ?>assets/img/logos/icono.png" type="image/png">
    <link href="<?= base_url('assets/css/plantilla/layout.css') ?>" rel="stylesheet">
    <?php echo $this->renderSection("estilosIndividuales"); ?>
    <link href="<?= base_url('') ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2c624d5523.js" crossorigin="anonymous"></script>
<<<<<<< HEAD
    <title><?php echo $titulo ?? ''; ?></title>
</head>

<?php /*echo $this->include('front/plantilla/head'); */?>

<body>

    <?php echo $this->include('front/plantilla/header'); ?>

    <?php echo $this->renderSection("contenido"); ?> <!-- Home -->

    <?php echo $this->include('front/plantilla/footer'); ?>

=======
    <title><?php echo $titulo; ?></title>
</head>

<body>
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
                                    <a class="nav-link" href="<?= base_url('') ?>crudUsers">USUARIOS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>crudConsultas">CONSULTAS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>crudVentas">VENTAS</a>
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

    <?php echo $this->renderSection("contenido"); ?>

    <footer>
        <div class="footerBox">
            <div class="divBoxFooter">
                <img class="imgFooter" src="<?= base_url('') ?>assets/img/logos/logoMarron-footer.png" alt="Logo Footer">
            </div>
            <div class="divBoxFooter">
                <ul class="listaFooter listaFooter--column">
                    <li><i class="footerIconos fa-brands fa-whatsapp"></i>+ 54 9 3795 11-2572</li>
                    <li><i class="footerIconos fa-solid fa-envelope"></i>Parrasalan@gmail.com</li>
                    <li><i class="footerIconos fa-solid fa-location-dot"></i>9 de julio 1449 - Corrientes Capital - Argentina</li>
                </ul>
            </div>
            <div class="divBoxFooter divBoxFooter--SocialMedia">
                <ul class="listaFooter listaFooter--row">
                    <li class="itemListSocialMedia">
                        <a href="https://www.instagram.com/facenaunne/" class="footerSocialMedia" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li class="itemListSocialMedia">
                        <a href="https://web.facebook.com/facenaunneargentina" class="footerSocialMedia" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li class="itemListSocialMedia">
                        <a href="https://twitter.com/facenaunne" class="footerSocialMedia" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="divBoxCopy">
            <p>© Todos los derechos reservados - 2024</p>
        </div>
    </footer>
>>>>>>> origin/main
    <script src="<?= base_url('') ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.qtySelector').on('change', function() {
                var id = $(this).data('rowid');
                var qty = $(this).val();

                $.ajax({
                    'url': '<?= base_url('update') ?>',
                    'type': 'POST',
                    'data': {
                        'id': id,
                        'qty': qty
                    },

                    success: function(result) {
                        window.location.href = '';
                        // console.log(result);
                    }
                });
            });
        });
    </script>
</body>

</html>