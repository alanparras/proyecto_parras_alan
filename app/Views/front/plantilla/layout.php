<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('') ?>assets/img/logos/icono.png" type="image/png">
    <link href="<?= base_url('assets/css/plantilla/layout.css') ?>" rel="stylesheet">
    <?php echo $this->renderSection("estilosIndividuales"); ?>
    <link href="<?= base_url('') ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2c624d5523.js" crossorigin="anonymous"></script>
    <title><?php echo $titulo ?? ''; ?></title>
</head>

<?php /*echo $this->include('front/plantilla/head'); */?>

<body>

    <?php echo $this->include('front/plantilla/header'); ?>

    <?php echo $this->renderSection("contenido"); ?> <!-- Home -->

    <?php echo $this->include('front/plantilla/footer'); ?>

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