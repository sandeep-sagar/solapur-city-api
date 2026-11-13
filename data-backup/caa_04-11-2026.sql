-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2026 at 08:09 PM
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
-- Database: `caa`
--

-- --------------------------------------------------------

--
-- Table structure for table `apale_sarkar_complaint_cmd`
--

CREATE TABLE `apale_sarkar_complaint_cmd` (
  `as_id` int(10) NOT NULL,
  `as_state` int(10) NOT NULL,
  `as_dist` int(10) NOT NULL,
  `as_on_id` int(10) NOT NULL,
  `as_pend_last_month` int(10) NOT NULL,
  `as_comp_today` int(10) NOT NULL,
  `as_total` int(10) NOT NULL,
  `as_op_today` int(10) NOT NULL,
  `as_pend_today` int(10) NOT NULL,
  `as_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `as_createdby` int(10) NOT NULL,
  `as_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `as_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `as_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apale_sarkar_complaint_cmd`
--

INSERT INTO `apale_sarkar_complaint_cmd` (`as_id`, `as_state`, `as_dist`, `as_on_id`, `as_pend_last_month`, `as_comp_today`, `as_total`, `as_op_today`, `as_pend_today`, `as_reg_date`, `as_createdby`, `as_status`, `as_createdon`, `as_modifiedon`) VALUES
(1, 1, 3, 2, 0, 6, 6, 5, 1, '2026-02-01', 1, 'active', '2026-11-03 18:19:13', '2026-11-03 18:19:13'),
(2, 1, 3, 1, 0, 1, 1, 1, 0, '2025-02-01', 1, 'active', '2026-11-03 18:26:06', '2026-11-03 18:26:06'),
(3, 1, 3, 3, 6, 40, 46, 35, 11, '2024-01-02', 1, 'active', '2026-11-03 18:26:24', '2026-11-03 18:26:24'),
(4, 1, 3, 4, 0, 16, 16, 16, 0, '2023-02-01', 1, 'active', '2026-11-03 18:26:50', '2026-11-03 18:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `character_verification_cmd`
--

CREATE TABLE `character_verification_cmd` (
  `cv_id` int(10) NOT NULL,
  `cv_state` int(10) NOT NULL,
  `cv_dist` int(10) NOT NULL,
  `cv_ps` int(10) NOT NULL,
  `cv_rec_last_month` int(10) NOT NULL,
  `cv_pend` int(10) NOT NULL,
  `cv_total_rec_till_last_month` int(10) NOT NULL,
  `cv_total_op_till_last_month` int(10) NOT NULL,
  `cv_pend_last_ft` int(10) NOT NULL,
  `cv_pend_last_month` int(10) NOT NULL,
  `cv_per_last_month` int(10) NOT NULL,
  `cv_rec_cur_month` int(10) NOT NULL,
  `cv_op_cur_month` int(10) NOT NULL,
  `cv_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `cv_createdby` int(10) NOT NULL,
  `cv_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cv_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `cv_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `character_verification_cmd`
--

INSERT INTO `character_verification_cmd` (`cv_id`, `cv_state`, `cv_dist`, `cv_ps`, `cv_rec_last_month`, `cv_pend`, `cv_total_rec_till_last_month`, `cv_total_op_till_last_month`, `cv_pend_last_ft`, `cv_pend_last_month`, `cv_per_last_month`, `cv_rec_cur_month`, `cv_op_cur_month`, `cv_reg_date`, `cv_createdby`, `cv_status`, `cv_createdon`, `cv_modifiedon`) VALUES
(5, 1, 3, 1, 232, 232, 232, 232, 232, 23, 23, 23, 23, '2026-10-30', 1, 'active', '2026-10-30 05:19:21', '2026-10-30 05:19:21'),
(6, 1, 3, 1, 0, 0, 305, 305, 0, 0, 100, 145, 145, '2026-10-30', 1, 'active', '2026-10-30 05:31:11', '2026-10-30 05:31:11'),
(7, 1, 3, 6, 0, 0, 728, 724, 0, 0, 100, 24, 2, '2026-10-30', 1, 'active', '2026-10-30 05:31:41', '2026-10-30 05:31:41'),
(8, 1, 3, 7, 0, 0, 1166, 1166, 0, 0, 100, 43, 43, '2025-02-01', 1, 'active', '2026-10-30 05:32:12', '2026-10-30 05:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `character_verification_notified_cmd`
--

CREATE TABLE `character_verification_notified_cmd` (
  `cn_id` int(10) NOT NULL,
  `cn_name` varchar(100) NOT NULL,
  `cn_dura` varchar(100) NOT NULL,
  `cn_total_rec` int(10) NOT NULL,
  `cn_total_op` int(10) NOT NULL,
  `cn_total_pend` int(10) NOT NULL,
  `cn_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `cn_createdby` int(10) NOT NULL,
  `cn_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cn_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `cn_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `character_verification_notified_cmd`
--

INSERT INTO `character_verification_notified_cmd` (`cn_id`, `cn_name`, `cn_dura`, `cn_total_rec`, `cn_total_op`, `cn_total_pend`, `cn_reg_date`, `cn_createdby`, `cn_status`, `cn_createdon`, `cn_modifiedon`) VALUES
(1, 'निमशासकीय खाजगी संस्था इ.मध्ये नोकरी करिता वर्तणूक व चारित्रय पडताळणी प्रमाणपत्र देणे', '7 Days', 5082, 5082, 0, '2026-02-01', 1, 'active', '2026-10-30 13:17:16', '2026-10-30 13:17:16'),
(2, 'भारतीय नागरिकांना परदेशांत जाणेसाठी पोलीस परवानगी / अनुमती प्रमाणपत्र देणे (शिक्षणांसाठी, नोकरीसाठी ', '07 दिवस', 4, 4, 0, '2025-02-01', 1, 'active', '2026-10-30 13:19:46', '2026-10-30 13:19:46'),
(3, 'पोलीस क्लिअरन्स प्रमाणपत्र (ऑफलाईंन पध्दतीने)', '30 दिवस', 72, 72, 0, '2024-02-01', 1, 'active', '2026-10-30 13:20:18', '2026-10-30 13:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `complaints_application_cmd`
--

CREATE TABLE `complaints_application_cmd` (
  `ca_id` int(10) NOT NULL,
  `ca_state` int(10) NOT NULL,
  `ca_dist` int(10) NOT NULL,
  `ca_ps` int(10) NOT NULL,
  `ca_one_year` int(10) NOT NULL,
  `ca_six_month` int(10) NOT NULL,
  `ca_three_month` int(10) NOT NULL,
  `ca_less_three_month` int(10) NOT NULL,
  `ca_total` int(10) NOT NULL,
  `ca_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `ca_createdby` int(10) NOT NULL,
  `ca_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ca_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `ca_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaints_application_cmd`
--

INSERT INTO `complaints_application_cmd` (`ca_id`, `ca_state`, `ca_dist`, `ca_ps`, `ca_one_year`, `ca_six_month`, `ca_three_month`, `ca_less_three_month`, `ca_total`, `ca_reg_date`, `ca_createdby`, `ca_status`, `ca_createdon`, `ca_modifiedon`) VALUES
(1, 1, 3, 3, 121, 12, 12, 12, 157, '2026-10-30', 1, 'active', '2026-10-29 18:35:50', '2026-10-29 18:35:50'),
(2, 1, 3, 3, 0, 2, 6, 55, 63, '2026-02-01', 1, 'active', '2026-10-29 18:42:13', '2026-10-29 18:42:13'),
(3, 1, 3, 4, 0, 7, 3, 68, 78, '2025-02-01', 1, 'active', '2026-10-29 18:42:30', '2026-10-29 18:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `crime_id` int(10) NOT NULL,
  `crime_law` int(10) NOT NULL,
  `crime_section` int(10) NOT NULL,
  `crime_cr_id` int(10) NOT NULL,
  `crime_createdby` int(10) NOT NULL,
  `crime_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `crime_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `crime_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`crime_id`, `crime_law`, `crime_section`, `crime_cr_id`, `crime_createdby`, `crime_status`, `crime_createdon`, `crime_modifiedon`) VALUES
(51, 1, 1, 1, 1, 'active', '2025-12-01 18:38:59', '2025-12-01 18:38:59'),
(52, 1, 2, 1, 1, 'active', '2025-12-01 18:38:59', '2025-12-01 18:38:59'),
(53, 1, 6, 1, 1, 'active', '2025-12-01 18:38:59', '2025-12-01 18:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `crime_status`
--

CREATE TABLE `crime_status` (
  `cr_id` int(10) NOT NULL,
  `cr_name` varchar(20) NOT NULL,
  `cr_createdby` int(10) NOT NULL,
  `cr_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cr_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `cr_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime_status`
--

INSERT INTO `crime_status` (`cr_id`, `cr_name`, `cr_createdby`, `cr_status`, `cr_createdon`, `cr_modifiedon`) VALUES
(1, 'Notice', 1, 'active', '2025-11-02 06:01:12', '2025-12-01 11:58:19'),
(2, 'Warrant', 1, 'active', '2025-11-02 06:01:12', '2025-12-01 11:58:29'),
(3, 'Arrest', 1, 'active', '2025-11-02 06:01:12', '2025-12-01 11:58:38'),
(4, 'Lookout', 1, 'active', '2025-11-02 06:01:12', '2025-12-01 11:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_record`
--

CREATE TABLE `criminal_record` (
  `cr_id` int(10) NOT NULL,
  `cr_criminal_photo` varchar(100) NOT NULL,
  `cr_crime_name` varchar(100) NOT NULL,
  `cr_crime_details` varchar(100) NOT NULL,
  `cr_complaint_number` varchar(20) NOT NULL,
  `cr_crime_date` datetime NOT NULL,
  `cr_crimereg_date` datetime NOT NULL,
  `cr_crime_state` int(10) NOT NULL,
  `cr_crimes_dist` int(10) NOT NULL,
  `cr_police_station` int(10) NOT NULL,
  `cr_criminal_name` varchar(100) NOT NULL,
  `cr_criminal_dob` date NOT NULL,
  `cr_criminal_mo` varchar(20) NOT NULL,
  `cr_criminal_religion` int(10) NOT NULL,
  `cr_criminal_religion_other` varchar(100) NOT NULL,
  `cr_criminal_cast` varchar(20) NOT NULL,
  `cr_criminal_add` varchar(100) NOT NULL,
  `cr_criminal_state` int(10) NOT NULL,
  `cr_criminal_dist` int(10) NOT NULL,
  `cr_criminal_pincode` int(10) NOT NULL,
  `cr_crime_status` int(10) NOT NULL,
  `cr_crime_detect` int(10) NOT NULL,
  `cr_crime_notice` int(10) NOT NULL,
  `cr_investigator` varchar(20) NOT NULL,
  `cr_preventive_info` varchar(100) NOT NULL,
  `cr_preventive_head` int(10) NOT NULL,
  `cr_special_event_crime` int(10) NOT NULL,
  `cr_section` varchar(50) NOT NULL,
  `cr_createdby` int(10) NOT NULL,
  `cr_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cr_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `cr_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criminal_record`
--

INSERT INTO `criminal_record` (`cr_id`, `cr_criminal_photo`, `cr_crime_name`, `cr_crime_details`, `cr_complaint_number`, `cr_crime_date`, `cr_crimereg_date`, `cr_crime_state`, `cr_crimes_dist`, `cr_police_station`, `cr_criminal_name`, `cr_criminal_dob`, `cr_criminal_mo`, `cr_criminal_religion`, `cr_criminal_religion_other`, `cr_criminal_cast`, `cr_criminal_add`, `cr_criminal_state`, `cr_criminal_dist`, `cr_criminal_pincode`, `cr_crime_status`, `cr_crime_detect`, `cr_crime_notice`, `cr_investigator`, `cr_preventive_info`, `cr_preventive_head`, `cr_special_event_crime`, `cr_section`, `cr_createdby`, `cr_status`, `cr_createdon`, `cr_modifiedon`) VALUES
(1, 'criminal_photo/1233456_1.jpg##criminal_photo/1233456_7.jpg', 'Some Crime updated', 'Some One has done some extreme crime', '1233456', '2025-11-08 04:09:00', '2025-11-14 04:09:00', 1, 3, 1, 'Ajay Suresh Vaghmare', '1979-12-30', '9987654321', 4, '', 'Some Cristine Cast', 'Test Address Updated', 2, 37, 445456, 3, 2, 4, 'PSI Patli Sir', 'Some Preventive Info', 3, 1, '1_1##1_2##1_6', 1, 'active', '2025-12-01 12:11:50', '2025-12-01 18:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_record_cmd`
--

CREATE TABLE `criminal_record_cmd` (
  `cmd_id` int(10) NOT NULL,
  `cmd_name` varchar(100) NOT NULL,
  `cmd_details` varchar(100) NOT NULL,
  `cmd_complaint_number` varchar(20) NOT NULL,
  `cmd_start_date` datetime NOT NULL,
  `cmd_end_date` datetime NOT NULL,
  `cmd_place` varchar(100) NOT NULL,
  `cmd_lang` varchar(100) NOT NULL,
  `cmd_state` int(10) NOT NULL,
  `cmd_dist` int(10) NOT NULL,
  `cmd_police_station` int(10) NOT NULL,
  `cmd_type` varchar(100) NOT NULL,
  `cmd_law` varchar(100) NOT NULL,
  `cmd_arrested` int(10) NOT NULL,
  `cmd_punishment` varchar(100) NOT NULL,
  `cmd_e_saksh` varchar(100) NOT NULL,
  `cmd_history` varchar(100) NOT NULL,
  `cmd_preventive` varchar(100) NOT NULL,
  `cmd_other_serction` varchar(100) NOT NULL,
  `cmd_other_law` varchar(100) NOT NULL,
  `cmd_crimereg_date` date NOT NULL DEFAULT current_timestamp(),
  `cmd_createdby` int(10) NOT NULL,
  `cmd_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cmd_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `cmd_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_record_cmd`
--

INSERT INTO `criminal_record_cmd` (`cmd_id`, `cmd_name`, `cmd_details`, `cmd_complaint_number`, `cmd_start_date`, `cmd_end_date`, `cmd_place`, `cmd_lang`, `cmd_state`, `cmd_dist`, `cmd_police_station`, `cmd_type`, `cmd_law`, `cmd_arrested`, `cmd_punishment`, `cmd_e_saksh`, `cmd_history`, `cmd_preventive`, `cmd_other_serction`, `cmd_other_law`, `cmd_crimereg_date`, `cmd_createdby`, `cmd_status`, `cmd_createdon`, `cmd_modifiedon`) VALUES
(1, 'Crime Name', 'Crime Details', '12346657', '2026-10-27 11:28:00', '2026-10-27 12:29:00', 'Address', '454545,54664', 1, 3, 1, 'Rape', 'BNS 123', 2, '2 Days', 'Yes', 'NA', 'BNS 1211', 'BNS 121', '34', '2026-10-27', 1, 'active', '2026-10-27 16:00:59', '2026-10-27 16:00:59'),
(2, 'Crime Name', 'Crime Details', '12346657', '2026-10-27 11:28:00', '2026-10-27 12:29:00', 'Address', '454545,54664', 1, 3, 1, 'Rape', 'BNS 123', 2, '2 Days', 'Yes', 'NA', 'BNS 1211', 'BNS 121', '34', '2026-10-27', 1, 'active', '2026-10-27 16:03:58', '2026-10-27 16:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `death_record_cmd`
--

CREATE TABLE `death_record_cmd` (
  `dr_id` int(10) NOT NULL,
  `dr_state` int(10) NOT NULL,
  `dr_dist` int(10) NOT NULL,
  `dr_ps` int(10) NOT NULL,
  `dr_details` text NOT NULL,
  `dr_reason` text NOT NULL,
  `dr_gender` varchar(20) NOT NULL,
  `dr_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `dr_createdby` int(10) NOT NULL,
  `dr_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `dr_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `dr_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `death_record_cmd`
--

INSERT INTO `death_record_cmd` (`dr_id`, `dr_state`, `dr_dist`, `dr_ps`, `dr_details`, `dr_reason`, `dr_gender`, `dr_reg_date`, `dr_createdby`, `dr_status`, `dr_createdon`, `dr_modifiedon`) VALUES
(2, 1, 3, 3, 'अर्थ : \"जगी सुख नांदो. ओम पश्चिम समुद्राधीपती श्री कोकण चक्रीवर्ती श्री केसिदेवराय यांचा महाप्रधान भ', 'अर्थ : \"जगी सुख नांदो. ओम पश्चिम समुद्राधीपती श्री कोकण चक्रीवर्ती श्री केसिदेवराय यांचा महाप्रधान भ', 'female', '2026-10-27', 1, 'active', '2026-10-28 14:51:02', '2026-10-28 14:51:02'),
(3, 1, 3, 3, 'अर्थ : \"जगी सुख नांदो. ओम पश्चिम समुद्राधीपती श्री कोकण चक्रीवर्ती श्री केसिदेवराय यांचा महाप्रधान भ', 'अर्थ : \"जगी सुख नांदो. ओम पश्चिम समुद्राधीपती श्री कोकण चक्रीवर्ती श्री केसिदेवराय यांचा महाप्रधान भ', 'female', '2024-10-27', 1, 'active', '2026-10-28 14:54:26', '2026-10-28 14:54:26'),
(4, 1, 3, 2, 'मुकुंदराज मुक्तेश्वर / २८‌ / आधुनिक मराठी वाड्मयाचा इतिहास', 'मराठी भाषेत आजवर विविध विषयांवर विस्तृत लेखन प्रकाशित झाले असून, त्यातील कैक प्रकाशने जागतिक साहित्य', 'पुरूष', '2025-06-10', 1, 'active', '2026-10-28 15:58:53', '2026-10-28 15:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `detect`
--

CREATE TABLE `detect` (
  `dt_id` int(10) NOT NULL,
  `dt_name` varchar(20) NOT NULL,
  `dt_createdby` int(10) NOT NULL,
  `dt_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `dt_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `dt_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detect`
--

INSERT INTO `detect` (`dt_id`, `dt_name`, `dt_createdby`, `dt_status`, `dt_createdon`, `dt_modifiedon`) VALUES
(1, 'B Final', 1, 'active', '2025-11-27 10:46:27', '2025-11-27 10:46:27'),
(2, 'C Final', 1, 'active', '2025-11-27 10:46:27', '2025-11-27 10:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dist_id` int(10) NOT NULL,
  `dist_name` varchar(20) NOT NULL,
  `dist_state_id` int(10) NOT NULL,
  `dist_createdby` int(10) NOT NULL,
  `dist_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `dist_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `dist_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dist_id`, `dist_name`, `dist_state_id`, `dist_createdby`, `dist_status`, `dist_createdon`, `dist_modifiedon`) VALUES
(1, 'Sangli', 1, 1, 'active', '2025-11-18 11:56:34', '2025-11-18 11:56:34'),
(2, 'Satara', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(3, 'Solapur', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(4, 'Kolhapur', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(5, 'Pune', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(6, 'Akola', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(7, 'Amravati', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(8, 'Buldhana', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(9, 'Yavatmal', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(10, 'Washim', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(11, 'Aurangabad', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(12, 'Beed', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(13, 'Jalna', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(14, 'Osmanabad', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(15, 'Nanded', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(16, 'Latur', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(17, 'Parbhani', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(18, 'Hingoli', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(19, 'Bhandara', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(20, 'Chandrapur', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(21, 'Gadchiroli', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(22, 'Gondia', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(23, 'Nagpur', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(24, 'Wardha', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(25, 'Ahmednagar', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(26, 'Dhule', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(27, 'Jalgaon', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(28, 'Nandurbar', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(29, 'Nashik', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(30, 'Mumbai City', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(31, 'Mumbai Suburban', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(32, 'Thane', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(33, 'Palghar', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(34, 'Raigad', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(35, 'Ratnagiri', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(36, 'Sindhudurg', 1, 1, 'active', '2025-11-18 11:57:39', '2025-11-18 11:57:39'),
(37, 'Bagalkote', 2, 1, 'active', '2025-11-18 12:56:25', '2025-11-18 12:56:25'),
(38, 'Bengaluru Urban', 2, 1, 'active', '2025-11-18 12:57:39', '2025-11-18 12:57:39'),
(39, 'Bengaluru North', 2, 1, 'active', '2025-11-18 12:57:39', '2025-11-18 12:57:39'),
(40, 'Bengaluru North', 2, 1, 'active', '2025-11-18 12:57:39', '2025-11-18 12:57:39'),
(41, 'Bengaluru South', 2, 1, 'active', '2025-11-18 12:57:39', '2025-11-18 12:57:39'),
(42, 'Belagavi', 2, 1, 'active', '2025-11-18 12:57:39', '2025-11-18 12:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `div_id` int(10) NOT NULL,
  `div_name` varchar(100) NOT NULL,
  `div_email` varchar(100) NOT NULL,
  `div_dist_id` int(10) NOT NULL,
  `div_state_id` int(10) NOT NULL,
  `div_createdby` int(10) NOT NULL,
  `div_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `div_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `div_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_id`, `div_name`, `div_email`, `div_dist_id`, `div_state_id`, `div_createdby`, `div_status`, `div_createdon`, `div_modifiedon`) VALUES
(1, 'Division 1', 'acp.divone.solapur@mahapolice.gov.in', 3, 1, 1, 'active', '2026-10-29 03:30:43', '2026-10-29 03:30:43'),
(2, 'Division 2', 'acp.divtwo.solapur@mahapolice.gov.in', 3, 1, 1, 'active', '2026-10-29 03:31:26', '2026-10-29 03:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `jail_release_cmd`
--

CREATE TABLE `jail_release_cmd` (
  `jr_id` int(10) NOT NULL,
  `jr_state` int(10) NOT NULL,
  `jr_dist` int(10) NOT NULL,
  `jr_ps` int(10) NOT NULL,
  `jr_fir` varchar(100) NOT NULL,
  `jr_law` text NOT NULL,
  `jr_name` text NOT NULL,
  `jr_release_date` date NOT NULL,
  `jr_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `jr_createdby` int(10) NOT NULL,
  `jr_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `jr_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `jr_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jail_release_cmd`
--

INSERT INTO `jail_release_cmd` (`jr_id`, `jr_state`, `jr_dist`, `jr_ps`, `jr_fir`, `jr_law`, `jr_name`, `jr_release_date`, `jr_reg_date`, `jr_createdby`, `jr_status`, `jr_createdon`, `jr_modifiedon`) VALUES
(1, 1, 3, 1, '715/2025', 'भारतीय न्याय संहिता 2023 चे क - 309 (4),331 (4), 3 (5)', 'हरेष विजयकुमार  रामत्री  वय-32 वर्षे रा. जेवेल विस्टा बी विंग 402, हणुमान रोड, बदलापुर वेस्ट,ठाणे जि.ठाणे', '2025-11-19', '2026-10-28', 1, 'active', '2026-10-28 18:19:04', '2026-10-28 18:19:04'),
(2, 1, 3, 1, '785/2025', 'भा.न्या.सं. 118(1),115(2),352, 351(2)(3),324(4),3(5) प्रमाणे', 'चरण रावसाहेब विटकर वय-18 वर्ष रा-बत्तुल शाळेजवळ,एमआयडीसी सोलापूर मो-9156920619,8975867022', '2025-09-29', '2026-10-28', 1, 'active', '2026-10-28 18:27:20', '2026-10-28 18:27:20'),
(3, 1, 3, 7, 'गुरनं. 445/2024', 'भा.न्या.सं क 310(4), 303(2)', 'विशाल कृष्णप्पा बंडीवडीयार', '2025-04-10', '2026-10-29', 1, 'active', '2026-10-28 18:31:07', '2026-10-28 18:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `jmfc_court_cmd`
--

CREATE TABLE `jmfc_court_cmd` (
  `jm_id` int(10) NOT NULL,
  `jm_state` int(10) NOT NULL,
  `jm_dist` int(10) NOT NULL,
  `jm_ps` int(10) NOT NULL,
  `jm_closed` int(10) NOT NULL,
  `jm_prof` int(10) NOT NULL,
  `jm_release` int(10) NOT NULL,
  `jm_compromis` int(10) NOT NULL,
  `jm_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `jm_createdby` int(10) NOT NULL,
  `jm_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `jm_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `jm_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jmfc_court_cmd`
--

INSERT INTO `jmfc_court_cmd` (`jm_id`, `jm_state`, `jm_dist`, `jm_ps`, `jm_closed`, `jm_prof`, `jm_release`, `jm_compromis`, `jm_reg_date`, `jm_createdby`, `jm_status`, `jm_createdon`, `jm_modifiedon`) VALUES
(1, 1, 3, 1, 120, 70, 47, 3, '2025-09-29', 1, 'active', '2026-10-28 19:20:43', '2026-10-28 19:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `juvenile_court_cmd`
--

CREATE TABLE `juvenile_court_cmd` (
  `jv_id` int(10) NOT NULL,
  `jv_state` int(10) NOT NULL,
  `jv_dist` int(10) NOT NULL,
  `jv_ps` int(10) NOT NULL,
  `jv_closed` int(10) NOT NULL,
  `jv_prof` int(10) NOT NULL,
  `jv_release` int(10) NOT NULL,
  `jv_compromis` int(10) NOT NULL,
  `jv_per` float NOT NULL,
  `jv_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `jv_createdby` int(10) NOT NULL,
  `jv_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `jv_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `jv_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `juvenile_court_cmd`
--

INSERT INTO `juvenile_court_cmd` (`jv_id`, `jv_state`, `jv_dist`, `jv_ps`, `jv_closed`, `jv_prof`, `jv_release`, `jv_compromis`, `jv_per`, `jv_reg_date`, `jv_createdby`, `jv_status`, `jv_createdon`, `jv_modifiedon`) VALUES
(1, 1, 3, 1, 2, 0, 2, 0, 100, '2025-09-29', 1, 'active', '2026-10-28 20:03:28', '2026-10-28 20:03:28'),
(2, 1, 3, 3, 2, 0, 1, 1, 100, '2026-09-25', 1, 'active', '2026-10-28 20:04:05', '2026-10-28 20:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `law`
--

CREATE TABLE `law` (
  `law_id` int(10) NOT NULL,
  `law_name` varchar(20) NOT NULL,
  `law_short` varchar(10) NOT NULL,
  `law_createdby` int(10) NOT NULL,
  `law_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `law_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `law_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `law`
--

INSERT INTO `law` (`law_id`, `law_name`, `law_short`, `law_createdby`, `law_status`, `law_createdon`, `law_modifiedon`) VALUES
(1, 'The Indian Penal Cod', 'IPC', 1, 'active', '2025-12-01 11:39:39', '2025-12-01 11:39:39'),
(2, 'Indian Contract Act,', 'ICA', 1, 'active', '2025-12-01 11:39:39', '2025-12-01 11:39:39'),
(3, 'Indian labour law', 'ILL', 1, 'active', '2025-12-01 11:41:18', '2025-12-01 11:41:18'),
(4, 'Indian company law', '1', 1, 'active', '2025-12-01 11:41:18', '2025-12-01 11:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `missing_record_cmd`
--

CREATE TABLE `missing_record_cmd` (
  `mr_id` int(10) NOT NULL,
  `mr_state` int(10) NOT NULL,
  `mr_dist` int(10) NOT NULL,
  `mr_ps` int(10) NOT NULL,
  `mr_count` int(10) NOT NULL,
  `mr_number` varchar(20) NOT NULL,
  `mr_details` varchar(100) NOT NULL,
  `mr_officer` varchar(100) NOT NULL,
  `mr_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `mr_createdby` int(10) NOT NULL,
  `mr_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `mr_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `mr_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `missing_record_cmd`
--

INSERT INTO `missing_record_cmd` (`mr_id`, `mr_state`, `mr_dist`, `mr_ps`, `mr_count`, `mr_number`, `mr_details`, `mr_officer`, `mr_reg_date`, `mr_createdby`, `mr_status`, `mr_createdon`, `mr_modifiedon`) VALUES
(1, 1, 3, 1, 1, '123/52', 'TEst Name/24, Shivaji Nagar, Red Eys', 'XYZ Officer', '2026-10-28', 1, 'active', '2026-10-28 10:54:05', '2026-10-28 10:54:05'),
(2, 1, 3, 3, 2, '1231-56', 'Testsv / 25/ 232/ dfdfdfdfdfd', 'ABC', '2025-01-01', 1, 'active', '2026-10-28 13:15:47', '2026-10-28 13:15:47'),
(3, 1, 3, 2, 3, '2345-78', 'Some one is missing/24/Damani Nagar/ someराज्याची अधिकृत, तर गोवा राज्याची सह-अधिकृत भाषा', 'शिळेवर', '2025-02-28', 1, 'active', '2026-10-28 13:47:10', '2026-10-28 13:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(10) NOT NULL,
  `notice_name` varchar(100) NOT NULL,
  `notice_link` varchar(100) NOT NULL,
  `notice_createdby` int(10) NOT NULL,
  `notice_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `notice_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `notice_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office_name_cmd`
--

CREATE TABLE `office_name_cmd` (
  `on_id` int(10) NOT NULL,
  `on_name` varchar(100) NOT NULL,
  `on_name_mr` varchar(100) NOT NULL,
  `on_email` varchar(100) NOT NULL,
  `on_dist_id` int(10) NOT NULL,
  `on_state_id` int(10) NOT NULL,
  `on_createdby` int(10) NOT NULL,
  `on_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `on_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `on_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `office_name_cmd`
--

INSERT INTO `office_name_cmd` (`on_id`, `on_name`, `on_name_mr`, `on_email`, `on_dist_id`, `on_state_id`, `on_createdby`, `on_status`, `on_createdon`, `on_modifiedon`) VALUES
(1, 'Maha Police Dy Commissioner Headquarters', 'मा.पो.उप आयुक्त मुख्यालय', 'dcphq.cpsol@mahapolice.gov.in', 3, 1, 1, 'active', '2026-10-30 13:35:20', '2026-10-30 13:35:20'),
(2, 'Maha Police Dy Commissioner Crime', 'मा.पो.उप आयुक्त गुन्हे/विशा', 'dcp.crime.solapur@mahapolice.gov.in', 3, 1, 1, 'active', '2026-10-30 13:40:27', '2026-10-30 13:40:27'),
(3, 'Maha Police Dy Commissioner Zone', 'मा.पो.उप आयुक्त परिमंडळ', 'dcp.zone.solapur@mahapolice.gov.in', 3, 1, 1, 'active', '2026-10-30 13:40:27', '2026-10-30 13:40:27'),
(4, 'Other Police Unit', 'इतर पोलीस युनिटमध्ये अर्जं वर्ग', 'dcp.zone.solapur@mahapolice.gov.in', 3, 1, 1, 'active', '2026-10-30 13:40:27', '2026-10-30 13:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `passport_application_cmd`
--

CREATE TABLE `passport_application_cmd` (
  `pa_id` int(10) NOT NULL,
  `pa_state` int(10) NOT NULL,
  `pa_dist` int(10) NOT NULL,
  `pa_ps` int(10) NOT NULL,
  `pa_seven_days` int(10) NOT NULL,
  `pa_fifteen_days` int(10) NOT NULL,
  `pa_one_month` int(10) NOT NULL,
  `pa_total_waiting` int(10) NOT NULL,
  `pa_total_received` int(10) NOT NULL,
  `pa_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `pa_createdby` int(10) NOT NULL,
  `pa_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `pa_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `pa_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `passport_application_cmd`
--

INSERT INTO `passport_application_cmd` (`pa_id`, `pa_state`, `pa_dist`, `pa_ps`, `pa_seven_days`, `pa_fifteen_days`, `pa_one_month`, `pa_total_waiting`, `pa_total_received`, `pa_reg_date`, `pa_createdby`, `pa_status`, `pa_createdon`, `pa_modifiedon`) VALUES
(1, 1, 3, 1, 23, 1, 0, 24, 461, '2026-02-01', 1, 'active', '2026-10-30 03:29:19', '2026-10-30 03:29:19'),
(2, 1, 3, 3, 0, 0, 0, 0, 749, '2025-02-01', 1, 'active', '2026-10-30 03:32:01', '2026-10-30 03:32:01'),
(3, 1, 3, 5, 36, 14, 0, 50, 632, '2024-02-01', 1, 'active', '2026-10-30 03:32:21', '2026-10-30 03:32:21'),
(4, 1, 3, 7, 47, 0, 0, 47, 786, '2023-02-01', 1, 'active', '2026-10-30 03:32:45', '2026-10-30 03:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `pg_portal_cmd`
--

CREATE TABLE `pg_portal_cmd` (
  `pg_id` int(10) NOT NULL,
  `pg_state` int(10) NOT NULL,
  `pg_dist` int(10) NOT NULL,
  `pg_on_id` int(10) NOT NULL,
  `pg_rec_last_month` int(10) NOT NULL,
  `pg_pend` int(10) NOT NULL,
  `pg_total_rec_till_last_month` int(10) NOT NULL,
  `pg_total_op_till_last_month` int(10) NOT NULL,
  `pg_pend_last_ft` int(10) NOT NULL,
  `pg_pend_last_month` int(10) NOT NULL,
  `pg_per_last_month` int(10) NOT NULL,
  `pg_rec_cur_month` int(10) NOT NULL,
  `pg_op_cur_month` int(10) NOT NULL,
  `pg_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `pg_createdby` int(10) NOT NULL,
  `pg_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `pg_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `pg_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pg_portal_cmd`
--

INSERT INTO `pg_portal_cmd` (`pg_id`, `pg_state`, `pg_dist`, `pg_on_id`, `pg_rec_last_month`, `pg_pend`, `pg_total_rec_till_last_month`, `pg_total_op_till_last_month`, `pg_pend_last_ft`, `pg_pend_last_month`, `pg_per_last_month`, `pg_rec_cur_month`, `pg_op_cur_month`, `pg_reg_date`, `pg_createdby`, `pg_status`, `pg_createdon`, `pg_modifiedon`) VALUES
(1, 1, 3, 1, 0, 0, 3, 3, 0, 0, 100, 1, 1, '2026-02-01', 1, 'active', '2026-11-03 19:04:04', '2026-11-03 19:04:04'),
(2, 1, 3, 2, 0, 0, 4, 4, 0, 0, 100, 0, 0, '2025-02-01', 1, 'active', '2026-11-03 19:07:37', '2026-11-03 19:07:37'),
(3, 1, 3, 3, 6, 0, 39, 39, 0, 0, 100, 7, 0, '2024-02-01', 1, 'active', '2026-11-03 19:08:07', '2026-11-03 19:08:07'),
(4, 1, 3, 4, 0, 0, 6, 6, 0, 0, 100, 2, 2, '2023-02-01', 1, 'active', '2026-11-03 19:08:46', '2026-11-03 19:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `police_station`
--

CREATE TABLE `police_station` (
  `ps_id` int(10) NOT NULL,
  `ps_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ps_name_mr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ps_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ps_dist_id` int(10) NOT NULL,
  `ps_state_id` int(10) NOT NULL,
  `ps_div_id` int(10) NOT NULL,
  `ps_createdby` int(10) NOT NULL,
  `ps_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ps_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `ps_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `police_station`
--

INSERT INTO `police_station` (`ps_id`, `ps_name`, `ps_name_mr`, `ps_email`, `ps_dist_id`, `ps_state_id`, `ps_div_id`, `ps_createdby`, `ps_status`, `ps_createdon`, `ps_modifiedon`) VALUES
(1, 'Faujdar Chawadi Police Station', 'फौजदार चावडी पोलीस स्टेशन', 'ps.faujdarchawadi.cpsol@mahapolice.gov.in', 3, 1, 1, 1, 'active', '2025-11-18 13:47:13', '2026-10-29 03:37:47'),
(2, 'Jodbhavi Peth Police Station', 'जोडभावी पेठ पोलीस स्टेशन', 'ps.jodbhavi.cpsol@mahapolice.gov.in', 3, 1, 1, 1, 'active', '2025-11-18 13:49:06', '2026-10-29 03:38:07'),
(3, 'Jail Road Police Station', 'जेलरोड पोलीस स्टेशन', 'ps.jailroad.cpsol@mahapolice.gov.in', 3, 1, 1, 1, 'active', '2025-11-18 13:49:06', '2026-10-29 03:38:31'),
(4, 'M.I.D.C. Police Station', 'एम आय डी सी पोलीस स्टेशन', 'ps.midc.cpsol@mahapolice.gov.in', 3, 1, 1, 1, 'active', '2025-11-18 13:49:06', '2026-10-29 03:38:46'),
(5, 'Sadar Bazar Police Station', 'सदर बझार पोलीस स्टेशन', 'ps.sadarbazar.cpsol@mahapolice.gov.in', 3, 1, 2, 1, 'active', '2025-11-18 13:49:06', '2026-10-29 03:39:00'),
(6, 'Salgar Wasti Police Station', 'सलगर वस्ती पोलीस स्टेशन', 'ps.salgarwasti.cpsol@mahapolice.gov.in', 3, 1, 2, 1, 'active', '2025-11-18 13:49:06', '2026-10-29 03:39:19'),
(7, 'Vijapur Naka Police Station', 'विजापूर नाका पोलीस स्टेशन', 'ps.vijapurnaka.cpsol@mahapolice.gov.in', 3, 1, 2, 1, 'active', '2025-11-18 13:49:06', '2026-10-29 03:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `preventive_head`
--

CREATE TABLE `preventive_head` (
  `ph_id` int(10) NOT NULL,
  `ph_name` varchar(20) NOT NULL,
  `ph_createdby` int(10) NOT NULL,
  `ph_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ph_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `ph_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preventive_head`
--

INSERT INTO `preventive_head` (`ph_id`, `ph_name`, `ph_createdby`, `ph_status`, `ph_createdon`, `ph_modifiedon`) VALUES
(1, 'MPDA', 1, 'active', '2025-11-27 10:40:45', '2025-11-27 10:40:45'),
(2, 'MCOCA', 1, 'active', '2025-11-27 10:40:45', '2025-11-27 10:41:26'),
(3, 'Child', 1, 'active', '2025-11-27 10:41:58', '2025-11-27 10:41:58'),
(4, '141-Breach', 1, 'active', '2025-11-27 10:41:58', '2025-11-27 10:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `rl_id` int(10) NOT NULL,
  `rl_name` varchar(20) NOT NULL,
  `rl_createdby` int(10) NOT NULL,
  `rl_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `rl_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `rl_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`rl_id`, `rl_name`, `rl_createdby`, `rl_status`, `rl_createdon`, `rl_modifiedon`) VALUES
(1, 'Hinduism', 1, 'active', '2025-11-27 18:12:20', '2025-11-27 18:12:20'),
(2, 'Islam', 1, 'active', '2025-11-27 18:12:20', '2025-11-27 18:12:20'),
(3, 'Sikhism', 1, 'active', '2025-11-27 18:12:42', '2025-11-27 18:12:42'),
(4, 'Christianity', 1, 'active', '2025-11-27 18:12:42', '2025-11-27 18:12:42'),
(5, 'Buddhism', 1, 'active', '2025-11-27 18:13:07', '2025-11-27 18:13:07'),
(6, 'Jainism', 1, 'active', '2025-11-27 18:13:07', '2025-11-27 18:13:07'),
(7, 'Unaffiliated/Other', 1, 'active', '2025-11-27 18:13:44', '2025-11-27 18:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(10) NOT NULL,
  `section_no` int(10) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `section_punishment` varchar(20) NOT NULL,
  `section_cognizance` varchar(20) NOT NULL,
  `section_bail` varchar(20) NOT NULL,
  `section_triableby` varchar(20) NOT NULL,
  `section_law_id` int(10) NOT NULL,
  `section_createdby` int(10) NOT NULL,
  `section_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `section_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `section_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_no`, `section_name`, `section_punishment`, `section_cognizance`, `section_bail`, `section_triableby`, `section_law_id`, `section_createdby`, `section_status`, `section_createdon`, `section_modifiedon`) VALUES
(1, 302, 'Murder', '', '', '', '', 1, 1, 'active', '2025-12-01 11:47:10', '2025-12-01 11:47:10'),
(2, 375, 'Rape', '', '', '', '', 1, 1, 'active', '2025-12-01 11:47:31', '2025-12-01 11:47:31'),
(3, 378, 'Theft', '', '', '', '', 1, 1, 'active', '2025-12-01 11:49:31', '2025-12-01 11:49:31'),
(4, 390, 'Robbery', '', '', '', '', 1, 1, 'active', '2025-12-01 11:49:31', '2025-12-01 11:49:31'),
(5, 415, 'Cheating', '', '', '', '', 1, 1, 'active', '2025-12-01 11:49:31', '2025-12-01 11:49:31'),
(6, 120, 'Criminal Conspiracy', '', '', '', '', 1, 1, 'active', '2025-12-01 11:49:31', '2025-12-01 11:49:31'),
(7, 124, 'Sedition', '', '', '', '', 1, 1, 'active', '2025-12-01 11:49:31', '2025-12-01 11:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `ses_court_cmd`
--

CREATE TABLE `ses_court_cmd` (
  `se_id` int(10) NOT NULL,
  `se_state` int(10) NOT NULL,
  `se_dist` int(10) NOT NULL,
  `se_ps` int(10) NOT NULL,
  `se_closed` int(10) NOT NULL,
  `se_prof` int(10) NOT NULL,
  `se_release` int(10) NOT NULL,
  `se_compromis` int(10) NOT NULL,
  `se_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `se_createdby` int(10) NOT NULL,
  `se_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `se_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `se_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ses_court_cmd`
--

INSERT INTO `ses_court_cmd` (`se_id`, `se_state`, `se_dist`, `se_ps`, `se_closed`, `se_prof`, `se_release`, `se_compromis`, `se_reg_date`, `se_createdby`, `se_status`, `se_createdon`, `se_modifiedon`) VALUES
(1, 1, 3, 1, 9, 2, 7, 0, '2025-09-29', 1, 'active', '2026-10-28 19:36:57', '2026-10-28 19:36:57'),
(2, 1, 3, 4, 0, 1, 0, 1, '2025-10-09', 1, 'active', '2026-10-28 19:39:50', '2026-10-28 19:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `special_event_crime`
--

CREATE TABLE `special_event_crime` (
  `sec_id` int(10) NOT NULL,
  `sec_name` varchar(100) NOT NULL,
  `sec_createdby` int(10) NOT NULL,
  `sec_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sec_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `sec_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_event_crime`
--

INSERT INTO `special_event_crime` (`sec_id`, `sec_name`, `sec_createdby`, `sec_status`, `sec_createdon`, `sec_modifiedon`) VALUES
(1, 'All Other Eid', 1, 'active', '2025-11-27 10:17:20', '2025-11-27 10:17:20'),
(2, 'Ambedkar Jayanti', 1, 'active', '2025-11-27 10:17:20', '2025-11-27 10:17:20'),
(3, 'Bakri Eid', 1, 'active', '2025-11-27 10:17:52', '2025-11-27 10:17:52'),
(4, 'Ganpati', 1, 'active', '2025-11-27 10:17:52', '2025-11-27 10:17:52'),
(5, 'HM CR', 1, 'active', '2025-11-27 10:18:57', '2025-11-27 10:18:57'),
(6, 'Local Election', 1, 'active', '2025-11-27 10:18:57', '2025-11-27 10:18:57'),
(7, 'Mandir/Masjid Sound', 1, 'active', '2025-11-27 10:34:43', '2025-11-27 10:34:43'),
(8, 'MP MLA', 1, 'active', '2025-11-27 10:34:43', '2025-11-27 10:34:43'),
(9, 'Navratri', 1, 'active', '2025-11-27 10:35:38', '2025-11-27 10:35:38'),
(10, 'Other IMP', 1, 'active', '2025-11-27 10:35:38', '2025-11-27 10:35:38'),
(11, 'Ramdan', 1, 'active', '2025-11-27 10:36:44', '2025-11-27 10:36:44'),
(12, 'Other Jayanti', 1, 'active', '2025-11-27 10:36:44', '2025-11-27 10:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(10) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `state_createdby` int(10) NOT NULL,
  `state_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `state_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `state_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_createdby`, `state_status`, `state_createdon`, `state_modifiedon`) VALUES
(1, 'Maharashtra', 1, 'active', '2025-11-18 09:45:03', '2025-11-18 09:45:03'),
(2, 'Karnataka', 1, 'active', '2025-11-18 09:45:03', '2025-11-18 09:45:03'),
(3, 'Andhra Pradesh', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(4, 'Arunachal Pradesh', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(5, 'Assam', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(6, 'Bihar', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(7, 'Chhattisgarh', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(8, 'Goa', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(9, 'Gujarat', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(10, 'Haryana', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(11, 'Himachal Pradesh', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(12, 'Jharkhand', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(13, 'Kerala', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(14, 'Madhya Pradesh', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(15, 'Manipur', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(16, 'Meghalaya', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(17, 'Mizoram', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(18, 'Nagaland', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(19, 'Odisha', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(20, 'Punjab', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(21, 'Rajasthan', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(22, 'Sikkim', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(23, 'Tamil Nadu', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(24, 'Telangana', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(25, 'Tripura', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(26, 'Uttar Pradesh', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(27, 'Uttarakhand', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29'),
(28, 'West Bengal', 1, 'active', '2025-11-18 09:49:29', '2025-11-18 09:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `st_id` int(10) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `st_createdby` int(10) NOT NULL,
  `st_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `st_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `st_modifiedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`st_id`, `st_name`, `st_createdby`, `st_status`, `st_createdon`, `st_modifiedon`) VALUES
(1, 'In Progress', 1, 'active', '2025-11-27 10:10:20', '2025-11-27 11:39:43'),
(2, 'Completed', 1, 'active', '2025-11-27 10:10:20', '2025-11-27 10:10:20'),
(3, 'OnHold', 1, 'active', '2025-11-27 10:11:50', '2025-11-27 10:11:50'),
(4, 'Other', 1, 'active', '2025-11-27 10:11:50', '2025-11-27 10:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `summons_status_cmd`
--

CREATE TABLE `summons_status_cmd` (
  `ss_id` int(10) NOT NULL,
  `ss_state` int(10) NOT NULL,
  `ss_dist` int(10) NOT NULL,
  `ss_ps` int(10) NOT NULL,
  `ss_pre_balance` int(10) NOT NULL,
  `ss_current` int(10) NOT NULL,
  `ss_total` int(10) NOT NULL,
  `ss_summoned` int(10) NOT NULL,
  `ss_not_summoned` int(10) NOT NULL,
  `ss_post` int(10) NOT NULL,
  `ss_balance` int(10) NOT NULL,
  `ss_per` float NOT NULL,
  `ss_per_balance` float NOT NULL,
  `ss_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `ss_createdby` int(10) NOT NULL,
  `ss_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ss_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `ss_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `summons_status_cmd`
--

INSERT INTO `summons_status_cmd` (`ss_id`, `ss_state`, `ss_dist`, `ss_ps`, `ss_pre_balance`, `ss_current`, `ss_total`, `ss_summoned`, `ss_not_summoned`, `ss_post`, `ss_balance`, `ss_per`, `ss_per_balance`, `ss_reg_date`, `ss_createdby`, `ss_status`, `ss_createdon`, `ss_modifiedon`) VALUES
(1, 1, 3, 1, 20, 1631, 1651, 1402, 108, 81, 60, 84.9182, 84.3182, '2026-10-29', 1, 'active', '2026-10-29 15:00:19', '2026-10-29 15:00:19'),
(2, 1, 3, 3, 7, 326, 333, 301, 25, 0, 7, 90.39, 90.32, '2026-10-29', 1, 'active', '2026-10-29 15:06:37', '2026-10-29 15:06:37'),
(3, 1, 3, 4, 4, 414, 418, 385, 27, 3, 3, 92.11, 92.08, '2025-01-02', 1, 'active', '2026-10-29 17:20:06', '2026-10-29 17:20:06'),
(4, 1, 3, 2, 12, 1193, 1205, 969, 127, 92, 17, 80.41, 80.24, '2024-02-01', 1, 'active', '2026-10-29 17:20:48', '2026-10-29 17:20:48'),
(5, 1, 3, 5, 5, 2306, 2311, 556, 334, 249, 109, 24.06, 22.97, '2023-02-01', 1, 'active', '2026-10-29 17:23:39', '2026-10-29 17:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `warrant_status_cmd`
--

CREATE TABLE `warrant_status_cmd` (
  `ws_id` int(10) NOT NULL,
  `ws_state` int(10) NOT NULL,
  `ws_dist` int(10) NOT NULL,
  `ws_ps` int(10) NOT NULL,
  `ws_pre_balance` int(10) NOT NULL,
  `ws_current` int(10) NOT NULL,
  `ws_total` int(10) NOT NULL,
  `ws_summoned` int(10) NOT NULL,
  `ws_not_summoned` int(10) NOT NULL,
  `ws_post` int(10) NOT NULL,
  `ws_balance` int(10) NOT NULL,
  `ws_per` float NOT NULL,
  `ws_per_balance` float NOT NULL,
  `ws_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `ws_createdby` int(10) NOT NULL,
  `ws_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ws_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `ws_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warrant_status_cmd`
--

INSERT INTO `warrant_status_cmd` (`ws_id`, `ws_state`, `ws_dist`, `ws_ps`, `ws_pre_balance`, `ws_current`, `ws_total`, `ws_summoned`, `ws_not_summoned`, `ws_post`, `ws_balance`, `ws_per`, `ws_per_balance`, `ws_reg_date`, `ws_createdby`, `ws_status`, `ws_createdon`, `ws_modifiedon`) VALUES
(1, 1, 3, 1, 20, 725, 745, 571, 134, 31, 9, 76.64, 76.55, '2026-02-01', 1, 'active', '2026-10-29 17:55:29', '2026-10-29 17:55:29'),
(2, 1, 3, 3, 9, 97, 106, 77, 20, 0, 9, 72.64, 72.55, '2025-02-01', 1, 'active', '2026-10-29 17:57:02', '2026-10-29 17:57:02'),
(3, 1, 3, 4, 6, 788, 794, 457, 138, 155, 44, 57.56, 57.12, '2023-02-01', 1, 'active', '2026-10-29 17:57:39', '2026-10-29 17:57:39'),
(4, 1, 3, 2, 1, 196, 197, 180, 13, 2, 2, 91.37, 91.35, '2026-10-29', 1, 'active', '2026-10-29 18:00:28', '2026-10-29 18:00:28'),
(5, 1, 3, 5, 26, 758, 784, 477, 176, 116, 15, 60.84, 60.69, '2026-10-29', 1, 'active', '2026-10-29 18:01:15', '2026-10-29 18:01:15'),
(6, 1, 3, 7, 0, 974, 974, 557, 287, 109, 21, 57.19, 56.98, '2025-02-01', 1, 'active', '2026-10-29 18:01:46', '2026-10-29 18:01:46'),
(7, 1, 3, 6, 0, 133, 133, 86, 20, 27, 0, 64.66, 64.66, '2026-02-01', 1, 'active', '2026-10-29 18:02:51', '2026-10-29 18:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `yesterday_arrest_record_cmd`
--

CREATE TABLE `yesterday_arrest_record_cmd` (
  `yr_id` int(10) NOT NULL,
  `yr_state` int(10) NOT NULL,
  `yr_dist` int(10) NOT NULL,
  `yr_ps` int(10) NOT NULL,
  `yr_fir` varchar(100) NOT NULL,
  `yr_law` text NOT NULL,
  `yr_count` int(100) NOT NULL,
  `yr_arrest` int(100) NOT NULL,
  `yr_reg_date` date NOT NULL DEFAULT current_timestamp(),
  `yr_createdby` int(10) NOT NULL,
  `yr_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `yr_createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `yr_modifiedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yesterday_arrest_record_cmd`
--

INSERT INTO `yesterday_arrest_record_cmd` (`yr_id`, `yr_state`, `yr_dist`, `yr_ps`, `yr_fir`, `yr_law`, `yr_count`, `yr_arrest`, `yr_reg_date`, `yr_createdby`, `yr_status`, `yr_createdon`, `yr_modifiedon`) VALUES
(1, 1, 3, 1, '12121/121', 'बीएनएस 454', 1, 1, '2026-10-28', 1, 'active', '2026-10-28 16:45:32', '2026-10-28 16:45:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apale_sarkar_complaint_cmd`
--
ALTER TABLE `apale_sarkar_complaint_cmd`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `character_verification_cmd`
--
ALTER TABLE `character_verification_cmd`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `character_verification_notified_cmd`
--
ALTER TABLE `character_verification_notified_cmd`
  ADD PRIMARY KEY (`cn_id`);

--
-- Indexes for table `complaints_application_cmd`
--
ALTER TABLE `complaints_application_cmd`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `crime_status`
--
ALTER TABLE `crime_status`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `criminal_record`
--
ALTER TABLE `criminal_record`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `criminal_record_cmd`
--
ALTER TABLE `criminal_record_cmd`
  ADD PRIMARY KEY (`cmd_id`);

--
-- Indexes for table `death_record_cmd`
--
ALTER TABLE `death_record_cmd`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `detect`
--
ALTER TABLE `detect`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`div_id`);

--
-- Indexes for table `jail_release_cmd`
--
ALTER TABLE `jail_release_cmd`
  ADD PRIMARY KEY (`jr_id`);

--
-- Indexes for table `jmfc_court_cmd`
--
ALTER TABLE `jmfc_court_cmd`
  ADD PRIMARY KEY (`jm_id`);

--
-- Indexes for table `juvenile_court_cmd`
--
ALTER TABLE `juvenile_court_cmd`
  ADD PRIMARY KEY (`jv_id`);

--
-- Indexes for table `law`
--
ALTER TABLE `law`
  ADD PRIMARY KEY (`law_id`);

--
-- Indexes for table `missing_record_cmd`
--
ALTER TABLE `missing_record_cmd`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `office_name_cmd`
--
ALTER TABLE `office_name_cmd`
  ADD PRIMARY KEY (`on_id`);

--
-- Indexes for table `passport_application_cmd`
--
ALTER TABLE `passport_application_cmd`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `pg_portal_cmd`
--
ALTER TABLE `pg_portal_cmd`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `police_station`
--
ALTER TABLE `police_station`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `preventive_head`
--
ALTER TABLE `preventive_head`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`rl_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `ses_court_cmd`
--
ALTER TABLE `ses_court_cmd`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `special_event_crime`
--
ALTER TABLE `special_event_crime`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `summons_status_cmd`
--
ALTER TABLE `summons_status_cmd`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `warrant_status_cmd`
--
ALTER TABLE `warrant_status_cmd`
  ADD PRIMARY KEY (`ws_id`);

--
-- Indexes for table `yesterday_arrest_record_cmd`
--
ALTER TABLE `yesterday_arrest_record_cmd`
  ADD PRIMARY KEY (`yr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apale_sarkar_complaint_cmd`
--
ALTER TABLE `apale_sarkar_complaint_cmd`
  MODIFY `as_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `character_verification_cmd`
--
ALTER TABLE `character_verification_cmd`
  MODIFY `cv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `character_verification_notified_cmd`
--
ALTER TABLE `character_verification_notified_cmd`
  MODIFY `cn_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaints_application_cmd`
--
ALTER TABLE `complaints_application_cmd`
  MODIFY `ca_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `crime_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `crime_status`
--
ALTER TABLE `crime_status`
  MODIFY `cr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `criminal_record`
--
ALTER TABLE `criminal_record`
  MODIFY `cr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `criminal_record_cmd`
--
ALTER TABLE `criminal_record_cmd`
  MODIFY `cmd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `death_record_cmd`
--
ALTER TABLE `death_record_cmd`
  MODIFY `dr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detect`
--
ALTER TABLE `detect`
  MODIFY `dt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `div_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jail_release_cmd`
--
ALTER TABLE `jail_release_cmd`
  MODIFY `jr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jmfc_court_cmd`
--
ALTER TABLE `jmfc_court_cmd`
  MODIFY `jm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `juvenile_court_cmd`
--
ALTER TABLE `juvenile_court_cmd`
  MODIFY `jv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `law`
--
ALTER TABLE `law`
  MODIFY `law_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `missing_record_cmd`
--
ALTER TABLE `missing_record_cmd`
  MODIFY `mr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office_name_cmd`
--
ALTER TABLE `office_name_cmd`
  MODIFY `on_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passport_application_cmd`
--
ALTER TABLE `passport_application_cmd`
  MODIFY `pa_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pg_portal_cmd`
--
ALTER TABLE `pg_portal_cmd`
  MODIFY `pg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `police_station`
--
ALTER TABLE `police_station`
  MODIFY `ps_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `preventive_head`
--
ALTER TABLE `preventive_head`
  MODIFY `ph_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `rl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ses_court_cmd`
--
ALTER TABLE `ses_court_cmd`
  MODIFY `se_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `special_event_crime`
--
ALTER TABLE `special_event_crime`
  MODIFY `sec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `summons_status_cmd`
--
ALTER TABLE `summons_status_cmd`
  MODIFY `ss_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warrant_status_cmd`
--
ALTER TABLE `warrant_status_cmd`
  MODIFY `ws_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `yesterday_arrest_record_cmd`
--
ALTER TABLE `yesterday_arrest_record_cmd`
  MODIFY `yr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
