-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-05-2024 a las 20:11:50
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbddusuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('paqui@gmail.com|127.0.0.1:timer', 'i:1715535246;', 1715535246),
('paqui@gmail.com|127.0.0.1', 'i:4;', 1715535246);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(40) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Aventuras', NULL, NULL),
(2, 'Categoría 2', NULL, NULL),
(3, 'Categoría 3', NULL, NULL),
(4, 'Fantasia', NULL, NULL),
(16, 'Terror', NULL, NULL),
(17, 'Ciencia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `entradas_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint UNSIGNED NOT NULL,
  `categoria_id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(40) COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagen` varchar(40) COLLATE utf8mb3_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entradas_id`),
  KEY `entradas_usuario_id_foreign` (`usuario_id`),
  KEY `entradas_categoria_id_foreign` (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`entradas_id`, `usuario_id`, `categoria_id`, `titulo`, `imagen`, `descripcion`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Titulo', '1714936433.png', '<p>Esta es la descripcion</p>', '2024-05-05 17:13:53', NULL, '2024-05-05 17:13:53'),
(13, 1, 1, 'Título Entrada 3', '1714936492.png', '<h1><strong>Hola :)</strong></h1>\r\n\r\n<ul>\r\n	<li><strong>Esto es una pba</strong></li>\r\n	<li><strong>Esto es una pba</strong></li>\r\n</ul>', '2024-05-05 17:14:52', NULL, '2024-05-05 17:14:52'),
(14, 2, 2, 'Titulo Entrada 5', 'RecreativoHuelva.png', '<h2 style=\"font-style:italic\"><strong>Otra Pba ;)</strong></h2>\r\n\r\n<ol>\r\n	<li>:O</li>\r\n	<li>:)</li>\r\n</ol>\r\n', '2023-12-15 16:51:40', NULL, NULL),
(15, 1, 1, 'Título Entrada 4', '1714936393.png', '<h1><strong>Soy admin ;)</strong></h1>\r\n\r\n<ul>\r\n	<li>S&iacute; se&ntilde;or</li>\r\n	<li>No s&eacute;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '2024-05-05 17:13:13', NULL, '2024-05-05 17:13:13'),
(20, 1, 3, 'Mi Huelva tiene una Ria', '1714936351.jpg', '<p>Y en ella un barco velero</p>', '2024-05-05 17:12:31', NULL, '2024-05-05 17:12:31'),
(25, 1, 2, 'La Reina de Saba', '1714936749.jpg', '<p>Muy viejo</p>', '2024-05-05 17:19:09', NULL, '2024-05-05 17:19:09'),
(26, 1, 16, 'La Niebla', '1714936996.jpg', '<blockquote>\r\n<p><strong>Libro de Stephen King muy terrorifico</strong></p>\r\n</blockquote>', '2024-05-05 17:23:16', NULL, '2024-05-05 17:23:16'),
(27, 1, 1, 'La rueda del tiempo', 'La Rueda del tiempo.jpg', 'Libro de aventuras de Robert Jordan', '2024-02-11 08:37:10', NULL, NULL),
(28, 1, 4, 'Las Cronicas De Narnia', '1714936518.jpg', '<p>De C.S. Lewis, el primero de una saga</p>', '2024-05-05 17:15:18', NULL, '2024-05-05 17:15:18'),
(35, 3, 16, 'Examen de DWES día 14 de mayo', '1715013686.jpg', 'Miedo no, pánico!', '2024-05-06 14:41:26', '2024-05-06 14:41:26', '2024-05-06 14:41:26'),
(34, 2, 4, 'Terminar el curso antes de Junio', '1715013557.jpg', 'No veo la hora', '2024-05-06 14:39:17', '2024-05-06 14:39:17', '2024-05-06 14:39:17'),
(31, 3, 16, 'Ultima prueba de hoy', '1714770034.jpg', 'vamos a ver si es la definitiva', '2024-05-03 19:00:34', '2024-05-03 19:00:34', '2024-05-03 19:00:34'),
(33, 1, 1, 'Victoria del Recre', '1715537779.png', '<p>Ayer 3-0 al Algeciras</p>', '2024-05-12 16:16:19', '2024-05-05 15:16:42', '2024-05-12 16:16:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb3_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '0001_01_01_000000_create_users_table', 1),
(22, '0001_01_01_000001_create_cache_table', 1),
(23, '0001_01_01_000002_create_jobs_table', 1),
(24, '2024_05_01_094212_create_categoria_table', 1),
(25, '2024_05_01_094351_create_entradas_table', 1),
(26, '2024_05_03_183055_add_apellidos_to_users_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb3_unicode_ci,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('d3fnLrfNC4Sjqp3GzAqJjOIWAWbggzS6FwBzOir3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia0RUUUw1WnNzSXVRc2R2RG1ydkJMb0xXMWVpVkRJcmZ6bzRZWTJ2SiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly93d3cudGFyZWFvbmxpbmU2LmNvbS9lbnRyYWRhcz9idXNjYXI9dGl0dWxvIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1715889417);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nick` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'user',
  `imagen_avatar` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_nick_unique` (`nick`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nick`, `name`, `apellidos`, `email`, `role`, `imagen_avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cayegol', 'Cayetano', 'Quintana Hernandez', 'cayegol@gmail.com', 'Admin', 'CayeQuintana.png', NULL, '$2y$12$OzD1KW6k1R9WYYDdGRao1uhqTeUtuWCgoB.mpHMEQD1.cuqopKw.2', NULL, '2024-05-03 14:58:54', '2024-05-03 14:58:54'),
(2, 'Ninja', 'Antonio', 'Dominguez Sacramento', 'ninjadominguez@gmail.com', 'user', 'AntonioDominguez.png', NULL, '$2y$12$C.MmYRBVlk0h28wZuvlLFeOvpuMH5XPJAFfTtbBQ/bkTA4px5.a/C', NULL, '2024-05-03 15:01:37', '2024-05-03 15:01:37'),
(3, 'Gato', 'Ruben', 'Ramos Gonzalez', 'gatoaracena@gmail.com', 'user', 'ruben1.png', NULL, '$2y$12$m3JUXwj3tcUDGI5z93lO2OZJb2CRdKNkzP42Ep9eoEvrTgzlla0sa', NULL, '2024-05-03 17:02:07', '2024-05-03 17:02:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
