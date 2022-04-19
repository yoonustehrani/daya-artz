-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2022 at 04:15 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_daya`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `invoice_id`, `code`, `amount`, `title`, `active`, `paid_at`, `created_at`, `updated_at`) VALUES
('4a087ecb-673d-4297-8c54-12752e4ce4c2', 10, '915447', 4174700, 'تسویه سازمان استخراج و اکتشاف سعید', 0, NULL, '2022-03-29 18:13:46', '2022-03-29 18:13:46'),
('4b91f7f6-fbd5-46d1-a120-8685444cc683', 10, '900563', 2081900, 'تسویه موسسه کاریابی آرتان', 0, NULL, '2022-03-29 18:13:46', '2022-03-29 18:13:46'),
('96cbbe95-500d-4a83-b286-b2e57ad4f395', 11, '959386', 2725000, 'تسویه لوگو موسسه اعتباری نور', 0, NULL, '2022-04-01 15:07:30', '2022-04-01 15:07:30'),
('b7c13c12-8428-47ad-8f4d-47503cf3993c', 11, '872743', 223450, 'پیش پرداخت کارت ویزیت مربعی دو رو', 1, NULL, '2022-04-01 15:07:30', '2022-04-01 15:07:30'),
('b7e88a29-3d33-4e31-b753-1e14e1d44d54', 11, '326934', 223450, 'تسویه کارت ویزیت مربعی دو رو', 0, NULL, '2022-04-01 15:07:30', '2022-04-01 15:07:30'),
('c1a06f0c-10c9-4540-8c84-bbaeb3d9061d', 11, '868131', 2725000, 'پیش پرداخت لوگو موسسه اعتباری نور', 1, NULL, '2022-04-01 15:07:30', '2022-04-01 15:07:30'),
('d512ce0d-0e0b-4a6e-bf7e-8bbf826ad264', 10, '607125', 4065700, 'تسویه فولاد آروشا', 0, NULL, '2022-03-29 18:13:46', '2022-03-29 18:13:46'),
('f574a2d9-6be6-4559-9407-79919025531e', 10, '533924', 4065700, 'پیش پرداخت فولاد آروشا', 1, NULL, '2022-03-29 18:13:46', '2022-03-29 18:13:46'),
('fa064b02-db0d-4351-813c-10be113dbe3e', 10, '326012', 4174700, 'پیش پرداخت سازمان استخراج و اکتشاف سعید', 1, NULL, '2022-03-29 18:13:46', '2022-03-29 18:13:46'),
('fd245fbc-fd45-4640-8e99-77a80a879316', 10, '573855', 2081900, 'پیش پرداخت موسسه کاریابی آرتان', 1, NULL, '2022-03-29 18:13:46', '2022-03-29 18:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoreable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoreable_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `market_type` enum('classic','modern') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `business_type_id` bigint UNSIGNED DEFAULT NULL,
  `product_type_id` bigint UNSIGNED DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title`, `title_en`, `phone_number`, `address`, `website`, `market_type`, `user_id`, `business_type_id`, `product_type_id`, `intro`, `details`, `deleted_at`, `created_at`, `updated_at`) VALUES
