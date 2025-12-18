-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2025 at 06:38 PM
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
-- Database: `dbwebproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `userID` char(8) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `userID`, `name`, `email`) VALUES
(1, 'ADM00001', 'Nguyễn Hải Đăng', 'abcxyznhd712@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classID` int(11) NOT NULL,
  `classname` varchar(30) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classID`, `classname`, `teacherID`) VALUES
(1, 'Lớp 1', 1),
(2, 'Lớp 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `semester` char(5) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `coursename`, `teacherID`, `semester`, `departmentID`) VALUES
(1, 'Cơ sở dữ liệu', 1, '20242', 1),
(2, 'Thực hành CSDL', 2, '20242', 1),
(3, 'Sư phạm Vật lí', 3, '20242', 2),
(4, 'Kinh tế chính trị', 4, '20242', 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentID` int(11) NOT NULL,
  `departmentname` varchar(30) NOT NULL,
  `chiefID` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `departmentname`, `chiefID`) VALUES
(1, 'CNTT', 'TCH00001'),
(2, 'SP', 'TCH00002'),
(3, 'CT', 'TCH00003');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollmentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollmentID`, `courseID`, `studentID`) VALUES
(3, 1, 2),
(4, 3, 2),
(5, 1, 3),
(6, 4, 3),
(7, 1, 4),
(9, 2, 5),
(10, 3, 5),
(11, 2, 6),
(12, 4, 6),
(13, 2, 7),
(15, 3, 8),
(16, 4, 8),
(17, 3, 9),
(19, 4, 10),
(23, 2, 12),
(24, 4, 12),
(25, 3, 13),
(27, 1, 14),
(28, 2, 14),
(29, 1, 15),
(30, 4, 15),
(31, 1, 16),
(33, 2, 17),
(34, 3, 17),
(35, 2, 18),
(36, 4, 18),
(37, 2, 19),
(39, 3, 20),
(40, 4, 20),
(41, 3, 21),
(43, 4, 22),
(45, 1, 23),
(46, 3, 23),
(47, 2, 24),
(48, 4, 24),
(49, 3, 25),
(51, 1, 26),
(52, 2, 26),
(53, 1, 27),
(54, 4, 27),
(55, 1, 28),
(57, 2, 29),
(58, 3, 29),
(59, 2, 30),
(60, 4, 30),
(61, 2, 31),
(63, 3, 32),
(64, 4, 32),
(65, 3, 33),
(67, 4, 34),
(69, 1, 35),
(70, 3, 35),
(71, 2, 36),
(72, 4, 36),
(73, 3, 37),
(75, 1, 38),
(76, 2, 38),
(77, 1, 39),
(78, 4, 39),
(79, 1, 40),
(81, 2, 41),
(82, 3, 41),
(83, 2, 42),
(84, 4, 42),
(85, 2, 43),
(87, 3, 44),
(88, 4, 44),
(89, 3, 45),
(91, 4, 46),
(93, 1, 47),
(94, 3, 47),
(95, 2, 48),
(96, 4, 48),
(97, 3, 49),
(99, 1, 50),
(100, 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `enrollmentID` int(11) NOT NULL,
  `midterm` decimal(4,2) DEFAULT 10.00,
  `final` decimal(4,2) DEFAULT 10.00,
  `grade` decimal(4,2) DEFAULT 10.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`enrollmentID`, `midterm`, `final`, `grade`) VALUES
(3, 5.50, 5.00, 5.25),
(4, 9.00, 9.50, 9.25),
(5, 4.00, 6.00, 5.00),
(6, 8.00, 7.00, 7.50),
(7, 6.00, 5.00, 5.50),
(9, 9.00, 8.00, 8.50),
(10, 7.50, 7.00, 7.25),
(11, 6.50, 8.00, 7.25),
(12, 7.00, 6.00, 6.50),
(13, 5.50, 5.00, 5.25),
(15, 4.00, 6.00, 5.00),
(16, 8.00, 7.00, 7.50),
(17, 6.00, 5.00, 5.50),
(19, 9.00, 8.00, 8.50),
(23, 5.50, 5.00, 5.25),
(24, 9.00, 9.50, 9.25),
(25, 4.00, 6.00, 5.00),
(27, 6.00, 5.00, 5.50),
(28, 3.50, 4.50, 4.00),
(29, 9.00, 8.00, 8.50),
(30, 7.50, 7.00, 7.25),
(31, 6.50, 8.00, 7.25),
(33, 5.50, 5.00, 5.25),
(34, 9.00, 9.50, 9.25),
(35, 4.00, 6.00, 5.00),
(36, 8.00, 7.00, 7.50),
(37, 6.00, 5.00, 5.50),
(39, 9.00, 8.00, 8.50),
(40, 7.50, 7.00, 7.25),
(41, 6.50, 8.00, 7.25),
(43, 5.50, 5.00, 5.25),
(45, 4.00, 6.00, 5.00),
(46, 8.00, 7.00, 7.50),
(47, 6.00, 5.00, 5.50),
(48, 3.50, 4.50, 4.00),
(49, 9.00, 8.00, 8.50),
(51, 6.50, 8.00, 7.25),
(52, 7.00, 6.00, 6.50),
(53, 5.50, 5.00, 5.25),
(54, 9.00, 9.50, 9.25),
(55, 4.00, 6.00, 5.00),
(57, 6.00, 5.00, 5.50),
(58, 3.50, 4.50, 4.00),
(59, 9.00, 8.00, 8.50),
(60, 7.50, 7.00, 7.25),
(61, 6.50, 8.00, 7.25),
(63, 5.50, 5.00, 5.25),
(64, 9.00, 9.50, 9.25),
(65, 4.00, 6.00, 5.00),
(67, 6.00, 5.00, 5.50),
(69, 9.00, 8.00, 8.50),
(70, 7.50, 7.00, 7.25),
(71, 6.50, 8.00, 7.25),
(72, 7.00, 6.00, 6.50),
(73, 5.50, 5.00, 5.25),
(75, 4.00, 6.00, 5.00),
(76, 8.00, 7.00, 7.50),
(77, 6.00, 5.00, 5.50),
(78, 3.50, 4.50, 4.00),
(79, 9.00, 8.00, 8.50),
(81, 6.50, 8.00, 7.25),
(82, 7.00, 6.00, 6.50),
(83, 5.50, 5.00, 5.25),
(84, 9.00, 9.50, 9.25),
(85, 4.00, 6.00, 5.00),
(87, 6.00, 5.00, 5.50),
(88, 3.50, 4.50, 4.00),
(89, 9.00, 8.00, 8.50),
(91, 6.50, 8.00, 7.25),
(93, 5.50, 5.00, 5.25),
(94, 9.00, 9.50, 9.25),
(95, 4.00, 6.00, 5.00),
(96, 8.00, 7.00, 7.50),
(97, 6.00, 5.00, 5.50),
(99, 9.00, 8.00, 8.50),
(100, 7.50, 7.00, 7.25);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `postusername` varchar(50) NOT NULL,
  `courseID` int(11) NOT NULL,
  `posttitle` varchar(255) NOT NULL,
  `postcontent` text DEFAULT NULL,
  `postcreated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postusername`, `courseID`, `posttitle`, `postcontent`, `postcreated`) VALUES
(1, 'stdnguyenvanan', 1, 'Tài liệu học tốt môn CSDL', 'Mình chia sẻ tài liệu ôn tập giữa kỳ cho môn Cơ sở dữ liệu.', '2025-06-08 23:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `replyID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `replyusername` varchar(50) NOT NULL,
  `replycontent` text NOT NULL,
  `replycreated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`replyID`, `postID`, `replyusername`, `replycontent`, `replycreated`) VALUES
(1, 1, 'stdnguyenvanan', 'Mong mọi người góp ý thêm tài liệu khác nhé!', '2025-06-08 23:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `studentID` int(11) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`studentID`, `classID`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(51, 1),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `userID` char(8) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(6) DEFAULT 'Nam',
  `birthdate` datetime DEFAULT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `userID`, `name`, `gender`, `birthdate`, `Address`) VALUES
(2, 'STD00002', 'Trần Thị Bích', 'Nữ', '2005-01-03 00:00:00', 'Hải Phòng'),
(3, 'STD00003', 'Lê Văn Cường', 'Nam', '2005-01-04 00:00:00', 'Nam Định'),
(4, 'STD00004', 'Phạm Thị Diệp', 'Nữ', '2005-01-06 00:00:00', 'Ninh Bình'),
(5, 'STD00005', 'Hoàng Văn Em', 'Nam', '2005-01-08 00:00:00', 'Hà Nam'),
(6, 'STD00006', 'Vũ Thị Fang', 'Nữ', '2005-01-10 00:00:00', 'Bắc Giang'),
(7, 'STD00007', 'Đỗ Văn Gia', 'Nam', '2005-01-11 00:00:00', 'Bắc Ninh'),
(8, 'STD00008', 'Bùi Thị Hạnh', 'Nữ', '2005-01-12 00:00:00', 'Vĩnh Phúc'),
(9, 'STD00009', 'Ngô Văn Ích', 'Nam', '2005-01-14 00:00:00', 'Thái Bình'),
(10, 'STD00010', 'Phan Thị Khuê', 'Nữ', '2005-01-15 00:00:00', 'Hưng Yên'),
(12, 'STD00012', 'Trần Thị Bích', 'Nữ', '2005-01-17 00:00:00', 'Lào Cai'),
(13, 'STD00013', 'Lê Văn Cường', 'Nam', '2005-01-18 00:00:00', 'Tuyên Quang'),
(14, 'STD00014', 'Phạm Hùng', 'Nam', '2005-01-19 00:00:00', 'Cao Bằng'),
(15, 'STD00015', 'Hoàng Thị An', 'Nữ', '2005-01-20 00:00:00', 'Yên Bái'),
(16, 'STD00016', 'Vũ Mạnh Hải', 'Nam', '2005-01-21 00:00:00', 'Bắc Kạn'),
(17, 'STD00017', 'Đỗ Thị Thảo', 'Nữ', '2005-01-22 00:00:00', 'Phú Thọ'),
(18, 'STD00018', 'Bùi Tuấn Anh', 'Nam', '2005-01-23 00:00:00', 'Sơn La'),
(19, 'STD00019', 'Ngô Thị Mai', 'Nữ', '2005-01-24 00:00:00', 'Điện Biên'),
(20, 'STD00020', 'Phan Ngọc Bảo', 'Nam', '2005-01-25 00:00:00', 'Hòa Bình'),
(21, 'STD00021', 'Nguyễn Văn An', 'Nam', '2005-01-26 00:00:00', 'Hà Nội'),
(22, 'STD00022', 'Trần Thị Bích', 'Nữ', '2005-01-27 00:00:00', 'Hải Phòng'),
(23, 'STD00023', 'Lê Văn Cường', 'Nam', '2005-01-28 00:00:00', 'Nam Định'),
(24, 'STD00024', 'Phạm Thị Diễm', 'Nữ', '2005-01-29 00:00:00', 'Ninh Bình'),
(25, 'STD00025', 'Hoàng Thị Bảo', 'Nữ', '2005-01-30 00:00:00', 'Hà Nam'),
(26, 'STD00026', 'Vũ Ngọc Dũng', 'Nam', '2005-02-01 00:00:00', 'Bắc Giang'),
(27, 'STD00027', 'Doãn Văn Hòa', 'Nam', '2005-02-02 00:00:00', 'Bắc Ninh'),
(28, 'STD00028', 'Bùi Khắc Tâm', 'Nam', '2005-02-03 00:00:00', 'Vĩnh Phúc'),
(29, 'STD00029', 'Ngô Đức Tài', 'Nam', '2005-02-04 00:00:00', 'Thái Bình'),
(30, 'STD00030', 'Phan Thị Kiều', 'Nữ', '2005-02-05 00:00:00', 'Hưng Yên'),
(31, 'STD00031', 'Nguyễn Thị Mai', 'Nữ', '2005-02-06 00:00:00', 'Lạng Sơn'),
(32, 'STD00032', 'Trần Minh Hiếu', 'Nam', '2005-02-07 00:00:00', 'Lào Cai'),
(33, 'STD00033', 'Lê Mỹ Linh', 'Nữ', '2005-02-08 00:00:00', 'Tuyên Quang'),
(34, 'STD00034', 'Phạm Long Oanh', 'Nữ', '2005-02-09 00:00:00', 'Cao Bằng'),
(35, 'STD00035', 'Hoàng Kim Thành', 'Nam', '2005-02-10 00:00:00', 'Yên Bái'),
(36, 'STD00036', 'Vũ Quang Huy', 'Nam', '2005-02-11 00:00:00', 'Bắc Kạn'),
(37, 'STD00037', 'Đỗ Thị Hạnh', 'Nữ', '2005-02-12 00:00:00', 'Phú Thọ'),
(38, 'STD00038', 'Bùi Văn Kiên', 'Nam', '2005-02-13 00:00:00', 'Sơn La'),
(39, 'STD00039', 'Ngô Thị Linh', 'Nữ', '2005-02-14 00:00:00', 'Điện Biên'),
(40, 'STD00040', 'Phan Chí Nhân', 'Nam', '2005-02-15 00:00:00', 'Hòa Bình'),
(41, 'STD00041', 'Nguyễn Thị Hoa', 'Nữ', '2005-02-16 00:00:00', 'Hà Nội'),
(42, 'STD00042', 'Trần Văn Khải', 'Nam', '2005-02-17 00:00:00', 'Hải Phòng'),
(43, 'STD00043', 'Lê Thị Kim', 'Nữ', '2005-02-18 00:00:00', 'Nam Định'),
(44, 'STD00044', 'Phạm Văn Nam', 'Nam', '2005-02-19 00:00:00', 'Ninh Bình'),
(45, 'STD00045', 'Hoàng Hồng Sơn', 'Nam', '2005-02-20 00:00:00', 'Hà Nam'),
(46, 'STD00046', 'Vũ Quỳnh Trang', 'Nữ', '2005-02-21 00:00:00', 'Bắc Giang'),
(47, 'STD00047', 'Đỗ Văn Tài', 'Nam', '2005-02-22 00:00:00', 'Bắc Ninh'),
(48, 'STD00048', 'Bùi Thanh Tâm', 'Nam', '2005-02-23 00:00:00', 'Vĩnh Phúc'),
(49, 'STD00049', 'Ngô Kim Huệ', 'Nữ', '2005-02-24 00:00:00', 'Thái Bình'),
(50, 'STD00050', 'Phan Bảo Duy', 'Nam', '2005-02-25 00:00:00', 'Hưng Yên'),
(51, 'STD00051', 'Nguyễn Hải Đăng', 'Nam', '2005-05-13 00:00:00', 'Thái Bình');

-- --------------------------------------------------------

--
-- Table structure for table `teacherdepartment`
--

CREATE TABLE `teacherdepartment` (
  `teacherID` int(11) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacherdepartment`
