-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 04:08 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(200) DEFAULT NULL,
  `a_email` varchar(200) DEFAULT NULL,
  `a_address` varchar(200) DEFAULT NULL,
  `a_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_address`, `a_password`) VALUES
(1, 'ajay', 'maurayaak@gmail.com', 'mulund colony,mulund west,mumbai 400082', 'AK110125');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(200) DEFAULT NULL,
  `b_quantity` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `status` enum('Accepted','Rejected','Pending') DEFAULT 'Pending',
  `message` varchar(600) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_title`, `b_quantity`, `u_id`, `status`, `message`, `location`) VALUES
(1, 'story', 7, 14, 'Pending', NULL, NULL),
(2, 'textbooks', 6, 16, 'Rejected', 'THANK YOU for your donation, But we do not need it right now.', NULL),
(3, 'story', 6, 14, 'Pending', NULL, NULL),
(4, 'story books', 20, 17, 'Pending', NULL, NULL),
(5, '6th textbook', 34, 14, 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `c_id` int(11) NOT NULL,
  `c_type` varchar(200) DEFAULT NULL,
  `c_quantity` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `status` enum('Accepted','Rejected','Pending') DEFAULT 'Pending',
  `message` varchar(600) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`c_id`, `c_type`, `c_quantity`, `u_id`, `status`, `message`, `location`) VALUES
(1, 'shirt', 8, 14, 'Pending', NULL, NULL),
(2, 'underwear ', 10000, 16, 'Accepted', 'ccheck your Email for further Processing!', NULL),
(3, 't shirts', 8, 14, 'Pending', NULL, NULL),
(4, 't shirt', 31, 17, 'Pending', NULL, NULL),
(5, 'shirt', 32, 14, 'Pending', NULL, NULL),
(6, 'shirrt t-shirt', 23, 15, 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crowdfunding_forms`
--

CREATE TABLE `crowdfunding_forms` (
  `form_id` int(11) NOT NULL,
  `form_title` varchar(255) NOT NULL,
  `form_description` text NOT NULL,
  `goal_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crowdfunding_forms`
--

INSERT INTO `crowdfunding_forms` (`form_id`, `form_title`, `form_description`, `goal_amount`) VALUES
(2, 'organ donation', 'surgery purpose', '50000.00'),
(3, 'cancer', 'operation purpose', '50000.00'),
(4, 'charity', 'for kids', '40000.00');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(200) DEFAULT NULL,
  `f_quantity` int(11) DEFAULT NULL,
  `f_expiry` date DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `status` enum('Accepted','Rejected','Pending') DEFAULT 'Pending',
  `message` varchar(600) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `f_name`, `f_quantity`, `f_expiry`, `u_id`, `status`, `message`, `location`) VALUES
(1, 'dal rice ', 5, '2024-03-17', 14, 'Rejected', NULL, NULL),
(2, 'rice', 5, '2024-04-16', 16, 'Accepted', 'check your Email for further Processing!', 'https://maps.app.goo.gl/hDMGDvyzTZ3qTY5N9'),
(3, 'dall rice', 7, '2024-03-19', 14, 'Accepted', 'check your Email for further Processing!', 'https://maps.app.goo.gl/hDMGDvyzTZ3qTY5N9'),
(4, 'dal rice', 12, '2024-04-06', 17, 'Accepted', 'check your Email for further Processing!', 'bhandup'),
(5, 'khicdi', 3, '2024-04-06', 14, 'Pending', NULL, NULL),
(6, 'khichdi', 6, '2024-01-01', 15, 'Accepted', 'check your Email for further Processing!', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `message_id` int(11) NOT NULL,
  `reply` text,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`name`, `email`, `message`, `u_id`, `message_id`, `reply`, `status`) VALUES
