-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2021 a las 22:02:50
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cybercontrol`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarStock` (`id_producto` INT, `stockADescontar` INT)  BEGIN 
    DECLARE stProd INT;
    DECLARE stActual INT; /*stock actual*/

    SET stProd = (SELECT getStock(id_producto));
    SET stActual = stProd - stockADescontar;

    UPDATE producto SET stock = stActual WHERE id = id_producto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearDetalle` (IN `id_producto` INT, IN `cant_producto` INT, IN `sub_total` INT)  BEGIN 
    DECLARE maxID INT;

    SET maxID = (SELECT getMaxIdVenta());

    INSERT INTO detalle 
    VALUES(
        NULL,
        maxID,
        id_producto,
        cant_producto,
        sub_total
    );

    CALL actualizarStock(id_producto, cant_producto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearVenta` (`total` INT)  BEGIN 
    INSERT INTO venta VALUES(NULL, NOW(), total);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDetalles` (`idVenta` INT)  BEGIN 
    SELECT 
        d.id, p.nombre, d.cantidad, d.subTotal, p.precio
    FROM 
        detalle d
    INNER JOIN 
        producto p ON d.producto = p.id
    WHERE 
        d.venta = idVenta;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getMaxIdVenta` () RETURNS INT(11) BEGIN 
    DECLARE maxID INT;

    SET maxID = (SELECT MAX(id) FROM venta);

    RETURN maxID;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getStock` (`id_producto` INT) RETURNS INT(11) BEGIN 
    DECLARE stProd INT;

    SET stProd = (SELECT stock FROM producto WHERE id = id_producto);

    RETURN stProd;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `comentarios` varchar(10000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `cedula`, `telefono`, `correo`, `comentarios`) VALUES
(1, 'Umberto', 111111, 6876876, 'notengo@sf', 'Estar pendiente de la gente que va con él'),
(3, 'Juan Pablo', 213123, 123234, 'jenny989@hotmil.com', 'debe saldo 150.000 / mas otro saldo'),
(4, 'Victor ', 2147483647, 2147483647, 'johan03defebrero@hotmail.com', '   ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesm`
--

CREATE TABLE `clientesm` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `comentarios` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientesm`
--

INSERT INTO `clientesm` (`id`, `nombre`, `cedula`, `telefono`, `direccion`, `correo`, `comentarios`) VALUES
(2, 'Jenny', 33242, 6876876, '', 'jogan34343@gmail.com', 'Esto es una prueba de texto xd'),
(5, 'Leandro', 1032370259, 2147483647, 'Cr79 #19a-37', 'electronicamaster@hotmail.com', 'Debe sobre los mercados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `venta` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subTotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `venta`, `producto`, `cantidad`, `subTotal`) VALUES
(26, 24, 9, 5, 2500),
(27, 25, 9, 100, 50000),
(28, 26, 9, 32, 16000),
(29, 26, 4, 12, 18000),
(30, 26, 2, 20, 260000),
(31, 27, 11, 40, 36000),
(32, 28, 12, 12, 24000),
(33, 29, 12, 2, 4000),
(34, 29, 12, 2, 4000),
(35, 30, 14, 1, 26000),
(36, 30, 14, 1, 26000),
(37, 31, 15, 20, 36000),
(38, 32, 15, 5, 9000),
(39, 33, 16, 2, 2000),
(40, 34, 16, 2, 2000),
(41, 35, 17, 5, 275000),
(42, 36, 19, 1, 1900),
(43, 37, 1, 1, 30000),
(44, 38, 1, 2, 60000),
(45, 38, 13, 5, 22500),
(46, 38, 15, 3, 5400),
(47, 39, 1, 10, 300000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `cliente`, `documento`, `direccion`, `producto`, `cantidad`, `precio`) VALUES
(3, '', 0, '', 'Aguardiente Nectar', 20, 2147483647),
(5, '', 0, '', 'Cerveza Bulbeizer', 1, 2200),
(6, '', 0, '', 'Jabon REY', 3, 5000),
(8, '', 0, '', 'Bom Bom Bun', 1, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacliente`
--

