-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2019 a las 21:04:45
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anime`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `Id_bodega` varchar(10) NOT NULL,
  `Dept` varchar(15) NOT NULL,
  `Municipio` varchar(15) NOT NULL,
  `Tel` int(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`Id_bodega`, `Dept`, `Municipio`, `Tel`, `Direccion`) VALUES
('1', '1', '3', 3333, '3c3c3'),
('2', '2', '9', 22222, 'dwded'),
('5', '1', '4', 33333, 'ckll33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id_cli` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `N_Documento` varchar(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Tel` varchar(10) DEFAULT NULL,
  `Dir` varchar(50) DEFAULT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Id_usu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `Id_Devolucion` varchar(10) NOT NULL,
  `Id_Producto` varchar(10) NOT NULL,
  `Fecha_Devolu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Municipios`
--

CREATE TABLE `Municipios` (
  `id_municipio` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `Municipio` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Municipios`
--

INSERT INTO `Municipios` (`id_municipio`, `id_departamento`, `Municipio`) VALUES
(1, 1, 'Neiva'),
(2, 1, 'Rivera'),
(3, 1, 'Campoalegre'),
(4, 1, 'Hobo'),
(5, 1, 'Pitalito'),
(6, 1, 'La Plata'),
(7, 2, 'Ibague'),
(8, 2, 'Natagaima'),
(9, 2, 'Saldana'),
(10, 2, 'Castilla'),
(11, 2, 'Alvarado'),
(12, 2, 'Ataco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `Id_per_usu` varchar(10) NOT NULL,
  `Tipo_perfil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usu`
--

CREATE TABLE `perfil_usu` (
  `Id_tip_perfil_us` varchar(10) DEFAULT NULL,
  `Id_usu` varchar(10) DEFAULT NULL,
  `Id_per_usu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_producto` int(11) NOT NULL,
  `Cod_producto` int(11) DEFAULT NULL,
  `Valor_uni` int(11) DEFAULT NULL,
  `Costo` int(11) DEFAULT NULL,
  `Cantidad_llego` int(11) DEFAULT NULL,
  `Cantidad_actual` int(11) DEFAULT NULL,
  `Tipo_producto` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  `Tienda` varchar(10) DEFAULT NULL,
  `img` longblob DEFAULT NULL,
  `Id_usu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_producto`, `Cod_producto`, `Valor_uni`, `Costo`, `Cantidad_llego`, `Cantidad_actual`, `Tipo_producto`, `Descripcion`, `Tienda`, `img`, `Id_usu`) VALUES
(82, 1, 11, 11, 12, 11, 'aaa', '', 'NEIVA', NULL, NULL),
(83, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL),
(85, 2, 1000, 4500, 100, NULL, '14', 'Lamparas 9', '1', 0x756e646566696e6564, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `Id_tienda` varchar(10) NOT NULL,
  `Tienda` varchar(30) NOT NULL,
  `Dept` varchar(15) NOT NULL,
  `Municipios` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Tel` int(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Id_bodega` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`Id_tienda`, `Tienda`, `Dept`, `Municipios`, `Tel`, `Direccion`, `Id_bodega`) VALUES
('1', 'NEIVA', '1', '3', 315434, 'cll 12', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `Id_Producto` varchar(10) NOT NULL,
  `Tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`Id_Producto`, `Tipo`) VALUES
('1', 'VASO'),
('10', 'MANILLAS'),
('11', 'LINEA BEBES'),
('12', 'FIGURAS'),
('13', 'P.B.S'),
('14', 'LAMPARAS'),
('15', 'ESTUCHE'),
('16', 'ARETES'),
('17', 'BUZOS'),
('18', 'BOLSOS'),
('19', 'COJIN'),
('2', 'COLLARES'),
('20', 'NOTEBOOK'),
('21', 'BOOKMARK'),
('22', 'CARROS'),
('23', 'BILLETERAS'),
('24', 'LAPICEROS'),
('25', 'CARTUCHERAS'),
('26', 'CAMISETAS'),
('27', 'CARTAS-MAGIC'),
('28', 'CARTAS-POKEMON'),
('29', 'CARTAS YUGI-OH'),
('3', 'COLLARES RELOJ'),
('30', 'JUEGOS DE ROL'),
('31', 'COMIDA'),
('32', 'K-POP'),
('33', 'ACCESORIOS'),
('34', 'VIDEOJUEGO'),
('4', 'RELOJES'),
('5', 'PELUCHES'),
('6', 'LEGO'),
('7', 'LLAVEROS'),
('8', 'VESTIDO-MEDIAS'),
('9', 'GORRAS-GAFAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado`
--

CREATE TABLE `traslado` (
  `Id_traslado` varchar(10) NOT NULL,
  `Id_tienda_actual` varchar(10) NOT NULL,
  `Id_tienda_nueva` varchar(10) NOT NULL,
  `Id_producto` varchar(10) NOT NULL,
  `Fecha_traslado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usu` varchar(10) NOT NULL,
  `Nombre` text DEFAULT NULL,
  `Apell` text DEFAULT NULL,
  `usuario` varchar(40) NOT NULL,
  `psw` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usu`, `Nombre`, `Apell`, `usuario`, `psw`) VALUES
('1', 'usu1', 'Apell1', 'dino', '123456'),
('2', 'usu2', 'Apell2', 'dino', '654321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`Id_bodega`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_cli`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`Id_Devolucion`),
  ADD KEY `Id_Producto_2` (`Id_Producto`);

--
-- Indices de la tabla `Municipios`
--
ALTER TABLE `Municipios`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`Id_per_usu`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`Id_tienda`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`Id_Producto`);

--
-- Indices de la tabla `traslado`
--
ALTER TABLE `traslado`
  ADD PRIMARY KEY (`Id_traslado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT de la tabla `Municipios`
--
ALTER TABLE `Municipios`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
