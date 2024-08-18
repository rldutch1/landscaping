DROP TABLE IF EXISTS `landscaping_recorder`;
CREATE TABLE `landscaping_recorder` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `active_ind` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB;

