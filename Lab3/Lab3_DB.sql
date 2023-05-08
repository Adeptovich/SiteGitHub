-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 08 2023 г., 22:39
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
-- Структура таблицы `firstbase`
--

CREATE TABLE `firstbase` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `number1` int(15) NOT NULL,
  `id_building` int(10) UNSIGNED NOT NULL,
  `equipment` varchar(255) DEFAULT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `firstbase`
--

INSERT INTO `firstbase` (`id`, `img_path`, `number1`, `id_building`, `equipment`, `capacity`) VALUES
(9, 'no_img.png', 26, 1, '25 стульев, 11 столов, компьютер, проектор, доска', 21),
(10, 'no_img.png', 12, 2, '52 стульев, 24 столов, компьютер, проектор, доска', 35),
(11, 'no_img.png', 20, 1, '10 стульев, 5 столов, компьютер, проектор, доска', 10),
(12, 'no_img.png', 41, 2, '35 стульев, 30 столов, 25 компьютеров, проектор, доска', 25),
(13, 'no_img.png', 2, 1, '20 стульев, 11 столов, 11 компьютеров, проектор, доска', 11),
(14, 'no_img.png', 8, 2, '19 стульев, 15 столов, 12 компьютер, проектор, доска', 20),
(15, 'no_img.png', 35, 1, '5 стульев, 5 столов, 3 компьютера, проектор, доска', 6);

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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `blood_type` int(5) DEFAULT NULL,
  `factor` varchar(25) DEFAULT NULL,
  `vk` varchar(125) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `blood_type`, `factor`, `vk`, `password`, `salt`) VALUES
(1, 'lexablaze@yandex.ru', 1, 'plus', '', '8da78991d5d7999836f426cb8794aef3', ''),
(2, 'pptonar27@gmail.com', 4, 'minus', '', '8da78991d5d7999836f426cb8794aef3', ''),
(3, 'Test22@mail.ru', 1, 'minus', '', '8da78991d5d7999836f426cb8794aef3', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `firstbase`
--
ALTER TABLE `firstbase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number1` (`number1`),
  ADD UNIQUE KEY `equipment` (`equipment`,`capacity`),
  ADD KEY `id_building` (`id_building`),
  ADD KEY `id_building_2` (`id_building`),
  ADD KEY `id_building_3` (`id_building`);

--
-- Индексы таблицы `s_base`
--
ALTER TABLE `s_base`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `build` (`build`),
  ADD UNIQUE KEY `build_2` (`build`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `firstbase`
--
ALTER TABLE `firstbase`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
