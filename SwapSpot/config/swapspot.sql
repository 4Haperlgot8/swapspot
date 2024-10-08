-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-10-2024 a las 02:11:59
-- Versión del servidor: 8.4.0
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `swapspot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `Id_articulo` int NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Descripcion_producto` text COLLATE utf8mb4_general_ci,
  `categoria` int DEFAULT NULL,
  `Usuario` int DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `cambio` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Imagen` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`Id_articulo`, `Nombre`, `Descripcion_producto`, `categoria`, `Usuario`, `Precio`, `cambio`, `Imagen`) VALUES
(21, 'Gorra', 'Gorra Adidas 100% original', 1, 14, 200000.00, 'Zapatos', '2024-09-05-12-56-33.jpg'),
(22, 'Iphone 15', 'Apple IPhone 15(256gb,6ram)', 2, 14, 4000000.00, 'Samsung s23 ultra', '2024-09-05-12-59-59.jpg'),
(23, 'Cafetera', 'Cafetera Oster', 3, 14, 500000.00, 'Celular', '2024-09-05-13-06-07.jpg'),
(24, 'Pistola Nerf', 'Nerf N-strike ', 4, 14, 150000.00, 'Tenis', '2024-09-05-13-09-16.jpg'),
(37, 'CAROOO', 'dfdsf', 1, 11, 23432.00, 'dsfds', '2024-10-07-21-46-55.jpgAlternativa Etapa Productiva.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `Id_cargo` int NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`Id_cargo`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_categoria` int NOT NULL,
  `Nombre_ca` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_categoria`, `Nombre_ca`) VALUES
(1, 'Ropa'),
(2, 'Electronica'),
(3, 'Hogar'),
(4, 'Juguetes'),
(5, 'Libros'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Id_estado` int NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id_estado`, `Descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Aceptado'),
(3, 'Rechazado'),
(4, 'Realizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambio`
--

CREATE TABLE `intercambio` (
  `Id_intercambio` int NOT NULL,
  `Nombre_intercambio` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Descripcion_intercambio` text COLLATE utf8mb4_general_ci,
  `Imagen_intercambio` text COLLATE utf8mb4_general_ci,
  `Categoria_Intercambio` int DEFAULT NULL,
  `Articulo` int DEFAULT NULL,
  `Usuario_ofertante` int DEFAULT NULL,
  `Precio_Intercambio` double(10,2) DEFAULT NULL,
  `Estado_intercambio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `intercambio`
--

INSERT INTO `intercambio` (`Id_intercambio`, `Nombre_intercambio`, `Descripcion_intercambio`, `Imagen_intercambio`, `Categoria_Intercambio`, `Articulo`, `Usuario_ofertante`, `Precio_Intercambio`, `Estado_intercambio`) VALUES
(21, 'asdasd', 'asdasd', '2024-10-08-00-02-40.jpgAlternativa Etapa Productiva.png', 1, 37, 12, 324324.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int NOT NULL,
  `Nombres` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Apellidos` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `Contraseña` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Direccion` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Celular` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Cargo` int DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombres`, `Apellidos`, `Email`, `Contraseña`, `Direccion`, `Celular`, `Cargo`, `Estado`) VALUES
(9, 'Breider Enrique', 'Hoyos Cardenas', 'breider123zhoyoscar@gmail.com', '5ac94163929e2dd584b436d5a3fb783dfa2551cd22111972bcd7bd5f7fd0c0a63476cfdd9e5df9040d73d2661100952025ebf39b1d21afbeb888caff3d721390', 'Kr126C #137A-34', '2147483647', 1, 0),
(11, 'Jhon', 'Mesa', 'Jhon@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'kr147c#23a-32', '2012215227', 2, 0),
(12, 'enrique', 'cardenas', 'enrique@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'asdsadsd', '324234', 2, 0),
(13, 'Mesa ', 'Perez', 'nelson@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'asdasd', '3012215227', 2, 0),
(14, 'Jose ', 'Mendivelso', 'mendivelsojose354@gmail.com', 'bf4a3431a38f9165eb1cec69b72f575cdd2fae2bbdc2fe64da4c9410d5f2b8cba4fee89257a97a678de4e8a289ce15b97c163f0ebda9bd11483093cd2f48dba1', 'carrera 18 m bis num 74 c 19 n', '3205192728', 1, 0),
(15, 'Juan', 'Peña', 'juanpe@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'car 20m  num 70c 19 norte', '3144268901', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`Id_articulo`),
  ADD KEY `fk_Id_categoria` (`categoria`),
  ADD KEY `fk_Id_usuario` (`Usuario`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Id_cargo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Id_estado`);

--
-- Indices de la tabla `intercambio`
--
ALTER TABLE `intercambio`
  ADD PRIMARY KEY (`Id_intercambio`),
  ADD KEY `articulo` (`Articulo`),
  ADD KEY `Categoria_Intercambio` (`Categoria_Intercambio`),
  ADD KEY `Usuario` (`Usuario_ofertante`),
  ADD KEY `Estado_intercambio` (`Estado_intercambio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Cargo` (`Cargo`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `Id_articulo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Id_cargo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `intercambio`
--
ALTER TABLE `intercambio`
  MODIFY `Id_intercambio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `intercambio`
--
ALTER TABLE `intercambio`
  ADD CONSTRAINT `intercambio_ibfk_1` FOREIGN KEY (`Estado_intercambio`) REFERENCES `estado` (`Id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
