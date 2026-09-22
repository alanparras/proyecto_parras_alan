<!-- -----CARGAR PLANTILLA ----- -->
<?php 
echo $this->extend('front/plantilla/layout');
// echo $this->extend('front/plantilla/head');

// ----- CARGAR DE ESTILOS PROPIOS -----
echo $this->section('estilosIndividuales'); ?>

<link href="assets\css\contenido\termsAndUses.css" rel="stylesheet">

<?php echo $this->endSection();

// ----- CONTENIDO -----
echo $this->section('contenido'); ?>

<section class="sectionCommercialization">
    <div class="divBoxContenido">
        <div class="divBoxes">
            <h2 class="tituloBox">Aviso Legal</h2>
            <div class="divBoxEnvios">
                <div class="parrafos">
                    <h4>Términos y Condiciones de Uso del Sitio Web</h4>
                    <p>Por favor, lea atentamente estos términos y condiciones antes de utilizar nuestro sitio web. Al acceder o utilizar el sitio web de Prime Shoes, usted acepta estar legalmente obligado por los siguientes términos y condiciones. Si no está de acuerdo con alguno de estos términos, no utilice nuestro sitio web.</p>
                </div>
                <div class="parrafos">
                    <h4>Servicios Ofrecidos</h4>
                    <p>Prime Shoes ofrece una plataforma en línea para la venta de zapatillas de alta calidad procedentes de marcas reconocidas a nivel mundial. Nuestros servicios incluyen la exhibición y comercialización de productos, así como la facilitación de transacciones de compra en línea.</p>
                </div>
                <div class="parrafos">
                    <h4>Política de Privacidad</h4>
                    <p>Respetamos su privacidad y nos comprometemos a proteger sus datos personales. Consulte nuestra Política de Privacidad para obtener información detallada sobre cómo recopilamos, utilizamos y protegemos la información que usted proporciona durante su visita a nuestro sitio web.</p>
                </div>
                <div class="parrafos">
                    <h4>Política de Privacidad</h4>
                    <p>Respetamos su privacidad y nos comprometemos a proteger sus datos personales. Consulte nuestra Política de Privacidad para obtener información detallada sobre cómo recopilamos, utilizamos y protegemos la información que usted proporciona durante su visita a nuestro sitio web.</p>
                </div>
                <div class="parrafos">
                    <h4>Ventas de Productos y Servicios</h4>
                    <p>Garantías: Todos los productos vendidos por Prime Shoes están respaldados por las garantías ofrecidas por los fabricantes respectivos. Para obtener información específica sobre las garantías de un producto, consulte la descripción del producto en nuestro sitio web o póngase en contacto con nuestro servicio de atención al cliente.</p>
                    <p>Soporte Postventa: Nuestro equipo de atención al cliente está disponible para brindarle asistencia postventa y resolver cualquier problema que pueda surgir con su compra. Puede ponerse en contacto con nuestro servicio de atención al cliente a través de nuestro formulario en línea o por correo electrónico.</p>
                    <p>Formas de Entrega: Ofrecemos diversas opciones de envío para satisfacer sus necesidades de entrega. Las opciones de entrega y los tiempos de entrega estimados se detallan durante el proceso de compra. Tenga en cuenta que los tiempos de entrega pueden variar según la ubicación y otros factores.</p>
                    <p>Procedimientos de Devolución: Si no está satisfecho con su compra, puede devolver el producto dentro del período especificado en nuestra política de devoluciones. Consulte nuestra Política de Devoluciones para obtener información detallada sobre los procedimientos de devolución y reembolso.</p>
                </div>
                <div class="parrafos">
                    <h4>Contacto</h4>
                    <p>Si tiene alguna pregunta sobre estos términos y condiciones, nuestra política de privacidad, o cualquier otro aspecto de nuestros servicios, no dude en ponerse en contacto con nosotros a través de los datos de contacto proporcionados en nuestro sitio web.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>