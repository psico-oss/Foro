-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2021 a las 17:14:47
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phplogin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discusiones`
--

CREATE TABLE `discusiones` (
  `iddiscusiones` int(5) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discusiones`
--

INSERT INTO `discusiones` (`iddiscusiones`, `titulo`, `descripcion`) VALUES
(1, 'existen los ovnis?', 'si o no ? por favor, tengo miedo!'),
(2, 'existe los marcianos verdes?', 'si o no ?'),
(5, 'Tengo un gato duende en casa', 'Hola vengo a pedir ayuda, tengo un gato que me rompe las cosas con sus subordinados duendecillos. Consejos ?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discusioness`
--

CREATE TABLE `discusioness` (
  `iddiscusiones` int(5) NOT NULL,
  `idusuarios` int(100) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discusioness`
--

INSERT INTO `discusioness` (`iddiscusiones`, `idusuarios`, `autor`, `titulo`, `descripcion`) VALUES
(6, 3, 'nosequeponer', 'vale la pena estudiar mucho?', 'Hmm tengo esa duda ayuda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idrespuestas` int(5) NOT NULL,
  `iddiscusiones` int(5) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `respuesta` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idrespuestas`, `iddiscusiones`, `autor`, `respuesta`) VALUES
(1, 4, 'nosequeponer', 'hola soy una respuesta aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(2, 4, 'nosequeponer', 'holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `Nombre`, `Correo`, `Usuario`, `Password`) VALUES
(1, 'Joel', 'jpaz68084@gmail.com', 'kahari', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'violeta', 'sanchez@gmail.com', 'v10l3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'joel esteban paz', 'paz.joel@tecnica7.edu.ar', 'nosequeponer', '34f9d1fb7a5d16fa65f68eca1b3fa8c03d6e288c');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `discusiones`
--
ALTER TABLE `discusiones`
  ADD PRIMARY KEY (`iddiscusiones`);

--
-- Indices de la tabla `discusioness`
--
ALTER TABLE `discusioness`
  ADD PRIMARY KEY (`iddiscusiones`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idrespuestas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `discusiones`
--
ALTER TABLE `discusiones`
  MODIFY `iddiscusiones` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `discusioness`
--
ALTER TABLE `discusioness`
  MODIFY `iddiscusiones` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idrespuestas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
