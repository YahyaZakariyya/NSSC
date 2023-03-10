-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 08:28 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nssc`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_user` (IN `un` VARCHAR(30), IN `ue` TEXT, IN `fn` VARCHAR(30), IN `ln` VARCHAR(30), IN `up` TEXT, IN `g` VARCHAR(30))   BEGIN
INSERT INTO users (user_name,user_email,first_name,last_name,user_password,gender) VALUES (un,ue,fn,ln,up,g);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_notes` (IN `nt` VARCHAR(100), IN `nd` VARCHAR(500), IN `a` INT, IN `nf` TEXT, IN `ns` INT, IN `ud` DATE)   BEGIN
INSERT INTO notes (notes_title, notes_description, author, notes_file, notes_subject, upload_date) VALUES (nt,nd,a,nf,ns,ud);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_query` (IN `q` TEXT, IN `qc` INT, IN `i` INT)   BEGIN
INSERT INTO queries (query, query_category, inquirer) VALUES (q,qc,i);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_notes` (IN `nt` VARCHAR(100), IN `nd` VARCHAR(500), IN `ns` INT, IN `ni` INT)   BEGIN
UPDATE notes SET notes_title=nt, notes_description=nd, notes_subject=ns WHERE notes_id=ni;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validate_login` (IN `un` TEXT, IN `up` TEXT)   BEGIN
SELECT u.user_id, u.user_name, ut.user_type FROM users u JOIN user_type ut ON u.user_type=ut.user_type_id WHERE (u.user_name=un OR u.user_email=un) AND u.user_password=up AND ut.user_type='user';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_followers` (IN `ui` INT)   BEGIN
	SELECT u.user_name FROM followers f JOIN users u ON f.follower=u.user_id WHERE f.following=ui;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `commenter` int(11) NOT NULL,
  `notes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'Database Systems'),
(6, 'Intro to Hadith and Seerah'),
(7, 'Web Programming'),
(8, 'Software Engineering'),
(9, 'COAL');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follow_id` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follow_id`, `following`, `follower`) VALUES
(16, 2, 8),
(17, 2, 1),
(19, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `liker` int(11) NOT NULL,
  `notes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `liker`, `notes_id`) VALUES
(10, 1, 10),
(11, 8, 9),
(12, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(11) NOT NULL,
  `notes_title` varchar(100) NOT NULL,
  `notes_description` varchar(500) NOT NULL,
  `notes_file` text NOT NULL,
  `author` int(11) NOT NULL,
  `notes_subject` int(11) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `notes_title`, `notes_description`, `notes_file`, `author`, `notes_subject`, `upload_date`) VALUES
(9, 'file upload testing', 'xyz', 'AB1673816050.pdf', 8, 1, '2023-01-15'),
(10, 'Testing file upload', 'how to add notes?', 'yahya_bin_zakariyya1673816727.pdf', 2, 6, '2023-01-15'),
(13, 'how to do', 'what if you please', 'Yahya_Zakariyya1673980710.pdf', 1, 1, '2023-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `query` text NOT NULL,
  `inquirer` int(11) NOT NULL,
  `query_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `query`, `inquirer`, `query_category`) VALUES
(1, 'what is 8051 microcontroller?', 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rater` int(11) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `response_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `responder` int(11) NOT NULL,
  `query` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `select_notes`
-- (See below for the actual view)
--
CREATE TABLE `select_notes` (
`notes_id` int(11)
,`notes_title` varchar(100)
,`notes_description` varchar(500)
,`course_name` varchar(50)
,`user_name` varchar(30)
,`notes_file` text
,`upload_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `select_queries`
-- (See below for the actual view)
--
CREATE TABLE `select_queries` (
`query_id` int(11)
,`query` text
,`user_name` varchar(30)
,`course_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `select_users`
-- (See below for the actual view)
--
CREATE TABLE `select_users` (
`user_id` int(11)
,`user_name` varchar(30)
,`user_email` text
,`first_name` varchar(30)
,`last_name` varchar(30)
,`gender` varchar(1)
,`user_type` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `profile_image` text NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `first_name`, `last_name`, `gender`, `profile_image`, `user_type`) VALUES
(1, 'Yahya_Zakariyya', 'yahyabinzakariyya@gmail.com', 'admin', 'Yahya', 'Zakariyya', 'm', '', 1),
(2, 'yahya_bin_zakariyya', '29529@students.riphah.edu.pk', '112233', 'Yahya', '.', 'm', '', 2),
(8, 'AB', 'AB@gmail.com', 'admin', 'A', 'B', 'f', '', 2),
(10, 'oppo_user', 'mobile@user.com', 'user', 'oppo', 'a5s', 'm', '', 2),
(11, 'abcdef', 'ghi@gmail.com', 'admin', 'abc', 'def', 'm', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure for view `select_notes`
--
DROP TABLE IF EXISTS `select_notes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `select_notes`  AS SELECT `n`.`notes_id` AS `notes_id`, `n`.`notes_title` AS `notes_title`, `n`.`notes_description` AS `notes_description`, `c`.`course_name` AS `course_name`, `u`.`user_name` AS `user_name`, `n`.`notes_file` AS `notes_file`, `n`.`upload_date` AS `upload_date` FROM ((`notes` `n` join `courses` `c` on(`n`.`notes_subject` = `c`.`course_id`)) join `users` `u` on(`n`.`author` = `u`.`user_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `select_queries`
--
DROP TABLE IF EXISTS `select_queries`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `select_queries`  AS SELECT `q`.`query_id` AS `query_id`, `q`.`query` AS `query`, `u`.`user_name` AS `user_name`, `c`.`course_name` AS `course_name` FROM ((`queries` `q` join `users` `u` on(`q`.`inquirer` = `u`.`user_id`)) join `courses` `c` on(`q`.`query_category` = `c`.`course_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `select_users`
--
DROP TABLE IF EXISTS `select_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `select_users`  AS SELECT `u`.`user_id` AS `user_id`, `u`.`user_name` AS `user_name`, `u`.`user_email` AS `user_email`, `u`.`first_name` AS `first_name`, `u`.`last_name` AS `last_name`, `u`.`gender` AS `gender`, `ut`.`user_type` AS `user_type` FROM (`users` `u` join `user_type` `ut` on(`u`.`user_type` = `ut`.`user_type_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter` (`commenter`),
  ADD KEY `notes` (`notes`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `follower` (`follower`),
  ADD KEY `following` (`following`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `liker` (`liker`),
  ADD KEY `notes_id` (`notes_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`),
  ADD KEY `notes_author` (`author`),
  ADD KEY `notes_subject` (`notes_subject`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`),
  ADD KEY `inquirer` (`inquirer`),
  ADD KEY `query_category` (`query_category`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rater` (`rater`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `responder` (`responder`),
  ADD KEY `query` (`query`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commenter` FOREIGN KEY (`commenter`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes` FOREIGN KEY (`notes`) REFERENCES `notes` (`notes_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `follower` FOREIGN KEY (`follower`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `following` FOREIGN KEY (`following`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `liker` FOREIGN KEY (`liker`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_id` FOREIGN KEY (`notes_id`) REFERENCES `notes` (`notes_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_author` FOREIGN KEY (`author`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_subject` FOREIGN KEY (`notes_subject`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `query_category` FOREIGN KEY (`query_category`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `post` FOREIGN KEY (`post`) REFERENCES `notes` (`notes_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rater` FOREIGN KEY (`rater`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `query` FOREIGN KEY (`query`) REFERENCES `queries` (`query_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `responder` FOREIGN KEY (`responder`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