CREATE TABLE `facturacliente` (
  `id` int(11) NOT NULL,
  `cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion` varchar(35) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturacliente`
--

INSERT INTO `facturacliente` (`id`, `cliente`, `documento`, `direccion`) VALUES
(1, 'esteban', 135145, 'trasversal 85'),
(2, 'Johan', 1010013463, 'CR 79 #19A-37'),
(3, 'Lenadro', 1032370259, '');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getproductos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `getproductos` (
`id` int(11)
,`nombre` varchar(100)
,`precio` decimal(10,0)
,`stock` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getventas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `getventas` (
`id` int(11)
,`fecha` datetime
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `producto` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaVencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `producto`, `descripcion`, `valor`, `cantidad`, `fechaVencimiento`) VALUES
(3, 'Cerveza por paka', 'posee 24 Unidades', 2500, 9, '0000-00-00'),
(4, 'Aguardiente  Nectar', 'Rojo Medias', 15, 2, '0000-00-00'),
(5, 'Jabon de baÃ±o Savital', 'Paca por 24 Unidades', 50000, 5, '2018-06-07'),
(6, 'Yogurt Alpina', '20 cajas', 1500, 300, '2018-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `fechaVencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `stock`, `descripcion`, `fechaVencimiento`) VALUES
(1, 'Cerveza POKER lata por Pacas ', '49900', 7, '', '0000-00-00'),
(2, 'Aguardiente Nectar- Rojo Medias ', '18000', 38, 'Unidad medias', '0000-00-00'),
(3, 'Jabon de bano savital', '1200', 40, 'Cajas pequeñas', '2019-06-12'),
(4, 'Yogurt Alpina', '1500', 6, 'Revisar en dos meses ', '2020-11-19'),
(5, 'Cerveza Club Colombia Trigal ', '2500', 55, 'De limón', '0000-00-00'),
(9, 'Cigarrilo MUSTANG', '500', 863, 'Para vender por unidad ', '0000-00-00'),
(11, 'Salsa de Tomate Fruco', '900', 3, 'Pues es de tomate', '2018-06-23'),
(12, 'Papas Margarita ', '2000', 6, 'Reservadas para la mayoristas ', '2018-11-15'),
(13, 'Gomitas TRULULU', '4500', 0, 'Muy ricas', '2018-10-19'),
(14, 'Vino Manichewis', '26000', 28, 'semi-seco', NULL),
(15, 'Cervela MIller lite', '1800', 2, NULL, NULL),
(16, 'Papas Fosforito', '1000', 8, 'Pocas Venta', '2018-06-17'),
(17, 'Whisky Something Special', '55000', 45, 'El más vendido', '0000-00-00'),
(18, 'Arroz Diana', '1500', 50, 'El arroz de las seÃ±oras', '2018-06-08'),
(19, 'Gelatina', '1900', 1, 'lalala', '2018-06-21'),
(20, 'Papas Pringles', '7000', 10, 'De limón', '2020-10-21'),
(22, 'sfsfds', '0', 0, '', '0000-00-00'),
(23, 'sdfdsdsfds', '0', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombres` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `comentarios` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombres`, `telefono`, `direccion`, `correo`, `empresa`, `comentarios`) VALUES
(1, 'Jaime Garzon', 324234, 'carrera 79# 19A-37', 'jogan34343@gmail.com', 'Cigarreria San Marcos', 'Nos da productos de Bavaria'),
(2, 'Don Alfons', 2147483647, '', '', 'Señor de la casa', 'Esta cobrando el arriendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(22) COLLATE utf8_spanish_ci NOT NULL,
  `clave2` varchar(22) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `fechaNacimiento`, `usuario`, `clave`, `clave2`) VALUES
(31, 'johan', 'peralta', 'jogan34343@gmail.com', '2018-05-08', 'peraltica', '123', '123'),
(32, 'santiago', 'garzon', 'garzon@gmail.com', '2018-05-07', 'zato', '123', '123'),
(34, 'Edilberto', 'Peralta', 'dilbertoep@hotmail.com', '1959-11-29', 'edilberto', '123', '123'),
(35, 'jenny', 'Peralta', 'sadsds@zds', '2018-05-09', 'jperalta', '123', '123'),
(36, 'fds', 'sdfsdf', 'dfds@sadsa', '2018-06-21', 'holiwis', '321', '321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `fecha`, `total`) VALUES
(4, '2018-06-10 14:11:33', 200),
(5, '2018-06-10 14:25:32', 2500),
(6, '2018-06-10 14:31:48', 1500),
(24, '2018-06-11 22:36:03', 2500),
(25, '2018-06-12 00:09:57', 50000),
(26, '2018-06-13 09:52:31', 294000),
(27, '2018-06-13 09:54:13', 36000),
(28, '2018-06-13 09:59:44', 24000),
(29, '2018-06-13 10:01:54', 8000),
(30, '2018-06-13 10:10:17', 52000),
(31, '2018-06-13 10:16:16', 36000),
(32, '2018-06-13 10:26:15', 9000),
(33, '2018-06-13 10:28:31', 2000),
(34, '2018-06-18 08:51:37', 2000),
(35, '2018-06-18 09:27:20', 275000),
(36, '2018-06-19 16:30:33', 1900),
(37, '2021-05-26 07:29:30', 30000),
(38, '2021-05-31 19:01:52', 87900),
(39, '2021-05-31 19:18:10', 300000);

-- --------------------------------------------------------

--
-- Estructura para la vista `getproductos`
--
DROP TABLE IF EXISTS `getproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getproductos`  AS SELECT `producto`.`id` AS `id`, `producto`.`nombre` AS `nombre`, `producto`.`precio` AS `precio`, `producto`.`stock` AS `stock` FROM `producto` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getventas`
--
DROP TABLE IF EXISTS `getventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getventas`  AS SELECT `venta`.`id` AS `id`, `venta`.`fecha` AS `fecha`, `venta`.`total` AS `total` FROM `venta` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientesm`
--
ALTER TABLE `clientesm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturacliente`
--
ALTER TABLE `facturacliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reUsuario` (`usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientesm`
--
ALTER TABLE `clientesm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `facturacliente`
--
ALTER TABLE `facturacliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
