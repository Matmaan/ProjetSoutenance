SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE buildings (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `camp` int(11) NOT NULL,
  `wood_farm` int(11) NOT NULL,
  `food_farm` int(11) NOT NULL,
  `water_farm` int(11) NOT NULL,
  `wood_stock` int(11) NOT NULL,
  `food_stock` int(11) NOT NULL,
  `water_stock` int(11) NOT NULL,
  `cabanon` int(11) NOT NULL,
  `radio` int(11) NOT NULL,
  `wall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE construct (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `camp` int(11) DEFAULT NULL,
  `wood_farm` int(11) DEFAULT NULL,
  `food_farm` int(11) DEFAULT NULL,
  `water_farm` int(11) DEFAULT NULL,
  `wood_stock` int(11) DEFAULT NULL,
  `food_stock` int(11) DEFAULT NULL,
  `water_stock` int(11) DEFAULT NULL,
  `cabanon` int(11) DEFAULT NULL,
  `radio` int(11) DEFAULT NULL,
  `wall` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE param (
  `id` int(10) UNSIGNED NOT NULL,
  `speed` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `z_atk_proba` tinyint(3) UNSIGNED NOT NULL DEFAULT '40',
  `p_atk_proba` tinyint(3) UNSIGNED NOT NULL DEFAULT '40'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO param (id, speed, z_atk_proba, p_atk_proba) VALUES
(1, 10, 40, 40);

CREATE TABLE reports (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `report` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE ressources (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `water` bigint(20) NOT NULL,
  `food` bigint(20) NOT NULL,
  `wood` bigint(20) NOT NULL,
  `camper` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `birthday` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `refresh_wood` int(11) NOT NULL,
  `refresh_water` int(11) NOT NULL,
  `refresh_food` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_last_connexion` int(11) NOT NULL,
  `refresh_camper` int(11) NOT NULL,
  `attacking_campers` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE buildings
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

ALTER TABLE construct
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

ALTER TABLE param
  ADD PRIMARY KEY (`id`);

ALTER TABLE reports
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_user_3` (`id_user`);

ALTER TABLE ressources
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

ALTER TABLE users
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);


ALTER TABLE buildings
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE construct
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE param
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE reports
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE ressources
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE users
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
