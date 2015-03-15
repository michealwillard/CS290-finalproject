<?php
include 'storedInfo.php';
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project

$connectDB = new mysqli("oniddb.cws.oregonstate.edu", "willardm-db", $myPassword, "willardm-db") or die("Failed to connect to MySQL");

$type = $_POST["type"];
$opp = $_POST["opponent"];
$date = $_POST["date"];
$time = $_POST["time"];
$loc = $_POST["location"];


if(!$stmt = $connectDB->prepare("INSERT INTO teamSchedule(type, opponent, date, time, location) VALUES (?, ?, ?, ?, ?)")){
  echo "Prepare failed";
}
if (!$stmt->bind_param("sssss", $type, $opp, $date, $time, $loc)) {
  echo "Binding param failed";
}
if (!$stmt->execute()) {
  echo "Execute failed";
}
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
header("Location: {$redirect}/schedule.php", true);
die();
?>
