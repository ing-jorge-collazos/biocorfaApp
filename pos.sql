-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2021 a las 03:33:35
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(27, 'Faciales', '2021-08-06 01:21:32'),
(28, 'Tratamientos', '2021-08-11 15:37:00'),
(29, 'procedimientos', '2021-08-11 15:37:07'),
(30, 'Terapias', '2021-08-11 15:37:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(180, 'Lorena Patricia Collazos Narváez', 1085246058, 'lorecollanar@gmail.com', '(310) 508-0853', 'cra 7 a n26C-20 ', '1984-01-02', 5, '2021-08-12 12:30:23', '2021-08-12 17:30:23'),
(181, 'Jorge Collazos', 12345678, 'jorge@collazos.com', '(312) 111-1111', 'Pasto', '1985-01-01', 6, '2021-08-12 12:29:30', '2021-08-12 17:29:30'),
(182, 'David Rosero', 87217075, 'loquemiradavid@gmail.com', '3178444099', 'ipiales', '0000-00-00', 1, '2021-08-12 11:55:32', '2021-08-12 16:55:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(224, 27, '1010', 'Limpieza facial profunda', 'vistas/img/productos/1010/276.jpg', 0, 50000, 55000, 1, '2021-08-09 17:25:05'),
(225, 27, '1013', 'Fresa Facial', 'vistas/img/productos/1013/394.png', 0, 10000, 14000, 2, '2021-08-10 23:20:38'),
(226, 28, '1014', 'anti arrugas ', 'vistas/img/productos/1014/783.jpg', 9, 150000, 210000, 1, '2021-08-12 17:28:53'),
(227, 28, '1015', 'Botox', 'vistas/img/productos/1015/502.jpg', 13, 50000, 70000, 2, '2021-08-12 17:26:37'),
(228, 29, '2010', 'Dermoabrasión', 'vistas/img/productos/2010/629.jpg', 9, 140000, 196000, 1, '2021-08-12 17:29:30'),
(229, 30, '3010', 'Aromas', 'vistas/img/productos/3010/825.jpg', 19, 88500, 123900, 1, '2021-08-12 17:27:09'),
(230, 29, '2020', 'Exfoliación por láser', 'vistas/img/productos/2020/245.jpg', 19, 145000, 203000, 1, '2021-08-12 17:30:23'),
(231, 30, '4010', 'Chocolate', 'vistas/img/productos/chocolate/466.jpg', 9, 75000, 105000, 1, '2021-08-12 17:25:35'),
(232, 28, '2040', 'Radio Frecuencia Corporal', 'vistas/img/productos/2040/239.png', 9, 92000, 128800, 1, '2021-08-12 17:13:56'),
(233, 29, '2050', 'Bichectomia', 'vistas/img/productos/2050/306.png', 9, 450000, 630000, 1, '2021-08-12 17:11:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoDoc` text COLLATE utf8_spanish_ci NOT NULL,
  `numIdent` int(60) NOT NULL,
  `telefono` int(60) NOT NULL,
  `fechaNac` date NOT NULL,
  `contrato` text COLLATE utf8_spanish_ci NOT NULL,
  `fecIngreso` date NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `tipoDoc`, `numIdent`, `telefono`, `fechaNac`, `contrato`, `fecIngreso`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'David Fernando Rosero Guerrero', 'admin', 'C.C.', 87217075, 317844409, '1984-01-07', 'OPS', '2019-08-05', '$2a$07$asxx54ahjppf45sd87a5auZIOFA3CPrv0GKOOoFpxzHmfN6.LwpF.', 'Administrador', 'vistas/img/usuarios/admin/909.jpg', 1, '2021-08-24 11:50:07', '2021-08-24 11:50:07'),
(28, 'David Rosero', 'David Rosero', 'Especial', 87217075, 0, '0000-00-00', 'Administrador', '0000-00-00', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Administrador', '', 1, '0000-00-00 00:00:00', '2021-08-24 20:07:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(277, 299, 180, 1, '[{\"id\":\"224\",\"descripcion\":\"Limpieza facial profunda\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"55000\",\"total\":\"55000\"}]', 0, 50000, 50000, 'Efectivo', '2021-08-08 23:18:40'),
(278, 300, 181, 1, '[{\"id\":\"225\",\"descripcion\":\"Fresa Facial\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"14000\",\"total\":\"14000\"}]', 0, 14000, 14000, 'Efectivo', '2021-08-09 23:01:57'),
(279, 301, 180, 1, '[{\"id\":\"225\",\"descripcion\":\"Fresa Facial\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"14000\",\"total\":\"14000\"}]', 0, 14000, 14000, 'TC-425', '2021-08-10 23:21:31'),
(280, 302, 181, 1, '[{\"id\":\"233\",\"descripcion\":\"Bichectomia\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"630000\",\"total\":\"630000\"}]', 0, 0, 630000, 'TD-145', '2021-08-11 15:51:43'),
(281, 303, 181, 23, '[{\"id\":\"227\",\"descripcion\":\"Botox\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"70000\",\"total\":\"70000\"}]', 0, 0, 70000, 'Efectivo', '2021-08-12 03:40:51'),
(282, 304, 182, 23, '[{\"id\":\"232\",\"descripcion\":\"Radio Frecuencia Corporal\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"128800\",\"total\":\"128800\"}]', 0, 0, 128800, 'Efectivo', '2021-08-12 16:55:32'),
(283, 305, 180, 23, '[{\"id\":\"231\",\"descripcion\":\"Chocolate\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"105000\",\"total\":\"105000\"}]', 0, 0, 105000, 'TC-342', '2021-08-12 17:25:35'),
(284, 306, 181, 23, '[{\"id\":\"227\",\"descripcion\":\"Botox\",\"cantidad\":\"1\",\"stock\":\"13\",\"precio\":\"70000\",\"total\":\"70000\"}]', 0, 0, 70000, 'TD-324', '2021-08-12 17:26:37'),
(285, 307, 181, 23, '[{\"id\":\"229\",\"descripcion\":\"Aromas\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"123900\",\"total\":\"123900\"}]', 0, 0, 123900, 'Efectivo', '2021-08-12 17:27:09'),
(286, 308, 180, 23, '[{\"id\":\"226\",\"descripcion\":\"anti arrugas \",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"210000\",\"total\":\"210000\"}]', 2100, 0, 212100, 'TC-343', '2021-08-12 17:28:53'),
(287, 309, 181, 23, '[{\"id\":\"228\",\"descripcion\":\"Dermoabrasión\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"196000\",\"total\":\"196000\"}]', 0, 0, 196000, 'TC-324', '2021-08-12 17:29:30'),
(288, 310, 180, 23, '[{\"id\":\"230\",\"descripcion\":\"Exfoliación por láser\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"203000\",\"total\":\"203000\"}]', 0, 0, 203000, 'Efectivo', '2021-08-12 17:30:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
