-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 01:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliatedetails`
--

CREATE TABLE `affiliatedetails` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('Pending','Rejected','Active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instantmessageid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referral_id` int DEFAULT NULL,
  `referred_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliatedetails`
--

INSERT INTO `affiliatedetails` (`id`, `user_id`, `status`, `city`, `country`, `region`, `phonenumber`, `instantmessageid`, `created_at`, `updated_at`, `referral_id`, `referred_by`) VALUES
(1, 7, 'Active', 'pending', '162', 'pending', '23232323232', '323344334334', '2024-04-14 03:44:52', '2024-04-14 03:44:52', NULL, NULL),
(2, 8, 'Pending', 'null', 'Nigeria', 'Lagos', '09022239623', '@lawrence', '2024-05-11 17:51:22', '2024-05-11 17:51:22', NULL, NULL),
(3, 9, 'Pending', 'null', 'Nigeria', 'Lagos', '0902223962833', '@jayden', '2024-05-11 18:02:05', '2024-05-11 18:02:05', NULL, NULL),
(5, 11, 'Pending', 'null', 'Nigeria', 'Lagos', '09022239632', '@lawrenceagnes', '2024-05-11 18:08:23', '2024-05-11 18:08:23', NULL, NULL),
(6, 12, 'Pending', 'null', 'Nigeria', 'Taxas', '9019022239628', '@johnjon', '2024-05-11 18:10:43', '2024-05-11 18:10:43', NULL, NULL),
(7, 13, 'Pending', 'null', 'Nigeria', 'Lagos', '0767676767676', '@lawrenceagnes2', '2024-05-11 18:13:22', '2024-05-11 18:13:22', NULL, NULL),
(8, 14, 'Pending', 'null', 'Nigeria', 'Lagos', '076767676767633', '@johnjon33', '2024-05-11 18:32:47', '2024-05-11 18:32:47', NULL, NULL),
(9, 6, 'Active', 'pending', '231', 'eredre', '464554644', '@334433443', '2024-05-18 13:03:05', '2024-05-18 15:06:08', 34232325, NULL),
(10, 15, 'Pending', 'drdrrr', 'Nigeria', 'Lagos', '090222396282', '@lawrenceagnes2', '2024-06-21 18:37:12', '2024-06-21 18:37:12', 65898878, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agencydetails`
--

CREATE TABLE `agencydetails` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `active` int NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `branddesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandproductlandingurl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `brandtargetgeos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandpreferredpayouttype` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandpaymenyterm` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandinstantmessager` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandinstantmessageid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandinterestedtraffic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandmonthlybudget` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandtracking` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paypal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencydetails`
--

INSERT INTO `agencydetails` (`id`, `user_id`, `active`, `companyname`, `brandurl`, `brandaddress`, `city`, `country`, `region`, `phonenumber`, `brandname`, `branddesc`, `brandproductlandingurl`, `category_id`, `brandtargetgeos`, `brandpreferredpayouttype`, `brandpaymenyterm`, `brandinstantmessager`, `brandinstantmessageid`, `brandinterestedtraffic`, `brandmonthlybudget`, `brandtracking`, `note`, `created_at`, `updated_at`, `paypal_email`, `client_id`, `secret`) VALUES
(1, 7, 1, 'Big hughs', 'pending', 'Abule-Nla Road,', 'pending', '162', 'pending', '09022239628', 'bighughs', 'the best way for putting data in a DataTables with ajax requests, is DataTables ajax api that you can see it in following link:the best way for putting data in a DataTables with ajax requests, is DataTables ajax api that you can see it in following link:', 'https://bighugh.com', 7, 'pending', 'pending', 'pending', 'Twitter', '@bighugh12', 'pending', '5000', 'pending', 'the best way for putting data in a DataTables with ajax requests, is DataTables ajax api that you can see it in following link', '2024-04-14 16:03:19', '2024-04-14 16:03:19', NULL, '', ''),
(2, 5, 1, 'Health is wealth', 'pending', 'canada way, canada', 'pending', '38', 'pending', '387474748484', 'HW', 'we are a health crazy people', 'healthiswealth.com', 11, 'pending', 'pending', 'pending', 'Telegram', '@bighugh12222', 'pending', '5000000', 'pending', 'we love you', '2024-05-19 08:13:49', '2024-05-19 08:13:49', NULL, '', ''),
(3, 16, 0, 'Doyle Knowles Plc', 'https://www.maxemy.me.uk', 'Ullamco dolor dolor', 'Enim impedit at ips', '50', 'na', '+1 (659) 334-2947', 'Caesar Stephens', 'Voluptates ipsa cup', 'Molestias asperiores', 13, 'Enim lorem totam quo', 'na', 'na', 'telegram', 'Iusto aute consequat', 'na', '7', 's2s', 'Qui ut et alias non', '2024-06-30 11:16:11', '2024-06-30 11:16:11', NULL, '', ''),
(4, 17, 0, 'Merrill and Burks Associates', 'https://www.garytej.me.uk', 'Recusandae Quo occa', 'Ea mollit id ut exc', '166', 'na', '+1 (797) 359-8383', 'Rebekah Reynolds', 'Saepe quod officiis', 'Soluta eius sint id', 13, 'Ipsam in eum qui sit', 'na', 'na', 'telegram', 'Est quam voluptatem', 'na', '5', 's2s', 'Possimus proident', '2024-06-30 12:48:04', '2024-06-30 12:48:04', NULL, '', ''),
(5, 18, 1, 'Saunders Rollins Plc', 'pending', 'Quia omnis sed est', 'pending', '173', 'pending', '+1 (327) 477-1055', 'William Barnett', 'Fuga Dolore ratione', 'Quos ipsum velit re', 14, 'pending', 'pending', 'pending', 'telegram', 'Fugiat iste aut id', 'pending', '1', 'pending', 'Nihil qui cum tempor', '2024-06-30 12:48:52', '2024-08-24 09:22:46', NULL, '', ''),
(6, 19, 1, 'tenant', 'pending', '76 Abule-Nla Road, ebutte metta west', 'pending', '162', 'pending', '0989898999', 'Oprah May', 'this is what i do.', 'https://bighugh.com', 2, 'pending', 'pending', 'pending', 'Twitter', '@ggfrhgbfrt54g', 'pending', '12000', 'pending', 'this is note', '2024-10-05 16:52:42', '2024-10-05 16:52:42', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `category`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Affiliate Marketing', 'affiliate-marketing', '2024-05-12 11:38:45', '2024-05-12 11:38:45'),
(2, 'Email Marketing', 'email-marketing', '2024-05-12 11:38:45', '2024-05-12 11:38:45'),
(3, 'Offers & Promotions', 'offers-promotions', '2024-05-07 11:38:45', '2024-05-05 11:38:45'),
(4, 'SEO', 'seo', '2024-05-12 11:38:45', '2024-05-12 11:38:45'),
(5, 'Social Media', 'social-media', '2024-05-12 11:38:45', '2024-05-12 11:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--



--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `banner`, `desc`, `user_id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Optimization for Affiliate Marketers: An Essential Standard', 'mobile-optimization-for-affiliate-marketers-an-essential-standard', '1715515422.jpg', '<h2><strong>Why Is Mobile Optimization Essential for Affiliate Sites?</strong></h2><p>&nbsp;</p><p>The rise of mobile technology is <strong>reshaping consumer habits</strong>, significantly impacting every facet of affiliate marketing. Advertisers and publishers must adapt their marketing approaches as more consumers turn to their mobile devices for online and offline shopping and research.&nbsp;</p><p>&nbsp;</p><p>Engaging with this <strong>perpetually connected consume</strong>r across all their devices is essential. Today\'s affiliate managers possess a significant opportunity to <strong>enhance their affiliate programs</strong>, targeting consumers on mobile devices to <strong>drive conversions and wield influence</strong> throughout the purchasing journey.</p><p>&nbsp;</p><p>Here are<strong> 5 top reasons</strong> why mobile optimization is so important:</p><p>&nbsp;</p><p><img src=\"https://www.crakrevenue.com/wp-content/uploads/2024/05/DESIGN-18759-CR-Banner-ArticleMobileOptimization-1200x300-top5Reasons-1280x720-1.jpg\" alt=\"Mobile Optimization\"></p><p>&nbsp;</p><h3><strong>Making a Strong First Impression</strong></h3><p>&nbsp;</p><p>A website lacking mobile responsiveness tarnishes the <strong>crucial first impression</strong> you aim to make. And no reader of this article can say the opposite. Capture this: you’re looking for information on a precise subject. You find an article with a title so promising that you cannot do anything else than click on it.</p><p>&nbsp;</p><p>And suddenly, everything goes south: a cluttered layout, ill-fitting images, and unresponsive buttons. This unfortunate experience will first make you leave the website and, secondly, leave you with a negative impression of it. You’ll <strong>never click again </strong>if you see it appear in your Google results.&nbsp;</p><p>&nbsp;</p><h3><strong>Prioritizing User Experience</strong></h3><p>&nbsp;</p><p>This point goes in accordance with the previous one. Now, get back to your affiliate marketer shoes. What you want the most is for people visiting your website to become <strong>actual customers.&nbsp;</strong></p><p>&nbsp;</p><p>For that, assuming that nowadays<strong>, </strong><a href=\"https://whatsthebigdata.com/smartphone-stats/\"><strong>more than 7 billion people</strong></a><strong> own a smartphone</strong>, you have to think about those users first.&nbsp;</p><p>&nbsp;</p><p>You also need to ensure your mobile website\'s navigation is smooth, simple, and responsive enough not to discourage visitors from interacting with your content.&nbsp;</p><p>&nbsp;</p><p>The need for constant zooming and sideways scrolling creates unnecessary obstacles that can <strong>negatively impact user experience.</strong></p><p>&nbsp;</p><h3><strong>Search Engine Preference</strong></h3><p>&nbsp;</p><p><strong>Search engines prioritize mobile-friendly websites.</strong> This means that if a website is not optimized for mobile devices, it is less likely to appear at the top of search results. The link between mobile-friendly design and increased traffic is clear.&nbsp;</p><p>&nbsp;</p><p>Websites that are easy to use on mobile devices tend to rank higher in search results and, as a result, receive more clicks and more traffic.&nbsp;</p><p>&nbsp;</p><p>Moreover, mobile-friendly websites tend to have higher conversion rates, as visitors are more likely to take desired actions on a website that <strong>works well on their devices.</strong></p><p>&nbsp;</p><h3><strong>Content Engagement Differs Across Devices</strong></h3>', 1, '3', '2024-05-12 11:03:42', '2024-05-12 11:03:42'),
(2, 'tititiit iti itit', 'tititiit-iti-itit', '1719608430.jpg', '<p>Affiliate marketing is a powerful and popular strategy that allows businesses to leverage a network of affiliates to promote their products or services. It\'s a performance-based model where affiliates earn a commission for driving traffic, leads, or sales to the merchant\'s website. This mutually beneficial arrangement has become a cornerstone of digital marketing, offering substantial advantages to both merchants and affiliates.</p><h4>What is Affiliate Marketing?</h4><p>Affiliate marketing involves three main parties: the merchant (also known as the retailer or brand), the affiliate (or publisher), and the consumer. Here\'s how it works:</p><ol><li><strong>The Merchant</strong>: The business that wants to sell a product or service.</li><li><strong>The Affiliate</strong>: The marketer who promotes the merchant\'s product through various channels such as blogs, social media, email marketing, and websites.</li><li><strong>The Consumer</strong>: The end user who purchases the product through the affiliate\'s promotional efforts.</li></ol><p>Affiliates use unique tracking links to monitor their marketing efforts. When a consumer clicks on these links and completes a desired action (such as making a purchase), the affiliate earns a commission.</p><h4>Benefits for Merchants</h4><ol><li><strong>Cost-Effective Marketing</strong>: Merchants only pay for actual sales or leads, reducing the risk of upfront marketing costs.</li><li><strong>Expanded Reach</strong>: Affiliates can access different audiences, increasing the merchant\'s market reach without additional advertising expenditure.</li><li><strong>Performance-Based</strong>: Payments are based on results, ensuring that marketing budgets are spent effectively.</li><li><strong>Brand Awareness</strong>: Continuous promotion by multiple affiliates enhances brand visibility and recognition.</li></ol><h4>Benefits for Affiliates</h4><ol><li><strong>Income Generation</strong>: Affiliates can earn passive income by promoting products without the need to create or manage them.</li><li><strong>Flexibility</strong>: Affiliates can choose products that align with their interests or audience, allowing for more authentic and effective promotions.</li><li><strong>Low Entry Barrier</strong>: With minimal investment, affiliates can start earning by leveraging their existing platforms.</li><li><strong>Diverse Opportunities</strong>: Affiliates can partner with multiple merchants, diversifying their income streams.</li></ol><h4>Affiliate Networks vs. PPC Networks</h4><p>Affiliate networks and Pay-Per-Click (PPC) networks are two prevalent advertising models, each with its own set of advantages. However, affiliate networks often offer several benefits over PPC networks:</p><ol><li><strong>Cost Efficiency</strong>: Affiliate marketing ensures that merchants only pay for actual conversions rather than clicks, leading to better ROI.</li><li><strong>Long-Term Relationships</strong>: Affiliates build lasting partnerships with merchants, fostering continuous promotion and loyalty.</li><li><strong>Enhanced Credibility</strong>: Consumers are more likely to trust recommendations from affiliates they follow or trust compared to anonymous PPC ads.</li><li><strong>Comprehensive Analytics</strong>: Affiliate networks provide detailed performance metrics, helping merchants optimize their campaigns effectively.</li></ol><h4>How DealsIntel.com is Revolutionizing Affiliate Marketing</h4><p>DealsIntel.com is a cutting-edge platform designed to bridge the gap between merchants and affiliates, providing innovative solutions to enhance their marketing efforts. Here\'s how DealsIntel.com is making a difference:</p><ol><li><strong>Seamless Integration</strong>: DealsIntel.com offers easy integration for merchants, allowing them to quickly set up and manage their affiliate programs.</li><li><strong>Advanced Tracking</strong>: The platform provides robust tracking capabilities, ensuring accurate attribution of sales and commissions.</li><li><strong>Curated Partnerships</strong>: DealsIntel.com connects merchants with top-performing affiliates, ensuring high-quality promotions and better conversion rates.</li><li><strong>Educational Resources</strong>: Both merchants and affiliates can access a wealth of resources, including tutorials, webinars, and best practices, to enhance their marketing strategies.</li><li><strong>24/7 Support</strong>: The platform offers round-the-clock support to address any issues and optimize the affiliate marketing experience.</li></ol><p>Affiliate marketing presents a compelling opportunity for both merchants and affiliates, fostering a symbiotic relationship that drives growth and success. By leveraging the strengths of affiliate networks and platforms like DealsIntel.com, businesses can unlock new levels of performance and profitability. Whether you\'re a merchant looking to expand your reach or an affiliate aiming to monetize your audience, affiliate marketing offers a pathway to achieve your goals effectively and efficiently.</p>', 1, '1', '2024-06-28 20:00:30', '2024-06-28 20:00:30'),
(3, 'fsfsfsfsfv rvsrws', 'fsfsfsfsfv-rvsrws', '1719608603.jpg', '<p>Affiliate marketing is a powerful and popular strategy that allows businesses to leverage a network of affiliates to promote their products or services. It\'s a performance-based model where affiliates earn a commission for driving traffic, leads, or sales to the merchant\'s website. This mutually beneficial arrangement has become a cornerstone of digital marketing, offering substantial advantages to both merchants and affiliates.</p><h4>What is Affiliate Marketing?</h4><p>Affiliate marketing involves three main parties: the merchant (also known as the retailer or brand), the affiliate (or publisher), and the consumer. Here\'s how it works:</p><ol><li><strong>The Merchant</strong>: The business that wants to sell a product or service.</li><li><strong>The Affiliate</strong>: The marketer who promotes the merchant\'s product through various channels such as blogs, social media, email marketing, and websites.</li><li><strong>The Consumer</strong>: The end user who purchases the product through the affiliate\'s promotional efforts.</li></ol><p>Affiliates use unique tracking links to monitor their marketing efforts. When a consumer clicks on these links and completes a desired action (such as making a purchase), the affiliate earns a commission.</p><h4>Benefits for Merchants</h4><ol><li><strong>Cost-Effective Marketing</strong>: Merchants only pay for actual sales or leads, reducing the risk of upfront marketing costs.</li><li><strong>Expanded Reach</strong>: Affiliates can access different audiences, increasing the merchant\'s market reach without additional advertising expenditure.</li><li><strong>Performance-Based</strong>: Payments are based on results, ensuring that marketing budgets are spent effectively.</li><li><strong>Brand Awareness</strong>: Continuous promotion by multiple affiliates enhances brand visibility and recognition.</li></ol><h4>Benefits for Affiliates</h4><ol><li><strong>Income Generation</strong>: Affiliates can earn passive income by promoting products without the need to create or manage them.</li><li><strong>Flexibility</strong>: Affiliates can choose products that align with their interests or audience, allowing for more authentic and effective promotions.</li><li><strong>Low Entry Barrier</strong>: With minimal investment, affiliates can start earning by leveraging their existing platforms.</li><li><strong>Diverse Opportunities</strong>: Affiliates can partner with multiple merchants, diversifying their income streams.</li></ol><p>&nbsp;</p><figure class=\"image\"><img src=\"http://cpa.test/media/post-gif_1719608589.gif\"></figure><h4>Affiliate Networks vs. PPC Networks</h4><p>Affiliate networks and Pay-Per-Click (PPC) networks are two prevalent advertising models, each with its own set of advantages. However, affiliate networks often offer several benefits over PPC networks:</p><ol><li><strong>Cost Efficiency</strong>: Affiliate marketing ensures that merchants only pay for actual conversions rather than clicks, leading to better ROI.</li><li><strong>Long-Term Relationships</strong>: Affiliates build lasting partnerships with merchants, fostering continuous promotion and loyalty.</li><li><strong>Enhanced Credibility</strong>: Consumers are more likely to trust recommendations from affiliates they follow or trust compared to anonymous PPC ads.</li><li><strong>Comprehensive Analytics</strong>: Affiliate networks provide detailed performance metrics, helping merchants optimize their campaigns effectively.</li></ol><h4>How DealsIntel.com is Revolutionizing Affiliate Marketing</h4><p>DealsIntel.com is a cutting-edge platform designed to bridge the gap between merchants and affiliates, providing innovative solutions to enhance their marketing efforts. Here\'s how DealsIntel.com is making a difference:</p><ol><li><strong>Seamless Integration</strong>: DealsIntel.com offers easy integration for merchants, allowing them to quickly set up and manage their affiliate programs.</li><li><strong>Advanced Tracking</strong>: The platform provides robust tracking capabilities, ensuring accurate attribution of sales and commissions.</li><li><strong>Curated Partnerships</strong>: DealsIntel.com connects merchants with top-performing affiliates, ensuring high-quality promotions and better conversion rates.</li><li><strong>Educational Resources</strong>: Both merchants and affiliates can access a wealth of resources, including tutorials, webinars, and best practices, to enhance their marketing strategies.</li><li><strong>24/7 Support</strong>: The platform offers round-the-clock support to address any issues and optimize the affiliate marketing experience.</li></ol><p>Affiliate marketing presents a compelling opportunity for both merchants and affiliates, fostering a symbiotic relationship that drives growth and success. By leveraging the strengths of affiliate networks and platforms like DealsIntel.com, businesses can unlock new levels of performance and profitability. Whether you\'re a merchant looking to expand your reach or an affiliate aiming to monetize your audience, affiliate marketing offers a pathway to achieve your goals effectively and efficiently.</p>', 1, '2', '2024-06-28 20:03:23', '2024-06-28 20:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'App', 'app', NULL, NULL),
(2, 'Cams', 'cams', NULL, NULL),
(3, 'Crypto', 'crypto', NULL, NULL),
(4, 'Dating', 'dating', NULL, NULL),
(5, 'Download', 'download', NULL, NULL),
(6, 'eCommerce', 'ecommerce', NULL, NULL),
(7, 'Education', 'education', NULL, NULL),
(8, 'Finance', 'finance', NULL, NULL),
(9, 'Gambling', 'gambling', NULL, NULL),
(10, 'Gaming', 'gaming', NULL, NULL),
(11, 'Health', 'health', NULL, NULL),
(12, 'Onlyfans', 'onlyfans', NULL, NULL),
(13, 'Travels', 'travels', NULL, NULL),
(14, 'Others', 'others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--


--

INSERT INTO `clicks` (`id`, `offer_id`, `user_id`, `country_id`, `device`, `platform`, `browser`, `status`, `created_at`, `updated_at`, `ip`, `clickID`, `referrerurl`, `earned`, `conversion`, `smartlink`) VALUES
(1, 254429, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-04-09 16:31:19', '2024-04-09 16:31:19', '127.0.0.1', '90122608', NULL, 0, 0, '0'),
(2, 254429, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-04-09 16:31:33', '2024-04-09 16:31:33', '127.0.0.1', '52079715', NULL, 0, 0, '0'),
(3, 254429, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-04-09 16:31:50', '2024-04-09 16:31:50', '127.0.0.1', '39325189', NULL, 0, 0, '0'),
(4, 254429, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-04-09 16:44:43', '2024-04-09 16:44:43', '127.0.0.1', '55358660', NULL, 0, 0, '0'),
(5, 794141, 6, 1, '', 'Windows', 'Microsoft Edge', 'Approved', '2024-05-18 18:14:41', '2024-05-18 18:14:41', '127.0.0.1', '52645764', NULL, 5, 1, '0'),
(6, 794141, 6, 1, '', 'Windows', 'Microsoft Edge', 'Approved', '2024-05-18 18:15:20', '2024-05-18 18:15:20', '127.0.0.1', '33057373', NULL, 3.09, 1, '0'),
(7, 794141, 6, 1, '', 'Windows', 'Chrome', 'Approved', '2024-05-26 14:16:15', '2024-05-26 14:16:15', '127.0.0.1', '17808702', NULL, 23.99, 1, '0'),
(8, 794141, 6, 1, '', 'Windows', 'Chrome', 'Pending', '2024-05-26 14:45:43', '2024-05-26 14:45:43', '127.0.0.1', '45928008', NULL, 0, 0, '0'),
(9, 683168, 6, 1, '', 'Windows', 'Chrome', 'Pending', '2024-05-28 19:24:34', '2024-05-28 19:24:34', '127.0.0.1', '20078739', NULL, 0, 0, '0'),
(10, 683168, 6, 1, '', 'Windows', 'Chrome', 'Pending', '2024-05-28 19:25:09', '2024-05-28 19:25:09', '127.0.0.1', '63905131', NULL, 0, 0, '0'),
(11, 683168, 6, 162, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-06-16 17:09:27', '2024-06-16 17:09:27', '127.0.0.1', '66593441', NULL, 0, 0, '0'),
(12, 683168, 6, 162, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-06-16 17:10:11', '2024-06-16 17:10:11', '127.0.0.1', '53040499', NULL, 0, 0, '0'),
(13, 683168, 6, 162, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-06-16 20:23:33', '2024-06-16 20:23:33', '127.0.0.1', '91754988', NULL, 0, 0, '0'),
(14, 683168, 6, 232, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-06-16 21:02:49', '2024-06-16 21:02:49', '127.0.0.1', '75593038', NULL, 0, 0, '0'),
(15, 683168, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-06-19 19:34:03', '2024-06-19 19:34:03', '127.0.0.1', '23610745', NULL, 0, 0, '0'),
(16, 254429, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-07-21 16:13:30', '2024-07-21 16:13:30', '127.0.0.1', '96104309', NULL, 0, 0, '0'),
(17, 254429, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-08-31 16:18:21', '2024-08-31 16:18:21', '127.0.0.1', '81820373', 'http://wp.test/', 0, 0, '0'),
(18, 254429, 6, 1, '', 'Windows', 'Microsoft Edge', 'Pending', '2024-08-31 19:54:08', '2024-08-31 19:54:08', '127.0.0.1', '26833048', NULL, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

--

INSERT INTO `configurations` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', '', NULL, NULL),
(2, 'contact_email', NULL, NULL, NULL),
(3, 'support_email', NULL, NULL, NULL),
(4, 'default_currency', '2', NULL, NULL),
(5, 'timezone', NULL, NULL, NULL),
(6, 'commission_rate', NULL, NULL, NULL),
(7, 'cookie_lifetime_days', NULL, NULL, NULL),
(8, 'minimum_payout_amount', NULL, NULL, NULL),
(9, 'payout_frequency', NULL, NULL, NULL),
(10, 'payout_methods', NULL, NULL, NULL),
(11, 'affiliate_auto_approval', NULL, NULL, NULL),
(12, 'signup_bonus', NULL, NULL, NULL),
(13, 'terms_and_conditions', NULL, NULL, NULL),
(14, 'require_tax_info', NULL, NULL, NULL),
(15, 'new_affiliate_notification', NULL, NULL, NULL),
(16, 'new_conversion_notification', NULL, NULL, NULL),
(17, 'payout_notification', NULL, NULL, NULL),
(18, 'admin_notification_email', NULL, NULL, NULL),
(19, 'conversion_window', NULL, NULL, NULL),
(20, 'allowed_countries', NULL, NULL, NULL),
(21, 'gdpr_compliance', NULL, NULL, NULL),
(22, 'logo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--


--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', NULL, NULL),
(2, 'Albania', 'AL', NULL, NULL),
(3, 'Algeria', 'DZ', NULL, NULL),
(4, 'American Samoa', 'AS', NULL, NULL),
(5, 'Andorra', 'AD', NULL, NULL),
(6, 'Angola', 'AO', NULL, NULL),
(7, 'Anguilla', 'AI', NULL, NULL),
(8, 'Antarctica', 'AQ', NULL, NULL),
(9, 'Antigua and Barbuda', 'AG', NULL, NULL),
(10, 'Argentina', 'AR', NULL, NULL),
(11, 'Armenia', 'AM', NULL, NULL),
(12, 'Aruba', 'AW', NULL, NULL),
(13, 'Australia', 'AU', NULL, NULL),
(14, 'Austria', 'AT', NULL, NULL),
(15, 'Azerbaijan', 'AZ', NULL, NULL),
(16, 'Bahamas', 'BS', NULL, NULL),
(17, 'Bahrain', 'BH', NULL, NULL),
(18, 'Bangladesh', 'BD', NULL, NULL),
(19, 'Barbados', 'BB', NULL, NULL),
(20, 'Belarus', 'BY', NULL, NULL),
(21, 'Belgium', 'BE', NULL, NULL),
(22, 'Belize', 'BZ', NULL, NULL),
(23, 'Benin', 'BJ', NULL, NULL),
(24, 'Bermuda', 'BM', NULL, NULL),
(25, 'Bhutan', 'BT', NULL, NULL),
(26, 'Bolivia', 'BO', NULL, NULL),
(27, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(28, 'Botswana', 'BW', NULL, NULL),
(29, 'Bouvet Island', 'BV', NULL, NULL),
(30, 'Brazil', 'BR', NULL, NULL),
(31, 'British Indian Ocean Territory', 'IO', NULL, NULL),
(32, 'Brunei Darussalam', 'BN', NULL, NULL),
(33, 'Bulgaria', 'BG', NULL, NULL),
(34, 'Burkina Faso', 'BF', NULL, NULL),
(35, 'Burundi', 'BI', NULL, NULL),
(36, 'Cambodia', 'KH', NULL, NULL),
(37, 'Cameroon', 'CM', NULL, NULL),
(38, 'Canada', 'CA', NULL, NULL),
(39, 'Cape Verde', 'CV', NULL, NULL),
(40, 'Cayman Islands', 'KY', NULL, NULL),
(41, 'Central African Republic', 'CF', NULL, NULL),
(42, 'Chad', 'TD', NULL, NULL),
(43, 'Chile', 'CL', NULL, NULL),
(44, 'China', 'CN', NULL, NULL),
(45, 'Christmas Island', 'CX', NULL, NULL),
(46, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(47, 'Colombia', 'CO', NULL, NULL),
(48, 'Comoros', 'KM', NULL, NULL),
(49, 'Democratic Republic of the Congo', 'CD', NULL, NULL),
(50, 'Republic of the Congo', 'CG', NULL, NULL),
(51, 'Cook Islands', 'CK', NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),
(54, 'Cuba', 'CU', NULL, NULL),
(55, 'Cyprus', 'CY', NULL, NULL),
(56, 'Czech Republic', 'CZ', NULL, NULL),
(57, 'Denmark', 'DK', NULL, NULL),
(58, 'Djibouti', 'DJ', NULL, NULL),
(59, 'Dominica', 'DM', NULL, NULL),
(60, 'Dominican Republic', 'DO', NULL, NULL),
(61, 'East Timor', 'TL', NULL, NULL),
(62, 'Ecuador', 'EC', NULL, NULL),
(63, 'Egypt', 'EG', NULL, NULL),
(64, 'El Salvador', 'SV', NULL, NULL),
(65, 'Equatorial Guinea', 'GQ', NULL, NULL),
(66, 'Eritrea', 'ER', NULL, NULL),
(67, 'Estonia', 'EE', NULL, NULL),
(68, 'Ethiopia', 'ET', NULL, NULL),
(69, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(70, 'Faroe Islands', 'FO', NULL, NULL),
(71, 'Fiji', 'FJ', NULL, NULL),
(72, 'Finland', 'FI', NULL, NULL),
(73, 'France', 'FR', NULL, NULL),
(74, 'France, Metropolitan', 'FX', NULL, NULL),
(75, 'French Guiana', 'GF', NULL, NULL),
(76, 'French Polynesia', 'PF', NULL, NULL),
(77, 'French Southern Territories', 'TF', NULL, NULL),
(78, 'Gabon', 'GA', NULL, NULL),
(79, 'Gambia', 'GM', NULL, NULL),
(80, 'Georgia', 'GE', NULL, NULL),
(81, 'Germany', 'DE', NULL, NULL),
(82, 'Ghana', 'GH', NULL, NULL),
(83, 'Gibraltar', 'GI', NULL, NULL),
(84, 'Guernsey', 'GG', NULL, NULL),
(85, 'Greece', 'GR', NULL, NULL),
(86, 'Greenland', 'GL', NULL, NULL),
(87, 'Grenada', 'GD', NULL, NULL),
(88, 'Guadeloupe', 'GP', NULL, NULL),
(89, 'Guam', 'GU', NULL, NULL),
(90, 'Guatemala', 'GT', NULL, NULL),
(91, 'Guinea', 'GN', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', NULL, NULL),
(93, 'Guyana', 'GY', NULL, NULL),
(94, 'Haiti', 'HT', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),
(96, 'Honduras', 'HN', NULL, NULL),
(97, 'Hong Kong', 'HK', NULL, NULL),
(98, 'Hungary', 'HU', NULL, NULL),
(99, 'Iceland', 'IS', NULL, NULL),
(100, 'India', 'IN', NULL, NULL),
(101, 'Isle of Man', 'IM', NULL, NULL),
(102, 'Indonesia', 'ID', NULL, NULL),
(103, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),
(104, 'Iraq', 'IQ', NULL, NULL),
(105, 'Ireland', 'IE', NULL, NULL),
(106, 'Israel', 'IL', NULL, NULL),
(107, 'Italy', 'IT', NULL, NULL),
(108, 'Ivory Coast', 'CI', NULL, NULL),
(109, 'Jersey', 'JE', NULL, NULL),
(110, 'Jamaica', 'JM', NULL, NULL),
(111, 'Japan', 'JP', NULL, NULL),
(112, 'Jordan', 'JO', NULL, NULL),
(113, 'Kazakhstan', 'KZ', NULL, NULL),
(114, 'Kenya', 'KE', NULL, NULL),
(115, 'Kiribati', 'KI', NULL, NULL),
(116, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(117, 'Korea, Republic of', 'KR', NULL, NULL),
(118, 'Kosovo', 'XK', NULL, NULL),
(119, 'Kuwait', 'KW', NULL, NULL),
(120, 'Kyrgyzstan', 'KG', NULL, NULL),
(121, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(122, 'Latvia', 'LV', NULL, NULL),
(123, 'Lebanon', 'LB', NULL, NULL),
(124, 'Lesotho', 'LS', NULL, NULL),
(125, 'Liberia', 'LR', NULL, NULL),
(126, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(127, 'Liechtenstein', 'LI', NULL, NULL),
(128, 'Lithuania', 'LT', NULL, NULL),
(129, 'Luxembourg', 'LU', NULL, NULL),
(130, 'Macau', 'MO', NULL, NULL),
(131, 'North Macedonia', 'MK', NULL, NULL),
(132, 'Madagascar', 'MG', NULL, NULL),
(133, 'Malawi', 'MW', NULL, NULL),
(134, 'Malaysia', 'MY', NULL, NULL),
(135, 'Maldives', 'MV', NULL, NULL),
(136, 'Mali', 'ML', NULL, NULL),
(137, 'Malta', 'MT', NULL, NULL),
(138, 'Marshall Islands', 'MH', NULL, NULL),
(139, 'Martinique', 'MQ', NULL, NULL),
(140, 'Mauritania', 'MR', NULL, NULL),
(141, 'Mauritius', 'MU', NULL, NULL),
(142, 'Mayotte', 'YT', NULL, NULL),
(143, 'Mexico', 'MX', NULL, NULL),
(144, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(145, 'Moldova, Republic of', 'MD', NULL, NULL),
(146, 'Monaco', 'MC', NULL, NULL),
(147, 'Mongolia', 'MN', NULL, NULL),
(148, 'Montenegro', 'ME', NULL, NULL),
(149, 'Montserrat', 'MS', NULL, NULL),
(150, 'Morocco', 'MA', NULL, NULL),
(151, 'Mozambique', 'MZ', NULL, NULL),
(152, 'Myanmar', 'MM', NULL, NULL),
(153, 'Namibia', 'NA', NULL, NULL),
(154, 'Nauru', 'NR', NULL, NULL),
(155, 'Nepal', 'NP', NULL, NULL),
(156, 'Netherlands', 'NL', NULL, NULL),
(157, 'Netherlands Antilles', 'AN', NULL, NULL),
(158, 'New Caledonia', 'NC', NULL, NULL),
(159, 'New Zealand', 'NZ', NULL, NULL),
(160, 'Nicaragua', 'NI', NULL, NULL),
(161, 'Niger', 'NE', NULL, NULL),
(162, 'Nigeria', 'NG', NULL, NULL),
(163, 'Niue', 'NU', NULL, NULL),
(164, 'Norfolk Island', 'NF', NULL, NULL),
(165, 'Northern Mariana Islands', 'MP', NULL, NULL),
(166, 'Norway', '0', NULL, NULL),
(167, 'Oman', 'OM', NULL, NULL),
(168, 'Pakistan', 'PK', NULL, NULL),
(169, 'Palau', 'PW', NULL, NULL),
(170, 'Palestine', 'PS', NULL, NULL),
(171, 'Panama', 'PA', NULL, NULL),
(172, 'Papua New Guinea', 'PG', NULL, NULL),
(173, 'Paraguay', 'PY', NULL, NULL),
(174, 'Peru', 'PE', NULL, NULL),
(175, 'Philippines', 'PH', NULL, NULL),
(176, 'Pitcairn', 'PN', NULL, NULL),
(177, 'Poland', 'PL', NULL, NULL),
(178, 'Portugal', 'PT', NULL, NULL),
(179, 'Puerto Rico', 'PR', NULL, NULL),
(180, 'Qatar', 'QA', NULL, NULL),
(181, 'Reunion', 'RE', NULL, NULL),
(182, 'Romania', 'RO', NULL, NULL),
(183, 'Russian Federation', 'RU', NULL, NULL),
(184, 'Rwanda', 'RW', NULL, NULL),
(185, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(186, 'Saint Lucia', 'LC', NULL, NULL),
(187, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(188, 'Samoa', 'WS', NULL, NULL),
(189, 'San Marino', 'SM', NULL, NULL),
(190, 'Sao Tome and Principe', 'ST', NULL, NULL),
(191, 'Saudi Arabia', 'SA', NULL, NULL),
(192, 'Senegal', 'SN', NULL, NULL),
(193, 'Serbia', 'RS', NULL, NULL),
(194, 'Seychelles', 'SC', NULL, NULL),
(195, 'Sierra Leone', 'SL', NULL, NULL),
(196, 'Singapore', 'SG', NULL, NULL),
(197, 'Slovakia', 'SK', NULL, NULL),
(198, 'Slovenia', 'SI', NULL, NULL),
(199, 'Solomon Islands', 'SB', NULL, NULL),
(200, 'Somalia', 'SO', NULL, NULL),
(201, 'South Africa', 'ZA', NULL, NULL),
(202, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),
(203, 'South Sudan', 'SS', NULL, NULL),
(204, 'Spain', 'ES', NULL, NULL),
(205, 'Sri Lanka', 'LK', NULL, NULL),
(206, 'St. Helena', 'SH', NULL, NULL),
(207, 'St. Pierre and Miquelon', 'PM', NULL, NULL),
(208, 'Sudan', 'SD', NULL, NULL),
(209, 'Suriname', 'SR', NULL, NULL),
(210, 'Svalbard and Jan Mayen Islands', 'SJ', NULL, NULL),
(211, 'Eswatini', 'SZ', NULL, NULL),
(212, 'Sweden', 'SE', NULL, NULL),
(213, 'Switzerland', 'CH', NULL, NULL),
(214, 'Syrian Arab Republic', 'SY', NULL, NULL),
(215, 'Taiwan', 'TW', NULL, NULL),
(216, 'Tajikistan', 'TJ', NULL, NULL),
(217, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(218, 'Thailand', 'TH', NULL, NULL),
(219, 'Togo', 'TG', NULL, NULL),
(220, 'Tokelau', 'TK', NULL, NULL),
(221, 'Tonga', 'TO', NULL, NULL),
(222, 'Trinidad and Tobago', 'TT', NULL, NULL),
(223, 'Tunisia', 'TN', NULL, NULL),
(224, 'Turkey', 'TR', NULL, NULL),
(225, 'Turkmenistan', 'TM', NULL, NULL),
(226, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(227, 'Tuvalu', 'TV', NULL, NULL),
(228, 'Uganda', 'UG', NULL, NULL),
(229, 'Ukraine', 'UA', NULL, NULL),
(230, 'United Arab Emirates', 'AE', NULL, NULL),
(231, 'United Kingdom', 'GB', NULL, NULL),
(232, 'United States', 'US', NULL, NULL),
(233, 'United States minor outlying islands', 'UM', NULL, NULL),
(234, 'Uruguay', 'UY', NULL, NULL),
(235, 'Uzbekistan', 'UZ', NULL, NULL),
(236, 'Vanuatu', 'VU', NULL, NULL),
(237, 'Vatican City State', 'VA', NULL, NULL),
(238, 'Venezuela', 'VE', NULL, NULL),
(239, 'Vietnam', 'VN', NULL, NULL),
(240, 'Virgin Islands (British)', 'VG', NULL, NULL),
(241, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),
(242, 'Wallis and Futuna Islands', 'WF', NULL, NULL),
(243, 'Western Sahara', 'EH', NULL, NULL),
(244, 'Yemen', 'YE', NULL, NULL),
(245, 'Zambia', 'ZM', NULL, NULL),
(246, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek', NULL, NULL),
(2, 'America', 'Dollars', 'USD', '$', NULL, NULL),
(3, 'Afghanistan', 'Afghanis', 'AFN', '؋', NULL, NULL),
(4, 'Argentina', 'Pesos', 'ARS', '$', NULL, NULL),
(5, 'Aruba', 'Guilders', 'AWG', 'ƒ', NULL, NULL),
(6, 'Australia', 'Dollars', 'AUD', '$', NULL, NULL),
(7, 'Azerbaijan', 'New Manats', 'AZN', 'ман', NULL, NULL),
(8, 'Bahamas', 'Dollars', 'BSD', '$', NULL, NULL),
(9, 'Barbados', 'Dollars', 'BBD', '$', NULL, NULL),
(10, 'Belarus', 'Rubles', 'BYR', 'p.', NULL, NULL),
(11, 'Belgium', 'Euro', 'EUR', '€', NULL, NULL),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$', NULL, NULL),
(13, 'Bermuda', 'Dollars', 'BMD', '$', NULL, NULL),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b', NULL, NULL),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM', NULL, NULL),
(16, 'Botswana', 'Pula', 'BWP', 'P', NULL, NULL),
(17, 'Bulgaria', 'Leva', 'BGN', 'лв', NULL, NULL),
(18, 'Brazil', 'Reais', 'BRL', 'R$', NULL, NULL),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', '£', NULL, NULL),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$', NULL, NULL),
(21, 'Cambodia', 'Riels', 'KHR', '៛', NULL, NULL),
(22, 'Canada', 'Dollars', 'CAD', '$', NULL, NULL),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$', NULL, NULL),
(24, 'Chile', 'Pesos', 'CLP', '$', NULL, NULL),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥', NULL, NULL),
(26, 'Colombia', 'Pesos', 'COP', '$', NULL, NULL),
(27, 'Costa Rica', 'Colón', 'CRC', '₡', NULL, NULL),
(28, 'Croatia', 'Kuna', 'HRK', 'kn', NULL, NULL),
(29, 'Cuba', 'Pesos', 'CUP', '₱', NULL, NULL),
(30, 'Cyprus', 'Euro', 'EUR', '€', NULL, NULL),
(31, 'Czech Republic', 'Koruny', 'CZK', 'Kč', NULL, NULL),
(32, 'Denmark', 'Kroner', 'DKK', 'kr', NULL, NULL),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$', NULL, NULL),
(34, 'East Caribbean', 'Dollars', 'XCD', '$', NULL, NULL),
(35, 'Egypt', 'Pounds', 'EGP', '£', NULL, NULL),
(36, 'El Salvador', 'Colones', 'SVC', '$', NULL, NULL),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', '£', NULL, NULL),
(38, 'Euro', 'Euro', 'EUR', '€', NULL, NULL),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£', NULL, NULL),
(40, 'Fiji', 'Dollars', 'FJD', '$', NULL, NULL),
(41, 'France', 'Euro', 'EUR', '€', NULL, NULL),
(42, 'Ghana', 'Cedis', 'GHC', '¢', NULL, NULL),
(43, 'Gibraltar', 'Pounds', 'GIP', '£', NULL, NULL),
(44, 'Greece', 'Euro', 'EUR', '€', NULL, NULL),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q', NULL, NULL),
(46, 'Guernsey', 'Pounds', 'GGP', '£', NULL, NULL),
(47, 'Guyana', 'Dollars', 'GYD', '$', NULL, NULL),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', '€', NULL, NULL),
(49, 'Honduras', 'Lempiras', 'HNL', 'L', NULL, NULL),
(50, 'Hong Kong', 'Dollars', 'HKD', '$', NULL, NULL),
(51, 'Hungary', 'Forint', 'HUF', 'Ft', NULL, NULL),
(52, 'Iceland', 'Kronur', 'ISK', 'kr', NULL, NULL),
(53, 'India', 'Rupees', 'INR', 'Rp', NULL, NULL),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp', NULL, NULL),
(55, 'Iran', 'Rials', 'IRR', '﷼', NULL, NULL),
(56, 'Ireland', 'Euro', 'EUR', '€', NULL, NULL),
(57, 'Isle of Man', 'Pounds', 'IMP', '£', NULL, NULL),
(58, 'Israel', 'New Shekels', 'ILS', '₪', NULL, NULL),
(59, 'Italy', 'Euro', 'EUR', '€', NULL, NULL),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$', NULL, NULL),
(61, 'Japan', 'Yen', 'JPY', '¥', NULL, NULL),
(62, 'Jersey', 'Pounds', 'JEP', '£', NULL, NULL),
(63, 'Kazakhstan', 'Tenge', 'KZT', 'лв', NULL, NULL),
(64, 'Korea (North)', 'Won', 'KPW', '₩', NULL, NULL),
(65, 'Korea (South)', 'Won', 'KRW', '₩', NULL, NULL),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'лв', NULL, NULL),
(67, 'Laos', 'Kips', 'LAK', '₭', NULL, NULL),
(68, 'Latvia', 'Lati', 'LVL', 'Ls', NULL, NULL),
(69, 'Lebanon', 'Pounds', 'LBP', '£', NULL, NULL),
(70, 'Liberia', 'Dollars', 'LRD', '$', NULL, NULL),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF', NULL, NULL),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt', NULL, NULL),
(73, 'Luxembourg', 'Euro', 'EUR', '€', NULL, NULL),
(74, 'Macedonia', 'Denars', 'MKD', 'ден', NULL, NULL),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM', NULL, NULL),
(76, 'Malta', 'Euro', 'EUR', '€', NULL, NULL),
(77, 'Mauritius', 'Rupees', 'MUR', '₨', NULL, NULL),
(78, 'Mexico', 'Pesos', 'MXN', '$', NULL, NULL),
(79, 'Mongolia', 'Tugriks', 'MNT', '₮', NULL, NULL),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT', NULL, NULL),
(81, 'Namibia', 'Dollars', 'NAD', '$', NULL, NULL),
(82, 'Nepal', 'Rupees', 'NPR', '₨', NULL, NULL),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ', NULL, NULL),
(84, 'Netherlands', 'Euro', 'EUR', '€', NULL, NULL),
(85, 'New Zealand', 'Dollars', 'NZD', '$', NULL, NULL),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$', NULL, NULL),
(87, 'Nigeria', 'Nairas', 'NGN', '₦', NULL, NULL),
(88, 'North Korea', 'Won', 'KPW', '₩', NULL, NULL),
(89, 'Norway', 'Krone', 'NOK', 'kr', NULL, NULL),
(90, 'Oman', 'Rials', 'OMR', '﷼', NULL, NULL),
(91, 'Pakistan', 'Rupees', 'PKR', '₨', NULL, NULL),
(92, 'Panama', 'Balboa', 'PAB', 'B/.', NULL, NULL),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs', NULL, NULL),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.', NULL, NULL),
(95, 'Philippines', 'Pesos', 'PHP', 'Php', NULL, NULL),
(96, 'Poland', 'Zlotych', 'PLN', 'zł', NULL, NULL),
(97, 'Qatar', 'Rials', 'QAR', '﷼', NULL, NULL),
(98, 'Romania', 'New Lei', 'RON', 'lei', NULL, NULL),
(99, 'Russia', 'Rubles', 'RUB', 'руб', NULL, NULL),
(100, 'Saint Helena', 'Pounds', 'SHP', '£', NULL, NULL),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '﷼', NULL, NULL),
(102, 'Serbia', 'Dinars', 'RSD', 'Дин.', NULL, NULL),
(103, 'Seychelles', 'Rupees', 'SCR', '₨', NULL, NULL),
(104, 'Singapore', 'Dollars', 'SGD', '$', NULL, NULL),
(105, 'Slovenia', 'Euro', 'EUR', '€', NULL, NULL),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$', NULL, NULL),
(107, 'Somalia', 'Shillings', 'SOS', 'S', NULL, NULL),
(108, 'South Africa', 'Rand', 'ZAR', 'R', NULL, NULL),
(109, 'South Korea', 'Won', 'KRW', '₩', NULL, NULL),
(110, 'Spain', 'Euro', 'EUR', '€', NULL, NULL),
(111, 'Sri Lanka', 'Rupees', 'LKR', '₨', NULL, NULL),
(112, 'Sweden', 'Kronor', 'SEK', 'kr', NULL, NULL),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF', NULL, NULL),
(114, 'Suriname', 'Dollars', 'SRD', '$', NULL, NULL),
(115, 'Syria', 'Pounds', 'SYP', '£', NULL, NULL),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$', NULL, NULL),
(117, 'Thailand', 'Baht', 'THB', '฿', NULL, NULL),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$', NULL, NULL),
(119, 'Turkey', 'Lira', 'TRY', 'TL', NULL, NULL),
(120, 'Turkey', 'Liras', 'TRL', '£', NULL, NULL),
(121, 'Tuvalu', 'Dollars', 'TVD', '$', NULL, NULL),
(122, 'Ukraine', 'Hryvnia', 'UAH', '₴', NULL, NULL),
(123, 'United Kingdom', 'Pounds', 'GBP', '£', NULL, NULL),
(124, 'United States of America', 'Dollars', 'USD', '$', NULL, NULL),
(125, 'Uruguay', 'Pesos', 'UYU', '$U', NULL, NULL),
(126, 'Uzbekistan', 'Sums', 'UZS', 'лв', NULL, NULL),
(127, 'Vatican City', 'Euro', 'EUR', '€', NULL, NULL),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs', NULL, NULL),
(129, 'Vietnam', 'Dong', 'VND', '₫', NULL, NULL),
(130, 'Yemen', 'Rials', 'YER', '﷼', NULL, NULL),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$', NULL, NULL),
(132, 'India', 'Rupees', 'INR', '₹', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `mail_mailer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_encryption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_from_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_from_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(6, '43228898-3982-4028-ae13-533817957561', 'database', 'default', '{\"uuid\":\"43228898-3982-4028-ae13-533817957561\",\"displayName\":\"App\\\\Jobs\\\\WebhookHandler\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\WebhookHandler\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\WebhookHandler\\\":1:{s:11:\\\"webhookCall\\\";a:1:{i:0;a:3:{s:7:\\\"clickID\\\";s:8:\\\"63905131\\\";s:4:\\\"cost\\\";s:2:\\\"25\\\";s:6:\\\"status\\\";s:8:\\\"Approved\\\";}}}\"}}', 'ErrorException: Trying to access array offset on value of type null in C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php:44\nStack trace:\n#0 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(255): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#1 C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php(44): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#2 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\WebhookHandler->handle()\n#3 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#9 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#10 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\WebhookHandler), false)\n#12 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#13 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#14 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\WebhookHandler))\n#16 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\cpa\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2024-06-21 18:49:33'),
(7, '2cd11ca8-132d-4a04-8a63-ecad6f9ddbc9', 'database', 'default', '{\"uuid\":\"2cd11ca8-132d-4a04-8a63-ecad6f9ddbc9\",\"displayName\":\"App\\\\Jobs\\\\WebhookHandler\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\WebhookHandler\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\WebhookHandler\\\":1:{s:36:\\\"\\u0000App\\\\Jobs\\\\WebhookHandler\\u0000webhookCall\\\";a:1:{i:0;a:3:{s:7:\\\"clickID\\\";s:8:\\\"63905131\\\";s:4:\\\"cost\\\";s:2:\\\"25\\\";s:6:\\\"status\\\";s:8:\\\"Approved\\\";}}}\"}}', 'ErrorException: Trying to access array offset on value of type null in C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php:44\nStack trace:\n#0 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(255): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#1 C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php(44): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#2 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\WebhookHandler->handle()\n#3 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#9 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#10 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\WebhookHandler), false)\n#12 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#13 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#14 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\WebhookHandler))\n#16 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\cpa\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2024-06-21 18:49:34'),
(8, 'fd7babf1-769a-41c2-a78b-1db786227be8', 'database', 'default', '{\"uuid\":\"fd7babf1-769a-41c2-a78b-1db786227be8\",\"displayName\":\"App\\\\Jobs\\\\WebhookHandler\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\WebhookHandler\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\WebhookHandler\\\":1:{s:11:\\\"webhookCall\\\";a:1:{i:0;a:3:{s:7:\\\"clickID\\\";s:8:\\\"63905131\\\";s:4:\\\"cost\\\";s:2:\\\"25\\\";s:6:\\\"status\\\";s:8:\\\"Approved\\\";}}}\"}}', 'ErrorException: Trying to access array offset on value of type null in C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php:44\nStack trace:\n#0 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(255): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#1 C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php(44): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#2 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\WebhookHandler->handle()\n#3 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#9 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#10 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\WebhookHandler), false)\n#12 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#13 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#14 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\WebhookHandler))\n#16 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\cpa\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2024-06-21 18:49:34'),
(9, 'fa986437-3189-40d2-9b3c-d86a6adbe806', 'database', 'default', '{\"uuid\":\"fa986437-3189-40d2-9b3c-d86a6adbe806\",\"displayName\":\"App\\\\Jobs\\\\WebhookHandler\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\WebhookHandler\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\WebhookHandler\\\":1:{s:11:\\\"webhookCall\\\";a:1:{i:0;a:3:{s:7:\\\"clickID\\\";s:8:\\\"63905131\\\";s:4:\\\"cost\\\";s:2:\\\"25\\\";s:6:\\\"status\\\";s:8:\\\"Approved\\\";}}}\"}}', 'ErrorException: Trying to access array offset on value of type null in C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php:44\nStack trace:\n#0 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(255): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#1 C:\\laragon\\www\\cpa\\app\\Jobs\\WebhookHandler.php(44): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Trying to acces...\', \'C:\\\\laragon\\\\www\\\\...\', 44)\n#2 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\WebhookHandler->handle()\n#3 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#9 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#10 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\WebhookHandler), false)\n#12 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#13 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\WebhookHandler))\n#14 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\WebhookHandler))\n#16 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\cpa\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2024-06-21 18:49:34'),
(10, '6a3c06f2-7db8-4810-a27c-3fb7243c1441', 'database', 'default', '{\"uuid\":\"6a3c06f2-7db8-4810-a27c-3fb7243c1441\",\"displayName\":\"App\\\\Mail\\\\WelcomeEmailAgency\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\WelcomeEmailAgency\\\":2:{s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:20:\\\"sohik@mailinator.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 'InvalidArgumentException: View [view.name] not found. in C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php:137\nStack trace:\n#0 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(79): Illuminate\\View\\FileViewFinder->findInPaths(\'view.name\', Array)\n#1 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php(138): Illuminate\\View\\FileViewFinder->find(\'view.name\')\n#2 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(433): Illuminate\\View\\Factory->make(\'view.name\', Array)\n#3 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(408): Illuminate\\Mail\\Mailer->renderView(\'view.name\', Array)\n#4 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(320): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'view.name\', NULL, NULL, Array)\n#5 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(213): Illuminate\\Mail\\Mailer->send(\'view.name\', Array, Object(Closure))\n#6 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(214): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(83): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#9 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#10 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#15 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#19 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#21 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#35 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\laragon\\www\\cpa\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}', '2024-06-30 12:50:42');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(11, '081aa513-fed4-4a29-b4c7-fced25853595', 'database', 'default', '{\"uuid\":\"081aa513-fed4-4a29-b4c7-fced25853595\",\"displayName\":\"App\\\\Mail\\\\WelcomeEmailAgency\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\WelcomeEmailAgency\\\":2:{s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:26:\\\"dealsintel.hello@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 'InvalidArgumentException: View [view.name] not found. in C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php:137\nStack trace:\n#0 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(79): Illuminate\\View\\FileViewFinder->findInPaths(\'view.name\', Array)\n#1 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php(138): Illuminate\\View\\FileViewFinder->find(\'view.name\')\n#2 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(433): Illuminate\\View\\Factory->make(\'view.name\', Array)\n#3 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(408): Illuminate\\Mail\\Mailer->renderView(\'view.name\', Array)\n#4 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(320): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'view.name\', NULL, NULL, Array)\n#5 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(213): Illuminate\\Mail\\Mailer->send(\'view.name\', Array, Object(Closure))\n#6 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(214): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(83): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#9 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#10 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#15 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#19 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#21 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#35 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\laragon\\www\\cpa\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 C:\\laragon\\www\\cpa\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\laragon\\www\\cpa\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}', '2024-06-30 12:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `geos`
--

CREATE TABLE `geos` (
  `id` bigint UNSIGNED NOT NULL,
  `offer_id` int NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geos`
--

INSERT INTO `geos` (`id`, `offer_id`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 1, '162', '2024-04-09 08:05:24', '2024-04-09 08:05:24'),
(2, 1, '201', '2024-04-09 08:05:24', '2024-04-09 08:05:24'),
(3, 1, '232', '2024-04-09 08:05:24', '2024-04-09 08:05:24'),
(4, 2, '107', '2024-04-09 16:20:02', '2024-04-09 16:20:02'),
(5, 2, '153', '2024-04-09 16:20:02', '2024-04-09 16:20:02'),
(6, 2, '201', '2024-04-09 16:20:02', '2024-04-09 16:20:02'),
(7, 3, '232', '2024-04-09 19:08:34', '2024-04-09 19:08:34'),
(8, 3, '233', '2024-04-09 19:08:34', '2024-04-09 19:08:34'),
(9, 3, '237', '2024-04-09 19:08:34', '2024-04-09 19:08:34'),
(10, 4, '1', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(11, 4, '3', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(12, 4, '5', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(13, 4, '15', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(14, 4, '18', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(15, 4, '25', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(16, 4, '26', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(17, 4, '31', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(18, 4, '32', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(19, 4, '34', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(20, 4, '37', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(21, 4, '40', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(22, 4, '42', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(23, 4, '43', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(24, 4, '44', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(25, 4, '46', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(26, 4, '48', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(27, 4, '50', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(28, 4, '51', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(29, 4, '53', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(30, 4, '55', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(31, 4, '56', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(32, 4, '57', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(33, 4, '62', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(34, 4, '63', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(35, 4, '64', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(36, 4, '67', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(37, 4, '70', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(38, 4, '75', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(39, 4, '76', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(40, 4, '77', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(41, 4, '79', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(42, 4, '80', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(43, 4, '82', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(44, 4, '83', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(45, 4, '87', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(46, 4, '88', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(47, 4, '94', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(48, 4, '96', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(49, 4, '98', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(50, 4, '99', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(51, 4, '102', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(52, 4, '103', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(53, 4, '104', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(54, 4, '105', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(55, 4, '106', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(56, 4, '107', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(57, 4, '114', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(58, 4, '116', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(59, 4, '118', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(60, 4, '121', '2024-08-27 19:19:41', '2024-08-27 19:19:41'),
(61, 4, '124', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(62, 4, '128', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(63, 4, '129', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(64, 4, '131', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(65, 4, '137', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(66, 4, '139', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(67, 4, '140', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(68, 4, '142', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(69, 4, '144', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(70, 4, '145', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(71, 4, '147', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(72, 4, '148', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(73, 4, '151', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(74, 4, '154', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(75, 4, '155', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(76, 4, '157', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(77, 4, '161', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(78, 4, '165', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(79, 4, '168', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(80, 4, '169', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(81, 4, '170', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(82, 4, '172', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(83, 4, '174', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(84, 4, '175', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(85, 4, '178', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(86, 4, '180', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(87, 4, '181', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(88, 4, '182', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(89, 4, '183', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(90, 4, '187', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(91, 4, '190', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(92, 4, '194', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(93, 4, '196', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(94, 4, '197', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(95, 4, '205', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(96, 4, '206', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(97, 4, '211', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(98, 4, '220', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(99, 4, '226', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(100, 4, '227', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(101, 4, '228', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(102, 4, '231', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(103, 4, '234', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(104, 4, '235', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(105, 4, '237', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(106, 4, '239', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(107, 4, '240', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(108, 4, '241', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(109, 4, '242', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(110, 4, '243', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(111, 4, '244', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(112, 4, '245', '2024-08-27 19:19:42', '2024-08-27 19:19:42'),
(113, 5, '1', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(114, 5, '2', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(115, 5, '6', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(116, 5, '9', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(117, 5, '10', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(118, 5, '12', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(119, 5, '13', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(120, 5, '19', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(121, 5, '22', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(122, 5, '25', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(123, 5, '28', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(124, 5, '29', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(125, 5, '31', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(126, 5, '32', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(127, 5, '35', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(128, 5, '41', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(129, 5, '42', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(130, 5, '106', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(131, 5, '107', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(132, 5, '110', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(133, 5, '113', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(134, 5, '115', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(135, 5, '122', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(136, 5, '125', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(137, 5, '126', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(138, 5, '130', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(139, 5, '135', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(140, 5, '137', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(141, 5, '141', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(142, 5, '145', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(143, 5, '146', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(144, 5, '148', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(145, 5, '154', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(146, 5, '161', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(147, 5, '165', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(148, 5, '167', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(149, 5, '168', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(150, 5, '171', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(151, 5, '173', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(152, 5, '174', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(153, 5, '177', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(154, 5, '178', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(155, 5, '183', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(156, 5, '185', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(157, 5, '187', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(158, 5, '192', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(159, 5, '193', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(160, 5, '197', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(161, 5, '199', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(162, 5, '204', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(163, 5, '205', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(164, 5, '212', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(165, 5, '213', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(166, 5, '216', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(167, 5, '222', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(168, 5, '223', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(169, 5, '224', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(170, 5, '226', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(171, 5, '230', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(172, 5, '234', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(173, 5, '235', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(174, 5, '241', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(175, 5, '242', '2024-08-27 19:24:45', '2024-08-27 19:24:45'),
(176, 5, '245', '2024-08-27 19:24:45', '2024-08-27 19:24:45');

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

-- --------------------------------------------------------

--
-- Table structure for table `kycs`
--

CREATE TABLE `kycs` (
  `id` bigint UNSIGNED NOT NULL,
  `tenant_id` int NOT NULL,
  `business_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Wait','Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `current_plan` int NOT NULL,
  `country` int DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchartaffiliates`
--

CREATE TABLE `merchartaffiliates` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchartconfigurations`
--

CREATE TABLE `merchartconfigurations` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchartemails`
--

CREATE TABLE `merchartemails` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchartpayouts`
--

CREATE TABLE `merchartpayouts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_user`
--

CREATE TABLE `message_user` (
  `id` bigint UNSIGNED NOT NULL,
  `message_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_22_193255_create_sessions_table', 1),
(7, '2024_03_23_065418_create_permission_tables', 2),
(8, '2018_11_06_222923_create_transactions_table', 3),
(9, '2018_11_07_192923_create_transfers_table', 3),
(10, '2018_11_15_124230_create_wallets_table', 3),
(11, '2021_11_02_202021_update_wallets_uuid_table', 3),
(12, '2024_03_27_142928_create_agencydetails_table', 3),
(13, '2024_03_27_145932_create_categories_table', 3),
(14, '2024_03_27_150411_create_payouts_table', 3),
(15, '2024_03_27_190313_create_affiliatedetails_table', 3),
(16, '2024_03_27_193148_create_trafficsources_table', 3),
(17, '2024_03_27_194804_create_offers_table', 3),
(18, '2024_03_27_202916_create_targets_table', 3),
(19, '2024_03_27_203535_create_geos_table', 3),
(20, '2024_03_27_203631_create_countries_table', 3),
(21, '2024_03_28_091714_create_clicks_table', 3),
(22, '2024_03_29_115341_add_payout_to_offers_table', 3),
(23, '2024_04_03_194922_add_ip_to_clicks_table', 3),
(24, '2024_04_05_174552_add_url_to_targets_table', 3),
(25, '2024_04_05_175135_add_refferal_ur_to_clicks_table', 3),
(26, '2024_04_23_213933_create_webhook_calls_table', 4),
(27, '2024_04_25_201848_create_jobs_table', 4),
(28, '2024_04_27_000948_add_expiry_to_offers_table', 5),
(29, '2024_04_27_001024_add_earned_to_clicks_table', 5),
(30, '2024_05_12_095205_create_blogs_table', 6),
(31, '2024_05_12_095446_create_blogcategories_table', 6),
(35, '2024_05_21_161929_create_requestpayments_table', 7),
(36, '2024_05_22_194613_add_smartlink_to_clicks_table', 8),
(37, '2024_05_26_201943_add_conversion_clicks_to_users_table', 9),
(38, '2024_05_27_194732_add_number_to_requestpayments_table', 10),
(39, '2024_05_29_203441_create_notifications_table', 10),
(40, '2024_05_30_185728_add_refid_to_affiliatedetails_table', 10),
(41, '2024_06_05_162758_create_settings_table', 11),
(42, '2024_06_09_100834_alter_table_clicks_change_earned', 11),
(43, '2024_06_09_114057_add_start_to_offers_table', 12),
(44, '2024_08_28_111313_create_merchartaffiliates_table', 13),
(45, '2024_08_28_113740_create_merchartpayouts_table', 13),
(46, '2024_08_28_120044_create_merchartconfigurations_table', 13),
(47, '2024_08_28_121008_create_merchartemails_table', 13),
(48, '2024_10_05_181434_add_paypal_email_to_agencydetails_table', 13),
(49, '2024_10_05_182634_add_paypal_cred_to_agencydetails_table', 14),
(51, '2024_10_27_051813_create_email_settings_table', 15),
(52, '2024_10_27_145832_create_messages_table', 16),
(53, '2024_10_27_145848_create_message_user_table', 16),
(54, '2024_11_05_114423_create_configurations_table', 17),
(55, '2024_11_06_134234_create_currencies_table', 17),
(56, '2024_11_06_135254_add_other_setting_to_settings_table', 17),
(57, '2019_09_15_000010_create_tenants_table', 18),
(58, '2019_09_15_000020_create_domains_table', 18),
(59, '2024_11_20_133302_create_plans_table', 18),
(60, '2024_11_21_112740_add_domain_to_tenants_table', 19),
(64, '2024_11_24_120530_create_subscriptions_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 20);

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

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Wait','Active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `offerid` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `actionurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payout_id` int NOT NULL,
  `secretkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `user_id`, `image`, `status`, `offerid`, `name`, `category_id`, `actionurl`, `desc`, `created_at`, `updated_at`, `payout_id`, `secretkey`, `expiry`, `start`) VALUES
(1, 5, 'blingtop-blank-125-es1712653524.jpg', 'Active', 794141, 'BLINGTOP - BLANK 125 ES -', 9, 'https://www.theleadwolves.com/', 'At The Lead Wolves, our goal is to help you exceed your performance-based marketing goals by providing high quality leads and sales through our network of trusted and hand-picked traffic partners. We are experienced across all major verticals including Sweepstakes, Mobile Installs, Nutra, E-Commerce, Finance, Insurance and Surveys to name a few.', '2024-04-09 08:05:24', '2024-04-09 08:05:24', 1, NULL, NULL, '0000-00-00'),
(2, 5, 'total-brain-boost1712683202.jpg', 'Active', 254429, 'Total Brain Boost', 6, 'https://spatie.be', 'TUNE makes the industry’s most flexible SaaS platform for managing marketing partnerships across mobile and web. On one platform, you can maximize ROI from onboarding through payout with your most important partners — affiliates, networks, influencers, agencies, and any other business development relationships.', '2024-04-09 16:20:02', '2024-04-09 16:20:02', 3, NULL, NULL, '0000-00-00'),
(3, 5, 'n1-casino-cpa-ftd-7-countries1712693314.jpg', 'Active', 683168, 'N1 Casino CPA ftd 7 countries', 10, 'https://spatie.be', 'Although v7 of the ConsoleTV/Charts library was recently deprecated, v6 is still active and functioning. This library helps developers integrate Chart.js into Laravel applications without having to write any JavaScript code. With this library, developers can create charts via an API.', '2024-04-09 19:08:34', '2024-04-09 19:08:34', 2, '1234567890', NULL, '0000-00-00'),
(4, 18, 'brenden-clayton1724789981.jpg', 'Active', 553152, 'Brenden Clayton', 4, 'https://www.wexesufopokuhev.me', 'In ex molestiae porr', '2024-08-27 19:19:41', '2024-08-27 19:19:41', 1, NULL, NULL, '0000-00-00'),
(5, 18, 'christian-mayo1724790285.jpg', 'Active', 421673, 'Christian Mayo', 4, 'https://www.zibicurul.ca', 'Voluptates quasi acc', '2024-08-27 19:24:45', '2024-08-27 19:24:45', 1, NULL, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('jaboclawrence@gmail.com', '$2y$12$Hyh9rGT9nmeGtph/T3Goo.c3UqfBY.pqMXWG/Uk1JXWUwXIKAf/0G', '2024-05-11 10:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'PPS', 'pay-per-sale', NULL, NULL),
(2, 'PPL', 'pay-per-lead', NULL, NULL),
(3, 'PPI', 'pay-per-install', NULL, NULL),
(4, 'RevShare', 'rev-share', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_days` int NOT NULL,
  `duration` int NOT NULL,
  `cost` double(8,2) NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT 'USD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `free_days`, `duration`, `cost`, `about`, `created_at`, `updated_at`, `currency`) VALUES
(1, 'pro', 7, 30, 59.99, 'this is the plan that will helpp you run a single offer', NULL, NULL, 'USD'),
(2, 'leader', 7, 30, 99.99, 'This plan is ideal for ecommerce stores and multi offers', NULL, NULL, 'USD'),
(3, 'Network', 7, 30, 359.99, 'This plan will help you run a network', NULL, NULL, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `requestpayments`
--

CREATE TABLE `requestpayments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Request','Paid','On-hold') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-03-23 07:12:36', '2024-03-23 07:12:36'),
(2, 'affiliate', 'web', '2024-03-23 07:12:36', '2024-03-23 07:12:36'),
(3, 'merchant', 'web', '2024-03-23 07:13:27', '2024-03-23 07:13:27'),
(4, 'tenant', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
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
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kJ2BEBM1wpcW7zmrm8sffKO5ALRaU1NIL4khgT6C', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNUh1blhjYmREME1ETGNWZFZlZnBvV1k0RktoRkpMWTRONE1UcWV6aiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vY3BhLnRlc3QvYWRtaW4vdGVuYW50cy9hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJHNlQVBRcTR4QXdhUURhNGZlYzB4MGVJSEl6YnFnQzBLeUYyMFY0UkpiR1JibVR5SVBwbENlIjt9', 1732530936),
('N9DvJLJI5Ho8cWZ76AVrMjYizne03Bh1BJWNjdi3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWIyYUtJSG5BTzVoVFRQaTJudGZHMlloUWZoOGdVampCM2s4WDJZUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9jcGEudGVzdC9jb25ncmF0dWxhdGlvbnMvY3JlYXRlZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732479540);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `commission` double(8,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` bigint UNSIGNED NOT NULL,
  `offer_id` int NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `offer_id`, `target`, `payout`, `created_at`, `updated_at`, `url`) VALUES
(1, 1, 'Windows', '34', NULL, NULL, 'https://google.com'),
(2, 1, 'iOS', '34', NULL, NULL, 'https://www.tune.com'),
(3, 1, 'Android', '34', NULL, NULL, 'https://www.theleadwolves.com'),
(4, 2, 'Windows', '34', NULL, NULL, 'https://www.theleadwolves.com/'),
(5, 2, 'iOS', '55', NULL, NULL, 'https://google.com'),
(6, 2, 'Android', '44', NULL, NULL, 'https://www.tune.com'),
(7, 3, 'Windows', '2', NULL, NULL, 'https://www.linkedin.com/feed/'),
(8, 3, 'iOS', '2', NULL, NULL, 'https://www.theleadwolves.com/'),
(9, 3, 'Android', '3', NULL, NULL, 'https://www.theleadwolves.com/'),
(10, 4, 'Windows', '3', NULL, NULL, 'https://www.vixuhefoso.org.au'),
(11, 4, 'iOS', '3', NULL, NULL, 'https://www.xax.ws'),
(12, 4, 'Android', '3', NULL, NULL, 'https://www.xax.ws'),
(13, 5, 'Windows', '7', NULL, NULL, 'https://www.telalej.in'),
(14, 5, 'iOS', '7', NULL, NULL, 'https://www.qebimyfovi.us'),
(15, 5, 'Android', '7', NULL, NULL, 'https://www.qebimyfovi.us');

-- --------------------------------------------------------

--
-- Table structure for table `trafficsources`
--

CREATE TABLE `trafficsources` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `source` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `followers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthlyvisit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Wait','Active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trafficsources`
--

INSERT INTO `trafficsources` (`id`, `user_id`, `source`, `address`, `rank`, `followers`, `monthlyvisit`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 'tiktok', 'https://tiktok.com/forlo', 'nil', '445444', '34', 'fdagba', 'Active', '2024-05-16 18:10:42', '2024-05-16 18:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `payable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint UNSIGNED NOT NULL,
  `wallet_id` bigint UNSIGNED NOT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` json DEFAULT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payable_type`, `payable_id`, `wallet_id`, `type`, `amount`, `confirmed`, `meta`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 3, 'deposit', '330000', 1, NULL, '821300c3-ee6c-43cf-8807-d456424249f4', '2024-05-19 12:51:29', '2024-05-19 12:51:29'),
(2, 'App\\Models\\User', 5, 2, 'deposit', '5000', 1, NULL, 'cf719173-6665-4e54-a2c9-8a7806e0b81a', '2024-05-19 12:58:17', '2024-05-19 12:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint UNSIGNED NOT NULL,
  `from_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint UNSIGNED NOT NULL,
  `to_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` bigint UNSIGNED NOT NULL,
  `withdraw_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT '0',
  `fee` decimal(64,0) NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Ohis Lawrence', 'lawrenceohis@gmail.com', NULL, '$2y$12$seAPQq4xAwaQDa4fec0x0eIHIzbqgC0KyF20V4RJbGRbmTyIPplCe', NULL, NULL, NULL, NULL, NULL, 'profile-photos/cWbXBPe92wWXbDhVV4kD913uKTsCeAxI0ygDBKvI.jpg', '2024-03-22 18:41:13', '2024-03-23 15:46:42'),
(2, 'Lawrence Ohis', 'lawrenceohis4@gmail.com', NULL, 'victor@358', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:26:51', '2024-03-24 02:26:51'),
(3, 'John Dou', 'johndou@gmail.com', NULL, 'victor358', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:29:21', '2024-03-24 02:29:21'),
(4, 'Emma Waton', 'emmawaton@gmail.com', NULL, 'victor358', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:33:12', '2024-03-24 02:33:12'),
(5, 'Jayden Ohis', 'jayden@gmail.com', NULL, '$2y$12$seAPQq4xAwaQDa4fec0x0eIHIzbqgC0KyF20V4RJbGRbmTyIPplCe', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 05:29:19', '2024-03-24 05:29:19'),
(6, 'Jaboc Lawrence', 'jaboclawrence@gmail.com', NULL, '$2y$12$YCtRFYW4djomNXA1/1KNgeqJ.G0MzGpUw3KLvQQ.e57t4ZUvqOUYi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 16:23:52', '2024-04-09 16:23:52'),
(7, 'Liam Joel', 'liamjoal@gmail.com', NULL, '$2y$12$8menY7XRlp6oS3dKdeIO3uIdSjttBV7bsoMlJGifncQk5CpmIw4we', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-11 18:04:28', '2024-04-11 18:04:28'),
(8, 'Ohis Lawrence', 'lawrenceohisqq@gmail.com', NULL, '$2y$12$8PzOnwld/MYBUKaTOF5tQujOLQyZMp0KbqvFh1n3DyBi5OewN3q3a', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 17:51:22', '2024-05-11 17:51:22'),
(9, 'Jayden Jay', 'lawrenceohis232@gmail.com', NULL, '$2y$12$veEPxhkk2sF.4061eilRW.PKBNKdCwE.vUEsM95MjOVcbTKybZuTq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 18:02:05', '2024-05-11 18:02:05'),
(11, 'Agnes Liam', 'lawrenceagnes@gmail.com', NULL, '$2y$12$UkltB.KBCoSPoeUGLq9.WeAj8DEOzOVMmOazO8HQ24uL83hmG/p8i', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 18:08:23', '2024-05-11 18:08:23'),
(12, 'john jon', 'johnjonr@gmail.com', NULL, '$2y$12$7TiQNwm0CALtmi/RsAkcZuV10rLHkb/K2Ol4DXWqptrNCtU6Pfpnm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 18:10:43', '2024-05-11 18:10:43'),
(13, 'Ohis Lawrence', 'lawrenceohis22@gmail.com', NULL, '$2y$12$S0DHKkCJx1uLVwk3Vdt7b.v6VKZAtTCMhVMSKo7.wyicgubpFzIFi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 18:13:22', '2024-05-11 18:13:22'),
(14, 'Ohis Lawrence', 'lawrenceoeis232@gmail.com', NULL, '$2y$12$MZi3fe.wbjQo1jeTidLPhO5ai9pIczgN/9NrSylS6WO982L/i9WdG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 18:32:47', '2024-05-11 18:32:47'),
(15, 'code gummy', 'codegummyhq@gmail.com', NULL, '$2y$12$54i4tM9J1WI1p79uGNAMSe7v5XkEUf8Gh.KDggGsegq/y7sMlq5mu', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-21 18:37:12', '2024-06-21 18:37:12'),
(16, 'Eden Kramer', 'haxacirepo@mailinator.com', NULL, '$2y$12$0j7ahl6z.hTZAmskrqI2BOgRIzHHs6vYMorkuUnljxPh/rDk348eW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-30 11:16:11', '2024-06-30 11:16:11'),
(17, 'Meredith Weaver', 'sohik@mailinator.com', NULL, '$2y$12$OPCg0.xR6bp4rpQuYgO2Iu5tTS6pQiuYp.XPDfY4EcLA4S13kAAQq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-30 12:48:04', '2024-06-30 12:48:04'),
(18, 'Lucas Mcmillan', 'dealsintel.hello@gmail.com', NULL, '$2y$12$rY2sduOaO8KtHdfRsxB6aOSjovtfi1J4w34LllVdOV5QnICg9nySC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-30 12:48:52', '2024-06-30 12:48:52'),
(19, 'Test Tenant', 'tenant@testtenant.com', NULL, '$2y$12$HYPNfSaMpPF7UNJAves0GuHa9ypLY.Zq5K0FvD8s2M3o.4iOqfe/a', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-05 16:49:54', '2024-10-05 16:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `holder_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` json DEFAULT NULL,
  `balance` decimal(64,0) NOT NULL DEFAULT '0',
  `decimal_places` smallint UNSIGNED NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `holder_type`, `holder_id`, `name`, `slug`, `uuid`, `description`, `meta`, `balance`, `decimal_places`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 6, 'Default Wallet', 'default', '585a23d7-71c1-43ff-b622-ba5fee204686', NULL, '[]', '0', 2, '2024-05-18 13:52:28', '2024-05-18 13:52:28'),
(2, 'App\\Models\\User', 5, 'Default Wallet', 'default', 'bc255e07-ea4b-4d5d-b941-ce4ad2f61423', NULL, '[]', '5000', 2, '2024-05-19 12:14:57', '2024-05-19 12:58:17'),
(3, 'App\\Models\\User', 1, 'Default Wallet', 'default', '3223051d-17d7-43e8-8779-a0ff05e1e85c', NULL, '[]', '330000', 2, '2024-05-19 12:51:28', '2024-05-19 12:51:29'),
(4, 'App\\Models\\User', 14, 'Default Wallet', 'default', '2e758f0e-fc22-4961-9122-7457d66e2ec8', NULL, '[]', '0', 2, '2024-05-22 19:02:57', '2024-05-22 19:02:57'),
(5, 'App\\Models\\User', 15, 'Default Wallet', 'default', '997cbba0-deaf-4d45-9236-51a99cbc00e0', NULL, '[]', '0', 2, '2024-06-21 19:12:47', '2024-06-21 19:12:47'),
(6, 'App\\Models\\User', 16, 'Default Wallet', 'default', '35195c49-de49-48ad-abb3-f4eb26fe5b7a', NULL, '[]', '0', 2, '2024-06-30 11:17:07', '2024-06-30 11:17:07'),
(7, 'App\\Models\\User', 18, 'Default Wallet', 'default', '31700737-f90c-4def-9f20-c763941adde5', NULL, '[]', '0', 2, '2024-08-10 11:43:02', '2024-08-10 11:43:02'),
(8, 'App\\Models\\User', 13, 'Default Wallet', 'default', 'dc54e19d-d1a9-4f69-b20a-5164eb00538f', NULL, '[]', '0', 2, '2024-08-24 10:42:47', '2024-08-24 10:42:47'),
(9, 'App\\Models\\User', 19, 'Default Wallet', 'default', '3c0942dc-e7d5-494c-aa5c-c9a9cc0efde8', NULL, '[]', '0', 2, '2024-10-05 16:51:08', '2024-10-05 16:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `webhook_calls`
--

CREATE TABLE `webhook_calls` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` json DEFAULT NULL,
  `payload` json DEFAULT NULL,
  `exception` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliatedetails`
--
ALTER TABLE `affiliatedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencydetails`
--
ALTER TABLE `agencydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configurations_key_unique` (`key`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `geos`
--
ALTER TABLE `geos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kycs`
--
ALTER TABLE `kycs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchartaffiliates`
--
ALTER TABLE `merchartaffiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchartconfigurations`
--
ALTER TABLE `merchartconfigurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchartemails`
--
ALTER TABLE `merchartemails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchartpayouts`
--
ALTER TABLE `merchartpayouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_user`
--
ALTER TABLE `message_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_user_message_id_foreign` (`message_id`),
  ADD KEY `message_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

--
-- Indexes for table `requestpayments`
--
ALTER TABLE `requestpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trafficsources`
--
ALTER TABLE `trafficsources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_payable_id_ind` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  ADD KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  ADD KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  ADD KEY `transactions_type_index` (`type`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  ADD KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  ADD KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  ADD KEY `transfers_deposit_id_foreign` (`deposit_id`),
  ADD KEY `transfers_withdraw_id_foreign` (`withdraw_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  ADD UNIQUE KEY `wallets_uuid_unique` (`uuid`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- Indexes for table `webhook_calls`
--
ALTER TABLE `webhook_calls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliatedetails`
--
ALTER TABLE `affiliatedetails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `agencydetails`
--
ALTER TABLE `agencydetails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `geos`
--
ALTER TABLE `geos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `kycs`
--
ALTER TABLE `kycs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchartaffiliates`
--
ALTER TABLE `merchartaffiliates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchartconfigurations`
--
ALTER TABLE `merchartconfigurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchartemails`
--
ALTER TABLE `merchartemails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchartpayouts`
--
ALTER TABLE `merchartpayouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_user`
--
ALTER TABLE `message_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requestpayments`
--
ALTER TABLE `requestpayments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trafficsources`
--
ALTER TABLE `trafficsources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `webhook_calls`
--
ALTER TABLE `webhook_calls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message_user`
--
ALTER TABLE `message_user`
  ADD CONSTRAINT `message_user_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
