-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 14 juil. 2023 à 16:13
-- Version du serveur : 5.7.31
-- Version de PHP : 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `code_snippet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `role`, `created`) VALUES
(5, 'matth', 'admin', '$2y$10$eYDGejh4Ok64dmSdIPx0fu1JUrvO9jjvvt5djrseBQ4zhOW5yWMGS', 'super_admin', '2023-07-09 13:25:29'),
(6, 'demo', 'demo', '$2y$10$M2Cb.v2vE9ixIdelHMc3ZuHuigjptONGdko32wPmPyK6.Mnf1g0Hi', 'admin', '2023-07-09 16:28:36');

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

DROP TABLE IF EXISTS `code`;
CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `language` varchar(55) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `code`
--

INSERT INTO `code` (`id`, `title`, `url`, `language`, `content`) VALUES
(23, '[security] Comment prÃ©venir l\'injection SQL en PHP ?', 'https://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php', 'PHP', '        $sql = \"INSERT INTO code (`title`, `language`, `content`, `url`) VALUES (:title, :language, :content, :url)\";\r\n        $query  = $this->conn->prepare($sql);\r\n        $query ->bindParam(\':title\', $title);\r\n        $query ->bindParam(\':language\', $language);\r\n        $query ->bindParam(\':content\', $content);\r\n        $query ->bindParam(\':url\', $url);\r\n        $query ->execute();\r\n        return $this->conn->lastInsertId();'),
(40, 'PHP If Statements', 'https://www.codecademy.com/learn/learn-php-conditionals-and-logic/modules/learn-php-conditionals/cheatsheet', 'PHP', 'if (TRUE){\r\n  echo \"TRUE is always true\"; \r\n}\r\n\r\n$condition1 = TRUE;\r\nif ($condition1) {\r\n  // This code block will execute\r\n}\r\n\r\n$condition2 = FALSE;\r\nif ($condition2) {\r\n  // This code block will not execute\r\n}'),
(43, 'PHP elseif statements', 'https://www.codecademy.com/learn/learn-php-conditionals-and-logic/modules/learn-php-conditionals/cheatsheet', 'PHP', '$fav_fruit = \"orange\";\r\n\r\nif ($fav_fruit === \"banana\"){\r\n  echo \"Enjoy the banana!\";\r\n} elseif ($fav_fruit === \"apple\"){\r\n  echo \"Enjoy the apple!\";\r\n} elseif ($fav_fruit === \"orange\"){\r\n  echo \"Enjoy the orange!\";\r\n} else {\r\n  echo \"Enjoy the fruit!\";\r\n}\r\n// Prints: Enjoy the orange!'),
(45, 'PHP ternary operator', 'https://www.codecademy.com/learn/learn-php-conditionals-and-logic/modules/learn-php-conditionals/cheatsheet', 'PHP', '// Without ternary\r\n$isClicked = FALSE;\r\nif ($isClicked) {\r\n  $link_color = \"purple\";\r\n} else {\r\n  $link_color = \"blue\";\r\n}\r\n// $link_color = \"blue\";\r\n\r\n\r\n// With ternary\r\n$isClicked = FALSE;\r\n$link_color = $isClicked ? \"purple\" : \"blue\";\r\n//  $link_color = \"blue\";\r\n'),
(47, 'PHP else statement', 'https://www.codecademy.com/learn/learn-php-conditionals-and-logic/modules/learn-php-conditionals/cheatsheet', 'PHP', '$condition = FALSE;\r\nif ($condition) {\r\n  // This code block will not execute\r\n} else {\r\n  // This code block will execute\r\n}'),
(48, 'If else conditionals', 'https://www.codewithharry.com/tutorial/js-if-else/', 'Javascript', 'let x = 10;\r\nif (x > 5) {\r\n  console.log(\"x is greater than 5\");\r\n} else {\r\n  console.log(\"x is not greater than 5\");\r\n}'),
(49, 'getElementbyId', 'https://www.codewithharry.com/tutorial/js-getelement/', 'Javascript', 'let myDiv = document.getElementById(\"myDiv\");\r\nmyDiv.innerHTML = \"This is my new text\";'),
(50, 'JavaScript Function call()', 'https://www.w3schools.com/js/js_function_call.asp', 'Javascript', 'const person = {\r\n  firstName:\"John\",\r\n  lastName: \"Doe\",\r\n  fullName: function () {\r\n    return this.firstName + \" \" + this.lastName;\r\n  }\r\n}\r\n\r\n// This will return \"John Doe\":\r\nperson.fullName();  '),
(51, 'Dropdown Image', 'https://www.w3schools.com/css/tryit.asp?filename=trycss_dropdown_image', 'CSS', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<style>\r\n.dropdown {\r\n  position: relative;\r\n  display: inline-block;\r\n}\r\n\r\n.dropdown-content {\r\n  display: none;\r\n  position: absolute;\r\n  background-color: #f9f9f9;\r\n  min-width: 160px;\r\n  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);\r\n  z-index: 1;\r\n}\r\n\r\n.dropdown:hover .dropdown-content {\r\n  display: block;\r\n}\r\n\r\n.desc {\r\n  padding: 15px;\r\n  text-align: center;\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n\r\n<h2>Dropdown Image</h2>\r\n<p>Move the mouse over the image below to open the dropdown content.</p>\r\n\r\n<div class=\"dropdown\">\r\n  <img src=\"img_5terre.jpg\" alt=\"Cinque Terre\" width=\"100\" height=\"50\">\r\n  <div class=\"dropdown-content\">\r\n  <img src=\"img_5terre.jpg\" alt=\"Cinque Terre\" width=\"300\" height=\"200\">\r\n  <div class=\"desc\">Beautiful Cinque Terre</div>\r\n  </div>\r\n</div>\r\n\r\n</body>\r\n</html>\r\n\r\n\r\n'),
(52, 'Responsive Image Gallery', 'https://www.w3schools.com/css/tryit.asp?filename=trycss_image_gallery_responsive', 'CSS', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<style>\r\ndiv.gallery {\r\n  border: 1px solid #ccc;\r\n}\r\n\r\ndiv.gallery:hover {\r\n  border: 1px solid #777;\r\n}\r\n\r\ndiv.gallery img {\r\n  width: 100%;\r\n  height: auto;\r\n}\r\n\r\ndiv.desc {\r\n  padding: 15px;\r\n  text-align: center;\r\n}\r\n\r\n* {\r\n  box-sizing: border-box;\r\n}\r\n\r\n.responsive {\r\n  padding: 0 6px;\r\n  float: left;\r\n  width: 24.99999%;\r\n}\r\n\r\n@media only screen and (max-width: 700px) {\r\n  .responsive {\r\n    width: 49.99999%;\r\n    margin: 6px 0;\r\n  }\r\n}\r\n\r\n@media only screen and (max-width: 500px) {\r\n  .responsive {\r\n    width: 100%;\r\n  }\r\n}\r\n\r\n.clearfix:after {\r\n  content: \"\";\r\n  display: table;\r\n  clear: both;\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n\r\n<h2>Responsive Image Gallery</h2>\r\n\r\n<h4>Resize the browser window to see the effect.</h4>\r\n\r\n<div class=\"responsive\">\r\n  <div class=\"gallery\">\r\n    <a target=\"_blank\" href=\"img_5terre.jpg\">\r\n      <img src=\"img_5terre.jpg\" alt=\"Cinque Terre\" width=\"600\" height=\"400\">\r\n    </a>\r\n    <div class=\"desc\">Add a description of the image here</div>\r\n  </div>\r\n</div>\r\n\r\n\r\n<div class=\"responsive\">\r\n  <div class=\"gallery\">\r\n    <a target=\"_blank\" href=\"img_forest.jpg\">\r\n      <img src=\"img_forest.jpg\" alt=\"Forest\" width=\"600\" height=\"400\">\r\n    </a>\r\n    <div class=\"desc\">Add a description of the image here</div>\r\n  </div>\r\n</div>\r\n\r\n<div class=\"responsive\">\r\n  <div class=\"gallery\">\r\n    <a target=\"_blank\" href=\"img_lights.jpg\">\r\n      <img src=\"img_lights.jpg\" alt=\"Northern Lights\" width=\"600\" height=\"400\">\r\n    </a>\r\n    <div class=\"desc\">Add a description of the image here</div>\r\n  </div>\r\n</div>\r\n\r\n<div class=\"responsive\">\r\n  <div class=\"gallery\">\r\n    <a target=\"_blank\" href=\"img_mountains.jpg\">\r\n      <img src=\"img_mountains.jpg\" alt=\"Mountains\" width=\"600\" height=\"400\">\r\n    </a>\r\n    <div class=\"desc\">Add a description of the image here</div>\r\n  </div>\r\n</div>\r\n\r\n<div class=\"clearfix\"></div>\r\n\r\n<div style=\"padding:6px;\">\r\n  <p>This example use media queries to re-arrange the images on different screen sizes: for screens larger than 700px wide, it will show four images side by side, for screens smaller than 700px, it will show two images side by side. For screens smaller than 500px, the images will stack vertically (100%).</p>\r\n  <p>You will learn more about media queries and responsive web design later in our CSS Tutorial.</p>\r\n</div>\r\n\r\n</body>\r\n</html>'),
(53, 'CSS Counters', 'https://www.w3schools.com/css/tryit.asp?filename=trycss_counters1', 'CSS', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<style>\r\nbody {\r\n  counter-reset: section;\r\n}\r\n\r\nh2::before {\r\n  counter-increment: section;\r\n  content: \"Section \" counter(section) \": \";\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n\r\n<h1>Using CSS Counters</h1>\r\n\r\n<h2>HTML Tutorial</h2>\r\n<h2>CSS Tutorial</h2>\r\n<h2>JavaScript Tutorial</h2>\r\n<h2>Python Tutorial</h2>\r\n<h2>SQL Tutorial</h2>\r\n\r\n</body>\r\n</html>\r\n\r\n'),
(54, 'Multiple Backgrounds', 'https://www.w3schools.com/css/tryit.asp?filename=trycss3_background_multiple', 'CSS', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<style> \r\n#example1 {\r\n  background-image: url(img_flwr.gif), url(paper.gif);\r\n  background-position: right bottom, left top;\r\n  background-repeat: no-repeat, repeat;\r\n  padding: 15px;\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n\r\n<h1>Multiple Backgrounds</h1>\r\n<p>The following div element has two background images:</p>\r\n\r\n<div id=\"example1\">\r\n  <h1>Lorem Ipsum Dolor</h1>\r\n  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>\r\n  <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n</div>\r\n\r\n</body>\r\n</html>\r\n'),
(55, 'Responsive Flexbox', 'https://www.w3schools.com/css/tryit.asp?filename=trycss3_flexbox_responsive2', 'CSS', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<style>\r\n* {\r\n  box-sizing: border-box;\r\n}\r\n\r\n.flex-container {\r\n  display: flex;\r\n  flex-wrap: wrap;\r\n  font-size: 30px;\r\n  text-align: center;\r\n}\r\n\r\n.flex-item-left {\r\n  background-color: #f1f1f1;\r\n  padding: 10px;\r\n  flex: 50%;\r\n}\r\n\r\n.flex-item-right {\r\n  background-color: dodgerblue;\r\n  padding: 10px;\r\n  flex: 50%;\r\n}\r\n\r\n/* Responsive layout - makes a one column-layout instead of a two-column layout */\r\n@media (max-width: 800px) {\r\n  .flex-item-right, .flex-item-left {\r\n    flex: 100%;\r\n  }\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n\r\n<h1>Responsive Flexbox</h1>\r\n\r\n<p>In this example, we change the percentage of flex to create different layouts for different screen sizes.</p>\r\n<p><b>Resize the browser window to see that the direction changes when the \r\nscreen size is 800px wide or smaller.</b></p>\r\n\r\n<div class=\"flex-container\">\r\n  <div class=\"flex-item-left\">1</div>\r\n  <div class=\"flex-item-right\">2</div>\r\n</div>\r\n\r\n</body>\r\n</html>\r\n\r\n\r\n'),
(56, 'Change Font Size With Media Queries', 'https://www.w3schools.com/css/tryit.asp?filename=trycss_mediaqueries_fontsize2', 'CSS', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<style>\r\ndiv.example {\r\n  background-color: lightgrey;\r\n  padding: 20px;\r\n}\r\n\r\n@media screen and (min-width: 600px) {\r\n  div.example {\r\n    font-size: 80px;\r\n  }\r\n}\r\n\r\n@media screen and (max-width: 600px) {\r\n  div.example {\r\n    font-size: 30px;\r\n  }\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n\r\n<h2>Change the font size of an element on different screen sizes</h2>\r\n\r\n<div class=\"example\">Example DIV.</div>\r\n\r\n<p>When the browser\'s width is 600px wide or less, set the font-size of DIV to 30px. When it is 601px or wider, set the font-size to 80px. Resize the browser window to see the effect.</p>\r\n\r\n</body>\r\n</html>\r\n'),
(57, 'hamburger menu', 'https://codepen.io/andreykrokhin/pen/mGEqja', 'CSS', '<style>\r\n#menu__toggle {\r\n  opacity: 0;\r\n}\r\n\r\n#menu__toggle:checked ~ .menu__btn > span {\r\n  transform: rotate(45deg);\r\n}\r\n#menu__toggle:checked ~ .menu__btn > span::before {\r\n  top: 0;\r\n  transform: rotate(0);\r\n}\r\n#menu__toggle:checked ~ .menu__btn > span::after {\r\n  top: 0;\r\n  transform: rotate(90deg);\r\n}\r\n#menu__toggle:checked ~ .menu__box {\r\n  visibility: visible;\r\n  left: 0;\r\n}\r\n\r\n.menu__btn {\r\n  display: flex;\r\n  align-items: center;\r\n  position: fixed;\r\n  top: 20px;\r\n  left: 20px;\r\n\r\n  width: 26px;\r\n  height: 26px;\r\n\r\n  cursor: pointer;\r\n  z-index: 1;\r\n}\r\n\r\n.menu__btn > span,\r\n.menu__btn > span::before,\r\n.menu__btn > span::after {\r\n  display: block;\r\n  position: absolute;\r\n\r\n  width: 100%;\r\n  height: 2px;\r\n\r\n  background-color: #616161;\r\n\r\n  transition-duration: .25s;\r\n}\r\n.menu__btn > span::before {\r\n  content: \'\';\r\n  top: -8px;\r\n}\r\n.menu__btn > span::after {\r\n  content: \'\';\r\n  top: 8px;\r\n}\r\n\r\n.menu__box {\r\n  display: block;\r\n  position: fixed;\r\n  visibility: hidden;\r\n  top: 0;\r\n  left: -100%;\r\n\r\n  width: 300px;\r\n  height: 100%;\r\n\r\n  margin: 0;\r\n  padding: 80px 0;\r\n\r\n  list-style: none;\r\n\r\n  background-color: #ECEFF1;\r\n  box-shadow: 1px 0px 6px rgba(0, 0, 0, .2);\r\n\r\n  transition-duration: .25s;\r\n}\r\n\r\n.menu__item {\r\n  display: block;\r\n  padding: 12px 24px;\r\n\r\n  color: #333;\r\n\r\n  font-family: \'Roboto\', sans-serif;\r\n  font-size: 20px;\r\n  font-weight: 600;\r\n\r\n  text-decoration: none;\r\n\r\n  transition-duration: .25s;\r\n}\r\n.menu__item:hover {\r\n  background-color: #CFD8DC;\r\n}\r\n</style>\r\n\r\n<div class=\"hamburger-menu\">\r\n    <input id=\"menu__toggle\" type=\"checkbox\" />\r\n    <label class=\"menu__btn\" for=\"menu__toggle\">\r\n      <span></span>\r\n    </label>\r\n\r\n    <ul class=\"menu__box\">\r\n      <li><a class=\"menu__item\" href=\"#\">Ð“Ð»Ð°Ð²Ð½Ð°Ñ</a></li>\r\n			<li><a class=\"menu__item\" href=\"#\">ÐŸÑ€Ð¾ÐµÐºÑ‚Ñ‹</a></li>\r\n			<li><a class=\"menu__item\" href=\"#\">ÐšÐ¾Ð¼Ð°Ð½Ð´Ð°</a></li>\r\n			<li><a class=\"menu__item\" href=\"#\">Ð‘Ð»Ð¾Ð³</a></li>\r\n			<li><a class=\"menu__item\" href=\"#\">ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ñ‹</a></li>\r\n    </ul>\r\n  </div>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
