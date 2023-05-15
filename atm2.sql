-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 08:01 PM
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
-- Database: `atm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `asset_tag_prefix` varchar(255) NOT NULL,
  `license_tag_prefix` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `asset_tag_prefix`, `license_tag_prefix`) VALUES
(1, 'Leader', 'SBP-', 'SBP-'),
(2, 'HR', 'SBP-', 'SBP-'),
(3, 'Marketing', 'SBP-', 'SBP-'),
(4, 'Planning', 'SBP-', 'SBP-'),
(5, 'PPIC', 'SBP-', 'SBP-'),
(6, 'Project', 'SBP-', 'SBP-'),
(7, 'Cost Control', 'SBP-', 'SBP-'),
(8, 'Finance', 'SBP-', 'SBP-'),
(9, 'Purchasing', 'SBP-', 'SBP-'),
(10, 'Shipment', 'SBP-', 'SBP-'),
(11, 'K3', '', ''),
(12, 'IT', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`name`, `value`) VALUES
('email_from_address', 'sbp@sbp.org'),
('email_from_name', 'SBP'),
('email_smtp_enable', 'false'),
('email_smtp_host', ''),
('email_smtp_port', ''),
('email_smtp_username', ''),
('email_smtp_password', ''),
('email_smtp_security', ''),
('email_smtp_domain', ''),
('email_smtp_auth', 'false'),
('week_start', '1'),
('log_retention', '365'),
('tickets_encrypton', ''),
('tickets_password', 'Haleluy4'),
('tickets_username', 'it_sbp@kudus.puragroup.com'),
('tickets_server', ''),
('license_tag_prefix', 'SBPL-'),
('asset_tag_prefix', 'SBP-'),
('company_details', 'Engineering & Construction'),
('company_name', 'PT Sarana Bangun Pusaka'),
('tickets_notification', 'false'),
('sms_provider', 'clickatell'),
('sms_user', ''),
('sms_password', ''),
('sms_api_id', ''),
('sms_from', ''),
('app_name', 'PT SBP'),
('app_url', 'localhost/sbp'),
('table_records', '50'),
('db_version', '1.7'),
('project_tag_prefix', 'P-'),
('password_generator_length', '8'),
('default_lang', 'en'),
('auto_close_tickets', '0'),
('timezone', 'Asia/Jakarta'),
('auto_close_tickets_notify', 'false'),
('tickets_defaultdepartment', '1'),
('company_manager', 'Vivit D.H.'),
('tickets_comreply', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`) VALUES
(1, 'Stefanus Dorotheoputra', 'stefanusdorotheoputra@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `emaillog`
--

CREATE TABLE `emaillog` (
  `id` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `to` varchar(128) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emaillog`
--

INSERT INTO `emaillog` (`id`, `peopleid`, `clientid`, `to`, `subject`, `message`, `timestamp`) VALUES
(5, 30, 6, 'yusfa@sbp.it', 'Password Reset', 'Could not instantiate mail function.', '2020-09-02 07:52:33'),
(6, 30, 6, 'yusfa@sbp.it', 'Password Reset', 'Could not instantiate mail function.', '2020-09-02 07:53:04'),
(7, 78, 0, 'gmail@stef.com', 'New User', 'Could not instantiate mail function.', '2022-08-27 08:01:18'),
(8, 79, 0, 'a@gm.c', '', 'Message body empty', '2022-11-09 01:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `clientid` int(11) DEFAULT NULL,
  `projectid` int(11) DEFAULT NULL,
  `assetid` int(11) DEFAULT NULL,
  `vehicleid` int(11) DEFAULT NULL,
  `driverid` int(11) DEFAULT NULL,
  `mutprosj` int(11) DEFAULT NULL,
  `mutprovol` int(11) DEFAULT NULL,
  `sj` varchar(50) DEFAULT NULL,
  `guardrailreplyid` int(11) DEFAULT NULL,
  `tdbuid` int(11) DEFAULT NULL,
  `clarificationslid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `clientid`, `projectid`, `assetid`, `vehicleid`, `driverid`, `mutprosj`, `mutprovol`, `sj`, `guardrailreplyid`, `tdbuid`, `clarificationslid`, `name`, `file`, `timestamp`, `updated`) VALUES
(1, 0, 0, 0, 0, 0, 0, NULL, '061/ZPA/18/10', 0, NULL, NULL, '1-IMG-20191125-WA0005.jpg.jpg', '1-IMG-20191125-WA0005.jpg.jpg', '2019-11-29 14:56:53', NULL),
(2, 0, 0, 0, 0, 0, 0, NULL, '066/ZPA/11/11/19', 0, NULL, NULL, '2-IMG_20191129_141458.jpg.jpg', '2-IMG_20191129_141458.jpg.jpg', '2019-11-29 15:14:26', NULL),
(3, 0, 0, 0, 0, 0, 0, NULL, '220/PMC/21/11/19', 0, NULL, NULL, '3-1576219710407437013331.jpg.jpg', '3-1576219710407437013331.jpg.jpg', '2019-12-13 13:55:30', NULL),
(4, 0, 0, 0, 0, 0, 0, NULL, '221/PMC/21/11/19', 0, NULL, NULL, '4-15762202800121838819174.jpg.jpg', '4-15762202800121838819174.jpg.jpg', '2019-12-13 14:02:00', NULL),
(5, 0, 0, 0, 0, 0, 0, NULL, '220/PMC/21/11/19', 0, NULL, NULL, '5-15762220963281760575197.jpg.jpg', '5-15762220963281760575197.jpg.jpg', '2019-12-13 14:32:36', NULL),
(6, 0, 0, 0, 0, 0, 0, NULL, '071/ZPA/23/11/19', 0, NULL, NULL, '6-15762230312311579505143.jpg.jpg', '6-15762230312311579505143.jpg.jpg', '2019-12-13 14:48:00', NULL),
(7, 0, 0, 0, 0, 0, 0, NULL, '001/ZPA/14/01/20', 0, NULL, NULL, '7-15795026769811034242118.jpg.jpg', '7-15795026769811034242118.jpg.jpg', '2020-01-20 13:49:19', NULL),
(9, 0, 0, 0, 0, 0, 0, NULL, 'DN-20-00171', 0, NULL, NULL, '9-15795039989142036451595.jpg.jpg', '9-15795039989142036451595.jpg.jpg', '2020-01-20 14:11:16', NULL),
(10, 0, 0, 0, 0, 0, 0, NULL, 'DN-20-00268', 0, NULL, NULL, '10-15795043520732132798685.jpg.jpg', '10-15795043520732132798685.jpg.jpg', '2020-01-20 14:17:02', NULL),
(11, 0, 0, 0, 0, 0, 0, NULL, '002/ZPA/17/01/20', 0, NULL, NULL, '11-1579504771476-423101966.jpg.jpg', '11-1579504771476-423101966.jpg.jpg', '2020-01-20 14:23:58', NULL),
(12, 0, 0, 0, 0, 0, 0, NULL, '004/ZPA/21/01/20', 0, NULL, NULL, '12-15796757006371746809078.jpg.jpg', '12-15796757006371746809078.jpg.jpg', '2020-01-22 13:53:15', NULL),
(13, 0, 0, 0, 0, 0, 0, NULL, '002/pmc/16/01/20', 0, NULL, NULL, '13-IMG_20200116_155342.jpg.jpg', '13-IMG_20200116_155342.jpg.jpg', '2020-01-22 14:31:55', NULL),
(14, 0, 0, 0, 0, 0, 0, NULL, '003/pmc/17/01/20', 0, NULL, NULL, '14-IMG-20200117-WA0004.jpg.jpg', '14-IMG-20200117-WA0004.jpg.jpg', '2020-01-22 14:40:50', NULL),
(15, 0, 0, 0, 0, 0, 0, NULL, '006/PMC/20/01/20', 0, NULL, NULL, '15-IMG-20200120-WA0006.jpg.jpg', '15-IMG-20200120-WA0006.jpg.jpg', '2020-01-22 15:21:23', '2020-01-23 10:13:12'),
(16, 0, 0, 0, 0, 0, 0, NULL, '007/PMC/20/01/20', 0, NULL, NULL, '16-IMG-20200120-WA0005.jpg.jpg', '16-IMG-20200120-WA0005.jpg.jpg', '2020-01-22 15:23:51', '2020-01-23 10:12:25'),
(17, 0, 0, 0, 0, 0, 0, NULL, 'Dn-20-00', 0, NULL, NULL, '17-IMG-20200120-WA0008.jpg.jpg', '17-IMG-20200120-WA0008.jpg.jpg', '2020-01-22 15:27:48', NULL),
(18, 0, 0, 0, 0, 0, 0, NULL, '006/pmc/20/01/20', 0, NULL, NULL, '18-IMG-20200120-WA0006.jpg.jpg', '18-IMG-20200120-WA0006.jpg.jpg', '2020-01-23 10:10:22', NULL),
(19, 0, 0, 0, 0, 0, 0, NULL, '004/pmc/18/01/20', 0, NULL, NULL, '19-IMG_20200118_153209.jpg.jpg', '19-IMG_20200118_153209.jpg.jpg', '2020-01-23 10:21:16', NULL),
(20, 0, 0, 0, 0, 0, 0, NULL, '005/PMC/18/01/20', 0, NULL, NULL, '20-IMG_20200118_122226.jpg.jpg', '20-IMG_20200118_122226.jpg.jpg', '2020-01-23 10:26:33', NULL),
(21, 0, 0, 0, 0, 0, 0, NULL, '008/PMC/20/01/20', 0, NULL, NULL, '21-IMG_20200121_110819.jpg.jpg', '21-IMG_20200121_110819.jpg.jpg', '2020-01-23 10:29:52', '2020-01-23 10:30:39'),
(22, 0, 0, 0, 0, 0, 0, NULL, '005/ZPA/24/01/20', 0, NULL, NULL, '22-1580096414223478747590.jpg.jpg', '22-1580096414223478747590.jpg.jpg', '2020-01-27 10:45:14', NULL),
(23, 0, 0, 0, 0, 0, 0, NULL, '006/ZPA/24/01/20', 0, NULL, NULL, '23-1580097290754-465923570.jpg.jpg', '23-1580097290754-465923570.jpg.jpg', '2020-01-27 10:59:28', NULL),
(24, 0, 0, 0, 0, 0, 0, NULL, '007/ZPA/29/01/20', 0, NULL, NULL, '24-158034737755983809423.jpg.jpg', '24-158034737755983809423.jpg.jpg', '2020-01-30 08:29:11', NULL),
(25, 0, 0, 0, 0, 0, 0, NULL, '002/PMC/16/01/20', 0, NULL, NULL, '25-IMG_20200116_155342.jpg.jpg', '25-IMG_20200116_155342.jpg.jpg', '2020-01-31 10:37:39', NULL),
(26, 0, 0, 0, 0, 0, 0, NULL, '002/PMC/16/01/20', 0, NULL, NULL, '26-IMG_20200116_155342.jpg.jpg', '26-IMG_20200116_155342.jpg.jpg', '2020-01-31 10:38:16', NULL),
(27, 0, 0, 0, 0, 0, 0, NULL, '002/PMC/16/01/20', 0, NULL, NULL, '27-IMG_20200116_155342.jpg.jpg', '27-IMG_20200116_155342.jpg.jpg', '2020-01-31 10:40:06', NULL),
(28, 0, 0, 0, 0, 0, 0, NULL, '002/PMC/16/01/20', 0, NULL, NULL, '28-IMG_20200116_155342.jpg.jpg', '28-IMG_20200116_155342.jpg.jpg', '2020-01-31 10:41:07', NULL),
(29, 0, 0, 0, 0, 0, 0, NULL, '002/PMC/16/01/20', 0, NULL, NULL, '29-IMG_20200116_155342.jpg.jpg', '29-IMG_20200116_155342.jpg.jpg', '2020-01-31 10:41:57', NULL),
(30, 0, 0, 0, 0, 0, 0, NULL, '003/PMC/17/01/20', 0, NULL, NULL, '30-IMG-20200117-WA0004.jpg.jpg', '30-IMG-20200117-WA0004.jpg.jpg', '2020-01-31 10:49:52', NULL),
(31, 0, 0, 0, 0, 0, 0, NULL, '004/PMC/18/01/20', 0, NULL, NULL, '31-IMG_20200118_153209.jpg.jpg', '31-IMG_20200118_153209.jpg.jpg', '2020-01-31 10:56:45', NULL),
(32, 0, 0, 0, 0, 0, 0, NULL, '004/PMC/18/01/20', 0, NULL, NULL, '32-IMG_20200118_153209.jpg.jpg', '32-IMG_20200118_153209.jpg.jpg', '2020-01-31 10:59:25', NULL),
(33, 0, 0, 0, 0, 0, 0, NULL, '005/PMC/18/01/20', 0, NULL, NULL, '33-IMG_20200118_122226.jpg.jpg', '33-IMG_20200118_122226.jpg.jpg', '2020-01-31 11:45:20', NULL),
(34, 0, 0, 0, 0, 0, 0, NULL, '005/PMC/18/01/20', 0, NULL, NULL, '34-IMG_20200118_122226.jpg.jpg', '34-IMG_20200118_122226.jpg.jpg', '2020-01-31 11:51:12', NULL),
(35, 0, 0, 0, 0, 0, 0, NULL, '008/PMC/21/01/20', 0, NULL, NULL, '35-IMG_20200121_110819.jpg.jpg', '35-IMG_20200121_110819.jpg.jpg', '2020-01-31 12:00:05', NULL),
(36, 0, 0, 0, 0, 0, 0, NULL, '006/PMC/20/01/20', 0, NULL, NULL, '36-IMG-20200120-WA0006.jpg.jpg', '36-IMG-20200120-WA0006.jpg.jpg', '2020-01-31 12:35:39', NULL),
(37, 0, 0, 0, 0, 0, 0, NULL, '007/PMC/20/01/20', 0, NULL, NULL, '37-IMG-20200120-WA0005.jpg.jpg', '37-IMG-20200120-WA0005.jpg.jpg', '2020-01-31 13:15:08', NULL),
(38, 0, 0, 0, 0, 0, 0, NULL, '082/ZPA/14/12/19', 0, NULL, NULL, '38-IMG_20200124_151303.jpg.jpg', '38-IMG_20200124_151303.jpg.jpg', '2020-02-01 00:02:49', NULL),
(39, 0, 0, 0, 0, 0, 0, NULL, 'tes', 0, NULL, NULL, '39-ndut.jpg.jpg', '39-ndut.jpg.jpg', '2020-02-03 09:41:45', NULL),
(40, 0, 0, 0, 0, 0, 0, NULL, 'tessq', 0, NULL, NULL, '40-ndut.jpg.jpg', '40-ndut.jpg.jpg', '2020-02-03 09:42:35', NULL),
(41, 0, 0, 0, 0, 0, 0, NULL, 'zsf', 0, NULL, NULL, '41-ndut.jpg.jpg', '41-ndut.jpg.jpg', '2020-02-03 09:43:28', NULL),
(42, 0, 0, 0, 0, 0, 0, NULL, '010/ZPA/11/02/20', 0, NULL, NULL, '42-IMG_20200212_085020.jpg.jpg', '42-IMG_20200212_085020.jpg.jpg', '2020-02-12 08:57:16', NULL),
(43, 0, 0, 0, 0, 0, 0, NULL, '006/SBP/05/02/2020', 0, NULL, NULL, '43-15814727076631041153215.jpg.jpg', '43-15814727076631041153215.jpg.jpg', '2020-02-12 09:03:27', '2020-02-12 09:05:22'),
(44, 0, 0, 0, 0, 0, 0, NULL, '006/SBP/05/02/2020', 0, NULL, NULL, '44-1581472789820-1993477734.jpg.jpg', '44-1581472789820-1993477734.jpg.jpg', '2020-02-12 09:04:52', '2020-02-12 09:05:22'),
(45, 0, 0, 0, 0, 0, 0, NULL, '008/ZPA/31/01/20', 0, NULL, NULL, '45-IMG_20200205_082603.jpg.jpg', '45-IMG_20200205_082603.jpg.jpg', '2020-02-12 09:09:56', NULL),
(46, 0, 0, 0, 0, 0, 0, NULL, '009/ZPA/05/02/20', 0, NULL, NULL, '46-IMG_20200206_091524.jpg.jpg', '46-IMG_20200206_091524.jpg.jpg', '2020-02-12 09:12:38', NULL),
(47, 0, 0, 0, 0, 0, 0, NULL, '003/ZPA/17/01/20', 0, NULL, NULL, '47-IMG_20200120_142429.jpg.jpg', '47-IMG_20200120_142429.jpg.jpg', '2020-02-12 09:16:16', NULL),
(48, 0, 0, 0, 0, 0, 0, NULL, 'DN-20-00539', 0, NULL, NULL, '48-IMG_20200131_110934.jpg.jpg', '48-IMG_20200131_110934.jpg.jpg', '2020-02-12 09:51:10', NULL),
(49, 0, 0, 0, 0, 0, 0, NULL, 'DN-20-00538', 0, NULL, NULL, '49-IMG_20200131_110944.jpg.jpg', '49-IMG_20200131_110944.jpg.jpg', '2020-02-12 09:54:12', NULL),
(50, 0, 0, 0, 0, 0, 0, NULL, 'DN-20-00537', 0, NULL, NULL, '50-IMG_20200131_110955.jpg.jpg', '50-IMG_20200131_110955.jpg.jpg', '2020-02-12 09:56:06', NULL),
(51, 0, 0, 0, 0, 0, 0, NULL, 'DN-20-00536', 0, NULL, NULL, '51-IMG_20200131_111002.jpg.jpg', '51-IMG_20200131_111002.jpg.jpg', '2020-02-12 09:58:16', NULL),
(52, 0, 0, 0, 0, 0, 0, NULL, '001/ZPA/I/2020', 0, NULL, NULL, '52-IMG-20200201-WA0002.jpg.jpg', '52-IMG-20200201-WA0002.jpg.jpg', '2020-02-12 10:02:46', NULL),
(53, 0, 0, 0, 0, 0, 0, NULL, '003/ZPA/II/2020', 0, NULL, NULL, '53-IMG_20200205_133148.jpg.jpg', '53-IMG_20200205_133148.jpg.jpg', '2020-02-12 10:09:15', NULL),
(54, 0, 0, 0, 0, 0, 0, NULL, '011/ZPA/12/02/20', 0, NULL, NULL, '54-IMG_20200214_081106.jpg.jpg', '54-IMG_20200214_081106.jpg.jpg', '2020-02-14 22:58:14', NULL),
(55, 0, 0, 0, 0, 0, 0, NULL, '012/ZPA/14/02/20', 0, NULL, NULL, '55-1581729219061-531969424.jpg.jpg', '55-1581729219061-531969424.jpg.jpg', '2020-02-15 08:18:36', NULL),
(56, 0, 0, 0, 0, 0, 0, NULL, '013/ZPA/18/02/20', 0, NULL, NULL, '56-IMG_20200219_081525.jpg.jpg', '56-IMG_20200219_081525.jpg.jpg', '2020-02-19 08:23:15', NULL),
(57, 0, 0, 0, 0, 0, 0, NULL, '014/ZPA/21/02/20', 0, NULL, NULL, '57-IMG_20200222_101930.jpg.jpg', '57-IMG_20200222_101930.jpg.jpg', '2020-02-26 08:16:03', NULL),
(58, 0, 0, 0, 0, 0, 0, NULL, 'DN-20-01043', 0, NULL, NULL, '58-IMG_20200227_092815.jpg.jpg', '58-IMG_20200227_092815.jpg.jpg', '2020-02-27 10:07:51', NULL),
(59, 0, 0, 0, 0, 0, 0, NULL, '015/ZPA/27/02/20', 0, NULL, NULL, '59-1582773868320-2077327379.jpg.jpg', '59-1582773868320-2077327379.jpg.jpg', '2020-02-27 10:29:54', NULL),
(60, 0, 0, 0, 0, 0, 0, NULL, '020/PMC/20/02/2020', 0, NULL, NULL, '60-IMG_20200220_150523.jpg.jpg', '60-IMG_20200220_150523.jpg.jpg', '2020-02-28 10:18:40', NULL),
(61, 0, 0, 0, 0, 0, 0, NULL, '021/PMC/24/02/20', 0, NULL, NULL, '61-IMG_20200225_094237.jpg.jpg', '61-IMG_20200225_094237.jpg.jpg', '2020-02-28 10:22:57', NULL),
(62, 0, 0, 0, 0, 0, 0, NULL, '020/PMC/20/02/20', 0, NULL, NULL, '62-IMG_20200220_150523.jpg.jpg', '62-IMG_20200220_150523.jpg.jpg', '2020-02-28 10:26:10', NULL),
(63, 0, 0, 0, 0, 0, 0, NULL, '007/SBP/24/02/20', 0, NULL, NULL, '63-IMG_20200226_081339.jpg.jpg', '63-IMG_20200226_081339.jpg.jpg', '2020-02-28 10:28:38', NULL),
(64, 0, 0, 0, 0, 0, 0, NULL, '021/PMC/25/02/20', 0, NULL, NULL, '64-IMG_20200225_094237.jpg.jpg', '64-IMG_20200225_094237.jpg.jpg', '2020-02-28 10:31:59', NULL),
(65, 0, 0, 0, 0, 0, 0, NULL, '021/PMC/25/02/20', 0, NULL, NULL, '65-IMG_20200225_094237.jpg.jpg', '65-IMG_20200225_094237.jpg.jpg', '2020-02-28 10:32:05', NULL),
(66, 0, 0, 0, 0, 0, 0, NULL, '001/SRY/19.III/I/20', 0, NULL, NULL, '66-Chrysanthemum.jpg.jpg', '66-Chrysanthemum.jpg.jpg', '2020-02-28 14:28:04', NULL),
(67, 0, 0, 0, 0, 0, 0, NULL, '002/SRY/19.III/I/20', 0, NULL, NULL, '67-Chrysanthemum.jpg.jpg', '67-Chrysanthemum.jpg.jpg', '2020-02-28 14:48:38', NULL),
(68, 0, 0, 0, 0, 0, 0, NULL, '003/TSN/19.III/I/20', 0, NULL, NULL, '68-Chrysanthemum.jpg.jpg', '68-Chrysanthemum.jpg.jpg', '2020-02-28 19:05:27', NULL),
(69, 0, 0, 0, 0, 0, 0, NULL, '004/TSN/19.III/I/20', 0, NULL, NULL, '69-Chrysanthemum.jpg.jpg', '69-Chrysanthemum.jpg.jpg', '2020-02-28 19:16:21', NULL),
(70, 0, 0, 0, 0, 0, 0, NULL, '006/tsn/19.iii/i/20', 0, NULL, NULL, '70-Chrysanthemum.jpg.jpg', '70-Chrysanthemum.jpg.jpg', '2020-02-29 18:41:41', NULL),
(71, 0, 0, 0, 0, 0, 0, NULL, '006/sry/19.iii/i/20', 0, NULL, NULL, '71-Chrysanthemum.jpg.jpg', '71-Chrysanthemum.jpg.jpg', '2020-02-29 18:57:20', NULL),
(72, 0, 0, 0, 0, 0, 0, NULL, 'oo7/sry/19.iii/i/20', 0, NULL, NULL, '72-Chrysanthemum.jpg.jpg', '72-Chrysanthemum.jpg.jpg', '2020-02-29 19:06:40', NULL),
(73, 0, 0, 0, 0, 0, 0, NULL, '008/tsn/19.iii/i/20', 0, NULL, NULL, '73-Chrysanthemum.jpg.jpg', '73-Chrysanthemum.jpg.jpg', '2020-02-29 19:19:05', NULL),
(74, 0, 0, 0, 0, 0, 0, NULL, '009/sry/19.iii/ii/20', 0, NULL, NULL, '74-Chrysanthemum.jpg.jpg', '74-Chrysanthemum.jpg.jpg', '2020-03-08 22:58:01', NULL),
(75, 0, 0, 0, 0, 0, 0, NULL, '010/19.iii/ii/20', 0, NULL, NULL, '75-Chrysanthemum.jpg.jpg', '75-Chrysanthemum.jpg.jpg', '2020-03-08 23:03:42', NULL),
(76, 0, 0, 0, 0, 0, 0, NULL, '011/sry/19.iii/ii/20', 0, NULL, NULL, '76-Chrysanthemum.jpg.jpg', '76-Chrysanthemum.jpg.jpg', '2020-03-08 23:09:55', NULL),
(77, 0, 0, 0, 0, 0, 0, NULL, '011/sry/19.iii/ii/20', 0, NULL, NULL, '77-Chrysanthemum.jpg.jpg', '77-Chrysanthemum.jpg.jpg', '2020-03-08 23:09:58', NULL),
(78, 0, 0, 0, 0, 0, 0, NULL, '011/sry/19.iii/ii/20', 0, NULL, NULL, '78-Chrysanthemum.jpg.jpg', '78-Chrysanthemum.jpg.jpg', '2020-03-08 23:10:05', NULL),
(79, 0, 0, 0, 0, 0, 0, NULL, '013/sry/19.iii/ii/20', 0, NULL, NULL, '79-Chrysanthemum.jpg.jpg', '79-Chrysanthemum.jpg.jpg', '2020-03-08 23:13:57', NULL),
(80, 0, 0, 0, 0, 0, 0, NULL, '014/sry/19.iii/ii/20', 0, NULL, NULL, '80-Chrysanthemum.jpg.jpg', '80-Chrysanthemum.jpg.jpg', '2020-03-08 23:20:36', NULL),
(81, 0, 0, 0, 0, 0, 0, NULL, '014/tsn/19.iii/ii/20', 0, NULL, NULL, '81-Chrysanthemum.jpg.jpg', '81-Chrysanthemum.jpg.jpg', '2020-03-08 23:25:29', NULL),
(82, 0, 0, 0, 0, 0, 0, NULL, '033/PMC/07/03/20', 0, NULL, NULL, '82-IMG-20200307-WA0026.jpg.jpg', '82-IMG-20200307-WA0026.jpg.jpg', '2020-03-09 10:59:12', NULL),
(83, 0, 0, 0, 0, 0, 0, NULL, '032/PMC/07/03/20', 0, NULL, NULL, '83-IMG-20200307-WA0024.jpg.jpg', '83-IMG-20200307-WA0024.jpg.jpg', '2020-03-09 11:03:08', NULL),
(84, 0, 0, 0, 0, 0, 0, NULL, '031/PMC/07/03/20', 0, NULL, NULL, '84-IMG-20200307-WA0022.jpg.jpg', '84-IMG-20200307-WA0022.jpg.jpg', '2020-03-09 11:05:15', NULL),
(85, 0, 0, 0, 0, 0, 0, NULL, '029/PMC/06/03/20', 0, NULL, NULL, '85-IMG-20200307-WA0009.jpg.jpg', '85-IMG-20200307-WA0009.jpg.jpg', '2020-03-09 11:07:59', NULL),
(86, 0, 0, 0, 0, 0, 0, NULL, '028/PMC/06/03/20', 0, NULL, NULL, '86-IMG-20200307-WA0010.jpg.jpg', '86-IMG-20200307-WA0010.jpg.jpg', '2020-03-09 11:10:42', NULL),
(87, 0, 0, 0, 0, 0, 0, NULL, '030/PMC/06/03/20', 0, NULL, NULL, '87-IMG-20200307-WA0007.jpg.jpg', '87-IMG-20200307-WA0007.jpg.jpg', '2020-03-10 08:43:34', NULL),
(88, 0, 0, 0, 0, 0, 0, NULL, '022/PMC/04/03/20', 0, NULL, NULL, '88-IMG-20200305-WA0012.jpg.jpg', '88-IMG-20200305-WA0012.jpg.jpg', '2020-03-10 08:48:27', NULL),
(89, 0, 0, 0, 0, 0, 0, NULL, '023/PMC/04/03/20', 0, NULL, NULL, '89-IMG-20200305-WA0014.jpg.jpg', '89-IMG-20200305-WA0014.jpg.jpg', '2020-03-10 08:51:55', NULL),
(90, 0, 0, 0, 0, 0, 0, NULL, '024/PMC/04/03/20', 0, NULL, NULL, '90-IMG-20200305-WA0016.jpg.jpg', '90-IMG-20200305-WA0016.jpg.jpg', '2020-03-10 08:55:42', NULL),
(91, 0, 0, 0, 0, 0, 0, NULL, '025/PMC/05/03/20', 0, NULL, NULL, '91-IMG-20200307-WA0002.jpg.jpg', '91-IMG-20200307-WA0002.jpg.jpg', '2020-03-10 08:59:01', NULL),
(92, 0, 0, 0, 0, 0, 0, NULL, '026/PMC/05/03/20', 0, NULL, NULL, '92-IMG-20200307-WA0001.jpg.jpg', '92-IMG-20200307-WA0001.jpg.jpg', '2020-03-10 09:01:14', NULL),
(93, 0, 0, 0, 0, 0, 0, NULL, '027/PMC/05/03/20', 0, NULL, NULL, '93-IMG-20200307-WA0000.jpg.jpg', '93-IMG-20200307-WA0000.jpg.jpg', '2020-03-10 09:03:22', NULL),
(94, 0, 0, 0, 0, 0, 0, NULL, '015/sry/19.iiii/iii/20', 0, NULL, NULL, '94-15838524134955263077953383109109.jpg.jpg', '94-15838524134955263077953383109109.jpg.jpg', '2020-03-10 22:05:37', NULL),
(95, 0, 0, 0, 0, 0, 0, NULL, '016/sry/19.iii/iii/20', 0, NULL, NULL, '95-15838526659486729452820434882862.jpg.jpg', '95-15838526659486729452820434882862.jpg.jpg', '2020-03-10 22:09:52', NULL),
(96, 0, 0, 0, 0, 0, 0, NULL, '017/tsn/19.iiii/iii/20', 0, NULL, NULL, '96-1583852887222289910940599160763.jpg.jpg', '96-1583852887222289910940599160763.jpg.jpg', '2020-03-10 22:13:28', NULL),
(97, 0, 0, 0, 0, 0, 0, NULL, '766/sj-tmu/iii/20', 0, NULL, NULL, '97-sj aend section.jpg.jpg', '97-sj aend section.jpg.jpg', '2020-03-23 08:41:51', NULL),
(98, 0, 0, 0, 0, 0, 0, NULL, 'TLL20B03P0023', 0, NULL, NULL, '98-15850113824940.23731808758891637.jpg.jpg', '98-15850113824940.23731808758891637.jpg.jpg', '2020-03-24 08:03:08', NULL),
(99, 0, 0, 0, 0, 0, 0, NULL, '009/SBP/12/03/20', 0, NULL, NULL, '99-IMG_20200313_085648[1].jpg.jpg', '99-IMG_20200313_085648[1].jpg.jpg', '2020-03-27 08:41:08', NULL),
(100, 0, 0, 0, 0, 0, 0, NULL, '009/SBP/12/03/20', 0, NULL, NULL, '100-IMG_20200313_085648[1].jpg.jpg', '100-IMG_20200313_085648[1].jpg.jpg', '2020-03-27 08:46:13', NULL),
(101, 0, 0, 0, 0, 0, 0, NULL, '008/SBP/03/03/20', 0, NULL, NULL, '101-IMG_20200303_142702[1].jpg.jpg', '101-IMG_20200303_142702[1].jpg.jpg', '2020-03-27 08:56:26', NULL),
(102, 0, 0, 0, 0, 0, 0, NULL, '008/SBP/03/03/20', 0, NULL, NULL, '102-IMG_20200303_142702[1].jpg.jpg', '102-IMG_20200303_142702[1].jpg.jpg', '2020-03-27 09:02:11', NULL),
(103, 0, 0, 0, 0, 0, 0, NULL, '036/PMC/21/03/20', 0, NULL, NULL, '103-IMG_20200321_142841[1].jpg.jpg', '103-IMG_20200321_142841[1].jpg.jpg', '2020-03-27 09:05:56', NULL),
(104, 0, 0, 0, 0, 0, 0, NULL, '039/PMC/23/03/20', 0, NULL, NULL, '104-IMG-20200323-WA0005[1].jpg.jpg', '104-IMG-20200323-WA0005[1].jpg.jpg', '2020-03-27 09:11:51', NULL),
(105, 0, 0, 0, 0, 0, 0, NULL, '040/PMC/23/03/20', 0, NULL, NULL, '105-IMG-20200323-WA0006[1].jpg.jpg', '105-IMG-20200323-WA0006[1].jpg.jpg', '2020-03-27 09:14:27', NULL),
(106, 0, 0, 0, 0, 0, 0, NULL, '040/PMC/23/03/20', 0, NULL, NULL, '106-IMG-20200323-WA0006[1].jpg.jpg', '106-IMG-20200323-WA0006[1].jpg.jpg', '2020-03-27 09:18:57', NULL),
(107, 0, 0, 0, 0, 0, 0, NULL, '039/PMC/23/03/20', 0, NULL, NULL, '107-IMG-20200323-WA0005[1].jpg.jpg', '107-IMG-20200323-WA0005[1].jpg.jpg', '2020-03-27 09:21:38', NULL),
(108, 0, 0, 0, 0, 0, 0, NULL, '036/PMC/21/03/20', 0, NULL, NULL, '108-IMG_20200303_142702[1].jpg.jpg', '108-IMG_20200303_142702[1].jpg.jpg', '2020-03-27 09:31:59', NULL),
(109, 0, 0, 0, 0, 0, 0, NULL, '037/PMC/23/03/20', 0, NULL, NULL, '109-IMG_20200323_115608[1].jpg.jpg', '109-IMG_20200323_115608[1].jpg.jpg', '2020-03-27 09:35:49', NULL),
(110, 0, 0, 0, 0, 0, 0, NULL, '038/PMC/23/03/20', 0, NULL, NULL, '110-IMG_20200323_131358[1].jpg.jpg', '110-IMG_20200323_131358[1].jpg.jpg', '2020-03-27 09:38:08', NULL),
(111, 0, 0, 0, 0, 0, 0, NULL, '038/PMC/23/03/20', 0, NULL, NULL, '111-IMG_20200323_131358[1].jpg.jpg', '111-IMG_20200323_131358[1].jpg.jpg', '2020-03-27 09:40:49', NULL),
(112, 0, 0, 0, 0, 0, 0, NULL, '037/PMC/23/03/20', 0, NULL, NULL, '112-IMG_20200323_115608[2].jpg.jpg', '112-IMG_20200323_115608[2].jpg.jpg', '2020-03-27 09:43:06', NULL),
(113, 0, 0, 0, 0, 0, 0, NULL, '011/SBP/27/03/20', 0, NULL, NULL, '113-SBP.jpg.jpg', '113-SBP.jpg.jpg', '2020-03-31 08:50:39', NULL),
(114, 0, 0, 0, 0, 0, 0, NULL, '018/Tsn/19.iii/iii/20', 0, NULL, NULL, '114-15859320084808708862747691144577.jpg.jpg', '114-15859320084808708862747691144577.jpg.jpg', '2020-04-03 23:46:06', NULL),
(115, 0, 0, 0, 0, 0, 0, NULL, '018/afro/20.i/iii/20', 0, NULL, NULL, '115-15859325739521032664937011266326.jpg.jpg', '115-15859325739521032664937011266326.jpg.jpg', '2020-04-03 23:55:22', NULL),
(116, 0, 0, 0, 0, 0, 0, NULL, '019/afro/20.i/iii/iii/20', 0, NULL, NULL, '116-15859329650348734765275549617742.jpg.jpg', '116-15859329650348734765275549617742.jpg.jpg', '2020-04-04 00:01:56', NULL),
(117, 0, 0, 0, 0, 0, 0, NULL, '023/afro/20.i/iii/iii/20', 0, NULL, NULL, '117-15859332702114833854570895187570.jpg.jpg', '117-15859332702114833854570895187570.jpg.jpg', '2020-04-04 00:06:51', NULL),
(118, 0, 0, 0, 0, 0, 0, NULL, '022/afro/20.i/iii/iii/20', 0, NULL, NULL, '118-15859334819617407318295815894769.jpg.jpg', '118-15859334819617407318295815894769.jpg.jpg', '2020-04-04 00:10:37', NULL),
(119, 0, 0, 0, 0, 0, 0, NULL, '021/afro/20.i/iii/iii/20', 0, NULL, NULL, '119-1585933777081362857390386613137.jpg.jpg', '119-1585933777081362857390386613137.jpg.jpg', '2020-04-04 00:16:04', NULL),
(120, 0, 0, 0, 0, 0, 0, NULL, '028/AFRO/20.I/III/III/20', 0, NULL, NULL, '120-15859340851913538403599075886731.jpg.jpg', '120-15859340851913538403599075886731.jpg.jpg', '2020-04-04 00:20:32', NULL),
(121, 0, 0, 0, 0, 0, 0, NULL, '029/afro/20.i/iii/iii/20', 0, NULL, NULL, '121-15859343045483614350301611440816.jpg.jpg', '121-15859343045483614350301611440816.jpg.jpg', '2020-04-04 00:24:06', NULL),
(122, 0, 0, 0, 0, 0, 0, NULL, '030/AFRO/20.I./III/III/20', 0, NULL, NULL, '122-15859575452543860631560440870888.jpg.jpg', '122-15859575452543860631560440870888.jpg.jpg', '2020-04-04 06:51:30', NULL),
(123, 0, 0, 0, 0, 0, 0, NULL, '031/AFRo/20.1/iii/iii/20', 0, NULL, NULL, '123-15859585086901947316542750218011.jpg.jpg', '123-15859585086901947316542750218011.jpg.jpg', '2020-04-04 07:07:24', NULL),
(124, 0, 0, 0, 0, 0, 0, NULL, '032/afro/20.i/iii/iii/20', 0, NULL, NULL, '124-15859587701662502404815149630749.jpg.jpg', '124-15859587701662502404815149630749.jpg.jpg', '2020-04-04 07:11:48', NULL),
(125, 0, 0, 0, 0, 0, 0, NULL, '033/AFRO/20.I/III/III/20', 0, NULL, NULL, '125-15859599124846686518040724344395.jpg.jpg', '125-15859599124846686518040724344395.jpg.jpg', '2020-04-04 07:30:56', NULL),
(126, 0, 0, 0, 0, 0, 0, NULL, '034/lmm/20.i/iii/iii/20', 0, NULL, NULL, '126-15859602454844438607891602763723.jpg.jpg', '126-15859602454844438607891602763723.jpg.jpg', '2020-04-04 07:36:23', NULL),
(127, 0, 0, 0, 0, 0, 0, NULL, '035/lmm/20.i/iii/iii/20', 0, NULL, NULL, '127-15859604068651700763082026151208.jpg.jpg', '127-15859604068651700763082026151208.jpg.jpg', '2020-04-04 07:39:04', NULL),
(128, 0, 0, 0, 0, 0, 0, NULL, '036/lmm/20.i/iii/iii/20', 0, NULL, NULL, '128-15859605867467416170605224167273.jpg.jpg', '128-15859605867467416170605224167273.jpg.jpg', '2020-04-04 07:42:04', NULL),
(129, 0, 0, 0, 0, 0, 0, NULL, '038/lmm/20 i/iii/iii/20', 0, NULL, NULL, '129-15859607474394527835723242638191.jpg.jpg', '129-15859607474394527835723242638191.jpg.jpg', '2020-04-04 07:44:40', NULL),
(130, 0, 0, 0, 0, 0, 0, NULL, '037/lmm/20.i/iii/iii/20', 0, NULL, NULL, '130-15859609502644250281541770381962.jpg.jpg', '130-15859609502644250281541770381962.jpg.jpg', '2020-04-04 07:48:05', NULL),
(131, 0, 0, 0, 0, 0, 0, NULL, '024/lmm/20.1/iii/20', 0, NULL, NULL, '131-15861411002776851331270915640728.jpg.jpg', '131-15861411002776851331270915640728.jpg.jpg', '2020-04-06 09:50:42', NULL),
(132, 0, 0, 0, 0, 0, 0, NULL, '025/lmm/20.1/iii/20', 0, NULL, NULL, '132-15861412858922223501603725887441.jpg.jpg', '132-15861412858922223501603725887441.jpg.jpg', '2020-04-06 09:53:44', NULL),
(133, 0, 0, 0, 0, 0, 0, NULL, '026/lmm/20.i/iii/20', 0, NULL, NULL, '133-15861414684783579637996040084386.jpg.jpg', '133-15861414684783579637996040084386.jpg.jpg', '2020-04-06 09:56:47', NULL),
(134, 0, 0, 0, 0, 0, 0, NULL, '027/lmm/20.i/iii/20', 0, NULL, NULL, '134-15861416135418583610572222449880.jpg.jpg', '134-15861416135418583610572222449880.jpg.jpg', '2020-04-06 09:59:13', NULL),
(135, 0, 0, 0, 0, 0, 0, NULL, '039/AFRO/20.I/IV/20', 0, NULL, NULL, '135-15861418022637094967661510163132.jpg.jpg', '135-15861418022637094967661510163132.jpg.jpg', '2020-04-06 10:02:56', NULL),
(136, 0, 0, 0, 0, 0, 0, NULL, 'tsb20b04p0375', 0, NULL, NULL, '136-IMG_20200421_094613[1].jpg.jpg', '136-IMG_20200421_094613[1].jpg.jpg', '2020-04-21 10:21:09', NULL),
(140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tes', NULL, NULL, NULL, '137-scan20200824_12533443.jpg', '137-scan20200824_12533443.jpg', '2020-11-24 13:17:20', '2020-11-24 13:17:20'),
(142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1231243214', NULL, NULL, NULL, '141-pemro.jpg', '141-pemro.jpg', '2022-08-08 09:12:01', '2022-08-08 09:12:01'),
(143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'q', NULL, NULL, NULL, '143-ayah dan 2 anaknya.jpg', '143-ayah dan 2 anaknya.jpg', '2022-08-31 08:45:07', '2022-08-31 08:45:07'),
(144, NULL, NULL, NULL, 4336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '144-ayah dan 2 anaknya.jpg', '144-ayah dan 2 anaknya.jpg', '2022-08-31 14:38:15', '2022-08-31 14:38:15'),
(145, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '145-ayah dan 2 anaknya.jpg', '145-ayah dan 2 anaknya.jpg', '2022-09-09 13:32:44', '2022-09-09 13:32:44'),
(146, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '146-akun puragroup.png', '146-akun puragroup.png', '2022-09-09 13:33:12', '2022-09-09 13:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`) VALUES
(1, 'en', 'English (System)');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `roleid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `theme` varchar(64) NOT NULL,
  `sidebar` varchar(64) NOT NULL,
  `layout` varchar(64) NOT NULL,
  `notes` text NOT NULL,
  `signature` text NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `resetkey` varchar(255) NOT NULL,
  `autorefresh` int(11) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `ticketsnotification` int(11) NOT NULL,
  `avatar` mediumblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `nik`, `type`, `roleid`, `clientid`, `name`, `email`, `title`, `mobile`, `password`, `theme`, `sidebar`, `layout`, `notes`, `signature`, `sessionid`, `resetkey`, `autorefresh`, `lang`, `ticketsnotification`, `avatar`) VALUES
(1, NULL, 'admin', 1, 0, 'Admin', 'it_sbp@gmail.com', 'SUPERADMIN', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'collapsed', '', '', '', 'f3cde5p4oln0a6qeveqlfj6p0o', '', 0, 'en', 0, ''),
(2, '11143', 'user', 2, 1, 'Hendy Wibisono', 'pimpinan@sbp.it', 'Pimpinan', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '494bmmv740riej4nu1tc9kulqt', '', 0, 'en', 0, ''),
(3, '92207', 'user', 2, 6, 'Adi Saputro', 'adi@sbp.it', 'Head of Division Project', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'jc4vg1oogbbq4c28rlp9jqmcmg', '', 30000, 'en', 0, ''),
(4, '06294', 'user', 2, 6, 'Irol', 'irol@sbp.it', 'Project Leader', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(5, NULL, 'user', 2, 6, 'Dhani', 'dhani@sbp.it', 'Admin Project', '', '6e2375285544ca2afe7b42389478d14a4b52a9c9', 'skin-blue', 'opened', '', '', '', 'sts5cll2u3fp0likhip40b0n9m', '', 0, 'en', 0, ''),
(6, '', 'user', 2, 6, 'Bagus H', 'bagus@sbp.it', 'Checker', '', 'a7d579ba76398070eae654c30ff153a4c273272a', 'skin-blue', 'opened', '', '', '', '', '', 30000, 'en', 0, ''),
(7, NULL, 'user', 2, 6, 'Adit', 'adit@sbp.it', 'Checker', '', 'a7d579ba76398070eae654c30ff153a4c273272a', 'skin-blue', 'opened', '', '', '', '', '', 30000, 'en', 0, ''),
(8, NULL, 'user', 2, 4, 'Intan Fatima', 'intan@sbp.it', 'Cost Control', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'h3m701meb1i5p575c84gfa3bm1', '', 30000, 'en', 0, ''),
(9, NULL, 'user', 2, 6, 'Dev', 'dev@sbp.it', 'Checker', '', 'a7d579ba76398070eae654c30ff153a4c273272a', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(10, NULL, 'user', 2, 6, 'Reza', 'reza@sbp.it', 'Checker', '', 'a7d579ba76398070eae654c30ff153a4c273272a', 'skin-blue', 'opened', '', '', '', '', '', 30000, 'en', 0, ''),
(11, NULL, 'user', 2, 9, 'Purchasing', 'purchasing@sbp.it', 'Pengiriman', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 300000, 'en', 0, ''),
(15, NULL, 'user', 2, 6, 'Aldi', 'aldi@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(13, NULL, 'user', 2, 6, 'M Hidayat', 'yayak@sbp.it', 'Project Leader', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 30000, 'en', 0, ''),
(14, '94586', 'user', 2, 6, 'Bowo', 'bowo@sbp.it', 'Admin Project', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'p51t1p82n4lqdelulgic7g9nb0', '', 30000, 'en', 0, ''),
(16, NULL, 'user', 2, 6, 'Ihsas', 'ihsas@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(17, NULL, 'user', 2, 6, 'Jatmiko', 'jatmiko@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(19, NULL, 'user', 2, 6, 'Amsori', 'jav@sbp.it', 'Checker KIK', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '8t56hbm3ljdfj2jli4d40qrlqr', 'b3SRBmXpzvUMaxk0a0dUR21vPswhcoPJ', 0, 'en', 0, ''),
(18, NULL, 'user', 2, 6, 'Fajar', 'fajar@sbp.it', 'Surveyor KIK', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(20, NULL, 'user', 2, 6, 'Ryan', 'ryan@sbp.it', 'Checker KIK', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(21, NULL, 'user', 2, 6, 'Wahyu', 'wahyu@sbp.it', 'Checker KIK', '', '2593379aa87a2a44ee709969c42d0bd26fc7a693', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(22, NULL, 'user', 2, 6, 'Yusuf', 'arjuna@sbp.it', 'Checker KIK', '', '36ef7d123a6649f9f81ba9f69f8f8bf8416196a1', 'skin-blue', 'opened', '', '', '', '4hn2k7uff81igi3gskkm6k82o2', '', 0, 'en', 0, ''),
(23, '94379', 'user', 2, 6, 'Erik Adieng Putra', 'erik@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(24, NULL, 'user', 2, 6, 'Harry', 'harry@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 300000, 'en', 0, ''),
(25, NULL, 'user', 2, 6, 'Udin', 'udin@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'u32v3s9uc1djt7j0pq1fcqamt2', '', 0, 'en', 0, ''),
(26, NULL, 'user', 2, 6, 'Wawan', 'wawan@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'p52vaguvfo3f65kr54psmuh21r', '', 0, 'en', 0, ''),
(27, NULL, 'admin', 1, 12, 'Felita', 'vv@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '2amh1t4dsk4i9nuuvma8u8metu', '', 0, 'en', 0, ''),
(66, NULL, 'user', 2, 7, 'Handoko', 'handoko@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(28, NULL, 'user', 2, 5, 'Heri', 'heri@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'r7bdhs1coofapnsskm2k53u9fj', '', 0, 'en', 0, ''),
(29, NULL, 'user', 2, 5, 'Hendik', 'hendik@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'l82dtvpes35a2tg6c078ods5ci', '', 0, 'en', 0, ''),
(30, NULL, 'user', 2, 6, 'Yusfa', 'yusfa@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '7t69h6vss0q9ot8v2s1cg4nrb0', '', 0, 'en', 0, ''),
(31, NULL, 'user', 2, 6, 'Zunaedi', 'zunaedi@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'pa59j0048a7haekpci2ib6rkfg', '', 0, 'en', 0, ''),
(33, '93832', 'user', 2, 4, 'Haryo', 'haryo@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'fc39vhi7hqot042na96h8cd8ti', '', 0, 'en', 0, ''),
(32, NULL, 'user', 2, 4, 'Anita', 'anita@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'rute1u6ikpiavu467g6bv5484m', '', 0, 'en', 0, ''),
(36, NULL, 'user', 2, 2, 'Aji Nur W', 'aji@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'tq4r3afbsg960d8kcthvfps9gr', '', 0, 'en', 0, ''),
(67, NULL, 'user', 2, 6, 'Vicky', 'vicky@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '9gssqc989hfcch2cmgsilpg4ri', '', 0, 'en', 0, ''),
(34, NULL, 'user', 2, 6, 'Meka', 'meka@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'nfat0n21q2gkea8lng7tm4brdk', '', 0, 'en', 0, ''),
(39, '11187', 'user', 2, 6, 'Hariyono', 'hariyono@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'nfat0n21q2gkea8lng7tm4brdk', '', 0, 'en', 0, ''),
(65, NULL, 'user', 2, 6, 'Riyanto', 'riyanto@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(35, NULL, 'user', 2, 4, 'Nila', 'nila@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'tlaq00fjtqsdd3osnbh4u07gvn', '', 0, 'en', 0, ''),
(37, NULL, 'user', 2, 1, 'Julianto', 'julianto@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(38, NULL, 'user', 2, 1, 'Susilo', 'susilo@sbp.it', '', '', 'c5500b76e036875236c757572789b5b5fbf32b87', 'skin-blue', 'opened', '', '', '', 'dg67qddf1hlmdmq777br2vthck', 'BMwMre15WVpPyVUgW555YxDkUYqxTgYD', 0, 'en', 0, ''),
(40, NULL, 'user', 2, 6, 'Ghozali', 'ghozali@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 300000, 'en', 0, ''),
(41, '94585', 'user', 2, 6, 'Dewang', 'dewang@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'nhh25f7eg05nc0nl6qcctedgnf', '', 0, 'en', 0, ''),
(42, '94584', 'user', 2, 6, 'Laftoni', 'laftoni@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '7ih9bmfbhjfdv2s191gi3lq4co', '', 0, 'en', 0, ''),
(43, NULL, 'user', 2, 6, 'Himawan', 'himawan@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(44, NULL, 'user', 2, 6, 'Arief Fitra Sulistyawan', 'arief@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'm3o5pjrfd9un38fv157jtffq84', '', 0, 'en', 0, ''),
(45, NULL, 'user', 2, 6, 'Agung', 'agung@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'jc5e17gs38tq5smvpuep5e5q78', '', 0, 'en', 0, ''),
(46, NULL, 'user', 2, 6, 'Suprapto', 'suprapto@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(47, NULL, 'user', 2, 6, 'Dwi Awang', 'awang@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'hr4vp97fv1sqnagaptc7fj3etg', '', 0, 'en', 0, ''),
(48, NULL, 'user', 2, 3, 'Kevin', 'kevin@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '1d6idqjsc6dbnegbdh5749rjn5', '', 0, 'en', 0, ''),
(50, NULL, 'user', 2, 6, 'Ivan Santoso', 'ivan@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(49, NULL, 'user', 2, 6, 'Titis', 'titis@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'ugcbc0fcf9pit8oee8apikpsrb', '', 0, 'en', 0, ''),
(51, NULL, 'user', 2, 3, 'Puput', 'puput@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(52, NULL, 'user', 2, 3, 'Pak Eko', 'eko@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '45bsihup4lsecdi9c2d6lumkfh', '', 0, 'en', 0, ''),
(53, NULL, 'user', 2, 1, 'Vivit Dwi Hermawan', 'vivit@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '5o79a56crmjie5vl0oeqt7ld50', '', 0, 'en', 0, ''),
(59, NULL, 'user', 2, 8, 'Yusak R', 'yusak@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(54, NULL, 'user', 2, 8, 'M. A. Khandir', 'khandir@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(56, NULL, 'user', 2, 6, 'Agus Tono', 'agus@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '5i5b77lfc6585bacg6mfk0qu72', '', 0, 'en', 0, ''),
(55, NULL, 'user', 2, 10, 'Sukardi', 'sukardi@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(57, '94127', 'user', 2, 6, 'Dedy K', 'dedy@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '4olfsvfk75crlvho70497bfk78', '', 0, 'en', 0, ''),
(58, NULL, 'user', 2, 7, 'Fajar Arif Faizal', 'fajar2@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(60, NULL, 'admin', 1, 12, 'Dicky Kurniawan S', 'dck@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(61, NULL, 'user', 2, 6, 'Eko C Pakpahan', 'ekopak@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'hfna98r5v8443i5tgccnhlruh4', '', 0, 'en', 0, ''),
(62, NULL, 'user', 2, 9, 'Fakhri', 'fakhri@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'jgodoiq7j7df3brsohk0jq1i5h', '', 0, 'en', 0, ''),
(63, NULL, 'user', 2, 9, 'Zaenal A.', 'zaenal@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'sp4mq8bpcud2nmdjuqori9g4u1', '', 0, 'en', 0, ''),
(64, NULL, 'user', 2, 9, 'Chalimah', 'chalimah@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '00age718lm8dgs2110bbq38ark', '', 0, 'en', 0, ''),
(68, NULL, 'user', 2, 6, 'Sapto A.W.', 'sapto@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(69, '93466', 'user', 2, 6, 'Bagus Handoko', 'bagush@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '8563ap5n59iro34693os6vcd9d', '', 0, 'en', 0, ''),
(70, NULL, 'user', 2, 6, 'Teddy', 'teddy@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'eouaf8h6hk280ft8v2afettrks', '', 0, 'en', 0, ''),
(71, NULL, 'user', 2, 5, 'Jamaah', 'jamaah@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(72, '07683', 'user', 2, 8, 'Mutiatun', 'mutiatun@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '9dddfmf0mj609ie0bsqvf3kfjh', '', 0, 'en', 0, ''),
(73, '94016', 'user', 2, 8, 'Lucia N', 'lucia@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(74, '10925', 'user', 2, 3, 'Agus Sunarno', 'agusmkt@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '8206qi3o6be6ev4dt5b940qarc', '', 0, 'en', 0, ''),
(77, '93411', 'user', 2, 7, 'Merry H', 'merry@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '0sb234duq3i4p24o2ckf61t9qg', '', 0, 'en', 0, ''),
(75, '93844', 'user', 2, 8, 'Siska', 'siska@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(76, NULL, 'user', 2, 1, 'Johan Santoso', 'johan@sbp.it', '', '', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(78, NULL, 'admin', 3, 0, 'Stefanus', 'gmail@stef.com', 'User', '082157273921', '7c222fb2927d828af22f592134e8932480637c0d', 'skin-blue', 'opened', '', '', '', 'mdbcsi6potcb75or2a9jnm16ig', '', 0, 'en', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `type` varchar(10) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `perms` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `name`, `perms`) VALUES
(1, 'admin', 'Super Administrator', 'a:95:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:9:\"addTicket\";i:26;s:10:\"editTicket\";i:27;s:12:\"deleteTicket\";i:28;s:12:\"manageTicket\";i:29;s:17:\"manageTicketRules\";i:30;s:17:\"manageTicketNotes\";i:31;s:22:\"manageTicketAssignment\";i:32;s:11:\"viewTickets\";i:33;s:8:\"addIssue\";i:34;s:9:\"editIssue\";i:35;s:11:\"deleteIssue\";i:36;s:11:\"manageIssue\";i:37;s:10:\"viewIssues\";i:38;s:10:\"addComment\";i:39;s:11:\"editComment\";i:40;s:13:\"deleteComment\";i:41;s:13:\"assignComment\";i:42;s:12:\"viewComments\";i:43;s:13:\"addCredential\";i:44;s:14:\"editCredential\";i:45;s:16:\"deleteCredential\";i:46;s:14:\"viewCredential\";i:47;s:15:\"viewCredentials\";i:48;s:5:\"addKB\";i:49;s:6:\"editKB\";i:50;s:8:\"deleteKB\";i:51;s:6:\"viewKB\";i:52;s:9:\"addPReply\";i:53;s:10:\"editPReply\";i:54;s:12:\"deletePReply\";i:55;s:12:\"viewPReplies\";i:56;s:10:\"uploadFile\";i:57;s:12:\"downloadFile\";i:58;s:10:\"deleteFile\";i:59;s:9:\"viewFiles\";i:60;s:7:\"addHost\";i:61;s:8:\"editHost\";i:62;s:10:\"deleteHost\";i:63;s:10:\"manageHost\";i:64;s:14:\"viewMonitoring\";i:65;s:7:\"addUser\";i:66;s:8:\"editUser\";i:67;s:10:\"deleteUser\";i:68;s:9:\"viewUsers\";i:69;s:8:\"addStaff\";i:70;s:9:\"editStaff\";i:71;s:11:\"deleteStaff\";i:72;s:9:\"viewStaff\";i:73;s:7:\"addRole\";i:74;s:8:\"editRole\";i:75;s:10:\"deleteRole\";i:76;s:9:\"viewRoles\";i:77;s:10:\"addContact\";i:78;s:11:\"editContact\";i:79;s:13:\"deleteContact\";i:80;s:12:\"viewContacts\";i:81;s:10:\"manageData\";i:82;s:14:\"manageSettings\";i:83;s:8:\"viewLogs\";i:84;s:10:\"viewSystem\";i:85;s:10:\"viewPeople\";i:86;s:11:\"viewReports\";i:87;s:11:\"autorefresh\";i:88;s:6:\"search\";i:89;s:14:\"addMaintenance\";i:90;s:15:\"editMaintenance\";i:91;s:17:\"deleteMaintenance\";i:92;s:17:\"manageMaintenance\";i:93;s:15:\"viewMaintenance\";i:94;s:4:\"Null\";}'),
(2, 'user', 'Standard User', 'a:76:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:9:\"addTicket\";i:26;s:10:\"editTicket\";i:27;s:12:\"deleteTicket\";i:28;s:12:\"manageTicket\";i:29;s:17:\"manageTicketRules\";i:30;s:17:\"manageTicketNotes\";i:31;s:22:\"manageTicketAssignment\";i:32;s:11:\"viewTickets\";i:33;s:8:\"addIssue\";i:34;s:9:\"editIssue\";i:35;s:11:\"deleteIssue\";i:36;s:11:\"manageIssue\";i:37;s:10:\"viewIssues\";i:38;s:10:\"addComment\";i:39;s:11:\"editComment\";i:40;s:13:\"deleteComment\";i:41;s:13:\"assignComment\";i:42;s:12:\"viewComments\";i:43;s:13:\"addCredential\";i:44;s:14:\"editCredential\";i:45;s:16:\"deleteCredential\";i:46;s:14:\"viewCredential\";i:47;s:15:\"viewCredentials\";i:48;s:5:\"addKB\";i:49;s:6:\"editKB\";i:50;s:8:\"deleteKB\";i:51;s:6:\"viewKB\";i:52;s:9:\"addPReply\";i:53;s:10:\"editPReply\";i:54;s:12:\"deletePReply\";i:55;s:12:\"viewPReplies\";i:56;s:10:\"uploadFile\";i:57;s:12:\"downloadFile\";i:58;s:10:\"deleteFile\";i:59;s:9:\"viewFiles\";i:60;s:7:\"addHost\";i:61;s:8:\"editHost\";i:62;s:10:\"deleteHost\";i:63;s:10:\"manageHost\";i:64;s:14:\"viewMonitoring\";i:65;s:9:\"viewUsers\";i:66;s:12:\"viewContacts\";i:67;s:10:\"manageData\";i:68;s:11:\"viewReports\";i:69;s:11:\"autorefresh\";i:70;s:14:\"addMaintenance\";i:71;s:15:\"editMaintenance\";i:72;s:17:\"deleteMaintenance\";i:73;s:17:\"manageMaintenance\";i:74;s:15:\"viewMaintenance\";i:75;s:4:\"Null\";}'),
(3, 'admin', 'Administrator', 'a:71:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"manageClient\";i:3;s:12:\"adminsClient\";i:4;s:11:\"viewClients\";i:5;s:8:\"addAsset\";i:6;s:9:\"editAsset\";i:7;s:11:\"manageAsset\";i:8;s:12:\"licenseAsset\";i:9;s:10:\"viewAssets\";i:10;s:10:\"addLicense\";i:11;s:11:\"editLicense\";i:12;s:13:\"manageLicense\";i:13;s:12:\"assetLicense\";i:14;s:12:\"viewLicenses\";i:15;s:10:\"addProject\";i:16;s:11:\"editProject\";i:17;s:13:\"manageProject\";i:18;s:18:\"manageProjectNotes\";i:19;s:13:\"adminsProject\";i:20;s:12:\"viewProjects\";i:21;s:9:\"addTicket\";i:22;s:10:\"editTicket\";i:23;s:12:\"manageTicket\";i:24;s:17:\"manageTicketRules\";i:25;s:17:\"manageTicketNotes\";i:26;s:11:\"viewTickets\";i:27;s:8:\"addIssue\";i:28;s:9:\"editIssue\";i:29;s:11:\"manageIssue\";i:30;s:10:\"viewIssues\";i:31;s:10:\"addComment\";i:32;s:11:\"editComment\";i:33;s:13:\"assignComment\";i:34;s:12:\"viewComments\";i:35;s:13:\"addCredential\";i:36;s:14:\"editCredential\";i:37;s:14:\"viewCredential\";i:38;s:15:\"viewCredentials\";i:39;s:5:\"addKB\";i:40;s:6:\"viewKB\";i:41;s:9:\"addPReply\";i:42;s:12:\"viewPReplies\";i:43;s:10:\"uploadFile\";i:44;s:12:\"downloadFile\";i:45;s:9:\"viewFiles\";i:46;s:7:\"addHost\";i:47;s:8:\"editHost\";i:48;s:10:\"manageHost\";i:49;s:14:\"viewMonitoring\";i:50;s:7:\"addUser\";i:51;s:8:\"editUser\";i:52;s:9:\"viewUsers\";i:53;s:8:\"addStaff\";i:54;s:9:\"editStaff\";i:55;s:9:\"viewStaff\";i:56;s:7:\"addRole\";i:57;s:8:\"editRole\";i:58;s:9:\"viewRoles\";i:59;s:10:\"addContact\";i:60;s:11:\"editContact\";i:61;s:12:\"viewContacts\";i:62;s:10:\"manageData\";i:63;s:8:\"viewLogs\";i:64;s:10:\"viewSystem\";i:65;s:10:\"viewPeople\";i:66;s:11:\"viewReports\";i:67;s:11:\"autorefresh\";i:68;s:6:\"search\";i:69;s:15:\"viewMaintenance\";i:70;s:4:\"Null\";}');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `categoryid`, `name`) VALUES
(1, 2, 'hektare'),
(2, 2, 'are'),
(3, 2, 'km2'),
(4, 2, 'm2'),
(5, 1, 'km'),
(6, 1, 'meter'),
(7, 1, 'cm'),
(8, 1, 'inch'),
(9, 3, 'km3'),
(10, 3, 'm3'),
(11, 3, 'liter'),
(12, 3, 'cc'),
(13, 4, 'ton'),
(14, 4, 'kwintal'),
(15, 4, 'kg'),
(16, 4, 'ons'),
(17, 4, 'pon'),
(18, 4, 'g'),
(19, 5, 'rit'),
(20, 5, 'pcs'),
(21, 5, 'roll'),
(22, 5, 'palet'),
(23, 5, 'plate'),
(24, 0, 'bulan'),
(25, 0, 'lot'),
(27, 0, 'hari'),
(28, 0, 'lembar'),
(29, 0, 'pack'),
(30, 0, 'buah'),
(31, 0, 'bendel'),
(32, 0, 'galon'),
(33, 0, 'ls'),
(35, 0, 'unit'),
(37, 0, 'jam'),
(39, 0, 'box'),
(40, 0, 'bungkus'),
(41, 0, 'orang x bulan'),
(42, 0, 'orang x X'),
(43, 0, 'unit x bulan'),
(44, 0, 'kali'),
(45, 0, 'orang x kali'),
(76, 0, 'hr x org'),
(47, 0, 'paket'),
(75, 0, 'orang x hari'),
(74, 0, 'hr'),
(73, 0, 'M'),
(72, 0, 'sak'),
(71, 0, 'LS'),
(56, 0, 'bln'),
(57, 0, 'pkt'),
(58, 0, 'minggu'),
(60, 0, 'btg'),
(61, 0, 'bh'),
(70, 0, 'set'),
(69, 0, 'm'),
(68, 0, 'rim'),
(77, 0, 'kamar'),
(78, 0, 'pak'),
(79, 0, 'ltr'),
(80, 0, 'kaleng'),
(81, 0, 'btl'),
(82, 0, 'tbg'),
(83, 0, 'kmr'),
(84, 0, 'mgg'),
(85, 0, 'mtr');

-- --------------------------------------------------------

--
-- Table structure for table `sizecat`
--

CREATE TABLE `sizecat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sizecat`
--

INSERT INTO `sizecat` (`id`, `name`, `color`) VALUES
(1, 'Long', '#000000'),
(2, 'Area', '#000000'),
(3, 'Volume', '#000000'),
(4, 'Weight', '#000000'),
(5, 'Unit', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `smslog`
--

CREATE TABLE `smslog` (
  `id` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `mobile` varchar(128) NOT NULL,
  `sms` varchar(256) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statuscodes`
--

CREATE TABLE `statuscodes` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuscodes`
--

INSERT INTO `statuscodes` (`id`, `code`, `type`, `message`) VALUES
(1, 11, 'danger', 'Error! Cannot add item.'),
(2, 21, 'danger', 'Error! Cannot save item.'),
(3, 31, 'danger', 'Error! Cannot delete item.'),
(4, 30, 'success', 'Item has been deleted successfully!'),
(5, 20, 'success', 'Item has been saved successfully!'),
(6, 10, 'success', 'Item has been added successfully!'),
(7, 40, 'success', 'Settings updated successfully!'),
(8, 1200, 'danger', 'Authentication Failed!'),
(9, 1300, 'success', 'Please check your email for a password reset link.'),
(10, 1400, 'danger', 'Email address was not found.'),
(11, 1500, 'danger', 'Invalid reset key!'),
(12, 1600, 'success', 'Success. Please log in with your new password! '),
(13, 1, 'danger', 'Unauthorized Access'),
(14, 111, 'danger', 'Error! More than stock.'),
(15, 1111, 'warning', 'Some Success, Some more than stock.'),
(16, 66, 'danger', 'Error! Cannot add item. Invalid Data Type!'),
(17, 666, 'danger', 'Error! Cannot add item. Max size file 1 MB');

-- --------------------------------------------------------

--
-- Table structure for table `systemlog`
--

CREATE TABLE `systemlog` (
  `id` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemlog`
--

INSERT INTO `systemlog` (`id`, `peopleid`, `ipaddress`, `description`, `timestamp`) VALUES
(60082, 27, '192.168.41.168', 'Warehouse Deleted - Name: BAMBANG PUTRA TAMA', '2020-11-25 14:00:17'),
(60083, -1, '192.168.41.168', 'User/Admin Logged In - ID: 27', '2020-11-26 08:20:53'),
(60084, -1, '192.168.41.168', 'User/Admin Logged In - ID: 27', '2020-11-26 08:20:57'),
(60085, -1, '::1', 'User/Admin Logged In - ID: 1', '2020-11-26 08:28:09'),
(60086, -1, '::1', 'User/Admin Logged In - ID: 1', '2020-11-27 08:00:42'),
(60087, -1, '192.168.41.168', 'User/Admin Logged In - ID: 27', '2020-11-27 08:19:22'),
(60088, -1, '192.168.41.168', 'User/Admin Logged In - ID: 27', '2020-11-27 08:19:26'),
(60089, -1, '::1', 'User/Admin Logged In - ID: 1', '2020-12-02 12:52:50'),
(60090, -1, '::1', 'User/Admin Logged In - ID: 1', '2020-12-03 08:55:09'),
(60091, 1, '::1', 'Kas Category Added - Name: tes', '2020-12-03 13:15:19'),
(60092, 1, '::1', 'Kas Category Added - Name: z', '2020-12-03 13:18:05'),
(60093, 1, '::1', 'Kas Category Edited - ID: 6', '2020-12-03 13:21:21'),
(60094, 1, '::1', 'Kas Category Deleted - Name: tesz', '2020-12-03 13:21:24'),
(60095, 1, '::1', 'Kas Category Deleted - Name: z', '2020-12-03 13:21:38'),
(60096, 1, '::1', 'Kas Category Deleted - Name: tesz', '2020-12-03 13:21:43'),
(60097, 1, '::1', 'Kas Category Added - Name: Pusat', '2020-12-03 14:03:10'),
(60098, 1, '::1', 'Kas Category Added - Name: Cabang', '2020-12-03 14:03:22'),
(60099, 1, '::1', 'Kas Added - Name: Kudus', '2020-12-03 14:53:22'),
(60100, 1, '::1', 'Kas Added - Name: a', '2020-12-03 14:53:42'),
(60101, 1, '::1', 'Kas Added - Name: Tes', '2020-12-03 15:04:40'),
(60102, 1, '::1', 'Kas Added - Name: a', '2020-12-03 15:17:35'),
(60103, -1, '::1', 'User/Admin Logged In - ID: 1', '2020-12-04 07:36:48'),
(60104, 1, '::1', 'Kas Edited - ID: 1', '2020-12-04 08:48:30'),
(60105, 1, '::1', 'Kas Edited - ID: 1', '2020-12-04 08:48:52'),
(60106, 1, '::1', 'Kas Edited - ID: 1', '2020-12-04 08:48:58'),
(60107, 1, '::1', 'Kas Deleted - Name: a', '2020-12-04 08:52:24'),
(60108, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-02 12:56:47'),
(60109, 1, '127.0.0.1', 'Kas Added - Name: utef', '2022-08-02 13:51:18'),
(60110, 1, '127.0.0.1', 'Kas Deleted - Name: utef', '2022-08-02 14:30:50'),
(60111, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-03 07:17:21'),
(60112, 1, '127.0.0.1', 'Kas Added - Name: Utef', '2022-08-03 08:41:51'),
(60113, 1, '127.0.0.1', 'Contact Added - ID: 1', '2022-08-03 08:45:43'),
(60114, 1, '127.0.0.1', 'Kas Edited - ID: 4', '2022-08-03 14:42:41'),
(60115, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n', '2022-08-03 15:28:49'),
(60116, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n', '2022-08-03 15:29:15'),
(60117, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-03 15:29:57'),
(60118, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-03 15:30:53'),
(60119, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-04 07:17:03'),
(60120, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-04 07:17:13'),
(60121, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-04 07:30:37'),
(60122, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-04 07:49:20'),
(60123, 1, '127.0.0.1', 'Books Added - ID: 2', '2022-08-04 08:09:31'),
(60124, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-04 15:28:34'),
(60125, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-05 07:20:37'),
(60126, 1, '127.0.0.1', 'Books Added - ID: 3', '2022-08-05 07:26:44'),
(60127, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\edit.html</b> on line <b>30</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\edit.html</b> on line <b>30</b><br />\r\n', '2022-08-05 07:46:22'),
(60128, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 07:47:35'),
(60129, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 08:02:33'),
(60130, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 08:02:42'),
(60131, 1, '127.0.0.1', 'Books Added - ID: 4', '2022-08-05 08:04:00'),
(60132, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 08:04:04'),
(60133, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 08:08:17'),
(60134, 1, '127.0.0.1', 'Books Added - ID: 5', '2022-08-05 08:14:27'),
(60135, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 08:14:43'),
(60136, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 08:19:12'),
(60137, 1, '127.0.0.1', 'books Deleted - ID: ', '2022-08-05 08:20:27'),
(60138, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:24:16'),
(60139, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:24:35'),
(60140, 1, '127.0.0.1', 'Contact Edited - ID: 1', '2022-08-05 08:35:14'),
(60141, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:42:00'),
(60142, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:44:17'),
(60143, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:47:01'),
(60144, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:47:31'),
(60145, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:47:38'),
(60146, 1, '127.0.0.1', 'Books Added - ID: 6', '2022-08-05 08:47:59'),
(60147, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:48:08'),
(60148, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\nArray', '2022-08-05 08:48:21'),
(60149, 1, '127.0.0.1', 'books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 08:49:29'),
(60150, 1, '127.0.0.1', 'books Deleted - Title: ', '2022-08-05 08:53:35'),
(60151, 1, '127.0.0.1', 'Books Deleted - Title: <', '2022-08-05 08:59:57'),
(60152, 1, '127.0.0.1', 'Books Deleted - Title: <', '2022-08-05 09:00:02'),
(60153, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n', '2022-08-05 09:01:17'),
(60154, 1, '127.0.0.1', 'Kas Deleted - Name: Utef', '2022-08-05 09:02:11'),
(60155, 1, '127.0.0.1', 'Kas Added - Name: Stefanus Dorotheoputra', '2022-08-05 09:02:42'),
(60156, 1, '127.0.0.1', 'Kas Edited - ID: 5', '2022-08-05 09:02:50'),
(60157, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n', '2022-08-05 09:15:00'),
(60158, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n', '2022-08-05 09:52:31'),
(60159, 1, '127.0.0.1', 'Books Added - ID: 7', '2022-08-05 09:55:38'),
(60160, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>5</b><br />\r\n', '2022-08-05 09:55:41'),
(60161, 1, '127.0.0.1', 'Books Deleted - ID: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>4</b><br />\r\n', '2022-08-05 09:57:12'),
(60162, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n', '2022-08-05 10:26:49'),
(60163, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n', '2022-08-05 13:06:50'),
(60164, 1, '127.0.0.1', 'Kas Edited - ID: 5', '2022-08-05 13:07:32'),
(60165, 1, '127.0.0.1', 'Books Deleted - title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>10</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>10</b><br />\r\n', '2022-08-05 13:17:00'),
(60166, 1, '127.0.0.1', 'Books Deleted - title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n', '2022-08-05 13:17:27'),
(60167, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n', '2022-08-05 13:18:22'),
(60168, 1, '127.0.0.1', 'Books Added - ID: 8', '2022-08-05 13:22:09'),
(60169, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n', '2022-08-05 13:22:13'),
(60170, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n', '2022-08-05 13:28:05'),
(60171, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>11</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>11</b><br />\r\n', '2022-08-05 13:35:14'),
(60172, 1, '127.0.0.1', 'Books Deleted - Title: <br />\r\n<b>Notice</b>:  Undefined variable: books in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\books\\delete.html</b> on line <b>9</b><br />\r\n', '2022-08-05 13:43:58'),
(60173, 1, '127.0.0.1', 'Books Deleted - Title: Pemrograman web', '2022-08-05 13:57:54'),
(60174, 1, '127.0.0.1', 'Books Added - ID: 9', '2022-08-05 13:58:48'),
(60175, 1, '127.0.0.1', 'Books Deleted - Title: aaa', '2022-08-05 13:58:54'),
(60176, 1, '127.0.0.1', 'Books Deleted - Title: BUKU', '2022-08-05 13:58:57'),
(60177, 1, '127.0.0.1', 'Books Added - ID: 10', '2022-08-05 13:59:32'),
(60178, 1, '127.0.0.1', 'Books Added - ID: 11', '2022-08-05 14:00:45'),
(60179, 1, '127.0.0.1', 'Books Edited - ID: 10', '2022-08-05 14:26:38'),
(60180, 1, '127.0.0.1', 'Books Added - ID: 12', '2022-08-05 14:28:38'),
(60181, 1, '127.0.0.1', 'Books Edited - ID: 12', '2022-08-05 14:28:55'),
(60182, 1, '127.0.0.1', 'Books Edited - ID: 10', '2022-08-05 14:29:07'),
(60183, 1, '127.0.0.1', 'Books Deleted - Title: buku 3', '2022-08-05 15:13:51'),
(60184, 1, '127.0.0.1', 'Books Edited - ID: 10', '2022-08-05 15:16:22'),
(60185, 1, '127.0.0.1', 'Books Edited - ID: 10', '2022-08-05 15:16:30'),
(60186, 1, '127.0.0.1', 'Books Added - ID: 13', '2022-08-05 15:16:44'),
(60187, 1, '127.0.0.1', 'Books Edited - ID: 13', '2022-08-05 15:16:52'),
(60188, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-06 07:21:03'),
(60189, 1, '127.0.0.1', 'Warehouse Added - Name: DESAF', '2022-08-06 08:13:01'),
(60190, 1, '127.0.0.1', 'Language Added - ID: 2', '2022-08-06 08:45:10'),
(60191, 1, '127.0.0.1', 'Language Deleted - ID: 2', '2022-08-06 08:45:19'),
(60192, 1, '127.0.0.1', 'Books Added - ID: 14', '2022-08-06 10:14:40'),
(60193, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-08 07:21:14'),
(60194, 1, '127.0.0.1', 'Books Added - ID: 15', '2022-08-08 08:49:53'),
(60195, 1, '127.0.0.1', 'Books Added - ID: 16', '2022-08-08 08:50:27'),
(60196, 1, '127.0.0.1', 'Books Added - ID: 17', '2022-08-08 09:00:11'),
(60197, 1, '127.0.0.1', 'Books Deleted - Title: DADSDFASFASF SDF SFDSGSD SG ASDGSDGDS SGSDHHRTWETGSA GSADGSD', '2022-08-08 09:00:29'),
(60198, 1, '127.0.0.1', 'Mutation Guardrail Added - Code: AK GEMPAS^KS/001/220810', '2022-08-08 09:12:01'),
(60199, 1, '127.0.0.1', 'Mutation Guardrail Deleted - Code: AK GEMPAS^KS/001/220810', '2022-08-08 09:16:26'),
(60200, 1, '127.0.0.1', 'Books Added - ID: 18', '2022-08-08 09:18:32'),
(60201, 1, '127.0.0.1', 'Books Deleted - Title: buku 1', '2022-08-08 09:56:35'),
(60202, 1, '127.0.0.1', 'Books Deleted - Title: buku 2', '2022-08-08 09:56:37'),
(60203, 1, '127.0.0.1', 'Books Deleted - Title: buku 4', '2022-08-08 09:56:40'),
(60204, 1, '127.0.0.1', 'Books Deleted - Title: Pemrograman Web', '2022-08-08 09:56:42'),
(60205, 1, '127.0.0.1', 'Books Deleted - Title: Pemprograman Berorientasi Objek', '2022-08-08 09:56:44'),
(60206, 1, '127.0.0.1', 'Books Deleted - Title: DADZD', '2022-08-08 09:56:46'),
(60207, 1, '127.0.0.1', 'Books Deleted - Title: ADASDASD SDASAS FAFERA FSDF SFASSSSS', '2022-08-08 09:56:48'),
(60208, 1, '127.0.0.1', 'Books Added - ID: 19', '2022-08-08 10:02:10'),
(60209, 1, '127.0.0.1', 'Books Added - ID: 20', '2022-08-08 10:39:30'),
(60210, 1, '127.0.0.1', 'Books Deleted - Title: badbvad', '2022-08-08 10:46:04'),
(60211, 1, '127.0.0.1', 'Books Added - ID: 21', '2022-08-08 10:46:12'),
(60212, 1, '127.0.0.1', 'Books Added - ID: 22', '2022-08-08 10:50:50'),
(60213, 1, '127.0.0.1', 'Books Added - ID: 23', '2022-08-08 10:54:18'),
(60214, 1, '127.0.0.1', 'Books Added - ID: 24', '2022-08-08 11:17:26'),
(60215, 1, '127.0.0.1', 'Books Edited - ID: 24', '2022-08-08 11:24:52'),
(60216, 1, '127.0.0.1', 'Books Added - ID: 25', '2022-08-08 12:51:02'),
(60217, 1, '127.0.0.1', 'Books Added - ID: 26', '2022-08-08 13:16:04'),
(60218, 1, '127.0.0.1', 'Books Deleted - Title: asdfas', '2022-08-08 13:18:18'),
(60219, 1, '127.0.0.1', 'Books Deleted - Title: buku pemrograman ', '2022-08-08 13:18:20'),
(60220, 1, '127.0.0.1', 'Books Deleted - Title: adad', '2022-08-08 13:18:26'),
(60221, 1, '127.0.0.1', 'Books Deleted - Title: ASAD', '2022-08-08 13:18:29'),
(60222, 1, '127.0.0.1', 'Books Deleted - Title: asa', '2022-08-08 13:18:31'),
(60223, 1, '127.0.0.1', 'Books Deleted - Title: asfasf', '2022-08-08 13:18:33'),
(60224, 1, '127.0.0.1', 'Books Added - ID: 27', '2022-08-08 13:18:41'),
(60225, 1, '127.0.0.1', 'Books Added - ID: 28', '2022-08-08 13:18:58'),
(60226, 1, '127.0.0.1', 'Books Edited - ID: 28', '2022-08-08 13:58:30'),
(60227, 1, '127.0.0.1', 'Books Edited - ID: 28', '2022-08-08 13:58:39'),
(60228, 1, '127.0.0.1', 'Books Edited - ID: 28', '2022-08-08 13:59:03'),
(60229, 1, '127.0.0.1', 'Books Edited - ID: 28', '2022-08-08 13:59:08'),
(60230, 1, '127.0.0.1', 'Books Edited - ID: 27', '2022-08-08 13:59:13'),
(60231, 1, '127.0.0.1', 'Books Edited - ID: 27', '2022-08-08 13:59:17'),
(60232, 1, '127.0.0.1', 'Books Edited - ID: 27', '2022-08-08 14:00:02'),
(60233, 1, '127.0.0.1', 'Books Edited - ID: 27', '2022-08-08 14:00:06'),
(60234, 1, '127.0.0.1', 'Books Edited - ID: 28', '2022-08-08 14:03:31'),
(60235, 1, '127.0.0.1', 'Books Edited - ID: 28', '2022-08-08 14:03:37'),
(60236, 1, '127.0.0.1', 'Project Deleted - Name: Kudus', '2022-08-08 14:04:45'),
(60237, 1, '127.0.0.1', 'Books Deleted - Title: afsfas', '2022-08-08 14:17:52'),
(60238, 1, '127.0.0.1', 'Books Added - ID: 29', '2022-08-08 14:18:35'),
(60239, 1, '127.0.0.1', 'Books Deleted - Title: adsd', '2022-08-08 14:18:39'),
(60240, 1, '127.0.0.1', 'Books Added - ID: 30', '2022-08-08 14:18:50'),
(60241, 1, '127.0.0.1', 'Books Deleted - Title: cZCfc', '2022-08-08 14:20:32'),
(60242, 1, '127.0.0.1', 'Books Edited - ID: 28', '2022-08-08 14:20:39'),
(60243, 1, '127.0.0.1', 'Books Added - ID: 31', '2022-08-08 14:20:52'),
(60244, 1, '127.0.0.1', 'Books Deleted - Title: sadf', '2022-08-08 14:25:43'),
(60245, 1, '127.0.0.1', 'Books Added - ID: 32', '2022-08-08 14:25:55'),
(60246, 1, '127.0.0.1', 'Books Deleted - Title: cadfsafa', '2022-08-08 14:25:57'),
(60247, 1, '127.0.0.1', 'Books Added - ID: 33', '2022-08-08 14:26:11'),
(60248, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-09 07:10:37'),
(60249, 1, '127.0.0.1', 'Kas Added - Name: afsad', '2022-08-09 07:15:13'),
(60250, 1, '127.0.0.1', 'Books Edited - ID: 33', '2022-08-09 08:30:55'),
(60251, 1, '127.0.0.1', 'Books Edited - ID: 33', '2022-08-09 08:31:32'),
(60252, 1, '127.0.0.1', 'Books Deleted - Title: safasfas', '2022-08-09 08:31:38'),
(60253, 1, '127.0.0.1', 'Personal Data Deleted - Name: adasd', '2022-08-09 11:00:43'),
(60254, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>59</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>59</b><br />\r\n', '2022-08-09 11:14:38'),
(60255, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>59</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>59</b><br />\r\n', '2022-08-09 11:15:16'),
(60256, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 12:31:01'),
(60257, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 12:31:18'),
(60258, 1, '127.0.0.1', 'Personal Data Deleted - Name: aasdas', '2022-08-09 12:33:57'),
(60259, 1, '127.0.0.1', 'Personal Data Deleted - Name: dasd', '2022-08-09 13:05:40'),
(60260, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 13:23:52'),
(60261, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 13:24:25'),
(60262, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 13:25:16'),
(60263, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 13:25:42'),
(60264, 1, '127.0.0.1', 'Personal Data Deleted - Name: Stefanus Dorotheoputra', '2022-08-09 13:27:28'),
(60265, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 13:58:18'),
(60266, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 13:58:36'),
(60267, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 13:58:46'),
(60268, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 14:02:03'),
(60269, 1, '127.0.0.1', 'Kas Edited - ID: <br />\r\n<b>Notice</b>:  Undefined variable: p in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\xampp\\htdocs\\atm\\template\\modals\\personaldata\\edit.html</b> on line <b>54</b><br />\r\n', '2022-08-09 14:02:09'),
(60270, 1, '127.0.0.1', 'Personal Data Edited - ID: 1', '2022-08-09 14:18:38'),
(60271, 1, '127.0.0.1', 'Personal Data Edited - ID: 1', '2022-08-09 14:18:45'),
(60272, 1, '127.0.0.1', 'Personal Data Edited - ID: 1', '2022-08-09 14:20:44'),
(60273, 1, '127.0.0.1', 'Personal data Edited - ID: 1', '2022-08-09 14:33:50'),
(60274, 1, '127.0.0.1', 'Personaldata Deleted - Nama: Stefanus Dorotheoputra', '2022-08-09 14:38:57'),
(60275, 1, '127.0.0.1', 'Personal data Edited - ID: 2', '2022-08-09 14:41:11'),
(60276, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-10 07:19:49'),
(60277, 1, '127.0.0.1', 'Personal data Edited - ID: 2', '2022-08-10 07:41:50'),
(60278, 1, '127.0.0.1', 'Personal data Edited - ID: 2', '2022-08-10 08:16:03'),
(60279, 1, '127.0.0.1', 'Personal data Edited - ID: 2', '2022-08-10 08:17:35'),
(60280, 1, '127.0.0.1', 'Pesonal Data Added - Nama: DAD', '2022-08-10 08:20:06'),
(60281, 1, '127.0.0.1', 'Personal data Edited - ID: 3', '2022-08-10 08:32:40'),
(60282, 1, '127.0.0.1', 'Personal data Edited - ID: 3', '2022-08-10 08:32:51'),
(60283, 1, '127.0.0.1', 'Pesonal Data Added - Nama: dfaf', '2022-08-10 08:43:03'),
(60284, 1, '127.0.0.1', 'Pesonal Data Added - Nama: adad', '2022-08-10 08:44:11'),
(60285, 1, '127.0.0.1', 'Personal data Edited - ID: 5', '2022-08-10 08:44:25'),
(60286, 1, '127.0.0.1', 'Personal data Edited - ID: 5', '2022-08-10 08:54:54'),
(60287, 1, '127.0.0.1', 'Personal data Edited - ID: 5', '2022-08-10 08:58:19'),
(60288, 1, '127.0.0.1', 'Pesonal Data Added - Nama: aasf', '2022-08-10 09:00:47'),
(60289, 1, '127.0.0.1', 'Personal data Edited - ID: 6', '2022-08-10 09:05:30'),
(60290, 1, '127.0.0.1', 'Personal data Edited - ID: 6', '2022-08-10 09:05:50'),
(60291, 1, '127.0.0.1', 'Personal data Edited - ID: 2', '2022-08-10 09:06:05'),
(60292, 1, '127.0.0.1', 'Personal data Edited - ID: 3', '2022-08-10 09:06:20'),
(60293, 1, '127.0.0.1', 'Personal data Edited - ID: 4', '2022-08-10 09:06:32'),
(60294, 1, '127.0.0.1', 'Pesonal Data Added - Nama: dsad', '2022-08-10 09:09:53'),
(60295, 1, '127.0.0.1', 'Personal data Edited - ID: 7', '2022-08-10 09:10:18'),
(60296, 1, '127.0.0.1', 'Pesonal Data Added - Nama: asfa', '2022-08-10 09:11:03'),
(60297, 1, '127.0.0.1', 'Pesonal Data Added - Nama: dasdas', '2022-08-10 09:12:57'),
(60298, 1, '127.0.0.1', 'Personal data Edited - ID: 9', '2022-08-10 09:13:50'),
(60299, 1, '127.0.0.1', 'Personal data Edited - ID: 9', '2022-08-10 09:14:00'),
(60300, 1, '127.0.0.1', 'Personal data Edited - ID: 8', '2022-08-10 09:14:14'),
(60301, 1, '127.0.0.1', 'Pesonal Data Added - Nama: dadas', '2022-08-10 09:16:30'),
(60302, 1, '127.0.0.1', 'Personal data Edited - ID: 9', '2022-08-10 09:16:47'),
(60303, 1, '127.0.0.1', 'Personaldata Deleted - Nama: dasdas', '2022-08-10 09:16:57'),
(60304, 1, '127.0.0.1', 'Personal data Edited - ID: 10', '2022-08-10 09:18:17'),
(60305, 1, '127.0.0.1', 'Personal data Edited - ID: 10', '2022-08-10 09:18:49'),
(60306, 1, '127.0.0.1', 'Personaldata Deleted - Nama: asfa', '2022-08-10 09:19:07'),
(60307, 1, '127.0.0.1', 'Personaldata Deleted - Nama: dsad', '2022-08-10 09:19:10'),
(60308, 1, '127.0.0.1', 'Personal data Edited - ID: 10', '2022-08-10 09:19:20'),
(60309, 1, '127.0.0.1', 'Personal data Edited - ID: 10', '2022-08-10 09:19:42'),
(60310, 1, '127.0.0.1', 'Personaldata Deleted - Nama: dadas', '2022-08-10 09:19:52'),
(60311, 1, '127.0.0.1', 'Personal data Edited - ID: 4', '2022-08-10 09:20:03'),
(60312, 1, '127.0.0.1', 'Personaldata Deleted - Nama: Stefanus Dorotheoputra', '2022-08-10 09:27:56'),
(60313, 1, '127.0.0.1', 'Pesonal Data Added - Nama: ada', '2022-08-10 09:28:29'),
(60314, 1, '127.0.0.1', 'Pesonal Data Added - Nama: adas', '2022-08-10 09:29:18'),
(60315, 1, '127.0.0.1', 'Personal data Edited - ID: 12', '2022-08-10 09:29:36'),
(60316, 1, '127.0.0.1', 'Personal data Edited - ID: 12', '2022-08-10 09:29:50'),
(60317, 1, '127.0.0.1', 'Personal data Edited - ID: 12', '2022-08-10 09:30:46'),
(60318, 1, '127.0.0.1', 'Pesonal Data Added - Nama: asd', '2022-08-10 09:32:19'),
(60319, 1, '127.0.0.1', 'Personal data Edited - ID: 13', '2022-08-10 09:32:35'),
(60320, 1, '127.0.0.1', 'Pesonal Data Added - Nama: fafasdf', '2022-08-10 09:33:07'),
(60321, 1, '127.0.0.1', 'Personal data Edited - ID: 14', '2022-08-10 09:33:27'),
(60322, 1, '127.0.0.1', 'Personaldata Deleted - Nama: dfaf', '2022-08-10 09:34:11'),
(60323, 1, '127.0.0.1', 'Personaldata Deleted - Nama: DAD', '2022-08-10 09:34:14'),
(60324, 1, '127.0.0.1', 'Personal data Edited - ID: 12', '2022-08-10 09:34:24'),
(60325, 1, '127.0.0.1', 'Pesonal Data Added - Nama: asdas', '2022-08-10 09:36:02'),
(60326, 1, '127.0.0.1', 'Personal data Edited - ID: 15', '2022-08-10 09:36:09'),
(60327, 1, '127.0.0.1', 'Pesonal Data Added - Nama: afaf', '2022-08-10 09:37:06'),
(60328, 1, '127.0.0.1', 'Personal data Edited - ID: 16', '2022-08-10 09:37:19'),
(60329, 1, '127.0.0.1', 'Personal data Edited - ID: 16', '2022-08-10 09:37:58'),
(60330, 1, '127.0.0.1', 'Personaldata Deleted - Nama: afaf', '2022-08-10 09:38:13'),
(60331, 1, '127.0.0.1', 'Pesonal Data Added - Nama: dasd', '2022-08-10 09:38:30'),
(60332, 1, '127.0.0.1', 'Personal data Edited - ID: 17', '2022-08-10 09:38:37'),
(60333, 1, '127.0.0.1', 'Pesonal Data Added - Nama: adas', '2022-08-10 09:46:29'),
(60334, 1, '127.0.0.1', 'Personal data Edited - ID: 18', '2022-08-10 09:46:55'),
(60335, 1, '127.0.0.1', 'Personal data Edited - ID: 18', '2022-08-10 09:47:04'),
(60336, 1, '127.0.0.1', 'Pesonal Data Added - Nama: adsda', '2022-08-10 09:52:09'),
(60337, 1, '127.0.0.1', 'Personal data Edited - ID: 19', '2022-08-10 09:52:22'),
(60338, 1, '127.0.0.1', 'Personal data Edited - ID: 19', '2022-08-10 09:52:29'),
(60339, 1, '127.0.0.1', 'Personal data Edited - ID: 19', '2022-08-10 09:55:48'),
(60340, 1, '127.0.0.1', 'Personal data Edited - ID: 19', '2022-08-10 09:56:04'),
(60341, 1, '127.0.0.1', 'Pesonal Data Added - Nama: dasds', '2022-08-10 09:56:31'),
(60342, 1, '127.0.0.1', 'Personal data Edited - ID: 20', '2022-08-10 09:56:50'),
(60343, 1, '127.0.0.1', 'Personal data Edited - ID: 19', '2022-08-10 09:57:11'),
(60344, 1, '127.0.0.1', 'Personal data Edited - ID: 19', '2022-08-10 09:57:20'),
(60345, 1, '127.0.0.1', 'Personal data Edited - ID: 20', '2022-08-10 09:58:48'),
(60346, 1, '127.0.0.1', 'Personal data Edited - ID: 20', '2022-08-10 09:58:56'),
(60347, 1, '127.0.0.1', 'Pesonal Data Added - Nama: adasd', '2022-08-10 10:08:10'),
(60348, 1, '127.0.0.1', 'Personal data Edited - ID: 21', '2022-08-10 10:08:54'),
(60349, 1, '127.0.0.1', 'Pesonal Data Added - Nama: asdasd', '2022-08-10 10:09:20'),
(60350, 1, '127.0.0.1', 'Personal data Edited - ID: 22', '2022-08-10 10:09:28'),
(60351, 1, '127.0.0.1', 'Pesonal Data Added - Nama: asdasda', '2022-08-10 10:10:38'),
(60352, 1, '127.0.0.1', 'Personal data Edited - ID: 23', '2022-08-10 10:10:52'),
(60353, 1, '127.0.0.1', 'Personal data Edited - ID: 5', '2022-08-10 10:28:27'),
(60354, 1, '127.0.0.1', 'Personal data Edited - ID: 5', '2022-08-10 10:31:16'),
(60355, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-22 07:31:32'),
(60356, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-22 13:23:01'),
(60357, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-26 09:47:07'),
(60358, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-26 13:58:22'),
(60359, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-27 08:00:05'),
(60360, 1, '127.0.0.1', 'Staff Account Added - ID: 78', '2022-08-27 08:01:18'),
(60361, 1, '127.0.0.1', 'User/Staff Logged Out - ID: 1', '2022-08-27 08:01:28'),
(60362, -1, '127.0.0.1', 'User/Admin Logged In - ID: 78', '2022-08-27 08:01:36'),
(60363, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-29 08:18:14'),
(60364, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-08-29 13:18:30'),
(60390, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-11-08 19:08:53'),
(60391, 1, '127.0.0.1', 'User/Staff Logged Out - ID: 1', '2022-11-08 19:21:18'),
(60392, -1, '127.0.0.1', 'User/Admin Logged In - ID: 1', '2022-11-08 19:21:20'),
(60393, 1, '127.0.0.1', 'Staff Account Added - ID: 79', '2022-11-09 01:58:02'),
(60394, 1, '127.0.0.1', 'Staff Account Edited - ID: 79', '2022-11-09 01:58:11'),
(60395, 1, '127.0.0.1', 'Staff Account Deleted - ID: 79', '2022-11-09 01:58:18'),
(60396, 1, '127.0.0.1', 'Role Added - ID: 4', '2022-11-09 01:58:30'),
(60397, 1, '127.0.0.1', 'Role Edited - ID: 4', '2022-11-09 01:58:36'),
(60398, 1, '127.0.0.1', 'Role Deleted - ID: 4', '2022-11-09 01:58:44'),
(60399, 1, '127.0.0.1', 'Contact Added - ID: 2', '2022-11-09 01:59:38'),
(60400, 1, '127.0.0.1', 'Contact Edited - ID: 2', '2022-11-09 01:59:47'),
(60401, 1, '127.0.0.1', 'Contact Deleted - ID: 2', '2022-11-09 01:59:50'),
(60402, 1, '127.0.0.1', 'Predefined Reply Added - ID: 2', '2022-11-09 02:00:02'),
(60403, 1, '127.0.0.1', 'Predefined Reply Deleted - ID: 2', '2022-11-09 02:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `assetid` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `broken` int(11) DEFAULT 0,
  `replied` int(11) DEFAULT 0,
  `notifed` int(11) DEFAULT 0,
  `priority` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  `duedate` varchar(20) DEFAULT NULL,
  `notes` text NOT NULL,
  `ccs` varchar(255) NOT NULL,
  `dateclosed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_departments`
--

CREATE TABLE `tickets_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_departments`
--

INSERT INTO `tickets_departments` (`id`, `name`) VALUES
(1, 'IT Department');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_pr`
--

CREATE TABLE `tickets_pr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_pr`
--

INSERT INTO `tickets_pr` (`id`, `name`, `content`) VALUES
(1, 'Demo Predefined Reply', '<div><p>Predefined reply body.<br></p></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_replies`
--

CREATE TABLE `tickets_replies` (
  `id` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `message` text NOT NULL,
  `component` int(11) NOT NULL DEFAULT 0,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_rules`
--

CREATE TABLE `tickets_rules` (
  `id` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `executed` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cond_status` varchar(255) NOT NULL,
  `cond_priority` varchar(255) NOT NULL,
  `cond_timeelapsed` varchar(20) NOT NULL,
  `cond_datetime` datetime NOT NULL,
  `act_status` varchar(255) NOT NULL,
  `act_priority` varchar(255) NOT NULL,
  `act_assignto` int(11) NOT NULL,
  `act_notifyadmins` int(11) NOT NULL,
  `act_addreply` int(11) NOT NULL,
  `reply` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emaillog`
--
ALTER TABLE `emaillog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizecat`
--
ALTER TABLE `sizecat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smslog`
--
ALTER TABLE `smslog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `statuscodes`
--
ALTER TABLE `statuscodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemlog`
--
ALTER TABLE `systemlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_departments`
--
ALTER TABLE `tickets_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_pr`
--
ALTER TABLE `tickets_pr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_replies`
--
ALTER TABLE `tickets_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_rules`
--
ALTER TABLE `tickets_rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emaillog`
--
ALTER TABLE `emaillog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `sizecat`
--
ALTER TABLE `sizecat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smslog`
--
ALTER TABLE `smslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuscodes`
--
ALTER TABLE `statuscodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `systemlog`
--
ALTER TABLE `systemlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60404;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_departments`
--
ALTER TABLE `tickets_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets_pr`
--
ALTER TABLE `tickets_pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets_replies`
--
ALTER TABLE `tickets_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_rules`
--
ALTER TABLE `tickets_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
