-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 10:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_coordination`
--
CREATE DATABASE IF NOT EXISTS `course_coordination` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `course_coordination`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `active`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `course_id`, `instructor_id`, `student_id`, `user_type`, `msg`, `date`) VALUES
(5, 1, NULL, 3, 'student', 'hi\n', '2018-04-12 19:45:56'),
(6, 2, NULL, 3, 'student', 'hello', '2018-04-12 19:46:07'),
(7, 3, 78, NULL, 'instructor', 'g', '2018-04-13 11:16:07'),
(8, 5, NULL, 3, 'student', 'd', '2018-04-14 09:00:46'),
(9, 5, NULL, 3, 'student', 'd', '2018-04-14 09:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `user_id`, `post_id`, `created_date`) VALUES
(1, 'hi', 3, 3, '2018-04-12'),
(3, 'sdfghgfd', 78, 12, '2018-04-13'),
(4, 'dddd', 3, 14, '2018-04-14'),
(5, 'thank you ', 3, 24, '2018-04-14'),
(7, 'Thank you ', 3, 30, '2018-04-14'),
(9, 'yes. Physiotherapy helps restore movement and function when someone is affected by injury, illness or disability.\r\n', 58, 34, '2018-04-14'),
(10, 'Yes.. anatomy is the study of the structure of body parts, whereas physiology is the study of the functions and relationships of body parts.\r\n', 58, 33, '2018-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `major_id` int(11) NOT NULL,
  `credit_hour` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `code`, `name`, `major_id`, `credit_hour`, `desc`) VALUES
(1, 'IS 220', 'data base fundamentals ', 1, 3, 'This course introduces database design and creation using a DBMS product. Emphasis is on data dictionaries, normalization, data integrity, data modeling, and creation of simple tables, queries, reports, and forms. this course help learn how to design and implement normalized database structures by creating simple database tables, queries, reports, and forms.'),
(2, 'IS 333D', 'Multi-tier applications development', 1, 4, 'The development of enterprise applications on multi-tiered systems from mobile to mainframe. Examines enterprise computing at two levels: Application Design Patterns and Infrastructure and Implementation.'),
(3, 'BIO 168', 'Anatomy', 2, 3, 'This course provides a comprehensive study of the anatomy and physiology of the human body.Topics include body organization; homeostasis; cytology; histology; and the integumentary, skeletal, muscular, nervous systems and special senses. Upon completion, students should be able to demonstrate an in-depth understanding of principles of anatomy and physiology and their interrelationships. Laboratory work includes dissection of preserved specimens, microscopic study, physiologic experiments, computer simulations, and multimedia presentations. This course has been approved to satisfy the Comprehensive Articulation Agreement for transfer ability as a per-major and/or elective course requirement.'),
(4, 'SLP 200', 'Introduction to communication disorders ', 2, 4, 'This course provides a general introduction to normal and disordered speech, language, and hearing in children and adults. This course considers the nature of communication disorders, reviews the various conditions associated with communication disorders, and introduces professional practices in speech-language pathology and audiology. A team-based inverse teaching approach will be used.\r\n'),
(5, 'CS 111', 'Data stracture', 3, 3, 'This course introduces students to new types of data structures such as trees (including binary and multiway trees), heaps, stacks and queues. Students will also learn how to design new algorithms for each new data structure studied, create and perform simple operations on graph data structures, describe and implement common algorithms for working with advanced data structures and recognize which data structure is the best to use to solve a particular problem.'),
(6, 'CS 100', 'programming ', 3, 4, 'This course introduces computer programming using the JAVA programming language with object-oriented programming principles. Emphasis is placed on event-driven programming methods, including creating and manipulating objects, classes, and using object-oriented tools such as the class debugger. Upon completion students should be able to design, code, test, and debug JAVA language programs.');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `name`) VALUES
(1, 'Information Systems'),
(2, 'Speech Language Pathology'),
(3, 'Computers Science ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `image` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `publish_date` date NOT NULL,
  `published` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `name`, `desc`, `image`, `file`, `user_id`, `course_id`, `publish_date`, `published`) VALUES
(19, 'upload files in php ', 'Some of us are having a problem writting code that helps us to insert a file in php. \r\nIn the attachment the method of upload a file in php by using the code in the attachment we can write code that will help us easily to upload a file', '../posts/default.png', '../posts/15975867851892upload files.docx', 3, 2, '2018-04-14', 1),
(20, 'The SQL INSERT INTO Statement', 'hello, in the attachments there a file of how to insert in the DB.', '../posts/default.png', '../posts/2613414411801The SQL INSERT INTO Statement.docx', 4, 1, '2018-04-14', 1),
(24, 'Create a MySQL Database with phpMyAdmin', 'You will require a root or DBA user login to the MySQL server, or a user login with permission to create new databases,\r\nyou will need to have access to an instance of phpMyAdmin appropriately configured to administrate the MySQL server.\r\n(example in attachment)', '../posts/2473050632780database.jpg', '../posts/21966423401457How to create a MySQL Database with phpMyAdmin.docx', 80, 2, '2018-04-14', 1),
(25, 'Connect PHP to HTML', 'Connect PHP to HTML\r\n\r\n1.	You pass your data through a form with GET or POST methods.\r\n2.	 The browser executes the html, so you are free to load CSS all that you like. PHP is executed on the server, where CSS & html does not exist.\r\n3.	You embed the PHP code in PHP tags <?php ?> & the code is executed on the server.\r\n4.	 The html code is prepared & passed to the browser.\r\n', '../posts/1139141265730download.png', '../posts/21061324303263How to Connect PHP to HTML.docx', 80, 2, '2018-04-14', 1),
(26, 'Create class in java', 'in the attachment shows how to create a class in Java with an example of how to create i', '../posts/736841134120942011-MLB20450530733_102015-C.jpg', '../posts/9326627618301Classes in Java.docx', 6, 6, '2018-04-14', 1),
(27, 'Create objects in Java', 'An object is created from a class. In Java, the new keyword is used to create new objects. The attachment below shows how we can create an object in the Java programming language.', '../posts/1982190895230java-coffee-cup-logo.png', '../posts/18606657639051Create Objects in Java.docx', 6, 6, '2018-04-14', 1),
(30, 'HTML language', 'The hypertext transport protocol (HTTP) defines a simple series of procedures by which a client computer may make a request of a server computer, and the server computer may reply. \r\n', '../posts/2171207349545html5_logo-with-wordmark-01.png', '../posts/15260318303058HTTP What is.docx', 81, 2, '2018-04-14', 1),
(31, 'CSS language', '• CSS stands for Cascading Style Sheets • CSS defines how HTML elements are to be displayed • When a browser reads a style sheet, it will format the document according to the information in the style sheet . there is more details in attachement\r\n\r\n', '../posts/1176408786735css3-logo.png', '../posts/16086438422352What is CSS.docx', 81, 2, '2018-04-14', 1),
(32, 'speech-language pathologist', 'Speech-language pathologists (SLPs) work to prevent, assess, diagnose, and treat speech, language, social communication, cognitive-communication, and swallowing disorders in children and adults.', '../posts/25716165287154431eef2b2d35e9874358173bbb37b14.jpg', '../posts/8754030021276speech-language pathologist.docx', 82, 4, '2018-04-14', 1),
(33, '*What is the difference between anatomy and physiology?*', 'Can you help me know what is the difference between anatomy and physiology?*\r\n', '../posts/14438209776254431eef2b2d35e9874358173bbb37b14.jpg', '../posts/3369243239874speech-language pathologist.docx', 82, 4, '2018-04-14', 1),
(34, '*What is physiotherapy?*', 'Can you help me know what is physiotherapy?\r\n', '../posts/2269852035165dccbded53f49613f718ce257d9a50d58.jpg', '../posts/17904534516630speech-language pathologist.docx', 82, 3, '2018-04-14', 1),
(35, 'speech-language pathologist', '	\r\nspeech-language pathologist\r\nSpeech-language pathologists (SLPs) work to prevent, assess, diagnose, and treat speech, language, social communication, cognitive-communication, and swallowing disorders in children and adults.', '../posts/415615588375dccbded53f49613f718ce257d9a50d58.jpg', '../posts/9749165155416speech-language pathologist.docx', 82, 3, '2018-04-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(50) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `major` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `online_now` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fn`, `ln`, `mobile`, `major`, `type`, `email`, `username`, `password`, `online_now`, `active`) VALUES
(3, 'nawal', 'alotaibi', '0532441975', 1, 'Student', '434006046@pnu.edu.sa', 'nawal', 'nawal1234', 0, 1),
(4, 'sara', 'alharkan', '0542504747', 1, 'Student', '434005179@pnu.edu.sa', 'sara', 'sara1234', 0, 1),
(5, 'mona', 'ahmed', '0567788888', 3, 'Instructor', 'dr.mona@pnu.edu.sa', 'dr.mona', 'mona1234', 0, 1),
(6, 'noura', 'aldossry', '', 3, 'Student', '434000964@pnu.edu.sa', 'noura', 'noura1234', 0, 1),
(7, 'hend', 'ahmed', '0544400389', 1, 'Student', '433002268@pnu.edu.sa', 'hend', 'hend1234', 0, 1),
(12, 'reem', 'ha', '', 1, 'Student', '434006056@pnu.edu.sa', 'reem', 'reem1234', 0, 1),
(13, 'lama', 'fahad', '', 1, 'Student', '434566777@pnu.edu.sa', 'lama12', 'lama1234', 0, 1),
(14, 'asma', 'as', '', 1, 'Student', '434007077@pnu.edu.sa', 'asma', 'asma1234', 0, 1),
(49, 'reem', 'ali', '0598019090', 1, 'Instructor', 'reem@pnu.edu.sa', 'dr.reem', 'reem12345', 0, 1),
(50, 'mariam', 'ahmed', '0556743457', 2, 'Instructor', 'mariam@pnu.edu.sa', 'dr.mariam', 'mariam1234', 0, 1),
(51, 'raghad', 'saleh', '0556789087', 2, 'Instructor', 'raghad@pnu.edu.sa', 'dr.raghad', 'raghad12345', 0, 1),
(52, 'ahmed', 'saad', '0545678908', 3, 'Instructor', 'ahmed@pnu.edu.sa', 'dr.ahmed', 'ahmed12345', 0, 1),
(53, 'mohammed', 'khaled', '0534567890', 3, 'Instructor', 'mohammed@pnu.edu.sa', 'dr.mohamed', 'mohammed123445', 0, 1),
(54, 'zuhaira', 'ali', '0598765432', 1, 'Instructor', 'zuhaira@pnu.edu.sa', 'dr.zuhaira', 'zuhaira12345', 0, 1),
(55, 'afnan', 'fahad', '0534567890', 1, 'Instructor', 'afnan@pnu.edu.sa', 't.afnan', 'afnan12345', 0, 1),
(56, 'alanoud', 'ali', '0534567890', 3, 'Instructor', 'alanoud@pnu.edu.sa', 't.alanoud', 'alanoud12345', 0, 1),
(57, 'abrar', 'khaled', '', 1, 'Student', '434001234@pnu.edu.sa', 'Abrar', 'abrar12334', 0, 1),
(58, 'amal', 'saleh', '', 2, 'Student', '434000034@pnu.edu.sa', 'amal', 'amal12345', 0, 1),
(65, 'lama', 'turkey', '0544567777', 1, 'Student', '434000077@pnu.edu.sa', 'lama', 'lama1234', 0, 1),
(66, 'ghadah', 'abdullah', '0556753333', 1, 'Student', '433000887@pnu.edu.sa', 'ghadah', 'ghadah1234', 0, 1),
(79, 'reem', 'alotaibi', '', 1, 'Student', '434008756@pnu.edu.sa', 'reem90', 'reem1234', 0, 1),
(80, 'latifah', 'alghufaily', '0590900273', 1, 'Student', '434000012@pnu.edu.sa', 'latifah', 'l1234', 0, 1),
(81, 'noura', 'alotaibi', '0559850687', 1, 'Student', '434006364@pnu.edu.sa', 'noura1', 'noura1234', 0, 1),
(82, 'maram', 'ali', '', 2, 'Student', '433000111@pnu.edu.sa', 'maram', 'm1234', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
