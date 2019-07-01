-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 27 2019 г., 14:22
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
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 'Здравствуйте! Я рад, что у нас на предприятии появился НЕЗАВИСИМЫЙ профсоюз', '2019-06-21', 7),
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'Здравствуйте! Я рад, что у нас на предприятии появился НЕЗАВИСИМЫЙ профсоюз', '2019-06-21', 7),
(3, 'макаревич', 'инженер', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', 'бла бла', '2019-06-22', 1),
(4, 'макаревич', 'инженер', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', 'бла бла', '2019-06-22', 1),
(5, 'Макаревич Александр Валерьевич', 'Инженер-электрик', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', 'привет мир', '2019-06-24', 9);

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
(2, 'admin', 'admin', 'Уважаемые члены профсоюза! Пишите свои комментарии. Только, пожалуйста, без нецензурной лексики и оскорблений:) Ведь мы с Вами культурные люди. Спасибо!', 1, '0000-00-00'),
(3, 'admin', 'admin', 'Траляля ', 1, '2019-06-26'),
(4, 'admin', 'admin', 'пам пам пам', 1, '2019-06-26'),
(5, 'admin', 'admin', 'ля ля ля', 2, '2019-06-26'),
(6, 'admin', 'admin', 'ля ля ля', 2, '2019-06-26'),
(27, 'admin', 'admin', 'А может не будем ля ля', 1, '2019-06-26');

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
(1, 'Конфликт строителя монтажника отдела 418 с руководством', '<p>\r\n                25 июня 2019г. нам поступило обращение от Митрофанова Никиты Юрьевича, трудящегося на должности \r\n                строителя монтажника в секторе таком-то отдела такого-то. \r\n            </p>\r\n            <p>\r\n                18 июня руководитель сектора 444444 дал устное распоряжение Митрофанову Н. Ю. производить работы \r\n                на крыше корпуса №1 по ремонту кровли.\r\n                Работа подразумевает раскатку рубероида, работу с газовой горелкой. Примечательно то, что 18.06.19г. температура воздуха\r\n                улице составляла 29 градусов цельсия. Согласно ТК РФ работы при температуре более 25 градусов цельсия\r\n                должны совершаться с перерывами не менее 10 минут и протяженностью не более 40 минут за подход. При этом работники,\r\n                совершающие работу при таких условиях, должны быть обеспечены питьевой водой в количестве не менее 1,5 литра в смену.\r\n                При этом время одной смены не должно превышать 6,5 часов.\r\n            </p>\r\n            <p>\r\n                В связи с чем Митрофанов Н.Ю. потребовал от руководства выполнения обязательств по обеспечению условий труда и условий безопасности труда.\r\n                На что руководитель сектора Гнида Л.Ч. нет друзей ответил отказом, в повышеном тоне приказал выполнять то,\r\n                что сказано, не обеспечил требуемые условия, и пригразил тем, что, в случае отказа от работы, Митрофанов будет писать объяснительную,\r\n                и более того будет уволен, если будет себя так вести.\r\n            </p>\r\n            <p>\r\n                В связи со сложившейся ситуацией Профсоюз составил жалобу на имя директора, в которой указал на некомпетентность Гниды, на несправедливое \r\n                и неправомерное отношение к подчиненному, с требованием вынести Гниде выговор с занесением в дело и предупредить Гниду о том, что при повторном нарушении\r\n                трудового кодекса в течении года, он будет уволен по статье.\r\n            </p>', '0000-00-00'),
(2, 'Конфликт строителя монтажника отдела 418 с руководством', '<p>\r\n                25 июня 2019г. нам поступило обращение от Митрофанова Никиты Юрьевича, трудящегося на должности \r\n                строителя монтажника в секторе таком-то отдела такого-то. \r\n            </p>\r\n            <p>\r\n                18 июня руководитель сектора 444444 дал устное распоряжение Митрофанову Н. Ю. производить работы \r\n                на крыше корпуса №1 по ремонту кровли.\r\n                Работа подразумевает раскатку рубероида, работу с газовой горелкой. Примечательно то, что 18.06.19г. температура воздуха\r\n                улице составляла 29 градусов цельсия. Согласно ТК РФ работы при температуре более 25 градусов цельсия\r\n                должны совершаться с перерывами не менее 10 минут и протяженностью не более 40 минут за подход. При этом работники,\r\n                совершающие работу при таких условиях, должны быть обеспечены питьевой водой в количестве не менее 1,5 литра в смену.\r\n                При этом время одной смены не должно превышать 6,5 часов.\r\n            </p>\r\n            <p>\r\n                В связи с чем Митрофанов Н.Ю. потребовал от руководства выполнения обязательств по обеспечению условий труда и условий безопасности труда.\r\n                На что руководитель сектора Гнида Л.Ч. нет друзей ответил отказом, в повышеном тоне приказал выполнять то,\r\n                что сказано, не обеспечил требуемые условия, и пригразил тем, что, в случае отказа от работы, Митрофанов будет писать объяснительную,\r\n                и более того будет уволен, если будет себя так вести.\r\n            </p>\r\n            <p>\r\n                В связи со сложившейся ситуацией Профсоюз составил жалобу на имя директора, в которой указал на некомпетентность Гниды, на несправедливое \r\n                и неправомерное отношение к подчиненному, с требованием вынести Гниде выговор с занесением в дело и предупредить Гниду о том, что при повторном нарушении\r\n                трудового кодекса в течении года, он будет уволен по статье.\r\n            </p>', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `news_files`
--

CREATE TABLE `news_files` (
  `id` int(11) NOT NULL,
  `file` varchar(250) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '2019-06-19'),
(8, 'человек', 'человек', '666', '89996664455', 'человек@человек.ru', 'человек', 'человек', '0000-00-00'),
(9, 'Макаревич Александр Валерьевич', 'Инженер-электрик', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', 'makarevich.a.v', 'fb37c370f22fe282ab9c46e2531d198d', '2019-06-24'),
(10, 'admin', 'admin', 'profcom', '89774625877', 'profcom.ciam@gmail.com', 'admin', '762da318e7101c84b45bcf442778833a', '2019-06-24');

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
(6, 'Макаревич Александр Валерьевич', 'Инженер-электрик', '40101-4', '89774625877', 'makarevich.a.v@yandex.ru', '2019-06-24');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news_files`
--
ALTER TABLE `news_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `wishing_users`
--
ALTER TABLE `wishing_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
