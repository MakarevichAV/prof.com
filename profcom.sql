-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 03 2019 г., 14:57
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `profcom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appeals`
--

CREATE TABLE `appeals` (
  `id` int(11) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `appeals`
--

INSERT INTO `appeals` (`id`, `fio`, `position`, `unit`, `tel`, `email`, `msg`, `date`, `userID`) VALUES
(6, 'admin', 'admin', 'profcom', '89774625877', 'profcom.ciam@gmail.com', 'Здравствуйте! Меня обижают', '2019-07-03', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `new_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `login`, `fio`, `text`, `new_id`, `date`) VALUES
(30, 'admin', 'admin', 'Привет', 26, '2019-07-03'),
(31, 'Kirya', 'Асташкин', 'О привет админ', 26, '2019-07-03');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `header` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `header`, `text`, `date`) VALUES
(26, 'klbjnlfn', '<p>zdnzxfgbn</p><p>zjnxzfnfyh</p><p>zjnzgdhnbthnb</p>', '2019-07-03');

-- --------------------------------------------------------

--
-- Структура таблицы `news_files`
--

CREATE TABLE `news_files` (
  `id` int(11) NOT NULL,
  `file` varchar(250) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_files`
--

INSERT INTO `news_files` (`id`, `file`, `new_id`) VALUES
(5, '24-Стакан кубики.jpg', 24),
(6, '24-Стакан кубики2.jpg', 24),
(7, '25-Стакан кубики.jpg', 25),
(8, '25-Стакан кубики2.jpg', 25),
(9, '26-Стакан кубики.jpg', 26),
(10, '26-Стакан кубики2.jpg', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `registered`
--

CREATE TABLE `registered` (
  `id` int(11) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registered`
--

INSERT INTO `registered` (`id`, `fio`, `position`, `unit`, `tel`, `email`, `login`, `password`, `date`) VALUES
(10, 'admin', 'admin', 'profcom', '89774625877', 'profcom.ciam@gmail.com', 'admin', '762da318e7101c84b45bcf442778833a', '2019-06-24'),
(14, 'Асташкин', 'Инженер-электрик', '40101-4', '89554441232', 'продльм@klsjb.ru', 'Kirya', 'd9b1d7db4cd6e70935368a1efb10e377', '2019-07-03');

-- --------------------------------------------------------

--
-- Структура таблицы `wishing_users`
--

CREATE TABLE `wishing_users` (
  `id` int(11) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wishing_users`
--

INSERT INTO `wishing_users` (`id`, `fio`, `position`, `unit`, `tel`, `email`, `date`) VALUES
(6, 'Макаревич Александр Валерьевич', 'Инженер-электрик', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', '2019-06-24'),
(7, 'Асташкин', 'Инженер-электрик', '40101-4', '89554441232', 'продльм@klsjb.ru', '2019-07-03');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_files`
--
ALTER TABLE `news_files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wishing_users`
--
ALTER TABLE `wishing_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appeals`
--
ALTER TABLE `appeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `news_files`
--
ALTER TABLE `news_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `wishing_users`
--
ALTER TABLE `wishing_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
