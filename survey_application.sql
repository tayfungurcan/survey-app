-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Haz 2024, 17:42:51
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `survey_application`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `survey`
--

CREATE TABLE `survey` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(100) NOT NULL,
  `answerone` varchar(50) NOT NULL,
  `answertwo` varchar(50) NOT NULL,
  `answerthree` varchar(50) NOT NULL,
  `votecountone` int(10) UNSIGNED NOT NULL,
  `votecounttwo` int(10) UNSIGNED NOT NULL,
  `votecountthree` int(10) UNSIGNED NOT NULL,
  `totalvotes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `survey`
--

INSERT INTO `survey` (`id`, `question`, `answerone`, `answertwo`, `answerthree`, `votecountone`, `votecounttwo`, `votecountthree`, `totalvotes`) VALUES
(1, 'Web sitesi tasarımını nasıl buldunuz?', 'Mükemmel', 'Normal', 'Kötü', 48, 417, 2014, 2479);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `thosevoted`
--

CREATE TABLE `thosevoted` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(15) NOT NULL,
  `history` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `thosevoted`
--
ALTER TABLE `thosevoted`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `thosevoted`
--
ALTER TABLE `thosevoted`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
