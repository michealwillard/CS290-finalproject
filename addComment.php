<?php
include 'storedInfo.php';
session_start();
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project

$connectDB = new mysqli("oniddb.cws.oregonstate.edu", "willardm-db", $myPassword, "willardm-db") or die("Failed to connect to MySQL");

$name = $_SESSION['firstname'];
$cmt = $_POST["comment"];


if(!$stmt = $connectDB->prepare("INSERT INTO messageBoard(name, message) VALUES (?, ?)")){
  echo "Prepare failed";
}
if (!$stmt->bind_param("ss", $name, $cmt)) {
  echo "Binding param failed";
}
if (!$stmt->execute()) {
  echo "Execute failed";
}
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
header("Location: {$redirect}/messageboard.php", true);
die();
?>
