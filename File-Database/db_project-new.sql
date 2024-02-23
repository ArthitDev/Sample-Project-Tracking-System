-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 04:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_sername` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `sub_district` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_sername`, `address`, `district`, `sub_district`, `province`, `post_code`, `phone`, `email`) VALUES
(1, 'ริคาโด้', 'ไมรอส', '477/9 ', 'มะลิกา', 'แม่อาย', 'เชียงใหม่', '50280', '0979574687', 'rthit096@gmail.com'),
(6, 'อาทิตย์', 'ลุงหยะ', '477/9 บ้านปางต้นเดื่อ', 'แม่อาย', 'แม่อาย', 'Chiang Mai', '50280', '0618276306', 'rthit096@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_sername` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `sub_district` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `employee_sername`, `address`, `district`, `sub_district`, `province`, `post_code`, `start_date`, `job_position`, `username`, `email`, `phone`, `password`) VALUES
(3, 'Arthit', 'Dev', '477/9', 'แม่อาย', 'แม่อาย', 'เชียงใหม่', '50280', '2023-09-14', 'Full Stack Dev', 'ArthitDev', 'rthit096@gmail.com', '0618276306', '0f359740bd1cda994f8b55330c86d845'),
(10, 'อาทิตย์', 'ลุงหยะ', '477/9 บ้านปางต้นเดื่อ', 'แม่อาย', 'แม่อาย', 'Chiang Mai', '50280', '2023-09-16', 'IT', 'rthit123', 'rthit096@gmail.com', '0618276306', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'อาทิตย์', 'ลุงหยะ', '477/9 บ้านปางต้นเดื่อ', 'แม่อาย', 'แม่อาย', 'Chiang Mai', '50280', '2024-02-23', 'Admin', 'root', 'rthit096@gmail.com', '+66618276306', '7b24afc8bc80e548d66c4e7ff72171c5');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` mediumtext NOT NULL,
  `product_desc` mediumtext NOT NULL,
  `product_unit` mediumtext NOT NULL,
  `product_price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_unit`, `product_price`) VALUES
(1000, 'ขนมปัง', 'ขนมปังหอมกรุ่นจากเตา', 'ชิ้น', '500');

-- --------------------------------------------------------

--
-- Table structure for table `projcost_desc`
--

CREATE TABLE `projcost_desc` (
  `id` int(11) NOT NULL,
  `doc_number` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_price` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projcost_hd`
--

CREATE TABLE `projcost_hd` (
  `id` int(11) NOT NULL,
  `doc_number` int(11) NOT NULL,
  `record_date` date DEFAULT NULL,
  `receipt_number` int(11) DEFAULT NULL,
  `receipt_date` date DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `project_value` varchar(50) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `start_date`, `end_date`, `project_value`, `status_id`, `customer_id`, `employee_id`) VALUES
(7, 'ถนนหมู่บ้าน', '2023-09-16', '2023-09-17', '5000000', 2, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `project_close`
--

CREATE TABLE `project_close` (
  `id` int(11) NOT NULL,
  `doc_number` int(11) NOT NULL,
  `closing_date` date DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `expenses` decimal(10,2) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(0, 'ยกเลิก'),
(1, 'อยู่ระหว่างดำเนินการ'),
(2, 'ปิดโครงการ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `projcost_desc`
--
ALTER TABLE `projcost_desc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `projcost_hd`
--
ALTER TABLE `projcost_hd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `project_close`
--
ALTER TABLE `project_close`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projcost_desc`
--
ALTER TABLE `projcost_desc`
  ADD CONSTRAINT `projcost_desc_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `projcost_hd`
--
ALTER TABLE `projcost_hd`
  ADD CONSTRAINT `projcost_hd_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `projcost_hd_ibfk_2` FOREIGN KEY (`id`) REFERENCES `projcost_desc` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `project_close`
--
ALTER TABLE `project_close`
  ADD CONSTRAINT `project_close_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `project_close_ibfk_3` FOREIGN KEY (`id`) REFERENCES `projcost_hd` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
