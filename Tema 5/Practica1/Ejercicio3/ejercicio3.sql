-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2020 a las 20:27:47
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBN` int(10) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `subtitulo` varchar(20) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `editorial` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `portada` varchar(200) NOT NULL,
  `totalEjem` int(20) NOT NULL,
  `disponiblesEjem` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBN`, `titulo`, `subtitulo`, `descripcion`, `autor`, `editorial`, `categoria`, `portada`, `totalEjem`, `disponiblesEjem`) VALUES
(987654321, 'don lijote de la can', 'viejo y sus molinos', 'un viejo con su fiel compañero en un mundo frantastico', 'Pedro', 'santander', 'historica', 'historia5.jpg', 1, 1),
(1234567890, 'Manual de Cocina', 'Conina Chicote', 'cocina con este libro y tendras recetas muy ricas y sabrosas', 'Chicote', 'santana', 'historica', 'cocina.jpg', 1, 1),
(2147483647, 'Futbolistico', 'Deporte de futbol', 'futbol de todas las partes', 'Willyrex', 'austral', 'novela', 'deporte.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `ISBN` int(13) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`ISBN`, `DNI`, `fechaini`, `fechafin`, `estado`) VALUES
(987654321, '78025774E', '2020-11-22', '2020-11-29', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `edad` int(2) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `poblacion` varchar(20) NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellidos`, `edad`, `direccion`, `poblacion`, `telefono`, `email`) VALUES
('78025774E', 'Ismael', 'Flores Sanchez', 19, 'Calle Amapola', 'Garrucha', 663867369, 'ismaelfloressanchez@gmail.com'),
('X9349480A', 'Candela', 'Vera', 18, 'Calle Alfonso XIII', 'Tu Padre', 674568912, 'cande??a.belu@gmail.es');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`ISBN`,`DNI`),
  ADD KEY `DNI` (`DNI`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `DNI` FOREIGN KEY (`DNI`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ISBN` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
