-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2022 at 11:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_margon`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `acc_no` varchar(20) DEFAULT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `upass` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `work` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `phone_verify` tinyint(4) DEFAULT NULL,
  `tmp_otp` varchar(100) DEFAULT NULL,
  `reg_date` varchar(25) DEFAULT NULL,
  `marry` varchar(20) DEFAULT NULL,
  `t_bal` int(200) DEFAULT NULL,
  `a_bal` int(200) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `logins` int(50) DEFAULT 0,
  `status` enum('ACTIVE','DORMANT/INACTIVE','DISABLED','CLOSED','SUSPEND','ON HOLD') DEFAULT 'ACTIVE',
  `currency` varchar(50) DEFAULT NULL,
  `cot` varchar(20) DEFAULT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `imf` varchar(20) DEFAULT NULL,
  `pin_auth` varchar(222) DEFAULT NULL,
  `pin` varchar(222) DEFAULT NULL,
  `verify` varchar(40) DEFAULT NULL,
  `resetComplete` varchar(4) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `acc_no`, `uname`, `upass`, `email`, `type`, `fname`, `mname`, `lname`, `addr`, `work`, `sex`, `dob`, `phone`, `phone_verify`, `tmp_otp`, `reg_date`, `marry`, `t_bal`, `a_bal`, `image`, `logins`, `status`, `currency`, `cot`, `tax`, `imf`, `pin_auth`, `pin`, `verify`, `resetComplete`) VALUES
(27, '1234', 'SAB', 'demo', 'donsXXX@gmail.com', 'Savings', 'DEMO USER', 'NNN', 'NAME', 'NIGERIA', 'jmm', 'Male', '08/11/2018', '+23310152679', 1, '170726', '08/11/2018', 'Single', 302593, 302593, '1656723076Screenshot 2022-06-27 at 22.56.42.png', 515, 'ACTIVE', 'USD $', '1234', '1234', '1234', '1234', '1234', 'Y', '0'),
(28, '012977777', 'ajovi4ever', '1234', 'ajovi4ever@gmail.com', 'Savings', 'Jovial', '', 'Kevwoda', '9 Obadudu Road', 'Teacher', 'Male', '28/02/1979', '+14242715633', 1, '534440', '07/01/2020', 'Single', 203000, 202700, NULL, 0, 'ACTIVE', '$', '123', '456', '00', '1234', '789', 'Y', 'no'),
(29, '0000', '123456', '123456', 'koreadeliverylinks@gmail.com', 'Savings', 'saaaa', '', '`zssss', 'gggggggggggg', 'worker', 'Male', '01/10/1988', '234567900', NULL, NULL, '10/01/2020', 'Single', 0, 0, NULL, 0, 'DORMANT/INACTIVE', 'USD $', '00', '00', '00', '00', '00', 'N', 'no'),
(30, '0000', 'Jfkfkt', 'jfjr', 'jerryleo058@gmail.com', 'Online Banking', 'jfjfj', 'Kfkfk', 'jfjf', 'Ejjeje', 'jfjfj', 'Female', '238585', '4858585ir', NULL, NULL, '11/01/2020', 'Married', 0, 0, NULL, 0, 'DORMANT/INACTIVE', 'USD $', '00', '00', '00', '00', '00', 'N', 'no'),
(31, '5454545454', 'kriz', 'letter', 'tellme_all2@yahoo.com', 'NON-Resident', 'James', '', 'Luis', '843jkgf', 'Retired', 'Male', '16/01/2020', '+2348130683602', NULL, '120851', '16/01/2020', 'Single', 600000, 600000, NULL, 0, 'ACTIVE', 'USD $', 'N78ZF9', '73185', 'PJU6EY', '1234', '1234', 'Y', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `upass` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified_count` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `upass`, `email`, `verified_count`) VALUES
(1, 'The admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'ofofonobs@gmail.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(100) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `amount` int(40) NOT NULL,
  `sender_name` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `email` varchar(222) NOT NULL,
  `statz` varchar(200) DEFAULT 'Successfull'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `uname`, `amount`, `sender_name`, `type`, `remarks`, `date`, `time`, `email`, `statz`) VALUES
(153, '1230', 5000, 'UBA BANK DEMO', 'Debit', 'BANK DEMO APP TEST', '13:11:2019', '04:59:05', '', 'Successful'),
(154, '1230', 200, 'UBA BANK DEMO', 'Credit', 'App demo test', '09/11/2019', '17:00:15', '', NULL),
(155, '123456', 5000, 'UBA BANK', 'Credit', 'OHA NGWA DAKAR', '13:11:2019', '05:00:15', '', NULL),
(158, '1234', 22, 'MARYANNE SUNDERZ', 'Debit', 'testing', '10/10/2019', '15:02:47', '', NULL),
(159, '1234', 11000, 'ALLAN MILLS', 'Debit', '999', '10/10/2019', '15:02:47', '', 'Successful'),
(160, '1234', 7, 'MARYANNE SUNDERZ', 'Debit', 'xx', '10/10/2019', '15:02:47', '', 'Pending'),
(161, '012977777', 20000, 'City Bank New York', 'Credit', 'Contract Award', '14/12/2019', '21:17:47', '', 'Successfull'),
(162, '012977777', 200000, 'Fidelity Bank', 'Credit', 'Award Winnings', '12/08/2019', '20:39:28', '', 'Successfull'),
(163, '012977777', 2000, 'Shell BP', 'Credit', 'Expenses', '12/08/2019', '20:41:56', '', 'Successfull'),
(164, '5454545454', 200000, 'James', 'Credit', 'goods', '16/01/2020', '12:08', '', 'Successfull');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_pass`
--

CREATE TABLE `forgot_pass` (
  `email` mediumtext COLLATE latin1_general_ci NOT NULL,
  `token` varchar(9999) COLLATE latin1_general_ci NOT NULL,
  `expiry` varchar(8999) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `forgot_pass`
--

INSERT INTO `forgot_pass` (`email`, `token`, `expiry`) VALUES
('raysid453773@qq.com', 'dc466e979fbadb1a76f3bcbb4ff5824c48276826', '2019-08-03 17:45:41'),
('raysid453773@qq.com', '8418226b19a5c874eb55ac5ba29df35e476600e8', '2019-08-03 17:45:45'),
('raysid453773@qq.com', '9263c2bcea46a0d5cbe4b6c9104a510b0436512d', '2019-08-03 17:47:27'),
('bhich@qe.luk2.com', '5366a1fc96bf0bfd5da34df0a16698b2a26b7404', '2019-08-03 17:48:03'),
('bhich@qe.luk2.com', 'dfd7e9a37772e1f7beec2ce077275c6fae44675f', '2019-08-03 18:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `lamt` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `lamt`, `duration`, `description`) VALUES
(0, '1000', '1 year', 'Williams Hamsel'),
(0, '1000', '6 Months', 'Sam');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `sender_name` varchar(40) NOT NULL,
  `reci_name` varchar(40) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `read` enum('unread','opened') DEFAULT 'unread',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_account`
--

CREATE TABLE `temp_account` (
  `id` int(10) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `work` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `marry` varchar(20) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `code` varchar(6) NOT NULL,
  `verify` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_transfer`
--

CREATE TABLE `temp_transfer` (
  `id` int(100) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `acc_no` varchar(300) NOT NULL,
  `acc_name` varchar(60) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `swift` varchar(15) NOT NULL,
  `routing` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `remarks` text NOT NULL,
  `cout` varchar(1000) NOT NULL,
  `transtype` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_transfer`
--

INSERT INTO `temp_transfer` (`id`, `email`, `amount`, `acc_no`, `acc_name`, `bank_name`, `swift`, `routing`, `type`, `remarks`, `cout`, `transtype`) VALUES
(289, 'donsammi30@gmail.com', '12', '1892928282', 'kentclarke', 'bank card', 'DOMESTIC', 'DOMESTIC', 'Savings', 'personal', 'Domestic-Transfer', 'DOMESTIC'),
(290, 'susanander92@gmail.com', '200', '0785642198', 'CBAO', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'GIFT', 'Domestic-Transfer', 'InterBank'),
(291, 'wokolura@gmail.com', '4790', '9978530075', 'OHA NGWA DAKAR', 'ECOBANK DAKAR', 'ECOBANKXXXX', '', 'Savings', 'MY CONTRIBUTION TO OHA NGWA DAKAR', 'Senegal', 'Wire Transfer'),
(292, 'susanander92@gmail.com', '500', '888750645321', 'DEMO BANK', 'DEMON BANK', 'DOMESTIC', 'DOMESTIC', 'Savings', 'DEMO TEST', 'Domestic-Transfer', 'DOMESTIC'),
(293, 'susanander92@gmail.com', '300', '99999953489', 'CBAO DEMO', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'DEMO', 'Domestic-Transfer', 'InterBank'),
(294, 'susanander92@gmail.com', '1200', '87967543215', 'THE DEMO', 'THE DEMO', 'THEDEMOXXX', '', 'Savings', 'DEMO TEST', 'Austria', 'Wire Transfer'),
(295, 'susanander92@gmail.com', '50', '097654', 'THEDEMO', 'THEDEMO', 'DOMESTIC', 'DOMESTIC', 'Savings', 'DEMO', 'Domestic-Transfer', 'DOMESTIC'),
(296, 'susanander92@gmail.com', '250', '00067432178', 'LAGOS DEMO BANK', 'LAGOS DEMO BANK', 'DOMESTIC', 'DOMESTIC', 'Savings', 'DEMO LAGOS BANK', 'Domestic-Transfer', 'DOMESTIC'),
(297, 'donsammi30@gmail.com', '777', '10999999', 'iiiii', 'nmm', 'DOMESTIC', 'DOMESTIC', 'Savings', '111', 'Domestic-Transfer', 'DOMESTIC'),
(298, 'donsammi30@gmail.com', '100', '12345', 'Sanm', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Test', 'Domestic-Transfer', 'InterBank'),
(299, 'donsammi30@gmail.com', '3625', '123456', 'Jejdk', 'Jdbdkd', 'Jdjdu', '', 'Savings', 'Dhd', 'Afganistan', 'Wire Transfer'),
(300, 'donsammi30@gmail.com', '2000', '2007065898', 'Amos King', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Monthly allowance', 'Domestic-Transfer', 'InterBank'),
(301, 'donsammi30@gmail.com', '1000', '24784747', 'BB', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'loan', 'Domestic-Transfer', 'InterBank'),
(302, 'donsammi30@gmail.com', '200', '235689459', 'Dghhjkjgh', 'Ghjhfvhjjj', 'Ghh4678885', '', 'Savings', 'Gjjjj', 'Afganistan', 'Wire Transfer'),
(303, 'donsammi30@gmail.com', '125', '236988994', 'Fghkkkbfgjjj', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Ghjmmvghhb', 'Domestic-Transfer', 'InterBank'),
(304, 'donsammi30@gmail.com', '123', '235698158', 'Dgjjkkkknn', 'Ghhjjkkmbbb', '234567', '', 'Savings', 'Ghjkkk', 'Afganistan', 'Wire Transfer'),
(305, 'donsammi30@gmail.com', '124', '560868000', '2345567', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Chhjkkjb', 'Domestic-Transfer', 'InterBank'),
(306, 'donsammi30@gmail.com', '3000', '29183838', 'Mick', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'contract', 'Domestic-Transfer', 'InterBank'),
(307, 'donsammi30@gmail.com', '4555', '44543454', 'ghhhh', 'rgg', '35fef', '', 'Savings', 'efff', 'Afganistan', 'Wire Transfer'),
(308, 'ajovi4ever@gmail.com', '30000', '2390624162', 'Mark Wo', 'Sity Bank LTSD', 'SWE736H', '', 'Savings', 'MSB', 'Barbados', 'Wire Transfer'),
(309, 'donsammi30@gmail.com', '200', '455224555', 'Hff fred', 'Ubs', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Ok', 'Domestic-Transfer', 'DOMESTIC'),
(310, 'donsammi30@gmail.com', '1000', '1646797995900', 'Pin code', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'On code', 'Domestic-Transfer', 'InterBank'),
(311, 'donsammi30@gmail.com', '797', '4949494', 'Hsb', 'Ahab', '273', '', 'Savings', 'Bbsbs', 'Afganistan', 'Wire Transfer'),
(312, 'donsammi30@gmail.com', '600', '5729292922', 'Gah', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'China', 'Domestic-Transfer', 'InterBank'),
(313, 'donsammi30@gmail.com', '66373848', '53637384', 'Vbhhhh', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Losn', 'Domestic-Transfer', 'InterBank'),
(314, 'donsammi30@gmail.com', '500', '123', 'aaa', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', '123', 'Domestic-Transfer', 'InterBank'),
(315, 'donsammi30@gmail.com', '123', '123', '123', '123', 'DOMESTIC', 'DOMESTIC', 'Savings', '123', 'Domestic-Transfer', 'DOMESTIC'),
(316, 'donsammi30@gmail.com', '123', '123', '123', '123', 'DOMESTIC', 'DOMESTIC', 'Savings', '123', 'Domestic-Transfer', 'DOMESTIC'),
(317, 'donsammi30@gmail.com', '123', '123', 'aaa', 'aaa', '123', '', 'Savings', '123', 'Australia', 'Wire Transfer'),
(318, 'donsammi30@gmail.com', '123', '123', '123', '123', '123', '', 'Savings', '123', 'Bahamas', 'Wire Transfer'),
(319, 'donsammi30@gmail.com', '123', '123', 'aaa', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', '123', 'Domestic-Transfer', 'InterBank'),
(320, 'donsammi30@gmail.com', '123', '123', 'asdf', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', '12312assadfasdfasd', 'Domestic-Transfer', 'InterBank'),
(321, 'donsammi30@gmail.com', '123', '123', '123', '123', 'DOMESTIC', 'DOMESTIC', 'Savings', '123', 'Domestic-Transfer', 'DOMESTIC'),
(322, 'donsammi30@gmail.com', '1234', '1234', '1234', '1234', 'DOMESTIC', 'DOMESTIC', 'Savings', '1234', 'Domestic-Transfer', 'DOMESTIC'),
(323, 'donsammi30@gmail.com', '11111111', '1234', 'aaa', 'aaaa', 'DOMESTIC', 'DOMESTIC', 'Savings', 'aaaa', 'Domestic-Transfer', 'DOMESTIC'),
(324, 'donsammi30@gmail.com', '111', '1234', 'demo', 'aaa', 'DOMESTIC', 'DOMESTIC', 'Savings', 'aaa', 'Domestic-Transfer', 'DOMESTIC'),
(325, 'donsammi30@gmail.com', '1234', '4321', 'omed', 'aaa', 'DOMESTIC', 'DOMESTIC', 'Savings', 'asdfasdf', 'Domestic-Transfer', 'DOMESTIC'),
(326, 'donsammi30@gmail.com', '123', '23123', '1231', '12312', 'DOMESTIC', 'DOMESTIC', 'Savings', '3123123', 'Domestic-Transfer', 'DOMESTIC'),
(327, 'donsammi30@gmail.com', '123', '12312', '123', '3123', 'DOMESTIC', 'DOMESTIC', 'Savings', '123123', 'Domestic-Transfer', 'DOMESTIC'),
(328, 'donsammi30@gmail.com', '123', '123', '123', '123', '123', '', 'Savings', '123', 'Afganistan', 'Wire Transfer'),
(329, 'donsammi30@gmail.com', '123', '123', '123', '123', '123', '', 'Savings', '123', 'Afganistan', 'Wire Transfer'),
(330, 'donsammi30@gmail.com', '1234', '1234', '1234', '1234', '1234', '', 'Savings', '1234', 'Bahamas', 'Wire Transfer'),
(331, 'donsammi30@gmail.com', '1234', '1234', '1234', '1234', '1234', '', 'Savings', '1234', 'Afganistan', 'Wire Transfer'),
(332, 'donsammi30@gmail.com', '12341234123', '12342134213421', '213412342134', '123412342134213421342134', '123412342134213', '', 'Savings', '214123412342134', 'Bahamas', 'Wire Transfer'),
(333, 'donsammi30@gmail.com', '33', '3333333333333333', 'sslji', 'deed', '33322', '', 'Savings', '2dssa', 'Afganistan', 'Wire Transfer'),
(334, 'donsammi30@gmail.com', '66', '68678678668', 'gklkj', 'ghjghj', '8987789', '', 'Savings', 'kjgkjgjk', 'Afganistan', 'Wire Transfer'),
(335, 'donsammi30@gmail.com', '20000', '45893540954', 'John Stewart', 'InterBank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Fff', 'Domestic-Transfer', 'InterBank'),
(336, 'donsammi30@gmail.com', '10000', '1111', 'Get g', 'Bnaa', '111', '', 'Savings', 'Ttvb', 'Brazil', 'Wire Transfer'),
(337, 'donsammi30@gmail.com', '5768', '9473937379', 'John Cardon', 'Key bank', 'DOMESTIC', 'DOMESTIC', 'Savings', 'My friend', 'Domestic-Transfer', 'DOMESTIC'),
(338, 'donsammi30@gmail.com', '5765', '575668874467', 'Hjb hgv', 'Stone bank', 'Gfsjjh', '', 'Savings', 'Bank', 'Jordan', 'Wire Transfer'),
(339, 'donsammi30@gmail.com', '4000', '123467', 'john peters', 'ghho0', '456789', '', 'Savings', 'test', 'Afganistan', 'Wire Transfer'),
(340, 'donsammi30@gmail.com', '255', '254558755', 'Fred vera', 'Uba', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Food', 'Domestic-Transfer', 'DOMESTIC'),
(341, 'donsammi30@gmail.com', '100000', '0246467400', 'Elliot', 'Wakanda', 'DOMESTIC', 'DOMESTIC', 'Savings', 'Testing', 'Domestic-Transfer', 'DOMESTIC'),
(342, 'donsammi30@gmail.com', '4333', '57848774', 'kaer fred', 'hsbc', 'DOMESTIC', 'DOMESTIC', 'Savings', 'payment bill', 'Domestic-Transfer', 'DOMESTIC'),
(343, 'donsammi30@gmail.com', '50000', '0223910879', 'JAMES ONE', 'BANK OF AMERICA', 'UB3682', '', 'Savings', 'DONE', 'United States of America', 'Wire Transfer'),
(344, 'donsammi30@gmail.com', '2300', '653653656556', 'larry fred', 'HSBC BANK', 'DOMESTIC', 'DOMESTIC', 'Savings', 'FUND TRANSFER', 'Domestic-Transfer', 'DOMESTIC'),
(345, 'donsXXX@gmail.com', '700', '098764456', 'test', 'wellsfargo', 'DOMESTIC', 'DOMESTIC', '', 'good', 'Domestic-Transfer', 'DOMESTIC');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) NOT NULL,
  `tc` int(10) NOT NULL,
  `sender_name` varchar(40) NOT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `status` enum('Pending','Replied') DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `tc`, `sender_name`, `mail`, `subject`, `msg`, `status`, `date`) VALUES
(46, 99568, 'UBA', NULL, 'TESTIN LOAN', 'TESTIN LOAN', 'Pending', '2019-11-13 04:55:56'),
(47, 58126, 'UBA', NULL, 'TESTIN TICK', 'TESTIN TICK', 'Pending', '2019-11-13 04:56:52'),
(48, 83501, 'DEMO USER', NULL, '455', 'Ok', 'Pending', '2020-02-03 22:31:10'),
(49, 52338, 'DEMO USER', NULL, 'kihgf', 'ij', 'Pending', '2020-02-04 23:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `transtype` varchar(1000) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `reci_name` varchar(30) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `swift` varchar(100) NOT NULL,
  `routing` varchar(100) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('Failed','Successful','Pending','On-hold','Cancelled') DEFAULT 'Successful',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cout` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `amount`, `bank_name`, `acc_name`, `transtype`, `acc_no`, `reci_name`, `type`, `swift`, `routing`, `remarks`, `email`, `status`, `date`, `cout`) VALUES
(81, '200', 'InterBank', 'CBAO', 'InterBank', '0785642198', '', 'Savings', 'DOMESTIC', 'DOMESTIC', 'GIFT', 'rabeehied@100101.ru', 'Successful', '2019-11-13 05:08:43', 'Domestic-Transfer'),
(82, '500', 'DEMON BANK', 'DEMO BANK', 'DOMESTIC', '888750645321', '', 'Savings', 'DOMESTIC', 'DOMESTIC', 'DEMO TEST', 'susanander92@gmail.com', 'On-hold', '2019-11-13 14:28:45', 'Domestic-Transfer'),
(83, '300', 'InterBank', 'CBAO DEMO', 'InterBank', '99999953489', '', 'Savings', 'DOMESTIC', 'DOMESTIC', 'DEMO', 'susanander92@gmail.com', 'Successful', '2019-11-13 14:44:00', 'Domestic-Transfer'),
(84, '1200', 'THE DEMO', 'THE DEMO', 'Wire Transfer', '87967543215', '', 'Savings', 'THEDEMOXXX', '', 'DEMO TEST', 'susanander92@gmail.com', 'Successful', '2019-11-13 14:46:44', 'Austria'),
(85, '50', 'THEDEMO', 'THEDEMO', 'DOMESTIC', '097654', '', 'Savings', 'DOMESTIC', 'DOMESTIC', 'DEMO', 'susanander92@gmail.com', 'Successful', '2019-11-13 14:53:38', 'Domestic-Transfer'),
(86, '250', 'LAGOS DEMO BANK', 'LAGOS DEMO BANK', 'DOMESTIC', '00067432178', '', 'Savings', 'DOMESTIC', 'DOMESTIC', 'DEMO LAGOS BANK', 'susanander92@gmail.com', 'Cancelled', '2019-11-13 15:57:03', 'Domestic-Transfer'),
(87, '50000', 'BANK OF AMERICA', 'JAMES ONE', 'Wire Transfer', '0223910879', '', 'Savings', 'UB3682', '', 'DONE', 'donsammi30@gmail.com', 'Successful', '2020-02-05 08:06:59', 'United States of America'),
(88, '700', 'wellsfargo', 'test', 'DOMESTIC', '098764456', NULL, '', 'DOMESTIC', 'DOMESTIC', 'good', 'donsXXX@gmail.com', 'Successful', '2022-06-27 17:50:11', 'Domestic-Transfer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_account`
--
ALTER TABLE `temp_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_transfer`
--
ALTER TABLE `temp_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_account`
--
ALTER TABLE `temp_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_transfer`
--
ALTER TABLE `temp_transfer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
