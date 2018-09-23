-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 08:26 PM
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
-- Database: `department`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(11) NOT NULL,
  `faculty_name` varchar(20) DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `event_name` varchar(100) DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `organizedBy` varchar(50) NOT NULL,
  `attended` varchar(3) NOT NULL DEFAULT 'No',
  `file_name` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `faculty_name`, `activity`, `event_name`, `fromDate`, `toDate`, `organizedBy`, `attended`, `file_name`, `file_size`) VALUES
(1, 'test', '1', 'test', '2017-09-08', '2017-09-15', '', 'No', '', 0),
(26, 'test', 'STTP', '1', '0000-00-00', '0000-00-00', '1', 'No', '37883-aboutpic.jpg', 157712),
(27, 'test', 'STTP', '2', '0000-00-00', '0000-00-00', '2', 'No', '11741-Activity Diagram.png', 56676),
(1, 'test', '1', 'test', '2017-09-08', '2017-09-15', '', 'No', '', 0),
(26, 'test', 'STTP', '1', '0000-00-00', '0000-00-00', '1', 'No', '37883-aboutpic.jpg', 157712),
(27, 'test', 'STTP', '2', '0000-00-00', '0000-00-00', '2', 'No', '11741-Activity Diagram.png', 56676);

-- --------------------------------------------------------

--
-- Table structure for table `attended`
--

