-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Haz 2024, 04:15:20
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
-- Veritabanı: `mydatabase`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Strategy'),
(2, 'RPG'),
(3, 'Fear'),
(4, 'Survival'),
(5, 'Sport'),
(6, 'Race'),
(7, 'Action'),
(8, 'Rogue Like'),
(9, 'Free Games');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `video`, `price`, `image_url`, `category_id`) VALUES
(1, 'Idle Fishing', 'Relax and catch fish in a beautiful environment. Hire skilled crewmates, invest in lucrative buildings, unlock many boats & upgrades. Dive into the challenge of the fishing mini-game for an interactive experience unlike any other!', 'https://www.youtube.com/embed/LMTk8GfWKC0?si=3l4SNke4BgJ2Xb8F', 0.00, 'assets/gameınfopıcture/Idle Fishing.jpg', 9),
(2, 'Counter-Strike 2', 'Counter-Strike, 20 yıldan fazladır dünyanın her yerinden milyonlarca oyuncunun geri bildirimiyle şekillenen üstün rekabetçi oyun deneyimi sundu. Ve şimdi CS tarihinde yeni bir dönem başlıyor. Karşınızda Counter-Strike 2', 'https://www.youtube.com/embed/c80dVYcL69E?si=MkUamFfI7EM1G5Ax', 130.00, 'assets/gameınfopıcture/cs2.jpg', 1),
(3, 'Grand Theft Auto V', 'Grand Theft Auto V in PC sürümü, oyunculara 4k ve ötesinde çözünürlükle ve saniyede 60 kare tazeleme hızıyla Los Santos ve Blaine County dünyasını keşfetme fırsatını sunuyor.', 'https://www.youtube.com/embed/QkkoHAzjnUs?si=MdN_f90SaYTy6pVU', 150.00, 'assets/gameınfopıcture/gta.jpg', 1),
(4, 'EA SPORTS FC™ 24', 'EA SPORTS FC™ 24, sizi Dünyanın Oyununda karşılıyor: HyperMotionV, Opta tarafından optimize edilen OyunTarzları ve geliştirilmiş Frostbite™ Oyun Motoru ile bugüne kadarki en gerçekçi futbol deneyimi.', 'https://www.youtube.com/embed/XhP3Xh4LMA8?si=D3clxGSy5n9ihKzl', 180.00, 'assets/gameınfopıcture/fv24.jpg', 1),
(5, 'Stardew Valley', 'You ve inherited your grandfather s old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life. Can you learn to live off the land and turn these overgrown fields into a thriving home?', 'https://www.youtube.com/embed/ot7uXNQskhs?si=gM__grYrrg9hc_Lb', 165.00, 'assets/gameınfopıcture/stardew.jpg', 2),
(6, 'Forza Horizon 5', 'Dünyanın en iyi araçlarında sınırsız, eğlenceli sürücülük aksiyonuyla dolu Meksika nın capcanlı açık dünya manzaralarını keşfedin. Üst düzey Horizon Ralli deneyiminde engebeli Sierra Nueva yollarını fethedin. Forza Horizon 5 oyunu gerekir, genişletme ayrı satılır.', 'https://www.youtube.com/embed/FYH9n37B7Yw?si=txPAtVaWRPFLDbK4', 155.00, 'assets/gameınfopıcture/forza.jpg', 2),
(7, 'Tom Clancy s Rainbow Six® Siege', 'Tom Clancy’s Rainbow Six® Siege, başarılı planlamanın ve planları uygulamanın zafer kazandırdığı özel, taktiksel bir takım tabanlı nişancı oyunudur.', 'https://www.youtube.com/embed/6wlvYh0h63k?si=zFUu85ty-GDzsfcb', 235.00, 'assets/gameınfopıcture/rainbow.jpg', 2),
(8, 'Rust', 'The only aim in Rust is to survive. Everything wants you to die - the island’s wildlife and other inhabitants, the environment, other survivors. Do whatever it takes to last another night.', 'https://www.youtube.com/embed/LGcECozNXEw?si=fSExK19v5S1fHGSV', 350.00, 'assets/gameınfopıcture/rust.jpg', 2),
(9, 'Blazing Sails', 'Hızlı PvP korsan oyunu Blazing Sails de hayatta kalmak için savaş! Eşsiz korsanını ve gemini yarat. Güçlü gemini yönetmek için diğer oyuncularla birlik ol. Destansı kara ve deniz savaşlarında diğer mürettebatı yenerken farklı modları, haritaları, silahları, gemi türlerini ve daha fazlasını keşfet!', 'https://www.youtube.com/embed/ANI6LYQo5sk?si=2SQX_2nFwUwirT7p', 150.00, 'assets/gameınfopıcture/blazing sails.jpg', 3),
(10, 'NBA 2K24', 'NBA 2K24 te basket kültürünü deneyimle. MyCAREER da dolu dolu aksiyon ve sınırsız kişiselleştirilmiş MyPLAYER seçeneklerinin keyfini sür. MyTEAM de mükemmel kadronu oluştur. PLAY NOW da favori NBA ve WNBA takımlarınla oynarken, daha hassas oynanışı ve iyileştirilmiş görselleri', 'https://www.youtube.com/embed/OJS1BVniz5c?si=z92feWy78vlQjgtP', 443.00, 'assets/gameınfopıcture/nba2k24.jpg', 3),
(11, 'F1® 24', 'Gride katılın ve 20 Pilottan Biri Olun. 2024 FIA Formula One World Championship™’in resmi video oyunu EA SPORTS™ F1® 24’te en iyiler gibi sürün', 'https://www.youtube.com/embed/NnyCWsA6KSI?si=Ac1cDoRgsN8AM2FE', 643.00, 'assets/gameınfopıcture/f1.jpg', 3),
(12, 'MotoGP™24', 'Verin ara gazı, MotoGP™24 geri döndü! Devrim niteliğindeki Pilot Pazarı sayesinde 2024 sezonunun nefes kesici aksiyonunu ve sıra dışı mekânların manzaralarını bizzat deneyimle.', 'https://www.youtube.com/embed/8B-O-m-GDdU?si=hz-BA4C4yzZzuamo', 1500.00, 'assets/gameınfopıcture/motogp.jpg', 3),
(13, 'STAR WARS Jedi: Survivor™', 'Cal Kestis’in hikayesi, tüm galaksiyi kapsayan üçüncü şahıs aksiyon macera oyunu Star Wars Jedi: Survivor™’da devam ediyor', 'https://www.youtube.com/embed/VRaobDJjiec?si=7ahx-93i_DorVSlf', 2500.00, 'assets/gameınfopıcture/starwars.jpg', 4),
(14, 'Battlefield™ 2042', '7. Sezon: Turning Point’te ya hep ya hiç. Battlefield™ 2042, serinin ikonik topyekün savaşına geri dönüşün habercisi olan birinci şahıs nişancı oyunudur.', 'https://www.youtube.com/embed/ASzOzrB-a9E?si=unQcHJQ3wff0GMQR', 340.00, 'assets/gameınfopıcture/battlefield.jpg', 4),
(15, 'Escape the Backrooms', 'Escape the Backrooms, 1-4 oyunculu bir kooperatif korku keşif oyunudur. Varlıklardan ve diğer tehlikelerden kaçarken ürkütücü arka oda seviyelerinde gezin ve kaçmaya çalışın. Yeni seviyeler ve oyun modları içeren ücretsiz içerik güncellemeleri topluluğu ödüllendirmeye devam', 'https://www.youtube.com/embed/NaUNAAvxKe4?si=3-zSY-heus44cw94', 1300.00, 'assets/gameınfopıcture/escape the backrooms.jpg', 1),
(16, 'The Sims™ 4', 'Kuralların olmadığı sanal bir dünyada insan oluşturma ve kontrol etme gücünün tadına varın. Güçlü ve özgürsünüz; eğlenin, hayatla oynayın!', 'https://www.youtube.com/embed/DyNv44QR14g?si=4yf7r5qa71UyKBRU', 324.00, 'assets/gameınfopıcture/sims4.jpg', 4),
(17, 'The Witcher 3: Wild Hunt', 'Efsanevi kiralık canavar avcısı Rivialı Geralt rolüne bürünün. Savaştan harap olmuş, dört bir yanı canavarlarla kaplı bir kıta, keşfedilmek üzere sizi bekliyor. Sıradaki sözleşmenizse, dünyayı yeniden şekillendirebilecek güçte bir canlı silahı, Kehanetin Çocuğu Ciri yi bulmak.', 'https://www.youtube.com/embed/c0i88t0Kacs?si=plgfQ2RrWcal65pX', 1221.00, 'assets/gameınfopıcture/witcher.jpg', 4),
(18, 'Call of Duty®: Black Ops 6', 'Sinematik Tek Oyunculu Senaryosu, sınıfındaki en iyi Çok Oyunculu deneyimi ve efsanevi Raunt Bazlı Zombi Modu ile gelen Call of Duty®: Black Ops 6 yla Black Ops köklerine geri dönüyoruz!', 'https://www.youtube.com/embed/oyZY_BiTmd8?si=Yvmust23knTdNmAq', 586.00, 'assets/gameınfopıcture/callofduty.jpg', 5),
(19, 'Papers, Please', 'Congratulations. The October labor lottery is complete. Your name was pulled. For immediate placement, report to the Ministry of Admission at Grestin Border Checkpoint. An apartment will be provided for you and your family in East Grestin. Expect a Class-8 dwelling.', 'https://www.youtube.com/embed/_QP5X6fcukM?si=zNUUgXwsu7YGT2Ur', 15.00, 'assets/gameınfopıcture/paperplease.jpg', 5),
(20, 'Pixel Gun 3D', 'Efsanevi mobil çok oyunculu FPS Pixel Gun 3D bilgisayara geliyor! Geliştirilmiş, renkli ve bloklu bir aksiyon dünyasını deneyimle. Bir sürü oyun modu ve harita, 1500 den fazla silah, ayrıca platformlar arası çok oyunculu oyun ve ilerleme içeriyor.', 'https://www.youtube.com/embed/DsF8ueJkb6o?si=6RgsjsiyCrTH5pIs', 5.00, 'assets/gameınfopıcture/Pixel Gun 3D.jpg', 5),
(21, 'THE FINALS', 'Join THE FINALS, the world-famous, free-to-play, combat-centered game show! Fight alongside your teammates in virtual arenas that you can alter, exploit, and even destroy. Build your own playstyle in this first-person shooter to win escalating tournaments and lasting fame.', 'https://www.youtube.com/embed/8kWYWa3Jv2Q?si=WmdWlmJ8igvmudT6', 0.00, 'assets/gameınfopıcture/THE FINALS.jpg', 5),
(22, 'Destiny 2', 'Destiny 2, arkadaşlarınla birlikte istediğin zaman istediğin yerden tamamen ücretsiz olarak girebileceğin evrimleşen bir dünyayı içeren bir aksiyon MMO oyunudur.', 'https://www.youtube.com/embed/dZrxWFrd1zQ?si=em7S0oViBgyUjikx', 0.00, 'assets/gameınfopıcture/Destiny 2.jpg', 6),
(23, 'Warframe', 'Hikaye odaklı, oynaması ücretsiz çevrimiçi aksiyon oyununda durdurulamaz bir savaşçı olarak uyan ve arkadaşlarınla birlikte savaş.', 'https://www.youtube.com/embed/IbU6ShhUV90?si=fYYOmeq3fAr7jknN', 0.00, 'assets/gameınfopıcture/Warframe.jpg', 6),
(24, 'Dead Space', 'Bilim kurgu ve hayatta kalma korku klasiği, daha sürükleyici bir deneyim sunmak için baştan aşağı yeniden düzenlendi ve orijinal oyunun heyecan verici vizyonuna sadık kalarak görsel, ses ve oynanış geliştirmeleri içeriyor.', 'https://www.youtube.com/embed/ctQl9wa3ydE?si=k1CzmqqNdB9nWhs4', 121.00, 'assets/gameınfopıcture/Dead Space.jpg', 6),
(25, 'HELL LET LOOSE', 'Hell Let Loose, piyadeler, tanklar, toplar ve ilerleyen cephelerle 100 oyunculu açık savaş deneyimi sunan, İkinci Dünya Savaşında geçen gerçekçi, birinci şahıs nişancı oyunudur. Öğrenmesi kolay, ustalaşması zor olan benzersiz kaynak tabanlı stratejik meta oyun temellidir. İkinci Dünya Savaşını böylesi bir ölçekte', 'https://www.youtube.com/embed/S3hLu58KXg8?si=43eYp_n2WA5QLujL', 132.00, 'assets/gameınfopıcture/HELL LET LOOSE.jpg', 6),
(26, 'Dredge', 'Dredge, uğursuz akıntıya sahip denizde geçen tek oyunculu bir balıkçılık macerasıdır. Yakaladıklarını sat, tekneni geliştir ve uzun süredir gömülü sırlar için derinlikleri tara. Gizemli bir takımada keşfet ve bazı şeylerin neden unutulmuş olarak kalması gerektiğini keşfet.', 'https://www.youtube.com/embed/ZtTfROTgYKA?si=9Sb9sA2dNL010CCj', 320.00, 'assets/gameınfopıcture/DREDGE.jpg', 7),
(27, 'Blasphemous 2', 'Tövbe Eden, Blasphemous 2 nin Mucize ye karşı bitmek bilmeyen bir mücadelede ona bir kez daha katılmasıyla uyanır. Keşfedilmeyi bekleyen gizemler ve sırlar ile dolu tehlikeli yeni bir dünyaya dalıp döngüyü kati olarak sona erdirme arayışın ile aranda duran canavarca düşmanların arasından ilerle.', 'https://www.youtube.com/embed/6C6_dd73NtU?si=BHCceIQoDj-e4JRF', 102.00, 'assets/gameınfopıcture/Blasphemous 2.jpg', 7),
(28, 'Diablo IV', 'Aksiyon rol yapma macera oyunlarının en iyisi Diablo® IV te Korunak için savaşa katıl. Büyük beğeni toplayan seferi ve yeni sezon içeriğini deneyimle.', 'https://www.youtube.com/embed/mtM0WpHEjWU?si=R3HnxQKonfHhUuH0', 523.00, 'assets/gameınfopıcture/Diablo IV.jpg', 7),
(29, 'Lost Ark', 'Embark on an odyssey for the Lost Ark in a vast, vibrant world: explore new lands, seek out lost treasures, and test yourself in thrilling action combat in this action-packed free-to-play RPG', 'https://www.youtube.com/embed/Udwbd5X0zbg?si=Ry2u2LWCXrVcC8X2', 1503.00, 'assets/gameınfopıcture/Lost Ark.jpg', 7),
(30, 'Guild Wars 2', '', 'Guild Wars 2 is an award-winning online roleplaying game with fast-paced action combat, deep character customization, and no subscription fee required. Choose from an arsenal of professions and weapons, explore a vast open world, compete in PVP modes and more. Join over 16 million players now!', 0.00, 'assets/gameınfopıcture/Guild Wars 2.jpg', 8),
(31, 'FINAL FANTASY XV', 'Take the journey, now in ultimate quality. Boasting a wealth of bonus content and supporting ultra high-resolution graphical options and HDR 10, you can now enjoy the beautiful and carefully-crafted experience of FINAL FANTASY XV like never before', 'https://www.youtube.com/embed/IiI7SMQA59Q?si=wrShAVDHmMMJPy58', 24.00, 'assets/gameınfopıcture/FINAL FANTASY XIV.jpg', 8),
(32, 'Legend Bowl', 'Legend Bowl is a throwback to the classic 8-bit and 16-bit football games of the past. Take to the gridiron and fight your way to becoming a football legend! Enjoy sim-style gameplay, realistic weather, detailed stats, franchise mode, tournament mode, fully customizable rosters, and much much more!', 'https://www.youtube.com/embed/7NgAihXUUh0?si=X4IYw0iaVCn93LMH', 8.00, 'assets/gameınfopıcture/Legend Bowl.jpg', 8),
(33, 'Undisputed', 'Become Undisputed in the most authentic boxing game to date! Featuring true to life visuals, bone-jarring action, and more licensed boxers than ever before, Undisputed gives you unprecedented control to master every inch of the ring', 'https://www.youtube.com/embed/PyKMZjEfFms?si=D1Ipl85nBNZraxrx', 15.00, 'assets/gameınfopıcture/Undisputed.jpg', 8),
(34, 'eFootball 2024', 'En güncel verilerle heyecan dolu futbol klasiği! eFootball™ 2024 te ""gerçek futbol"" coşkusunu yaşayın!', 'https://www.youtube.com/embed/BdyXsZMPjWo?si=Wy9ZT_qZNBn8eL9l', 0.00, 'assets/gameınfopıcture/eFootball 2024.jpg', 9),
(35, 'Dota 2', 'Her gün dünya çapındaki milyonlarca oyuncu yüzden fazla Dota kahramanından birisiyle savaşa giriyor. İster 10 isterseniz 1000 saat oynamış olun; gelen güncellemelerle Dota daki özellikler, oynanış ve karakterler sürekli değişip geliştiğinden, her zaman keşfedilecek yeni şeyler bulabilirsiniz.', 'https://www.youtube.com/embed/-cSFPIwMEq4?si=y70-7KCMy8lzEdNV', 0.00, 'assets/gameınfopıcture/Dota 2.jpg', 9),
(36, 'Deep Rock Galactic', 'Deep Rock Galactic sert uzay Cücelerinin, %100 yok edilebilir çevrelerin, yöntemsel oluşturulmuş mağaraların ve uzaylı canavarlardan sonsuz sürülerin olduğu bir co-op birinci bilim kurgu FPS oyunudur.', 'https://www.youtube.com/embed/5eUzjWeLU80?si=62HLKZiJnNiVXgY8 ', 0.00, 'assets/gameınfopıcture/Deep Rock Galactic.jpg', 9);
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `game_id`, `purchase_date`) VALUES
(34, 1, 8, '2024-06-16 02:14:09'),
(35, 1, 7, '2024-06-16 02:14:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `role`) VALUES
(1, 'a', '$2y$10$fxOOeh9YwY06ylPoIoYVbup13IH6q6vkaSBnTbnVWWzs3Ay2.BRwu', 'a', 'a', 'admin'),
(2, 'b', '$2y$10$cO.JOju8pE5XZ9ONmAL72.ViYOZxiYzgr2nosIQ8xUhRCiD06KFNK', 'b', 'b', 'user'),
(3, 'c', '$2y$10$OooOmaKCAN0Gfaawnlt0J.Ve83TT4eFAt4YdB92T.A4ZtUgA6tT42', 'c', 'c', 'user');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_games`
--

CREATE TABLE `user_games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Tablo için indeksler `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user_games`
--
ALTER TABLE `user_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Tablo kısıtlamaları `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user_games`
--
ALTER TABLE `user_games`
  ADD CONSTRAINT `user_games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_games_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
