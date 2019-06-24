-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 22 2019 г., 19:19
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

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
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 'Здравствуйте! Я рад, что у нас на предприятии появился НЕЗАВИСИМЫЙ профсоюз', '2019-06-21', 7),
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'Здравствуйте! Я рад, что у нас на предприятии появился НЕЗАВИСИМЫЙ профсоюз', '2019-06-21', 7),
(3, 'макаревич', 'инженер', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', 'бла бла', '2019-06-22', 1),
(4, 'макаревич', 'инженер', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', 'бла бла', '2019-06-22', 1);

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
(1, 'макаревич', 'инженер', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', 'макар', '82490656cd72646d4b2921304e9d6a41', '0000-00-00'),
(2, 'петров', 'инженер', '40101-4', '89998446939', 'ksyunya.boginskaya@mail.ru', '', 'ксюня', '0000-00-00'),
(4, 'Иванов Иван', 'электрик', '406', '89999999999', 'ivanov.i.i@gmail.com', '', 'ивановиван', '0000-00-00'),
(5, 'Иванов Иван', 'электрик', '406', '89999999999', 'ivanov.i.i@gmail.com', '', 'ивановиван', '2019-06-15'),
(7, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '2019-06-19');

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
(2, 'Макаревич Александр Валерьевич', 'Инженер-электрик', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', '0000-00-00'),
(3, 'Александр', 'Инженер электрик', 'advav', '89774625877', 'makarevich.a.v@yandex.ru', '0000-00-00'),
(4, 'Александр', 'Инженер электрик', 'advav', '89774625877', 'makarevich.a.v@yandex.ru', '0000-00-00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appeals`
--
ALTER TABLE `appeals`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `wishing_users`
--
ALTER TABLE `wishing_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
