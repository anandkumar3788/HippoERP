-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 05:01 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, '$adminusername', '$pass'),
(2, 'aaakumar3788@gmail.com', '09a899bc1c2668709d5c713e5a4a2c03'),
(3, 'aaakumar3788@gmail.com', '783b6a87b1c1a89c3d46b5decab3b493'),
(4, 'aaanandkumar6@gmail.com', '09a899bc1c2668709d5c713e5a4a2c03'),
(5, 'aaakumar3788@gmail.com', '09a899bc1c2668709d5c713e5a4a2c03'),
(6, 'admin', '09a899bc1c2668709d5c713e5a4a2c03'),
(7, 'admin@gmail.com', '09a899bc1c2668709d5c713e5a4a2c03'),
(8, 'aaakumar3788@gmail.com', '594dbbc4313fca0c9a3b640422509258'),
(9, 'aaakumar3788@gmail.com', 'c30823485be5c255d27d7b81629ff258');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `comment_subject` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comment_text` text COLLATE utf8mb4_general_ci,
  `date_created` datetime DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `comment_status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_subject`, `comment_text`, `date_created`, `is_read`, `comment_status`) VALUES
(39, 'anand', 'hello!', NULL, NULL, NULL),
(49, 'pradeep', 'hello world! Tooltips and popovers can be placed within modals as needed. When modals are closed, any tooltips and popovers within are also automatically dismissed.\r\n\r\nTooltips and popovers can be placed within modals as needed. When modals are closed, any tooltips and popovers within are also automatically dismissed.\r\n\r\nTooltips and popovers can be placed within modals as needed. When modals are closed, any tooltips and popovers within are also automatically dismissed.\r\n\r\nTooltips and popovers can be placed within modals as needed. When modals are closed, any tooltips and popovers within are also automatically dismissed.\r\n\r\n', NULL, NULL, NULL),
(51, 'hello', 'welcome to hippocloud!', NULL, NULL, NULL),
(56, 'lucky', 'lsufgoievsdfj', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `feedback` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`) VALUES
(5, 'rkh gerkjb', 'kgrn@gmail.com', 'kmgklhlrfb'),
(13, 'lahdvc', 'jdgj@gmail.com', 'jkdfnweuibf'),
(20, 'lksdfhw', 'dfjheu@gmail.com', 'efhweurg'),
(22, 'anand', 'jasgfssjkhdg@gmail.com', 'kvdfyfus');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `key`, `expDate`) VALUES
(41, 'aaanandkumar6@gmail.com', '00b4fb4d49bf075d60ac8f00a2c56668a6f40df7d0', '2023-04-19 12:03:25'),
(42, 'aaanandkumar6@gmail.com', '9570c7fdc337ad3de1f8e86f23b287af033193829a', '2023-04-19 12:05:38'),
(43, 'aaanandkumar6@gmail.com', '747532164cd7135afbcc09049420ff4ef91f2b098f', '2023-04-19 12:06:35'),
(44, 'aaanandkumar6@gmail.com', 'ee48810e99db690511d2309c5cac1e0a6432af3166', '2023-04-19 12:08:55'),
(45, 'aaanandkumar6@gmail.com', '958dc492e05df7fbc6439e5745f91a152264ddbafa', '2023-04-19 12:11:03'),
(46, 'aaanandkumar6@gmail.com', 'c5cf30091cc57c7b9812d33579d57bce6858f8b889', '2023-04-19 12:11:37'),
(47, 'aaanandkumar6@gmail.com', '1704a8db5201ce43ce2e14c3e75679fa2d635160c4', '2023-04-19 12:12:10'),
(48, 'aaanandkumar6@gmail.com', '890236c53fdc73a3076eaf1846a15aee3296f1bfb2', '2023-04-20 05:20:51'),
(49, 'aaanandkumar6@gmail.com', 'bb8e57e08683c2eb2c0f86b29d72cd90ef8d5ca10d', '2023-04-20 05:37:07'),
(50, 'aaanandkumar6@gmail.com', '3ae4cfe9026a6211508a80ace4b80d0953f452a670', '2023-04-20 05:38:30'),
(51, 'aaanandkumar6@gmail.com', '452f6c45fdf0bd8098ca745023ea59d15fc2b5d7df', '2023-04-20 05:39:53'),
(52, 'aaanandkumar6@gmail.com', '4a772b184d17568b06ab6fe7c772c165327673468e', '2023-04-20 09:27:05'),
(53, 'aaanandkumar6@gmail.com', '79a240b3bcf36a6a4a315cc79565c7ac28c8314779', '2023-04-20 09:27:40'),
(54, 'aaanandkumar6@gmail.com', '9c0054bbe5b0a28a4abe8c97fa56b4f629bd24cfd3', '2023-04-20 09:39:26'),
(55, 'aaanandkumar6@gmail.com', 'fb370a70e739114f6d07920cdff1f85dfaaa52938c', '2023-04-21 11:02:15'),
(56, 'aaanandkumar6@gmail.com', 'f76032206fb0df02614fb6652d916db1bf65b1112d', '2023-04-21 11:03:37'),
(57, 'aaanandkumar6@gmail.com', '2d05eaf26fde19adc3e921af3922d068c3d38e6e63', '2023-04-26 04:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int NOT NULL,
  `fname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_role` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `fname`, `lname`, `email`, `password`, `contact`, `user_role`, `status`, `date`) VALUES
(2, 'Anand', 'KUMAR', 'aaaakumar3788@gmail.com', 'Anand@1998', '9391821856', 'admin', 'Active', '2023-03-29'),
(3, 'deeva', 'krishna', 'vamsikrishnasonu@gmail.com', 'Vamsi@123', '9603366456', 'user', 'Active', '2023-03-28'),
(4, 'ALLA ATCHUTA', 'KUMAR', 'aaanandkumar6@gmail.com', '6dhlYgHb', '8463963788', 'user', 'Active', '2023-03-27'),
(11, 'jhsdggc', 'jasgcv', 'jkagsc@gmail.com', NULL, '8324665949', 'user', 'Active', '2023-04-12'),
(16, 'nhgvbs', 'kjsdvhjk', 'klasdfhg@gmail.com', '$2y$10$GlkR56R64Fq2G0AMHyqGHuN1QjrCLqlUhUrAs2aGV7/zWm/OGPg2C', '9464674768', 'Front Office', 'Inactive', '2023-04-13'),
(21, 'vcjdvu', 'conhdgkks', 'vcys@gmail.com', NULL, '9876544322', 'Front Office', 'Inactive', '2023-04-13'),
(24, 'msdnd', 'mdbm,d', 'dkndn@gmail.com', NULL, '8947856450', 'user', 'Active', '2023-04-17'),
(26, 'nfkgheri', 'kdvbuh', 'jeghy@gmail.com', NULL, '8576580936', 'Manager', 'Inactive', '2023-04-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
