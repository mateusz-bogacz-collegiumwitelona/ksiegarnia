-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 10, 2025 at 12:07 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `płeć` varchar(1) NOT NULL,
  `id_miasta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `płeć`, `id_miasta`) VALUES
(1, 'fff', 'fff', 'm', 1),
(2, 'Anna', 'Nowak', 'K', 2),
(3, 'Piotr', 'Wiśniewski', 'M', 3),
(4, 'Maria', 'Wójcik', 'K', 4),
(5, 'Paweł', 'Kowalczyk', 'M', 5),
(6, 'Katarzyna', 'Nowakowska', 'K', 6),
(7, 'Tomasz', 'Kaminski', 'M', 7),
(8, 'Agnieszka', 'Lewandowska', 'K', 8),
(9, 'Michał', 'Zieliński', 'M', 9),
(10, 'Ewa', 'Szymańska', 'K', 10),
(11, 'Mateusz', 'Bogacz', 'M', 11),
(12, 'Marianna', 'Boczek', 'F', 1),
(13, 'Marian', 'Paździoch', 'F', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miasto`
--

CREATE TABLE `miasto` (
  `id_miasta` int(11) NOT NULL,
  `miasto` varchar(50) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `kod_pocztowy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miasto`
--

INSERT INTO `miasto` (`id_miasta`, `miasto`, `ulica`, `kod_pocztowy`) VALUES
(1, 'aa', 'aa', 'aa'),
(2, 'Kraków', 'ul. Floriańska 2', '31-101'),
(3, 'Gdańsk', 'ul. Długa 3', '80-001'),
(4, 'Poznań', 'ul. Półwiejska 4', '61-001'),
(5, 'Wrocław', 'ul. Świdnicka 5', '50-001'),
(6, 'Łódź', 'ul. Piotrkowska 6', '90-001'),
(7, 'Szczecin', 'ul. Wyszyńskiego 7', '70-001'),
(8, 'Lublin', 'ul. Królewska 8', '20-001'),
(9, 'Katowice', 'ul. Mariacka 9', '40-001'),
(10, 'Bydgoszcz', 'ul. Gdańska 10', '85-001'),
(11, 'Legnica', 'Adama Mickiewcza', '58-220');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produkt` int(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `wydawnictwo` varchar(100) NOT NULL,
  `cena` float NOT NULL,
  `rok_wydania` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id_produkt`, `tytul`, `autor`, `wydawnictwo`, `cena`, `rok_wydania`) VALUES
(1, 'Władca Pierścieni', 'J.R.R. Tolkien', 'Wydawnictwo Iskry', 49.99, '1954'),
(2, 'Harry Potter i Kamień Filozoficzny', 'J.K. Rowling', 'Wydawnictwo Media Rodzina', 39.99, '1997'),
(3, 'Mistrz i Małgorzata', 'Michaił Bułhakow', 'Wydawnictwo Czytelnik', 34.99, '1967'),
(4, '1984', 'George Orwell', 'Wydawnictwo Rebis', 29.99, '1949'),
(5, 'Zbrodnia i kara', 'Fiodor Dostojewski', 'Wydawnictwo Prószyński i S-ka', 24.99, '0000'),
(6, 'Opowieści z Narnii: Lew, czarownica i stara szafa', 'C.S. Lewis', 'Wydawnictwo Znak', 29.99, '1950'),
(7, 'Wielki Gatsby', 'F. Scott Fitzgerald', 'Wydawnictwo Albatros', 39.99, '1925'),
(8, 'Moby Dick', 'Herman Melville', 'Wydawnictwo PIW', 59.99, '0000'),
(9, 'Przeminęło z wiatrem', 'Margaret Mitchell', 'Wydawnictwo Pocket Books', 49.99, '1936'),
(10, 'Duma i uprzedzenie', 'Jane Austen', 'Wydawnictwo Zysk i S-ka', 34.99, '0000'),
(11, 'Rok 1984', 'George Orwell', 'Wydawnictwo Rebis', 24.99, '1949'),
(12, 'Sto lat samotności', 'Gabriel García Márquez', 'Wydawnictwo Świat Książki', 44.99, '1967'),
(13, 'Władcy Chaosu', 'Michael Moorcock', 'Wydawnictwo Solaris', 39.99, '1961'),
(14, 'Na Zachodzie bez zmian', 'Erich Maria Remarque', 'Wydawnictwo Prószyński i S-ka', 19.99, '1928'),
(15, 'Czarny Książę', 'Zofia Kossak-Szczucka', 'Wydawnictwo Instytut Wydawniczy PAX', 27.99, '1944'),
(16, 'Lalka', 'Bolesław Prus', 'Wydawnictwo Ossolineum', 22.99, '0000'),
(17, 'Cień wiatru', 'Carlos Ruiz Zafón', 'Wydawnictwo Planeta', 39.99, '2001'),
(18, 'Czas Apokalipsy', 'Joseph Conrad', 'Wydawnictwo W.A.B.', 34.99, '0000'),
(19, 'Złodziejka książek', 'Markus Zusak', 'Wydawnictwo Literackie', 44.99, '2005'),
(20, 'Początek', 'Dan Brown', 'Wydawnictwo Albatros', 49.99, '2017');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakupy`
--

CREATE TABLE `zakupy` (
  `id_zakupu` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zakupy`
--

INSERT INTO `zakupy` (`id_zakupu`, `id_klienta`, `id_produktu`, `data`) VALUES
(1, 1, 1, '2024-12-19'),
(2, 11, 16, '2024-12-19'),
(3, 10, 7, '2024-12-19'),
(4, 9, 3, '2024-12-19'),
(5, 8, 2, '2024-12-19'),
(6, 7, 18, '2024-12-18'),
(7, 6, 17, '2024-12-18'),
(8, 5, 12, '2024-12-18'),
(9, 4, 9, '2024-12-17'),
(10, 3, 8, '2024-12-17'),
(11, 2, 4, '2024-12-16'),
(12, 1, 20, '2024-12-16'),
(13, 7, 19, '2024-12-15'),
(14, 13, 15, '2024-12-15'),
(15, 11, 11, '2024-12-14'),
(16, 10, 10, '2024-12-13'),
(17, 9, 6, '2024-12-13'),
(18, 8, 5, '2024-12-12'),
(19, 7, 3, '2024-12-12'),
(20, 6, 1, '2024-12-11'),
(21, 5, 18, '2024-12-11'),
(22, 4, 13, '2024-12-10'),
(23, 3, 12, '2024-12-10'),
(24, 2, 9, '2024-12-09'),
(25, 1, 8, '2024-12-09');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`),
  ADD KEY `fk_id_miasto` (`id_miasta`);

--
-- Indeksy dla tabeli `miasto`
--
ALTER TABLE `miasto`
  ADD PRIMARY KEY (`id_miasta`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produkt`);

--
-- Indeksy dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`id_zakupu`),
  ADD KEY `fk_id_klienta` (`id_klienta`),
  ADD KEY `fk_id_produkt` (`id_produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `miasto`
--
ALTER TABLE `miasto`
  MODIFY `id_miasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `zakupy`
--
ALTER TABLE `zakupy`
  MODIFY `id_zakupu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klienci`
--
ALTER TABLE `klienci`
  ADD CONSTRAINT `fk_id_miasto` FOREIGN KEY (`id_miasta`) REFERENCES `miasto` (`id_miasta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `fk_id_klienta` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_produkt` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produkt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
