DROP TABLE IF EXISTS `findme`;

CREATE TABLE `findme` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL DEFAULT '',
  `computer` varchar(100) NOT NULL DEFAULT '',
  `check_in` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
