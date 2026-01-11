-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: db5006696252.hosting-data.io
-- Generation Time: Sep 08, 2022 at 04:49 AM
-- Server version: 5.7.38-log
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs5540491`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` bigint(20) NOT NULL,
  `belongsto` bigint(20) NOT NULL,
  `characterloaded` int(11) NOT NULL DEFAULT '1',
  `alert` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL DEFAULT '0',
  `last_activity` text NOT NULL,
  `class` int(11) NOT NULL DEFAULT '0',
  `charactername` text NOT NULL,
  `character_created` text NOT NULL,
  `income_timer` text NOT NULL,
  `health_timer` text NOT NULL,
  `energy_timer` text NOT NULL,
  `stamina_timer` text NOT NULL,
  `level` bigint(20) NOT NULL DEFAULT '1',
  `experience` bigint(20) NOT NULL DEFAULT '0',
  `experience_gained` bigint(20) NOT NULL DEFAULT '0',
  `hired_guns` bigint(20) NOT NULL DEFAULT '0',
  `skill_points` bigint(20) NOT NULL DEFAULT '0',
  `claimedbonus` text NOT NULL,
  `cash` bigint(20) NOT NULL DEFAULT '10000',
  `bank` bigint(20) NOT NULL DEFAULT '0',
  `income` bigint(20) NOT NULL DEFAULT '0',
  `upkeep` bigint(20) NOT NULL DEFAULT '0',
  `favor_points` bigint(20) NOT NULL DEFAULT '1000',
  `fights_won` bigint(20) NOT NULL DEFAULT '0',
  `fights_lost` bigint(20) NOT NULL DEFAULT '0',
  `deaths` bigint(20) NOT NULL DEFAULT '0',
  `mobsters_whacked` bigint(20) NOT NULL DEFAULT '0',
  `bounties_collected` bigint(20) NOT NULL DEFAULT '0',
  `missions_completed` bigint(20) NOT NULL DEFAULT '0',
  `stamina` bigint(20) NOT NULL DEFAULT '3',
  `max_stamina` bigint(20) NOT NULL DEFAULT '3',
  `energy` bigint(20) NOT NULL DEFAULT '10000000',
  `max_energy` bigint(20) NOT NULL DEFAULT '10',
  `health` bigint(20) NOT NULL DEFAULT '100',
  `max_health` bigint(20) NOT NULL DEFAULT '100',
  `attack_strength` bigint(20) NOT NULL DEFAULT '0',
  `defense_power` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `belongsto`, `characterloaded`, `alert`, `admin`, `last_activity`, `class`, `charactername`, `character_created`, `income_timer`, `health_timer`, `energy_timer`, `stamina_timer`, `level`, `experience`, `experience_gained`, `hired_guns`, `skill_points`, `claimedbonus`, `cash`, `bank`, `income`, `upkeep`, `favor_points`, `fights_won`, `fights_lost`, `deaths`, `mobsters_whacked`, `bounties_collected`, `missions_completed`, `stamina`, `max_stamina`, `energy`, `max_energy`, `health`, `max_health`, `attack_strength`, `defense_power`) VALUES
