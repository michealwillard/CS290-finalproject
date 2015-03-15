<?php
include 'storedInfo.php';
session_start();
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project
if(isset($_GET['action']) && $_GET['action'] == 'end'){
  $_SESSION = array();
  session_destroy();
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/', $filePath);
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
  header("Location: {$redirect}/index.php", true);
  die();
  //  filename;
}
?>
