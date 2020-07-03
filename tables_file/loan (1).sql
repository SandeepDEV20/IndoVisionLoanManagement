-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 06:32 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `designation_master`
--

CREATE TABLE IF NOT EXISTS `designation_master` (
  `id` int(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `designation_code` varchar(30) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation_master`
--

INSERT INTO `designation_master` (`id`, `designation`, `designation_code`, `department`) VALUES
(1, 'junior software developer', 'INDO-JD', 'IT department'),
(2, 'senior software developer', 'INDO-SD', 'IT department'),
(3, 'Sales and marketing head', 'INDO-SM', 'sales & marketing'),
(4, 'sales representative', 'INDO-SM', 'sales & marketing'),
(6, 'Junior Accountant', 'INDO-AC', 'Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `empdetails`
--

CREATE TABLE IF NOT EXISTS `empdetails` (
  `emp_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dateofjoin` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empdetails`
--

INSERT INTO `empdetails` (`emp_id`, `name`, `contact`, `email`, `password`, `city`, `dateofjoin`, `designation`, `department`) VALUES
('EMP001', 'vishal', 8295397468, 'vky1994arora@gmail.com', 'vishal123', 'karnal', '2019-08-07', 'junior software developer', 'IT department'),
('EMP002', 'karan', 8897764352, 'jay@13gmail.com', 'karan111', 'karnal', '2019-09-03', 'junior software developer', 'IT department'),
('EMP003', 'ajay', 8295397468, 'jay@13gmail.com', 'ajay123', 'panipat', '2019-08-06', 'senior software developer', 'IT department'),
('EMP004', 'nitin', 8295397468, 'nitin123@gmail.com', 'nitin123', 'panipat', '2019-08-07', 'junior software developer', 'IT department'),
('EMP005', 'ankur', 8897764352, 'ank1123@gmail.com', 'ankur123', 'karnal', '2019-09-04', 'junior software developer', 'IT department'),
('EMP006', 'raju', 8897764352, 'raju123@gmail.com', 'raju123', 'panipat', '2020-01-02', 'software trainee', 'IT department'),
('EMP007', 'ramesh', 8897764352, 'ramesh123@gmail.com', 'ramesh123', 'delhi', '2018-04-05', 'senior software developer', 'IT department');

--
-- Triggers `empdetails`
--
DELIMITER $$
CREATE TRIGGER `tg_table1_insert` BEFORE INSERT ON `empdetails`
 FOR EACH ROW BEGIN
  INSERT INTO table1_seq VALUES (NULL);
  SET NEW.emp_id = CONCAT('EMP', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_loan_lists`
--

CREATE TABLE IF NOT EXISTS `emp_loan_lists` (
  `id` int(20) NOT NULL,
  `loan_id` varchar(20) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `appliedDate` date NOT NULL,
  `amount` bigint(20) NOT NULL,
  `max_amount` bigint(20) NOT NULL,
  `interest_rate` int(20) NOT NULL,
  `total_loan` bigint(20) NOT NULL,
  `paid_amount` bigint(100) NOT NULL DEFAULT '0',
  `unpaid_amount` bigint(100) NOT NULL,
  `installment_type` varchar(20) NOT NULL,
  `installments` int(20) NOT NULL,
  `paid_installments` int(20) NOT NULL DEFAULT '0',
  `pending_installments` int(20) NOT NULL,
  `loan_type` varchar(10) NOT NULL,
  `repayment_type` varchar(20) NOT NULL,
  `monthly_emi` float DEFAULT NULL,
  `TL_approval` varchar(10) NOT NULL DEFAULT 'pending',
  `approvalStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `recoveryStatus` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_loan_lists`
--

INSERT INTO `emp_loan_lists` (`id`, `loan_id`, `emp_id`, `department`, `appliedDate`, `amount`, `max_amount`, `interest_rate`, `total_loan`, `paid_amount`, `unpaid_amount`, `installment_type`, `installments`, `paid_installments`, `pending_installments`, `loan_type`, `repayment_type`, `monthly_emi`, `TL_approval`, `approvalStatus`, `recoveryStatus`) VALUES
(1, 'LOAN001', 'EMP002', 'IT department', '2020-06-25', 100000, 150000, 7, 107000, 0, 10700, 'fixed', 12, 0, 12, 'Car Loan', 'EMI', 8916.67, 'approved', 'approved', 'pending'),
(2, 'LOAN002', 'EMP003', 'IT department', '2020-06-25', 250000, 300000, 5, 262500, 0, 262500, 'flexible', 24, 0, 24, 'Home Loan', 'EMI', 10937.5, 'approved', 'approved', 'pending'),
(3, 'LOAN003', 'EMP001', 'IT department', '2020-06-26', 90000, 150000, 7, 96300, 0, 96300, 'fixed', 12, 0, 12, 'Car Loan', 'EMI', 8025, 'approved', 'approved', 'pending'),
(5, 'LOAN005', 'EMP005', 'IT department', '2020-06-26', 130000, 150000, 12, 140000, 0, 140000, 'fixed', 12, 0, 12, 'Car loan', 'EMI', 7000, 'rejected', 'rejected', ''),
(9, 'LOAN009', 'EMP005', 'IT department', '2020-07-01', 85000, 150000, 7, 90950, 0, 90950, 'fixed', 12, 0, 12, 'Home Loan', 'EMI', 7579.17, 'approved', 'approved', 'pending'),
(11, 'LOAN011', 'EMP004', 'IT department', '2020-07-01', 100000, 150000, 7, 107000, 0, 107000, 'fixed', 12, 0, 12, 'Soft Loan', 'EMI', 8916.67, 'approved', 'rejected', '');

--
-- Triggers `emp_loan_lists`
--
DELIMITER $$
CREATE TRIGGER `tg_table2_insert` BEFORE INSERT ON `emp_loan_lists`
 FOR EACH ROW BEGIN
  INSERT INTO loan_seq VALUES (NULL);
  SET NEW.loan_id = CONCAT('LOAN', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_amount_master`
--

CREATE TABLE IF NOT EXISTS `loan_amount_master` (
  `id` int(20) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `maxLoanAmount` bigint(20) NOT NULL,
  `interest_rate` int(10) NOT NULL,
  `fixed_installments` int(20) NOT NULL,
  `allowed_flexible_installment` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_amount_master`
--

INSERT INTO `loan_amount_master` (`id`, `designation`, `department`, `maxLoanAmount`, `interest_rate`, `fixed_installments`, `allowed_flexible_installment`) VALUES
(1, 'junior software developer', 'IT department', 150000, 7, 12, 'no'),
(3, 'senior software developer', 'IT department', 300000, 5, 18, 'yes'),
(4, 'senior sales officer', 'sales', 400000, 6, 30, 'yes'),
(5, 'marketing executive', 'marketing', 450000, 9, 30, 'yes'),
(7, 'sales representative', 'sales & marketing', 250000, 9, 18, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `loan_category`
--

CREATE TABLE IF NOT EXISTS `loan_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_category`
--

INSERT INTO `loan_category` (`id`, `category`) VALUES
(1, 'Car Loan'),
(2, 'Home Loan'),
(10, 'Soft Loan');

-- --------------------------------------------------------

--
-- Table structure for table `loan_payment`
--

CREATE TABLE IF NOT EXISTS `loan_payment` (
  `id` int(11) NOT NULL,
  `loan_id` varchar(50) NOT NULL,
  `pay_amount` bigint(100) NOT NULL,
  `pay_installments` int(20) NOT NULL,
  `pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_seq`
--

CREATE TABLE IF NOT EXISTS `loan_seq` (
  `id` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_seq`
--

INSERT INTO `loan_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

-- --------------------------------------------------------

--
-- Table structure for table `repayment_type`
--

CREATE TABLE IF NOT EXISTS `repayment_type` (
  `id` int(10) NOT NULL,
  `repay_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repayment_type`
--

INSERT INTO `repayment_type` (`id`, `repay_type`) VALUES
(1, 'EMI');

-- --------------------------------------------------------

--
-- Table structure for table `table1_seq`
--

CREATE TABLE IF NOT EXISTS `table1_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table1_seq`
--

INSERT INTO `table1_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designation_master`
--
ALTER TABLE `designation_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empdetails`
--
ALTER TABLE `empdetails`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `emp_loan_lists`
--
ALTER TABLE `emp_loan_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_amount_master`
--
ALTER TABLE `loan_amount_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation` (`designation`);

--
-- Indexes for table `loan_category`
--
ALTER TABLE `loan_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `loan_payment`
--
ALTER TABLE `loan_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_seq`
--
ALTER TABLE `loan_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repayment_type`
--
ALTER TABLE `repayment_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `repay_type` (`repay_type`);

--
-- Indexes for table `table1_seq`
--
ALTER TABLE `table1_seq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designation_master`
--
ALTER TABLE `designation_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `emp_loan_lists`
--
ALTER TABLE `emp_loan_lists`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loan_amount_master`
--
ALTER TABLE `loan_amount_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `loan_category`
--
ALTER TABLE `loan_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `loan_payment`
--
ALTER TABLE `loan_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_seq`
--
ALTER TABLE `loan_seq`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `repayment_type`
--
ALTER TABLE `repayment_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `table1_seq`
--
ALTER TABLE `table1_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
