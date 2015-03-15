<?php
include 'storedInfo.php';
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project

$connectDB = new mysqli("oniddb.cws.oregonstate.edu", "willardm-db", $myPassword, "willardm-db") or die("Failed to connect to MySQL");

$fn = $_POST["fName"];
$ln = $_POST["lName"];
$a = $_POST["age"];
$jer = $_POST["jersey"];


if(!$stmt = $connectDB->prepare("INSERT INTO teamRoster(firstname, lastname, jerseyNum, age) VALUES (?, ?, ?, ?)")){
  echo "Prepare failed";
}
if (!$stmt->bind_param("ssii", $fn, $ln, $a, $jer)) {
  echo "Binding param failed";
}
if (!$stmt->execute()) {
  echo "Execute failed";
}
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
header("Location: {$redirect}/roster.php", true);
die();
?>
