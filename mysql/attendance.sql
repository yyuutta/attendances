

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `confirms`
--

CREATE TABLE `confirms` (
  `id` int(11) NOT NULL,
  `date_id` varchar(255) NOT NULL,
  `user_id` int(30) NOT NULL,
  `editor` varchar(30) NOT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- テーブルの構造 `informs`
--

CREATE TABLE `informs` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_date_id` char(30) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_id` char(30) CHARACTER SET utf8 NOT NULL,
  `week` varchar(30) CHARACTER SET utf8 NOT NULL,
  `start` float NOT NULL,
  `finish` float NOT NULL,
  `rest` float NOT NULL,
  `kei` float NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `err` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `approval` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- テーブルの構造 `reshifts`
--

CREATE TABLE `reshifts` (
  `id` int(11) NOT NULL,
  `user_date_id` varchar(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_id` varchar(255) NOT NULL,
  `week` varchar(30) NOT NULL,
  `start` varchar(255) NOT NULL,
  `finish` varchar(255) NOT NULL,
  `rest` varchar(255) NOT NULL,
  `kei` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `editor` varchar(30) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `approval` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `department` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth` int(11) NOT NULL,
  `memo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `indate` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `outdate` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `test` varchar(255) CHARACTER SET utf8 NOT NULL,
  `leaving` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirms`
--
ALTER TABLE `confirms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informs`
--
ALTER TABLE `informs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_date_id` (`user_date_id`);

--
-- Indexes for table `reshifts`
--
ALTER TABLE `reshifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confirms`
--
ALTER TABLE `confirms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `informs`
--
ALTER TABLE `informs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;
--
-- AUTO_INCREMENT for table `reshifts`
--
ALTER TABLE `reshifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
