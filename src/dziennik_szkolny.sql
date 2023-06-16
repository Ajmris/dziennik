-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Gru 2022, 16:52
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dziennik_szkolny`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasy`
--

CREATE TABLE `klasy` (
  `id` int(11) NOT NULL,
  `klasa` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasy`
--

INSERT INTO `klasy` (`id`, `klasa`) VALUES
(1, '1a'),
(2, '2a'),
(3, '3a'),
(4, '1b'),
(5, '2b'),
(6, '3b'),
(7, '1c'),
(8, '2c'),
(9, '3c');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciel`
--

CREATE TABLE `nauczyciel` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `imie` varchar(255) DEFAULT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `wychowawca` int(2) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `nauczyciel`
--

INSERT INTO `nauczyciel` (`id`, `login`, `password`, `mail`, `imie`, `nazwisko`, `wychowawca`, `admin`) VALUES
(2, '4815', 'Tarasie-1cz', 'szymektarasiewicz@onet.pl', 'Szymon', 'Tarasiewicz', 0, 0),
(3, '4815', 'Danuta123', 'Danuta@onet.pl', 'Danuta', 'Biłgoraj', 0, 0),
(5, '4815', 'password1', 'user1@example.com', 'Katarzyna', 'Samugaj', 1, 0),
(6, '4815', 'password2', 'Dorociuk@onet.pl', 'Janusz', 'Dorotciński', 2, 0),
(7, '4815', 'password3', 'Terschul@wp.pl', 'Teresa', 'Schultz', 3, 0),
(8, '4815', 'password4', 'bartowiak.al@wp.pl', 'Alicja', 'Bartowiak', 4, 0),
(9, '4815', 'password5', 'Michulski@omet.pl', 'Kondrad', 'Michulski', 5, 0),
(10, '4815', 'password6', 'jadwigamarek-interia.com', 'Jadwiga', 'Marek', 6, 0),
(11, '4815', 'password7', 'MirLipinska@gmail.com', 'Mirosława', 'Lipińska', 7, 0),
(12, '4815', 'password8', 'siudym@gmail.com', 'Sara', 'Siudym', 8, 0),
(13, '4815', 'password9', 'doro.rebe@gmail.com', 'Rebeka', 'Dorociuk', 9, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ocena`
--

CREATE TABLE `ocena` (
  `id` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `waga` int(11) NOT NULL,
  `data` varchar(10) NOT NULL,
  `komentarz` text NOT NULL,
  `nauczycielID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `ocena`
--

INSERT INTO `ocena` (`id`, `ocena`, `waga`, `data`, `komentarz`, `nauczycielID`) VALUES
(1, 5, 5, '2022-12-23', 'No jakoś', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `userID` int(11) NOT NULL,
  `przedmiotID` int(11) NOT NULL,
  `OcenaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`userID`, `przedmiotID`, `OcenaID`) VALUES
(2, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL,
  `tytul` text NOT NULL,
  `tresc` text NOT NULL,
  `nauczycielID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `sr_ocen` float NOT NULL,
  `klasa_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uczniowie`
--

INSERT INTO `uczniowie` (`id`, `imie`, `nazwisko`, `sr_ocen`, `klasa_id`) VALUES
(1, 'Adam', 'Kowalski', 3.5, 1),
(2, 'Anna', 'Nowak', 4, 2),
(3, 'Tomasz', 'Wisniewski', 4.5, 3),
(4, 'Agata', 'Majewska', 3, 4),
(5, 'Piotr', 'Lis', 4, 5),
(6, 'Ewa', 'Jablonska', 3.5, 6),
(7, 'Magda', 'Krajewska', 5, 7),
(8, 'Piotr', 'Listwan', 2.3, 8),
(9, 'Ewa', 'Morawiecka', 3.5, 9),
(10, 'Jan', 'Kowalski', 3.9, 1),
(11, 'Anna', 'Nowak', 4, 2),
(12, 'Tomasz', 'Wiśniewski', 3.7, 3),
(13, 'Alicja', 'Wojciechowska', 3.8, 4),
(14, 'Robert', 'Zieliński', 3.9, 5),
(15, 'Ewa', 'Krawczyk', 3.6, 6),
(16, 'Marek', 'Makowski', 3.7, 7),
(17, 'Saraa', 'Dąbrowska', 3.8, 8),
(18, 'Katarzyna', 'Kazimierska', 5, 9),
(19, 'Kamil', 'Piela', 4.9, 1),
(20, 'Sebastian', 'Kowalski', 4.2, 2),
(21, 'Paweł', 'Michalak', 4.3, 3),
(22, 'Damian', 'Markiewicz', 4.6, 4),
(23, 'Magda', 'Rysik', 4.8, 5),
(24, 'Łukasz', 'Bury', 3.5, 6),
(25, 'Dorota', 'Kowalik', 4, 7),
(26, 'Krzyszkof', 'Konarski', 3.2, 8),
(27, 'Wiktor', 'Tokarczuk', 2.7, 9),
(28, 'Tomasz', 'Pulchara', 3.8, 6),
(29, 'Patryk', 'Lesman', 4.1, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `mail` text NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `tel` int(255) NOT NULL,
  `rodzic` tinyint(1) NOT NULL,
  `klasa` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `mail`, `imie`, `nazwisko`, `tel`, `rodzic`, `klasa`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@root.pl', 'root', 'root', 0, 0, 'root'),
(2, 'Szymon', 'Tarasie-1cz', 'szymektarasiewicz@onet.pl', 'Szymon', 'Tarasiewicz', 123456789, 1, '2a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `tytul` text NOT NULL,
  `tresc` text NOT NULL,
  `od` int(11) NOT NULL,
  `do` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klasy`
--
ALTER TABLE `klasy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Klasa relacja` (`klasa_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klasy`
--
ALTER TABLE `klasy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD CONSTRAINT `Klasa relacja` FOREIGN KEY (`klasa_id`) REFERENCES `klasy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
