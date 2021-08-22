-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2018 a las 01:48:46
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpgn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `nombre`) VALUES
(1, 'Licenciado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_audiencia`
--

CREATE TABLE `estado_audiencia` (
  `idestado_audiencia` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_audiencia`
--

INSERT INTO `estado_audiencia` (`idestado_audiencia`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Proceso'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente_audiencia`
--

CREATE TABLE `expediente_audiencia` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idtipo_audiencia` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `resolucion` varchar(250) DEFAULT NULL,
  `idjuzgado` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juzgado`
--

CREATE TABLE `juzgado` (
  `idjuzgado` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'administrar'),
(2, 'seguridad'),
(3, 'calendario'),
(4, 'consultas'),
(5, 'reportes'),
(6, 'actualizar'),
(7, 'borrar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE `permiso_usuario` (
  `idpermiso_usuario` int(11) NOT NULL,
  `idpermiso_fk` int(11) NOT NULL,
  `idusuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso_usuario`
--

INSERT INTO `permiso_usuario` (`idpermiso_usuario`, `idpermiso_fk`, `idusuario_fk`) VALUES
(216, 1, 1),
(217, 2, 1),
(218, 3, 1),
(219, 4, 1),
(220, 5, 1),
(221, 6, 1),
(222, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_audiencia`
--

CREATE TABLE `tipo_audiencia` (
  `idtipo_audiencia` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idcargo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT '1',
  `profesional` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idcargo`, `nombre`, `apellido`, `telefono`, `login`, `clave`, `condicion`, `profesional`) VALUES
(1, 1, 'Walter Noé', 'Portillo Reyes', '', 'noe', 'alBKTkhLeTF2aytBM3N0cjFpNi9mQT09', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `estado_audiencia`
--
ALTER TABLE `estado_audiencia`
  ADD PRIMARY KEY (`idestado_audiencia`);

--
-- Indices de la tabla `expediente_audiencia`
--
ALTER TABLE `expediente_audiencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_expediente_usuario_idx` (`idusuario`),
  ADD KEY `fk_expediente_audiencia_idx` (`idtipo_audiencia`),
  ADD KEY `fk_expediente_estado_idx` (`idestado`),
  ADD KEY `fk_expediente_juzgado_idx` (`idjuzgado`);

--
-- Indices de la tabla `juzgado`
--
ALTER TABLE `juzgado`
  ADD PRIMARY KEY (`idjuzgado`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD PRIMARY KEY (`idpermiso_usuario`),
  ADD KEY `fk_permisousuario_permiso_idx` (`idpermiso_fk`),
  ADD KEY `fk_permisousuario_usuario_idx` (`idusuario_fk`);

--
-- Indices de la tabla `tipo_audiencia`
--
ALTER TABLE `tipo_audiencia`
  ADD PRIMARY KEY (`idtipo_audiencia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD KEY `fk_usuario_cargo_idx` (`idcargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado_audiencia`
--
ALTER TABLE `estado_audiencia`
  MODIFY `idestado_audiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `expediente_audiencia`
--
ALTER TABLE `expediente_audiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `juzgado`
--
ALTER TABLE `juzgado`
  MODIFY `idjuzgado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  MODIFY `idpermiso_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de la tabla `tipo_audiencia`
--
ALTER TABLE `tipo_audiencia`
  MODIFY `idtipo_audiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expediente_audiencia`
--
ALTER TABLE `expediente_audiencia`
  ADD CONSTRAINT `fk_expediente_audiencia` FOREIGN KEY (`idtipo_audiencia`) REFERENCES `tipo_audiencia` (`idtipo_audiencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expediente_estado` FOREIGN KEY (`idestado`) REFERENCES `estado_audiencia` (`idestado_audiencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expediente_juzgado` FOREIGN KEY (`idjuzgado`) REFERENCES `juzgado` (`idjuzgado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expediente_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD CONSTRAINT `fk_permisousuario_permiso` FOREIGN KEY (`idpermiso_fk`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisousuario_usuario` FOREIGN KEY (`idusuario_fk`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cargo` FOREIGN KEY (`idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
