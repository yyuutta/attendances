CREATE TABLE IF NOT EXISTS `confirms` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_id` varchar(255) NOT NULL,
    `user_id` int(30) NOT NULL,
    `editor` varchar(30) NOT NULL,
    `create_date` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;
