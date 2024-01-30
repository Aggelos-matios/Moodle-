-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 04:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moodle_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement_board`
--

CREATE TABLE `announcement_board` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(50) NOT NULL,
  `main_content` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_board`
--

INSERT INTO `announcement_board` (`id`, `date`, `subject`, `main_content`) VALUES
(3, '2023-02-25', 'Ηλεκτρονικα', 'Το μαθημα δεν θα γινει.'),
(4, '2023-02-01', 'Βασικές αρχές Προγραμματισμού', 'Το μαθημα δεν θα γινει λογω απουσια του διδασκοντα στο εξωτερικο. Η αναπληρωση θα γινει την τελεταια ευδομαδα πριν τις εξετασεις. Επισης, εχει αναρτηθει υλικο για να μελετισετε τις επομενες ημερες. \r\n\r\nΦιλικά ΑΝ. και ΑΜ.'),
(5, '2052-11-03', 'Ανακοινωση', 'Έχουν ανακοινωθεί οι βαθμοί του μαθήματος.');

-- --------------------------------------------------------

--
-- Table structure for table `document_files`
--

CREATE TABLE `document_files` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(512) NOT NULL,
  `destination_file` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_files`
--

INSERT INTO `document_files` (`id`, `title`, `description`, `destination_file`) VALUES
(1, 'Οδηγος σπουδων', 'Εχει ανακοινωθει ο καινουριος οδηγος σπουδων.', 'οδηγος-2023'),
(2, 'αποτελεσματα', 'Εχουν ανακοινωθει τα αποτελεσματα των εξετασεων.', 'αποτελεσματα-2023');

-- --------------------------------------------------------

--
-- Table structure for table `homehorks`
--

CREATE TABLE `homehorks` (
  `id` int(11) NOT NULL,
  `target` varchar(512) NOT NULL,
  `pronunciation` varchar(512) NOT NULL,
  `Deliverable` varchar(512) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homehorks`
--

INSERT INTO `homehorks` (`id`, `target`, `pronunciation`, `Deliverable`, `date`) VALUES
(1, '', 'εκφωνηση', '', '2023-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `userPassword` varchar(40) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `userPassword`, `role`) VALUES
('Angelos', 'Matios', 'a1@gmail.com', '123', 'Tutor'),
('A', 'A', 'a2@gmail.com', '123', 'Student'),
('Kostas', 'paulou', 'p1@gmail.com', '12345', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement_board`
--
ALTER TABLE `announcement_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_files`
--
ALTER TABLE `document_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homehorks`
--
ALTER TABLE `homehorks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement_board`
--
ALTER TABLE `announcement_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `document_files`
--
ALTER TABLE `document_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homehorks`
--
ALTER TABLE `homehorks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
