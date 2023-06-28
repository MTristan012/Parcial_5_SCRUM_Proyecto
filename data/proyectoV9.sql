-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2023 a las 21:13:58
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universityassigments`
--

CREATE TABLE `universityassigments` (
  `id` int(200) NOT NULL,
  `materia` varchar(200) NOT NULL,
  `tarea` longblob DEFAULT NULL,
  `examen` longblob DEFAULT NULL,
  `nombreMaestro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universitycursos`
--

CREATE TABLE `universitycursos` (
  `id` int(200) NOT NULL,
  `clase` varchar(200) NOT NULL,
  `maestro` varchar(200) DEFAULT NULL,
  `alumnos` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universitycursos`
--

INSERT INTO `universitycursos` (`id`, `clase`, `maestro`, `alumnos`) VALUES
(1, 'Biologia', 'Leman Russ', 1),
(2, 'Geometria', 'Maestro Formal', NULL),
(4, 'Historia', 'Tristan Perea', NULL),
(5, 'Programacion', NULL, NULL),
(6, 'Musica', 'Horus Lupercal', NULL),
(10, 'Magia', 'John Doe', NULL),
(11, 'Ingles', 'Dante Auditore', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universitygrades`
--

CREATE TABLE `universitygrades` (
  `id` int(200) NOT NULL,
  `tareaSubida` longblob NOT NULL,
  `idAlumno` int(200) NOT NULL,
  `nombreAlumno` varchar(200) NOT NULL,
  `calificacion` varchar(200) DEFAULT NULL,
  `materia` varchar(200) DEFAULT NULL,
  `nombreMaestro` varchar(200) DEFAULT NULL,
  `idMaestro` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universityinscriptions`
--

CREATE TABLE `universityinscriptions` (
  `id` int(200) NOT NULL,
  `idAlumno` int(200) NOT NULL,
  `idClase` int(200) NOT NULL,
  `nombreClase` varchar(200) NOT NULL,
  `nombreAlumno` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universityinscriptions`
--

INSERT INTO `universityinscriptions` (`id`, `idAlumno`, `idClase`, `nombreClase`, `nombreAlumno`) VALUES
(9, 3, 11, 'Ingles', 'Michel'),
(10, 7, 11, 'Ingles', 'Moon Doe Au'),
(11, 16, 11, 'Ingles', 'Eltharion Yvress');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universityusers`
--

CREATE TABLE `universityusers` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `permiso` int(200) NOT NULL,
  `estado` int(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fechaDeNacimiento` date DEFAULT NULL,
  `claseAsignada` varchar(200) DEFAULT NULL,
  `dni` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universityusers`
--

INSERT INTO `universityusers` (`id`, `email`, `password`, `permiso`, `estado`, `nombre`, `direccion`, `fechaDeNacimiento`, `claseAsignada`, `dni`) VALUES
(1, 'admin@admin', 'admin', 1, 1, 'Administrador', NULL, NULL, NULL, NULL),
(2, 'maestro@maestro', 'maestro', 2, 1, 'Tristan Perea', 'Doctores 247', '1995-01-18', 'Historia', NULL),
(3, 'alumno@alumno', 'alumno', 3, 1, 'Michel', 'A las Montañas 247', '1995-01-18', NULL, 2015107),
(7, 'student@alumno', 'alumno', 3, 1, 'Moon Doe Au', 'Zapopan', '2023-06-07', NULL, 100048533),
(8, 'professor@maestro', 'maestro', 2, 1, 'Leman Russ', 'Fenris Planent', '2023-06-07', 'Biologia', NULL),
(9, 'teacher@maestro', 'maestro', 2, 1, 'John Doe', 'Jalisco', '2023-06-06', 'Magia', NULL),
(10, 'lehrer@maestro', 'maestro', 2, 1, 'Dante Auditore', 'DMC', '2023-05-30', 'Ingles', NULL),
(11, 'master@maestro', 'maestro', 2, 1, 'Horus Lupercal', 'Prospero Planet', '2023-05-07', 'Musica', NULL),
(14, 'alumnoprueba@alumno', 'alumno', 3, 1, 'prueba alumno', 'Cerca de aqui', '2023-06-15', NULL, 10004851),
(15, 'maestroprueba@maestro', 'maestro', 2, 1, 'Maestro Formal', 'lejos de aqui, muy lejos', '2023-06-08', 'Geometria', NULL),
(16, 'estudante@alumno', 'alumno', 3, 1, 'Eltharion Yvress', 'Ulthuan', '2013-02-27', NULL, 1565649466);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `universityassigments`
--
ALTER TABLE `universityassigments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universitycursos`
--
ALTER TABLE `universitycursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universitygrades`
--
ALTER TABLE `universitygrades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universityinscriptions`
--
ALTER TABLE `universityinscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universityusers`
--
ALTER TABLE `universityusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `universityassigments`
--
ALTER TABLE `universityassigments`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `universitycursos`
--
ALTER TABLE `universitycursos`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `universitygrades`
--
ALTER TABLE `universitygrades`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `universityinscriptions`
--
ALTER TABLE `universityinscriptions`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `universityusers`
--
ALTER TABLE `universityusers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
