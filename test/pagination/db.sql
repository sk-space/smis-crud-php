create database `phpgang`;
use `phpgang`;
CREATE TABLE `pagination` (
  `id` int(11) NOT NULL auto_increment,
  `post` varchar(250) NOT NULL,
  `postlink` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

INSERT INTO `pagination` VALUES (1, 'How to Resize text using jQuery', 'http://www.phpgang.com/?p=312');
INSERT INTO `pagination` VALUES (2, 'How to Integrate live search in PHP and MySQL with jQuery', 'http://www.phpgang.com/?p=309');
INSERT INTO `pagination` VALUES (3, 'How to implement jquery Timeago with php', 'http://www.phpgang.com/?p=290');
INSERT INTO `pagination` VALUES (4, 'How to Mask an input box in jQuery', 'http://www.phpgang.com/?p=304');
INSERT INTO `pagination` VALUES (5, 'How to block Inappropriate content with javascript validation', 'http://www.phpgang.com/?p=301');
INSERT INTO `pagination` VALUES (6, 'How to Crop Image with jQuery and PHP', 'http://www.phpgang.com/?p=298');
INSERT INTO `pagination` VALUES (7, 'How to Integrate jQuery Scroll Paging with PHP', 'http://www.phpgang.com/?p=294');
INSERT INTO `pagination` VALUES (8, 'Bug Reporting with Windows Program Steps Recorder (PSR)', 'http://www.phpgang.com/?p=291');
INSERT INTO `pagination` VALUES (9, 'How to Configure Google Cloud API in PHP', 'http://www.phpgang.com/?p=288');
INSERT INTO `pagination` VALUES (10, 'How to convert text to MP3 Voice', 'http://www.phpgang.com/?p=284');