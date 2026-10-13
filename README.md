# Prime Shoes

**Prime Shoes** es una aplicación web de comercio electrónico para la venta de calzado. Permite a los visitantes explorar el catálogo, a los clientes realizar compras y obtener sus facturas, y a los administradores gestionar usuarios, productos, marcas, ventas y consultas.

Desarrollada con **PHP 8.2 y CodeIgniter 4**, **MySQL**, **HTML**, **CSS**, **JavaScript** y **Bootstrap**.

---

## Instalación rápida

> Si es la primera vez que usás el proyecto, seguí estos pasos en orden. Si algo falla, revisá la sección [Solución de problemas](#solución-de-problemas).

### 1. Requisitos

* **XAMPP** con PHP 8.2 (versión con la que se desarrolló y probó) y MySQL/MariaDB.
* Navegador web moderno.

Extensiones de PHP necesarias (en XAMPP se activan en `php.ini`, quitando el `;` del inicio de la línea):

| Extensión | Para qué se usa |
| --------- | --------------- |
| `intl` | Requerida por CodeIgniter 4 |
| `mbstring` | Requerida por CodeIgniter 4 y Dompdf |
| `json` | Requerida por CodeIgniter 4 |
| `mysqli` | Conexión con MySQL |
| `dom` | Generación de facturas en PDF (Dompdf) |
| `zip` | Solo si hay que ejecutar `composer install` |

Después de modificar `php.ini` hay que **reiniciar Apache** desde el panel de XAMPP. Para verificar las extensiones activas: `php -m`.

### 2. Obtener el proyecto

Copiar el proyecto dentro de `htdocs` (por ejemplo `C:\xampp\htdocs`).

**Con git:**

```bash
cd C:\xampp\htdocs
git clone https://github.com/alanparras/proyecto_parras_alan.git
```

**Descargando el ZIP desde GitHub:** al descomprimir, la carpeta se llama `proyecto_parras_alan-main`. **Hay que renombrarla a `proyecto_parras_alan`**, porque la configuración del proyecto depende de ese nombre.

### 3. Iniciar los servicios

Abrir el panel de XAMPP e iniciar **Apache** y **MySQL**.

### 4. Crear e importar la base de datos

1. Ingresar a `http://localhost/phpmyadmin`.
2. Crear una base de datos llamada **`parras_a`** (cotejamiento `utf8mb4_general_ci`).
3. Seleccionarla, ir a **Importar** y elegir el archivo `parras_a.sql` de la raíz del proyecto.
4. Ejecutar la importación.

### 5. Configuración

El proyecto ya incluye el archivo `.env` con:

```ini
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/proyecto_parras_alan/'
```

La conexión a la base de datos usa los valores por defecto de XAMPP: host `localhost`, base `parras_a`, usuario `root` y **sin contraseña**. Si el MySQL local tiene otra configuración, modificar los datos en `app/Config/Database.php`.

Si el proyecto se ubica en una carpeta o puerto distinto, ajustar `app.baseURL` en el `.env`.

### 6. Dependencias (solo si falta la carpeta `vendor/`)

El repositorio incluye las dependencias en la carpeta `vendor/`. Si por algún motivo no existiera, ejecutar desde la raíz del proyecto:

```bash
composer install
```

Esto requiere la extensión `zip` activa (ver paso 1).

### 7. Ejecutar

Con Apache y MySQL activos, abrir:

```text
http://localhost/proyecto_parras_alan/
```

---

## Credenciales de prueba

| Perfil | Usuario | Contraseña |
| ------ | ------- | ---------- |
| **Administrador** | `admin` | `admin` |
| **Cliente** | `prueba` | `12345` |

> Son cuentas de prueba creadas únicamente para evaluar el sistema. Las contraseñas se almacenan encriptadas en la base de datos.

---

## Descripción

Prime Shoes contempla tres tipos de interacción:

* **Visitante:** navega por el sitio, consulta productos, usa el carrito y envía consultas.
* **Cliente:** además puede iniciar sesión, comprar, ver su historial de compras y descargar sus facturas.
* **Administrador:** gestiona usuarios, productos, marcas, ventas y consultas.

---

## Funcionalidades

### Catálogo y productos

* Catálogo visible sin necesidad de iniciar sesión.
* Búsqueda de productos por nombre y paginación (9 productos por página).
* Detalle de cada producto: nombre, descripción, precio, marca y stock.
* Los productos **sin stock** se muestran al final del catálogo con un aviso "Sin stock". Su detalle sigue siendo visible, pero no se pueden agregar al carrito ni comprar.

### Carrito y compras

* Agregar productos, modificar cantidades (limitadas por el stock), eliminar productos y vaciar el carrito.
* "Comprar ahora" desde el detalle del producto.
* Al confirmar la compra se registra la venta y su detalle, y se descuenta el stock.
* Pantalla de agradecimiento con acceso a la factura.

### Facturas

* Comprobante de compra informal, sin validez fiscal, generado a partir de los datos de la venta.
* Visualización en pantalla y **descarga en PDF** (Dompdf).
* Accesible desde la pantalla de agradecimiento y desde **Mis Compras**.
* Cada cliente solo puede ver sus propias facturas; el administrador puede ver las de cualquier venta.

### Mis Compras (cliente)

* Historial de compras del usuario con fecha, productos, cantidades, precios y total.

### Panel de administración

* **Usuarios:** alta, edición y activación/desactivación de cuentas.
* **Productos:** alta (con imagen), edición y activación/desactivación.
* **Marcas:** alta, edición y activación/desactivación.
* **Ventas:** listado de ventas, detalle de cada una y acceso a su factura.
* **Consultas:** listado de los mensajes recibidos, indicando si fueron enviados por un cliente o por un invitado.

### Seguridad y reglas de negocio

* Contraseñas almacenadas con hash (`password_hash`).
* Control de acceso por perfil mediante filtros: un cliente no puede acceder a ninguna ruta de administración.
* Validación en el servidor de todos los formularios.
* Precio mayor a 0 y stock no negativo.
* DNI, usuario y email únicos.
* Siempre debe quedar al menos un administrador activo en el sistema.
* Baja lógica (no se eliminan registros, se desactivan) para conservar la integridad de las ventas históricas.
* Protección CSRF en los formularios.

### Vistas informativas

Inicio, Quiénes somos, Comercialización, Contacto y Términos y usos.

---

## Rutas principales

| Acceso | Rutas |
| ------ | ----- |
| **Público** | `/`, `about_us`, `catalogue`, `details/{id}`, `commercialization`, `contact`, `termsAndUses`, `login`, `register`, `carrito` |
| **Usuario logueado** | `buy`, `thanks/{id}`, `myPurchases`, `invoice/{id}`, `invoice/{id}/download` |
| **Solo administrador** | `crudUsers`, `crudProductos`, `crudMarcas`, `crudVentas`, `crudVentas/detalle/{id}`, `crudConsultas` |

---

## Tecnologías utilizadas

| Tecnología | Uso |
| ---------- | --- |
| **PHP 8.2** | Lenguaje principal |
| **CodeIgniter 4** | Framework (arquitectura MVC) |
| **MySQL / MariaDB** | Base de datos |
| **Dompdf** | Generación de facturas en PDF |
| **HTML5 / CSS3** | Estructura y estilos |
| **JavaScript** | Interactividad (por ejemplo, actualización de cantidades en el carrito) |
| **Bootstrap** | Diseño responsive e interfaz |
| **XAMPP** | Entorno de desarrollo local |
| **phpMyAdmin** | Administración e importación de la base de datos |
| **Composer** | Gestión de dependencias |

---

## Base de datos

El archivo `parras_a.sql` contiene la estructura y los datos iniciales. Tablas:

| Tabla | Contenido |
| ----- | --------- |
| `perfiles` | Perfiles de usuario (Admin, Cliente) |
| `users` | Usuarios registrados |
| `marcas` | Marcas de los productos |
| `productos` | Productos a la venta |
| `ventas` | Compras realizadas |
| `ventas_detalle` | Productos incluidos en cada venta |
| `consultas` | Mensajes del formulario de contacto |

### Relaciones

* `users.id_perfil` → `perfiles.id_perfil`
* `productos.id_marca` → `marcas.id_marca`
* `ventas.id_user` → `users.id_user`
* `ventas_detalle.id_venta` → `ventas.id_venta`
* `ventas_detalle.id_producto` → `productos.id_producto`
* `consultas.id_user` → `users.id_user` (opcional: queda vacío si la consulta la envió un invitado)

---

## Estructura del proyecto

```text
proyecto_parras_alan/
├── app/
│   ├── Config/        Configuración, rutas (Routes.php) y filtros (Filters.php)
│   ├── Controllers/   Controladores
│   ├── Filters/       Auth y AdminAuth (control de acceso)
│   ├── Models/        Modelos
│   └── Views/         Vistas (plantilla, front, partials)
├── assets/            CSS, JavaScript e imágenes
├── Cart/              Librería de carrito de CodeIgniter
├── system/            Núcleo del framework
├── vendor/            Dependencias de Composer (incluye Dompdf)
├── writable/          Logs, caché y sesiones
├── .env               Configuración del entorno
├── .htaccess          Reescritura de URLs
├── composer.json
├── index.php
├── parras_a.sql       Base de datos
└── spark
```

---

## Solución de problemas

**`Class "Locale" not found`**
Falta la extensión `intl`. En `php.ini` cambiar `;extension=intl` por `extension=intl`, guardar y reiniciar Apache.

**Composer: "The zip extension and unzip/7z commands are both missing"**
En `php.ini` activar `extension=zip`, guardar, abrir una terminal nueva y volver a ejecutar `composer install`. Usar el `php.ini` que indica el propio mensaje de error.

**Las páginas cargan sin estilos o las rutas devuelven 404**
Verificar que la carpeta se llame exactamente `proyecto_parras_alan`, que `app.baseURL` en el `.env` coincida con la URL con la que se accede, y que Apache tenga activo el módulo `mod_rewrite`.

**Error de conexión a la base de datos**
Verificar que MySQL esté iniciado en XAMPP, que la base se llame `parras_a` y que los datos de `app/Config/Database.php` coincidan con la configuración local.

**La factura en PDF no se descarga**
Verificar que exista la carpeta `vendor/dompdf`. Si no está, ejecutar `composer install`.

**Pantalla en blanco o "Whoops!"**
Con `CI_ENVIRONMENT = development` en el `.env` se muestra el detalle del error. Revisar también los archivos de `writable/logs`.

**Modo producción**
Para ocultar los errores detallados y la barra de depuración, cambiar `CI_ENVIRONMENT` a `production` en el `.env`.

---

## Documentación

La **Especificación de Requisitos de Software (ERS)** y el **modelado de la base de datos** se entregan por separado.

---

## Autor

**Alan Emanuel Parras**

## Repositorio

[GitHub - proyecto_parras_alan](https://github.com/alanparras/proyecto_parras_alan)