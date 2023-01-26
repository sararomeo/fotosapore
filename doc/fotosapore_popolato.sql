-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 26, 2023 alle 12:07
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotosapore`
--
CREATE DATABASE IF NOT EXISTS `fotosapore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fotosapore`;

-- --------------------------------------------------------

--
-- Struttura della tabella `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `commentText` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UserID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `comment`
--

INSERT INTO `comment` (`commentID`, `commentText`, `timestamp`, `UserID`, `postID`) VALUES
(1, 'WOW that\'a really grate recipe. Thaks you :) ', '2023-01-26 10:26:05', 1, 5),
(2, 'Tasty i will try it. ', '2023-01-26 10:40:40', 5, 4),
(3, 'That seams really refreshing. 10/10 recipe', '2023-01-26 10:41:03', 5, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `followers`
--

CREATE TABLE `followers` (
  `user` int(10) NOT NULL,
  `follower` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `followers`
--

INSERT INTO `followers` (`user`, `follower`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 3),
(2, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `likes`
--

INSERT INTO `likes` (`postID`, `userID`) VALUES
(1, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notification`
--

INSERT INTO `notification` (`notificationID`, `userID`, `time`, `text`) VALUES
(1, 2, '2023-01-26 10:12:02', 'chef_luca has published a new post!'),
(2, 2, '2023-01-26 10:26:05', 'chef_luca has commented on your post!'),
(3, 1, '2023-01-26 10:40:40', 'beatrix has commented on your post!'),
(4, 1, '2023-01-26 10:41:03', 'beatrix has commented on your post!');

-- --------------------------------------------------------

--
-- Struttura della tabella `post`
--

CREATE TABLE `post` (
  `postID` int(10) NOT NULL,
  `title` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `caption` text NOT NULL,
  `recipe` text NOT NULL,
  `imagePath` text NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `post`
--

INSERT INTO `post` (`postID`, `title`, `timestamp`, `caption`, `recipe`, `imagePath`, `userID`) VALUES
(1, 'banana cake', '2023-01-26 09:57:03', 'A really nice recipe fun and easy to make.', 'The recipe starts with 3 mashed bananas (above). Now, make sure those bananas are nice and spotty. The bananas you see above are just right (and it’s what you want for banana bread and banana muffins, too). More brown spots = sweeter, more banana flavor. Your cake will thank you. I simply mash the bananas in my mixer– the same mixer I use for creaming the butter and sugars. Beat the bananas on high speed for a minute, then transfer to another bowl. I don’t even wash the mixing bowl– just throw the butter right in and start creaming!', 'banana_cake.jpg', 1),
(2, 'Mojito', '2023-01-26 10:01:57', 'Mix this classic cocktail for a party using fresh mint, white rum, sugar, zesty lime and cooling soda water. Play with the quantities to suit your taste.', 'STEP 1\r\nMuddle the lime juice, sugar and mint leaves in a small jug, crushing the mint as you go – you can use the end of a rolling pin for this. Pour into a tall glass and add a handful of ice.\r\n\r\nSTEP 2\r\nPour over the rum, stirring with a long-handled spoon. Top up with soda water, garnish with mint and serve.', 'mojit.jpg', 1),
(3, 'Banana daiquiri', '2023-01-26 10:05:53', 'Bring sunshine to your cocktail repertoire in the form of a punchy, fun banana daiquiri. Garnish with banana slices, lime wedges or cocktail cherries', 'STEP 1\r\nPut the rum, banana liqueur, lime juice, banana and ice in a blender suitable for crushing ice, and blitz until smooth.\r\n\r\nSTEP 2\r\nPour the drink into a hurricane or other tall glass, and garnish with banana slices or chips, lime wedges or cocktail cherries, if you like (we skewered two cocktail cherries and a lime wedge on a cocktail stick).', 'banana_daiquiri.jpg', 1),
(4, 'Carbonara', '2023-01-26 10:12:02', 'A really easy recipe to perform with really good results. ', 'Ingredients\r\nspaghetti 12 OZ guanciale 4 OZ very fresh egg yolks 4 aged Pecorino Romano cheese, grated  2 TBSP Grana Padano cheese, grated salt black pepper\r\n\r\nSteps:\r\nTo make classic carbonara, first cut the guanciale into 1/4-inch layers, then into long, 2-inch strips. Combine the egg yolks with the grated cheeses and a pinch of black pepper. If desired, add 2 tbsp milk for a creamier sauce. Heat 1 tbsp oil in a frying pan and brown the strips of guanciale for 2 minutes until crisp, then turn off the heat and leave to cool. Cook the pasta in plenty of salted water; set aside a ladleful of the pasta water, then drain the pasta once it is cooked al dente. Pour the reserved hot water into the part of the frying pan containing the cooled guanciale: this will prevent the pasta from drying out. Transfer the pasta to the same pan and mix together,|then add the yolk and cheese mixture, stirring rapidly. In the warm pan with the hot pasta, the eggs will cook gently and become creamy. It is important to do this part quickly to prevent the yolks from congealing and taking on the texture of scrambled eggs. Season with freshly-milled black pepper and serve immediately on heated plates.', 'carbonara.jpg', 1),
(5, 'Homemade Lasagna', '2023-01-26 10:16:50', 'Everyone loves a good lasagna, right? It\'s a great way to feed a crowd and a perfect dish to bring to a potluck. It freezes well. It reheats well. Leftovers will keep you happy for days. ', ' For this recipe, we are essentially making a thick, meaty tomato sauce and layering that with noodles and cheese into a casserole. Here\'s the run-down:\r\nStart by making the sauce with ground beef, bell peppers, onions, and a combo of tomato sauce, tomato paste, and crushed tomatoes. The three kinds of tomatoes gives the sauce great depth of flavor.\r\nLet this simmer while you boil the noodles and get the cheeses ready. We\'re using ricotta, shredded mozzarella, and parmesan -- like the mix of tomatoes, this 3-cheese blend gives the lasagna great flavor!\r\nFrom there, it\'s just an assembly job. A cup of meat sauce, a layer of noodles, more sauce, followed by a layer of cheese. Repeat until you have three layers and have used up all the ingredients.\r\nBake until bubbly and you\'re ready to eat!\r\n', 'lasagna.jpg', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `tags`
--

CREATE TABLE `tags` (
  `postID` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tags`
--

INSERT INTO `tags` (`postID`, `tag`) VALUES
(1, 'banana'),
(1, 'breakfast'),
(1, 'cake'),
(1, 'easy'),
(2, 'cocktail'),
(2, 'mojito'),
(2, 'refreshing'),
(2, 'summer'),
(3, ''),
(3, 'banana'),
(3, 'cocktail'),
(4, 'carbonara'),
(4, 'eggs'),
(4, 'italian'),
(4, 'italianfood'),
(4, 'spaghetti'),
(5, ''),
(5, 'dinner'),
(5, 'italian'),
(5, 'italianfood'),
(5, 'lasagna'),
(5, 'lunch');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(512) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`userID`, `email`, `username`, `password`, `bio`) VALUES
(1, 'luca.babboni01@gmail.com', 'chef_luca', '$2y$10$VQyf8AYoTLB9c8utsMVtPupojtMIRB6DRh.hkLe.WN8tKOwoXKKUm', 'Hello world, i\'m a amateur chef that like coocking for fun :D.'),
(2, 'kara3ka@gmail.com', 'chef_sara', '$2y$10$ZvMw.q4PNzVT0uXyZGqos.QsukIWz6BSmETX1DhHd3K5.sh8SOveq', 'Always looking for food. '),
(3, 'tony@mail.it', 'tony', '$2y$10$jJYM5C5gGUGeE5FYYTtlJ.j.bkibhlD3yjDpvVjIXtZmrYY/KWN.K', ''),
(4, 'bill@mail.it', 'bill', '$2y$10$P.3Zfo6jhKpILmc6ZwOCv.2Zv/CvOSrfeJqXvctakjaPxkXso.N5u', ''),
(5, 'beatrix@mail.it', 'beatrix', '$2y$10$pJt3PXqVkUP6CseXmYExfepK1NYc8jd0HoQbNX6BB5YP6LVNUSyYm', 'Uma truman chef fun.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `postID` (`postID`);

--
-- Indici per le tabelle `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`user`,`follower`),
  ADD KEY `follower` (`follower`);

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`postID`,`userID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `userWhoLikes` (`userID`);

--
-- Indici per le tabelle `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `userID` (`userID`);

--
-- Indici per le tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indici per le tabelle `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`postID`,`tag`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`follower`) REFERENCES `user` (`userID`) ON DELETE CASCADE;

--
-- Limiti per la tabella `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Limiti per la tabella `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
