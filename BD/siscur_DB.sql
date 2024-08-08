-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 07:45:10
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siscur`
--
CREATE DATABASE IF NOT EXISTS `siscur` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siscur`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(10) NOT NULL,
  `nombre_curso` varchar(50) NOT NULL,
  `categoria_curso` varchar(50) NOT NULL,
  `status_curso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `categoria_curso`, `status_curso`) VALUES
(1, 'Scratch', 'TECNOLOGIA', ''),
(2, 'ProducciÃ³n de Cacao', 'AGRICULTURA', ''),
(3, 'ProducciÃ³n de Leguminosas', 'AGRICULTURA', ''),
(4, 'Caldo Sulfocalcico ', 'AGRICULTURA', ''),
(5, 'Linux', 'TECNOLOGIA', ''),
(6, 'Fases Lunares y su Influencia en la Agroalimen.', 'COSECHA', ''),
(7, 'Sistema Solar Mediante el uso Planetario', 'ASTRONOMIA', ''),
(8, 'Caldo de Cenizas', 'AGRICULTURA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `n_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `n_estado`) VALUES
(1, 'Amazonas'),
(2, 'AnzoÃ¡tegui'),
(3, 'Apure'),
(4, 'Aragua'),
(5, 'Barinas'),
(6, 'Bolivar'),
(7, 'Carabobo'),
(8, 'Cojedes'),
(9, 'Delta Amacuro'),
(11, 'Distrito Federal'),
(12, 'FalcÃ³n'),
(13, 'GuÃ¡rico'),
(14, 'Lara'),
(15, 'MÃ©rida'),
(16, 'Miranda'),
(17, 'Monagas'),
(18, 'Nueva Esparta'),
(19, 'Portuguesa'),
(20, ' Sucre'),
(21, 'TÃ¡chira'),
(22, 'Trujillo'),
(23, 'Vargas'),
(24, 'Yaracuy'),
(25, 'Zulia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_academica`
--

CREATE TABLE `informacion_academica` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `archivo` varchar(250) NOT NULL,
  `fecha_envio` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informacion_academica`
--

INSERT INTO `informacion_academica` (`id`, `id_curso`, `id_persona`, `archivo`, `fecha_envio`, `estado`) VALUES
(1, 1, 8, 'Resumen.pdf', '2023-11-28', 'ACEPTADA'),
(2, 5, 9, 'Modelo de Resumen.pdf', '2023-11-28', 'ACEPTADA'),
(3, 4, 10, 'Resumen.pdf', '2023-11-28', 'ACEPTADA'),
(4, 8, 12, 'Modelo de Resumen.pdf', '2023-11-28', 'ACEPTADA'),
(5, 3, 13, 'Resumen.pdf', '2023-11-28', 'ACEPTADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE `inscritos` (
  `id_inscripcion` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_planificacion` int(11) NOT NULL,
  `fecha_inscripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(30) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `municipio`, `estado`) VALUES
(5, 'San Felipe', 24),
(6, 'Independecia', 24),
(7, 'Cocorote', 24),
(8, 'Barquisimeto', 14),
(9, ' Iribarren', 14),
(10, 'Veroes', 24),
(11, 'bolivar', 24),
(12, 'urachiche', 24),
(13, 'nirgua', 24),
(14, 'Manuel Monge', 24),
(16, 'Jose Antonio Paez', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parroquia` int(10) NOT NULL,
  `n_parroquia` varchar(50) NOT NULL,
  `n_municipio` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parroquia`, `n_parroquia`, `n_municipio`) VALUES
(1, 'San Felipe', 5),
(2, 'ALBARICO', 5),
(3, 'SAN JAVIER - MARIN', 5),
(4, 'SALOM', 13),
(5, 'TEMERLA', 13),
(6, 'CM. NIRGUA', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `cedula` varchar(13) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `seg_nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `seg_apellido` varchar(60) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `parroquia` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `cedula_rep` varchar(15) NOT NULL,
  `nombre_rep` varchar(50) NOT NULL,
  `apellido_rep` varchar(50) NOT NULL,
  `telefono_rep` varchar(50) NOT NULL,
  `fecha_inc` date NOT NULL,
  `correo_verificado` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `nombre`, `seg_nombre`, `apellido`, `seg_apellido`, `telefono`, `sexo`, `usuario`, `clave`, `correo`, `fecha_nac`, `parroquia`, `direccion`, `id_rol`, `cedula_rep`, `nombre_rep`, `apellido_rep`, `telefono_rep`, `fecha_inc`, `correo_verificado`, `codigo`) VALUES
