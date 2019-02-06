-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 11:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crs_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sessionadmin` bit(1) NOT NULL DEFAULT b'1',
  `flag` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `sessionadmin`, `flag`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `courseid` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `credithours` int(11) NOT NULL,
  `aboutcourse` longtext NOT NULL,
  `section` text NOT NULL,
  `classsize` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `flag` int(1) DEFAULT '1',
  `assignflag` bit(1) NOT NULL DEFAULT b'0',
  `day` varchar(10) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `courseid`, `coursename`, `year`, `semester`, `department`, `fid`, `credithours`, `aboutcourse`, `section`, `classsize`, `count`, `startdate`, `flag`, `assignflag`, `day`, `time`) VALUES
(1, ' CIS5610', 'Internet for the Enterprise', 2019, 'Spring', 'CIS', 112, 3, 'this course focus on different technologies associated with internet.It focus on learning server side technologies.we will briefly website design.', 'I', 2, 0, '2019-01-08', 1, b'1', 'Tuesday', 'Morning'),
(2, 'CIS2345', 'Big Data Architecture', 2019, 'Fall', 'CIS', NULL, 3, 'hive,mao reduce,data science', 'II', 20, 0, '2019-01-07', 0, b'0', 'Wednesday', 'Morning'),
(4, 'CIS2345', 'Big Data Architecture', 2019, 'Fall', 'CIS', 110, 3, 'This course focuses on learning Oracle Big Data Solution to address business problems. Special emphasis is placed on technical “hand-on” skills such as Hadoop HDFS, MapReduce, NoSQL, R, etc. in the process of data acquisition, organization, and integration. The students will also understand the applications and trend of big data phenomenon in businesses by research and case study. ', 'I', 20, 1, '2019-01-01', 1, b'0', 'Wednesday', 'Morning'),
(6, 'CIS4655', 'Software Engineering', 2019, 'Spring', 'CIS', 105, 3, 'Software engineers design and build software operating systems, middleware, business applications, computer applications, games ', 'I', 2, 0, '2019-01-15', 1, b'1', 'Wednesday', 'Morning'),
(7, 'CIS4665', 'Data Communication and Distributed Data Processing', 2019, 'Spring', 'CIS', 103, 3, 'Master data form the basis for handling business processes. They describth its own datasets, to suppo', 'I', 2, 0, '2019-01-17', 1, b'1', 'Wednesday', 'Morning'),
(8, 'CIS4680', 'Data Resource Managment', 2019, 'Summer-II', 'CIS', NULL, 3, '\r\nThis course will provide the students with in-depth knowledge of Advanced Database knowledge and skills. Oracle database system will be used as the platform for examples and practice. Specifically, the course will cover PL/SQL, Triggers, Stored Procedures, ADO.net, Database security & Administration, Transaction Management and Concurrency Control, Multimedia database processing. The class will be interesting, demanding, challenging, and rewarding.\r\n\r\n', 'I', 2, 0, '2019-01-07', 0, b'0', 'Tuesday', 'Morning'),
(9, 'CIS5221', 'Database Management Systems', 2019, 'Fall', 'CIS', NULL, 3, '\r\nA database management system (DBMS) is system software for creating and managing databases. The DBMS provides users and programmers with a systematic way to create, retrieve, update and manage data.', 'II', 20, 0, '2019-01-14', 0, b'0', 'Wednesday', 'Morning'),
(10, 'CIS5531', 'Telecommunications Management', 2019, 'Fall', 'CIS', NULL, 3, 'f you choose this program, you\'ll specialize in the design, implementation, and management of voice, video, and data networking systems. You\'ll study telecommunications concepts and technologies, network operations, wireless communications, mobile computing, and cybersecurity.', 'II', 2, 0, '2019-01-02', 0, b'0', 'Wednesday', 'Morning'),
(11, 'CIS5606', 'Advanced Application Development Using Visual C#', 2019, 'Spring', 'CIS', 110, 3, 'Developing complex, distributed and scalable applications to solve real world business problems. Applications will be developed in Visual C# using technologies such as .Net Remoting, ADO.Net Entity Framework, XML and WPF.', 'I', 2, 2, '2019-01-16', 1, b'1', 'Wednesday', 'Morning'),
(12, 'CIS5612', 'Server-side Internet Resources', 2019, 'Summer-II', 'CIS', 113, 3, 'we look at server-side programming from a high level, answering questions such as \"what is it?\", \"how does it differ from client-side programming?\", and \"why it is so useful?\". After reading this article you\'ll understand the additional power available to websites through server-side coding.', 'I', 2, 0, '2019-01-14', 1, b'1', 'Wednesday', 'Morning'),
(13, 'CIS5650', 'Managing Information Security in Organizations', 2019, 'Spring', 'CIS', 112, 3, 'You can learn about basic knowledge of of networking and in depth about network security ', 'II', 2, 0, '2019-01-07', 1, b'1', 'Wednesday', 'Morning'),
(14, 'CIS5661', 'Advanced Analysis & Design of CIS', 2019, 'Summer-I', 'CIS', NULL, 3, 'Advanced coverage of systems analysis and design topics, including objected oriented analysis and design. Uses UML.', 'I', 2, 0, '2019-01-08', 0, b'0', 'Wednesday', 'Morning'),
(15, 'CIS5670', 'Internship in Computer Information Systems', 2019, 'Summer-I', 'CIS', NULL, 3, 'this course focus on different technologies associated with internet.It focus on learning server side technologies.we will briefly website design.', 'I', 2, 0, '2019-01-08', 0, b'0', 'Monday', 'Morning'),
(16, 'CIS5675', 'Project management', 2019, 'Summer-I', 'CIS', NULL, 3, 'This specialization is a precursor to the Applied Project Management Certificate. Project management has been proven to be the most effective method of delivering products within cost, schedule, and resource constraints. This intensive and hands-on series of courses gives you the skills to ensure your projects are completed on time and on budget while giving the user the product they expect. You will gain a strong working knowledge of the basics of project management and be able to immediately use that knowledge to effectively manage work projects. At the end of the series you will be able to identify and manage the product scope, build a work breakdown structure, create a project plan, create the project budget, define and allocate resources, manage the project development, identify and manage risks, and understand the project procurement process.', 'II', 2, 0, '2019-01-17', 0, b'0', 'Monday', 'Morning'),
(17, 'CIS5681', 'Big Data Solutions for Business', 2020, 'Fall', 'CIS', NULL, 3, 'Big Data analytics requires aptitude in mathematics, as it is the arithmetic of adequacy\r\nTo work in Big Data analytics, it is helpful to have a knowledge of Hadoop, SQL, R, Python, and other programming language\r\nBig Data analytics is driving employment development, as individuals with data mining and machine learning methods, information visualization tools, and information warehousing knowledge and experience are required for Big Data analytics', 'I', 2, 0, '2019-01-17', 0, b'0', 'Wednesday', 'Morning'),
(21, 'CIS4655', 'Software Engineering', 2019, 'Spring', 'CIS', NULL, 3, '', 'II', 10, 2, '2019-01-07', 0, b'0', 'Wednesday', 'Morning'),
(22, 'CIS5221', 'Database Management Systems', 2019, 'Fall', 'CIS', NULL, 3, 'The DBMS manages three important things: the data, the database engine that allows data to be accessed, locked and modified -- and the database schema, which defines the database’s logical structure. These three foundational elements help provide concurrency, security, data integrity and uniform administration procedures. Typical database administration tasks supported by the DBMS include change management, performance monitoring/tuning and backup and recovery. Many database management systems are also responsible for automated rollbacks, restarts and recovery as well as the logging and auditing of activity.\r\n\r\nThe DBMS is perhaps most useful for providing a centralized view of data that can be accessed by multiple users, from multiple locations, in a controlled manner. A DBMS can limit what data the end user sees, as well as how that end user can view the data, providing many views of a single database schema. End users and software programs are free from having to understand where the data is physically located or on what type of storage media it resides because the DBMS handles all requests.\r\n\r\nThe DBMS can offer both logical and physical data independence. That means it can protect users and applications from needing to know where data is stored or having to be concerned about changes to the physical structure of data (storage and hardware). As long as programs use the application programming interface (API) for the database that is provided by the DBMS, developers won\'t have to modify programs just because changes have been made to the database.', 'I', 10, 0, '2019-01-05', 0, b'0', 'Monday', 'Morning'),
(25, 'CIS5678', 'Robotic process automation', 2019, 'Fall', 'CIS', NULL, 3, 'robotic process automation', 'II', 10, 0, '2019-01-24', 0, b'0', 'Monday', 'Morning'),
(26, 'CIS212', 'ERP', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-18', 0, b'0', 'Monday', 'Morning'),
(81, 'CIS8383', 'Deep learning', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-31', 0, b'0', 'Monday', 'Morning'),
(82, 'CIS8383', 'Deep learning', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-31', 0, b'0', 'Monday', 'Afternoon'),
(83, 'CIS8383', 'Deep learning', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-31', 0, b'0', 'Monday', 'Evening'),
(84, 'CIS8383', 'Deep learning', 2019, 'Spring', 'CIS', 110, 3, '', 'II', 10, 0, '2019-01-31', 1, b'1', 'Monday', 'Morning'),
(85, 'CIS8383', 'Deep learning', 2019, 'Spring', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-31', 0, b'0', 'Monday', 'Afternoon'),
(86, 'CIS8383', 'Deep learning', 2019, 'Spring', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-31', 0, b'0', 'Monday', 'Evening'),
(87, 'CIS6830', 'Internet of things', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-28', 0, b'0', 'Wednesday', 'Morning'),
(88, 'CIS6830', 'Internet of things', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-16', 0, b'0', 'Wednesday', 'Afternoon'),
(89, 'CIS6830', 'Internet of things', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-16', 0, b'0', 'Wednesday', 'Evening'),
(90, 'CIS6830', 'Internet of things', 2019, 'Spring', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-16', 0, b'0', 'Wednesday', 'Afternoon'),
(91, 'CIS6830', 'Internet of things', 2019, 'Spring', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-16', 0, b'0', 'Wednesday', 'Evening'),
(96, 'CIS212', 'ERP', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-28', 0, b'0', 'Monday', 'Morning'),
(97, 'CIS212', 'ERP', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-23', 0, b'0', 'Monday', 'Afternoon'),
(98, 'CIS212', 'ERP', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-23', 0, b'0', 'Monday', 'Evening'),
(99, 'CIS212', 'ERP', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-23', 0, b'0', 'Monday', 'Afternoon'),
(100, 'CIS212', 'ERP', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-23', 0, b'0', 'Monday', 'Evening'),
(101, 'CIS5675', 'Project management', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-23', 0, b'0', 'Monday', 'Morning'),
(102, 'CIS5675', 'Project management', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Afternoon'),
(103, 'CIS5675', 'Project management', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Evening'),
(104, 'CIS5675', 'Project management', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Afternoon'),
(105, 'CIS5675', 'Project management', 2019, 'Summer-I', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Evening'),
(106, 'CIS0101', 'Data Mining', 2019, 'Fall', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-30', 0, b'0', 'Friday', 'Morning'),
(107, 'CIS0101', 'Data Mining', 2019, 'Fall', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-30', 0, b'0', 'Friday', 'Afternoon'),
(108, 'CIS0101', 'Data Mining', 2019, 'Fall', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-30', 0, b'0', 'Friday', 'Evening'),
(109, 'CIS0101', 'Data Mining', 2019, 'Fall', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-30', 0, b'0', 'Friday', 'Morning'),
(110, 'CIS0101', 'Data Mining', 2019, 'Fall', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-30', 0, b'0', 'Friday', 'Afternoon'),
(111, 'CIS0101', 'Data Mining', 2019, 'Fall', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-30', 0, b'0', 'Friday', 'Evening'),
(112, 'CIS4665', 'Cloud Computing', 2019, 'Fall', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Friday', 'Morning'),
(113, 'CIS4665', 'Cloud Computing', 2019, 'Fall', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Friday', 'Afternoon'),
(114, 'CIS4665', 'Cloud Computing', 2019, 'Fall', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Friday', 'Evening'),
(115, 'CIS4665', 'Cloud Computing', 2019, 'Fall', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-29', 0, b'0', 'Friday', 'Morning'),
(116, 'CIS4665', 'Cloud Computing', 2019, 'Fall', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-29', 0, b'0', 'Friday', 'Afternoon'),
(117, 'CIS4665', 'Cloud Computing', 2019, 'Fall', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-29', 0, b'0', 'Friday', 'Evening'),
(118, 'CIS8393', 'Advance Java', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Morning'),
(119, 'CIS8393', 'Advance Java', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Afternoon'),
(120, 'CIS8393', 'Advance Java', 2019, 'Spring', 'CIS', NULL, 3, '', 'I', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Evening'),
(121, 'CIS8393', 'Advance Java', 2019, 'Spring', 'CIS', 105, 3, '', 'II', 10, 0, '2019-01-29', 1, b'1', 'Monday', 'Morning'),
(122, 'CIS8393', 'Advance Java', 2019, 'Spring', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Afternoon'),
(123, 'CIS8393', 'Advance Java', 2019, 'Spring', 'CIS', NULL, 3, '', 'II', 10, 0, '2019-01-29', 0, b'0', 'Monday', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `passwordhash` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sessionfaculty` int(1) NOT NULL DEFAULT '2',
  `flag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `firstname`, `lastname`, `username`, `passwordhash`, `gender`, `email`, `phone`, `address`, `sessionfaculty`, `flag`) VALUES
(102, 'Walter', 'brgls', 'walter', '0192023a7bbd73250516f069df18b500', 'male', 'dsaad@ucmo.edu', '660-422-2705', 'warrens', 2, b'1'),
(103, 'Cinthia', 'Herbert', 'cinthia', '0192023a7bbd73250516f069df18b500', 'female', 'pradeepchitti.pc@gmail.com', '660-412-2222', 'kansas state', 2, b'1'),
(105, 'russel', 'peter', 'peter', '0192023a7bbd73250516f069df18b500', 'male', 'pxc290@ucmo.edu', '660-422-2702', 'warrensburg', 2, b'1'),
(106, 'Linda', 'Lynam', 'lynam', 'aff413cecd38b496d10ab261766705bf', 'female', 'llynam@ucmo.edu', '660-422-2049', 'kansas', 2, b'1'),
(108, 'Rag', 'Ramarao', 'test', 'aff413cecd38b496d10ab261766705bf', 'Male', 'kahsjkjasjk@ucmo.edu', '333-333-2222', 'anbms,,.as', 2, b'1'),
(110, 'ravarthpeter', 'Andrejevic', 'jovana', '0192023a7bbd73250516f069df18b500', 'male', 'ravarthpeter.rp@gmail.com', '939-939-9399', 'warrensburg', 2, b'1'),
(111, 'Nicholas', 'Bellono', 'nellono', 'aff413cecd38b496d10ab261766705bf', 'Male', 'pxc29020@ucmo.edu', '848-949-9299', 'warrensburg', 2, b'1'),
(112, 'Rosie', 'Bsheer', 'bsheer', 'aff413cecd38b496d10ab261766705bf', 'Female', 'baseer@ucmo.edu', '939-939-2999', 'warrensburg', 2, b'1'),
(113, 'Ambrogio', 'Camozzi', 'camozzi', 'aff413cecd38b496d10ab261766705bf', 'Male', 'ambro@ucmo.edu', '920-030-2900', 'warrensburg', 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `facultyavailablity`
--

CREATE TABLE `facultyavailablity` (
  `timeid` int(11) NOT NULL,
  `fid` int(20) NOT NULL,
  `day` varchar(40) NOT NULL,
  `time` time NOT NULL,
  `flag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyavailablity`
--

INSERT INTO `facultyavailablity` (`timeid`, `fid`, `day`, `time`, `flag`) VALUES
(1, 102, 'Sunday', '09:00:00', b'1'),
(76, 121, 'wednesday', '12:00:00', b'1'),
(77, 103, 'Monday', '12:00:00', b'1'),
(78, 103, 'Tuesday', '15:00:00', b'1'),
(79, 110, 'Monday', '15:00:00', b'1'),
(80, 110, 'Monday', '10:00:00', b'1'),
(81, 110, 'Wednesday', '12:00:00', b'1'),
(82, 103, 'Wednesday', '13:00:00', b'1'),
(83, 103, 'Friday', '11:00:00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `facultycancelreport`
--

CREATE TABLE `facultycancelreport` (
  `Id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultycancelreport`
--

INSERT INTO `facultycancelreport` (`Id`, `fid`, `sid`, `time`, `date`, `day`) VALUES
(1, 110, 110, '10:00:00', '2019-02-04', 'Monday'),
(2, 110, 110, '12:00:00', '2019-02-06', 'Wednesday'),
(3, 110, 110, '10:00:00', '2019-02-04', 'Monday'),
(4, 110, 110, '15:00:00', '2019-02-04', 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `facultyclassesavailablity`
--

CREATE TABLE `facultyclassesavailablity` (
  `Id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `semester` varchar(256) NOT NULL,
  `year` int(11) NOT NULL,
  `day` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `flag` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyclassesavailablity`
--

INSERT INTO `facultyclassesavailablity` (`Id`, `fid`, `semester`, `year`, `day`, `time`, `flag`) VALUES
(1227, 102, 'Spring', 2019, 'Monday', 'Morning', b'0'),
(1228, 102, 'Spring', 2019, 'Monday', 'Afternoon', b'0'),
(1229, 102, 'Spring', 2019, 'Monday', 'Evening', b'0'),
(1230, 102, 'Spring', 2019, 'Tuesday', 'Morning', b'0'),
(1231, 102, 'Spring', 2019, 'Tuesday', 'Afternoon', b'0'),
(1232, 102, 'Spring', 2019, 'Tuesday', 'Evening', b'0'),
(1233, 102, 'Spring', 2019, 'Wednesday', 'Morning', b'0'),
(1234, 102, 'Spring', 2019, 'Wednesday', 'Afternoon', b'0'),
(1235, 102, 'Spring', 2019, 'Wednesday', 'Evening', b'0'),
(1239, 102, 'Spring', 2019, 'Friday', 'Morning', b'0'),
(1240, 102, 'Spring', 2019, 'Friday', 'Afternoon', b'0'),
(1241, 102, 'Spring', 2019, 'Friday', 'Evening', b'0'),
(1245, 103, 'Spring', 2019, 'Monday', 'Morning', b'0'),
(1246, 103, 'Spring', 2019, 'Monday', 'Afternoon', b'0'),
(1247, 103, 'Spring', 2019, 'Monday', 'Evening', b'0'),
(1248, 103, 'Spring', 2019, 'Tuesday', 'Morning', b'0'),
(1249, 103, 'Spring', 2019, 'Tuesday', 'Afternoon', b'0'),
(1250, 103, 'Spring', 2019, 'Tuesday', 'Evening', b'0'),
(1251, 103, 'Spring', 2019, 'Wednesday', 'Morning', b'0'),
(1252, 103, 'Spring', 2019, 'Wednesday', 'Afternoon', b'0'),
(1253, 103, 'Spring', 2019, 'Wednesday', 'Evening', b'0'),
(1257, 103, 'Spring', 2019, 'Friday', 'Morning', b'0'),
(1258, 103, 'Spring', 2019, 'Friday', 'Afternoon', b'0'),
(1259, 103, 'Spring', 2019, 'Friday', 'Evening', b'0'),
(1263, 105, 'Spring', 2019, 'Monday', 'Morning', b'1'),
(1264, 105, 'Spring', 2019, 'Monday', 'Afternoon', b'0'),
(1265, 105, 'Spring', 2019, 'Monday', 'Evening', b'0'),
(1266, 105, 'Spring', 2019, 'Tuesday', 'Morning', b'0'),
(1267, 105, 'Spring', 2019, 'Tuesday', 'Afternoon', b'0'),
(1268, 105, 'Spring', 2019, 'Tuesday', 'Evening', b'0'),
(1269, 105, 'Spring', 2019, 'Wednesday', 'Morning', b'1'),
(1270, 105, 'Spring', 2019, 'Wednesday', 'Afternoon', b'0'),
(1271, 105, 'Spring', 2019, 'Wednesday', 'Evening', b'0'),
(1275, 105, 'Spring', 2019, 'Friday', 'Morning', b'0'),
(1276, 105, 'Spring', 2019, 'Friday', 'Afternoon', b'0'),
(1277, 105, 'Spring', 2019, 'Friday', 'Evening', b'0'),
(1281, 106, 'Summer-I', 2019, 'Monday', 'Morning', b'0'),
(1282, 106, 'Summer-I', 2019, 'Monday', 'Afternoon', b'0'),
(1283, 106, 'Summer-I', 2019, 'Monday', 'Evening', b'0'),
(1284, 106, 'Summer-I', 2019, 'Tuesday', 'Morning', b'0'),
(1285, 106, 'Summer-I', 2019, 'Tuesday', 'Afternoon', b'0'),
(1286, 106, 'Summer-I', 2019, 'Tuesday', 'Evening', b'0'),
(1287, 106, 'Summer-I', 2019, 'Wednesday', 'Morning', b'0'),
(1288, 106, 'Summer-I', 2019, 'Wednesday', 'Afternoon', b'0'),
(1289, 106, 'Summer-I', 2019, 'Wednesday', 'Evening', b'0'),
(1293, 106, 'Summer-I', 2019, 'Friday', 'Morning', b'0'),
(1294, 106, 'Summer-I', 2019, 'Friday', 'Afternoon', b'0'),
(1295, 106, 'Summer-I', 2019, 'Friday', 'Evening', b'0'),
(1299, 108, 'Summer-I', 2019, 'Monday', 'Morning', b'0'),
(1300, 108, 'Summer-I', 2019, 'Monday', 'Afternoon', b'0'),
(1301, 108, 'Summer-I', 2019, 'Monday', 'Evening', b'0'),
(1302, 108, 'Summer-I', 2019, 'Tuesday', 'Morning', b'0'),
(1303, 108, 'Summer-I', 2019, 'Tuesday', 'Afternoon', b'0'),
(1304, 108, 'Summer-I', 2019, 'Tuesday', 'Evening', b'0'),
(1305, 108, 'Summer-I', 2019, 'Wednesday', 'Morning', b'0'),
(1306, 108, 'Summer-I', 2019, 'Wednesday', 'Afternoon', b'0'),
(1307, 108, 'Summer-I', 2019, 'Wednesday', 'Evening', b'0'),
(1311, 108, 'Summer-I', 2019, 'Friday', 'Morning', b'0'),
(1312, 108, 'Summer-I', 2019, 'Friday', 'Afternoon', b'0'),
(1313, 108, 'Summer-I', 2019, 'Friday', 'Evening', b'0'),
(1317, 110, 'Spring', 2019, 'Monday', 'Morning', b'1'),
(1318, 110, 'Spring', 2019, 'Monday', 'Afternoon', b'0'),
(1319, 110, 'Spring', 2019, 'Monday', 'Evening', b'0'),
(1320, 110, 'Spring', 2019, 'Tuesday', 'Morning', b'0'),
(1321, 110, 'Spring', 2019, 'Tuesday', 'Afternoon', b'0'),
(1322, 110, 'Spring', 2019, 'Tuesday', 'Evening', b'0'),
(1323, 110, 'Spring', 2019, 'Wednesday', 'Morning', b'1'),
(1324, 110, 'Spring', 2019, 'Wednesday', 'Afternoon', b'0'),
(1325, 110, 'Spring', 2019, 'Wednesday', 'Evening', b'0'),
(1329, 110, 'Spring', 2019, 'Friday', 'Morning', b'0'),
(1330, 110, 'Spring', 2019, 'Friday', 'Afternoon', b'0'),
(1331, 110, 'Spring', 2019, 'Friday', 'Evening', b'0'),
(1335, 111, 'Fall', 2019, 'Monday', 'Morning', b'0'),
(1336, 111, 'Fall', 2019, 'Monday', 'Afternoon', b'0'),
(1337, 111, 'Fall', 2019, 'Monday', 'Evening', b'0'),
(1338, 111, 'Fall', 2019, 'Tuesday', 'Morning', b'0'),
(1339, 111, 'Fall', 2019, 'Tuesday', 'Afternoon', b'0'),
(1340, 111, 'Fall', 2019, 'Tuesday', 'Evening', b'0'),
(1341, 111, 'Fall', 2019, 'Wednesday', 'Morning', b'0'),
(1342, 111, 'Fall', 2019, 'Wednesday', 'Afternoon', b'0'),
(1343, 111, 'Fall', 2019, 'Wednesday', 'Evening', b'0'),
(1347, 111, 'Fall', 2019, 'Friday', 'Morning', b'0'),
(1348, 111, 'Fall', 2019, 'Friday', 'Afternoon', b'0'),
(1349, 111, 'Fall', 2019, 'Friday', 'Evening', b'0'),
(1353, 112, 'Summer-II', 2019, 'Monday', 'Morning', b'0'),
(1354, 112, 'Summer-II', 2019, 'Monday', 'Afternoon', b'0'),
(1355, 112, 'Summer-II', 2019, 'Monday', 'Evening', b'0'),
(1356, 112, 'Summer-II', 2019, 'Tuesday', 'Morning', b'1'),
(1357, 112, 'Summer-II', 2019, 'Tuesday', 'Afternoon', b'0'),
(1358, 112, 'Summer-II', 2019, 'Tuesday', 'Evening', b'0'),
(1359, 112, 'Summer-II', 2019, 'Wednesday', 'Morning', b'0'),
(1360, 112, 'Summer-II', 2019, 'Wednesday', 'Afternoon', b'0'),
(1361, 112, 'Summer-II', 2019, 'Wednesday', 'Evening', b'0'),
(1365, 112, 'Summer-II', 2019, 'Friday', 'Morning', b'0'),
(1366, 112, 'Summer-II', 2019, 'Friday', 'Afternoon', b'0'),
(1367, 112, 'Summer-II', 2019, 'Friday', 'Evening', b'0'),
(1371, 113, 'Summer-II', 2019, 'Monday', 'Morning', b'0'),
(1372, 113, 'Summer-II', 2019, 'Monday', 'Afternoon', b'0'),
(1373, 113, 'Summer-II', 2019, 'Monday', 'Evening', b'0'),
(1374, 113, 'Summer-II', 2019, 'Tuesday', 'Morning', b'0'),
(1375, 113, 'Summer-II', 2019, 'Tuesday', 'Afternoon', b'0'),
(1376, 113, 'Summer-II', 2019, 'Tuesday', 'Evening', b'0'),
(1377, 113, 'Summer-II', 2019, 'Wednesday', 'Morning', b'1'),
(1378, 113, 'Summer-II', 2019, 'Wednesday', 'Afternoon', b'0'),
(1379, 113, 'Summer-II', 2019, 'Wednesday', 'Evening', b'0'),
(1383, 113, 'Summer-II', 2019, 'Friday', 'Morning', b'0'),
(1384, 113, 'Summer-II', 2019, 'Friday', 'Afternoon', b'0'),
(1385, 113, 'Summer-II', 2019, 'Friday', 'Evening', b'0'),
(1389, 102, 'Fall', 2019, 'Monday', 'Morning', b'0'),
(1390, 102, 'Fall', 2019, 'Monday', 'Afternoon', b'0'),
(1391, 102, 'Fall', 2019, 'Monday', 'Evening', b'0'),
(1392, 102, 'Fall', 2019, 'Tuesday', 'Morning', b'0'),
(1393, 102, 'Fall', 2019, 'Tuesday', 'Afternoon', b'0'),
(1394, 102, 'Fall', 2019, 'Tuesday', 'Evening', b'0'),
(1395, 102, 'Fall', 2019, 'Wednesday', 'Morning', b'0'),
(1396, 102, 'Fall', 2019, 'Wednesday', 'Afternoon', b'0'),
(1397, 102, 'Fall', 2019, 'Wednesday', 'Evening', b'0'),
(1401, 102, 'Fall', 2019, 'Friday', 'Morning', b'0'),
(1402, 102, 'Fall', 2019, 'Friday', 'Afternoon', b'0'),
(1403, 102, 'Fall', 2019, 'Friday', 'Evening', b'0'),
(1404, 110, 'Summer-I', 2019, 'Wednesday', 'Morning', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `meetinstructor`
--

CREATE TABLE `meetinstructor` (
  `Id` int(11) NOT NULL,
  `sid` int(20) NOT NULL,
  `fid` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrationid` int(11) NOT NULL,
  `courseid` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `Grade` varchar(255) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registrationid`, `courseid`, `cid`, `sid`, `semester`, `Grade`, `fid`, `year`, `timestamp`, `remarks`, `date`) VALUES
(209, 'CIS5606', 11, 110, 'Spring', 'A', 110, 2019, '2019-01-22 18:12:39', 'good work', '2019-01-22'),
(210, 'CIS5606', 11, 111, 'Spring', NULL, 110, 2019, '2019-01-22 18:13:11', '', '2019-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `secid` int(11) NOT NULL,
  `section` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`secid`, `section`) VALUES
(1, 'I'),
(2, 'II');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semid` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semid`, `semester`) VALUES
(4, 'Fall'),
(1, 'Spring'),
(2, 'Summer-I'),
(3, 'Summer-II');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `passwordhash` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sessionstudent` int(1) NOT NULL DEFAULT '3',
  `flag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `firstname`, `lastname`, `username`, `passwordhash`, `gender`, `email`, `phone`, `address`, `sessionstudent`, `flag`) VALUES
(103, 'rock', 'luther', 'rock', '0192023a7bbd73250516f069df18b500', 'male', 'hxc2929@ucmo.edu', '737-838-8383', '6630 w 130 steet kansas', 3, b'1'),
(105, 'Lebron', 'James', 'lebronstart', 'd41d8cd98f00b204e9800998ecf8427e', 'male', 'lebr@ucmo.edu', '636-333-3322', '1212 apt 222 vienna', 3, b'1'),
(106, 'Tarun', 'Reddy', 'tarunred', 'd41d8cd98f00b204e9800998ecf8427e', 'male', 'trn@ucmo.edu', '737-838-9399', 'mclean street', 3, b'1'),
(107, 'sai krishna', 'gollapudi', 'sky', '0192023a7bbd73250516f069df18b500', 'male', 'skygl@ucmo.edu', '660-422-2705', 'Comp Info Systems & Analytics', 3, b'1'),
(109, 'jessi', 'simpson', 'jessi', 'aff413cecd38b496d10ab261766705bf', 'male', 'jsj@ucmo.edu', '660-422-3939', 'kansas city', 3, b'1'),
(110, 'Pradeep', 'Chitti', 'pradeep', '0192023a7bbd73250516f069df18b500', 'male', 'pxc29020@ucmo.edu', '571-265-5450', '11229 mcgee street,apt#301\r\n64114,kansas city', 3, b'1'),
(111, 'raghu', 'rajandra', 'rrvd', '0192023a7bbd73250516f069df18b500', 'male', 'pradeepchitti.pc@gmail.com', '727-727-7277', 'highland avu missori', 3, b'1'),
(112, 'ramya', 'illidari', 'rmyaila', '0192023a7bbd73250516f069df18b500', 'female', 'rmya1929@ucmo.edu', '660-343-1333', 'missori,lee summit', 3, b'1'),
(113, 'david', 'paul', 'devandra', '86f686503ff41169c870faf4be188517', 'male', 'dpd03000@ucmo.edu', '666-453-9299', 'coach house,missori', 3, b'0'),
(114, 'ameer', 'shaik', 'ameer', '86f686503ff41169c870faf4be188517', 'male', 'amer@ucmo.edu', '666-333-2323', 'kansas state,overland park', 3, b'1'),
(115, 'shruthi', 'bobali', 'shruthi', '86f686503ff41169c870faf4be188517', 'female', 'shruthi@ucmo.edu', '454-242-1333', '2536 chain bridge road,roc', 3, b'1'),
(117, 'abnay', 'pinnysetty', 'abnay', 'd41d8cd98f00b204e9800998ecf8427e', 'male', 'abnyp@ucmo.edu', '595-848-0399', 'missouri', 3, b'1'),
(120, 'Kalyan', 'Ramesh', 'kalyan', 'd41d8cd98f00b204e9800998ecf8427e', 'male', 'nsn@ucmo.edu', '939-939-9399', 'kc', 3, b'1'),
(122, 'chand', 'chittem', 'chand', 'd41d8cd98f00b204e9800998ecf8427e', 'male', 'chna@ucmo.edu', '939-839-9399', 'kansas city', 3, b'1'),
(123, 'Jun', 'Hun', 'junhun', 'd41d8cd98f00b204e9800998ecf8427e', 'male', 'junhun@ucmo.edu', '949-939-9399', 'kc', 3, b'1'),
(124, 'jagdesh', 'vasireddy', 'jagdesh', '0192023a7bbd73250516f069df18b500', 'male', 'jagd@ucmo.edu', '323-233-3244', 'warrensbutg', 3, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `studentnotes`
--

CREATE TABLE `studentnotes` (
  `nid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `studentnotes` text NOT NULL,
  `facultynotes` text NOT NULL,
  `fid` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seen` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentnotes`
