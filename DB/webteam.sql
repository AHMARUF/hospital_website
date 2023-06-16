-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 05:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `problem` text,
  `status` int(2) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `department`, `doctor`, `date`, `serial`, `problem`, `status`, `create_at`) VALUES
(1, 'DV1WPN', 10, 54, '2022-03-24', 1, '111', 1, '2022-03-24 12:27:00'),
(2, 'DV1WPN', 9, 56, '2022-03-24', 2, '1111', 1, '2022-03-24 12:27:42'),
(3, 'DV1WPN', 7, 54, '2022-03-24', 3, '12021', 1, '2022-03-24 12:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text,
  `time` varchar(20) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `time`, `image`, `status`, `create_at`) VALUES
(1, 'Blog Title Goes Here', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem, Nemo.', '23 Mar 2022', 'blogs/62383e4e5ce96.jpg', 1, '2022-03-21 08:58:54'),
(4, 'Blog Title Goes Here', 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit.', '23 Mar 2022', 'blogs/623b446d64b86.jpg', 1, '2022-03-23 16:01:49'),
(5, 'Blog Title Goes Here', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.', '23 Mar 2022', 'blogs/623b44a4d26b9.jpg', 1, '2022-03-23 16:02:44'),
(6, 'Blog Title Goes Here', 'Blog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes HereBlog Title Goes Here', '24 Mar 2022', 'blogs/623c0566280b0.jpg', 1, '2022-03-24 05:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `message` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `subject`, `email`, `message`, `create_at`) VALUES
(2, 'MAHABUB ALAHE  ', 'Test', 'amdadulhasan7878@gmail.com', 'hello sir', '2022-03-23 14:25:15'),
(3, 'MAHABUB ALAHE  ', 'Test', 'amdadulhasan7878@gmail.com', 'hello sir', '2022-03-23 14:30:06'),
(4, 'DREAM-IT', 'hello', 'rootfivebangladesh@gmail.com', 'test sir', '2022-03-24 05:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text,
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `status`, `created_at`) VALUES
(7, 'Microbiology', 'Lorem ipsum dolor sit amet,', 1, '2022-03-11 05:46:25'),
(8, 'Neonatal', 'Lorem ipsum dolor sit amet,', 1, '2022-03-11 05:50:43'),
(9, 'Nephrology', 'Lorem ipsum dolor sit amet,', 1, '2022-03-23 16:10:58'),
(10, 'Neurology', 'Lorem ipsum dolor sit amet,', 1, '2022-03-23 16:11:16'),
(11, 'Oncology', 'Lorem ipsum dolor sit amet,', 1, '2022-03-23 16:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `address` text,
  `number` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `blood_group` int(2) DEFAULT NULL,
  `education` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`, `designation`, `department`, `address`, `number`, `date_of_birth`, `gender`, `blood_group`, `education`, `image`, `status`, `created_at`) VALUES
(54, 'Dr. M Murtaza', 'amdadulhasan133@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Professor', 11, '........', '019833333222', '1981-12-19', 1, 1, 'MBBS,FCCS,DPD,ORC,MCCCO', 'doctor/623b4b2db83f9.jpg', 1, '2022-03-23 16:30:37'),
(56, 'Dr. Ahmed Abdullah', 'amdadulhasan7878@gmail.com', 'bc6f5290ee6c9a95612e4ea24a1a2016', 'Professor', 7, '...........', '01911228791', '1980-07-23', 1, 3, 'M.B.B.S,FCFS,Pharma.D,CCFA,NFDA', 'doctor/623b4d0131a6d.jpg', 1, '2022-03-23 16:38:25'),
(57, 'Dr.Huyan Xinan', 'abd@gmail.com', '2ee9f97ede90cb23bbf30ac5168c4c0e', 'Assistant Professor', 11, '........', '01812125478', '1985-01-12', 0, 5, 'M.B.B.S,FCFS,Pharma.D,CCFA,NFDA', 'doctor/623b4dee29fe9.jpg', 1, '2022-03-23 16:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `blood_group` int(2) DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text,
  `images` varchar(191) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `name`, `mobile`, `blood_group`, `gender`, `date_of_birth`, `address`, `images`, `status`, `create_at`) VALUES
(1, 'DV1WPN', 'MAHABUB ALAHE  ', '01736047494', 1, 1, '2022-03-25', '.......', 'patient/623c0247f368f.jpg', 1, '2022-03-24 05:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `applicationtitle` varchar(191) DEFAULT NULL,
  `description` text,
  `email` varchar(191) DEFAULT NULL,
  `number` varchar(191) DEFAULT NULL,
  `address` text,
  `GoogleMap` text,
  `Facebook` varchar(191) DEFAULT NULL,
  `Instagram` varchar(191) DEFAULT NULL,
  `Twitter` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `pinterest` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `Copyright_Text` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `applicationtitle`, `description`, `email`, `number`, `address`, `GoogleMap`, `Facebook`, `Instagram`, `Twitter`, `linkedin`, `pinterest`, `logo`, `favicon`, `Copyright_Text`) VALUES
(1, 'Hospital', 'Hosptal', 'hospatel@gmail.com', '01736047494', 'Feni sodor, Feni.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.9324119316434!2d91.40268441428245!3d23.02625372197019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375369b34ad880ad%3A0x164ca01aec37204e!2zSG9zcGl0YWwgUmQsIOCmq-Cnh-CmqOCngA!5e0!3m2!1sbn!2sbd!4v1641982097638!5m2!1sbn!2sbd       ', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.linkedin.com/', 'https://www.pinterest.com/', 'app/logo.png', 'app/favicon.png', 'created by <span>DREAM-IT</span> |  All rights reserved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-20 21:40:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
