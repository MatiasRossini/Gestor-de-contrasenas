-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2023 a las 03:12:52
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
-- Base de datos: `gestor_contrasenas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL COMMENT 'ID de la categoria',
  `STR_NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre de la categoria',
  `STR_DESCRIPCION` varchar(512) NOT NULL COMMENT 'Descripcion de la categoria',
  `INT_NIVEL` int(11) NOT NULL COMMENT 'Nivel de la categoria',
  `FLT_VALOR` float NOT NULL COMMENT 'Valor de la categoria',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta de la categoria',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificacion de la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Categorias de premium que utiliza el sistema';

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `STR_NOMBRE`, `STR_DESCRIPCION`, `INT_NIVEL`, `FLT_VALOR`, `DTE_ALTA`, `DTE_MOD`) VALUES
(1, 'Básico', 'Estado básico de la cuenta, limitado.', 0, 0, '2023-11-25', '2023-11-25'),
(2, 'Premium', 'Estado avanzado, más funciones', 1, 100, '2023-11-25', '2023-11-25'),
(3, 'Empresa', 'Estado definitivo, paquete completo', 2, 200, '2023-11-25', '2023-11-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasenas`
--

CREATE TABLE `contrasenas` (
  `id` int(11) NOT NULL COMMENT 'ID de la contraseña ingresada.',
  `STR_NOMBRE_USUARIO` varchar(256) NOT NULL COMMENT 'Nombre de usuario/correo conjunto a la contraseña',
  `STR_CONTRASENA` varchar(256) NOT NULL COMMENT 'Contraseña con protección AES-256.',
  `STR_DESCRIPCION` varchar(512) DEFAULT NULL COMMENT 'Descripción de la contraseña.',
  `IDD_GRUPO` int(11) DEFAULT NULL COMMENT 'Grupo al que pertenece la contraseña',
  `IDD_USUARIO` int(11) NOT NULL COMMENT 'ID del usuario que la creo',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta de la contraseña.',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de la ultima modificación de la contraseña.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de las contraseñas que almacena el usuario en la BD';

--
-- Volcado de datos para la tabla `contrasenas`
--

INSERT INTO `contrasenas` (`id`, `STR_NOMBRE_USUARIO`, `STR_CONTRASENA`, `STR_DESCRIPCION`, `IDD_GRUPO`, `IDD_USUARIO`, `DTE_ALTA`, `DTE_MOD`) VALUES
(2, 'Ejemplo', 'eyJpdiI6ImU2bVgwcXREdjZiU2NCZUpQV05pWXc9PSIsInZhbHVlIjoiQ0pSUWRZNzcyV2JUU3dxZ1E2cHNXdz09IiwibWFjIjoiNzA4N2I0YjAzOTI4YjdkNzFmMWI2YzE3YzE0MzI1ZDkzN2QwNTRmMDNmN2EzMjQwZjEzNmEyMGEzZTBlNGQ5NCIsInRhZyI6IiJ9', 'Contraseña de ejemplo - Devuelve \"KeyLocker13#\"', NULL, 3, '2023-11-26', '2023-11-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL COMMENT 'ID del grupo.',
  `STR_NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre del grupo.',
  `STR_DESCRIPCION` varchar(512) DEFAULT NULL COMMENT 'Descripción del grupo.',
  `IDD_USUARIO` int(11) NOT NULL COMMENT 'ID del usuario que lo creo.',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta del grupo',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación del grupo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de Grupos del sistema.';

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `STR_NOMBRE`, `STR_DESCRIPCION`, `IDD_USUARIO`, `DTE_ALTA`, `DTE_MOD`) VALUES
(3, 'Ejemplo', 'Grupo de ejemplo', 3, '2023-11-26', '2023-11-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID del usuario',
  `STR_USUARIO` varchar(255) NOT NULL COMMENT 'Nombre del usuario (Unico)',
  `STR_CORREO` varchar(255) NOT NULL COMMENT 'Correo del usuario (Unico)',
  `password` varchar(512) NOT NULL COMMENT 'Contraseña hasheada con bcrypt',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta del usuario',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de datos de los usuarios en el sistema';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `STR_USUARIO`, `STR_CORREO`, `password`, `DTE_ALTA`, `DTE_MOD`) VALUES
(3, 'KeyLocker1', 'KeyLock@gmail.com', '$2y$12$difJ.I3UlgRVNbHH.mImI.nW/3Njowca168ruIViKqQYekwxvtMGO', '2023-11-26', '2023-11-26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la categoria', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la contraseña ingresada.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del grupo.', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del usuario', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
