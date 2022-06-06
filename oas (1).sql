-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 10:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oas`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `ad_id` varchar(50) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_pswd` varchar(50) NOT NULL,
  `ad_eml` varchar(50) NOT NULL,
  `ad_userlevel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`ad_id`, `ad_name`, `ad_pswd`, `ad_eml`, `ad_userlevel`) VALUES
('AD00001', 'adminName', 'admin', 'admin@gmail.com', 'ADMIN'),
('AD00002', 'staff', '8i5z0zfG', 'staff@gmail.com', 'STAFF'),
('AD00003', 'registrarName', 'fe3AmxH6', 'registrar@gmail.com', 'REGISTRAR OFFICER'),
('AD00004', 'michael', 'I7QAGPKh', 'michael@yahoo,com', 'STAFF'),
('AD00005', 'joyce', 'l68cyQda', 'joycee@gmail.com', 'REGISTRAR OFFICER'),
('AD00006', 'cent', 'tgTvANgN', 'cent@gmail.com', 'STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `t_defaultschlyr`
--

CREATE TABLE `t_defaultschlyr` (
  `id` enum('1') NOT NULL,
  `sched_id` varchar(10) NOT NULL,
  `syStart` int(45) NOT NULL,
  `syEnd` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_defaultschlyr`
--

