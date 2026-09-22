<!-- -----CARGAR PLANTILLA ----- -->
<?php 
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets\css\contenido\about_us.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----

echo $this->section('contenido'); ?>

<section class="sectionInfo">
    <div class="divBoxPrincipal">
        <div class="divBoxInfo divBoxInfo--justify divBoxInfo--borderBottom">
            <div class="divBoxLocal">
                <img class="imgLocal" src="assets\img\local.jpeg" alt="">
            </div>
            <div class="divBoxTextoPresentacion">
                <div class="divBoxTextos">
                    <h1 class="tituloPresentacion">¿Quienes Somos?</h1>
                    <p class="parrafoPresentacion">
                        Nosotros somos Prime Shoes una empresa dedicada a la importación y venta de zapatillas de alta calidad procedentes de marcas reconocidas a nivel mundial. Nuestros objetivo principal es proporcionar a los clientes una amplia variedad de zapatillas de alta calidad procedentes de marcas reconocidas a nivel mundial. La empresa se esfuerza por ser un destino único donde los clientes puedan encontrar los últimos diseños y estilos de zapatillas de moda.
                    </p>
                </div>
                <div class="divBoxTextos">
                    <h2 class="tituloPresentacion">Trayectoria</h2>
                    <p class="parrafoPresentacion">
                        Prime Shoes fue fundada por un grupo de entusiastas del calzado con una pasión por la moda y la calidad. La empresa comenzó como una pequeña operación en línea, importando un surtido limitado de zapatillas de marcas internacionales.
                        Con el tiempo, la empresa expandió su presencia en el mercado, abriendo tiendas físicas en ubicaciones estratégicas y ampliando su catálogo de productos para incluir una variedad aún mayor de marcas y estilos de zapatillas.
                    </p>
                </div>
            </div>
        </div>

        <div class="divBoxInfo divBoxInfo--column">
            <h3 class="tituloPresentacion">Staff</h3>
            <div class="gridConteiner">
                <div class="gridStaff">
                    <div class="divTarjetaPresentacion">
                        <img class="imgStaff" src="assets\img\staff\gerente.jpeg" alt="">
                        <div class="divBoxTextoStaff">
                            <h4 class="textProfesion">Gerente</h4>
                            <p class="pNames">Martin Pereira</p>
                        </div>
                    </div>
                    <div class="divTarjetaPresentacion">
                        <img class="imgStaff" src="assets\img\staff\gerente_ventas.jpeg" alt="">
                        <div class="divBoxTextoStaff">
                            <h4 class="textProfesion">Ventas</h4>
                            <p class="pNames">Jessica Scott</p>
                        </div>
                    </div>
                    <div class="divTarjetaPresentacion">
                        <img class="imgStaff" src="assets\img\staff\gerente_compras_logistica.jpeg" alt="">
                        <div class="divBoxTextoStaff">
                            <h4 class="textProfesion">Compras y Logística</h4>
                            <p class="pNames">Stephanie Curtis</p>
                        </div>
                    </div>
                    <div class="divTarjetaPresentacion">
                        <img class="imgStaff" src="assets\img\staff\gerente_marketing.jpeg" alt="">
                        <div class="divBoxTextoStaff">
                            <h4 class="textProfesion">Marketing</h4>
                            <p class="pNames">Lindsey Brown</p>
                        </div>
                    </div>
                    <div class="divTarjetaPresentacion">
                        <img class="imgStaff" src="assets\img\staff\finanzas.jpeg" alt="">
                        <div class="divBoxTextoStaff">
                            <h4 class="textProfesion">Finanzas y Contabilidad</h4>
                            <p class="pNames">Alvin Bullock</p>
                        </div>
                    </div>
                    <div class="divTarjetaPresentacion">
                        <img class="imgStaff" src="assets\img\staff\recursos_humanos.jpeg" alt="">
                        <div class="divBoxTextoStaff">
                            <h4 class="textProfesion">Recursos Humanos</h4>
                            <p class="pNames">Dennis Douglas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>