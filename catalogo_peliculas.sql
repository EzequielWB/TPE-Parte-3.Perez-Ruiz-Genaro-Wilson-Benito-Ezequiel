-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2024 a las 22:00:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo_peliculas`
--
CREATE DATABASE IF NOT EXISTS `catalogo_peliculas` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `catalogo_peliculas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`) VALUES
(1, 'Terror'),
(3, 'Accion'),
(4, 'Romance'),
(14, 'Genero de prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `director` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `director`, `descripcion`, `genero`) VALUES
(1, 'Accion Desenfrenada', 'Juan Acciones', 'Pelicula de Accion', 3),
(3, 'Amor desenfrenado', 'Alfedro Amoroso', 'Amor y amor', 4),
(4, 'Muerte frenetica', 'Manuel Federico', 'En esta pelicula podras encontrar mucha muerte', 3),
(9, 'Los gritos del bosque', 'Jorge Escalofríos', 'Un bosque donde los árboles gritan en la noche', 1),
(10, 'Risas inesperadas terrorificas', 'Sofía Alegre', 'Una serie de eventos hilarantes y fuera de control', 1),
(19, 'Fuerza de acero', 'Ana Férrea', 'Una agente secreta lucha contra una organización criminal', 3),
(20, 'El amor inesperado', 'Juan Corazón', 'Dos extraños que se enamoran durante un viaje', 4),
(21, 'Besos en París', 'Ana Romántica', 'Una historia de amor ambientada en la ciudad del amor', 4),
(25, 'Aventuras terrorificas', 'Marcos Diabolico', 'Terror sin fin', 1),
(26, 'Los secretos de la luna', 'Ana Lunática', 'Una historia mágica que se desarrolla en la luna', 4),
(27, 'Robo galáctico', 'Juan Extraterrestre', 'Un robo que trasciende las estrellas', 1),
(28, 'La guerra de los mundos', 'Carlos Intergaláctico', 'Una batalla épica entre planetas', 3),
(29, 'Cuentos de la noche', 'Pedro Nocturno', 'Historias aterradoras contadas bajo la luna', 1),
(31, 'El último viaje', 'María Viajera', 'Una aventura épica a través de diferentes dimensiones', 4),
(32, 'Pesadilla en el mar', 'Carlos Abismo', 'Un viaje de crucero que se convierte en una pesadilla', 1),
(34, 'Los guardianes del tiempo', 'Pedro Crono', 'Una historia sobre proteger el tiempo mismo', 3),
(35, 'Muerte Cosmica Espacial', 'Señor del Espacio', 'Espacio y cosas del espacio', 4),
(36, 'El misterio del bosque', 'Ana Silvestre', 'Una investigación que revela secretos oscuros en el bosque', 1),
(37, 'Cazadores de sombras', 'Pedro Oculto', 'Un grupo de amigos que luchan contra criaturas de la noche', 3),
(38, 'Cielo en llamas', 'Carlos Incendiario', 'Una historia de amor entre dos bomberos en una ciudad en llamas', 4),
(41, 'La casa de los secretos', 'Ana Enigmática', 'Una familia se muda a una casa con oscuros secretos', 1),
(43, 'El legado olvidado', 'Carlos Heredero', 'Un hombre descubre un antiguo secreto familiar que lo lleva a la aventura', 3),
(44, 'Enfrentando fantasmas', 'Pedro Valiente', 'Un grupo de amigos se enfrenta a sus miedos en un viaje aterrador', 1),
(45, 'Amor y rock and roll', 'María Musical', 'Una historia de amor en el mundo del rock', 4),
(48, 'Pelicula de Prueba', 'Prueba', 'Prueba\r\n', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'webadmin', '$2y$10$It/tLtd9oUs8wGHLCLcP1OIHa2AFsLR63FH8AZQ1I1eIWRIyEmH.u');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `generos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
