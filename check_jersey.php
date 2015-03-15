<?php
include 'storedInfo.php';
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project
// "oniddb.cws.oregonstate.edu","willardm-db",$myPassword

$connectDB = mysqli_connect("oniddb.cws.oregonstate.edu","willardm-db",$myPassword, "willardm-db") or die('Database connection failed.');


if(isset($_POST["jersey"])) {
  //check if its an ajax request, exit if not
  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die();
  }

  $jersey =  $_POST["jersey"];

  $results = mysqli_query($connectDB,"SELECT id FROM teamRoster WHERE jerseyNum='$jersey'");
  // # of times username occurs: 1 or 0
  $jersey_exists = mysqli_num_rows($results); //total records

  if($jersey_exists) {
    echo "<span class='glyphicon glyphicon-alert'></span> This Jersey Number is Taken";
  }
  else{
    echo "<span class='glyphicon glyphicon-ok'></span>";
  }
  mysqli_close($connectDB);
}
?>
