-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-03-2024 a las 17:13:32
-- Versión del servidor: 10.5.21-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21950597_bd_delichef`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spAceptarRec` (IN `recetaID` INT)   BEGIN
    UPDATE del_recetas
    SET recEstatus = 1
    WHERE recId = recetaID;

    SELECT CONCAT(usu.usuNombre, ' ', usu.usuApellidoPaterno, ' ', usu.usuApellidoMaterno) AS Usuario, rec.recTitulo AS Titulo
    FROM del_usuarios usu, del_recetas rec
    WHERE rec.recId = recetaID
    AND rec.usuId = usu.usuId;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spBuscarRecetas` (IN `termino` VARCHAR(50))   BEGIN
    DECLARE numRegistros INT;
    
    SELECT COUNT(*) INTO numRegistros FROM del_recetas WHERE recTitulo LIKE CONCAT('%', termino, '%');
    
    IF numRegistros > 0 THEN
        SELECT
            rec.recId AS ID,
            CONCAT(usu.usuNombre, ' ', usu.usuApellidoPaterno, ' ', usu.usuApellidoMaterno) AS Usuario,
            cat.catNombre AS Categoria,
            rec.recTitulo AS Titulo,
            rec.recDescrip AS Descripcion,
            rec.recImg AS Imagen,
            CASE rec.recEstatus
                WHEN 0 THEN 'PENDIENTE'
                WHEN 1 THEN 'EN LINEA'
            END AS Estatus
        FROM
            del_recetas rec,
            del_usuarios usu,
            del_catrecetas cat
        WHERE
            rec.usuId = usu.usuId
            AND rec.catId = cat.catId
            AND rec.recEstatus = 1
            AND rec.recTitulo LIKE CONCAT('%', termino, '%');
    ELSE
        SELECT 0 AS ID;
    END IF;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spEliminarRec` (IN `recetaID` INT)   BEGIN
