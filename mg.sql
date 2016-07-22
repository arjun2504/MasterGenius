-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2015 at 10:58 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mg`
--
CREATE DATABASE IF NOT EXISTS `mg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mg`;

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE IF NOT EXISTS `broadcast` (
  `bid` int(11) NOT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `year` enum('1','2','3','4') DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`bid`, `teacherid`, `message`, `year`, `dept`, `t`) VALUES
(1, '2', 'Bring your record notebook tomorrow !', '2', 'CSE', '2013-08-31 14:17:08'),
(2, '2', 'Submit the assignment by tomorrow sharp at 9 AM.', '2', 'CSE', '2013-08-31 14:41:04'),
(3, '2', 'Come prepared for the project demo !', '4', 'CSE', '2013-08-31 14:53:58'),
(4, '1', 'The dead line for EVSE assignment about "Ecosystem" is 8/8/13', '2', 'CSE', '2013-08-31 17:11:08'),
(6, '1', 'I will be taking your Maths class tomorrow. Bring your EVESE books tomorrow!', '2', 'CSE', '2013-08-31 17:14:10'),
(8, '1', 'Okay, Let me teach you an important topic tomorrow! Do not miss the class.', '4', 'CSE', '2013-08-31 17:22:55'),
(9, '1', 'Bring record notebook tomorrow', '2', 'CSE', '2013-09-05 11:53:02'),
(10, '1', 'Please submit ur assignment by tomorrow', '2', 'CSE', '2013-09-08 23:19:30'),
(11, '1', 'Bring your project tomorrow', '2', 'CSE', '2013-09-15 15:18:27'),
(12, '1', 'Bring record notebook tomorrow', '2', 'CSE', '2013-09-25 20:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `doubts`
--

CREATE TABLE IF NOT EXISTS `doubts` (
  `studentid` varchar(11) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  `doubtid` int(11) NOT NULL,
  `ansby` varchar(11) DEFAULT NULL,
  `link` varchar(300) DEFAULT NULL,
  `lastid` varchar(11) DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  PRIMARY KEY (`doubtid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doubts`
--

INSERT INTO `doubts` (`studentid`, `question`, `answer`, `t`, `doubtid`, `ansby`, `link`, `lastid`, `dept`) VALUES
('124123', 'What is a class?', 'A class is a collection of member function and variables. Edit!', '2013-08-28 00:00:00', 1, NULL, 'http://www.cryptlife.com/about', '1', 'CSE'),
('124123', 'What is the difference between class and structure? Is that the object which we create for structure?', 'Class comprises of member functions and variables whereas a structure may contain only variables.', '2013-08-28 09:27:32', 2, NULL, 'http://www.cryptlife.com', '1', 'IT'),
('124123', 'Am I doing it right, buddy?', 'Yes, you are!\r\n\r\n--\r\nRegards,\r\nPrem', '2013-08-30 01:12:18', 3, NULL, '', '1', 'CSE'),
('124123', 'Testing view all stuff', NULL, '2013-08-30 19:49:17', 4, NULL, NULL, NULL, 'CSE'),
('124118', 'What is the default access specifier in C++ ?', 'Private', '2013-08-31 10:18:22', 5, NULL, '', '2', 'CSE'),
('124109', 'nalaki yenna lab?\r\n', '', '2013-09-01 13:04:29', 6, NULL, '', '1', 'CSE'),
('124109', 'how to recover old data from my computer?give me solution', 'Use Recuva\r\n\r\n Hi ''''', '2013-09-01 13:06:14', 7, NULL, 'www.google.com', '1', 'CSE'),
('124123', '<u>same error?!.</u>', 'Mail\r\n\r\nMake', '2013-09-02 00:08:26', 8, NULL, 'fcb', '1', 'CSE'),
('124123', 'What will be the size of a float variable?', '4 bytes', '2013-09-05 11:30:16', 12, NULL, 'none', '1', 'CSE'),
('124123', 'What is class?', 'Collection of member var and func', '2013-09-05 11:48:47', 13, NULL, 'http://www.cryptlife.com/about', '1', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `dques`
--

CREATE TABLE IF NOT EXISTS `dques` (
  `questionid` int(11) NOT NULL,
  `question` varchar(100) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dques`
