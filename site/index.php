<?php
  session_start();
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  require_once("../system/config.php");
  require_once "controllers/home.php";  
  $controller = new home;