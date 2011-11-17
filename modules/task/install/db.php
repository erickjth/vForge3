<?php 
$SQL_CREATE[] = "
    CREATE TABLE  `moodle2`.`mdl_vf_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` varchar(45) NOT NULL,
  `courseid` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` mediumtext,
  `percent` int(11) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `date_start` bigint(20) NOT NULL,
  `date_end` bigint(20) DEFAULT NULL,
  `isleaf` int(1) NOT NULL DEFAULT '1',
  `created` bigint(20) NOT NULL,
  `updated` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8
";