-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2024, 20:31:57
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
-- Veritabanı: `psychology_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `date`, `time`) VALUES
(1, 3, '2024-06-12', '10:30:00'),
(2, 4, '2024-06-12', '10:45:00'),
(3, 5, '2024-06-13', '11:00:00'),
(4, 5, '2024-06-20', '11:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `date`) VALUES
(2, 3, 'Terapilerin ilk seansından sonra bile mental olarak rahatladığımı söyleyebilirim.', '2024-05-27 23:53:38'),
(3, 4, 'Hocalar gerçekten alanında uzman kişiler çok cana yakınlar.', '2024-05-28 00:42:54'),
(4, 5, 'Kaliteli bir klinik.', '2024-05-28 01:26:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `name`, `surname`) VALUES
(2, 'kullanici2', '$2y$10$AZQ..Po5kuCdqb9.E6UvYuZisu6e6RKHnMJAT25fsTBb8vi/9TUNO', 'user', 'mehmetsoy@gmail.com', 'mehmet', 'soy'),
(3, 'kullanici3', '$2y$10$nJEeA5K900FsIBH.CVYshushI5Y5c2XErkRixZnkJmFh/qpWuG6.y', 'user', 'cevdetsoy@gmail.com', 'cevdet', 'soy'),
(4, 'kullanici5', '$2y$10$oQAaF6L.vhufQJG.oqLIJu.w8a/dxLeClP7Y.CgExqsZu86oOQQF.', 'user', 'dilarasoy@gmail.com', 'dilara', 'soy'),
(5, 'kullanici6', '$2y$10$pLKtvKhE45r/cPKuwW4DtuLVTfdFq7Hu.UA1PyiQG26ZL8tEVIvO.', 'user', 'selensoy@gmail.com', 'selen', 'soy');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