('ajaykumar', 'maurayaak@gmail.com', 'nice website i like it', 13, 1, 'nmcmz', 'sent'),
('ajaykumar', 'maurayaak@gmail.com', 'nice website i like it', 13, 2, 'oooooo', 'sent'),
('kumar', 'ajaykumar.vm@gmail.com', 'wefnejhcbhg ukhymjxrmucv,z', 13, 3, 'uujnknjknkj', 'sent'),
('saksham', 'kk@gmail.com', 'asdfghjkl, werttyyybv, ', 13, 4, 'xxmXX', 'sent'),
('harsh', 'harsh@gmail.com', 'nice', 14, 5, 'ok thanku', 'sent'),
('kumar', 'kumar@gmail.com', 'yhhhh', 14, 6, 'ok thanku', 'sent'),
('krish', 'kumar@gmail.com', 'done', 14, 7, 'ok thanku', 'sent'),
('priyanshu', 'priyanshu@gmail.com', 'nice website for donation', 14, 8, 'thank your feedback', 'sent'),
('ajau', 'kumar@gmail.com', 'adnjsnkc', 14, 9, 'welcome', 'sent'),
('kumar', 'kumar@gmail.com', 'sasA', 14, 10, 'welcome', 'sent'),
('ajaykumar', 'kumar@gmail.com', 'nice website for donating food books and clothes', 16, 11, 'thankyou', 'sent'),
('kjnk', 'kumar@gmail.com', 'kk', 16, 12, NULL, 'Pending'),
('ajay', 'luciferilys121@gmail.com', 'good', 16, 13, NULL, 'Pending'),
('krissh', 'kumar@gmail.com', 'ednjkacn', 14, 14, 'thanks', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `money_donation`
--

CREATE TABLE `money_donation` (
  `m_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `forms_id` int(11) NOT NULL,
  `donate_amount` decimal(10,2) NOT NULL,
  `donate_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pay_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `money_donation`
--

INSERT INTO `money_donation` (`m_id`, `user_id`, `forms_id`, `donate_amount`, `donate_at`, `pay_status`) VALUES
(1, 14, 2, '8000.00', '2024-03-15 08:14:16', 'SUCCESSFULL'),
(2, 14, 2, '777.00', '2024-03-15 08:25:10', 'SUCCESSFULL'),
(3, 16, 3, '8909.00', '2024-03-16 09:09:27', 'SUCCESSFULL'),
(4, 16, 3, '788.00', '2024-03-16 10:19:04', 'SUCCESSFULL'),
(5, 14, 3, '789.00', '2024-03-16 10:35:35', 'SUCCESSFULL'),
(6, 14, 3, '7312.00', '2024-03-16 10:45:47', 'SUCCESSFULL'),
(7, 15, 4, '3000.00', '2024-03-18 05:08:45', 'SUCCESSFULL'),
(8, 17, 4, '6757.00', '2024-04-05 04:48:24', 'SUCCESSFULL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(200) DEFAULT NULL,
  `u_email` varchar(200) DEFAULT NULL,
  `u_address` varchar(200) DEFAULT NULL,
  `u_password` varchar(200) DEFAULT NULL,
  `u_contact` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_address`, `u_password`, `u_contact`) VALUES
(14, 'maurayaak', 'maurayaak@gmail.com', 'mulund', '12345678', 9920495122),
(15, 'ajit', 'ajit@gmail.com', 'ganesh pada', 'ajit', 9920495122),
(16, 'Sheetal', 'sahusheetal0304@gmail.com', 'sewri', '1234', 9892372317),
(17, 'donor', 'luciferilys121@gmail.com', 'mulund colony', '1234', 9920495122);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `contact` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`Id`, `Username`, `Email`, `Address`, `Password`, `contact`) VALUES
(14, 'ajay', 'luciferilys121@gmail.com', 'mulund colony', '12345678', 9920495122),
(15, 'sita', 'mithara24@gmail.com', 'sion', '1234', 4653698565),
(16, 'volunteer', 'maurayaak@gmail.com', 'mulund colony', '1234', 9920495122);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `crowdfunding_forms`
--
ALTER TABLE `crowdfunding_forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `money_donation`
--
ALTER TABLE `money_donation`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `forms_id` (`forms_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `crowdfunding_forms`
--
ALTER TABLE `crowdfunding_forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `money_donation`
--
ALTER TABLE `money_donation`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `money_donation`
--
ALTER TABLE `money_donation`
  ADD CONSTRAINT `money_donation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `money_donation_ibfk_2` FOREIGN KEY (`forms_id`) REFERENCES `crowdfunding_forms` (`form_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
