-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2024 a las 23:39:43
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parras_a`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `consulta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombre`, `email`, `consulta`) VALUES
(1, 'Alan Parras', 'alan@gmail.com', 'Hola buenas esto es una prueba'),
(2, 'Alan Parras', 'alan@gmail.com', 'Hola buenas esto es una prueba'),
(3, 'prueba prueba', 'prueba2@gmail.com', 'Hola esto es una prueba'),
(4, 'Alan Parras', 'alan@gmail.com', 'Esto es una prueba!!'),
(5, 'prueba prueba', 'prueba2@gmail.com', 'Hola como estas??');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Vans');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `id_marca`, `activo`) VALUES
(1, 'Adidas Campus 00s', 'Estos zapatos adidas toman los elementos icónicos de los Campus 80 y les dan un toque de próxima generación inspirado en el skate. Conocida por su durabilidad y la forma en que se amolda al pie con el tiempo, la gamuza ayuda a brindar longevidad y una base sólida. Los nuevos bloques de colores, gráficos y marcas universitarios crean una nueva identidad para que la próxima generación la posea y la diseñe.', '170000.00', 3, 1, 1),
(2, 'Nike Dunk Low Retro', 'Desde tableros hasta patinetas, la influencia de Nike Dunk es innegable. Aunque se introdujo como calzado de baloncesto en 1985, sus suelas planas y con agarre eran perfectas para una comunidad deportiva desatendida: los patinadores. Al descubrir una subcultura que anhela tanto la creatividad como la funcionalidad, Dunk lanzó décadas de innumerables combinaciones de colores que continúan capturando el alma de los patinadores de costa a costa.', '115000.00', 2, 2, 1),
(3, 'Vans Knu Skool', 'Un estilo Puffy de los 90 inspirado en el pasado, pero creado para hoy\r\n\r\nEl Knu Skool es una interpretación moderna de un estilo clásico de los 90, definido por su lengüeta hinchada y su raya lateral moldeada en 3D, y rematado con cordones gruesos y de gran tamaño. Con su perfil directo y detalles de estilo dramáticos, el Knu Skool juega con el Old Skool™ original mientras combina un ícono del pasado con las tendencias actuales.', '75000.00', 3, 3, 1),
(4, 'Air Jordan 1 Mid SE', 'Disfruta del verano con el AJ1, tu nuevo modelo favorito. Confeccionado con una combinación de gamuza y lona, este par ofrece la comodidad que más te gusta con una actualización de temporada.\r\nBeneficios\r\n•La parte superior de gamuza y lona te ofrece durabilidad y estructura.\r\n•La unidad Nike Air encapsulada ofrece amortiguación ligera.\r\n•Una suela de goma sólida te brinda tracción en distintos tipos de superficies.', '250000.00', 3, 2, 1),
(5, 'Forum Low CL', 'Salga con un estilo icónico con estos zapatos Forum Low CL. Un guiño a la herencia del baloncesto de adidas, estos tenis de perfil bajo cuentan con una suela de goma para un agarre firme y durabilidad. Una parte superior de cuero sella el trato.\r\n', '100000.00', 15, 1, 1),
(6, 'Air Jordan 1 Low', 'Inspirado en el original que se lanzó en 1985, el Air Jordan 1 Low ofrece un estilo clásico impecable que se resulta familiar, pero renovado. Con un diseño icónico que combina perfectamente con cualquier ajuste, este calzado garantiza que siempre estará a la moda.', '210000.00', 20, 2, 1),
(7, 'YEEZY BOOST 700', '- Origen: IMPORTADO\n- Color del artículo: Utility Black / Utility Black / Utility Black\n- Número de artículo: FV5304', '250000.00', 15, 1, 1),
(8, 'YZY 700 V3', '- Importado\r\n- Color del producto: Desvanecimiento de cobre / Desvanecimiento de cobre / Desvanecimiento de cobre\r\n- Código de producto: GY4109', '210000.00', 15, 1, 1),
(9, 'YEEZY BOOST 350 V2', '- Importado\r\n- Color del producto: Sal / Núcleo Negro / Sal\r\n- Codigo de Producto: HQ2060', '230000.00', 20, 1, 1),
(10, 'Jordan 1 Retro x Travis Scott', 'El Air Jordan 1 Low Fragment Design x Travis Scott hace un guiño al Air Jordan 1 Fragment original de 2016 con su sencillo bloque de color. Cuenta con una parte superior de cuero blanco liso con superposiciones de cuero negro y azul real. A partir de ahí, un Swoosh invertido característico y suelas amarillentas añaden un estilo Cactus Jack a la silueta clásica.', '1100000.00', 10, 2, 1),
(11, 'Jordan 3 Retro x J Balvin Rio', 'El Jordan 3 Retro J Balvin Rio combina a la perfección el diseño clásico del Jordan 3 con el estilo característico de J Balvin. Con una parte superior predominantemente negra, esta zapatilla cobra vida con destellos solares y acentos de abismo carmesí total que capturan la energía vibrante de la música de J Balvin. El icónico estampado de elefante en el talón y la puntera rinde homenaje al diseño original de Jordan 3, mientras que la entresuela degradada que pasa del naranja brillante al profundo abismo agrega un toque único y colorido.', '245000.00', 20, 2, 1),
(12, 'Jordan 3 Retro SP x J Balvin Medellín Sunset', 'Sumérgete en el vibrante mundo del Jordan 3 Retro SP J Balvin Medellín Sunset, una colaboración dinámica que encarna el aura electrizante de la sensación del reggaetón J Balvin y el legado icónico de la marca Jordan. Esta moderna zapatilla es un lienzo narrativo pintado con la esencia estética de la ciudad natal de J Balvin, Medellín, Colombia. El diseño se inspira en los cautivadores atardeceres de Medellín, reflejando el ambiente tranquilo pero colorido de la ciudad a medida que el día se convierte en noche.', '525000.00', 10, 2, 1),
(13, 'Vans Knu Skool Triple Black', 'El Knu Skool es una interpretación moderna de un estilo clásico de los 90, definido por su lengüeta hinchada y su raya lateral moldeada en 3D, y rematado con cordones gruesos y de gran tamaño. Con su perfil directo y detalles de estilo dramáticos, el Knu Skool juega con el Old Skool™ original al tiempo que combina un ícono del pasado con las tendencias actuales.', '75000.00', 15, 3, 1),
(14, 'Vans Knu Skool MTE-1 LX x Imran Potato', 'Inspirado en las actividades de Imran durante los inviernos de la ciudad de Nueva York y su pasión por el snowboard, el Knu Skool MTE fusiona durabilidad y formas de diseño para superar los límites de la expresión del producto.', '125000.00', 15, 3, 1),
(15, 'Vans Knu Mid', 'El Knu Mid es una interpretación moderna de un estilo clásico de los 90, elevado a una caña media para mayor comodidad y un estilo espectacular. Definido por su lengüeta hinchada, su banda lateral moldeada en 3D y su logotipo en relieve en el cuello trasero, este calzado directo juega con el Old Skool original y al mismo tiempo combina un ícono del pasado con las tendencias actuales.', '90000.00', 14, 3, 1),
(16, 'Jordan 4 Retro Metallic Purple', 'Jordan Brand rinde homenaje a uno de sus primeros temas de combinación de colores con el Jordan 4 Retro Metallic Purple, ahora disponible en StockX. En 1985, el Air Jordan 1 fue el primero de su línea en recibir el tratamiento \"Metálico\". Se lanzaron originalmente cuatro combinaciones de colores metálicos, incluidos rojo, naranja, morado y verde. Este lanzamiento se inspira en el bloque de color del Jordan 1 Metallic Purple.', '450000.00', 20, 2, 1),
(17, 'Jordan Jumpman Jack TR x Travis Scott', 'El Air Jordan Cut The Check TR Travis Scott Sail nació de una colaboración entre la marca Jordan y el renombrado artista de rap Travis Scott y presenta elementos de diseño únicos y toques personales que reflejan su estilo distintivo y su visión creativa.', '350000.00', 10, 2, 1),
(18, 'Jordan 1 Retro High 85s OG Metallic Burgundy', 'El Jordan 1 Retro High \'85 OG Metallic Burgundy es un relanzamiento de uno de los modelos Air Jordan 1 más raros, un zapato lanzado originalmente en 1985 como parte de la Serie Metallic.', '135000.00', 30, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `user` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nombre`, `apellido`, `dni`, `user`, `email`, `pass`, `id_perfil`, `active`, `created_at`) VALUES
(1, 'alan', 'parras', 44771911, 'admin', 'alan@gmail.com', '$2y$10$UB3vXFEazhfQbMG86gIk0.wGuWDeJ44VWkIimN8tZ6a1phhguqaQW', 1, 1, '2024-06-04 02:02:10'),
(31, 'prueba', 'prueba', 12345678, 'prueba', 'prueba2@gmail.com', '$2y$10$dKbJ4an9f/YQlApqkPrYyeFLwgCuv2T7fIBquJFx8iJ/6ezyCYjM6', 2, 1, '2024-06-11 21:38:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_venta` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_user`, `total_venta`, `created_at`) VALUES
(11, 1, '625000.00', '2024-06-18 01:53:16'),
(12, 31, '340000.00', '2024-06-18 02:59:55'),
(13, 1, '250000.00', '2024-06-18 21:55:28'),
(14, 1, '250000.00', '2024-06-18 21:55:53'),
(15, 31, '1190000.00', '2024-06-24 16:47:31'),
(16, 31, '455000.00', '2024-06-24 19:01:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id_detalle`, `id_venta`, `id_producto`, `qty`, `precio`) VALUES
(3, 11, 1, 3, '170000.00'),
(4, 11, 2, 1, '115000.00'),
(5, 12, 1, 2, '170000.00'),
(6, 13, 4, 1, '250000.00'),
(7, 14, 4, 1, '250000.00'),
(8, 15, 1, 7, '170000.00'),
(9, 16, 1, 2, '170000.00'),
(10, 16, 2, 1, '115000.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_marca` (`id_marca`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_perfil_2` (`id_perfil`),
  ADD KEY `id_perfil` (`id_perfil`) USING BTREE;

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_user`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
