
--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id_aprendiz` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `id_titulada` int(3) NOT NULL,
  `tipoDoc_aprendiz` varchar(20) NOT NULL,
  `documento` varchar(25) NOT NULL,
  `nombre_aprendiz` varchar(20) NOT NULL,
  `apellido_aprendiz` varchar(20) NOT NULL,
  `email_aprendiz` varchar(50) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `serial_articulo_1` varchar(20) DEFAULT NULL,
  `descrpcion_articulo_1` varchar(100) DEFAULT NULL,
  `serial_articulo_2` varchar(20) DEFAULT NULL,
  `descrpcion_articulo_2` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_articulo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(3) NOT NULL,
  `nombre_articulo` varchar(20) DEFAULT NULL,
  `nombre_articulo_2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_permisos`
--

CREATE TABLE `datos_permisos` (
  `id` int(11) NOT NULL,
  `nombre_instructor` varchar(250) NOT NULL,
  `nombre_aprendiz` varchar(250) NOT NULL,
  `titulada` varchar(250) NOT NULL,
  `ficha` int(11) NOT NULL,
  `ambiente` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `lista_instructores` (
  `id` int(11) NOT NULL,
  `nombre_instructor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(3) NOT NULL,
  `id_aprendiz` int(3) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tituladas`
--

CREATE TABLE `tituladas` (
  `id_titulada` int(3) NOT NULL,
  `nombre_titulada` varchar(50) NOT NULL,
  `ficha_titulada` int(10) DEFAULT NULL,
  `jornada` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `usuarios` (
  `id_usuario` int(3) NOT NULL,
  `tipoDoc_usuario` varchar(30) NOT NULL,
  `documento_usuario` varchar(15) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido_usuario` varchar(20) NOT NULL,
  `correo_usuario` varchar(30) NOT NULL,
  `usuario_usuario` varchar(20) NOT NULL,
  `clave_usuario` varchar(65) NOT NULL,
  `rol_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id_aprendiz`),
  ADD KEY `fk_aprendiz_usuario` (`id_usuario`),
  ADD KEY `fk_aprendiz_titulada` (`id_titulada`),
  ADD KEY `fk_aprendiz_articulo` (`id_articulo`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `datos_permisos`
--
ALTER TABLE `datos_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_instructor` (`nombre_instructor`);

--
-- Indices de la tabla `lista_instructores`
--
ALTER TABLE `lista_instructores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_instructor` (`nombre_instructor`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_registro_aprendiz` (`id_aprendiz`);

--
-- Indices de la tabla `tituladas`
--
ALTER TABLE `tituladas`
  ADD PRIMARY KEY (`id_titulada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id_aprendiz` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_permisos`
--
ALTER TABLE `datos_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lista_instructores`
--
ALTER TABLE `lista_instructores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tituladas`
--
ALTER TABLE `tituladas`
  MODIFY `id_titulada` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `aprendices`
  ADD CONSTRAINT `fk_aprendiz_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `fk_aprendiz_titulada` FOREIGN KEY (`id_titulada`) REFERENCES `tituladas` (`id_titulada`),
  ADD CONSTRAINT `fk_aprendiz_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `lista_instructores`
  ADD CONSTRAINT `lista_instructores_ibfk_1` FOREIGN KEY (`nombre_instructor`) REFERENCES `datos_permisos` (`nombre_instructor`);

ALTER TABLE `registro`
  ADD CONSTRAINT `fk_registro_aprendiz` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendices` (`id_aprendiz`);
COMMIT;