--

INSERT INTO `studentnotes` (`nid`, `sid`, `studentnotes`, `facultynotes`, `fid`, `datetime`, `seen`) VALUES
(36, 110, 'Hello Professor, this is test email.', 'tesyt', 111, '2019-01-22 21:48:45', b'1'),
(36, 110, 'this is test notes', 'tesyt', 110, '2019-01-22 21:48:45', b'1'),
(36, 110, 'good morning professor', 'tesyt', 110, '2019-01-22 21:48:45', b'1'),
(36, 110, 'test\r\n', 'tesyt', 103, '2019-01-22 21:48:45', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `yid` int(11) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`yid`, `year`) VALUES
(1, 2019),
(2, 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`password`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `facultyavailablity`
--
ALTER TABLE `facultyavailablity`
  ADD PRIMARY KEY (`timeid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `facultycancelreport`
--
ALTER TABLE `facultycancelreport`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fid` (`fid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `facultyclassesavailablity`
--
ALTER TABLE `facultyclassesavailablity`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `meetinstructor`
--
ALTER TABLE `meetinstructor`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registrationid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`secid`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semid`),
  ADD UNIQUE KEY `semester` (`semester`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `studentnotes`
--
ALTER TABLE `studentnotes`
  ADD KEY `nid` (`nid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`yid`),
  ADD UNIQUE KEY `year` (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `facultyavailablity`
--
ALTER TABLE `facultyavailablity`
  MODIFY `timeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `facultycancelreport`
--
ALTER TABLE `facultycancelreport`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facultyclassesavailablity`
--
ALTER TABLE `facultyclassesavailablity`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1405;

--
-- AUTO_INCREMENT for table `meetinstructor`
--
ALTER TABLE `meetinstructor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registrationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `secid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `studentnotes`
--
ALTER TABLE `studentnotes`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `yid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facultyavailablity`
--
ALTER TABLE `facultyavailablity`
  ADD CONSTRAINT `facultyavailablity_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `facultycancelreport`
--
ALTER TABLE `facultycancelreport`
  ADD CONSTRAINT `facultycancelreport_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `facultycancelreport_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);

--
-- Constraints for table `meetinstructor`
--
ALTER TABLE `meetinstructor`
  ADD CONSTRAINT `meetinstructor_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`),
  ADD CONSTRAINT `meetinstructor_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `registration_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);

--
-- Constraints for table `studentnotes`
--
ALTER TABLE `studentnotes`
  ADD CONSTRAINT `studentnotes_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `studentnotes_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
