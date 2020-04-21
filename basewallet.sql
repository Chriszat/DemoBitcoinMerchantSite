-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 01:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basewallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `btc_address`
--

CREATE TABLE `btc_address` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `label` varchar(300) NOT NULL,
  `address` varchar(400) NOT NULL,
  `barcode_path` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btc_address`
--

INSERT INTO `btc_address` (`id`, `user`, `label`, `address`, `barcode_path`, `date`) VALUES
(12, 56, 'zattech bitcoin address', 'fIiG6OQNlyjBTRPcFA39qCUodzXSYZ1ELa', 'fIiG6OQNlyjBTRPcFA39qCUodzXSYZ1ELa.png', '2018-12-14 11:05:28'),
(14, 56, 'chioma bitcoin address', '46Fsv9AZ5LRMkrBywpNVgOQWTaCzmGuU12', '46Fsv9AZ5LRMkrBywpNVgOQWTaCzmGuU12.png', '2018-12-14 11:09:40'),
(15, 56, 'dddd', 'sxzQH1JgtX3PCFakDRew24YcvBVZWMI5GN', 'sxzQH1JgtX3PCFakDRew24YcvBVZWMI5GN.png', '2018-12-14 17:40:21'),
(16, 56, 'Bit Address', 'bc7VtrBfdyLnJKxINqSQmPigjep2Z198u6', 'bc7VtrBfdyLnJKxINqSQmPigjep2Z198u6.png', '2018-12-14 22:38:55'),
(17, 56, 'New bitcoin address', 'oXCLuEnqyJIZWVKvH9Nl8jR1T3AmPkzBSf', 'oXCLuEnqyJIZWVKvH9Nl8jR1T3AmPkzBSf.png', '2018-12-14 22:39:19'),
(18, 56, 'new', 'naVo2ZbsvTHWrkSRd9qXpMi67l8UuPzm5D', 'naVo2ZbsvTHWrkSRd9qXpMi67l8UuPzm5D.png', '2018-12-25 02:15:53'),
(19, 56, 'Naijaforum Bitcoin Address', 'MW126yjpJALzKRg3lSOPTHE8ksoYGxVZnv', 'MW126yjpJALzKRg3lSOPTHE8ksoYGxVZnv.png', '2019-01-26 23:13:43'),
(20, 56, 'xxxxx', 'iVMZNnce1xA2vfIkgdB3qOhuYDFLPSbz68', 'iVMZNnce1xA2vfIkgdB3qOhuYDFLPSbz68.png', '2019-01-26 23:18:25'),
(21, 56, 'dummy bitcoin address', 'aIDLltdMv18XgFPpzYqZOBmRfAc6KTQoG5', 'aIDLltdMv18XgFPpzYqZOBmRfAc6KTQoG5.png', '2019-01-27 11:22:43'),
(22, 56, 'zat bitcoin', 'AO6NTh5IRgFuirj9cyb2YZBmwa1E3Dz4nU', 'AO6NTh5IRgFuirj9cyb2YZBmwa1E3Dz4nU.png', '2019-01-27 15:42:37'),
(23, 56, 'kelechi', 'sEx79bBtPVLKqowzZrW8igUOeDFyMC5amS', 'sEx79bBtPVLKqowzZrW8igUOeDFyMC5amS.png', '2019-02-13 18:12:21'),
(24, 56, 'mynal', 'QEKS5Hjc8XzVkGJfTImwAC4PurdLxOBNba', 'QEKS5Hjc8XzVkGJfTImwAC4PurdLxOBNba.png', '2019-02-26 18:01:00'),
(25, 56, 'stripe', '4VrmvGW9YjcPDLqFET2l15pKdfCegZIO3i', '4VrmvGW9YjcPDLqFET2l15pKdfCegZIO3i.png', '2019-03-14 09:43:25'),
(26, 56, 'newstripe', '5a139iF4DHzQZXqkTJjNBYLGpPtmoRlsIu', '5a139iF4DHzQZXqkTJjNBYLGpPtmoRlsIu.png', '2019-03-14 09:44:08'),
(27, 56, 'asdfas', '7PntI4wb5KaBcJ9vzQldgGkRUsLu1m3Syx', '7PntI4wb5KaBcJ9vzQldgGkRUsLu1m3Syx.png', '2019-06-15 08:27:38'),
(28, 56, 'dfsdf', 'J7Zhsaz6KGlEYFWm4PwDHxUSndAupgi9Nc', 'J7Zhsaz6KGlEYFWm4PwDHxUSndAupgi9Nc.png', '2019-07-15 16:03:27'),
(29, 56, 'kasd;fla', '1xeZrBQNb2zCh8MylmAYL7qURO9FH6Wvig', '1xeZrBQNb2zCh8MylmAYL7qURO9FH6Wvig.png', '2019-08-12 10:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `eth_address`
--

CREATE TABLE `eth_address` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `label` varchar(300) NOT NULL,
  `barcode_path` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eth_address`
--

