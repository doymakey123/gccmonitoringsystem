-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 02:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_section`
--

CREATE TABLE `tbl_course_section` (
  `id` int(11) NOT NULL,
  `course` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course_section`
--

INSERT INTO `tbl_course_section` (`id`, `course`, `date_created`) VALUES
(1, 'Sampaguita', '2021-09-22 07:05:15'),
(2, 'TVL', '2021-09-22 07:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id_no` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_official`
--

CREATE TABLE `tbl_official` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_official`
--

INSERT INTO `tbl_official` (`id`, `name`, `date_created`) VALUES
(1, 'Tita G. Garrido', '2021-11-22 03:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_record`
--

CREATE TABLE `tbl_record` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `time_inn` varchar(255) NOT NULL,
  `time_out` varchar(255) DEFAULT NULL,
  `log_date` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_record`
--

INSERT INTO `tbl_record` (`id`, `stud_id`, `time_inn`, `time_out`, `log_date`, `status`) VALUES
(30, 'f7177163c833dff4b38fc8d2872f1ec6', '11:11:56pm', '11:28:28pm', '2021-10-20', 1),
(31, '17e62166fc8586dfa4d1bc0e1742c08b', '11:14:09pm', '11:29:05pm', '2021-10-21', 1),
(32, '17e62166fc8586dfa4d1bc0e1742c08b', '11:14:09am', '11:49:05am', '2021-10-22', 1),
(35, 'f7177163c833dff4b38fc8d2872f1ec6', '09:11:56am', '11:11:56am', '2021-10-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id_no` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `ext_name` varchar(50) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `bod` date NOT NULL,
  `grade` varchar(2) NOT NULL,
  `section` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id_no`, `fname`, `mname`, `lname`, `ext_name`, `gender`, `bod`, `grade`, `section`, `contact_no`, `address`, `img`) VALUES
(41, 'Jame', 'Lee', 'Sy', 'Jr', 'Male', '1990-09-09', '3', 'Sampaguita', '09559387210', 'Purok 1, Agay-ayan', '../student_images/Jame Lee Sy Jr.jpeg'),
(42, 'Rolando', 'Iyo', 'Barbadillo', 'Jr', 'Female', '2021-10-21', '10', 'TVL', '09559387210', 'Magallanes Gingoog City, Brgy 24', '../student_images/Rolando Iyo Barbadillo Jr.jpeg'),
(43, 'Jun Michael', NULL, 'Timon', '', 'Male', '2019-11-21', '12', 'Sampaguita', '09552938453', 'Purok 1, Agay-ayan', '../student_images/Jun Michael  Timon .jpeg'),
(44, 'Kent', '', 'Timon', '', 'Male', '2021-10-21', '6', 'Sampaguita', '09552938452', 'Gingoog City', '../student_images/Kent  Timon .jpeg'),
(45, 'Ohmbe', 'Abao', 'Timon', '', 'Female', '2000-01-18', '4', 'Sampaguita', '09654007148', 'Bohol Welding Shop', '../student_images/Ohmbe Abao Timon .jpeg'),
(46, 'Fredix', 'Darajoda', 'Monti', '', 'Male', '2021-11-22', '4', 'Sampaguita', '09530962250', 'Purok 1, Agay-ayan G.C', '../student_images/Fredix Darajoda Monti .jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_no` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_no`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'staff', 'de9bf5643eabf80f4a56fda3bbb84483', 2),
(3, 'user', '6ad14ba9986e3615423dfca256d04e3f', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course_section`
--
ALTER TABLE `tbl_course_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_record`
--
ALTER TABLE `tbl_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course_section`
--
ALTER TABLE `tbl_course_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_official`
--
ALTER TABLE `tbl_official`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_record`
--
ALTER TABLE `tbl_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
