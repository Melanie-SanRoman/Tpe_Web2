-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 18:07:00
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
-- Base de datos: `trabajo_practico_especial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID` int(50) NOT NULL,
  `Nombre_autor` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Fecha_de_nacimiento` date NOT NULL,
  `Nacionalidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID`, `Nombre_autor`, `Apellido`, `Fecha_de_nacimiento`, `Nacionalidad`) VALUES
(1, 'Nombre', 'Apellido', '0000-00-00', 'Nacionalidad'),
(2, 'Julio', 'Cortazar', '1914-08-26', 'Argentino'),
(3, 'Maria Elena', 'Walsh', '1930-02-01', 'Argentina'),
(4, 'John', 'Green', '1977-08-24', 'Estadounidense'),
(5, 'Roberto', 'Cossa', '1934-11-30', 'Argentino'),
(6, 'DeleteNombre', 'DeleteApellido', '0000-00-00', 'DeleteNacionalidad\r\n'),
(7, 'UpdateNombre', 'UpdateApellido', '0000-00-00', 'UpdateNacionalidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libros` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Lanzamiento` year(4) NOT NULL,
  `id_autor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libros`, `Nombre`, `Genero`, `Lanzamiento`, `id_autor`) VALUES
(1, 'La Reina Batata', 'Cuento infantil', '1966', 3),
(3, 'Ciudades de Papel', 'Novela, ficción, adulto joven', '2008', 4),
(4, 'La Reina Batata', 'Cuento infantil', '1966', 3),
(5, 'La Nona', 'Dramático', '1979', 5),
(6, 'Rayuela', 'Novela, Ficcion', '1963', 2),
(8, 'Bestiario', 'Cuento, Ficción', '1951', 2),
(9, 'Nuestro Fin de Semana', 'Obra de teatro', '1964', 5),
(10, 'La Reina Batata', 'Cuento infantil', '1966', 3),
(11, 'Bajo la Misma Estrella', 'Novela, Ficción, Adulto Joven', '2014', 4),
(12, 'Manuelita', 'Cuento Infantil', '1963', 3),
(13, 'UpdateNombre', 'UpdateGenero', '2023', 1),
(14, 'DeleteNombre', 'DeleteGenero', '2023', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Apellido`, `Email`, `Contraseña`) VALUES
(17, 'WEB', '2', 'webadmin', '$2y$10$cGteM9X9RNA8l7wuRF.Q0euFjfky4ThFyEI/ThfNNKgcGdoMw76W6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libros`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