(2, '', 'admin', '', '', '', '', '', 'admin', 'admin', '', '0000-00-00', 2, '', 1, '', '', '', '', '0000-00-00', 1, ''),
(8, '275229570', 'JosuÃ© ', 'nnnn', 'OrdoÃ±ez', 'nnnn', '04121122111', 'M', 'josue', '12345', 'josue@gmail.com', '1999-06-28', 1, 'nnnn', 2, '', '', '', '', '0000-00-00', 1, ''),
(9, '14799089', 'Erika', 'mmmmm', 'PeÃ±a', 'mmmmm', '041234456', 'F', 'erika', 'erika123', 'erika@gmail.com', '1992-06-17', 1, 'sdsds', 2, '', '', '', '', '0000-00-00', 1, ''),
(10, '28047562', 'Rosmerys ', 'Maria', 'Gomez', 'Mendez', '01612223232', 'F', 'mendez', '9876', 'mendez@gmail.com', '1998-02-28', 1, 'nnnn', 2, '', '', '', '', '0000-00-00', 1, ''),
(11, '27379505', 'Angelin', 'nnnn', 'Mendoza ', 'nnn', '04125412516', 'F', 'mendoza', '12345', 'mendozaa@gmail.com', '1998-10-14', 2, 'dddd', 2, '', '', '', '', '0000-00-00', 0, ''),
(12, '1234534567', 'ING Soynelys', 'nnn', 'Gomez', 'nn', '042837283', 'F', 'soyne', '123456', 'soyne@gmail.com', '1996-02-22', 1, 'njnjk', 2, '', '', '', '', '0000-00-00', 0, ''),
(13, '87238782732', 'Carlos', 'nnnn', 'Chirino', 'nn', '1234567', 'F', 'Carlos', '123456', 'chiri@gmail.com', '1991-06-05', 1, 'kjk', 2, '', '', '', '', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE `planificacion` (
  `id_plani` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `statuss` varchar(50) NOT NULL,
  `razon` varchar(250) NOT NULL,
  `cupo` varchar(3) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `dias_semana` varchar(10) NOT NULL,
  `facilitador` int(60) NOT NULL,
  `fecha_envio` varchar(50) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `objetivos` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planificacion`
--

INSERT INTO `planificacion` (`id_plani`, `curso`, `statuss`, `razon`, `cupo`, `fecha_inicio`, `fecha_cierre`, `dias_semana`, `facilitador`, `fecha_envio`, `imagen`, `descripcion`, `objetivos`) VALUES
(1, 1, 'Activo', '', '30', '2023-11-28', '2023-12-10', '6', 8, '', '', 'nn', 'nn'),
(2, 4, 'Activo', '', '40', '2023-11-28', '2023-12-10', '5', 10, '', '', 'SoluciÃ³n agrÃ­cola enriquecida con azufre y calcio para mejorar la salud de los cultivos.', 'Optimizar el crecimiento y resistencia de las plantas, corrigiendo deficiencias de nutrientes y fortaleciendo la producciÃ³n agrÃ­cola con Caldo Sulfocalcico.'),
(3, 5, 'Activo', '', '20', '2023-11-28', '2023-12-10', '6', 9, '', '', 'Curso Linux: Explora el sistema operativo de cÃ³digo abierto lÃ­der para potenciar tus habilidades informÃ¡ticas.', 'Dominar la administraciÃ³n, comandos y seguridad en Linux para impulsar eficiencia, desarrollo y gestiÃ³n de sistemas informÃ¡ticos avanzados.'),
(4, 8, 'Activo', '', '20', '2023-11-28', '2023-12-10', '3', 12, '', '', 'Fertilizante natural para potenciar el crecimiento y salud de las plantas con nutrientes esenciales.', 'Optimizar la calidad del suelo, proporcionar nutrientes vitales y mejorar la productividad agrÃ­cola mediante el uso eficaz del caldo de cenizas.'),
(5, 3, 'Activo', '', '20', '2023-11-29', '2023-12-10', '4', 13, '', '', 'Curso prÃ¡ctico para impulsar la eficiencia y rendimiento en el cultivo de leguminosas.', 'Aprender tÃ©cnicas avanzadas de siembra, cuidado y cosecha de leguminosas, promoviendo una producciÃ³n sostenible y de alta calidad en la agricultura.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'facilitador'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_persona`, `usuario`, `clave`) VALUES
(4, 0, 'ff', '123'),
(5, 0, 'FelixProfe', '1234567'),
(6, 0, 'jjj', 'bbb'),
(7, 0, 'Felix', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `informacion_academica`
--
ALTER TABLE `informacion_academica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `id_planificacion` (`id_planificacion`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parroquia`),
  ADD KEY `n_municipio` (`n_municipio`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parroqua` (`parroquia`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`id_plani`),
  ADD KEY `curso` (`curso`),
  ADD KEY `facilitador` (`facilitador`),
  ADD KEY `curso_2` (`curso`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `informacion_academica`
--
ALTER TABLE `informacion_academica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id_parroquia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  MODIFY `id_plani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informacion_academica`
--
ALTER TABLE `informacion_academica`
  ADD CONSTRAINT `informacion_academica_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `informacion_academica_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `inscritos_ibfk_2` FOREIGN KEY (`id_planificacion`) REFERENCES `planificacion` (`id_plani`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`n_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`parroquia`) REFERENCES `parroquia` (`id_parroquia`);

--
-- Filtros para la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD CONSTRAINT `planificacion_ibfk_3` FOREIGN KEY (`facilitador`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `planificacion_ibfk_4` FOREIGN KEY (`curso`) REFERENCES `curso` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
