-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 21:58:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--
CREATE DATABASE IF NOT EXISTS `examen` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `examen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE `calificaciones` (
  `id_calificaciones` int(11) NOT NULL,
  `id_estudiante` int(5) NOT NULL,
  `Materia` text NOT NULL,
  `Nota` float NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `calificaciones`:
--   `id_estudiante`
--       `estudiantes` -> `id_estudiante`
--

--
-- Truncar tablas antes de insertar `calificaciones`
--

TRUNCATE TABLE `calificaciones`;
--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificaciones`, `id_estudiante`, `Materia`, `Nota`, `Fecha`) VALUES
(2, 1, 'Inteligencia Artificial', 8, '2023-12-11'),
(4, 2, 'derecho penal', 9, '2023-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Edad` int(5) NOT NULL,
  `Curso` text NOT NULL,
  `GPA` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `estudiantes`:
--

--
-- Truncar tablas antes de insertar `estudiantes`
--

TRUNCATE TABLE `estudiantes`;
--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `Nombre`, `Edad`, `Curso`, `GPA`) VALUES
(1, 'Fabian', 37, 'Software', 8),
(2, 'Jenny', 34, 'Derecho', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `Usuarioid` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Cedula` varchar(11) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Rol` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Truncar tablas antes de insertar `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuarioid`, `Nombres`, `Apellidos`, `Cedula`, `Contrasenia`, `Correo`, `Rol`, `Telefono`) VALUES
(1, 'Josue', 'Yepez', '1002672929', 'joyep2000', 'joyep_2000@yahoo.com', 'Administrador', '0999223349');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificaciones`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuarioid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Usuarioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`) ON UPDATE CASCADE;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla calificaciones
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla estudiantes
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla usuarios
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la base de datos examen
--

--
-- Truncar tablas antes de insertar `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
--
-- Truncar tablas antes de insertar `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
--
-- Truncar tablas antes de insertar `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
--
-- Truncar tablas antes de insertar `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
