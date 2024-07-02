<!-- -----CARGAR PLANTILLA ----- -->
<?php 
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets\css\contenido\commercialization.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>

<section class="sectionCommercialization">
    <div class="divBoxContenido">
        <div class="divBoxes">
            <h2 class="tituloBox">Formas de envíos</h2>
            <div class="divContenedor">
                <div class="tiposDeEnvio">
                    <div class="tituloEnvios tituloTop">
                        <h4>Envio Express</h4>
                    </div>
                    <div class="parrafosEnvios">
                        <p>
                            Los envíos se realizan de Lunes a Viernes entre las 9hs y las 21hs.
                        </p>
                        <p>
                            CABA - Primer y segundo cordón de AMBA: Hasta 24hs hábiles comprando antes de las 14hs.
                        </p>
                    </div>    
                </div>
                <div class="tiposDeEnvio">
                    <div class="tituloEnvios">
                        <h4>Envío Same Day</h4>
                    </div>
                    <div class="parrafosEnvios">
                        <p>
                            Los envíos se realizan en el mismo día de Lunes a Viernes entre las 15 y 22 hs.
                        </p>
                        <p>
                            CABA: Aplica para compras realizadas antes de las 11hs.
                        </p>
                    </div>    
                </div>
                <div class="tiposDeEnvio">
                    <div class="tituloEnvios">
                        <h4>Envio Estándar</h4>
                    </div>
                    <div class="parrafosEnvios">
                        <p>
                            Las entregas se realizan de Lunes a Viernes entre las 9hs y las 18hs.
                        </p>
                        <p>
                            GBA: A partir de 3 días hábiles.
                        </p>
                        <p>
                            Centro del País: A partir de 6 días hábiles.
                        </p>
                        <p>
                            Cuyo: A partir de 6 días hábiles.
                        </p>
                        <p>
                            Norte: A partir de 6 días hábiles.
                        </p>
                        <p>
                            Patagonia: A partir de 9 días hábiles.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="divBoxes">
            <h3 class="tituloBox">Metodos de pago</h3>
            <div class="divContenedor">
                <div class="divBoxOpcionDePago divBoxCredito">
                    <div class="tituloTarjetas tituloTop">
                        <h5>Tarjetas de crédito</h5>
                    </div>    
                    <div class="divTiposCredito divTiposCredito--block">
                        <p>Mismo precio en hasta 6 cuotas con estos bancos</p>
                        <div class="divBoxBancos">
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito1.png" alt="">
                                </div>
                                <p>6 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito2.png" alt="">
                                </div>
                                <p>3 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito3.png" alt="">
                                </div>
                                <p>3 Cuotas</p>
                            </div>
                        </div>
                    </div>
                    <div class="divTiposCredito">
                        <p>O hasta 12 cuotas con interés</p>
                        <div class="divBoxBancos divBoxBancos--grid">
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito4.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito5.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito6.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito7.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito8.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito9.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito10.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito11.png" alt="">
                                </div>
                                <p>12 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito12.png" alt="">
                                </div>
                                <p>6 Cuotas</p>
                            </div>
                            <div class="divBoxBancosOpciones">
                                <div class="imgTarjeta">
                                    <img src="assets\img\medios_de_pago\credito\credito13.png" alt="">
                                </div>
                                <p>6 Cuotas</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="divBoxOpcionDePago divBoxDebito">
                    <div class="tituloTarjetas">
                        <h5>Tarjetas de débito</h5>
                    </div>    
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <div class="imgTarjeta imgDebito">
                                <img src="assets\img\medios_de_pago\debito\debito1.png" alt="">
                            </div>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <div class="imgTarjeta imgDebito">
                                <img src="assets\img\medios_de_pago\debito\debito2.png" alt="">
                            </div>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <div class="imgTarjeta imgDebito">
                                <img src="assets\img\medios_de_pago\debito\debito3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divBoxOpcionDePago divBoxMp">
                    <div class="tituloTarjetas">
                        <h5>Mercado Pago</h5>
                    </div>    
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <div class="imgTarjeta">
                                <img src="assets\img\medios_de_pago\mp.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divBoxOpcionDePago divBoxEfectivo">
                    <div class="tituloTarjetas">
                        <h5>Efectivo</h5>
                    </div>    
                    <div class="divBoxBancos">
                        <div class="divBoxBancosOpciones">
                            <div class="imgTarjeta imgEfectivo">
                                <img src="assets\img\medios_de_pago\efectivo\efectivo1.png" alt="">
                                <p>Pago en el local.</p>
                            </div>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <div class="imgTarjeta imgEfectivo">
                                <img src="assets\img\medios_de_pago\efectivo\efectivo2.png" alt="">
                                <p>Acreditación en 1 día hábil.</p>
                            </div>
                        </div>
                        <div class="divBoxBancosOpciones">
                            <div class="imgTarjeta imgEfectivo">
                                <img src="assets\img\medios_de_pago\efectivo\efectivo3.png" alt="">
                                <p>Acreditación instantánea.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>
