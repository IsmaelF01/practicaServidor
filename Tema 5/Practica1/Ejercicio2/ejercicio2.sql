-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2020 a las 20:27:20
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
-- Base de datos: `ejercicio2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegaciam`
--

CREATE TABLE `juegaciam` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `oro` int(11) NOT NULL,
  `madera` int(11) NOT NULL,
  `comida` int(11) NOT NULL,
  `marmol` int(11) NOT NULL,
  `cuarteles` int(11) NOT NULL,
  `templos` int(11) NOT NULL,
  `huertos` int(11) NOT NULL,
  `aserraderos` int(11) NOT NULL,
  `mercados` int(11) NOT NULL,
  `canteras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `gmail` varchar(20) NOT NULL,
  `contra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `gmail`, `contra`) VALUES
(1, 'AtomixXf', 'ismaelfloressanchez@', '1234'),
(2, 'Diego', 'diego@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegaciam`
--
ALTER TABLE `juegaciam`
  ADD PRIMARY KEY (`id`,`user`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegaciam`
--
ALTER TABLE `juegaciam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegaciam`
--
ALTER TABLE `juegaciam`
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
