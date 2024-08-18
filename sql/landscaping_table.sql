DROP TABLE IF EXISTS `landscaping1`;
CREATE TABLE `landscaping1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `t_stamp` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `paid` varchar(100) NOT NULL,
  `date_srvc` date NOT NULL,
  `recorder` varchar(100) NOT NULL,
  `comments` text DEFAULT NULL,
  `active_ind` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