INSERT INTO `t_defaultschlyr` (`id`, `sched_id`, `syStart`, `syEnd`) VALUES
('1', 'SCHED00003', 2020, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `t_docinitialverify`
--

CREATE TABLE `t_docinitialverify` (
  `s_id` varchar(10) NOT NULL,
  `s_documentsPassed` varchar(200) NOT NULL,
  `s_Campus` varchar(200) NOT NULL,
  `s_Day` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_docinitialverify`
--

INSERT INTO `t_docinitialverify` (`s_id`, `s_documentsPassed`, `s_Campus`, `s_Day`) VALUES
('AURS00001', 'Photo, Good Moral, Birth Certificate, Form 138, Transfer of Credentials, Transcript of Records', 'BINANGONAN CAMPUS', 'Day1'),
('AURS00002', 'Photo, Good Moral, Birth Certificate, Form 138, Transfer of Credentials, Transcript of Records', 'BINANGONAN CAMPUS', 'Day3'),
('AURS00014', 'Photo, Good Moral, Birth Certificate, Form 138, Transfer of Credentials, Transcript of Records', 'BINANGONAN CAMPUS', 'Day1'),
('AURS00016', 'Photo, Good Moral, Birth Certificate, Form 138', 'BINANGONAN CAMPUS', 'Day4'),
('AURS00017', 'Photo, Good Moral, Birth Certificate, Form 138, Transfer of Credentials, Transcript of Records', 'BINANGONAN CAMPUS', 'Day2');

-- --------------------------------------------------------

--
-- Table structure for table `t_exam_result`
--

CREATE TABLE `t_exam_result` (
  `sched_id` varchar(50) NOT NULL,
  `e_result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_filling`
--

CREATE TABLE `t_filling` (
  `fillingId` varchar(10) NOT NULL,
  `sched_id` varchar(10) NOT NULL,
  `fillingStart` date NOT NULL,
  `fillingEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_filling`
--

INSERT INTO `t_filling` (`fillingId`, `sched_id`, `fillingStart`, `fillingEnd`) VALUES
('ADMSN00001', 'SCHED00002', '2021-02-01', '2021-04-01'),
('ADMSN00002', 'SCHED00003', '2021-04-30', '2021-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `t_reqpassing`
--

CREATE TABLE `t_reqpassing` (
  `id` int(10) NOT NULL,
  `sched_id` varchar(45) DEFAULT NULL,
  `rdayNum` varchar(45) NOT NULL,
  `rdDate` date NOT NULL,
  `rappLimit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_reqpassing`
--

INSERT INTO `t_reqpassing` (`id`, `sched_id`, `rdayNum`, `rdDate`, `rappLimit`) VALUES
(1, 'SCHED00002', 'Day 1', '2021-04-01', 200),
(6, 'SCHED00002', 'Day 2', '2021-04-02', 150),
(7, 'SCHED00002', 'Day 3', '2021-04-03', 150),
(12, 'SCHED00003', 'Day1', '2021-05-01', 150),
(13, 'SCHED00003', 'Day2', '2021-05-02', 150),
(15, 'SCHED00003', 'Day3', '2021-05-04', 180),
(16, 'SCHED00003', 'Day4', '2021-05-07', 200);

-- --------------------------------------------------------

--
-- Table structure for table `t_schlyr`
--

CREATE TABLE `t_schlyr` (
  `sched_id` varchar(10) NOT NULL,
  `syStart` int(45) NOT NULL,
  `syEnd` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_schlyr`
--

INSERT INTO `t_schlyr` (`sched_id`, `syStart`, `syEnd`) VALUES
('SCHED00001', 2018, 2019),
('SCHED00002', 2019, 2020),
('SCHED00003', 2020, 2021),
('SCHED00004', 2021, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `t_status`
--

CREATE TABLE `t_status` (
  `s_id` varchar(50) NOT NULL,
  `s_stat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_status`
--

INSERT INTO `t_status` (`s_id`, `s_stat`) VALUES
('AURS00001', 'Verified'),
('AURS00002', 'Verified'),
('AURS00003', 'Applied'),
('AURS00004', 'Applied'),
('AURS00005', 'Applied'),
('AURS00006', 'Applied'),
('AURS00007', 'Archieved'),
('AURS00008', 'Archieved'),
('AURS00009', 'Applied'),
('AURS00010', 'Applied'),
('AURS00011', 'Pending'),
('AURS00012', 'Pending'),
('AURS00013', 'Applied'),
('AURS00014', 'Verified'),
('AURS00015', 'Applied'),
('AURS00016', 'Verified'),
('AURS00017', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `t_ursatday`
--

CREATE TABLE `t_ursatday` (
  `ursat_id` varchar(45) NOT NULL,
  `sched_id` varchar(45) NOT NULL,
  `eLimit` int(45) NOT NULL,
  `eCampus` varchar(45) NOT NULL,
  `eDayNum` varchar(45) NOT NULL,
  `eDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `t_ursatroom` (
  `ursat_id` varchar(45) NOT NULL,
  `sched_id` varchar(45) NOT NULL,
  `dayNum` varchar(45) NOT NULL,
  `rCourse` varchar(45) NOT NULL,
  `rRoom` varchar(45) NOT NULL,
  `rRName` varchar(45) NOT NULL,
  `rTime` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `t_user` (
  `s_detid` varchar(15) NOT NULL,
  `s_id` varchar(15) NOT NULL,
  `s_lrn` int(45) NOT NULL,
  `s_lname` varchar(50) NOT NULL,
  `s_fname` varchar(50) NOT NULL,
  `s_mname` varchar(50) NOT NULL,
  `s_gen` varchar(45) NOT NULL,
  `s_relg` varchar(45) NOT NULL,
  `s_Bday` varchar(50) NOT NULL,
  `s_Age` int(11) NOT NULL,
  `s_civilStatus` varchar(50) NOT NULL,
  `s_placeOfBirth` varchar(50) NOT NULL,
  `s_citizenShip` varchar(50) NOT NULL,
  `s_citizenShipSpecify` varchar(50) NOT NULL,
  `s_hsName` varchar(50) NOT NULL,
  `s_hsAdd` varchar(50) NOT NULL,
  `s_hsEM` varchar(50) NOT NULL,
  `s_track` varchar(50) NOT NULL,
  `s_strand` varchar(50) NOT NULL,
  `s_firstURSchoice` varchar(50) NOT NULL,
  `s_secondURSchoice` varchar(50) NOT NULL,
  `s_ifirstIC` varchar(50) NOT NULL,
  `s_isecondIC` varchar(50) NOT NULL,
  `s_iifirstIC` varchar(50) NOT NULL,
  `s_iisecondIC` varchar(50) NOT NULL,
  `s_genAverage` float NOT NULL,
  `s_facultyChild` varchar(50) NOT NULL,
  `s_parentEmpName` varchar(50) NOT NULL,
  `s_officeEmp` varchar(50) NOT NULL,
  `s_parentOfficeDesig` varchar(50) NOT NULL,
  `s_parentTelNo` int(11) NOT NULL,
  `s_selfSup` varchar(50) NOT NULL,
  `s_natureOfWork` varchar(50) NOT NULL,
  `s_workSpecify` varchar(50) NOT NULL,
  `s_houseNum` varchar(50) NOT NULL,
  `s_houseSt` varchar(50) NOT NULL,
  `s_subd` varchar(50) NOT NULL,
  `s_village` varchar(50) NOT NULL,
  `s_brgy` varchar(50) NOT NULL,
  `s_cityTown` varchar(50) NOT NULL,
  `s_province` varchar(50) NOT NULL,
  `s_postalCode` varchar(50) NOT NULL,
  `s_phoneNum` int(11) NOT NULL,
  `s_emailAddress` varchar(50) NOT NULL,
  `s_fbAccount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`s_detid`, `s_id`, `s_lrn`, `s_lname`, `s_fname`, `s_mname`, `s_gen`, `s_relg`, `s_Bday`, `s_Age`, `s_civilStatus`, `s_placeOfBirth`, `s_citizenShip`, `s_citizenShipSpecify`, `s_hsName`, `s_hsAdd`, `s_hsEM`, `s_track`, `s_strand`, `s_firstURSchoice`, `s_secondURSchoice`, `s_ifirstIC`, `s_isecondIC`, `s_iifirstIC`, `s_iisecondIC`, `s_genAverage`, `s_facultyChild`, `s_parentEmpName`, `s_officeEmp`, `s_parentOfficeDesig`, `s_parentTelNo`, `s_selfSup`, `s_natureOfWork`, `s_workSpecify`, `s_houseNum`, `s_houseSt`, `s_subd`, `s_village`, `s_brgy`, `s_cityTown`, `s_province`, `s_postalCode`, `s_phoneNum`, `s_emailAddress`, `s_fbAccount`) VALUES
('DE00000001', 'AURS00001', 2147483647, 'Styles', 'Harry', 'Swift', 'Male', 'Christian', '2021-02-09', 23, 'Single', 'Bacoor, Cavite', 'FOREIGN', 'American', 'Felix M. Sanviictores', 'Taytay, Rizal', '2021-08', 'Tech Voc', 'ict', 'ANTIPOLO CAMPUS', '(BSIS) Bachelor of Science in Information System', '(BSBA MM) Bachelor of Science in Business Administ', '(BS TM) Bachelor of Science in Tourism Management', '(BSIS) Bachelor of Science in Information System', '(BSIS) Bachelor of Science in Information System', 1.78, '', 'Liam Payne', 'URSB', 'SDS', 987710972, '', '', '', 'Blk 18 Lot 4', 'Kiwi St.', 'Ridgecrest', 'NA', 'Dolores', 'Taytay', 'Rizal', '1234', 2147483647, 'harry@gmail.com', 'harry styles'),
('DE00000002', 'AURS00002', 2147483647, 'Balatayo', 'John', 'Noel', 'Male', 'Christian', '2021-04-23', 20, 'Single', 'Angono', 'FILIPINO', 'NA', 'ACLC', 'Muzon', '2021-11', 'Tech Voc', 'ict', 'BINANGONAN CAMPUS', '(BSE FIL) Bachelor of Secondary Education Major in', '(BSIT) Bachelor of Science in Information Technolo', '(BSA) Bachelor of Science in Accountancy', '(BSBA HRM) Bachelor of Science in Business Adminis', '(BSBA HRM) Bachelor of Science in Business Adminis', 1.3, '', '', '', '', 0, '', 'Gasoline Boy/Girl', '', '12', 'Aquamarine', 'Muzon', 'NA', 'San Juan', 'Taytay', 'Rizal', '1920', 2147483647, 'johnNoel@gmail.com', 'johnNoel'),
('DE00000003', 'AURS00011', 2147483647, 'Doe', 'John', 'Smith', 'Male', 'Christian', '2021-04-01', 20, 'Single', 'Bacoor, Cavite', 'FILIPINO', 'NA', 'Felix M. Sanvictores', 'Binangonan, Rizal', '2021-08', 'Tech Voc', 'ict', 'BINANGONAN CAMPUS', 'ANGONO CAMPUS', '(BSIT) Bachelor of Science in Information Technolo', '(BSIS) Bachelor of Science in Information System', '(BFA VC)Bachelor of Fine Arts in Visual Communicat', '(BS HM)Bachelor of Science in Hospitality Manageme', 1.4, 'YES', 'Jack Doe', 'COB', 'SDS', 918279314, 'YES', 'Construction', '', 'Blk 4 Lot 8', 'Silver ST.', 'Likha', 'NA', 'Dolores', 'Angono', 'Rizal', '1234', 98293486, 'johnDoe@gmail.com', 'johnDoe'),
('DE00000004', 'AURS00012', 2147483647, 'Doe', 'Jane', 'Smith', 'Female', 'Christian', '2021-04-15', 24, 'Single', 'Binangonan', 'FILIPINO', 'NA', 'Muzon Elementary School', 'Binangonan, Rizal', '2021-11', 'Tech Voc', 'ict', 'BINANGONAN CAMPUS', '(BEED) Bachelor of Elementary Education', '(BSIT) Bachelor of Science in Information Technolo', '(BSIS) Bachelor of Science in Information System', '(BFA VC)Bachelor of Fine Arts in Visual Communicat', '(BFA VC)Bachelor of Fine Arts in Visual Communicat', 1.4, '', 'Jane Doe Sr', 'COB', 'SDS', 934521765, '', '', '', 'Blk 4 Lot 2', 'Gold St', 'Almond', 'NA', 'San Clemente', 'Angono', 'Rizal', '1234', 2147483647, 'janeDoe@gmai.com', 'Jane Doe'),
('DE00000005', 'AURS00014', 2147483647, 'Cruz', 'Juan', 'De La', 'Male', 'Christian', '2021-01-13', 21, 'Single', 'Binangonan', 'FILIPINO', 'NA', 'Felix M. Sanvictores', 'Taytay, Rizal', '2021-11', 'Tech Voc', 'ict', 'ANGONO CAMPUS', 'BINANGONAN CAMPUS', '(BFA VC)Bachelor of Fine Arts in Visual Communicat', '(BM ME)Bachelor of Science in Music Music Educatio', '(BSIT) Bachelor of Science in Information Technolo', '(BSIS) Bachelor of Science in Information System', 1.9, 'YES', 'Ramon Cruz', 'COB', 'SDS', 2147483647, 'YES', 'Other Work', 'CCA', 'Blk 1 Lot 2', 'Coral St.', 'Summerville', 'NA', 'Clemente', 'Angono', 'Rizal', '1820', 983648741, 'juanDLC@gmail.com', 'Juan Cruz'),
('DE00000006', 'AURS00016', 2147483647, 'De Leon', 'Kimberly', 'Nelle', 'Male', 'Born Again', '2021-01-08', 12, 'Married', 'Biinangonan', 'FILIPINO', 'NA', 'jsmjc', 'golden city', '2021-11', 'Academic', 'humms', 'BINANGONAN CAMPUS', 'PILILLA CAMPUS', '(BSA) Bachelor of Science in Accountancy', '(BSIS) Bachelor of Science in Information System', '(BS PSYCH) Bachelor of Science in Psychology', '(BSBA) Bachelor of Science in Business Administrat', 2.2, 'YES', 'yes child parentname', 'COB', 'SDS', 934521, '', '', '', '#63 Pisces St. Monpert Hills Subdivision', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 9324903, 'angge@gmail.com', 'student One'),
('DE00000007', 'AURS00017', 2147483647, 'b', 'b', 'b', 'Female', 'Born Again', 'b', 0, 'Single', 'b', 'FILIPINO', 'NA', 'b', 'b', '2021-08', 'Academic', 'abm', 'BINANGONAN CAMPUS', 'ANGONO CAMPUS', '(BSBA) Bachelor of Science in Business Administrat', '(BSIT) Bachelor of Science in Information Technolo', '(BA MC) Bachelor of Arts in Mass Communication', '(BFA VC)Bachelor of Fine Arts in Visual Communicat', 1.78, 'YES', 'yes child parentname', 'COB', 'SDS', 934521765, '', '', '', '1', 'st', 'subd', 'vill', 'brgy', 'ct', 'p', '1234', 983984181, 'userTwo@gmail.com', 'user t');

-- --------------------------------------------------------

--
-- Table structure for table `t_userdoc`
--

CREATE TABLE `t_userdoc` (
  `s_id` varchar(10) NOT NULL,
  `s_pic` varchar(200) NOT NULL,
  `s_goodMoral` varchar(200) NOT NULL,
  `s_birthCert` varchar(200) NOT NULL,
  `s_PEPT` varchar(200) NOT NULL,
  `s_TOR` varchar(200) NOT NULL,
  `s_f137` varchar(200) NOT NULL,
  `s_sigpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_userdoc`
--

INSERT INTO `t_userdoc` (`s_id`, `s_pic`, `s_goodMoral`, `s_birthCert`, `s_PEPT`, `s_TOR`, `s_f137`, `s_sigpic`) VALUES
('AURS00001', 'ew.jpg', 'booksbg2.jpg', 'hplogoo.png', 'nl.jpg', 'rupert-grint.jpg', 'ew.jpg', 'hplogoo.png'),
('AURS00002', 'tff.jpg', 'dr.jpg', 'ml.jpg', 'jkr.jpg', 'booksbg2.jpg', 'gww.jpg', 'logo.jpg'),
('AURS00011', 'rg.jpg', 'HPATDH_Hero_OnGrey.png', 'hpbg.jpg', 'HPATPOA_Hero_OnGrey.png', 'booksbg2.jpg', 'rupert-grint.jpg', 'logo1.png'),
('AURS00012', 'jkrowling.png', 'daniel-radcliffe.jpg', 'ew.jpg', 'booksbg.jpg', 'HPATPS_Hero_OnGrey.png', 'HPATOOTP_Hero_OnGrey.png', 'logo.jpg'),
('AURS00014', 'jkrowling.png', 'gww.jpg', 'booksbg.jpg', 'hplogoo.png', 'menu.png', 'rg.jpg', 'hdesigned.png'),
('AURS00016', 'certificate.jpg', 'HPATGOF_Hero_OnGrey.png', 'bg.jpg', 'menu.png', 'nl.jpg', 'booksbg1.png', 'beauty-and-the-beast-emma-watson-library-books.jpg'),
('AURS00017', 'bg.jpg', 'daniel-radcliffe.jpg', 'gww.jpg', 'HPATGOF_Hero_OnGrey.png', 'HPATDH_Hero_OnGrey.png', 'hplogo.png', 'jkr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_usermark`
--

CREATE TABLE `t_usermark` (
  `s_id` varchar(50) NOT NULL,
  `s_intname` varchar(50) NOT NULL,
  `s_collegeOf` varchar(50) NOT NULL,
  `s_intgrade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_usermark`
--

INSERT INTO `t_usermark` (`s_id`, `s_intname`, `s_collegeOf`, `s_intgrade`) VALUES
('AURS00001', 'Styles, Harry Swift', 'Accountancy', 1.8),
('AURS00012', 'Doe, Jane Smith', 'Accountancy', 1.9),
('AURS00014', 'Cruz, Juan De La', 'Industrial Technology', 1.8),
('AURS00016', 'De Leon, Kimberly Nelle', 'Engineering', 3),
('AURS00017', 'b, b b', 'Science', 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_userparentinfo`
--

CREATE TABLE `t_userparentinfo` (
  `s_detid` varchar(15) NOT NULL,
  `s_id` varchar(15) NOT NULL,
  `f_fname` varchar(50) NOT NULL,
  `f_mname` varchar(50) NOT NULL,
  `f_lname` varchar(50) NOT NULL,
  `f_citizen` varchar(50) NOT NULL,
  `f_ms` varchar(50) NOT NULL,
  `f_hea` varchar(50) NOT NULL,
  `f_occ` varchar(50) NOT NULL,
  `f_inc` int(11) NOT NULL,
  `m_fname` varchar(50) NOT NULL,
  `m_mname` varchar(50) NOT NULL,
  `m_lname` varchar(50) NOT NULL,
  `m_citizen` varchar(50) NOT NULL,
  `m_ms` varchar(50) NOT NULL,
  `m_hea` varchar(50) NOT NULL,
  `m_occ` varchar(50) NOT NULL,
  `m_inc` int(11) NOT NULL,
  `lg_fname` varchar(50) NOT NULL,
  `lg_mname` varchar(50) NOT NULL,
  `lg_lname` varchar(50) NOT NULL,
  `lg_citizen` varchar(50) NOT NULL,
  `lg_ms` varchar(50) NOT NULL,
  `lg_hea` varchar(50) NOT NULL,
  `lg_occ` varchar(50) NOT NULL,
  `lg_inc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_userparentinfo`
--

INSERT INTO `t_userparentinfo` (`s_detid`, `s_id`, `f_fname`, `f_mname`, `f_lname`, `f_citizen`, `f_ms`, `f_hea`, `f_occ`, `f_inc`, `m_fname`, `m_mname`, `m_lname`, `m_citizen`, `m_ms`, `m_hea`, `m_occ`, `m_inc`, `lg_fname`, `lg_mname`, `lg_lname`, `lg_citizen`, `lg_ms`, `lg_hea`, `lg_occ`, `lg_inc`) VALUES
('DE00000001', 'AURS00001', 'Zayn', 'Hadid', 'Malik', 'Filipino', 'Married', 'College', 'Singer', 0, 'Gigi', 'Hadid', 'Malik', 'American', 'Married', 'Highschool', 'Artist', 0, 'Niall', 'Tomlinson', 'Horan', 'Foreign', 'Single', 'College', 'CCA', 0),
('DE00000002', 'AURS00002', 'Nam', 'Joo', 'Hyuk', 'Filipino', 'Married', 'College', 'Lawyer', 10000, 'Lee', 'Sung', 'Joo', 'FIlipino', 'Married', 'Highschool', 'Manager', 200002, 'NA', 'NA', 'NA', 'NA', 'Single', 'NA', 'NA', 0),
('DE00000003', 'AURS00011', 'Jack', 'Smith', 'Doe', 'Filipino', 'Married', 'College', 'Businessman', 30000, 'Dane', 'Max', 'Doe', 'FIlipino', 'Married', 'Highschool', 'Call Center', 50000, 'Riza', 'Mae', 'Contawi', 'American', 'Single', 'Elementary', 'Youtuber', 45000),
('DE00000004', 'AURS00012', 'John', 'Smith', 'Doe', 'Filipino', 'Single', 'Highschool', 'Lawyer', 50000, 'Justine', 'Smith', 'Dream', 'American', 'Married', 'Grade 9', 'Doctor', 89000, 'Maureen', 'Day ', 'Smith', 'Filipino', 'Divorced', 'College', 'Nurse', 20000),
('DE00000005', 'AURS00014', 'Ramon', 'De La', 'Cruz', 'FIlipino', 'Married', 'College', 'Businessmen', 20000, 'Marites', 'De La', 'Cruz', 'American', 'Married', 'Highschool', 'Housewife', 0, 'Monaliza', 'De La ', 'Torre', 'FIlipino', 'Single', 'Elementary', 'CCA', 45000),
('DE00000006', 'AURS00016', 'a', 'a', 'a', 'a', 'Single', 'a', 'a', 123, 'a', 'a', 'a', 'a', 'Single', 'a', 'a', 456, 'a', 'a', 'a', 'a', 'Single', 'a', 'a', 789),
('DE00000007', 'AURS00017', 'r', 'r', 'r', 'r', 'Single', 'r', 'r', 123, 'm', 'm', 'm', 'm', 'Married', 'm', 'm', 324242, 'l', 'l', 'l', 'l', 'Married', 'l', 'l', 12345555);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_data`
--

CREATE TABLE `t_user_data` (
  `s_id` varchar(10) NOT NULL,
  `s_pwd` varchar(15) NOT NULL,
  `s_dob` date DEFAULT NULL,
  `s_name` varchar(45) NOT NULL,
  `s_email` varchar(45) NOT NULL,
  `s_signupdate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user_data`
--

INSERT INTO `t_user_data` (`s_id`, `s_pwd`, `s_dob`, `s_name`, `s_email`, `s_signupdate`) VALUES
('AURS00001', 'u19jy3fR', '2021-02-09', 'harryStyles', 'kimberlynelledeleon1@gmail.com', '2021-04-13 23:50:31.000000'),
('AURS00002', 'EJiSmxyF', '2021-04-23', 'JohnNoel', 'johnNoel@gmail.com', '2021-04-15 23:04:28.000000'),
('AURS00003', '9glivkQG', '2021-04-23', 'CharleneJoyce', 'cj@gmail.com', '2021-04-15 23:05:41.000000'),
('AURS00004', '$2y$10$b5X6NSHh', '2021-04-03', 'b', 'b@gmail.com', '2021-04-16 23:45:35.000000'),
('AURS00005', '$2y$10$tG0r/K67', '2021-04-09', 'kim', 'kim@gmail.com', '2021-04-16 23:54:21.000000'),
('AURS00006', '$2y$10$FDeELL.S', '2021-04-23', 'w', 'w@gmail.com', '2021-04-17 00:48:35.000000'),
('AURS00007', '$2y$10$.z9JRc9p', '2021-04-09', 'admin', 'admin@gmail.com', '2021-04-17 01:04:17.000000'),
('AURS00008', '$2y$10$R0SWsQnE', '2021-04-22', 'q', 'q@gmail.com', '2021-04-17 01:16:49.000000'),
('AURS00009', 'travis', '2020-10-09', 'travisGrei', 'travisGrei@gmail.com', '2021-04-18 14:10:04.000000'),
('AURS00010', 'john', '2021-04-29', 'johnSmith', 'johnSmith@gmail.com', '2021-04-19 00:08:57.000000'),
('AURS00011', 'john', '2021-04-01', 'johnDoe', 'jd@gmail.com', '2021-04-19 00:44:15.000000'),
('AURS00012', 'jane', '2021-04-15', 'JanetDoe', 'janeDoe@gmail.com', '2021-04-19 01:00:12.000000'),
('AURS00013', 'john', '2020-11-03', 'SirAlbito', 'neiljohn@gmail.com', '2021-04-23 20:35:25.000000'),
('AURS00014', 'juan', '2021-01-13', 'juanDeLaCruz', 'juanDLC@gmail.com', '2021-04-23 20:44:10.000000'),
('AURS00015', '123', '2016-06-14', 'Cris', 'cris@gmail.com', '2021-04-23 22:01:39.000000'),
('AURS00016', 'user', '2021-01-08', 'userOne', 'userOne@gmail.com', '2021-04-24 00:10:13.000000'),
('AURS00017', 'abc', '2020-05-05', 'userTwo', 'usertwo@gmail.com', '2021-04-24 17:05:54.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `t_defaultschlyr`
--
ALTER TABLE `t_defaultschlyr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_docinitialverify`
--
ALTER TABLE `t_docinitialverify`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `t_exam_result`
--
ALTER TABLE `t_exam_result`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `t_filling`
--
ALTER TABLE `t_filling`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `t_reqpassing`
--
ALTER TABLE `t_reqpassing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_schlyr`
--
ALTER TABLE `t_schlyr`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `t_status`
--
ALTER TABLE `t_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `t_ursatday`
--
ALTER TABLE `t_ursatday`
  ADD PRIMARY KEY (`ursat_id`);

--
-- Indexes for table `t_ursatroom`
--
ALTER TABLE `t_ursatroom`
  ADD PRIMARY KEY (`ursat_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`s_detid`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `t_userdoc`
--
ALTER TABLE `t_userdoc`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `t_usermark`
--
ALTER TABLE `t_usermark`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `t_userparentinfo`
--
ALTER TABLE `t_userparentinfo`
  ADD PRIMARY KEY (`s_detid`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `t_user_data`
--
ALTER TABLE `t_user_data`
  ADD PRIMARY KEY (`s_id`);

ALTER TABLE `t_reqpassing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;
