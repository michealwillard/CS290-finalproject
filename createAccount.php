<?php
include 'storedInfo.php';
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project

$connectDB = new mysqli("oniddb.cws.oregonstate.edu","willardm-db",$myPassword,"willardm-db") or die("Failed to connect to MySQL");

$un = $_POST['username'];
$pw = $_POST['password'];
$fn = $_POST['first_name'];
$ln = $_POST['last_name'];

if(!$stmt = $connectDB->prepare("INSERT INTO userAccounts(username, password, firstname, lastname) VALUES (?, ?, ?, ?)")) {
  echo "Prepare failed.";
}
if(!$stmt->bind_param("ssss", $un, $pw, $fn, $ln)) {
  echo "Bind Param failed.";
}
if(!$stmt->execute()) {
  echo "Execute failed.";
}
echo "Your new account was created. Click the Login button to Login.";
mysqli_close($connectDB);
?>
