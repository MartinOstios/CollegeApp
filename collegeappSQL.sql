-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2021 a las 03:01:59
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `collegeapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  `precio` int(11) NOT NULL,
  `duracion` varchar(64) NOT NULL,
  `imagen` varchar(64) DEFAULT 'imgs/nophoto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `id_usuario`, `nombre`, `descripcion`, `precio`, `duracion`, `imagen`) VALUES
(1, 1, 'Ingeniería Industrial', 'La ingeniería industrial es una profesión de ingeniería que se ocupa de la optimización de procesos, sistemas u organizaciones complejos mediante el desarrollo, la mejora y la implementación de sistemas integrados de personas, riqueza, conocimiento, información y equipamiento, energía, materiales y procesos.', 980000, '10 semestres', 'imgs/1628562654.png'),
(2, 2, 'Filosofía y letras', 'La Licenciatura en Filosofía busca la formación integral de profesionistas en el área de humanidades que sean capaces de analizar y examinar de forma argumentativa, temas de diversa índole (políticas, educativas, religiosas, científicas, artísticas, etc.)', 500000, '8 semestres', 'imgs/1628562748.png'),
(3, 2, 'Ingeniería de sistemas', 'La ingeniería de sistemas es un campo interdisciplinario de la ingeniería que permite estudiar y comprender la realidad, con el propósito de implementar u optimizar sistemas complejos.', 890000, '10 semestres', 'imgs/1628562824.png'),
(4, 2, 'Agronomía industrial', 'La agricultura industrial es aquella agricultura que se centra en la producción masiva de un solo producto pero lleva un alto nivel de tecnificación y necesita una alta inversión de capital, energía y otros recursos, requiriendo normalmente trabajo externo y ayuda de especialistas.', 1200000, '10 semestres', 'imgs/1628562892.png'),
(8, 1, 'CursoPrueba', 'asdasd', 150000, '5 semestres', 'imgs/1635653385.png'),
(15, 1, 'a', 'a', 1, '8 semestres', 'imgs/1638478820.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` bigint(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_curso` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_usuario`, `id_curso`, `fecha`) VALUES
(1, 7, 2, '2021-11-22 15:05:10'),
(2, 1, 2, '2021-11-28 22:20:58'),
(3, 5, 1, '2021-11-28 22:27:28'),
(4, 9, 2, '2021-11-29 14:45:34'),
(5, 5, 8, '2021-12-03 20:56:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` bigint(20) NOT NULL,
  `nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nombre`) VALUES
(1, 'usuarios'),
(2, 'cursos'),
(3, 'ventas'),
(4, 'inscripciones'),
(5, 'roles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` bigint(18) NOT NULL,
  `id_modulo` bigint(20) NOT NULL,
  `nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `id_modulo`, `nombre`) VALUES
(1, 1, 'create'),
(2, 1, 'read'),
(3, 1, 'update'),
(4, 1, 'delete'),
(5, 2, 'create'),
(6, 2, 'read'),
(7, 2, 'update'),
(8, 2, 'delete'),
(9, 3, 'read'),
(10, 4, 'read'),
(11, 2, 'comprar'),
(12, 5, 'read');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` bigint(20) NOT NULL,
  `nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Dueño'),
(4, 'Profesor'),
(5, 'prueba'),
(6, 'RolPrueba'),
(7, 'RoldePrueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id` bigint(20) NOT NULL,
  `id_rol` bigint(20) NOT NULL,
  `id_permiso` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id`, `id_rol`, `id_permiso`) VALUES
(1, 1, 1),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(11, 2, 6),
(12, 2, 11),
(13, 3, 2),
(14, 3, 6),
(15, 3, 9),
(16, 3, 10),
(17, 4, 2),
(18, 4, 5),
(19, 4, 6),
(20, 4, 7),
(21, 4, 10),
(23, 1, 12),
(27, 1, 3),
(28, 1, 4),
(31, 1, 9),
(32, 1, 10),
(34, 1, 2),
(35, 6, 1),
(36, 6, 2),
(37, 6, 3),
(38, 6, 4),
(39, 7, 1),
(40, 7, 2),
(41, 7, 3),
(42, 7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) NOT NULL,
  `id_rol` bigint(20) NOT NULL DEFAULT 2,
  `nombre` varchar(64) NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(64) NOT NULL,
  `telefono` varchar(32) NOT NULL,
  `contrasena` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `nombre`, `fecha_nac`, `correo`, `telefono`, `contrasena`) VALUES
(1, 1, 'Administrador', '0000-00-00', 'admin', '0001', 'admin'),
(2, 3, 'Zamantha Ceballos Arroyave', '0000-00-00', 'cualquiercosa@gmail.com', '3104853885', 'arepaconcemento'),
(3, 4, 'Alexander Loaiza Valencia', '0000-00-00', 'alexito@gmail.com', '3102566498', 'alex12'),
(4, 6, 'Juan Alejandro Henao', '0000-00-00', 'juanhenao192@gmail.com', '3186456231', 'enderman87787'),
(5, 2, 'Martin Ostios Arias', '0000-00-00', 'martin@gmail.com', '3042056970', 'martin'),
(6, 2, 'Juan Hernando Paez', '0000-00-00', 'juanhernando@gmail.com', '3204112230', 'juanhernando123'),
(7, 4, 'Carlos Amaya Castro', '0000-00-00', 'carlamaya150@hotmail.com', '3154203450', 'a'),
(9, 7, 'Manuel Serna', '0000-00-00', 'manuel@gmail.com', '3658932465', 'manuel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