DECLARE titulo_receta VARCHAR(255);
SELECT recTitulo INTO titulo_receta FROM del_recetas WHERE recId = recetaID;
DELETE FROM del_recetas
WHERE recId=recetaID;
SELECT CONCAT('La receta "', titulo_receta, '" ha sido eliminada.') AS Mensaje;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spListaItaliana` ()   BEGIN
    SELECT
        rec.recId AS ID,
        CONCAT(usu.usuNombre, ' ', usu.usuApellidoPaterno,' ',usu.usuApellidoMaterno) AS Usuario,
        cat.catNombre AS Categoria,
        rec.recTitulo AS Titulo,
        rec.recDescrip AS Descripcion,
        rec.recImg AS Imagen,
        CASE rec.recEstatus
            WHEN 0 THEN 'PENDIENTE'
            WHEN 1 THEN 'EN LINEA'
        END AS Estatus
    FROM
        del_recetas rec,
        del_usuarios usu,
        del_catrecetas cat
    WHERE
        rec.usuId = usu.usuId
        AND rec.catId = cat.catId
        AND rec.recEstatus =1
        and rec.catId=3;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spListaLibanesa` ()   BEGIN
    SELECT
        rec.recId AS ID,
        CONCAT(usu.usuNombre, ' ', usu.usuApellidoPaterno,' ',usu.usuApellidoMaterno) AS Usuario,
        cat.catNombre AS Categoria,
        rec.recTitulo AS Titulo,
        rec.recDescrip AS Descripcion,
        rec.recImg AS Imagen,
        CASE rec.recEstatus
            WHEN 0 THEN 'PENDIENTE'
            WHEN 1 THEN 'EN LINEA'
        END AS Estatus
    FROM
        del_recetas rec,
        del_usuarios usu,
        del_catrecetas cat
    WHERE
        rec.usuId = usu.usuId
        AND rec.catId = cat.catId
        AND rec.recEstatus =1
        and rec.catId=2;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spListaMexicana` ()   BEGIN
    SELECT
        rec.recId AS ID,
        CONCAT(usu.usuNombre, ' ', usu.usuApellidoPaterno,' ',usu.usuApellidoMaterno) AS Usuario,
        cat.catNombre AS Categoria,
        rec.recTitulo AS Titulo,
        rec.recDescrip AS Descripcion,
        rec.recImg AS Imagen,
        CASE rec.recEstatus
            WHEN 0 THEN 'PENDIENTE'
            WHEN 1 THEN 'EN LINEA'
        END AS Estatus
    FROM
        del_recetas rec,
        del_usuarios usu,
        del_catrecetas cat
    WHERE
        rec.usuId = usu.usuId
        AND rec.catId = cat.catId
        AND rec.recEstatus =1
        and rec.catId=1;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spListarRecLinea` ()   BEGIN
    SELECT
        rec.recId AS ID,
        CONCAT(usu.usuNombre, ' ', usu.usuApellidoPaterno,' ',usu.usuApellidoMaterno) AS Usuario,
        cat.catNombre AS Categoria,
        rec.recTitulo AS Titulo,
        rec.recDescrip AS Descripcion,
        rec.recImg AS Imagen,
        CASE rec.recEstatus
            WHEN 0 THEN 'PENDIENTE'
            WHEN 1 THEN 'EN LINEA'
        END AS Estatus
    FROM
        del_recetas rec,
        del_usuarios usu,
        del_catrecetas cat
    WHERE
        rec.usuId = usu.usuId
        AND rec.catId = cat.catId
        AND rec.recEstatus =1;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spListarRecPendientes` ()   BEGIN
    SELECT
        rec.recId AS ID,
        CONCAT(usu.usuNombre, ' ', usu.usuApellidoPaterno,' ',usu.usuApellidoMaterno) AS Usuario,
        cat.catNombre AS Categoria,
        rec.recTitulo AS Titulo,
        rec.recDescrip AS Descripcion,
        rec.recImg AS Imagen,
        CASE rec.recEstatus
            WHEN 0 THEN 'PENDIENTE'
            WHEN 1 THEN 'EN LINEA'
        END AS Estatus
    FROM
        del_recetas rec,
        del_usuarios usu,
        del_catrecetas cat
    WHERE
        rec.usuId = usu.usuId
        AND rec.catId = cat.catId
        AND rec.recEstatus =0;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spListCatRecetas` ()   BEGIN
	SELECT catNombre as Categoria, catId as CLAVE
	FROM del_catrecetas
	WHERE CatEstatus=1;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spRegistroCat` (IN `nombreCategoria` VARCHAR(20))   BEGIN
    DECLARE categoriaExistente INT;
    
    SELECT COUNT(*) INTO categoriaExistente
    FROM del_catrecetas
    WHERE catNombre = nombreCategoria;
    
    IF categoriaExistente = 0 THEN
        INSERT INTO del_catrecetas (catNombre, catEstatus)
        VALUES (nombreCategoria, 1);
        SELECT 1 AS Mensaje;
    ELSE
        SELECT 0 AS Mensaje;
    END IF;
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spRegistroUsuario` (IN `nombre` VARCHAR(50), IN `apellidoPaterno` VARCHAR(50), IN `apellidoMaterno` VARCHAR(50), IN `email` VARCHAR(40), IN `usuario` VARCHAR(20), IN `contra` VARCHAR(15))   BEGIN
if NOT EXISTS(SELECT usuId from del_usuarios WHERE usuUsuario=usuario)THEN
BEGIN
INSERT INTO del_usuarios VALUES(NULL,2, nombre,apellidoPaterno,
                                apellidoMaterno,email,usuario,contra,1,now());
SELECT MAX(usuId) as INSERTADO FROM del_usuarios;
END;
ELSE
SELECT 0 as INSERTADO;
END IF; 
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spSubirRec` (IN `usuarioID` INT, IN `categoriaID` INT, IN `tituloReceta` LONGTEXT, IN `desReceta` LONGTEXT, IN `imgReceta` VARCHAR(800))   BEGIN
    INSERT INTO del_recetas (usuId, catId, recTitulo, recDescrip, recImg, recFecha, recEstatus )
    VALUES (usuarioID, categoriaID, tituloReceta, desReceta, imgReceta,CURRENT_TIMESTAMP(), 0);
END$$

CREATE DEFINER=`id21950597_admin_deli`@`%` PROCEDURE `spValidarAcceso` (IN `usuario` VARCHAR(50), IN `contra` VARCHAR(15))   BEGIN
IF EXISTS (SELECT usuId FROM del_usuarios WHERE usuEmail=usuario AND usuContra=contra AND usuEstatus=1) THEN
BEGIN
SELECT A.usuId AS CLAVE, A.usuEmail As EMAIL,
CONCAT(A.usuNombre, ' ', A.usuApellidoPaterno, ' ', A.usuApellidoMaterno) AS USUARIO, 
B.tipRol AS ROL


        FROM del_usuarios A, del_tipousuarios B
        WHERE A.usuEmail=usuario
        AND A.usuContra=contra
        AND A.tipUsu=B.tipUsu;
        
END;
ELSE
	SELECT 0 AS CLAVE;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `del_catrecetas`
--

CREATE TABLE `del_catrecetas` (
  `catId` int(11) NOT NULL,
  `catNombre` varchar(20) NOT NULL,
  `catEstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `del_catrecetas`
