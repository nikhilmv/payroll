-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2020 at 11:39 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pioneerc_hrprocess`
--

-- --------------------------------------------------------

--
-- Table structure for table `bd_form`
--

CREATE TABLE `bd_form` (
  `id` int(11) NOT NULL,
  `field_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prompt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `website_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `website_url`, `description`, `logo`, `address`) VALUES
(1, 'EWIRE', 'ewiresofttech.com', '', 'null.jpg', ''),
(2, 'Dinero + BNI', 'dinerotechlabs.com', '', 'null.jpg', '<p>Address</p>'),
(3, 'BNI', 'bni.com', '', 'null.jpg', ''),
(4, 'BarqIT', 'barqgroup.com', '', 'null.jpg', '<p>Adddress</p>'),
(5, 'OrganicBPS', 'organicbps.com', '', 'null.jpg', ''),
(6, 'IMCS', 'imcs.org', '', 'null.jpg', ''),
(7, 'Astrosumathy', 'astrosumathy.com', '', 'null.jpg', ''),
(8, 'KPI AHLI CHARTERED ACCOUNTANTS', 'kpi.co', '', 'null.jpg', '<p style=\"font-weight: 400;\">Office 301, Building 2, Bay Square, Business Bay,</p>\r\n<p style=\"font-weight: 400;\">Dubai, POBOX: 121395,</p>\r\n<p style=\"font-weight: 400;\">T: 04-4551010 F: 04-4551011</p>\r\n<p style=\"font-weight: 400;\">United Arab Emirates</p>\r\n<p style=\"font-weight: 400;\">TRN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;100211202500003</p>'),
(9, 'casebella Interiors', '', '', 'null.jpg', ''),
(10, 'Priyam Caterers', 'priyamcaterers.in', '', 'null.jpg', '<p>Kalamassery, Ernakulam</p>'),
(11, 'vazhappilly', '', '', 'null.jpg', '<p>19/985-F1, F2,<br />Palliparambukavu Rd,<br />Market Junction, Thrippunithura,<br />Ernakulam, Kerala 682301</p>'),
(12, 'Centre Source Consultancy Services', '', '', 'null.jpg', '<p>6F National Pearl Star, Edappally,<br /> Kochi 682024, India</p>'),
(13, 'lakeshore', '', '', 'null.jpg', ''),
(14, 'Royal Interiors', '', '', 'null.jpg', '<p>Ajman,<br />United Arab Emirates</p>'),
(15, 'Casabella', '', '', 'null.jpg', ''),
(16, 'remo and Sam', '', '', 'null.jpg', ''),
(17, 'Sysmantech', '', '', 'null.jpg', ''),
(18, 'Androz', '', '', 'null.jpg', ''),
(19, 'Associate Designers', '', '', 'null.jpg', ''),
(21, 'Cwatch impex', '', '', 'null.jpg', ''),
(22, 'Reyaglobal', '', '', 'null.jpg', ''),
(23, 'madpat GmbH', '', '', 'null.jpg', '<p>Zwerchstrasse 1<br />71229 Leonberg<br />Germany</p>'),
(24, 'EDGE', '', '', 'null.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Web Development'),
(2, 'Ecommerce Development'),
(3, 'Web App Development');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(500) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `brand_id`, `brand_name`, `created`, `modified`) VALUES
(1, 'Yunus', '', '9072758831', 1, 'EWIRE', '2020-01-06', '0000-00-00'),
(2, 'Nijoe varkey', 'nv@dinerotechlabs.com', '9495768202', 2, 'Dinero', '2020-01-06', '0000-00-00'),
(3, 'John', '', '9633044773', 3, 'BNI', '2020-01-07', '0000-00-00'),
(4, 'Manoj Agarwal', 'manoj@agarwalestates.com', '9742501122', 3, 'BNI', '2020-01-08', '0000-00-00'),
(5, 'Pradeesh', 'pradeesh@barqgroup.com', '+974 77010184', 4, 'BarqIT', '2020-01-08', '0000-00-00'),
(6, 'Rojer', '', '7994776391', 3, 'BNI', '2020-01-09', '0000-00-00'),
(7, 'Jimmy', 'jimmy@organicbps.com', '', 5, 'OrganicBPS', '2020-01-13', '0000-00-00'),
(8, 'Michile Jonson', '', '9961323998', 3, 'BNI', '2020-01-13', '0000-00-00'),
(9, 'John', 'johnpj4u@gmail.com', '', 6, 'IMCS', '2020-01-16', '0000-00-00'),
(10, 'Sumathy', '', '974-530-0769', 7, 'Astrosumathy', '2020-01-22', '0000-00-00'),
(11, 'Aneesh', 'aneesh@kpi.co', '', 8, 'KPI', '2020-01-27', '0000-00-00'),
(12, 'diffin', '', '+91 99610 22492', 9, 'casebella Interiors', '2020-01-29', '0000-00-00'),
(13, 'Prakash', '', '94472 09730', 10, 'Priyam Caterers', '2020-01-30', '0000-00-00'),
(14, 'Roger', 'rogerkuriyan@gmail.com', '', 11, 'vazhappilly', '2020-02-11', '0000-00-00'),
(15, 'centersource - John', '', '9995326368', 12, 'Centre Source Consultancy Services', '2020-02-18', '0000-00-00'),
(16, 'Shelley', 'shelleycp@yahoo.com', '', 13, 'lakeshore', '2020-02-19', '0000-00-00'),
(17, 'Aneesh - Royal', 'aneesh@royalgroup.ae', '', 14, 'Royal Interiors', '2020-02-20', '0000-00-00'),
(18, 'Difin', '', '9961022492', 15, 'Casabella', '2020-04-11', '0000-00-00'),
(19, 'Remo', 'remoandsamdecor@gmail.com', '623 5566 111', 16, 'remo and Sam', '2020-04-25', '0000-00-00'),
(20, 'rajesh', 'rajesh@sysmantech.net', '', 17, 'Sysmantech', '2020-05-07', '0000-00-00'),
(21, 'John', 'androtvlive@gmail.com', '', 18, 'Androz', '2020-05-07', '0000-00-00'),
(22, 'Sreeju', 'sreeju@gmail.com', '9847447474', 19, 'Associate Designers', '2020-06-22', '0000-00-00'),
(23, 'majid', 'majidhhresorts@gmail.com', '8138080333', 21, 'Cwatch impex', '2020-08-06', '0000-00-00'),
(24, 'Edward', 'edward@reyaglobal.com', '', 22, 'Reyaglobal', '2020-08-10', '0000-00-00'),
(25, 'patrick', 'p.schlender@madpat.de', '', 23, 'madpat GmbH', '2020-08-10', '0000-00-00'),
(26, 'Hari', 'mail@hari.live', '', 24, 'EDGE', '2020-10-31', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `deliverables`
--

CREATE TABLE `deliverables` (
  `id` int(11) NOT NULL,
  `deliveryId` int(20) NOT NULL,
  `Deliverables` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Timelines` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_shedule`
--

CREATE TABLE `delivery_shedule` (
  `id` int(11) NOT NULL,
  `project_number_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `project_title` text COLLATE utf8_unicode_ci NOT NULL,
  `deliverables` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `timelines` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `estimated_budget` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `brp_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_id` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `project_title` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `doc_created_status` int(11) NOT NULL DEFAULT '0',
  `project_brief_document_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `brp_id`, `client_id`, `contact_person_id`, `project_title`, `category_id`, `deadline`, `doc_created_status`, `project_brief_document_name`) VALUES
(1, '2', '1', '1', 'Admin & Front End - Subscription', 1, '2020-01-23', 0, ''),
(2, '2', '1', '1', 'CS Cart', 1, '2020-01-17', 0, ''),
(3, '2', '2', '2', 'Quadspire', 1, '2020-01-17', 0, ''),
(4, '3', '3', '3', 'Frontrow.uk.com', 2, '2020-01-31', 0, ''),
(5, '3', '3', '4', 'Website Revamp', 1, '0000-00-00', 0, ''),
(6, '3', '2', '2', 'Leads Module', 3, '0000-00-00', 0, ''),
(7, '3', '4', '5', 'Website Developement', 1, '0000-00-00', 0, ''),
(8, '3', '3', '6', 'Web development', 1, '2020-01-30', 0, ''),
(9, '3', '1', '1', 'QR Code -- Coupon module', 3, '2020-01-30', 0, ''),
(10, '3', '5', '7', 'ISC & processflow Updates', 1, '2020-01-10', 0, ''),
(11, '3', '6', '9', 'Domain & Hosting IMCS.ORG', 1, '2020-01-16', 0, ''),
(12, '3', '7', '10', 'Domain & Hosting', 1, '2020-01-22', 0, ''),
(13, '3', '8', '11', 'KPI Issue fixes and wordpress Update', 1, '2020-01-27', 0, ''),
(14, '3', '2', '2', 'Integrity Taxation', 1, '2020-01-28', 0, ''),
(15, '3', '2', '2', 'BestPower', 1, '2020-01-28', 0, ''),
(16, '3', '9', '12', 'Website Developement', 1, '0000-00-00', 0, ''),
(17, '3', '10', '13', 'catering website development', 1, '2020-01-30', 0, ''),
(18, '3', '5', '7', 'Akay Spices web development', 1, '2020-02-10', 0, ''),
(19, '3', '11', '14', 'Vazhappilly Web Development', 1, '2020-01-15', 0, ''),
(20, '3', '12', '15', 'Nadilath magento website Updates', 2, '2020-02-10', 0, ''),
(21, '3', '5', '7', 'Akay - Website Development', 1, '2020-02-20', 0, ''),
(22, '3', '14', '17', 'Royal - domain and hosting renewal', 1, '2020-02-20', 0, ''),
(23, '3', '2', '2', 'clinexservices Project Hosting and setup', 1, '2020-02-21', 0, ''),
(24, '3', '15', '18', 'Casabella Web development', 1, '2020-04-11', 0, ''),
(25, '3', '16', '19', 'Remo and Sam web development', 1, '2020-04-22', 0, ''),
(26, '3', '17', '20', 'ITKerala Website Development', 2, '2020-05-07', 0, ''),
(27, '3', '18', '21', 'Domain Renewal', 1, '2020-05-07', 0, ''),
(28, '3', '2', '2', 'Samson medlin', 1, '2020-05-21', 0, ''),
(29, '3', '19', '22', 'associate - web development', 1, '2020-06-02', 0, ''),
(30, '3', '21', '23', 'Cwtchimpex Website', 1, '2020-08-20', 0, ''),
(31, '3', '22', '24', 'reyaglobal Website development', 1, '2020-08-06', 0, ''),
(32, '3', '23', '25', 'magento Development', 1, '2020-07-17', 0, ''),
(33, '3', '24', '26', 'Edge Magento development', 1, '2020-10-22', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) NOT NULL,
  `expense_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(100) NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_title`, `category_id`, `description`, `amount`, `date`) VALUES
(1, 'travel allowance BNI + Other meetings', '8', 'travel allowance BNI + Other meetings', 223, '2020-01-09'),
(2, 'travel allowance', '8', 'travel allowance', 220, '2020-01-02'),
(3, 'Tube + LED SET', '3', 'Tube + LED SET', 290, '2020-01-07'),
(4, 'Tea kettle + Tea bag + sugar', '3', 'Tea kettle + Tea bag + sugar', 797, '2020-01-06'),
(5, 'BNI MSP Training', '8', 'BNI MSP Training', 1200, '2020-01-11'),
(6, 'BNI Meeting Monthly Expense', '8', 'BNI Meeting Monthly Expense', 2500, '2020-01-16'),
(7, 'Cleaning - waste dump', '1', 'Cleaning - waste dump', 200, '2020-01-08'),
(8, 'Weekly Cleaning', '1', 'Weekly Cleaning', 100, '2020-01-10'),
(9, 'Laptop Service', '3', '2 Laptop Service ', 7500, '2020-01-10'),
(10, 'BNI MSP Training Travel', '8', 'Travel Expense', 120, '2020-01-11'),
(11, 'Water', '3', 'Water Expense', 120, '2020-01-10'),
(12, 'Voltas Service', '4', 'Service & cleaning', 550, '2020-01-14'),
(13, 'BNI MSP  Travel', '8', 'Travel Expense', 230, '2020-01-16'),
(14, 'Sugar purchase', '3', 'Sugar', 30, '2020-01-20'),
(15, 'cleaning', '1', 'Service & cleaning', 200, '2020-01-23'),
(16, 'BNI Meeting Travel', '8', 'Travel Expense', 350, '2020-01-23'),
(17, '4GB Ram', '3', '4GB Ram', 1725, '2020-01-24'),
(18, 'Drinking Water - 3 bottle', '4', 'Drinking Water - 3 bottle', 180, '2020-01-24'),
(19, 'cleaning', '1', 'Service & cleaning - 2 weeks', 200, '2020-01-29'),
(20, 'chair Purchase', '3', 'chair purchase', 7850, '2020-01-29'),
(21, 'BNI Meeting Travel', '8', 'BNI Travel expense', 280, '2020-01-30'),
(22, 'Salary Jan 20120', '2', 'Salary Jan 2020', 86415, '2020-01-31'),
(23, 'Business development expense', '2', 'Pooja - Lead generation', 8575, '2020-02-03'),
(24, 'Tea bags + Sugar', '3', 'Tea bags + Sugar', 160, '2020-02-04'),
(25, 'SSL Purchase', '9', 'Subscription project -- SSL purchase', 6000, '2020-02-03'),
(26, 'Upwork Connect purchase', '9', 'Upwork Connect purchase', 430, '2020-02-03'),
(27, 'Nishal Design payment', '9', 'Design html work', 6000, '2020-01-24'),
(28, 'Reseller Host payement', '9', 'reseller invoice', 2000, '2020-02-22'),
(29, 'TDS Of CS cart invoice', '9', 'TDS', 11150, '2020-02-04'),
(30, 'TDS For Quadspire Invoice', '9', 'TDS For invoice', 9500, '2020-02-04'),
(31, 'Asianet Broadband Bill pay', '6', 'Asianet Broadband Bill pay', 846, '2020-02-06'),
(32, 'Brandize meeting', '7', 'brandize meeting', 50, '2020-02-10'),
(33, 'Rent', '5', 'Rent and electricity', 11200, '2020-02-07'),
(34, 'Water', '4', 'Water Expense', 180, '2020-02-12'),
(35, 'BNI Meeting Travel', '8', 'BNI Travel expense', 350, '2020-02-13'),
(36, 'Nishal payment for Quadspire HTML', '9', 'Nishal payment for Quadspire HTML', 2500, '2020-02-13'),
(37, 'Salary adv - Subeesh', '2', 'Salary - Adv', 15000, '2020-02-17'),
(38, 'Meeting with Dr Shelly', '7', 'magento Lead meeting', 350, '2020-02-18'),
(39, 'Salary Adv Subeesh', '2', 'Salary Advance', 11091, '2020-02-19'),
(40, 'BNI Monthly fee', '8', 'BNI monthly fee - Feb', 3500, '2020-02-20'),
(41, 'UPS repair', '3', 'UPS repair', 400, '2020-02-19'),
(42, 'Office Cleaning', '1', 'Office cleaning', 200, '2020-02-20'),
(43, 'TDS - Centersource', '10', 'TDS - Centersource', 2500, '2020-02-20'),
(44, 'akay theme purchase', '9', 'Akay theme purchase', 4386, '2020-02-24'),
(45, 'skylark Invoice', '9', 'Cpanel subscription', 265, '2020-02-24'),
(46, 'Salary Adv Subeesh', '2', 'Salary Advance', 9687, '2020-02-23'),
(47, 'Upwork Connect purchase', '9', 'Upwork Connect purchase', 216, '2020-02-26'),
(48, 'Computer Service', '3', 'Computer Service', 5200, '2020-02-27'),
(49, 'BNI Meeting Travel', '8', 'Travel Expense', 270, '2020-02-27'),
(50, 'Chair repair', '3', 'Chair repair', 2200, '2020-02-27'),
(51, 'Salary Feb 2020', '2', 'Salary feb 2020', 51352, '2020-02-27'),
(52, 'bank deduction', '10', 'Bank deduction', 7, '2020-02-27'),
(53, 'Sugar + net Jack', '3', 'Sugar + net Jack', 60, '2020-03-02'),
(54, 'Asianet Broadband Bill pay', '6', 'Asianet Broadband Bill pay', 845, '2020-03-03'),
(55, 'Nishal payment for portfolio', '3', 'Nishal payment for portfolio', 5000, '2020-03-03'),
(56, 'Water', '4', 'Water Expense', 180, '2020-03-02'),
(57, 'Rent and Electricity', '5', 'Rent and Electricity -- Feb 2020', 16897, '2020-03-05'),
(58, 'BNI Meeting Travel', '8', 'Travel Expense', 280, '2020-03-05'),
(59, 'Bank Maintenance', '10', 'Bank Maintenance charge', 190, '2020-03-05'),
(60, 'Battery purchase', '3', 'Battery Purchase', 18000, '2020-03-05'),
(61, 'hand wash', '3', 'Hand wash purchase', 112, '2020-03-05'),
(62, 'Corona expense', '3', 'Corona', 732, '2020-03-12'),
(63, 'Upwork connect', '9', 'Upwork connect', 222, '2020-03-13'),
(64, 'Hosting purchase - Biggro', '9', 'Hosting purchase', 9550, '2020-03-27'),
(65, 'bank expense', '9', 'bank expense', 10, '2020-03-17'),
(66, 'biggro - support ticket purchase', '9', 'support ticket', 3396, '2020-03-30'),
(67, 'Salary March 2020', '2', 'All salary March 2020', 96818, '2020-04-04'),
(68, 'Rent March 2020', '5', 'Rent march 2020', 5600, '2020-04-04'),
(69, 'Skylark hosting transfer', '9', 'Subscription amount', 2000, '2020-04-04'),
(70, 'bank expense', '9', 'bank expense', 20, '2020-04-04'),
(71, 'Bestpower TDS', '10', 'Bestpowe tds', 2500, '2020-04-24'),
(72, 'Remo - Theme purchase', '9', 'theme purchase', 4668, '2020-04-24'),
(73, 'Broadband internet', '6', 'internet', 846, '2020-04-25'),
(74, 'bank expense', '3', 'bank expense', 8, '2020-04-25'),
(75, 'androz recharge', '9', 'domain renewal', 1350, '2020-05-01'),
(76, 'bank expense', '10', 'Bank Expense', 141, '2020-05-05'),
(77, 'Salary April 2020', '2', 'Salary April 2020', 84830, '2020-05-02'),
(78, 'Skylark hosting', '9', 'Hosting account', 2000, '2020-05-06'),
(79, 'Rent April', '5', 'April rent 2020', 9932, '2020-05-13'),
(80, 'Suryasilks Theme purchase', '9', 'Theme Purchase', 2474, '2020-05-19'),
(81, 'Broadband internet', '6', 'broadband recharge', 846, '2020-05-13'),
(82, 'skylark invoice', '9', 'Cpanel subscription', 176, '2020-05-19'),
(83, 'Brandize - TDS', '10', 'TDS', 5485, '2020-06-03'),
(84, 'Salary May 2020', '2', 'Salary', 62652, '2020-06-04'),
(85, 'Skylark hosting  renewal', '9', 'Hosting renewal', 11600, '2020-06-11'),
(86, 'Plugin purchase', '9', 'plugin', 3681, '2020-06-11'),
(87, 'salary june 2020', '2', 'salary june 2020', 56000, '2020-06-30'),
(88, 'upwork connect', '9', 'Upwork connect', 473, '2020-07-01'),
(89, 'salary july 2020', '2', 'salary july 2020', 56000, '2020-08-31'),
(90, 'bank expense', '3', 'bank exp', 432, '2020-08-04'),
(91, 'Theme Purchase', '9', 'theme purchase', 4547, '2020-08-01'),
(92, 'IAS academy theme purchase', '9', 'theme purchase', 3671, '2020-08-10'),
(93, 'Rent june july aug', '5', 'rent', 22875, '2020-09-01'),
(94, 'salary Aug', '2', 'salary aug', 56000, '2020-09-01'),
(95, 'dOMAIN renewAL', '9', 'domain renewal', 867, '2020-09-01'),
(96, 'Stalon paymeent', '2', 'Stalon magento', 30000, '2020-09-01'),
(97, 'stalon payment', '2', 'Stalon magento', 7500, '2020-09-16'),
(98, 'bank expense', '3', 'bank expense', 126, '2020-09-09'),
(99, 'Hosting expense', '9', 'VPN', 1500, '2020-09-18'),
(100, 'Service', '9', 'service', 2000, '2020-09-17'),
(101, 'Theme Purchase', '9', 'theme purchase', 3014, '2020-09-23'),
(102, 'Theme Purchase', '9', 'theme purchase', 1735, '2020-09-17'),
(103, 'Proficio Service', '10', 'proficio', 5050, '2020-09-18'),
(104, 'salary sep 2020', '2', 'salary', 61000, '2020-10-01'),
(105, 'stalon payment', '2', 'salary oct', 25000, '2020-10-17'),
(106, 'Theme purchase', '9', 'theme purchase', 6074, '2020-10-14'),
(107, 'Hosting expense', '9', 'hosting', 3000, '2020-10-15'),
(108, 'domain', '9', 'domain', 813, '2020-10-15'),
(109, 'BNI Expense', '8', 'BNI expense', 3500, '2020-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `expense_cateogry`
--

CREATE TABLE `expense_cateogry` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense_cateogry`
--

