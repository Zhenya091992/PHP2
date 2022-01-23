-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2022 г., 20:46
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameAuthor` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `nameAuthor`) VALUES
(1, 'Вася Пупкин'),
(2, 'Конь в пальто'),
(3, 'Сорока');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `shortDescription`, `text`, `author_id`) VALUES
(13, 'Президент США Джо Байден встретился с Тихановской', ' Светлана Тихановская призвала президента США Байдена помочь сделать Беларусь успешным примером ненасильственного перехода к демократии.', '«Для меня было честью встретиться сегодня утром с госпожой Тихановской в Белом доме. Соединенные Штаты солидарны с Беларусью в ее стремлении к демократии и универсальным правам человека», – написал Байден в «Твиттере» по итогам встречи.\r\n\r\nПо словам Тихановской, пишет Голос Америки, встреча, продолжавшаяся около пятнадцати минут, была очень теплой.\r\n\r\n«Я увидела человека, которому небезразлично то, что происходит в Беларуси», – подчеркнула она.\r\n\r\n«Я донесла до господина президента наши месседжи, – сказала Тихановская, – что в Беларуси – борьба не геополитическая: это наша борьба против насилия, против беззакония».\r\n\r\nРанее Тихановская посетила Нью-Йорк, где встретилась с белорусской диаспорой\r\n\r\nЛидер оппозиции Беларуси находится с визитом в США уже десять дней; во время ее пребывания в Вашингтоне с ней провели встречи высокопоставленные представители администрации, включая госсекретаря Энтони Блинкена, замгоссекретаря Викторию Нуланд и советника по национальной безопасности Джейка Салливана. Кроме того, с Тихановской встретились американские законодатели, в том числе глава сенатского комитета по международным делам Боб Менендес.\r\n\r\n\r\nНапомним, что для поддержки белорусского демократического движения в Конгрессе недавно был создан кокус «Друзья Беларуси».\r\n\r\nВ ходе пребывания в Вашингтоне и Нью-Йорке Светлана Тихановская встретилась с белорусской диаспорой.\r\n\r\nТихановская выступает за то, чтобы США сыграли роль посредника в возможных переговорах между белорусской оппозицией и официальным Минском.\r\n\r\nВ ходе визита лидер оппозиции Беларуси призвала США к усилению давления на режим Александра Лукашенко. Беседуя с журналистами, она сообщила, что представила руководству США перечень белорусских предприятий, который оппозиция считает необходимым включить в санкционный список.', 3),
(14, 'Украина предоставит Литве колючую проволоку для обустройства границы с Беларусью', ' Украина намерена предоставить Литве гуманитарную помощь в виде колючей проволоки для обустройства границы с Беларусью.', ' Соответствующий проект указа президента был одобрен на заседании правительства в среду.\r\nПо словам министра иностранных дел Украины Дмитрия Кулебы, такое решение связано со сложившейся критической ситуацией на границе Литвы с Беларусью и обращения литовской стороны.\r\nВ частности, речь идет о том, что критически выросло количество нелегальных мигрантов, которые попадают в Литву со стороны Беларуси.', 1),
(44, '123', '1234', '1234', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `persons`
--

CREATE TABLE `persons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `age`) VALUES
(1, 'Иван', 'Иванов', 42),
(2, 'Nik', 'Vasovsky', 22),
(3, 'Никита', 'Алексеев', 29),
(4, 'Abdul', 'Abdurahmanov', 56),
(5, 'Valera', 'Korch', 22),
(9, 'Valera', 'Korch', 22),
(10, 'Valera', 'Korch', 22),
(11, 'Valera', 'Korch', 22),
(12, 'Valera', 'Korch', 22),
(13, '', '', 0),
(14, 'qwerty', 'asdasdfsd', 33),
(15, 'qwerty', 'asdasdfsd', 33),
(16, 'qwerty', 'asdasdfsd', 33),
(17, 'qwerty', 'asdasdfsd', 33),
(18, 'qwerty', 'asdasdfsd', 33),
(19, 'qwerty', 'asdasdfsd', 33),
(20, 'qwerty', 'asdasdfsd', 33),
(21, 'qwerty', 'asdasdfsd', 33),
(22, 'qwerty', 'asdasdfsd', 33),
(23, 'qwerty', 'asdasdfsd', 33),
(24, 'qwerty', 'asdasdfsd', 33),
(25, 'qwerty', 'asdasdfsd', 33),
(26, 'qwerty', 'asdasdfsd', 33),
(27, 'qwerty', 'asdasdfsd', 33),
(28, 'qwerty', 'asdasdfsd', 33),
(29, 'qwerty', 'asdasdfsd', 33),
(30, 'qwerty', 'asdasdfsd', 33),
(31, 'qwerty', 'asdasdfsd', 33),
(32, 'qwerty', 'asdasdfsd', 33),
(33, 'qwerty', 'asdasdfsd', 33),
(34, 'qwerty', 'asdasdfsd', 33),
(35, 'qwerty', 'asdasdfsd', 33),
(36, 'qwerty', 'asdasdfsd', 33),
(37, 'qwerty', 'asdasdfsd', 33),
(38, 'qwerty', 'asdasdfsd', 33),
(39, 'qwerty', 'asdasdfsd', 33),
(40, 'qwerty', 'asdasdfsd', 33),
(41, 'qwerty', 'asdasdfsd', 33),
(42, 'qwerty', 'asdasdfsd', 33),
(43, 'qwerty', 'asdasdfsd', 33),
(44, 'qwerty', 'asdasdfsd', 33),
(45, 'qwerty', 'asdasdfsd', 33),
(46, 'qwerty', 'asdasdfsd', 33),
(47, 'qwerty', 'asdasdfsd', 33),
(48, 'qwerty', 'asdasdfsd', 33),
(49, 'qwerty', 'asdasdfsd', 33),
(50, 'qwerty', 'asdasdfsd', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `test`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameUser` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nameUser`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `persons`
--
ALTER TABLE `persons`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `persons`
--
ALTER TABLE `persons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