--

INSERT INTO `dques` (`questionid`, `question`, `teacherid`, `dept`, `marks`) VALUES
(1, 'How do you truncate a table?', '1', 'CSE', 2),
(2, 'Explain Inheritance', '1', 'CSE', 15),
(3, 'What is the difference between Class and Structure?', '2', 'CSE', 2),
(4, 'How can you enable safe mode on Windows after boot?', '2', 'CSE', 15),
(5, 'What is Encapsulation?', '2', 'CSE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `mid` int(255) NOT NULL,
  `fromid` varchar(50) DEFAULT NULL,
  `toid` varchar(50) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `isread` enum('1','2') DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  `del1` int(50) DEFAULT NULL,
  `del2` int(50) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mid`, `fromid`, `toid`, `message`, `isread`, `t`, `del1`, `del2`) VALUES
(1, '124118', '124118', 'Hey dude, whats up?', '2', '2013-08-31 18:14:15', NULL, NULL),
(2, '2', '1', 'Enna Panrael?', '2', '2013-08-31 18:39:28', NULL, NULL),
(3, '2', '1', 'Onnum illa', '2', '2013-08-31 18:51:51', NULL, NULL),
(4, '124123', '1', 'Shall we discuss about the project, sir?', '2', '2013-08-31 20:27:18', NULL, NULL),
(5, '1', '124123', 'Yes, sure !', '2', '2013-08-31 20:33:53', NULL, NULL),
(6, '1', '2', 'Okay !', '2', '2013-08-31 21:15:17', 1, NULL),
(7, '124123', '1', ':) :)', '2', '2013-08-31 21:53:42', NULL, 1),
(8, '1', '124123', 'What happened to the project which I gave you?', '2', '2013-09-01 01:55:26', NULL, NULL),
(9, '1', '124123', 'Hi whats up?', '2', '2013-09-01 11:02:00', NULL, NULL),
(10, '124123', '1', 'What song was that?', '2', '2013-09-01 11:11:36', NULL, NULL),
(11, '124123', '1', 'wazzz up??', '2', '2013-09-01 11:16:27', NULL, NULL),
(12, '124123', '124118', 'microsoft', '1', '2013-09-01 11:28:34', NULL, NULL),
(13, '124123', '1', 'Hello Ji !', '2', '2013-09-01 11:29:19', NULL, NULL),
(14, '1', '124123', 'Hi !', '2', '2013-09-01 11:31:30', 1, NULL),
(15, '124123', '1', 'It is on progress sir !', '2', '2013-09-01 11:35:07', NULL, NULL),
(16, '124123', '124123', 'lndkjandkjnaskjdnaskndkasndksandksajndkjsandkjsandkandkasndkansdkasndksandknsadkaskdnakdnkasndsakjndsakd', '2', '2013-09-01 11:36:32', NULL, NULL),
(17, '124109', '2', 'how to improve codings in c,c++?', '2', '2013-09-01 13:23:00', NULL, NULL),
(22, '1', '124120', 'Hello !!', '1', '2013-09-02 00:41:03', NULL, NULL),
(23, '1', '124120', 'Hello !!', '1', '2013-09-02 00:41:47', NULL, NULL),
(24, '1', '124120', 'testing again ! lol', '2', '2013-09-02 00:42:05', NULL, NULL),
(25, '124123', '1', 'test', '2', '2013-09-03 19:38:17', NULL, NULL),
(26, '1', '124123', 'lndkjandkjnaskjdnaskndkasndksandksajndkjsandkjsandkandkasndkansdkasndksandknsadkaskdnakdnkasndsakjndsakd', '2', '2013-09-03 22:26:30', NULL, NULL),
(27, '1', '124123', 'lndkjandkjnaskjdnaskndkasndksandksajndkjsandkjsandkandkasndkansdkasndksandknsadkaskdnakdnkasndsakjndsakd', '1', '2013-09-03 22:46:37', NULL, NULL),
(28, '1', '124123', 'lndkjandkjn hello skndkasndksandksajndkjsandkjsandkandkasndkansdkasndksandknsadkaskdnakdnkasndsakjndsakd', '1', '2013-09-03 22:47:01', NULL, NULL),
(29, '1', '124123', 'Final test !!\r\n\r\nI wil die if it didn''t work\r\n\r\n\r\nlol\r\nlol\r\n\r\n\r\nhaha', '1', '2013-09-03 22:49:48', NULL, NULL),
(30, '1', '124123', 'Final test !!\r\n\r\nI wil die if it didn''t work\r\n\r\n\r\nlol\r\nlol\r\n\r\n\r\nhaha', '1', '2013-09-03 22:52:42', NULL, NULL),
(31, '1', '1', 'Final test !!\r\n\r\nI wil die if it didn''t work\r\n\r\n\r\nlol\r\nlol\r\n\r\n\r\nhaha', '2', '2013-09-03 23:11:31', NULL, NULL),
(32, '1', '124123', 'lndkjandkjnaskjdnaskndkasndksandksajndkjsandkjsandkandkasndkansdkasndksandknsadkaskdnakdnkasndsakjndsakd', '1', '2013-09-03 23:12:52', NULL, NULL),
(33, '1', '1', 'lndkjandkjnaskjdnaskndkasndksandksajndkjsandkjsandkandkasndkansdkasndksandknsadkaskdnakdnkasndsakjndsakd', '2', '2013-09-03 23:13:02', NULL, NULL),
(34, '1', '124123', 'Final test !!\r\n\r\nI wil die if it didn''t work\r\n\r\n\r\nlol\r\nlol\r\n\r\n\r\nhaha', '2', '2013-09-03 23:19:27', NULL, NULL),
(35, '124123', '1', 'Final test !!\r\n\r\nI wil die if it didn''t work\r\n\r\n\r\nlol\r\nlol\r\n\r\n\r\nhaha', '2', '2013-09-03 23:47:12', NULL, 1),
(36, '124123', '124123', 'Final test !!\r\n\r\nI wil die if it didn''t work\r\n\r\n\r\nlol\r\nlol\r\n\r\n\r\nhaha', '2', '2013-09-03 23:47:26', NULL, NULL),
(37, '124120', '124123', 'Pika Pika\r\n\r\n\r\nCharizard ! ''', '1', '2013-09-04 01:47:54', NULL, NULL),
(38, '124120', '1', 'I\r\nhave\r\n\r\nread this\r\n\r\nmessage lol\r\n\r\n:D ''', '2', '2013-09-04 01:49:35', NULL, NULL),
(39, '124123', '1', 'hai h r u???', '2', '2013-09-25 20:52:38', NULL, NULL),
(40, '1', '124123', 'fine', '2', '2014-03-09 23:10:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `notesid` int(11) NOT NULL,
  `teacherid` varchar(11) DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  `content` varchar(50000) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `year` enum('1','2','3','4') DEFAULT NULL,
  PRIMARY KEY (`notesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notesid`, `teacherid`, `dept`, `t`, `content`, `title`, `file`, `year`) VALUES
(3, '1', 'CSE', '2013-08-28 15:27:18', 'Starting Windows on safe mode will disable most of the graphical options and third party applications. The system will be functioning with minimal drivers and software.\n\n-\nRegards\nPrem', 'Safe Mode Boot - Windows', NULL, '2'),
(4, '1', 'CSE', '2013-08-28 20:17:14', 'Design a flow chart !', 'Flowchart Pictures', 'flow.png', '2');

-- --------------------------------------------------------

--
-- Table structure for table `qpaper`
--

CREATE TABLE IF NOT EXISTS `qpaper` (
  `testid` int(11) NOT NULL,
  `year` enum('1','2','3','4') DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `q1` varchar(70) DEFAULT NULL,
  `q2` varchar(70) DEFAULT NULL,
  `q3` varchar(70) DEFAULT NULL,
  `q4` varchar(70) DEFAULT NULL,
  `q5` varchar(70) DEFAULT NULL,
  `q6` varchar(70) DEFAULT NULL,
  `q7` varchar(70) DEFAULT NULL,
  `q8` varchar(70) DEFAULT NULL,
  `q9` varchar(70) DEFAULT NULL,
  `q10` varchar(70) DEFAULT NULL,
  `o11` varchar(50) DEFAULT NULL,
  `o12` varchar(50) DEFAULT NULL,
  `o13` varchar(50) DEFAULT NULL,
  `o14` varchar(50) DEFAULT NULL,
  `o21` varchar(50) DEFAULT NULL,
  `o22` varchar(50) DEFAULT NULL,
  `o23` varchar(50) DEFAULT NULL,
  `o24` varchar(50) DEFAULT NULL,
  `o31` varchar(50) DEFAULT NULL,
  `o32` varchar(50) DEFAULT NULL,
  `o33` varchar(50) DEFAULT NULL,
  `o34` varchar(50) DEFAULT NULL,
  `o41` varchar(50) DEFAULT NULL,
  `o42` varchar(50) DEFAULT NULL,
  `o43` varchar(50) DEFAULT NULL,
  `o44` varchar(50) DEFAULT NULL,
  `o51` varchar(50) DEFAULT NULL,
  `o52` varchar(50) DEFAULT NULL,
  `o53` varchar(50) DEFAULT NULL,
  `o54` varchar(50) DEFAULT NULL,
  `o61` varchar(50) DEFAULT NULL,
  `o62` varchar(50) DEFAULT NULL,
  `o63` varchar(50) DEFAULT NULL,
  `o64` varchar(50) DEFAULT NULL,
  `o71` varchar(50) DEFAULT NULL,
  `o72` varchar(50) DEFAULT NULL,
  `o73` varchar(50) DEFAULT NULL,
  `o74` varchar(50) DEFAULT NULL,
  `o81` varchar(50) DEFAULT NULL,
  `o82` varchar(50) DEFAULT NULL,
  `o83` varchar(50) DEFAULT NULL,
  `o84` varchar(50) DEFAULT NULL,
  `o91` varchar(50) DEFAULT NULL,
  `o92` varchar(50) DEFAULT NULL,
  `o93` varchar(50) DEFAULT NULL,
  `o94` varchar(50) DEFAULT NULL,
  `o101` varchar(50) DEFAULT NULL,
  `o102` varchar(50) DEFAULT NULL,
  `o103` varchar(50) DEFAULT NULL,
  `o104` varchar(50) DEFAULT NULL,
  `a1` varchar(50) DEFAULT NULL,
  `a2` varchar(50) DEFAULT NULL,
  `a3` varchar(50) DEFAULT NULL,
  `a4` varchar(50) DEFAULT NULL,
  `a5` varchar(50) DEFAULT NULL,
  `a6` varchar(50) DEFAULT NULL,
  `a7` varchar(50) DEFAULT NULL,
  `a8` varchar(50) DEFAULT NULL,
  `a9` varchar(50) DEFAULT NULL,
  `a10` varchar(50) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpaper`
--

INSERT INTO `qpaper` (`testid`, `year`, `dept`, `title`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `o11`, `o12`, `o13`, `o14`, `o21`, `o22`, `o23`, `o24`, `o31`, `o32`, `o33`, `o34`, `o41`, `o42`, `o43`, `o44`, `o51`, `o52`, `o53`, `o54`, `o61`, `o62`, `o63`, `o64`, `o71`, `o72`, `o73`, `o74`, `o81`, `o82`, `o83`, `o84`, `o91`, `o92`, `o93`, `o94`, `o101`, `o102`, `o103`, `o104`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `teacherid`) VALUES
(1, '2', 'CSE', 'Object Oriented Programming', 'Class', 'bkjbkj', 'kjb', 'bkj', 'nkjbkjb', 'bknsada', 'dskjcskdck', 'dksfkj', 'lkdnfknk', 'knlfnlkwnf', 'ns', 'jhkjkjb', 'kjbkjbkj', 'kj', 'bk', 'bkj', 'kb', 'kjb', 'b', 'kjb', 'b', 'bkj', 'kjb', 'kj', 'bkj', 'nbk', 'jbkjbjbjb', 'jbjbkln', 'bkjjbkjb', 'bkjbk', 'hjj66526', 'hbjsab', 'dbikjjwd', 'dkajdak', 'kjfcjkw', 'cwkj', 'kdsackjsad', 'dkjskj', 'dskjkjafv', 'fkjfkjwv', 'dkjkjbqfkj', 'kjfekjbwfe', 'knflknqw', 'knfwlkn', 'kwnfel', 'knflkl', 'lfnlkwnfe', 'klnclkn', 'lkcnwlknc', 'lknfcwl', 'c3', 'c4', 'c1', 'c4', 'c1', 'c2', 'c3', 'c4', 'c2', 'c3', '1'),
(4, '2', 'CSE', 'C Programming', 'What is the default access specifier for function in C?', 'What is the keyword to specify friend function?', 'How many bytes do int datatype take?', 'Where the clrscr function is defined', 'What is Encapsulation?', 'What is SLL', 'Why getch is used at the end of the program?', 'What is an Array?', 'What does a pointer have?', 'How to compare two strings?', 'Private', 'Public', 'Protected', 'Intern', 'friend', 'derived friend', 'private friend', 'same friend', '2 bytes', '4 bytes', '1 byte', '3 bytes', 'stdio.h', 'stdlib.h', 'conio.h', 'string.h', 'Data Exposing', 'Data Hiding', 'Data Entry', 'Data Deletion', 'Singly Linked List', 'Special Linked List', 'Structured Linked List', 'Spirally Linked List', 'To preserve the output display', 'To get input for constructor', 'To stop the loop', 'To receive character array', 'Pointer', 'Set of values in same variable', 'Variables of different data type', 'Linked List', 'Memory Address', 'Object', 'Value', 'Array', 'strcmp', 'strcompare', 'strcp', 'stringcmp', 'c1', 'c1', 'c1', 'c3', 'c2', 'c1', 'c1', 'c2', 'c1', 'c1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `showthread`
--

CREATE TABLE IF NOT EXISTS `showthread` (
  `id` int(255) NOT NULL DEFAULT '0',
  `discuss` mediumtext,
  `threadid` int(50) DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  `postedby` varchar(50) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showthread`
--

INSERT INTO `showthread` (`id`, `discuss`, `threadid`, `t`, `postedby`, `file`) VALUES
(1, 'That was great start. thanks for the code.', 5, '2013-09-01 20:57:21', '124109', NULL),
(2, 'Hope, this one helps !', 5, '2013-09-01 23:02:02', '1', '1_bug-report.txt'),
(3, 'k', 3, '2013-09-02 00:01:29', '1', '1_app_store_badge.png'),
(4, 'Viewed the code. Thank you, you made my day. :D', 5, '2013-09-03 19:32:22', '124123', NULL),
(5, 'Testing, sir!', 5, '2013-09-03 19:32:44', '124123', '124123_php-facedetection-master.zip'),
(6, 'No More.', 7, '2013-09-03 19:50:10', '124123', '124123_bill-gates-and-steve-jobs.jpg'),
(7, 'What are the types of Linked List?What are the types of Linked List?What are the types of Linked List?What are the types of Linked List?What are the types of Linked List?What are the types of Linked List?What are the types of Linked List?''j;', 1, '2013-09-04 01:01:33', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studentid` varchar(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `year` enum('1','2','3','4') DEFAULT NULL,
  `section` enum('A','B','C') DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentid`, `fname`, `lname`, `password`, `year`, `section`, `dept`, `gender`) VALUES
('097001', 'Amal', 'Syriac', 'pass1', '4', 'A', 'EIE', 'm'),
('097002', 'Raja', 'Sekar', 'pass1', '4', 'A', 'ECE', 'm'),
('097003', 'Roopesh', 'Bose', 'pass1', '4', 'A', 'EEE', 'm'),
('097004', 'Mukesh', 'Chandran', 'pass1', '4', 'A', 'MECH', 'm'),
('097005', 'Gaurav', 'Hedge', 'pass1', '4', 'A', 'AUTO', 'm'),
('097006', 'Eminem', 'Slimshady', 'pass1', '4', 'A', 'IT', 'm'),
('114141', 'Arjun', 'TS', 'pass1', '3', 'C', 'CSE', 'm'),
('124013', 'Thennavan', 'Ravi', 'pass1', '2', 'B', 'CSE', 'm'),
('124017', 'Karpaga', 'Raja', 'pass1', '2', 'A', 'CSE', 'm'),
('124109', 'Lokchand', 'R S', 'pass1', '2', 'A', 'CSE', 'm'),
('124118', 'Aswin', 'Kumar', 'pass1', '2', 'A', 'CSE', 'm'),
('124120', 'Jeevitha', 'Manavalan', 'pass1', '2', 'B', 'CSE', 'f'),
('124121', 'Aiswarya', 'Mohan', 'pass1', '2', 'A', 'CSE', 'f'),
('124123', 'Arjun', 'R R', 'pass1', '2', 'A', 'CSE', 'm'),
('134401', 'Vishaal', 'S', 'pass1', '2', 'A', 'CSE', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacherid` varchar(11) NOT NULL,
  `sal` enum('Mr.','Mrs.','Ms.','Er.','Dr.') NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') NOT NULL,
  PRIMARY KEY (`teacherid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherid`, `sal`, `fname`, `lname`, `password`, `dept`) VALUES
('1', 'Mr.', 'Manish', 'Yadav', 'pass1', 'CSE'),
('2', 'Mr.', 'Ram', 'Kumar', 'pass1', 'CSE'),
('3', 'Mr.', 'Joseph', 'James', 'pass1', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `testappear`
--

CREATE TABLE IF NOT EXISTS `testappear` (
  `testid` int(11) DEFAULT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `marks` int(50) DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  `subid` int(11) NOT NULL DEFAULT '0',
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testappear`
--

INSERT INTO `testappear` (`testid`, `studentid`, `marks`, `t`, `subid`, `dept`) VALUES
(1, '124120', 6, '2013-09-01 16:09:45', 1, 'CSE'),
(1, '124109', 10, '2013-09-01 16:14:39', 2, 'CSE'),
(1, '124123', 0, '2013-09-25 20:50:57', 3, 'CSE'),
(4, '124123', NULL, '2014-03-09 23:06:28', 4, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `testq`
--

CREATE TABLE IF NOT EXISTS `testq` (
  `question` varchar(500) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  `year` enum('1','2','3','4') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testq`
--

INSERT INTO `testq` (`question`, `marks`, `teacherid`, `dept`, `year`) VALUES
('How can you enable safe mode on Windows after boot?', 15, '1', 'CSE', '1'),
('What is the difference between Class and Structure?', 2, '1', 'CSE', '1'),
('How can you enable safe mode on Windows after boot?', 15, '1', 'CSE', '2'),
('Explain Inheritance', 2, '1', 'CSE', '2'),
('How do you truncate a table?', 15, '1', 'CSE', '2'),
('What is Encapsulation?', 2, '2', 'CSE', '2');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `threadid` int(50) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `thread` mediumtext,
  `topicid` int(50) DEFAULT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`threadid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threadid`, `title`, `thread`, `topicid`, `createdby`, `t`, `file`) VALUES
(1, 'Linked List', 'What are the types of Linked List?', 1, '124123', '2013-09-01 19:04:17', NULL),
(2, 'Forming a binary search tree?', 'A binary search tree will contain higher terms at left side of the node and lower terms at the right side of the node.', 1, '1', '2013-09-01 19:45:27', NULL),
(3, 'Wrap String on PHP', 'Use a pre-defined wordwrap() function.', 3, '1', '2013-09-01 19:50:24', NULL),
(4, 'Finding String Length in C#', 'Just by adding .Length to the string variable will return the length of the string or character array.', 2, '1', '2013-09-01 20:06:51', NULL),
(5, 'A Simple Hello World PHP program', 'I have attached a file of PHP. Run with a free web hosting to test or use XAMPP/WAMPP/LAMPP.', 3, '1', '2013-09-01 20:31:30', '1_hello.php'),
(6, 'Remove HTML tags while storing strings on DB', 'Use htmlentities($var); function', 3, '124123', '2013-09-03 17:14:27', NULL),
(7, 'What is a Copy Constructor?', 'A copy constructor is a special constructor in the C++ programming language for creating a new object as a copy of an existing object.', 2, '124123', '2013-09-03 19:36:23', '124123_bug-report.txt'),
(8, 'Linked List 2', 'What are the types of Linked List?\r\n\r\nWhat are the types of Linked List?\r\n\r\n\r\nWhat are the types of Linked List?\r\n\r\n\r\nWhat are the types of Linked List?\r\n\r\nWhat are the types of Linked List?\r\n\r\nWhat are the types of Linked List?\r\n\r\n"What are the types of Linked List?\r\n''\r\nWhat are the types of Linked List?', 1, '1', '2013-09-04 01:03:38', '1_app_store_badge.png');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topicid` int(50) NOT NULL DEFAULT '0',
  `topic` varchar(100) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `t` datetime DEFAULT NULL,
  `dept` enum('CSE','IT','MECH','ECE','EEE','EIE','AUTO') DEFAULT NULL,
  PRIMARY KEY (`topicid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicid`, `topic`, `teacherid`, `t`, `dept`) VALUES
(1, 'Data Structures', '1', '2013-09-01 18:00:50', 'CSE'),
(2, 'Object Oriented Programming', '2', '2013-09-01 18:06:37', 'CSE'),
(3, 'Web Development', '1', '2013-09-01 19:21:44', 'CSE'),
(4, 'Thermodynamics', '1', '2013-09-01 23:29:49', 'MECH'),
(5, 'Fluid Mechanics', '1', '2013-09-01 23:30:05', 'MECH'),
(6, 'Manufacturing Technology', '1', '2013-09-01 23:30:26', 'MECH'),
(7, 'Digital Signal Algorithm', '1', '2013-09-01 23:32:05', 'IT'),
(8, 'Object Oriented Programming', '1', '2013-09-01 23:32:22', 'IT'),
(9, 'Principles of Communication', '1', '2013-09-01 23:32:51', 'IT'),
(10, 'Transmission and Waveguides', '1', '2013-09-01 23:38:10', 'ECE'),
(11, 'Microprocessors and Microcontrollers', '1', '2013-09-01 23:44:18', 'ECE'),
(12, 'Digital Signal Processing', '1', '2013-09-01 23:44:57', 'ECE'),
(13, 'Operating Systems', '1', '2013-09-04 00:08:59', 'CSE'),
(14, 'Control Systems', '3', '2013-09-05 03:22:15', 'EIE'),
(15, 'Transducer Engineering', '3', '2013-09-05 03:23:20', 'EIE'),
(16, 'Linear Integrated Circuits and Applications', '3', '2013-09-05 03:24:45', 'EIE'),
(17, 'Electronic Devices and Circuits', '1', '2013-09-05 03:27:50', 'EEE'),
(18, 'Electromagnetic Theory', '1', '2013-09-05 03:28:19', 'EEE'),
(19, 'Tractors and Farm Equipment', '1', '2013-09-05 03:30:07', 'AUTO'),
(20, 'Computer Simulation of I.C Engine Processes', '1', '2013-09-05 03:30:24', 'AUTO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
