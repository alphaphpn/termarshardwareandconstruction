-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 08:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u282954699_termarshacdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `conf`
--

CREATE TABLE `conf` (
  `id` int(11) NOT NULL,
  `cmpny_name` varchar(254) NOT NULL,
  `sys_name` varchar(254) NOT NULL,
  `sys_ver` varchar(254) NOT NULL,
  `sys_logo` varchar(254) NOT NULL,
  `navbar_logo` varchar(254) NOT NULL,
  `favicon` varchar(254) NOT NULL,
  `quote_title` varchar(254) NOT NULL,
  `ceo_pres` varchar(254) NOT NULL,
  `memail` varchar(254) NOT NULL,
  `facebook` text NOT NULL,
  `telno` varchar(254) NOT NULL,
  `mobileno` varchar(254) NOT NULL,
  `maddress` text NOT NULL,
  `idletime` int(11) NOT NULL,
  `themename` varchar(254) NOT NULL,
  `domainhome` varchar(254) NOT NULL,
  `fontglobal` varchar(254) NOT NULL,
  `datetoday` varchar(8) NOT NULL,
  `created` datetime NOT NULL,
  `primary_color` varchar(254) NOT NULL,
  `second_color` varchar(254) NOT NULL,
  `third_color` varchar(254) NOT NULL,
  `forth_color` varchar(254) NOT NULL,
  `fifth_color` varchar(254) NOT NULL,
  `sixth_color` varchar(254) NOT NULL,
  `seventh_color` varchar(254) NOT NULL,
  `eight_color` varchar(254) NOT NULL,
  `ninght_color` varchar(254) NOT NULL,
  `tenth_color` varchar(254) NOT NULL,
  `menu_gradient_color` varchar(254) NOT NULL,
  `geo_map` text NOT NULL,
  `build_by` varchar(254) NOT NULL,
  `cwebzite` varchar(254) NOT NULL,
  `dcurrencyx` varchar(15) NOT NULL,
  `nav_bar_orrient` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `button_size` text NOT NULL,
  `content_width` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conf`
--

INSERT INTO `conf` (`id`, `cmpny_name`, `sys_name`, `sys_ver`, `sys_logo`, `navbar_logo`, `favicon`, `quote_title`, `ceo_pres`, `memail`, `facebook`, `telno`, `mobileno`, `maddress`, `idletime`, `themename`, `domainhome`, `fontglobal`, `datetoday`, `created`, `primary_color`, `second_color`, `third_color`, `forth_color`, `fifth_color`, `sixth_color`, `seventh_color`, `eight_color`, `ninght_color`, `tenth_color`, `menu_gradient_color`, `geo_map`, `build_by`, `cwebzite`, `dcurrencyx`, `nav_bar_orrient`, `modified`, `button_size`, `content_width`) VALUES
(1, 'Termar\'s Hardware and Constraction', 'Termar\'s Hardware and Constraction', '1.0.0', 'logo.png', 'logo-white.png', 'logo.png', 'Online hardware can help them improve the concerns of the customers.', 'Engr. Allan Poserio', 'termars_rubina@yahoo.com', 'facebook.com/termarshardware', '(062) 957-2826', '0917-115-5270', 'Purok Citrus, Poblacion Ipil, Zamboanga Sibugay, PH 07001', 20, 'termarshardwareandconstruction', '/termarshardwareandconstruction/', '', '20220403', '2021-11-03 21:09:34', '#f79646', 'rgba(247,150,70,0.1)', '#b56422', 'rgba(247,150,70,0.95)', 'rgba(241,179,0,0.1)', 'rgba(241,179,0,0.1)', 'rgba(241,179,0,0.1)', 'rgba(241,179,0,0.1)', 'rgba(241,179,0,0.1)', 'rgba(241,179,0,0.1)', 'linear-gradient(rgb(238, 103, 45), rgb(248, 174, 51), rgb(238, 103, 45))', '7.7829683,122.5886357', 'Divina Tadeo Ochovillo, Beverly Pestaño Apatan, Rovilyn Fernandez Maico, Crisjen Remegio Dequin', 'termarshardwareandconstruction.com', '&#8369;', 'fixed-top', '2022-10-09 00:27:01', '', 'container');

-- --------------------------------------------------------

--
-- Table structure for table `tblcrud`
--

CREATE TABLE `tblcrud` (
  `id` int(11) NOT NULL,
  `fieldtxt` varchar(254) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedx` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblitem`
--

CREATE TABLE `tblitem` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(254) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(254) NOT NULL,
  `category` varchar(254) NOT NULL,
  `unit` varchar(254) NOT NULL,
  `sell_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `supplier_price` double NOT NULL,
  `stock_available` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `extnem` varchar(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedx` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblitem`
--

INSERT INTO `tblitem` (`item_id`, `barcode`, `name`, `description`, `category`, `unit`, `sell_price`, `sale_price`, `supplier_price`, `stock_available`, `size`, `color`, `quality`, `status`, `extnem`, `created`, `modified`, `deletedx`) VALUES
(1, '', 'Dress', '', 'Womens Apparel', 'pc', 280, 0, 0, 90, 'Medium', '', '', 0, 'jpg', '2022-04-05 09:48:38', '2022-04-25 14:30:39', 1),
(2, '', 'Huda Liquid Matte', '', 'Beauty Product', 'pc', 180, 0, 0, 20, 'Small', '', '', 0, 'jpg', '2022-04-05 10:35:00', '2022-04-25 14:30:43', 1),
(3, '', 'ASJ03-26 Die Grinder', '', 'Die Grinder', 'pc', 4800, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:39:58', '2022-04-25 14:44:36', 1),
(4, '', 'ASM10-100 Angle Grinder', '', 'Angle Grinder', 'pc', 6000, 0, 0, 50, 'Medium', '', '', 0, 'png', '2022-04-25 07:42:01', '2022-04-25 14:44:32', 1),
(5, '', 'ASM10-100H Angle Grinder', '', 'DCA Power Tools', 'pc', 6200, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:43:57', '2022-04-25 14:43:57', 0),
(6, '', 'ASM05-100B Angle Grinder', '', 'DCA Power Tools', 'pc', 4000, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:47:58', '2022-04-25 14:47:58', 0),
(7, '', 'ASE150 Bench Grinder', '', 'DCA Power Tools', 'pc', 4500, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:49:57', '2022-04-25 14:49:57', 0),
(8, '', 'TBG15015.5 Bench Grinder', '', 'DCA Power Tools', 'pc', 2376, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:51:16', '2022-04-25 14:51:16', 0),
(9, '', 'ASE200 Bench Grinder', '', 'DCA Power Tools', 'pc', 6600, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:53:11', '2022-04-25 14:53:11', 0),
(10, '', 'ASJ03-10 Die Grinder', '', 'DCA Power Tools', 'pc', 3100, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:54:21', '2022-04-25 14:54:21', 0),
(11, '', 'ASJ04-25 Die Grinder', '', 'DCA Power Tools', 'pc', 4200, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 07:56:41', '2022-04-25 14:56:41', 0),
(12, '', 'AJZ06-10 Angle Drill', '', 'DCA Power Tools', 'pc', 8200, 0, 0, 50, 'Medium', '', '', 0, 'png', '2022-04-25 07:57:49', '2022-04-25 14:57:49', 0),
(13, '', 'AJZ05-10A Electric Drill', '', 'DCA Power Tools', 'pc', 3500, 0, 0, 50, 'Medium', '', '', 0, '', '2022-04-25 07:59:08', '2022-04-25 14:59:08', 0),
(14, '', 'Rain or Shine Ros-100 4L Goldseries White', '', 'Paints & Accessories', 'Pale', 620, 0, 0, 50, 'Medium', '', '', 0, 'png', '2022-04-25 08:05:48', '2022-04-25 15:05:48', 0),
(15, '', 'Rain or Shine Ros-Rm-12777 4L Azure Blue', '', 'DCA Power Tools', 'pale', 1082, 0, 0, 50, '4L', '', '', 0, 'png', '2022-04-25 08:07:33', '2022-04-25 15:07:33', 0),
(16, '', 'Rain or Shine Ros-Dk-112 4L Gray', '', 'Paints & Accessories', 'Pale', 1090, 0, 0, 50, '4L', '', '', 0, 'png', '2022-04-25 08:08:51', '2022-04-25 15:08:51', 0),
(17, '', 'Mr. Long Arm Smart Painter System', '', 'Paints & Accessories', 'pc', 1019, 0, 0, 50, 'Small', '', '', 0, 'png', '2022-04-25 08:10:21', '2022-04-25 15:10:21', 0),
(18, '', 'Mr. Long Arm Pro-Pole Extension', '', 'Paints & Accessories', 'pc', 999, 0, 0, 50, 'Small', '', '', 0, 'png', '2022-04-25 08:11:30', '2022-04-25 15:11:30', 0),
(19, '', 'Truper 17558 PICA-X Skeleton Reforced, Fiberglass Caulk Gun', '', 'Paints & Accessories', 'pc', 549, 0, 0, 50, 'Medium', '', '', 0, 'png', '2022-04-25 08:12:43', '2022-04-25 15:12:43', 0),
(20, '', 'Total TTAC2506 12V AUTO AIR COMPRESSOR with Light', '', 'Hand Tools', 'pc', 2080, 0, 0, 50, 'Medium', '', '', 0, 'jpg', '2022-04-25 08:14:23', '2022-04-25 15:14:23', 0),
(21, '', 'Michelin MBL6 1.5HP Oil Free Air Compressor', '', 'Hand Tools', 'pc', 11000, 0, 0, 50, 'Medium', '', '', 0, 'png', '2022-04-25 08:15:34', '2022-04-25 15:15:34', 0),
(22, '', 'Vespa 2 HP Direct Couple Air Compressor', '', 'Hand Tools', 'pc', 4800, 0, 0, 50, 'Medium', '', '', 0, 'png', '2022-04-25 08:16:55', '2022-04-25 15:16:55', 0),
(23, '', 'MAKITA B-65791 Aviation Snips Cuts Straight', '', 'Hand Tools', 'pc', 1090, 0, 0, 50, 'Small', '', '', 0, 'png', '2022-04-25 08:17:54', '2022-04-25 15:17:54', 0),
(24, '', 'STANLEY “Contractor Grade” High Tension Hacksaw Frame', '', 'Hand Tools', 'pc', 700, 0, 0, 50, 'Small', '', '', 0, 'png', '2022-04-25 08:18:51', '2022-04-25 15:18:51', 0),
(25, '', 'STANLEY 74-995 HD Hedge Shears 8”', '', 'Hand Tools', 'pc', 700, 0, 0, 50, 'Small', '', '', 0, 'png', '2022-04-25 08:20:01', '2022-04-25 15:20:01', 0),
(26, '', 'IELST Reviewer', '', 'Book', 'pc', 489, 0, 0, 185, '156 pages', '', '', 0, 'png', '2022-10-09 18:12:13', '2022-10-09 11:12:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsysuser`
--

CREATE TABLE `tblsysuser` (
  `usercode` varchar(254) NOT NULL,
  `username` varchar(254) NOT NULL,
  `passcode` varchar(254) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `extname` text NOT NULL,
  `img_url` text NOT NULL,
  `fullname` text NOT NULL,
  `uemail` varchar(254) NOT NULL,
  `umobileno` varchar(20) NOT NULL,
  `xposition` varchar(254) NOT NULL,
  `secquest` varchar(254) NOT NULL,
  `secans` varchar(254) NOT NULL,
  `ulevpos` int(3) NOT NULL,
  `uonline` int(1) NOT NULL,
  `ustatz` int(1) NOT NULL,
  `createdby` varchar(254) NOT NULL,
  `lname` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `address` text NOT NULL,
  `deletedx` int(1) NOT NULL,
  `testimony` text NOT NULL,
  `cmpny` text NOT NULL,
  `cmpny_position` text NOT NULL,
  `gogfirstime` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsysuser`
--

INSERT INTO `tblsysuser` (`usercode`, `username`, `passcode`, `pin`, `extname`, `img_url`, `fullname`, `uemail`, `umobileno`, `xposition`, `secquest`, `secans`, `ulevpos`, `uonline`, `ustatz`, `createdby`, `lname`, `fname`, `mname`, `address`, `deletedx`, `testimony`, `cmpny`, `cmpny_position`, `gogfirstime`, `created`, `modified`) VALUES
('00000000000', 'admin', '21232f297a57a5a743894a0e4a801fc3', '123456', '', 'https://lh3.googleusercontent.com/a/AATXAJySoJIRP_pIVIlqG7sRV53ZP97u1QcDOl1gIz_a=s96-c', 'Admin A. Minad', 'admin@info.com', '1', 'Administrator', 'What is your the name of your favorite dog?', 'you', 1, 0, 1, '00000000000', 'Admin', 'Admin', 'Admin', '', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'The Company', 'Position', 0, '2021-12-06 00:12:35', '2022-04-05 21:57:41'),
('114792514623933940437', 'napigkitludwigbethnicer', 'ab7591a976a59f0f6777507348487110', '160375', '', 'content/theme/termarshardwareandconstruction/storage/img/profile/USER114792514623933940437.', 'Ludwig Bethnicer Napigkit', 'napigkitludwigbethnicer@gmail.com', '+639154826025', 'Customer', 'What is the name of your favorite pet?', 'dog', 6, 0, 1, '', 'Napigkit', 'Ludwig Bethnicer', 'Cagas', 'Napigkit Cmpd., Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', 0, '', '', '', 1, '2022-10-09 17:33:45', '2022-10-09 10:39:34'),
('117000830823875168641', 'devusayrshire', '1b610968964ff57d0a55ac6479db9c7e', '267593', 'png', 'content/theme/termarshardwareandconstruction/storage/img/profile/USER117000830823875168641.png', 'Usayr Shire', 'devusayrshire@gmail.com', '09154826025', 'Customer', 'What is the name of your favorite pet?', 'dog', 6, 0, 1, '', 'Shire', 'Usayr', '', 'African Daisy, Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', 0, '', '', '', 0, '2022-04-02 16:15:02', '2022-10-09 10:30:56'),
('202204030001', 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', '095324', '', '', 'Cashier C. Cashier', 'cashier@gmail.com', '12345678910', 'Cashier', 'What is the name of your favorite pet?', 'dog', 3, 0, 1, '', 'Cashier', 'Cashier', 'Cashier', 'Pob., Tungawan', 0, '', '', '', 0, '2022-04-04 00:00:51', '2022-04-03 16:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblsysuser_address`
--

CREATE TABLE `tblsysuser_address` (
  `id` int(11) NOT NULL,
  `usercode` text DEFAULT NULL,
  `continent` text DEFAULT NULL,
  `country_name` text DEFAULT NULL,
  `country_accronym` text DEFAULT NULL,
  `country_code` text DEFAULT NULL,
  `zip_postal` text DEFAULT NULL,
  `state_province_region` text DEFAULT NULL,
  `city_town` text DEFAULT NULL,
  `brgy_village_district` text DEFAULT NULL,
  `address_1` text DEFAULT NULL,
  `address_2` text DEFAULT NULL,
  `tel_no` text DEFAULT NULL,
  `mobile_no` text DEFAULT NULL,
  `type_address` text DEFAULT NULL,
  `set_status` text DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsysuser_autoid`
--

CREATE TABLE `tblsysuser_autoid` (
  `id` int(11) NOT NULL,
  `fieldtxt` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsysuser_autoid`
--

INSERT INTO `tblsysuser_autoid` (`id`, `fieldtxt`, `created`) VALUES
(1, 'a', '2022-04-03 16:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblthemename`
--

CREATE TABLE `tblthemename` (
  `id` int(11) NOT NULL,
  `themename` varchar(254) NOT NULL,
  `theme_title` text NOT NULL,
  `version` varchar(254) NOT NULL,
  `authorby` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `tagz` varchar(254) NOT NULL,
  `thumbnailt` varchar(254) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedx` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblthemename`
--

INSERT INTO `tblthemename` (`id`, `themename`, `theme_title`, `version`, `authorby`, `description`, `tagz`, `thumbnailt`, `created`, `modified`, `deletedx`) VALUES
(1, 'default', 'Default', '1.0.0', 'Author B. Cone', 'Web Theme Skin is a custom bootstrap 4 design. It features custom styles for all the default blocks, and is built so that what you see in the editor looks like what youâ€™ll see on your website. Web Theme Skin is designed to be adaptable to a wide range of websites, whether youâ€™re running a photo blog, launching a new business, or supporting a non-profit. Featuring ample whitespace and modern sans-serif headlines paired with classic serif body text, itâ€™s built to be beautiful on all screen sizes.', 'custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready', 'Thumbnail.jpg', '2021-11-03 21:09:34', '2022-04-03 13:18:40', 0),
(2, 'sample', 'Sample', '0.0.0', 'None', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Thumbnail.jpg', '2021-11-03 21:09:34', '2022-04-03 13:18:46', 0),
(3, 'biryanibybrocky', 'Biryani By Brocky', '1.0.0', 'Jude Ele', 'Biryani is a mixed rice dish originating among the Muslims of the Indian subcontinent. It is made with Indian spices, rice, either with meat, or eggs or vegetables such as potatoes. Biryani is one of the most popular dishes in South Asia, as well as among the diaspora from the region.', 'custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready', 'Thumbnail.jpg', '2022-04-03 20:59:46', '2022-04-03 13:59:32', 0),
(4, 'minksandpups', 'Minks & Pups Pet Supplies', '1.0.0', 'Christopher Shane Genil', 'Your new store of Pet Supplies that deliver happiness for Pets. We offer pet food, accessories and more. Send us a message for product information and prices.', 'custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready', 'Thumbnail.jpg', '2022-04-03 21:00:06', '2022-04-03 13:59:33', 0),
(5, 'randvreviewcenter', 'R&V Review Center', '1.0.0', 'Elsie A. Garcia', 'The KJJs website is a website that bring the customers closer to thier dream fashion, and having a lot of good quality products that enables the customer to search, find, order and pay for the products and gives information and services that they need.', 'custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready', 'Thumbnail.jpg', '2022-04-03 21:00:14', '2022-04-03 13:59:45', 0),
(6, 'termarshardwareandconstruction', 'Termar\'s Hardware and Constraction', '1.0.0', 'Engr. Allan Poserio', 'This page platform utilizes customers to facilely inquire perspective building material with the appearance of power tools and machineries.', 'custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready', 'Thumbnail.jpg', '2022-04-03 21:00:25', '2022-04-03 14:00:46', 0),
(7, 'kjjsclosets', 'KJJs Closets', '1.0.0', 'Katherine Baay', 'The KJJs website is a website that bring the customers closer to thier dream fashion, and having a lot of good quality products that enables the customer to search, find, order and pay for the products and gives information and services that they need.', 'custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready', 'Thumbnail.jpg', '2022-04-03 21:00:37', '2022-04-03 14:01:05', 0),
(8, 'bjptagrivet', 'BJPT General Merchant & Agrivet Supply', '1.0.0', 'Jan Ruflo', 'General Merchant and Agrivet Supply', 'custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready', 'Thumbnail.jpg', '2022-04-03 21:00:47', '2022-04-03 14:01:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_brgy`
--

CREATE TABLE `tbl_address_brgy` (
  `brgy_id` int(11) NOT NULL,
  `barangay` text DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_brgy`
--

INSERT INTO `tbl_address_brgy` (`brgy_id`, `barangay`, `town_id`) VALUES
(1, 'Sanito', 1),
(2, 'Poblacion Ipil', 1),
(3, 'Ipil Heights', 1),
(4, 'Lower Ipil Heights', 1),
(5, 'Tirso Babiera', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_city_town`
--

CREATE TABLE `tbl_address_city_town` (
  `town_id` int(11) NOT NULL,
  `municipality_town` text DEFAULT NULL,
  `zipostal_code` text DEFAULT NULL,
  `abrv3` varchar(3) DEFAULT NULL,
  `districtno` int(2) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_city_town`
--

INSERT INTO `tbl_address_city_town` (`town_id`, `municipality_town`, `zipostal_code`, `abrv3`, `districtno`, `province_id`) VALUES
(1, 'Ipil', '7001', 'IPL', 2, 1),
(2, 'Kabasalan', '7005', 'KAB', 2, 1),
(3, 'Titay', '7003', 'TIT', 2, 1),
(4, 'Siay', '7006', 'SIA', 2, 1),
(5, 'Tungawan', '7018', 'TUN', 2, 1),
(6, 'R.T. Lim', '7002', 'RTL', 2, 1),
(7, 'Mabuhay', '7010', 'MAB', 1, 1),
(8, 'Buug', '7009', 'BUG', 1, 1),
(9, 'Imelda', '7007', 'IME', 1, 1),
(10, 'Naga', '7004', 'NAG', 2, 1),
(11, 'Diplahan', '7039', 'DIP', 1, 1),
(12, 'Alicia', '7040', 'ALI', 1, 1),
(13, 'Malangas', '7038', 'MAL', 1, 1),
(14, 'Payao', '7008', 'PAY', 1, 1),
(15, 'Talusan', '7012', 'TAL', 1, 1),
(16, 'Olutanga', '7041', 'OLU', 1, 1),
(17, 'Manila City', '1000', 'MLA', NULL, 5),
(18, 'Cebu City', '6000', 'CEB', NULL, 4),
(19, 'Pagadian City', '7016', 'PAG', NULL, 2),
(20, 'Dipolog City', '7100', 'DIP', NULL, 3),
(21, 'Zamboanga City', '7000', 'ZAM', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_continent`
--

CREATE TABLE `tbl_address_continent` (
  `continent` varchar(15) NOT NULL DEFAULT '',
  `continent_code` varchar(2) NOT NULL DEFAULT '',
  `long_lat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_continent`
--

INSERT INTO `tbl_address_continent` (`continent`, `continent_code`, `long_lat`) VALUES
('Africa', 'AF', ''),
('Antartica', 'AN', ''),
('Asia', 'AS', ''),
('Australia', 'AU', ''),
('Europe', 'EU', ''),
('North America', 'NA', ''),
('South America', 'SA', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_country`
--

CREATE TABLE `tbl_address_country` (
  `country_id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `country_code` varchar(11) DEFAULT NULL,
  `iso_two` varchar(2) DEFAULT NULL,
  `iso_three` varchar(3) DEFAULT NULL,
  `numeric_code` varchar(3) DEFAULT NULL,
  `continent_code` varchar(2) DEFAULT '',
  `currency_symbol` varchar(11) DEFAULT NULL,
  `currency_iso` varchar(11) DEFAULT NULL,
  `currency_name` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_country`
--

INSERT INTO `tbl_address_country` (`country_id`, `country`, `country_code`, `iso_two`, `iso_three`, `numeric_code`, `continent_code`, `currency_symbol`, `currency_iso`, `currency_name`) VALUES
(2, 'Philippines', '63', 'PH', 'PHL', '608', 'AS', '₱', 'PHP', 'Peso'),
(3, 'United State of America', '1', 'US', 'USA', NULL, 'NA', '$', 'DOL', 'Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_island`
--

CREATE TABLE `tbl_address_island` (
  `island_archipelago` text DEFAULT NULL,
  `island_code` varchar(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_island`
--

INSERT INTO `tbl_address_island` (`island_archipelago`, `island_code`, `country_id`) VALUES
('Luzon', 'LUZ', 2),
('Mindanao', 'MIN', 2),
('Visayas', 'VIS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_prk`
--

CREATE TABLE `tbl_address_prk` (
  `prk_id` int(11) NOT NULL,
  `purok` text DEFAULT NULL,
  `brgy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_prk`
--

INSERT INTO `tbl_address_prk` (`prk_id`, `purok`, `brgy_id`) VALUES
(1, 'Nuevo 1', 1),
(2, 'Nuevo 2', 1),
(3, 'Mahogany', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_province`
--

CREATE TABLE `tbl_address_province` (
  `province_id` int(11) NOT NULL,
  `province` text DEFAULT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  `capital` text DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_province`
--

INSERT INTO `tbl_address_province` (`province_id`, `province`, `iso3`, `capital`, `region_id`) VALUES
(1, 'Zamboanga Sibugay', 'ZSP', 'Ipil', 12),
(2, 'Zamboanga del Sur', 'ZDS', 'Pagadian', 12),
(3, 'Zamboanga del Norte', 'ZDN', 'Dipolog', 12),
(4, 'Cebu', 'CEB', 'Cebu City', 10),
(5, 'Metro Manila', 'MAN', 'Manila City', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_region`
--

CREATE TABLE `tbl_address_region` (
  `region_id` int(11) NOT NULL,
  `region` text DEFAULT NULL,
  `abrv` text DEFAULT NULL,
  `abvr2` text DEFAULT NULL,
  `island_code` varchar(11) DEFAULT NULL,
  `region_center` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address_region`
--

INSERT INTO `tbl_address_region` (`region_id`, `region`, `abrv`, `abvr2`, `island_code`, `region_center`) VALUES
(1, 'National Capital Region', 'NCR', 'NCR', 'LUZ', 'Manila'),
(2, 'Cordillera Administrative Region', 'CAR', 'CAR', 'LUZ', 'Baguio'),
(3, 'Ilocos Region', 'Region I', 'R1', 'LUZ', 'San Fernando (La Union)'),
(4, 'Cagayan Valley', 'Region II', 'R2', 'LUZ', 'Tuguegarao'),
(5, 'Central Luzon', 'Region III', 'R3', 'LUZ', 'San Fernando (Pampanga)'),
(6, 'Calabarzon', 'Region IV-A', 'R4-A', 'LUZ', 'Calamba'),
(7, 'Southwestern Tagalog Region', 'MIMAROPA', 'MIMAROPA', 'LUZ', 'Calapan'),
(8, 'Bicol Region', 'Region V', 'R5', 'LUZ', 'Legazpi'),
(9, 'Western Visayas', 'Region VI', 'R6', 'VIS', 'Iloilo City'),
(10, 'Central Visayas', 'Region VII', 'R7', 'VIS', 'Cebu City'),
(11, 'Eastern Visayas', 'Region VIII', 'R8', 'VIS', 'Tacloban'),
(12, 'Zamboanga Peninsula', 'Region IX', 'R9', 'MIN', 'Pagadian'),
(13, 'Northern Mindanao', 'Region X', 'R10', 'MIN', 'Cagayan de Oro'),
(14, 'Davao Region', 'Region XI', 'R11', 'MIN', 'Davao City'),
(15, 'Soccsksargen', 'Region XII', 'R12', 'MIN', 'Koronadal'),
(16, 'Caraga', 'Region XIII', 'R13', 'MIN', 'Butuan'),
(17, 'Bangsamoro', 'BARMM', 'BARMM', 'MIN', 'Cotabato City');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autoid`
--

CREATE TABLE `tbl_autoid` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactform`
--

CREATE TABLE `tbl_contactform` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `deleted` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_script`
--

CREATE TABLE `tbl_custom_script` (
  `cstyle` text NOT NULL,
  `cscript` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `datemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_custom_script`
--

INSERT INTO `tbl_custom_script` (`cstyle`, `cscript`, `datecreated`, `datemodified`, `lastuser`) VALUES
('/** Style **/', '// Script', '2022-04-03 06:57:38', '2022-04-03 05:04:08', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headbanner`
--

CREATE TABLE `tbl_headbanner` (
  `hb_id` int(11) NOT NULL,
  `head_title` text DEFAULT NULL,
  `head_title2` text NOT NULL,
  `sub_text` text DEFAULT NULL,
  `img_loc` text DEFAULT NULL,
  `banner_width` text NOT NULL,
  `content_alignment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_headbanner`
--

INSERT INTO `tbl_headbanner` (`hb_id`, `head_title`, `head_title2`, `sub_text`, `img_loc`, `banner_width`, `content_alignment`) VALUES
(1, NULL, '', NULL, 'banner02.jpg', '', ''),
(2, NULL, '', NULL, 'banner01.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headbanner_btn`
--

CREATE TABLE `tbl_headbanner_btn` (
  `hbtn_id` int(11) NOT NULL,
  `hb_id` int(11) DEFAULT NULL,
  `caption` text NOT NULL,
  `btn_class` text NOT NULL,
  `link_url` text NOT NULL,
  `alt` text NOT NULL,
  `tool_tip` text NOT NULL,
  `open_in` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_frontpage`
--

CREATE TABLE `tbl_menu_frontpage` (
  `menu_id` int(11) NOT NULL,
  `menu_title` text NOT NULL,
  `menu_slug` text NOT NULL,
  `menu_open` text NOT NULL,
  `menable` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu_frontpage`
--

INSERT INTO `tbl_menu_frontpage` (`menu_id`, `menu_title`, `menu_slug`, `menu_open`, `menable`) VALUES
(1, 'Home', 'home', '_self', 1),
(2, 'Services', 'services', '_self', 0),
(3, 'Products', 'products', '_self', 1),
(4, 'Portfolio', 'portfolio', '_self', 0),
(5, 'Testimonials', 'testimonials', '_self', 1),
(6, 'Contact Us', 'contactus', '_self', 1),
(7, 'About', 'aboutus', '_self', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_customer`
--

CREATE TABLE `tbl_order_customer` (
  `order_id` int(11) NOT NULL,
  `receipt_no` text DEFAULT NULL,
  `customer_id` varchar(254) DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `cemail` text NOT NULL,
  `address` text DEFAULT NULL,
  `sub_total_qty` double DEFAULT NULL,
  `sub_total_item` int(11) DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `shipping_fee` double DEFAULT NULL,
  `total_all` double DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `process_by` text DEFAULT NULL,
  `review_by` text DEFAULT NULL,
  `approved_by` text DEFAULT NULL,
  `receiver` text NOT NULL,
  `receiver_phone` text NOT NULL,
  `remail` text NOT NULL,
  `d_location` text NOT NULL,
  `long_lat` text NOT NULL,
  `courier` text NOT NULL,
  `otherinfo` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_customer`
--

INSERT INTO `tbl_order_customer` (`order_id`, `receipt_no`, `customer_id`, `customer_name`, `phone`, `cemail`, `address`, `sub_total_qty`, `sub_total_item`, `sub_total`, `shipping_fee`, `total_all`, `remarks`, `status`, `process_by`, `review_by`, `approved_by`, `receiver`, `receiver_phone`, `remail`, `d_location`, `long_lat`, `courier`, `otherinfo`, `created`, `modified`, `deleted`) VALUES
(1, NULL, '117000830823875168641', 'Usayr Shire', '09154826025', 'devusayrshire@gmail.com', 'African Daisy, Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', 1, 1, 700, NULL, NULL, 'Checkout', 'Unpaid', NULL, NULL, NULL, 'Usayr Shire', '09154826025', 'devusayrshire@gmail.com', 'African Daisy, Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', '', '', '', '2022-10-08 20:08:25', '2022-10-08 13:33:33', 0),
(2, NULL, '117000830823875168641', 'Usayr Shire', '09154826025', 'devusayrshire@gmail.com', 'African Daisy, Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', 11, 4, 22, NULL, NULL, 'Checkout', 'Unpaid', NULL, NULL, NULL, 'Usayr Shire', '09154826025', 'devusayrshire@gmail.com', 'African Daisy, Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', '', '', '', '2022-10-09 13:31:15', '2022-10-09 09:50:20', 0),
(3, NULL, '117000830823875168641', 'Usayr Shire', '09154826025', 'devusayrshire@gmail.com', 'African Daisy, Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', 1, 1, 700, NULL, NULL, 'Process', 'Unpaid', NULL, NULL, NULL, 'Usayr Shire', '09154826025', 'devusayrshire@gmail.com', 'African Daisy, Mahogany, Tirso Babiera, Ipil 7001, District-2, Zamboanga Sibugay, Region IX, Mindanao, Philippines, Asia', '', '', '', '2022-10-09 18:09:47', '2022-10-09 12:26:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `item_order_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `barcode` varchar(254) DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `unit` varchar(254) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total_amt` double DEFAULT NULL,
  `extnem` varchar(10) DEFAULT NULL,
  `cstock` double NOT NULL,
  `status` text DEFAULT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`item_order_id`, `order_id`, `item_id`, `barcode`, `item_name`, `qty`, `unit`, `price`, `total_amt`, `extnem`, `cstock`, `status`, `modified`, `created`, `deleted`) VALUES
(1, 1, 25, '', 'STANLEY 74-995 HD Hedge Shears 8”', 1, 'pc', 700, 700, 'png', 50, NULL, '2022-10-08 20:08:25', '2022-10-08 20:08:25', 0),
(2, 2, 24, '', 'STANLEY “Contractor Grade” High Tension Hacksaw Frame', 1, 'pc', 700, 700, 'png', 50, NULL, '2022-10-09 13:31:15', '2022-10-09 13:31:15', 0),
(3, 2, 22, '', 'Vespa 2 HP Direct Couple Air Compressor', 1, 'pc', 4800, 4800, 'png', 50, NULL, '2022-10-09 16:26:31', '2022-10-09 16:26:31', 0),
(4, 2, 21, '', 'Michelin MBL6 1.5HP Oil Free Air Compressor', 1, 'pc', 11000, 11000, 'png', 50, NULL, '2022-10-09 16:26:36', '2022-10-09 16:26:36', 0),
(5, 2, 25, '', 'STANLEY 74-995 HD Hedge Shears 8”', 8, 'pc', 700, 5600, 'png', 50, NULL, '2022-10-09 16:27:08', '2022-10-09 16:26:45', 0),
(6, 3, 24, '', 'STANLEY “Contractor Grade” High Tension Hacksaw Frame', 1, 'pc', 700, 700, 'png', 50, NULL, '2022-10-09 18:09:47', '2022-10-09 18:09:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_secquest`
--

CREATE TABLE `tbl_secquest` (
  `qid` int(11) NOT NULL,
  `secquest` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_secquest`
--

INSERT INTO `tbl_secquest` (`qid`, `secquest`) VALUES
(1, 'In what city were you born?'),
(2, 'What is the name of your favorite pet?'),
(3, 'What is your mother\'s maiden name?'),
(4, 'What high school did you attend?'),
(5, 'What is the name of your first school?'),
(6, 'What was the make of your first car?'),
(7, 'What was your favorite food as a child?'),
(8, 'Where did you meet your spouse?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conf`
--
ALTER TABLE `conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcrud`
--
ALTER TABLE `tblcrud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tblsysuser`
--
ALTER TABLE `tblsysuser`
  ADD PRIMARY KEY (`usercode`);

--
-- Indexes for table `tblsysuser_address`
--
ALTER TABLE `tblsysuser_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tblsysuser_autoid`
--
ALTER TABLE `tblsysuser_autoid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblthemename`
--
ALTER TABLE `tblthemename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_address_brgy`
--
ALTER TABLE `tbl_address_brgy`
  ADD PRIMARY KEY (`brgy_id`),
  ADD KEY `brgy_id` (`brgy_id`),
  ADD KEY `town_id` (`town_id`);

--
-- Indexes for table `tbl_address_city_town`
--
ALTER TABLE `tbl_address_city_town`
  ADD PRIMARY KEY (`town_id`),
  ADD KEY `town_id` (`town_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `tbl_address_continent`
--
ALTER TABLE `tbl_address_continent`
  ADD PRIMARY KEY (`continent_code`),
  ADD UNIQUE KEY `continent_code` (`continent_code`) USING BTREE;

--
-- Indexes for table `tbl_address_country`
--
ALTER TABLE `tbl_address_country`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `country_id` (`country_id`) USING BTREE,
  ADD KEY `continent_code` (`continent_code`);

--
-- Indexes for table `tbl_address_island`
--
ALTER TABLE `tbl_address_island`
  ADD PRIMARY KEY (`island_code`),
  ADD UNIQUE KEY `island_code` (`island_code`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tbl_address_prk`
--
ALTER TABLE `tbl_address_prk`
  ADD PRIMARY KEY (`prk_id`),
  ADD KEY `brgy_id` (`brgy_id`),
  ADD KEY `prk_id` (`prk_id`);

--
-- Indexes for table `tbl_address_province`
--
ALTER TABLE `tbl_address_province`
  ADD PRIMARY KEY (`province_id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `tbl_address_region`
--
ALTER TABLE `tbl_address_region`
  ADD PRIMARY KEY (`region_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `island_code` (`island_code`);

--
-- Indexes for table `tbl_autoid`
--
ALTER TABLE `tbl_autoid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactform`
--
ALTER TABLE `tbl_contactform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_headbanner`
--
ALTER TABLE `tbl_headbanner`
  ADD PRIMARY KEY (`hb_id`),
  ADD UNIQUE KEY `id` (`hb_id`);

--
-- Indexes for table `tbl_headbanner_btn`
--
ALTER TABLE `tbl_headbanner_btn`
  ADD PRIMARY KEY (`hbtn_id`),
  ADD UNIQUE KEY `id` (`hbtn_id`);

--
-- Indexes for table `tbl_menu_frontpage`
--
ALTER TABLE `tbl_menu_frontpage`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_order_customer`
--
ALTER TABLE `tbl_order_customer`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`item_order_id`),
  ADD UNIQUE KEY `item_order_id` (`item_order_id`);

--
-- Indexes for table `tbl_secquest`
--
ALTER TABLE `tbl_secquest`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conf`
--
ALTER TABLE `conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcrud`
--
ALTER TABLE `tblcrud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblsysuser_address`
--
ALTER TABLE `tblsysuser_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsysuser_autoid`
--
ALTER TABLE `tblsysuser_autoid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblthemename`
--
ALTER TABLE `tblthemename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_address_brgy`
--
ALTER TABLE `tbl_address_brgy`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_address_city_town`
--
ALTER TABLE `tbl_address_city_town`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_address_country`
--
ALTER TABLE `tbl_address_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_address_prk`
--
ALTER TABLE `tbl_address_prk`
  MODIFY `prk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_address_province`
--
ALTER TABLE `tbl_address_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_address_region`
--
ALTER TABLE `tbl_address_region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_autoid`
--
ALTER TABLE `tbl_autoid`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contactform`
--
ALTER TABLE `tbl_contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_headbanner`
--
ALTER TABLE `tbl_headbanner`
  MODIFY `hb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_headbanner_btn`
--
ALTER TABLE `tbl_headbanner_btn`
  MODIFY `hbtn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu_frontpage`
--
ALTER TABLE `tbl_menu_frontpage`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order_customer`
--
ALTER TABLE `tbl_order_customer`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `item_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_secquest`
--
ALTER TABLE `tbl_secquest`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_address_brgy`
--
ALTER TABLE `tbl_address_brgy`
  ADD CONSTRAINT `town_id` FOREIGN KEY (`town_id`) REFERENCES `tbl_address_city_town` (`town_id`);

--
-- Constraints for table `tbl_address_city_town`
--
ALTER TABLE `tbl_address_city_town`
  ADD CONSTRAINT `province_id` FOREIGN KEY (`province_id`) REFERENCES `tbl_address_province` (`province_id`);

--
-- Constraints for table `tbl_address_country`
--
ALTER TABLE `tbl_address_country`
  ADD CONSTRAINT `continent_code` FOREIGN KEY (`continent_code`) REFERENCES `tbl_address_continent` (`continent_code`);

--
-- Constraints for table `tbl_address_island`
--
ALTER TABLE `tbl_address_island`
  ADD CONSTRAINT `country_id` FOREIGN KEY (`country_id`) REFERENCES `tbl_address_country` (`country_id`);

--
-- Constraints for table `tbl_address_prk`
--
ALTER TABLE `tbl_address_prk`
  ADD CONSTRAINT `brgy_id` FOREIGN KEY (`brgy_id`) REFERENCES `tbl_address_brgy` (`brgy_id`);

--
-- Constraints for table `tbl_address_province`
--
ALTER TABLE `tbl_address_province`
  ADD CONSTRAINT `region_id` FOREIGN KEY (`region_id`) REFERENCES `tbl_address_region` (`region_id`);

--
-- Constraints for table `tbl_address_region`
--
ALTER TABLE `tbl_address_region`
  ADD CONSTRAINT `island_code` FOREIGN KEY (`island_code`) REFERENCES `tbl_address_island` (`island_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
