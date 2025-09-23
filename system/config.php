<?php
// error_reporting(1);
define('HOST_DB','localhost');
define('NAME_DB','tytbblab_projectchay');
define('USER_DB','root');
define('PASS_DB','');
define('ROOT_URL','/lequan');
define('ADMIN_URL',ROOT_URL.'/admin');
define('SITE_URL',ROOT_URL.'/site/');
define('SYSTEM_PATH',ROOT_URL.'/system');
define('PATH_IMG_ADMIN','../uploads/');
define('PAGE_SIZE',10);
define('PAGE_SIZE_PRO',20);
define('PATH_IMG_SITE','../uploads/');
session_start();

// Twilio configuration - replace with real credentials
define('TWILIO_SID', 'AC04ef80f1fb562b04bd924a6f3053e410');
define('TWILIO_TOKEN', 'cabac450e4b5a72d9e070965005ba7e6');
define('TWILIO_FROM', '+84924698776'); // Twilio phone number in E.164 format

// if (!isset($_SESSION['lang']))
// 		$_SESSION['lang'] = "en";
// 	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
// 		if ($_GET['lang'] == "en")
// 			$_SESSION['lang'] = "en";
// 		else if ($_GET['lang'] == "ge")
// 			$_SESSION['lang'] = "ge";
// 	}


?>