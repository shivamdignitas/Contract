-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2018 at 12:27 PM
-- Server version: 5.6.29-76.2-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccsqadig_testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dd_client`
--

CREATE TABLE IF NOT EXISTS `dd_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(30) NOT NULL,
  `client_spoc` varchar(30) NOT NULL,
  `client_email_address` varchar(50) NOT NULL,
  `client_contact_no` bigint(20) NOT NULL,
  `client_pan` varchar(15) NOT NULL,
  `client_gstn` longtext NOT NULL,
  `client_gstn_name` longtext NOT NULL,
  `client_billing_address` varchar(100) NOT NULL,
  `client_payment_terms` int(50) NOT NULL,
  `client_recurring` tinyint(1) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dd_client`
--

INSERT INTO `dd_client` (`client_id`, `client_name`, `client_spoc`, `client_email_address`, `client_contact_no`, `client_pan`, `client_gstn`, `client_gstn_name`, `client_billing_address`, `client_payment_terms`, `client_recurring`) VALUES
(1, 'Dignitas Digital', 'Rishi Rais', 'himanshu@dignitasdigital.com', 7289928146, 'AKSPT4433F', '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', 'dd_c2.pdf', '1/4 Tilak Nagar', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dd_contract_history`
--

CREATE TABLE IF NOT EXISTS `dd_contract_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `contract_name` varchar(30) NOT NULL,
  `history` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dd_contract_history`
--

