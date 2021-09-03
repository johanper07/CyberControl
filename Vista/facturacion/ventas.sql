-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2018 a las 20:35:31
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearDetalle` (`id_producto` INT, `cant_producto` INT, `sub_total` INT)  BEGIN 
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
(1, 1, 1, 7, 700),
(2, 1, 2, 5, 1000),
(3, 1, 3, 5, 1500),
(4, 2, 1, 1, 100),
(5, 2, 4, 20, 8000);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getproductos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `getproductos` (
`id` int(11)
,`nombre` varchar(100)
,`precio` int(11)
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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `stock`) VALUES
(1, 'Leche', 100, 2),
(2, 'Dulce de leche', 200, 15),
(3, 'Sal', 300, 25),
(4, 'Pimienta', 400, 20),
(5, 'Orégano', 500, 50);

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
(1, '2018-06-05 13:34:08', 3200),
(2, '2018-06-05 13:34:46', 8100);

-- --------------------------------------------------------

--
-- Estructura para la vista `getproductos`
--
DROP TABLE IF EXISTS `getproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getproductos`  AS  select `producto`.`id` AS `id`,`producto`.`nombre` AS `nombre`,`producto`.`precio` AS `precio`,`producto`.`stock` AS `stock` from `producto` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getventas`
--
DROP TABLE IF EXISTS `getventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getventas`  AS  select `venta`.`id` AS `id`,`venta`.`fecha` AS `fecha`,`venta`.`total` AS `total` from `venta` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
