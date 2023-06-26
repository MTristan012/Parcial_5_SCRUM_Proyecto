-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2023 a las 20:10:32
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
-- Estructura de tabla para la tabla `universitycursos`
--

CREATE TABLE `universitycursos` (
  `clase` varchar(200) NOT NULL,
  `maestro` varchar(200) NOT NULL,
  `id` int(200) NOT NULL,
  `alumnos` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universitycursos`
--

INSERT INTO `universitycursos` (`clase`, `maestro`, `id`, `alumnos`) VALUES
('Biologia', 'Tristan', 1, 1);

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
(2, 'maestro@maestro', 'maestro', 2, 1, 'Tristan', 'Doctores 247', '1995-01-18', 'Biologia', NULL),
(3, 'alumno@alumno', 'alumno', 3, 1, 'Michel', 'A las Montañas 247', '1995-01-18', NULL, 2015107);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `universitycursos`
--
ALTER TABLE `universitycursos`
  ADD PRIMARY KEY (`clase`);

--
-- Indices de la tabla `universityusers`
--
ALTER TABLE `universityusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `universityusers`
--
ALTER TABLE `universityusers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
