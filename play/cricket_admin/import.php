<?php
  	ob_start();
	require 'myConnection.php';

	$sql="
CREATE TABLE IF NOT EXISTS `adds` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_title` varchar(128) DEFAULT NULL,
  `add_file` varchar(128) DEFAULT NULL,
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`add_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
$sql="
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email_en` varchar(128) NOT NULL,
  `password_en` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
$sql="
CREATE TABLE IF NOT EXISTS `matches` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_team` int(11) NOT NULL,
  `second_team` int(11) NOT NULL,
  `venue` varchar(64) NOT NULL,
  `match_type` varchar(32) NOT NULL,
  `match_status` int(1) NOT NULL DEFAULT '0',
  `schedule` datetime NOT NULL,
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
$sql="
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(32) NOT NULL,
  `sender_email` varchar(64) NOT NULL,
  `message_description` longtext NOT NULL,
  `message_date_time` datetime NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
$sql="
CREATE TABLE IF NOT EXISTS `players` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(32) NOT NULL,
  `player_role` varchar(32) NOT NULL,
  `player_image` varchar(128) NOT NULL,
  `player_description` varchar(20480) DEFAULT NULL,
  `player_status` int(1) NOT NULL DEFAULT '1',
  `team_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `external_link` varchar(512) DEFAULT '',
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;
";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
$sql="
CREATE TABLE IF NOT EXISTS `player_scores` (
  `player_score_id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`player_score_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;
";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

$sql="
CREATE TABLE IF NOT EXISTS `sponsors` (
  `sponsor_id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsor_name` varchar(128) NOT NULL,
  `sponsor_logo` varchar(128) DEFAULT NULL,
  `entry_date_time` datetime NOT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
  ";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

$sql="
CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(32) NOT NULL,
  `team_logo` varchar(128) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
  ";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

$sql="
CREATE TABLE IF NOT EXISTS `user_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email_en` varchar(128) NOT NULL,
  `password_en` varchar(128) NOT NULL,
  `user_date_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
  ";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

$sql="
CREATE TABLE IF NOT EXISTS `user_matches` (
  `user_match_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
  ";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}



$sql="
CREATE TABLE IF NOT EXISTS `user_teams` (
  `user_team_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  PRIMARY KEY (`user_team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;
  ";

$result=mysql_query($sql);
if (!$result) {
  	die('Invalid query: ' . mysql_error());
}

$sql="
INSERT INTO `admin_accounts` (`admin_id`, `email`, `password`, `email_en`, `password_en`) VALUES
(1, 'a@a', '12345678', '4b9411a9b28f9063ea75e5fee24bb2a8', '25d55ad283aa400af464c76d713c07ad');
  ";

$result=mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}else{
	header('Location: index.php');	
}



?>