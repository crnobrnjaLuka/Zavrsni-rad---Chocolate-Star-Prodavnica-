-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 11:19 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chocolate_star`
--

-- --------------------------------------------------------

--
-- Table structure for table `cenovnik`
--

CREATE TABLE `cenovnik` (
  `id` int(11) NOT NULL,
  `id_proizvoda` int(11) NOT NULL,
  `oblik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cenovnik`
--

INSERT INTO `cenovnik` (`id`, `id_proizvoda`, `oblik`, `cena`) VALUES
(1, 1, 'Elipsa 1.5kg', '2500.00'),
(2, 1, 'Elipsa 3kg', '5000.00'),
(4, 2, 'Elipsa 1.5kg', '2500.00'),
(5, 2, 'Elipsa 3kg', '5000.00'),
(6, 3, 'Zakrivljeno srce 1.5kg', '2200.00'),
(7, 3, 'Zakrivljeno srce 3kg', '4400.00'),
(8, 4, 'Zakrivljeno srce 1.5kg', '2500.00'),
(9, 4, 'Zakrivljeno srce 3kg', '5000.00'),
(10, 5, 'Elipsa 1.5kg', '2500.00'),
(11, 5, 'Elipsa 3kg', '5000.00'),
(12, 6, 'Trougao 1,5kg', '2500.00'),
(13, 6, 'Trougao 3kg', '5000.00'),
(14, 7, 'Tart 250g ', '360.00'),
(15, 7, 'Tart za 4 osobe ( 4 x 250g )', '1240.00'),
(16, 8, 'Mini torta 250g', '410.00'),
(17, 8, 'Mini torta za 4 osobe ( 4 x 250 g )', '1640.00'),
(18, 9, 'Tart 250g ', '360.00'),
(19, 9, 'Tart za 4 osobe ( 4 x 250g )', '1240.00'),
(20, 10, 'Čaša 250g ', '320.00'),
(21, 10, 'Za 4 osobe ( 4x 250g )', '1280.00'),
(22, 11, 'Porcija 10 kom. ( 10 x 50g)', '880.00'),
(23, 11, 'Porcija 20 kom. ( 20 x 50g)', '1500.00'),
(24, 12, 'Mini torta 250g', '410.00'),
(25, 12, 'Mini torta za 4 osobe ( 4 x 250 g )', '1640.00');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `tip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naziv_proizvoda` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `opis` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dostupnost` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergeni` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcije` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sadrzi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `tip`, `naziv_proizvoda`, `slika`, `cena`, `opis`, `dostupnost`, `alergeni`, `porcije`, `sadrzi`) VALUES
(1, 'torte', 'Čokoladna bomba', 'chocolate_star_prodavnica_torte_coko_bomba.jpg', '350.00', 'Jednostavna torta, puna čokolade, kremasta, izdašna, sa mekim koricama koje se tope u ustima...', ' raspoloživo tokom cele godine.', 'orašasti plodovi, jaja, gluten, laktoza', '1kg (8-10 parčića)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(2, 'torte', 'Nugat', 'chocolate_star_prodavnica_torte_nugatt.jpg', '350.00', 'Beli vanila krem i mlečni nugat pažljivo spojeni na čokoladnoj kori pružaju kremasti ukus, koji obogaćuju nežni preliv od mlečne čokolade i hrskavi lešnici, pružajući punoću ukusa koji osvaja.', ' raspoloživo tokom cele godine.', 'orašasti plodovi, jaja, gluten, laktoza', '1kg (8-10 parčića)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(3, 'torte', 'Milka torta', 'chocolate_star_prodavnica_torte_milka_torta.jpg', '450.00', 'Milka torta s lešnicima i kremom od Milka noissette i bele čokolade, ukrašena ogradom od bele čokolade i živim cvećem\r\n', 'raspoloživo tokom cele godine.', 'jaja, bobičasto voće, laktoza, kokos.\r\n\r\n', '1kg (8-10 parčića)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(4, 'torte', 'Malina torta', 'chocolate_star_prodavnica_torte_malina.jpg', '450.00', 'Osvežavajuća torta idealna za rođendane i slične prilike. Tanke korice i kremovi sa plazma keksom u kombinaciji sa malinama. ', 'raspoloživo tokom cele godine.', 'bobičasto voće, laktoza, gluten.', '1kg (8-10 parčića)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(5, 'torte', 'Kinder', 'chocolate_star_prodavnica_torte_kinder.jpg', '400.00', 'Posebno popularna torta među decom, mada je i odrasli podjednako vole. Čine je kore od belanaca sa lešnicima, premazane nutelom, sa filovima od čokolade i vanile. ', 'raspoloživo tokom cele godine.', 'orašasti plodovi, jaja, gluten, laktoza', '1kg (8-10 parčića)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(6, 'torte', 'Reforma', 'chocolate_star_prodavnica_torte_oreo.jpg', '400.00', 'Pravi starinski klasik sa korama od belanaca i puno oraha (bez brašna) i sa kuvanim filom od žumanaca i čokolade. Bogata, raskošna i dovoljno svečana za svaku priliku. ', 'raspoloživo tokom cele godine.', 'bobičasto voće, laktoza, gluten', '1kg (8-10 parčića)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(7, 'kolaci', 'Voćni tart', 'vocni_tart_Chocolate_star_2.jpg', '370.00', 'Mus od  Callebaut crne čokolada sa 70% kakaoa, mlečna čokolada sa pečenim lešnikom i hrskavim biskvitom, mekana kora od badema.;', 'raspoloživo tokom cele godine.', 'bobičasto voće, orašasti plodovi, laktoza, gluten, želatin, kokos', '250 g ( porcija za jednu osobu )', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(8, 'kolaci', 'Nugatt', 'chocolate_star_prodavnica_kolaci_nugat.jpg', '370.00', 'Beli vanila krem i mlečni nugat pažljivo spojeni na čokoladnoj kori pružaju kremasti ukus, koji obogaćuju nežni preliv od mlečne čokolade i hrskavi lešnici, pružajući punoću ukusa koji osvaja.', 'raspoloživo tokom cele godine.', 'bobičasto voće, orašasti plodovi, laktoza, gluten, želatin, kokos', '250g ( porcija za jednu osobu)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(9, 'kolaci', 'Malina tart', 'chocolate_star_prodavnica_kolaci_malina_tart.jpg', '450.00', 'Kora od plazme, punjen belim vanila kremom sa dodatkom svežih malina', 'raspoloživo tokom cele godine.', 'bobičasto voće, orašasti plodovi, laktoza, gluten, želatin, kokos', '250g ( porcija za jednu osobu)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(10, 'kolaci', 'Cheese cake', 'chocolate_star_prodavnica_kolaci_cheese_cake.jpg', '450.00', 'Korica od plazma keksa i prepoznatljivi ukus mlecnog fila prestavljaju fenomenalan spoj. Zasluzuje Vasu paznju i pravi je izazov za sve sladokusce.', 'raspoloživo tokom cele godine.', 'bobičasto voće, orašasti plodovi, laktoza, gluten, želatin, kokos', '250g ( porcija za jednu osobu)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(11, 'kolaci', 'Minjoni', 'chocolate_star_prodavnica_kolaci_minjoni.jpg', '450.00', 'Jednostavna torta, puna čokolade, kremasta, izdašna, sa mekim koricama koje se tope u ustima...', 'raspoloživo tokom cele godine.', 'Bobičasto voće, orašasti plodovi, laktoza, gluten, želatin, kokos', '250g ( 5 minjona )', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.'),
(12, 'kolaci', 'Čokoladana bomba', 'cokoladna_bomba.jpg', '400.00', 'Minjoni puni čokolade,  sa hrskavim čokoladnim koricama koje se tope u ustima...', 'raspoloživo tokom cele godine.', 'Orašasti plodovi, laktoza, gluten, želatin, kokos', '250g ( porcija za jednu osobu)', 'Čuvati u rashladnom uređaju na temperaturi od 5°C.\r\nRok upotrebe je utisnut na poleđini postolja ili 4 dana od isporuke.');

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE `racun` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `ime_prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isporuka` datetime NOT NULL,
  `cena` decimal(9,2) NOT NULL,
  `isporuceno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racun`
--

INSERT INTO `racun` (`id`, `datum`, `ime_prezime`, `adresa`, `telefon`, `isporuka`, `cena`, `isporuceno`) VALUES
(1, '2019-11-28', 'a', 'a', 'a', '0000-00-00 00:00:00', '0.00', '1'),
(2, '2019-11-28', 'a', 'a', 'a', '0000-00-00 00:00:00', '0.00', '1'),
(3, '2019-11-28', 'a', 'a', 'a', '0000-00-00 00:00:00', '1050.00', '1'),
(4, '2019-11-28', 'a', 'a', 'a', '0000-00-00 00:00:00', '1050.00', '1'),
(5, '2019-11-28', 'a', 'a', 'a', '0000-00-00 00:00:00', '2850.00', '1'),
(6, '2019-11-28', 'a', 'a', 'a', '2019-11-28 00:00:00', '2850.00', '1'),
(7, '2019-11-28', 'lujka', 'adacasdf', 'sdca', '2019-11-22 00:00:00', '2350.00', '1'),
(8, '2019-11-28', 'ag', 'a', 'a', '2019-11-24 00:00:00', '2650.00', '1'),
(9, '2019-11-29', 'Luka Crnobrnja', 'Pljesevicka 9', '0600198507', '2019-11-30 00:00:00', '3300.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stavke_racuna`
--

CREATE TABLE `stavke_racuna` (
  `id` int(11) NOT NULL,
  `racun_id` int(11) NOT NULL,
  `proizvod` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oblik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kolicina` int(11) NOT NULL,
  `cena` decimal(9,2) NOT NULL,
  `proizvod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stavke_racuna`
--

INSERT INTO `stavke_racuna` (`id`, `racun_id`, `proizvod`, `oblik`, `kolicina`, `cena`, `proizvod_id`) VALUES
(1, 0, 'Čokoladna bomba', 'Elipsa  0.870kg', 1, '350.00', 1),
(2, 0, 'Čokoladna bomba', 'Elipsa  0.870kg', 1, '350.00', 1),
(3, 1, 'Čokoladna bomba', 'Elipsa  0.870kg', 1, '350.00', 1),
(4, 2, 'Čokoladna bomba', 'Elipsa  0.870kg', 3, '350.00', 1),
(5, 3, 'Čokoladna bomba', 'Elipsa  0.870kg', 3, '350.00', 1),
(6, 4, 'Čokoladna bomba', 'Elipsa  0.870kg', 3, '350.00', 1),
(7, 5, 'Čokoladna bomba', 'Elipsa  0.870kg', 3, '350.00', 1),
(8, 6, 'Čokoladna bomba', 'Elipsa  0.870kg', 3, '350.00', 1),
(9, 0, 'Čokoladna bomba', 'Elipsa  0.870kg', 3, '350.00', 1),
(10, 0, 'Čokoladna bomba', 'Elipsa  0.870kg', 3, '350.00', 1),
(11, 7, 'Čokoladna bomba', 'Elipsa  0.870kg', 1, '350.00', 1),
(12, 8, 'Čokoladna bomba', 'Elipsa  0.870kg', 1, '350.00', 1),
(13, 8, 'Čokoladna bomba', 'Elipsa  1.870kg ', 1, '500.00', 1),
(14, 9, 'Čokoladna bomba', 'Elipsa  1.870kg ', 3, '500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rola` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `password`, `rola`) VALUES
('luka', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stavke_racuna`
--
ALTER TABLE `stavke_racuna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cenovnik`
--
ALTER TABLE `cenovnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `racun`
--
ALTER TABLE `racun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stavke_racuna`
--
ALTER TABLE `stavke_racuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