INSERT INTO `eth_address` (`id`, `user`, `address`, `label`, `barcode_path`, `date`) VALUES
(1, 56, 'Wrs8ypRqkeIlXP4571oKMZdOzD6LcGfV3A9EwQHatb', 'my ethereum address', 'Wrs8ypRqkeIlXP4571oKMZdOzD6LcGfV3A9EwQHatb.png', '2018-12-15 10:00:06'),
(6, 56, 'OvSHdpQ9hCax3J4kocrMeTitK67LXgyPjWuYnsm1NF', 'eth add', 'OvSHdpQ9hCax3J4kocrMeTitK67LXgyPjWuYnsm1NF.png', '2018-12-15 10:22:36'),
(13, 56, 'iOoADXG2SMcgsmREhILtleNaU4V1vbPdnjzrKp7FTW', 'rrrt', 'iOoADXG2SMcgsmREhILtleNaU4V1vbPdnjzrKp7FTW.png', '2018-12-15 11:14:02'),
(14, 56, 'vxt2AufEywWsY63dPaSbL1CgQh4jRUlMkO7BXVGzZp', '333', 'vxt2AufEywWsY63dPaSbL1CgQh4jRUlMkO7BXVGzZp.png', '2018-12-15 11:14:21'),
(15, 56, 'DeKTw65oqvGuh2JQgaH4EMbtjydsOS8WRkUmrfznF9', 'My btc address', 'DeKTw65oqvGuh2JQgaH4EMbtjydsOS8WRkUmrfznF9.png', '2018-12-15 11:15:06'),
(16, 56, 'GOzarM2YBpt3JXl8mbxohFHLSDigZeWNTEn5ARqucd', 'adfasdfafaf', 'GOzarM2YBpt3JXl8mbxohFHLSDigZeWNTEn5ARqucd.png', '2018-12-15 11:16:00'),
(17, 56, 'xvSqP6WfhRGFUCyYOBH4e795k8pnwTEmlsz3r21giD', 'zxf3rgsadfe', 'xvSqP6WfhRGFUCyYOBH4e795k8pnwTEmlsz3r21giD.png', '2018-12-15 11:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `seen` char(1) NOT NULL DEFAULT 'n',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user`, `title`, `body`, `seen`, `date`) VALUES
(1, 56, 'Welcome To BaseWallet', 'Hello Ihebuzo Chris we are happy to have you on BaseWallet where you can purchase bitcoin coin as low as $10. We are happy to see you purchase your first bitcoin.\r\n', 'n', '2019-01-20 18:19:21'),
(2, 56, 'Transfer Complete', 'Your transfer of $1,000.00 dollars to your local bank has been completed.', 'n', '2019-01-20 18:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `push_notification` char(1) NOT NULL DEFAULT 'y',
  `security_emails` char(1) NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `user`, `push_notification`, `security_emails`) VALUES
(1, 56, 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `secondary_emails`
--

CREATE TABLE `secondary_emails` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `verify` char(1) NOT NULL DEFAULT 'n',
  `verify_key` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL DEFAULT 'Unverified - check your inbox	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `from_email` varchar(50) NOT NULL,
  `email_password` varchar(20) NOT NULL,
  `sitename` varchar(20) NOT NULL DEFAULT 'BaseWallet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `from_email`, `email_password`, `sitename`) VALUES
(1, 'informaljoke@gmail.com', '@seriouspassword', 'BaseWallet');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `type` varchar(15) NOT NULL,
  `currency` varchar(20) NOT NULL DEFAULT 'USD',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user`, `title`, `amount`, `type`, `currency`, `date`) VALUES
(1, 56, 'Sold Btc 10 for BTC 0.00', '0.00', 'SOLD', 'BTC', '2019-01-27 11:36:08'),
(2, 56, 'Bought Btc INF for USD 200', '200', 'BUY', 'USD', '2019-01-27 11:37:08'),
(3, 56, 'Sold Btc 50 for BTC 0.00', '0.00', 'SOLD', 'BTC', '2019-02-13 18:13:09'),
(4, 56, 'Sold Btc 20 for BTC 0.00', '0.00', 'SOLD', 'BTC', '2019-05-17 21:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verify_key` varchar(255) NOT NULL,
  `verify` char(1) NOT NULL DEFAULT 'n',
  `phone` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `language` varchar(25) NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `current_logins` tinyint(4) NOT NULL,
  `num_logins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `verify_key`, `verify`, `phone`, `country`, `language`, `last_login`, `created`, `current_logins`, `num_logins`) VALUES
(56, 'ihebuzo chris', 'e0cf98d857519480c3802c37cdd6c0aa', 'zattechnology@gmail.com', 'c0eabd8a82b51f504639a3e2d9451a4f1a035884', 'y', '0908786567', 'Nepal', '', '0000-00-00 00:00:00', '2018-12-10 11:43:20', 32, 33);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `btc` varchar(300) NOT NULL,
  `eth` varchar(200) NOT NULL,
  `usd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user`, `btc`, `eth`, `usd`) VALUES
(2, 56, '80.35619344', 'INF', 2279);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `btc_address`
--
ALTER TABLE `btc_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eth_address`
--
ALTER TABLE `eth_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondary_emails`
--
ALTER TABLE `secondary_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `btc_address`
--
ALTER TABLE `btc_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `eth_address`
--
ALTER TABLE `eth_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `secondary_emails`
--
ALTER TABLE `secondary_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