CREATE TABLE `attended` (
  `A_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Act_title` varchar(500) NOT NULL,
  `Act_type` varchar(20) NOT NULL,
  `Organized_by` varchar(500) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Permission_copy` blob NOT NULL,
  `Certificate_copy` blob NOT NULL,
  `Report_copy` blob NOT NULL,
  `Permission_path` varchar(100) NOT NULL,
  `Certificate_path` varchar(100) NOT NULL,
  `Report_path` varchar(100) NOT NULL,
  `FDC_Y_N` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attended`
--

INSERT INTO `attended` (`A_ID`, `Fac_ID`, `Act_title`, `Act_type`, `Organized_by`, `Date_from`, `Date_to`, `Location`, `Permission_copy`, `Certificate_copy`, `Report_copy`, `Permission_path`, `Certificate_path`, `Report_path`, `FDC_Y_N`) VALUES
(1, 8, 'Dhaval', 'STTP', 'Parakh', '2018-01-07', '2018-01-07', 'Mumbai', '', '', '', '', '', '', 'no'),
(2, 8, 'parakhhh', 'STTP', 'aa', '2018-01-01', '2018-01-01', 'Mumbai', '', '', '', '', '', '', 'yes'),
(3, 8, 'abcd', 'STTP', 'abcd', '2018-01-01', '2018-01-01', 'mumbai', '', '', '', '', '', '', 'yes'),
(5, 8, 'sttp112', 'STTP', 'a', '2018-01-01', '2018-01-01', 'abc', '', '', '', '', '', '', 'no'),
(6, 1, 'wsn and iot', 'FDP', 'kh', '2018-02-08', '2018-02-09', 'kjsce', '', '', '', ' permissions/6.docx', 'NULL', 'not_applicable', 'yes'),
(8, 1, 'qualnet', 'Workshop', 'kjsce', '2018-02-02', '2018-02-03', 'kjs', '', '', '', '', '', '', 'no'),
(9, 1, 'wsn and iot', 'Workshop', 'kjsce', '2018-02-08', '2018-02-09', 'kjsce', '', '', '', '', '', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `co_curricular`
--

CREATE TABLE `co_curricular` (
  `co_curricular_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `activity_name` varchar(500) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `organized_by` text NOT NULL,
  `purpose_of_activity` text NOT NULL,
  `permission_copy` blob,
  `Certificate_copy` blob,
  `report_copy` blob,
  `permission_path` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `certificate_path` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `report_path` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_curricular`
--

INSERT INTO `co_curricular` (`co_curricular_ID`, `Fac_ID`, `activity_name`, `Date_from`, `Date_to`, `organized_by`, `purpose_of_activity`, `permission_copy`, `Certificate_copy`, `report_copy`, `permission_path`, `certificate_path`, `report_path`) VALUES
(140, 8, 'JAVA', '2017-12-08', '2017-12-08', 'CHIRAG', 'SEMINAR', NULL, NULL, NULL, NULL, NULL, NULL),
(141, 8, 'cplus', '2017-12-12', '2017-12-23', 'TRHT', 'RTHTH1', NULL, NULL, NULL, 'not_applicable', 'NULL', NULL),
(147, 8, 'rgrgreg1234', '2017-12-13', '2017-12-22', 'grg1', 'grgrg1', NULL, NULL, NULL, NULL, NULL, NULL),
(148, 8, 'rgrgrg', '2017-12-15', '2017-12-22', 'gfgf', 'fgfgf', NULL, NULL, NULL, NULL, NULL, NULL),
(151, 8, 'c12', '2017-12-09', '2017-12-22', 'gdgdg', 'dgdgd', NULL, NULL, NULL, 'NULL', 'not_applicable', ' reports/151.jpg'),
(152, 8, 'c2', '2017-12-21', '2017-12-28', 'dggdg', 'dgdg', NULL, NULL, NULL, NULL, NULL, NULL),
(153, 8, 'h1', '2017-12-06', '2017-12-22', 'rhhr', 'hfh1', NULL, NULL, NULL, 'not_applicable', ' certificates/153.jpg', ' reports/153.jpg'),
(156, 8, 'Lec12', '2017-12-06', '2017-12-22', 'wfswfws', 'jtthre', NULL, NULL, NULL, NULL, NULL, NULL),
(157, 8, 'gst', '2017-12-08', '2017-12-29', 'fedfd', 'dfdfdf', NULL, NULL, NULL, ' permissions/157.jpg', ' certificates/157.jpg', 'not_applicable'),
(158, 8, 'startup', '2017-11-29', '2017-12-22', 'rgreg', 'gregreg', NULL, NULL, NULL, NULL, NULL, NULL),
(159, 8, 'stp', '2017-12-01', '2017-12-28', 'gergreg', 'rgrgrg', NULL, NULL, NULL, NULL, NULL, NULL),
(163, 9, 'fgewwe', '2017-12-12', '2017-12-05', 'grgr', 'rgrfg', NULL, NULL, NULL, NULL, NULL, NULL),
(165, 10, 'fdfsf', '2017-12-06', '2017-12-27', 'ff', 'fwqfdwqd', NULL, NULL, NULL, NULL, NULL, NULL),
(166, 10, 'yfgygyu', '2017-12-07', '2017-12-28', 'kjok', '', NULL, NULL, NULL, NULL, NULL, NULL),
(167, 10, 'wtwsydd', '2017-12-04', '2017-12-21', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(168, 8, 'GJFGJKYL', '2018-01-02', '2018-01-25', 'FBFBF', 'BFMGMH', NULL, NULL, NULL, NULL, NULL, NULL),
(169, 8, 'htws', '2018-01-01', '2018-01-31', 'etet', 'eryeye', NULL, NULL, NULL, NULL, NULL, NULL),
(170, 8, 'h123', '2018-01-01', '2018-01-31', 'etyete', 'tedtet', NULL, NULL, NULL, 'NULL', NULL, NULL),
(176, 1, 'project', '2018-02-01', '2018-02-10', 's', 'd', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ex_curricular`
--

CREATE TABLE `ex_curricular` (
  `ex_curricular_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `activity_name` varchar(500) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `organized_by` text NOT NULL,
  `purpose_of_activity` text NOT NULL,
  `permission_copy` blob,
  `Certificate_copy` blob,
  `report_copy` blob,
  `permission_path` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `certificate_path` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `report_path` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `P_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Paper_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Paper_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Paper_N_I` varchar(20) CHARACTER SET utf8 NOT NULL,
  `paper_category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `conf_journal_name` varchar(500) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Location` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Paper_copy` blob NOT NULL,
  `Certificate_copy` blob NOT NULL,
  `report_copy` blob NOT NULL,
  `paper_path` varchar(100) CHARACTER SET utf8 NOT NULL,
  `certificate_path` varchar(100) CHARACTER SET utf8 NOT NULL,
  `report_path` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Paper_co_authors` varchar(30) CHARACTER SET utf8 NOT NULL,
  `volume` varchar(30) CHARACTER SET utf8 NOT NULL,
  `h_index` int(10) NOT NULL,
  `FDC_Y_N` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`P_ID`, `Fac_ID`, `Paper_title`, `Paper_type`, `Paper_N_I`, `paper_category`, `conf_journal_name`, `Date_from`, `Date_to`, `Location`, `Paper_copy`, `Certificate_copy`, `report_copy`, `paper_path`, `certificate_path`, `report_path`, `Paper_co_authors`, `volume`, `h_index`, `FDC_Y_N`) VALUES
(1, 1, 'wsn', 'conference', 'national', 'peer reviewed', 'df', '2018-01-19', '2018-01-20', 'd', '', '', '', 'not_applicable', '', 'not_applicable', 'f', 'II', 0, 'yes'),
(2, 1, 'ttt', 'conference', 'national', 'peer reviewed', 'f', '2018-01-01', '2018-01-02', 'd', '', '', '', 'NULL', '', '', 'f', '6', 0, 'no'),
(3, 1, 'fgdfgfdg', 'conference', 'national', 'peer reviewed', 'dfg', '2018-02-02', '2018-02-18', 'dfg', '', '', '', '', '', '', 'd', 'd', 0, 'no'),
(4, 3, 'dfg', 'conference', 'national', 'peer reviewed', 'df', '2018-02-08', '2018-02-17', 'd', '', '', '', '', '', '', 'f', 'f', 0, 'no'),
(5, 1, 'xczxc', 'conference', 'national', 'peer reviewed', 'zxc', '2018-02-23', '2018-02-25', 'zxc', '', '', '', ' papers/5.jpg', '', '', 'zx', 'xz', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `facultydetails`
--

CREATE TABLE `facultydetails` (
  `Fac_ID` int(11) NOT NULL,
  `F_NAME` varchar(50) NOT NULL,
  `Mobile` bigint(12) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facultydetails`
--

INSERT INTO `facultydetails` (`Fac_ID`, `F_NAME`, `Mobile`, `Email`, `Password`, `token`) VALUES
(1, 'jyoti', 46545656, 'tryambake.jyoti@gmail.com', '$2y$04$hn33Rf8HBMUvGGF7IS8IiORAXQv6pie1h5kpkH6jrGsBsNFsdy3VW', 'j6fw8nk107'),
(2, 'hod', 985755465, 'hodextc@somaiya.edu', '$2a$07$3tpIyRFAsdnziwTURbAHpuHNtVOBJWd3HAZyVqR0PkD5tc3cBAiky', '0'),
(3, 'ashwini', 89563214, 'jyoti.tryambake@somaiya.edu', '', '0'),
(4, 'madhuri', 8956231485, 'madhuri@somaiya.edu', '$2y$04$OJRrZxcjmmA0IRXT.uJJaOqsu9H7.0IK4r25oCHCckjgnzFanAFeq', '0'),
(5, 'committee member', 9999999999, 'member@somaiya.edu', '$2y$04$32QXuhatqxiHtDDGjgBauubkz7FpcbAgpLzuKqdkEh2q541DZgf4a', '');

-- --------------------------------------------------------

--
-- Table structure for table `fdc`
--

CREATE TABLE `fdc` (
  `FDC_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Paper_title` varchar(100) NOT NULL,
  `min_no` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `period` int(10) NOT NULL,
  `od_approv` int(10) NOT NULL,
  `od_avail` int(10) NOT NULL,
  `fee_sac` int(10) NOT NULL,
  `fee_avail` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fdc`
--

INSERT INTO `fdc` (`FDC_ID`, `Fac_ID`, `Paper_title`, `min_no`, `serial_no`, `period`, `od_approv`, `od_avail`, `fee_sac`, `fee_avail`) VALUES
(21, 1, 'analysis', '34', '45', 1, 3, 7, 23, 420),
(22, 1, 'wsn', '34', '454', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fdc_attended`
--

CREATE TABLE `fdc_attended` (
  `FDC_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Act_title` varchar(100) NOT NULL,
  `min_no` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `period` int(10) NOT NULL,
  `od_approv` int(10) NOT NULL,
  `od_avail` int(10) NOT NULL,
  `fee_sac` int(10) NOT NULL,
  `fee_avail` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fdc_attended`
--

INSERT INTO `fdc_attended` (`FDC_ID`, `Fac_ID`, `Act_title`, `min_no`, `serial_no`, `period`, `od_approv`, `od_avail`, `fee_sac`, `fee_avail`) VALUES
(1, 1, 'wsn and iot', '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fdc_online_course`
--

CREATE TABLE `fdc_online_course` (
  `FDC_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Course_Name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `min_no` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `period` int(10) NOT NULL,
  `od_approv` int(10) NOT NULL,
  `od_avail` int(10) NOT NULL,
  `fee_sac` int(10) NOT NULL,
  `fee_avail` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guestlec`
--

CREATE TABLE `guestlec` (
  `p_id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `durationf` date NOT NULL,
  `durationt` date NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `organisation` text NOT NULL,
  `targetaudience` text NOT NULL,
  `attendance_path` varchar(100) NOT NULL,
  `permission_path` varchar(100) NOT NULL,
  `certificate1_path` varchar(100) NOT NULL,
  `report_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invitedlec`
--

CREATE TABLE `invitedlec` (
  `p_id` int(11) NOT NULL,
  `fac_id` int(50) NOT NULL,
  `topic` text NOT NULL,
  `durationf` date NOT NULL,
  `durationt` date NOT NULL,
  `invited` varchar(500) NOT NULL,
  `invitation_path` varchar(100) NOT NULL,
  `certificate_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iv_attended`
--

CREATE TABLE `iv_attended` (
  `id` int(11) NOT NULL,
  `f_id` varchar(255) NOT NULL,
  `ind` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `permission` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `t_from` date NOT NULL,
  `t_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iv_organized`
--

CREATE TABLE `iv_organized` (
  `id` int(11) NOT NULL,
  `f_id` varchar(255) NOT NULL,
  `ind` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `t_audience` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `t_from` date NOT NULL,
  `t_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_course_attended`
--

CREATE TABLE `online_course_attended` (
  `OC_A_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Course_Name` varchar(250) NOT NULL,
  `Date_From` date NOT NULL,
  `Date_To` date NOT NULL,
  `Organised_by` varchar(250) NOT NULL,
  `Purpose` varchar(500) NOT NULL,
  `FDC_Y_N` varchar(10) NOT NULL,
  `certificate_path` varchar(100) NOT NULL,
  `report_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_course_organised`
--

CREATE TABLE `online_course_organised` (
  `OC_O_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Course_Name` varchar(250) NOT NULL,
  `Date_From` date NOT NULL,
  `Date_To` date NOT NULL,
  `Organised_By` varchar(250) NOT NULL,
  `Purpose` varchar(500) NOT NULL,
  `Target_Audience` varchar(100) NOT NULL,
  `certificate_path` varchar(100) NOT NULL,
  `report_path` varchar(100) NOT NULL,
  `attendence_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organised`
--

CREATE TABLE `organised` (
  `A_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Act_title` varchar(500) NOT NULL,
  `Act_type` varchar(20) NOT NULL,
  `Organized_by` varchar(500) NOT NULL,
  `Resource` varchar(255) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Coordinated_by` varchar(100) NOT NULL,
  `Brochure_copy` blob NOT NULL,
  `Permission_copy` blob NOT NULL,
  `Certificate_copy` blob NOT NULL,
  `Report_copy` blob NOT NULL,
  `Brochure_path` varchar(100) NOT NULL,
  `Permission_path` varchar(100) NOT NULL,
  `Certificate_path` varchar(100) NOT NULL,
  `Report_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_review`
--

CREATE TABLE `paper_review` (
  `paper_review_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Paper_title` varchar(30) NOT NULL,
  `Paper_type` varchar(20) NOT NULL,
  `Paper_N_I` varchar(20) NOT NULL,
  `paper_category` varchar(100) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `organised_by` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `mail_letter_path` varchar(100) NOT NULL,
  `certificate_path` varchar(100) NOT NULL,
  `report_path` varchar(100) NOT NULL,
  `volume` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_review`
--

INSERT INTO `paper_review` (`paper_review_ID`, `Fac_ID`, `Paper_title`, `Paper_type`, `Paper_N_I`, `paper_category`, `Date_from`, `Date_to`, `organised_by`, `details`, `mail_letter_path`, `certificate_path`, `report_path`, `volume`) VALUES
(7, 8, 'fgh', 'conference', 'national', 'peer reviewed', '2017-11-02', '2017-11-04', 'fgh', 'fh', 'not_applicable', '', '', ''),
(8, 8, 'fgh', 'conference', 'national', 'peer reviewed', '2017-11-09', '2017-11-10', 'fgh', 'fh', 'not_applicable', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(120) NOT NULL,
  `staff_mob` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_password` varchar(255) NOT NULL,
  `staff_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attended`
--
ALTER TABLE `attended`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `Fac_ID` (`Fac_ID`);

--
-- Indexes for table `co_curricular`
--
ALTER TABLE `co_curricular`
  ADD PRIMARY KEY (`co_curricular_ID`),
  ADD KEY `F_ID` (`Fac_ID`);

--
-- Indexes for table `ex_curricular`
--
ALTER TABLE `ex_curricular`
  ADD PRIMARY KEY (`ex_curricular_ID`),
  ADD KEY `F_ID` (`Fac_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `F_ID` (`Fac_ID`);

--
-- Indexes for table `facultydetails`
--
ALTER TABLE `facultydetails`
  ADD PRIMARY KEY (`Fac_ID`);

--
-- Indexes for table `fdc`
--
ALTER TABLE `fdc`
  ADD PRIMARY KEY (`FDC_ID`),
  ADD KEY `F_ID` (`Fac_ID`);

--
-- Indexes for table `fdc_attended`
--
ALTER TABLE `fdc_attended`
  ADD PRIMARY KEY (`FDC_ID`),
  ADD KEY `Fac_ID` (`Fac_ID`);

--
-- Indexes for table `fdc_online_course`
--
ALTER TABLE `fdc_online_course`
  ADD PRIMARY KEY (`FDC_ID`),
  ADD KEY `F_ID` (`Fac_ID`);

--
-- Indexes for table `guestlec`
--
ALTER TABLE `guestlec`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `invitedlec`
--
ALTER TABLE `invitedlec`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `iv_attended`
--
ALTER TABLE `iv_attended`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iv_organized`
--
ALTER TABLE `iv_organized`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_course_attended`
--
ALTER TABLE `online_course_attended`
  ADD PRIMARY KEY (`OC_A_ID`),
  ADD KEY `fk_id` (`Fac_ID`);

--
-- Indexes for table `online_course_organised`
--
ALTER TABLE `online_course_organised`
  ADD PRIMARY KEY (`OC_O_ID`),
  ADD KEY `fk_id1` (`Fac_ID`);

--
-- Indexes for table `organised`
--
ALTER TABLE `organised`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `Fac_ID` (`Fac_ID`);

--
-- Indexes for table `paper_review`
--
ALTER TABLE `paper_review`
  ADD PRIMARY KEY (`paper_review_ID`),
  ADD KEY `Fac_ID` (`Fac_ID`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attended`
--
ALTER TABLE `attended`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `co_curricular`
--
ALTER TABLE `co_curricular`
  MODIFY `co_curricular_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `ex_curricular`
--
ALTER TABLE `ex_curricular`
  MODIFY `ex_curricular_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facultydetails`
--
ALTER TABLE `facultydetails`
  MODIFY `Fac_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fdc`
--
ALTER TABLE `fdc`
  MODIFY `FDC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fdc_attended`
--
ALTER TABLE `fdc_attended`
  MODIFY `FDC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fdc_online_course`
--
ALTER TABLE `fdc_online_course`
  MODIFY `FDC_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guestlec`
--
ALTER TABLE `guestlec`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitedlec`
--
ALTER TABLE `invitedlec`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iv_attended`
--
ALTER TABLE `iv_attended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iv_organized`
--
ALTER TABLE `iv_organized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_course_attended`
--
ALTER TABLE `online_course_attended`
  MODIFY `OC_A_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_course_organised`
--
ALTER TABLE `online_course_organised`
  MODIFY `OC_O_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organised`
--
ALTER TABLE `organised`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_review`
--
ALTER TABLE `paper_review`
  MODIFY `paper_review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `foreign key_F_ID` FOREIGN KEY (`Fac_ID`) REFERENCES `facultydetails` (`Fac_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `fdc`
--
ALTER TABLE `fdc`
  ADD CONSTRAINT `foreign key_fac id` FOREIGN KEY (`Fac_ID`) REFERENCES `facultydetails` (`Fac_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
