-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 10:25 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `t_admin` (
  `ad_id` varchar(10) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  
  `ad_username` varchar(50) NOT NULL,
  `ad_pswd` varchar(50) NOT NULL,
  `ad_eml` varchar(50) NOT NULL,
  `ad_userlevel` varchar(50) NOT NULL,
  `ad_sig` varchar(50) NOT NULL,

  PRIMARY KEY (`ad_id`)
);

INSERT INTO t_admin VALUES('AD00001','adminName','adminUID' ,'admin', 'admin@gmail.com','ADMIN');

CREATE TABLE IF NOT EXISTS `t_user_data` (
  `s_id` varchar(10) NOT NULL,
  `s_pwd` varchar(15) NOT NULL,
  `s_dob` date DEFAULT NULL,
  `s_name` varchar(45) NOT NULL,
  `s_email` varchar(45) NOT NULL,
  `s_mob` varchar(10) DEFAULT NULL,
  `s_signupdate` datetime(6) NOT NULL,
  PRIMARY KEY (`s_id`)
);

CREATE TABLE IF NOT EXISTS `t_user` (
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
  `s_genAverage` float(11) NOT NULL,

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
  `s_fbAccount` varchar(50) NOT NULL,

  PRIMARY KEY (`s_detid`),
  KEY `s_id` (`s_id`)
);

CREATE TABLE IF NOT EXISTS `t_userParentInfo` (
  `s_detid` varchar(15) NOT NULL,
  `s_id` varchar(15) NOT NULL,

  `f_fname` varchar(50) NOT NULL,
  `f_mname` varchar(50) NOT NULL,
  `f_lname` varchar(50) NOT NULL,
  `f_citizen` varchar(50) NOT NULL,
  `f_ms` varchar(50) NOT NULL,
  `f_hea` varchar(50) NOT NULL,
  `f_occ` varchar(50) NOT NULL,
  `f_inc` float NOT NULL,
  
  `m_fname` varchar(50) NOT NULL,
  `m_mname` varchar(50) NOT NULL,
  `m_lname` varchar(50) NOT NULL,
  `m_citizen` varchar(50) NOT NULL,
  `m_ms` varchar(50) NOT NULL,
  `m_hea` varchar(50) NOT NULL,
  `m_occ` varchar(50) NOT NULL,
  `m_inc` float NOT NULL,
  
  `lg_fname` varchar(50) NOT NULL,
  `lg_mname` varchar(50) NOT NULL,
  `lg_lname` varchar(50) NOT NULL,
  `lg_citizen` varchar(50) NOT NULL,
  `lg_ms` varchar(50) NOT NULL,
  `lg_hea` varchar(50) NOT NULL,
  `lg_occ` varchar(50) NOT NULL,
  `lg_inc` float NOT NULL,
  
  PRIMARY KEY (`s_detid`),
  KEY `s_id` (`s_id`)
);

CREATE TABLE IF NOT EXISTS `t_status` (
  `s_id` varchar(50) NOT NULL,
  `s_stat` varchar(45) NOT NULL,
  PRIMARY KEY `s_id` (`s_id`)
);

CREATE TABLE IF NOT EXISTS `t_userdoc` (
  `s_id` varchar(10) NOT NULL,
  `s_pic` varchar(200) NOT NULL,
  `s_goodMoral` varchar(200) NOT NULL,
  `s_birthCert` varchar(200) NOT NULL,
  `s_f137` varchar(200) NOT NULL,
  `s_PEPT` varchar(200) NOT NULL,
  `s_TOR` varchar(200) NOT NULL,
  `s_sigpic` varchar(200) NOT NULL,
  PRIMARY KEY `s_id` (`s_id`)
);

CREATE TABLE IF NOT EXISTS `t_usermark` (
  `s_id` varchar(50) NOT NULL,
  `s_intname` varchar(50) NOT NULL,
  `s_collegeOf` varchar(50) NOT NULL,
  `s_intgrade` float(5) NOT NULL,
  `s_markedBy` varchar(200) NOT NULL,
  PRIMARY KEY `s_id` (`s_id`)
);


CREATE TABLE IF NOT EXISTS `t_docinitialverify` (
  `s_id` varchar(10) NOT NULL,
  `s_documentsPassed` varchar(200) NOT NULL,
  `s_Campus` varchar(200) NOT NULL,
  `s_Day` varchar(200) NOT NULL,
  `s_checkedBy` varchar(200) NOT NULL,
  PRIMARY KEY `s_id` (`s_id`)
);

CREATE TABLE IF NOT EXISTS `t_dochardcopy` (
  `s_id` varchar(10) NOT NULL,
  `s_hcdocumentsPassed` varchar(200) NOT NULL,
  `s_eCampusCenter` varchar(200) NOT NULL,
  `s_eDay` varchar(200) NOT NULL,
  `s_eRoom` varchar(200) NOT NULL,
  `s_checkedBy` varchar(200) NOT NULL,
  PRIMARY KEY `s_id` (`s_id`)
);

CREATE TABLE IF NOT EXISTS `t_defaultschlyr` (
  
  `id` enum('1') NOT NULL,
  `sched_id` varchar(10) NOT NULL,

  `syStart` int(45) NOT NULL,
  `syEnd` int(45) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `t_schlyr` (
  `sched_id` varchar(10) NOT NULL,

  `syStart` int(45) NOT NULL,
  `syEnd` int(45) NOT NULL,
  PRIMARY KEY (`sched_id`)
);

CREATE TABLE IF NOT EXISTS `t_filling` (
  
  `fillingId` varchar(10) NOT NULL,
  `sched_id` varchar(10) NOT NULL,

  `fillingStart` date NOT NULL,
  `fillingEnd` date NOT NULL,
  PRIMARY KEY (`sched_id`)
);

CREATE TABLE IF NOT EXISTS `t_reqPassing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sched_id` varchar(45) NULL,

  `rdayNum` varchar(45) NOT NULL,
  `rdDate` date NOT NULL,
  `rappLimit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `t_ursatDay` (
  `ursat_id` varchar(45) NOT NULL,
  `sched_id` varchar(45) NOT NULL,

  `eLimit` int(45) NOT NULL,

  `eCampus` varchar(45) NOT NULL,
  `eDayNum` varchar(45) NOT NULL,
  `eDate` date NOT NULL,  
  PRIMARY KEY (`ursat_id`)
);

CREATE TABLE IF NOT EXISTS `t_ursatRoom` (
  `ursat_id` varchar(45) NOT NULL,
  `sched_id` varchar(45) NOT NULL,
  `dayNum` varchar(45) NOT NULL,

  `rLimit` int(45) NOT NULL,
  `rCourse` varchar(45) NOT NULL,

  `rRoom` varchar(45) NOT NULL,
  `rRName` varchar(45) NOT NULL,
  `rTime` varchar(45) NOT NULL,
  
  PRIMARY KEY (`ursat_id`)
);

CREATE TABLE IF NOT EXISTS `t_exam_Result` (
  `sched_id` varchar(50) NOT NULL,    
  `e_result` date NOT NULL,
  PRIMARY KEY `sched_id` (`sched_id`)
);




ALTER TABLE `t_status`
  ADD CONSTRAINT `t_status_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `t_user_data` (`s_id`);

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `t_user_data` (`s_id`);

--
-- Constraints for table `t_userdoc`
--
ALTER TABLE `t_userdoc`
  ADD CONSTRAINT `t_userdoc_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `t_user_data` (`s_id`);

--
-- Constraints for table `t_usermark`
--
ALTER TABLE `t_usermark`
  ADD CONSTRAINT `t_usermark_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `t_user_data` (`s_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