INSERT INTO `dd_contract_history` (`id`, `contract_id`, `contract_name`, `history`, `name`) VALUES
(1, 1, 'Digital Marketing Services', 1523854098, 'dd_c1_1523854098.pdf'),
(2, 1, 'Digital Marketing Services', 1523858594, 'dd_c1_1523858594.pdf'),
(3, 1, 'Digital Marketing Services', 1523876798, 'dd_c1_1523876798.pdf'),
(4, 1, 'Digital Marketing Services', 1523878020, 'dd_c1_1523878020.pdf'),
(5, 1, 'Digital Marketing Services', 1523878535, 'dd_c1_1523878535.pdf'),
(6, 1, 'Digital Marketing Services', 1523901163, 'dd_c1_1523901163.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dd_contract_main`
--

CREATE TABLE IF NOT EXISTS `dd_contract_main` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `contract_name` varchar(50) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `contract_description` varchar(100) NOT NULL,
  `contract_type` varchar(11) DEFAULT NULL,
  `contract_status` varchar(15) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`contract_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dd_contract_main`
--

INSERT INTO `dd_contract_main` (`contract_id`, `client_id`, `contract_name`, `contract_start_date`, `contract_end_date`, `contract_description`, `contract_type`, `contract_status`, `is_deleted`, `last_modified`) VALUES
(1, 1, 'Digital Marketing Services', '2018-03-31', '2018-07-01', '', '1', '0', 0, 1523901163);

-- --------------------------------------------------------

--
-- Table structure for table `dd_legal`
--

CREATE TABLE IF NOT EXISTS `dd_legal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dd_legal`
--

INSERT INTO `dd_legal` (`id`, `name`) VALUES
(1, 'To pay Dignitas Digital the amounts shown in this estimate in consideration of and for the services performed and\\/or purchases made on Client\\''s behalf under this estimate agreement within 10 days of date of issue on the invoice.  If Dignitas Digital is required to retain the services of an attorney to collect any unpaid invoice \\(after serving three written or emailed notices\\), Client agrees to reimburse Dignitas Digital for its costs of collection. Payment to be made in the name of the Agency. In case of any dispute relating to the payment, terms and conditions or any other kind, jurisdiction of Court in Delhi will be applicable'),
(2, 'To indemnify Dignitas Digital for all third party purchases (media, photography, printing, software modules etc.)  authorized by Client\\''s signature under this agreement.  In the case of project cancellation this means Client is responsible for all costs and liabilities (including time, cancellation fees and any media "short rates") incurred up until Client cancels (unless other cancellation terms have been agreed to in writing) with the understanding that such cancellation costs will not exceed '),
(3, 'The price mentioned in this quote is in Indian Rupees.'),
(4, 'The client will pay for any gift items/sweepstakes awards/giveaways that may be used for promotion on social media channels'),
(5, 'The pricing mentioned in this quote is bulk pricing based on the project. The pricing is not for any individual components, but is based on milestones as mentioned'),
(6, 'To allow Dignitas Digital to legally use clients logo and name on dignitasdigital.com stating the project, if desired.'),
(7, 'To assume all responsibility for the accuracy of any and all information and materials supplied by Client to Dignitas Digital, including information about their ownership, and to indemnify and defend Dignitas Digital from all claims and damages resulting from Dignitas Digital\\''s use of such materials in Client\\''s projects.  Dignitas Digital will, in turn, do the same for Client in regard to any other information and materials Dignitas Digital provides as part of this project.'),
(8, 'Estimate terms may only be modified by replacing this estimate with a new estimate.');

-- --------------------------------------------------------

--
-- Table structure for table `dd_legal_mapping`
--

CREATE TABLE IF NOT EXISTS `dd_legal_mapping` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `legal_id` int(11) NOT NULL,
  `legal_name` varchar(800) NOT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `dd_legal_mapping`
--

INSERT INTO `dd_legal_mapping` (`map_id`, `contract_id`, `legal_id`, `legal_name`) VALUES
(40, 1, 1, 'To pay Dignitas Digital the amounts shown in this estimate in consideration of and for the services performed and/or purchases made on Client''s behalf under this estimate agreement within 10 days of date of issue on the invoice.  If Dignitas Digital is required to retain the services of an attorney to collect any unpaid invoice (after serving three written or emailed notices), Client agrees to reimburse Dignitas Digital for its costs of collection. Payment to be made in the name of the Agency. In case of any dispute relating to the payment, terms and conditions or any other kind, jurisdiction of Court in Delhi will be applicable'),
(41, 1, 2, 'To indemnify Dignitas Digital for all third party purchases (media, photography, printing, software modules etc.)  authorized by Client''s signature under this agreement.  In the case of project cancellation this means Client is responsible for all costs and liabilities (including time, cancellation fees and any media "short rates") incurred up until Client cancels (unless other cancellation terms have been agreed to in writing) with the understanding that such cancellation costs will not exceed '),
(42, 1, 3, 'The price mentioned in this quote is in Indian Rupees.'),
(43, 1, 4, 'The client will pay for any gift items/sweepstakes awards/giveaways that may be used for promotion on social media channels'),
(44, 1, 5, 'The pricing mentioned in this quote is bulk pricing based on the project. The pricing is not for any individual components, but is based on milestones as mentioned'),
(45, 1, 6, 'To allow Dignitas Digital to legally use clients logo and name on dignitasdigital.com stating the project, if desired.'),
(46, 1, 7, 'To assume all responsibility for the accuracy of any and all information and materials supplied by Client to Dignitas Digital, including information about their ownership, and to indemnify and defend Dignitas Digital from all claims and damages resulting from Dignitas Digital''s use of such materials in Client''s projects.  Dignitas Digital will, in turn, do the same for Client in regard to any other information and materials Dignitas Digital provides as part of this project.'),
(47, 1, 8, 'Estimate terms may only be modified by replacing this estimate with a new estimate.');

-- --------------------------------------------------------

--
-- Table structure for table `dd_login`
--

CREATE TABLE IF NOT EXISTS `dd_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(42) DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dd_login`
--

INSERT INTO `dd_login` (`id`, `username`, `password`, `type`) VALUES
(1, 'nikhil', '74d0af52e92d9b6f9c2f42c748556df1', 0),
(3, 'dignitas', 'e0e1d64fdac4188f087c4d44060de65e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dd_service_list`
--

CREATE TABLE IF NOT EXISTS `dd_service_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_price` int(11) DEFAULT NULL,
  `is_check` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `dd_service_list`
--

INSERT INTO `dd_service_list` (`id`, `parent_id`, `service_name`, `service_price`, `is_check`) VALUES
(1, NULL, 'Search Engine Optimization', NULL, 1),
(2, NULL, 'Social Media Management', NULL, 1),
(3, NULL, 'Search Engine Marketing', NULL, 1),
(4, NULL, 'Email Marketing', NULL, 1),
(5, NULL, 'Landing Page', NULL, 1),
(6, NULL, 'SMS campaigning', NULL, 1),
(7, 1, 'On Page', 200, 1),
(8, 1, 'Off page', 300, 1),
(9, 2, 'Facebook', 400, 1),
(10, 2, 'Twitter', 450, 1),
(11, 2, 'Instagram', 500, 1),
(12, 2, 'LinkedIn', 600, 1),
(13, 3, 'Google ads', 100, 1),
(14, 4, 'Emailer', 300, 1),
(15, 5, 'Responsive Landing Page', 200, 1),
(16, 6, 'Sending informative or transactional SMS', 700, 1),
(17, 7, 'Keyword consistency', NULL, 1),
(18, 7, 'Website minification', NULL, 0),
(19, 7, 'Code optimization', NULL, 1),
(20, 7, 'Internal Linking', NULL, 1),
(21, 7, 'Making keyword friendly URLS', NULL, 1),
(22, 7, 'Generating Keyword friendly website content  ', NULL, 1),
(23, 7, 'Keyword friendly image tags', NULL, 1),
(24, 7, 'Minor website changes ', NULL, 1),
(25, 8, 'Guest posting', NULL, 1),
(26, 8, 'Article submission ', NULL, 1),
(27, 8, 'Image submission ', NULL, 1),
(28, 8, 'Infographic submission', NULL, 1),
(29, 8, 'Presentation submission  ', NULL, 1),
(30, 8, 'Posting keyword friendly content on discussion forums', NULL, 1),
(31, 13, 'Setup Cost', NULL, 1),
(32, 13, 'Company Commission', NULL, 1),
(33, 13, 'Reporting', NULL, 1),
(34, 13, 'Display Ads(extra charges for graphics)', NULL, 1),
(35, 14, 'Only Providing Design', NULL, 1),
(36, 14, 'Design + HTML', NULL, 1),
(37, 14, 'Shooting the Email', NULL, 1),
(38, 14, 'Extract specific data', NULL, 1),
(39, 14, 'Run models around intelligence', NULL, 1),
(40, 15, 'Providing the design', NULL, 1),
(41, 15, 'Creating the HTML', NULL, 1),
(42, 16, 'SMS service provider', NULL, 1),
(43, 16, 'SMS data extraction', NULL, 1),
(44, 16, 'SMS data extraction specific intelligence', NULL, 1),
(45, 2, 'Creating brand-specific social media guidelines', NULL, 1),
(46, 2, 'Up to 3-4 posts per week in total on all managed social networks, based on best practices', NULL, 1),
(47, 2, 'Creation of 15 days social media calendar for all social media networks, as desired', NULL, 1),
(48, 2, 'Creating graphics/banners for social media pages', NULL, 1),
(49, 2, 'Recommendation Social media integration with the brands website on multiple levels (for individual pages, products etc.), if applicable', NULL, 1),
(50, 2, 'User comments monitoring, reporting and replying across all managed social media channels', NULL, 1),
(51, 2, 'Social Media strategy consultation', NULL, 1),
(52, 2, 'Optimized campaigns for better results', NULL, 1),
(53, 2, 'Digital Marketing Consultation', NULL, 1),
(54, 2, 'Fortnightly Insights report', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dd_service_mapping`
--

CREATE TABLE IF NOT EXISTS `dd_service_mapping` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `service_list_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Dumping data for table `dd_service_mapping`
--

INSERT INTO `dd_service_mapping` (`map_id`, `contract_id`, `service_list_id`, `price`, `comment`) VALUES
(160, 1, 7, 200, ''),
(161, 1, 8, 300, ''),
(162, 1, 9, 400, ''),
(163, 1, 10, 450, ''),
(164, 1, 11, 500, ''),
(165, 1, 12, 600, ''),
(166, 1, 45, 0, ''),
(167, 1, 46, 0, ''),
(168, 1, 47, 0, ''),
(169, 1, 48, 0, ''),
(170, 1, 49, 0, ''),
(171, 1, 50, 0, ''),
(172, 1, 51, 0, ''),
(173, 1, 53, 0, ''),
(174, 1, 13, 100, ''),
(175, 1, 14, 300, ''),
(176, 1, 15, 200, ''),
(177, 1, 16, 700, ''),
(178, 1, 17, 0, 'N.A.'),
(179, 1, 19, 0, 'N.A.'),
(180, 1, 20, 0, 'N.A.'),
(181, 1, 21, 0, 'N.A.'),
(182, 1, 25, 0, 'N.A.'),
(183, 1, 26, 0, 'N.A.'),
(184, 1, 27, 0, 'N.A.'),
(185, 1, 28, 0, 'N.A.'),
(186, 1, 31, 0, 'N.A.'),
(187, 1, 32, 0, 'N.A.'),
(188, 1, 33, 0, 'N.A.'),
(189, 1, 34, 0, 'N.A.'),
(190, 1, 35, 0, 'N.A.'),
(191, 1, 36, 0, 'N.A.'),
(192, 1, 38, 0, 'N.A.'),
(193, 1, 42, 0, 'N.A.'),
(194, 1, 43, 0, 'N.A.');

-- --------------------------------------------------------

--
-- Table structure for table `dd_sla_mapping`
--

CREATE TABLE IF NOT EXISTS `dd_sla_mapping` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `sla_id` int(11) NOT NULL,
  `sla_name` varchar(800) NOT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `dd_sla_mapping`
--

INSERT INTO `dd_sla_mapping` (`map_id`, `contract_id`, `sla_id`, `sla_name`) VALUES
(37, 1, 2, 'To indemnify Dignitas Digital for all third party purchases (media, photography, printing, software modules etc.)  authorized by Client''s signature under this agreement.  In the case of project cancellation this means Client is responsible for all costs and liabilities (including time, cancellation fees and any media "short rates") incurred up until Client cancels (unless other cancellation terms have been agreed to in writing) with the understanding that such cancellation costs will not exceed '),
(38, 1, 3, 'The price mentioned in this quote is in Indian Rupees.'),
(39, 1, 4, 'The client will pay for any gift items/sweepstakes awards/giveaways that may be used for promotion on social media channels'),
(40, 1, 5, 'The pricing mentioned in this quote is bulk pricing based on the project. The pricing is not for any individual components, but is based on milestones as mentioned'),
(41, 1, 6, 'To allow Dignitas Digital to legally use clients logo and name on dignitasdigital.com stating the project, if desired.'),
(42, 1, 7, 'To assume all responsibility for the accuracy of any and all information and materials supplied by Client to Dignitas Digital, including information about their ownership, and to indemnify and defend Dignitas Digital from all claims and damages resulting from Dignitas Digital''s use of such materials in Client''s projects.  Dignitas Digital will, in turn, do the same for Client in regard to any other information and materials Dignitas Digital provides as part of this project.'),
(43, 1, 8, 'Estimate terms may only be modified by replacing this estimate with a new estimate.');

-- --------------------------------------------------------

--
-- Table structure for table `dd_static_contract`
--

CREATE TABLE IF NOT EXISTS `dd_static_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract` longtext NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
