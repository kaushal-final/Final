

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
use Kaushal200449270;
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--
DROP TABLE player;
CREATE TABLE `player` (
  `player_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `favgame` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `player` (`player_id`, `first_name`, `last_name`, `position`, `email`, `favgame`) VALUES
(15, 'nord', 'million', 'wicketkeeper', 'nord@gmail.com', 'cricket'),
(16, 'mali', 'guni', 'goalkeeper', 'mali@gmail.com', 'football'),
(17, 'varun', 'dhavan', 'defender', 'varun@gmail.com', 'kabaddi');

ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`);

ALTER TABLE `player`
  MODIFY `player_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
