-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 04:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `megawealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `building_types`
--

CREATE TABLE `building_types` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_types`
--

INSERT INTO `building_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
('96c6331b-318e-40f1-a2bd-762130252f7b', 'Apartment', '2022-07-13 23:27:31', '2022-07-13 23:27:31'),
('96c6331b-65b5-42f2-81cd-20d399af63f5', 'House', '2022-07-13 23:27:31', '2022-07-13 23:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realEstateId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userId`, `realEstateId`, `created_at`, `updated_at`) VALUES
('6b7c5044-b7a5-40b0-b01f-07db9671cabb', '96c63311-1efa-41bc-ba4b-657b07732e2c', '96c63323-2529-4f89-b8e2-edb4efe0b488', '2022-07-19 01:53:40', '2022-07-19 01:53:40'),
('96c63329-c042-4dc2-bd02-13beb801ea57', '96c63312-3dde-463a-a9a4-ac00db1a4a98', '96c63322-fcc9-4779-affa-fb7b3714990e', '2022-07-13 23:27:42', '2022-07-13 23:27:42'),
('96c6332a-182e-4ecd-b590-ba054964fc31', '96c63312-62b9-4dc2-8915-38ad271901fa', '96c63323-3300-420b-8cef-b41fb3bf3c72', '2022-07-13 23:27:43', '2022-07-13 23:27:43'),
('96c6332a-5b5b-43f7-a7c9-194128bd80ef', '96c63312-3dde-463a-a9a4-ac00db1a4a98', '96c63323-0b29-4536-b391-593fd8f108b7', '2022-07-13 23:27:43', '2022-07-13 23:27:43'),
('96c6332a-cb6c-4159-8564-93ff7ddb670d', '96c63311-f73d-41ba-a494-2463aa88e33f', '96c63321-d77d-4d72-b1fe-6e9f1df0699d', '2022-07-13 23:27:43', '2022-07-13 23:27:43'),
('96c6332a-f8db-473b-a038-548be5702d2f', '96c63312-62b9-4dc2-8915-38ad271901fa', '96c63323-1d34-4c22-9ea5-17d903bbdc78', '2022-07-13 23:27:43', '2022-07-13 23:27:43'),
('96c6332b-50ab-4686-a370-bf30cdbfd79a', '96c63312-1cca-4333-ad99-a47af9f239f0', '96c63323-292e-40b6-8b04-e8bad2dacd4d', '2022-07-13 23:27:43', '2022-07-13 23:27:43'),
('96c6332b-8517-4546-a52b-c88c578c9ba9', '96c63312-3dde-463a-a9a4-ac00db1a4a98', '96c63323-1bb5-4d48-aac7-2f55946eda44', '2022-07-13 23:27:43', '2022-07-13 23:27:43'),
('96c6332b-cc8b-460a-b635-e80616f53f8d', '96c63312-1cca-4333-ad99-a47af9f239f0', '96c63322-f6b6-4c05-a9a5-347d4d1d4953', '2022-07-13 23:27:43', '2022-07-13 23:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realEstateId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`id`, `transactionId`, `realEstateId`, `created_at`, `updated_at`) VALUES
('96c6646b-da8e-4aa7-bd41-bbb81b8e7ae3', '96c66469-b362-4f21-aa85-61e808011789', '96c6331f-8d27-4224-bd1a-84cd0f196bab', '2022-07-14 01:45:24', '2022-07-14 01:45:24'),
('96c6646c-99dd-41aa-be21-3ee26b0c5dac', '96c66469-b362-4f21-aa85-61e808011789', '96c63323-07fe-4280-b4b9-0c11df82826f', '2022-07-14 01:45:25', '2022-07-14 01:45:25'),
('96c6646c-f615-4ead-9a00-035db1cc6db3', '96c66469-b362-4f21-aa85-61e808011789', '96c63321-ad3e-4107-905b-70d8d3e38c3b', '2022-07-14 01:45:25', '2022-07-14 01:45:25'),
('96c6646d-1f40-4b69-9b41-2bff1dfc96dd', '96c66469-b362-4f21-aa85-61e808011789', '96c63323-0423-488a-b53f-dbd079e92c7e', '2022-07-14 01:45:25', '2022-07-14 01:45:25'),
('96c66572-f132-40f3-a31e-062017a621a2', '96c66572-d18b-42aa-bd9b-3b9a40549909', '96c63321-5ee5-4ec6-8eeb-01c78fa056bf', '2022-07-14 01:48:17', '2022-07-14 01:48:17'),
('96d07545-8cdc-48c2-91a1-565cdd078a72', '96d07543-fa5e-4597-aa73-8c25f44d6d89', '96c63321-0e4c-499b-96c9-e228bad7c6c0', '2022-07-19 01:50:48', '2022-07-19 01:50:48'),
('96d07582-242a-4f6d-99ff-1cb2617cd906', '96d07582-0ef3-4f91-b883-ef452e11cca1', '96c63322-28fe-403c-b2ed-9fde1e9d74ba', '2022-07-19 01:51:28', '2022-07-19 01:51:28'),
('96d075d2-02d8-4f35-8739-3fbcd679653d', '96d075d1-ebb3-4414-8c63-ada4b7a2ccde', '96c63323-135d-46a7-9cb7-0972fe8963d8', '2022-07-19 01:52:20', '2022-07-19 01:52:20'),
('96d075d2-2bed-4131-b2bd-f5e878ad921e', '96d075d1-ebb3-4414-8c63-ada4b7a2ccde', '96c63323-2744-4d55-9c37-8084530e90c9', '2022-07-19 01:52:20', '2022-07-19 01:52:20'),
('96d075d2-a22a-418b-a4ed-f241a5b4ea0a', '96d075d1-ebb3-4414-8c63-ada4b7a2ccde', '96c63323-0ffc-4ce9-8d7a-b591bb533c08', '2022-07-19 01:52:21', '2022-07-19 01:52:21'),
('96d075d3-1306-42b7-8cfa-c38b46e90388', '96d075d1-ebb3-4414-8c63-ada4b7a2ccde', '96c63321-8fe6-4885-8938-1fd027aefd38', '2022-07-19 01:52:21', '2022-07-19 01:52:21'),
('96d075d4-1b0a-4073-9eae-0ced0066473b', '96d075d1-ebb3-4414-8c63-ada4b7a2ccde', '96c63323-1fe3-48eb-baed-76b38851a051', '2022-07-19 01:52:21', '2022-07-19 01:52:21'),
('96d075d4-cc22-43d4-b50f-514bc0654768', '96d075d1-ebb3-4414-8c63-ada4b7a2ccde', '96c63321-c0b9-4a2b-bcf2-629655dbadd7', '2022-07-19 01:52:22', '2022-07-19 01:52:22'),
('96d0762d-301a-4a8e-ae27-a4717382bf68', '96d0762d-180c-4a1c-9fef-daf20b1fd9c2', '96c63322-f8c6-4fee-a380-9670710a75e9', '2022-07-19 01:53:20', '2022-07-19 01:53:20'),
('96d07678-4201-476b-a85a-c18d2287b36b', '96d07678-24fd-41a1-9864-e30c184173ff', '96c6331f-bb74-4ae6-b81f-70580d3f0b90', '2022-07-19 01:54:09', '2022-07-19 01:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_04_06_143833_create_offices_table', 1),
(11, '2022_06_28_091954_create_building_types_table', 1),
(12, '2022_06_28_092156_create_sales_types_table', 1),
(13, '2022_06_28_092253_create_status_real_estates_table', 1),
(14, '2022_06_28_144836_create_real_estates_table', 1),
(15, '2022_06_28_145847_create_carts_table', 1),
(16, '2022_07_01_173124_create_transactions_table', 1),
(17, '2022_07_14_061319_create_detail_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('3e815e7d113e77db746874b1d16103a3578225e8c5198b4989095acde4026a2357fd12bf9b6d8dc5', '96c63eb3-af95-4917-9fbd-7aad88a07589', '96c657d8-4ab3-444a-b89b-32a848493c1e', 'Bearer Token', '[]', 0, '2022-07-14 01:11:04', '2022-07-14 01:11:04', '2023-07-14 08:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('96c657d8-4ab3-444a-b89b-32a848493c1e', NULL, 'Laravel Personal Access Client', 'TKCyk4uamIUr1kU2bKAwzRSwuYidfk6dWbQPNDRT', NULL, 'http://localhost', 1, 0, 0, '2022-07-14 01:10:14', '2022-07-14 01:10:14'),
('96c657d8-9f75-4740-b707-63c71801a1dc', NULL, 'Laravel Password Grant Client', 'qo81mxajug56hWxjmrBMD0Za23H85KOTMpK8Ldeu', 'users', 'http://localhost', 0, 1, 0, '2022-07-14 01:10:15', '2022-07-14 01:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '96c657d8-4ab3-444a-b89b-32a848493c1e', '2022-07-14 01:10:14', '2022-07-14 01:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name`, `address`, `contactName`, `phone`, `image`, `created_at`, `updated_at`) VALUES
('96c63314-4d88-4d9d-a796-698471a66886', 'Cikurut Office', 'Jl. Cikurut No. 4, Cikurut, Kota Bandung, Jawa Barat 40133', 'Anton Surya', '089614568833', 'office11.jpg', '2022-07-13 23:27:26', '2022-07-13 23:27:26'),
('96c63314-c122-40f0-80fb-7b5e7134f772', 'Cikutra Office', 'Jl. Cikutra No. 1, Cikutra, Kota Bandung, Jawa Barat 40132', 'Jaya Kusuma', '089614568840', 'office1.jpg', '2022-07-13 23:27:26', '2022-07-13 23:27:26'),
('96c63314-e278-4a84-abea-a52bb7003d6a', 'Ciputra Office', 'Jl. Ciputra No. 1, Ciputra, Jakarta Barat, DKI Jakarta 11432', 'Budi Andri', '081808188888', 'office2.jpg', '2022-07-13 23:27:26', '2022-07-13 23:27:26'),
('96c63315-02ed-4516-9c20-81262603459f', 'BSD Office', 'Jl. BSD No. 1, Serpong, Tangerang Selatan, Banten 21311', 'Kesuma', '082233333333', 'office3.jpg', '2022-07-13 23:27:27', '2022-07-13 23:27:27'),
('96c63315-4e27-47e3-8e0e-8a8c96cb2301', 'Pluit Office', 'Jl. Pluit Raya No. 2, Pluit, Jakarta Utara, DKI Jakarta 31231', 'Kolawit', '082123134567', 'office4.jpg', '2022-07-13 23:27:27', '2022-07-13 23:27:27'),
('96c63315-b05d-4220-9b01-3e93414b30c1', 'Percetakan Office', 'Jl. Percetakan Negara 1 No. 3, Cempaka Putih, Jakarta Pusat, DKI Jakarta 12345', 'Ronald', '081212122133', 'office5.jpg', '2022-07-13 23:27:27', '2022-07-13 23:27:27'),
('96c63316-00dd-467d-b8ee-273c000df89d', 'Kemang Office', 'Jl. Kemang Raya No. 4, Kemang, Jakarta Selatan, DKI Jakarta 21322', 'Ariana', '082245678901', 'office6.jpg', '2022-07-13 23:27:27', '2022-07-13 23:27:27'),
('96c63316-5c0a-4376-825d-ed4d2fc34d35', 'Bungur Office', 'Jl. Bungur No. 3, Mampang, Jakarta Selatan, DKI Jakarta 21322', 'Chandra', '081825409876', 'office7.jpg', '2022-07-13 23:27:27', '2022-07-13 23:27:27'),
('96c63316-9d51-4843-a1c2-20c4fb399516', 'Foresta 1 Office', 'Jl. Pagedangan No. 3, Pagedangan, Tangerang, Banten 21311', 'Siti', '082345678910', 'office8.jpg', '2022-07-13 23:27:28', '2022-07-13 23:27:28'),
('96c63316-bdb3-4c10-a5d2-b2659061cd49', 'Foresta 2 Office', 'Jl. Pagedangan No. 6, Pagedangan, Tangerang, Banten 21311', 'Nur Azizah', '085678904568', 'office9.jpg', '2022-07-13 23:27:28', '2022-07-13 23:27:28'),
('96c63317-0ba6-4191-b97a-46db778f2b2f', 'Menara Office', 'Jl. M.H. Thamrin No. 1, Tanah Abang, Jakarta Pusat, DKI Jakarta 12346', 'Kesuma', '082233333333', 'office10.jpg', '2022-07-13 23:27:28', '2022-07-13 23:27:28'),
('96c63317-2c4b-49ba-89c4-6ef01a736833', 'Braun Inc', '1654 Judah Junction Suite 859\nNorth Preston, MS 00675', 'Prof. Orlo Volkman', '+16814502525', 'office.jpg', '2022-07-13 23:27:28', '2022-07-13 23:27:28'),
('96c63317-2ca9-497f-a28f-f765b65a8abd', 'Kris LLC', '96565 Marisa Track Suite 246\nKyleeborough, AK 59428-4725', 'Cary Lind', '1-626-864-8066', 'office.jpg', '2022-07-13 23:27:28', '2022-07-13 23:27:28'),
('96c63317-2ccd-42a2-b5e0-b1b9ec4c31fb', 'Mayert, Dickens and Bogisich', '92179 Dante Creek\nRyanborough, NE 18228-6804', 'Dr. Zachery Luettgen DVM', '+1 (737) 384-7354', 'office.jpg', '2022-07-13 23:27:28', '2022-07-13 23:27:28'),
('96c63317-2ced-43fb-83d3-3e74d2bbabec', 'Auer, Zulauf and Hilpert', '8972 Stiedemann Mountain\nNew Marachester, MN 80759-4955', 'Mervin Armstrong', '+1-253-787-7687', 'office.jpg', '2022-07-13 23:27:28', '2022-07-13 23:27:28'),
('96c63317-2d0a-42e5-8791-dfeceb63d75c', 'Metz Group', '2344 Howard Cliffs\nPinkburgh, AR 51241', 'Keenan Deckow', '386.964.5652', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2d27-446b-9813-bfc2fedb3b32', 'Ebert Group', '191 Garrett Common Suite 342\nPort Janicestad, IL 57736-3744', 'Justine Grant', '+1-850-879-4056', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2d46-4f95-b4cb-7735d28257f0', 'Murray, Kuhn and West', '303 Noemi Views Suite 782\nZemlakborough, TN 71585', 'Evelyn Witting', '(309) 759-5549', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2d64-4afa-ba92-942d61596587', 'O\'Kon, Farrell and Hills', '47278 Newell Mountain Apt. 582\nEast Lempi, AK 85901', 'Caesar Quitzon', '1-901-303-4542', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2d83-409c-98bd-fbddefe3a479', 'Champlin, Stiedemann and Sipes', '711 Curt Tunnel\nPriceport, LA 02785', 'Prof. Izaiah Fritsch', '+16064891973', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2da1-44b0-93b8-fc76a5d59869', 'Kozey, Torphy and Kutch', '930 Bernadine Estates Suite 130\nPreciousfurt, GA 37444-8735', 'Bonnie Schulist', '+1 (760) 620-2303', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2dbf-4761-95de-185dd3bb7ab2', 'Orn, Schroeder and Gislason', '309 Bednar Turnpike Suite 362\nHandhaven, NY 32012-6715', 'Lucius Ebert Sr.', '+12243502215', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2de2-4a80-8d56-6abef132ce9b', 'Wiegand PLC', '5999 Yolanda Via\nEast Joanne, NC 52202-7651', 'Gilberto Bogisich DDS', '469.658.1902', 'office.jpg', '2022-07-13 23:27:29', '2022-07-13 23:27:29'),
('96c63317-2e07-4552-be21-b4e656e37be2', 'Schulist Ltd', '717 Daugherty Cape Apt. 598\nMaeganstad, OR 41499-1831', 'Madyson Cummings', '+19319000389', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30'),
('96c63317-2e2f-47d1-a6d0-584c9445a458', 'Schimmel Ltd', '40256 Larue Fork\nMertzfort, VA 34775', 'Prof. Alexa Bernhard V', '+1-814-935-9108', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30'),
('96c63317-2e56-40b2-a030-898b12e97cd9', 'Walsh, Halvorson and Bins', '16098 McDermott Burgs\nColefurt, KS 52006', 'Jazmyne Hills', '1-240-472-6987', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30'),
('96c63317-2e7d-498a-b15d-57b92bae3273', 'Dicki, Nienow and Hermiston', '8796 Brad Mountains\nNew Leonie, VA 48630', 'Benny Strosin', '678.493.5526', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30'),
('96c63317-2e9f-4b17-9fe9-7edf203187bd', 'Little-Botsford', '2297 Rath Viaduct Suite 190\nWindlermouth, WI 40804-4114', 'Lenora Keeling', '1-765-942-8565', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30'),
('96c63317-2ec2-48e1-b758-f7aafe3d1d40', 'Doyle, Mills and Lockman', '5105 Runolfsson Court\nWest Thelmaview, MT 49400', 'Catharine Spencer', '+1.832.949.3157', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30'),
('96c63317-2edf-490e-802f-e1fb6c344612', 'Fay LLC', '98834 Lennie Landing\nLake Leoniebury, ND 86122-7493', 'Miss Margaret Graham Sr.', '1-802-354-6333', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30'),
('96c63317-2f83-4367-9c71-35a495017440', 'McLaughlin-Bergstrom', '625 Celestine Park Suite 864\nLake Kathleen, OH 86888-1818', 'Irwin Stehr MD', '984.430.0370', 'office.jpg', '2022-07-13 23:27:30', '2022-07-13 23:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `real_estates`
--

CREATE TABLE `real_estates` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesTypeId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buildingTypeId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estates`
--

INSERT INTO `real_estates` (`id`, `salesTypeId`, `buildingTypeId`, `price`, `location`, `statusId`, `image`, `created_at`, `updated_at`) VALUES
('96c6331d-4c4a-447e-8c38-7af7a4772087', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 500, 'Meikarta, Jakarta', '96c6331c-5af1-436a-bff9-adb3351755d9', 'real11.jpg', '2022-07-13 23:27:32', '2022-07-13 23:27:32'),
('96c6331e-4eef-4fe6-ac7a-e489edc93b47', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 910, 'Tanjung Duren, Jakarta', '96c6331c-5af1-436a-bff9-adb3351755d9', 'real14.jpg', '2022-07-13 23:27:33', '2022-07-19 03:17:35'),
('96c6331f-1602-452d-a365-541961ae46b2', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 430, 'Pancoran, Jakarta', '96c6331c-5af1-436a-bff9-adb3351755d9', 'real15.jpg', '2022-07-13 23:27:33', '2022-07-13 23:27:33'),
('96c6331f-8d27-4224-bd1a-84cd0f196bab', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 700, 'Pluit, Jakarta', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real1.jpg', '2022-07-13 23:27:33', '2022-07-14 01:45:24'),
('96c6331f-bb74-4ae6-b81f-70580d3f0b90', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 600, 'PIK 1, Jakarta', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real4.jpg', '2022-07-13 23:27:34', '2022-07-19 01:54:09'),
('96c6331f-f729-4a7f-83c7-5baf91882c73', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 400, 'Rajawali, Jakarta', '96c6331c-5af1-436a-bff9-adb3351755d9', 'real6.jpg', '2022-07-13 23:27:34', '2022-07-13 23:27:34'),
('96c63320-1442-4fde-9222-fba508d6c1ac', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 625, 'Gandaria, Jakarta', '96c6331c-5af1-436a-bff9-adb3351755d9', 'real10.jpg', '2022-07-13 23:27:34', '2022-07-13 23:27:34'),
('96c63321-0e4c-499b-96c9-e228bad7c6c0', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 41300, 'Bungur, Jakarta', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real2.jpg', '2022-07-13 23:27:34', '2022-07-19 01:50:48'),
('96c63321-5ee5-4ec6-8eeb-01c78fa056bf', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 15800, 'Pondok Indah, Jakarta', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real3.jpg', '2022-07-13 23:27:35', '2022-07-14 01:48:17'),
('96c63321-8fe6-4885-8938-1fd027aefd38', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 45000, 'Pondok Indah, Jakarta', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real5.jpg', '2022-07-13 23:27:35', '2022-07-19 01:52:21'),
('96c63321-ad3e-4107-905b-70d8d3e38c3b', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 27100, 'PIK 2, Jakarta', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real7.jpg', '2022-07-13 23:27:35', '2022-07-14 01:45:25'),
('96c63321-c0b9-4a2b-bcf2-629655dbadd7', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 19600, 'Pluit, Jakarta', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real8.jpg', '2022-07-13 23:27:35', '2022-07-19 01:52:22'),
('96c63321-d77d-4d72-b1fe-6e9f1df0699d', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 50450, 'Slipi, Jakarta', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'real12.jpg', '2022-07-13 23:27:35', '2022-07-13 23:27:41'),
('96c63322-28fe-403c-b2ed-9fde1e9d74ba', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 61450, 'Serpong, Tanggerang', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'real13.jpg', '2022-07-13 23:27:35', '2022-07-19 01:51:28'),
('96c63322-73ca-4446-9aa7-2f8d4153db07', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 71450, 'BSD, Tanggerang', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'apartment.jpg', '2022-07-13 23:27:35', '2022-07-13 23:27:35'),
('96c63322-841f-4af5-97c2-bce620f8af34', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 454, 'Serpong, Tanggerang', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'house.jpg', '2022-07-13 23:27:35', '2022-07-13 23:27:35'),
('96c63322-f6b6-4c05-a9a5-347d4d1d4953', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 86, '8928 Arjun Viaduct Suite 023\nLake Mathias, NH 17821', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'house.jpg', '2022-07-13 23:27:36', '2022-07-13 23:27:41'),
('96c63322-f8c6-4fee-a380-9670710a75e9', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 80977, '36615 Gusikowski Rest\nMyaborough, NC 74738', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'house.jpg', '2022-07-13 23:27:36', '2022-07-19 01:53:20'),
('96c63322-fa83-4a4d-b7f2-7bee1b0f2da8', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 735, '36973 Langworth Hills Apt. 852\nCandelarioberg, NM 35248', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:36', '2022-07-13 23:27:36'),
('96c63322-fcc9-4779-affa-fb7b3714990e', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 97089, '425 Bednar View Apt. 430\nJunefort, AZ 95518', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'house.jpg', '2022-07-13 23:27:36', '2022-07-13 23:27:40'),
('96c63322-ffce-4dee-97a7-1d011b2a4f2d', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 842, '299 Quinton Pines Apt. 276\nNew Elisha, MN 90909-7801', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:36', '2022-07-13 23:27:36'),
('96c63323-0423-488a-b53f-dbd079e92c7e', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 16969, '8673 Daniel Spring Suite 773\nLake Hailey, SD 05412', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'house.jpg', '2022-07-13 23:27:37', '2022-07-14 01:45:25'),
('96c63323-07fe-4280-b4b9-0c11df82826f', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 25421, '98537 Luz Gardens\nBartellmouth, ND 22194', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'apartment.jpg', '2022-07-13 23:27:37', '2022-07-14 01:45:25'),
('96c63323-0b29-4536-b391-593fd8f108b7', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 805, '883 Baumbach Vista\nGoldenberg, GA 96013', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'apartment.jpg', '2022-07-13 23:27:37', '2022-07-13 23:27:40'),
('96c63323-0d9d-4f26-aff8-a9cdd10b8c78', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 57244, '81401 Leone Drives\nSouth Elvera, KY 62974', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:37', '2022-07-13 23:27:37'),
('96c63323-0ffc-4ce9-8d7a-b591bb533c08', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 80229, '152 Heathcote Stravenue\nRickeyshire, AZ 92943', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'apartment.jpg', '2022-07-13 23:27:37', '2022-07-19 01:52:21'),
('96c63323-135d-46a7-9cb7-0972fe8963d8', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 42175, '73671 Kautzer Street Suite 787\nBoscoborough, VA 81060-5932', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'apartment.jpg', '2022-07-13 23:27:37', '2022-07-19 01:52:20'),
('96c63323-14d7-49d7-ae28-6b148cb27786', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 952, '58347 Cole Tunnel Suite 920\nBernierchester, MT 43212', '96c6331c-5af1-436a-bff9-adb3351755d9', 'apartment.jpg', '2022-07-13 23:27:37', '2022-07-13 23:27:37'),
('96c63323-17c4-492f-84d8-f4c2bceb127c', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 763, '6325 Felicia Street Suite 506\nSouth Margaretta, WV 87876-1352', '96c6331c-5af1-436a-bff9-adb3351755d9', 'apartment.jpg', '2022-07-13 23:27:38', '2022-07-13 23:27:38'),
('96c63323-19d3-44fa-a16f-3b98cbecf1e7', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 76426, '519 Funk Common\nLake Selmerborough, WV 23448', '96c6331c-5af1-436a-bff9-adb3351755d9', 'apartment.jpg', '2022-07-13 23:27:38', '2022-07-13 23:27:38'),
('96c63323-1bb5-4d48-aac7-2f55946eda44', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 138, '7372 Annalise Land Suite 737\nLake Helena, AL 81296-1646', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'apartment.jpg', '2022-07-13 23:27:38', '2022-07-13 23:27:41'),
('96c63323-1d34-4c22-9ea5-17d903bbdc78', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 242, '978 Ebba Valley\nWest Mervin, MS 37674', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'apartment.jpg', '2022-07-13 23:27:38', '2022-07-13 23:27:41'),
('96c63323-1fe3-48eb-baed-76b38851a051', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 64120, '6220 Phoebe Estate\nDickinsonburgh, WI 25749', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'house.jpg', '2022-07-13 23:27:38', '2022-07-19 01:52:22'),
('96c63323-2236-4aa6-ae81-64948013bef7', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 77884, '1182 White Via\nPort Evertshire, NJ 84791-6953', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:38', '2022-07-13 23:27:38'),
('96c63323-2529-4f89-b8e2-edb4efe0b488', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 23996, '873 Wolff Stravenue\nSouth Mattbury, OR 65305', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'apartment.jpg', '2022-07-13 23:27:39', '2022-07-19 01:53:41'),
('96c63323-2744-4d55-9c37-8084530e90c9', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 226, '7700 Aaron Prairie Apt. 342\nMadelynnland, IN 88036-7439', '96c6331c-dba1-4f98-bfda-e45512d6d976', 'house.jpg', '2022-07-13 23:27:39', '2022-07-19 01:52:20'),
('96c63323-292e-40b6-8b04-e8bad2dacd4d', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 13162, '4170 Jamarcus Tunnel\nPort Aftonport, MS 59960-2368', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'apartment.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:41'),
('96c63323-2b4d-4b91-9589-af765b7697df', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 253, '246 Mraz Shoal Suite 049\nUptonborough, SD 65859', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:39'),
('96c63323-2d66-4cc0-b467-cce798619f7b', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 89090, '45164 Kristy Passage Suite 582\nFernside, CO 04992', '96c6331c-5af1-436a-bff9-adb3351755d9', 'apartment.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:39'),
('96c63323-2eff-4c8c-9837-cef9f80eeff4', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 641, '5116 Bogan Fords Apt. 403\nGustaveborough, FL 81455-5534', '96c6331c-5af1-436a-bff9-adb3351755d9', 'apartment.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:39'),
('96c63323-3117-4ed2-8f32-0d3f9a79bba9', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 64033, '2539 Percival Mews\nPort Gustaveberg, WY 61416-6750', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:39'),
('96c63323-3300-420b-8cef-b41fb3bf3c72', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-65b5-42f2-81cd-20d399af63f5', 78002, '147 Wiza Trace Apt. 757\nKristinaton, CO 68362-4921', '96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'house.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:40'),
('96c63323-3472-448a-ba1b-0d11eefec2e3', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-318e-40f1-a2bd-762130252f7b', 698, '873 Gulgowski Forks Apt. 057\nHermanntown, KS 44829-9638', '96c6331c-5af1-436a-bff9-adb3351755d9', 'apartment.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:39'),
('96c63323-3616-41ca-99ff-d08b964da7ac', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 536, '11802 Douglas Causeway\nUllrichmouth, IA 00085', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:39'),
('96c63323-382a-4570-a15d-98627ca03e80', '96c6331c-4287-4f90-adae-237efe9e648c', '96c6331b-318e-40f1-a2bd-762130252f7b', 92022, '345 Katelynn Spur Suite 413\nGeneview, AZ 77312', '96c6331c-5af1-436a-bff9-adb3351755d9', 'apartment.jpg', '2022-07-13 23:27:39', '2022-07-13 23:27:39'),
('96c63323-3abf-440f-95aa-9b80673f70e6', '96c6331b-8554-4c2d-9b1e-29a77066e396', '96c6331b-65b5-42f2-81cd-20d399af63f5', 990, '97706 Torey Lock\nBernhardshire, MA 51091', '96c6331c-5af1-436a-bff9-adb3351755d9', 'house.jpg', '2022-07-13 23:27:40', '2022-07-13 23:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `sales_types`
--

CREATE TABLE `sales_types` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_types`
--

INSERT INTO `sales_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
('96c6331b-8554-4c2d-9b1e-29a77066e396', 'Rent', '2022-07-13 23:27:31', '2022-07-13 23:27:31'),
('96c6331c-4287-4f90-adae-237efe9e648c', 'Sale', '2022-07-13 23:27:31', '2022-07-13 23:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `status_real_estates`
--

CREATE TABLE `status_real_estates` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_real_estates`
--

INSERT INTO `status_real_estates` (`id`, `name`, `created_at`, `updated_at`) VALUES
('96c6331c-5af1-436a-bff9-adb3351755d9', 'Open', '2022-07-13 23:27:31', '2022-07-13 23:27:31'),
('96c6331c-aa90-4a14-9bf5-763cbc01f91e', 'Cart', '2022-07-13 23:27:32', '2022-07-13 23:27:32'),
('96c6331c-dba1-4f98-bfda-e45512d6d976', 'Transaction Completed', '2022-07-13 23:27:32', '2022-07-13 23:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userId`, `created_at`, `updated_at`) VALUES
('96c66237-b637-485e-aac1-9740c961cea4', '96c63eb3-af95-4917-9fbd-7aad88a07589', '2022-07-14 01:39:15', '2022-07-14 01:39:15'),
('96c663b7-245c-40a4-98d4-adfdb5acbf96', '96c63eb3-af95-4917-9fbd-7aad88a07589', '2022-07-14 01:43:26', '2022-07-14 01:43:26'),
('96c66446-4f18-47be-bb16-0dde8fd8dae1', '96c63eb3-af95-4917-9fbd-7aad88a07589', '2022-07-14 01:45:00', '2022-07-14 01:45:00'),
('96c66469-b362-4f21-aa85-61e808011789', '96c63eb3-af95-4917-9fbd-7aad88a07589', '2022-07-14 01:45:23', '2022-07-14 01:45:23'),
('96c66572-d18b-42aa-bd9b-3b9a40549909', '96c63eb3-af95-4917-9fbd-7aad88a07589', '2022-07-14 01:48:17', '2022-07-14 01:48:17'),
('96d07543-fa5e-4597-aa73-8c25f44d6d89', '96c63311-a364-4bef-8199-b0e48e95350f', '2022-07-19 01:50:48', '2022-07-19 01:50:48'),
('96d07582-0ef3-4f91-b883-ef452e11cca1', '96c63312-3dde-463a-a9a4-ac00db1a4a98', '2022-07-19 01:51:28', '2022-07-19 01:51:28'),
('96d075d1-ebb3-4414-8c63-ada4b7a2ccde', '96c63311-1efa-41bc-ba4b-657b07732e2c', '2022-07-19 01:52:20', '2022-07-19 01:52:20'),
('96d0762d-180c-4a1c-9fef-daf20b1fd9c2', '96c63312-1cca-4333-ad99-a47af9f239f0', '2022-07-19 01:53:20', '2022-07-19 01:53:20'),
('96d07678-24fd-41a1-9864-e30c184173ff', '96c63311-1efa-41bc-ba4b-657b07732e2c', '2022-07-19 01:54:09', '2022-07-19 01:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
('96c63310-428e-422a-a8a7-eb19168e1974', 'Admin', 'admin@gmail.com', '$2y$10$6CPsJf6DW/EgqHTVz7bj.OwWI0vkK.psfp9WHqbyXDe54e5t7FsBq', 'Admin', '2022-07-13 23:27:24', '2022-07-13 23:27:24'),
('96c63311-1efa-41bc-ba4b-657b07732e2c', 'Member', 'member@gmail.com', '$2y$10$Fqx59iIOlfkU.U6/dqHyeuvUZCviRVwdp6faz2jTfPLYxLjOhN/UK', 'Member', '2022-07-13 23:27:24', '2022-07-13 23:27:24'),
('96c63311-a364-4bef-8199-b0e48e95350f', 'Gayle O\'Keefe Jr.', 'jillian.jones@example.net', '$2y$10$sqkqadem/3HzHYDRj0XFNOItgAFwH54z6PuVErbG4WWYZKfY0KQji', 'Member', '2022-07-13 23:27:25', '2022-07-13 23:27:25'),
('96c63311-f73d-41ba-a494-2463aa88e33f', 'Prof. Donnie Goyette II', 'dayton38@example.com', '$2y$10$Dtg1YL3m3uhwbMWfrMPEweYfbRAhiE/Q7HdzbRCNg3D09cgIOBrre', 'Member', '2022-07-13 23:27:25', '2022-07-13 23:27:25'),
('96c63312-1cca-4333-ad99-a47af9f239f0', 'Zora Lakin', 'hector13@example.com', '$2y$10$JXEh6W.IDO3T58DtYL3h2u7GZ/YujlVRpEcHEg5MDoYysDA4EnPUS', 'Member', '2022-07-13 23:27:25', '2022-07-13 23:27:25'),
('96c63312-3dde-463a-a9a4-ac00db1a4a98', 'Merl Smith', 'hegmann.emile@example.com', '$2y$10$6FxC6P8NJkMCufZOvQ.XHOijkGKLc/LA9vG7KZSFy./lTL2iQ3bZG', 'Member', '2022-07-13 23:27:25', '2022-07-13 23:27:25'),
('96c63312-62b9-4dc2-8915-38ad271901fa', 'Christian Beer', 'breana.hayes@example.com', '$2y$10$4kyUdPEO23Ee0kjd/nqN2efLydTIgXOc5VyvF8l0FCjehRwZrUNs.', 'Member', '2022-07-13 23:27:26', '2022-07-13 23:27:26'),
('96c63eb3-af95-4917-9fbd-7aad88a07589', 'frederic', 'fredericsetievi@gmail.com', '$2y$10$LhIic90RzJAOkN7j9NJ5X.ZuEFn8nLYvvcsim4YEYj7B3fmcdG3zG', 'Member', '2022-07-13 23:59:56', '2022-07-13 23:59:56'),
('96d0f2f4-34ed-4ff4-8c9b-e796ede01c6a', 'frederic', 'andreas@gmail.com', '$2y$10$ZE.CogkCt7/.9U0J7jEKfeFk7Z48s2lmiXyT6mkAccx5Ri6ZsFKZu', 'Member', '2022-07-19 07:42:15', '2022-07-19 07:42:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building_types`
--
ALTER TABLE `building_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_userid_foreign` (`userId`),
  ADD KEY `carts_realestateid_foreign` (`realEstateId`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transactions_transactionid_foreign` (`transactionId`),
  ADD KEY `detail_transactions_realestateid_foreign` (`realEstateId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `real_estates`
--
ALTER TABLE `real_estates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `real_estates_salestypeid_foreign` (`salesTypeId`),
  ADD KEY `real_estates_buildingtypeid_foreign` (`buildingTypeId`),
  ADD KEY `real_estates_statusid_foreign` (`statusId`);

--
-- Indexes for table `sales_types`
--
ALTER TABLE `sales_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_real_estates`
--
ALTER TABLE `status_real_estates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_userid_foreign` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_realestateid_foreign` FOREIGN KEY (`realEstateId`) REFERENCES `real_estates` (`id`),
  ADD CONSTRAINT `carts_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_realestateid_foreign` FOREIGN KEY (`realEstateId`) REFERENCES `real_estates` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `detail_transactions_transactionid_foreign` FOREIGN KEY (`transactionId`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `real_estates`
--
ALTER TABLE `real_estates`
  ADD CONSTRAINT `real_estates_buildingtypeid_foreign` FOREIGN KEY (`buildingTypeId`) REFERENCES `building_types` (`id`),
  ADD CONSTRAINT `real_estates_salestypeid_foreign` FOREIGN KEY (`salesTypeId`) REFERENCES `sales_types` (`id`),
  ADD CONSTRAINT `real_estates_statusid_foreign` FOREIGN KEY (`statusId`) REFERENCES `status_real_estates` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