('efd2c537-b78c-4a9d-bb09-8f61e598d9ea', 'دیجی کالا', NULL, '02128423542', NULL, NULL, 'classic', 1, NULL, NULL, 'کسب و کار فروش خرد اینترنتی', '{\"color\": \"#fb00ff\"}', NULL, '2022-03-29 18:06:26', '2022-03-29 18:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `definitions`
--

CREATE TABLE `definitions` (
  `id` bigint UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint UNSIGNED NOT NULL,
  `discountable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountable_id` bigint UNSIGNED NOT NULL,
  `value` int NOT NULL,
  `value_type` enum('amount','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_user`
--

CREATE TABLE `discount_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `discount_id` bigint UNSIGNED NOT NULL,
  `attempts` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '18f7091f-0422-4881-955a-c97566b86e5a', 'database', 'default', '{\"uuid\":\"18f7091f-0422-4881-955a-c97566b86e5a\",\"displayName\":\"App\\\\Listeners\\\\NotifyAdminsOfQuickOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":19:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\NotifyAdminsOfQuickOrder\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:30:\\\"App\\\\Events\\\\QuickOrderSubmitted\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";s:36:\\\"d5cb9713-2dee-4e91-9cf4-b486f75aec1e\\\";s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:4:\\\"data\\\";a:2:{s:12:\\\"phone_number\\\";s:11:\\\"09150013422\\\";s:8:\\\"fullname\\\";s:8:\\\"یونس\\\";}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"clockwork_id\":\"1649937060-1059-161181443\",\"clockwork_parent_id\":\"1649937058-9129-747981376\"}', 'GuzzleHttp\\Exception\\ConnectException: cURL error 7:  (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://api.telegram.org/bot5095238584:AAGT7GlypV8ZznQIDmowjPLEc0gMOndZJSw/sendMessage in /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php:210\nStack trace:\n#0 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php(158): GuzzleHttp\\Handler\\CurlFactory::createRejection()\n#1 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php(110): GuzzleHttp\\Handler\\CurlFactory::finishError()\n#2 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Handler/CurlHandler.php(47): GuzzleHttp\\Handler\\CurlFactory::finish()\n#3 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Handler/Proxy.php(28): GuzzleHttp\\Handler\\CurlHandler->__invoke()\n#4 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Handler/Proxy.php(48): GuzzleHttp\\Handler\\Proxy::GuzzleHttp\\Handler\\{closure}()\n#5 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/PrepareBodyMiddleware.php(64): GuzzleHttp\\Handler\\Proxy::GuzzleHttp\\Handler\\{closure}()\n#6 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Middleware.php(31): GuzzleHttp\\PrepareBodyMiddleware->__invoke()\n#7 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/RedirectMiddleware.php(71): GuzzleHttp\\Middleware::GuzzleHttp\\{closure}()\n#8 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Middleware.php(63): GuzzleHttp\\RedirectMiddleware->__invoke()\n#9 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/HandlerStack.php(75): GuzzleHttp\\Middleware::GuzzleHttp\\{closure}()\n#10 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Client.php(331): GuzzleHttp\\HandlerStack->__invoke()\n#11 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Client.php(168): GuzzleHttp\\Client->transfer()\n#12 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/Client.php(187): GuzzleHttp\\Client->requestAsync()\n#13 /home/yoonus/projects/daya-artz/vendor/guzzlehttp/guzzle/src/ClientTrait.php(95): GuzzleHttp\\Client->request()\n#14 /home/yoonus/projects/daya-artz/app/Http/Utils/TelegramBot.php(21): GuzzleHttp\\Client->post()\n#15 /home/yoonus/projects/daya-artz/app/Http/Utils/TelegramBot.php(43): App\\Http\\Utils\\TelegramBot->makeRequest()\n#16 /home/yoonus/projects/daya-artz/app/Listeners/NotifyAdminsOfQuickOrder.php(39): App\\Http\\Utils\\TelegramBot->sendMessage()\n#17 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Events/CallQueuedListener.php(107): App\\Listeners\\NotifyAdminsOfQuickOrder->handle()\n#18 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Events\\CallQueuedListener->handle()\n#19 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#21 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#22 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call()\n#23 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#24 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#25 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#27 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#28 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#29 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#30 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then()\n#31 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#32 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#33 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process()\n#35 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(329): Illuminate\\Queue\\Worker->runJob()\n#36 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->runNextJob()\n#37 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#38 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#41 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#42 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call()\n#43 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call()\n#44 /home/yoonus/projects/daya-artz/vendor/symfony/console/Command/Command.php(298): Illuminate\\Console\\Command->execute()\n#45 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()\n#46 /home/yoonus/projects/daya-artz/vendor/symfony/console/Application.php(1015): Illuminate\\Console\\Command->run()\n#47 /home/yoonus/projects/daya-artz/vendor/symfony/console/Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand()\n#48 /home/yoonus/projects/daya-artz/vendor/symfony/console/Application.php(171): Symfony\\Component\\Console\\Application->doRun()\n#49 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Console/Application.php(94): Symfony\\Component\\Console\\Application->run()\n#50 /home/yoonus/projects/daya-artz/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run()\n#51 /home/yoonus/projects/daya-artz/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#52 {main}', '2022-04-14 11:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `fileables`
--

CREATE TABLE `fileables` (
  `file_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileable_id` bigint UNSIGNED NOT NULL,
  `details` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('image','video','audio','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `path`, `thumbnail_path`, `external`, `name`, `ext`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
('38f333c4-030a-4152-83e9-da793b4cbb44', 'storage/images/sfpWSw3cub8bdHgC94BxeH9GcadytOconEBrMdKs.jpg', 'storage/images/tn_sfpWSw3cub8bdHgC94BxeH9GcadytOconEBrMdKs.jpg', 0, 'myphoto.jpg', 'jpg', 'image', '2022-03-31 13:26:09', '2022-03-31 13:26:09', NULL),
('6dd153d8-a379-4b1c-ae99-9b5444db2951', 'storage/images/ORK6mcVpJ6KchQlzPu7gLSAamrvzPgo0dugqCmI4.png', 'storage/images/tn_ORK6mcVpJ6KchQlzPu7gLSAamrvzPgo0dugqCmI4.png', 0, 'blog-12.png', 'png', 'image', '2022-03-29 16:43:05', '2022-03-29 16:43:05', NULL),
('816bdeab-c5e2-43f0-a627-c07ef0819a59', 'storage/images/bOil9ySugXxLvs4GuJL6zjz22Os4ybubugcWodYQ.jpg', 'storage/images/tn_bOil9ySugXxLvs4GuJL6zjz22Os4ybubugcWodYQ.jpg', 0, 'yoonus.jpg', 'jpg', 'image', '2022-03-31 13:25:05', '2022-03-31 13:25:05', NULL),
('833cf5d3-8978-4b9c-965f-dec55006b36f', 'storage/images/RC2fWj5qfVqL0ZD1lx7HkMt4cHm1b9axjnI9w1Wc.jpg', 'storage/images/tn_RC2fWj5qfVqL0ZD1lx7HkMt4cHm1b9axjnI9w1Wc.jpg', 0, 'blog-19.jpeg', 'jpg', 'image', '2022-03-29 16:51:00', '2022-03-29 16:51:00', NULL),
('c49e705a-a5e6-4db7-8d8d-c36c9f973149', 'storage/images/skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg', 'storage/images/tn_skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg', 0, 'blog-5.jpeg', 'jpg', 'image', '2022-03-29 16:48:52', '2022-03-29 16:48:52', NULL),
('cc19061d-8a3c-48a8-8a90-dc0c90275e11', 'storage/images/EEbWvnM7IHimySBfDQxd9IU7VlPTn5gJvdr7Jyzh.png', 'storage/images/tn_EEbWvnM7IHimySBfDQxd9IU7VlPTn5gJvdr7Jyzh.png', 0, 'Screenshot from 2022-04-02 03-15-19.png', 'png', 'image', '2022-04-03 13:04:40', '2022-04-03 13:04:40', NULL),
('e2db361d-e636-4a1f-9cf9-d097fccb6fff', 'storage/images/KDbjtvl2VghxTRaPAHxBcOhoITwr7trb6xEbJUro.png', 'storage/images/tn_KDbjtvl2VghxTRaPAHxBcOhoITwr7trb6xEbJUro.png', 0, 'Screenshot from 2022-03-27 17-02-05.png', 'png', 'image', '2022-04-01 22:00:39', '2022-04-01 22:00:39', NULL),
('fca2d29d-9a1a-49e6-82de-f11d9eec098f', 'storage/images/tv0zRfUAyQ4dk0IR0fnRMlsqAXoYT2uaQIXOsjlS.png', 'storage/images/tn_tv0zRfUAyQ4dk0IR0fnRMlsqAXoYT2uaQIXOsjlS.png', 0, 'firefox.png', 'png', 'image', '2022-03-30 12:37:25', '2022-03-30 12:37:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint UNSIGNED NOT NULL,
  `file_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_type`, `imageable_id`, `file_id`, `alt`, `title`, `caption`) VALUES
(1, 'App\\Models\\Post', 1, 'fca2d29d-9a1a-49e6-82de-f11d9eec098f', NULL, NULL, NULL),
(6, 'App\\Models\\Zeus\\Post', 2, 'e2db361d-e636-4a1f-9cf9-d097fccb6fff', 'مرد لپ تاپی', NULL, NULL),
(7, 'App\\Models\\Post', 2, 'e2db361d-e636-4a1f-9cf9-d097fccb6fff', 'مرد لپ تاپی', NULL, NULL),
(40, 'App\\Models\\Portfolio', 1, '6dd153d8-a379-4b1c-ae99-9b5444db2951', 'alt 1', NULL, NULL),
(41, 'App\\Models\\Portfolio', 1, 'c49e705a-a5e6-4db7-8d8d-c36c9f973149', 'alt 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `multipay` tinyint(1) NOT NULL,
  `total` bigint DEFAULT NULL,
  `discount_id` bigint UNSIGNED DEFAULT NULL,
  `offer_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `active`, `title`, `user_id`, `multipay`, `total`, `discount_id`, `offer_id`, `order_id`, `expires_at`, `paid_at`, `created_at`, `updated_at`) VALUES
(11, 1, 'فاکتور سفارش کارت ویزیت و لوگو', 1, 1, 5896900, NULL, NULL, 'b8483c05-e20c-4eec-bea7-45abf45e0572', NULL, NULL, '2022-04-01 15:06:55', '2022-04-01 15:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(30, 'default', '{\"uuid\":\"051866ea-9493-43a1-84fb-d978d89c6a8f\",\"displayName\":\"App\\\\Listeners\\\\NotifyAdminsOfQuickOrder\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":19:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\NotifyAdminsOfQuickOrder\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:30:\\\"App\\\\Events\\\\QuickOrderSubmitted\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";s:36:\\\"4da09306-c5e6-448a-90a7-9287ae9cca92\\\";s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:4:\\\"data\\\";a:2:{s:12:\\\"phone_number\\\";s:11:\\\"09365746828\\\";s:8:\\\"fullname\\\";s:10:\\\"مسلمی\\\";}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"clockwork_id\":\"1649937544-6578-1444378425\",\"clockwork_parent_id\":\"1649937543-4909-353557588\"}', 0, NULL, 1649937664, 1649937544);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `name`) VALUES
(1, 'منوی اصلی', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int DEFAULT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `order` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `details` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `parent_id`, `menu_id`, `order`, `title`, `route`, `path`, `details`) VALUES
(1, NULL, 1, 0, 'خانه', 'home', '#', '{\"icon_class\": \"d-md-none fas fa-home\"}'),
(2, NULL, 1, 1, 'خدمات طراحی گرافیکی', 'services.index', '#', '{\"icon_class\": \"d-md-none fas fa-paint-brush\"}'),
(3, NULL, 1, 2, 'مقالات', 'blog.index', '#', '{\"icon_class\": \"d-md-none fas fa-blog\"}'),
(4, NULL, 1, 3, 'درباره ما', 'about', '#', '{\"icon_class\": \"d-md-none fas fa-building\"}'),
(5, NULL, 1, 4, 'تماس با ما', 'contact', '#', '{\"icon_class\": \"d-md-none fas fa-headset\"}'),
(6, NULL, 1, 5, 'شرایط و ضوابط', 'policy', '#', '{\"icon_class\": \"d-md-none fas fa-rule\"}');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_01_26_183339_create_settings_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_02_24_020700_create_discounts_table', 1),
(7, '2020_02_24_021215_create_discount_user_table', 1),
(8, '2020_10_06_041413_create_offers_table', 1),
(9, '2020_10_24_024156_create_offer_user_table', 1),
(10, '2021_09_19_181219_create_verification_codes_table', 1),
(11, '2021_09_24_135413_create_definitions_table', 1),
(12, '2021_09_24_193553_create_services_table', 1),
(13, '2021_09_24_193804_create_service_plans_table', 1),
(14, '2021_09_24_231953_create_companies_table', 1),
(15, '2021_09_27_111903_create_orders_table', 1),
(16, '2021_09_27_111933_create_order_items_table', 1),
(17, '2021_10_01_024315_create_invoices_table', 1),
(18, '2021_10_01_025502_create_bills_table', 1),
(19, '2021_10_01_031532_create_transactions_table', 1),
(20, '2021_10_11_033552_create_ticket_departments_table', 1),
(21, '2021_10_11_034211_create_tickets_table', 1),
(24, '2021_11_21_020740_create_zeus_roles_table', 1),
(25, '2021_11_21_025857_create_zeus_users_table', 1),
(26, '2021_11_21_030039_create_zeus_permissions_table', 1),
(27, '2021_11_21_030142_create_zeus_permissions_user_table', 1),
(28, '2021_11_21_030804_create_zeus_role_user_table', 1),
(29, '2021_11_23_094618_create_model_types_table', 1),
(30, '2021_11_23_094706_create_model_relations_table', 1),
(31, '2021_11_23_094707_create_model_rows_table', 1),
(32, '2021_11_23_095000_create_files_table', 1),
(33, '2021_12_26_052612_create_zeus_adjustments', 1),
(34, '2022_01_20_163240_create_posts_table', 1),
(35, '2022_01_20_195729_create_tags_table', 1),
(36, '2022_01_20_195854_create_taggables_table', 1),
(37, '2022_01_22_161843_create_sessions_table', 1),
(38, '2022_01_25_031852_create_categories_table', 1),
(40, '2022_02_22_161948_create_pages_table', 1),
(41, '2022_02_26_190139_create_menus_table', 1),
(42, '2022_02_26_191647_create_menu_items_table', 1),
(43, '2022_03_05_044603_create_notifications_table', 1),
(44, '2022_03_05_045808_create_jobs_table', 1),
(45, '2022_03_14_105840_create_seo_indexables_table', 1),
(47, '2022_03_15_073841_create_seo_links_table', 2),
(48, '2022_03_17_065643_create_fileables_table', 2),
(49, '2022_03_24_193259_create_images_table', 2),
(50, '2021_10_11_042448_create_ticket_department_user_table', 3),
(52, '2021_10_11_034251_create_ticket_messages_table', 4),
(53, '2022_01_26_190836_create_portfolios_table', 5),
(54, '2022_04_12_005352_add_columns_to_services_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1e2d4181-bff2-4905-afc8-2fd5da6d51ea', 'App\\Notifications\\WelcomeNotification', 'App\\Models\\User', 3, '{\"title\":\"\\u0628\\u0647 \\u062f\\u0627\\u06cc\\u0627 \\u0622\\u0631\\u062a\\u0632 \\u062e\\u0648\\u0634 \\u0622\\u0645\\u062f\\u06cc\\u062f\"}', NULL, '2022-04-12 19:00:30', '2022-04-12 19:00:30'),
('25716242-0841-489c-b958-ec4efcae829c', 'App\\Notifications\\WelcomeNotification', 'App\\Models\\User', 4, '{\"title\":\"\\u0628\\u0647 \\u062f\\u0627\\u06cc\\u0627 \\u0622\\u0631\\u062a\\u0632 \\u062e\\u0648\\u0634 \\u0622\\u0645\\u062f\\u06cc\\u062f\"}', NULL, '2022-04-13 13:08:57', '2022-04-13 13:08:57'),
('2a704931-4269-41f6-bbe0-0075775040b7', 'App\\Notifications\\WelcomeNotification', 'App\\Models\\User', 5, '{\"title\":\"\\u0628\\u0647 \\u062f\\u0627\\u06cc\\u0627 \\u0622\\u0631\\u062a\\u0632 \\u062e\\u0648\\u0634 \\u0622\\u0645\\u062f\\u06cc\\u062f\"}', NULL, '2022-04-13 15:09:13', '2022-04-13 15:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `value_type` enum('amount','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_for_all` tinyint(1) NOT NULL DEFAULT '0',
  `attempts` int NOT NULL DEFAULT '0',
  `max_attempts` int NOT NULL,
  `min_total` int DEFAULT NULL,
  `max_total` int DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_user`
--

CREATE TABLE `offer_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `offer_id` bigint UNSIGNED NOT NULL,
  `user_attempts` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('manual','automate') COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` enum('quick-order','professional','tele-order','telegram-bot','messanger') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_info` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `company_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` json NOT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `type`, `method`, `code`, `status`, `status_info`, `description`, `user_id`, `company_id`, `details`, `finished_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
('0dd54318-6cf2-4bfe-b739-a83c1fc341ce', 'manual', 'tele-order', 'W248056', 'status test', NULL, NULL, 1, NULL, '[]', NULL, NULL, '2022-03-31 20:32:09', '2022-03-31 20:32:09'),
('4da09306-c5e6-448a-90a7-9287ae9cca92', 'automate', 'quick-order', 'D294233', 'ثبت شده', 'سفارش به صورت سیستمی ثبت شده است', 'نام و نام خانوادگی : `مسلمی`\nشماره تلفن : (09365746828)\nسفارش : letterhead, catalog\n', NULL, NULL, '{\"order_items\": [\"letterhead\", \"catalog\"]}', NULL, NULL, '2022-04-14 11:59:04', '2022-04-14 11:59:04'),
('698f651e-2961-4876-a79a-72a1692624c6', 'automate', 'quick-order', 'A494661', 'ثبت شده', 'سفارش به صورت سیستمی ثبت شده است', 'نام و نام خانوادگی : `سید یونس`\nشماره تلفن : (09150013422)\nسفارش : catalog, letterhead\n', NULL, NULL, '{\"order_items\": [\"catalog\", \"letterhead\"]}', NULL, NULL, '2022-04-14 11:49:48', '2022-04-14 11:49:48'),
('b8483c05-e20c-4eec-bea7-45abf45e0572', 'automate', 'quick-order', 'J576788', 'سفارش ثبت شده است', 'سفارش به صورت سیستمی ثبت شده است', 'نام و نام خانوادگی : `احمد سلیمی`\nشماره تلفن : (09162224436)\nسفارش : logo, visit-card\nسلام وقت بخیر بنده سفارش لوگو و کارت ویزیت دارم', 1, NULL, '{\"order_items\": [\"logo\", \"visit-card\"]}', NULL, NULL, '2022-03-31 13:47:13', '2022-03-31 20:34:00'),
('c49bbbe0-fa5d-4c6d-bcb8-e12a5969e36f', 'automate', 'quick-order', 'X584520', 'ثبت شده', 'سفارش به صورت سیستمی ثبت شده است', 'نام و نام خانوادگی : `امیر منصوریان`\nشماره تلفن : (09152222318)\nسفارش : logo\n', NULL, NULL, '{\"order_items\": [\"logo\"]}', NULL, NULL, '2022-04-14 11:06:14', '2022-04-14 11:06:14'),
('d5cb9713-2dee-4e91-9cf4-b486f75aec1e', 'automate', 'quick-order', 'U635630', 'ثبت شده', 'سفارش به صورت سیستمی ثبت شده است', 'نام و نام خانوادگی : `یونس`\nشماره تلفن : (09150013422)\nسفارش : visit-card\n', NULL, NULL, '{\"order_items\": [\"visit-card\"]}', NULL, NULL, '2022-04-14 11:50:59', '2022-04-14 11:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `plan_id` bigint UNSIGNED DEFAULT NULL,
  `company_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_info` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `total` bigint NOT NULL DEFAULT '0',
  `due_date` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `title`, `order_id`, `service_id`, `plan_id`, `company_id`, `offer_id`, `status`, `status_info`, `description`, `total`, `due_date`, `deleted_at`, `finished_at`, `created_at`, `updated_at`) VALUES
(31, 'لوگو موسسه اعتباری نور', 'b8483c05-e20c-4eec-bea7-45abf45e0572', 15, NULL, NULL, NULL, 'reviewed', 'سفارش با مشتری بررسی شده و مراحل تهیه پیش فاکتور در حال انجام است', NULL, 5000000, '2022-04-08 14:30:00', NULL, NULL, '2022-04-01 14:45:05', '2022-04-01 14:45:05'),
(32, 'کارت ویزیت مربعی دو رو', 'b8483c05-e20c-4eec-bea7-45abf45e0572', 16, NULL, NULL, NULL, 'designing', NULL, NULL, 410000, NULL, NULL, NULL, '2022-04-01 14:53:27', '2022-04-01 14:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('site-page','landing-page') COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `type`, `meta`, `content`, `view`, `created_at`, `updated_at`) VALUES
(1, 'جشنواره افتتاحیه', 'dayaartz', 'landing-page', NULL, NULL, 'pages.landing.opening', '2022-03-29 17:49:13', '2022-03-29 17:51:19'),
(3, 'طراحی لوگو - طراحی گرافیک - گرافیک دیزاین | دایا آرتز', '/', 'site-page', NULL, NULL, NULL, '2022-04-08 16:16:49', '2022-04-08 16:16:49'),
(4, 'درباره دایا آرتز', '/about', 'site-page', NULL, NULL, 'pages.about', '2022-04-08 16:21:29', '2022-04-08 16:29:44'),
(6, 'تماس با ما |‌دایا آرتز', '/contact', 'site-page', NULL, NULL, 'pages.contact', '2022-04-08 17:20:42', '2022-04-08 17:20:42'),
(7, 'خدمات طراحی گرافیک | دایا آرتز', '/services', 'site-page', NULL, NULL, 'pages.services.index', '2022-04-08 17:23:19', '2022-04-08 17:23:19'),
(8, 'دایا بلاگ |‌ مقالات طراحی گرافیک | دایا آرتز', '/blog', 'site-page', NULL, NULL, 'pages.blog.index', '2022-04-08 17:26:10', '2022-04-08 17:26:10'),
(9, 'شرایط و ضوابط', '/policy', 'site-page', NULL, NULL, 'pages.policy', '2022-04-10 13:30:29', '2022-04-10 13:30:29');

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_company` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_opinion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json NOT NULL,
  `tabular_details` json NOT NULL,
  `timeline` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `slug`, `description`, `service_id`, `company`, `about_company`, `company_opinion`, `details`, `tabular_details`, `timeline`, `created_at`, `updated_at`) VALUES
(1, 'کارت ویزیت بوهیما', 'test', '<p>فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</p>', 1, 'دیجی کالا', 'this is about the company', 'this is the opinion on the company', '{\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}', '{\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}', '{\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}', '2022-04-08 14:12:29', '2022-04-12 02:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reading_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `body`, `reading_time`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'عنوان پست اول', 'عنوان-پست-اول', 'سلام این پست محتوای خاصی ندارد', '<p dir=\"rtl\">سلام این اولین پست دایا آرتز از داخل cms زئوس است.</p>\n<p dir=\"rtl\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost:8000/storage/images/skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg\" width=\"520\" height=\"655\" />&nbsp;</p>\n<ol>\n<li>یک</li>\n<li>دو</li>\n<li>سه</li>\n</ol>\n<h1 dir=\"rtl\">عنوان شماره یک</h1>', '40 ثانیه', NULL, '2022-03-29 16:43:50', '2022-03-29 16:50:14'),
(2, 'پست دوم', 'پست-دوم', 'توضیحات پست دوم در حالت مختصر', '<p>بدنه پست ما</p>', '15 دقیقه', NULL, '2022-04-01 22:01:11', '2022-04-01 22:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `seo_indexables`
--

CREATE TABLE `seo_indexables` (
  `id` bigint UNSIGNED NOT NULL,
  `indexable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indexable_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `primary_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_keyword_score` int NOT NULL,
  `readability_score` int NOT NULL,
  `link_count` int NOT NULL DEFAULT '0',
  `reading_time` int NOT NULL,
  `robots` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `og_image_src` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_indexables`
--

INSERT INTO `seo_indexables` (`id`, `indexable_type`, `indexable_id`, `description`, `primary_keyword`, `primary_keyword_score`, `readability_score`, `link_count`, `reading_time`, `robots`, `og_title`, `og_description`, `og_image_src`) VALUES
(1, 'App\\Models\\Zeus\\Post', 2, 'این پست دومین پست وبلاگ دایا آرتز است', 'کلمه کلیدی فرعی', 0, 0, 0, 0, 'a:0:{}', 'پست دوم', 'این پست دومین پست وبلاگ دایا آرتز است', NULL),
(2, 'App\\Models\\Post', 1, 'متای دسکریپشن', 'کلمه اصلی', 0, 0, 0, 0, 'a:0:{}', 'عنوان پست اول', 'متای دسکریپشن', NULL),
(4, 'App\\Models\\Page', 3, 'متا دسکریپشن', 'دایا آرتز', 0, 0, 0, 0, 'a:0:{}', 'طراحی لوگو - طراحی گرافیک - گرافیک دیزاین | دایا آرتز', 'متا دسکریپشن', NULL),
(5, 'App\\Models\\Page', 4, 'درباره دایا آرتز', 'دایا آرتز', 0, 0, 0, 0, 'a:0:{}', 'درباره دایا آرتز', 'درباره دایا آرتز', NULL),
(6, 'App\\Models\\Page', 5, 'توضیحات متا', 'شرایط', 0, 0, 0, 0, 'a:0:{}', 'شرایط استفاده از خدمات', 'توضیحات متا', NULL),
(7, 'App\\Models\\Zeus\\Service', 2, 'gaskdgaksjdgkj', 'khskadh', 0, 0, 0, 0, 'a:0:{}', 'طراحی بروشور', 'gaskdgaksjdgkj', NULL),
(8, 'App\\Models\\Service', 2, 'sadasjdhkashdkj', 'ajskdhjkashd', 0, 0, 0, 0, 'a:0:{}', 'طراحی بروشور', 'sadasjdhkashdkj', NULL),
(9, 'App\\Models\\Page', 6, 'meta description test', 'contact', 0, 0, 0, 0, 'a:0:{}', 'تماس با ما |‌دایا آرتز', 'meta description test', NULL),
(10, 'App\\Models\\Page', 7, 'توضیحات متا', 'کامه کلیدی', 0, 0, 0, 0, 'a:0:{}', 'خدمات طراحی گرافیک | دایا آرتز', 'توضیحات متا', NULL),
(11, 'App\\Models\\Page', 8, 'تست جدید', 'hasdh', 0, 0, 0, 0, 'a:0:{}', 'دایا بلاگ |‌ مقالات طراحی گرافیک | دایا آرتز', 'تست جدید', NULL),
(12, 'App\\Models\\Portfolio', 1, 'test', 'test', 0, 0, 0, 0, 'a:0:{}', 'کارت ویزیت بوهیما', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seo_links`
--

CREATE TABLE `seo_links` (
  `id` bigint UNSIGNED NOT NULL,
  `seo_indexable_id` bigint UNSIGNED NOT NULL,
  `type` enum('internal','external','void') COLLATE utf8mb4_unicode_ci NOT NULL,
  `inner_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int DEFAULT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` tinyint(1) NOT NULL,
  `price` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `short_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `parent_id`, `title`, `subtitle`, `slug`, `icon_class`, `group`, `package`, `price`, `description`, `content`, `main`, `short_description`) VALUES
(1, NULL, 'بنر تبلیغاتی', 'طراحی بنر دیجیتالی و چاپی', 'بنر-تبلیغاتی', 'fas fa-ad', 'خدمات طراحی چاپی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(2, NULL, 'طراحی بروشور', 'طراحی انواع بروشور', 'طراحی-بروشور', 'fas fa-map', 'خدمات طراحی چاپی', 0, NULL, '<p>مزیت های طراحی بروشور در دایا آرتز</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis. Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem. Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste? Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum. Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae? Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum. Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi! Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore! Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi. Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(3, NULL, 'تراکت', 'طراحی تراکت در انواع سایز و مدل', 'تراکت', 'fas fa-sticky-note', 'خدمات طراحی چاپی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(4, NULL, 'اسلایدر وب سایت', 'طراحی اسلایدر های حرفه ای', 'اسلایدر-وب-سایت', 'fas fa-image', 'خدمات طراحی دیجیتالی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(5, NULL, 'منو رستوران و کافی شاپ', 'خایه باقر', 'منو-رستوران-و-کافی-شاپ', 'fab fa-elementor', 'خدمات طراحی چاپی', 0, NULL, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis. Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem. Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste? Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum. Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae? Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum. Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi! Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore! Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi. Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(6, NULL, 'صفحات مجازی', 'طراحی قالب ، کاور ،‌پروفایل و ...', 'صفحات-مجازی', 'fab fa-instagram', 'خدمات طراحی فضای مجازی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(7, NULL, 'پاکت نامه', 'پاکت های نامه رسمی و فانتزی', 'پاکت-نامه', 'fas fa-envelope', 'خدمات طراحی چاپی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(8, NULL, 'بیلبورد', 'طراحی انواع بیلبورد و استند و استرابورد', 'بیلبورد', 'fas fa-images', 'خدمات طراحی چاپی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(9, NULL, 'موزیک', 'کاور ، تم آلبوم و ...', 'موزیک', 'fas fa-guitar', 'خدمات طراحی دیجیتالی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(10, NULL, 'تقویم', 'طراحی انواع تقویم و سررسید', 'تقویم', 'fas fa-calendar-check', 'خدمات طراحی چاپی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(11, NULL, 'فاکتور', 'طراحی انواع فاکتور های خاص و اداری', 'فاکتور', 'fas fa-receipt', 'خدمات طراحی چاپی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(12, NULL, 'جلد کتاب', 'جلد انواع کتاب ، مجلات و ...', 'جلد-کتاب', 'fas fa-book', 'خدمات طراحی چاپی', 0, NULL, NULL, '<p>خدمات طراحی جلد کتاب در دایا آرتز به دو دسته تقسیم می شوند دسته اول و دسته دوم</p>', 0, NULL),
(13, NULL, 'بسته بندی', 'بسته بندی های ساده و خاص', 'بسته-بندی', 'fas fa-box', 'خدمات طراحی چاپی', 0, NULL, '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>', 0, NULL),
(14, NULL, 'طراحی لوگو', 'لوگو تصویری و نوشتاری و ترکیبی', 'طراحی-لوگو', 'fab fa-apple', 'خدمات طراحی دیجیتالی', 0, NULL, NULL, NULL, 1, 'لوگو نخستین بازتاب شخصیت و هویت برندآرمانی و تجاری شماست. لوگو طنابی تنیده شده از هدف، باور و هسته فعالیت شماست'),
(15, 14, 'لوگو تصویری', 'لوگو تصویری توضیحات', 'لوگو-تصویری', 'fas fa-image', 'طراحی لوگو', 0, NULL, NULL, NULL, 0, NULL),
(16, NULL, 'کارت ویزیت', 'طراحی انواع کارت ویزیت و بیزنس کارد', 'کارت-ویزیت', 'fas fa-credit-card', 'خدمات طراحی چاپی', 0, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_plans`
--

CREATE TABLE `service_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_plans`
--

INSERT INTO `service_plans` (`id`, `service_id`, `title`, `caption`, `price`, `order`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cupiditate', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 2320000, 0, NULL, '2022-03-29 16:21:49', '2022-03-29 16:21:49'),
(2, 1, 'Corporis', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7820000, 0, NULL, '2022-03-29 16:21:50', '2022-03-29 16:21:50'),
(3, 1, 'Voluptate', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 2800000, 0, NULL, '2022-03-29 16:21:50', '2022-03-29 16:21:50'),
(4, 2, 'Sunt', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 5830000, 3, NULL, '2022-03-29 16:21:50', '2022-04-08 17:14:10'),
(5, 2, 'Sed', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7420000, 1, NULL, '2022-03-29 16:21:50', '2022-04-08 17:15:17'),
(6, 2, 'In', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 6740000, 2, NULL, '2022-03-29 16:21:50', '2022-04-08 17:15:12'),
(7, 3, 'Quis', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 1940000, 0, NULL, '2022-03-29 16:21:50', '2022-03-29 16:21:50'),
(8, 3, 'پلن استاندارد', '<ul class=\"card-options\">\n<li>ارائه ۳ اتود</li>\n<li>ارائه ۱ اتود تصویری</li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 10000000, 0, NULL, '2022-03-29 16:21:50', '2022-03-29 17:04:54'),
(9, 3, 'Qui', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 6450000, 0, NULL, '2022-03-29 16:21:50', '2022-03-29 16:21:50'),
(10, 4, 'Alias', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 3070000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(11, 4, 'Non', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 4520000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(12, 4, 'Excepturi', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 6530000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(13, 5, 'Minima', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7880000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(14, 5, 'Numquam', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 3990000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(15, 5, 'Et', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7940000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(16, 6, 'Dolore', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 5410000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(17, 6, 'Fugit', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7050000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(18, 6, 'Quos', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7180000, 0, NULL, '2022-03-29 16:21:51', '2022-03-29 16:21:51'),
(19, 7, 'Est', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 1400000, 0, NULL, '2022-03-29 16:21:52', '2022-03-29 16:21:52'),
(20, 7, 'Assumenda', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 4510000, 0, NULL, '2022-03-29 16:21:52', '2022-03-29 16:21:52'),
(21, 7, 'Doloribus', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 1040000, 0, NULL, '2022-03-29 16:21:52', '2022-03-29 16:21:52'),
(22, 8, 'Reprehenderit', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 5060000, 0, NULL, '2022-03-29 16:21:52', '2022-03-29 16:21:52'),
(23, 8, 'Numquam', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 2640000, 0, NULL, '2022-03-29 16:21:52', '2022-03-29 16:21:52'),
(24, 8, 'Quam', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7230000, 0, NULL, '2022-03-29 16:21:52', '2022-03-29 16:21:52'),
(25, 9, 'حرفه ای', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7580000, 0, NULL, '2022-03-29 16:21:52', '2022-03-31 21:26:15'),
(26, 9, 'استاندارد', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 5080000, 2, NULL, '2022-03-29 16:21:52', '2022-03-31 21:25:58'),
(27, 9, 'اقتصادی', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 4110000, 3, NULL, '2022-03-29 16:21:52', '2022-03-31 21:26:33'),
(28, 10, 'Tempora', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 2670000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(29, 10, 'Modi', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 3700000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(30, 10, 'Corporis', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 5050000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(31, 11, 'Est', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 2760000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(32, 11, 'Maxime', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 7050000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(33, 11, 'Vitae', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 1810000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(34, 12, 'Harum', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 4220000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(35, 12, 'Quaerat', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 3810000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(36, 12, 'Aliquam', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 3800000, 0, NULL, '2022-03-29 16:21:53', '2022-03-29 16:21:53'),
(37, 13, 'Enim', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 1730000, 0, NULL, '2022-03-29 16:21:54', '2022-03-29 16:21:54'),
(38, 13, 'Quaerat', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 1460000, 0, NULL, '2022-03-29 16:21:54', '2022-03-29 16:21:54'),
(39, 13, 'Voluptatem', '<ul class=\"card-options\">\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\n<li>ارائه ۱ اتود <span>تصویری</span></li>\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\n<li>طراحی بر اساس علم برندینگ</li>\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\n<li>طراحی و اجرا توسط طراحان ارشد</li>\n<li>معرفی رنگ صحیح سازمانی</li>\n</ul>', 2860000, 0, NULL, '2022-03-29 16:21:54', '2022-03-29 16:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gNz5JyeXITX5kVNus9tc8rPmobzj0ZeublzZFzvl', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQTViejlZR0RiWDA3TGhSWnZ3ODBSRnd3Y1g5aktQMms3TUEwdWRSdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC96ZXVzIjt9fQ==', 1649940088),
('MU1zuLYA2N6kTqwEyXkpZKzLuqLKqHA5A5CLtPHt', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXZONmVodGw4dEZSekg1R1NjR3hzRGhPMFkzVXViZ2xoUWFaUXlYcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zZXJ2aWNlcy8lRDglQjclRDglQjElRDglQTclRDglQUQlREIlOEMtJUQ5JTg0JUQ5JTg4JURBJUFGJUQ5JTg4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1649946244);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `title`, `type`, `key`, `value`) VALUES
(1, 'header', 'تصویر لوگو داخل منو', 'text', 'header.menu.logo', 's:26:\"images/daya-white-logo.png\";'),
(2, 'header', 'شماره تلفن سمت چپ منو', 'text', 'header.menu.phone_number', 's:13:\"+989015045025\";'),
(3, 'header', 'متن دکمه سمت چپ منو', 'text', 'header.menu.button.text', 's:10:\"خدمات\";'),
(4, 'header', 'لینک دکمه سمت چپ منو', 'text', 'header.menu.button.href', 's:1:\"#\";'),
(5, 'mainpage', 'عنوان هدر صفحه اصلی', 'text', 'mainpage.header.h1', 's:69:\"<span>دایا آرتز</span> پیکسل به پیکسل با شما\";'),
(6, 'mainpage', 'زیر عنوان هدر صفحه اصلی', 'text', 'mainpage.header.h1.subtitle', 's:716:\"<b>دایا آرتز</b> ؛ نخستین مرکز طراحی گرافیک با رویکرد استارتاپی<br>تیم طراحی دایا ارائه دهنده خدمات گرافیکی با رویکردی متفاوت است ، در دایا رنگ ها و ترسیمات از زیر ذره بین ایده و مفهوم می گذرند تا به جلایی تازه به هویت برند شما بخشیده شود و پوسته ظاهر و برند فعالیت شما به رنگ هسته ایده و هویت حقیقی اش برسد . دایا آرتز تزریق رنگ ایده هایتان به شخصیت شماست . برای آشنایی بیشتر با عقاید دایا آرتز کلیک کنید\";'),
(7, 'mainpage', 'عکس svg هدر صفحه اصلی', 'text', 'mainpage.header.svg-header', 's:24:\"images/header-vector.svg\";'),
(8, 'mainpage', 'دکمه های هدر صفحه اصلی', 'text', 'mainpage.header.buttons', 's:148:\"<button class=\"btn badge-pill bg-purple ml-4\">آشنایی بیشتر</button> <button class=\"btn btn-gradient bg-aqua\">شروع سفارش</button>\";'),
(9, 'mainpage', 'عنوان بخش خدمات ششگانه', 'text', 'mainpage.services.title', 's:19:\"خدمات دایا\";'),
(10, 'services_page', 'آیکون های گروه بندی صفحه خدمات', 'text', 'services_page.groups.icon_list', 's:50:\"fas fa-print,far fa-pencil-ruler, fab fa-instagram\";'),
(11, 'services_page', 'متن (CTA) لینک خدمات اصلی', 'text', 'services_page.main.button', 's:19:\"ادامه مطلب\";'),
(12, 'services_page', 'متن لینک خدمات آیتمی گروه بندی شده', 'text', 'services_page.group_items.button', 's:30:\"مشاهده نمونه کار\";');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` bigint UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticketable_id` bigint UNSIGNED DEFAULT NULL,
  `tracking_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_department_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('open','on-hold','in-progress','awaiting-reply','reviewd','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `closed_at` timestamp NULL DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticketable_type`, `ticketable_id`, `tracking_code`, `title`, `ticket_department_id`, `user_id`, `status`, `closed_at`, `notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
('2ad855ec-362e-4754-8f58-69ab64133a14', NULL, NULL, 'B946459', 'شکایت از تیم فروش', 2, 1, 'open', NULL, NULL, NULL, '2022-04-03 08:35:11', '2022-04-03 08:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_departments`
--

CREATE TABLE `ticket_departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_departments`
--

INSERT INTO `ticket_departments` (`id`, `name`, `about`) VALUES
(2, 'مدیریت', 'ارتباط مستقیم با مدیریت دایاآرتز'),
(3, 'واحد مالی', 'امور مالی ،‌ تسویه و عودت مبالغ');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_department_user`
--

CREATE TABLE `ticket_department_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `ticket_department_id` bigint UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_department_user`
--

INSERT INTO `ticket_department_user` (`user_id`, `ticket_department_id`, `role`) VALUES
(2, 2, NULL),
(3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `side` enum('operator','customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ticket_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_messages`
--

INSERT INTO `ticket_messages` (`id`, `side`, `body`, `user_id`, `ticket_id`, `read_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'customer', 'سلام من از تیم فروش شکایت دارم', 1, '2ad855ec-362e-4754-8f58-69ab64133a14', '2022-04-03 08:35:24', '2022-04-03 08:35:11', '2022-04-03 08:35:24', NULL),
(4, 'customer', 'یک و یک و یک', 1, '2ad855ec-362e-4754-8f58-69ab64133a14', '2022-04-03 08:36:10', '2022-04-03 08:35:54', '2022-04-03 08:36:10', NULL),
(5, 'customer', 'دو و دو و دو', 1, '2ad855ec-362e-4754-8f58-69ab64133a14', '2022-04-03 08:36:10', '2022-04-03 08:36:00', '2022-04-03 08:36:10', NULL),
(6, 'customer', 'سه و سه و سه', 1, '2ad855ec-362e-4754-8f58-69ab64133a14', '2022-04-03 08:36:10', '2022-04-03 08:36:06', '2022-04-03 08:36:10', NULL),
(7, 'operator', 'سلام', 2, '2ad855ec-362e-4754-8f58-69ab64133a14', NULL, '2022-04-04 11:09:44', '2022-04-04 11:09:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` bigint NOT NULL,
  `status` enum('verified','approved','canceled','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bill_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `status`, `transaction_id`, `provider`, `user_id`, `bill_id`, `details`, `created_at`, `updated_at`) VALUES
(1, 223450, 'canceled', 'A00000000000000000000000000330059052', 'zarinpal', 1, 'b7c13c12-8428-47ad-8f4d-47503cf3993c', NULL, '2022-04-01 15:21:08', '2022-04-01 15:21:22'),
(2, 223450, 'pending', 'A00000000000000000000000000330069793', 'zarinpal', 1, 'b7c13c12-8428-47ad-8f4d-47503cf3993c', NULL, '2022-04-01 16:11:00', '2022-04-01 16:11:00'),
(3, 223450, 'canceled', 'A00000000000000000000000000330419752', 'zarinpal', 1, 'b7c13c12-8428-47ad-8f4d-47503cf3993c', NULL, '2022-04-03 09:14:27', '2022-04-03 09:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('register','new','user','customer','vip') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `level`, `email`, `phone_number`, `email_verified_at`, `phone_verified`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'محمود', 'سلیمی', 'register', 'customer@gmail.com', NULL, '2022-03-29 16:21:48', 0, '$2y$10$UuUUqoC3WexHvh.nXpqeS.r52j2Zz8X9E0QA26./RqLNkH3P7dtTu', NULL, NULL, '2022-03-29 16:21:48', '2022-03-31 20:24:09'),
(2, NULL, NULL, 'user', NULL, '9365746828', NULL, 1, '$2y$10$XdWaoo09yanuzQbr3k7Inuz9kZz3enA0ZPl8NMWwtqep9JGJTjzJ.', NULL, NULL, '2022-04-08 20:50:37', '2022-04-08 20:51:16'),
(3, NULL, NULL, 'user', NULL, '9150013422', NULL, 1, '$2y$10$zdX0TLHGGmtQIGnhhK4pTuVfoHj9vmZhJLgeX5jUiGPEqtJw9jdx6', NULL, NULL, '2022-04-12 16:25:42', '2022-04-12 16:38:52'),
(4, NULL, NULL, 'new', 'yoonustehrani@dayaartz.com', NULL, '2022-04-13 13:08:55', 0, '$2y$10$E6ymdJFLZgPQzjyhtmI.We0zCu3mwJa7hnaAg/FJHBXXwKmWf.6BC', NULL, NULL, '2022-04-13 12:33:45', '2022-04-13 13:08:55'),
(5, NULL, NULL, 'user', 'yoonus@gmail.com', NULL, '2022-04-13 18:49:06', 0, '$2y$10$WiNji.IrEDFqu6UFXKPAluEoA/bfqiiTb8rKB6UgngkPgjbKT2tM2', NULL, NULL, '2022-04-13 14:42:02', '2022-04-13 18:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_by` enum('email','sms') COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zeus_adjustments`
--

CREATE TABLE `zeus_adjustments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adjustable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adjustable_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_adjustments`
--

INSERT INTO `zeus_adjustments` (`id`, `user_id`, `type`, `adjustable_type`, `adjustable_id`, `details`, `created_at`, `updated_at`) VALUES
('035d455c-915d-4afb-b043-7a285e2b7579', 2, 'update', 'App\\Models\\Setting', '4', '{\"after\": {\"value\": \"s:28:\\\"http://localhost:8000/policy\\\";\"}, \"before\": {\"value\": \"#\"}}', '2022-03-29 17:47:37', '2022-03-29 17:47:37'),
('06a01e00-62cf-4f78-9dfd-cab785b27aee', 2, 'update', 'App\\Models\\Page', '4', '{\"after\": {\"view\": \"pages.about\"}, \"before\": {\"view\": \"???\"}}', '2022-04-08 16:28:33', '2022-04-08 16:28:33'),
('0ea1bf8e-3c47-40d0-83e9-cc3873b4348f', 2, 'create', 'App\\Models\\Page', '6', '{\"id\": 6, \"meta\": null, \"slug\": \"/contact\", \"type\": \"site-page\", \"view\": \"pages.contact\", \"title\": \"تماس با ما |‌دایا آرتز\", \"content\": null, \"created_at\": \"2022-04-08T17:20:42.000000Z\", \"updated_at\": \"2022-04-08T17:20:42.000000Z\"}', '2022-04-08 17:20:42', '2022-04-08 17:20:42'),
('13b6f30c-b03b-4021-a58a-13a78d604573', 3, 'delete', 'App\\Models\\Zeus\\Order', '86e3b825-683e-4ee1-9bd8-5ade488fbcb0', '{\"id\": \"86e3b825-683e-4ee1-9bd8-5ade488fbcb0\", \"code\": \"F101185\", \"type\": \"دستی\", \"method\": \"سفارش تلفنی\", \"status\": \"finished\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:56.000000Z\", \"deleted_at\": \"2022-03-31T13:54:45.000000Z\", \"updated_at\": \"2022-03-31T13:54:45.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Molestias in possimus minima sit reprehenderit voluptas. Esse et quisquam sequi necessitatibus vel. Saepe consequatur voluptate aut reprehenderit.\"}', '2022-03-31 13:54:45', '2022-03-31 13:54:45'),
('151a3030-f9c7-4b35-aa39-8d91a15db45e', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer,1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 15:50:26', '2022-04-08 15:50:26'),
('155e7679-51a3-4c8f-aafb-7f40e86f684c', 2, 'update', 'App\\Models\\Post', '1', '{\"after\": {\"description\": \"سلام این پست محتوای خاصی ندارد\"}, \"before\": {\"description\": \"توضیحات پست اول\"}}', '2022-03-29 16:50:14', '2022-03-29 16:50:14'),
('15b75fe8-b96b-4541-8bec-1b5fc2c020ae', 3, 'delete', 'App\\Models\\Zeus\\Order', 'cd826370-a696-47b7-a936-ab2e8ffb3486', '{\"id\": \"cd826370-a696-47b7-a936-ab2e8ffb3486\", \"code\": \"J826147\", \"type\": \"سیستمی\", \"method\": \"سفارش با ربات تلگرامی\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:55.000000Z\", \"deleted_at\": \"2022-03-31T13:54:39.000000Z\", \"updated_at\": \"2022-03-31T13:54:39.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Quis optio eum aspernatur incidunt tempore saepe dolor. Sit error ab occaecati nam aperiam ipsa. Sed debitis distinctio eveniet necessitatibus doloremque qui.\"}', '2022-03-31 13:54:39', '2022-03-31 13:54:39'),
('276d8b3b-f66f-419a-92fd-70d744f1718a', 2, 'create', 'App\\Models\\Zeus\\OrderItem', '32', '{\"id\": 32, \"title\": \"کارت ویزیت مربعی دو رو\", \"total\": 410000, \"status\": \"designing\", \"due_date\": null, \"order_id\": \"b8483c05-e20c-4eec-bea7-45abf45e0572\", \"created_at\": \"2022-04-01T14:53:27.000000Z\", \"service_id\": 16, \"updated_at\": \"2022-04-01T14:53:27.000000Z\", \"description\": null, \"status_info\": null}', '2022-04-01 14:53:27', '2022-04-01 14:53:27'),
('2f0b8b06-894a-48d3-9451-e50ab68ef007', 2, 'update', 'App\\Models\\Zeus\\User', '1', '{\"after\": {\"password\": \"$2y$10$Hdkba/oUZWmjjxipG.gTSun3iqzWiFJ86kHvRD/mPIMov.vxlg6S.\"}, \"before\": {\"password\": \"???\"}}', '2022-03-31 20:23:11', '2022-03-31 20:23:11'),
('30264c92-f422-4627-9374-a1fadb50d4a3', 2, 'create', 'App\\Models\\Zeus\\Post', '2', '{\"id\": 2, \"body\": \"<p>بدنه پست ما</p>\", \"slug\": \"پست-دوم\", \"title\": \"پست دوم\", \"created_at\": \"2022-04-01T22:01:11.000000Z\", \"updated_at\": \"2022-04-01T22:01:11.000000Z\", \"description\": \"توضیحات پست دوم در حالت مختصر\", \"reading_time\": \"15 دقیقه\"}', '2022-04-01 22:01:11', '2022-04-01 22:01:11'),
('30893b97-602a-4dcb-ad9d-d47133bfef79', 2, 'update', 'App\\Models\\ServicePlan', '8', '{\"after\": {\"price\": 10000000, \"title\": \"پلن استاندارد\", \"caption\": \"<ul class=\\\"card-options\\\">\\n<li>ارائه ۲ اتود تایپوگرافی</li>\\n<li>ارائه ۱ اتود تصویری</li>\\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\\n<li>طراحی بر اساس علم برندینگ</li>\\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\\n<li>طراحی و اجرا توسط طراحان ارشد</li>\\n<li>معرفی رنگ صحیح سازمانی</li>\\n</ul>\"}, \"before\": {\"price\": 5710000, \"title\": \"Harum\", \"caption\": \"<ul class=\\\"card-options\\\">\\n<li>ارائه ۲ اتود <span>تایپوگرافی</span></li>\\n<li>ارائه ۱ اتود <span>تصویری</span></li>\\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\\n<li>طراحی بر اساس علم برندینگ</li>\\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\\n<li>طراحی و اجرا توسط طراحان ارشد</li>\\n<li>معرفی رنگ صحیح سازمانی</li>\\n</ul>\"}}', '2022-03-29 17:02:30', '2022-03-29 17:02:30'),
('309bce14-7bfe-4388-b3ee-82822d753476', 2, 'create', 'App\\Models\\Page', '4', '{\"id\": 4, \"meta\": null, \"slug\": \"/about\", \"type\": \"site-page\", \"view\": null, \"title\": \"درباره دایا\", \"content\": null, \"created_at\": \"2022-04-08T16:21:29.000000Z\", \"updated_at\": \"2022-04-08T16:21:29.000000Z\"}', '2022-04-08 16:21:29', '2022-04-08 16:21:29'),
('330019bb-8cb3-44d7-8021-ada84c127e93', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\"}, \"before\": {\"details\": {\"نوع یا شیوه سفارش\": \"سفارش سریع\", \"تعداد ادیت درخواستی\": \"3\"}}}', '2022-04-08 14:19:21', '2022-04-08 14:19:21'),
('36385fce-071f-4b2a-9700-bf28a6f33440', 2, 'create', 'App\\Models\\Zeus\\TicketDepartment', '3', '{\"id\": 3, \"name\": \"واحد مالی\", \"about\": \"امور مالی ،‌ تسویه و عودت مبالغ\"}', '2022-04-02 14:17:17', '2022-04-02 14:17:17'),
('3b667382-d722-4dcf-a2d2-ac703bf7ded1', 2, 'create', 'Zeus\\Models\\File', 'fca2d29d-9a1a-49e6-82de-f11d9eec098f', '{\"id\": \"fca2d29d-9a1a-49e6-82de-f11d9eec098f\", \"ext\": \"png\", \"name\": \"firefox.png\", \"path\": \"storage/images/tv0zRfUAyQ4dk0IR0fnRMlsqAXoYT2uaQIXOsjlS.png\", \"type\": \"image\", \"created_at\": \"2022-03-30T12:37:25.000000Z\", \"updated_at\": \"2022-03-30T12:37:25.000000Z\", \"thumbnail_path\": \"storage/images/tn_tv0zRfUAyQ4dk0IR0fnRMlsqAXoYT2uaQIXOsjlS.png\"}', '2022-03-30 12:37:25', '2022-03-30 12:37:25'),
('3f56674b-f1ef-4ff9-b120-dd8a2cc6018c', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '25', '{\"after\": {\"title\": \"حرفه ای\"}, \"before\": {\"title\": \"Animi\"}}', '2022-03-31 21:26:15', '2022-03-31 21:26:15'),
('4011ebe1-cbce-4b09-8eb5-f6d6764a6312', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '27', '{\"after\": {\"price\": 4110000}, \"before\": {\"price\": 4220000}}', '2022-03-31 21:24:22', '2022-03-31 21:24:22'),
('407c0e78-f0fa-4a93-bbca-c83dbabdc269', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\"}, \"before\": {\"details\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}}}', '2022-04-08 14:20:51', '2022-04-08 14:20:51'),
('4149e5ef-5c66-4e02-bd3a-40713bb0538a', 2, 'update', 'App\\Models\\Setting', '10', '{\"after\": {\"value\": \"s:50:\\\"fas fa-print,far fa-pencil-ruler, fab fa-instagram\\\";\"}, \"before\": {\"value\": \"fas fa-printer,far fa-pencil-ruler, fab fa-instagram\"}}', '2022-04-11 16:42:58', '2022-04-11 16:42:58'),
('4215a82b-0498-4568-8ce9-e2d94b0f68a0', 2, 'update', 'App\\Models\\Zeus\\User', '1', '{\"after\": {\"email\": \"customer@gmail.com\"}, \"before\": {\"email\": \"customer@dayaartz.com\"}}', '2022-03-29 18:03:00', '2022-03-29 18:03:00'),
('44130c84-acfc-40b4-bf8b-bd6314edf74d', 2, 'create', 'Zeus\\Models\\File', 'cc19061d-8a3c-48a8-8a90-dc0c90275e11', '{\"id\": \"cc19061d-8a3c-48a8-8a90-dc0c90275e11\", \"ext\": \"png\", \"name\": \"Screenshot from 2022-04-02 03-15-19.png\", \"path\": \"storage/images/EEbWvnM7IHimySBfDQxd9IU7VlPTn5gJvdr7Jyzh.png\", \"type\": \"image\", \"created_at\": \"2022-04-03T13:04:40.000000Z\", \"updated_at\": \"2022-04-03T13:04:40.000000Z\", \"thumbnail_path\": \"storage/images/tn_EEbWvnM7IHimySBfDQxd9IU7VlPTn5gJvdr7Jyzh.png\"}', '2022-04-03 13:04:40', '2022-04-03 13:04:40'),
('4420cd04-aeb3-448d-97c4-166fda8b475a', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"description\": \"<p>فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</p>\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"description\": \"<blockquote>\\n<h3><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></h3>\\n<p>&nbsp;</p>\\n<p><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\"><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif;\\\"><span style=\\\"font-size: 14px;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></span></span></p>\\n</blockquote>\", \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 16:50:30', '2022-04-08 16:50:30'),
('465b200f-52d6-4e60-ac14-35837e2369be', 2, 'update', 'App\\Models\\Setting', '10', '{\"after\": {\"value\": \"s:49:\\\"fas fa-printer, fa-pencil-ruler, fab fa-instagram\\\";\"}, \"before\": {\"value\": \"fas fa-apple\"}}', '2022-04-11 16:37:27', '2022-04-11 16:37:27'),
('46f31cb4-9616-45d5-98b0-d88aaf6d2eef', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"company\": \"دیجی کالا\", \"details\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"company\": \"company\", \"details\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}, \"timeline\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}, \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 14:33:51', '2022-04-08 14:33:51'),
('4750c3e0-a9a7-4e26-a5f9-5ce03e060c00', 2, 'delete', 'App\\Models\\Zeus\\Bill', '12c426fb-1276-4f2e-ac06-51030a6617d8', '{\"id\": \"12c426fb-1276-4f2e-ac06-51030a6617d8\", \"code\": \"uff222\", \"title\": \"shit\", \"active\": 0, \"amount\": 50000, \"paid_at\": null, \"created_at\": \"2022-04-01T21:54:44.000000Z\", \"invoice_id\": 1, \"updated_at\": \"2022-04-01T21:54:44.000000Z\"}', '2022-04-01 21:54:51', '2022-04-01 21:54:51'),
('485cb3ca-59e2-44ab-95f7-d79c72b62e50', 2, 'update', 'App\\Models\\Service', '5', '{\"after\": {\"content\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis. Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem. Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste? Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum. Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae? Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum. Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi! Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore! Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi. Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>\", \"subtitle\": \"خایه باقر\", \"description\": null}, \"before\": {\"content\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>\", \"subtitle\": \"منو های خاص و شکیل\", \"description\": \"\"}}', '2022-03-29 16:55:50', '2022-03-29 16:55:50'),
('4b02341d-2f68-42cb-8fe1-fb660be3aedd', 2, 'update', 'App\\Models\\Service', '12', '{\"after\": {\"content\": \"<p>خدمات طراحی جلد کتاب در دایا آرتز به دو دسته تقسیم می شوند دسته اول و دسته دوم</p>\", \"description\": null}, \"before\": {\"content\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur incidunt nulla pariatur reiciendis placeat officia aliquam cum asperiores. Delectus repudiandae necessitatibus ipsum minima dolor sunt culpa, tenetur consequatur nobis.\\n            Magni ipsam ab, alias accusamus deserunt fugit id! Similique ipsum, tempore in, ullam error nam dolorum nihil consectetur harum voluptatum deleniti iusto ut. Rerum adipisci nulla saepe necessitatibus ad quidem.\\n            Sint consequuntur eos cumque eaque dicta perspiciatis cum voluptates quae, deserunt sapiente neque minima. Unde ut amet fugiat! Ad consequuntur adipisci aut veritatis ratione atque officiis ab iure impedit iste?\\n            Dignissimos, ea! Officiis perspiciatis vitae quo quia placeat repellendus quasi unde exercitationem molestias aliquam numquam ratione, est at similique distinctio vel accusamus. Odio voluptatem dolores accusamus repudiandae blanditiis quam eum.\\n            Totam odit nulla pariatur velit atque fuga voluptatibus. Assumenda eveniet nisi ipsam error ea repellat id obcaecati est neque eos voluptatem, veniam quos, praesentium doloribus incidunt eum adipisci magni repudiandae?\\n            Dignissimos voluptates numquam maiores velit, architecto, enim hic consequuntur voluptatem reiciendis recusandae iusto fugit facilis esse illum quis quam quia neque adipisci debitis beatae? Iusto blanditiis ipsa minus consectetur cum.\\n            Explicabo fugiat dignissimos veritatis possimus rerum? Distinctio, ex et repellendus consequatur vel, eius impedit libero adipisci iste autem placeat officiis quidem necessitatibus amet voluptatum minima eum facilis reiciendis optio quasi!\\n            Fugit consequatur repellendus aliquid vitae vero modi quisquam, mollitia corrupti, reiciendis dignissimos aperiam accusamus facilis incidunt, magni soluta? Aliquam necessitatibus consequuntur ratione impedit! Temporibus obcaecati explicabo esse, officia exercitationem inventore!\\n            Molestias dignissimos enim architecto, hic distinctio expedita dolore quae repellat facilis! Modi suscipit est assumenda officiis perspiciatis laudantium aspernatur facilis. Sit distinctio eius voluptatibus error, sed dicta magni aspernatur nisi.\\n            Tenetur labore, impedit laudantium iste maiores minus quisquam numquam neque quae beatae cupiditate ratione, eveniet eum distinctio explicabo architecto aperiam. Consequatur illo facere possimus alias voluptates modi perspiciatis quia labore!</p>\", \"description\": \"\"}}', '2022-03-29 17:29:11', '2022-03-29 17:29:11'),
('4bcbb241-a1b6-4b00-9b11-67b7d913f0bd', 2, 'create', 'App\\Models\\Zeus\\TicketDepartment', '2', '{\"id\": 2, \"name\": \"مدیریت\", \"about\": \"ارتباط مستقیم با مدیریت دایاآرتز\"}', '2022-04-02 13:46:08', '2022-04-02 13:46:08'),
('4cc4347d-c65e-41cb-98eb-6228babbfe17', 2, 'update', 'App\\Models\\Setting', '12', '{\"after\": {\"value\": \"s:30:\\\"مشاهده نمونه کار\\\";\"}, \"before\": {\"value\": \"مشاهده\"}}', '2022-04-11 21:31:09', '2022-04-11 21:31:09'),
('52a19ecd-ba5e-4b7d-8a50-bbbea7175994', 2, 'update', 'App\\Models\\ServicePlan', '8', '{\"after\": {\"caption\": \"<ul class=\\\"card-options\\\">\\n<li>ارائه ۳ اتود</li>\\n<li>ارائه ۱ اتود تصویری</li>\\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\\n<li>طراحی بر اساس علم برندینگ</li>\\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\\n<li>طراحی و اجرا توسط طراحان ارشد</li>\\n<li>معرفی رنگ صحیح سازمانی</li>\\n</ul>\"}, \"before\": {\"caption\": \"<ul class=\\\"card-options\\\">\\n<li>ارائه ۲ اتود تایپوگرافی</li>\\n<li>ارائه ۱ اتود تصویری</li>\\n<li>تعداد دفعات ویرایش تا ۲ بار</li>\\n<li>طراحی بر اساس علم برندینگ</li>\\n<li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>\\n<li>طراحی و اجرا توسط طراحان ارشد</li>\\n<li>معرفی رنگ صحیح سازمانی</li>\\n</ul>\"}}', '2022-03-29 17:04:54', '2022-03-29 17:04:54'),
('52b42895-354b-4c8e-8e75-f6df752c167c', 2, 'create', 'App\\Models\\Page', '8', '{\"id\": 8, \"meta\": null, \"slug\": \"/blog\", \"type\": \"site-page\", \"view\": \"pages.blog.index\", \"title\": \"دایا بلاگ |‌ مقالات طراحی گرافیک | دایا آرتز\", \"content\": null, \"created_at\": \"2022-04-08T17:26:10.000000Z\", \"updated_at\": \"2022-04-08T17:26:10.000000Z\"}', '2022-04-08 17:26:10', '2022-04-08 17:26:10'),
('568f74cf-4d4e-42e7-aa2b-044a88a224f4', 2, 'update', 'App\\Models\\Service', '14', '{\"after\": {\"main\": 1}, \"before\": {\"main\": 0}}', '2022-04-11 20:40:18', '2022-04-11 20:40:18'),
('56cfa65d-6062-44d1-a877-2377b6d218bb', 2, 'create', 'Zeus\\Models\\File', '816bdeab-c5e2-43f0-a627-c07ef0819a59', '{\"id\": \"816bdeab-c5e2-43f0-a627-c07ef0819a59\", \"ext\": \"jpg\", \"name\": \"yoonus.jpg\", \"path\": \"storage/images/bOil9ySugXxLvs4GuJL6zjz22Os4ybubugcWodYQ.jpg\", \"type\": \"image\", \"created_at\": \"2022-03-31T13:25:05.000000Z\", \"updated_at\": \"2022-03-31T13:25:05.000000Z\", \"thumbnail_path\": \"storage/images/tn_bOil9ySugXxLvs4GuJL6zjz22Os4ybubugcWodYQ.jpg\"}', '2022-03-31 13:25:06', '2022-03-31 13:25:06'),
('58ae272b-619e-4ca1-9f4d-9f5230be52f4', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"description\": \"<blockquote>\\n<h3><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></h3>\\n<p>&nbsp;</p>\\n<p><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\"><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif;\\\"><span style=\\\"font-size: 14px;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></span></span></p>\\n</blockquote>\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"description\": \"<blockquote>\\n<h3><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></h3>\\n</blockquote>\", \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 16:46:22', '2022-04-08 16:46:22'),
('593a6781-7434-4de2-9be0-6138dcdb377f', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '27', '{\"after\": {\"title\": \"اقتصادی\"}, \"before\": {\"title\": \"استاندارد\"}}', '2022-03-31 21:26:33', '2022-03-31 21:26:33'),
('5997e41e-4774-411a-9037-28a4caa9283f', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"description\": \"<blockquote>\\n<p><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></p>\\n</blockquote>\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"description\": \"<p><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></p>\", \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 16:44:22', '2022-04-08 16:44:22'),
('59e3fa43-2207-4122-9763-f128ef43d818', 2, 'update', 'App\\Models\\Setting', '10', '{\"after\": {\"value\": \"s:50:\\\"fas fa-print,far fa-pencil-ruler, fab fa-instagram\\\";\"}, \"before\": {\"value\": \"g\"}}', '2022-04-11 16:43:31', '2022-04-11 16:43:31'),
('5b37b4d7-c47f-4990-987c-20b5feafb771', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '26', '{\"after\": {\"order\": 2, \"title\": \"استاندارد\"}, \"before\": {\"order\": 0, \"title\": \"Est\"}}', '2022-03-31 21:25:58', '2022-03-31 21:25:58'),
('63f40677-9375-4b07-ad9d-b214eb17edf8', 2, 'create', 'App\\Models\\Setting', '10', '{\"id\": 10, \"key\": \"settings_page.groups.icon_list\", \"type\": \"text\", \"group\": \"settings_page\", \"title\": \"آیکون های گروه بندی صفحه خدمات\", \"value\": \"fas fa-apple\"}', '2022-04-11 16:35:50', '2022-04-11 16:35:50'),
('660442a9-3a6b-4384-b541-be29ac13cb38', 2, 'create', 'App\\Models\\Zeus\\Invoice', '11', '{\"id\": 11, \"title\": \"فاکتور سفارش کارت ویزیت و لوگو\", \"total\": null, \"active\": 0, \"user_id\": 1, \"multipay\": 0, \"order_id\": \"b8483c05-e20c-4eec-bea7-45abf45e0572\", \"created_at\": \"2022-04-01T15:06:55.000000Z\", \"expires_at\": null, \"updated_at\": \"2022-04-01T15:06:55.000000Z\"}', '2022-04-01 15:06:55', '2022-04-01 15:06:55'),
('667dbcce-5c7c-476a-9172-6a14e6fe507a', 2, 'update', 'App\\Models\\Service', '14', '{\"after\": {\"group\": \"خدمات طراحی دیجیتالی\"}, \"before\": {\"group\": \"main\"}}', '2022-04-11 20:43:36', '2022-04-11 20:43:36'),
('694d942d-6d05-477b-aa88-9c95cee2072f', 2, 'update', 'App\\Models\\Post', '1', '{\"after\": {\"body\": \"<p dir=\\\"rtl\\\">سلام این اولین پست دایا آرتز از داخل cms زئوس است.</p>\\n<p dir=\\\"rtl\\\">&nbsp;<img src=\\\"http://localhost:8000/storage/images/skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg\\\" />&nbsp;</p>\\n<ol>\\n<li>یک</li>\\n<li>دو</li>\\n<li>سه</li>\\n</ol>\\n<h1 dir=\\\"rtl\\\">عنوان شماره یک</h1>\"}, \"before\": {\"body\": \"<p dir=\\\"rtl\\\">سلام این اولین پست دایا آرتز از داخل cms زئوس است.</p>\\n<ol>\\n<li>یک</li>\\n<li>دو</li>\\n<li>سه</li>\\n</ol>\\n<h1 dir=\\\"rtl\\\">عنوان شماره یک</h1>\"}}', '2022-03-29 16:48:59', '2022-03-29 16:48:59'),
('69b43865-0786-4fc0-86fd-354710303d89', 2, 'update', 'App\\Models\\Setting', '4', '{\"after\": {\"value\": \"s:1:\\\"#\\\";\"}, \"before\": {\"value\": \"http://localhost:8000/policy\"}}', '2022-03-29 17:47:48', '2022-03-29 17:47:48'),
('6aa9a837-8fef-4b08-a680-2f018758ab53', 2, 'update', 'App\\Models\\Setting', '5', '{\"after\": {\"value\": \"s:69:\\\"<span>دایا آرتز</span> پیکسل به پیکسل با شما\\\";\"}, \"before\": {\"value\": \"<span>دایا آرتز</span> گامی تا مدرنیته\"}}', '2022-03-29 17:09:01', '2022-03-29 17:09:01'),
('6b92c83b-677d-4f42-8167-1685165ff813', 2, 'create', 'App\\Models\\Service', '14', '{\"id\": 14, \"slug\": \"طراحی-لوگو\", \"group\": \"main\", \"price\": null, \"title\": \"طراحی لوگو\", \"content\": null, \"package\": 0, \"subtitle\": \"لوگو تصویری و نوشتاری و ترکیبی\", \"parent_id\": null, \"icon_class\": \"fas fa-apple\", \"description\": null}', '2022-03-29 17:18:38', '2022-03-29 17:18:38'),
('6bf063b5-08eb-4ca5-8298-0cf2b5ee6f77', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '6', '{\"after\": {\"order\": 2}, \"before\": {\"order\": 1}}', '2022-04-08 17:15:12', '2022-04-08 17:15:12'),
('6d96d5cd-5a8c-4b91-8b1c-e53a820467c0', 2, 'create', 'App\\Models\\Setting', '11', '{\"id\": 11, \"key\": \"services_page.main.button\", \"type\": \"text\", \"group\": \"services_page\", \"title\": \"متن (CTA) لینک خدمات اصلی\", \"value\": \"ادامه مطلب\"}', '2022-04-11 21:27:35', '2022-04-11 21:27:35'),
('6eeec7b6-489d-4def-9017-561ac440bf72', 2, 'update', 'App\\Models\\Setting', '3', '{\"after\": {\"value\": \"s:12:\\\"سفارش +\\\";\"}, \"before\": {\"value\": \"سفارش جدید\"}}', '2022-03-29 17:35:47', '2022-03-29 17:35:47'),
('6f935adb-773f-413e-a573-1a623d857522', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"title\": \"کارت ویزیت بوهیما\", \"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"title\": \"test\", \"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 16:36:18', '2022-04-08 16:36:18'),
('71260a16-8372-42ee-8d7b-cc2bc2ae88dd', 2, 'create', 'App\\Models\\Page', '5', '{\"id\": 5, \"meta\": null, \"slug\": \"/policy\", \"type\": \"site-page\", \"view\": \"pages.policy\", \"title\": \"شرایط و ضوابط\", \"content\": null, \"created_at\": \"2022-04-08T16:32:23.000000Z\", \"updated_at\": \"2022-04-08T16:32:23.000000Z\"}', '2022-04-08 16:32:23', '2022-04-08 16:32:23'),
('72893a94-b18e-473b-968f-a9cf4969db9b', 2, 'create', 'App\\Models\\Page', '7', '{\"id\": 7, \"meta\": null, \"slug\": \"/services\", \"type\": \"site-page\", \"view\": \"pages.services.index\", \"title\": \"خدمات طراحی گرافیک | دایا آرتز\", \"content\": null, \"created_at\": \"2022-04-08T17:23:19.000000Z\", \"updated_at\": \"2022-04-08T17:23:19.000000Z\"}', '2022-04-08 17:23:19', '2022-04-08 17:23:19'),
('739bcfe3-eed2-4f31-bb24-78dc2611c261', 2, 'update', 'App\\Models\\Post', '1', '{\"after\": {\"reading_time\": \"40 ثانیه\"}, \"before\": {\"reading_time\": null}}', '2022-03-29 16:45:37', '2022-03-29 16:45:37'),
('755e6755-f307-4500-a3ce-0fcc2cf9f009', 2, 'create', 'App\\Models\\Page', '9', '{\"id\": 9, \"meta\": null, \"slug\": \"/policy\", \"type\": \"site-page\", \"view\": \"pages.policy\", \"title\": \"شرایط و ضوابط\", \"content\": null, \"created_at\": \"2022-04-10T13:30:29.000000Z\", \"updated_at\": \"2022-04-10T13:30:29.000000Z\"}', '2022-04-10 13:30:29', '2022-04-10 13:30:29'),
('7b06344c-141e-41d3-8e13-121c85616d75', 2, 'create', 'Zeus\\Models\\File', 'e2db361d-e636-4a1f-9cf9-d097fccb6fff', '{\"id\": \"e2db361d-e636-4a1f-9cf9-d097fccb6fff\", \"ext\": \"png\", \"name\": \"Screenshot from 2022-03-27 17-02-05.png\", \"path\": \"storage/images/KDbjtvl2VghxTRaPAHxBcOhoITwr7trb6xEbJUro.png\", \"type\": \"image\", \"created_at\": \"2022-04-01T22:00:39.000000Z\", \"updated_at\": \"2022-04-01T22:00:39.000000Z\", \"thumbnail_path\": \"storage/images/tn_KDbjtvl2VghxTRaPAHxBcOhoITwr7trb6xEbJUro.png\"}', '2022-04-01 22:00:39', '2022-04-01 22:00:39'),
('7bd95714-0d56-4e84-80e6-29eab975260c', 2, 'update', 'App\\Models\\Service', '14', '{\"after\": {\"icon_class\": \"fab fa-apple\"}, \"before\": {\"icon_class\": \"fas fa-apple\"}}', '2022-04-11 21:18:08', '2022-04-11 21:18:08'),
('808d86ec-3924-4d51-a640-fd11baf70265', 3, 'delete', 'App\\Models\\Zeus\\Order', '6f20b23f-6b40-4114-beba-a542ed7b2993', '{\"id\": \"6f20b23f-6b40-4114-beba-a542ed7b2993\", \"code\": \"W674647\", \"type\": \"سیستمی\", \"method\": \"سفارش تخصصی\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:58.000000Z\", \"deleted_at\": \"2022-03-31T13:52:26.000000Z\", \"updated_at\": \"2022-03-31T13:52:26.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Id in quia sunt. Tempora nemo voluptatem reiciendis ad sapiente. Consequatur fuga itaque dolorum nam praesentium. Assumenda enim voluptatem porro minima.\"}', '2022-03-31 13:52:27', '2022-03-31 13:52:27'),
('8155eae4-2ec6-473f-9d79-b84695d5fc39', 3, 'delete', 'App\\Models\\Zeus\\Order', '02cc7db1-8e0e-4969-ab8c-a476d223e2bb', '{\"id\": \"02cc7db1-8e0e-4969-ab8c-a476d223e2bb\", \"code\": \"G652531\", \"type\": \"سیستمی\", \"method\": \"سفارش سریع\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:57.000000Z\", \"deleted_at\": \"2022-03-31T13:52:39.000000Z\", \"updated_at\": \"2022-03-31T13:52:39.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Quam nemo provident quo libero eveniet velit eum. Sunt voluptatem consequatur et commodi facilis doloribus. Explicabo id delectus eligendi et quaerat.\"}', '2022-03-31 13:52:39', '2022-03-31 13:52:39'),
('89501de8-d7ef-4cb3-aa3b-5f56638c9f50', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}, \"timeline\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}, \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 14:30:56', '2022-04-08 14:30:56'),
('8a41a9f0-51b3-4996-8518-2b91a26ab4ec', 2, 'update', 'App\\Models\\Post', '1', '{\"after\": {\"body\": \"<p dir=\\\"rtl\\\">سلام این اولین پست دایا آرتز از داخل cms زئوس است.</p>\\n<p dir=\\\"rtl\\\">&nbsp;<img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http://localhost:8000/storage/images/skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg\\\" width=\\\"520\\\" height=\\\"655\\\" />&nbsp;</p>\\n<ol>\\n<li>یک</li>\\n<li>دو</li>\\n<li>سه</li>\\n</ol>\\n<h1 dir=\\\"rtl\\\">عنوان شماره یک</h1>\"}, \"before\": {\"body\": \"<p dir=\\\"rtl\\\">سلام این اولین پست دایا آرتز از داخل cms زئوس است.</p>\\n<p dir=\\\"rtl\\\">&nbsp;<img src=\\\"http://localhost:8000/storage/images/skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg\\\" />&nbsp;</p>\\n<ol>\\n<li>یک</li>\\n<li>دو</li>\\n<li>سه</li>\\n</ol>\\n<h1 dir=\\\"rtl\\\">عنوان شماره یک</h1>\"}}', '2022-03-29 16:49:28', '2022-03-29 16:49:28'),
('8a7d823f-0e41-4d10-864e-f14dfd07d078', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}, \"timeline\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}, \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 14:37:48', '2022-04-08 14:37:48'),
('8c8cfe7f-cda3-4142-8c98-0191ce633629', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer,1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}, \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 14:46:17', '2022-04-08 14:46:17'),
('8d3ca29f-3953-467c-8b02-db60929c6c43', 2, 'update', 'App\\Models\\Setting', '3', '{\"after\": {\"value\": \"s:12:\\\"سفارش +\\\";\"}, \"before\": {\"value\": \"kir\"}}', '2022-03-29 17:37:26', '2022-03-29 17:37:26'),
('91de5100-5a3c-4826-8713-3dfb705a351f', 2, 'update', 'App\\Models\\Service', '14', '{\"after\": {\"short_description\": \"لوگو نخستین بازتاب شخصیت و هویت برندآرمانی و تجاری شماست. لوگو طنابی تنیده شده از هدف، باور و هسته فعالیت شماست\"}, \"before\": {\"short_description\": \"???\"}}', '2022-04-11 21:08:19', '2022-04-11 21:08:19');
INSERT INTO `zeus_adjustments` (`id`, `user_id`, `type`, `adjustable_type`, `adjustable_id`, `details`, `created_at`, `updated_at`) VALUES
('91f91572-5851-4ce0-9c1d-8d761a78f658', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"description\": \"<p><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></p>\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"description\": \"haskdhkjasgdkasgkldgaklsdglkasgd\", \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 16:43:39', '2022-04-08 16:43:39'),
('946b5888-d5c8-4867-868a-f8472b575584', 2, 'create', 'App\\Models\\Zeus\\OrderItem', '31', '{\"id\": 31, \"title\": \"لوگو موسسه اعتباری نور\", \"total\": 5000000, \"status\": \"reviewed\", \"due_date\": \"2022-04-08 19:00:00\", \"order_id\": \"b8483c05-e20c-4eec-bea7-45abf45e0572\", \"created_at\": \"2022-04-01T14:45:05.000000Z\", \"service_id\": 15, \"updated_at\": \"2022-04-01T14:45:05.000000Z\", \"description\": null, \"status_info\": \"سفارش با مشتری بررسی شده و مراحل تهیه پیش فاکتور در حال انجام است\"}', '2022-04-01 14:45:05', '2022-04-01 14:45:05'),
('99ffea85-9663-4e3b-9eaf-90a1dd86dc5d', 2, 'create', 'App\\Models\\Page', '3', '{\"id\": 3, \"meta\": null, \"slug\": \"/\", \"type\": \"site-page\", \"view\": null, \"title\": \"طراحی لوگو - طراحی گرافیک - گرافیک دیزاین | دایا آرتز\", \"content\": null, \"created_at\": \"2022-04-08T16:16:49.000000Z\", \"updated_at\": \"2022-04-08T16:16:49.000000Z\"}', '2022-04-08 16:16:49', '2022-04-08 16:16:49'),
('9a7f54b0-6d91-4c8f-b830-d53b9f31483c', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-12 02:32:42', '2022-04-12 02:32:42'),
('9b978a61-af9a-4e35-bfa6-b36a8c49a6a8', 2, 'update', 'App\\Models\\Zeus\\Order', 'b8483c05-e20c-4eec-bea7-45abf45e0572', '{\"after\": {\"user_id\": 1}, \"before\": {\"user_id\": \"???\"}}', '2022-03-31 20:34:00', '2022-03-31 20:34:00'),
('9c39466a-fa02-4183-b10f-5d8e78edf682', 2, 'create', 'Zeus\\Models\\File', '6dd153d8-a379-4b1c-ae99-9b5444db2951', '{\"id\": \"6dd153d8-a379-4b1c-ae99-9b5444db2951\", \"ext\": \"png\", \"name\": \"blog-12.png\", \"path\": \"storage/images/ORK6mcVpJ6KchQlzPu7gLSAamrvzPgo0dugqCmI4.png\", \"type\": \"image\", \"created_at\": \"2022-03-29T16:43:05.000000Z\", \"updated_at\": \"2022-03-29T16:43:05.000000Z\", \"thumbnail_path\": \"storage/images/tn_ORK6mcVpJ6KchQlzPu7gLSAamrvzPgo0dugqCmI4.png\"}', '2022-03-29 16:43:05', '2022-03-29 16:43:05'),
('a0930523-1c6e-4372-91e3-178816dc54dc', 2, 'create', 'App\\Models\\Setting', '12', '{\"id\": 12, \"key\": \"services_page.group_items.button\", \"type\": \"text\", \"group\": \"services_page\", \"title\": \"متن لینک خدمات آیتمی گروه بندی شده\", \"value\": \"مشاهده\"}', '2022-04-11 21:30:01', '2022-04-11 21:30:01'),
('a1072275-6956-4234-823c-33d4cebe0e54', 2, 'create', 'App\\Models\\Setting', '9', '{\"id\": 9, \"key\": \"mainpage.services.title\", \"type\": \"text\", \"group\": \"mainpage\", \"title\": \"عنوان بخش خدمات ششگانه\", \"value\": null}', '2022-03-29 17:45:19', '2022-03-29 17:45:19'),
('a1e216d3-6e83-47c1-bb67-cd4f00b1b504', 3, 'delete', 'App\\Models\\Zeus\\Order', '4d134c33-86cd-4ec3-8ec9-c8c6171e8ac7', '{\"id\": \"4d134c33-86cd-4ec3-8ec9-c8c6171e8ac7\", \"code\": \"L633548\", \"type\": \"سیستمی\", \"method\": \"سفارش سریع\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:55.000000Z\", \"deleted_at\": \"2022-03-31T13:54:42.000000Z\", \"updated_at\": \"2022-03-31T13:54:42.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Distinctio voluptas esse exercitationem esse perspiciatis. Deleniti non accusamus aut voluptas. Sed et ea et beatae consequuntur quis a. Accusamus cupiditate itaque odio velit ab omnis.\"}', '2022-03-31 13:54:42', '2022-03-31 13:54:42'),
('a2fe84da-0ed5-4158-a9fc-cc4f4eef596f', 2, 'create', 'App\\Models\\Post', '1', '{\"id\": 1, \"body\": \"بدنه پست اول\", \"slug\": \"عنوان-پست-اول\", \"title\": \"عنوان پست اول\", \"author_id\": null, \"created_at\": \"2022-03-29T16:43:50.000000Z\", \"updated_at\": \"2022-03-29T16:43:50.000000Z\", \"description\": \"توضیحات پست اول\", \"reading_time\": null}', '2022-03-29 16:43:50', '2022-03-29 16:43:50'),
('a408e29b-27f9-4395-9c60-45439adb05b6', 2, 'update', 'App\\Models\\Page', '4', '{\"after\": {\"title\": \"درباره دایا آرتز\"}, \"before\": {\"title\": \"درباره دایا\"}}', '2022-04-08 16:29:44', '2022-04-08 16:29:44'),
('accde2de-5a56-4df5-ac2e-71849ef43126', 2, 'update', 'App\\Models\\Setting', '9', '{\"after\": {\"value\": \"s:32:\\\"خدمات ششگانه دایا\\\";\"}, \"before\": {\"value\": null}}', '2022-03-29 17:45:45', '2022-03-29 17:45:45'),
('ad87bc41-fa26-4c02-9d23-427933d9f5dc', 2, 'update', 'App\\Models\\Setting', '3', '{\"after\": {\"value\": \"s:19:\\\"سفارش جدید\\\";\"}, \"before\": {\"value\": \"+‌ سفارش\"}}', '2022-03-29 17:35:34', '2022-03-29 17:35:34'),
('b277562f-b147-42e1-a297-e53168fd2820', 3, 'delete', 'App\\Models\\Zeus\\Order', 'cf572849-356d-4670-8b6e-91a97f6e3c32', '{\"id\": \"cf572849-356d-4670-8b6e-91a97f6e3c32\", \"code\": \"S216589\", \"type\": \"دستی\", \"method\": \"سفارش سریع\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:55.000000Z\", \"deleted_at\": \"2022-03-31T13:54:35.000000Z\", \"updated_at\": \"2022-03-31T13:54:35.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Sequi distinctio illum iusto quia. Molestiae voluptatem similique praesentium accusantium exercitationem unde. Adipisci aspernatur facere facere.\"}', '2022-03-31 13:54:35', '2022-03-31 13:54:35'),
('b2b37309-01ce-42ff-923a-8e8ed1f8245a', 2, 'update', 'App\\Models\\Post', '1', '{\"after\": {\"body\": \"<p dir=\\\"rtl\\\">سلام این اولین پست دایا آرتز از داخل cms زئوس است.</p>\\n<ol>\\n<li>یک</li>\\n<li>دو</li>\\n<li>سه</li>\\n</ol>\\n<h1 dir=\\\"rtl\\\">عنوان شماره یک</h1>\"}, \"before\": {\"body\": \"بدنه پست اول\"}}', '2022-03-29 16:48:11', '2022-03-29 16:48:11'),
('b4844bfe-6ad5-4ce4-add1-2f5f31f3791f', 3, 'delete', 'App\\Models\\Zeus\\Order', '546f75e2-cabc-48d1-97ef-b0ffd9397572', '{\"id\": \"546f75e2-cabc-48d1-97ef-b0ffd9397572\", \"code\": \"Y779360\", \"type\": \"سیستمی\", \"method\": \"سفارش تخصصی\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:54.000000Z\", \"deleted_at\": \"2022-03-31T13:54:31.000000Z\", \"updated_at\": \"2022-03-31T13:54:31.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Repellendus distinctio et animi vel in. Voluptas voluptatem tempore et neque maiores. Consectetur totam sint voluptas et occaecati necessitatibus expedita ut.\"}', '2022-03-31 13:54:31', '2022-03-31 13:54:31'),
('b4e413c8-5de4-482e-aa0d-c266f2ceebae', 2, 'update', 'App\\Models\\Service', '16', '{\"after\": {\"group\": \"خدمات طراحی چاپی\"}, \"before\": {\"group\": \"main\"}}', '2022-04-11 21:03:55', '2022-04-11 21:03:55'),
('b505a79c-2c63-4dc8-9159-a083cd895457', 2, 'update', 'App\\Models\\Setting', '10', '{\"after\": {\"value\": \"s:52:\\\"fas fa-printer,far fa-pencil-ruler, fab fa-instagram\\\";\"}, \"before\": {\"value\": \"fas fa-printer, fa-pencil-ruler, fab fa-instagram\"}}', '2022-04-11 16:42:26', '2022-04-11 16:42:26'),
('bce7efde-cf63-4022-88cb-a7181b88b5d4', 2, 'create', 'App\\Models\\Zeus\\Bill', '12c426fb-1276-4f2e-ac06-51030a6617d8', '{\"id\": \"12c426fb-1276-4f2e-ac06-51030a6617d8\", \"code\": \"uff222\", \"title\": \"shit\", \"active\": 0, \"amount\": 50000, \"paid_at\": null, \"created_at\": \"2022-04-01T21:54:44.000000Z\", \"invoice_id\": 1, \"updated_at\": \"2022-04-01T21:54:44.000000Z\"}', '2022-04-01 21:54:44', '2022-04-01 21:54:44'),
('bd04fa06-6305-469d-b00d-281055f69f21', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '27', '{\"after\": {\"order\": 3, \"title\": \"استاندارد\"}, \"before\": {\"order\": 0, \"title\": \"Dolorem\"}}', '2022-03-31 21:24:49', '2022-03-31 21:24:49'),
('c0fc82ec-e40f-485c-94f0-87b80c1a40d5', 2, 'update', 'App\\Models\\Page', '1', '{\"after\": {\"slug\": \"dayaartz\"}, \"before\": {\"slug\": \"daya\"}}', '2022-03-29 17:51:19', '2022-03-29 17:51:19'),
('c483c393-70a6-40ec-b29a-b3a7176dea90', 3, 'delete', 'App\\Models\\Zeus\\Order', '63341a95-06c9-432e-92b0-eb5ba7cdd7b4', '{\"id\": \"63341a95-06c9-432e-92b0-eb5ba7cdd7b4\", \"code\": \"J840790\", \"type\": \"سیستمی\", \"method\": \"سفارش تلفنی\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:57.000000Z\", \"deleted_at\": \"2022-03-31T13:53:39.000000Z\", \"updated_at\": \"2022-03-31T13:53:39.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Est consequatur esse aspernatur ipsam. Molestiae minus provident sapiente necessitatibus. Dolorem repudiandae et omnis.\"}', '2022-03-31 13:53:39', '2022-03-31 13:53:39'),
('c68937ef-db46-4375-9e75-dbca4c7cec6a', 2, 'create', 'Zeus\\Models\\File', 'c49e705a-a5e6-4db7-8d8d-c36c9f973149', '{\"id\": \"c49e705a-a5e6-4db7-8d8d-c36c9f973149\", \"ext\": \"jpg\", \"name\": \"blog-5.jpeg\", \"path\": \"storage/images/skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg\", \"type\": \"image\", \"created_at\": \"2022-03-29T16:48:52.000000Z\", \"updated_at\": \"2022-03-29T16:48:52.000000Z\", \"thumbnail_path\": \"storage/images/tn_skh35hGJIKb64VfL6u01LERPvemMQrGFiCDgDpTt.jpg\"}', '2022-03-29 16:48:52', '2022-03-29 16:48:52'),
('c6a20828-7bcc-4fc4-acda-8765764e7cc0', 2, 'delete', 'App\\Models\\Page', '5', '{\"id\": 5, \"meta\": null, \"slug\": \"/policy\", \"type\": \"site-page\", \"view\": \"pages.policy\", \"title\": \"شرایط استفاده از خدمات\", \"content\": null, \"created_at\": \"2022-04-08T16:32:23.000000Z\", \"updated_at\": \"2022-04-10T13:29:14.000000Z\"}', '2022-04-10 13:29:47', '2022-04-10 13:29:47'),
('c7c52c88-cada-4aee-a3d2-adc7b410216d', 2, 'create', 'Zeus\\Models\\File', '833cf5d3-8978-4b9c-965f-dec55006b36f', '{\"id\": \"833cf5d3-8978-4b9c-965f-dec55006b36f\", \"ext\": \"jpg\", \"name\": \"blog-19.jpeg\", \"path\": \"storage/images/RC2fWj5qfVqL0ZD1lx7HkMt4cHm1b9axjnI9w1Wc.jpg\", \"type\": \"image\", \"created_at\": \"2022-03-29T16:51:00.000000Z\", \"updated_at\": \"2022-03-29T16:51:00.000000Z\", \"thumbnail_path\": \"storage/images/tn_RC2fWj5qfVqL0ZD1lx7HkMt4cHm1b9axjnI9w1Wc.jpg\"}', '2022-03-29 16:51:00', '2022-03-29 16:51:00'),
('c8b00016-1a4d-45e0-b1e3-77b8eb521cc0', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '5', '{\"after\": {\"order\": 2}, \"before\": {\"order\": 0}}', '2022-04-08 17:14:47', '2022-04-08 17:14:47'),
('c922b829-a0a3-471c-9e33-ad462d95e4d9', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u0631\\\\u0648\\\\u0634 \\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"\\\\u0633\\\\u0631\\\\u06cc\\\\u0639\\\",\\\"\\\\u062a\\\\u0639\\\\u062f\\\\u0627\\\\u062f \\\\u0627\\\\u062a\\\\u0648\\\\u062f \\\\u062f\\\\u0631\\\\u062e\\\\u0648\\\\u0627\\\\u0633\\\\u062a\\\\u06cc\\\":\\\"5\\\"}\", \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"far fa-hand-pointer, 1399\\\\/04\\\\/23\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"far fa-check-square,1399\\\\/04\\\\/27\\\"}\", \"description\": \"<blockquote>\\n<h3><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></h3>\\n</blockquote>\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}, \"before\": {\"details\": {\"روش ثبت سفارش\": \"سریع\", \"تعداد اتود درخواستی\": \"5\"}, \"timeline\": {\"ثبت سفارش\": \"far fa-hand-pointer, 1399/04/23\", \"تسویه حساب و تحویل فایل\": \"far fa-check-square,1399/04/27\"}, \"description\": \"<blockquote>\\n<p><span style=\\\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: left; background-color: #ffffff;\\\">فرایند مهندسی معکوس در زمینه طراحی قالب های محتوایی یکی از ترفند های مهم دنیای گرافیک- برندینگ است. در فرایند معکوس، نخست به اولین برخورد مخاطب و قالب محتوایی می اندیشیم و سپس وابسته به نیاز های برخورد و نقطه تماس مخاطب و محصول، قالب پست را طراحی کرده و جلوه های سازمانی به را آن تزریق می کنیم. قالب پست اصفهان شبکه ساز یکی از قالب های موفق با ماهیت افزایش فروش محصول است.</span></p>\\n</blockquote>\", \"tabular_details\": {\"رنگ\": \"توضیحات رنگ\", \"جزئیات\": \"توضیحات جزئی\"}}}', '2022-04-08 16:44:49', '2022-04-08 16:44:49'),
('d85b6985-dc3d-46b9-85fb-8ecb4f205dd0', 2, 'update', 'App\\Models\\Portfolio', '1', '{\"after\": {\"details\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\"}, \"before\": {\"details\": {\"ثبت سفارش\": \"[\'far fa-hand-pointer\', \'1399/04/23\']\", \"تسویه حساب و تحویل فایل\": \"[\'far fa-check-square\', \'1399/04/27\']\"}}}', '2022-04-08 14:21:30', '2022-04-08 14:21:30'),
('daba94d9-896f-4a4f-9dea-ef801dea6d59', 2, 'create', 'App\\Models\\Service', '15', '{\"id\": 15, \"slug\": \"لوگو-تصویری\", \"group\": \"طراحی لوگو\", \"price\": null, \"title\": \"لوگو تصویری\", \"content\": null, \"package\": 0, \"subtitle\": \"لوگو تصویری توضیحات\", \"parent_id\": 14, \"icon_class\": \"fas fa-image\", \"description\": null}', '2022-03-29 17:21:52', '2022-03-29 17:21:52'),
('de5a9df6-5d4b-4095-8515-925b5db9c395', 2, 'create', 'App\\Models\\Zeus\\Service', '16', '{\"id\": 16, \"slug\": \"کارت-ویزیت\", \"group\": \"main\", \"price\": null, \"title\": \"کارت ویزیت\", \"content\": null, \"package\": 0, \"subtitle\": \"طراحی انواع کارت ویزیت و بیزنس کارد\", \"parent_id\": null, \"icon_class\": \"fas fa-credit-card\", \"description\": null}', '2022-04-01 14:52:45', '2022-04-01 14:52:45'),
('e15caaf0-d884-4e61-aa59-65e8c56dd137', 2, 'update', 'App\\Models\\Page', '1', '{\"after\": {\"title\": \"جشنواره افتتاحیه\"}, \"before\": {\"title\": \"جشنواره فروش ویژه افتتاحیه دایا آرتز\"}}', '2022-03-29 17:49:42', '2022-03-29 17:49:42'),
('e18d2428-1417-4848-ac42-e2e54f335f36', 3, 'delete', 'App\\Models\\Zeus\\Order', '656be45d-25f3-4c20-b29f-6b3def79e9ec', '{\"id\": \"656be45d-25f3-4c20-b29f-6b3def79e9ec\", \"code\": \"Y464154\", \"type\": \"دستی\", \"method\": \"سفارش با ربات تلگرامی\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:57.000000Z\", \"deleted_at\": \"2022-03-31T13:54:51.000000Z\", \"updated_at\": \"2022-03-31T13:54:51.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Hic aliquam aut est vel. Est quo voluptate velit architecto pariatur voluptatem qui ullam. Fugiat eos dicta et aspernatur et. Cumque laboriosam accusantium sed inventore delectus ut.\"}', '2022-03-31 13:54:51', '2022-03-31 13:54:51'),
('e1a72fe2-fa18-4f39-9bb1-de23a26f5835', 3, 'delete', 'App\\Models\\Zeus\\Order', '20322c54-75c3-4663-8940-c5dc2b60e732', '{\"id\": \"20322c54-75c3-4663-8940-c5dc2b60e732\", \"code\": \"J458299\", \"type\": \"سیستمی\", \"method\": \"سفارش با ربات تلگرامی\", \"status\": \"just-recieved\", \"details\": [], \"user_id\": 1, \"company_id\": null, \"created_at\": \"2022-03-29T16:21:56.000000Z\", \"deleted_at\": \"2022-03-31T13:54:48.000000Z\", \"updated_at\": \"2022-03-31T13:54:48.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": \"Rerum qui rerum commodi sit consectetur. Ad necessitatibus quasi nobis deserunt veniam ducimus nesciunt. Nobis nesciunt assumenda quaerat quaerat enim aliquam qui. Provident eos dolor qui facilis.\"}', '2022-03-31 13:54:48', '2022-03-31 13:54:48'),
('e39451e8-38fe-470e-920e-41e2f3715134', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '4', '{\"after\": {\"order\": 3}, \"before\": {\"order\": 0}}', '2022-04-08 17:14:10', '2022-04-08 17:14:10'),
('e7fd2be5-56cb-4b0a-8a35-6b9161e11c7c', 2, 'update', 'App\\Models\\Zeus\\User', '1', '{\"after\": {\"password\": \"$2y$10$UuUUqoC3WexHvh.nXpqeS.r52j2Zz8X9E0QA26./RqLNkH3P7dtTu\"}, \"before\": {\"password\": \"???\"}}', '2022-03-31 20:23:23', '2022-03-31 20:23:23'),
('ebeb1943-4cdf-4511-9191-e223ffd3df48', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '6', '{\"after\": {\"order\": 1}, \"before\": {\"order\": 0}}', '2022-04-08 17:14:34', '2022-04-08 17:14:34'),
('f043fffd-4bd1-436e-88fe-8de5f75a151d', 2, 'create', 'App\\Models\\Zeus\\Order', '0dd54318-6cf2-4bfe-b739-a83c1fc341ce', '{\"id\": \"0dd54318-6cf2-4bfe-b739-a83c1fc341ce\", \"code\": \"W248056\", \"type\": \"manual\", \"method\": \"tele-order\", \"status\": \"status test\", \"details\": [], \"user_id\": 1, \"created_at\": \"2022-03-31T20:32:09.000000Z\", \"updated_at\": \"2022-03-31T20:32:09.000000Z\", \"description\": null, \"finished_at\": null, \"status_info\": null}', '2022-03-31 20:32:09', '2022-03-31 20:32:09'),
('f25cfcd1-8703-47aa-a157-a9375f94de39', 2, 'create', 'Zeus\\Models\\File', '38f333c4-030a-4152-83e9-da793b4cbb44', '{\"id\": \"38f333c4-030a-4152-83e9-da793b4cbb44\", \"ext\": \"jpg\", \"name\": \"myphoto.jpg\", \"path\": \"storage/images/sfpWSw3cub8bdHgC94BxeH9GcadytOconEBrMdKs.jpg\", \"type\": \"image\", \"created_at\": \"2022-03-31T13:26:09.000000Z\", \"updated_at\": \"2022-03-31T13:26:09.000000Z\", \"thumbnail_path\": \"storage/images/tn_sfpWSw3cub8bdHgC94BxeH9GcadytOconEBrMdKs.jpg\"}', '2022-03-31 13:26:09', '2022-03-31 13:26:09'),
('f43874e6-7da6-4f20-b6eb-8bbb32fe4c12', 2, 'update', 'App\\Models\\Service', '2', '{\"after\": {\"description\": \"<p>مزیت های طراحی بروشور در دایا آرتز</p>\"}, \"before\": {\"description\": \"???\"}}', '2022-04-08 17:17:30', '2022-04-08 17:17:30'),
('f73c28c8-aea9-4990-936f-a850ca71341e', 2, 'create', 'App\\Models\\Portfolio', '1', '{\"id\": 1, \"slug\": \"test\", \"title\": \"test\", \"company\": \"company\", \"details\": {\"نوع یا شیوه سفارش\": \"سفارش سریع\", \"تعداد ادیت درخواستی\": \"3\"}, \"timeline\": \"{\\\"\\\\u062b\\\\u0628\\\\u062a \\\\u0633\\\\u0641\\\\u0627\\\\u0631\\\\u0634\\\":\\\"[\'far fa-hand-pointer\', \'1399\\\\/04\\\\/23\']\\\",\\\"\\\\u062a\\\\u0633\\\\u0648\\\\u06cc\\\\u0647 \\\\u062d\\\\u0633\\\\u0627\\\\u0628 \\\\u0648 \\\\u062a\\\\u062d\\\\u0648\\\\u06cc\\\\u0644 \\\\u0641\\\\u0627\\\\u06cc\\\\u0644\\\":\\\"[\'far fa-check-square\', \'1399\\\\/04\\\\/27\']\\\"}\", \"created_at\": \"2022-04-08T14:12:29.000000Z\", \"service_id\": 1, \"updated_at\": \"2022-04-08T14:12:29.000000Z\", \"description\": \"haskdhkjasgdkasgkldgaklsdglkasgd\", \"about_company\": \"this is about the company\", \"company_opinion\": \"this is the opinion on the company\", \"tabular_details\": \"{\\\"\\\\u0631\\\\u0646\\\\u06af\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u0631\\\\u0646\\\\u06af\\\",\\\"\\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\\u0627\\\\u062a\\\":\\\"\\\\u062a\\\\u0648\\\\u0636\\\\u06cc\\\\u062d\\\\u0627\\\\u062a \\\\u062c\\\\u0632\\\\u0626\\\\u06cc\\\"}\"}', '2022-04-08 14:12:30', '2022-04-08 14:12:30'),
('f78c546a-7b4b-4671-bbdf-2a4828c144d1', 2, 'update', 'App\\Models\\Page', '5', '{\"after\": {\"title\": \"شرایط استفاده از خدمات\"}, \"before\": {\"title\": \"شرایط و ضوابط\"}}', '2022-04-10 13:29:14', '2022-04-10 13:29:14'),
('fed0352b-5387-48fb-a646-afe070e15415', 2, 'update', 'App\\Models\\Setting', '10', '{\"after\": {\"value\": \"s:1:\\\"g\\\";\"}, \"before\": {\"value\": \"fas fa-print,far fa-pencil-ruler, fab fa-instagram\"}}', '2022-04-11 16:43:24', '2022-04-11 16:43:24'),
('ff734e0b-3c61-4652-98b7-28c38a82338b', 2, 'update', 'App\\Models\\Zeus\\ServicePlan', '5', '{\"after\": {\"order\": 1}, \"before\": {\"order\": 2}}', '2022-04-08 17:15:17', '2022-04-08 17:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `zeus_model_relations`
--

CREATE TABLE `zeus_model_relations` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('belongsTo','belongsToMany','hasOne','hasMany','morphOne','morphMany') COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_model_type` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_model_relations`
--

INSERT INTO `zeus_model_relations` (`id`, `type`, `model_type_id`, `target_model_type`, `local_method`) VALUES
(4, 'belongsTo', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', '1b765fc9-9616-4196-b722-dfb504566eca', 'user'),
(5, 'belongsTo', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', 'company'),
(6, 'belongsTo', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 'order'),
(7, 'belongsTo', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 'service'),
(8, 'belongsTo', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 'service'),
(9, 'hasMany', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', 'plans'),
(10, 'belongsTo', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 'parent'),
(11, 'hasMany', '1b765fc9-9616-4196-b722-dfb504566eca', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 'orders'),
(12, 'belongsTo', 'ff6bb457-538d-4b1c-b4cb-d64377788341', '1b765fc9-9616-4196-b722-dfb504566eca', 'user'),
(13, 'belongsTo', 'ff6bb457-538d-4b1c-b4cb-d64377788341', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 'order'),
(14, 'hasOne', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 'ff6bb457-538d-4b1c-b4cb-d64377788341', 'invoice'),
(15, 'hasMany', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', 'items'),
(16, 'belongsTo', 'a00c01b4-0120-4c56-abaa-23ac168408cf', 'ff6bb457-538d-4b1c-b4cb-d64377788341', 'invoice'),
(17, 'hasMany', 'ff6bb457-538d-4b1c-b4cb-d64377788341', 'a00c01b4-0120-4c56-abaa-23ac168408cf', 'bills'),
(18, 'belongsTo', '5bb48125-d615-492e-9f8f-574f348f57fd', '1b765fc9-9616-4196-b722-dfb504566eca', 'user'),
(19, 'belongsTo', '5bb48125-d615-492e-9f8f-574f348f57fd', 'a00c01b4-0120-4c56-abaa-23ac168408cf', 'bill'),
(22, 'belongsToMany', '52444103-29a7-45b1-b5fe-f224844ae8c5', '06914f30-7a12-4853-9af8-d1171f16fc62', 'users'),
(23, 'belongsTo', 'bdab7c39-6f10-40af-8dd0-11448eedac08', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 'service');

-- --------------------------------------------------------

--
-- Table structure for table `zeus_model_rows`
--

CREATE TABLE `zeus_model_rows` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_relation_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` enum('create','edit','both') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `view` tinyint(1) NOT NULL DEFAULT '1',
  `create` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `details` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_model_rows`
--

INSERT INTO `zeus_model_rows` (`id`, `model_type_id`, `model_relation_id`, `parent_id`, `title`, `field`, `type`, `required`, `group`, `placeholder`, `default_value`, `order`, `dynamic`, `browse`, `view`, `create`, `edit`, `trash`, `details`, `created_at`, `updated_at`) VALUES
('00f72cdc-ef01-47f0-9db7-f46dfcd141f2', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Body', 'body', 'richtext', 'both', NULL, NULL, NULL, 5, 0, 0, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:59:26'),
('02b3e840-09ed-469c-8707-c6810aaa98a9', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Avatar', 'avatar', 'text', NULL, NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('0404a472-89a3-4ffb-8dcb-20b07d8bd1c8', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Lang', 'lang', 'select', NULL, NULL, NULL, NULL, 10, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"fa\", \"en\"]}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('0563cb21-1065-412f-bd6a-aa8a440bed91', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Author id', 'author_id', 'number', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:59:26'),
('05cc90ed-b76d-44ff-b02c-c5912cc9a4cf', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Level', 'level', 'select', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"register\", \"new\", \"user\", \"customer\", \"vip\"]}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('07746a69-5d90-48f9-b273-cefe59743435', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:13:51'),
('078de082-ba73-499d-8853-947596c5f6f4', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 7, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:51:43'),
('0ab8ec61-9d11-461f-9de0-714760124e3f', 'b7e82030-8716-4a66-a698-d60137a6ac4f', NULL, NULL, 'Type', 'type', 'text', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-11 16:34:31', '2022-04-11 16:34:31'),
('0e6bc216-f63b-4107-a610-a6c0799753ba', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Description', 'description', 'richtext', NULL, NULL, NULL, NULL, 11, 0, 0, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-04-11 20:39:25'),
('0f301f45-3f42-46d1-8536-b55a93c5863a', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Status', 'status', 'text', 'both', NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('0f5235f7-1c93-4cfe-9681-befd39d2a41d', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Intro', 'intro', 'textarea', 'both', NULL, NULL, NULL, 10, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('11167b05-f7f6-446c-81ff-b928009cca2c', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Status info', 'status_info', 'textarea', NULL, NULL, NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('11b4f2d9-8b0f-45d7-a0b1-e3fd013f6c20', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Description', 'description', 'textarea', NULL, NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:41:23'),
('11e491f7-b66d-4c06-8554-18907de4e21c', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Description', 'description', 'textarea', NULL, NULL, NULL, NULL, 8, 0, 0, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:48:03'),
('128a89d0-de9b-4704-9eec-c58942f7648a', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Lastname', 'lastname', 'text', NULL, NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('148b8d4b-9bc6-4047-bf7e-d91b5a08faf1', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 12, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 15:02:09'),
('1491e756-55e8-4716-b1f4-459f002d9fd4', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Market type', 'market_type', 'select', 'both', NULL, NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"classic\", \"modern\"]}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('1678dd8e-fde5-457c-9dcd-a2f2e68a9f1e', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 4, NULL, 'Customer', 'user_id', 'number', NULL, NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-04-01 14:10:24'),
('17253559-e769-44ce-979e-2ef490af1f9a', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 7, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:16'),
('17a84793-e9dc-4b3d-a4a8-52e45ec1d384', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 13, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:41:23'),
('17c06653-b82b-4db2-9845-a2885c28c61b', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Password', 'password', 'password', 'create', NULL, NULL, NULL, 8, 0, 0, 0, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('1829dc36-de6e-4323-b3e4-6eb4c48577d7', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Caption', 'caption', 'textarea', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:16'),
('18438288-2829-43c8-9332-e784f7e43dec', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Value', 'value', 'number', 'both', 'Value', NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:44:35'),
('1c7110ff-1e54-420b-b7a1-3177d907aaab', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Meta', 'meta', 'textarea', NULL, NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('1e30a80d-8fe7-4c83-8131-5615ce47efb4', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Details', 'details', 'json', NULL, NULL, NULL, NULL, 9, 0, 0, 0, 0, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('21dd4cb3-0b59-4007-91d3-2b70a737c549', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Content', 'content', 'textarea', NULL, NULL, NULL, NULL, 12, 0, 0, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-04-11 20:39:22'),
('222265c0-ec2c-43ae-bcce-c2d5518fc0a6', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Timeline', 'timeline', 'key-value', 'both', 'timeline', NULL, NULL, 10, 0, 0, 0, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 14:06:21'),
('2276fbd8-fb7e-4107-b907-499e4906b288', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Max total', 'max_total', 'number', NULL, 'Options', NULL, NULL, 10, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:45:11'),
('248abe5b-ee71-4054-a19e-e916e12c502b', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Provider', 'provider', 'text', 'both', NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 20:39:33'),
('27cc7617-8103-4fc9-9ab4-ac5211d9e819', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 14, NULL, 'Invoice', 'invoice', 'multi-select', NULL, NULL, NULL, NULL, 14, 0, 1, 1, 0, 0, 0, '[]', '2022-04-01 15:27:06', '2022-04-01 15:30:04'),
('28a5d589-0e35-4340-90c5-02841f7637fe', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:13:51'),
('2a205d06-a3f8-42b6-a416-9e08a7e3557a', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Id', 'id', 'text', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('2af05ee3-ecdb-416a-a76f-15b33d80715e', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Title en', 'title_en', 'text', NULL, NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('2b8bf70b-06d8-46a1-83f2-a43ea9a33fa5', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 12, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('2c2e7032-fbce-4f63-a3c8-75a7c1992ad5', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 8, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 20:39:33'),
('2c7afcfb-ab93-4748-8a03-4e37a621f2d6', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Description', 'description', 'richtext', 'both', NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 16:40:18'),
('2cf8f60b-49bd-455c-a733-3266f0d424e0', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Id', 'id', 'text', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:51:43'),
('31807486-62fa-4867-972c-8658e5f635ed', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Active', 'active', 'checkbox', NULL, NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:54:04'),
('33bf9eab-2682-421d-820e-aa28fc2ed064', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Max attempts', 'max_attempts', 'number', 'both', 'Options', NULL, NULL, 8, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:45:11'),
('33ffb381-b2ea-46e6-be41-f75a7939394a', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 8, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('3413084f-6dae-454c-aa58-8c2fc7499665', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Status info', 'status_info', 'textarea', NULL, NULL, NULL, NULL, 8, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-04-01 14:29:55'),
('36611fda-d264-483a-a463-0b53e8dcfa96', '52444103-29a7-45b1-b5fe-f224844ae8c5', NULL, NULL, 'About', 'about', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:36:48', '2022-04-02 12:36:48'),
('393c53a5-92d8-452e-97ef-de264d6fa386', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'User', 'user_id', 'number', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 22:21:40'),
('3a7aa539-0273-4e70-9c9e-108bc1654f88', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', 7, NULL, 'Service', 'service_id', 'number', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-04-01 14:30:04'),
('3ad2e358-c701-4552-a715-67ee77c94cc4', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('3ae6dfa9-4bfc-4ae6-8e34-6a62e5f4a2a8', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Content', 'content', 'textarea', NULL, NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('3f40226e-bc97-4645-bf7c-f60a353772b1', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Status', 'status', 'select', 'both', NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"verified\", \"approved\", \"canceled\", \"pending\"]}', '2022-04-01 20:39:33', '2022-04-01 20:39:33'),
('3f9fe288-33b3-44b7-9957-bedd68db7e25', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Slug', 'slug', 'slug', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"from\": \"\", \"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('3fc94e7c-fdba-4559-8c84-d0b4f6f13e29', 'b7e82030-8716-4a66-a698-d60137a6ac4f', NULL, NULL, 'Value', 'value', 'textarea', 'both', NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-11 16:34:31', '2022-04-11 16:34:31'),
('42ac5fe4-70cb-433d-82df-aaefd86897f6', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Min total', 'min_total', 'number', NULL, 'Options', NULL, NULL, 9, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:45:11'),
('443df304-bf93-4895-9413-6590a04b91fb', '52444103-29a7-45b1-b5fe-f224844ae8c5', NULL, NULL, 'Name', 'name', 'text', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:36:48', '2022-04-02 12:36:48'),
('465d5e64-2b95-47b8-81ba-e10746736148', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Due date', 'due_date', 'datetime', NULL, NULL, NULL, NULL, 11, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-04-01 14:29:55'),
('478b8258-bd21-40a5-9b82-67c954bf179d', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Attempts', 'attempts', 'number', 'both', 'Options', NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:45:11'),
('4a330d70-27c0-40c1-9094-2cc1b1f2bd37', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 15:02:09'),
('4b20de83-1154-413c-9cf6-0ba35c4a8605', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Phone verified', 'phone_verified', 'checkbox', 'both', NULL, NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('4d466169-b459-48b6-9b36-421579e3e8a6', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 10, NULL, 'Parent', 'parent_id', 'number', NULL, NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-03-31 21:18:27'),
('4fcf49c1-40e2-44cc-8914-8fbe0a339a8b', 'ff6bb457-538d-4b1c-b4cb-d64377788341', 12, NULL, 'User id', 'user_id', 'number', 'both', NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 15:04:04'),
('51c49f51-70ce-4ed3-82aa-06305d2c6164', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Package', 'package', 'checkbox', NULL, NULL, NULL, NULL, 8, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-04-11 20:39:06'),
('5520b1e2-e224-48eb-8424-7bf5557c0d96', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Type', 'type', 'radio', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"manual\", \"automate\"]}', '2022-03-31 13:39:40', '2022-03-31 20:18:03'),
('567075dd-3a3b-41ee-b4f5-f21f3e748298', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Details', 'details', 'key-value', NULL, NULL, NULL, NULL, 7, 0, 0, 0, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 20:43:48'),
('5807e494-fd5c-405d-b5a5-a48ad55c8a81', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Multipay', 'multipay', 'checkbox', 'both', NULL, NULL, NULL, 5, 0, 0, 1, 1, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 22:18:47'),
('587395f9-72e2-487e-bb68-5cf476126a97', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Offer id', 'offer_id', 'number', NULL, NULL, NULL, NULL, 8, 0, 0, 1, 0, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 22:18:36'),
('59bf0df1-f749-4411-a9ee-c502a0f4ebb9', 'ff6bb457-538d-4b1c-b4cb-d64377788341', 17, NULL, 'Bills', 'bills', 'multi-select', NULL, NULL, NULL, NULL, 13, 0, 1, 1, 0, 0, 0, '[]', '2022-04-01 22:19:39', '2022-04-01 22:19:46'),
('5a6d25d6-7d10-4d63-9395-5dba4c676bda', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 8, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:13:51'),
('5f8e164b-4edb-412f-849b-78f719c5d0f7', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'User id', 'user_id', 'number', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('609505c8-b299-4398-8dc2-3f2c155d31bb', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Email verified at', 'email_verified_at', 'datetime', NULL, NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('60a25e1a-e87e-4e00-a0ac-c442f1694376', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Group', 'group', 'text', 'both', NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-03-31 20:42:17'),
('62315fc7-af6f-418e-b75b-a7fa52ac9e87', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Company', 'company', 'text', 'both', NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('632be39c-da34-449d-8314-8c28061f243f', 'b7e82030-8716-4a66-a698-d60137a6ac4f', NULL, NULL, 'Group', 'group', 'text', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-11 16:34:31', '2022-04-11 16:34:31'),
('651e8928-1751-4340-aa22-3e3a650a9571', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Phone number', 'phone_number', 'text', NULL, NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('67029993-8e63-4d74-a9a5-658b98b8a9d0', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Paid at', 'paid_at', 'datetime', NULL, NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:51:43'),
('67201500-ae22-4033-bafa-47ca00e15f9a', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Available for all', 'available_for_all', 'checkbox', 'both', 'Options', NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:45:46'),
('6745a7bb-4e0d-44d0-bbdd-a1e9fc3b49bb', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Value type', 'value_type', 'select', 'both', 'Value', NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"amount\", \"percentage\"]}', '2022-04-01 21:41:23', '2022-04-01 21:44:35'),
('67b0a1b8-43fc-40f9-a18a-a77742003f0a', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 8, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:51:43'),
('682282b6-b595-4f95-beb5-71a6eb8840f0', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('6a4126c2-b32a-4b06-b508-fcb41ef215d8', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Total', 'total', 'price', NULL, NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 22:19:01'),
('6d534e7f-7230-4ae3-beab-69c4baf39549', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Type', 'type', 'select', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"site-page\", \"landing-page\"]}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('6dc7034e-50dd-4b08-82c0-5625775a7260', '52444103-29a7-45b1-b5fe-f224844ae8c5', 22, NULL, 'Employees', 'users', 'multi-select', 'both', NULL, NULL, NULL, 3, 0, 0, 1, 1, 1, 0, '[]', '2022-04-02 12:37:53', '2022-04-02 14:16:17'),
('6f46d9a2-e0c0-45dd-a888-9fcb08cb9170', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 15, NULL, 'Items', 'items', 'multi-select', NULL, NULL, NULL, NULL, 15, 0, 1, 1, 0, 0, 0, '[]', '2022-04-01 15:36:22', '2022-04-01 15:36:31'),
('71fdc302-ca4e-4fbf-aa87-6689aa3f6565', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('74a0e0e0-3b04-497c-adbd-1e11cf4f24c8', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:41:23'),
('750ff93f-dfd0-452b-849a-70cbbe57569d', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Short Description', 'short_description', 'textarea', NULL, NULL, NULL, NULL, 10, 0, 1, 1, 1, 1, 0, '[]', '2022-04-11 20:38:00', '2022-04-11 20:39:25'),
('7568323c-bec5-4a39-b92c-453d0911b733', 'b7e82030-8716-4a66-a698-d60137a6ac4f', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-11 16:34:31', '2022-04-11 16:34:31'),
('75aff81d-bf70-44dd-838a-52e868053e70', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Ordering', 'order', 'number', 'both', NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:16'),
('79ec0070-ae50-4a33-ae82-55a06004baa4', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'First name', 'first_name', 'text', NULL, NULL, NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('7bebd2a7-8545-427b-b35d-a59a7e6c8c37', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 7, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:13:51'),
('7c947cc4-5c75-40d6-a323-1994c8f83583', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-03-31 20:42:17'),
('7d63e3d4-88a6-48d0-9067-db3645d8a584', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Deleted at', 'deleted_at', 'datetime', NULL, NULL, NULL, NULL, 12, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:41:23'),
('7e0e0a96-d9b3-4e1e-a5c7-b9359f360928', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-04-01 14:29:55'),
('7ea834b2-4b45-4280-9e02-ebdbb334cf18', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Email', 'email', 'email', NULL, NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('7eec11e4-c7ae-436e-b9af-ad26a41e0aae', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Id', 'id', 'text', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('7f204d32-aaed-4462-8929-f77a8debd02b', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Finished at', 'finished_at', 'datetime', NULL, NULL, NULL, NULL, 13, 0, 1, 1, 0, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-04-01 14:00:53'),
('81f0b8e5-38d4-4277-b607-eff3918f68c2', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Company opinion', 'company_opinion', 'textarea', 'both', NULL, NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('84b9dc68-f9a0-4502-b9c6-622c14f28f0f', 'ff6bb457-538d-4b1c-b4cb-d64377788341', 13, NULL, 'Order', 'order_id', 'text', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 15:04:04'),
('84d498df-c46c-4cf3-a1c6-505c7c324db6', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Offer id', 'offer_id', 'number', NULL, NULL, NULL, NULL, 6, 0, 0, 1, 0, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 21:07:23'),
('8564b92a-f9a7-46a0-b5ce-c6817e20b066', 'b7e82030-8716-4a66-a698-d60137a6ac4f', NULL, NULL, 'Key', 'key', 'text', 'both', NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-11 16:34:31', '2022-04-11 16:34:31'),
('8801dbf9-cb82-42f2-b4aa-2127f8b94703', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Role id', 'role_id', 'number', NULL, NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('88bb1f38-ae41-4669-96b0-018761e947c8', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Description', 'description', 'textarea', 'both', NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:13:51'),
('890d2b2a-9b5c-4c44-b0d0-251b2d2a8c6d', 'b7e82030-8716-4a66-a698-d60137a6ac4f', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-11 16:34:31', '2022-04-11 16:34:31'),
('89550e62-f9d4-4daf-89a8-fa54a27f8f16', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 14, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 20:37:23'),
('8c794208-bcda-4d9c-be12-d771f06e6879', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 14, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('8cb7b67b-afb8-4761-b6b4-5116f2a81969', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:16'),
('8cf094a7-6371-4be3-8e58-d43a8960b191', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Active', 'active', 'checkbox', NULL, NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 22:18:36'),
('8f64ef01-4835-45e8-a864-13b2bdb7bd79', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 13, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('9012f580-0009-41df-976a-b003886f665a', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 21:15:06'),
('905b3c7e-f1bf-4724-bf26-a9c486c0296a', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Expires at', 'expires_at', 'datetime', NULL, NULL, NULL, NULL, 9, 0, 0, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 22:18:36'),
('9110a249-94a8-4622-b52c-38c58a70208f', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Active', 'active', 'checkbox', NULL, NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('919806fa-5c03-44db-8057-648ea2c74eaf', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', 9, NULL, 'Plans', 'plans', 'multi-select', NULL, NULL, NULL, NULL, 13, 0, 1, 1, 0, 0, 0, '[]', '2022-03-31 21:22:08', '2022-04-11 20:39:19'),
('9243d720-7c96-4009-87cf-6c2e3c5d9479', '5bb48125-d615-492e-9f8f-574f348f57fd', 19, NULL, 'Bill', 'bill_id', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 22:21:23'),
('92b2eb5f-9a19-4e90-9759-2b6a4133a83a', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Details', 'details', 'key-value', 'both', 'details', NULL, NULL, 8, 0, 0, 0, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 14:06:20'),
('937168e6-adeb-40c9-8868-3a17b55a916e', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 11, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 15:02:09'),
('9394b674-d048-4938-8393-fc6c6dcfecf6', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 14, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:41:23'),
('93c1aad7-5031-4390-9910-95100443e166', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Transaction id', 'transaction_id', 'text', 'both', NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 20:39:33'),
('978814e6-f8d1-4ace-8883-a09cbb0c9a45', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('98fb1766-84c3-4b66-8c9e-824f9983294f', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Slug', 'slug', 'slug', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"from\": \"\", \"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('9bc8514c-8a20-4044-a1bb-ea7085995eb8', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:41:23'),
('9c87e3cd-1973-4761-8ccf-ba6ddafb4565', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 15:02:09'),
('9c94d03b-2236-4467-b330-6c89d0aefd3f', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Remember token', 'remember_token', 'text', NULL, NULL, NULL, NULL, 11, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('9eb43e6b-fe74-4819-91c2-a8077c1c938f', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 9, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:08:01'),
('a0e56723-6dad-4b3e-83ca-24dc5d873a81', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Total', 'total', 'price', 'both', NULL, NULL, NULL, 10, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-04-01 14:29:55'),
('a1b15605-1293-4e0d-b948-bcf6601c2aa0', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Amount', 'amount', 'price', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 20:42:36'),
('a232ae56-54f4-43cd-949c-dbd3ad0b20f2', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Firstname', 'firstname', 'text', NULL, NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('a2446077-296a-4d28-9b6a-5216bbcff1cd', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Website', 'website', 'text', NULL, NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('a29bd28d-b2a2-4b46-844b-8ef195cc9657', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Reading time', 'reading_time', 'text', 'both', NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:13:51'),
('a4671e94-c076-46c6-b918-b8bf6a728b45', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Expires at', 'expires_at', 'datetime', NULL, NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:16'),
('a575e533-8966-4879-b0a5-873c5c91baf1', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('a6650cb7-96ad-4cf7-9f86-4c3abc3d36be', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', 8, NULL, 'Service', 'service_id', 'number', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:56'),
('a6c7eab4-4827-4b13-8725-63922e62a46f', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', 5, NULL, 'Company', 'company_id', 'text', NULL, NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-04-01 14:10:24'),
('a803c1ff-0ffe-4b61-8a11-9b5a4533eaee', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', 6, NULL, 'Order', 'order_id', 'text', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 20:39:07'),
('aa6201c3-6570-4d7d-bcc8-70c1217bc97d', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Business type id', 'business_type_id', 'number', NULL, NULL, NULL, NULL, 8, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('aa63bc7d-15c8-4fdd-937b-c377f08ca7aa', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Plan id', 'plan_id', 'number', NULL, NULL, NULL, NULL, 4, 0, 0, 0, 0, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 20:45:21'),
('aa8e7dcf-89ad-4eb1-ab5c-3d18a6267005', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 11, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:08:16'),
('aeb74e1c-0744-4489-b062-d0e0bc7accf1', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Last name', 'last_name', 'text', NULL, NULL, NULL, NULL, 8, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('b175c0c3-8b65-4eac-b165-e31f2864ca41', '61aec86e-2c9c-4802-a4cb-8c10fda93a62', NULL, NULL, 'Slug', 'slug', 'slug', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"from\": \"title\", \"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:13:51', '2022-04-01 21:59:50'),
('b36a3c1f-d122-4cfb-ac4a-420db81b8116', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Subtitle', 'subtitle', 'text', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-03-31 20:42:17'),
('b4050c1e-927e-4b07-afbb-f5d3d124d232', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Email', 'email', 'email', NULL, NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('b44b7170-eb91-482b-88b2-268f1e8fa6b4', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Password', 'password', 'password', NULL, NULL, NULL, NULL, 9, 0, 0, 0, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('b4ddae70-3e0d-4ab9-af6c-d7cabc168be6', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 13, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('b50015b6-f027-427f-90ab-08a5ffbdb8d3', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'View', 'view', 'text', NULL, NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('b808042f-25d2-4abf-a4c2-1b6f29d73e95', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:14:28'),
('b833d6cd-776d-474f-ab1b-7d295cb1ee3e', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Price', 'price', 'price', 'both', NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:16'),
('b8a48cc4-b0dd-4686-92cb-a95f441a3660', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Name', 'name', 'text', NULL, NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('ba30f2ae-cdc1-4954-ba94-6d5fb9d6c505', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Paid at', 'paid_at', 'datetime', NULL, NULL, NULL, NULL, 10, 0, 1, 1, 0, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 15:02:09'),
('bb72009a-7263-4050-a92c-db5310fa7b85', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Deleted at', 'deleted_at', 'datetime', NULL, NULL, NULL, NULL, 10, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:07:09'),
('bc804316-4c1d-46c4-a2d3-52e50ef78ba6', '52444103-29a7-45b1-b5fe-f224844ae8c5', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:36:48', '2022-04-02 12:36:48'),
('bd39e804-2a1b-43a5-a945-7b4c2e2bbb49', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 12, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('bd5d02ed-200d-4e4e-8a7a-b039a2116d7a', 'cd462ac5-0b83-4424-9ad0-4352dcd904f7', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 8, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 21:11:16', '2022-03-31 21:11:16'),
('be0ff160-d3eb-4e68-8d1c-4a20386c459c', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 20:37:23'),
('c2a8c5e0-17df-4e14-b6ff-628ca92756f1', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Code', 'code', 'text', 'both', NULL, NULL, NULL, 5, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 20:30:06'),
('c401d028-6c49-44ea-981c-a78fee79f3a8', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Details', 'details', 'json', NULL, NULL, NULL, NULL, 11, 0, 0, 0, 0, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('c5f986fb-dcac-45bb-8d13-3f56eeb7b612', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Finished at', 'finished_at', 'datetime', NULL, NULL, NULL, NULL, 10, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('c61d2ad0-8d71-4e65-b77a-34b01b1d7737', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Status', 'status', 'select', 'both', NULL, NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"submitted\", \"reviewed\", \"designing\", \"ready\", \"editing\", \"canceled\", \"suspended\", \"finished\", \"checked-out\"]}', '2022-03-31 20:37:23', '2022-04-01 14:29:55'),
('c7f2bc4c-37f6-4cc3-ad17-72f288dbc27b', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Icon class', 'icon_class', 'text', 'both', NULL, NULL, NULL, 5, 0, 0, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-03-31 21:17:39'),
('c9aabdef-7bbd-4de1-99f2-1f4f38f82a03', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Method', 'method', 'select', 'both', NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}, \"choices\": [\"quick-order\", \"professional\", \"tele-order\", \"telegram-bot\", \"messanger\"]}', '2022-03-31 13:39:40', '2022-03-31 13:53:18'),
('c9c89aa9-fa18-41a2-98d3-85e29ae9e48b', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('cae9e27a-7965-4664-8209-e24a9575fe3e', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Title', 'title', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-03-31 20:42:17'),
('cd1cba88-7b80-4e5f-843c-ee86d148ba0c', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Expires at', 'expires_at', 'datetime', NULL, 'Options', NULL, NULL, 11, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:46:01'),
('cf545e98-f35b-478e-ac1d-08b07bc32c24', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Tabular details', 'tabular_details', 'key-value', 'both', 'tabular', NULL, NULL, 9, 0, 0, 0, 1, 1, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 14:06:21'),
('d4f46a4a-076b-4877-b956-b41147ff8f02', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Phone number', 'phone_number', 'text', NULL, NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('d84a91f2-7796-4192-9284-e9e8b93bf40a', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Code', 'code', 'text', 'both', NULL, NULL, NULL, 2, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:51:43'),
('db0e95ab-51f6-4010-a790-dd3e7978c1bf', 'bdab7c39-6f10-40af-8dd0-11448eedac08', 23, NULL, 'Service', 'service_id', 'number', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 14:32:06'),
('db7f9167-d81c-496e-99bd-03e7107b2f9e', '1b765fc9-9616-4196-b722-dfb504566eca', NULL, NULL, 'Email verified at', 'email_verified_at', 'datetime', NULL, NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:06:45', '2022-03-31 20:06:45'),
('dccf5a97-a38b-4118-bd12-3aa8c5600eea', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Title', 'title', 'text', NULL, NULL, NULL, NULL, 4, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:51:43'),
('dd55bbb4-fae9-43bb-8b8f-862671b8c038', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Company id', 'company_id', 'text', NULL, NULL, NULL, NULL, 5, 0, 0, 1, 0, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 20:45:21'),
('de0aeeaa-ef33-483f-b61e-6886627a7969', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Slug', 'slug', 'slug', 'both', NULL, NULL, NULL, 4, 0, 0, 1, 1, 1, 0, '{\"from\": \"\", \"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-03-31 21:17:49'),
('df2da005-2400-45b8-b2b6-e8cf16c6f0d8', 'abc255f5-3ec1-497c-9de6-ceffd00750a7', NULL, NULL, 'Deleted at', 'deleted_at', 'datetime', NULL, NULL, NULL, NULL, 11, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 13:39:40', '2022-03-31 13:39:40'),
('e2145776-ad0d-49c5-ba59-a2b95ad156c3', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Main Service', 'main', 'checkbox', NULL, NULL, NULL, NULL, 7, 0, 1, 1, 1, 1, 0, '[]', '2022-04-11 20:38:44', '2022-04-11 20:39:06'),
('e2189013-44ac-45f1-a343-748e8718f41b', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Description', 'description', 'textarea', NULL, NULL, NULL, NULL, 9, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-04-01 14:29:55'),
('e21f9612-eebd-460b-8b39-82373a0a47c2', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'About company', 'about_company', 'textarea', 'both', NULL, NULL, NULL, 6, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('e692e79b-ccdf-41bc-8936-99dc420a20d4', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Id', 'id', 'number', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 20:39:33'),
('ea4de171-9c8b-495b-932a-165bec082a63', 'a00c01b4-0120-4c56-abaa-23ac168408cf', 16, NULL, 'Invoice', 'invoice_id', 'number', 'both', NULL, NULL, NULL, 1, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:56:45'),
('eaddc685-833f-48cb-a59c-a3e8d37257b1', 'c181541c-1912-4aa8-931d-947a0fad23e7', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 7, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 16:13:21', '2022-04-08 16:13:21'),
('eb5e8714-6271-46a0-a9f7-36455484e4a5', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Deleted at', 'deleted_at', 'datetime', NULL, NULL, NULL, NULL, 12, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 20:37:23'),
('ee5aa426-a0ec-49eb-8e3d-8170b6719b0d', 'fa6de0ef-1c4e-4283-ae02-794f31deb324', NULL, NULL, 'Price', 'price', 'number', NULL, NULL, NULL, NULL, 9, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:42:17', '2022-04-11 20:39:03'),
('f2c8d23d-5c35-451b-8935-676cbd5d833d', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 12, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('f4b2fa5e-48a4-4975-84a0-4941b5802acb', 'bdab7c39-6f10-40af-8dd0-11448eedac08', NULL, NULL, 'Created at', 'created_at', 'datetime', NULL, NULL, NULL, NULL, 11, 0, 1, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-08 13:27:05', '2022-04-08 13:27:05'),
('f53efc0a-9dd9-4367-9b21-096093e7f0c2', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Deleted at', 'deleted_at', 'datetime', NULL, NULL, NULL, NULL, 12, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('f5bd1001-cb33-42be-b355-feb0a8237c4e', '06914f30-7a12-4853-9af8-d1171f16fc62', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 13, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-02 12:41:53', '2022-04-02 12:41:53'),
('f8b73787-6c79-4ee3-a274-7ba351e21efa', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Product type id', 'product_type_id', 'number', NULL, NULL, NULL, NULL, 9, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('f8deb4e3-c97c-46fb-8f8c-74100bffa51c', 'ff6bb457-538d-4b1c-b4cb-d64377788341', NULL, NULL, 'Discount id', 'discount_id', 'number', NULL, NULL, NULL, NULL, 7, 0, 0, 1, 0, 0, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 15:02:09', '2022-04-01 22:18:36'),
('fa42e81b-1620-4646-8aa8-81333282c831', 'dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 15, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:37:23', '2022-03-31 20:37:23'),
('fabfb43b-0ba1-4588-8f33-3369d2097e20', 'd5238e21-7f1c-46ae-b69a-5b0823e1f5ed', NULL, NULL, 'Code', 'code', 'text', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:41:23', '2022-04-01 21:41:23'),
('fc2a0b40-7f00-423d-903d-5a31b79a6b5d', 'a00c01b4-0120-4c56-abaa-23ac168408cf', NULL, NULL, 'Amount', 'amount', 'number', 'both', NULL, NULL, NULL, 3, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 21:51:43', '2022-04-01 21:51:43'),
('fca85be9-f8f0-47df-b010-0dc7ba5dd912', 'bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', NULL, NULL, 'Address', 'address', 'text', NULL, NULL, NULL, NULL, 5, 0, 1, 1, 1, 1, 0, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-03-31 20:13:03', '2022-03-31 20:13:03'),
('fcc41658-3ce3-4d64-a67e-c6e423e9ad41', '1b765fc9-9616-4196-b722-dfb504566eca', 11, NULL, 'Orders', 'orders', 'multi-select', NULL, NULL, NULL, NULL, 12, 0, 1, 1, 0, 0, 0, '[]', '2022-04-01 14:59:19', '2022-04-01 14:59:32');
INSERT INTO `zeus_model_rows` (`id`, `model_type_id`, `model_relation_id`, `parent_id`, `title`, `field`, `type`, `required`, `group`, `placeholder`, `default_value`, `order`, `dynamic`, `browse`, `view`, `create`, `edit`, `trash`, `details`, `created_at`, `updated_at`) VALUES
('fe678387-1445-47f8-a1b7-505e313ce38f', '5bb48125-d615-492e-9f8f-574f348f57fd', NULL, NULL, 'Updated at', 'updated_at', 'datetime', NULL, NULL, NULL, NULL, 9, 0, 0, 1, 0, 0, 1, '{\"rules\": {\"create\": [], \"update\": []}}', '2022-04-01 20:39:33', '2022-04-01 20:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `zeus_model_types`
--

CREATE TABLE `zeus_model_types` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagination` int DEFAULT NULL,
  `soft_delete` tinyint(1) NOT NULL DEFAULT '0',
  `details` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_model_types`
--

INSERT INTO `zeus_model_types` (`id`, `namespace`, `model_class`, `slug`, `name_singular`, `name_plural`, `controller`, `api_controller`, `policy`, `pagination`, `soft_delete`, `details`) VALUES
('06914f30-7a12-4853-9af8-d1171f16fc62', 'zeus_users', 'Zeus\\Models\\User', 'employees', 'Employee', 'Employees', NULL, NULL, NULL, 5, 0, '{\"auto\": [\"index\", \"show\"], \"icon\": \"fas fa-user-tie\", \"search_key\": \"name\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('1b765fc9-9616-4196-b722-dfb504566eca', 'users', 'App\\Models\\Zeus\\User', 'users', 'User', 'Users', NULL, NULL, NULL, 20, 1, '{\"icon\": \"fas fa-users\", \"search_key\": \"lastname\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('52444103-29a7-45b1-b5fe-f224844ae8c5', 'ticket_departments', 'App\\Models\\Zeus\\TicketDepartment', 'ticket-departments', 'Ticket Department', 'Ticket Departments', NULL, NULL, NULL, 10, 0, '{\"icon\": \"far fa-user-headset\", \"search_key\": \"name\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('5bb48125-d615-492e-9f8f-574f348f57fd', 'transactions', 'App\\Models\\Zeus\\Transaction', 'transactions', 'Transaction', 'Transactions', NULL, NULL, NULL, 20, 0, '{\"icon\": \"far fa-dollar-sign\", \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('61aec86e-2c9c-4802-a4cb-8c10fda93a62', 'posts', 'App\\Models\\Post', 'posts', 'Post', 'Posts', NULL, NULL, NULL, 5, 0, '{\"icon\": \"fas fa-feather\", \"search_key\": \"id\", \"ordering_column\": \"created_at\", \"ordering_direction\": \"desc\"}'),
('a00c01b4-0120-4c56-abaa-23ac168408cf', 'bills', 'App\\Models\\Zeus\\Bill', 'bills', 'Bill', 'Bills', NULL, NULL, NULL, 10, 0, '{\"icon\": null, \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('abc255f5-3ec1-497c-9de6-ceffd00750a7', 'orders', 'App\\Models\\Zeus\\Order', 'orders', 'Order', 'Orders', NULL, NULL, NULL, 10, 1, '{\"icon\": \"far fa-cart-arrow-down\", \"search_key\": \"code\", \"ordering_column\": \"created_at\", \"ordering_direction\": \"desc\"}'),
('b7e82030-8716-4a66-a698-d60137a6ac4f', 'settings', 'App\\Models\\Setting', 'settings', 'Setting', 'Settings', 'Zeus\\Http\\Controllers\\SettingController', NULL, NULL, NULL, 0, '{\"auto\": [\"create\", \"store\", \"edit\"], \"icon\": \"fas fa-cogs\", \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('bb86c7b1-ac69-4019-9d8a-2a1d2b7cb680', 'companies', 'App\\Models\\Zeus\\Company', 'companies', 'Company', 'Companies', NULL, NULL, NULL, 10, 1, '{\"icon\": \"far fa-building\", \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('bdab7c39-6f10-40af-8dd0-11448eedac08', 'portfolios', 'App\\Models\\Portfolio', 'portfolios', 'Portfolio', 'Portfolios', NULL, NULL, NULL, 10, 0, '{\"icon\": null, \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('c181541c-1912-4aa8-931d-947a0fad23e7', 'pages', 'App\\Models\\Page', 'pages', 'Page', 'Pages', NULL, NULL, NULL, 10, 0, '{\"icon\": null, \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('cd462ac5-0b83-4424-9ad0-4352dcd904f7', 'service_plans', 'App\\Models\\Zeus\\ServicePlan', 'service-plans', 'Service Plan', 'Service Plans', NULL, NULL, NULL, 10, 0, '{\"icon\": \"fal fa-box-usd\", \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('d5238e21-7f1c-46ae-b69a-5b0823e1f5ed', 'offers', 'App\\Models\\Zeus\\Offer', 'offers', 'Offer', 'Offers', NULL, NULL, NULL, 10, 1, '{\"icon\": \"fas fa-percent\", \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('dc06e3e2-b8ea-4a3f-8801-65a3b904a9a2', 'order_items', 'App\\Models\\Zeus\\OrderItem', 'order-items', 'Order Item', 'Order Items', NULL, NULL, NULL, 10, 1, '{\"icon\": \"far fa-bags-shopping\", \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('fa6de0ef-1c4e-4283-ae02-794f31deb324', 'services', 'App\\Models\\Service', 'services', 'Service', 'Services', NULL, NULL, NULL, 10, 0, '{\"icon\": \"fal fa-sitemap\", \"search_key\": \"title\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}'),
('ff6bb457-538d-4b1c-b4cb-d64377788341', 'invoices', 'App\\Models\\Zeus\\Invoice', 'invoices', 'Invoice', 'Invoices', NULL, NULL, NULL, 10, 0, '{\"icon\": \"fal fa-file-invoice-dollar\", \"search_key\": \"id\", \"ordering_column\": \"id\", \"ordering_direction\": \"asc\"}');

-- --------------------------------------------------------

--
-- Table structure for table `zeus_permissions`
--

CREATE TABLE `zeus_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_permissions`
--

INSERT INTO `zeus_permissions` (`id`, `key`, `title`, `active`) VALUES
(6, 'view_model_types', 'View Model_types', 1),
(7, 'view_any_model_types', 'View any Model_types', 1),
(8, 'create_model_types', 'Create Model_types', 1),
(9, 'edit_model_types', 'Edit Model_types', 1),
(10, 'delete_model_types', 'Delete Model_types', 1),
(11, 'view_zeus-roles', 'View Zeus Role', 1),
(12, 'view_any_zeus-roles', 'View any Zeus Role', 1),
(13, 'create_zeus-roles', 'Create Zeus Role', 1),
(14, 'edit_zeus-roles', 'Edit Zeus Role', 1),
(15, 'delete_zeus-roles', 'Delete Zeus Role', 1),
(21, 'view_orders', 'View Order', 1),
(22, 'view_any_orders', 'View any Order', 1),
(23, 'create_orders', 'Create Order', 1),
(24, 'edit_orders', 'Edit Order', 1),
(25, 'delete_orders', 'Delete Order', 1),
(27, 'view_users', 'View User', 1),
(28, 'view_any_users', 'View any User', 1),
(29, 'create_users', 'Create User', 1),
(30, 'edit_users', 'Edit User', 1),
(31, 'delete_users', 'Delete User', 1),
(32, 'view_companies', 'View Company', 1),
(33, 'view_any_companies', 'View any Company', 1),
(34, 'create_companies', 'Create Company', 1),
(35, 'edit_companies', 'Edit Company', 1),
(36, 'delete_companies', 'Delete Company', 1),
(37, 'view_order-items', 'View Order Item', 1),
(38, 'view_any_order-items', 'View any Order Item', 1),
(39, 'create_order-items', 'Create Order Item', 1),
(40, 'edit_order-items', 'Edit Order Item', 1),
(41, 'delete_order-items', 'Delete Order Item', 1),
(42, 'view_services', 'View Service', 1),
(43, 'view_any_services', 'View any Service', 1),
(44, 'create_services', 'Create Service', 1),
(45, 'edit_services', 'Edit Service', 1),
(46, 'delete_services', 'Delete Service', 1),
(47, 'view_service-plans', 'View Service Plan', 1),
(48, 'view_any_service-plans', 'View any Service Plan', 1),
(49, 'create_service-plans', 'Create Service Plan', 1),
(50, 'edit_service-plans', 'Edit Service Plan', 1),
(51, 'delete_service-plans', 'Delete Service Plan', 1),
(52, 'view_invoices', 'View Invoice', 1),
(53, 'view_any_invoices', 'View any Invoice', 1),
(54, 'create_invoices', 'Create Invoice', 1),
(55, 'edit_invoices', 'Edit Invoice', 1),
(56, 'delete_invoices', 'Delete Invoice', 1),
(57, 'view_transactions', 'View Transaction', 1),
(58, 'view_any_transactions', 'View any Transaction', 1),
(59, 'create_transactions', 'Create Transaction', 1),
(60, 'edit_transactions', 'Edit Transaction', 1),
(61, 'delete_transactions', 'Delete Transaction', 1),
(62, 'view_posts', 'View Post', 1),
(63, 'view_any_posts', 'View any Post', 1),
(64, 'create_posts', 'Create Post', 1),
(65, 'edit_posts', 'Edit Post', 1),
(66, 'delete_posts', 'Delete Post', 1),
(67, 'view_offers', 'View Offer', 1),
(68, 'view_any_offers', 'View any Offer', 1),
(69, 'create_offers', 'Create Offer', 1),
(70, 'edit_offers', 'Edit Offer', 1),
(71, 'delete_offers', 'Delete Offer', 1),
(72, 'view_bills', 'View Bill', 1),
(73, 'view_any_bills', 'View any Bill', 1),
(74, 'create_bills', 'Create Bill', 1),
(75, 'edit_bills', 'Edit Bill', 1),
(76, 'delete_bills', 'Delete Bill', 1),
(77, 'view_ticket-departments', 'View Ticket Department', 1),
(78, 'view_any_ticket-departments', 'View any Ticket Department', 1),
(79, 'create_ticket-departments', 'Create Ticket Department', 1),
(80, 'edit_ticket-departments', 'Edit Ticket Department', 1),
(81, 'delete_ticket-departments', 'Delete Ticket Department', 1),
(82, 'view_employees', 'View Employee', 1),
(83, 'view_any_employees', 'View any Employee', 1),
(84, 'create_employees', 'Create Employee', 1),
(85, 'edit_employees', 'Edit Employee', 1),
(86, 'delete_employees', 'Delete Employee', 1),
(87, 'view_portfolios', 'View Portfolio', 1),
(88, 'view_any_portfolios', 'View any Portfolio', 1),
(89, 'create_portfolios', 'Create Portfolio', 1),
(90, 'edit_portfolios', 'Edit Portfolio', 1),
(91, 'delete_portfolios', 'Delete Portfolio', 1),
(92, 'view_pages', 'View Page', 1),
(93, 'view_any_pages', 'View any Page', 1),
(94, 'create_pages', 'Create Page', 1),
(95, 'edit_pages', 'Edit Page', 1),
(96, 'delete_pages', 'Delete Page', 1),
(97, 'view_settings', 'View Setting', 1),
(98, 'view_any_settings', 'View any Setting', 1),
(99, 'create_settings', 'Create Setting', 1),
(100, 'edit_settings', 'Edit Setting', 1),
(101, 'delete_settings', 'Delete Setting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zeus_permission_user`
--

CREATE TABLE `zeus_permission_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_permission_user`
--

INSERT INTO `zeus_permission_user` (`user_id`, `permission_id`) VALUES
(2, 6),
(3, 6),
(2, 7),
(3, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25);

-- --------------------------------------------------------

--
-- Table structure for table `zeus_roles`
--

CREATE TABLE `zeus_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_roles`
--

INSERT INTO `zeus_roles` (`id`, `key`, `title`, `rank`) VALUES
(1, 'superadmin', 'Super admin', 1),
(2, 'admin', 'Admin', 2),
(3, 'blogger', 'Blogger', 3);

-- --------------------------------------------------------

--
-- Table structure for table `zeus_role_user`
--

CREATE TABLE `zeus_role_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zeus_users`
--

CREATE TABLE `zeus_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `first_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` enum('fa','en') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zeus_users`
--

INSERT INTO `zeus_users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `active`, `first_name`, `last_name`, `role_id`, `password`, `lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'yoonus', 'yoonus@zeuscms.com', NULL, 'storage/images/bOil9ySugXxLvs4GuJL6zjz22Os4ybubugcWodYQ.jpg', 1, 'یونس', 'طهرانیم', 1, '$2y$10$zXGw3SdZOC/j5cIh1hn40eR.LSn7kXkNHIH15.SfdJsYURGGkLFUe', 'en', NULL, '2022-03-29 16:29:34', '2022-04-08 13:48:51'),
(3, 'amir', 'amir@gmail.com', NULL, 'storage/images/sfpWSw3cub8bdHgC94BxeH9GcadytOconEBrMdKs.jpg', 0, 'Amir', 'Mansoorian', 2, '$2y$10$iPpPlK.YH2hnSM8y5MrOxuyJNRRh.2J6.Xh87Z4aUChicJgsm9oy.', 'fa', NULL, '2022-03-31 13:26:43', '2022-03-31 13:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_categoreable_type_categoreable_id_index` (`categoreable_type`,`categoreable_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `definitions`
--
ALTER TABLE `definitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_discountable_type_discountable_id_index` (`discountable_type`,`discountable_id`);

--
-- Indexes for table `discount_user`
--
ALTER TABLE `discount_user`
  ADD PRIMARY KEY (`user_id`,`discount_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fileables`
--
ALTER TABLE `fileables`
  ADD KEY `fileables_fileable_type_fileable_id_index` (`fileable_type`,`fileable_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offers_code_unique` (`code`);

--
-- Indexes for table `offer_user`
--
ALTER TABLE `offer_user`
  ADD PRIMARY KEY (`user_id`,`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_company_id_foreign` (`company_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_service_id_foreign` (`service_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolios_slug_unique` (`slug`),
  ADD KEY `portfolios_service_id_foreign` (`service_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Indexes for table `seo_indexables`
--
ALTER TABLE `seo_indexables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seo_indexables_indexable_type_indexable_id_index` (`indexable_type`,`indexable_id`);

--
-- Indexes for table `seo_links`
--
ALTER TABLE `seo_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_plans`
--
ALTER TABLE `service_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_plans_service_id_foreign` (`service_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_tracking_code_unique` (`tracking_code`),
  ADD KEY `tickets_ticketable_type_ticketable_id_index` (`ticketable_type`,`ticketable_id`),
  ADD KEY `tickets_ticket_department_id_foreign` (`ticket_department_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_department_user`
--
ALTER TABLE `ticket_department_user`
  ADD PRIMARY KEY (`user_id`,`ticket_department_id`),
  ADD KEY `ticket_department_user_ticket_department_id_foreign` (`ticket_department_id`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_messages_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_bill_id_foreign` (`bill_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zeus_adjustments`
--
ALTER TABLE `zeus_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zeus_model_relations`
--
ALTER TABLE `zeus_model_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zeus_model_relations_model_type_id_foreign` (`model_type_id`),
  ADD KEY `zeus_model_relations_target_model_type_foreign` (`target_model_type`);

--
-- Indexes for table `zeus_model_rows`
--
ALTER TABLE `zeus_model_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zeus_model_rows_model_type_id_foreign` (`model_type_id`),
  ADD KEY `zeus_model_rows_model_relation_id_foreign` (`model_relation_id`);

--
-- Indexes for table `zeus_model_types`
--
ALTER TABLE `zeus_model_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zeus_model_types_namespace_unique` (`namespace`),
  ADD UNIQUE KEY `zeus_model_types_slug_unique` (`slug`);

--
-- Indexes for table `zeus_permissions`
--
ALTER TABLE `zeus_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zeus_permissions_key_unique` (`key`);

--
-- Indexes for table `zeus_permission_user`
--
ALTER TABLE `zeus_permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `zeus_permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `zeus_roles`
--
ALTER TABLE `zeus_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zeus_roles_key_unique` (`key`);

--
-- Indexes for table `zeus_role_user`
--
ALTER TABLE `zeus_role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `zeus_role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `zeus_users`
--
ALTER TABLE `zeus_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zeus_users_name_unique` (`name`),
  ADD UNIQUE KEY `zeus_users_email_unique` (`email`),
  ADD KEY `zeus_users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `definitions`
--
ALTER TABLE `definitions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seo_indexables`
--
ALTER TABLE `seo_indexables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seo_links`
--
ALTER TABLE `seo_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service_plans`
--
ALTER TABLE `service_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zeus_model_relations`
--
ALTER TABLE `zeus_model_relations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `zeus_permissions`
--
ALTER TABLE `zeus_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `zeus_roles`
--
ALTER TABLE `zeus_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zeus_users`
--
ALTER TABLE `zeus_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `service_plans`
--
ALTER TABLE `service_plans`
  ADD CONSTRAINT `service_plans_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ticket_department_id_foreign` FOREIGN KEY (`ticket_department_id`) REFERENCES `ticket_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_department_user`
--
ALTER TABLE `ticket_department_user`
  ADD CONSTRAINT `ticket_department_user_ticket_department_id_foreign` FOREIGN KEY (`ticket_department_id`) REFERENCES `ticket_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD CONSTRAINT `ticket_messages_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zeus_model_relations`
--
ALTER TABLE `zeus_model_relations`
  ADD CONSTRAINT `zeus_model_relations_model_type_id_foreign` FOREIGN KEY (`model_type_id`) REFERENCES `zeus_model_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zeus_model_relations_target_model_type_foreign` FOREIGN KEY (`target_model_type`) REFERENCES `zeus_model_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zeus_model_rows`
--
ALTER TABLE `zeus_model_rows`
  ADD CONSTRAINT `zeus_model_rows_model_relation_id_foreign` FOREIGN KEY (`model_relation_id`) REFERENCES `zeus_model_relations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `zeus_model_rows_model_type_id_foreign` FOREIGN KEY (`model_type_id`) REFERENCES `zeus_model_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zeus_permission_user`
--
ALTER TABLE `zeus_permission_user`
  ADD CONSTRAINT `zeus_permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `zeus_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zeus_permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `zeus_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zeus_role_user`
--
ALTER TABLE `zeus_role_user`
  ADD CONSTRAINT `zeus_role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `zeus_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zeus_role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `zeus_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zeus_users`
--
ALTER TABLE `zeus_users`
  ADD CONSTRAINT `zeus_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `zeus_roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
