-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-09-2021 a las 21:47:56
-- Versión del servidor: 10.6.4-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbacta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta`
--

CREATE TABLE `acta` (
  `idacta` int(11) NOT NULL,
  `fecha_realizacion_acta` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_finalizacion` time DEFAULT NULL,
  `asunto` varchar(45) COLLATE utf8mb3_bin NOT NULL,
  `descripcion` varchar(45) COLLATE utf8mb3_bin DEFAULT NULL,
  `estado` varchar(25) COLLATE utf8mb3_bin NOT NULL DEFAULT 'Pendiente',
  `id_creador_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `idasistentes` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb3_bin NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb3_bin NOT NULL,
  `correo` varchar(45) COLLATE utf8mb3_bin NOT NULL,
  `lista_asistente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromisos`
--

CREATE TABLE `compromisos` (
  `idcompromisos` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE utf8mb3_bin NOT NULL,
  `responsable` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `estado` varchar(20) COLLATE utf8mb3_bin NOT NULL,
  `lista_compromisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creacion_acta`
--

CREATE TABLE `creacion_acta` (
  `facultad_idfacultad` int(11) DEFAULT NULL,
  `acta_idacta` int(11) NOT NULL,
  `programa_idprograma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `idfacultad` int(11) NOT NULL,
  `nombre` varchar(95) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idfacultad`, `nombre`) VALUES
(1, 'Facultad de Ingeniería'),
(2, 'Ciencias Básicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idprograma` int(11) NOT NULL,
  `nombre` varchar(96) COLLATE utf8mb3_bin NOT NULL,
  `idfacultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idprograma`, `nombre`, `idfacultad`) VALUES
(1, 'Ingeniería de Sistemas y Telecomunicaciones', 1),
(2, 'Ingeniería Mecánica', 1),
(3, 'Ingeniería de Alimentos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`) VALUES
(1, 'creador'),
(2, 'observador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb3_bin NOT NULL,
  `apellido` text COLLATE utf8mb3_bin NOT NULL,
  `contrasena` text COLLATE utf8mb3_bin NOT NULL,
  `correo` varchar(45) COLLATE utf8mb3_bin NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `cedula`, `nombre`, `apellido`, `contrasena`, `correo`, `id_programa`, `id_rol`) VALUES
(5, 78023745, 'Isabela', 'Espitia Páez', '1234567  ', 'issparkyfly@mail.com', 2, 2),
(8, 57882312, 'Manolo Dionisio', 'Herrera Espinosa', 'manolitorrrr12345 ', 'elmasmalote77@mail.com', 3, 2),
(10, 1193081254, 'Juan Pablo', 'Jiménez Díaz', 'loquendo023@', 'juanj459a@gmail.com', 1, 1),
(17, 12312313, 'Brons Jr.', 'Februcci', 'aaaaaaaaaaaaaaaaa99    ', 'CompadreSirvameUnTrago@mail.com', 1, 2),
(21, 1, '1', '1', '1', '1@mail.com', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta`
--
ALTER TABLE `acta`
  ADD PRIMARY KEY (`idacta`),
  ADD KEY `id_creador_usuario_idx` (`id_creador_usuario`);

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`idasistentes`),
  ADD KEY `lista_asistente_idx` (`lista_asistente`);

--
-- Indices de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD PRIMARY KEY (`idcompromisos`),
  ADD KEY `responsable_idx` (`responsable`),
  ADD KEY `lista_compromisos_idx` (`lista_compromisos`);

--
-- Indices de la tabla `creacion_acta`
--
ALTER TABLE `creacion_acta`
  ADD PRIMARY KEY (`acta_idacta`),
  ADD KEY `fk_facultad_has_acta_acta1_idx` (`acta_idacta`),
  ADD KEY `fk_facultad_has_acta_facultad1_idx` (`facultad_idfacultad`),
  ADD KEY `programa_idprograma_idx` (`programa_idprograma`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`idfacultad`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idprograma`),
  ADD KEY `idfacultad_idx` (`idfacultad`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `id_programa_idx` (`id_programa`),
  ADD KEY `idrol_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta`
--
ALTER TABLE `acta`
  MODIFY `idacta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  MODIFY `idasistentes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  MODIFY `idcompromisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `idfacultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `idprograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta`
--
ALTER TABLE `acta`
  ADD CONSTRAINT `id_creador_usuario` FOREIGN KEY (`id_creador_usuario`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD CONSTRAINT `lista_asistente` FOREIGN KEY (`lista_asistente`) REFERENCES `acta` (`idacta`);

--
-- Filtros para la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD CONSTRAINT `lista_compromisos` FOREIGN KEY (`lista_compromisos`) REFERENCES `acta` (`idacta`),
  ADD CONSTRAINT `responsable` FOREIGN KEY (`responsable`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `creacion_acta`
--
ALTER TABLE `creacion_acta`
  ADD CONSTRAINT `fk_facultad_has_acta_acta1` FOREIGN KEY (`acta_idacta`) REFERENCES `acta` (`idacta`),
  ADD CONSTRAINT `fk_facultad_has_acta_facultad1` FOREIGN KEY (`facultad_idfacultad`) REFERENCES `facultad` (`idfacultad`),
  ADD CONSTRAINT `programa_idprograma` FOREIGN KEY (`programa_idprograma`) REFERENCES `programa` (`idprograma`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `idfacultad` FOREIGN KEY (`idfacultad`) REFERENCES `facultad` (`idfacultad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_programa` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`idprograma`),
  ADD CONSTRAINT `idrol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