--

INSERT INTO `del_catrecetas` (`catId`, `catNombre`, `catEstatus`) VALUES
(1, 'Mexicana', 1),
(2, 'Libanesa', 1),
(3, 'Italiana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `del_recetas`
--

CREATE TABLE `del_recetas` (
  `recId` int(10) NOT NULL,
  `usuId` int(10) DEFAULT NULL,
  `catId` int(10) NOT NULL,
  `recTitulo` varchar(50) NOT NULL,
  `recDescrip` longtext NOT NULL,
  `recImg` longtext DEFAULT NULL,
  `recFecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `recEstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `del_recetas`
--

INSERT INTO `del_recetas` (`recId`, `usuId`, `catId`, `recTitulo`, `recDescrip`, `recImg`, `recFecha`, `recEstatus`) VALUES
(168, 1, 1, 'Cubiletes de elote', 'Ingredientes para hacer Cubiletes de elote:\r\nBase\r\n 700 gramos de harina (5 tazas)\r\n 250 gramos de azúcar (1¼ tazas)\r\n 1 pizca de sal\r\n 1 cucharadita de vainilla\r\n 1 huevo\r\n 300 gramos de mantequilla (1⅓ tazas)\r\nRelleno\r\n 4 elotes\r\n 4 huevos\r\n 190 gramos de queso crema\r\n 380 gramos de leche condensada\r\n 1 taza de leche evaporada\r\n 1 pizca de sal\r\n 3 cucharadas soperas de fécula de maíz, Comienza esta deliciosa receta de cubiletes de elote preparando la base de los mismos. Para ello, en un recipiente mezcla los', 'imgs/cuvi.png', '2024-03-21 04:19:02', 1),
(171, 19, 3, 'Lasaña', '\r\n\r\nRECETAS\r\nPASTA\r\nLasaña de carne sencilla\r\nPasta de lasaña entre capas de carne molida de res guisada en salsa de tomate para pasta. Las láminas de lasaña no necesitan hervirse y la salsa de tomate es comercial. Una receta verdaderamente fácil, a prueba de inexpertos.\r\n\r\nPor Joanie Heger  Publicado en Junio 02, 2015\r\nIMPRIMIR\r\n\r\nSHARE\r\n12f67094-5795-4fde-8437-6413243b37f6\r\nPrep Time:\r\n15 min\r\nCook Time:\r\n1 hr\r\nTotal Time:\r\n1 hr 15 min\r\nYield:\r\n12\r\nIngredientes\r\n500 gramos de carne molida de res\r\n\r\n2 latas (400 gramos cada una) de salsa de tomate para pasta\r\n\r\n900 gramos de queso cattage\r\n\r\n350 gramos (3 tazas) de queso mozzarella rallado\r\n\r\n2 huevos\r\n\r\n40 gramos (1/2 taza) de queso parmesano rallado\r\n\r\n2 cucharaditas de perejil seco\r\n\r\nSal y pimienta negra al gusto\r\n\r\n9 láminas de lasaña\r\n\r\n1/2 taza de agua', 'imgs/Beef Lasagna.jpg', '2024-03-21 04:23:06', 1),
(172, 2, 1, 'CHILAQUILES', 'Ingredientes\r\nTortillas de maíz: 10 piezas\r\nPechuga de pollo: una pieza limpia y desgrasada.\r\nSalsa roja: un par de tazas.\r\nCebolla blanca: una pieza.\r\nCrema de leche: 1/3 de taza.\r\nQueso rallado o desmenuzado: una taza recomiendo queso cotija o feta.\r\nSal.\r\nPimienta negra molida.\r\nAceite vegetal de sabor neutro, como canola, maíz o girasol.\r\nAgua.\r\nCilantro: 1/2 taza finamente picado.\r\nElaboración paso a paso\r\nCocer la pechuga de pollo en agua caliente, con un poco de sal y pimienta, por alrededor de 20 minutos (hasta que la carne pegada al hueso pierda la tonalidad rojiza).\r\nMientras que se cocina el pollo, cortar las tortillas en tiras o triángulos.\r\nFreír en aceite las tortillas cortadas. Usar sólo el aceite necesario para que se doren y se vuelvan crujientes.\r\nRetirar las tortillas del aceite y depositarlas sobre un plato cubierto con papel absorbente, para quitar el exceso de grasa.\r\nUna vez cocido el pollo, deshebrar la carne con la ayuda de dos tenedores. Reservar.\r\nCalentar la salsa en una cacerola. Normalmente, la salsa de los chilaquiles no tiene una textura espesa, así que se puede diluir con un poquito de agua, cuidando la cantidad para no perder la sazón. Corregir con un poco de sal y pimienta, si es necesario.\r\nMientras se calienta la salsa, pelar y picar la cebolla en ruedas muy delgadas y luego separar los círculos interiores. Reservar.\r\nAntes de retirar la salsa del fuego, agregarle el pollo y  los trozos de tortilla frita.  La idea es que los trozos se mojen en la salsa, pero sin dejarlos tiempo suficiente para que pierdan su textura crujiente. Mezclar rápidamente.', 'imgs/5.jpg', '2024-03-21 04:24:36', 1),
(174, 19, 3, 'CREAMY CAJUN SHRIMP PASTA WITH TOMATOES', 'INGREDIENTES\r\n1 libra de camarones, desvenados y limpios\r\nlinguini de 8 onzas\r\n1 cucharada de aceite\r\n1 cucharadita de condimento cajún\r\n1 taza mitad y mitad\r\n2 cucharadas de mantequilla\r\n2 dientes de ajo, picados\r\nUnas ramitas de perejil picado\r\n1 tomate roma, cortado en cubitos pequeños\r\n¼ taza de parmesano reggiano\r\n1 cucharada de jugo de limón, opcional\r\nsal y pimienta', 'imgs/Creamy Cajun Shrimp Pasta With Tomatoes.jpg', '2024-03-21 04:25:05', 1),
(175, 20, 3, ' EL TIRAMISÚ', 'INGREDIENTES\r\n\r\n\r\n500 ml de agua\r\n4 cucharadas colmadas de café granulado\r\n5 cucharadas de amaretto (o a gusto)\r\n1 cucharada de azúcar\r\n4 yemas de huevo\r\n250g de azúcar flor\r\n1 queso crema\r\n100g de crema de leche\r\n500 ml de crema para batir muy fría\r\n500g de galletas de champaña\r\nCacao Dulce en Polvo Gourmet para espolvorear\r\n\r\n¿Cómo preparar el café?\r\nHervir los 500 ml de agua. Verter sobre un bol y agregar el café. Revolver bien. Añadir el amaretto y azúcar y revolver. Reservar.\r\nEn un bol, batir las yemas con 125g de azúcar flor, hasta que la mezcla quede uniforme y de un color amarillo claro. Reservar.\r\nEn otro bol, batir el queso crema previamente molido con la crema de leche, hasta que quede una mezcla suave. Reservar.\r\nEn otro bol, batir la crema para batir (recién sacada del refrigerador) e ir agregando de a poco 125g de azúcar flor, sin parar de batir. La crema tiene que quedar firme, cuidando que no se corte.\r\nJuntar la mezcla de las yemas con la mezcla del queso crema con movimientos envolventes, hasta que quede una mezcla homogénea. Agregar esta mezcla de a poco a la crema batida, con movimientos envolventes y cuidando que quede todo bien mezclado.\r\n \r\n\r\nArmado del postre:\r\nUsar una fuente grande de 35x25cm. Mojar una a una las galletas de champaña en el café (cuidando de que no queden con exceso de líquido y se rompan) e ir poniéndolas en la base de la fuente, hasta cubrirla completamente. Agregar la mitad de la mezcla. Luego, agregar otra capa de galletas de champaña mojadas en café. Poner la otra mitad de la mezcla. Espolvorear completamente con Chocolate en Polvo Gourmet, pasando éste por un colador. Poner en el freezer por 2 horas para que obtenga consistencia. Luego bajar al refrigerador y mantenerlo ahí.Y a disfrutar!!', 'imgs/tiramisu1.jpg', '2024-03-21 04:25:05', 1),
(176, 21, 2, 'Rollitos de hoja de parra', 'Ingredientes\r\n[150 g de arroz precocido,3 cucharadas de pasas,1/2 cebolla blanca,1 manojo de eneldo ,1 manojo de perejil,5 cucharadas de aceite de oliva,1 pizca de canela,5 cucharadas de jugo de limón,250 g de hojas de parra en conserva,1 taza de puré de tomate,2 cucharaditas de menta picada ,Sal y pimienta]', 'imgs/Rollitos de hoja de parra.jpg', '2024-03-21 04:27:44', 1),
(177, 21, 2, 'Baba ganoush, mutabal o paté de berenjenas árabe', 'Ingredientes\r\n- 2 berenjenas\r\n- 1 ajo (o 2 si prefieres)\r\n- 1,5 cucharadas de zumo de limón\r\n- 1 cucharada de tahini\r\n- 60 ml de aceite\r\n- sal\r\n- comino molido\r\n- pimentón\r\n- perejil', 'imgs/Baba ganoush, mutabal o paté de berenjenas árabe.jpg', '2024-03-21 04:28:29', 1),
(178, 18, 1, ' Baba ganoush', 'Comenzamos lavando 2 berenjenas. Una vez limpias, las cortamos por la mitad y les hacemos unos cortes para que la sal y el aceite penetren con más facilidad en toda la berenjena.\r\nCotar la berenjena para el baba ganoush\r\nSofía de la Torre\r\nAñadir sal y aceite al baba ganoush para hornearlo\r\nSofía de la Torre\r\nAsar las berenjenas para el baba ganoush\r\nSofía de la Torre\r\nSacamos la carne de las berenjenas asada\r\nExtraer la carne de las berenjenas para el baba ganoush\r\n\r\n\r\n', 'imgs/LIB3.jpg', '2024-03-21 04:28:34', 1),
(182, 19, 3, 'el tiramisu', '1 bowl\r\n2 huevos ', 'imgs/tiramisu1.jpg', '2024-03-21 05:25:58', 0),
(183, 19, 3, ' EL TIRAMISÚ', '2 huevos \r\n 1 bowl', 'imgs/tiramisu1.jpg', '2024-03-21 05:39:10', 0),
(184, 1, 1, 'tacos', 'tortillas, poollo', 'imgs/Captura de pantalla_20240120_124502.png', '2024-03-21 06:13:25', 1),
(185, 25, 3, 'comida italiana', 'espagueti', 'imgs/Captura de pantalla_20231119_124835.png', '2024-03-21 06:19:07', 1),
(186, 25, 2, 'receta libanesa', 'lobanesa', 'imgs/Captura de pantalla_20231128_112424.png', '2024-03-21 06:19:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `del_tipousuarios`
--

CREATE TABLE `del_tipousuarios` (
  `tipUsu` int(11) NOT NULL,
  `tipRol` varchar(30) NOT NULL,
  `tipDescripcion` varchar(100) DEFAULT NULL,
  `tipEstatus` int(11) NOT NULL,
  `tipFechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `del_tipousuarios`
--

INSERT INTO `del_tipousuarios` (`tipUsu`, `tipRol`, `tipDescripcion`, `tipEstatus`, `tipFechaRegistro`) VALUES
(1, 'Administrador', NULL, 1, '2024-03-10 01:02:38'),
(2, 'Usuario Registrado', NULL, 1, '2024-03-10 01:02:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `del_usuarios`
--

CREATE TABLE `del_usuarios` (
  `usuId` int(11) NOT NULL,
  `tipUsu` int(11) NOT NULL,
  `usuNombre` varchar(50) NOT NULL,
  `usuApellidoPaterno` varchar(50) NOT NULL,
  `usuApellidoMaterno` varchar(50) DEFAULT NULL,
  `usuEmail` varchar(40) NOT NULL,
  `usuUsuario` varchar(20) NOT NULL,
  `usuContra` varchar(15) NOT NULL,
  `usuEstatus` int(11) NOT NULL,
  `usuFechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `del_usuarios`
--

INSERT INTO `del_usuarios` (`usuId`, `tipUsu`, `usuNombre`, `usuApellidoPaterno`, `usuApellidoMaterno`, `usuEmail`, `usuUsuario`, `usuContra`, `usuEstatus`, `usuFechaRegistro`) VALUES
(1, 1, 'Brandon', 'Mora', 'Cervantes', 'admin@gmail.com', 'Brandi', '12345', 1, '2024-03-10 01:04:09'),
(2, 2, 'Yair', 'Garcia', 'Ordonez', 'Yair@gmail.com', 'Yayo', '1234', 1, '2024-03-10 01:04:49'),
(3, 2, 'Luis', 'Martínez', 'González', 'luis@gmail.com', 'LuisM', 'password123', 1, '2024-03-16 06:46:38'),
(4, 2, 'Laura', 'Hernández', 'Sánchez', 'laura@gmail.com', 'LauraH', 'securepassword', 1, '2024-03-16 06:46:38'),
(5, 2, 'Carlos', 'Gómez', 'Rodríguez', 'carlos@gmail.com', 'CarlosG', 'abc123', 1, '2024-03-16 06:46:38'),
(6, 2, 'Fernanda', 'López', 'Martínez', 'fernanda@gmail.com', 'FerL', 'mypassword', 1, '2024-03-16 06:46:38'),
(7, 2, 'Juan', 'López', 'Pérez', 'juan@gmail.com', 'Juanito', 'password123', 1, '2024-03-17 22:51:36'),
(8, 2, 'Juan', 'Perez', 'Gonzalez', 'juan@gmail.com', 'JuanP', 'password123', 1, '2024-03-18 22:41:14'),
(9, 2, 'jan', 'naero', '', 'jariyo', '1221@dshdsh.com', '12345', 1, '2024-03-18 22:59:01'),
(10, 2, 'jan', 'naero', 'sasa', 'jaral', 'Yayo@wqwqw', '123454', 1, '2024-03-18 23:00:06'),
(11, 2, 'jan', 'naero', '', 'jaral', 'admin@gmaisl.co', '12345', 1, '2024-03-18 23:00:30'),
(12, 2, 'jan', 'naero', 'sasa', 'jaral', 'admin@gmaisl.c', '12345', 1, '2024-03-18 23:01:05'),
(13, 2, 'jan', 'naero', 'sasa', 'admin@gmais', 'jaral', '12345', 1, '2024-03-18 23:03:46'),
(14, 2, 'KarlaMarian', 'Pérez', 'Baños', 'banoskarla14@gmail.com', 'Karla12', '12345', 1, '2024-03-19 04:29:10'),
(15, 2, 'vrr', 'vrr', 'vrr', '1@1', 'lolo', '123', 1, '2024-03-19 23:49:33'),
(16, 2, 'mike', 'eche', 'canse', 'mike@gmail.com', 'MIKI', '1234', 1, '2024-03-20 00:27:51'),
(17, 2, 'Iridian', 'Castro', 'Valencia', 'josephyncastro@gmail.com', 'Iris', 'iridiaaan', 1, '2024-03-20 23:23:57'),
(18, 2, 'JesusDaniel', 'Hernandez', 'Hernandez', 'daniel.h050419@gmail.com', 'Daniel', '123', 1, '2024-03-21 04:18:39'),
(19, 2, 'Karla', 'Perez', 'Baños', 'Mariana2001@gmail.com', 'Marianis10', '12345', 1, '2024-03-21 04:19:17'),
(20, 2, 'Miguel', 'Echeverria', 'Canseco', 'miguel@gmail.com', 'mike', '12345', 1, '2024-03-21 04:21:57'),
(21, 2, 'Miguel', 'Echeverria', 'Canseco', 'Miguel2023@gmail.com', 'Mike2023', '12345', 1, '2024-03-21 04:26:37'),
(22, 2, 'Jesus', 'Hernandez', 'Hernandez', 'jesus@gmail.com', 'jesus_chef', '12345', 1, '2024-03-21 05:10:38'),
(23, 2, 'angel', 'echeverria', 'soria', 'angel@gmail.com', 'angel12', '12345', 1, '2024-03-21 05:28:32'),
(24, 2, 'javier', 'Esquivel', 'lopez', 'javier@gmail.com', 'javis10', '12345', 1, '2024-03-21 05:41:39'),
(25, 2, 'juan', 'jose', 'perez', 'aaa@upmh', 'juan23', '1234', 1, '2024-03-21 06:16:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `del_catrecetas`
--
ALTER TABLE `del_catrecetas`
  ADD PRIMARY KEY (`catId`);

--
-- Indices de la tabla `del_recetas`
--
ALTER TABLE `del_recetas`
  ADD PRIMARY KEY (`recId`);

--
-- Indices de la tabla `del_tipousuarios`
--
ALTER TABLE `del_tipousuarios`
  ADD PRIMARY KEY (`tipUsu`);

--
-- Indices de la tabla `del_usuarios`
--
ALTER TABLE `del_usuarios`
  ADD PRIMARY KEY (`usuId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `del_catrecetas`
--
ALTER TABLE `del_catrecetas`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `del_recetas`
--
ALTER TABLE `del_recetas`
  MODIFY `recId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT de la tabla `del_tipousuarios`
--
ALTER TABLE `del_tipousuarios`
  MODIFY `tipUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `del_usuarios`
--
ALTER TABLE `del_usuarios`
  MODIFY `usuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