INSERT INTO `expense_cateogry` (`id`, `name`) VALUES
(1, 'Cleaning'),
(2, 'Salary'),
(3, 'Office Necessities'),
(4, 'Water'),
(5, 'Rent and Electricity'),
(6, 'Internet'),
(7, 'Travel Expense'),
(8, 'BNI Expense'),
(9, 'Project tools'),
(10, 'TDS');

-- --------------------------------------------------------

--
-- Table structure for table `fileUp`
--

CREATE TABLE `fileUp` (
  `id` int(13) NOT NULL,
  `enquiryId` varchar(50) NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade_members`
--

CREATE TABLE `grade_members` (
  `id` int(13) NOT NULL,
  `member_id` int(20) NOT NULL,
  `member_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `enquiryNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `projectId` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade_members`
--

INSERT INTO `grade_members` (`id`, `member_id`, `member_name`, `enquiryNo`, `grade`, `projectId`) VALUES
(6, 1, 'Sreejith', '1', '', '1'),
(2, 1, 'Sreejith', '2', '', '2'),
(3, 2, 'Tom', '2', '', '2'),
(4, 2, 'Tom', '3', '', '3'),
(7, 1, 'Sreejith', '7', '', '4'),
(8, 2, 'Tom', '10', '', '5'),
(9, 3, 'Nikhil', '10', '', '5'),
(10, 2, 'Tom', '11', '', '6'),
(11, 1, 'Sreejith', '12', '', '7'),
(12, 1, 'Sreejith', '13', '', '8'),
(13, 2, 'Tom', '13', '', '8'),
(14, 2, 'Tom', '14', '', '9'),
(15, 2, 'Tom', '15', '', '10'),
(16, 1, 'Sreejith', '16', '', '11'),
(17, 2, 'Tom', '17', '', '12'),
(18, 2, 'Tom', '19', '', '13'),
(19, 2, 'Tom', '20', '', '14'),
(20, 2, 'Tom', '21', '', '15'),
(21, 2, 'Tom', '22', '', '16'),
(22, 2, 'Tom', '23', '', '17'),
(23, 2, 'Tom', '24', '', '18'),
(24, 2, 'Tom', '25', '', '19'),
(25, 2, 'Tom', '26', '', '20'),
(26, 2, 'Tom', '27', '', '21'),
(27, 1, 'Sreejith', '28', '', '22'),
(28, 1, 'Sreejith', '29', '', '23'),
(29, 1, 'Sreejith', '15', '', '24'),
(30, 1, 'Sreejith', '30', '', '25'),
(31, 1, 'Sreejith', '31', '', '26'),
(32, 1, 'Sreejith', '32', '', '27'),
(33, 1, 'Sreejith', '33', '', '28');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_number`
--

CREATE TABLE `invoice_number` (
  `id` int(11) NOT NULL,
  `date` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_number`
--

INSERT INTO `invoice_number` (`id`, `date`, `number`) VALUES
(1, '2020-01-08', '1'),
(2, '2020-01-13', '1'),
(3, '2020-01-13', '2'),
(4, '2020-01-13', '3'),
(5, '2020-01-13', '4'),
(6, '2020-01-13', '5'),
(7, '2020-01-13', '6'),
(8, '2020-01-13', '7'),
(9, '2020-01-13', '8'),
(10, '2020-01-13', '9'),
(11, '2020-01-13', '10'),
(12, '2020-01-13', '11'),
(13, '2020-01-14', '1'),
(14, '2020-01-16', '1'),
(15, '2020-01-16', '2'),
(16, '2020-01-16', '3'),
(17, '2020-01-16', '4'),
(18, '2020-01-16', '5'),
(19, '2020-01-16', '6'),
(20, '2020-01-16', '7'),
(21, '2020-01-16', '8'),
(22, '2020-01-16', '9'),
(23, '2020-01-16', '10'),
(24, '2020-01-16', '11'),
(25, '2020-01-16', '12'),
(26, '2020-01-16', '13'),
(27, '2020-01-16', '14'),
(28, '2020-01-16', '15'),
(29, '2020-01-16', '16'),
(30, '2020-01-16', '17'),
(31, '2020-01-16', '18'),
(32, '2020-01-22', '1'),
(33, '2020-01-22', '2'),
(34, '2020-01-22', '3'),
(35, '2020-01-22', '4'),
(36, '2020-01-28', '1'),
(37, '2020-01-28', '2'),
(38, '2020-01-28', '3'),
(39, '2020-01-28', '4'),
(40, '2020-01-29', '1'),
(41, '2020-01-29', '2'),
(42, '2020-02-04', '1'),
(43, '2020-02-05', '1'),
(44, '2020-02-10', '1'),
(45, '2020-02-10', '2'),
(46, '2020-02-11', '1'),
(47, '2020-02-11', '2'),
(48, '2020-02-11', '3'),
(49, '2020-02-18', '1'),
(50, '2020-02-18', '2'),
(51, '2020-02-19', '1'),
(52, '2020-02-20', '1'),
(53, '2020-02-20', '2'),
(54, '2020-02-20', '3'),
(55, '2020-02-20', '4'),
(56, '2020-02-20', '5'),
(57, '2020-02-24', '1'),
(58, '2020-02-24', '2'),
(59, '2020-02-26', '1'),
(60, '2020-03-11', '1'),
(61, '2020-03-11', '2'),
(62, '2020-03-11', '3'),
(63, '2020-03-26', '1'),
(64, '2020-03-30', '1'),
(65, '2020-04-11', '1'),
(66, '2020-04-11', '2'),
(67, '2020-04-11', '3'),
(68, '2020-04-11', '4'),
(69, '2020-04-25', '1'),
(70, '2020-05-06', '1'),
(71, '2020-05-07', '1'),
(72, '2020-05-07', '2'),
(73, '2020-05-07', '3'),
(74, '2020-05-07', '4'),
(75, '2020-05-07', '5'),
(76, '2020-05-07', '6'),
(77, '2020-05-07', '7'),
(78, '2020-05-21', '1'),
(79, '2020-05-21', '2'),
(80, '2020-05-21', '3'),
(81, '2020-06-04', '1'),
(82, '2020-06-04', '2'),
(83, '2020-06-22', '1'),
(84, '2020-06-22', '2'),
(85, '2020-06-25', '1'),
(86, '2020-07-02', '1'),
(87, '2020-07-02', '2'),
(88, '2020-07-04', '1'),
(89, '2020-07-04', '2'),
(90, '2020-07-21', '1'),
(91, '2020-07-21', '2'),
(92, '2020-08-06', '1'),
(93, '2020-08-06', '2'),
(94, '2020-08-10', '1'),
(95, '2020-08-10', '2'),
(96, '2020-08-10', '3'),
(97, '2020-09-01', '1'),
(98, '2020-09-01', '2'),
(99, '2020-09-01', '3'),
(100, '2020-09-14', '1'),
(101, '2020-09-14', '2'),
(102, '2020-09-14', '3'),
(103, '2020-09-24', '1'),
(104, '2020-09-24', '2'),
(105, '2020-09-24', '3'),
(106, '2020-09-24', '4'),
(107, '2020-09-24', '5'),
(108, '2020-09-29', '1'),
(109, '2020-09-29', '2'),
(110, '2020-10-01', '1'),
(111, '2020-10-21', '1'),
(112, '2020-10-22', '1'),
(113, '2020-10-22', '2'),
(114, '2020-10-31', '1'),
(115, '2020-10-31', '2');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_pdf`
--

CREATE TABLE `invoice_pdf` (
  `id` int(10) NOT NULL,
  `project_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_pdf` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_due_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `totalInvoiceAmount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_pdf`
--

INSERT INTO `invoice_pdf` (`id`, `project_id`, `invoice_pdf`, `payment_due_date`, `currency`, `totalInvoiceAmount`, `status`) VALUES
(11, '5', '', '2020-09-01', 'INR', '9000', '1'),
(10, '2', '', '2020-01-28', 'INR', '111500', '1'),
(15, '5', '', '2020-03-11', 'INR', '6000', '1'),
(16, '5', '', '2020-02-20', 'INR', '1500', '1'),
(17, '5', '', '2020-02-24', 'INR', '4500', '1'),
(18, '5', '', '2020-04-11', 'INR', '5000', '1'),
(37, '3', 'INV202001282.pdf', '2020-01-28', 'INR', '109500', '1'),
(59, '5', 'INV202002261.pdf', '2020-02-26', 'INR', '24000', '1'),
(20, '5', '', '2020-10-21', 'INR', '12000', '1'),
(55, '5', 'INV202002204.pdf', '2020-02-20', 'INR', '5000', '1'),
(23, '5', '', '2020-06-11', 'INR', '9000', '1'),
(28, '5', 'INV2020011615.pdf', '2020-10-15', 'INR', '3500', '1'),
(31, '6', 'INV2020011618.pdf', '2020-01-28', 'INR', '2500', '1'),
(32, '7', 'INV202001221.pdf', '2020-01-24', 'INR', '3740', '1'),
(29, '5', 'INV2020011616.pdf', '2020-01-16', 'INR', '15000', '1'),
(33, '1', 'INV202001222.pdf', '2020-01-22', 'INR', '28540', '1'),
(34, '5', 'INV202001223.pdf', '2020-01-22', 'INR', '18000', '1'),
(103, '13', 'INV202009241.pdf', '2020-09-24', 'INR', '12000', '1'),
(39, '10', 'INV202001284.pdf', '2020-01-28', 'INR', '22500', '1'),
(40, '5', 'INV202001291.pdf', '2020-01-29', 'INR', '4500', '1'),
(41, '11', 'INV202001292.pdf', '2020-01-29', 'INR', '5000', '1'),
(58, '17', 'INV202002242.pdf', '2020-02-24', 'INR', '2240', '1'),
(44, '12', 'INV202002101.pdf', '2020-02-10', 'INR', '15000', '1'),
(49, '14', 'INV202002181.pdf', '2020-02-18', 'INR', '16500', '1'),
(46, '13', 'INV202002111.pdf', '2020-02-11', 'INR', '20000', '1'),
(48, '5', 'INV202002113.pdf', '2020-02-11', 'INR', '6000', '1'),
(51, '2', 'INV202002191.pdf', '2020-02-18', 'INR', '14000', '1'),
(52, '15', 'INV202002201.pdf', '2020-02-20', 'INR', '20000', '1'),
(60, '5', 'INV202003111.pdf', '2020-03-11', 'INR', '3000', '1'),
(104, '14', 'INV202009242.pdf', '2020-09-12', 'INR', '12467', '1'),
(56, '5', 'INV202002205.pdf', '2020-02-20', 'INR', '3000', '1'),
(57, '8', 'INV202002241.pdf', '2020-02-05', 'INR', '12000', '1'),
(62, '5', 'INV202003113.pdf', '2020-03-11', 'INR', '5000', '1'),
(63, '2', 'INV202003261.pdf', '2020-03-25', 'INR', '8100', '1'),
(64, '2', 'INV202003301.pdf', '2020-03-27', 'INR', '1474', '1'),
(65, '5', 'INV202004111.pdf', '2020-04-11', 'INR', '1500', '1'),
(66, '18', 'INV202004112.pdf', '2020-04-11', 'INR', '9000', '1'),
(67, '2', 'INV202004113.pdf', '2020-04-11', 'INR', '10000', '1'),
(68, '2', 'INV202004114.pdf', '2020-04-11', 'INR', '31000', ''),
(69, '19', 'INV202004251.pdf', '2020-04-24', 'INR', '5000', '1'),
(77, '5', 'INV202005077.pdf', '2020-05-07', 'INR', '1500', '1'),
(76, '5', 'INV202005076.pdf', '2020-05-07', 'INR', '24000', '1'),
(72, '20', 'INV202005072.pdf', '2020-05-07', 'INR', '5000', '1'),
(73, '21', 'INV202005073.pdf', '2020-05-06', 'INR', '3102', '1'),
(75, '2', 'INV202005075.pdf', '2020-05-07', 'INR', '5000', '1'),
(78, '22', 'INV202005211.pdf', '2020-05-16', 'INR', '12000', '1'),
(79, '2', 'INV202005212.pdf', '2020-05-21', 'INR', '5000', '1'),
(80, '21', 'INV202005213.pdf', '2020-05-20', 'INR', '8913', '1'),
(81, '21', 'INV202006041.pdf', '2020-06-03', 'INR', '5500', '1'),
(82, '5', 'INV202006042.pdf', '2020-06-04', 'INR', '3000', ''),
(83, '23', 'INV202006221.pdf', '2020-06-11', 'INR', '14500', '1'),
(88, '2', 'INV202007041.pdf', '2020-07-01', 'INR', '25000', '1'),
(85, '5', 'INV202006251.pdf', '2020-06-24', 'INR', '1500', '1'),
(89, '24', 'INV202007042.pdf', '2020-07-04', 'INR', '20000', '1'),
(96, '14', 'INV202008103.pdf', '2020-08-06', 'INR', '20000', '1'),
(90, '5', 'INV202007211.pdf', '2020-08-01', 'INR', '24000', '1'),
(91, '5', 'INV202007212.pdf', '2020-07-20', 'INR', '3000', ''),
(92, '25', 'INV202008061.pdf', '2020-07-22', 'INR', '10000', '1'),
(93, '7', 'INV202008062.pdf', '2020-08-05', 'INR', '2900', '1'),
(94, '26', 'INV202008101.pdf', '2020-08-08', 'INR', '10000', '1'),
(95, '27', 'INV202008102.pdf', '2020-08-07', 'INR', '30906', '1'),
(97, '11', 'INV202009011.pdf', '2020-09-01', 'INR', '10000', '1'),
(98, '11', 'INV202009012.pdf', '2020-09-01', 'INR', '8106', '1'),
(99, '11', 'INV202009013.pdf', '2020-09-01', 'INR', '4012', '1'),
(114, '24', 'INV202010311.pdf', '2020-10-15', 'INR', '30000', '1'),
(101, '13', 'INV202009142.pdf', '2020-09-14', 'INR', '10000', '1'),
(108, '27', 'INV202009291.pdf', '2020-09-18', 'INR', '48877', '1'),
(105, '7', 'INV202009243.pdf', '2020-09-16', 'INR', '3200', '1'),
(106, '7', 'INV202009244.pdf', '2020-09-16', 'INR', '1000', '1'),
(115, '28', 'INV202010312.pdf', '2020-10-15', 'INR', '7000', '1'),
(109, '20', 'INV202009292.pdf', '2020-09-23', 'INR', '7000', '1'),
(110, '7', 'INV202010011.pdf', '2020-10-01', 'INR', '5000', '1'),
(111, '5', 'INV202010211.pdf', '2020-10-21', 'INR', '24000', ''),
(112, '25', 'INV202010221.pdf', '2020-10-21', 'INR', '15000', ''),
(113, '20', 'INV202010222.pdf', '2020-10-21', 'INR', '16000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mailSendContacts`
--

CREATE TABLE `mailSendContacts` (
  `id` int(10) NOT NULL,
  `project_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `personName` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mailSendContacts`
--

INSERT INTO `mailSendContacts` (`id`, `project_id`, `contactPerson`, `personName`) VALUES
(1, '1', '1', 'Yunus'),
(2, '2', '1', 'Yunus'),
(3, '3', '2', 'Nijoe varkey'),
(4, '4', '5', 'Pradeesh'),
(5, '5', '7', 'Jimmy'),
(6, '6', '9', 'John'),
(7, '7', '10', 'Sumathy'),
(8, '8', '11', 'Aneesh'),
(9, '9', '2', 'Nijoe varkey'),
(10, '10', '2', 'Nijoe varkey'),
(11, '11', '12', 'diffin'),
(12, '12', '13', 'Prakash'),
(13, '13', '14', 'Roger'),
(14, '14', '15', 'centersource - John'),
(15, '15', '7', 'Jimmy'),
(16, '16', '17', 'Aneesh - Royal'),
(17, '17', '2', 'Nijoe varkey'),
(18, '18', '18', 'Difin'),
(19, '19', '19', 'Remo'),
(20, '20', '20', 'rajesh'),
(21, '21', '21', 'John'),
(22, '22', '2', 'Nijoe varkey'),
(23, '23', '22', 'Sreeju'),
(24, '24', '2', 'Nijoe varkey'),
(25, '25', '23', 'majid'),
(26, '26', '24', 'Edward'),
(27, '27', '25', 'patrick'),
(28, '28', '26', 'Hari');

-- --------------------------------------------------------

--
-- Table structure for table `project_document_form`
--

CREATE TABLE `project_document_form` (
  `id` int(11) NOT NULL,
  `enquiry_id` int(11) NOT NULL,
  `bd_form_field_id` int(11) NOT NULL,
  `prompt_answer` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_invoice`
--

CREATE TABLE `project_invoice` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `invoicePdf_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_invoice`
--

INSERT INTO `project_invoice` (`id`, `description`, `quantity`, `invoicePdf_id`, `amount`, `project_id`) VALUES
(50, 'HTML Work', '1', '37', '22000', '3'),
(10, 'CS cart Development , Theme integration &amp; Customization ( 1.5 Months )', '1', '10', '106000', '2'),
(11, 'Theme purchase', '1', '10', '5500', '2'),
(12, 'ISC Mailer', '1', '11', '9000', '5'),
(76, 'Pages Creation and new forms', '1', '55', '5000', '5'),
(59, 'Web Development ( Phase 1 - Advance payment )', '1', '44', '15000', '12'),
(80, 'Linux hosting 1GB', '1', '58', '1500', '17'),
(57, '', '', '42', '', 'Select'),
(81, 'Cpanel', '1', '58', '240', '17'),
(56, 'Advance Payment ( Domain + hosting )', '1', '41', '5000', '11'),
(55, 'ISC Mailer -- innovation Mailer -- (28-1-2020)', '1', '40', '1500', '5'),
(54, 'ISC Mailer -- Cumin Mailer -- (23-1-2020)', '1', '40', '1500', '5'),
(53, 'ISC Mailer -- Sponsor mailer -- (21-01-2020)', '1', '40', '1500', '5'),
(52, 'Web Development', '1', '39', '22500', '10'),
(136, 'web development - Final', '1', '103', '12000', '13'),
(49, 'Development Tasks', '1', '37', '87500', '3'),
(25, 'ISC Mailer', '1', '15', '6000', '5'),
(26, 'ISC Mailer', '1', '16', '1500', '5'),
(27, 'Taicon mailer ', '1', '17', '4500', '5'),
(28, 'ISc Mailer', '1', '18', '5000', '5'),
(29, 'ISC Mailer', '1', '19', '18000', 'Select'),
(30, 'scms Update', '1', '20', '12000', '5'),
(46, 'ISC Mailer', '1', '34', '18000', '5'),
(33, 'ISC Mailer', '1', '23', '9000', '5'),
(38, 'ISC Mailer', '1', '28', '3500', '5'),
(39, 'ISC Mailer', '1', '29', '15000', '5'),
(42, 'Domain & Hosting Renewal', '1', '32', '3500', '7'),
(41, 'Domain & Hosting Registration for ICMS', '1', '31', '2500', '6'),
(43, 'Cpanel Subscription', '1', '32', '240', '7'),
(44, 'Subscription Module', '1', '33', '25000', '1'),
(45, 'Domain & Hosting', '1', '33', '3540', '1'),
(61, 'Web Development -- Phase 2 - Advance', '1', '46', '20000', '13'),
(63, 'ISC Mailer -- Speaker mailer 6 -- (30-01-2020)', '1', '48', '1500', '5'),
(64, 'ISC Mailer -- Speaker mailer -- (04-02-2020)', '1', '48', '1500', '5'),
(65, 'Blastline Mailer -- (10-02-2020)', '1', '48', '1500', '5'),
(66, 'Fssai mailer -- (11-02-2020)', '1', '48', '1500', '5'),
(67, 'Website Development  ', '1', '49', '16500', '14'),
(71, 'SSL purchase for subscription module', '1', '51', '6000', '2'),
(70, 'Additional customization', '1', '51', '8000', '2'),
(72, 'Akay - Web development ( Advance )', '1', '52', '20000', '15'),
(85, 'Blastline institute Mailer', '1', '60', '1500', '5'),
(84, 'ISC Mailer -- Speaker mailer 9-- (21-02-2020)', '1', '60', '1500', '5'),
(77, 'ISC Mailer -- Speaker mailer -- (18-02-2020)', '1', '56', '1500', '5'),
(78, 'ISC Mailer -- Buyer seller meet -- (20 -02-2020)', '1', '56', '1500', '5'),
(79, 'issue fixes & wordpress update', '1', '57', '12000', '8'),
(82, 'Website Setup', '1', '58', '500', '17'),
(83, 'SCMS Annual maintenance ( 3 months ) ( Feb, March, April )', '1', '59', '24000', '5'),
(87, 'Presentation Module', '1', '62', '5000', '5'),
(88, 'Hostgator VPS Account', '1', '63', '8100', '2'),
(89, 'Hostgator VPS Account', '1', '64', '1474', '2'),
(90, 'Blastline mailer', '1', '65', '1500', '5'),
(91, 'Website Development', '1', '66', '9000', '18'),
(92, 'Smartowl Website Development ( 75% Payment )', '1', '67', '10000', '2'),
(93, 'Server Set up + Deployment to Live + Other customization as per requirement.', '1', '68', '8000', '2'),
(94, 'Ewire - Credopay Payment Module Plugin Development', '1', '68', '20000', '2'),
(95, 'Loose product - unit price Plugin purchase', '1', '68', '3000', '2'),
(96, 'Web development - Advance', '1', '69', '5000', '19'),
(104, 'Blastline Mailer - May 2', '1', '77', '1500', '5'),
(103, 'SCMS Annual maintenance ( 3 months ) ( May, June, July )', '1', '76', '24000', '5'),
(99, 'Advance', '1', '72', '5000', '20'),
(100, 'Domain Renewal', '1', '73', '3102', '21'),
(102, 'Smartowl Website Development ( Final Payment )', '1', '75', '5000', '2'),
(105, 'SamsonMedlin', '1', '78', '12000', '22'),
(106, 'Smartowl Website Development ( additional work )', '1', '79', '5000', '2'),
(107, 'gogreencarebian Domain', '1', '80', '2733', '21'),
(108, 'hosting subscription', '1', '80', '6180', '21'),
(109, 'upwork - works', '1', '81', '5500', '21'),
(110, 'Blastline Mailer - may 22', '1', '82', '1500', '5'),
(111, 'Mask Mailer - may 29', '1', '82', '1500', '5'),
(112, 'Website Development', '1', '83', '14500', '23'),
(119, 'web misc works', '1', '89', '20000', '24'),
(118, 'Invoicing and expiry module development with Ewirepg', '1', '88', '25000', '2'),
(115, 'Muthoot Mailer', '1', '85', '1500', '5'),
(127, 'Nadilath magento website Updates', '1', '96', '20000', '14'),
(120, 'SCMS Annual maintenance ( 3 months ) ( Aug, Sep, Oct )', '1', '90', '24000', '5'),
(121, 'Blastline Mailer - 8July', '1', '91', '1500', '5'),
(122, 'Blastline Mailer - 14 July', '1', '91', '1500', '5'),
(123, 'Web development - Advance', '1', '92', '10000', '25'),
(124, 'homefin - hosting subscription', '1', '93', '2900', '7'),
(125, 'Web development - Advance', '1', '94', '10000', '26'),
(126, 'SATIVEA updates ( 27.5 Hours )', '1', '95', '30906', '27'),
(128, 'Web development ', '1', '97', '10000', '11'),
(129, 'web desvelopment', '1', '98', '8106', '11'),
(130, 'Web development ', '1', '99', '4012', '11'),
(148, 'Web development ', '1', '114', '30000', '24'),
(132, 'Refit - Web development ( Domain, Hosting + Advance )', '1', '101', '10000', '13'),
(143, 'cwatchimpex', '1', '110', '5000', '7'),
(142, 'sysmantec updates', '1', '109', '7000', '20'),
(141, 'Zorro', '1', '108', '48877', '27'),
(137, 'web updates', '1', '104', '12467', '14'),
(138, 'Madhuvarshini Domain and hosting', '1', '105', '3200', '7'),
(139, 'Shadowine Work', '1', '106', '1000', '7'),
(144, 'SCMS Annual maintenance ( 3 months ) ( Nov, Dec, Jan)', '1', '111', '24000', '5'),
(145, 'Web development - Payment ', '1', '112', '15000', '25'),
(146, 'Store module development', '1', '113', '13000', '20'),
(147, 'Instamojo development', '1', '113', '3000', '20'),
(149, 'Web development - Advance', '1', '115', '7000', '28');

-- --------------------------------------------------------

--
-- Table structure for table `project_shedule`
--

CREATE TABLE `project_shedule` (
  `id` int(13) NOT NULL,
  `enquiryNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `client` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `projectNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `projectTitle` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `team` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `estimatedBudget` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '1="Active" ,0="not Active"',
  `deliveryDate` date NOT NULL,
  `billNo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `billDate` date NOT NULL,
  `Income` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clientFeedBack` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `brp_grade` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `workingStatus` int(1) NOT NULL DEFAULT '0',
  `clientStatus` int(1) NOT NULL DEFAULT '0',
  `invoice_pdf` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `payment_due_date` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_shedule`
--

INSERT INTO `project_shedule` (`id`, `enquiryNo`, `date`, `client`, `contactPerson`, `projectNumber`, `projectTitle`, `category`, `team`, `deadline`, `estimatedBudget`, `status`, `deliveryDate`, `billNo`, `billDate`, `Income`, `clientFeedBack`, `brp_grade`, `created`, `modified`, `workingStatus`, `clientStatus`, `invoice_pdf`, `payment_due_date`, `currency`) VALUES
(1, '1', '01/06/2020', '1', '1', 'PN - 1', 'Admin & Front End - Subscription', '1', '1', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-06 07:38:54', '2020-01-13 06:32:51', 0, 0, '', '', ''),
(2, '2', '01/06/2020', '1', '1', 'PN - 2', 'CS Cart', '2', '1,2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-06 08:00:44', '0000-00-00 00:00:00', 0, 0, '', '2020-01-10', 'INR'),
(3, '3', '01/06/2020', '2', '2', 'PN - 3', 'Quadspire', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-06 08:05:04', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(4, '7', '01/08/2020', '4', '5', 'PN - 4', 'BarqIT - Website Development', '1', '1', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-08 04:23:12', '2020-01-13 07:01:42', 0, 0, '', '', ''),
(5, '10', '01/13/2020', '5', '7', 'PN - 5', 'ISC & processflow Updates', '1', '2,3', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-13 07:13:34', '0000-00-00 00:00:00', 0, 0, '', '2020-01-17', 'INR'),
(6, '11', '01/16/2020', '6', '9', 'PN - 6', 'Domain & Hosting IMCS.ORG', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-16 10:48:16', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(7, '12', '01/22/2020', '7', '10', 'PN - 7', 'Domain & Hosting', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-22 04:11:06', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(8, '13', '01/27/2020', '8', '11', 'PN - 8', 'KPI Issue fixes and wordpress Update', '1', '1,2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-27 09:08:31', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(9, '14', '01/28/2020', '2', '2', 'PN - 9', 'Integrity Taxation', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-28 03:46:58', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(10, '15', '01/28/2020', '2', '2', 'PN - 10', 'BestPower', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-28 03:52:55', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(11, '16', '01/29/2020', '9', '12', 'PN - 11', 'Website Developement', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-29 10:37:38', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(12, '17', '01/30/2020', '10', '13', 'PN - 12', 'catering website development', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-01-30 01:44:25', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(13, '19', '02/11/2020', '11', '14', 'PN - 13', 'Vazhappilly Web Development', '3', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-02-11 03:35:04', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(14, '20', '02/18/2020', '12', '15', 'PN - 14', 'Nadilath magento website Updates', '2', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-02-18 09:47:08', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(15, '21', '02/20/2020', '5', '7', 'PN - 15', 'Akay - Website Development', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-02-20 00:37:20', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(16, '22', '02/20/2020', '14', '17', 'PN - 16', 'Royal - domain and hosting renewal', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-02-20 01:10:12', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(17, '23', '02/24/2020', '2', '2', 'PN - 17', 'clinexservices Project Hosting and setup', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-02-24 07:05:26', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(18, '24', '04/11/2020', '15', '18', 'PN - 18', 'Casabella Web development', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-04-11 01:35:00', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(19, '25', '04/25/2020', '16', '19', 'PN - 19', 'Remo and Sam web development', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-04-25 06:26:17', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(20, '26', '05/07/2020', '17', '20', 'PN - 20', 'ITKerala Website Development', '2', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-05-07 00:07:52', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(21, '27', '05/07/2020', '18', '21', 'PN - 21', 'Domain Renewal', '1', '2', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-05-07 00:11:54', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(22, '28', '05/21/2020', '2', '2', 'PN - 22', 'Samson medlin', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-05-21 02:04:17', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(23, '29', '06/22/2020', '19', '22', 'PN - 23', 'associate - web development', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-06-22 10:20:36', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(24, '15', '07/04/2020', '2', '2', 'PN - 24', 'Web development - Dinero', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-07-04 08:54:07', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(25, '30', '08/06/2020', '21', '23', 'PN - 25', 'Cwtchimpex Website', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-08-06 04:24:22', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(26, '31', '08/10/2020', '22', '24', 'PN - 26', 'reyaglobal Website development', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-08-10 09:45:37', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(27, '32', '08/10/2020', '23', '25', 'PN - 27', 'magento Development', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-08-10 10:02:02', '0000-00-00 00:00:00', 0, 0, '', '', ''),
(28, '33', '10/31/2020', '24', '26', 'PN - 28', 'Edge Magento development', '1', '1', '0000-00-00', '', '1', '0000-00-00', '', '0000-00-00', '', '', '', '2020-10-31 09:37:12', '0000-00-00 00:00:00', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `startDate` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `amount`, `startDate`) VALUES
(2, 546924, '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(3, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '117.217.206.180', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(5, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(6, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(9, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(12, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.88', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(13, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '202.88.250.76', 'Chrome 78.0.3904.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(14, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '202.88.250.76', 'Chrome 78.0.3904.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(15, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '202.88.250.76', 'Chrome 78.0.3904.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(16, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(17, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(18, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(19, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(20, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(21, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '202.88.250.124', 'Chrome 78.0.3904.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(22, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(23, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '202.88.250.124', 'Chrome 78.0.3904.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(24, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(25, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(26, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(27, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(28, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(29, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(30, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(31, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(32, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(33, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '202.88.250.76', 'Chrome 78.0.3904.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(34, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(35, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.117', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(36, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(37, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '202.88.250.100', 'Chrome 78.0.3904.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(38, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(39, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(40, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(41, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(42, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(43, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(44, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(45, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(46, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(47, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(48, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(49, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '202.88.250.100', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(50, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '98.169.58.137', 'Chrome 79.0.3945.136', 'Mozilla/5.0 (Linux; Android 9; XT1687) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36', 'Android', '0000-00-00 00:00:00'),
(51, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(52, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 79.0.3945.130', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(53, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(54, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(55, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(56, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(57, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(58, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.100', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.100 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(59, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.45.141', 'Chrome 80.0.3987.100', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.100 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(60, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '106.200.6.230', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(61, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.106', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(62, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(63, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(64, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(65, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(66, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(67, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(68, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(69, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(70, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(71, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(72, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.116', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(73, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(74, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(75, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(76, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(77, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.100', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(78, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(79, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(80, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(81, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(82, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(83, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(84, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 8', '0000-00-00 00:00:00'),
(85, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(86, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(87, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '202.88.250.124', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(88, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.122', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(89, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(90, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.76', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(91, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '202.88.250.124', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(92, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.83.52', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(93, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.117.249', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(94, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.69.140', 'Chrome 80.0.3987.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(95, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.172.167', 'Chrome 80.0.3987.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(96, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.104.125', 'Chrome 80.0.3987.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(97, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.98.61', 'Chrome 80.0.3987.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(98, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.161.112', 'Chrome 80.0.3987.163', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(99, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '27.62.85.39', 'Chrome 80.0.3987.163', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(100, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.87.181', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(101, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '98.169.58.137', 'Chrome 80.0.3987.149', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'Mac OS X', '0000-00-00 00:00:00'),
(102, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '98.169.58.137', 'Chrome 80.0.3987.149', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'Mac OS X', '0000-00-00 00:00:00'),
(103, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '98.169.58.137', 'Chrome 80.0.3987.149', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'Mac OS X', '0000-00-00 00:00:00'),
(104, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.132.123', 'Chrome 80.0.3987.163', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(105, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.112.190', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(106, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '103.148.21.86', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(107, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.104.217', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 7S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', 'Android', '0000-00-00 00:00:00'),
(108, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.167.177', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(109, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.94.57', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(110, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '27.61.51.113', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (Windows NT 6.1; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Windows 7', '0000-00-00 00:00:00'),
(111, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.173.242', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(112, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '43.229.88.250', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(113, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '98.169.58.137', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Mac OS X', '0000-00-00 00:00:00'),
(114, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '103.148.20.151', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(115, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.149.163', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 7S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', 'Android', '0000-00-00 00:00:00'),
(116, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.145.19', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(117, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.145.19', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(118, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.145.19', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(119, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.219.162', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(120, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.211.224', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 7S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', 'Android', '0000-00-00 00:00:00'),
(121, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.211.224', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(122, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.211.224', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 7S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', 'Android', '0000-00-00 00:00:00'),
(123, 2, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"John\"}', '103.148.20.227', 'Chrome 80.0.3987.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'Linux', '0000-00-00 00:00:00'),
(124, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.211.224', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 7S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', 'Android', '0000-00-00 00:00:00'),
(125, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '137.97.190.106', 'Chrome 80.0.3987.132', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 7S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', 'Android', '0000-00-00 00:00:00'),
(126, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.162.245', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(127, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.187.242', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(128, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.197.17', 'Chrome 84.0.4147.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(129, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.169.17', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(130, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.169.17', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(131, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.207.19', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(132, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.130.88', 'Chrome 85.0.4183.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(133, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.130.88', 'Chrome 85.0.4183.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(134, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.130.191', 'Chrome 85.0.4183.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(135, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.167.161', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(136, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.167.161', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(137, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.44.167.161', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(138, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '106.216.136.228', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(139, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '42.109.156.154', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(140, 4, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Ashin\"}', '98.169.49.29', 'Chrome 86.0.4240.111', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'Mac OS X', '0000-00-00 00:00:00'),
(141, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Subeesh.k\"}', '157.46.158.105', 'Chrome 86.0.4240.111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `userId` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`userId`, `name`, `email`, `mobile`, `designation`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'Sreejith', 'sreejith.kongolil@pioneercodes.com', '9544221676', 'Web Developer', 0, 1, '2020-01-06 07:32:23', NULL, NULL),
(2, 'Tom', 'tom.jose@pioneercodes.com', '9947028209', 'Web Developer', 0, 1, '2020-01-06 07:34:13', NULL, NULL),
(3, 'Nikhil', 'nikhil@pioneercodes.com', '8138846389', 'Web Developer', 0, 1, '2020-01-06 07:35:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `logo` varchar(500) NOT NULL,
  `company_name` text NOT NULL,
  `company_address` text NOT NULL,
  `bank_details` text NOT NULL,
  `paypal_email` varchar(500) NOT NULL,
  `company_phone1` varchar(200) NOT NULL,
  `company_phone2` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `logo`, `company_name`, `company_address`, `bank_details`, `paypal_email`, `company_phone1`, `company_phone2`) VALUES
(1, 'subeesh.k@pioneercodes.com', '$2y$10$XWoV2wPMb6rShENjqvDyOOBKX6Vr.FclJxSpo2fq1FbLrknJj7tvO', 'Subeesh.k', '9539847940', 1, 0, 0, '2020-01-14 00:00:00', 1, '2020-01-13 05:20:07', 'logo.png', 'Pioneercodes', '32/874, A2 Pallichambal\r\nRoad, Palarivattom, Kochi,\r\nKerala – 682025\r\n', '<p>Bank Account (HDFC Current)</p>\r\n<p>Ac.No: 50200013632188</p>\r\n<p>Bank: HDFC Bank</p>\r\n<p>IFSC Code: HDFC0001286</p>\r\n<p>Branch: Edappally</p>\r\n<p>Ac. Holder: Pioneercodes Technologies Solutions LLP</p>', 'pioneercodes@gmail.com', '', ''),
(2, 'john.varghese@pioneercodes.com', '$2y$10$XWoV2wPMb6rShENjqvDyOOBKX6Vr.FclJxSpo2fq1FbLrknJj7tvO', 'John', '9995326368', 1, 0, 1, '2020-01-06 07:29:57', NULL, NULL, '', '', '', '', '', '', ''),
(3, 'info@pioneercodes.com', '$2y$10$aIWyOfo.AJFm/aGp09zPxuF/gK4vG3WV0qO5KcQLTm2Ai5vEbfZXG', 'Subeesh', '9539847940', 2, 0, 1, '2020-01-07 08:08:35', NULL, NULL, '', '', '', '', '', '', ''),
(4, 'ashin.ignatius@pioneercodes.com', '$2y$10$av/Le5J6mXQI9vB3IFXzx.g4ITC/seP2QyNMrdsu4mscAIMRJg2iW', 'Ashin', '2093616415', 1, 0, 1, '2020-01-06 07:29:57', 4, '2020-04-18 18:30:12', 'logo.png', 'Pioneercodes LLC', '7616 Matera St\r\nFalls Church\r\nVA-22043', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bd_form`
--
ALTER TABLE `bd_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverables`
--
ALTER TABLE `deliverables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_shedule`
--
ALTER TABLE `delivery_shedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_cateogry`
--
ALTER TABLE `expense_cateogry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileUp`
--
ALTER TABLE `fileUp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_members`
--
ALTER TABLE `grade_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_number`
--
ALTER TABLE `invoice_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_pdf`
--
ALTER TABLE `invoice_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailSendContacts`
--
ALTER TABLE `mailSendContacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_document_form`
--
ALTER TABLE `project_document_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_invoice`
--
ALTER TABLE `project_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_shedule`
--
ALTER TABLE `project_shedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bd_form`
--
ALTER TABLE `bd_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `deliverables`
--
ALTER TABLE `deliverables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_shedule`
--
ALTER TABLE `delivery_shedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `expense_cateogry`
--
ALTER TABLE `expense_cateogry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fileUp`
--
ALTER TABLE `fileUp`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_members`
--
ALTER TABLE `grade_members`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `invoice_number`
--
ALTER TABLE `invoice_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `invoice_pdf`
--
ALTER TABLE `invoice_pdf`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `mailSendContacts`
--
ALTER TABLE `mailSendContacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_document_form`
--
ALTER TABLE `project_document_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_invoice`
--
ALTER TABLE `project_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `project_shedule`
--
ALTER TABLE `project_shedule`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
