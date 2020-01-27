-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2018 at 03:03 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ofine`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_syllabus`
--

CREATE TABLE IF NOT EXISTS `academic_syllabus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_syllabus_code` longtext NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `uploader_type` longtext NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `session` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE IF NOT EXISTS `accountant` (
  `accountant_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_role_id` int(11) NOT NULL,
  `accountant_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`accountant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`accountant_id`, `name`, `account_role_id`, `accountant_number`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `authentication_key`) VALUES
(5, 'Accountant', 0, 'cda305f', '2018-08-19', 'male', 'Christianity', 'O+', '345 Federal capital road, British Columbia Institute of Technology, Toronto', '08033527716', 'accountant@account.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'PhD', 'Married', 'Abstract dynamic.docx', '4cd5edcd9aa8e3aed333a5dccda30a3b4a7eeeb7', '');

-- --------------------------------------------------------

--
-- Table structure for table `account_permission`
--

CREATE TABLE IF NOT EXISTS `account_permission` (
  `account_permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`account_permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `account_permission`
--

INSERT INTO `account_permission` (`account_permission_id`, `name`, `description`) VALUES
(8, 'All Accountants', ''),
(9, 'Manage payment', ''),
(10, 'Manage Expenses', ''),
(11, 'Accountant Loan', ''),
(12, 'All Librarian', ''),
(13, 'Manage Book', ''),
(14, 'Librarian Loan', ''),
(15, 'Hostel Managers', ''),
(16, 'Manage Hostel', ''),
(17, 'Hostel Loan', '');

-- --------------------------------------------------------

--
-- Table structure for table `account_role`
--

CREATE TABLE IF NOT EXISTS `account_role` (
  `account_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_permissions` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`account_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `account_role`
--

INSERT INTO `account_role` (`account_role_id`, `name`, `account_permissions`) VALUES
(12, 'Support Manager', '8,9,10,11,'),
(13, 'Librarian', '12,13,14,'),
(14, 'Hostel Manager', '15,16,17,');

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `parent_key` int(5) DEFAULT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`action_id`, `action_name`, `display`, `parent_name`, `parent_key`) VALUES
(145, 'dashboard', 'Dashboard', 'dashboard', 0),
(146, 'enquiry_setting', 'enquiry category', 'academics', 1),
(147, 'enquiry', 'View Enquiries', 'Academics', 1),
(148, 'parent', 'Manage parent', 'parent', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`, `authentication_key`) VALUES
(8, 'Administrator', 'admin@admin.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `adminpermission`
--

CREATE TABLE IF NOT EXISTS `adminpermission` (
  `adminPermission_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `dashboard` longtext NOT NULL,
  `enquiry_setting` longtext NOT NULL,
  `enquiry` longtext NOT NULL,
  `club` longtext NOT NULL,
  `circular` longtext NOT NULL,
  `task_manager` longtext NOT NULL,
  `help_link` longtext NOT NULL,
  `help_desk` longtext NOT NULL,
  `holiday` longtext NOT NULL,
  `todays_thought` longtext NOT NULL,
  `academic_syllabus` longtext NOT NULL,
  `teacher` longtext NOT NULL,
  `librarian` longtext NOT NULL,
  `accountant` longtext NOT NULL,
  `hostel` longtext NOT NULL,
  `hrm` longtext NOT NULL,
  `new_student` longtext NOT NULL,
  `student_information` longtext NOT NULL,
  `student_promotion` longtext NOT NULL,
  `manage_attendance` longtext NOT NULL,
  `staff_attendance` longtext NOT NULL,
  `attendance_report` longtext NOT NULL,
  `support_ticket_create` longtext NOT NULL,
  `support_ticket_view` longtext NOT NULL,
  `assignment` longtext NOT NULL,
  `study_material` longtext NOT NULL,
  `parent` longtext NOT NULL,
  `alumni` longtext NOT NULL,
  `loan_applicant` longtext NOT NULL,
  `loan_approval` longtext NOT NULL,
  `class` longtext NOT NULL,
  `section` longtext NOT NULL,
  `class_routine` longtext NOT NULL,
  `subject` longtext NOT NULL,
  `exam_list` longtext NOT NULL,
  `exam_add` longtext NOT NULL,
  `exam_view` longtext NOT NULL,
  `submit_exam` longtext NOT NULL,
  `grade` longtext NOT NULL,
  `examquestion` longtext NOT NULL,
  `marks` longtext NOT NULL,
  `exam_marks_sms` longtext NOT NULL,
  `tabulation_sheet` longtext NOT NULL,
  `income` longtext NOT NULL,
  `student_payment` longtext NOT NULL,
  `invoice_add` longtext NOT NULL,
  `list_invoice` longtext NOT NULL,
  `invoice` longtext NOT NULL,
  `department` longtext NOT NULL,
  `recruitment` longtext NOT NULL,
  `leave` longtext NOT NULL,
  `payroll` longtext NOT NULL,
  `award` longtext NOT NULL,
  `expense` longtext NOT NULL,
  `expense_category` longtext NOT NULL,
  `book` longtext NOT NULL,
  `publisher` longtext NOT NULL,
  `search_student` longtext NOT NULL,
  `book_category` longtext NOT NULL,
  `author` longtext NOT NULL,
  `request_book` longtext NOT NULL,
  `dormitory` longtext NOT NULL,
  `hostel_category` longtext NOT NULL,
  `room_type` longtext NOT NULL,
  `hostel_room` longtext NOT NULL,
  `noticeboard` longtext NOT NULL,
  `message` longtext NOT NULL,
  `transport` longtext NOT NULL,
  `transport_route` longtext NOT NULL,
  `vehicle` longtext NOT NULL,
  `system_settings` longtext NOT NULL,
  `email_settings` longtext NOT NULL,
  `backup_restore` longtext NOT NULL,
  `manage_language` longtext NOT NULL,
  `sms_settings` longtext NOT NULL,
  `smtpemailsettings` longtext NOT NULL,
  `studentReport` longtext NOT NULL,
  `expenseReport` longtext NOT NULL,
  `incomeExpense` longtext NOT NULL,
  `searchStudent` longtext NOT NULL,
  `front_end_settings` longtext NOT NULL,
  `role_managements` longtext NOT NULL,
  `manage_profile` longtext NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`adminPermission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminpermission`
--

INSERT INTO `adminpermission` (`adminPermission_id`, `admin_id`, `dashboard`, `enquiry_setting`, `enquiry`, `club`, `circular`, `task_manager`, `help_link`, `help_desk`, `holiday`, `todays_thought`, `academic_syllabus`, `teacher`, `librarian`, `accountant`, `hostel`, `hrm`, `new_student`, `student_information`, `student_promotion`, `manage_attendance`, `staff_attendance`, `attendance_report`, `support_ticket_create`, `support_ticket_view`, `assignment`, `study_material`, `parent`, `alumni`, `loan_applicant`, `loan_approval`, `class`, `section`, `class_routine`, `subject`, `exam_list`, `exam_add`, `exam_view`, `submit_exam`, `grade`, `examquestion`, `marks`, `exam_marks_sms`, `tabulation_sheet`, `income`, `student_payment`, `invoice_add`, `list_invoice`, `invoice`, `department`, `recruitment`, `leave`, `payroll`, `award`, `expense`, `expense_category`, `book`, `publisher`, `search_student`, `book_category`, `author`, `request_book`, `dormitory`, `hostel_category`, `room_type`, `hostel_room`, `noticeboard`, `message`, `transport`, `transport_route`, `vehicle`, `system_settings`, `email_settings`, `backup_restore`, `manage_language`, `sms_settings`, `smtpemailsettings`, `studentReport`, `expenseReport`, `incomeExpense`, `searchStudent`, `front_end_settings`, `role_managements`, `manage_profile`, `level`) VALUES
(1, 8, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_permission`
--

CREATE TABLE IF NOT EXISTS `admin_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `alumni_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `g_year` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `club` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `interest` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`alumni_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `name`, `sex`, `phone`, `email`, `address`, `profession`, `marital_status`, `g_year`, `club`, `interest`) VALUES
(5, 'Wale Opeyemi', 'female', '08033527716', 'segtism@gmail.com', 'THIS IS THE ADDRESS OF THE ALUMNI, IT WORTH SHARING THANKS', 'WEBSITE DESIGNER', 'SINGLE', '2012', 'SCIENCE', 'READING');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `label` varchar(10) NOT NULL DEFAULT 'A',
  `content` text NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=410 ;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_name` longtext COLLATE utf8_unicode_ci,
  `vacancy_id` int(11) DEFAULT NULL,
  `apply_date` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `applicant_name`, `vacancy_id`, `apply_date`, `status`) VALUES
(1, 'Teacing Job', 1, '1537920000', 'on_review');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `subject_id`, `description`, `file_name`, `file_type`, `class_id`, `teacher_id`, `timestamp`) VALUES
(1, 6, 'description', 'aaai-active-imitation-07.pdf', 'image', '3', 2, '2018-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL COMMENT '0 undefined , 1 present , 2  absent, 3 holiday, 4 half day, 5 late',
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `status`, `student_id`, `date`) VALUES
(1, 0, 5, '2018-10-07'),
(2, 0, 8, '2018-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `name`, `description`) VALUES
(2, 'Optimum Linkup', 'Developed by Optimum Linkup Computers. All Right Reserved (2017) ');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT,
  `award_code` longtext,
  `name` longtext,
  `gift` longtext,
  `amount` float DEFAULT NULL,
  `date` longtext,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`award_id`, `award_code`, `name`, `gift`, `amount`, `date`, `teacher_id`) VALUES
(1, '816a84f', 'Most wonderful', 'Certificate', 500, '1538006400', 2);

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
  `backup_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  PRIMARY KEY (`backup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `banar`
--

CREATE TABLE IF NOT EXISTS `banar` (
  `banar_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_text_one` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `b_text_two` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`banar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `banar`
--

INSERT INTO `banar` (`banar_id`, `b_text_one`, `b_text_two`, `file_name`) VALUES
(9, 'Enroll now and enjoy what others enjoy ! ', 'WE ARE THE BEST IN Online EDUCATION', 'banner-01.jpg'),
(10, 'We teach to become a creative thinker', 'TRY US TODAY, YOU WILL SURELY BE CONVINCE', 'banner-02.jpg'),
(11, 'We have mould lives!!!', 'LET YOUR CHILDREN ENJOY THE BENEFITS OF EDUCATION', 'banner-03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext,
  `branch` longtext,
  `account_holder_name` longtext,
  `account_number` longtext,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `name`, `branch`, `account_holder_name`, `account_number`) VALUES
(1, 'GTBANL', 'IJEBU ODE', 'OLAWUYI SEGUN O', '0199382731');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `book_category_id` int(11) NOT NULL,
  `isbn` longtext COLLATE utf8_unicode_ci NOT NULL,
  `edition` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `name`, `description`, `author_id`, `publisher_id`, `book_category_id`, `isbn`, `edition`, `subject`, `quantity`, `date`, `class_id`, `status`, `price`) VALUES
(3, 'Codeigniter', 'Science and Technology', 2, 6, 2, 'ISBN2017', '1ST', 'Prohramming(PHP)', '200', 'Fri, 03 November 2017', '4', 'available', '2000'),
(4, 'PHP', 'Developed by Optimum Linkup Computers. All Right Reserved (2017) ', 2, 6, 2, 'ISBN20172', '1ST', 'Prohramming(PHP)', '200', 'Fri, 03 November 2017', '3', 'unavailable', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `book_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`book_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `name`, `description`) VALUES
(2, 'Sciences', 'The book is under science category');

-- --------------------------------------------------------

--
-- Table structure for table `circular`
--

CREATE TABLE IF NOT EXISTS `circular` (
  `circular_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ref` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`circular_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('014effae8e9df46d1d94f275b5b170b3e510db11', '127.0.0.1', 1545225970, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232353830323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('026b17871f8c6d0dcdafcbfb9a6806afb24f7b30', '127.0.0.1', 1539252042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393235323034323b),
('05856a5b78a4b761676b0cf8b44770e2f9d96d48', '127.0.0.1', 1539376037, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393337363032323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('083c97f1ab58cef61260aab7de4514febd2b9a22', '127.0.0.1', 1545246166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234353836393b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('09363fabb46170431814f3b8f545dda7df94becb', '127.0.0.1', 1539292634, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393239323633343b),
('0b4f587d5d86d976c6063a81a3740095c6272760', '127.0.0.1', 1545315603, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331353330383b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('103958317a57a743d2b5a8cc34ffe39d0e9cd93a', '127.0.0.1', 1539196987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393139363732383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('104561c9c88440812d5aa0b51ade59da6f12a2ed', '127.0.0.1', 1545317871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331373630343b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('13a41229d3f308219c92b8557017fb34f147592d', '127.0.0.1', 1539259752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393235393733363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b666c6173685f6d6573736167657c733a31383a225375636365737366756c6c79204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('172f4e48ae8b73cc69eb00af7fe7fd41cff38168', '127.0.0.1', 1545226840, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232363631353b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('189064fbc04d115b53a53a0f8da5409ab5208921', '127.0.0.1', 1545467679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353436373338363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('19eeae8fec80292e337cfa3033a60097d0069fee', '127.0.0.1', 1539371038, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393337313033373b),
('1c9e0edbdc79902642baf0f64b3d10968ae8a4d0', '127.0.0.1', 1545315682, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331353634303b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('20e82adf55608fc8337d406c1176120398abb1ee', '127.0.0.1', 1539195713, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393139353731333b),
('22d48710687e3620b1b7ca17ef07cca7440ac534', '127.0.0.1', 1545317860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331373539363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b666c6173685f6d6573736167657c733a32333a2273746166662074656d706c6174652073656c6563746564223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('236905db7786064f0ce458c39aadf6268e6ee201', '127.0.0.1', 1539109609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130393330353b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('243e5a22218f7e16da28fef9a7b5bde6e0c30227', '127.0.0.1', 1539248722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393234383632313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b666c6173685f6d6573736167657c733a31383a225375636365737366756c6c79204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('25177db48731802faaba6668c035e57760a54c5b', '127.0.0.1', 1545316900, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331363638343b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('2a8cca34f328eaef05eb24aa0f1b3b29f974c9de', '127.0.0.1', 1545231031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353233303839323b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('2cca6e1d7090cbb21e86bd00e402c50bc20ffbc0', '127.0.0.1', 1545246895, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234363630323b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('333290d95926d41054e1dfa3a2a49f57f3f51e17', '127.0.0.1', 1539110314, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131303034323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('351ac81aadaba03a096f8e73a8aef4843a3056ab', '127.0.0.1', 1539295317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393239353331363b),
('368cbc6a6089266dc6dd822237c3ab68078dec4e', '127.0.0.1', 1545243996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234333935363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('37304994a2be8da22e7eefb3930338abfa9fc7db', '127.0.0.1', 1539205473, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393230353435363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('3b508cb61c3c24d35a0d36131a51128defdf8992', '127.0.0.1', 1539270508, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393237303235373b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('3dfc1a737f4b84b8479bc01358018f9a7be1122d', '127.0.0.1', 1545841991, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353834313638343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('3e2d26b35a30a6da5029f6ec2594c101515eeaae', '127.0.0.1', 1545226476, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232363231393b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('4670d06fdf2d8e9f7c617da3e80789f862a78fa5', '127.0.0.1', 1539109870, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130393634323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('4891c9704fadd62a29e980159dd47ff63a213775', '127.0.0.1', 1545316494, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331363231303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('4ffca16b2520847e90a4127376421b956fd68f60', '127.0.0.1', 1545467941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353436373734313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('5112e9f422c750ba8710f290fbac43ff9dc41d11', '127.0.0.1', 1545228338, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232383136393b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('51d90d253b4c502a89dfebc398ad5e0f1443a9b4', '127.0.0.1', 1539104922, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130343733313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('54e1bebf86f88ab8bf641837430811d99b82b898', '127.0.0.1', 1539116312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131363331313b),
('55f26849cfa9f449e3080cde412ad9820696ae65', '127.0.0.1', 1539376478, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393337363437373b),
('5976bfdd2cb522f11c12276840537f46ca344e7a', '127.0.0.1', 1545228582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232383435383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('5c827d44085d882f6d069e741c94280283c6320a', '127.0.0.1', 1545466926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353436363733323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('5d6705c8348303a5e8450931a2a23ccd68bd5253', '127.0.0.1', 1545229528, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232393334343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('5f8c0f3381139479886f73fce46830bd06e56f72', '127.0.0.1', 1539114205, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131333935393b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('5fe8fdd868980c04eeb1d7b391c19a70d7edb5c6', '127.0.0.1', 1539197304, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393139373330343b),
('610d9e074669a00918376332c785bca3c523f53a', '127.0.0.1', 1545142383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353134323039333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b666c6173685f6d6573736167657c733a31323a22646174612075706461746564223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('63bfba402f6ee9c8dc479127888ba61019560d13', '127.0.0.1', 1539092093, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393039323039333b),
('64ae0b66253cb786c2844ed0519a899c27893e48', '127.0.0.1', 1545216310, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353231363037343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b666c6173685f6d6573736167657c733a32343a225061796d656e742053657474696e67732055706461746564223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('65eb8b3b9d4000fd6e07a86855421ee579b2af02', '127.0.0.1', 1539273822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393237333832323b),
('6ca11f1a381e1375e22a5d729a9bcbfdd2072515', '127.0.0.1', 1539104562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130343339323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('6da3f1160d3629401b33afd681543dd21dbf423a', '127.0.0.1', 1539118180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131383134383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('6f08a60a735cadeb28e4ee25a813d5bf6aa0d7e1', '127.0.0.1', 1545227829, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232373632303b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('6f916ba080ea040268130ca43f69e5936c538f1c', '127.0.0.1', 1539294383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393239343336363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b666c6173685f6d6573736167657c733a31383a225375636365737366756c6c79204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('7093ad16c7b8c999a580d0e033a15804f4fe2308', '127.0.0.1', 1545140003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353133393832333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('713d5d2a7460b129a127790ee8e4218076f0d723', '127.0.0.1', 1545506459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353530363239313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('71a98333d9bc644af2653673c211437b27d607a4', '127.0.0.1', 1539261197, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393236313139373b),
('7287107f77b451c1c04ee5bbce20e8e9efbe5a61', '127.0.0.1', 1545245526, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234353435323b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('75f3b841b7b790e5dc4e1bea4bb6167cd102c005', '127.0.0.1', 1546181650, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363138313634393b6c6f67696e5f747970657c733a373a2274656163686572223b746561636865725f6c6f67696e7c733a313a2231223b746561636865725f69647c733a313a2234223b6c6f67696e5f757365725f69647c733a313a2234223b666c6173685f6d6573736167657c733a31383a225375636365737366756c6c79204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('7887f5d411934b7a75501c4283fa86c440cf9f74', '127.0.0.1', 1539119552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131393535313b),
('78c6281b304443f4811ec78cd5abed3e4d689393', '127.0.0.1', 1545142711, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353134323430393b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b666c6173685f6d6573736167657c733a32333a2273746166662074656d706c6174652073656c6563746564223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('7ab12afa50d039553c56fba62624ee2c2e065d78', '127.0.0.1', 1539270772, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393237303735323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('7ddee01b060c9bddddac81130b8fe5a2f17d9530', '127.0.0.1', 1545229393, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232393130313b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('8110797a1e35c2c199aae1721db97424f4042796', '127.0.0.1', 1545247716, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234373433303b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('82de774eed6ae0f85e2aa7e9def8c3141a8c45cf', '127.0.0.1', 1545229054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232383738313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('860e58b70b1449f78d3cad11fcc9f5b5f52ce83d', '127.0.0.1', 1545245430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234353239383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('869575b234f4328d6137739d403c5935b379b56b', '127.0.0.1', 1539117477, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131373231343b6c6f67696e5f747970657c733a333a2268726d223b68726d5f6c6f67696e7c733a313a2231223b68726d5f69647c733a313a2236223b6c6f67696e5f757365725f69647c733a313a2236223b),
('874dfd96e23e0c14b21694b0bd7750998e09620f', '127.0.0.1', 1539105493, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130353433343b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('88a857778c1492d8802b454d4c34c494c95da31f', '127.0.0.1', 1545506264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353530353938333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('90564cdbb82f333345419ae6650ba679c8bb2c52', '127.0.0.1', 1539373164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393337333136343b),
('929f263c83054180ef077ccecc8734f7614f3689', '127.0.0.1', 1539106003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130353932373b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('94b4d241a3ddd8dc78e327bdf31c7ab8c5e6fa9a', '127.0.0.1', 1539198764, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393139383736343b),
('954919cc97d28f69d18e0a231d3067ffa1884470', '127.0.0.1', 1545225412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232353138313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b666c6173685f6d6573736167657c733a32333a2264617461206164646564207375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('95bc92b18228aa610623d2e455120887380f389c', '127.0.0.1', 1545147472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353134373436313b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('96293b7caf1d751820c8b0db20acb5b217333d6a', '127.0.0.1', 1545315336, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331353137303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('96e53f1e4dcecd51a92e72a755ecc43a895393d8', '127.0.0.1', 1539106231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130363233303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('9cbff73e7a9681653220503a303e4439a9e2e2bb', '127.0.0.1', 1546181638, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363138313632323b6c6f67696e5f747970657c733a373a2274656163686572223b746561636865725f6c6f67696e7c733a313a2231223b746561636865725f69647c733a313a2234223b6c6f67696e5f757365725f69647c733a313a2234223b),
('addb46943c1f72aa7932def452b9bedea69d0c49', '127.0.0.1', 1545227243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232373033313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('b3ddebce920aa5a203e91ecb5619864660ebcaec', '127.0.0.1', 1545230520, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353233303236393b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('b6f9d9d1b20c5f848bf01f0928eda8d5324e766b', '127.0.0.1', 1539110360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131303335393b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('b8e471cb845c801891695f256703450f1ad95e58', '127.0.0.1', 1539115633, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131353439353b6c6f67696e5f747970657c733a373a2274656163686572223b746561636865725f6c6f67696e7c733a313a2231223b746561636865725f69647c733a313a2234223b6c6f67696e5f757365725f69647c733a313a2234223b666c6173685f6d6573736167657c733a32333a2264617461206164646564207375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('b918c68de448d68122d4bc5cb80cdf66755c564a', '127.0.0.1', 1546180979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363138303638303b6c6f67696e5f747970657c733a373a2274656163686572223b746561636865725f6c6f67696e7c733a313a2231223b746561636865725f69647c733a313a2232223b6c6f67696e5f757365725f69647c733a313a2232223b),
('baeefda8b1ab5ec96e84ab1c1401ee5ff1351514', '127.0.0.1', 1545246778, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234363737343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('bbabe6f1bd2f44a9aa28421593ad3813fb378675', '127.0.0.1', 1545316267, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331353937333b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('bbbd9acf0956d7616723a6102629257a07aa4b25', '127.0.0.1', 1545141394, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353134313338333b),
('bca9256b878e52fcf51ad563a188b45a506bb33e', '127.0.0.1', 1545139451, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353133393432383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('bec295a4df7301c9d73346dd0e4b5acf02b1cbfc', '127.0.0.1', 1539376038, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393337363033383b),
('c304dd97889eaa9e849e60678d15dbaedee5f631', '127.0.0.1', 1545317128, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331363937383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b666c6173685f6d6573736167657c733a32333a2273746166662074656d706c6174652073656c6563746564223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('c386fbf94d53501fdce99032a6a0af08453f0003', '127.0.0.1', 1539104018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393130333934363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('c412464424000dd79ff03c4442c8f5184cee8617', '127.0.0.1', 1539114515, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131343237303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('c4cd4830f9cb8f47418d24fb8a4502aa880f9697', '127.0.0.1', 1545244190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234333937303b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('cb7ba20acc76db9f45b799819682a51ed9a515a9', '127.0.0.1', 1539114936, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131343933343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('ce4ee9b29137385f58478e10bdf13e7d711ee6b6', '127.0.0.1', 1545247694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234373632393b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('cfae157b74631b0143d8bde34acede6fb7c89650', '127.0.0.1', 1545227387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232373234383b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('cfe0cea02153483efa71d11e4f0a9e5de2fc01d3', '127.0.0.1', 1545228446, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232383135303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('d3e006259a1979abfe7acf7e1b0801dd5fc7e2d8', '127.0.0.1', 1545224533, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232343435383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('d465bc81fd29ed213d096315eac285566dc6362b', '127.0.0.1', 1545466385, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353436363135343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('d7b38982204de8ac83e3345198593067a5fa8e12', '127.0.0.1', 1545467283, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353436373035343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('d813ba534df74bf26ad8f4686e25103cd2868466', '127.0.0.1', 1545141945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353134313730323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('dce6d93af17796413bcb81fea16a0d40e66f0a95', '127.0.0.1', 1545225264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232343937333b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b666c6173685f6d6573736167657c733a31383a225375636365737366756c6c79204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('ddf112ee1ab164f5caacffb87e127e54de43131f', '127.0.0.1', 1546181381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363138313133333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2238223b6c6f67696e5f757365725f69647c733a313a2238223b),
('e018a18cf51d5af2a621cde0575f72a85b9cf7dc', '127.0.0.1', 1539117624, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131373534343b6c6f67696e5f747970657c733a333a2268726d223b68726d5f6c6f67696e7c733a313a2231223b68726d5f69647c733a313a2236223b6c6f67696e5f757365725f69647c733a313a2236223b),
('e08b941593ce9faa0e881f3260d9cb767c839bcd', '127.0.0.1', 1545247206, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234373030363b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('e4366e0bce5ed1cf8d832b4771bccfa67b9c8e5c', '127.0.0.1', 1539203808, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393230333738303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('e551c00900f313f6ac3e0f7081e26c974fd09ce9', '127.0.0.1', 1545245197, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234343937303b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('e73af63ef278465a2108081dc5f4b250e21e20f4', '127.0.0.1', 1545246356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234363139363b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('e7cb393ee33a54b6d3039767b7bf0b7555c2ab5d', '127.0.0.1', 1545225424, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232353239353b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('ea4be79968ee4c0d5e7fed32a113e1cda0cdefc7', '127.0.0.1', 1539118930, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393131383733373b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('ecc37a01ddec161437a71ac29e5993be36474777', '127.0.0.1', 1545244792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353234343634343b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('edfd377661bdd99d280c7fbcdf74f37cc7d34b48', '127.0.0.1', 1545316462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353331363336333b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b),
('fa13494abe6a65d3a3f2f68eb1a1159165615dce', '127.0.0.1', 1539295013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533393239343731333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b),
('fa7ce20b9168ebe8a2c86598fcd7dfdb2f89e639', '127.0.0.1', 1545229711, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232393535343b6c6f67696e5f747970657c733a373a2273747564656e74223b73747564656e745f6c6f67696e7c733a313a2231223b73747564656e745f69647c733a313a2235223b6c6f67696e5f757365725f69647c733a313a2235223b);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `name_numeric`, `teacher_id`) VALUES
(3, 'Nursery One', 'N1', 2),
(4, 'Primary One', 'P1', 4),
(5, 'Pry Three', '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE IF NOT EXISTS `class_routine` (
  `class_routine_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `time_start` int(11) DEFAULT NULL,
  `time_end` int(11) DEFAULT NULL,
  `time_start_min` int(11) DEFAULT NULL,
  `time_end_min` int(11) DEFAULT NULL,
  `day` longtext COLLATE utf8_unicode_ci,
  `year` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`class_routine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `section_id`, `subject_id`, `time_start`, `time_end`, `time_start_min`, `time_end_min`, `day`, `year`) VALUES
(4, 3, 3, 7, 23, 12, 30, 30, 'wednesday', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `desc` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_code` longtext,
  `name` longtext,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_code`, `name`) VALUES
(1, '68e98243f7188ae', 'Teaching Staff');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext,
  `department_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `name`, `department_id`) VALUES
(1, 'Lagos', 1),
(3, 'USA', 1),
(4, 'Toronto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE IF NOT EXISTS `dormitory` (
  `dormitory_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hostel_room_id` int(11) NOT NULL,
  `hostel_category_id` int(11) NOT NULL,
  `capacity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dormitory_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_template_id`, `task`, `subject`, `body`, `instruction`) VALUES
(1, 'new_project_opening', 'New project created.', '<span>\r\n<div>Hello, [CLIENT_NAME], <br>we have created a new project with your account.<br><br>Project name : [PROJECT_NAME]<br>Please follow the link below to view status and updates of the project.<br>[PROJECT_LINK]</div></span>', ''),
(2, 'new_client_account_opening', 'Client account creation', '<span><div>Hi [CLIENT_NAME],</div></span>Your client account is created !<span>Please login to your client account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>Login credential :<br>email : [CLIENT_EMAIL]<br>password : [CLIENT_PASSWORD]', ''),
(3, 'new_staff_account_opening', 'Staff account creation', '<span>\n<div><div>Hi [STAFF_NAME],</div>Your staff account is created !&nbsp;Please login to your staff account panel here :&nbsp;<br>[SYSTEM_URL]<br>Login credential :<br>email : [STAFF_EMAIL]<br>password : [STAFF_PASSWORD]<br></div></span>', ''),
(4, 'payment_completion_notification', 'Payment completion notification', '<span>\n<div>Your payment of invoice [INVOICE_NUMBER] is completed.<br>You can review your payment history here :<br>[SYSTEM_PAYMENT_URL]</div></span>', ''),
(5, 'new_support_ticket_notify_admin', 'New support ticket notification', 'Hi [ADMIN_NAME],<br>A new support ticket is submitted. Ticket code : [TICKET_CODE]<br><br>Review all opened support tickets here :<br>[SYSTEM_OPENED_TICKET_URL]<br>', ''),
(6, 'support_ticket_assign_staff', 'Support ticket assignment notification', 'Hi [STAFF_NAME],<br>A new support ticket is assigned. Ticket code : [TICKET_CODE]<br><br>Review all opened support tickets here :<br>[SYSTEM_OPENED_TICKET_URL]', ''),
(7, 'new_message_notification', 'New message notification.', 'A new message has been sent by [SENDER_NAME].<br><br><span class="wysiwyg-color-silver">[MESSAGE]<br></span><br><span>To reply to this message, login to your account :<br></span>[SYSTEM_URL]', ''),
(8, 'password_reset_confirmation', 'Password reset notification', 'Hi [NAME],<br>Your password is reset. New password : [NEW_PASSWORD]<br>Login here with your new password :<br>[SYSTEM_URL]<br><br>You can change your password after logging in to your account.', ''),
(9, 'new_client_account_confirm', 'New Client account confirmed', '<span><div>Hi [CLIENT_NAME],</div></span>Your client account is confirmed!<span>Please login to your client account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>', ''),
(10, 'new_admin_account_creation', 'Admin Account Creation', '<span><div>Hi [ADMIN_NAME],</div></span>Your admin account is created !<span>Please login to your admin account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>Login credential :<br>email : [ADMIN_EMAIL]<br>password : [ADMIN_PASSWORD]', '');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `purpose` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `whom_to_meet` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_category`
--

CREATE TABLE IF NOT EXISTS `enquiry_category` (
  `enquirycat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `purpose` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `whom` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`enquirycat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `enquiry_category`
--

INSERT INTO `enquiry_category` (`enquirycat_id`, `category`, `purpose`, `whom`) VALUES
(1, 'Parent', 'For Admission', 'Teacher'),
(2, 'Vendors', 'Admission Enquiry', 'Principal'),
(3, 'School Staff', 'Payment Collection', 'Director'),
(4, 'Visitors', 'Student Performance', 'Administrative Office'),
(5, 'Service Man', 'Complaints by Parent', 'Reception'),
(6, 'Others', 'Student Leave Early', 'Student'),
(7, 'Book', 'Confidential', 'Registrar'),
(8, 'Payment', 'Invoice ', 'Others'),
(9, 'Event', 'Others', 'Fee Office');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE IF NOT EXISTS `enroll` (
  `enroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `from_class_id` int(11) NOT NULL,
  `to_class_id` int(11) NOT NULL,
  PRIMARY KEY (`enroll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `date`, `comment`) VALUES
(2, 'First Term Exam', '2018-08-19', 'comment');

-- --------------------------------------------------------

--
-- Table structure for table `examquestion`
--

CREATE TABLE IF NOT EXISTS `examquestion` (
  `examquestion_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext NOT NULL,
  PRIMARY KEY (`examquestion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE IF NOT EXISTS `exam_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=247 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE IF NOT EXISTS `expense_category` (
  `expense_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`expense_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`expense_category_id`, `name`) VALUES
(1, 'School Utilities.');

-- --------------------------------------------------------

--
-- Table structure for table `front_end`
--

CREATE TABLE IF NOT EXISTS `front_end` (
  `front_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`front_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `front_end`
--

INSERT INTO `front_end` (`front_id`, `type`, `description`) VALUES
(3, 'about_us', 'Our ultimate goal is our customer satisfaction to the extent to which customers are happy with the products & services provided by us. We also converts clients business ideas into new products & application for their increased productivity & efficiency of the office/ management staff. \r\n<br><br>\r\nOur ultimate goal is our customer satisfaction to the extent to which customers are happy with the products & services provided by us. We also converts clients business ideas into new products & application for their increased productivity & efficiency of the office/ management staff. '),
(4, 'vission', 'VISSION The first stage is to have you fund your wallet instantly and invest in Bank Emerald1'),
(5, 'mission', 'MISSION The first stage is to have you fund your wallet instantly and invest in Bank Emerald1'),
(6, 'goal', 'GOAL The first stage is to have you fund your wallet instantly and invest in Bank Emerald1'),
(7, 'services', 'SERVICES At Bank Emerald, our range of services are as below with description. Services we render are reliable and profitable.'),
(8, 'youtube', '<iframe width="560" height="315" src="https://www.youtube.com/embed/568gmKtpe7k" frameborder="0" allowfullscreen></iframe>'),
(9, 'news', 'Please take your time to know more about us by reading our articles/news all the time. This will enable you to know more about our activities. '),
(10, 'teacher', 'Meet our able, gallant and most competent teachers that will help your children/child to attain higher success in life. We teach to become a creative thinker and to be useful to the society.'),
(11, 'event', 'Please take your time to go through or view all our event and or activities that take place in our school. We give first hand informatino to our various students and the entire school management staff.'),
(12, 'testimonies', 'Hear what people are saying about us. You will surely be convince about our school.'),
(13, 'map', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.38305199714!2d3.4514324141631905!3d7.19706151696447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103a365ade21ec59%3A0xbd837c80b563d9e8!2sFederal+College+of+Education!5e0!3m2!1sen!2sng!4v1502022972559" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>		'),
(14, 'facebook', 'https://facebook.com/optimumlinkup'),
(15, 'twitter', 'https://twitter.com/optimumlinkup'),
(16, 'linkedin', 'https://linkedin.com/optimumlinkup'),
(17, 'instagram', 'https://pinterest.com/optimumlinkup'),
(18, 'full_about', 'Our ultimate goal is our customer satisfaction to the extent to which customers are happy with the products & services provided by us. We also converts clients business ideas into new products & application for their increased productivity & efficiency of the office/ management staff. \r\nOur ultimate goal is our customer satisfaction to the extent to which customers are happy with the products & services provided by us. We also converts clients business ideas into new products & application for their increased productivity & efficiency of the office/ management staff. '),
(19, 'footer_text', 'Meet our able, gallant and most competent teachers that will help your children/child to attain higher success in life. We teach to become a creative thinker and to be useful to the society.'),
(20, 'reg', 'Register here to get online access to your account. Hurry Short Time Offer!!!');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `justme` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `name`, `content`, `justme`, `file_name`, `date`) VALUES
(1, 'This is the end of the year party', 'This is the end of the year party. The programme was so wonderful.', 'all studio', 'team-03.jpg', '0000-00-00 00:00:00'),
(2, 'Study material for some classess', 'Thanks man', 'all landscape', 'B2B-ecommerce1.jpg', '2018-08-26'),
(3, 'sa', 'asa', 'all studio', 'a.jpg', '2018-08-19'),
(4, 'New year aniversary', 'Thanks for coming the school end of the year party. We really appreciate. You are so wonderful.', 'all landscape', 'smartmockups_j6ug4yeg.jpg', '2018-08-19'),
(5, 'dsd', 'dsd', 'all landscape', 'apart.png', '2018-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(1, 'Distinction', 'A+', 70, 100, 'Dictinction');

-- --------------------------------------------------------

--
-- Table structure for table `group_message`
--

CREATE TABLE IF NOT EXISTS `group_message` (
  `group_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_message_thread_code` longtext COLLATE utf8_unicode_ci,
  `sender` longtext COLLATE utf8_unicode_ci,
  `message` longtext COLLATE utf8_unicode_ci,
  `timestamp` longtext COLLATE utf8_unicode_ci,
  `read_status` int(11) DEFAULT NULL,
  `attached_file_name` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`group_message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_message_thread`
--

CREATE TABLE IF NOT EXISTS `group_message_thread` (
  `group_message_thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_message_thread_code` longtext COLLATE utf8_unicode_ci,
  `members` longtext COLLATE utf8_unicode_ci,
  `group_name` longtext COLLATE utf8_unicode_ci,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci,
  `created_timestamp` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`group_message_thread_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `help_link`
--

CREATE TABLE IF NOT EXISTS `help_link` (
  `helplink_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`helplink_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `help_link`
--

INSERT INTO `help_link` (`helplink_id`, `title`, `link`, `class_id`, `type`) VALUES
(4, 'New holiday class', '<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/115098447" allowfullscreen></iframe>', 3, 'vimeo');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE IF NOT EXISTS `holiday` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `holiday` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`holiday_id`, `title`, `holiday`, `date`) VALUES
(1, 'NEW PAYMENT FOR SCHOOL', 'hol', '2018-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE IF NOT EXISTS `hostel` (
  `hostel_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_role_id` int(11) NOT NULL,
  `hostel_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`hostel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `name`, `account_role_id`, `hostel_number`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `authentication_key`) VALUES
(5, 'Hostel Optimum', 0, 'cda305f', '2018-08-19', 'male', 'Christianity', 'O+', '345 Federal capital road, British Columbia Institute of Technology, Toronto', '08033527716', 'hostel@hostel.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'PhD', 'Married', 'Abstract dynamic.docx', '028cd03aef837255edc996814087d8020f5ecc92', '');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_category`
--

CREATE TABLE IF NOT EXISTS `hostel_category` (
  `hostel_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`hostel_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_room`
--

CREATE TABLE IF NOT EXISTS `hostel_room` (
  `hostel_room_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `num_bed` longtext NOT NULL,
  `cost_bed` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`hostel_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hostel_room`
--

INSERT INTO `hostel_room` (`hostel_room_id`, `name`, `room_type_id`, `num_bed`, `cost_bed`, `description`) VALUES
(1, '001', 2, '20', '1000', 'for new hostels');

-- --------------------------------------------------------

--
-- Table structure for table `hrm`
--

CREATE TABLE IF NOT EXISTS `hrm` (
  `hrm_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hrm_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`hrm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hrm`
--

INSERT INTO `hrm` (`hrm_id`, `name`, `hrm_number`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `authentication_key`) VALUES
(6, 'Mr. Omilabu D.O', 'a6c0971', '2018-08-19', 'male', 'Christianity', 'O+', '345 Federal capital road, British Columbia Institute of Technology, Toronto', '08033527716', 'hrm@hrm.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'Msc', 'Married', 'extra.docx', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount_paid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid',
  `year` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=91 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `student_id`, `title`, `description`, `amount`, `discount`, `amount_paid`, `due`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`, `year`) VALUES
(88, '92795', 5, 'Payment for jamb verification', 'Payment for jamb verification', 12000, 0, '12000', '0', 1538092800, '', '3', '', 'unpaid', '2018-2019'),
(89, '116528', 8, 'Payment for jamb verification', 'Payment for jamb verification', 12000, 0, '0', '12000', 1538092800, '', '3', '', 'unpaid', '2018-2019'),
(90, '63970', 5, 'Payment for school', 'Payment for school', 6000, 1, '0', '6000', 1545177600, '', '3', '', 'unpaid', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `keygen`
--

CREATE TABLE IF NOT EXISTS `keygen` (
  `keygen_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`keygen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `arabic` longtext COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext COLLATE utf8_unicode_ci,
  `bengali` longtext COLLATE utf8_unicode_ci,
  `korean` longtext COLLATE utf8_unicode_ci,
  `japanese` longtext COLLATE utf8_unicode_ci,
  `hindi` longtext COLLATE utf8_unicode_ci,
  `urdu` longtext COLLATE utf8_unicode_ci,
  `thai` longtext COLLATE utf8_unicode_ci,
  `italian` longtext COLLATE utf8_unicode_ci,
  `german` longtext COLLATE utf8_unicode_ci,
  `greek` longtext COLLATE utf8_unicode_ci,
  `french` longtext COLLATE utf8_unicode_ci,
  `hungarian` longtext COLLATE utf8_unicode_ci,
  `portuguese` longtext COLLATE utf8_unicode_ci,
  `turkish` longtext COLLATE utf8_unicode_ci,
  `chinese` longtext COLLATE utf8_unicode_ci,
  `russian` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`phrase_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30015 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `arabic`, `spanish`, `bengali`, `korean`, `japanese`, `hindi`, `urdu`, `thai`, `italian`, `german`, `greek`, `french`, `hungarian`, `portuguese`, `turkish`, `chinese`, `russian`) VALUES
(1, 'login', 'login', 'تسجيل الدخول', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'account_type', 'account type', 'نوع الحساب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'admin', 'admin', 'مشرف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'teacher', 'teacher', 'مدرس', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'student', 'student', 'طالب علم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'parent', 'parent', 'الأبوين', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'email', 'email', 'البريد الإلكتروني', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'password', 'password', 'كلمه السر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'forgot_password ?', 'forgot password ?', 'هل نسيت كلمة المرور ؟', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'reset_password', 'reset password', 'إعادة تعيين', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'reset', 'reset', 'إعادة تعيين', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23068, 'new_message', 'new message', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'admin_dashboard', 'admin dashboard', 'لوحة القيادة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'account', 'account', 'الحساب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'profile', 'profile', 'الملف الشخصي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'change_password', 'change password', 'تغيير كلمة السر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'logout', 'logout', 'الخروج', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'panel', 'panel', 'فريق', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'dashboard_help', 'dashboard help', 'مساعدة لوحة القيادة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'dashboard', 'dashboard', 'لوحة القيادة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'student_help', 'student help', 'مساعدة الطالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'teacher_help', 'teacher help', 'مساعدة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'subject_help', 'subject help', 'مساعدة الطالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'subject', 'subject', 'موضوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'class_help', 'class help', 'صف دراسي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27562, 'Teacher', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23067, 'manage_media', 'manage media', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'class', 'class', 'صف دراسي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'exam_help', 'exam help', 'مساعدة الامتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23069, 'librarian_name', 'librarian name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'exam', 'exam', 'امتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'marks_help', 'marks help', 'علامات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'marks-attendance', 'marks-attendance', 'علامات-الحضور', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'grade_help', 'grade help', 'درجة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'exam-grade', 'exam-grade', 'امتحان الصف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'class_routine_help', 'class routine help', 'مساعدة روتينية رفيعة المستوى', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'class_routine', 'class routine', 'روتين الطبقة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'invoice_help', 'invoice help', 'مساعدة الفاتورة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'payment', 'payment', 'دفع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'book_help', 'book help', 'كتاب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'library', 'library', 'مكتبة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'transport_help', 'transport help', 'مساعدة النقل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'dormitory_help', 'dormitory help', 'مساعدة المهجع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'dormitory', 'dormitory', 'سكن', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'noticeboard_help', 'noticeboard help', 'مساعدة نوتيسيبود', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'noticeboard-event', 'noticeboard-event', 'اللافتة الحدث', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'bed_ward_help', 'bed ward help', 'سرير وارد مساعدة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'settings', 'settings', 'اعدادات النظام', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'backup_restore', 'backup restore', 'اسنرجاع البيانات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'profile_help', 'profile help', 'الملف الشخصي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'manage_student', 'manage student', 'إدارة الطالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'manage_teacher', 'manage teacher', 'إدارة المعلم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'noticeboard', 'noticeboard', 'لوح الإعلانات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'language', 'language', 'لغة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'backup', 'backup', 'دعم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'calendar_schedule', 'calendar schedule', 'جدول التقويم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'select_a_class', 'select a class', 'حدد فئة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'student_list', 'student list', 'قائمة الطلاب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'add_student', 'add student', 'إضافة طالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'roll', 'roll', 'تدحرج', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'photo', 'photo', 'صورة فوتوغرافية', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'student_name', 'student name', 'أسم الطالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'address', 'address', 'عنوان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'options', 'options', 'خيارات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'marksheet', 'marksheet', 'وضع علامة على الورقة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23065, 'account_settings', 'account settings', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'edit', 'edit', 'تصحيح', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'delete', 'delete', 'حذف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'personal_profile', 'personal profile', 'الملف الشخصي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'academic_result', 'academic result', 'نتيجة أكادمية', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'name', 'name', 'اسم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'birthday', 'birthday', 'عيد الميلاد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'sex', 'sex', 'جنس', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'male', 'male', 'الذكر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'female', 'female', 'إناثا', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'religion', 'religion', 'دين', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'blood_group', 'blood group', 'فصيلة الدم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'phone', 'phone', 'هاتف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'father_name', 'father name', 'اسم الأب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'mother_name', 'mother name', 'اسم الأم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'edit_student', 'edit student', 'تحرير الطالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23066, 'academics', 'academics', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'teacher_list', 'teacher list', 'قائمة المعلمين', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'add_teacher', 'add teacher', 'إضافة معلم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'teacher_name', 'teacher name', 'اسم المعلم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'edit_teacher', 'edit teacher', 'تحرير المعلم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'manage_parent', 'manage parent', 'إدارة الأم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'parent_list', 'parent list', 'قائمة الوالدين', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'parent_name', 'parent name', 'اسم الوالدين', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'relation_with_student', 'relation with student', 'العلاقة مع الطالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'parent_email', 'parent email', 'البريد الإلكتروني الأم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'parent_phone', 'parent phone', 'الهاتف الأم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'parrent_address', 'parrent address', 'عنوان بارنت', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'parrent_occupation', 'parrent occupation', 'الاحتلال الأم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'add', 'add', 'إضافة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'parent_of', 'parent of', 'إدارة الموضوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'profession', 'profession', 'مهنة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'edit_parent', 'edit parent', 'تحرير الأم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'add_parent', 'add parent', 'إضافة الوالد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'manage_subject', 'manage subject', 'إدارة الموضوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'subject_list', 'subject list', 'قائمة المواضيع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'add_subject', 'add subject', 'إضافة الموضوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'subject_name', 'subject name', 'اسم الموضوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'edit_subject', 'edit subject', 'تحرير الموضوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'manage_class', 'manage class', 'إدارة الصف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'class_list', 'class list', 'قائمة الطبقة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'add_class', 'add class', 'إضافة فئة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'class_name', 'class name', 'اسم الفئة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'numeric_name', 'numeric name', 'اسم رقمي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'name_numeric', 'name numeric', 'اسم رقمي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'edit_class', 'edit class', 'تحرير الطبقة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'manage_exam', 'manage exam', 'إدارة الامتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'exam_list', 'exam list', 'قائمة الامتحانات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'add_exam', 'add exam', 'إضافة امتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'exam_name', 'exam name', 'اسم الامتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'date', 'date', 'تاريخ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'comment', 'comment', 'تعليق', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'edit_exam', 'edit exam', 'تحرير الامتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'manage_exam_marks', 'manage exam marks', 'إدارة علامات الامتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'manage_marks', 'manage marks', 'إدارة العلامات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'select_exam', 'select exam', 'حدد الامتحان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'select_class', 'select class', 'حدد الفئة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'select_subject', 'select subject', 'حدد الموضوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'select_an_exam', 'select an exam', 'حدد امتحانا', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'mark_obtained', 'mark obtained', 'علامة تم الحصول عليها', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'attendance', 'attendance', 'الحضور', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'manage_grade', 'manage grade', 'إدارة الصف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'grade_list', 'grade list', 'الصف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'add_grade', 'add grade', 'إضافة الصف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'grade_name', 'grade name', 'اسم الصف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'grade_point', 'grade point', 'تراكمي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'mark_from', 'mark from', 'علامة من', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'mark_upto', 'mark upto', 'علامة تصل إلى', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'edit_grade', 'edit grade', 'تحرير الصف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'manage_class_routine', 'manage class routine', 'إدارة روتين الطبقة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'class_routine_list', 'class routine list', 'قائمة روتينية رفيعة المستوى', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'add_class_routine', 'add class routine', 'إضافة روتين الطبقة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19768, 'add_new_parent', 'add new parent', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19766, 'all_parents', 'all parents', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'day', 'day', 'يوم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'starting_time', 'starting time', 'وقت البدء', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'ending_time', 'ending time', 'نهاية الوقت', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19757, 'add_new_student', 'add new student', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'edit_class_routine', 'edit class routine', 'تحرير الطبقة الروتينية', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19751, 'value_required', 'value required', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19750, 'session_name', 'session name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19749, 'add_session', 'add session', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'manage_invoice/payment', 'manage invoice/payment', 'إدارة الفاتورة / الدفع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19748, 'session_list', 'session list', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'invoice/payment_list', 'invoice/payment list', 'الفاتورة / قائمة الدفع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'add_invoice/payment', 'add invoice/payment', 'إضافة الفاتورة / الدفع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'title', 'title', 'عنوان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'amount', 'amount', 'كمية', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'view_invoice', 'view invoice', 'عرض الفاتورة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'paid', 'paid', 'دفع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'unpaid', 'unpaid', 'غير مدفوع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'add_invoice', 'add invoice', 'إضافة الفاتورة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'payment_to', 'payment to', 'دفع ل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'bill_to', 'bill to', 'فاتورة الى', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'invoice_title', 'invoice title', 'عنوان الفاتورة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'invoice_id', 'invoice id', 'هوية صوتية', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'edit_invoice', 'edit invoice', 'تحرير الفاتورة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'manage_library_books', 'manage library books', 'فاتورة الى', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'book_list', 'book list', 'قائمة الكتب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'add_book', 'add book', 'إضافة كتاب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'book_name', 'book name', 'اسم الكتاب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'author', 'author', 'مؤلف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'price', 'price', 'السعر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'available', 'available', 'متاح', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'unavailable', 'unavailable', 'غير متوفره', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'edit_book', 'edit book', 'تحرير الكتاب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'manage_transport', 'manage transport', 'السعر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'transport_list', 'transport list', 'قائمة النقل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'add_transport', 'add transport', 'إضافة النقل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'route_name', 'route name', 'اسم المسار', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'number_of_vehicle', 'number of vehicle', 'عدد المركبات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'route_fare', 'route fare', 'الطريق الأجرة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'edit_transport', 'edit transport', 'تحرير النقل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'manage_dormitory', 'manage dormitory', 'إدارة المهجع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'dormitory_list', 'dormitory list', 'قائمة المهجع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'add_dormitory', 'add dormitory', 'إضافة عنبر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'dormitory_name', 'dormitory name', 'اسم المهجع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'number_of_room', 'number of room', 'عدد الغرف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'manage_noticeboard', 'manage noticeboard', 'إدارة لوحة الإعلانات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'noticeboard_list', 'noticeboard list', 'قائمة لوحة الإعلانات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'add_noticeboard', 'add noticeboard', 'إضافة لوحة الإعلانات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'notice', 'notice', 'تنويه', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'add_notice', 'add notice', 'إضافة إشعار', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'edit_noticeboard', 'edit noticeboard', 'تحرير لوحة الإعلانات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'system_name', 'system name', 'اسم النظام', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'save', 'save', 'حفظ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'system_title', 'system title', 'عنوان النظام', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'paypal_email', 'paypal email', 'بريد باي بال', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'currency', 'currency', 'دقة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 'phrase_list', 'phrase list', 'قائمة العبارات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 'add_phrase', 'add phrase', 'إضافة عبارة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 'add_language', 'add language', 'إضافة لغة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 'phrase', 'phrase', 'العبارة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 'manage_backup_restore', 'manage backup restore', 'إدارة استعادة النسخ الاحتياطي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'restore', 'restore', 'استعادة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'mark', 'mark', 'علامة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'grade', 'grade', 'درجة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'invoice', 'invoice', 'فاتورة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'book', 'book', 'فاتورة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'all', 'all', 'الكل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'upload_&_restore_from_backup', 'upload & restore from backup', 'تحميل واستعادة من النسخ الاحتياطي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'manage_profile', 'manage profile', 'إدارة الملف الشخصي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'update_profile', 'update profile', 'تحديث الملف', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'new_password', 'new password', 'كلمة السر الجديدة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'confirm_new_password', 'confirm new password', 'تأكيد كلمة المرور الجديدة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'update_password', 'update password', 'تحديث كلمة المرور', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'teacher_dashboard', 'teacher dashboard', 'المعلم، داشبوارد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'backup_restore_help', 'backup restore help', 'النسخ الاحتياطي استعادة المساعدة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'student_dashboard', 'student dashboard', 'لوحة القيادة الطالب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 'parent_dashboard', 'parent dashboard', 'لوحة الأم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 'view_marks', 'view marks', 'عرض علامات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 'delete_language', 'delete language', 'حذف اللغة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 'settings_updated', 'settings updated', 'تم تحديث الإعدادات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 'update_phrase', 'update phrase', 'تحديث العبارة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 'login_failed', 'login failed', 'فشل تسجيل الدخول', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 'live_chat', 'live chat', 'دردشة مباشرة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 'client 1', 'client 1', 'العميل ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 'buyer', 'buyer', 'مشتر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'purchase_code', 'purchase code', 'كود شراء', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'system_email', 'system email', 'نظام البريد الإلكتروني', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26156, 'master_data', 'master data', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26155, 'manage_library', 'manage library', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26153, 'expense', 'expense', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26154, 'expense_category', 'expense category', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26152, 'expenses', 'expenses', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26151, 'manage_award', 'manage award', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26150, 'list_payroll', 'list payroll', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26149, 'add_payslip', 'add payslip', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26148, 'payroll', 'payroll', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26147, 'leave', 'leave', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26146, 'applications', 'applications', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26145, 'vacancies', 'vacancies', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26144, 'recruitment', 'recruitment', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26142, 'human_resources', 'human resources', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26143, 'department', 'department', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26141, 'list_ledger', 'list ledger', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26140, 'student_ledger', 'student ledger', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26139, 'manage_invoice', 'manage invoice', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26138, 'fees_payments', 'fees payments', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26137, 'collect_fees', 'collect fees', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26136, 'fee_collection', 'fee collection', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26135, 'generate_report', 'generate report', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26134, 'scores_by_sms', 'scores by sms', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26133, 'subject_teacher', 'subject teacher', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26132, 'class_teacher', 'class teacher', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26131, 'report_cards', 'report cards', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26130, 'exam_grades', 'exam grades', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26129, 'exam_questions', 'exam questions', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26128, 'manage_exams', 'manage exams', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26127, 'view_result', 'view result', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26126, 'list_exams', 'list exams', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26125, 'add_exams', 'add exams', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26124, 'manage_CBT', 'manage CBT', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26123, 'manage_subjects', 'manage subjects', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26122, 'time_table', 'time table', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26121, 'manage_sections', 'manage sections', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26120, 'manage_classes', 'manage classes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26119, 'class_information', 'class information', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26118, 'loan_approval', 'loan approval', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26117, 'loan_applicant', 'loan applicant', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26116, 'manage_loan', 'manage loan', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26115, 'manage_alumni', 'manage alumni', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26114, 'manage_parents', 'manage parents', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26113, 'study_materials', 'study materials', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26112, 'assignments', 'assignments', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26111, 'download_page', 'download page', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26110, 'new_ticket', 'new ticket', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26109, 'list_tickets', 'list tickets', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26108, 'support_ticket', 'support ticket', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26107, 'staff_attendance', 'staff attendance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26106, 'view_attendance', 'view attendance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26105, 'mark_attendance', 'mark attendance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26104, 'manage_attendance', 'manage attendance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26103, 'promote_students', 'promote students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26102, 'list_students', 'list students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26100, 'manage_students', 'manage students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26101, 'admission_form', 'admission form', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26099, 'HRM', 'HRM', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26098, 'hostel_manager', 'hostel manager', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26097, 'accountants', 'accountants', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26096, 'librarians', 'librarians', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26095, 'teachers', 'teachers', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26094, 'manage_staff', 'manage staff', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26093, 'manage_helpdesk', 'manage helpdesk', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26092, 'manage_helplink', 'manage helplink', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26091, 'syllabus', 'syllabus', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26090, 'manage_moraltalk', 'manage moraltalk', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26089, 'manage_holiday', 'manage holiday', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26088, 'task_manager', 'task manager', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26087, 'manage_circular', 'manage circular', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26086, 'school_clubs', 'school clubs', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26085, 'view_enquiries', 'view enquiries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26082, 'Successfully Login', 'Successfully Login', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26083, 'search_student', 'search student', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26084, 'enquiry_category', 'enquiry category', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26464, 'expense_percentage', 'expense percentage', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26465, 'client', 'client', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26463, 'expense_bar', 'expense bar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26462, 'income_expense_percentage', 'income expense percentage', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26461, 'income', 'income', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26460, 'total_spending', 'total spending', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26459, 'total_income', 'total income', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26458, 'type', 'type', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26457, 'transaction_source', 'transaction source', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26456, 'summary_report', 'summary report', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26455, 'income_expense_comparison_report', 'income expense comparison report', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26454, 'reports', 'reports', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26453, 'expense_report', 'expense report', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26452, 'project_income', 'project income', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26451, 'client_payment_report', 'client payment report', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26450, 'income_expense', 'income expense', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26449, 'expense_reports', 'expense reports', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26448, 'student_reports', 'student reports', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26365, 'hostel', 'hostel', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26364, 'all_dormitories', 'all dormitories', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26363, 'view_managers', 'view managers', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26362, 'hostel_dashboard', 'hostel dashboard', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26355, 'view_librarians', 'view librarians', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26354, 'librarian_dashboard', 'librarian dashboard', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26345, 'view_accountants', 'view accountants', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26344, 'accountant_dashboard', 'accountant dashboard', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26336, 'view_hrms', 'view hrms', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26335, 'hrm_dashboard', 'hrm dashboard', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26326, 'children', 'children', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26325, 'report_card', 'report card', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `arabic`, `spanish`, `bengali`, `korean`, `japanese`, `hindi`, `urdu`, `thai`, `italian`, `german`, `greek`, `french`, `hungarian`, `portuguese`, `turkish`, `chinese`, `russian`) VALUES
(26324, 'student_payments', 'student payments', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26315, 'balance', 'balance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26314, 'amount_paid', 'amount paid', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26313, 'total_amount', 'total amount', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26312, 'description', 'description', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26311, 'invoices', 'invoices', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26310, 'librarian', 'librarian', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26309, 'accountant', 'accountant', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26308, 'all_books', 'all books', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26307, 'check_results', 'check results', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26306, 'online_exam', 'online exam', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26305, 'payment_history', 'payment history', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26304, 'ledger_invoice', 'ledger invoice', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26303, 'pay_now', 'pay now', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26302, 'payments', 'payments', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26301, 'view_subject', 'view subject', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26300, 'view_class_mate', 'view class mate', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26291, 'status', 'status', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26290, 'time_out', 'time out', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26289, 'image', 'image', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26288, 'time_in', 'time in', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26287, 'search', 'search', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26286, 'student_mark', 'student mark', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26284, 'accountant', 'accountant', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26283, 'personal_details', 'personal details', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26282, 'school_events', 'school_events', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26281, 'internal_message', 'internal message', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26280, 'helpful_link', 'helpful link', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26279, 'view_holiday', 'view holiday', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26278, 'moral_talk', 'moral talk', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26277, 'view_news', 'view news', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26275, 'information', 'information', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26276, 'view_galleries', 'view galleries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26274, 'all_subjects', 'all subjects', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26273, 'view_award', 'view award', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26272, 'payroll_list', 'payroll list', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26271, 'manage_leave', 'manage leave', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26270, 'approval_status', 'approval status', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26269, 'apply_loan', 'apply loan', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26268, 'student_marksheet', 'student marksheet', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26267, 'view_students', 'view students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26266, 'view_teacher', 'view teacher', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26265, 'view_users', 'view users', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26264, 'view_syllabus', 'view syllabus', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26263, 'view_library', 'view library', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26262, 'study_material', 'study material', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26261, 'back_to_login', 'back to login', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26260, 'Parent', 'Parent', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26259, 'Student', 'Student', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26258, 'Teacher', 'Teacher', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26257, 'log_in', 'log in', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26256, 'forgot_password?', 'forgot password?', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26255, 'remember_me', 'remember me', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26254, 'passord', 'passord', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26248, 'Administrator', 'Administrator', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26247, 'user_account_type', 'user account type', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26246, 'logged_out', 'logged out', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26245, 'who_to_visit', 'who to visit', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26244, 'purpose', 'purpose', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26243, 'category', 'category', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26241, 'list_enquiries', 'list enquiries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26242, 'add_category', 'add category', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26240, 'manage_enquiry_category', 'manage enquiry category', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26239, 'actions', 'actions', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26238, 'all_languages', 'all languages', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26237, 'add_string', 'add string', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26236, 'back', 'back', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26235, 'active_language', 'active language', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26234, 'language_information_page', 'language information page', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26233, 'save_student', 'save student', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26232, 'documents', 'documents', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26231, 'browse_image', 'browse image', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26230, 'physical_handicap', 'physical handicap', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26229, 'any_given_marksheet', 'any given marksheet', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26228, 'birth_certificate', 'birth certificate', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26227, 'transfer_certificate', 'transfer certificate', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26226, 'admission_date', 'admission date', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26225, 'date_of_leaving', 'date of leaving', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26224, 'class_in_which_was_studying', 'class in which was studying', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26223, 'purpose_of_leaving', 'purpose of leaving', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26222, 'the_address', 'the address', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26221, 'previous_school_name', 'previous school name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26220, 'nationality', 'nationality', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26219, 'state', 'state', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26218, 'city', 'city', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26217, 'mother_tongue', 'mother tongue', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26216, 'place_birth', 'place birth', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26215, 'age', 'age', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26214, 'full_name', 'full name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26213, 'running_session', 'running session', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26212, 'save_students', 'save students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26211, 'add_a_row', 'add a row', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26209, 'section', 'section', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26210, 'select_class_first', 'select class first', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26208, 'remove', 'remove', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26207, 'select', 'select', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26206, 'gender', 'gender', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26205, 'student_admission_form', 'student admission form', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26204, 'no', 'no', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26203, 'yes', 'yes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26202, 'chat_with_student', 'chat with student', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26201, 'recently_added_stuents', 'recently added stuents', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26200, 'school_event', 'school event', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26199, 'events', 'events', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26198, 'messages', 'messages', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26197, 'loans', 'loans', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26196, 'librarian', 'librarian', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26195, 'accountant', 'accountant', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26194, 'list_teachers', 'list teachers', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26193, 'new_admin', 'new admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26192, 'admin_list', 'admin list', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26190, 'testimonies', 'testimonies', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26191, 'role_managements', 'role managements', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26189, 'news_settings', 'news settings', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26188, 'manage_gallery', 'manage gallery', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26187, 'website_info', 'website info', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26186, 'manage_banners', 'manage banners', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26185, 'front_end_settings', 'front end settings', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26184, 'documentation', 'documentation', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26183, 'manage_reports', 'manage reports', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26182, 'generate_reports', 'generate reports', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26181, 'SMTP_settings', 'SMTP settings', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26180, 'manage_language', 'manage language', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26179, 'email_settings', 'email settings', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26178, 'manage_database', 'manage database', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26177, 'manage_sms_api', 'manage sms api', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26176, 'manage_sidebar', 'manage sidebar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26175, 'general_settings', 'general settings', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26174, 'system_settings', 'system settings', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27544, 'Parent', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27543, 'Student', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27542, 'Teacher', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27259, 'invalid_login_details', 'invalid login details', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27541, 'Accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27540, 'Librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27539, 'Parent', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27538, 'Student', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27537, 'Teacher', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27536, 'Accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27535, 'Librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27534, 'Parent', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27533, 'Student', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27532, 'Teacher', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27215, 'leave_list', 'leave list', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27216, 'add_leave', 'add leave', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27217, 'start_date', 'start date', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27218, 'end_date', 'end date', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27219, 'reason', 'reason', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27220, 'list_leave', 'list leave', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27221, 'declined', 'declined', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27222, 'manage_daily_attendance', 'manage daily attendance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27223, 'select_section', 'select section', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27224, 'browse_attendance', 'browse attendance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27225, 'will_be_sent_by_msg91', 'will be sent by msg91', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27226, 'edit_category', 'edit category', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27227, 'whom', 'whom', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27228, 'update_enquiry', 'update enquiry', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27229, 'list_admin', 'list admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27230, 'add_admin', 'add admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27231, 'level', 'level', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27232, 'manage_actions', 'manage actions', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27233, 'add_sidebar', 'add sidebar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27234, 'action_name', 'action name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27235, 'display', 'display', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27236, 'parent_key', 'parent key', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27237, 'list_sidebar_actions', 'list sidebar actions', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27238, 'data_added_successfully', 'data added successfully', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27520, 'list_hrms', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27519, 'add_hrm', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27518, 'married', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27517, 'new_hrm', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26983, 'data_updated', 'data updated', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26984, 'staff_template_selected', 'staff template selected', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26987, 'student_promotion', 'student promotion', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26988, 'student_promotion_page', 'student promotion page', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26989, 'current_session', 'current session', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26990, 'manage_promotion', 'manage promotion', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27291, 'Married', 'Married', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27531, 'Accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27530, 'Librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27529, 'Parent', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27528, 'Student', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27527, 'Teacher', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27526, 'loan', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27525, 'list_database', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27524, 'upload', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27523, 'select_file', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27522, 'upload_database', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27521, 'list_parents', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27277, 'admin_permission', 'admin permission', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27276, 'update_admin', 'update admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27275, 'confirm_password', 'confirm password', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27274, 'edit_admin', 'edit admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27273, 'cancel', 'cancel', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27272, 'all_administrator', 'all administrator', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27516, 'manage_hrm', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27270, 'edit_sidebar', 'edit sidebar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27271, 'administrator_information_page', 'administrator information page', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27515, 'married', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27514, 'list_hostels', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27513, 'add_hostel', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27512, 'married', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27511, 'new_hostel', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27510, 'married', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27509, 'list_accountants', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27508, 'add_accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27507, 'married', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27309, 'save_admin', 'save admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27308, 'engaged', 'engaged', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27307, 'divorced', 'divorced', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27506, 'new_accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27505, 'manage_accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27504, 'married', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27503, 'list_librarians', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27502, 'add_librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27500, 'select_a_role', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27297, 'update_teacher', 'update teacher', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27296, 'social_information', 'social information', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27497, 'manage_librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26592, 'total_employees', 'total employees', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26591, 'list_departments', 'list departments', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26590, 'add_designation', 'add designation', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26589, 'department_name', 'department name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26588, 'add_department', 'add department', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26576, 'list_transport', 'list transport', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26575, 'vehicle', 'vehicle', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26574, 'transport_name', 'transport name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26573, 'add_transportation', 'add transportation', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26572, 'select_parent', 'select parent', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26571, 'select_transport', 'select transport', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26570, 'No', 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26569, 'Yes', 'Yes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26562, 'update_student', 'update student', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26561, 'student_edit', 'student edit', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26560, 'all_students', 'all students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26559, 'get_student_list', 'get student list', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26558, 'student_information', 'student information', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26547, 'branch', 'branch', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26546, 'bank_name', 'bank name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26545, 'account_number', 'account number', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26544, 'account_holder_name', 'account holder name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26543, 'inactive', 'inactive', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26542, 'active', 'active', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26541, 'joining_salary', 'joining salary', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26540, 'date_of_joining', 'date of joining', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26539, 'select_a_department_first', 'select a department first', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26538, 'designation', 'designation', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26537, 'select_a_department', 'select a department', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26536, 'linkedin', 'linkedin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26535, 'googleplus', 'googleplus', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26534, 'twitter', 'twitter', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26533, 'facebook', 'facebook', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26532, 'engaged', 'engaged', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26531, 'divorced', 'divorced', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26530, 'single', 'single', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26529, 'married', 'married', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26528, 'select_marital_status', 'select marital status', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26527, 'marital_status', 'marital status', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26526, 'qualification', 'qualification', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26525, 'role', 'role', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26524, 'new_teacher', 'new teacher', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26523, 'print_report_card', 'print report card', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26522, 'other_students', 'other students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26521, 'student_information_page', 'student information page', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26520, 'view_profile', 'view profile', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26519, 'student_not_found', 'student not found', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26518, 'Students', 'Students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26516, 'search_students', 'search students', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26517, 'type_student_name', 'type student name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26515, 'create_invoice', 'create invoice', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26514, 'check', 'check', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26513, 'create_new_payment', 'create new payment', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26512, 'payment_list', 'payment list', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26511, 'method', 'method', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26510, 'payment_status', 'payment status', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26509, 'total', 'total', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26508, 'unpaid_invlices', 'unpaid invlices', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26507, 'mass_invoice', 'mass invoice', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26506, 'generate_invoice', 'generate invoice', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26505, 'card', 'card', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26504, 'bank_payment', 'bank payment', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26503, 'cash', 'cash', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26502, 'discount', 'discount', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26501, 'enter_payment_amount', 'enter payment amount', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26500, 'amount_you_have_paid', 'amount you have paid', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26499, 'enter_total_amount', 'enter total amount', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26498, 'payment_title', 'payment title', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26497, 'invoice_number', 'invoice number', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26496, 'create_payment', 'create payment', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26495, 'create_student_payment', 'create student payment', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26494, 'list_club', 'list club', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26493, 'club_name', 'club name', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26492, 'add_club', 'add club', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26490, 'student_payment_report', 'student payment report', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26466, 'payment_method', 'payment method', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26467, 'total_payment', 'total payment', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26468, 'student_payment_bar', 'student payment bar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30014, 'Accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30013, 'Librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30012, 'Parent', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30011, 'Student', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30010, 'Teacher', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30009, 'Accountant', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30008, 'Librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30007, 'Parent', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30006, 'Student', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30005, 'Teacher', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_code` longtext,
  `teacher_id` int(11) DEFAULT NULL,
  `start_date` longtext,
  `end_date` longtext,
  `reason` longtext,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`leave_id`, `leave_code`, `teacher_id`, `start_date`, `end_date`, `reason`, `status`) VALUES
(1, '7843359', 2, '1538006400', '1538092800', 'pussy wagon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE IF NOT EXISTS `ledger` (
  `ledger_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `c_date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `d_date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vat_percentage` int(11) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `invoice_entries` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ledger_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`ledger_id`, `class_id`, `student_id`, `title`, `invoice_number`, `c_date`, `d_date`, `vat_percentage`, `discount_amount`, `status`, `section_id`, `invoice_entries`) VALUES
(1, 3, 5, 'For final year clearance', 17179, '2018-08-19', '2018-08-20', 2, 2, 'unpaid', 3, '[{"item":"Book","amount":"100","date2":"2018-08-20","credit":"100","balance":"000"},{"item":"School Fee","amount":"100","date2":"2018-08-20","credit":"100","balance":"000"}]');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE IF NOT EXISTS `librarian` (
  `librarian_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_role_id` int(11) NOT NULL,
  `librarian_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`librarian_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`librarian_id`, `name`, `account_role_id`, `librarian_number`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `authentication_key`) VALUES
(5, 'Librarian Optimum', 13, 'cda305f', '2018-08-19', 'male', 'Christianity', 'O+', '345 Federal capital road, British Columbia Institute of Technology, Toronto', '08161662924', 'librarian@librarian.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'PhD', 'Married', 'Abstract dynamic.docx', '93c768d0152f72bc8d5e782c0b585acc35fb0442', '');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE IF NOT EXISTS `loan` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext NOT NULL,
  `amount` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `purpose` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `l_duration` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mop` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `g_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `g_relationship` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `g_number` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `g_address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `g_country` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `make` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `serial_number` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `condition` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_score` int(11) NOT NULL DEFAULT '0',
  `class_score2` int(11) NOT NULL,
  `class_score3` int(11) NOT NULL,
  `class_score4` int(11) NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`mark_id`, `student_id`, `subject_id`, `class_id`, `exam_id`, `mark_obtained`, `mark_total`, `comment`, `class_score`, `class_score2`, `class_score3`, `class_score4`) VALUES
(10, 5, 6, 3, 2, 70, 100, 'excellent', 1, 2, 3, 4),
(11, 8, 6, 3, 2, 60, 100, 'good', 1, 2, 3, 4),
(12, 5, 7, 3, 2, 0, 100, '', 0, 0, 0, 0),
(13, 8, 7, 3, 2, 8, 100, '8', 8, 8, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mlink` longtext NOT NULL,
  `class_id` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `title`, `description`, `file_name`, `file_type`, `mlink`, `class_id`, `teacher_id`, `timestamp`) VALUES
(1, 'The new media', 'the payment for describe;ption', 'cconclusion and recommendation.docx', 'other', '', '1', '', 'Thu, 09 August 2018');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 unread 1 read',
  `attached_file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE IF NOT EXISTS `message_thread` (
  `message_thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reciever` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`message_thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploader` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `date`, `short_content`, `news_content`, `uploader`, `file_name`) VALUES
(14, 'BRIEF INFORMATION HOW TO ENROLL TO OUR SCHOOL', '01/18/2018', 'Responsive interface became necessity for various devices: All our sofrware are powered by a team of technical engineers proactively ensure smooth, standard and responsive software development. ', 'Like what you’re learning GET STARTED TODAY!\r\n\r\nWe are home to 1,500 students (aged 12 to 16) and 100 expert faculty and staff community representing over 40 different nations. We are proud of our international and multi-cultural ethos, the way our community collaborates to make a difference. Our world-renowned curriculum is built on the best.\r\n\r\nGlobal and US standards.We are home to 1,500 students (aged 12 to 16) and 100 expert faculty and staff.Community representing over 40 different nations. We are proud of our international.', 'Administrator', 'banner-01.jpg'),
(15, 'WHAT YOU NEED TO KNOW ABOUT OPRIMUM LINKUO', '01/15/2018', 'Responsive interface became necessity for various devices: All our sofrware are powered by a team of technical engineers proactively ensure smooth, standard and responsive software development. ', 'Responsive interface became necessity for various devices: All our sofrware are powered by a team of technical engineers proactively ensure smooth, standard and responsive software development. \r\n<br>\r\nResponsive interface became necessity for various devices: All our sofrware are powered by a team of technical engineers proactively ensure smooth, standard and responsive software development. ', 'Administrator', 'banner-03.jpg'),
(16, 'BRIEF INFORMATION HOW TO ENROLL TO OUR SCHOOL TWO', '01/15/2018', 'Responsive interface became necessity for various devices: All our sofrware are powered by a team of technical engineers proactively ensure smooth, standard and responsive software development. ', 'Responsive interface became necessity for various devices: All our sofrware are powered by a team of technical engineers proactively ensure smooth, standard and responsive software development. ', 'Administrator', 'banner-02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `location` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `name`, `email`, `password`, `phone`, `address`, `profession`, `authentication_key`) VALUES
(1, 'Fakunle Salawu', 'parent@parent.com', 'd8fd39d0bbdd2dcf322d8b11390a4c5825b11495', '08033527716', 'federal college of education', 'Lecturer', ''),
(4, 'Omololu Esther1', 'esther@esther.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '08161662924', 'address', 'Developer', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_category_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=106 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `expense_category_id`, `title`, `payment_type`, `invoice_id`, `student_id`, `method`, `description`, `amount`, `discount`, `timestamp`, `year`) VALUES
(101, 0, 'Payment for jamb verification', 'income', 88, 5, '3', 'Payment for jamb verification', '0', 0, '1538092800', '2018-2019'),
(102, 0, 'Payment for jamb verification', 'income', 89, 8, '3', 'Payment for jamb verification', '0', 0, '1538092800', '2018-2019'),
(103, 0, 'Payment for jamb verification', 'income', 88, 5, '3', 'Payment for jamb verification', '600', 0, '1538524800', '2018-2019'),
(104, 0, 'Payment for school', 'income', 90, 5, '3', 'Payment for school', '0', 1, '1545177600', '2018-2019'),
(105, 0, 'Payment for jamb verification', 'income', 88, 5, '1', 'Payment for jamb verification', '11400', 0, '1545177600', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `payroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `payroll_code` longtext,
  `teacher_id` int(11) DEFAULT NULL,
  `allowances` longtext,
  `deductions` longtext,
  `date` longtext,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`payroll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `payroll_code`, `teacher_id`, `allowances`, `deductions`, `date`, `status`) VALUES
(2, '5999e85', 2, '[{"type":"a","amount":"300"},{"type":"b","amount":"200"}]', '[{"type":"a","amount":"300"},{"type":"b","amount":"500"}]', '9,2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_code`, `title`, `description`) VALUES
(8, '', 'Error in result', 'Error in result'),
(7, '', 'Unable to Login', 'Unable to Login'),
(6, '', 'School fees Issue', 'School fees Issue'),
(5, '', 'Unable to make payment', 'Unable to make payment');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `question_count` int(11) DEFAULT NULL,
  `duration` int(5) DEFAULT NULL,
  `question` text,
  `correct_answers` varchar(255) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `request_book`
--

CREATE TABLE IF NOT EXISTS `request_book` (
  `request_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `request_date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `return_date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `request_status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `return_status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`request_book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `request_book`
--

INSERT INTO `request_book` (`request_book_id`, `book_id`, `request_date`, `return_date`, `request_status`, `return_status`, `student_id`) VALUES
(1, 4, '2018-09-12', '2018-09-16', 'approved', 'awaiting', 5);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `room_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `name`, `description`) VALUES
(2, 'One Bed', 'This room is for one bed and one person'),
(3, 'Two Beds', 'This room is for two beds and two persons');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `name`, `nick_name`, `class_id`, `teacher_id`) VALUES
(3, 'First Term', 'Fterm', 3, 2),
(4, 'Second Term', 'Sterm', 3, 2),
(5, 'First Term', '1', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `name`) VALUES
(3, '2016-2017'),
(4, '2017-2018'),
(5, '2018-2019'),
(6, '2019-2020'),
(7, '2020-2021'),
(8, '2021-2022'),
(9, '2022-2023'),
(10, '2023-2024'),
(11, '2024-2025'),
(12, '2025-2026'),
(13, '2026-2027'),
(14, '2027-2028'),
(15, '2028-2029'),
(16, '2029-2030');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'OFINE SCHOOL MANAGEMENT SYSTEMS'),
(2, 'system_title', 'OFINE SCHOOL MANAGEMENT SYSTEMS'),
(3, 'address', '546787, Kertz shopping complext, Silicon Valley, United State of America, New York city'),
(4, 'phone', '+1564783934'),
(5, 'paypal_email', 'optimumproblemsolver@gmail.com'),
(6, 'currency', 'USD'),
(7, 'system_email', 'optimumproblemsolver@gmail.com'),
(20, 'active_sms_service', 'msg91'),
(11, 'language', 'english'),
(12, 'text_align', ''),
(13, 'clickatell_user', ''),
(14, 'clickatell_password', ''),
(15, 'clickatell_api_id', ''),
(16, 'skin_colour', 'green'),
(17, 'twilio_account_sid', ''),
(18, 'twilio_auth_token', ''),
(19, 'twilio_sender_phone_number', ''),
(21, 'session', '2018-2019'),
(22, 'footer', 'Developed by Optimum Linkup Computers. All Right Reserved (2017)'),
(23, 'smsteams_user', ''),
(24, 'smsteams_password', ''),
(25, 'smsteams_api_id', ''),
(26, 'tawkto', '<script type="text/javascript">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];\r\ns1.async=true;\r\ns1.src=''https://embed.tawk.to/588e0fa6af9fa11e7aa44047/default'';\r\ns1.charset=''UTF-8'';\r\ns1.setAttribute(''crossorigin'',''*'');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>'),
(28, 'payumoney_merchant_key', 'payumoney_merchant_key'),
(29, 'voguepay', '1567-0045444'),
(30, 'paystack', 'yes'),
(31, 'payumoney_salt_id', 'payumoney_salt_id'),
(32, 'msg91_authentication_key', ''),
(33, 'msg91_sender_ID', ''),
(34, 'msg91_route', ''),
(35, 'msg91_country_code', ''),
(37, 'stripe_publishable_key', 'stripe_publishable_key'),
(38, 'stripe_api_key', 'stripe_api_key'),
(41, 'payumoney', 'yes'),
(42, 'vogue', 'yes'),
(43, 'paystack', 'yes'),
(44, 'paypal_setting', 'yes'),
(45, 'stripe', 'yes'),
(60, 'atten1', 'yes'),
(46, 'cheque', 'yes'),
(47, 'bank', 'yes'),
(61, 'atten2', ''),
(49, 'bname', 'Bank Name'),
(50, 'anumber', 'Account Number'),
(51, 'scode', 'Sort Code'),
(52, 'snumber', 'Swift Number'),
(53, 'iban', 'Iban Number'),
(54, 'typea', 'yes'),
(55, 'typeb', ''),
(56, 'smtp_settings', '{"smtp_email":"Enable","smtp_email_rules":"required","smtp_host":"ssl:\\/\\/smtp.googlemail.com","smtp_host_rules":"required","smtp_port":"465","smtp_port_rules":"required","smtp_timeout":"30","smtp_timeout_rules":"required","smtp_user":"test@example.com","smtp_user_rules":"required|valid_email","smtp_pass":"1234","smtp_pass_rules":"required","char_set":"utf-8","char_set_rules":"required","new_line":"\\\\r\\\\n","new_line_rules":"required","mail_type":"html","mail_type_rules":"required"}'),
(57, 'typec', ''),
(58, 'staffa', ''),
(59, 'staffb', ''),
(62, 'paypal', '[{"active":"1","mode":"sandbox","sandbox_client_id":"AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R","production_client_id":"clientProduction"}]'),
(63, 'stripe_keys', '[{"active":"1","testmode":"on","public_key":"pk_test_c6VvBEbwHFdulFZ62q1IQrar","secret_key":"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS","public_live_key":"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx","secret_live_key":"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx"}]'),
(64, 'google', ''),
(65, 'recaptcha_site_key', 'recaptcha_site_key'),
(66, 'noti', 'yes'),
(67, 'mobileApi', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `staff_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_role_id` int(11) NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `staff_number`, `account_role_id`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `authentication_key`) VALUES
(5, 'Support Manager', 'cda305f', 12, '06/03/2014', 'male', 'Christianity', 'O+', '345 Federal capital road, British Columbia Institute of Technology, Toronto', '08033527716', 'accountant@accountant.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'BSc', 'Married', 'Abstract dynamic.docx', '93c768d0152f72bc8d5e782c0b585acc35fb0442', ''),
(6, 'Hostel Manager', '36dd646', 14, '2018-08-19', 'male', 'Christianity', 'O+', 'Address', '08033527716', 'accountant@account.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'PhD', 'Single', 'Abstract dynamic.docx', 'accountant', ''),
(8, 'Librarian', '2d2caac', 13, '2018-08-19', 'female', 'Christianity', 'O+', 'Address here<br>', '08033527716', 'librarian@librarian.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'PhD', 'Single', 'extra.docx', '93c768d0152f72bc8d5e782c0b585acc35fb0442', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE IF NOT EXISTS `staff_attendance` (
  `staff_attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `time` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_in` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_out` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time2` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `webcam` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `webcam2` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`staff_attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `age` longtext COLLATE utf8_unicode_ci NOT NULL,
  `place_birth` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `m_tongue` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ps_attend` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ps_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ps_purpose` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_study` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_of_leaving` longtext COLLATE utf8_unicode_ci NOT NULL,
  `am_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tran_cert` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dob_cert` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_join` longtext COLLATE utf8_unicode_ci NOT NULL,
  `physical_h` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `card_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `age`, `place_birth`, `sex`, `m_tongue`, `religion`, `blood_group`, `address`, `city`, `state`, `nationality`, `phone`, `email`, `ps_attend`, `ps_address`, `ps_purpose`, `class_study`, `date_of_leaving`, `am_date`, `tran_cert`, `dob_cert`, `mark_join`, `physical_h`, `password`, `father_name`, `mother_name`, `class_id`, `section_id`, `parent_id`, `roll`, `transport_id`, `dormitory_id`, `session`, `card_number`, `issue_date`, `expire_date`, `dormitory_room_number`, `file_name`) VALUES
(5, 'Optimum Student', '2011-08-19', '22', 'Canada', 'male', 'English', 'Christianity', 'AS', 'Federal College of education, Osiele Ogun State', 'Willoughby', 'Canada State', 'Nationality', '08033527716', 'student@student.com', 'SALAWU ABIOLA SCHOOL', 'The address of the school attended', 'Graduated', 'class in which was study', '2011-08-26', '2011-10-14', 'Yes', 'Yes', 'Yes', 'No', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', '', '', '3', 3, 1, '3ac06d3', 0, 0, '2018-2019', '', '', '', '', 'Abstract dynamic.docx'),
(8, 'Tunde Elescho', '2011-08-19', '20', 'London', 'male', 'Yoruba', 'Muslim', 'AS', 'Normal address here', 'Lagos', 'State', 'Nationality', '810-175-0845', 'tunde@tunde.com', 'Previous school attended', 'The address of previous school attended', 'Graduated', 'class in which was admitted', '2011-08-19', '2011-08-19', 'Yes', 'Yes', 'Yes', 'No', '512fe559e1bc0e3394d9f96f2fe5eff8e31de6db', '', '', '3', 3, 4, '2a74b3d', 0, 0, '2018-2019', '15830', '2018-08-19', '2018-08-19', '', 'Abstract dynamic.docx');

-- --------------------------------------------------------

--
-- Table structure for table `student_permission`
--

CREATE TABLE IF NOT EXISTS `student_permission` (
  `student_permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `dashboard` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `view_users` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `academics` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payments` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `online_exam` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `request_book` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `information` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `transportation` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `support_ticket` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `internal_message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `personal_details` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_permission`
--

INSERT INTO `student_permission` (`student_permission_id`, `student_id`, `dashboard`, `view_users`, `academics`, `payments`, `online_exam`, `request_book`, `information`, `transportation`, `support_ticket`, `internal_message`, `personal_details`) VALUES
(1, 5, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes'),
(2, 8, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', '', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class_id`, `teacher_id`) VALUES
(6, 'Mathematics', 3, 2),
(7, 'Economics', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `task_manager`
--

CREATE TABLE IF NOT EXISTS `task_manager` (
  `task_manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`task_manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `role` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `date_of_joining` longtext COLLATE utf8_unicode_ci NOT NULL,
  `joining_salary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date_of_leaving` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bank_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `role`, `teacher_number`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `authentication_key`, `department_id`, `designation_id`, `date_of_joining`, `joining_salary`, `status`, `date_of_leaving`, `bank_id`) VALUES
(2, 'Mrs Teacher A.', '2', '67bfvf', '06/16/1960', 'male', 'Christianity', 'O+', 'Address of teacher here all the tme', '+2348033527716', 'teacher@teacher.com', 'www.facebook.com/optimumlinkup', 'www.twitter.com/optimumlinkup', 'www.googleplus.com/optimumlinkup', 'www.linkedin.com/optimumlinkup', 'PhD', 'Married', 'mr kina.docx', '4a82cb6db537ef6c5b53d144854e146de79502e8', '', 1, 1, '', '6000', 0, '', 0),
(4, 'Esther Oluwaseyi', '1', '049f34b', '2018-08-19', 'female', 'Christianity', 'AS', '345 Federal capital road, British Columbia Institute of Technology, Toronto', '08033527716', 'esther@esther.com', 'optim', 'optim', 'optim', 'optim', 'BSc', 'Single', 'hrobot.docx', '4a82cb6db537ef6c5b53d144854e146de79502e8', '', 0, 0, '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacherpermission`
--

CREATE TABLE IF NOT EXISTS `teacherpermission` (
  `teacherPermission_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `dashboard` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `study_material` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `assignment` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `book` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `examquestion` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `academic_syllabus` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `view_users` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_table` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marksheeta` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loans` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `staff_attendance` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `manage_attendance` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `information` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `transportation` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `leave` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payroll` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `award` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`teacherPermission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teacherpermission`
--

INSERT INTO `teacherpermission` (`teacherPermission_id`, `teacher_id`, `dashboard`, `study_material`, `assignment`, `book`, `examquestion`, `academic_syllabus`, `view_users`, `time_table`, `marksheeta`, `loans`, `staff_attendance`, `subject`, `manage_attendance`, `information`, `transportation`, `message`, `profile`, `leave`, `payroll`, `award`) VALUES
(1, 4, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(3, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE IF NOT EXISTS `testimony` (
  `testimony_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `position` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`testimony_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`testimony_id`, `name`, `position`, `content`) VALUES
(2, 'Kunlex Xue Lee', 'Teacher', 'I really love this school. It has been one of the best school so far. We love working with you. Thanks and God bless all of us. Amen'),
(3, 'Optimum', 'Admin', 'We really love this school. It has been one of the best school so far. We love working with you. Thanks and God bless all of us. Amen');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ticket_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'opened closed',
  `priority` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'high medium low',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_message`
--

CREATE TABLE IF NOT EXISTS `ticket_message` (
  `ticket_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ticket_message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `todays_thought`
--

CREATE TABLE IF NOT EXISTS `todays_thought` (
  `tthought_id` int(11) NOT NULL AUTO_INCREMENT,
  `thought` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tthought_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `transport_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transport_route_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `transport_route`
--

CREATE TABLE IF NOT EXISTS `transport_route` (
  `transport_route_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`transport_route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `vacancy_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci,
  `number_of_vacancies` int(11) DEFAULT NULL,
  `last_date` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`vacancy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`vacancy_id`, `name`, `number_of_vacancies`, `last_date`) VALUES
(1, 'Mathematics Teacher', 1, '1537920000');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_no` longtext NOT NULL,
  `vehicle_model` longtext NOT NULL,
  `year_made` longtext NOT NULL,
  `driver_name` longtext NOT NULL,
  `driver_license` longtext NOT NULL,
  `driver_contact` longtext NOT NULL,
  `status` longtext NOT NULL,
  `description` longtext NOT NULL,
  `name` longtext NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
