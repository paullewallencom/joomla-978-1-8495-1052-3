DROP TABLE IF EXISTS `#__boxoffice_revues`;
CREATE TABLE IF NOT EXISTS `#__boxoffice_revues` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `title` varchar(50) NOT NULL default '',
  `rating` varchar(10) NOT NULL default '',
  `quikquip` text NOT NULL,
  `revuer` varchar(50) NOT NULL default '',
  `revued` datetime NOT NULL default '0000-00-00 00:00:00',
  `revue` text NOT NULL,
  `stars` varchar(5) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ;

-- 
-- Dumping data for table `#__boxoffice_revues`
-- 

INSERT INTO `#__boxoffice_revues` (`id`, `catid`, `title`, `rating`, `quikquip`, `revuer`, `revued`, `revue`, `stars`, `checked_out`, `checked_out_time`, `ordering`, `published`, `hits`) VALUES (1, 1, 'Back to the Future', 'PG', 'Good movie. Funny and inventive.', 'Big Movie Fan', '2006-06-06 00:00:00', '<p>I found this movie to be thoroughly entertaining. It was very inventive and the play on words in the title says it all.</p>', '*****', 0, '0000-00-00 00:00:00', 7, 1, 0),
(2, 1, 'Back to the Future II', 'PG', 'Almost as good as the first.', 'Big Movie Fan', '2007-09-09 00:00:00', '<p>I really liked the first one and this one is almost as good. Not bad for a sequel.</p>', '****', 0, '0000-00-00 00:00:00', 8, 1, 0),
(3, 0, 'Terminator', 'R', 'Swartzenegger at his best', 'Joe Moviebuff', '2004-12-05 00:00:00', '<p>The premise is quite interesting. Great Scifi film. Swartzenegger is nearly perfect as a terminating machine. Linda Hamilton does a very good job. Great special effects. Keeps you on the edge of your seat throughout the movie.</p>', '*****', 0, '0000-00-00 00:00:00', 1, 1, 3),
(4, 0, 'Terminator II', 'R', 'Better than the first. Interesting Twist.', 'Joe Moviebuff', '2008-06-05 00:00:00', '<p>I liked the first Terminator movie but this one is even better. All the original actors plus several new ones. Arnold is the same character except he has been reprogrammed to protect rather than terminate. Liquid metal provides great special effects.</p>', '*****', 0, '0000-00-00 00:00:00', 2, 1, 4),
(5, 0, 'Terminator III', 'R', 'Good but not as good as the first two.', 'Joe Moviebuff', '2009-10-05 00:00:00', '<p>I liked this one but not nearly as much as the first two in the series. What can I say but that perhaps the thrill is getting old. Same old stuff--terminator tries to kill John Conner--Arnold helps save JCs butt. Time for something new.</p>', '****', 0, '0000-00-00 00:00:00', 3, 1, 0),
(6, 0, 'Star Wars - Episode IV', 'PG', 'Great movie. Definitely a classic!', 'Scifi Fan', '1970-12-20 00:00:00', '<p>This is destined to be a classic. Steven Spielberg has created a masterpiece of Scifi storytelling. Rumor has it that this is the fourth in a series of nine films. For some strange reason Spielberg has chosen to create the middle trilogy first, followed by the first trilogy, and finishing with the final three.</p>\r\n<p>But really, who cares, this is a great movie! I look forward to the next one.</p>', '*****', 0, '0000-00-00 00:00:00', 4, 1, 1),
(7, 0, 'Star Wars V', 'PG', 'Wow! This just get better and better.', 'Scifi Fan', '2007-12-19 00:00:00', '<p>The original was great, this is even better. Continues the story nicely.</p>', '*****', 0, '0000-00-00 00:00:00', 5, 1, 1);