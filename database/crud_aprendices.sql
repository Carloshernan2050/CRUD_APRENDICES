- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2025 a las 05:46:58
-- Versión del servidor: 8.4.3
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_aprendices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id` int NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `id_tipo_documento` int NOT NULL,
  `documento` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_genero` int NOT NULL,
  `id_grupo_sanguineo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_tipo_documento`, `documento`, `telefono`, `correo`, `fecha_nacimiento`, `id_genero`, `id_grupo_sanguineo`) VALUES
(1, 'Deyson', 'jose', 'Urrego', 'Ibarra', 3, '1041531946', '3114471531', 'deysonurrego159@gmail.com', '2222-02-01', 1, 5),
(2, 'Sharot', 'Jasmin', 'Varela', 'Parrado', 1, '1004432223', '3233356141', 'lacagada@gami.com', '2009-12-31', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz_programa`
--

CREATE TABLE `aprendiz_programa` (
  `id` int NOT NULL,
  `id_aprendiz` int NOT NULL,
  `id_programa_formacion` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aprendiz_programa`
--

INSERT INTO `aprendiz_programa` (`id`, `id_aprendiz`, `id_programa_formacion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1, 8, '2000-02-10', '2000-04-10'),
(2, 2, 3, '2022-03-12', '2023-01-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int NOT NULL,
  `genero` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`) VALUES
(1, 'MASCULINO'),
(2, 'FEMENINO'),
(3, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_sanguineo`
--

CREATE TABLE `grupo_sanguineo` (
  `id` int NOT NULL,
  `grupo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupo_sanguineo`
--

INSERT INTO `grupo_sanguineo` (`id`, `grupo`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_formacion`
--

CREATE TABLE `programa_formacion` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `programa_formacion`
--

INSERT INTO `programa_formacion` (`id`, `nombre`, `nivel`) VALUES
(1, 'Técnico en Sistemas', 'Técnico'),
(2, 'Técnico en Asistencia Administrativa', 'Técnico'),
(3, 'Técnico en Cocina', 'Técnico'),
(4, 'Técnico en Contabilidad', 'Técnico'),
(5, 'Técnico en Manejo Ambiental', 'Técnico'),
(6, 'Técnico en Logística Empresarial', 'Técnico'),
(7, 'Tecnólogo en Análisis y Desarrollo de Software', 'Tecnólogo'),
(8, 'Tecnólogo en Gestión Administrativa', 'Tecnólogo'),
(9, 'Tecnólogo en Gestión del Talento Humano', 'Tecnólogo'),
(10, 'Tecnólogo en Gestión Logística', 'Tecnólogo'),
(11, 'Tecnólogo en Producción Agropecuaria Ecológica', 'Tecnólogo'),
(12, 'Tecnólogo en Control Ambiental', 'Tecnólogo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int NOT NULL,
  `tipo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `tipo`, `descripcion`) VALUES
(1, 'TI', 'TARJETA DE IDENTIDAD'),
(2, 'CC', 'CÉDULA DE CIUDADANIA'),
(3, 'CE', 'CÉDULA DE EXTRANJERIA'),
(4, 'TE', 'TARJETA DE EXTRANGERIA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `FK2_id_genero` (`id_genero`),
  ADD KEY `FK3_id_grupo_sanguineo` (`id_grupo_sanguineo`),
  ADD KEY `FK3tipo_documento` (`id_tipo_documento`);

--
-- Indices de la tabla `aprendiz_programa`
--
ALTER TABLE `aprendiz_programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK2_programa` (`id_programa_formacion`),
  ADD KEY `FK2_aprendiz` (`id_aprendiz`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programa_formacion`
--
ALTER TABLE `programa_formacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aprendiz_programa`
--
ALTER TABLE `aprendiz_programa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `programa_formacion`
--
ALTER TABLE `programa_formacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `FK2_id_genero` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `FK3tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id`),
  ADD CONSTRAINT `FK3_id_grupo_sanguineo` FOREIGN KEY (`id_grupo_sanguineo`) REFERENCES `grupo_sanguineo` (`id`);

--
-- Filtros para la tabla `aprendiz_programa`
--
ALTER TABLE `aprendiz_programa`
  ADD CONSTRAINT `FK2_aprendiz` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendices` (`id`),
  ADD CONSTRAINT `FK2_programa` FOREIGN KEY (`id_programa_formacion`) REFERENCES `programa_formacion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
