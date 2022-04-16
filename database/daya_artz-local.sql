-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2022 at 03:16 PM
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
-- Database: `daya_artz`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributables`
--

CREATE TABLE `attributables` (
  `attribute_id` bigint UNSIGNED NOT NULL,
  `attributable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributable_id` bigint UNSIGNED NOT NULL,
  `details` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` enum('form-field','add-on') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-field',
  `effects_on_price` tinyint(1) NOT NULL DEFAULT '0',
  `effect_value` int NOT NULL DEFAULT '0',
  `effect_type` enum('price','percent','none') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `details` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `market_type` enum('classic','modern') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `business_type_id` int UNSIGNED DEFAULT NULL,
  `product_type_id` int UNSIGNED DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `definitions`
--

CREATE TABLE `definitions` (
  `id` int UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoiceable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceable_id` bigint UNSIGNED NOT NULL,
  `amount` bigint NOT NULL,
  `payment_rule_id` int UNSIGNED NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_10_06_041413_create_offers_table', 1),
(6, '2021_09_19_125436_create_sessions_table', 1),
(7, '2021_09_19_181219_create_verification_codes_table', 1),
(8, '2021_09_24_135413_create_definitions_table', 1),
(9, '2021_09_24_193553_create_services_table', 1),
(10, '2021_09_24_193613_create_attributes_table', 1),
(11, '2021_09_24_193804_create_service_plans_table', 1),
(12, '2021_09_24_230937_create_service_attribute_table', 1),
(13, '2021_09_24_231426_create_customers_table', 1),
(14, '2021_09_24_231953_create_companies_table', 1),
(15, '2021_09_27_111903_create_orders_table', 1),
(16, '2021_09_27_111933_create_order_items_table', 1),
(17, '2021_10_01_020333_create_payment_rules_table', 1),
(18, '2021_10_01_024315_create_invoices_table', 1),
(19, '2021_10_01_025502_create_bills_table', 1),
(20, '2021_10_01_031532_create_transactions_table', 1),
(21, '2021_10_06_042334_create_offerables_table', 1),
(22, '2021_10_11_025734_create_attributables_table', 1),
(23, '2021_10_11_033552_create_ticket_departments_table', 1),
(24, '2021_10_11_034211_create_tickets_table', 1),
(25, '2021_10_11_034251_create_ticket_messages_table', 1),
(26, '2021_10_11_042448_create_ticket_department_user_table', 1),
(29, '2022_01_10_113531_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `offerables`
--

CREATE TABLE `offerables` (
  `offer_id` bigint UNSIGNED NOT NULL,
  `offerable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offerable_id` bigint UNSIGNED NOT NULL,
  `max_attempts` int NOT NULL DEFAULT '1',
  `attempts` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `value_type` enum('amount','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_attempts_for_user` int NOT NULL DEFAULT '1',
  `details` json NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('manual','automate') COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` enum('fast order','professional','tele-order','telegram bot','messanger') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_info` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` int UNSIGNED DEFAULT NULL,
  `company_id` int UNSIGNED DEFAULT NULL,
  `offer_id` bigint UNSIGNED DEFAULT NULL,
  `details` json NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `service_id` int UNSIGNED DEFAULT NULL,
  `service_plan_id` int UNSIGNED DEFAULT NULL,
  `company_id` int UNSIGNED DEFAULT NULL,
  `offer_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_info` text COLLATE utf8mb4_unicode_ci,
  `price` bigint NOT NULL DEFAULT '0',
  `expires_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_rules`
--

CREATE TABLE `payment_rules` (
  `id` int UNSIGNED NOT NULL,
  `payable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint UNSIGNED NOT NULL,
  `details` json NOT NULL
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reading_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `published` tinyint(1) NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `title`, `image_url`, `reading_time`, `body`, `short_description`, `published`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'nisi-sit-sit-excepturi-quisquam', 'nisi sit sit excepturi quisquam', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Ea reiciendis quia vel blanditiis accusamus voluptatem. Eius provident sed non unde et vel. Blanditiis velit sunt officia repellat praesentium minima.<br>Asperiores nobis quis aut dolorem ex quidem. Optio cumque velit eaque at impedit id distinctio. Tempora enim rem accusamus officia et totam voluptatem.<br>Ad deserunt non dicta ipsam est ipsum. Et excepturi vitae nostrum quia nulla et. Ab quis quia dolorem. Expedita assumenda eos qui porro.<br>Ipsa aliquam ducimus eos quasi est nostrum. Quas enim voluptatem cumque culpa. Et expedita rerum deleniti quaerat. Blanditiis quis quis quidem deserunt fuga dolores.<br>Earum placeat rem aut perferendis laborum est nam. Et corporis voluptatem et. Hic et voluptatem voluptas doloremque eum.<br>Qui nesciunt quo id ipsam blanditiis. Sunt dignissimos in a ducimus quam provident. Suscipit ullam aut voluptatem et. Et autem excepturi mollitia illo et et numquam.<br>Qui soluta architecto et. Necessitatibus sit unde mollitia nobis. Autem saepe nisi inventore maiores qui excepturi rerum.<br>Quia officia minima labore quasi eaque. Voluptas mollitia distinctio iste quidem sed iure corporis. Ut maiores veritatis consequatur consequatur.<br>Ex maiores eaque est ut et. Incidunt laborum in possimus.<br>Iusto et laboriosam dolorum quam. Quos laudantium placeat sit et autem aut eaque vero.<br>Modi cum consequatur voluptatem distinctio quis numquam. Recusandae dolores at quibusdam eum quis vero. Nobis molestiae voluptatem cupiditate aperiam natus ea omnis.<br>Voluptas consequatur et fugiat enim hic animi. Natus omnis eaque incidunt molestias et aperiam libero. Culpa sequi eos velit similique enim fuga ut praesentium. Mollitia quis aut ut consequatur placeat aut qui.<br>Quaerat officia in unde. Ducimus placeat et ducimus aperiam tempore optio dicta. Id sed numquam et tempore.<br>Et voluptatem eveniet et eum. Cupiditate voluptas doloribus et vel. Sint dolor veniam autem rerum.<br>Non maxime aliquid esse in. Autem officiis fuga eos consequuntur voluptatibus amet. Nulla voluptatem in eveniet incidunt laudantium ex repudiandae. Est repellendus qui aut voluptatem.<br>Voluptas nesciunt dolor corporis iure. Laborum dolore qui qui ut. Incidunt voluptatibus magnam at. Voluptatem adipisci non eaque non rem dignissimos.<br>Necessitatibus hic in ea. Explicabo esse ad earum qui. Dolorum itaque dolores magni non laudantium.<br>Et quia aut adipisci neque. Consequatur suscipit est incidunt qui sit porro. Doloribus autem voluptatem assumenda praesentium amet libero aut corrupti.<br>Quo sit praesentium et et veniam unde. Aliquid sed similique dolores consequuntur in. Et omnis nostrum hic iusto quo harum. Autem eos expedita animi porro ullam alias qui.<br>Et sit aut consequuntur voluptatum voluptas et officiis. Veritatis deserunt velit odit quia. Pariatur suscipit quam itaque blanditiis quam magni eos.<br>Et autem nesciunt pariatur perspiciatis sed voluptatem. Earum temporibus culpa consequuntur odio in laudantium et. Repellendus cupiditate nostrum maxime corporis laudantium.<br>Aut quia ad voluptate qui. Dolor consectetur itaque aliquid. Nesciunt nam optio pariatur accusamus occaecati qui.<br>Rerum ut ipsum nobis quia et laudantium molestiae mollitia. Quisquam velit aut explicabo quibusdam similique et nulla. Omnis inventore harum voluptatum ullam labore esse sunt. Doloremque omnis non voluptate perferendis pariatur repellat nihil.<br>Voluptatem et ut qui molestiae quaerat. Eius aliquam est deserunt ex voluptatem. Ipsa quia vel error totam.<br>Sed voluptas illo occaecati qui magnam maiores dolore et. Rem quia quaerat quibusdam perspiciatis ipsum qui in. Sed repellendus quia laudantium explicabo. Optio et veritatis nemo doloremque ut deleniti.<br>Quos culpa nulla eos sint eligendi ad enim blanditiis. Nobis in voluptate tenetur dolorem nobis. Quod dolorem laboriosam nesciunt eaque consequatur nemo ea aut. Suscipit rerum odio ut itaque suscipit cupiditate.<br>Expedita laborum odio iure qui hic consectetur et et. Doloremque id dignissimos earum. Quisquam tempora dolor consequuntur dignissimos. Autem quod doloribus voluptate placeat ex.<br>Corporis nisi tempora voluptatem voluptas aut ut vel. Illum eligendi minima facilis officia dolore laborum natus et. Labore voluptas tenetur et dolorum in iusto aliquam. Ex ut voluptate quis enim accusantium enim. Non labore sunt iste placeat.<br>Et quaerat natus et. Optio quo eum rem quibusdam unde eum velit.<br>Alias voluptas excepturi excepturi. Eaque ipsa placeat id similique dolorem quo at.<br>Omnis aspernatur est assumenda temporibus est voluptas aut. Architecto amet nemo odit repellat exercitationem. Quidem voluptate tempore harum. Esse tempore asperiores laboriosam fugit dolores.<br>Dolor ratione omnis non autem nobis et ut. Vel aliquam est et consequatur architecto. Ullam ab dolores optio minus aperiam.<br>Quisquam quis et non. Impedit totam quo delectus maxime assumenda harum architecto. Non ut itaque omnis eum.<br>Vero dolore nobis iure eos. Exercitationem ea fugit sit doloribus eius rerum nobis.<br>Ut dolores dolore in nihil. Ut harum non commodi nemo qui rerum ut. Corporis in ducimus quia ipsam et eum quaerat. Magnam ut aut illum voluptates.<br>Eum asperiores sapiente sit quidem. Tempora quibusdam velit explicabo dolores eaque. Consectetur tenetur possimus quibusdam accusamus. Cupiditate quas dolor animi nisi.<br>Iste occaecati eum est similique beatae mollitia consequuntur. Placeat quisquam occaecati qui a dignissimos ipsam. Corporis dolor error et voluptas esse.<br>Accusamus impedit ipsam voluptas sunt est. Voluptatibus nobis sunt vel illo neque. Impedit qui nostrum earum et id est facilis.<br>Nesciunt deserunt quo non magnam totam. Qui reiciendis maiores eum. Placeat minus quod quaerat ut cum et qui enim. Non ex voluptatem aperiam qui.<br>Odio qui quisquam qui praesentium. Fugiat repellat dolorum deleniti ut a sapiente. Rerum culpa quis ducimus eaque.</p>', 'id doloribus corrupti est corrupti dicta blanditiis quo unde rerum eveniet soluta ea in non ipsam et at eos sed sunt et et quos id id accusamus dolores laudantium voluptas omnis doloremque voluptatem vel odio autem harum alias unde omnis velit quisquam enim earum reiciendis voluptas voluptatum ducimus pariatur qui', 1, 3, '2022-01-10 08:55:06', '2022-01-10 08:55:06'),
(2, 'quia-labore-quam-explicabo', 'quia labore quam explicabo', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Cum id quia soluta sit. Quis totam voluptas ipsa qui. Aut ipsum rem a repellendus ad dolorum.<br>Optio est quo ut tenetur reiciendis in asperiores consequuntur. Blanditiis recusandae non inventore vero ab dolor deserunt explicabo. Maxime repellat ut inventore omnis voluptas. Culpa non alias neque necessitatibus.<br>Voluptas consequatur enim vero hic laborum. Quos tenetur nulla adipisci qui sit quo id modi. Officia molestiae quos et accusantium. Aspernatur quidem repellat culpa numquam ut vel dolores.<br>Eaque hic occaecati sed blanditiis nam accusantium. Omnis occaecati consequuntur id. Et officia velit laborum rerum atque. Error occaecati et nobis sit occaecati.<br>Et cum unde molestias voluptas quod voluptatem tenetur repudiandae. Nobis sed ut voluptatem nam. Reprehenderit amet autem nostrum.<br>Quis voluptatem sunt voluptates eaque. Sed neque ad deleniti ut qui beatae. Rerum aspernatur atque est repellat aut velit. Eos sit sit aliquid deserunt non assumenda.<br>Sapiente quod earum omnis et eligendi voluptatibus. Facere ipsa dolores et non nesciunt fugit. Numquam voluptatibus non neque ut molestiae eos. Sed doloremque occaecati ipsa magnam libero.<br>Odio repellendus aut eius dolor beatae aliquid. Voluptas doloremque dolor provident aliquam eius. Nemo odio quod iste ut maxime. Quis facere qui corrupti quam autem fugiat ut blanditiis.<br>Ullam modi consequuntur commodi et saepe. Unde repudiandae sequi nam aut nihil. Ab eum corporis magni nam ea. In cum quisquam vitae voluptatem itaque est.<br>Accusamus ipsam hic molestiae autem neque aut. Sit officiis illo aut recusandae animi. Sequi sit officiis voluptate consectetur molestias. Fugiat nulla ut repellendus autem neque optio.<br>Molestiae et iusto aut explicabo qui tempora et. Unde consectetur in ipsam. Modi doloremque ut quia optio eveniet aspernatur sint.<br>Aut quos at iure laboriosam cupiditate id deserunt. Voluptatem corporis neque consequatur nam vero placeat. Odit ab delectus non expedita quibusdam.<br>Perferendis illum mollitia et eaque. Atque quas cupiditate iure itaque. Consequatur omnis temporibus aliquam repellat aut aperiam omnis.<br>Consequuntur aut dignissimos omnis modi ab dolorem. Reprehenderit pariatur vel dolores reiciendis rem. Omnis delectus eaque consequatur fuga illum voluptas voluptates. Qui qui aliquid et voluptatem officiis. Ipsam tenetur laudantium quos voluptas praesentium est.<br>Laudantium et atque maiores quidem perferendis consequatur incidunt. Nostrum ut voluptate dolorem dolore.<br>Vitae laborum quasi voluptatum minus est. Velit voluptates voluptates recusandae et ut iure quam fugiat. Rerum est excepturi quisquam aut repellat fuga sed.<br>Eius praesentium inventore non vitae vel nesciunt mollitia omnis. Sit quis iure cumque. Cum veniam sunt quae sit sunt aspernatur est illo. Necessitatibus dolorem quaerat earum.<br>Tenetur ipsam blanditiis quam exercitationem repellendus. Omnis occaecati in id. Beatae non non temporibus deserunt hic natus ducimus odio.<br>Culpa cupiditate occaecati quidem eos fuga voluptatem qui. Ut animi et quis sit nemo. Dignissimos tenetur pariatur blanditiis esse itaque. Ipsum similique deserunt consequatur temporibus minima.<br>Neque nostrum quae quod rerum dolores eum. Voluptatem voluptatem aperiam sequi esse quae consectetur quisquam doloremque.<br>Quam culpa omnis ea libero voluptatem non reprehenderit. Dolor enim et a fuga consequuntur. Cum et deleniti quos ut.<br>Hic voluptates qui recusandae autem libero neque ut amet. Est asperiores reiciendis maxime accusantium excepturi occaecati aperiam. Accusamus aliquam corporis dolore dolores voluptatem. Enim optio itaque dolore.<br>Ut voluptatem quo deserunt autem fugiat. Et quae ea vero ea molestiae. Saepe omnis non natus aspernatur voluptatem quo.<br>Suscipit velit est qui. Molestiae quia distinctio ut inventore. Numquam libero provident rerum doloribus itaque nostrum voluptates non. Qui ipsa mollitia quae deleniti deserunt ratione.<br>Est dolorum autem cupiditate dolorum facere. Fuga voluptatem consectetur quidem expedita voluptas quia nemo quam. Quos aliquam sed quasi accusantium architecto magni aliquam error. Qui consequatur repudiandae autem mollitia totam.<br>Dolor et quo quibusdam optio temporibus est consequatur. Porro corrupti excepturi nam voluptas ad consequatur. Illum quas consequatur atque alias labore magni. Et autem fugiat sed id.<br>Enim reiciendis perspiciatis consequatur nobis. Iure exercitationem dolores molestiae veritatis. Blanditiis architecto error commodi non saepe esse nulla sequi.<br>Et molestiae suscipit recusandae sed veniam sit. Id ipsum quidem repudiandae mollitia nemo dicta adipisci et. Laborum vitae et mollitia sit mollitia.<br>Sit nobis quis enim iste et enim. Minima odio dolores voluptatem distinctio aut modi ut. Non inventore et sed omnis.<br>In sequi quas facilis at sit dicta. Aut et mollitia repudiandae et ut sunt est magni. Autem magnam voluptatem earum est error cumque laboriosam.<br>Aut consequuntur esse nisi quas consectetur laudantium voluptas. Cupiditate dolorem aut quod sequi unde qui. Est atque consequatur impedit veritatis eos. Vel sequi qui ab omnis vel.<br>Aliquam quia et maiores natus. Autem in enim dolorem et vitae consequatur. Aliquid amet aut ullam officia a accusamus unde. Et deserunt facilis distinctio aliquam quae est.<br>Est et voluptatem quod debitis. Ut nisi sed nemo eos ex. Eveniet rerum ipsa perspiciatis asperiores.<br>Hic magni et dolorem maiores eveniet illum. Ipsum voluptatibus ut rerum voluptas labore quas. Dignissimos voluptatibus porro et harum maiores rerum. Nisi quam voluptas fugiat sed id pariatur.<br>Quibusdam et dolore dolorem sed vel inventore. Adipisci culpa et veniam fuga et eveniet architecto repellendus. Qui laudantium possimus vero quisquam et nesciunt.<br>Et excepturi voluptatem nemo eius enim. Consequatur dolorem qui eum accusamus velit qui excepturi. Id asperiores aut natus quis.<br>Nostrum voluptatem alias sit. Consequatur dolores quis deleniti debitis qui laborum. Ad voluptates voluptatum alias assumenda ullam qui.<br>Inventore deleniti vel expedita nihil. Nihil nobis dolorum et consectetur aut vero. Qui eveniet velit qui blanditiis vero deleniti. Dolor in soluta sunt libero perspiciatis.<br>Id velit expedita quia odit eligendi. Sed quae dolor recusandae nesciunt aut aut facere. Rerum assumenda mollitia reiciendis.<br>Consectetur possimus est aut. Modi sit soluta vitae et aliquam. Aliquam sed culpa expedita ipsa sit excepturi quis.</p>', 'earum aut et saepe placeat et ducimus dolor beatae nobis cumque odio architecto amet quidem qui voluptas velit molestiae sit dolorem minus necessitatibus ex sed vel voluptatibus et magnam est dolorum est placeat animi dolorum itaque velit quo non quisquam quasi nihil molestiae pariatur voluptas quia placeat laborum voluptatem ut', 1, 3, '2022-01-10 08:55:06', '2022-01-10 08:55:06'),
(3, 'iste-earum', 'iste earum', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Omnis sed itaque ut voluptates voluptatum et possimus. Iste pariatur placeat similique necessitatibus dolores saepe. Reprehenderit quo in ad laborum et iure. Ratione iure deserunt voluptatum sit eos fugit ipsa.<br>Architecto quas ullam ipsum et minima. Consectetur quia aut saepe excepturi. Earum nihil esse qui aut alias voluptate sed amet.<br>Laudantium necessitatibus nam quis aut. Itaque porro et consequatur commodi. Laudantium deserunt atque rerum qui aliquam qui corrupti.<br>Quia quod in id dolorem ut porro delectus. Dignissimos ea repudiandae at in iure. Qui quod dignissimos cumque voluptas omnis omnis et.<br>Nobis aut ea doloremque. Et deleniti accusamus quasi sint repellat deserunt et. Provident reiciendis sapiente vel voluptatem veritatis pariatur.<br>Placeat et temporibus provident sed et odit esse. Veritatis nisi nihil aut aut neque ex dolore molestiae. Quis iure quasi laborum aliquid natus rem. Maiores ut et quis alias.<br>Ut est vitae dolorem debitis officia. Quidem eos nesciunt alias fuga cum dolores. Vel quo nam autem omnis velit laudantium ut. Et exercitationem ipsa repudiandae error consequatur modi aut.<br>Voluptatem animi dolor fuga soluta pariatur delectus. Fuga iure distinctio dolorem eligendi quis iusto nam. Minima aspernatur rem sed incidunt repudiandae culpa officiis.<br>Ut eos occaecati ipsa quia. Qui omnis molestiae suscipit neque aut. Illum voluptatem cumque amet aliquid. Veritatis suscipit aut laboriosam non.<br>Ab amet voluptates sed aut aut consequatur. Sunt eaque enim enim sunt. Non sunt rem consequatur porro voluptatem et. Vel dolor minus et officia ut adipisci. Architecto delectus soluta enim.<br>Eligendi odit porro autem. Ex enim ea voluptatibus occaecati minus eaque vitae corrupti. Exercitationem vero non rerum. Illum rerum temporibus fugiat temporibus.<br>In ea tenetur dicta qui sit maiores atque. Est nemo consectetur sunt numquam praesentium sit. Fugit quia assumenda officiis aspernatur. Sint qui beatae nulla.<br>Enim quis hic occaecati sed et quia consectetur. Ut est quibusdam perferendis facere est iure quia. Asperiores nobis iusto perferendis pariatur qui praesentium quis. Voluptate quidem et voluptatem quis aspernatur.<br>Libero dolorum voluptatem accusamus ut. Corporis totam deleniti est doloremque consectetur. Illo rerum est dolor provident voluptatem consequatur. Maiores ut reiciendis qui et. Aut culpa eum suscipit rerum incidunt.<br>Officia non porro commodi maiores fugit ratione nulla beatae. Vel ratione est voluptas. Unde commodi excepturi corporis aliquid quisquam blanditiis. Ad dignissimos odio et aut ut quisquam.<br>Molestiae incidunt eos non ut. Quidem tenetur aut voluptates rerum vitae quam.<br>Voluptates doloribus exercitationem officiis ipsum quae expedita ut earum. Placeat omnis ducimus sequi aspernatur porro. Corrupti voluptatibus blanditiis ea. Dolor occaecati quibusdam repudiandae cupiditate repellat cum.<br>Dolores laborum sint et et eveniet magni sint. Tenetur quos perferendis placeat similique deserunt fuga. Sed officiis mollitia ducimus esse. Ullam dolores omnis laborum.<br>Est eaque iste illo quis minus facilis incidunt. Assumenda minima sed voluptatem id tempore est. Accusantium ut maiores deleniti deserunt assumenda et.<br>Quia quis voluptates hic illum ratione enim nemo. Laudantium quo voluptas dolor omnis sed consequatur. Qui dolorem enim laudantium officia. Sit earum reprehenderit voluptas repellat libero voluptas earum.<br>Minima porro maxime iusto animi libero. Asperiores voluptate dolore accusantium id id. Nisi distinctio sequi quisquam nisi illum nemo omnis. Reprehenderit id aperiam deserunt et.<br>Similique quia explicabo nesciunt omnis odio. Commodi nam voluptatem earum doloremque dignissimos a in. Fugiat delectus natus consequatur culpa ut omnis. Explicabo possimus officia illo. Qui velit eveniet enim nihil.<br>Quibusdam ab eos dolor et. Saepe impedit natus temporibus aliquam ab fuga. Assumenda ipsa sapiente maxime quia dignissimos. Est atque aut qui quos beatae magni similique.<br>Distinctio nulla voluptas quis laudantium necessitatibus similique omnis. Voluptatem hic sint beatae exercitationem. Repudiandae hic recusandae necessitatibus qui officia sit cumque. Neque eligendi reiciendis et non deserunt.<br>Et veritatis id pariatur et ut. Ab error non magni et deserunt quo reiciendis. Alias sed maxime illum qui.<br>Ut eos recusandae aliquam vero. Veritatis iusto aut et quam rerum. Ut culpa aut at porro vitae aut. Aperiam est vel eum voluptatem. Non nisi dolor sapiente adipisci possimus sed.<br>Ab ad dicta impedit aperiam. Sit voluptas quod saepe animi nisi. Consequatur accusantium corporis et impedit voluptatibus. Quos temporibus delectus temporibus quaerat laborum rerum voluptatem.<br>Tenetur minus ut reprehenderit. Qui consequatur dolorem accusantium. Aut voluptatem qui commodi tempore beatae. Aut itaque quis ullam consectetur reiciendis.<br>Dicta quis exercitationem omnis natus. Animi nostrum dolorem ullam voluptas nesciunt eos. Facere laborum est beatae ducimus.<br>Modi corrupti alias reiciendis sed eos cumque expedita. Earum sequi debitis accusamus magnam aperiam. Est sint quaerat consequatur et velit dolorem.<br>Harum natus sint tenetur inventore non ut dolore. At modi labore provident enim. Ad maxime dicta totam earum. Inventore magnam amet dolorum.<br>Temporibus repudiandae autem odio et. Fuga non odit fugiat repudiandae quos magnam. Dolore laborum illum quisquam. Excepturi dolorum nihil quia repellat.<br>Accusamus et veritatis nulla autem. Exercitationem et ducimus pariatur et quis asperiores eum sit. Laudantium omnis temporibus facilis hic qui et.<br>Ut maxime itaque laudantium optio. Nam voluptatem quisquam aut nihil neque doloribus. Repudiandae labore iusto velit sequi amet consequatur. Accusantium placeat nobis quam dolorem.<br>Sunt molestias sed nostrum enim alias quas. Autem et illum beatae rerum est. Omnis quae quidem aut recusandae enim est cumque.<br>Libero aut est est omnis magni eveniet. Itaque ea aut temporibus ipsa et. Porro praesentium vero natus alias. Suscipit laboriosam error id quas blanditiis dolorem quo.<br>Quod delectus quisquam in suscipit. Et nulla consequatur qui velit. Odit amet omnis in provident numquam vitae voluptates quia. Et atque aliquid dolores consequatur id dicta debitis.<br>Vitae ut et blanditiis error id non. Quidem aut qui optio harum. Id est fugit quis non et.<br>Voluptate odit aspernatur laborum praesentium nesciunt blanditiis. Optio illum voluptatem illo illo.<br>Unde tempore repellat eaque omnis numquam quis. Voluptatem velit quas sed nam ut sint autem. Suscipit enim eveniet et error minima vel enim. Similique rerum atque iure voluptas fugiat blanditiis et et.</p>', 'accusantium recusandae voluptas suscipit soluta voluptates fugiat nam est iusto ab velit quidem aliquid est eius officia placeat perferendis sint inventore ratione accusantium necessitatibus eaque pariatur ut dolorem sunt repellat vitae delectus ratione atque qui possimus vel quae saepe rerum rem impedit a sint qui harum a officia tempora fuga', 1, 3, '2022-01-10 08:55:06', '2022-01-10 08:55:06'),
(4, 'eum-et-dolor', 'eum et dolor', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Sed ut non alias accusamus. Est quo dignissimos laudantium. Fuga sit aut est. Dolore ut tenetur magnam placeat et a beatae dolore.<br>Quod inventore autem qui possimus et rerum quos occaecati. Molestiae veniam consequatur nesciunt modi rerum aliquid quis. Id alias sit et temporibus voluptatibus et.<br>Officia quia rerum ut. Omnis in nisi officia. Necessitatibus nisi cumque aut non et quam. Repellendus exercitationem voluptas quae sunt omnis accusamus repellendus.<br>Incidunt voluptatibus impedit tempore. Inventore voluptates quos esse autem. Commodi impedit aut harum eius voluptate aut. Rerum qui blanditiis qui.<br>Amet aut quia nihil cum dolores incidunt. Sapiente nobis sed libero corrupti omnis aut. Quidem reiciendis in reiciendis non vitae expedita iure praesentium.<br>Ratione incidunt voluptate dolores rerum facilis explicabo maiores rerum. Aut qui deleniti ut quaerat rem. Tempora deleniti et ducimus excepturi.<br>Mollitia non molestiae et nisi sit assumenda rerum. Error nihil natus et et doloremque sit omnis. Reprehenderit ad atque soluta perspiciatis porro et at. Explicabo hic quibusdam explicabo officia sit impedit voluptas.<br>Rem ut est unde culpa. Fugiat dolores tempora voluptas est aut voluptatem sint. Neque eum assumenda et fuga quod et nesciunt.<br>Eum enim aperiam odio fugiat ipsum non velit. Excepturi eos repudiandae et reiciendis. Nisi ut quia qui eligendi. Quis labore nisi omnis. Autem fugiat illum ut similique quasi expedita atque.<br>Dolores et quos enim voluptates quo aut. Voluptas iure minima rerum. Velit minima pariatur nostrum exercitationem dicta quam.<br>Facere et aspernatur natus ab deleniti aperiam. Quo dolorem rerum dolorem labore vero ab.<br>Tenetur est quos sit qui inventore. Harum iste quis mollitia qui molestiae.<br>Voluptatem cum rerum dolores ut earum neque. Nemo placeat consequatur enim est ipsam. Rerum recusandae occaecati consequatur nulla.<br>In rem amet voluptas consequatur voluptas sunt consequuntur. Vel sapiente reiciendis aut rem sed aut error nemo. Sed expedita minima voluptatem.<br>Consequatur sed nihil et voluptatibus architecto beatae occaecati. Quos maiores dolores exercitationem nostrum sunt magni. Sit sequi rerum voluptates ipsum ea.<br>Esse dolorem eius magni at fugit ad magnam. Ex et sed itaque facilis ad fugiat et. Excepturi voluptatum unde laudantium enim sed ut.<br>Et quasi ut quo ut nobis. Eveniet id et hic vitae inventore dolorum. A maiores delectus velit laboriosam facere. Sed vel beatae recusandae nostrum explicabo vitae libero.<br>Autem officia sunt eveniet consequatur fugit asperiores rerum veniam. Cumque iste in cum sit. Et voluptatum et sit impedit velit.<br>Dignissimos et harum est et a numquam tenetur dolorum. Animi temporibus est maiores quis voluptates. Laborum soluta id modi eveniet quas suscipit eos. Molestiae deleniti quia tempora asperiores incidunt maxime sed eveniet.<br>Ut ad non in qui animi et. Doloremque veniam eum vero consequatur nam adipisci debitis. Mollitia omnis sit nam dolores voluptates eos. Provident sed vel doloribus cum doloribus. Soluta quia autem vel voluptatem.<br>Voluptates doloremque harum minima nobis. Rerum nam sit id adipisci ad consequatur aut aut. Hic sapiente impedit officia necessitatibus vel. Voluptatem expedita molestiae sint non fugiat.<br>Vel corrupti omnis perferendis. Enim sunt et aliquid repudiandae nemo iusto nam asperiores.<br>Aperiam ea accusamus est quas et commodi placeat. Est quae veniam consequuntur vitae minima porro. Id voluptas consequatur corporis maiores perspiciatis cum pariatur. Nihil dolorum voluptatibus debitis rerum.<br>Aut quaerat ratione ea ut iure officiis modi. Excepturi veniam tempora ratione quia provident quo quidem.<br>Et quod impedit atque eum aut voluptas in. Facilis est velit ut. Dolores est reprehenderit aut ut.<br>Animi eveniet tenetur earum ut. Inventore porro animi esse iste consequatur. A eius consectetur dolores aspernatur iure odio.<br>Fuga ducimus explicabo est quos quam adipisci. Aperiam amet est rerum. Qui excepturi ratione deserunt consequatur. Dolorem est occaecati dolorem voluptatum vel accusantium iure. Ut suscipit voluptas a impedit.<br>Amet minima quia aliquam temporibus. Qui dolores nemo est enim. Nam esse et ut.<br>Reprehenderit omnis ea omnis et nam quia aut. Expedita qui dolores quaerat laudantium animi. Impedit iure mollitia aut sequi tempora consectetur quia. Saepe eos culpa occaecati enim veritatis.<br>Veritatis vel quia dolore. Quod doloremque consequatur eaque porro ut vero at laboriosam. Fugiat libero praesentium sed eius voluptatibus.<br>Et fuga ut voluptatem. Doloremque aut dolorem nostrum. Et consequatur nam cumque recusandae vitae magnam nulla.<br>Voluptates quia minus aut ut. Enim hic temporibus aut atque voluptates sunt aut. Aut dolorem ipsam quia.<br>Tenetur omnis consequuntur vero sed sunt maxime eaque. Fugiat ad dolores quae voluptatem.<br>Earum culpa in repudiandae iste explicabo dolorem delectus. Enim eligendi consequatur impedit occaecati. Ut veniam incidunt et libero fugiat assumenda. Sint quos qui accusamus.<br>Cumque necessitatibus tempora mollitia et. Tempore et molestias voluptas.<br>Aut voluptatem vitae accusamus est consequatur quo quidem. Cum officia a quos laborum dolorem dolorum doloremque. Eos dolor est repellendus ut est.<br>Odit molestiae laboriosam eius suscipit quos deleniti ut. Vel quisquam accusantium et occaecati sunt ipsa dolores. Illo repudiandae quia repellendus eos quo. Accusamus quos itaque vitae nisi ab neque.<br>Molestiae aut qui nulla quod provident expedita. Rerum labore tempora soluta repellendus et. Id ullam blanditiis rem nulla voluptatem aliquid. Id voluptatem odio recusandae et.<br>Eos officia impedit optio enim repellendus rerum. Facere non porro fugit. Voluptas exercitationem error ratione consequuntur libero reiciendis sequi.<br>Eum nostrum corporis illum voluptates qui perferendis. Dolor dolorem accusantium culpa provident. Maxime similique in eligendi dolor ipsa vero voluptatem. Pariatur placeat officiis veritatis sapiente aut voluptas et nisi. Molestiae harum repellat sint minima.</p>', 'iusto ipsum sit voluptates et eum corrupti nulla provident ut quia deleniti itaque odio natus vel ipsum magni aut omnis vero ipsum voluptatem et sit accusamus assumenda qui explicabo doloremque veritatis maxime voluptas ipsa et voluptates provident error dolores est architecto ipsam porro occaecati aut quia porro officiis nostrum sit', 1, 3, '2022-01-10 08:55:06', '2022-01-10 08:55:06'),
(5, 'nisi', 'nisi', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Doloribus dolor provident eum officia consequatur ut. Neque facilis error voluptatem optio. Praesentium aperiam amet et aut error. Porro soluta laudantium nihil corrupti.<br>Minus sed voluptatem vitae aut rerum eaque. Rem id distinctio et laboriosam temporibus rem. Commodi illo iste quam et ipsum quam quia. Iusto autem fugit eligendi placeat ea dignissimos.<br>Ex suscipit est id corporis et. Voluptate nulla assumenda eaque voluptatem iure. Ullam est sed aut illo provident ut sunt et.<br>Debitis rerum quia est qui ex placeat architecto. Alias nobis occaecati quaerat deleniti. Quia et qui nesciunt enim omnis aut. Reiciendis est odio sequi unde non.<br>Magni veritatis quasi dignissimos. At ut odio quasi et. Magni voluptas cum aut eaque. Quae maiores praesentium mollitia quo ut est quia.<br>Culpa sequi magni est qui autem at vel. Aut natus dicta consectetur est nostrum. Labore similique ut quos.<br>Dolores dignissimos mollitia neque accusamus error ut. Adipisci sed sit atque quod cum. Est et odit eos recusandae dolorem.<br>Ex velit alias illum dolores qui. Officia earum corporis vero vel. Et nulla neque eos ex accusantium aspernatur.<br>Aut totam vel sequi. Dolor veritatis qui voluptatem corrupti. Vero dicta sit commodi molestias tempore. Architecto nulla magni porro aut.<br>Numquam ducimus corrupti beatae non occaecati consectetur in. Veniam earum repudiandae non qui aut beatae voluptatibus. Et molestias et aperiam corrupti sunt aut nobis. Hic temporibus voluptas voluptatem error doloremque.<br>Modi in magni blanditiis molestiae. Sed sed porro dolorem aut. Et magnam repellendus est ipsam dignissimos hic.<br>Dolorum placeat dolores et quia distinctio facilis commodi. Placeat consequatur eligendi ex tempore. In qui aut aut nobis in atque. Quis illo quidem eius dolores commodi officia.<br>Fugit qui et odio et sunt ut deserunt. Autem sit tenetur ullam dolore rerum quasi. Molestiae et autem ab beatae consequatur. Molestiae reiciendis fugit consectetur nam quaerat.<br>Consequatur minima quia qui est repellendus voluptate. Quis eum voluptatem dicta cupiditate quisquam. Atque ut eligendi ex. Vero facere sapiente placeat voluptas ex eius qui aliquam. Amet sapiente ex maiores et vel et excepturi.<br>Sit ut explicabo consequuntur esse similique. Ab quod repellendus itaque occaecati veritatis. Saepe iusto fugiat consequuntur ea.<br>Esse doloremque enim ipsam fugit est eaque omnis. Autem eos excepturi nesciunt modi veniam sed nihil quasi. Eos eveniet ut iste quia tempora nam. Tenetur est sint qui nulla illum laboriosam.<br>Sunt ducimus porro voluptatem est enim. Iusto perferendis autem sunt perferendis. Molestiae laudantium quas consequatur nostrum.<br>Consequatur rerum quasi velit dolor quae. Similique qui architecto voluptas tempore ullam. Eum sit autem assumenda doloremque et ab rerum.<br>Cumque non omnis magni iure. Iusto ab quis cupiditate commodi laborum dolore molestiae. Sapiente corrupti possimus itaque et et eos non. Sit soluta eum eum quod rem tenetur in.<br>Sint quis doloremque ut consequatur. Quia magnam consequatur ipsum maxime. Ut eum rerum ut qui minima. Voluptas quam assumenda quo mollitia.<br>Qui est nobis et. Impedit sit earum soluta beatae. Aut in consequatur eveniet.<br>Sunt ut rerum expedita et veritatis. Voluptas suscipit id cumque qui ab eos assumenda. Hic magnam hic vero et repudiandae aut.<br>Architecto veritatis aut repellendus aliquid ea et repellendus. Quidem quo asperiores aperiam.<br>Magni quos asperiores quas dolorum autem. Ut ipsa libero nisi animi. Maiores voluptatem iure officiis.<br>Voluptatibus dolorem omnis non quaerat. Officiis consequuntur aut alias assumenda numquam eum est repellat. Enim est ab sunt dignissimos eaque maxime. Qui voluptate dolorem enim nobis accusamus.<br>Est hic aspernatur laudantium iste. Sit neque at illo excepturi. Quia quidem numquam omnis est vel ad.<br>Ea vel pariatur corporis quo. Vel eaque autem id autem earum. Voluptas id laborum cumque iste eum eum dolor. Beatae aperiam nam saepe earum. Est consectetur totam voluptatum unde qui quibusdam commodi illo.<br>Vel iusto dolorum pariatur magnam rem. Est voluptatem vel accusamus. Vitae et nostrum vero. Aliquam tempore impedit voluptatem qui veniam.<br>Adipisci unde sunt qui natus quasi corporis. Aut dolor tempore rem ex sint illo necessitatibus quasi. Alias facilis et ipsa et esse eos.<br>Expedita voluptatem consequuntur aut tempore quia hic. Et repellat ullam ratione quia vero. Cupiditate laborum molestiae voluptatibus sed exercitationem deserunt qui. Rerum est qui eaque facere nam qui perspiciatis.<br>Aut ut esse non autem. Et alias sunt illo quam laudantium dolorem aut nobis. Ut in corrupti earum quos dolorem adipisci et velit. Accusantium reprehenderit consequatur aut harum.<br>Et provident aut iste in ea non quam. Libero eos dolorem repellendus. Dolor numquam quasi et voluptatem in sit. Sed odio quibusdam exercitationem exercitationem laboriosam vel alias rerum. Hic dolorem illo et veniam consectetur est doloremque fugit.<br>Aliquam maiores corporis et nihil nihil delectus. Excepturi quia veniam quaerat. Dolore ab nostrum corporis.<br>Alias qui voluptatum cupiditate. Voluptas numquam neque quisquam omnis ducimus aspernatur aut. Officia reiciendis nemo a.<br>Non repellendus nisi cupiditate nisi et. Praesentium ducimus eligendi eveniet laboriosam harum. Dolorum blanditiis tempora hic quas velit.<br>Dolor vel facere assumenda earum nam quos. Minima ut nihil vero officiis ea ex qui. Voluptas quam et ea aut. Placeat dolor omnis dolore.<br>Est et sapiente omnis quo. Aut aut laborum iste. Iusto cumque qui vitae ab aliquam sed. Dolorum id sapiente amet.<br>Eos voluptatum cupiditate quia non ea. Sunt omnis ut est et repudiandae ut ut. Sint eos aperiam quia sed.<br>Iure sed aliquam mollitia sed amet hic magnam rem. Modi dolores omnis rerum harum. Voluptas officiis dicta consectetur aut.<br>Repellat eveniet odio ex mollitia. Eligendi excepturi quia quis ut esse. Saepe fuga sapiente odit iure explicabo iusto minima. Cupiditate consequatur enim at consequatur.</p>', 'non magnam temporibus deleniti ut numquam velit et et corrupti et temporibus omnis qui in qui mollitia nesciunt animi distinctio mollitia expedita quia voluptates et quis provident accusamus facere eaque reprehenderit debitis totam nihil libero incidunt ut impedit in quaerat omnis laborum corporis incidunt et voluptatum ad tempore qui assumenda', 1, 3, '2022-01-10 08:55:06', '2022-01-10 08:55:06'),
(6, 'odio-exercitationem-ducimus', 'odio exercitationem ducimus', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Nihil rerum recusandae deserunt hic et sint. Consequatur qui eveniet eum excepturi aut laboriosam. Rem amet perspiciatis praesentium numquam voluptatem.<br>Placeat excepturi quo nihil nostrum maiores. Sint explicabo ipsam nesciunt odit perferendis et facere sed. Atque error rerum exercitationem veritatis nobis.<br>Quos eum dolores asperiores officiis provident quia. Corrupti aperiam maxime ipsa fugit. Consequatur saepe alias totam commodi et laborum.<br>Impedit saepe voluptas dolor molestiae numquam dolorem explicabo. Voluptate omnis consequatur quidem minus veniam sequi eum.<br>Unde doloremque distinctio quisquam nemo ut maxime iste impedit. Ut alias ut a sed dolorem. Temporibus explicabo error voluptatem autem nisi enim. Voluptatibus tempore enim quis ea.<br>Voluptate numquam dolore dolore. Officiis deserunt aut eius voluptas ex. Repellendus aperiam omnis ea ut ratione dignissimos recusandae. Quo ad ex repellendus nihil maxime voluptate. Consequatur praesentium ex fugit vitae asperiores natus quidem tempora.<br>Et inventore occaecati ea ut. Consequatur aliquid soluta tempore cum doloremque. Dolorem aliquid eligendi rerum est. Consequuntur molestias magnam laudantium libero.<br>Ab voluptas itaque tempora rem eum incidunt. Omnis quia et aut animi non. Ex culpa et provident odit est autem corrupti. Dolores recusandae ea est.<br>Nobis vel doloribus enim deserunt et quisquam quis ea. Eos doloribus voluptates voluptas et veniam aut. Sint ut consequuntur ut alias perspiciatis aliquam perferendis non.<br>Nihil perspiciatis voluptas maiores inventore praesentium possimus unde. Cupiditate ipsum laboriosam porro voluptatem sint aliquam omnis ullam. Et quae quibusdam aspernatur vel. Ab saepe rerum sint nihil.<br>Dolore culpa consequuntur quisquam facilis. Et velit consectetur error rem dolorum. Enim occaecati voluptatibus fugit porro. Atque sunt sed consequatur praesentium corrupti.<br>Autem maxime libero ut. Quia eveniet nemo occaecati repellat atque adipisci. Ullam earum voluptatum ut voluptas perferendis distinctio sequi dolorem. Nihil harum accusamus perferendis doloremque quia a.<br>Et qui dolorem ut dolores ipsum omnis qui. Aspernatur reiciendis quia aliquid rerum. Ex dolores ipsam fugiat natus velit iusto impedit.<br>Consequatur quo qui est omnis ut ut debitis tempore. Minus incidunt nam ut ullam accusamus. Eos a et saepe.<br>Necessitatibus voluptates ratione est iusto vero. Quia et dolorem quia qui quia sequi ea.<br>Consequatur deserunt perferendis ab qui vel magnam voluptatem. Modi eaque ratione iusto. Ut molestias doloremque veniam nam architecto totam. Iure enim dolores modi.<br>Eligendi nihil qui qui est. Fuga hic consectetur et. Eos quis ex quia reprehenderit totam.<br>Corrupti aut cumque cum temporibus qui. Totam ipsa aliquid quis architecto ipsa.<br>Sed rerum sed dolorem aliquam beatae reiciendis dolores. Fugiat qui molestiae sit debitis distinctio consequuntur. Iusto quas illum quos voluptas tempora assumenda id temporibus.<br>Error cumque ipsa quis error et. Ea sit inventore totam sit. Aut vel et qui nostrum perspiciatis velit atque recusandae. Animi provident nostrum quam quod quaerat magni.<br>Esse fugiat alias labore. Ut eius ullam minima porro quo odio minima. Aut odit ab enim quia.<br>Ut tempora praesentium aliquam tempore aperiam blanditiis ut. Repellendus quis dolor doloremque aliquid dicta. Velit sed laboriosam dolore placeat ut eos officiis.<br>Sed voluptas consequatur quia est et et. Aliquam et dolores ad odio repudiandae. Dolorum tempore voluptate totam totam. Sit quis velit ipsa officia vitae cupiditate et incidunt. Eveniet dolorem quo tenetur optio voluptatum.<br>Eum qui cum nesciunt pariatur ut aut. Modi fugiat sed quos ipsum et. Rem dolor consequatur veniam qui similique quia. Dolores quaerat et accusamus quia consequatur.<br>In voluptatem rerum quis sapiente rem et voluptatum earum. Commodi praesentium quis quia deleniti fugiat quisquam rerum. Dolore eveniet quod sed et vitae sequi. Et nam quibusdam eaque praesentium omnis et eos quasi.<br>Reprehenderit reprehenderit non quos. Enim eum facere dicta illum expedita. Nemo maxime quaerat temporibus asperiores qui minima.<br>Soluta cumque reiciendis eveniet aliquam aut. Illo est non perspiciatis modi. Fugit placeat corrupti blanditiis inventore ullam nesciunt doloribus. Ipsum dignissimos sit ducimus quia voluptas unde. Eligendi voluptate quasi odio architecto.<br>Libero molestiae et mollitia. Fugit et voluptatibus odit sequi. Quo ipsa explicabo quasi et.<br>Labore non facere eum maxime libero. Esse sunt facere adipisci. Nam reiciendis ad rerum placeat commodi. Quia quae labore tempora velit.<br>Consequatur autem quasi aut. Facere vel voluptatem numquam voluptate ad eum quia. Tenetur expedita eligendi atque corrupti quia est ad.<br>Et sunt cupiditate veniam vel incidunt voluptatem beatae. Animi cupiditate quia ratione tempore aut officia. Enim laudantium iste nisi. Recusandae optio dolorem dolores minus accusamus aut.<br>Esse harum vitae omnis tempore exercitationem ex non. Quis odio qui voluptas molestiae laudantium. Voluptas et aut est quidem dolor vero.<br>Autem pariatur corporis aperiam labore autem voluptatum quibusdam. Numquam et et quis quia quia et. Voluptatem eos et at eligendi qui. Provident in eaque dolores odit corrupti est.<br>Veniam et sed est dolorum et quo laudantium. Distinctio error temporibus qui.<br>Distinctio vel quisquam sunt ab quo iusto id. Neque et officiis a quis. Provident qui autem incidunt aperiam sit quae molestias. Est assumenda quisquam et odio occaecati nam.<br>Laboriosam ea deserunt dolorum est est ea tenetur. Et est sint excepturi nulla. Placeat enim nulla impedit ut et.<br>Voluptatem eum harum adipisci et fugiat non ipsum totam. Fuga repudiandae dolorem et unde neque quia eligendi provident. Consequuntur non aperiam in beatae sit numquam necessitatibus.<br>Dolores quia error et totam ea inventore. At est veritatis illo expedita delectus commodi necessitatibus.<br>Et consequatur quia molestias a. Quis molestiae cupiditate ut ipsa aut enim est. Impedit natus non delectus amet ea.<br>Repellendus corrupti aliquam consequatur ex eos quibusdam. Voluptatum est est voluptatum asperiores minus aliquam sed quisquam. Dolores nisi iste sed voluptatem.</p>', 'cum unde ea numquam enim nihil vero eveniet nostrum perspiciatis omnis mollitia sequi rerum ipsam est velit aut sed laudantium inventore neque ut illo consequuntur neque a eius deleniti et perspiciatis sequi suscipit enim sint nemo quia modi eligendi est unde minima voluptatum quis accusamus velit consequuntur possimus hic velit', 1, 3, '2022-01-10 08:55:06', '2022-01-10 08:55:06'),
(7, 'quo-tempore', 'quo tempore', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Cumque architecto dolor sapiente delectus enim magni. Iusto aliquid dicta perferendis enim cumque qui consequatur voluptas. Asperiores optio sunt numquam aliquam occaecati labore sed.<br>Voluptas quaerat minima et ipsam minima necessitatibus. A voluptatem et tenetur modi quisquam possimus recusandae recusandae. Labore est aliquid minima illum ut et.<br>Dolorum qui molestiae aperiam. Quaerat cumque ab aliquid ullam quam consequatur.<br>Tenetur repellat ut eaque illum. Amet esse possimus in ipsa magni perspiciatis nisi.<br>Nihil cupiditate similique quia eveniet molestias. Odio magni sunt alias veniam ea. Et asperiores ad assumenda in tempora ut. Voluptas veritatis ipsa eos consequuntur fuga repudiandae.<br>Necessitatibus quod saepe et voluptatum tenetur quia voluptatem. Modi beatae et quibusdam qui autem. Reprehenderit blanditiis minima tempore.<br>Dolores sit commodi rerum iure quasi. Ratione deleniti quae odit commodi officiis.<br>Fuga numquam iste vel ut voluptatem placeat ut voluptates. Totam velit eius cumque nisi voluptatibus. Ut tenetur in est voluptas consequatur. Quia molestiae est cupiditate.<br>Qui odit delectus aut quis saepe. Inventore facere eaque itaque necessitatibus voluptatem quo consequatur nihil.<br>Saepe laudantium porro atque beatae. Omnis incidunt eligendi earum aliquam aut. Quae laboriosam minima et repudiandae assumenda.<br>Nemo eum amet sint quaerat assumenda sint nulla. Fuga aliquid ea occaecati quia esse. Ipsum doloremque quidem fugiat quia ipsa.<br>Sed voluptatum consectetur suscipit sed quam deserunt. Quis tempore debitis perferendis rerum vitae quia.<br>At ipsum quas assumenda sapiente natus. Saepe vel quasi et. Quia et occaecati dolorem cupiditate sed. Sint doloremque officiis quod eligendi aut.<br>Quae optio ea reiciendis asperiores fuga ad. Dolorem totam hic autem voluptas in repudiandae asperiores. Nisi repellendus maiores animi ipsa.<br>Est explicabo maiores quis occaecati perferendis. Aut voluptas qui omnis voluptas ex voluptatem. Et qui autem nesciunt.<br>Odio qui minima eaque porro illum. Quidem non deleniti minima quia eum. Quod suscipit sapiente magnam consequatur. Ullam adipisci et eaque eligendi voluptatem possimus aut.<br>Iusto rerum veniam quia voluptatem quam. Dicta temporibus voluptate est et magni voluptatem quis. Enim aut totam laborum deleniti fugit velit dolore ab. Voluptate magni iste hic. Qui id hic ullam ratione praesentium quibusdam quis iusto.<br>Est id porro dolores dignissimos soluta et delectus. Ullam est ipsa voluptatum sit quia earum consequatur similique.<br>Illo libero consequuntur sapiente odit. Nobis totam totam est ad. Recusandae qui itaque nam accusamus sit velit vitae. Qui sunt ut architecto ratione iusto veniam. Cumque consequuntur quia excepturi blanditiis.<br>Repudiandae cum tempora dolorum impedit. Rerum animi libero voluptas doloribus sint dignissimos delectus. Molestias explicabo est delectus id velit. Repellendus impedit dignissimos blanditiis aut quis voluptatem.<br>Earum nam vel rerum tempora numquam beatae odio. Id explicabo sapiente recusandae. Amet alias et asperiores laboriosam qui aut. Quia et in vel et doloribus exercitationem.<br>Inventore ut consequatur aut fugiat. Ipsam qui pariatur voluptate dolorem. Iusto eius assumenda quidem dolorum rerum et.<br>Ullam velit quia consequatur. Quos sed molestiae blanditiis quos at enim optio. Sint quos architecto in deleniti ratione accusamus voluptas. Repellat esse voluptas saepe qui est consequatur. Ad et quaerat dignissimos quis dolorem.<br>Laborum provident eos delectus quis quas. Voluptatibus ut repellendus autem amet. Cum rerum quo voluptates aut sit. Qui cum neque quod vel voluptatum tenetur ducimus.<br>Nihil laboriosam ad itaque. Et nemo minima rerum iste eligendi nisi voluptatum. Quos et culpa odio quis similique.<br>Sit veritatis delectus perferendis fugiat reprehenderit. Ad voluptatem mollitia ipsa expedita labore aut assumenda. Maiores vitae similique odit cupiditate aut.<br>Minima eos quia rerum quae libero aut. Architecto nobis eum et aut tenetur. Iure libero deserunt ratione sit. Pariatur tempore vel laboriosam mollitia ut ipsa ut ipsum. Eum sed eos amet rerum sunt.<br>Maiores sint debitis et voluptatum sed unde. Sit enim ut cum qui ut cumque animi.<br>Autem ut in sunt et amet atque. Molestias similique officiis labore qui aliquid rem. Itaque ut modi odit odit.<br>Recusandae in a dolores nostrum vel ex et. Repudiandae harum accusantium nihil qui ipsa. Et distinctio eum rerum soluta. Aliquid qui sed voluptatem quibusdam consequatur.<br>Harum voluptatem id dolorem illo debitis dolor ut. Dolore non veritatis consequatur blanditiis consequatur et cupiditate. Aut suscipit et nisi laborum assumenda.<br>Aspernatur quidem eum mollitia quo. Molestiae soluta numquam inventore rem ut nisi. Commodi fugit est accusamus iste voluptas ad.<br>Quaerat et et voluptatum modi distinctio dolorum alias. Consequatur quae minima provident necessitatibus omnis. Fugit voluptatem sapiente et veritatis animi qui eos. Vero corrupti recusandae alias enim.<br>Doloremque optio iste ut. Fugit dolores aut tempora tempore quas et ullam. Maiores dolor soluta officiis incidunt possimus. Omnis quos accusantium quidem sed aut corrupti.<br>Dolor non reiciendis quam. Eos quasi quidem iusto qui expedita corrupti. Inventore qui eaque pariatur amet.<br>Animi odit dicta sit et. Officia vel aut ipsa velit rem impedit ratione. Velit provident voluptate rem a.<br>Explicabo harum nesciunt placeat hic odit. Magnam vel minus ipsam at voluptatem rerum harum voluptatibus. Nemo commodi totam sapiente soluta nobis. Est ex voluptas quos facere amet.<br>Voluptatem aliquid sit voluptatem. Ducimus neque est vitae est ad. Officiis impedit velit voluptatem est nulla.<br>Ea neque quisquam similique. Sequi repudiandae aut aut ab quo perferendis quas rerum.<br>Ipsum odit eius accusantium cupiditate quis aut in nobis. Qui suscipit nulla eum architecto beatae qui quasi est.</p>', 'deleniti corrupti magni enim distinctio fugiat est inventore aut consequatur sed cumque qui possimus sed repellendus exercitationem magni culpa quod perspiciatis eos illum quia doloribus ut totam soluta reiciendis reprehenderit qui a ullam in tempore omnis non similique est est architecto dignissimos et nihil a perferendis qui odit iste est', 1, 3, '2022-01-10 08:55:07', '2022-01-10 08:55:07');
INSERT INTO `posts` (`id`, `slug`, `title`, `image_url`, `reading_time`, `body`, `short_description`, `published`, `author_id`, `created_at`, `updated_at`) VALUES
(8, 'nostrum-deleniti-rem-culpa', 'nostrum deleniti rem culpa', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Nobis odio et ducimus voluptatem velit. Labore quam eligendi dolores iure dolores atque ut. Sequi nihil voluptas nostrum alias.<br>Incidunt cum veniam debitis et qui quasi. Harum animi voluptatum tenetur. Suscipit deleniti id illum perferendis sunt perferendis reprehenderit. Tempore neque similique recusandae et.<br>Molestiae expedita nam cupiditate inventore. Voluptatum alias optio autem sint modi. Commodi doloribus explicabo doloribus qui aut. In dolores ut ipsam qui officiis in.<br>Et sit blanditiis adipisci rerum ratione est. Rem est ea et dolorem. Vel maiores aut rerum quia.<br>Perspiciatis sed placeat odio inventore. Eum perspiciatis occaecati voluptas impedit.<br>Rerum est itaque voluptatibus rem. Nam eum ut voluptatem odio repellat et omnis. Magni repudiandae velit dolores minus. Officiis minus doloremque error.<br>Qui possimus laboriosam ut dolor ipsam quo. Magnam fugit optio nihil eius asperiores molestias reprehenderit. Consectetur voluptas distinctio dolore modi et explicabo eos tempora.<br>Recusandae voluptatem alias placeat voluptas provident culpa. Rerum dolorum dolorem cumque alias et. Omnis corrupti ut non facere temporibus sit. Voluptates aut quibusdam eligendi quia.<br>Enim ipsa eum sit doloremque deleniti. Voluptatem ut consequatur ut saepe doloribus recusandae aliquid reiciendis. Doloribus nobis et repudiandae asperiores incidunt dolores voluptas atque. Nemo tenetur maxime quia error non iusto labore.<br>Autem ea veniam quibusdam voluptatum autem ipsum et. Blanditiis porro enim placeat tenetur molestiae ab praesentium officiis. Debitis iusto esse nam. Aut aperiam nisi provident et. Autem id ipsum eius non maxime.<br>Molestias eum perferendis ad explicabo soluta. Unde vero qui assumenda sed quae quasi. Rerum modi modi deserunt sed eum corporis. Architecto voluptas rerum qui consectetur.<br>Dolor inventore asperiores dolorum accusamus sint laudantium. Natus pariatur ex qui est quibusdam. Et eveniet temporibus dolor iure quam sed veniam. Et illum qui quis quasi.<br>Fugit est voluptatum optio vitae magni. Fuga ea est consequatur mollitia.<br>Ad eum earum quia ex. Eligendi et totam omnis nisi est. Expedita corrupti sunt voluptatem ipsum impedit ea. Et dolor numquam quas perspiciatis.<br>Minus perspiciatis quaerat exercitationem minima ut. Illo sit sit expedita similique. Eveniet est tempora omnis maiores libero ut nostrum.<br>Quisquam non quia aut voluptas blanditiis. Amet sit enim eos sint reprehenderit deserunt ut sunt.<br>Consectetur quo ipsum voluptas blanditiis sint earum enim. In dolorum earum eum corrupti voluptatem beatae eos id. Officia et voluptatem reiciendis aut est eveniet in voluptas. Magni repellendus ipsa esse dolore.<br>Magnam expedita ad explicabo similique. Dolores molestiae praesentium aspernatur et quia blanditiis.<br>Harum repellat eum eos ad saepe qui. Maiores qui rerum velit sed et. Et officiis molestiae ea quia repellendus. Qui consequatur ut nam molestias minima omnis reiciendis.<br>Delectus non laudantium id corporis aspernatur. Unde voluptates nisi minima enim dolore ut. Explicabo accusantium sunt illo atque saepe. Velit harum voluptatem optio quas.<br>Amet minima quos voluptatem in sit reiciendis. Dolor temporibus ut animi voluptatibus accusantium. Architecto consequatur recusandae enim voluptas blanditiis qui.<br>Labore alias ut debitis et adipisci accusamus sed. Voluptatem rerum aut ipsa facilis id perspiciatis ut odit. Sed fuga eos eveniet officia ea ea.<br>Harum minus unde cupiditate dolorum ut voluptatem eum totam. Nesciunt eaque occaecati quibusdam dolore tempore officia consequuntur. Eius qui ullam dolorem ex laboriosam.<br>Est est fugit suscipit eaque sed aut. In iure culpa vel occaecati temporibus. Qui omnis nam et error. Et voluptates cum velit maiores a neque velit. Enim id hic ducimus accusantium.<br>Commodi laboriosam dolor facere. Laborum explicabo omnis quae eos.<br>Dolores pariatur voluptates deleniti pariatur est est. Beatae nostrum quisquam ipsa nesciunt praesentium atque. Corrupti voluptatem eum eveniet aut voluptatem.<br>Sit dolores ut voluptas. Corrupti excepturi laudantium nemo delectus quod velit pariatur. Et cupiditate distinctio et accusantium cum. Molestiae adipisci cum ut provident quod.<br>Non velit ut quis tenetur. Voluptas qui voluptates dolor qui et molestiae. Rerum exercitationem autem facilis ut. Perferendis et at aperiam ut assumenda autem praesentium.<br>Sint beatae aut voluptatem perferendis nemo voluptates. Itaque et impedit quod et tenetur aut. Quia perspiciatis voluptas vel et laborum at. In cum in neque explicabo non.<br>Aspernatur hic quo officia eos commodi blanditiis. Nulla quaerat ducimus ipsa alias quibusdam. Aut nam neque et dolor fugiat repellat ratione amet. Sequi consequatur unde suscipit dolor.<br>Consequatur voluptatem distinctio odit modi. Sit beatae cumque ut facilis.<br>Praesentium aperiam consequatur qui quisquam natus. Non maiores ut sit explicabo perspiciatis fugit aperiam. Veritatis molestias ratione qui fugit.<br>Sunt adipisci dolorum sit maxime quaerat qui eum sed. Illum alias eum molestias incidunt nobis.<br>A eos voluptatibus sunt similique labore nam. Aut vitae aut vitae odit voluptas quod sint. Debitis saepe consequatur omnis. Culpa doloribus dolor velit et amet aut omnis.<br>Esse eos officiis sed cupiditate quos doloribus. Autem aut est quis possimus. Aspernatur eius rem aliquam animi dolor dolor facere.<br>Sequi nihil ad molestiae doloremque qui veritatis ab quo. Expedita praesentium libero occaecati tempore temporibus voluptatem.<br>Molestiae veniam eos ut placeat ea soluta. Quas quia similique id deleniti consequuntur ullam corrupti quod. Accusamus vel voluptas unde aut qui.<br>Quam explicabo voluptatum omnis earum. Doloribus voluptate reiciendis reprehenderit omnis quas suscipit.<br>Porro nostrum omnis consequuntur accusantium accusamus laudantium. Laboriosam quis qui nesciunt est sit id. Cupiditate hic tenetur exercitationem est itaque velit dolor. Voluptatibus assumenda deserunt repellat assumenda et officiis. Vitae qui necessitatibus eum sint saepe.<br>Repudiandae facilis aut consequuntur quos quia et aut. Repudiandae laudantium explicabo iusto aut distinctio. Itaque qui sint sed quia itaque. Et voluptatem quia aut ut et quam.</p>', 'quo nesciunt ut qui saepe ut ut dolore magni esse consequatur nulla debitis qui nam est asperiores rem rerum qui saepe inventore voluptatibus quisquam ea aut unde ut quia magnam pariatur aut consequuntur praesentium quo doloribus et illo et enim cumque ad neque dolore qui quam eaque quibusdam velit ut', 1, 3, '2022-01-10 08:55:07', '2022-01-10 08:55:07'),
(9, 'magnam-dolor', 'magnam dolor', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Omnis voluptas in eaque qui praesentium optio sequi. Repudiandae repellendus quod nam. Velit possimus omnis et exercitationem ex quis est. Eum iure vel deleniti aspernatur qui occaecati aut.<br>Officiis pariatur ea rerum fuga quo. Facere dolore et est esse. Ratione aut dignissimos in repudiandae natus voluptas et cupiditate.<br>Quam sed quibusdam nihil animi explicabo nisi voluptas voluptatum. Nobis excepturi aperiam unde voluptates. Minus corporis nemo qui odit quidem illo.<br>Adipisci sit iure sed et. Quis fugit itaque sit. Iusto voluptatem eaque ab aperiam enim ab. Quos consequatur molestiae et.<br>Soluta velit in recusandae dolorum quo et. Libero sit ipsum commodi sapiente atque dolores. Dolorem laudantium animi ab quia eos corporis molestias. Totam non ut distinctio voluptates aut deleniti ut aperiam.<br>Qui ut distinctio sed. Sit itaque aut mollitia animi eligendi velit assumenda. Cupiditate eum veritatis et qui nemo. Tenetur aut tenetur repellat enim.<br>Aliquid quod omnis illum optio tempore placeat voluptas. Perferendis alias error aliquid et nihil dolorum veniam. Magnam quos nulla sapiente cumque necessitatibus delectus. Quod quo ducimus aliquid architecto delectus ut.<br>Occaecati id reiciendis quaerat qui facere maiores quia in. Soluta mollitia est sit omnis officia asperiores. Repellendus ut deserunt consectetur dolorum accusantium et blanditiis.<br>Eos molestiae quo ut eveniet neque fugiat maxime. Repellendus quaerat assumenda harum quaerat blanditiis molestiae ut numquam. Veniam qui soluta et consequatur sapiente ullam.<br>Fugiat facilis facilis aut sed vel facere cumque. Distinctio fugiat enim explicabo vero consequatur aut minima. Culpa doloremque amet numquam aspernatur.<br>Et non totam et minima. Qui inventore quo porro quaerat natus quia qui est. Eum quaerat et fugit vitae sit. Placeat blanditiis esse qui.<br>Qui commodi quia soluta facilis tenetur est sunt. Blanditiis ut facere et ut. Enim omnis mollitia eaque accusamus quas consequatur laborum. Qui temporibus sapiente mollitia non magni sint.<br>Necessitatibus velit quas quia. Ut laboriosam facilis vel illo et repellendus quas. Non voluptates dicta omnis soluta et quas. Perspiciatis ducimus expedita cumque dolorem voluptas cupiditate accusamus et. Ut ipsam quia possimus quas libero officiis ullam.<br>Rerum consequatur sed recusandae nostrum quas quibusdam. Quo voluptatem quod tempore omnis ut voluptate. Omnis sunt quia architecto hic doloribus adipisci.<br>Ut est similique labore ut aspernatur. Placeat sit aut nemo ducimus suscipit. Quis provident ratione non harum sed.<br>Voluptatem omnis excepturi voluptate fugit cumque mollitia. Et iure et ex ea. Odit odit tenetur voluptatum nemo dolor ullam. Eveniet molestiae quas numquam quis cum similique eius voluptatum.<br>Delectus voluptatem rerum atque distinctio voluptatibus suscipit eaque. Necessitatibus quia soluta iusto recusandae hic quo. Natus eum voluptate qui.<br>Vel fuga est et veniam accusamus aliquam. Libero aut molestiae aut eligendi fugit. Rerum tempora quam nulla corporis voluptatibus voluptatem labore.<br>Nobis delectus dolor ducimus dolor ratione aut placeat. Saepe laboriosam aut repudiandae consequuntur aperiam. Et vel doloribus ut omnis commodi delectus. Consectetur quasi soluta autem facere.<br>Sit ratione ut similique ex. Facere culpa at illum expedita qui asperiores voluptas.<br>Dicta totam praesentium aut aliquid qui. Neque sequi illo et quia. Ratione dolorem totam accusantium ut et. Sunt dolor veniam repellendus suscipit nihil reiciendis distinctio.<br>Voluptatem qui quis sed laborum est. Atque voluptas autem officiis doloremque. Accusamus aut cupiditate ab eum dolores aspernatur. Dolorum odit sed nam et esse aut ut sit.<br>Similique eos modi aperiam quidem. Repellendus doloribus eos molestiae iusto perferendis exercitationem. Aperiam sit ut odit et suscipit ut iusto.<br>Hic quis rerum perferendis qui. Est quia deserunt ut dignissimos voluptatem. Ea repellat aperiam iste voluptatem officia nostrum.<br>Aliquam consequatur incidunt saepe aperiam qui alias quia. Quo autem sed id nisi impedit libero cumque. Excepturi voluptatem fuga voluptas officiis ut repellendus et.<br>Nisi officia modi amet ut cupiditate doloremque commodi. Aut ipsam quis dolorem accusamus dolores in nisi. Fuga facilis corrupti sed dolor doloribus non. Nam omnis molestiae corrupti quis eaque maxime beatae. Itaque aut quos ipsum necessitatibus maxime commodi quia officia.<br>Sapiente ab omnis totam et. Non voluptatem est ratione deserunt. Fugiat ipsam qui omnis atque ut. Tenetur expedita blanditiis quo autem vel magnam. Et consequatur nulla quibusdam nihil quasi.<br>Omnis deleniti aut error sapiente illo consequuntur et voluptas. Mollitia ad id tenetur aut. Est non velit ullam facere expedita et.<br>Laboriosam aut eos doloremque et ratione. Nihil veniam ratione ea vero et voluptate deleniti ut. Et eaque vitae reprehenderit qui autem et id.<br>Esse repellat architecto laboriosam qui ipsam veritatis. Recusandae quaerat voluptate voluptas. Omnis dolorem sint harum sequi. Odio possimus optio voluptas recusandae.<br>Ratione voluptates voluptas voluptatem labore in aut. Aut autem repellendus cupiditate aut ut labore et. Corrupti ad et aperiam ipsa dolore et eligendi quam. Qui est adipisci voluptate sed.<br>Mollitia qui iusto nihil modi. Sunt quod maiores aliquam beatae. Et sapiente et necessitatibus non tenetur eos. Fugit nesciunt velit optio laborum omnis.<br>Sed sequi vero mollitia aspernatur quaerat et omnis ad. Qui et soluta omnis et odio nihil minima. Eum quo adipisci ea ea et.<br>Rerum consequatur nisi id tempora eius omnis. Autem ut ipsa iusto. In vel eum consequuntur nihil dolorem ea consequuntur.<br>Qui iste unde ratione reiciendis dolor ipsa esse. Sed aut aut iure dolorem aut labore ut eos. Commodi atque quo dolorum et assumenda dolores.<br>Corporis accusantium in quaerat est. Adipisci non iusto sunt alias enim. Omnis est rerum ab. Eligendi iure aut doloremque modi molestiae. Rerum ipsa et quo et ut nihil qui.<br>Blanditiis repudiandae reiciendis at provident quidem. Est distinctio accusantium rerum odio. Voluptates omnis incidunt est dolore cum. Quas nisi ut aut consequatur neque quas.<br>Accusantium aut rerum qui at nulla eos dolore. Quo voluptatem rerum non quam molestias est repudiandae. Quae ducimus consequuntur quae nihil officia.<br>Saepe eos voluptate similique dignissimos quis. Dolore cum vel aliquid minima unde. Fuga harum autem impedit aut sint. Neque eos ut asperiores dolorum voluptatem vitae.<br>Tempore id accusantium quae dolores ea vel voluptatem. Harum quas nesciunt quos enim eveniet. Laudantium qui sunt dolores dolore ex sint nostrum. Hic dolorem id quis fugiat.</p>', 'sed amet rem doloremque doloremque nisi est error quo quidem quis non mollitia sequi corrupti ut voluptatem dolor qui ut quam doloremque nemo amet doloremque maiores doloremque qui laborum et nobis aut quo consequatur veniam esse nam quod ut nobis quas est maiores aliquid ipsa autem delectus voluptate rem aut', 1, 3, '2022-01-10 08:55:07', '2022-01-10 08:55:07'),
(10, 'tempora-et-autem-amet', 'tempora et autem amet', 'images/gallery/blog-post-1.jpg', 'دو دقیقه', '<p>Consequuntur et et corrupti vel dolorem. Illum consectetur quidem officia ipsam ipsum dolorem et. Molestiae provident laborum iusto tenetur tempore sed harum iure.<br>Id aut fuga tempore provident. Quo corporis fugiat quia saepe ipsa. Quidem deleniti voluptatem non voluptatibus suscipit. Blanditiis impedit facere nisi nisi excepturi aliquid dolores.<br>Doloribus ea vel omnis. Quod voluptas sint excepturi corporis nemo quia. Assumenda omnis minus magni aliquid nobis unde.<br>Voluptates aspernatur maiores sunt velit qui molestiae vitae. Aut distinctio similique eligendi. Perspiciatis perferendis recusandae voluptatibus dolor nihil. Corrupti excepturi consequatur dolores praesentium commodi laudantium magnam officiis. Ratione quia rerum et velit est.<br>Ipsa repellendus consectetur velit est quaerat ipsa. Saepe sit quis pariatur. Aspernatur sed omnis porro ipsa quibusdam at voluptatibus itaque. Nihil voluptatum voluptas illo officiis esse amet.<br>Delectus nesciunt vel nihil facere voluptas. Quae dolore nesciunt quaerat enim ipsum labore voluptates placeat. Qui voluptatem quia officiis et sapiente esse similique. Magni autem ut nihil fuga.<br>Error asperiores nesciunt consequatur maiores quos. Nam soluta distinctio laudantium repellendus. Molestiae dolorum sed quia doloremque rerum rerum. Explicabo labore cum minima dignissimos ut ipsa omnis.<br>Voluptas cupiditate impedit libero facilis minima. Praesentium inventore exercitationem aut ducimus hic quia.<br>Maiores amet et maiores. Libero aut dolores beatae. Est et nostrum voluptatem sint et accusantium.<br>Minima corrupti inventore unde minima eos dolor occaecati consequatur. Aut error nesciunt fugiat quia assumenda. Nemo voluptatem consequatur sunt praesentium maiores ab possimus. Consequatur in eius assumenda doloribus est voluptas asperiores. Eaque minima aut dolor at velit ipsa voluptatem.<br>Molestias soluta iusto est modi debitis vel. Aut fugit qui eum et.<br>Laudantium aut eum eius velit. Provident minus quis eligendi ut iusto. Quibusdam consequatur enim veritatis maxime natus nisi. Quia id quaerat est corporis quia sed. Quas est odio labore cupiditate similique repellat impedit.<br>Sint ad autem molestias et eos rem. Quo repellat animi nam esse dolor. Ratione quis distinctio animi possimus. Nobis quod id aliquam doloribus autem in aut magni.<br>Harum architecto odio nisi dignissimos quos. Molestiae sed et ipsa est quam. Odit ipsam ut est velit autem omnis vel mollitia. Qui sunt qui quisquam voluptatum aliquam consectetur tempora et. Expedita nesciunt fugiat rerum et perspiciatis corrupti.<br>Error est possimus rerum voluptate. Soluta voluptatibus dolores numquam doloribus molestiae. Deserunt autem ullam suscipit.<br>Aut quia ullam autem rerum magnam asperiores. Corporis itaque dicta atque dolorum unde autem. Earum quia eos qui.<br>Alias magnam hic aperiam explicabo architecto necessitatibus ullam. Cum natus atque dolores. Ad ea voluptates rerum error non consequatur. Aut culpa aliquam alias quis adipisci debitis unde ut.<br>Ut qui pariatur eum assumenda nihil maiores ut repellat. Est aspernatur dolore velit ratione accusantium ea qui. Modi fuga dolor voluptatem esse totam odio. Delectus labore qui quia ratione ut porro.<br>Eum deserunt hic enim repudiandae et molestiae praesentium. Cupiditate quisquam sunt velit eum nulla atque eum dolorem. Odit cum voluptatem explicabo non architecto aliquid.<br>Nesciunt aspernatur et provident officiis voluptatem natus sunt. Quibusdam veritatis tempore et voluptatem. Eum ea ea corporis quia eum. Quos et officia vitae.<br>Nam laboriosam architecto delectus quisquam fugit voluptatibus. Est omnis quibusdam excepturi blanditiis omnis maxime et. Impedit commodi deserunt corrupti assumenda at occaecati et. Esse repudiandae at repellat provident.<br>Qui ex quam occaecati vero cum. Neque excepturi id neque aliquam. Aut sapiente omnis unde asperiores eveniet et fugiat. Eaque ducimus ipsum id voluptas consequuntur explicabo est. Autem voluptas eos aliquid omnis minus.<br>Eaque consequatur qui est et consectetur voluptas. Occaecati ut est tenetur. Laborum fuga ut nihil blanditiis itaque.<br>Minus aut doloribus deserunt consequatur ea esse et. Aut in sed in aut sed voluptas beatae enim. Quae tempora nemo ea.<br>Aut unde veniam nulla quibusdam. Et quam laudantium molestias commodi ipsam. Nihil sit illum aspernatur rerum aut perferendis aut. Voluptates eos fuga id veniam quos blanditiis.<br>Fugit non modi cumque perferendis. Reiciendis dolores excepturi qui. Quia modi corrupti sequi et.<br>Quo velit quidem velit explicabo nisi deleniti similique tenetur. Eum nemo velit expedita officiis deleniti modi. Placeat quia nostrum culpa sint.<br>Adipisci ut cupiditate fugiat sed excepturi aut. Eum aliquam impedit occaecati omnis delectus consequuntur. Aut necessitatibus dolorum molestiae et. Eum est cum quis odit. Qui facere doloribus suscipit voluptatem rerum quaerat optio.<br>Est doloremque adipisci et porro ut vero impedit quos. Omnis perspiciatis modi enim ipsum ut. Quisquam aut et omnis nobis fuga impedit occaecati. Quas sed temporibus et occaecati consequatur.<br>Est non dolorem dolorem fuga. Occaecati labore repudiandae enim delectus. In et fuga unde asperiores.<br>Odit assumenda rerum minus quod. Doloremque libero ipsam neque culpa. Nostrum non quis mollitia ullam. Voluptates ducimus quo inventore eaque ducimus.<br>Quia provident ut qui quia quas vel numquam. Sequi sit aliquid illo quam dolores placeat ea. Tempora molestiae ea ratione explicabo dolorem. Neque dolore autem rerum sunt et totam dolorum. Non repudiandae in rerum ut alias.<br>Cupiditate aperiam accusantium exercitationem quos id dignissimos. Officiis sint sapiente odio at. Atque asperiores quisquam non quis dignissimos est. Reiciendis eos voluptatem incidunt dolore voluptatibus rem. Rerum voluptatem in ipsa vitae dolor animi.<br>Consectetur distinctio iste repellendus libero harum qui quibusdam rem. Qui amet rerum animi ipsum omnis fuga. Non qui non totam libero. Veniam ipsam omnis corrupti enim.<br>Alias quasi qui iste accusamus id consequatur. Consequatur ipsa a numquam. Vel fugit est natus eos non. Dolorem reiciendis rem nobis excepturi et.<br>Nemo ut beatae a eos et eos distinctio. Delectus animi et porro sequi necessitatibus dolore consequuntur. Perspiciatis similique autem aspernatur soluta. Laboriosam occaecati beatae et nostrum aut cupiditate provident sint. Accusamus necessitatibus tempore et numquam nulla nihil et.<br>Accusantium autem suscipit aspernatur fuga maxime error. Minima nemo eos dolorem atque non quam. Ratione repellendus quaerat hic rerum vero suscipit deleniti dignissimos.<br>Fuga reiciendis fugiat temporibus repudiandae et nisi necessitatibus eum. Cupiditate neque deserunt provident. Aut laudantium culpa temporibus. Sed sint sit corrupti eos omnis inventore.<br>Minima nostrum tempora nobis veniam error. Velit rerum officia velit consequatur eum ut quo. Sequi adipisci qui soluta.<br>Eaque unde molestias repellat et ut. Consequuntur omnis nesciunt ex dolor. Quasi id consequatur voluptatem asperiores magnam.</p>', 'tempora excepturi cupiditate fuga culpa unde accusamus ut est et dolores qui laborum repellendus repudiandae omnis sequi facere et dicta est officia fugit mollitia consequatur eum maxime et temporibus laudantium ullam maiores commodi consequatur aliquam possimus dicta eius repellat animi nesciunt nesciunt cumque enim dolorem distinctio voluptatem voluptas sit harum', 1, 3, '2022-01-10 08:55:07', '2022-01-10 08:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int DEFAULT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_attribute`
--

CREATE TABLE `service_attribute` (
  `service_id` int UNSIGNED NOT NULL,
  `attribute_id` int UNSIGNED NOT NULL,
  `page` int NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_plans`
--

CREATE TABLE `service_plans` (
  `id` int UNSIGNED NOT NULL,
  `service_id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_department_id` int UNSIGNED DEFAULT NULL,
  `status` enum('open','on hold','in progress','awaiting reply','reviewd','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `closed_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_departments`
--

CREATE TABLE `ticket_departments` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_department_user`
--

CREATE TABLE `ticket_department_user` (
  `user_id` int UNSIGNED NOT NULL,
  `ticket_department_id` int UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `side` enum('operator','customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `ticket_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint NOT NULL,
  `status` enum('validated','approved','canceled','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `bill_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `phone_verified`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'shirin69@khadem.com', NULL, NULL, 0, '$2y$10$IbXJiNi0jZmFQ/ebOERyE.oLeV7vO/MtaLDGkEw7BtKZvd9JKA/Rq', NULL, '2022-01-10 08:19:22', '2022-01-10 08:19:22'),
(2, NULL, 'rostam09@yahoo.com', NULL, NULL, 0, '$2y$10$YMkmPA76WXmX7fIMt0CpVu/4muDoQk9LimHr6c7jR3xN6x7vClAXq', NULL, '2022-01-10 08:38:39', '2022-01-10 08:38:39'),
(3, NULL, 'parsa35@mokri.sch.ir', NULL, NULL, 0, '$2y$10$vgrwpKKigb5XNbaa75ZWROluAi0sD1fEeX4EZRMCdtwIDHfv//s72', NULL, '2022-01-10 08:55:06', '2022-01-10 08:55:06');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributables`
--
ALTER TABLE `attributables`
  ADD KEY `attributables_attributable_type_attributable_id_index` (`attributable_type`,`attributable_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`),
  ADD KEY `companies_business_type_id_foreign` (`business_type_id`),
  ADD KEY `companies_product_type_id_foreign` (`product_type_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `definitions`
--
ALTER TABLE `definitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_invoiceable_type_invoiceable_id_index` (`invoiceable_type`,`invoiceable_id`),
  ADD KEY `invoices_payment_rule_id_foreign` (`payment_rule_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offerables`
--
ALTER TABLE `offerables`
  ADD KEY `offerables_offerable_type_offerable_id_index` (`offerable_type`,`offerable_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_company_id_foreign` (`company_id`),
  ADD KEY `orders_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_service_id_foreign` (`service_id`),
  ADD KEY `order_items_service_plan_id_foreign` (`service_plan_id`),
  ADD KEY `order_items_company_id_foreign` (`company_id`),
  ADD KEY `order_items_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_rules`
--
ALTER TABLE `payment_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_rules_payable_type_payable_id_index` (`payable_type`,`payable_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_attribute`
--
ALTER TABLE `service_attribute`
  ADD KEY `service_attribute_service_id_foreign` (`service_id`),
  ADD KEY `service_attribute_attribute_id_foreign` (`attribute_id`);

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
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_ticket_department_id_foreign` (`ticket_department_id`);

--
-- Indexes for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_department_user`
--
ALTER TABLE `ticket_department_user`
  ADD KEY `ticket_department_user_user_id_foreign` (`user_id`),
  ADD KEY `ticket_department_user_ticket_department_id_foreign` (`ticket_department_id`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_messages_user_id_foreign` (`user_id`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `verification_codes_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `definitions`
--
ALTER TABLE `definitions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_rules`
--
ALTER TABLE `payment_rules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_plans`
--
ALTER TABLE `service_plans`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_business_type_id_foreign` FOREIGN KEY (`business_type_id`) REFERENCES `definitions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `companies_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `definitions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_payment_rule_id_foreign` FOREIGN KEY (`payment_rule_id`) REFERENCES `payment_rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_service_plan_id_foreign` FOREIGN KEY (`service_plan_id`) REFERENCES `service_plans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `service_attribute`
--
ALTER TABLE `service_attribute`
  ADD CONSTRAINT `service_attribute_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_attribute_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_plans`
--
ALTER TABLE `service_plans`
  ADD CONSTRAINT `service_plans_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ticket_department_id_foreign` FOREIGN KEY (`ticket_department_id`) REFERENCES `ticket_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ticket_department_user`
--
ALTER TABLE `ticket_department_user`
  ADD CONSTRAINT `ticket_department_user_ticket_department_id_foreign` FOREIGN KEY (`ticket_department_id`) REFERENCES `ticket_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_department_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD CONSTRAINT `ticket_messages_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD CONSTRAINT `verification_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
