-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 23 2023 г., 17:12
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mainbase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `s_base`
--

CREATE TABLE `s_base` (
  `id` int(11) UNSIGNED NOT NULL,
  `build` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `s_base`
--

INSERT INTO `s_base` (`id`, `build`) VALUES
(2, 'Второй корпус'),
(1, 'Первый корпус');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `s_base`
--
ALTER TABLE `s_base`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `build` (`build`),
  ADD UNIQUE KEY `build_2` (`build`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `s_base`
--
ALTER TABLE `s_base`
  ADD CONSTRAINT `s_base_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firstbase` (`id_building`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
