<!-- -----CARGAR PLANTILLA ----- -->
<?php echo $this->extend('front/plantilla/layout');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets\css\contenido\commercialization.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>

<section>
    <div class="divBoxContenido">
        <div class="divBoxes">
            <h1 class="tituloBox">Tipos de entrega</h1>
            <div class="divBoxTipoEntrega">

            </div>
        </div>
        <div class="divBoxes">
            <h2 class="tituloBox">Formas de envíos</h2>
            <div class="divBoxEnvios">

            </div>
        </div>
        <div class="divBoxes">
            <h3 class="tituloBox">Metodos de pago</h3>
            <div class="divBoxMetodos">
                <div class="divBoxOpcionDePago divBoxCredito">
                    <h5>Tarjetas de crédito</h5>
                    <p>Mismo precio en hasta 6 cuotas con estos bancos</p>
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <img src="assets\img\medios de pago\credito\credito1.png" alt="credito1">
                            <p>6 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>3 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>3 Cuotas</p>
                        </div>
                    </div>
                    <p>O hasta 12 cuotas con interés</p>
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>12 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>6 Cuotas</p>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                            <p>6 Cuotas</p>
                        </div>
                    </div>
                </div>
                <div class="divBoxOpcionDePago divBoxDebito">
                    <h5>Tarjetas de débito</h5>
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="divBoxOpcionDePago divBoxMp">
                    <h5>Mercado Pago</h5>
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="divBoxOpcionDePago divBoxEfectivo">
                <h5>Efectivo</h5>
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                        </div>
                        <div class="divBoxBancosOpciones">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>
