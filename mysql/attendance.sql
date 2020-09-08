

SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO;
SET time_zone = '+00:00';



--
-- Database: attendance
--

-- --------------------------------------------------------

--
-- テーブルの構造 confirms
--

CREATE TABLE confirms (
  id serial,
  date_id varchar NOT NULL,
  user_id int NOT NULL,
  editor varchar NOT NULL,
  created_at timestamp
) ;


-- --------------------------------------------------------

--
-- テーブルの構造 informs
--

CREATE TABLE informs (
  id serial,
  comment varchar DEFAULT NULL,
  created_at timestamp
  ) ;



-- --------------------------------------------------------

--
-- テーブルの構造 posts
--

CREATE TABLE posts (
  id serial,
  user_date_id varchar NOT NULL,
  user_id int NOT NULL,
  date_id varchar NOT NULL,
  week varchar  NOT NULL,
  start float NOT NULL,
  finish float NOT NULL,
  rest float NOT NULL,
  kei float NOT NULL,
  note varchar  DEFAULT NULL,
  err varchar DEFAULT NULL,
  edit_date timestamp DEFAULT NULL,
  created_at timestamp,
  approval varchar NOT NULL,
  CONSTRAINT id_ukey UNIQUE(user_date_id)
) ;



-- --------------------------------------------------------

--
-- テーブルの構造 reshifts
--

CREATE TABLE reshifts (
  id serial,
  user_date_id varchar NOT NULL,
  user_id int NOT NULL,
  date_id varchar NOT NULL,
  week varchar NOT NULL,
  start varchar NOT NULL,
  finish varchar NOT NULL,
  rest varchar NOT NULL,
  kei varchar NOT NULL,
  note varchar NOT NULL,
  flag varchar NOT NULL,
  reason varchar NOT NULL,
  editor varchar NOT NULL,
  created_at timestamp,
  approval varchar NOT NULL
) ;



-- --------------------------------------------------------

--
-- テーブルの構造 users
--

CREATE TABLE users (
  id serial,
  username varchar NOT NULL,
  password varchar NOT NULL,
  department varchar NOT NULL,
  mail varchar NOT NULL,
  auth int NOT NULL,
  memo varchar DEFAULT NULL,
  indate varchar DEFAULT NULL,
  outdate varchar DEFAULT NULL,
  test varchar NOT NULL,
  leaving varchar DEFAULT NULL,
  edit_date timestamp DEFAULT NULL,
  created_at timestamp
) ;



--
-- Indexes for dumped tables
--

--
-- Indexes for table confirms
--
ALTER TABLE confirms
  ADD PRIMARY KEY (id);

--
-- Indexes for table informs
--
ALTER TABLE informs
  ADD PRIMARY KEY (id);

--
-- Indexes for table posts
--
ALTER TABLE posts
  ADD PRIMARY KEY (id);

--
-- Indexes for table reshifts
--
ALTER TABLE reshifts
  ADD PRIMARY KEY (id);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);