(1, 1, 1, 0, 1, '1662611347', 2, 'ConspiracyRick', '', '1662613021', '', '', '', 588, 93948, 10009808, 0, 1568, '09/04/2022', 25299425319, 0, 266780000, 0, 1000, 0, 0, 0, 0, 0, 145996, 3, 3, 3997003, 10, 2000, 2000, 0, 3),
(5, 2, 1, 0, 0, '1662486415', 3, 'Beta', '', '1662613021', '', '', '', 601, 473429, 11689289, 0, 829, '09/06/2022', 11794099825, 34158272, 200419000, 0, 1000, 0, 0, 0, 0, 0, 219272, 50, 50, 181, 111, 1500, 1500, 574, 62),
(6, 17, 1, 0, 0, '1662146127', 0, 'Username', '', '1662613021', '', '', '', 597, 97046, 10912906, 0, 1755, '', 36011842863, 1054277, 74781300, 2100, 1000, 0, 0, 0, 0, 0, 184172, 3, 3, 542009, 20, 200, 200, 3, 10),
(7, 17, 0, 0, 0, '', 0, 'lkghkjhkuhj', '', '1662613021', '', '', '', 167, 25, 56385, 0, 498, '', 261582811, 0, 104000, 0, 1000, 0, 0, 0, 0, 0, 1790, 3, 3, 9951670, 10, 100, 100, 0, 0),
(8, 18, 0, 0, 0, '1662001599', 2, 'Beta1', '', '1662613021', '', '', '', 100, 0, 26060, 0, 297, '08/31/2022', 666341707, 0, 2690000, 0, 1000, 0, 0, 0, 0, 0, 2178, 3, 3, 9977608, 10, 100, 100, 0, 0),
(9, 2, 0, 0, 0, '1662486408', 1, 'Forest', '', '1662613021', '', '', '', 207, 10, 76370, 0, 618, '09/06/2022', 616533245, 0, 10107000, 0, 1000, 0, 0, 0, 0, 0, 2359, 3, 3, 9934371, 10, 100, 100, 0, 0),
(10, 1, 0, 0, 0, '', 2, 'Krypto', '', '1662613021', '', '', '', 419, 4831, 400691, 0, 1254, '', 3679686165, 0, 9007000, 900, 1000, 0, 0, 0, 0, 0, 8706, 3, 3, 9653953, 10, 100, 100, 0, 0),
(11, 18, 1, 0, 0, '1662486496', 3, 'TheGodfather', '', '1662613021', '', '', '', 533, 48145, 4464005, 0, 1596, '09/06/2022', 4223607240, 0, 106121000, 0, 1000, 0, 0, 0, 0, 0, 84071, 3, 3, 6134399, 10, 100, 100, 0, 0),
(12, 1, 0, 0, 0, '1661836938', 2, 'Godfather', '1661117752', '1662613021', '', '', '', 552, 38884, 6354744, 0, 1653, '08/30/2022', 17936959664, 0, 43580000, 0, 1000, 0, 0, 0, 0, 0, 106870, 3, 3, 4493300, 10, 100, 100, 0, 0),
(13, 1, 0, 0, 0, '', 2, '10Folds', '1661117786', '1662613021', '', '', '', 16, 172, 1032, 0, 45, '', 361691, 0, 1000, 0, 1000, 0, 0, 0, 0, 0, 344, 3, 3, 9999312, 10, 100, 100, 0, 0),
(14, 1, 0, 0, 0, '', 2, 'MoneyMoneyMoney', '1661117883', '1662613021', '', '', '', 19, 295, 2055, 0, 54, '', 397467, 0, 1000, 0, 1000, 0, 0, 0, 0, 0, 685, 3, 3, 9998630, 10, 100, 100, 0, 0),
(17, 20, 0, 0, 0, '', 2, 'ConspiracyRick', '1661491178', '1662614641', '', '', '', 1, 0, 0, 0, 0, '', 10000, 0, 0, 0, 1000, 0, 0, 0, 0, 0, 0, 3, 3, 10000000, 10, 100, 100, 0, 0),
(19, 20, 0, 0, 0, '1662146101', 3, 'badcodelawl', '1661814191', '1662613021', '', '', '', 25, 103, 3663, 0, 72, '', -6314462, 0, 0, 34800, 1000, 0, 0, 0, 0, 0, 2333, 3, 3, 9997667, 10, 100, 100, 0, 0),
(20, 20, 1, 0, 0, '1662599820', 0, 'iShItMyPaNtS', '1662146118', '1662612602', '', '', '', 1, 0, 0, 0, 0, '', 10000, 0, 0, 0, 1000, 0, 0, 0, 0, 0, 0, 3, 3, 10000000, 10, 100, 100, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(255) NOT NULL,
  `from_id` bigint(255) NOT NULL,
  `to_id` bigint(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `released` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0',
  `exclusive_item` int(11) NOT NULL DEFAULT '0',
  `exclusive_left` bigint(20) NOT NULL DEFAULT '0',
  `missionexclusiveloot` int(11) NOT NULL DEFAULT '0',
  `can_buy` int(11) NOT NULL DEFAULT '0',
  `can_sell` int(11) NOT NULL DEFAULT '0',
  `type` text NOT NULL,
  `picture_name` text NOT NULL,
  `name` text NOT NULL,
  `level` bigint(20) NOT NULL DEFAULT '0',
  `cost` bigint(20) NOT NULL DEFAULT '0',
  `exclusive_cost` int(11) NOT NULL DEFAULT '0',
  `attack` bigint(20) NOT NULL DEFAULT '0',
  `defense` bigint(20) NOT NULL DEFAULT '0',
  `upkeep` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `released`, `featured`, `exclusive_item`, `exclusive_left`, `missionexclusiveloot`, `can_buy`, `can_sell`, `type`, `picture_name`, `name`, `level`, `cost`, `exclusive_cost`, `attack`, `defense`, `upkeep`) VALUES
(1, 1, 0, 0, 0, 1, 0, 1, 'weapon', 'golf_club.gif', 'Golf Club', 1, 800, 0, 2, 1, 0),
(2, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'flick_knife.gif', 'Flick Knife', 1, 150, 0, 1, 0, 0),
(3, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'crowbar.gif', 'Crowbar', 1, 250, 0, 2, 0, 0),
(4, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'louisville_slugger.gif', 'Louisville Slugger', 1, 200, 0, 1, 1, 0),
(5, 1, 0, 0, 0, 0, 1, 1, 'vehicle', 'el_camino.gif', 'El Camino', 1, 18000, 0, 3, 3, 0),
(6, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'beretta_9mm.gif', 'Beretta 9mm', 1, 1900, 0, 3, 1, 0),
(7, 1, 0, 0, 0, 0, 1, 1, 'weapon', '12gauge_shotgun.gif', '12-Gauge Shotgun', 2, 2900, 0, 2, 4, 0),
(8, 1, 0, 0, 0, 0, 1, 1, 'armor', 'bulletproof_vest.gif', 'Bulletproof Vest', 1, 5000, 0, 2, 4, 0),
(9, 1, 0, 0, 0, 0, 0, 1, 'vehicle', 'rhino_tank.gif', 'Rhino Tank', 100, 10000000, 0, 90, 45, 100000),
(10, 1, 0, 0, 0, 0, 1, 1, 'vehicle', 'humvee.gif', 'Humvee', 35, 1750000, 0, 19, 17, 10000),
(11, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'rpg_launcher.gif', 'RPG Launcher', 15, 150000, 0, 16, 6, 2500),
(12, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'uzi.gif', 'Uzi', 3, 5000, 0, 4, 3, 0),
(13, 1, 0, 0, 0, 0, 1, 1, 'armor', 'body_armor.gif', 'Body Armor', 20, 20000, 0, 5, 8, 200),
(14, 1, 0, 0, 0, 1, 0, 1, 'vehicle', 'ambulance.gif', 'Ambulance', 8, 20000, 0, 1, 10, 300),
(15, 1, 0, 0, 0, 0, 1, 1, 'vehicle', 'armored_truck.gif', 'Armored Truck', 15, 450000, 0, 11, 13, 1000),
(16, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'ak47.gif', 'AK-47', 1, 15000, 0, 6, 3, 0),
(17, 1, 0, 0, 0, 0, 1, 1, 'vehicle', 'bmw.gif', 'BMW', 1, 35000, 0, 4, 5, 50),
(18, 1, 0, 0, 0, 0, 1, 1, 'weapon', 'minigun.gif', 'Minigun', 10, 120000, 0, 12, 10, 1500),
(19, 1, 0, 0, 0, 0, 1, 1, 'armor', 'steellined_trenchcoat.gif', 'Steel-Lined Trenchcoat', 11, 14500, 0, 3, 6, 100),
(20, 1, 0, 0, 0, 0, 1, 1, 'armor', 'advanced_ballistic_armor.gif', 'Advanced Ballistic Armor', 45, 200000, 0, 7, 15, 2000),
(21, 1, 0, 0, 0, 1, 0, 1, 'armor', 'exoskeleton.png', 'Exoskeleton', 200, 10000000, 0, 20, 75, 50000),
(22, 1, 0, 0, 0, 0, 1, 1, 'vehicle', 'bulletproof_escalade.gif', 'Bulletproof Escalade', 1, 90000, 0, 6, 7, 200),
(23, 1, 1, 1, 5000, 0, 1, 0, 'weapon', 'armalite_ar50_sniper_rifle.gif', 'ArmaLite AR-50 Sniper Rifle', 0, 0, 25, 22, 6, 0),
(24, 1, 1, 1, 5000, 0, 1, 0, 'vehicle', 'ignitionactivated_car_bomb.gif', 'Ignition-Activated Car Bomb', 0, 0, 39, 68, 31, 0),
(25, 1, 1, 1, 5000, 0, 1, 0, 'weapon', 'chainsaw.gif', 'Chainsaw', 0, 0, 15, 22, 12, 0),
(26, 0, 0, 0, 0, 1, 0, 0, '', '', 'Police Badge', 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, '', '', 'Decoy Bomb', 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, '', '', 'NYC Shuttle Bus', 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 'henchmen', '', 'Small Police Escort', 0, 0, 0, 0, 0, 0),
(30, 1, 0, 0, 0, 1, 0, 0, 'missionloot', 'bottle_of_moonshine.gif', 'Bottle of Moonshine', 0, 0, 0, 0, 0, 0),
(31, 1, 0, 0, 0, 0, 1, 1, 'vehicle', 'bentley_gtc.gif', 'Bentley GTC', 1, 50000, 0, 4, 6, 100);

-- --------------------------------------------------------

--
-- Table structure for table `hitlist`
--

CREATE TABLE `hitlist` (
  `id` int(11) NOT NULL,
  `character_id` text NOT NULL,
  `bounty` varchar(255) NOT NULL,
  `set_by` text NOT NULL,
  `timestamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hitlist`
--

INSERT INTO `hitlist` (`id`, `character_id`, `bounty`, `set_by`, `timestamp`) VALUES
(1, '11', '562000000', '1', '1661555365'),
(2, '10', '90070000', '1', '1661957981');

-- --------------------------------------------------------

--
-- Table structure for table `log_ins`
--

CREATE TABLE `log_ins` (
  `id` int(11) NOT NULL,
  `alert` int(11) NOT NULL DEFAULT '0',
  `belongsto` int(11) NOT NULL,
  `device` text NOT NULL,
  `ip` text NOT NULL,
  `time_stamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_ins`
--

INSERT INTO `log_ins` (`id`, `alert`, `belongsto`, `device`, `ip`, `time_stamp`) VALUES
(1, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:31c6:ecfe:d4bc:6482', '1661977659'),
(2, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '2601:242:c080:2ea0:451a:bed0:4cba:584c', '1661989948'),
(3, 0, 20, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1661990010'),
(4, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '2601:242:c080:2ea0:451a:bed0:4cba:584c', '1662001470'),
(5, 0, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '2601:242:c080:2ea0:451a:bed0:4cba:584c', '1662001557'),
(6, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:fd43:27de:248c:4319', '1662045410'),
(7, 0, 20, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662047869'),
(8, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:fd43:27de:248c:4319', '1662047946'),
(9, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:fd43:27de:248c:4319', '1662049697'),
(10, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:fd43:27de:248c:4319', '1662049961'),
(11, 0, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:44ef:4f91:ce1b:d27e', '1662052745'),
(12, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:44ef:4f91:ce1b:d27e', '1662052815'),
(13, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:fd43:27de:248c:4319', '1662059623'),
(14, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:fd43:27de:248c:4319', '1662065278'),
(15, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:486:abfa:3006:25bf', '1662078376'),
(16, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:44ef:4f91:ce1b:d27e', '1662089162'),
(17, 0, 20, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662122110'),
(18, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:dde3:6a18:6f1a:ed2c', '1662129735'),
(19, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:dde3:6a18:6f1a:ed2c', '1662136116'),
(20, 0, 20, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662142776'),
(21, 0, 17, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662146127'),
(22, 0, 20, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662146134'),
(23, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:752b:b81c:db2:46d8', '1662152046'),
(24, 0, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:752b:b81c:db2:46d8', '1662152420'),
(25, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:dde3:6a18:6f1a:ed2c', '1662160275'),
(26, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:c065:671d:f4df:1668', '1662234803'),
(27, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:15d6:9060:122f:59a7', '1662252575'),
(28, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:2119:bc5:5c9d:c9b2', '1662265522'),
(29, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:2119:bc5:5c9d:c9b2', '1662271472'),
(30, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:2119:bc5:5c9d:c9b2', '1662272750'),
(31, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:2119:bc5:5c9d:c9b2', '1662273124'),
(32, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:2119:bc5:5c9d:c9b2', '1662273287'),
(33, 0, 20, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662294000'),
(34, 0, 20, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662329500'),
(35, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:8402:6807:9b24:c5f2', '1662330069'),
(36, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:94ec:b894:b1eb:6cf1', '1662334424'),
(37, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:94ec:b894:b1eb:6cf1', '1662334655'),
(38, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:4d:80ff:ef32:f0ca', '1662342451'),
(39, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:4d:80ff:ef32:f0ca', '1662346236'),
(40, 0, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:6da6:4443:a82b:a70c', '1662400212'),
(41, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:6da6:4443:a82b:a70c', '1662400442'),
(42, 0, 20, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662409050'),
(43, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:d8fb:5ccd:8e34:71eb', '1662411434'),
(44, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:e594:eb75:5a83:dd6d', '1662421283'),
(45, 0, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:e594:eb75:5a83:dd6d', '1662421306'),
(46, 0, 20, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662473092'),
(47, 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:df4:2be9:4d1e:9b2a', '1662486304'),
(48, 0, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:df4:2be9:4d1e:9b2a', '1662486421'),
(49, 0, 20, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662555468'),
(50, 0, 20, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '75.131.42.59', '1662599804'),
(51, 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2601:242:c080:2ea0:3dbd:bb02:826:a12d', '1662610821');

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` int(11) NOT NULL,
  `released` int(11) NOT NULL DEFAULT '0',
  `city_name` text NOT NULL,
  `level_unlock` int(11) NOT NULL DEFAULT '0',
  `mission_name` text NOT NULL,
  `mission_quote` text NOT NULL,
  `min_cash` bigint(20) NOT NULL,
  `max_cash` bigint(20) NOT NULL,
  `experience` bigint(20) NOT NULL,
  `mob_needed` int(11) NOT NULL,
  `energy_needed` bigint(20) NOT NULL,
  `loot_chance_min` int(11) NOT NULL DEFAULT '0',
  `loot_chance_max` int(11) NOT NULL DEFAULT '5',
  `howmany_loot` int(11) NOT NULL DEFAULT '1',
  `loot_id` int(11) NOT NULL,
  `need_equip_id` int(11) NOT NULL,
  `howmanyneed` int(11) NOT NULL,
  `need_equip_id2` int(11) NOT NULL,
  `howmanyneed2` int(11) NOT NULL,
  `need_equip_id3` int(11) NOT NULL,
  `howmanyneed3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `released`, `city_name`, `level_unlock`, `mission_name`, `mission_quote`, `min_cash`, `max_cash`, `experience`, `mob_needed`, `energy_needed`, `loot_chance_min`, `loot_chance_max`, `howmany_loot`, `loot_id`, `need_equip_id`, `howmanyneed`, `need_equip_id2`, `howmanyneed2`, `need_equip_id3`, `howmanyneed3`) VALUES
(1, 1, 'da_bronx', 1, 'Petty Theft', '', 40, 175, 3, 1, 2, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'da_bronx', 1, 'Residential Burglary', '', 300, 800, 1, 1, 1, 0, 5, 1, 1, 0, 0, 0, 0, 0, 0),
(3, 1, 'da_bronx', 1, 'Back-Alley Mugging', '', 850, 1200, 2, 1, 3, 0, 5, 1, 0, 2, 1, 0, 0, 0, 0),
(4, 1, 'da_bronx', 2, 'Grand Theft Auto', '', 1000, 2000, 7, 2, 6, 0, 5, 1, 0, 3, 1, 0, 0, 0, 0),
(5, 1, 'da_bronx', 3, 'Convenience Store Robbery', '', 900, 6000, 8, 1, 7, 0, 5, 1, 0, 6, 1, 7, 1, 0, 0),
(6, 1, 'da_bronx', 4, 'Collect Protection Money', '', 3000, 5750, 16, 1, 12, 0, 5, 1, 0, 4, 1, 5, 1, 0, 0),
(7, 1, 'da_bronx', 17, 'Sell Counterfeit Sports Memorabilia', '', 400000, 900000, 15, 5, 7, 0, 5, 1, 0, 4, 40, 1, 2, 0, 0),
(8, 0, 'da_bronx', 36, 'Hijack a Shipment of Fine Liquors', '', 0, 0, 48, 8, 32, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(9, 1, 'da_bronx', 44, 'Mob War!', '', 800000, 3600000, 95, 200, 56, 0, 5, 1, 0, 10, 10, 13, 10, 12, 10),
(10, 1, 'da_bronx', 100, 'Raid National Guard Armory', '', 0, 0, 275, 190, 150, 4, 4, 1, 9, 10, 10, 11, 20, 0, 0),
(11, 1, 'downtown', 7, 'Art Museum Heist', '', 5000, 14000, 18, 2, 14, 0, 5, 1, 0, 3, 2, 22, 1, 0, 0),
(12, 1, 'downtown', 8, 'Infiltrate Hospital', '', 0, 0, 3, 2, 1, 0, 5, 1, 14, 0, 0, 0, 0, 0, 0),
(13, 1, 'downtown', 15, 'Bank Robbery', '', 100000, 350000, 29, 12, 23, 0, 5, 1, 0, 15, 3, 16, 8, 7, 10),
(14, 1, 'downtown', 22, 'Identity Theft', '', 175000, 400000, 60, 3, 52, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 'downtown', 25, 'Infiltrate Police Department', '', 0, 0, 5, 4, 2, 0, 5, 1, 26, 0, 0, 0, 0, 0, 0),
(16, 0, 'downtown', 30, 'Distract City Police', '', 0, 0, 4, 20, 15, 0, 5, 1, 27, 0, 0, 0, 0, 0, 0),
(17, 0, 'downtown', 30, 'Federal Gold Reserve Heist', '', 2000000, 3000000, 42, 20, 28, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 'downtown', 33, 'Open High-Class Escort Agency', '', 600000, 4500000, 54, 40, 42, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 'downtown', 34, '\"Negotiate\" City Sanitation Contract', '', 0, 0, 45, 5, 38, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 'downtown', 36, 'Muscle an NYC Bus Company', '', 0, 0, 56, 8, 37, 0, 5, 1, 28, 0, 0, 0, 0, 0, 0),
(21, 0, 'downtown', 150, 'Elect Capo to Mayor\'s Office', '', 0, 5000000, 350, 230, 170, 0, 5, 1, 29, 0, 0, 0, 0, 0, 0),
(22, 0, 'jersey', 9, 'Plan Smuggling Operation', '', 500, 1000, 7, 1, 5, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 'jersey', 10, 'Smuggle Stolen Goods', '', 6000, 12000, 17, 12, 13, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(24, 1, 'jersey', 12, 'Distill Moonshine', '', 0, 0, 14, 4, 11, 3, 5, 8, 30, 0, 0, 0, 0, 0, 0),
(25, 1, 'jersey', 12, 'Moonshine Bootlegging', '', 40000, 68000, 20, 4, 16, 0, 5, 1, 0, 31, 2, 30, 20, 0, 0),
(26, 0, 'jersey', 16, 'Credit Card Fraud', '', 45000, 150000, 42, 2, 35, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 'jersey', 28, 'Kidnapping & Ransom', '', 350000, 740000, 68, 4, 50, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 'jersey', 36, 'Bribe an Entertainer', '', 0, 0, 40, 8, 27, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 'jersey', 54, 'Carjacking', '', 0, 0, 175, 9, 86, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 'jersey', 55, 'Run a Chop Shop', '', 0, 0, 100, 9, 52, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 'jersey', 56, 'Pimp My Ride', '', 0, 0, 150, 9, 64, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 'jersey', 58, 'Engineer a Prison Breakout', '', 0, 7500000, 110, 70, 70, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 'jersey', 62, 'Eliminate an Unfriendly Witness', '', 1000000, 2000000, 66, 7, 44, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 'jersey', 66, 'Infiltrate a Rival Mob', '', 0, 0, 65, 5, 20, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(35, 0, 'jersey', 72, 'Import Counterfeit Rolexes', '', 5000000, 20000000, 36, 120, 20, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 'jersey', 72, 'Sell Counterfeit Rolexes', '', 5000000, 20000000, 180, 120, 134, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 'outta_town', 20, 'Maritime Trafficking', '', 300000, 800000, 35, 20, 29, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(38, 0, 'outta_town', 27, 'Unregistered Weapons Procurement', '', 50000, 200000, 35, 45, 26, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(39, 0, 'outta_town', 30, 'Locate Foreign Safehouse', '', 0, 0, 4, 20, 10, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 'outta_town', 37, 'Take Over a Catskill Resor', '', 12000000, 12000000, 76, 8, 47, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 'outta_town', 40, 'High Stakes Gambling', '', 0, 2000000, 24, 44, 15, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(42, 0, 'outta_town', 46, 'Smuggle in Russian Hit Men', '', 650000, 1200000, 60, 5, 46, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 'outta_town', 50, 'Realty Speculation', '', 4000000, 9000000, 140, 65, 90, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 'outta_town', 110, 'Establish a Colombian Connection', '', 3000000, 4800000, 140, 9, 93, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 'outta_town', 122, 'Infiltrate Coast Guard', '', 500000, 700000, 150, 10, 82, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 'outta_town', 134, 'Opium Trade', '', 3600000, 6000000, 180, 13, 120, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 'outta_town', 175, 'Infiltrate Party Machinery', '', 10000, 12000, 37, 17, 25, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 'outta_town', 175, 'Take Over a Former Soviet Republic', '', 10000000, 12000000, 225, 17, 120, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 'outta_town', 200, 'Raid Lockheed Research Lab', '', 2500000, 8000000, 460, 280, 190, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 'outta_town', 400, 'Revolution in Central America', '', 3000000, 85000000, 700, 375, 230, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mob_members`
--

CREATE TABLE `mob_members` (
  `id` int(11) NOT NULL,
  `from_id` text NOT NULL,
  `request_id` text NOT NULL,
  `from_top_mob` int(11) NOT NULL DEFAULT '0',
  `request_top_mob` int(11) NOT NULL DEFAULT '0',
  `from_energy_sent` text NOT NULL,
  `request_energy_sent` text NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mob_members`
--

INSERT INTO `mob_members` (`id`, `from_id`, `request_id`, `from_top_mob`, `request_top_mob`, `from_energy_sent`, `request_energy_sent`, `accepted`) VALUES
(2, '10', '1', 0, 1, '', '09/04/2022', 1),
(3, '1', '5', 1, 1, '09/04/2022', '09/06/2022', 1),
(4, '5', '6', 0, 0, '', '', 0),
(5, '11', '5', 1, 1, '09/06/2022', '09/06/2022', 1),
(6, '11', '8', 1, 1, '09/06/2022', '08/31/2022', 1),
(7, '12', '1', 1, 1, '08/30/2022', '09/04/2022', 1),
(8, '5', '12', 1, 1, '09/06/2022', '08/30/2022', 1),
(9, '5', '9', 1, 1, '09/06/2022', '08/31/2022', 1),
(10, '8', '5', 1, 1, '08/31/2022', '09/06/2022', 1),
(11, '19', '1', 0, 0, '', '', 1),
(12, '9', '1', 1, 0, '08/31/2022', '', 1),
(13, '11', '1', 1, 0, '09/06/2022', '', 1),
(14, '11', '12', 0, 0, '', '', 0),
(15, '11', '9', 1, 1, '09/06/2022', '', 1),
(16, '11', '6', 0, 0, '', '', 0),
(17, '17', '1', 0, 0, '', '', 0),
(18, '20', '1', 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `owned_equipment`
--

CREATE TABLE `owned_equipment` (
  `id` int(11) NOT NULL,
  `missionexclusiveloot` int(11) NOT NULL DEFAULT '0',
  `equipment_id` text NOT NULL,
  `player_id` text NOT NULL,
  `how_many` bigint(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owned_equipment`
--

INSERT INTO `owned_equipment` (`id`, `missionexclusiveloot`, `equipment_id`, `player_id`, `how_many`) VALUES
(1, 1, '1', '1', 0),
(2, 0, '2', '1', 0),
(3, 1, '1', '5', 6),
(4, 1, '14', '5', 0),
(5, 0, '4', '5', 21),
(6, 0, '5', '5', 1),
(7, 0, '7', '5', 1),
(8, 0, '16', '5', 1),
(9, 0, '15', '5', 0),
(10, 0, '4', '1', 0),
(11, 0, '5', '1', 14),
(12, 0, '13', '1', 9),
(13, 0, '10', '1', 19),
(14, 0, '12', '1', 9),
(15, 0, '11', '5', 0),
(16, 0, '10', '5', 0),
(17, 0, '9', '5', 0),
(18, 0, '13', '5', 0),
(19, 0, '12', '5', 0),
(20, 0, '31', '1', 3),
(21, 1, '30', '1', 8),
(22, 1, '1', '6', 334),
(23, 0, '3', '6', 0),
(24, 0, '5', '6', 0),
(25, 0, '4', '6', 0),
(26, 1, '14', '6', 7),
(27, 0, '2', '6', 10),
(28, 1, '30', '6', 156),
(29, 0, '31', '6', 0),
(30, 1, '30', '5', 16),
(31, 0, '31', '5', 0),
(32, 1, '1', '8', 229),
(33, 1, '14', '8', 2),
(34, 0, '11', '1', 0),
(35, 0, '3', '1', 10),
(36, 1, '14', '10', 3),
(37, 0, '4', '10', 0),
(38, 0, '2', '10', 0),
(39, 0, '5', '10', 0),
(40, 0, '24', '1', 1),
(41, 0, '23', '1', 1),
(42, 0, '25', '1', 1),
(43, 1, '1', '9', 1),
(44, 0, '4', '9', 670),
(45, 1, '1', '11', 346),
(46, 0, '4', '11', 20),
(47, 0, '24', '6', 1),
(48, 0, '2', '18', 1055),
(49, 1, '1', '19', 233),
(50, 1, '14', '19', 116);

-- --------------------------------------------------------

--
-- Table structure for table `owned_property`
--

CREATE TABLE `owned_property` (
  `id` int(11) NOT NULL,
  `property_id` text NOT NULL,
  `player_id` text NOT NULL,
  `how_many` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owned_property`
--

INSERT INTO `owned_property` (`id`, `property_id`, `player_id`, `how_many`) VALUES
(1, '2', '1', 20),
(2, '5', '5', 0),
(3, '7', '1', 10),
(4, '4', '1', 10),
(5, '10', '1', 50),
(6, '4', '5', 10),
(7, '3', '5', 0),
(8, '9', '5', 150),
(9, '15', '5', 130),
(10, '16', '5', 100),
(11, '5', '1', 20),
(12, '15', '1', 160),
(13, '3', '1', 30),
(14, '8', '1', 30),
(15, '9', '1', 20),
(16, '13', '1', 10),
(17, '16', '1', 120),
(18, '1', '5', 390),
(19, '10', '5', 130),
(20, '2', '5', 0),
(21, '21', '5', 0),
(22, '19', '5', 10),
(23, '17', '5', 50),
(24, '2', '6', 73),
(25, '1', '6', 20),
(26, '6', '6', 20),
(27, '14', '5', 100),
(28, '12', '6', 10),
(29, '4', '6', 20),
(30, '16', '6', 20),
(31, '21', '6', 0),
(32, '17', '6', 50),
(33, '5', '6', 20),
(34, '3', '6', 30),
(35, '11', '6', 20),
(36, '7', '6', 10),
(37, '10', '6', 10),
(38, '14', '6', 20),
(39, '9', '6', 10),
(40, '19', '6', 10),
(41, '8', '6', 10),
(42, '22', '6', 20),
(43, '20', '6', 20),
(44, '11', '5', 80),
(45, '8', '5', 50),
(46, '12', '5', 180),
(47, '13', '5', 20),
(48, '7', '5', 10),
(49, '6', '5', 10),
(50, '3', '8', 0),
(51, '9', '8', 60),
(52, '8', '8', 10),
(53, '2', '8', 0),
(54, '7', '8', 10),
(55, '6', '8', 10),
(56, '1', '8', 100),
(57, '22', '5', 0),
(58, '20', '5', 10),
(59, '1', '9', 10),
(60, '4', '8', 10),
(61, '5', '8', 0),
(62, '2', '7', 10),
(63, '3', '7', 10),
(64, '4', '7', 10),
(65, '5', '7', 10),
(66, '21', '1', 30),
(67, '19', '1', 20),
(68, '14', '1', 190),
(69, '17', '1', 100),
(70, '22', '1', 0),
(71, '18', '1', 10),
(72, '20', '1', 10),
(73, '11', '1', 160),
(74, '1', '1', 320),
(75, '2', '10', 0),
(76, '7', '10', 10),
(77, '5', '10', 0),
(78, '14', '10', 20),
(79, '21', '10', 10),
(80, '4', '10', 0),
(81, '16', '10', 10),
(82, '15', '10', 10),
(83, '18', '5', 10),
(84, '2', '9', 0),
(85, '6', '9', 10),
(86, '5', '9', 0),
(87, '15', '9', 10),
(88, '4', '11', 10),
(89, '16', '11', 70),
(90, '21', '11', 0),
(91, '17', '11', 40),
(92, '11', '11', 50),
(93, '5', '11', 0),
(94, '15', '11', 80),
(95, '19', '11', 10),
(96, '10', '11', 50),
(97, '2', '14', 10),
(98, '2', '13', 10),
(99, '22', '12', 0),
(100, '18', '12', 10),
(101, '21', '12', 10),
(102, '17', '12', 30),
(103, '4', '12', 0),
(104, '5', '12', 10),
(105, '19', '12', 10),
(106, '2', '18', 1190),
(107, '2', '11', 10),
(108, '3', '11', 0),
(109, '12', '11', 40),
(110, '9', '11', 30),
(111, '15', '8', 10),
(112, '3', '9', 10),
(113, '4', '9', 0),
(114, '10', '9', 10),
(115, '12', '9', 70),
(116, '16', '9', 10);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `released` int(11) NOT NULL DEFAULT '0',
  `exclusive_item` int(11) NOT NULL DEFAULT '0',
  `can_buy` int(11) NOT NULL DEFAULT '0',
  `can_sell` int(11) NOT NULL DEFAULT '0',
  `type` text NOT NULL,
  `built_on_id` int(11) NOT NULL DEFAULT '0',
  `picture_name` text NOT NULL,
  `name` text NOT NULL,
  `income` bigint(20) NOT NULL DEFAULT '0',
  `initial_cost` bigint(20) NOT NULL DEFAULT '0',
  `level` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `released`, `exclusive_item`, `can_buy`, `can_sell`, `type`, `built_on_id`, `picture_name`, `name`, `income`, `initial_cost`, `level`) VALUES
(1, 1, 0, 1, 1, 'dev', 0, 'newsstand.gif', 'Newsstand', 100, 1500, 1),
(2, 1, 0, 1, 1, 'land', 0, 'empty_lot.gif', 'Vacant Lot', 100, 4500, 1),
(3, 1, 0, 1, 1, 'land', 0, 'empty_storefront.gif', 'Empty Storefront', 300, 45000, 1),
(4, 1, 0, 1, 1, 'land', 0, 'plaza_v2.gif', 'Plaza', 2000, 900000, 1),
(5, 1, 0, 1, 1, 'land', 0, 'beach_lot.gif', 'Seaside Lot', 8000, 3500000, 0),
(6, 1, 0, 1, 1, 'dev', 2, 'townhomes.gif', 'Townhomes', 300, 9000, 0),
(7, 1, 0, 1, 1, 'dev', 2, 'resturant.gif', 'Ristorante', 700, 25000, 0),
(8, 1, 0, 1, 1, 'dev', 3, 'condos.gif', 'Condo Complex', 5000, 160000, 0),
(9, 1, 0, 1, 1, 'dev', 3, 'hotel_v3.gif', 'Luxury Hotel', 10000, 350000, 0),
(10, 1, 0, 1, 1, 'dev', 4, 'sky_scraper.gif', 'Skyscraper', 170000, 18000000, 0),
(11, 1, 0, 1, 1, 'dev', 4, 'casino.gif', 'Resort Casino', 350000, 45000000, 0),
(12, 1, 0, 1, 1, 'dev', 2, 'office_building.gif', 'Office Building', 20000, 1200000, 0),
(13, 1, 0, 1, 1, 'dev', 5, 'shipping_yard.gif', 'Shipyard', 20000, 6000000, 0),
(14, 1, 0, 1, 1, 'dev', 5, 'harbor.gif', 'Yacht Harbor', 50000, 5000000, 0),
(15, 1, 0, 1, 1, 'dev', 5, 'resort.gif', 'Seaside Resort', 200000, 20000000, 0),
(16, 1, 0, 1, 1, 'dev', 4, 'mall_v3.gif', 'Downtown Shopping Mall', 500000, 50000000, 0),
(17, 1, 0, 1, 1, 'dev', 21, 'land_mark_casino.gif', 'Landmark Casino', 550000, 100000000, 0),
(18, 1, 0, 1, 1, 'dev', 22, 'foreign_embassy.gif', 'Foreign Embassy', 2000000, 1500000000, 0),
(19, 1, 0, 1, 1, 'dev', 4, 'helipad.gif', 'Helipad', 600000, 300000000, 0),
(20, 1, 0, 1, 1, 'dev', 21, 'airport.gif', 'Airport', 1000000, 900000000, 0),
(21, 1, 0, 1, 1, 'land', 0, 'empty_field.gif', 'Empty Field', 100000, 75000000, 0),
(22, 1, 0, 1, 1, 'land', 0, 'overseas_lot.gif', 'Overseas Lot', 50000, 50000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` bigint(20) NOT NULL,
  `banned` int(11) NOT NULL DEFAULT '0',
  `registered_ip` text NOT NULL,
  `beta` int(11) NOT NULL DEFAULT '1',
  `picture` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `banned`, `registered_ip`, `beta`, `picture`, `email`, `password`) VALUES
(1, 0, '2601:242:c080:2ea0:4d00:79c6:9d71:621b', 1, 'https://media.tenor.com/images/d3ae47aa5c3ab68cad00c3e25a5b3078/tenor.png', 'secret.angnet@gmail.com', 'SweatingJohnny@'),
(2, 0, '2601:242:c080:2ea0:709a:9956:496b:8252', 1, '', 'ascarpacci@yahoo.com', 'bowen22'),
(17, 0, '75.131.42.59', 1, '', 'email@gmail.com', 'password'),
(18, 0, '2601:242:c080:2ea0:452f:b46:29b4:717e', 1, '', 'hilltoddlee@gmail.com', 'bowen22'),
(20, 0, '', 1, '', 'secret.angnet@gmail.com', 'rick14'),
(21, 0, '2601:242:c080:2ea0:2119:bc5:5c9d:c9b2', 1, '', 'test@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_goods`
--

CREATE TABLE `virtual_goods` (
  `id` int(11) NOT NULL,
  `display` int(11) NOT NULL DEFAULT '0',
  `item_name` text NOT NULL,
  `item_number` text NOT NULL,
  `points` bigint(20) NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `virtual_goods`
--

INSERT INTO `virtual_goods` (`id`, `display`, `item_name`, `item_number`, `points`, `price`) VALUES
(1, 1, '21 Favor Points', '6516816516562250', 21, '4.99'),
(2, 1, '42 Favor Points', '5196529509650650', 42, '9.99'),
(3, 1, '85 Favor Points', '7551812452620521', 85, '19.99'),
(4, 1, '170 Favor Points', '2155240502752145', 170, '39.99'),
(5, 1, '215 Favor Points', '2572045205242036', 215, '49.99'),
(6, 1, '440 Favor Points', '4205245252452052', 440, '99.99'),
(7, 1, '1000 Favor Points', '5420752535420498', 1000, '199.99');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_payments`
--

CREATE TABLE `virtual_payments` (
  `id` int(11) NOT NULL,
  `character_id` text NOT NULL,
  `payer_email` text NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hitlist`
--
ALTER TABLE `hitlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `log_ins`
--
ALTER TABLE `log_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mob_members`
--
ALTER TABLE `mob_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `owned_equipment`
--
ALTER TABLE `owned_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owned_property`
--
ALTER TABLE `owned_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `virtual_goods`
--
ALTER TABLE `virtual_goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `virtual_payments`
--
ALTER TABLE `virtual_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hitlist`
--
ALTER TABLE `hitlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_ins`
--
ALTER TABLE `log_ins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mob_members`
--
ALTER TABLE `mob_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `owned_equipment`
--
ALTER TABLE `owned_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `owned_property`
--
ALTER TABLE `owned_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `virtual_goods`
--
ALTER TABLE `virtual_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `virtual_payments`
--
ALTER TABLE `virtual_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
