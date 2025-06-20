-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2025 г., 10:54
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photo_studio`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `service_id` int DEFAULT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_phone` varchar(20) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `price` varchar(50) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `price`, `image_path`) VALUES
(1, 'Портретная съемка', 'Погрузитесь в мир индивидуальности с нашими портретами. Мы создадим атмосферу, в которой вы сможете раскрыть свою истинную сущность.', '5000 руб./час', './img/unnamed (1).jpg'),
(2, 'Семейные фотосессии', 'Сохраните теплые моменты с близкими. Наша команда поможет вам создать уютные и естественные фотографии, которые будут радовать вас долгие годы.', '6000 руб./час', './img/unnamed sem.png'),
(3, 'Свадебная фотография', 'Ваш самый важный день заслуживает лучшего. Мы запечатлим каждую деталь, каждую эмоцию, чтобы вы могли вновь пережить эти мгновения.', '8000 руб./час', './img/unnamed (2).jpg'),
(4, 'Коммерческая съемка', 'Повысьте привлекательность вашего бизнеса с помощью профессиональных фотографий. Мы создадим визуальный контент, который выделит вас на фоне конкурентов.', '7000 руб./час', './img/image.jpg'),
(5, 'Фотосессии для детей', 'Дети растут так быстро! Зафиксируйте их самые милые моменты с помощью наших веселых и креативных фотосессий.', '5500 руб./час', './img/diploma.png'),
(6, 'Тематические фотосессии', 'Хотите что-то необычное? Мы предлагаем тематические фотосессии, которые отражают ваши увлечения и интересы. Дайте волю своему воображению!', '6500 руб./час', './img/tem.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
