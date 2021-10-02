-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-10-2021 a las 12:57:42
-- Versión del servidor: 10.3.27-MariaDB-log
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smgsys6_smg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido_pat` text NOT NULL,
  `apellido_mat` text NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Id`, `nombre`, `apellido_pat`, `apellido_mat`, `activo`) VALUES
(1, 'Jesus Betuel', 'Garza', 'Sendejo', 1);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `cve_persona` int(11) NOT NULL,
  `correo` text NOT NULL,
  `password` text NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `cve_persona`, `correo`, `password`, `activo`) VALUES
(1, 1, 'jesus.betuel@gmail.com', '9bf8aa667c605922b49278c37bea9b50', 1);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_inventario`
--

CREATE TABLE `vehiculos_inventario` (
  `Id` int(11) NOT NULL,
  `fecha_captura` date NOT NULL,
  `tipo_vehiculo` int(11) NOT NULL,
  `descripcion_vehiculo` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `descripcion_general` varchar(250) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos_inventario`
--

INSERT INTO `vehiculos_inventario` (`Id`, `fecha_captura`, `tipo_vehiculo`, `descripcion_vehiculo`, `modelo`, `descripcion_general`, `activo`) VALUES
(1, '2021-10-01', 1, 2, 'Tsuru 2001', 'Color plateado', 1),
(2, '2021-10-02', 2, 6, 'Italika', 'Color negro', 1),
(3, '2021-10-03', 1, 3, 'Dodge Journey', 'Color metalico', 1),
(4, '2021-10-04', 2, 5, 'Italika 2', 'Color negro', 1),
(5, '2021-10-02', 1, 1, 'Bora 2010', 'Color plateado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_llanta_motor`
--

CREATE TABLE `vehiculos_llanta_motor` (
  `Id` int(11) NOT NULL,
  `id_tipo_vehiculo` int(11) NOT NULL,
  `no_llantas` varchar(15) NOT NULL,
  `no_motor` varchar(10) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos_llanta_motor`
--

INSERT INTO `vehiculos_llanta_motor` (`Id`, `id_tipo_vehiculo`, `no_llantas`, `no_motor`, `activo`) VALUES
(1, 1, '4 llantas', 'Motor 2.0', 1),
(2, 1, '4 llantas', 'Motor 3.0', 1),
(3, 1, '4 llantas', 'Motor 4.0', 1),
(4, 2, '2 llantas', 'Motor 1.2', 1),
(5, 2, '2 llantas', 'Motor 1.5', 1),
(6, 2, '2 llantas', 'Motor 1.7', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_tipo`
--

CREATE TABLE `vehiculos_tipo` (
  `Id` int(11) NOT NULL,
  `tipo_vehiculo` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos_tipo`
--

INSERT INTO `vehiculos_tipo` (`Id`, `tipo_vehiculo`, `activo`) VALUES
(1, 'Sedan', 1),
(2, 'Motocicleta', 1);

--
-- Índices para tablas volcadas
--


--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `activo` (`activo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cve_persona` (`cve_persona`),
  ADD KEY `activo` (`activo`);

--
-- Indices de la tabla `vehiculos_inventario`
--
ALTER TABLE `vehiculos_inventario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fecha_captura` (`fecha_captura`),
  ADD KEY `tipo_vehiculo` (`tipo_vehiculo`),
  ADD KEY `descripcion_vehiculo` (`descripcion_vehiculo`),
  ADD KEY `activo` (`activo`);

--
-- Indices de la tabla `vehiculos_llanta_motor`
--
ALTER TABLE `vehiculos_llanta_motor`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`),
  ADD KEY `activo` (`activo`);

--
-- Indices de la tabla `vehiculos_tipo`
--
ALTER TABLE `vehiculos_tipo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `tipo_vehiculo` (`tipo_vehiculo`),
  ADD KEY `activo` (`activo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos_inventario`
--
ALTER TABLE `vehiculos_inventario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculos_llanta_motor`
--
ALTER TABLE `vehiculos_llanta_motor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vehiculos_tipo`
--
ALTER TABLE `vehiculos_tipo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