--

INSERT INTO `teacherdepartment` (`teacherID`, `departmentID`) VALUES
(1, 1),
(4, 1),
(7, 1),
(10, 1),
(2, 2),
(8, 2),
(11, 2),
(3, 3),
(6, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL,
  `userID` char(8) DEFAULT NULL,
  `name` varchar(30) NOT NULL DEFAULT 'Nguyễn Văn A',
  `email` varchar(50) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `userID`, `name`, `email`, `degree`) VALUES
(1, 'TCH00001', 'Nguyễn Văn A', 'a@gv.edu.vn', 'Thạc sĩ'),
(2, 'TCH00002', 'Trần Thị Bình', 'b@gv.edu.vn', 'Tiến sĩ'),
(3, 'TCH00003', 'Lê Văn Cường', 'c@gv.edu.vn', 'Thạc sĩ'),
(4, 'TCH00004', 'Phạm Thị Diệu', 'd@gv.edu.vn', 'Tiến sĩ'),
(6, 'TCH00006', 'Vũ Thị Phang', 'f@gv.edu.vn', 'Thạc sĩ'),
(7, 'TCH00007', 'Đỗ Văn Gia', 'g@gv.edu.vn', 'Tiến sĩ'),
(8, 'TCH00008', 'Bùi Thị Hạnh', 'h@gv.edu.vn', 'Thạc sĩ'),
(9, 'TCH00009', 'Ngô Văn Ích', 'i@gv.edu.vn', 'Tiến sĩ'),
(10, 'TCH00010', 'Phan Thị Kim', 'k@gv.edu.vn', 'Thạc sĩ'),
(11, 'TCH00011', 'Nguyễn Hải Đăng', 'aloda@gmail.com', 'Không');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` char(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','teacher','student') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `role`) VALUES
('ADM00001', 'admindang1', 'sktt1faker', 'admin'),
('STD00001', 'stdnguyenvanan', '123', 'student'),
('STD00002', 'stdtranthibich', '123', 'student'),
('STD00003', 'stdlevancuong', '123', 'student'),
('STD00004', 'stdphamthidiep', '123', 'student'),
('STD00005', 'stdhoangvanem', '123', 'student'),
('STD00006', 'stdvuthifang', '123', 'student'),
('STD00007', 'stddovangia', '123', 'student'),
('STD00008', 'stdbuithihanh', '123', 'student'),
('STD00009', 'stdngovanich', '123', 'student'),
('STD00010', 'stdphantikhue', '123', 'student'),
('STD00011', 'stdnguyenvanan1', '123', 'student'),
('STD00012', 'stdtranthibich1', '123', 'student'),
('STD00013', 'stdlevancuong1', '123', 'student'),
('STD00014', 'stdphamhung', '123', 'student'),
('STD00015', 'stdhoangthian', '123', 'student'),
('STD00016', 'stdvumanhhai', '123', 'student'),
('STD00017', 'stddothithao', '123', 'student'),
('STD00018', 'stdbuituananh', '123', 'student'),
('STD00019', 'stdngothimai', '123', 'student'),
('STD00020', 'stdphanngocbao', '123', 'student'),
('STD00021', 'stdnguyenvanan2', '123', 'student'),
('STD00022', 'stdtranthibich2', '123', 'student'),
('STD00023', 'stdlevancuong2', '123', 'student'),
('STD00024', 'stdphamthidiem', '123', 'student'),
('STD00025', 'stdhoangthibao', '123', 'student'),
('STD00026', 'stdvungocdung', '123', 'student'),
('STD00027', 'stddoanvanhoa', '123', 'student'),
('STD00028', 'stdbuikhactam', '123', 'student'),
('STD00029', 'stdngoductai', '123', 'student'),
('STD00030', 'stdphanthikieu', '123', 'student'),
('STD00031', 'stdnguyenthimai', '123', 'student'),
('STD00032', 'stdtranminhhieu', '123', 'student'),
('STD00033', 'stdlemylinh', '123', 'student'),
('STD00034', 'stdphamlongoanh', '123', 'student'),
('STD00035', 'stdhoangkimthanh', '123', 'student'),
('STD00036', 'stdvuquanghuy', '123', 'student'),
('STD00037', 'stddothihanh', '123', 'student'),
('STD00038', 'stdbuivankien', '123', 'student'),
('STD00039', 'stdngothilinh', '123', 'student'),
('STD00040', 'stdphanchinh', '123', 'student'),
('STD00041', 'stdnguyenthihoa', '123', 'student'),
('STD00042', 'stdtranvankhai', '123', 'student'),
('STD00043', 'stdlethikim', '123', 'student'),
('STD00044', 'stdphamvannam', '123', 'student'),
('STD00045', 'stdhoanghongson', '123', 'student'),
('STD00046', 'stdvuquynhtrang', '123', 'student'),
('STD00047', 'stddovantai', '123', 'student'),
('STD00048', 'stdbuithanhtam', '123', 'student'),
('STD00049', 'stdngokimhue', '123', 'student'),
('STD00050', 'stdphanbaoduy', '123', 'student'),
('STD00051', 'stdnguyenhaiang', '123', 'student'),
('TCH00001', 'tchnguyenvana', '123', 'teacher'),
('TCH00002', 'tchtranthibinh', '123', 'teacher'),
('TCH00003', 'tchlevancuong', '123', 'teacher'),
('TCH00004', 'tchphamthidieu', '123', 'teacher'),
('TCH00005', 'tchhoangvanem', '123', 'teacher'),
('TCH00006', 'tchvuthiphang', '123', 'teacher'),
('TCH00007', 'tchdovangia', '123', 'teacher'),
('TCH00008', 'tchbuithihanh', '123', 'teacher'),
('TCH00009', 'tchngovanich', '123', 'teacher'),
('TCH00010', 'tchphanthikim', '123', 'teacher'),
('TCH00011', 'tchnguyenhaiang', '123', 'teacher');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewadmins`
-- (See below for the actual view)
--
CREATE TABLE `viewadmins` (
`userID` char(8)
,`adminID` int(11)
,`name` varchar(30)
,`email` varchar(50)
,`username` varchar(50)
,`role` enum('admin','teacher','student')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewclasses`
-- (See below for the actual view)
--
CREATE TABLE `viewclasses` (
`userID` char(8)
,`studentID` int(11)
,`name` varchar(30)
,`gender` varchar(6)
,`birthdate` datetime
,`Address` varchar(100)
,`classID` int(11)
,`classname` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewcourses`
-- (See below for the actual view)
--
CREATE TABLE `viewcourses` (
`courseID` int(11)
,`coursename` varchar(50)
,`teacherID` int(11)
,`semester` char(5)
,`departmentID` int(11)
,`name` varchar(30)
,`userID` char(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewdepartments`
-- (See below for the actual view)
--
CREATE TABLE `viewdepartments` (
`userID` char(8)
,`teacherID` int(11)
,`name` varchar(30)
,`email` varchar(50)
,`degree` varchar(50)
,`departmentID` int(11)
,`departmentname` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewgrades`
-- (See below for the actual view)
--
CREATE TABLE `viewgrades` (
`enrollmentID` int(11)
,`midterm` decimal(4,2)
,`final` decimal(4,2)
,`grade` decimal(4,2)
,`coursename` varchar(50)
,`name` varchar(30)
,`semester` char(5)
,`userID` char(8)
,`courseID` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewposts`
-- (See below for the actual view)
--
CREATE TABLE `viewposts` (
`postID` int(11)
,`postusername` varchar(50)
,`courseID` int(11)
,`posttitle` varchar(255)
,`postcontent` text
,`postcreated` datetime
,`username` varchar(50)
,`coursename` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewposts2`
-- (See below for the actual view)
--
CREATE TABLE `viewposts2` (
`postID` int(11)
,`postusername` varchar(50)
,`posttitle` varchar(255)
,`postcontent` text
,`postcreated` datetime
,`replyusername` varchar(50)
,`replycontent` text
,`replycreated` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewstudents`
-- (See below for the actual view)
--
CREATE TABLE `viewstudents` (
`userID` char(8)
,`studentID` int(11)
,`name` varchar(30)
,`gender` varchar(6)
,`birthdate` datetime
,`Address` varchar(100)
,`username` varchar(50)
,`role` enum('admin','teacher','student')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewteachercourse`
-- (See below for the actual view)
--
CREATE TABLE `viewteachercourse` (
`userID` char(8)
,`teacherID` int(11)
,`name` varchar(30)
,`email` varchar(50)
,`degree` varchar(50)
,`courseID` int(11)
,`coursename` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewteachers`
-- (See below for the actual view)
--
CREATE TABLE `viewteachers` (
`userID` char(8)
,`teacherID` int(11)
,`name` varchar(30)
,`email` varchar(50)
,`degree` varchar(50)
,`username` varchar(50)
,`role` enum('admin','teacher','student')
);

-- --------------------------------------------------------

--
-- Structure for view `viewadmins`
--
DROP TABLE IF EXISTS `viewadmins`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewadmins`  AS SELECT `a`.`userID` AS `userID`, `a`.`adminID` AS `adminID`, `a`.`name` AS `name`, `a`.`email` AS `email`, `u`.`username` AS `username`, `u`.`role` AS `role` FROM (`admins` `a` join `users` `u` on(`a`.`userID` = `u`.`userID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewclasses`
--
DROP TABLE IF EXISTS `viewclasses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewclasses`  AS SELECT `s`.`userID` AS `userID`, `s`.`studentID` AS `studentID`, `s`.`name` AS `name`, `s`.`gender` AS `gender`, `s`.`birthdate` AS `birthdate`, `s`.`Address` AS `Address`, `c`.`classID` AS `classID`, `c`.`classname` AS `classname` FROM ((`students` `s` join `studentclass` `sc` on(`s`.`studentID` = `sc`.`studentID`)) join `classes` `c` on(`sc`.`classID` = `c`.`classID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewcourses`
--
DROP TABLE IF EXISTS `viewcourses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcourses`  AS SELECT `c`.`courseID` AS `courseID`, `c`.`coursename` AS `coursename`, `c`.`teacherID` AS `teacherID`, `c`.`semester` AS `semester`, `c`.`departmentID` AS `departmentID`, `s`.`name` AS `name`, `u`.`userID` AS `userID` FROM (((`courses` `c` join `enrollments` `e` on(`e`.`courseID` = `c`.`courseID`)) join `students` `s` on(`e`.`studentID` = `s`.`studentID`)) join `users` `u` on(`u`.`userID` = `s`.`userID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewdepartments`
--
DROP TABLE IF EXISTS `viewdepartments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewdepartments`  AS SELECT `t`.`userID` AS `userID`, `t`.`teacherID` AS `teacherID`, `t`.`name` AS `name`, `t`.`email` AS `email`, `t`.`degree` AS `degree`, `d`.`departmentID` AS `departmentID`, `d`.`departmentname` AS `departmentname` FROM ((`teachers` `t` join `teacherdepartment` `td` on(`t`.`teacherID` = `td`.`teacherID`)) join `departments` `d` on(`td`.`departmentID` = `d`.`departmentID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewgrades`
--
DROP TABLE IF EXISTS `viewgrades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewgrades`  AS SELECT `g`.`enrollmentID` AS `enrollmentID`, `g`.`midterm` AS `midterm`, `g`.`final` AS `final`, `g`.`grade` AS `grade`, `c`.`coursename` AS `coursename`, `s`.`name` AS `name`, `c`.`semester` AS `semester`, `u`.`userID` AS `userID`, `c`.`courseID` AS `courseID` FROM ((((`grades` `g` join `enrollments` `e` on(`e`.`enrollmentID` = `g`.`enrollmentID`)) join `courses` `c` on(`e`.`courseID` = `c`.`courseID`)) join `students` `s` on(`e`.`studentID` = `s`.`studentID`)) join `users` `u` on(`u`.`userID` = `s`.`userID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewposts`
--
DROP TABLE IF EXISTS `viewposts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewposts`  AS SELECT `p`.`postID` AS `postID`, `p`.`postusername` AS `postusername`, `p`.`courseID` AS `courseID`, `p`.`posttitle` AS `posttitle`, `p`.`postcontent` AS `postcontent`, `p`.`postcreated` AS `postcreated`, `u`.`username` AS `username`, `c`.`coursename` AS `coursename` FROM ((`posts` `p` join `users` `u` on(`p`.`postusername` = `u`.`username`)) join `courses` `c` on(`p`.`courseID` = `c`.`courseID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewposts2`
--
DROP TABLE IF EXISTS `viewposts2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewposts2`  AS SELECT `p`.`postID` AS `postID`, `p`.`postusername` AS `postusername`, `p`.`posttitle` AS `posttitle`, `p`.`postcontent` AS `postcontent`, `p`.`postcreated` AS `postcreated`, `r`.`replyusername` AS `replyusername`, `r`.`replycontent` AS `replycontent`, `r`.`replycreated` AS `replycreated` FROM (`posts` `p` join `replies` `r` on(`p`.`postID` = `r`.`postID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewstudents`
--
DROP TABLE IF EXISTS `viewstudents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewstudents`  AS SELECT `s`.`userID` AS `userID`, `s`.`studentID` AS `studentID`, `s`.`name` AS `name`, `s`.`gender` AS `gender`, `s`.`birthdate` AS `birthdate`, `s`.`Address` AS `Address`, `u`.`username` AS `username`, `u`.`role` AS `role` FROM (`students` `s` join `users` `u` on(`s`.`userID` = `u`.`userID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewteachercourse`
--
DROP TABLE IF EXISTS `viewteachercourse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewteachercourse`  AS SELECT `t`.`userID` AS `userID`, `t`.`teacherID` AS `teacherID`, `t`.`name` AS `name`, `t`.`email` AS `email`, `t`.`degree` AS `degree`, `c`.`courseID` AS `courseID`, `c`.`coursename` AS `coursename` FROM (`teachers` `t` join `courses` `c` on(`t`.`teacherID` = `c`.`teacherID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewteachers`
--
DROP TABLE IF EXISTS `viewteachers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewteachers`  AS SELECT `t`.`userID` AS `userID`, `t`.`teacherID` AS `teacherID`, `t`.`name` AS `name`, `t`.`email` AS `email`, `t`.`degree` AS `degree`, `u`.`username` AS `username`, `u`.`role` AS `role` FROM (`teachers` `t` join `users` `u` on(`t`.`userID` = `u`.`userID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `adm_fk_userID` (`userID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classID`),
  ADD UNIQUE KEY `classname` (`classname`),
  ADD KEY `cla_fk_teacherID` (`teacherID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `cou_fk_teacherID` (`teacherID`),
  ADD KEY `cou_fk_departmentID` (`departmentID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentID`),
  ADD UNIQUE KEY `departmentname` (`departmentname`),
  ADD KEY `dep_fk_chiefID` (`chiefID`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollmentID`),
  ADD KEY `enr_fk_courseID` (`courseID`),
  ADD KEY `enr_fk_studentID` (`studentID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`enrollmentID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `posts_fk_userID` (`postusername`),
  ADD KEY `posts_fk_courseID` (`courseID`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`replyID`),
  ADD KEY `replies_fk_postID` (`postID`),
  ADD KEY `replies_fk_userID` (`replyusername`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `stucla_fk_classID` (`classID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `stu_fk_userID` (`userID`);

--
-- Indexes for table `teacherdepartment`
--
ALTER TABLE `teacherdepartment`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `teadep_fk_depID` (`departmentID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `tea_fk_userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `replyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `adm_fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `cla_fk_teacherID` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `cou_fk_departmentID` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `cou_fk_teacherID` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `dep_fk_chiefID` FOREIGN KEY (`chiefID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enr_fk_courseID` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `enr_fk_studentID` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `gra_fk_enrollmentID` FOREIGN KEY (`enrollmentID`) REFERENCES `enrollments` (`enrollmentID`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk_courseID` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_fk_userID` FOREIGN KEY (`postusername`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_fk_postID` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_fk_userID` FOREIGN KEY (`replyusername`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD CONSTRAINT `stucla_fk_classID` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`) ON DELETE CASCADE,
  ADD CONSTRAINT `stucla_fk_studentID` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `stu_fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `teacherdepartment`
--
ALTER TABLE `teacherdepartment`
  ADD CONSTRAINT `teadep_fk_depID` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teadep_fk_teacherID` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `tea_fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
