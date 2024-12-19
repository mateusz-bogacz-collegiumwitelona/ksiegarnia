-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 02:10 PM
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
  `miasto` varchar(50) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `kod pocztowy` varchar(6) NOT NULL,
  `płeć` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `miasto`, `ulica`, `kod pocztowy`, `płeć`) VALUES
(1, 'Mateusz', 'Paździoch', 'Sulejówek', 'Plebana 21', '58-150', 'M'),
(2, 'Anna', 'Nowak', 'Kraków', 'ul. Floriańska 2', '31-101', 'K'),
(3, 'Piotr', 'Wiśniewski', 'Gdańsk', 'ul. Długa 3', '80-001', 'M'),
(4, 'Maria', 'Wójcik', 'Poznań', 'ul. Półwiejska 4', '61-001', 'K'),
(5, 'Paweł', 'Kowalczyk', 'Wrocław', 'ul. Świdnicka 5', '50-001', 'M'),
(6, 'Katarzyna', 'Nowakowska', 'Łódź', 'ul. Piotrkowska 6', '90-001', 'K'),
(7, 'Tomasz', 'Kaminski', 'Szczecin', 'ul. Wyszyńskiego 7', '70-001', 'M'),
(8, 'Agnieszka', 'Lewandowska', 'Lublin', 'ul. Królewska 8', '20-001', 'K'),
(9, 'Michał', 'Zieliński', 'Katowice', 'ul. Mariacka 9', '40-001', 'M'),
(10, 'Ewa', 'Szymańska', 'Bydgoszcz', 'ul. Gdańska 10', '85-001', 'K'),
(11, 'Mateusz', 'Bogacz', 'Legnica', 'Adama Mickiewcza', '58-220', 'M'),
(13, 'Marianna ', 'Boczek', 'Sulejówek', 'Plebana 21', '58-220', 'F'),
(14, 'Marian', 'Paździoch', 'Sulejówek', 'Plebana 21', '58-220', 'F');

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
(1, 1, 3, '2024-11-20'),
(2, 1, 5, '2024-11-20'),
(3, 2, 8, '2024-11-21'),
(4, 3, 2, '2024-11-21'),
(5, 4, 10, '2024-11-22'),
(6, 4, 11, '2024-11-22'),
(7, 4, 15, '2024-11-22'),
(8, 5, 9, '2024-11-23'),
(9, 5, 7, '2024-11-23'),
(10, 6, 6, '2024-11-24'),
(11, 6, 14, '2024-11-24'),
(12, 7, 4, '2024-11-25'),
(13, 8, 1, '2024-11-25'),
(14, 9, 12, '2024-11-26'),
(15, 9, 13, '2024-11-26'),
(16, 9, 16, '2024-11-26'),
(17, 10, 3, '2024-11-27'),
(18, 11, 18, '2024-11-28'),
(19, 11, 20, '2024-11-28'),
(22, 13, 6, '2024-11-30'),
(23, 14, 7, '2024-12-01'),
(24, 14, 9, '2024-12-01'),
(25, 1, 4, '2024-12-02'),
(26, 2, 10, '2024-12-02'),
(27, 3, 11, '2024-12-03'),
(28, 4, 13, '2024-12-03'),
(29, 5, 15, '2024-12-04'),
(30, 6, 19, '2024-12-04'),
(31, 7, 1, '2024-12-05'),
(32, 8, 3, '2024-12-05'),
(33, 9, 5, '2024-12-06'),
(34, 10, 14, '2024-12-06'),
(35, 11, 7, '2024-12-07'),
(37, 13, 20, '2024-12-08'),
(38, 14, 2, '2024-12-08'),
(39, 1, 8, '2024-12-09'),
(40, 2, 9, '2024-12-09'),
(41, 3, 12, '2024-12-10'),
(42, 4, 17, '2024-12-10'),
(43, 5, 18, '2024-12-11'),
(44, 6, 1, '2024-12-11'),
(45, 7, 3, '2024-12-12'),
(46, 8, 5, '2024-12-12'),
(47, 9, 6, '2024-12-13'),
(48, 10, 10, '2024-12-13'),
(49, 11, 11, '2024-12-14'),
(51, 13, 15, '2024-12-15'),
(52, 14, 19, '2024-12-15'),
(53, 1, 20, '2024-12-16'),
(54, 2, 4, '2024-12-16'),
(55, 3, 8, '2024-12-17'),
(56, 4, 9, '2024-12-17'),
(57, 5, 12, '2024-12-18'),
(58, 6, 17, '2024-12-18'),
(59, 7, 18, '2024-12-18'),
(60, 8, 2, '2024-12-19'),
(61, 9, 3, '2024-12-19'),
(62, 10, 7, '2024-12-19'),
(63, 11, 16, '2024-12-19'),
(65, 1, 1, '2024-12-19');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

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
  ADD KEY `fk+_idklienta` (`id_klienta`),
  ADD KEY `fk+_idprodukt` (`id_produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `zakupy`
--
ALTER TABLE `zakupy`
  MODIFY `id_zakupu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `fk+_idklienta` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk+_idprodukt` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produkt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
