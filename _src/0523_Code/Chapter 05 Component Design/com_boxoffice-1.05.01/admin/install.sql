CREATE TABLE IF NOT EXISTS `#__boxoffice_revues` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `rating` varchar(10) NOT NULL default '',
  `quikquip` text NOT NULL default '',
  `revuer` varchar(50) NOT NULL default '',
  `revued` datetime NOT NULL,
  `revue` text NOT NULL default '',
  `stars` varchar(5) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL,
  `ordering` int(11) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__boxoffice_comments` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `commenter` varchar(50) NOT NULL default '',
  `comment` text NOT NULL default '',
  `commented` datetime NOT NULL,
  `fk_boxid` int(11) NOT NULL default '0',
  `fk_usrid` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
