CREATE TABLE IF NOT EXISTS `reshifts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_date_id` varchar(30) NOT NULL,
    `user_id` int(30) NOT NULL,
    `date_id` varchar(255) NOT NULL,
    `week` varchar(30) NOT NULL,
    `start` varchar(255) NOT NULL,
    `finish` varchar(255) NOT NULL,
    `rest` varchar(255) NOT NULL,
    `kei` varchar(255) NOT NULL,
    `note` varchar(255) NOT NULL,
    `flag` varchar(255) NOT NULL,
    `reason` varchar(255) NOT NULL,
    `editor` varchar(30) NOT NULL,
    `create_date` datetime DEFAULT NULL,
    `approval` varchar(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;
