-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 31 2022 г., 03:42
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `leadersearch`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_product` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `img`, `desc_product`, `price`) VALUES
(1, 'image1.png', 'Увлажнитель воздуха STARWIND SHC1322, 3л, белый\r\n', 1650),
(2, 'image2.png', 'Триммер PHILIPS HC3521/15 серебристый/черный\r\n', 2290),
(3, 'image3.png', 'Фитнес-трекер HONOR Band 5 CRS-B19S, 0.95\", розовый', 2390),
(4, 'image4.png', 'Мышь A4TECH Bloody V3, игровая, оптическая, проводная, USB, черный', 960),
(5, 'image5.png', 'Фитнес-трекер HONOR Band 5 CRS-B19S, 0.95\", черный', 2390),
(6, 'image6.png', 'Пылесос SINBO SVC 3497, 2500Вт, синий/серый', 5670),
(7, 'image7.png', 'Планшет DIGMA Optima 7 Z800 Android 10.0 серебристый', 9490),
(8, 'image8.png', 'Монитор игровой ACER Nitro RG241YPbiipx 23.8\" черный', 16800),
(9, 'image9.png', 'Экшн-камера DIGMA DiCam 310 4K, WiFi, черный', 2290),
(10, 'image10.png', 'Умная колонка ЯНДЕКС c голосовым помощником Алисой, серебристый', 5670),
(11, 'image11.png', 'Квадрокоптер DJI Mini 2 MT2PD Fly More Combo с камерой, серый', 60990),
(12, 'image12.png', 'Шлем виртуальной реальности HTC Vive PRO Eye EEA, черный/синий', 11960),
(13, 'image13.png', 'МФУ лазерный CANON i-Sensys MF445dw, A4, лазерный, черный', 35310),
(14, 'image14.png', 'Смарт-часы AMAZFIT Bip U, 1.43\", зеленый / зеленый', 4490),
(15, 'image15.png', 'Кофемашина PHILIPS EP1224/00, серый/черный', 29990),
(16, 'image16.png', 'Гироскутер MIZAR MZ10,5CN, 10.5\", карбон', 12990);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
