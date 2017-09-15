-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 11:02 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `cat_name`) VALUES
(9, 'JAVA'),
(10, 'PHP'),
(11, 'HTML'),
(12, 'CSS'),
(14, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(1, 'Tausif', 'Siddiquee', 'bahlul.tausif@gmail.com', 'This is a test message', 1, '2017-09-08 09:48:57'),
(2, 'Fahmi', 'Chy', 'fagggegmail.com', 'Thisknd fhub', 1, '2017-09-08 09:48:57'),
(4, 'Bahlul', 'Siddiquee', 'bahlul.tausif@gmail.com', 'Hi! My name is Bahlul Siddiquee. I am a PHP Developer and here is my github account https://github.com/Bahlul19', 1, '2017-09-08 09:48:57'),
(5, 'Fahmida', 'Yesmin Chowdhrury', 'fahmi@gamil.com', 'Hi! My name is Fahmeda Yesmin Chowdhury and a B.Sc Engineer', 2, '2017-09-08 09:48:57'),
(6, 'Tanzim', 'Ahmed', 'tanzim@gamil.com', 'Hello my name is Tanzim', 1, '2017-09-08 09:48:57'),
(7, 'Ahmed', 'Maruf', 'maruf.spider04acm@gmail.com', 'Hello.My name is maruf and i am a acm coder', 1, '2017-09-08 09:48:57'),
(8, 'Tajul', 'Islam', 'tajul@gmail.com', 'Hello My name is Tajul Islam jony', 1, '2017-09-08 09:48:57'),
(9, 'Gulam Sulaman', 'Chowdhrury', 'abir.designer@gmail.com', 'Welcome to world of design.', 1, '2017-09-08 09:48:57'),
(11, 'Humaira', 'Rahman', 'humaira.rahman@gmail.com', 'Hello My name is Humaira Rahman', 0, '2017-09-08 09:50:10'),
(12, 'Shahidur', 'Rahman', 'sahid@gmail.com', 'Hello, i am sahid', 1, '2017-09-11 00:26:54'),
(13, 'Nazia', 'Ahmed', 'nazia.rahman@yahoo.com', 'Hello my name is Nazia Rahman.', 2, '2017-09-11 00:28:16'),
(14, 'Zakia', 'Ahmed', 'zakia.ahmed123@outlook.com', 'My name is Zakia Ahmed. I am a housewife.', 2, '2017-09-11 01:00:30'),
(15, 'Zakia', 'Ahmed', 'zakia.ahmed123@outlook.com', 'My name is Zakia Ahmed. I am a housewife.', 1, '2017-09-11 02:52:18'),
(16, 'Jafar Siddiquee', 'Robin', 'jafar@yahoo.com', 'Hello my name is Abu Jafar Siddiquee Robin. I am a student of Public Administration in Sust.', 0, '2017-09-14 19:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Copyright Training With My Blog Project');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'About Us', '<p>What is about us???</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>'),
(3, 'DMCA', '<p>THis is a DMCA Page/live.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>'),
(6, 'Privacy Policy', '<p>Terms and condition<br />___________________</p>\r\n<p>All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.All the terms and condtion please re check and update or delete this.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat_id`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(9, 9, 'Basic Java Coding', '<p>Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.Welcome to the basic course of java.</p>', 'upload/f94790c9dc.jpg', 'admin', 'java', '2017-08-20 05:22:43', 1),
(10, 10, 'Server Of Mother Language PHP', '<p>PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.PHP is first server language for web application.</p>', 'upload/7bcb634bdc.png', 'Tausif', 'php', '2017-08-20 05:26:14', 13),
(11, 12, 'Awesome CSS', '<p>CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.CSS is awesome for user.Hello Buddies.How are you??</p>', 'upload/e676ed65c2.jpg', 'Tausif', 'css', '2017-08-20 05:28:51', 13),
(12, 11, 'Hello <HTML>', '<p>Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.Hello coders welcome to the world of web.</p>', 'upload/965b3bda85.jpg', 'Fahmi', 'html,basic html,HTML', '2017-08-20 05:30:05', 14),
(14, 9, 'Advance Java', '<p>This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.This course about advance java.</p>', 'upload/ff1627c491.png', 'Sabbir Ahmed', 'java', '2017-08-20 05:35:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slogan`
--

CREATE TABLE `tbl_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slogan`
--

INSERT INTO `tbl_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'My Blog Project', 'Coding is not habbit, its an addiction', 'upload/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `twitter`, `linkedin`, `google`) VALUES
(1, 'http://facebook.com/bahlul.tausif', 'http://twitter.com/Bahlul19', 'http://linkedin.com', 'http://google.com/drive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(1, 'Bahlul Tausif', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'tausif@hotmail.com', '<p>Hello guys. Welcome to coding experts of php.</p>', 0),
(2, 'Bahlul Siddiquee Tausif', 'Tausif', 'a8851e8df9bff3b2f1f89d3a852bc9c6', 'bahlul.tausif@gmail.com', '<p>Hello my name is Bahlul Siddiquee Tausif. I am a web developer</p>', 0),
(13, 'Tausif Siddiquee', 'Tausif', 'f238df3b0a3d6cf6d9fa90f66cf9c951', 'avbce@yahoo.com', '<p>blaa blaa blaa .....</p>', 2),
(14, 'FahmedaYesmin Chowdhury Fahmi', 'Fahmi', 'f11d50d63d3891a44c332e46d6d7d561', 'fahmi@gamil.com', '<p>Hello my name is Fahmi</p>', 1),
(17, 'New User', 'newuser', '4460740cd9ee7f43a4fde3a966f0787d', 'newuser@hotmail.com', '<p>Hello i am new user</p>', 1),
(18, '', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@gmail.com', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
