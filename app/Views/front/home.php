<?php 
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

    <link href="assets\css\contenido\home.css" rel="stylesheet">

<?php echo $this->endSection(); 

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>
        
    <section class="sectionCarousel"> 
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets\img\adidas_Campus_badbunny.jpg" class="d-block imgCarousel" alt="Adidas Campus 00s Verde Oscuro">
                </div>
                <div class="carousel-item">
                    <img src="assets\img\vans_KnuSkool.jpg" class="d-block imgCarousel" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets\img\nike_promo2.jpg" class="d-block imgCarousel" alt="...">
                </div>
                <div class="divLogoCarousel">
                    <div class="divLogoTexto">
                        <div class="divBoxImg-Texto divLogo__img">
                            <img src="assets\img\logos\logo-prime-shoes.png" alt="" class="imgLogoCarousel">
                        </div>
                        <div class="divBoxImg-Texto divLogo__texto">
                            <h1 class="h1Titulo">BIENVENIDO A PRIME SHOES</h1>
                            <p class="pCarousel">Tu puerta de entrada al mundo del calzado de alta calidad y estilo incomparable.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <button class="carousel-control-prev botton__carousel" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next botton__carousel" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    </section>

    <section class="sectionProductos">
        <div class="divPresentacionProductos">
            <div class="divPrincipalesProductos">
                <div class="divPrincipalProducto">
                    <h4 class="formatoDelTexto h4TextoPresentacion--principio">Nos enorgullece ofrecer una selección cuidadosamente curada de zapatillas importadas que fusionan moda, comodidad y calidad superior.</h4>
                </div>
                <div class="divPrincipalProducto">
                    <div class="divBoxProducto divBoxProducto--img">
                        <img class="imgProducto imgProducto--imgPrincipal" src="assets\img\adidas_Campus00s.jpg" alt="">
                        <img class="imgProducto--logoBlanco" src="assets\img\logo-adidas-blanco.png" alt="">
                    </div>
                    <div class="divBoxProducto divBoxProducto--texto">
                        <p class="formatoDelTexto pTextoPresentacion">Ofrecemos una amplia gama de zapatillas importadas de marcas reconocidas mundialmente.</p>
                    </div>
                </div>
                <div class="divPrincipalProducto divBoxProducto--right">
                    <div class="divBoxProducto divBoxProducto--img">
                        <img class="imgProducto imgProducto--imgPrincipal" src="assets\img\nike_dunkLow_StrangeLove.jpg" alt="">
                        <img class="imgProducto--logoBlanco" src="assets\img\logo-nike-blanco.png" alt="">
                    </div>
                    <div class="divBoxProducto divBoxProducto--texto">
                        <p class="formatoDelTexto pTextoPresentacion">Nuestra cuidadosa selección de zapatillas importadas garantiza que cada par sea único y exclusivo, permitiéndote destacar entre la multitud con estilo.</p>
                    </div>
                </div>
                <div class="divPrincipalProducto">
                    <div class="divBoxProducto divBoxProducto--img">
                        <img class="imgProducto imgProducto--imgPrincipal" src="assets\img\vans_KnuSkool_promo.jpg" alt="">
                        <img class="imgProducto--logoBlanco" src="assets\img\logo-vans-blanco.png" alt="">
                    </div>
                    <div class="divBoxProducto divBoxProducto--texto">
                        <p class="formatoDelTexto pTextoPresentacion"> Únete a nosotros en nuestro viaje para recorrer el mundo con estilo, comodidad y confianza, solo con Prime Shoes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php echo $this->endSection(); ?>