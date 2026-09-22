<<<<<<< HEAD
=======
<!-- -----CARGAR PLANTILLA ----- -->
<?php echo $this->extend('front/plantilla/layout');

// ----- CONTENIDO -----

echo $this->section('head'); ?>
>>>>>>> origin/main

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no"> 
    <link rel="icon" href="assets\img\logos\icono.png" type="image/png">
    <link href="assets\css\plantilla\layout.css" rel="stylesheet">
    <?php echo $this->renderSection("estilosIndividuales"); ?>
    <link href="assets\css\bootstrap\bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2c624d5523.js" crossorigin="anonymous"></script>
<<<<<<< HEAD
    <title><?php echo $titulo ?? ''; ?></title>
</head>
=======
    <title><?php echo $titulo; ?></title>
</head>


<?php echo $this->endSection(); ?>
>>>>>>> origin/main
